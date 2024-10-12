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
        <title>Manage Data Pengeluaran</title>

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
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">Finance</li>
                                    <li class="breadcrumb-item active" aria-current="page">Outcome</li>
                                </ol>
                                </nav>
                                <h3>Outcome</h3>
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
                                                    <h5 class="card-title">Outcome</h5>
                                                    <p>The following is the Expenditure Data</code>.</p>
                                                    <div class="text-right mb-3">
                                                        <form action="{{ route('iuran.expenditure') }}" method="get" class="d-inline">
                                                            @csrf
                                                            <div class="row mb-3 justify-content-end">
                                                                <div class="col-sm-3">
                                                                    <label for="start_date" class="form-label">Start Date Range: </label>
                                                                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="end_date" class="form-label">End Date Range: </label>
                                                                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                                                </div>
                                                                <div class="col-sm-2 d-flex align-items-end">
                                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalTambahExpenditure">
                                                            Add Data 
                                                        </button>
                                                    </div>
                                                    <div class="table-responsive">
                                                    <table class="table"> 
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Outcome Name</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Description</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $counter = 1   
                                                                @endphp
                                                                @foreach ($expenditure as $key => $d)
                                                                <tr>
                                                                    <th scope="row">{{ $expenditure->firstItem() + $key }}</th>
                                                                    <td>{{ $d->date }}</td>
                                                                    <td>{{ $d->expenditure_name }}</td>
                                                                    <td>Rp. {{ $d->amount }}</td>
                                                                    <td>{{ $d->description }}</td>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit{{ $d->expenditure_id }}">
                                                                            <i class="fas fa-pen"></i> Edit
                                                                        </button>
                                                                        <button type="button" data-toggle="modal" data-target="#exampleModalHapus{{ $d->expenditure_id }}" class="btn btn-danger">
                                                                            <i class="fas fa-trash-alt"></i> Delete
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                                @include('Iuran.modal_expenditure', ['expenditure' => $d])

                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <nav aria-label="Page navigation example">
                                                            <ul class="pagination justify-content-center">
                                                                {{-- Previous Page Link --}}
                                                                @if ($expenditure->onFirstPage())
                                                                    <li class="page-item disabled">
                                                                        <span class="page-link">&laquo;</span>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $expenditure->previousPageUrl() }}" aria-label="Previous">
                                                                            <span aria-hidden="true">&laquo;</span>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                    </li>
                                                                @endif
                                                        
                                                                {{-- Pagination Elements --}}
                                                                @php
                                                                    $start = max(1, $expenditure->currentPage() - 2);
                                                                    $end = min($start + 4, $expenditure->lastPage());
                                                                @endphp
                                                        
                                                                @for ($i = $start; $i <= $end; $i++)
                                                                    <li class="page-item {{ ($i == $expenditure->currentPage()) ? 'active' : '' }}">
                                                                        <a class="page-link" href="{{ $expenditure->url($i) }}">{{ $i }}</a>
                                                                    </li>
                                                                @endfor
                                                        
                                                                {{-- Next Page Link --}}
                                                                @if ($expenditure->hasMorePages())
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $expenditure->nextPageUrl() }}" aria-label="Next">
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