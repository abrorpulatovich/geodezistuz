<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Citizen;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function login()
    {
        if (Auth::user()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->home();
    }

    public function post_login(Request $request)
    {
        $credentials = $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('username_or_password_incorrect', "Login yoki parolingiz noto'g'ri");
        }
    }

    protected function post_register(Request $request)
    {
        if ($request->status == 1) {
            $request->passport = str_replace(' ', '', $request->passport);

            $validated_data = $this->validate($request, [
                'full_name' => 'required',
                'region_id' => 'required',
                'city_id' => 'required',
                'gender' => 'required',
                'specialist_id' => 'required',
                'phone_number' => 'required',
                'birth_date' => 'required',
                'passport' => 'required|unique:citizens',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6'
            ]);

            $user = User::create([
                'name' => $request->full_name,
                'status' => $request->status,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'password_text' => $request->password,
                'can_login' => false
            ]);

            unset($validated_data['username']);
            unset($validated_data['email']);
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);

            $validated_data['user_id'] = $user->id;
            $validated_data['status'] = 1;
            $validated_data['passport'] = $request->passport;
            $citizen = Citizen::create($validated_data);

            if (request()->hasFile('avatar')) {
                $avatar = request()->file('avatar')->getClientOriginalName();
                request()->file('avatar')->storeAs('avatars', $user->id . '/' . $avatar, '');
                $citizen->update(['avatar' => $avatar]);
            }

        }

        if ($request->status == 2) {

            $validated_data = $this->validate($request, [
                'director_name' => 'required',
                'company_inn' => 'required|unique:companies',
                'company_name' => 'required',
                'region_id' => 'required',
                'city_id' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'website' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6'
            ]);

            $user = User::create([
                'name' => $request->director_name,
                'status' => $request->status,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'password_text' => $request->password,
                'can_login' => false
            ]);

            unset($validated_data['username']);
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);

            $validated_data['full_name'] = $validated_data['director_name'];
            unset($validated_data['director_name']);
            $validated_data['company_phone_number'] = $validated_data['phone_number'];
            unset($validated_data['phone_number']);
            $validated_data['user_id'] = $user->id;
            $validated_data['status'] = 2;
            $company = Company::create($validated_data);

            if (request()->hasFile('logo')) {
                $logo = request()->file('logo')->getClientOriginalName();
                request()->file('logo')->storeAs('logos', $user->id . '/' . $logo, '');
                $company->update(['logo' => $logo]);
            }
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home');
        }
    }
}
