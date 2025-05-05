<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function showUserRoles()
{
    $users = User::with('roles')->get();
    return view('admin.user_roles', compact('users'));
}

}


