<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        if(Auth::user()){
            return back();
        }
        return view('welcome');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/dashboard');
        }else{
            return back()->withError('Invalid Credentials')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
