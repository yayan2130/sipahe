<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function index()
     {
        return view('register',[
            "title" => "Register"
        ]);
     }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|min:3',
            'username' => 'required',
            'password' => 'required|min:8|max:255'
        ]);

        for($i = 0; $i < 5; $i++){
            $kd_admin = (string) $i;
        }

        $validatedData['password'] = hash::make($validatedData['password']);

        UserModel::create($validatedData);
        
        return redirect('/login');
    }

    
}
