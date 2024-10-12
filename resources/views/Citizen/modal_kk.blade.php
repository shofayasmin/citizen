
<!-- Modal untuk Hapus -->
<div class="modal fade" id="exampleModalHapus{{ $d->id_kk }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> data confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">

                Are you sure? <b>{{ $d->no_kk }}</b>                                                                         </div>
            <div class="modal-footer">
                <form action="{{ route('kk.delete',['id'=> $d->id_kk]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Confirmation</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Untuk Tambah -->
<div class="modal fade" id="kk_tambah" tabindex="-1" role="dialog" aria-labelledby="kk_tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="kk_tambahTitle">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('kk.store') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family Card ID</label>
                <input type="number" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'no_kk' )
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
                <label for="exampleInputEmail1">Family Head ID</label>
                <select name="nik_kepala_keluarga" id="exampleInputEmail1" class="form-control">
                    @foreach ($warga as $w)
                        <option value="{{ $w->nik }}">{{ $w->nik }}</option>
                    @endforeach
                </select>
                @error( 'nik_kepala_keluarga' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Number of Productive age</label>
                <input type="number" name="jumlah_usia_produktif" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan total">
                @error( 'jumlah_usia_produktif' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family Card members</label>
                <input type="number" name="jumlah_anggota_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan total">
                @error( 'jumlah_anggota_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Number of Elderly</label>
                <input type="number" name="jumlah_usia_lanjut" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan total">
                @error( 'jumlah_usia_lanjut' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            
                                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- Modal Untuk Edit -->
<div class="modal fade" id="exampleModalEdit{{ $d->id_kk }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditTitle{{ $d->id_kk }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalEditTitle{{ $d->id_kk }}">Edit Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('kk.update',['id'=> $d->id_kk]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family Card ID</label>
                <input type="form" name="no_kk" value="{{ $d->no_kk }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'no_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Address</label>
                <input type="form" name="alamat" value="{{ $d->alamat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="jl.smerewing jos 123">
                @error( 'alamat' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family head ID</label>
                <input type="form" name="nik_kepala_keluarga" value="{{ $d->nik_kepala_keluarga }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="12345678912345">
                @error( 'nik_kepala_keluarga' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Number of productivity age</label>
                <input type="form" name="jumlah_usia_produktif" value="{{ $d->jumlah_usia_produktif }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan total">
                @error( 'jumlah_usia_produktif' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Family Card Member</label>
                <input type="form" name="jumlah_anggota_kk" value="{{ $d->jumlah_anggota_kk }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan total">
                @error( 'jumlah_anggota_kk' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                <label for="exampleInputEmail1">Number of elderly</label>
                <input type="form" name="jumlah_usia_lanjut" value="{{ $d->jumlah_usia_lanjut }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan total">
                @error( 'jumlah_usia_lanjut' )
                    <small>{{ $message }}</small>
                @enderror
            </div>               
            
                                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>
</div>

<!-- resources/views/Citizen/modal_kk.blade.php -->

<div class="modal fade" id="householdModal_{{ $id_kk }}" tabindex="-1" role="dialog" aria-labelledby="householdModalLabel_{{ $id_kk }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="householdModalLabel_{{ $id_kk }}">Household Members</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="householdModalBody_{{ $id_kk }}"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showHouseholdMembers(no_kk, id_kk) {
        const modalBody = document.getElementById(`householdModalBody_${id_kk}`);
        modalBody.innerHTML = ''; // Clear previous list

        fetch(`/citizen/members/${no_kk}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(member => {
                    const listItem = document.createElement('li');
                    listItem.textContent = member.nama_lengkap; // Assuming member has a 'nama_lengkap' property
                    modalBody.appendChild(listItem);
                });
            });
        }
</script>
