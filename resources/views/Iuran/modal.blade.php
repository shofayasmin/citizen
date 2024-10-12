
<!-- Modal untuk Hapus -->
<div class="modal fade" id="exampleModalHapus{{ $b->contribution_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">

                apakah anda yakin ingin menghapus data? <b>{{ $b->contribution_name }}</b></div>
            <div class="modal-footer">
                <form action="{{ route('iuran.delete',['id'=> $b->contribution_id]) }}" method="POST">
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
<div class="modal fade" id="bayar_tambah" tabindex="-1" role="dialog" aria-labelledby="bayar_tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="bayar_tambahTitle">Bayar Mingguan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('iuran.store') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Nama</label>
                <input type="form" name="contribution_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'contribution_name' )
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Payment Status</label>
                <input type="form" name="payment_status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jl.smerewing jos 123">
                @error( 'payment_status' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Jumlah</label>
                <input type="form" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'amount' )
                    <small>{{ $message }}</small>
                @enderror
            </div>      

            
                                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal Untuk Edit -->
<div class="modal fade" id="exampleModalEdit{{ $b->contribution_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle{{ $b->contribution_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEditTitle{{ $b->contribution_id }}">Edit Acara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('iuran.update',['id'=> $b->contribution_id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Nama</label>
                <input type="form" value="{{ $b->contribution_name }}" name="contribution_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'contribution_name' )
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Payment Status</label>
                <input type="form" value="{{ $b->payment_status }}" name="payment_status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jl.smerewing jos 123">
                @error( 'payment_status' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Jumlah</label>
                <input type="form" value="{{ $b->amount }}" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'amount' )
                    <small>{{ $message }}</small>
                @enderror
            </div>                   
            
                                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>