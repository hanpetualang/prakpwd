<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postLogin(Request $request){
        // dd($request->all());
        $validate = $request->validate( [
            'g-recaptcha-response' => 'required|captcha',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/home');
        }
        return redirect('/');
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
