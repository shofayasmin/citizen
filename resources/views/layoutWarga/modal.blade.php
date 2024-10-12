
<!-- Modal untuk Hapus -->
<div class="modal fade" id="exampleModalHapus{{ $d->id_acara }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">apakah anda yakin ingin menghapus data? <b>{{ $d->judul }}</b></div>
            <div class="modal-footer">
                <form action="{{ route('acara.delete',['id'=> $d->id_acara]) }}" method="POST">
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
<div class="modal fade" id="exampleModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalTambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalTambahTitle">Tambah Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('acara.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="form-group">
            <label for="judul">Judul Acara</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Acara">
            </div>
            <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Acara"></textarea>
            </div>
            <div class="form-group">
            <label for="tipe_acara">Tipe Acara</label>
            <select class="form-control" id="tipe_acara" name="tipe_acara">
                <option value="Kegiatan">Kegiatan</option>
                <option value="Informasi">Informasi</option>
            </select>
            </div>
            <div class="form-group">
            <label for="image">Gambar Acara</label>
            <input type="file" class="form-control-file" id="image" name="image">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal Untuk Edit -->
<div class="modal fade" id="exampleModalEdit{{ $d->id_acara }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle{{ $d->id_acara }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEditTitle{{ $d->id_acara }}">Edit Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('acara.update',['id'=> $d->id_acara]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Judul Acara</label>
                <input type="form" name="judul" value="{{ $d->judul }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Judul">
                
                @error('judul')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $d->deskripsi) }}</textarea>
            </div>

            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleFormControlSelect1">Tipe Acara</label>
                <select class="form-control custom-select" name="tipe_acara" value="{{ $d->tipe_acara }}" id="exampleFormControlSelect1">
                    <option>Kegiatan</option>
                    <option>Informasi</option>
                </select>
                @error('tipe_acara')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3" style="margin-left: 10px; margin-right: 10px;">
                <label for="image" class="form-label">Post Image</label>
                <input type="file" class="form-control" id="image" class="image" name="image" >
                
            </div>
                                
            <div class="modal-footer" style="margin-left: 10px; margin-right: 10px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>


<!-- Modal Untuk Ikuti Kegiatan -->
@foreach($acaras as $key => $d)
    <div class="modal fade" id="Read_More_{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="Read_MoreTitle_{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Read_MoreTitle_{{ $key }}">{{ $d->judul }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb-4">
                    <p>{{ $d->deskripsi }}</p>
                    @if($d->tipe_acara != 'Informasi')
                        <form action="{{ route('acara.ikuti', $d->id_acara) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">Ikut Kegiatan</button>
                            <button type="button" class="btn btn-link show-participants-btn" data-toggle="modal" data-target="#participantsModal_{{ $d->id_acara }}">Show Participants</button>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    
    {{-- <!-- Include participants modal -->
    @include('partials.participants_modal', ['acara' => $d]) --}}
@endforeach



<script>
    $(document).ready(function(){
        $('.Read_More').on('click', function(){
            var modalId = $(this).data('target');
            $(modalId).modal('show');
        });
    });
</script>

<!-- Modal for each event -->
@foreach($acaras as $d)
    <!-- Your existing modal for showing event details -->
    <div class="modal fade" id="Read_More_{{ $d->id_acara }}" tabindex="-1" role="dialog" aria-labelledby="Read_MoreTitle_{{ $d->id_acara }}" aria-hidden="true">
        <!-- Modal content for showing event details -->
    </div>
    
    <!-- Modal for showing participants -->
    <div class="modal fade" id="participantsModal_{{ $d->id_acara }}" tabindex="-1" role="dialog" aria-labelledby="participantsModalLabel_{{ $d->id_acara }}" aria-hidden="true">
        <!-- Modal content for showing participants -->
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="participantsModalLabel_{{ $d->id_acara }}">Participants for {{ $d->judul }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display participants here -->
                    @if($d->participants->isEmpty())
                        <p>No participants yet.</p>
                    @else
                        <ul class="list-group">
                            @foreach($d->participants as $participant)
                                <li class="list-group-item">{{ $participant->username }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach


