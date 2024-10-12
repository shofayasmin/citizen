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
        <div class="container mt-4">
            <div class="row">
                <div class="col-xl">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Promethee</h5>
                            <p>Ini adalah List Orang Orang yang berhak mendapatkan Bantuan Sosial</p>
                            <form action="{{ route('store.alternatives.results') }}" method="POST">
                                @csrf
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Kandidat</th>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Net Flow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($netFlow as $altId => $flow)
                                            <tr>
                                                @php
                                                    $nik = $alternatives->find($altId)->name;
                                                    $w = $warga->where('nik', $nik)->first();
                                                @endphp
                                                <td>{{ $counter }}</td>
                                                <td>{{ $w->nama_lengkap }}</td>
                                                <td>{{ $nik }}</td>
                                                <td>{{ $flow }}</td>
                                            </tr>
                                            <input type="hidden" name="data[{{ $counter }}][alternative_id]" value="{{ $altId }}">
                                            <input type="hidden" name="data[{{ $counter }}][net_flow]" value="{{ $flow }}">
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Store Table</button>
                            </form>
                            
                            
                              
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
        <script src="{{ asset('lime/theme/assets/plugins/chartjs/chart.min.js')}}"></script>
        <script src="{{ asset("lime/theme/assets/plugins/apexcharts/dist/apexcharts.min.js")}}"></script>
        <script src="{{ asset('lime/theme/assets/js/lime.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/js/pages/dashboard.js')}}"></script>
    </body>
</html>