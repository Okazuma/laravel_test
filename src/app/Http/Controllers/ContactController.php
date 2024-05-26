<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('index',compact('contacts', 'categories'));
    }


    public function confirm(ContactRequest $request)
    {
        $contacts = $request->all();
        $tel = $contacts['tel_left'].$contacts['tel_middle'].$contacts['tel_right'];
        $contact = new Contact();
        $contact->fill($contacts);
        $contact->tel = $tel;
        $category = Category::find($request->input('category_id'));
        $content = $category->content;

        return view('confirm',compact('contact','category'));
    }


    public function store(Request $request)
    {
        $tel = $request->input('tel_left').$request->input('tel_middle').$request->input('tel_right');

        $contact = new Contact;
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->gender = $request->input('gender');
        $contact->email = $request->input('email');
        $contact->tel = $request->input('tel');
        $contact->address = $request->input('address');
        $contact->building = $request->input('building');
        $contact->category_id = $request->input('category_id');
        $contact->detail = $request->input('detail');

        $contact->save();
        return redirect('/thanks');
    }


    public function thanks()
    {
        return view('thanks');
    }

}
