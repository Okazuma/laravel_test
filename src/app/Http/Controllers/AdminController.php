<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

use Illuminate\Pagination\Paginator;


class AdminController extends Controller
{
    //
    public function __construct()
        {
        $this->middleware('auth');
        }

        // public function registerMove()
        // {
        //     return view('/register');
        // }

        // public function login()
        // {
        //     return view('/login');
        // }

    public function index()
        {

        // $category = Category::find('content');
        // $content = $category->content;

        $contacts = Contact::Paginate(7);
        return view('admin',compact('contacts'));

        }

        


    public function logout(Request $request)
        {
        Auth::logout();

        return redirect('/admin');
        }
}
