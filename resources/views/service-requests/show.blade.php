@extends('layouts.public')

@section('title', 'Detail Permohonan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-file-alt me-2"></i>
                        Detail Permohonan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-1">Nomor Tracking</h6>
                            <h4 class="text-primary">{{ $serviceRequest->tracking_number }}</h4>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h6 class="text-muted mb-1">Status</h6>
                            @switch($serviceRequest->status)
                                @case('pending')
                                    <span class="badge bg-warning fs-6">
                                        <i class="fas fa-clock me-1"></i>Menunggu
                                    </span>
                                    @break
                                @case('processing')
                                    <span class="badge bg-primary fs-6">
                                        <i class="fas fa-spinner me-1"></i>Diproses
                                    </span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success fs-6">
                                        <i class="fas fa-check-circle me-1"></i>Selesai
                                    </span>
                                    @break
                                @case('rejected')
                                    <span class="badge bg-danger fs-6">
                                        <i class="fas fa-times-circle me-1"></i>Ditolak
                                    </span>
                                    @break
                            @endswitch
                        </div>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h5 class="mb-3">Informasi Layanan</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Jenis Layanan</th>
                                <td>{{ $serviceRequest->service->name }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $serviceRequest->service->description }}</td>
                            </tr>
                            <tr>
                                <th>Estimasi Waktu</th>
                                <td>{{ $serviceRequest->service->processing_time }} hari kerja</td>
                            </tr>
                            <tr>
                                <th>Biaya</th>
                                <td>Rp {{ number_format($serviceRequest->service->fee, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h5 class="mb-3">Data Pemohon</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">NIK</th>
                                <td>{{ $serviceRequest->citizen->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $serviceRequest->citizen->name }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $serviceRequest->citizen->phone }}</td>
                            </tr>
                            @if($serviceRequest->citizen->email)
                            <tr>
                                <th>Email</th>
                                <td>{{ $serviceRequest->citizen->email }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>

                    <hr>

                    <div class="mb-4">
                        <h5 class="mb-3">Timeline</h5>
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Tanggal Pengajuan</th>
                                <td>{{ $serviceRequest->created_at->format('d F Y, H:i') }} WIB</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $serviceRequest->updated_at->format('d F Y, H:i') }} WIB</td>
                            </tr>
                            @if($serviceRequest->processed_at)
                            <tr>
                                <th>Tanggal Diproses</th>
                                <td>{{ $serviceRequest->processed_at->format('d F Y, H:i') }} WIB</td>
                            </tr>
                            @endif
                        </table>
                    </div>

                    @if($serviceRequest->notes)
                    <hr>
                    <div class="mb-4">
                        <h5 class="mb-3">Catatan</h5>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>
                            {{ $serviceRequest->notes }}
                        </div>
                    </div>
                    @endif

                    <hr>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Penting:</strong> Simpan nomor tracking Anda untuk melacak status permohonan.
                    </div>

                    <div class="text-center">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-home me-1"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection