@extends('layouts.app')

@section('content')
<h2 class="mb-4 fw-bold">Katalog Produk UMKM</h2>

<form action="{{ route('katalog') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control form-control-lg" placeholder="Cari nama produk atau kategori..." value="{{ $search ?? '' }}">
        <button class="btn btn-primary px-4" type="submit">Cari</button>
    </div>
</form>

<div class="row row-cols-1 row-cols-md-4 g-4">
    @forelse($produks as $item)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <span class="badge bg-info text-dark mb-2">{{ $item->kategori }}</span>
                    <h5 class="card-title fw-bold">{{ $item->nama }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($item->deskripsi, 60) }}</p>
                    <p class="card-text fw-bold text-success mb-1">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <small class="text-secondary">Stok: {{ $item->stok }}</small>
                </div>
                <div class="card-footer bg-white border-0 text-end pb-3">
                    <a href="{{ route('detail', $item->id) }}" class="btn btn-outline-primary btn-sm w-100">Detail Produk</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted fs-5">Produk tidak ditemukan.</p>
        </div>
    @endforelse
</div>
@endsection
