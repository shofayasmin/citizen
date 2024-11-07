<!-- Modal untuk Hapus Income -->
<div class="modal fade" id="exampleModalHapusIncome{{ $income->income_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete Data</h5>
                <<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete data?<b>{{ $income->income_name }}</b>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('income.delete', ['id' => $income->income_id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk tambah data income -->
                <form action="{{ route('income.store') }}" method="POST">
                    @csrf
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp">
                        @error( 'date' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="income_name">Income Name</label>
                        <input type="form" class="form-control" name="income_name" id="income_name" aria-describedby="emailHelp" placeholder="Enter The Income Name">
                        @error( 'income_name' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="income_type">Income Type</label>
                        <select class="form-control" id="income_type" name="income_type">
                            <option value="Citizens Fee">Citizen's Fee</option>
                            <option value="Dination">Dination</option>
                            <option value="Comunity Business">Comunity Business</option>
                            <option value="Goverment Support">Goverment Support</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="description">Description</label>
                        <input class="form-control" id="description" name="description" rows="3" aria-describedby="emailHelp" placeholder="Enter The Description">
                        @error( 'description' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                        <label for="inflow">Inflow</label>
                        <input type="number" class="form-control" name="inflow" id="inflow" aria-describedby="emailHelp" placeholder="Enter The Nominal Of The Income">
                        @error( 'inflow' )
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

<!-- Modal untuk Edit Income -->
<div class="modal fade" id="exampleModalEditIncome{{ $income->income_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Income Data</h5>
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
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date"  value="{{ $income->date }}">
                        @error( 'date' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="income_name">Income Name</label>
                        <input type="text" class="form-control" id="income_name" name="income_name" value="{{ $income->income_name }}">
                        @error( 'income_name' )
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="income_type">Income Type</label>
                        <select class="form-control" id="income_type" name="income_type">
                            <option value="Citizens Fee" {{ $income->income_type == "Citizens Fee" ? 'selected' : '' }}>Citizen's Fee</option>
                            <option value="Donation" {{ $income->income_type == "Donation" ? 'selected' : '' }}>Donation</option>
                            <option value="Community Business" {{ $income->income_type == "Community Business" ? 'selected' : '' }}>Community Business</option>
                            <option value="Goverment Support" {{ $income->income_type == "Goverment Support" ? 'selected' : '' }}>Goverment Support</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
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
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
