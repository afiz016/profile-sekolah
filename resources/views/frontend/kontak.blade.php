@extends('layouts.frontend')

@section('title', 'Kontak - Mi Ma\'arif NU 03 Tamansari')

@section('content')
<!-- Header Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark mb-3">Hubungi Kami</h1>
            <p class="lead text-muted">Kami siap membantu dan menjawab pertanyaan Anda</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5 bg-white" id="contact">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- Contact Information -->
            <div class="col-lg-5">
                <div class="contact-info">
                    <h3 class="mb-4 text-primary">Informasi Kontak</h3>
                    
                    @php
                        $alamatSekolah = \App\Models\Pengaturan::get('alamat_sekolah', 'RT. 01 RW. 19, Tamansari<br>Kec. Karangmoncol, Kab. Purbalingga<br>Jawa Tengah');
                        $teleponSekolah = \App\Models\Pengaturan::get('telepon_sekolah', '+62 812-3456-7890');
                        $emailSekolah = \App\Models\Pengaturan::get('email_sekolah', 'info@mimaarifnu03tamansari.sch.id');
                    @endphp
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h6>Alamat</h6>
                            <p>{!! nl2br(e($alamatSekolah)) !!}</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h6>Telepon</h6>
                            <p><a href="tel:{{ str_replace([' ', '-', '(', ')'], '', $teleponSekolah) }}">{{ $teleponSekolah }}</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h6>Email</h6>
                            <p><a href="mailto:{{ $emailSekolah }}">{{ $emailSekolah }}</a></p>
                        </div>
                    </div>
                    

                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h6>Jam Operasional</h6>
                            @php
                                $jamOperasional = \App\Models\Pengaturan::get('jam_operasional', 'Senin - Jumat: 07:00 - 15:00');
                                $jamOperasionalSabtu = \App\Models\Pengaturan::get('jam_operasional_sabtu', 'Sabtu: 07:00 - 12:00');
                            @endphp
                            <p>{{ $jamOperasional }}<br>{{ $jamOperasionalSabtu }}</p>
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="additional-info mt-4">
                        <div class="info-card">
                            <div class="info-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="info-content">
                                <h6>Jenjang Pendidikan</h6>
                                <p>Madrasah Ibtidaiyah (MI)<br>Kelas 1 - 6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="contact-form-container">
                    <h3 class="mb-4 text-primary">Kirim Pesan</h3>
                    <form id="contactForm" class="contact-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama Lengkap *</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telepon" class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subjek" class="form-label">Subjek *</label>
                                    <select class="form-control" id="subjek" name="subjek" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="informasi-pendaftaran">Informasi Pendaftaran</option>
                                        <option value="pertanyaan-akademik">Pertanyaan Akademik</option>
                                        <option value="kegiatan-sekolah">Kegiatan Sekolah</option>
                                        <option value="kerjasama">Kerjasama</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="pesan" class="form-label">Pesan *</label>
                                    <textarea class="form-control" id="pesan" name="pesan" rows="5" required placeholder="Tuliskan pesan Anda di sini..."></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-lg-8">
                <h3 class="mb-2">Lokasi Sekolah</h3>
                <p class="text-muted mb-0">MI Ma'arif NU 03 Tamansari terletak di Desa Tamansari, Kecamatan Karangmoncol, Kabupaten Purbalingga, Jawa Tengah</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="https://maps.google.com/?q=MI+Ma'arif+NU+03+Tamansari,+Karangmoncol,+Purbalingga,+Jawa+Tengah" 
                   target="_blank" 
                   class="btn btn-primary">
                    <i class="fas fa-directions me-2"></i>
                    Dapatkan Petunjuk Arah
                </a>
            </div>
        </div>
        
        <div class="map-container">
            <div class="map-overlay">
                <div class="map-info">
                    <h6><i class="fas fa-map-marker-alt me-2"></i>MI Ma'arif NU 03 Tamansari</h6>
                    <p class="mb-0">Dusun V, Tamansari, Kec. Karangmoncol<br>Kabupaten Purbalingga, Jawa Tengah 53355</p>
                </div>
            </div>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63317.81627380007!2d109.3884015083313!3d-7.312996984629075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ff91b428053e1%3A0x10804efb0a826db3!2sMI%20Ma&#39;arif%20NU%203%20Tamansari!5e0!3m2!1sid!2sid!4v1759671580093!5m2!1sid!2sid"
                width="100%" 
                height="450" 
                style="border:0; border-radius: 15px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.contact-info {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    height: fit-content;
    border: 1px solid rgba(59, 130, 246, 0.1);
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
    margin-bottom: 2rem;
    padding: 1.25rem;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.contact-item:hover {
    background: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.contact-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #3b82f6, #1e40af);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    flex-shrink: 0;
    box-shadow: 0 3px 10px rgba(59, 130, 246, 0.25);
}

