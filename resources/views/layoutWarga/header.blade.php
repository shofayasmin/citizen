<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('lime/theme/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('lime/theme/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">


<!-- Theme Styles -->
<link href="{{ asset('lime/theme/assets/css/lime.min.css') }}" rel="stylesheet">
<link href="{{ asset('lime/theme/assets/css/custom.css') }}" rel="stylesheet">

<div class="header w-100 p-3 d-flex justify-content-around sticky-top" style="background-color: white">
    <div class="title">
        <h1 style="color:cornflowerblue;">C-Hub</h1>
    </div>
    <div class="navbar d-flex ">
        <ul class="nav">
            <li class="nav-item">
                <a class="{{ Request::routeIs('DashboardWarga.index') ? 'active' : '' }} nav-link"
                    href="{{ route('DashboardWarga.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="{{ Request::routeIs('DashboardWarga.acara') ? 'active' : '' }} nav-link"
                    href="{{ route('DashboardWarga.acara') }}">Acara</a>
            </li>
            <li class="nav-item">
                <a class="{{ Request::routeIs('DashboardWarga.umkm') ? 'active' : '' }} nav-link"
                    href="{{ route('DashboardWarga.umkm') }}">UMKM</a>
            </li>
            <li class="nav-item">
                <a class="{{ Request::routeIs('DashboardWarga.bansos') ? 'active' : '' }} nav-link"
                    href="{{ route('DashboardWarga.bansos') }}">Bansos</a>
            </li>
            <li class="nav-item">
                <a class="{{ Request::routeIs('DashboardWarga.pelaporan') ? 'active' : '' }} nav-link"
                    href="{{ route('DashboardWarga.pelaporan') }}">Pelaporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</div>
