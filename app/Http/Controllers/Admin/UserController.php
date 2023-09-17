<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }


    public function forceResetPassword($id): RedirectResponse
    {
        $user = User::find($id);

        if ($user) {
            $user->update(['password' => bcrypt('123456')]);
            return redirect()->back()->with('success', 'Password reset successfully');
        }

        return redirect()->back()->with('error', 'User not found');
    }
}
