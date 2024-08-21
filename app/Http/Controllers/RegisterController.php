<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function registrasi(Request $request)
    {
        $register = $request->validate([
            'name' => 'required|max:124|min:3',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|confirmed',
        ]);

        $register['password'] = Hash::make($register['password']);

        User::create($register);

        return redirect('/login')->with('message', 'Berhasil mendaftarkan pengguna!');
    }
}
