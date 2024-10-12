<!-- Modal Hapus -->
<div class="modal fade" id="exampleModalHapus{{ $u->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">

                apakah anda yakin ingin menghapus data? <b>{{ $u->username }}</b> </div>
            <div class="modal-footer">
                <form action="{{ route('user.delete', ['id' => $u->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Untuk Tambah -->
<div class="modal fade" id="user_tambah" tabindex="-1" role="dialog" aria-labelledby="User_tambahTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="User_tambahTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="form" name="username" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Masukkan username">
                    @error('username')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                    <label for="exampleInputEmail1">Nama User</label>
                    <select name="user_nik" id="exampleInputEmail1" class="form-control">
                        @foreach ($warga as $w)
                            <option value="{{ $w->nik }}">{{ $w->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    @error('no_rt')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-row" style="margin-left: 10px; margin-right: 10px;">
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Jabatan</label>
                        <select name="role" id="exampleInputEmail1" class="form-control">
                            <option value="rt">RT</option>
                            <option value="rw">RW</option>
                            <option value="secretary">Sekretaris</option>
                            <option value="citizen">Warga</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="form" name="password" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Masukkan password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan User Baru</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Untuk Edit -->
<div class="modal fade" id="exampleModalEdit{{ $u->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalEditTitle{{ $u->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalEditTitle{{ $u->id }}">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.update', ['id' => $u->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="form" name="username" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $u->username }}">
                    @error('username')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="role">Jabatan</label>
                        <select name="role" id="role" class="form-control">
                            @foreach (['rt', 'rw', 'secretary', 'citizen'] as $roleOption)
                                <option value="{{ $roleOption }}" @if ($u->role == $roleOption) selected @endif>
                                    {{ ucfirst($roleOption) }}
                                </option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Masukkan password">
                    @error('password')
                        <small>{{ $message }}</small>
                    @enderror
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
