<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function store(Request $request){
        $citizenExists = User::where('user_nik', $request['user_nik'])->exists();
        if($citizenExists){
            return back()->with('error', 'NIK telah digunakan pada akun lainnya.')->withInput();
        }

        if (!Warga::where('nik', $request['user_nik'])->exists()) {
            return back()->with('error', 'NIK tidak terdaftar pada database.')->withInput();
        }
        

        $validatedData = $request->validate([
            'username' => 'required',
            'user_nik'  => ['required','exists:wargas,nik'],
            'role' => 'required',
            'password' => 'required',
        ]);
        
        User::create($validatedData);
        return redirect('/')->with('success', 'Registration Successful! Please Login to Continue');
    }
}
