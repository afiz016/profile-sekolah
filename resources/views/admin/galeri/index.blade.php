@extends('layouts.admin')

@section('title', 'Manajemen Galeri - Admin Panel')

@section('content')
<!-- Page Header -->
<div class="page-header d-flex justify-content-between align-items-center">
    <h1 class="page-title">Manajemen Galeri</h1>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Galeri
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Galeri Grid -->
<div class="row g-4">
    @forelse($galeri as $item)
    <div class="col-md-4">
        <div class="card border-0 shadow h-100">
            @php
                $hasImage = false;
                if(!empty($item->gambar)){
                    try {
                        $hasImage = \Illuminate\Support\Facades\Storage::disk('public')->exists($item->gambar);
                    } catch (Exception $e) {
                        $hasImage = file_exists(public_path('storage/' . $item->gambar));
                    }
                }
            @endphp

            @if($hasImage)
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $item->judul }}">
            @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="fas fa-image fa-3x text-muted"></i>
                </div>
                @if(!empty($item->gambar))
                    <div class="p-2 text-center text-danger small">Gambar tidak ditemukan ({{ $item->gambar }})</div>
                @endif
            @endif
            <div class="card-body">
                <h6 class="card-title">{{ $item->judul }}</h6>
                <p class="card-text text-muted small">{{ Str::limit($item->deskripsi, 80) }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-primary">{{ ucfirst($item->kategori) }}</span>
                    @if($item->is_published)
                        <span class="badge bg-success">Published</span>
                    @else
                        <span class="badge bg-secondary">Draft</span>
                    @endif
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="btn-group w-100" role="group">
                    <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center py-5">
            <i class="fas fa-images fa-5x text-muted mb-3"></i>
            <h4 class="text-muted">Belum ada galeri</h4>
            <p class="text-muted">Klik tombol "Tambah Galeri" untuk menambahkan foto pertama.</p>
        </div>
    </div>
    @endforelse
</div>

@if($galeri->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $galeri->links() }}
    </div>
@endif
@endsection
