@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesan Kontak</h1>
        <a href="{{ route('admin.pengaturan') }}#pesan" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Pesan dari {{ $kontak->nama }}</h6>
                    @if(!$kontak->is_read)
                        <span class="badge bg-warning">Belum Dibaca</span>
                    @else
                        <span class="badge bg-success">Sudah Dibaca</span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Nama:</strong></div>
                        <div class="col-sm-9">{{ $kontak->nama }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Email:</strong></div>
                        <div class="col-sm-9">
                            <a href="mailto:{{ $kontak->email }}">{{ $kontak->email }}</a>
                        </div>
                    </div>
                    @if($kontak->telepon)
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Telepon:</strong></div>
                        <div class="col-sm-9">
                            <a href="tel:{{ $kontak->telepon }}">{{ $kontak->telepon }}</a>
                        </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Subjek:</strong></div>
                        <div class="col-sm-9">{{ $kontak->subjek }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><strong>Tanggal:</strong></div>
                        <div class="col-sm-9">{{ $kontak->created_at->format('d F Y, H:i') }} WIB</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><strong>Pesan:</strong></div>
                        <div class="col-sm-9">
                            <div class="bg-light p-3 rounded">
                                {!! nl2br(e($kontak->pesan)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi</h6>
                </div>
                <div class="card-body">
                    @if(!$kontak->is_read)
                    <form action="{{ route('admin.pengaturan.kontak.read', $kontak->id) }}" method="POST" class="mb-2">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-block w-100">
                            <i class="fas fa-check"></i> Tandai Sebagai Dibaca
                        </button>
                    </form>
                    @endif
                    
                    <a href="mailto:{{ $kontak->email }}?subject=Re: {{ $kontak->subjek }}" class="btn btn-primary btn-block w-100 mb-2">
                        <i class="fas fa-reply"></i> Balas via Email
                    </a>
                    
                    @if($kontak->telepon)
                    <a href="tel:{{ $kontak->telepon }}" class="btn btn-info btn-block w-100 mb-2">
                        <i class="fas fa-phone"></i> Hubungi via Telepon
                    </a>
                    @endif
                    
                    <form action="{{ route('admin.pengaturan.kontak.destroy', $kontak->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block w-100">
                            <i class="fas fa-trash"></i> Hapus Pesan
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Tambahan</h6>
                </div>
                <div class="card-body">
                    <small class="text-muted">
                        <strong>ID Pesan:</strong> #{{ $kontak->id }}<br>
                        <strong>Diterima:</strong> {{ $kontak->created_at->diffForHumans() }}<br>
                        @if($kontak->is_read)
                        <strong>Dibaca:</strong> {{ $kontak->updated_at->diffForHumans() }}
                        @endif
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto focus on pesan tab when returning from detail
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash === '#pesan') {
        const pesanTab = document.getElementById('pesan-tab');
        if (pesanTab) {
            pesanTab.click();
        }
    }
});
</script>
@endsection