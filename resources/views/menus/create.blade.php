@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white fw-bold">
            <i class="bi bi-plus-circle"></i> Tambah Menu Baru
        </div>
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" placeholder="Masukkan nama menu" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Menu</label>
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">Format gambar: JPG, PNG, atau JPEG</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan harga menu" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan Menu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
