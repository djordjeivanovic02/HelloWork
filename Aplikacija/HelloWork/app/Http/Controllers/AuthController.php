<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        validator(request()->all(),[
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if(auth()->attempt(request()->only(['email', 'password']))){
            return response()->json(['redirect' => '/user']);
        }
        // return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);
        return response()->json(['errors' => ['email' => 'Invalid Credentials']], 422);
    }

    public function register(){
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();
    }

    public function signOut(){
        auth()->logout();
        return redirect('/');
    }
}
