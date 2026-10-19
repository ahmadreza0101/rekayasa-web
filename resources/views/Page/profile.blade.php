@extends('Layouts.main')

@section('title', 'Profil Pengguna')

@section('content')
    <div class="row align-items-center">
        <div class="col-md-3 text-center mb-4 mb-md-0">
            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow" style="width: 120px; height: 120px; font-size: 3rem;">
                RA
            </div>
        </div>
        <div class="col-md-9">
            <h1 class="fw-bold text-dark mb-1">Profil Pengguna</h1>
            <p class="text-muted mb-4">Informasi lengkap akun mahasiswa.</p>
            
            <ul class="list-group list-group-flush border-top">
                <li class="list-group-item px-0 py-3">
                    <div class="row">
                        <div class="col-sm-4 text-secondary fw-medium">Nama Lengkap</div>
                        <div class="col-sm-8 text-dark">Reza Ahmad Al Ghifari</div>
                    </div>
                </li>
                <li class="list-group-item px-0 py-3">
                    <div class="row">
                        <div class="col-sm-4 text-secondary fw-medium">Program Studi</div>
                        <div class="col-sm-8 text-dark">S1 Sistem Informasi</div>
                    </div>
                </li>
                <li class="list-group-item px-0 py-3">
                    <div class="row">
                        <div class="col-sm-4 text-secondary fw-medium">Status Akademik</div>
                        <div class="col-sm-8">
                            <span class="badge bg-success px-3 py-2 rounded-pill">Aktif</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection



 