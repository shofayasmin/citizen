<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::with('warga')->paginate(5);
        $warga = Warga::all();
        return view('user.index', compact('users', 'warga'));
    }

    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $citizenExists = User::where('user_nik', $request['user_nik'])->exists();
        if($citizenExists){
            return back()->with('error', 'NIK telah digunakan pada akun lainnya.')->withInput();
        }

        if (!Warga::where('nik', $request['user_nik'])->exists()) {
            return back()->with('error', 'NIK tidak terdaftar pada database.')->withInput();
        }
        
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'role' => 'required',
            'user_nik' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['username'] = $request->username; 
        $data['role'] =  $request->role;
        $data['user_nik'] = $request->user_nik;
        $data['password'] =  $request->password;

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User telah berhasil ditambahkan!');
    }
    public function edit(Request $request,$id)
    {   
        $data = User::find($id);
        
        return view('user.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
          return redirect()->route('user.index')->with('error', 'User not found!');
        }
      
        $validator = Validator::make($request->all(), [
          'username' => 'required|string|max:255|unique:users,username,' . $user->id,
          'role' => 'required',
          'password' => 'nullable', 
        ]);
      
        if ($validator->fails()) {
          return redirect()->back()->withInput()->withErrors($validator);
        }
      
        $data = $request->only('username', 'role'); 

        if ($request->filled('password')) { 
        $data['password'] = Hash::make($request->get('password'));
        }
      
        $data['username'] = $request->username; 
        $data['role'] =  $request->role;

      
        User::where('id',$id)->update($data);
      
        return redirect()->route('user.index')->with('success', 'User telah berhasil diupdate!');
    }
    
    

    public function delete(Request $request,$id)
    {
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('user.index')->with('success', 'User telah berhasil dihapus!');
    }


    public function manageAccount()
    {
        return view('user.manageAccount');
    }

    public function editAccount(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if (!$user) {
          return redirect()->route('user.index')->with('error', 'User not found!');
        }
      
        $validator = Validator::make($request->all(), [
          'username' => 'required|string|max:255|unique:users,username,' . $user->id,
          'password' => 'nullable', 
        ]);
      
        if ($validator->fails()) {
          return redirect()->back()->withInput()->withErrors($validator);
        }
      
        $data = $request->only('username'); 

        if ($request->filled('password')) { 
        $data['password'] = Hash::make($request->get('password'));
        }
      
        $data['username'] = $request->username; 

      
        User::where('id',auth()->user()->id)->update($data);
      
        return redirect()->route('account')->with('success', 'Akun telah berhasil diupdate!');
    }
}
