@extends('layouts.app')

@section('content')
<div class="col-md-8 mx-auto">
    <div class="card shadow-sm border-0">
        <div class="card-header text-white" style="background-color: #800000;">
            <h4 class="mb-0">Edit Produk UMKM</h4>
        </div>
        <div class="card-body p-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.update', $produk->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Kode Produk</label>
                        <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $produk->kode) }}">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Fashion" {{ old('kategori', $produk->kategori) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                            <option value="Aksesori" {{ old('kategori', $produk->kategori) == 'Aksesori' ? 'selected' : '' }}>Aksesori</option>
                            <option value="Alat Tulis" {{ old('kategori', $produk->kategori) == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
                            <option value="Perlengkapan" {{ old('kategori', $produk->kategori) == 'Perlengkapan' ? 'selected' : '' }}>Perlengkapan</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $produk->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $produk->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok Barang</label>
                        <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $produk->stok) }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Produk</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning text-white px-4">Update Produk</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
