
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
        <link href="{{ asset('lime/theme/assets/plugins/font-awesome/css/track.css')}}" rel="stylesheet">

        <link href="{{ asset('lime/theme/assets/plugins/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css')}}" rel="stylesheet">  

      
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

        <div class="timeline">
            <div class="container-track left-container">
                <img src="{{ asset('storage/photo-acara/counter1.png') }}" alt="">
                <div class="text-box-track">
                    <h2>Alphabet Inc.</h2>
                    <small>2018-2020</small>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est animi, eligendi debitis iusto eos repellat maiores at aliquam ut inventore, corrupti corporis sint beatae cupiditate facilis labore officiis architecto vitae.</p>
                    <span class="left-container-arrow"></span>
                </div>
            </div>
            <div class="container-track right-container">
                <img src="{{ asset('storage/photo-acara/counter2.png') }}" alt="">
                <div class="text-box-track">
                    <h2>Amazon Inc.</h2>
                    <small>2019-2020</small>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est animi, eligendi debitis iusto eos repellat maiores at aliquam ut inventore, corrupti corporis sint beatae cupiditate facilis labore officiis architecto vitae.</p>
                    <span class="right-container-arrow"></span>
                </div>
            </div>
            <div class="container-track left-container">
                <img src="{{ asset('storage/photo-acara/counter3.png') }}" alt="">
                <div class="text-box-track">
                    <h2>Tesla Inc.</h2>
                    <small>2020-2021</small>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est animi, eligendi debitis iusto eos repellat maiores at aliquam ut inventore, corrupti corporis sint beatae cupiditate facilis labore officiis architecto vitae.</p>
                    <span class="left-container-arrow"></span>
                </div>
            </div>
            <div class="container-track right-container">
                <img src="{{ asset('storage/photo-acara/counter4.png') }}" alt="">
                <div class="text-box-track">
                    <h2>Toyota Inc.</h2>
                    <small>2019-2020</small>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est animi, eligendi debitis iusto eos repellat maiores at aliquam ut inventore, corrupti corporis sint beatae cupiditate facilis labore officiis architecto vitae.</p>
                    <span class="right-container-arrow"></span>
                </div>
            </div>
        </div>


       

                    
            
        
        
        <!-- Javascripts -->
        <script src="{{ asset('lime/theme/assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/js/lime.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/plupload/js/plupload.full.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/js/pages/plupload.js')}}"></script>
    </body>
</html>