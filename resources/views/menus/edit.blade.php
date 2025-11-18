@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark fw-bold">
            <i class="bi bi-pencil-square"></i> Edit Menu
        </div>
        <div class="card-body">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Menu</label><br>
                    @if($menu->foto)
                        <img src="{{ asset('storage/'.$menu->foto) }}" width="120" class="rounded mb-2 shadow-sm"><br>
                    @endif
                    <input type="file" name="foto" class="form-control">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $menu->harga }}" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('menus.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning text-white">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