.contact-details h6 {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.contact-details p {
    color: #4b5563;
    margin-bottom: 0;
    line-height: 1.6;
    font-size: 0.95rem;
}

.contact-details a {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.contact-details a:hover {
    color: var(--secondary-color);
    text-decoration: underline;
}



/* Additional Info Cards */
.additional-info {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.info-card {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 10px;
    transition: all 0.3s ease;
}

.info-card:hover {
    background: rgba(255, 255, 255, 0.8);
    transform: translateX(3px);
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}

.info-content h6 {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.25rem;
    font-size: 0.9rem;
}

.info-content p {
    color: #6b7280;
    margin-bottom: 0;
    font-size: 0.8rem;
    line-height: 1.3;
}

.contact-form-container {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border: 1px solid rgba(59, 130, 246, 0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 0.75rem;
    font-size: 0.95rem;
}

.form-control {
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    background: rgba(255, 255, 255, 0.8);
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
    background: white;
    transform: translateY(-1px);
}

.form-control::placeholder {
    color: #9ca3af;
    font-style: italic;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.map-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    position: relative;
    background: #f8f9fa;
    padding: 10px;
}

.map-container iframe {
    border-radius: 10px;
    transition: transform 0.3s ease;
}

.map-container:hover iframe {
    transform: scale(1.02);
}

/* Responsive map sizing */
@media (max-width: 768px) {
    .map-container {
        padding: 5px;
    }
    
    .map-container iframe {
        height: 300px !important;
    }
}

@media (max-width: 576px) {
    .map-container iframe {
        height: 250px !important;
    }
}

/* Map Overlay */
.map-overlay {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 10;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    max-width: 300px;
}

.map-info h6 {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 8px;
}

.map-info p {
    color: #6b7280;
    font-size: 0.9rem;
    line-height: 1.4;
}


/* Responsive adjustments */
@media (max-width: 768px) {
    .map-overlay {
        position: relative;
        top: auto;
        left: auto;
        margin-bottom: 15px;
        max-width: 100%;
    }
}

/* Button styling */
.btn-primary {
    background: linear-gradient(135deg, #3b82f6, #1e40af);
    border: none;
    border-radius: 10px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 3px 12px rgba(59, 130, 246, 0.25);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1e40af, #1e3a8a);
    transform: translateY(-1px);
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .contact-info,
    .contact-form-container {
        padding: 1.5rem;
    }
    
    .contact-item {
        flex-direction: column;
        text-align: center;
        margin-bottom: 2rem;
        padding: 1rem;
    }
    
    .contact-icon {
        margin: 0 auto 1rem auto;
    }
    
    .info-card {
        flex-direction: column;
        text-align: center;
        padding: 0.75rem;
    }
    
    .info-icon {
        margin: 0 auto 0.5rem auto;
    }
    

    
    .form-control {
        padding: 0.75rem 1rem;
    }
}

@media (max-width: 576px) {
    .contact-info,
    .contact-form-container {
        padding: 1.25rem;
        border-radius: 15px;
    }
    
    .contact-item {
        padding: 0.75rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Clear previous validation
        clearValidation();
        
        // Get form data
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        
        // Validate form
        if (validateForm(data)) {
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengirim...';
            submitBtn.disabled = true;
            
            // Send AJAX request
            fetch('{{ route("kontak.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    showAlert('success', result.message);
                    form.reset();
                } else {
                    showAlert('danger', result.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showAlert('danger', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
            })
            .finally(() => {
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        }
    });
    
    function validateForm(data) {
        let isValid = true;
        
        // Validate name
        if (!data.nama || data.nama.trim().length < 2) {
            showFieldError('nama', 'Nama harus minimal 2 karakter');
            isValid = false;
        }
        
        // Validate email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!data.email || !emailRegex.test(data.email)) {
            showFieldError('email', 'Email tidak valid');
            isValid = false;
        }
        
        // Validate subject
        if (!data.subjek) {
            showFieldError('subjek', 'Pilih subjek pesan');
            isValid = false;
        }
        
        // Validate message
        if (!data.pesan || data.pesan.trim().length < 10) {
            showFieldError('pesan', 'Pesan harus minimal 10 karakter');
            isValid = false;
        }
        
        return isValid;
    }
    
    function showFieldError(fieldName, message) {
        const field = document.getElementById(fieldName);
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        
        field.classList.add('is-invalid');
        feedback.textContent = message;
    }
    
    function clearValidation() {
        const fields = form.querySelectorAll('.form-control');
        fields.forEach(field => {
            field.classList.remove('is-invalid');
        });
    }
    
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        form.insertBefore(alertDiv, form.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
});
</script>
@endpush
