<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    public function updateRole(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);
        $userId = $request->user_id;
        $roleId = $request->role_id;

        $user = User::find($userId);
        $user->role_id = $roleId;

        $user->save();

        return redirect()->route('users.index')->with('success', 'Role updated successfully.');
    }
}
