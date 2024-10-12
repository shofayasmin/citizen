<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MasukController extends Controller
{
    public function SignIn()
    {
        return view('SignIn');
    }

    public function SignUp()
    {
        return view('SignUp');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // $data['nama_field_di_database'] = $request->nama_di_inputan;
        $data['email'] = $request->email; 
        $data['username'] = $request->username; 
        $data['password'] = Hash::make($request->password); 

        User::create($data);

        return redirect()->route('login');
    }
    
}
