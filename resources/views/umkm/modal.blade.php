@foreach($data as $b)
    <!-- Modal untuk Hapus -->
    <div class="modal fade" id="exampleModalHapus{{ $b->umkm_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin menghapus data? <b>{{ $b->Nama }}</b></div>
                <div class="modal-footer">
                    <form action="{{ route('umkm.delete', ['id' => $b->umkm_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Untuk Edit -->
    <div class="modal fade" id="exampleModalEdit{{ $b->umkm_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle{{ $b->umkm_id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalEditTitle{{ $b->umkm_id }}">Edit UMKM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('umkm.update', ['id' => $b->umkm_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Nama">Nama Peserta</label>
                            <input type="text" name="Nama" value="{{ old('Nama', $b->Nama) }}" class="form-control" placeholder="Masukkan Nama">
                            @error('Nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="umkm">Nama UMKM</label>
                            <textarea class="form-control" name="umkm" rows="3" placeholder="Masukkan Nama UMKM">{{ old('umkm', $b->umkm) }}</textarea>
                            @error('umkm')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            @error('gambar')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <small>Gambar saat ini: <img src="{{ asset('uploads/' . $b->gambar) }}" alt="gambar" width="50"></small>
                        </div>
                        <div class="form-group">
                            <label for="tipe_umkm">Tipe UMKM</label>
                            <textarea class="form-control" name="tipe_umkm" rows="3" placeholder="Masukkan Tipe UMKM">{{ old('tipe_umkm', $b->tipe_umkm) }}</textarea>
                            @error('tipe_umkm')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $b->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal untuk ikut -->
    <div class="modal fade" id="confirmationModal{{ $b->umkm_id }}" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel{{ $b->umkm_id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('participate') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel{{ $b->umkm_id }}">Konfirmasi Partisipasi</h5>
                        <input type="hidden" name="umkm_id" value="{{ $b->umkm_id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda bersedia untuk ikut?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>