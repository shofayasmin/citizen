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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('lime/theme/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lime/theme/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{ asset('lime/theme/assets/css/lime.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lime/theme/assets/css/custom.css') }}" rel="stylesheet">

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
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>

                                </ol>

                            </nav>
                            <h3>Akun User</h3>

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
                                                <h5 class="card-title">Data User</h5>
                                                <p>Berikut adalah Data Data User dari RW 003</code>.</p>
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                @if ($errors->any())
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <div class="text-right mb-3">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#user_tambah">
                                                        Tambah User
                                                    </button>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>

                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">Username</th>
                                                                <th scope="col">Nama Lengkap</th>
                                                                <th scope="col">NIK</th>
                                                                <th scope="col">Role</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($users as $u)
                                                                <tr>
                                                                    <th scope="row">{{ $u->id }}</th>
                                                                    <td>{{ $u->username }}</td>
                                                                    <td>{{ $u->warga->nama_lengkap }}</td>
                                                                    <td>{{ $u->user_nik }}</td>
                                                                    <td>{{ $u->role }}</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalEdit{{ $u->id }}">
                                                                            Edit
                                                                        </button>
                                                                        <span data-toggle="modal"
                                                                            data-target="#exampleModalHapus{{ $u->id }}"
                                                                            class="btn btn-danger"><i
                                                                                class="fas fa-trash-alt"> Hapus</i></span>
                                                                    </td>
                                                                </tr>


                                                                <!-- Modal -->
                                                                @include('User.modal')
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="d-flex justify-content-center mt-4">
                                                    {{ $users->links() }}
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
                <script src="{{ asset('lime/theme/assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
                <script src="{{ asset('lime/theme/assets/plugins/bootstrap/popper.min.js') }}"></script>
                <script src="{{ asset('lime/theme/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
                <script src="{{ asset('lime/theme/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
                <script src="{{ asset('lime/theme/assets/js/lime.min.js') }}"></script>
</body>

</html>
