@extends('layouts.frontend')

@section('title', 'Informasi - Mi Ma\'arif NU 03 Tamansari')

@section('content')
<!-- Header Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">Berita Terbaru</h1>
            <p class="lead text-muted">Informasi terkini seputar kegiatan dan perkembangan sekolah</p>
        </div>
    </div>
</section>

<!-- News Grid Section -->
<section class="py-5">
    <div class="container">
        @if($informasi->count() > 0)
            <div class="row g-4">
                @foreach($informasi as $info)
                <div class="col-md-4">
                    <div class="card card-news h-100">
                        @if($info->gambar)
                            <img src="{{ asset('storage/' . $info->gambar) }}" class="card-img-top" alt="{{ $info->judul }}" loading="lazy" 
                                 onerror="this.src='https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80';">
                        @else
                            <img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="{{ $info->judul }}" loading="lazy">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $info->judul }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($info->konten), 120) }}</p>
                            <div class="mt-auto">
                                <small class="text-muted">{{ $info->created_at->format('d M Y') }}</small>
                                <a href="{{ route('informasi.show', $info->id) }}" class="btn btn-primary btn-sm float-end">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $informasi->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-5x text-muted mb-3"></i>
                <h3 class="text-muted">Belum Ada Informasi</h3>
                <p class="text-muted">Informasi akan segera ditambahkan.</p>
            </div>
        @endif
    </div>
</section>
@endsection
