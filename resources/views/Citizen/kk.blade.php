
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Manage Citizen Data</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('lime/theme/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('lime/theme/assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">
      
        <!-- Theme Styles -->
        <link href="{{ asset('lime/theme/assets/css/lime.min.css')}}" rel="stylesheet">
        <link href="{{ asset('lime/theme/assets/css/custom.css')}}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        @include('layouts.sidebar')
        
        @include('layouts.header')

    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-separator-1">
                                    <li class="breadcrumb-item"><a href="#">citizenship</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Family Card</li>
                                </ol>

                            </nav>
                            <h3>Family Card</h3>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl">
                                        <div class="card">
                                            <div class="card-body">
                                                @if ($errors->has('no_kk'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('no_kk') }}
                                                    </div>
                                                @endif

                                                @if(session()->has('success'))
                                                    <div class="alert alert-success outline-alert" role="alert">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                @if(session()->has('edit'))
                                                    <div class="alert alert-info outline-alert" role="alert">
                                                        {{ session('edit') }}
                                                    </div>
                                                @endif
                                                @if(session()->has('delete'))
                                                    <div class="alert alert-danger outline-alert" role="alert">
                                                        {{ session('delete') }}
                                                    </div>
                                                @endif
                                                
                                                <h4 class="mb-0">Family Card Data</h4>
                                                <p>belows are data of neighborhood 003</code>.</p>
                                                @error('no_kk')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('no_kk') }}</strong>
                                                    </span>
                                                @enderror

                                                <div class="text-right mb-3">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#kk_tambah">
                                                        Add Family Card
                                                    </button>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Number</th>
                                                                <th scope="col">Family Card Number</th>
                                                                <th scope="col">Address</th>
                                                                <th scope="col">Family Head ID</th>
                                                                <th scope="col">Number of Productivity Age</th>
                                                                <th scope="col">Family card Member</th>
                                                                <th scope="col">Number of Elderly</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data as $key => $d)
                                                                <tr>

                                                                    <th scope="row">{{ $data->firstItem() + $key }}</th>
                                                                    <td><button type="button" class="btn btn-link"
                                                                            data-toggle="modal"
                                                                            data-target="#householdModal_{{ $d->id_kk }}">{{ $d->no_kk }}</button>
                                                                    </td>
                                                                    <td>{{ $d->alamat }}</td>
                                                                    <td>{{ $d->nik_kepala_keluarga }}</td>
                                                                    <td>{{ $d->jumlah_usia_produktif }}</td>
                                                                    <td>{{ $d->jumlah_anggota_kk }}</td>
                                                                    <td>{{ $d->jumlah_usia_lanjut }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit{{ $d->id_kk }}"><i class="fas fa-pencil-alt"></i>
                                                                            
                                                                        </button>
                                                                        <button type="button" data-toggle="modal" data-target="#exampleModalHapus{{ $d->id_kk }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                                    </td>
                                                                </tr>

                                                                <!-- Modal -->
                                                                @include('Citizen.modal_kk',['id_kk' => $d->id_kk])

                                                                @endforeach
                                                                
                                                            </tbody>

                                                    </table>
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination justify-content-center">
                                                            {{-- Previous Page Link --}}
                                                            @if ($data->onFirstPage())
                                                                <li class="page-item disabled">
                                                                    <span class="page-link">&laquo;</span>
                                                                </li>
                                                            @else
                                                                <li class="page-item">
                                                                    <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                                                                        <span aria-hidden="true">&laquo;</span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                    
                                                            {{-- Pagination Elements --}}
                                                            @php
                                                                $start = max(1, $data->currentPage() - 2);
                                                                $end = min($start + 4, $data->lastPage());
                                                            @endphp
                                                    
                                                            @for ($i = $start; $i <= $end; $i++)
                                                                <li class="page-item {{ ($i == $data->currentPage()) ? 'active' : '' }}">
                                                                    <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                            @endfor
                                                    
                                                            {{-- Next Page Link --}}
                                                            @if ($data->hasMorePages())
                                                                <li class="page-item">
                                                                    <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                                                                        <span aria-hidden="true">&raquo;</span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="page-item disabled">
                                                                    <span class="page-link">&raquo;</span>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </nav>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    
            
        
        
        <!-- Javascripts -->
        <script src="{{ asset('lime/theme/assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/js/lime.min.js')}}"></script>
        <!-- Include jQuery and Bootstrap JS files -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
</html>