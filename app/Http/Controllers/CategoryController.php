<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
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
        $categories = Category::get();
        return view('categories/home', ['categories'=> $categories]);
    }

    public function create()
    {
        return view('categories/form');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories/form', ['category'=>$category]);
    }

    public function insert(Request $request){

        $category = new Category();
        $category->create($request->all());
        \Session::flash('status', 'Categoria cadastrada com sucesso');
        return Redirect::to('categories');
    }

    public function update($id, Request $request){

        $category = Category::findOrFail($id);

        $category->update($request->all());

        \Session::flash('status', 'Contato atualizado com sucesso.');
        return Redirect::to('categories');
    }

    public function delete($id){

        $category = Category::findOrFail($id);

        $category->delete();

        \Session::flash('status', 'Contato removido com sucesso');
        return Redirect::to('report');
    }
}
