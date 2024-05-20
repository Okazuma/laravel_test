<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CategoryController;

use App\Models\Contact;
use Laravel\Fortify\Fortify;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ContactController::class,'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/contacts',[ContactController::class,'store']);






Route::get('/thanks',[ContactController::class,'thanks']);
Route::get('/admin',[ContactController::class,'admin']);




Route::middleware('auth')->group(function () {
    Route::get('/register',[AuthController::class, 'register']);
});
Route::post('/register',[AuthController::class,'register']);
Route::get('/register',function(){
    return view('auth.register');
});
Route::get('/login',function(){
    return view('auth.login');
});

Route::get('/login',[LoginController::class,'/login'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('register');

Route::post('/register',[RegisterController::class,'register']);




Route::get('/',[CategoryController::class,'index']);

Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/contacts',[ContactController::class,'store']);
Route::get('/',[ContactController::class,'index'])->name('index');

// Route::get('/',[ContactController::class,'thanks']);





Route::get('/confirm',[ContactController::class,'confirm']);
