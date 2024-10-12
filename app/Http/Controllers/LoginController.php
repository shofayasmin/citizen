<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(){
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credentials = $request-> validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt( $credentials )){
            $request->session()->regenerate();
            // if (auth()->user()->role === 'citizen'){
            //     return redirect()->intended('/dashboard/warga');
            // } 
            return redirect()->intended('/dashboard/index');
        }
        else{
            return back()->with('LoginError', 'Login Failed');
        }
    }

    public function logout(){
        Auth::logout();
        request()->session() -> invalidate();
        request()->session() -> regenerateToken();
        return redirect('/');
    }
}
