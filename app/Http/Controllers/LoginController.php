<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean($request->remember);



        if (Auth::attempt($credentials, $remember)) return redirect()->intended('/dashboard');

        return view('index', ['error' => 'Credenciales Incorrectas.']);
    }
}
