<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // 1. Halaman Home
    public function home()
    {
        return view('home');
    }

    // 2. Halaman Katalog & Pencarian (Menggunakan Database)
    public function katalog(Request $request)
    {
        $search = $request->input('search');

        $produks = Produk::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('kategori', 'like', "%{$search}%");
        })->get();

        return view('katalog', compact('produks', 'search'));
    }

    // 3. Detail Produk
    public function detail($id)
    {
        $produk = Produk::findOrFail($id);
        return view('detail', compact('produk'));
    }

    // 4. Admin Dashboard
    public function adminIndex()
    {
        $produks = Produk::all();
        return view('admin.index', compact('produks'));
    }

    // 5. Form Tambah Admin
    public function create()
    {
        return view('admin.tambah');
    }

    // 6. Simpan Data & Validasi
    public function store(Request $request)
    {
        $request->validate([
            'kode'      => 'required|unique:produks,kode',
            'nama'      => 'required',
            'kategori'  => 'required',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|numeric|min:0',
            'deskripsi' => 'required',
        ], [
            'kode.required' => 'Kode produk wajib diisi!',
            'kode.unique'   => 'Kode produk sudah terdaftar!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'stok.numeric'  => 'Stok harus berupa angka!',
        ]);

        Produk::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    // Form Edit Produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.edit', compact('produk'));
    }

    // Proses Update Produk
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'kode'      => 'required|unique:produks,kode,' . $id,
            'nama'      => 'required',
            'kategori'  => 'required',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|numeric|min:0',
            'deskripsi' => 'required',
        ], [
            'kode.required' => 'Kode produk wajib diisi!',
            'kode.unique'   => 'Kode produk sudah terdaftar!',
            'harga.numeric' => 'Harga harus berupa angka!',
            'stok.numeric'  => 'Stok harus berupa angka!',
        ]);

        $produk->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    // Hapus Produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus!');
    }
}
