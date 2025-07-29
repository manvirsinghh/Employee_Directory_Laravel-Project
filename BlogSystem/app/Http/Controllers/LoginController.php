<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function handleLogin(Request $req){
        $req->validate([
        'email'=>'required|string|exists:users,email',
        'password'=>'required|min:6',


        ]);
         if (Auth::attempt($req->only('email', 'password'))) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }
        return back()->withErrors(['email'=>'invalid credentials'])->withInput();
    }
}
