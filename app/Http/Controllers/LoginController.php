<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        $credentials = array_merge($request->only('email', 'password'), ['role' => 'ADMIN']);
        $remember = $request->boolean($request->remember);

        if (Auth::attempt($credentials, $remember)) return redirect()->intended('/dashboard');

        return view('index', ['error' => 'Credenciales Incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
