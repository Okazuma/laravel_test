<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
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

// お問い合わせフォーム
Route::get('/',[ContactController::class,'index']);
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/contacts',[ContactController::class,'store']);
Route::get('/thanks',[ContactController::class,'thanks']);


// Route::post('/login',[AdminController::class,'login']);
// Route::post('/register',[AdminController::class,'registerMove']);

// Fortify 認証機能
Route::middleware('auth')->group(function () {
    Route::get('/admin',[AdminController::class, 'index']);
});
Route::middleware(['web'])->group(function(){
    Route::post('/logout',[AdminController::class,'logout']);
});

