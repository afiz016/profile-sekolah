@extends('layouts.frontend')

@section('title', 'Home - Mi Ma\'arif NU 03 Tamansari')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('{{ asset('images/gambar/home.jpg') }}'); min-height: 90vh; position: relative;">
    <div class="hero-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1>Selamat Datang di Website Resmi Kami</h1>
                    <p>Terdepan dalam pendidikan dengan <span class="hero-pill">beragam cara</span>, sekolah kami mengutamakan kualitas terbaik.</p>
                    <a href="{{ route('profil') }}" class="btn btn-primary btn-primary-custom">
                        <i class="fas fa-arrow-right me-2"></i>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section (restyled) -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="services-title">
            Mengapa Memilih <span class="highlight">Sekolah</span> Kami?
        </h2>
        <p class="text-center text-muted mb-5">Layanan informasi yang terbaik serta menyajikan informasi terdepan dan kegiatan serta memberikan kami</p>

        <div class="row g-4">
            <div class="col-md-6 col-lg-6">
                <div class="service-card white h-100">
                    <div class="service-icon"><i class="fas fa-users"></i></div>
                    <h5>Tenaga Pengajar Profesional</h5>
                    <p>Guru-guru berpengalaman dan berkualitas tinggi</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="service-card white h-100">
                    <div class="service-icon"><i class="fas fa-lightbulb"></i></div>
                    <h5>Kurikulum Inovatif</h5>
                    <p>Pembelajaran modern dan up-to-date</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="service-card white h-100">
                    <div class="service-icon"><i class="fas fa-building"></i></div>
                    <h5>Fasilitas Modern</h5>
                    <p>Sarana dan prasarana lengkap dan modern</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="service-card white h-100">
                    <div class="service-icon"><i class="fas fa-puzzle-piece"></i></div>
                    <h5>Kegiatan Ekstrakurikuler</h5>
                    <p>Pilihan kegiatan untuk mengasah minat dan bakat siswa</p>
                </div>
            </div>
        </div>
    </div>
    
</section>

<!-- Latest News Section -->
@if($informasiTerbaru->count() > 0)
<section class="py-5">
    <div class="container">
        <h2 class="section-title">Berita Terbaru</h2>
        <div class="row g-4">
            @foreach($informasiTerbaru as $info)
            <div class="col-md-4">
                <div class="card card-news">
                    @if($info->gambar)
                        <img src="{{ $info->gambar_url }}" class="card-img-top" alt="{{ $info->judul }}" loading="lazy">
                    @else
                        <img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="{{ $info->judul }}" loading="lazy">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $info->judul }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($info->konten), 100) }}</p>
                        <a href="{{ route('informasi.show', $info->id) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('informasi') }}" class="btn btn-primary btn-primary-custom">
                Lihat Semua Informasi
            </a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Apa Kata Mereka?</h2>
        <p class="text-center text-muted mb-5">Testimoni dari orang tua siswa dan alumni</p>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Sekolah yang sangat baik dengan guru-guru yang berkualitas dan perhatian terhadap perkembangan anak."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h6>Ibu Siti Aminah</h6>
                            <small>Orang Tua Siswa</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Fasilitas sekolah sangat lengkap dan mendukung proses pembelajaran yang efektif."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h6>Bapak Ahmad Rizki</h6>
                            <small>Orang Tua Siswa</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Pendidikan karakter yang kuat dan kurikulum yang seimbang antara akademik dan agama."</p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h6>Ibu Fatimah Zahra</h6>
                            <small>Alumni</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Siap Bergabung dengan Kami?</h3>
                <p class="mb-0">Daftarkan putra-putri Anda untuk mendapatkan pendidikan terbaik di MI Ma'arif NU 03 Tamansari.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone me-2"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
