@extends('layouts.app')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm text-center">
    <div class="container-fluid py-4">
        <h1 class="display-5 fw-bold text-primary">Selamat Datang di Katalog UMKM Siswa SMK</h1>
        <p class="fs-5 text-muted">Platform showcase produk-produk kreatif hasil karya siswa SMK terbaik.</p>
        <a href="{{ route('katalog') }}" class="btn btn-primary btn-lg mt-3">Lihat Katalog Produk</a>
    </div>
</div>
@endsection
