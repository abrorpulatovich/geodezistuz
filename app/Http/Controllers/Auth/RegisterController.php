<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Citizen;
use App\Models\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'region_id' => ['required', 'integer'],
            'phone_number' => ['required', 'string'],

            'company_name' => ['required_if:status,2'],
            'director_name' => ['required_if:status,2'],
            'company_inn' => ['required_if:status,2', 'unique:companies'],

            'birth_date' => ['required_if:status,1'],
            'name' => ['required_if:status,1'],
            'gender' => ['required_if:status,1'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([

            'status' => $data['status'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'password_text' => $data['password']
        ]);

        if($data['status'] == 1) {
            
            $user->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);

            $citizen = Citizen::create([
                'full_name' => $data['name'],
                'user_id' => $user->id,
                'region_id' => $data['region_id'],
                'city_id' => $data['city_id'],
                'gender' => $data['gender'],
                'specialist' => $data['specialist'],
                'phone_number' => $data['phone_number'],
                'birth_date' => $data['birth_date']
            ]);

            if (request()->hasFile('avatar')) {
                $avatar = request()->file('avatar')->getClientOriginalName();
                request()->file('avatar')->storeAs('avatars', $user->id . '/' . $avatar, '');
                $citizen->update(['avatar' => $avatar]);
            }

        }

        if($data['status'] == 2) {
            
            $user->update([
                'name' => $data['company_name']
            ]);
            
            $company = Company::create([
                'user_id' => $user->id,
                'region_id' => $data['region_id'],
                'city_id' => $data['city_id'],
                'company_name' => $data['company_name'],
                'company_inn' => $data['company_inn'],
                'full_name' => $data['director_name'],
                'company_phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'website' => $data['web_site'],
                'status' => 1
            ]);

            if (request()->hasFile('logo')) {
                $logo = request()->file('logo')->getClientOriginalName();
                request()->file('logo')->storeAs('logos', $user->id . '/' . $logo, '');
                $company->update(['logo' => $logo]);
            }

        }

        return $user;
    }
}
