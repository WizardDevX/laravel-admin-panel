<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function createUser(Request $request)
    {

        if ($request->has(['name', 'email', 'password'])) {
            $newUser = new User(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);

            $newUser->save();

            return response($newUser, 201);
        }

        return null;
    }
}
