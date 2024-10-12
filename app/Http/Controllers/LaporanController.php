<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\laporan;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view()
    {
        $data = Laporan::with('warga','comments','comments')
        ->orderByRaw("FIELD(status,'Belum Selesai', 'Selesai')")->paginate(5);

        $data_tambahan = Laporan::with('comments.user')
        ->orderByRaw("FIELD(status, 'Belum Selesai', 'Selesai')")
        ->get();

        $comment = Comment::all();


        return view('laporan.view',compact('data','data_tambahan','comment'));
        

        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warga = Warga::all();
        return view('laporan.create', compact('warga'));
    }

    public function track()
    {
        return view('laporan.track');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'pengirim'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        
        if(request()->has('gambar')){
            $image = request()->file('gambar')->store('buktiLaporan', 'public');
        }
        
        // $photo = $request->file('gambar');
        // $filename = date('Y-m-d') . $photo->getClientOriginalName();
        // $path = 'photo-acara/' . $filename;

        // Storage::disk('public')->put($path,file_get_contents($photo));

        $data['judul'] = $request->judul;
        $data['pengirim'] = $request->pengirim;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = 'Belum Selesai';
        $data['gambar'] = $image;

        laporan::create($data);

        session()->flash('success', 'Laporan telah berhasil ditambahkan!');

        return redirect()->route('laporan.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $data = laporan::find($id);
        
        return view('laporan.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'judul'                     => 'required',
            'pengirim'                 => 'required',
            'deskripsi'                 => 'required',
            'gambar'                    => 'required|mimes:png,jpg,jpeg|max:2048',
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        if(request()->has('gambar')){
            $image = request()->file('gambar')->store('buktiLaporan', 'public');
        }

        // $data['nama_field_di_database'] = $request->nama_di_inputan;
        $data['judul'] = $request->judul;
        $data['pengirim'] = $request->pengirim;
        $data['deskripsi'] = $request->deskripsi;
        $data['gambar'] = $image;
        

        laporan::where('laporan_id',$id)->update($data);
        return redirect()->route('laporan.view');
    }

    public function updateStatus(Request $request)
    {
        $laporan = Laporan::find($request->id);
        if ($laporan) {
            $laporan->status = $request->status;
            $laporan->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
    public function store_comment(Request $request)
    {
        $request->validate([
            'laporan_id' => 'required|exists:laporans,laporan_id',
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'laporan_id' => $request->laporan_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

}