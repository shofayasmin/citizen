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
        <title>Dashboard</title>

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
        
        <!-- SideBar -->
        @include('layouts.sidebar')
        
        
        <!-- Header -->
        @include('layouts.header')

        <!-- Content -->
        <div class="row">
            <div class="col-xl">
                <div class="container">
                    
                    
            
                        <div class="row row-cols-3">
                        
                            <div class="col">

                                @foreach ($data as $d)
                                <div class="card">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="\storage\photo-acara\Presiden Jokowi Luncurkan Penyaluran Cadangan Beras Pemerintah untuk Bantuan Pangan.jpeg" class="card-img-top" style="width: auto; max-height: 400px;">
                                    </div>                                  
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $d->judul }}</h5>
                                        <p class="card-text">Jenis Bansos: {{ $d->jenis_bansos }}</p>
                                        <p class="card-text">Periode Bansos: {{ $d->periode_bansos }} Hari</p>
                                        <p class="card-text">Jumlah Bansos: {{ $d->jumlah_bansos }}</p>
                                        <p class="card-text">Tanggal penyaluran: {{ $d->tanggal_penyaluran }}</p>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            
                            </div>
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
        
        
        
        <!-- Javascripts -->
        <script src="{{ asset('lime/theme/assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/chartjs/chart.min.js')}}"></script>
        <script src="{{ asset("lime/theme/assets/plugins/apexcharts/dist/apexcharts.min.js")}}"></script>
        <script src="{{ asset('lime/theme/assets/js/lime.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/js/pages/dashboard.js')}}"></script>
    </body>
</html>