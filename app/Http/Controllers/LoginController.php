<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login', [

        ]);
    }

    public function login(Request $request){

        $logindata = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);

        $remember = $request->has('remember')?true:false;

        if(Auth::attempt($logindata, $remember)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
