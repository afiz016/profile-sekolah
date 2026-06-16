@extends('layouts.frontend')

@section('title', $informasi->judul . ' - Mi Ma\'arif NU 03 Tamansari')
@section('meta_description', Str::limit(strip_tags($informasi->konten), 150))

@section('content')
<!-- Article Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('informasi') }}">Informasi</a></li>
                        <li class="breadcrumb-item active">{{ Str::limit($informasi->judul, 50) }}</li>
                    </ol>
                </nav>
                <h1 class="display-5 fw-bold text-dark mb-3">{{ $informasi->judul }}</h1>
                <p class="text-muted">
                    <i class="fas fa-calendar me-2"></i>{{ $informasi->created_at->format('d F Y') }}
                    <i class="fas fa-user ms-3 me-2"></i>Admin
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if($informasi->gambar)
                    <img src="{{ asset('storage/' . $informasi->gambar) }}" class="img-fluid rounded shadow mb-4" alt="{{ $informasi->judul }}" loading="lazy">
                @endif
                
                <div class="article-content">
                    {!! nl2br(e($informasi->konten)) !!}
                </div>
                
                <!-- Related Posts -->
                @php
                    $relatedPosts = isset($related) ? $related : (isset($latest) ? $latest : collect());
                @endphp
                @if($relatedPosts->count() > 0)
                <hr class="my-5">
                <h3 class="mb-4">Artikel Terkait</h3>
                <div class="row g-4">
                    @foreach($relatedPosts->take(3) as $post)
                    <div class="col-md-4">
                        <div class="card card-news h-100">
                            @if($post->gambar)
                                <img src="{{ asset('storage/' . $post->gambar) }}" class="card-img-top" alt="{{ $post->judul }}" loading="lazy">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title">{{ Str::limit($post->judul, 70) }}</h6>
                                <p class="card-text small text-muted flex-grow-1">{{ Str::limit(strip_tags($post->konten), 90) }}</p>
                                <a href="{{ route('informasi.show', $post->id) }}" class="btn btn-primary btn-sm mt-auto">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                
                <hr class="my-5">
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('informasi') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Informasi
                    </a>
                    
                    <div class="share-buttons">
                        <span class="text-muted me-3">Bagikan:</span>
                        <a href="#" class="btn btn-sm btn-outline-primary me-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-info me-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-success">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #374151;
}

.article-content p {
    margin-bottom: 1.5rem;
}
</style>
@endpush
