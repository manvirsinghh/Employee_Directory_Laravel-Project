<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    //
    public function users()
{
    $users = User::where('role', 'user')->get();
    return view('admin.users', compact('users'));
}
}
