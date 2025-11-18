@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">🍰 Tambah Makanan Kekinian Baru</h2>

    <form action="{{ route('makanans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_makanan" class="form-label">Nama Makanan</label>
            <input type="text" class="form-control" name="nama_makanan" id="nama_makanan" placeholder="Contoh: Es Kopi Susu Gula Aren" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" class="form-control" name="harga" id="harga" placeholder="Contoh: 15000" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Tulis deskripsi singkat..." required></textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('makanans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
