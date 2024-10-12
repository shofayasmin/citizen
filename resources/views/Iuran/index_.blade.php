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
        <title>Manage Iuran Data</title>

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
                                    <li class="breadcrumb-item"><a href="#">Iuran</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">#</li>
                                    
                                </ol>
                                
                                </nav>
                                <h3>Iuran</h3>
                                
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
                                                    <h5 class="card-title">Iuran</h5>
                                                    <p>Berikut adalah Data Iuran dari RW 003</code>.</p>
                                                    <div class="text-right mb-3">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rumah_tambah">
                                                            Tambah Iuran
                                                        </button>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Tanggal</th>
                                                                    <th scope="col">Pemasukan</th>
                                                                    <th scope="col">Pengeluaran</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Deskripsi</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                                    
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>10/1/2024</td>
                                                                    <td>Rp. 10.000.000</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 8.000.000</td>
                                                                    <td>Iuran yang dibayarkan secara berkala untuk mendapatkan akses ke layanan kesehatan, seperti asuransi kesehatan atau program kesehatan pemerintah.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>10/2/2024</td>
                                                                    <td>Rp. 11.000.000</td>
                                                                    <td>Rp. 4.000.000</td>
                                                                    <td>Rp. 6.000.000</td>
                                                                    <td>Pembayaran rutin yang dilakukan oleh anggota organisasi atau klub untuk mendukung kegiatan dan operasi organisasi tersebut.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>10/3/2024</td>
                                                                    <td>Rp. 6.000.000</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 4.000.000</td>
                                                                    <td>Biaya yang harus dibayar oleh siswa atau orang tua mereka untuk mendapatkan akses ke pendidikan formal di institusi pendidikan.</td>
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
                                                                    <td>Biaya yang harus dibayarkan untuk memarkir kendaraan bermotor di area parkir tertentu, seperti di pusat perbelanjaan, bandara, atau tempat umum lainnya.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">6</th>
                                                                    <td>10/6/2024</td>
                                                                    <td>Rp. 5.000.000</td>
                                                                    <td>Rp. 4.500.000</td>
                                                                    <td>Rp. 500.000</td>
                                                                    <td>Biaya yang harus dibayar oleh anggota asosiasi atau badan profesi untuk mendukung kegiatan dan layanan yang disediakan oleh asosiasi tersebut.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td>10/7/2024</td>
                                                                    <td>Rp. 2.000.000</td>
                                                                    <td>Rp. 8.000.000</td>
                                                                    <td>Rp. -6.000.000</td>
                                                                    <td>Pembayaran bulanan atau tahunan yang harus dibayarkan oleh pemilik rumah atau apartemen di kompleks perumahan untuk biaya pemeliharaan dan penyediaan layanan komunal.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">8</th>
                                                                    <td>10/8/2024</td>
                                                                    <td>Rp. 5.000.000</td>
                                                                    <td>Rp. 20.000.000</td>
                                                                    <td>Rp. -15.000.000</td>
                                                                    <td>Biaya yang dibebankan oleh perusahaan kartu kredit kepada pemegang kartu sebagai bagian dari penggunaan kartu kredit mereka, seperti biaya tahunan atau bunga.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">9</th>
                                                                    <td>10/9/2024</td>
                                                                    <td>Rp. 10.000.000</td>
                                                                    <td>Rp. 3.000.000</td>
                                                                    <td>Rp. 7.000.000</td>
                                                                    <td>Pembayaran yang harus dibayar oleh anggota klub olahraga untuk mendapatkan akses ke fasilitas olahraga dan program kebugaran yang ditawarkan oleh klub tersebut.</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">10</th>
                                                                    <td>10/10/2024</td>
                                                                    <td>Rp. 50.000.000</td>
                                                                    <td>Rp. 15.000.000</td>
                                                                    <td>Rp. 35.000.000</td>
                                                                    <td>Pembayaran periodik yang dilakukan kepada perusahaan asuransi untuk mendapatkan perlindungan finansial terhadap risiko tertentu, seperti asuransi jiwa, asuransi kesehatan, atau asuransi properti.</td>
                                                                </tr>
                                                                

                                                                
                                                                
                                                                
                                                               
                                                            </tbody>
                                                            
                                                        </table>
                                                        <a href="{{ route('citizen.index') }}"> <- Kembali</a>
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