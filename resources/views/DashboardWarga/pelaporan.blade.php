<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C-Hub</title>
</head>

<body>
    @include('layoutWarga.header')

    <div class="container mt-5">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">

                                        <form action="{{ route('laporan.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if (session()->has('success'))
                                                <div class="alert alert-success">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            <input type="hidden" name="pengirim"
                                                value="{{ auth()->user()->user_nik }}">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Judul Laporan</label>
                                                <input type="text" name="judul" class="form-control"
                                                    id="exampleFormControlInput1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Deskripsi Pengaduan</label>
                                                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group ml-4">
                                        <label for="image">Upload Gambar</label>
                                        <input type="file" class="form-control-file" id="image" name="gambar">
                                    </div>
                                    <button style="margin-left: 85%; margin-top:50px" name="gambar" type="submit"
                                        class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
