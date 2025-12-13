<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $role = $user->role;
        $user->role_name = $role->role_name;
        return view('dashboard', compact('user'));
    }
}
