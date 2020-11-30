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
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

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
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $user->id . ',id'],
            'password' => ['required', 'min:8']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];

        $user->save();

        return redirect('/dashboard');
    }

    public function getUsers($order = null)
    {

        if ($order == 'name') {
            $users = User::where('role', 'USER')->orderBy('name', 'ASC')->paginate(10);
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
