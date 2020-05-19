<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contact::get();
        return view('contacts/home', ['contacts'=> $contacts]);
    }

    public function create()
    {
        $categories = Category::get()->pluck('name','id');
        return view('contacts/form', ['categories'=> $categories]);
    }

    public function edit($id)
    {
        $report = DailyReport::findOrFail($id);
        return view('contacts/form', ['report'=>$report]);
    }

    public function insert(Request $request){

        $contact = new Contact();
        $fields = $request->all();
        $fields['user_id'] = Auth::user()->id;
        $contact->create($fields);
        \Session::flash('status', 'Contato cadastrado com sucesso');
        return Redirect::to('contacts');
    }

    public function update($id, Request $request){

        $contact = Contact::findOrFail($id);

        $contact->update($request->all());

        \Session::flash('status', 'Contato atualizado com sucesso.');
        return Redirect::to('contacts');
    }

    public function delete($id){

        $contact = Contact::findOrFail($id);

        $contact->delete();

        \Session::flash('status', 'Contato removido com sucesso');
        return Redirect::to('report');
    }
}
