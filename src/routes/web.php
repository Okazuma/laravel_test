<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\CategoryController;
use App\Models\Contact;
use Laravel\Fortify\Fortify;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\ModalController;


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

// お問い合わせフォームーーーーー

Route::get('/',[ContactController::class,'index']);

Route::post('/confirm',[ContactController::class,'confirm']);

Route::post('/contacts',[ContactController::class,'store']);

Route::get('/thanks',[ContactController::class,'thanks']);

// ーーーーー



// Fortify 認証機能ーーーーー

Route::middleware('auth')->group(function () {
    Route::get('/admin',[AdminController::class, 'index']);
});

Route::middleware(['web'])->group(function(){
    Route::post('/logout',[AdminController::class,'logout']);
});

Route::post('/login', [AdminController::class, 'login']);

// ーーーーー



// メール認証機能ーーーーー

Route::get('/email/verify',function(){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}',function(EmailVerificationRequest $request){
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth','signed'])->name('verification.verify');

Route::post('/email/verification->notification', function(Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message','Verification link sent!');
})->middleware(['auth','throttle:6,1'])->name('verification.send');

Route::post('admin',[AdminController::class,'verifyEmail']);

Route::get('/email/verify/{id}/{hash}',[AdminController::class,'verifyEmail'])->middleware(['auth','signed'])->name('verification.verify');

// ーーーーー



// 登録フォーム表示ーーーーー

Route::get('register',[AdminController::class,'showRegistrationForm'])->name('register');

Route::post('register',[AdminController::class,'register']);

Route::post('admin',[AdminController::class,'login']);

Route::get('success',function(){
    return view('auth.success');
})->name('success');

// ーーーーー



// 検索機能

Route::get('/search',[AdminController::class,'search']);

// ーーーーー



// モーダル

Route::get('/contact/details', [App\Http\Controllers\ModalController::class, 'details'])->name('contact.details');

Route::post('/contact/details', [App\Http\Controllers\ModalController::class, 'delete']);

Route::post('/contact/delete', [App\Http\Controllers\ModalController::class, 'delete']);

// ーーーーー



// エクスポート

Route::get('/export/data', [ModalController::class, 'exportData']);

// ーーーーー







