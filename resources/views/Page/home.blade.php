
@extends('Layouts.main')

@section('title', 'Home')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 fw-bold text-dark mb-3">Selamat Datang</h1>
    <h2 class="h3 text-muted mb-4">PT Teknologi Nusantara</h2>

    <p class="lead text-secondary mx-auto mb-5" style="max-width: 700px;">
        Solusi teknologi informasi terdepan untuk mendukung transformasi digital
        dan kebutuhan bisnis modern bagi kampus dan sekolah di seluruh Indonesia.
    </p>

    <a href="{{ url('/profile') }}" class="btn btn-primary btn-lg px-5 shadow-sm rounded-pill">
        Lihat Profile
    </a>
</div>
@endsection


