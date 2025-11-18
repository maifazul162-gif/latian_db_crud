@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark mb-2">🍰 Daftar Makanan Kekinian 🍹</h2>
        <p class="text-muted">Nikmati berbagai pilihan makanan kekinian yang menggugah selera!</p>
        <a href="{{ route('makanans.create') }}" class="btn btn-success shadow-sm px-4 mt-3">
            + Tambah Makanan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center shadow-sm">{{ session('success') }}</div>
    @endif

    @if($makanans->isEmpty())
        <div class="text-center text-muted py-5">
            <i class="bi bi-emoji-frown" style="font-size: 3rem;"></i>
            <p class="mt-3">Belum ada makanan kekinian.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach($makanans as $makanan)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        @if($makanan->foto)
                            <img src="{{ asset('storage/'.$makanan->foto) }}" 
                                 class="card-img-top" 
                                 alt="{{ $makanan->nama_makanan }}" 
                                 style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 220px;">
                                 <small class="text-muted">Tidak ada foto</small>
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $makanan->nama_makanan }}</h5>
                            <p class="card-text text-muted mb-2">
                                {{ $makanan->deskripsi ?? 'Tidak ada deskripsi.' }}
                            </p>
                            <p class="fw-semibold text-success">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
                        </div>

                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('makanans.edit', $makanan->id) }}" 
                               class="btn btn-warning btn-sm px-3">Edit</a>
                            <form action="{{ route('makanans.destroy', $makanan->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin ingin hapus makanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm px-3">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
