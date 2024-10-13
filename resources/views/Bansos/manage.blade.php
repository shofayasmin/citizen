
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
                                    <li class="breadcrumb-item"><a href="#">Bansos</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manage Social donation</li>
                                </ol>
                                </nav>
                                <h3>Manage Social Donation</h3>
                                
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
                                                    
                                                    <h4 class="mb-0">Social donation Data</h4>
                                                    <p>The following is social donation data of neighborhood 003</code>.</p>
                                                    <div class="text-right mb-3">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bansos_tambah">
                                                            Add social donation data
                                                        </button>
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Number</th>
                                                                    <th scope="col">Type of social donation</th>
                                                                    <th scope="col">Social donation periode</th>
                                                                    <th scope="col">Distribution date</th>
                                                                    <th scope="col">Recipient</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $counter = ($bansos->currentPage() - 1) * $bansos->perPage() + 1;
                                                                @endphp
                                                                @foreach ($bansos as $key => $b)
                                                                <tr>
                                                                    <td>{{ $counter++ }}</td>
                                                                    <td>{{ $b->jenis_bansos }}</td>
                                                                    <td>{{ $b->periode_bansos }} Hari</td>
                                                                    <td>{{ $b->tanggal_penyaluran }}</td>
                                                                    
                                                                    <td>
                                                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#detailModal{{ $key }}">Lihat Detail</button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                {{-- Previous Page Link --}}
                                                                @if ($bansos->onFirstPage())
                                                                    <li class="page-item disabled">
                                                                        <span class="page-link">&laquo;</span>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $bansos->previousPageUrl() }}" aria-label="Previous">
                                                                            <span aria-hidden="true">&laquo;</span>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                    
                                                                {{-- Pagination Elements --}}
                                                                @php
                                                                    $start = max(1, $bansos->currentPage() - 2);
                                                                    $end = min($start + 4, $bansos->lastPage());
                                                                @endphp
                                                    
                                                                @for ($i = $start; $i <= $end; $i++)
                                                                    <li class="page-item {{ ($i == $bansos->currentPage()) ? 'active' : '' }}">
                                                                        <a class="page-link" href="{{ $bansos->url($i) }}">{{ $i }}</a>
                                                                    </li>
                                                                @endfor
                                                    
                                                                {{-- Next Page Link --}}
                                                                @if ($bansos->hasMorePages())
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $bansos->nextPageUrl() }}" aria-label="Next">
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
                                                    
                                                    
                                                    @foreach ($bansos as $key => $b)
                                                    <!-- Modal for Each Row -->
                                                    <div class="modal fade" id="detailModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $key }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detailModalLabel{{ $key }}">social donation detail</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Type of social donation: {{ $b->jenis_bansos }}</p>
                                                                    <p>Social donation Periode: {{ $b->periode_bansos }} Hari</p>
                                                                    <p>Distribution date: {{ $b->tanggal_penyaluran }}</p>
                                                                    <p>Social donation recipient:</p>
                                                                    <ul>
                                                                        @php
                                                                            $rankCounter = 1;
                                                                        @endphp
                                                                        @foreach ($topCandidates as $candidateId)
                                                                            <li>{{ $alternatives->find($candidateId)->name }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <!-- Isi modal lainnya sesuai kebutuhan -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                    <!-- Modal Buat Tambah Data -->
                                                    <div class="modal fade" id="bansos_tambah">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    @csrf
                                                                    <div class="form-group mt-3" style="margin-left: 10px; margin-right: 10px;">
                                                                        <label for="exampleInputEmail1">Type of donation </label>
                                                                        <input type="form" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Jenis Bansos">
                                                                        @error( 'no_kk' )
                                                                            <small>{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                                                                        <label for="exampleInputEmail1">Social donation periode</label>
                                                                        <input type="form" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Periode Bansos">
                                                                        @error( 'no_kk' )
                                                                            <small>{{ $message }}</small>
                                                                        @enderror
                                                        
                                                                    
                                                                    <div class="form-group" style="margin-left: 10px; margin-right: 10px;">
                                                                        <label for="exampleInputEmail1">Distribution date</label>
                                                                        <input type="form" name="no_kk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Dalam bentuk tahun">
                                                                        @error( 'no_kk' )
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
    </body>
</html>