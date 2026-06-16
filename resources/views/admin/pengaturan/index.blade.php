@extends('layouts.admin')

@section('title', 'Manajemen Kontak - Admin Panel')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Manajemen Kontak</h1>
    @if($unreadCount > 0)
    <span class="badge bg-danger ms-2">{{ $unreadCount }} pesan belum dibaca</span>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Tabs Navigation -->
<ul class="nav nav-tabs mb-4" id="kontakTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pengaturan-tab" data-bs-toggle="tab" data-bs-target="#pengaturan" type="button" role="tab">
            <i class="fas fa-cog me-2"></i>Pengaturan Kontak
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pesan-tab" data-bs-toggle="tab" data-bs-target="#pesan" type="button" role="tab">
            <i class="fas fa-envelope me-2"></i>Pesan Masuk
            @if($unreadCount > 0)
                <span class="badge bg-danger ms-1">{{ $unreadCount }}</span>
            @endif
        </button>
    </li>
</ul>

<!-- Tabs Content -->
<div class="tab-content" id="kontakTabsContent">

    <!-- Tab 1: Pengaturan Kontak -->
    <div class="tab-pane fade show active" id="pengaturan" role="tabpanel">
        <form action="{{ route('admin.pengaturan.update') }}" method="POST">
            @csrf
    
    <!-- Data Kontak removed per request -->
    
    <!-- Contact Settings -->
    <div class="card border-0 shadow mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Kontak</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="telepon_sekolah" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon_sekolah" name="settings[telepon_sekolah]" 
                               value="{{ $pengaturan['contact']->where('key', 'telepon_sekolah')->first()->value ?? '(021) 123-4567' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email_sekolah" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_sekolah" name="settings[email_sekolah]" 
                               value="{{ $pengaturan['contact']->where('key', 'email_sekolah')->first()->value ?? 'info@namasekolah.sch.id' }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
                        <textarea class="form-control" id="alamat_sekolah" name="settings[alamat_sekolah]" rows="3">{{ old('settings.alamat_sekolah', $pengaturan['contact']->where('key', 'alamat_sekolah')->first()->value ?? $pengaturan['general']->where('key', 'alamat_sekolah')->first()->value ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="whatsapp_sekolah" class="form-label">WhatsApp (opsional)</label>
               <input type="text" class="form-control @error('settings.whatsapp_sekolah') is-invalid @enderror" id="whatsapp_sekolah" name="settings[whatsapp_sekolah]"
                   value="{{ old('settings.whatsapp_sekolah', $pengaturan['contact']->where('key', 'whatsapp_sekolah')->first()->value ?? '') }}" placeholder="6281...">
               @error('settings.whatsapp_sekolah')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_operasional" class="form-label">Jam Operasional (Senin-Jumat)</label>
                        <input type="text" class="form-control" id="jam_operasional" name="settings[jam_operasional]"
                               value="{{ old('settings.jam_operasional', $pengaturan['contact']->where('key', 'jam_operasional')->first()->value ?? 'Senin - Jumat: 07:00 - 15:00') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_operasional_sabtu" class="form-label">Jam Operasional (Sabtu)</label>
                        <input type="text" class="form-control" id="jam_operasional_sabtu" name="settings[jam_operasional_sabtu]"
                               value="{{ old('settings.jam_operasional_sabtu', $pengaturan['contact']->where('key', 'jam_operasional_sabtu')->first()->value ?? 'Sabtu: 07:00 - 12:00') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Profil Sekolah removed per request -->
    
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Tab 2: Pesan Kontak -->
    <div class="tab-pane fade" id="pesan" role="tabpanel">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan Kontak</h6>
            </div>
            <div class="card-body">
                @if($kontaks->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subjek</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kontaks as $kontak)
                                <tr class="{{ !$kontak->is_read ? 'table-warning' : '' }}">
                                    <td>{{ $kontak->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        {{ $kontak->nama }}
                                        @if(!$kontak->is_read)
                                            <span class="badge bg-danger ms-1">Baru</span>
                                        @endif
                                    </td>
                                    <td>{{ $kontak->email }}</td>
                                    <td>{{ $kontak->subjek }}</td>
                                    <td>
                                        @if($kontak->is_read)
                                            <span class="badge bg-success">Sudah Dibaca</span>
                                        @else
                                            <span class="badge bg-warning">Belum Dibaca</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pengaturan.kontak.show', $kontak->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        @if(!$kontak->is_read)
                                        <form action="{{ route('admin.pengaturan.kontak.read', $kontak->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i> Tandai Dibaca
                                            </button>
                                        </form>
                                        @endif
                                        <form action="{{ route('admin.pengaturan.kontak.destroy', $kontak->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{ $kontaks->links() }}
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada pesan kontak</h5>
                        <p class="text-muted">Pesan dari pengunjung website akan muncul di sini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
