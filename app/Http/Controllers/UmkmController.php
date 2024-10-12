<?php

namespace App\Http\Controllers;

use App\Models\UmkmParticipation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\umkm;
use Illuminate\Support\Facades\DB;


class UmkmController extends Controller
{
    public function register()
    {
        $user = Auth::user();
        return view('umkm.register',compact('user'));
    }

    public function manage()
    {
        $data = umkm::paginate(10);
        return view('umkm.manage',compact('data'));
    }

    public function view(){
        $data = umkm::paginate(10);
        $userParticipations = UmkmParticipation::where('user_id', auth()->id())->pluck('umkm_id')->toArray(); // Get all acara_id where the authenticated user has participated

        return view('umkm.view',compact('data','userParticipations'));
    }

    public function store_umkm(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'Nama' => 'required',
            'umkm' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
            'tipe_umkm' => 'required',
            'deskripsi' => 'required',
            
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
        $photo = $request->file('gambar');
        $filename = date('Y-m-d') . $photo->getClientOriginalName();
        $path = 'photo-acara/' . $filename;
        
        Storage::disk('public')->put($path,file_get_contents($photo));
        
        
        // $data['nama_field_di_database'] = $request->nama_di_inputan;
        $data['Nama'] = $request->Nama;  
        $data['umkm'] = $request->umkm; 
        $data['gambar'] = $filename; 
        $data['tipe_umkm'] = $request->tipe_umkm;
        $data['deskripsi'] = $request->deskripsi;
        umkm::create($data);

        return redirect()->route('umkm.view');
    }
    public function edit_umkm(Request $request, $id)
    {
        $data = umkm::find($id);

        return view('umkm.edit', compact('data'));
    }

    public function update_umkm(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Nama' => 'required',
            'umkm' => 'required',
            'gambar' => 'sometimes|nullable|mimes:png,jpg,jpeg|max:2048',
            'tipe_umkm' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = umkm::find($id);

        if ($request->hasFile('gambar')) {
            // Handle the file upload
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data->gambar = $filename;
        }

        $data->Nama = $request->Nama;
        $data->umkm = $request->umkm;
        $data->tipe_umkm = $request->tipe_umkm;
        $data->deskripsi = $request->deskripsi;

        $data->save();

        return redirect()->route('umkm.view')->with('success', 'Data berhasil diperbarui');
    }

    public function delete_umkm(Request $request,$id)
    {
        $data = umkm::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('umkm.view');
    }

    public function store_kandidat(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'umkm_id' => 'required|exists:umkms,umkm_id'
        ]);

        // Create the new participation record
        UmkmParticipation::create($validatedData);

        return redirect()->back()->with('success','Selamat anda telah bergabung di UMKM');

    }
    public function batal_ikut($id)
    {
        $user_id = Auth::id();
        UmkmParticipation::where('umkm_id', $id)->where('user_id', $user_id)->delete();

        return redirect()->back()->with('success', 'Kamu telah membatalkan keikutsertaan dalam kegiatan ini.');
    }
}
