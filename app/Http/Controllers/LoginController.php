<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $credentials = array_merge($validatedData, ['role' => 'ADMIN']);
        $remember = $request->boolean($request->remember);

        if (Auth::attempt($credentials, $remember)) return redirect()->intended('/dashboard');

        return view('index')->withErrors(['credentials' => 'Credenciales Incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
