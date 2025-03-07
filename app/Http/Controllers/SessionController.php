<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() 
    {

        return view('auth.login');
    }

    public function store() 
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

       //attempt to login
       if(! Auth::attempt($attributes, true)) {
        throw ValidationException::withMessages([
            'email' => 'Sorry those credentials do not match'
        ]);
       };

       //regenerate token if succes
       request()->session()->regenerate();

       //redirect
       return redirect('/jobs');
    }

    public function destroy_session()
    {
        Auth::logout();
        return redirect('/');
    }
}
