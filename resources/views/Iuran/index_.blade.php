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
        <title>Manage Comunity Contribution Data</title>

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
                                    <li class="breadcrumb-item"><a href="#">Comunity Contribution</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">#</li>
                                    
                                </ol>
                                
                                </nav>
                                <h3></h3>
                                
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
                                                    <h5 class="card-title">Comunity Contribution</h5>
                                                    <p>The following is the comunity contribution data</code>.</p>
                                                    <div class="text-right mb-3">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rumah_tambah">
                                                            Add Contributions
                                                        </button>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Income</th>
                                                                    <th scope="col">Outcome</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Description</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                    
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>10/1/2024</td>
                                                                    <td>Rp. 10.000.000</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 8.000.000</td>
                                                                    <td>Contributions paid periodically to gain access to health services, such as health insurance or government health programs.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>10/2/2024</td>
                                                                    <td>Rp. 11.000.000</td>
                                                                    <td>Rp. 4.000.000</td>
                                                                    <td>Rp. 6.000.000</td>
                                                                    <td>PRegular payments made by members of an organization or club to support the activities and operations of that organization.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>10/3/2024</td>
                                                                    <td>Rp. 6.000.000</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 4.000.000</td>
                                                                    <td>The fees that students or their parents have to pay to gain access to formal education in educational institutions.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>10/4/2024</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 500.000</td>
                                                                    <td>Rp. 1.500.000</td>
                                                                    <td>Pembayaran bulanan atau tahunan yang harus dibayar oleh anggota klub, gym, atau fasilitas rekreasi lainnya untuk menggunakan fasilitas dan layanan yang ditawarkan.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td>10/5/2024</td>
                                                                    <td>Rp. 20.000.000</td>
                                                                    <td>Rp. 5.000.000</td>
                                                                    <td>Rp. 15.000.000</td>
                                                                    <td>A fee payable for parking a motor vehicle in a specific parking area, such as at a shopping center, airport, or other public place.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">6</th>
                                                                    <td>10/6/2024</td>
                                                                    <td>Rp. 5.000.000</td>
                                                                    <td>Rp. 4.500.000</td>
                                                                    <td>Rp. 500.000</td>
                                                                    <td>Fees payable by members of an association or professional body to support the activities and services provided by the association.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td>10/7/2024</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 8.000.000</td>
                                                                    <td>Rp. -6.000.000</td>
                                                                    <td>A monthly or annual payment payable by the owner of a house or apartment in a housing complex for the cost of maintaining and providing communal services.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">8</th>
                                                                    <td>10/8/2024</td>
                                                                    <td>Rp. 5.000.000</td>
                                                                    <td>Rp. 20.000.000</td>
                                                                    <td>Rp. -15.000.000</td>
                                                                    <td>Fees charged by credit card companies to cardholders as part of their credit card usage, such as annual fees or interest.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">9</th>
                                                                    <td>10/9/2024</td>
                                                                    <td>Rp. 10.000.000</td>
                                                                    <td>Rp. 3.000.000</td>
                                                                    <td>Rp. 7.000.000</td>
                                                                    <td>A payment that members of a sports club must pay to gain access to the sports facilities and fitness programs offered by the club.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">10</th>
                                                                    <td>10/10/2024</td>
                                                                    <td>Rp. 50.000.000</td>
                                                                    <td>Rp. 15.000.000</td>
                                                                    <td>Rp. 35.000.000</td>
                                                                    <td>Periodic payments made to an insurance company to obtain financial protection against certain risks, such as life insurance, health insurance, or property insurance.</td>
                                                                </tr>
                                                                

                                                                
                                                                
                                                                
                                                               
                                                            </tbody>
                                                            
                                                        </table>
                                                        <a href="{{ route('citizen.index') }}"> <- Back</a>
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