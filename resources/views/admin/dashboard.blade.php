@extends('layouts.public')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-white sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                            <i class="fas fa-cogs me-2"></i>
                            Manajemen Layanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/requests*') ? 'active' : '' }}" href="{{ route('admin.requests.index') }}">
                            <i class="fas fa-clipboard-list me-2"></i>
                            Permohonan Layanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/citizens*') ? 'active' : '' }}" href="{{ route('admin.citizens.index') }}">
                            <i class="fas fa-users me-2"></i>
                            Data Penduduk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/districts*') ? 'active' : '' }}" href="{{ route('admin.districts.index') }}">
                            <i class="fas fa-map-marked-alt me-2"></i>
                            Data Kecamatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/villages*') ? 'active' : '' }}" href="{{ route('admin.villages.index') }}">
                            <i class="fas fa-home me-2"></i>
                            Data Desa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                            <i class="fas fa-user-shield me-2"></i>
                            Manajemen Pengguna
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/reports*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">
                            <i class="fas fa-chart-bar me-2"></i>
                            Laporan
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-download me-1"></i>Export
                        </button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <i class="fas fa-calendar me-1"></i>
                        Periode Ini
                    </button>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Total Permohonan</h6>
                                    <h2 class="mt-2 mb-0">{{ $stats['total_requests'] }}</h2>
                                </div>
                                <i class="fas fa-clipboard-list fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Selesai Diproses</h6>
                                    <h2 class="mt-2 mb-0">{{ $stats['completed_requests'] }}</h2>
                                </div>
                                <i class="fas fa-check-circle fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Dalam Proses</h6>
                                    <h2 class="mt-2 mb-0">{{ $stats['processing_requests'] }}</h2>
                                </div>
                                <i class="fas fa-clock fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title mb-0">Total Penduduk</h6>
                                    <h2 class="mt-2 mb-0">{{ $stats['total_citizens'] }}</h2>
                                </div>
                                <i class="fas fa-users fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Requests -->
            <h4 class="mb-3">Permohonan Terbaru</h4>
            <div class="table-responsive mb-4">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No. Tracking</th>
                            <th>Layanan</th>
                            <th>Pemohon</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentRequests as $request)
                            <tr>
                                <td>{{ $request->tracking_number }}</td>
                                <td>{{ $request->service->name }}</td>
                                <td>{{ $request->citizen->name }}</td>
                                <td>{{ $request->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @switch($request->status)
                                        @case('pending')
                                            <span class="badge bg-warning">Menunggu</span>
                                            @break
                                        @case('processing')
                                            <span class="badge bg-primary">Diproses</span>
                                            @break
                                        @case('completed')
                                            <span class="badge bg-success">Selesai</span>
                                            @break
                                        @case('rejected')
                                            <span class="badge bg-danger">Ditolak</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admin.requests.show', $request) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Popular Services -->
            <h4 class="mb-3">Layanan Populer</h4>
            <div class="row g-4">
                @foreach($popularServices as $service)
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">{{ $service->name }}</h5>
                                    <span class="badge bg-primary">{{ $service->requests_count }} Permohonan</span>
                                </div>
                                <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock text-muted me-2"></i>
                                    <small>{{ $service->processing_time }} hari</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
@endsection

@push('styles')
<style>
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link.active {
        color: #2470dc;
    }

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
    }

    .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
    }
</style>
@endpush