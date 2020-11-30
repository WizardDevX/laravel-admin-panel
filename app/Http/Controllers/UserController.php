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

    public function updateUserView(User $user)
    {
        return view('admin.updateUser', ['user' => $user]);
    }

    public function updateUser(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'nombre' => ['required'],
            'correo' => ['required', 'unique:users,correo,' . $user->id . ',id'],
            'contraseña' => ['required', 'min:8']
        ]);

        $validatedData['contraseña'] = Hash::make($validatedData['contraseña']);

        $user->nombre = $validatedData['nombre'];
        $user->correo = $validatedData['correo'];
        $user->contraseña = $validatedData['contraseña'];

        $user->save();

        return redirect('/dashboard');
    }

    public function getUsers($order = null)
    {

        if ($order == 'nombre') {
            $users = User::where('role', 'USER')->orderBy('nombre', 'ASC')->paginate(10);
        } else {
            $users = User::where('role', 'USER')->paginate(10);
        }

        return view('admin.dashboard', ['users' => $users]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect('/dashboard');
    }
}
