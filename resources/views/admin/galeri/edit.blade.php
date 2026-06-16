@extends('layouts.admin')

@section('title', 'Edit Galeri - Admin Panel')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Edit Galeri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.galeri.index') }}">Galeri</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<!-- Form -->
<div class="card border-0 shadow">
    <div class="card-body">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        
                        <!-- Current Image -->
                        @if($galeri->gambar)
                            <div class="mb-2">
                                <label class="form-label small text-muted">Gambar Saat Ini:</label>
                                <div>
                                    <img src="{{ asset('storage/' . $galeri->gambar) }}" 
                                         class="img-fluid rounded border" 
                                         style="max-height: 200px;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div class="alert alert-warning" style="display: none;">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        Gambar tidak dapat dimuat: {{ $galeri->gambar }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <!-- File Input -->
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                               id="gambar" name="gambar" accept="image/*" onchange="previewImage(this)">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                        
                        <!-- Preview New Image -->
                        <div class="mt-3">
                            <img id="imagePreview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none; border-radius: 8px; border: 1px solid #ddd;">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="akademik" {{ old('kategori', $galeri->kategori) == 'akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="fasilitas" {{ old('kategori', $galeri->kategori) == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="kegiatan" {{ old('kategori', $galeri->kategori) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                            <option value="umum" {{ old('kategori', $galeri->kategori) == 'umum' ? 'selected' : '' }}>Umum</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $galeri->is_published) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">
                                Publikasikan
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
</script>
@endpush
