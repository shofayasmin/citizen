<!-- Modal untuk Hapus Income -->
<div class="modal fade" id="exampleModalHapusIncome{{ $income->income_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data <b>{{ $income->income_name }}</b>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('income.delete', ['id' => $income->income_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Tambah Income -->
<div class="modal fade" id="exampleModalTambahIncome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah data income -->
                <form action="{{ route('income.store') }}" method="POST">
                    @csrf
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp">
                        @error( 'date' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="income_name">Nama Pemasukan</label>
                        <input type="form" class="form-control" name="income_name" id="income_name" aria-describedby="emailHelp" placeholder="Masukkan Nama Pemasukan">
                        @error( 'income_name' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="income_type">Tipe Pemasukan</label>
                        <select class="form-control" id="income_type" name="income_type">
                            <option value="Iuran Warga">Iuran Warga</option>
                            <option value="Sumbangan">Sumbangan</option>
                            <option value="Usaha RW">Usaha RW</option>
                            <option value="Bantuan Pemerintah">Bantuan Pemerintah</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="description">Deskripsi</label>
                        <input class="form-control" id="description" name="description" rows="3" aria-describedby="emailHelp" placeholder="Masukkan Deskripsi">
                        @error( 'description' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="inflow">Inflow</label>
                        <input type="number" class="form-control" name="inflow" id="inflow" aria-describedby="emailHelp" placeholder="Masukkan Nominal Pemasukan">
                        @error( 'inflow' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Edit Income -->
<div class="modal fade" id="exampleModalEditIncome{{ $income->income_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Pemasukan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk edit data income -->
                <form action="{{ route('income.update', ['id' => $income->income_id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date"  value="{{ $income->date }}">
                        @error( 'date' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="income_name">Nama Pemasukan</label>
                        <input type="text" class="form-control" id="income_name" name="income_name" value="{{ $income->income_name }}">
                        @error( 'income_name' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="income_type">Tipe Pemasukan</label>
                        <select class="form-control" id="income_type" name="income_type">
                            <option value="Iuran Warga" {{ $income->income_type == "Iuran Warga" ? 'selected' : '' }}>Iuran Warga</option>
                            <option value="Sumbangan" {{ $income->income_type == "Sumbangan" ? 'selected' : '' }}>Sumbangan</option>
                            <option value="Usaha RW" {{ $income->income_type == "Usaha RW" ? 'selected' : '' }}>Usaha RW</option>
                            <option value="Bantuan Pemerintah" {{ $income->income_type == "Bantuan Pemerintah" ? 'selected' : '' }}>Bantuan Pemerintah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $income->description }}</textarea>
                        @error( 'description' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inflow">Inflow</label>
                        <input type="number" class="form-control" id="inflow" name="inflow" value="{{ $income->inflow }}">
                        @error( 'inflow' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
