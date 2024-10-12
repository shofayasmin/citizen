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
        <title>Manage Data Pemasukan</title>

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
                                    <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">Keuangan</li>
                                    <li class="breadcrumb-item">Pemasukan</li>
                                </ol>
                                </nav>
                                <h3>Pemasukan</h3>
                            
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
                                                    <h5 class="card-title">Pemasukan</h5>
                                                    <p>Berikut adalah Data Pemasukan dari RW 003</code>.</p> 
                                                    <div class="text-right mb-3">
                                                        <form action="{{ route('iuran.income') }}" method="get" class="d-inline">
                                                            @csrf
                                                            <div class="row mb-3 justify-content-end">
                                                                <div class="col-sm-3">
                                                                    <label for="income_type" class="form-label">Tipe Pemasukan: </label>
                                                                    <select name="income_type" class="form-select form-select-sm" >
                                                                        <option value="">Semua</option>
                                                                        <option value="Iuran Warga" {{ isset($_GET['income_type']) && $_GET['income_type'] == 'Iuran Warga' ? 'selected' : '' }}>Iuran Warga</option>
                                                                        <option value="Sumbangan" {{ isset($_GET['income_type']) && $_GET['income_type'] == 'Sumbangan' ? 'selected' : '' }}>Sumbangan</option>
                                                                        <option value="Usaha RW" {{ isset($_GET['income_type']) && $_GET['income_type'] == 'Usaha RW' ? 'selected' : '' }}>Usaha RW</option>
                                                                        <option value="Bantuan Pemerintah" {{ isset($_GET['income_type']) && $_GET['income_type'] == 'Bantuan Pemerintah' ? 'selected' : '' }}>Bantuan Pemerintah</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="start_date" class="form-label">Rentang Tanggal Mulai: </label>
                                                                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="end_date" class="form-label">Rentang Tanggal Akhir: </label>
                                                                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                                                </div>
                                                                <div class="col-sm-2 d-flex align-items-end">
                                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <button type="button" class="btn btn-primary d-inline" data-toggle="modal" data-target="#exampleModalTambahIncome">
                                                            Tambah Data
                                                        </button>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Tanggal</th>
                                                                    <th scope="col">Nama Pemasukan</th>
                                                                    <th scope="col">Tipe Pemasukan</th>
                                                                    <th scope="col">Deskripsi</th>
                                                                    <th scope="col">Inflow</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $counter = 1   
                                                                @endphp
                                                                @foreach ($income as $key => $d)
                                                                <tr>
                                                                    <th scope="row">{{ $income->firstItem() + $key }}</th>
                                                                    <td>{{ $d->date }}</td>
                                                                    <td>{{ $d->income_name }}</td>
                                                                    <td>{{ $d->income_type }}</td>
                                                                    <td>{{ $d->description }}</td>
                                                                    <td>Rp. {{ $d->inflow }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEditIncome{{ $d->income_id }}">
                                                                            <i class="fas fa-pen"></i>
                                                                        </button>
                                                                        <button type="button" data-toggle="modal" data-target="#exampleModalHapusIncome{{ $d->income_id }}" class="btn btn-danger">
                                                                            <i class="fas fa-trash-alt"></i> 
                                                                        </button></td>
                                                                </tr>
                                                                <!-- Modal -->
                                                                @include('Iuran.modal_income', ['income' => $d])
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                {{-- Previous Page Link --}}
                                                                @if ($income->onFirstPage())
                                                                    <li class="page-item disabled">
                                                                        <span class="page-link">&laquo;</span>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $income->previousPageUrl() }}" aria-label="Previous">
                                                                            <span aria-hidden="true">&laquo;</span>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                        
                                                                {{-- Pagination Elements --}}
                                                                @php
                                                                    $start = max(1, $income->currentPage() - 2);
                                                                    $end = min($start + 4, $income->lastPage());
                                                                @endphp
                                                        
                                                                @for ($i = $start; $i <= $end; $i++)
                                                                    <li class="page-item {{ ($i == $income->currentPage()) ? 'active' : '' }}">
                                                                        <a class="page-link" href="{{ $income->url($i) }}">{{ $i }}</a>
                                                                    </li>
                                                                @endfor
                                                        
                                                                {{-- Next Page Link --}}
                                                                @if ($income->hasMorePages())
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $income->nextPageUrl() }}" aria-label="Next">
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
    </body>
</html>