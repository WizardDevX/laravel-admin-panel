<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function createUser(Request $request)
    {

        $validatedData = $request->validate([
            'nombre' => ['required'],
            'correo' => ['required', 'unique:users'],
            'contraseña' => ['required', 'min:8']
        ]);

        $validatedData['contraseña'] = Hash::make($validatedData['contraseña']);

        $user = array_merge($validatedData, [
            'email_verified_at' => now(),
            'role' => 'USER',
            'remember_token' => Str::random(10)
        ]);

        $newUser = new User($user);

        $newUser->save();

        return redirect('/dashboard');
    }

    public function updateUserView($id)
    {
        $user = User::firstWhere('id', $id);

        return view('admin.updateUser', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nombre' => ['required'],
            'correo' => ['required', 'unique:users'],
            'contraseña' => ['required', 'min:8']
        ]);

        $validatedData['contraseña'] = Hash::make($validatedData['contraseña']);

        $user = User::firstWhere('id', $id);

        $user->nombre = $validatedData['nombre'];
        $user->correo = $validatedData['correo'];
        $user->contraseña = $validatedData['contraseña'];

        $user->save();

        return redirect('/dashboard');
    }

    public function getUsers()
    {
        $users = User::where('role', 'USER')->simplePaginate(10);

        return view('admin.dashboard', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);

        return redirect('/dashboard');
    }
}
