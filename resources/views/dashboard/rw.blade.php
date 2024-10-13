
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
        <style>
            .popular-product-list {
                margin-top: 20px;
            }
            .badge {
                float: right;
            }
            .card-title {
                text-align: center;
            }
        </style>

        

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

                        <div class="col-md">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="dashboard-info row">
                                        <div class="info-text col-md-6">
                                            {{-- step ini bisa dipanggil dengan database --}}
                                            <h5 class="card-title">Welcome back {{ $user->username }}</h5> 
                                            <p>Get to know more about the Dashboard. Here are some ways to get started.</p>
                                            <ul>
                                                <li>Check some stats for your website bellow</li>
                                                <li>Sync content to other devices</li>
                                                <li>You now have access to File Manager app.</li>
                                            </ul>
                                        </div>
                                        <div class="info-image col-md-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        @canany(['rw', 'rt', 'sekretaris'])
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">House</h5>
                                    <h2 class="float-right">{{ $totalRumah }}</h2>
                                    <p>total of house</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">KK</h5>
                                    <h2 class="float-right">{{ $totalKk }}</h2>
                                    <p>Number of family cards</p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Citizen</h5>
                                    <h2 class="float-right">{{ $totalWarga }}</h2>
                                    <p>Total Citizens</p>
                                    
                                </div>
                            </div>
                        </div>
                        @endcanany

                        @can('citizen')
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Event</h5>
                                    <h2 class="float-right">{{ $totalAcara }}</h2>
                                    <a class="btn btn-link" href="{{ route('acara.view') }}">Total Events</a >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Social Donation</h5>
                                    <h2 class="float-right">{{ $totalBansos }}</h2>
                                    <a class="btn btn-link" href="{{ route('bansos.informasi') }}">Total Social Donations</a >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Report</h5>
                                    <h2 class="float-right">{{ $totalLaporan }}</h2>
                                    <a class="btn btn-link" href="{{ route('laporan.view') }}">Total Reports</a >
                                </div>
                            </div>
                        </div>
                        @endcan

                        <div class="col-md-3">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">MSME</h5>
                                    <h2 class="float-right">{{ $totalUmkm }}</h2>
                                    <a class="btn btn-link" href="{{ route('umkm.view') }}">Total MSMEs</a >
                                </div>
                            </div>
                        </div>
                    </div>

                    @canany(['rw', 'rt', 'sekretaris'])
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">List Report</h5>
                                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                        <table class="table table-bordered table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Report Issue</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $counter = 1; @endphp
                                                @foreach ($laporan as $l)
                                                <tr>
                                                    <td>{{ $counter++ }}</td>
                                                    <td>{{ $l->judul }}</td>
                                                    <td>
                                                        @if($l->status == 'Selesai')
                                                        <span class="badge badge-success">{{ $l->status }}</span>
                                                        @elseif($l->status == 'Not Yet Finished')
                                                        <a href="{{ route('laporan.view') }}" class="badge badge-danger">{{ $l->status }}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">List Submitter</h5>
                                    <div class="social-media-list" style="max-height: 300px; overflow-y: auto;">
                                        @foreach ($pelapor as $p)
                                        <div class="social-media-item">
                                            <img src="\storage\photo-acara\orang.png" alt="" width="10%">
                                            <div class="social-text">
                                                <p>{{ $p->pengirim }}</p>
                                                <span>{{ $p->total_laporan }}x</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    @endcanany

                    <div class="row">
                        <div class="col-md-12">
                            <div id="update-alert" class="alert alert-warning m-b-lg" role="alert">
                                Data has been updated just now.
                            </div>
                        </div>
                    </div>

                    @canany(['rw', 'rt', 'sekretaris'])
                    <div class="row">
                        {{-- <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Doughnut Chart</h5>
                                                <canvas id="chartjs4">Your browser does not support the canvas element.</canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Financial Chart</h5>
                                    <div id="apex10"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Working and Non-working Age</h5>
                                        <div class="popular-products">
                                            <canvas id="statusUsiaChart">Your browser does not support the canvas element.</canvas>
                                            <div class="popular-product-list">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <span>Working Productive Age</span>
                                                        <span class="badge badge-success">{{ number_format(($pie['kerja_produktif']/$total_warga)*100, 2) }}%</span>
                                                    </li>
                                                    <li>
                                                        <span>Non-Productive Working Age</span>
                                                        <span class="badge badge-warning">{{ number_format(($pie['kerja_non_produktif']/$total_warga)*100, 2) }}%</span>
                                                    </li>
                                                    <li>
                                                        <span>Productive Age Not Working</span>
                                                        <span class="badge badge-secondary">{{ number_format(($pie['non_kerja_produktif']/$total_warga)*100, 2) }}%</span>
                                                    </li>
                                                    <li>
                                                        <span>Non-Productive Age Not Working</span>
                                                        <span class="badge badge-primary">{{ number_format(($pie['non_kerja_non_produktif']/$total_warga)*100, 2) }}%</span>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Social Donation</h5>
                                    <div id="apex70"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcanany
                </div>
            </div>
            <div class="lime-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">2024 © Power Puff Girl</span>
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
        <script src="{{ asset('lime/theme/assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('lime/theme/assets/plugins/chartjs/chart.min.js') }}"></script>
        <script src="{{ asset('lime/theme/assets/js/pages/charts.js')}}"></script>
        <script src="{{ asset('lime/theme/assets/js/pages/charts.js')}}"></script>

        {{-- Riil --}}
        <script>
            var incomeData = {!! json_encode($incomeData) !!};
            var expenditureData = {!! json_encode($expenditureData) !!};
            var dates = {!! json_encode($dates) !!};

            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                    zoom: {
                        enabled: true // Aktifkan zoom
                    },
                    toolbar: {
                        show: true,
                        tools: {
                            zoomIn: true,
                            zoomOut: true,
                            selectionZoom: true,
                            pan: true,
                            reset: true
                        }
                    }
                },
                series: [{
                    name: "Pemasukan",
                    data: incomeData
                }, {
                    name: "Pengeluaran",
                    data: expenditureData
                }],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight'
                },
                title: {
                    text: 'Grafik Pemasukan dan Pengeluaran',
                    align: 'left'
                },
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    },
                },
                xaxis: {
                    categories: dates
                },
                yaxis: {
                    title: {
                        text: 'Total' 
                    }
                },
                legend: {
                    position: 'bottom',
                    offsetY: 30
                }
            };

    
            var chart = new ApexCharts(
                document.querySelector("#apex10"),
                options
            );

            chart.render();
        </script>

        <script>
            var lastUpdated = new Date("{{ $lastUpdated }}");

            function updateTimeAgo() {
                var now = new Date();
                var diff = Math.floor((now - lastUpdated) / 1000); // Difference in seconds

                var interval = Math.floor(diff / 60);
                var message = "Data has been updated just now.";

                if (interval >= 1) {
                    message = `Data has been updated ${interval} min ago.`;
                }

                if (interval >= 60) {
                    interval = Math.floor(interval / 60);
                    message = `Data has been updated ${interval} hour(s) ago.`;
                }

                if (interval >= 24) {
                    interval = Math.floor(interval / 24);
                    message = `Data has been updated ${interval} day(s) ago.`;
                }

                document.getElementById('update-alert').innerText = message;
            }

            updateTimeAgo();
            setInterval(updateTimeAgo, 60000); // Update every minute
        </script>

        <!-- Letakkan kode JavaScript ini di bagian bawah halaman sebelum tag penutup </body> -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('visitorsChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Islam','Konghucu','Kristen','Buddha','Katolik'],
                        datasets: [{
                            label: 'Laki - Laki',
                            data: [3, 6, 4, 5, 6],
                            backgroundColor: '#5780F7'
                        }, {
                            label: 'Perempuan',
                            data: [2, 4, 2, 4, 2],
                            backgroundColor: '#F4F4F5'
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                display: false
                            }],
                            xAxes: [{
                                display: false
                            }]
                        }
                    }
                });
            });
        </script>

        <script>
            // Mendapatkan data dari view
            var dataBansos = {!! json_encode($penyaluranBansos->pluck('jumlah_bansos')) !!}; // Ambil jumlah bansos dari data yang diterima
            var labelTanggal = {!! json_encode($penyaluranBansos->pluck('tanggal_penyaluran')) !!}; // Ambil tanggal penyaluran dari data yang diterima
            var jenisBansos = {!! json_encode($penyaluranBansos->pluck('jensi_bansos')) !!}; // Ambil tanggal penyaluran dari data yang diterima
            var options70 = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                },
                stroke: {
                    width: [0, 2, 5],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                    columnWidth: '50%'
                    }
                },
                colors: ['#3A5794', '#A5C351', '#E14A84'],
                series: [{
                    name: 'Bansos',
                    type: 'column',
                    data: dataBansos
                }],
                fill: {
                    opacity: [0.85,0.25,1],
                            gradient: {
                                inverseColors: false,
                                shade: 'light',
                                type: "vertical",
                                opacityFrom: 0.85,
                                opacityTo: 0.55,
                                stops: [0, 100, 100, 100]
                            }
                },
                labels: ['01/01/2003', '02/01/2003','03/01/2003','04/01/2003','05/01/2003','06/01/2003','07/01/2003','08/01/2003','09/01/2003','10/01/2003','11/01/2003'],
                markers: {
                    size: 0
                },
                xaxis: {
                    type:'datetime',
                    categories: labelTanggal
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                    formatter: function (y) {
                        if(typeof y !== "undefined") {
                        return  y.toFixed(0) + " pieces";
                        }
                        return y;
                        
                    }
                    }
                },
                legend: {
                    labels: {
                    useSeriesColors: true
                    },
                    markers: {
                    customHTML: [
                        function() {
                        return ''
                        }, function() {
                        return ''
                        }, function() {
                        return ''
                        }
                    ]
                    }
                }
            };
        
            // Inisialisasi grafik
            var chart70 = new ApexCharts(
            document.querySelector("#apex70"),
            options70
            );
        
            // Render grafik
            chart70.render();
        </script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('statusUsiaChart').getContext('2d');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Productive Age Work', 
                            'Non-Productive Age Work', 
                            'Non-Workers of Productive Age', 
                            'Non-Productive Age Non-Workers'
                        ],
                        datasets: [{
                            data: [
                                {{ $pie['kerja_produktif'] }},
                                {{ $pie['kerja_non_produktif'] }},
                                {{ $pie['non_kerja_produktif'] }},
                                {{ $pie['non_kerja_non_produktif'] }}
                            ],
                            backgroundColor: [
                                '#06BA54', 
                                '#FFCD36', 
                                '#E6E6E6', 
                                '#0000FF'
                            ]
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        }
                    }
                });
            });
        </script>
        
    </body>
</html>