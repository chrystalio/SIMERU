<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function forceResetPassword($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->update(['password' => bcrypt('123456')]);
            return redirect()->back()->with('success', 'Password reset successfully');
        }

        return redirect()->back()->with('error', 'User not found');
    }

}
