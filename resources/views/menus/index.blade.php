@extends('layouts.app')

@section('content')
<div class="container py-5" style="font-family: 'Poppins', sans-serif;">
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2 text-gradient"><i class="bi bi-cup-hot-fill"></i> Menu Makanan Kekinian</h1>
        <p class="text-muted">Nikmati hidangan lezat dengan tampilan warna-warni yang menggugah selera 🍱💫</p>
        <a href="{{ route('menus.create') }}" class="btn btn-lg btn-gradient shadow-lg rounded-pill mt-3">
            <i class="bi bi-plus-circle-dotted"></i> Tambah Menu
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card glass-card border-0 shadow-lg rounded-4">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-header text-white">
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Menu</th>
                        <th class="text-center">Foto</th>
                        <th class="text-end">Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menus as $menu)
                        <tr class="table-row">
                            <td class="text-center fw-semibold text-secondary">{{ $loop->iteration }}</td>
                            <td class="fw-semibold text-dark">{{ ucfirst($menu->nama_menu) }}</td>
                            <td class="text-center">
                                @if($menu->foto)
                                    <img src="{{ asset('storage/'.$menu->foto) }}" 
                                         class="rounded-4 shadow-sm border border-light" width="90" height="70" 
                                         style="object-fit: cover;">
                                @else
                                    <span class="badge bg-secondary">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="text-end fw-bold text-money">
                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('menus.edit', $menu->id) }}" 
                                   class="btn btn-edit btn-sm rounded-pill px-3 me-2 shadow-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" 
                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete btn-sm rounded-pill px-3 shadow-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-emoji-frown fs-4"></i><br>
                                Belum ada menu yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- 🌈 CSS Kustom --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body {
        background: linear-gradient(135deg, #f6d5f7 0%, #fbe9d7 50%, #d0eaff 100%);
        color: #333;
    }

    .text-gradient {
        background: linear-gradient(90deg, #ff758c, #ff7eb3, #8ec5fc, #e0c3fc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #ff758c, #ff7eb3);
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-gradient:hover {
        background: linear-gradient(90deg, #8ec5fc, #e0c3fc);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255, 120, 140, 0.4);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    .table-header {
        background: linear-gradient(90deg, #8ec5fc, #e0c3fc);
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .table-row:hover {
        background: rgba(255, 255, 255, 0.6);
        transform: scale(1.01);
        transition: 0.3s ease-in-out;
    }

    .btn-edit {
        background: linear-gradient(90deg, #89f7fe, #66a6ff);
        color: #fff;
        border: none;
        transition: 0.3s;
    }
    .btn-edit:hover {
        background: linear-gradient(90deg, #66a6ff, #89f7fe);
        transform: translateY(-2px);
    }

    .btn-delete {
        background: linear-gradient(90deg, #ff9a9e, #fecfef);
        color: #fff;
        border: none;
        transition: 0.3s;
    }
    .btn-delete:hover {
        background: linear-gradient(90deg, #ff758c, #ff7eb3);
        transform: translateY(-2px);
    }

    .text-money {
        color: #3bb78f;
    }

    .table td, .table th {
        padding: 1rem;
        border-bottom: 1px solid rgba(0,0,0,0.05);
    }
</style>
@endsection
