<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;


class AdminController extends Controller
{
    public function __construct()
        {
        $this->middleware('auth')->except(['showRegistrationForm','register','login','verifyEmail','resendVerificationEmail']);
        }


// 管理画面の表示処理ーーーーー
    public function index()
        {
            $contacts = Contact::Paginate(7);
            return view('admin',compact('contacts'));
        }
// ーーーーー


// ログアウト時の処理ーーーーー
    public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
// ーーーーー


// 登録ページの表示処理ーーーーー
        public function showRegistrationForm()
        {
            return view('auth.register');
        }
// ーーーーー


// 登録処理のメソッドーーーーー
        public function register(Request $request)
        {
            $user = User::create([ 'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), ]);
            $user->sendEmailVerificationNotification();
                return redirect('/success');
        }
// ーーーーー


// ログイン処理ーーーーー
        public function login(Request $request)
        {
            $credentials = $request->only('email','password');
            if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/admin');
            }
        }
// ーーーーー


// メール認証でのログインーーーーー
        public function verifyEmail(Request $request)
        {
            if($request->user()->hasVerifiedEmail()){
                return redirect('/admin');
                }
            if ($request->user()->markEmailAsVerified()){
                event(new Verified($request->user()));
                }
                return redirect('/admin')->with('verified',true);
        }
// ーーーーー


// メール認証の再送ーーーーー
        // public function resendVerificationEmail(Request $request) {
        // $request->user()->sendEmailVerificationNotification();
        // return back()->with('message', 'Verification link sent!');
        // }
// ーーーーー


}




