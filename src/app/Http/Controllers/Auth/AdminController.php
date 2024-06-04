<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AdminController extends Controller
{
    public function __construct()
        {
        $this->middleware('auth')->except(['showRegistrationForm','register','login','verifyEmail','resendVerificationEmail']);
        }


// 管理画面の表示処理ーーーーー

    public function index()
        {
            $contacts = Contact::with('category')->paginate(7);
            $categories = Category::all();
            return view('admin', compact('contacts','categories'));
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

        public function register(RegisterRequest $request)
        {
            $user = User::create([ 'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), ]);
            $user->sendEmailVerificationNotification();
                return redirect('/success');
        }

// ーーーーー


// ログイン処理ーーーーー

public function login(LoginRequest $request)
{
    $validated = $request->validated();
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/admin');
    }
// 認証に失敗した場合の処理
    return redirect()->back()->withErrors([
        'email' => __('auth.failed'),
    ]);
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


// 検索機能の追加ーーーーー

    public function search(Request $request)
        {
            $gender = $request->input('gender');
            $category_id = $request->input('category_id');
            $date = $request->input('date');
            $searchQuery = $request->input('query');

            $contacts = Contact::byGender($gender)->byCategory($category_id)->byDate($date)->search($searchQuery)->paginate(7);
            $categories = Category::all();

            return view('/admin', compact('contacts', 'categories'));
        }

// ーーーーー

}




