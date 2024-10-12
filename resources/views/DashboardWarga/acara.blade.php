<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('layoutWarga.header')

    {{-- <div class="container d-flex flex-wrap justify-content-between h-70 overflow-auto">

        @foreach ($acaras as $acara)
            <div class="card" style="width: 25rem;">
                <div class="image-container position-relative">
                    <span class="badge badge-primary position-absolute" style="top:0; right:0;">{{ $acara->tipe_acara }}</span>
                    <img class="card-img-top" src="https://picsum.photos/300/100" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $acara->judul }}</h5>
                    <p class="card-text overflow-hidden" style="height: 5rem;">{{ $acara->deskripsi }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach


        <div class="row">
            <div class="col-xl">
                <div class="container">
                    @foreach ($acaras as $d)
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('storage/photo-acara/' . $d->image) }}" class="card-img-top"
                                    alt="Placeholder" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $d->judul }}</h5>
                                    <p class="card-text">{{ $d->deskripsi }}</p>
                                    <a href="#" class="badge badge-primary" data-toggle="modal"
                                        data-target="#Read_More_{{ $d }}">Read More</a>
                                    <div class="text-right">
                                        <span class="badge badge-pill badge-info">{{ $d->tipe_acara }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div> --}}

    <div class="row mt-5">
        <div class="col-xl">
            <div class="container">
                @php $i = 0; @endphp
                @foreach ($acaras as $key => $d)
                    @if ($i % 3 == 0)
                        <div class="row row-cols-3">
                    @endif
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('storage/'.$d->image) }}" class="card-img-top"
                                alt="Placeholder" style="width: 100%; height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $d->judul }}</h5>
                                <p class="card-text">{{ $d->deskripsi }}</p>
                                <a href="#" class="badge badge-primary" data-toggle="modal"
                                    data-target="#Read_More_{{ $key }}">Read More</a>
                                <div class="text-right">
                                    <span class="badge badge-pill badge-info">{{ $d->tipe_acara }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($i % 3 == 2 || $loop->last)

            </div>
            @endif
            @php $i++; @endphp
            @include('layoutWarga.modal')
            @endforeach
        </div>
    </div>
    </div>
</body>
<!-- Javascripts -->
<script src="{{ asset('lime/theme/assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
<script src="{{ asset('lime/theme/assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('lime/theme/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lime/theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('lime/theme/assets/js/lime.min.js') }}"></script>

</html>
