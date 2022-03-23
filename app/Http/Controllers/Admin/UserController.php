<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function info(User $user)
    {
        $company = null;
        if ($user->status == 2) {
            $company = Company::where('user_id', $user->id)->first();
        }
        return view('admin.users.info', compact('user', 'company'));
    }

    public function accept(User $user)
    {
        $user->can_login = true;
        $user->save();
        return redirect()->route('admin.users')->with('accepted_successfully', 'Muvaffaqiyatli tasdiqlandi');
    }

    public function delete(User $user)
    {
        $user->citizen->delete();
        $user->delete();
        return redirect()->route('admin.users')->with('deleted_successfully', "Muvaffaqiyatli o'chirildi");
    }

    public function makemoderator(User $user)
    {
        $user->status = 3;
        $user->save();
        return redirect()->route('admin.users')->with('changed_to_moderator_successfully', "Moderator roliga o'tkazildi");
    }

    public function makecitizen(User $user)
    {
        $user->status = 1;
        $user->save();
        return redirect()->route('admin.users')->with('changed_to_citizen_successfully', "Jismoniy shaxs roliga o'tkazildi");
    }
}
