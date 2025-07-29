<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function handleRegister(Request $request)
    {

        $request->validate([


            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|min:6'

        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hashing password
        ]);
        return redirect()->back()->with('success', 'User registered successfully!');
    }
}
