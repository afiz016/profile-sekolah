@extends('layouts.admin')

@section('title', 'Dashboard Admin - Mi Ma\'arif NU 03 Tamansari')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Dashboard Admin</h1>
    <p class="text-muted mb-0">Selamat datang di panel administrasi website sekolah</p>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card-stats blue">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h3>{{ $totalInformasi ?? 0 }}</h3>
                    <p>Total Informasi</p>
                    <small>Artikel & Berita</small>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-stats green">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h3>{{ $totalGaleri ?? 0 }}</h3>
                    <p>Total Galeri</p>
                    <small>Foto & Dokumentasi</small>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-images"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-stats orange">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h3>{{ $informasiTerbaru ?? 0 }}</h3>
                    <p>Informasi Terbaru</p>
                    <small>Bulan Ini</small>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card-stats blue">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h3>{{ $galeriTerbaru ?? 0 }}</h3>
                    <p>Galeri Terbaru</p>
                    <small>Bulan Ini</small>
                </div>
                <div class="stats-icon">
                    <i class="fas fa-camera"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Row -->
<div class="row g-4">
    <!-- Recent Activities -->
    <div class="col-lg-8">
        <div class="activity-card">
            <h4 class="mb-4">Aktivitas Terbaru</h4>
            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Informasi Baru Ditambahkan</h6>
                        <p class="text-muted mb-1">"Pembukaan Pendaftaran Siswa Baru Tahun Ajaran 2024/2025"</p>
                        <small class="text-muted">2 jam yang lalu</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Galeri Diperbarui</h6>
                        <p class="text-muted mb-1">"Kegiatan Outbound Kelas 6"</p>
                        <small class="text-muted">1 hari yang lalu</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Foto Baru Ditambahkan</h6>
                        <p class="text-muted mb-1">"Perayaan Hari Kemerdekaan RI"</p>
                        <small class="text-muted">3 hari yang lalu</small>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="activity-content">
                        <h6>Informasi Dipublikasikan</h6>
                        <p class="text-muted mb-1">"Jadwal Ujian Tengah Semester"</p>
                        <small class="text-muted">1 minggu yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="col-lg-4">
        <div class="activity-card">
            <h4 class="mb-4">Aksi Cepat</h4>
            <div class="quick-actions">
                <a href="{{ route('admin.informasi.create') }}" class="quick-action-btn">
                    <div class="quick-action-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Tambah Informasi</h6>
                        <p>Buat artikel atau berita baru</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.galeri.create') }}" class="quick-action-btn">
                    <div class="quick-action-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Tambah Galeri</h6>
                        <p>Upload foto dokumentasi</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.pengaturan') }}" class="quick-action-btn">
                    <div class="quick-action-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Pengaturan</h6>
                        <p>Konfigurasi website</p>
                    </div>
                </a>
                
                <a href="{{ route('home') }}" target="_blank" class="quick-action-btn">
                    <div class="quick-action-icon">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                    <div class="quick-action-content">
                        <h6>Lihat Website</h6>
                        <p>Preview tampilan publik</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Website Statistics -->
<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="activity-card">
            <h4 class="mb-4">Statistik Website</h4>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">1,234</div>
                        <div class="stat-label">Total Pengunjung</div>
                        <div class="stat-change positive">+12%</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">567</div>
                        <div class="stat-label">Halaman Dilihat</div>
                        <div class="stat-change positive">+8%</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">89</div>
                        <div class="stat-label">Waktu Rata-rata</div>
                        <div class="stat-change positive">+5%</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">2.3%</div>
                        <div class="stat-label">Bounce Rate</div>
                        <div class="stat-change negative">-2%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.stats-icon {
    font-size: 2.5rem;
    opacity: 0.3;
}

.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.quick-action-btn {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 10px;
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.quick-action-btn:hover {
    background: #e2e8f0;
    border-color: var(--primary-color);
    color: inherit;
    transform: translateY(-2px);
}

.quick-action-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: var(--primary-color);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.quick-action-content h6 {
    margin-bottom: 0.25rem;
    font-weight: 600;
    color: #1f2937;
}

.quick-action-content p {
    margin-bottom: 0;
    color: #6b7280;
    font-size: 0.9rem;
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    background: #f8fafc;
    border-radius: 10px;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.stat-change {
    font-size: 0.8rem;
    font-weight: 600;
}

.stat-change.positive {
    color: #10b981;
}

.stat-change.negative {
    color: #ef4444;
}
</style>
@endpush