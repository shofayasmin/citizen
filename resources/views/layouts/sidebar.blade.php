<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link ke file CSS Anda -->
    <link rel="stylesheet" href="path/to/your/css/file.css">
    <!-- Gaya CSS langsung -->
    <style>
        .active {
            color: #037afb;
        }
    </style>
</head>

<div class="lime-sidebar">
    <div class="lime-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                MENU
            </li>

            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="{{ Request::routeIs('dashboard.index') ? 'active' : '' }}">
                    <i class="material-icons">dashboard</i>Dashboard
                </a>
            </li>

            <li class="page {{ Request::is('laporan*') ? 'active-page' : '' }}">
                <a href="#"><i class="material-icons">report</i>Report<i
                        class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    @canany(['sekretaris', 'citizen', 'rt'])
                    <li>
                        <a href="{{ route('laporan.create') }}"
                            class="{{ Request::routeIs('laporan.create') ? 'active' : '' }}">Create Report</a>
                    </li>
                    @endcanany
                    <li>
                        <a href="{{ route('laporan.view') }}">View Report</a>
                    </li>
                </ul>
            </li>


            <li class="page {{ Request::is('acara*') ? 'active-page' : '' }}">
                <a href="#"><i class="material-icons">celebration</i>Event
                    {{-- @if($unreadEventCount > 0)
                    <div class="notification-icon">
                        <span class="badge badge-pill badge-danger">{{ $unreadEventCount }}</span>
                    </div>
                    @endif         --}}
                    <i class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    @canany(['sekretaris', 'rw'])
                        <li>
                            <a href="{{ route('acara.manage') }}">Manage Event</a>
                        </li>
                    @endcanany
                    <li>
                        <a href="{{ route('acara.view') }}" >View Event</a>
                    </li>
                </ul>
            </li>

            <li class="page {{ Request::is('umkm*') ? 'active-page' : '' }}">
                <a href="#"><i class="material-icons">store</i>MSME's<i
                        class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    @can('rw')
                        
                    <li>
                        <a href="{{ route('umkm.manage') }}">MSME&apos;s Manage</a>
                    </li>
                    @endcan

                    <li>
                        <a href="{{ route('umkm.view') }}">MSME&apos;s List</a>
                    </li>
                </ul>
            </li>

            <li class="page {{ Request::is('Bansos*') ? 'active-page' : '' }}">
                <a href="#"><i class="material-icons">healing</i>Social Donation<i
                        class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('bansos.informasi') }}">Newest Information of Social Donation</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('bansos.pengajuan') }}">Pengajuan Bansos</a>
                    </li> --}}
                    @can('rw')
                        <li>
                            <a href="{{ route('bansos.manage') }}">Manage Social Donation</a>
                        </li>
                    @endcan
                </ul>
            </li>


            @canany(['sekretaris', 'rw', 'rt'])
                <li class="page {{ Request::is('iuran*') ? 'active-page' : '' }}">
                    <a href="#"><i class="material-icons">attach_money</i>Finance<i
                            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('iuran.income') }}">Income</a>
                        </li>
                        @canany(['sekretaris', 'rw'])
                            <li>
                                <a href="{{ route('iuran.expenditure') }}">Outcome</a>
                            </li>
                        @endcanany
                    </ul>
                </li>
            @endcanany

            @canany(['sekretaris', 'rw'])
                <li class="page {{ Request::is('citizen*') ? 'active-page' : '' }}">
                    <a href="#"><i class="material-icons">groups</i>Citizenship<i
                            class="material-icons has-sub-menu">keyboard_arrow_left</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('citizen.kk') }}">Family</a>
                        </li>
                        <li>
                            <a href="{{ route('citizen.warga') }}">Citizen</a>
                        </li>
                        <li>
                            <a href="{{ route('citizen.rumah') }}">House</a>
                        </li>
                        <li>
                            <a href="{{ route('citizen.rt') }}">Neighborhood Number</a>
                        </li>
                        <li>
                            <a href="{{ route('citizen.organisasi') }}">Organization</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('user.index') }}" class="{{ Request::routeIs('user.index') ? 'active' : '' }}">
                        <i class="material-icons">manage_accounts</i>User Account
                    </a>
                </li>
            @endcanany


            @canany(['rw', 'rt', 'sekretaris'])
            <li class="sidebar-title">
                Promethee
            </li>
            <li>
                <a href="{{ route('spk.promethee') }}"
                    class="{{ Request::routeIs('spk.promethee') ? 'active' : '' }}">
                    <i class="material-icons">calculate</i>Promethee
                </a>
            </li>
            @endcanany

        </ul>
    </div>
</div>
