
<!-- Modal untuk Hapus -->
<div class="modal fade" id="exampleModalHapus{{ $d->nik }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete data confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete the data? <b>{{ $d->nama_lengkap }}</b></div>
            <div class="modal-footer">
                <form action="{{ route('warga.delete',['id'=> $d->nik]) }}" method="POST">
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
<div class="modal fade" id="warga_tambah" tabindex="-1" role="dialog" aria-labelledby="warga_tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="warga_tambahTitle">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('warga.store') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">ID Number</label>
                <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ID Number">
                @error( 'nik' )
                    <small>{{ $message }}</small>
                @enderror
            </div>   
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family Card ID</label>
                <input type="form" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Family Card ID">
                @error( 'no_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>           
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="nama_lengkap" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
                @error( 'nama_lengkap' )
                    <small>{{ $message }}</small>
                @enderror
            </div>                

            <div class="row mb-3" style="margin-left: 10px; margin-right: 10px;">
                <div class="col">
                    <label for="exampleInputEmail1">Birthplace</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Birthplace">
                    @error( 'tempat_lahir' )
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="col">
                    <label for="exampleInputEmail1">Birth Date</label>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Birth Date">
                    @error( 'tanggal_lahir' )
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>            
                        
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control custom-select" name="jenis_kelamin" id="exampleFormControlSelect1">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                @error( 'jenis_kelamin' )
                    <small>{{ $message }}</small>
                @enderror
            </div>             
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                @error( 'alamat' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Religion</label>
                <select class="form-control custom-select" name="agama" id="exampleFormControlSelect1">
                    <option>Islam</option>
                    <option>Christian</option>
                    <option>Catholic</option>
                    <option>Hindu</option>
                    <option>Buddhist</option>
                    <option>Confucian</option>
                    <option>None</option>
                </select>
                @error( 'agama' )
                    <small>{{ $message }}</small>
                @enderror
            </div>     
                
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">No. Telephone</label>
                <input type="text" name="nomor_telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter No. Telephone">
                @error( 'nomor_telepon' )
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control custom-select" name="status" id="exampleFormControlSelect1">
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorce</option>
                    <option>Dead Divorce</option>
                </select>
                @error( 'status' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Job</label>
                <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job">
                @error( 'pekerjaan' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Nationality</label>
                <input type="text" name="kewarganegaraan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nationality">
                @error( 'kewarganegaraan' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Domicile</label>
                <input type="text" name="domisili" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Domicile">
                @error( 'domisili' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>

<!-- Modal Untuk Edit -->
<div class="modal fade" id="exampleModalEdit{{ $d->nik }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle{{ $d->nik }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEditTitle{{ $d->nik }}">Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('warga.update',['id'=> $d->nik]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">ID Number</label>
                <input type="text" name="nik" value="{{ $d->nik }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter ID Number">
                @error( 'nik' )
                    <small>{{ $message }}</small>
                @enderror
            </div>   
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family Card ID</label>
                <input type="form" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Family Card ID">
                @error( 'no_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>            
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="nama_lengkap" value="{{ $d->nama_lengkap }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
                @error( 'nama_lengkap' )
                    <small>{{ $message }}</small>
                @enderror
            </div>                

            <div class="row mb-3" style="margin-left: 10px; margin-right: 10px;">
                <div class="col">
                    <label for="exampleInputEmail1">Birthplace</label>
                    <input type="text" name="tempat_lahir" value="{{ $d->tempat_lahir }}" class="form-control" placeholder="Birthplace">
                    @error( 'tempat_lahir' )
                        <small>{{ $message }}</small>
                    @enderror
                </div>
                <div class="col">
                    <label for="exampleInputEmail1">Birth date</label>
                    <input type="date" name="tanggal_lahir" value="{{ $d->tanggal_lahir }}" class="form-control" placeholder="Birth date">
                    @error( 'tanggal_lahir' )
                        <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>            
                        
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Gender</label>
                <select class="form-control custom-select" name="jenis_kelamin" value="{{ $d->jenis_kelamin }}" id="exampleFormControlSelect1">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                @error( 'jenis_kelamin' )
                    <small>{{ $message }}</small>
                @enderror
            </div>             
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="alamat" value="{{ $d->alamat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
                @error( 'alamat' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Religion</label>
                <select class="form-control custom-select" name="agama" value="{{ $d->agama }}" id="exampleFormControlSelect1">
                    <option>Islam</option>
                    <option>Christian</option>
                    <option>Catholic</option>
                    <option>Hindu</option>
                    <option>Buddhist</option>
                    <option>Confucian</option>
                    <option>None</option>
                </select>
                @error( 'agama' )
                    <small>{{ $message }}</small>
                @enderror
            </div>     
                
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">No. Telephone</label>
                <input type="text" name="nomor_telepon" value="{{ $d->nomor_telepon }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter No. Telephone">
                @error( 'nomor_telepon' )
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control custom-select" name="status" value="{{ $d->status }}" id="exampleFormControlSelect1">
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorce</option>
                    <option>Dead Divorce</option>
                </select>
                @error( 'status' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Job</label>
                <input type="text" name="pekerjaan" value="{{ $d->pekerjaan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Job">
                @error( 'pekerjaan' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Nationality</label>
                <input type="text" name="kewarganegaraan" value="{{ $d->kewarganegaraan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nationality">
                @error( 'kewarganegaraan' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Domicile</label>
                <input type="text" name="domisili" value="{{ $d->domisili }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Domicile">
                @error( 'domisili' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>