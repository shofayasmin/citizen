
<!-- Modal untuk Hapus -->
<div class="modal fade" id="exampleModalHapus{{ $d->rumah_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete data confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete the data? <b>{{ $d->nama_pemilik }}</b></div>
            <div class="modal-footer">
                <form action="{{ route('rumah.delete',['id'=> $d->rumah_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Untuk Tambah -->
<div class="modal fade" id="rumah_tambah" tabindex="-1" role="dialog" aria-labelledby="rumah_tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="rumah_tambahTitle">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('rumah.store') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Owner Name</label>
                <select name="nik_pemilik" id="exampleInputEmail1" class="form-control">
                    @foreach ($warga as $w)
                        <option value="{{ $w->nik }}">{{ $w->nama_lengkap }}</option>
                    @endforeach
                </select>
                @error( 'nama_pemilik' )
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Address</label>
                <input type="form" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jl.smerewing jos 123">
                @error( 'alamat' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Building Size</label>
                <input type="number" name="luas_bangunan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cukup masukkan Angka saja">
                @error( 'luas_bangunan' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Land Size</label>
                <input type="number" name="luas_tanah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cukup masukkan Angka saja">
                @error( 'luas_tanah' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Member of Family</label>
                <input type="number" name="jumlah_anggota_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan total">
                @error( 'jumlah_anggota_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal Untuk Edit -->
<div class="modal fade" id="exampleModalEdit{{ $d->rumah_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle{{ $d->rumah_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEditTitle{{ $d->rumah_id }}">Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('rumah.update',['id'=> $d->rumah_id]) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Owner Name</label>
                <input type="form" name="nama_pemilik" value="{{ $d->nama_pemilik }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Pemilik">
                @error( 'nama_pemilik' )
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1"><Address></Address></label>
                <input type="form" name="alamat" value="{{ $d->alamat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jl.smerewing jos 123">
                @error( 'alamat' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Building Size</label>
                <input type="form" name="luas_bangunan" value="{{ $d->luas_bangunan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cukup masukkan Angka saja">
                @error( 'luas_bangunan' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Land Size</label>
                <input type="form" name="luas_tanah" value="{{ $d->luas_tanah }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cukup masukkan Angka saja">
                @error( 'luas_tanah' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Number of Family Member</label>
                <input type="form" name="jumlah_anggota_kk" value="{{ $d->jumlah_anggota_kk }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan total">
                @error( 'jumlah_anggota_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Change</button>
            </div>
        </form>
    </div>
    </div>
</div>