<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Invite;
use App\Mail\InviteCreated;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class InviteController extends Controller
{

    public function index()
    {
        return view('users/home');
    }

    public function invite()
    {
        return view('users/invite');
    }

    public function process(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        do { $token = str_random();}
        while (Invite::where('token', $token)->first());

        //create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token
        ]);

        try{
            Mail::to($request->get('email'))->send(new InviteCreated($invite));
        }catch (\Exception $e){

        }

        \Session::flash('link', url('/').'/accept/'.$token);
        \Session::flash('status', 'Link de convite enviado com sucesso, clique aqui para compartilhar no whatsapp');
        return Redirect::to('users');
    }

    public function accept($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked

        return view('users/new', ['token'=>$token]);
    }

    public function create($token, Request $request){
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        $request->validate([
            'name' => 'required|min:3|max:50',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = new User();
        $fields = $request->all();
        $fields['email'] = $invite->email;
        $fields['password'] = Hash::make($fields['password']);
        $fields['type_id'] = UserType::getCostumerId();
        $user->create($fields);
        Invite::where('email', $invite->email)->delete();

        return Redirect::to('/');
    }
}
