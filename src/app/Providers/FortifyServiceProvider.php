<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;



class FortifyServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }


    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::registerView(function(){
            return view('auth.register');
        });

        Fortify::loginView(function(){
            return view('auth.login');
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            return Limit::perMinute(10)->by($email . $request->ip());
        });



        // ---------

        // Fortify::register(function(RegisterRequest $request){
        //     $validated = $request-> validated();
        //     return app(CreateNewUser::class)-create($validated);
        // });


        Fortify::authenticateUsing(function(Request $request){
            $validated = $request->validated();
            $user = User::where('email',$validated['email'])->first();
            if($user && Hash::check($validated['password'],$user->password)){
                return $user;
            }
            return null;
        });

        // Fortify::validateRegistrationThrough(function(RegisterRequest $request){
        //     $request->validated();
        // });

        // Fortify::createUsersUsing(function(Request $request){
        //     $registerRequest = new RegisterRequest();
        //     $registerRequest -> merge($request->all());
        //     $registerRequest -> setContainer(app())->validate();

        //     try{
        //         $validatedDate = $registerRequest->validated();

        //     return User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($validatedData[password]),
        //     ]);
        //     } catch (ValidationException $e) {
        //         throw $e;
        // }catch(\Exception $e){
        //     \Log::error('User creation failed: ' . $e->getMessage());
        //     throw $e;
        // }

        // });







    }
}
