@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0 col-md-8 mx-auto">
    <div class="card-body p-4">
        <a href="{{ route('katalog') }}" class="btn btn-sm btn-secondary mb-3">&laquo; Kembali ke Katalog</a>

        <span class="badge bg-info text-dark d-inline-block mb-2">{{ $produk->kategori }}</span>
        <h2 class="fw-bold">{{ $produk->nama }}</h2>
        <p class="text-muted">Kode Produk: <strong>{{ $produk->kode }}</strong></p>
        <hr>

        <h4 class="text-success fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h4>
        <p><strong>Sisa Stok:</strong> {{ $produk->stok }} pcs</p>

        <h5 class="mt-4 fw-bold">Deskripsi Produk:</h5>
        <p class="text-secondary">{{ $produk->deskripsi }}</p>
    </div>
</div>
@endsection 
