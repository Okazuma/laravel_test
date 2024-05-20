<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreateNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;


use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{


    // public function register()
    // {

    // return view('register');
    // }

    // public function login()
    // {
    // return view('login');
    // }

    // public function logout()
    // {
    //     return redirect('login');
    // }




    public function toResponse($request)
    {
        return redirect('/login');
    }

    public function register(Request $request)
    {
    $request->validate([
        'name' => ['required','string','max:255'],
        'email' => ['required','string','max:255','unique:users'],
        'password' => ['required','string','min:8'],

    ]);
    Auth::login($user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]));

    event(new Registered($User));
    return redirect('/login');
    }

    public function someFunction()
    {
        $user = Auth::user();
        return view('some_view',['user' => $user]);
    }



    // public function store(AuthRequest $request) :RegisterResponse
    // {
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));
    //     Auth::login($user);
    //     return app(RegisterResponse::class);

    // }
}
