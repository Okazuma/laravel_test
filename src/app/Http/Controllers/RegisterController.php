<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    $validatedData = $request->validate([
        'name' => ['required','string','max:255'],
        'email' => ['required','string','max:255','unique:users'],
        'password' => ['required','string','min:8'],

    ]);


    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($validatedData['password']),
    ]);

    return redirect('/login');
}
}