<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validáció
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Mentés
        $user = new User();
        $user->name = $request->name . ' ' . $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // jelszó titkosítás
        $user->save();

        return redirect()->route('dakujeme', ['source' => 'registracia']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dakujeme', ['source' => 'login']);
        }

        return back()->withErrors([
            'email' => 'Nesprávny email alebo heslo.',
        ]);
    }
}
