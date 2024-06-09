<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Login extends Controller
{
    public function index()
    {
        return view('login',[
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8|max:255'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            
            return redirect()->intended('/admin/home');
        }else{
        // dd($credentials);
        return back()->with('loginError', 'Username atau Password Salah!' );
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
