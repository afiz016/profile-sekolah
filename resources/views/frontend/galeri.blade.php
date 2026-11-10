@extends('layouts.frontend')

@section('title', 'Galeri - Mi Ma\'arif NU 03 Tamansari')

@section('content')
<!-- Header Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">Galeri</h1>
            <p class="lead text-muted">Dokumentasi kegiatan dan fasilitas sekolah</p>
        </div>
    </div>
</section>

<!-- Gallery Filter Section -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="text-center">
            <div class="btn-group" role="group" aria-label="Gallery Filter">
                <button type="button" class="btn btn-outline-primary filter-btn active" data-filter="all">Semua</button>
                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="akademik">Akademik</button>
                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="fasilitas">Fasilitas</button>
                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="kegiatan">Kegiatan</button>
                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="umum">Umum</button>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid Section -->
<section class="py-5">
    <div class="container">
        @if($galeri->count() > 0)
            <div class="row g-4" id="gallery-grid">
                @foreach($galeri as $item)
                <div class="col-md-4 col-lg-3 gallery-item" data-category="{{ strtolower($item->kategori) }}">
                    <div class="gallery-card">
                        <div class="gallery-image-container">
                            @if($item->gambar)
                                <img src="{{ $item->gambar_url }}"
                                     class="gallery-image" 
                                     alt="{{ $item->judul }}" 
                                     data-bs-toggle="modal" 
                                     data-bs-target="#galleryModal"
                                     data-image="{{ $item->gambar_url }}"
                                     data-title="{{ $item->judul }}"
                                     data-description="{{ $item->deskripsi }}"
                                     onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80';">
                            @else
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     class="gallery-image" 
                                     alt="{{ $item->judul }}"
                                     data-bs-toggle="modal" 
                                     data-bs-target="#galleryModal"
                                     data-image="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                     data-title="{{ $item->judul }}"
                                     data-description="{{ $item->deskripsi }}">
                            @endif
                            <!-- Gallery overlay removed -->
                        </div>
                        <div class="gallery-info">
                            <h6 class="gallery-title">{{ $item->judul }}</h6>
                            @if($item->deskripsi)
                                <p class="gallery-description">{{ Str::limit($item->deskripsi, 80) }}</p>
                            @endif
                            <span class="gallery-category">{{ ucfirst($item->kategori) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-images fa-5x text-muted mb-3"></i>
                <h3 class="text-muted">Belum Ada Galeri</h3>
                <p class="text-muted">Galeri foto akan segera ditambahkan.</p>
            </div>
        @endif
    </div>
</section>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Galeri Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded" alt="">
                <h6 id="modalTitle" class="mt-3"></h6>
                <p id="modalDescription" class="text-muted"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Force remove all zoom effects on gallery images */
.gallery-image,
.gallery-image:hover,
.gallery-image:focus,
.gallery-image:active,
.gallery-image-container img,
.gallery-image-container img:hover,
.gallery-card img,
.gallery-card img:hover {
    transform: none !important;
    scale: 1 !important;
    zoom: 1 !important;
    transition: none !important;
    animation: none !important;
    -webkit-transform: none !important;
    -moz-transform: none !important;
    -ms-transform: none !important;
    -o-transform: none !important;
    -webkit-transition: none !important;
    -moz-transition: none !important;
    -ms-transition: none !important;
    -o-transition: none !important;
}

.gallery-image-container {
    overflow: hidden !important;
}

.gallery-image-container:hover,
.gallery-image-container:hover img,
.gallery-image-container:hover .gallery-image {
    transform: none !important;
    scale: 1 !important;
    transition: none !important;
}

/* Override any Bootstrap or other library hover effects */
img[class*="gallery"]:hover,
*[class*="gallery"] img:hover {
    transform: none !important;
    scale: 1 !important;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gallery filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter gallery items
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    item.style.display = 'block';
                    item.classList.remove('hidden');
                } else {
                    item.style.display = 'none';
                    item.classList.add('hidden');
                }
            });
        });
    });
    
    // Gallery modal functionality
    const galleryImages = document.querySelectorAll('.gallery-image');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    
    galleryImages.forEach(img => {
        img.addEventListener('click', function() {
            const imageSrc = this.getAttribute('data-image');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');
            
            modalImage.src = imageSrc;
            modalTitle.textContent = title;
            modalDescription.textContent = description;
        });
    });
    
    // Force remove any zoom effects that might be added dynamically
    const allGalleryImages = document.querySelectorAll('.gallery-image, .gallery-image-container img, .gallery-card img, img[class*="gallery"]');
    
    function removeZoomEffect(img) {
        img.style.setProperty('transform', 'none', 'important');
        img.style.setProperty('scale', '1', 'important');
        img.style.setProperty('transition', 'none', 'important');
        img.style.setProperty('-webkit-transform', 'none', 'important');
        img.style.setProperty('-moz-transform', 'none', 'important');
    }
    
    allGalleryImages.forEach(img => {
        removeZoomEffect(img);
        
        // Remove zoom on all mouse events
        ['mouseenter', 'mouseleave', 'mouseover', 'mouseout', 'hover'].forEach(event => {
            img.addEventListener(event, function() {
                removeZoomEffect(this);
            });
        });
        
        // Use MutationObserver to watch for style changes
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                    removeZoomEffect(img);
                }
            });
        });
        
        observer.observe(img, {
            attributes: true,
            attributeFilter: ['style']
        });
    });
    
    // Also watch for dynamically added images
    const containerObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1) {
                    const newImages = node.querySelectorAll ? node.querySelectorAll('.gallery-image, .gallery-image-container img, .gallery-card img') : [];
                    newImages.forEach(removeZoomEffect);
                }
            });
        });
    });
    
    containerObserver.observe(document.body, {
        childList: true,
        subtree: true
    });
});
</script>
@endpush
