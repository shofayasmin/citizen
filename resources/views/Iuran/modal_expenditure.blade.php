<!-- Modal untuk Hapus Expenditure -->
<div class="modal fade" id="exampleModalHapus{{ $expenditure->expenditure_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete data? <b>{{ $expenditure->expenditure_name }}</b>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('expenditure.delete',['id'=> $expenditure->expenditure_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="Submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Tambah Expenditure -->
<div class="modal fade" id="exampleModalTambahExpenditure" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Outcome Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah data expenditure -->
                <form action="{{ route('expenditure.store') }}" method="POST">
                    @csrf
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp">
                        @error( 'date' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="expenditure_name">Outcome Name</label>
                        <input type="text" class="form-control" id="expenditure_name" name="expenditure_name" aria-describedby="emailHelp" placeholder="Masukkan Nama Pengeluaran">
                        @error( 'expenditure_name' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="amount">Total</label>
                        <input type="number" class="form-control" id="amount" name="amount" aria-describedby="emailHelp" placeholder="Masukkan Nominal Pengeluaran">
                        @error( 'amount' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="description">Description</label>
                        <input class="form-control" id="description" name="description" rows="3"aria-describedby="emailHelp" placeholder="Masukkan Deskripsi"></input>
                        @error( 'description' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Expenditure -->
<div class="modal fade" id="exampleModalEdit{{ $expenditure->expenditure_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Outcome Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('expenditure.update',['id'=> $expenditure->expenditure_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date"  value="{{ $expenditure->date }}">
                        @error( 'date' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="expenditure_name">Outcome Name</label>
                        <input type="text" class="form-control" id="expenditure_name" name="expenditure_name" value="{{ $expenditure->expenditure_name }}">
                    </div>
                    <div class="form-group">
                        <label for="amount">Total</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $expenditure->amount }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $expenditure->description }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div
