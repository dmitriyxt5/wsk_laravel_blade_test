<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm() {
        return view('login.form');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function login(Request $request) {
//        $credentails = $request->only('name', 'password');


        $credentails = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentails)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'login' => 'Неверный'
        ]);
    }
}
