@extends('layouts.frontend')

@section('title', 'Profil Sekolah - Mi Ma\'arif NU 03 Tamansari')

@section('content')
<!-- Header Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 pe-lg-4">
                <h1 class="h3 fw-bold text-dark mb-3">Profil Sekolah</h1>
                <p class="text-muted fs-6 text-justify mb-3">MI MAARIF NU 3 TAMANSARI, terletak di Desa Tamansari, Kecamatan Karangmoncol, Kabupaten Purbalingga, Provinsi Jawa Tengah, adalah sebuah sekolah dasar swasta yang berada di bawah naungan Kementerian Agama.</p>
                <p class="text-muted text-justify mb-3">Sekolah ini telah berdiri sejak tahun 1975, dengan SK Pendirian No. K/2591/3/75 yang dikeluarkan pada tanggal 31 Januari 1975. MI MAARIF NU 3 TAMANSARI berkomitmen untuk memberikan pendidikan berkualitas bagi anak-anak di wilayah Tamansari dan sekitarnya.</p>
                <p class="text-muted text-justify mb-3">MI MA`ARIF NU 3 TAMANSARI telah mendapatkan akreditasi B berdasarkan SK No. 1012/BAN-SM/SK/2019 yang dikeluarkan pada tanggal 18 November 2019. Hal ini membuktikan bahwa sekolah telah memenuhi standar mutu pendidikan yang ditetapkan oleh Badan Akreditasi Nasional Sekolah/Madrasah (BAN-SM).</p>
                <p class="text-muted text-justify mb-0">Sekolah ini fokus pada jenjang pendidikan MI (Madrasah Ibtidaiyah), memberikan pendidikan dasar bagi siswa-siswi Muslim di lingkungan sekitar. MI MA` ARIF NU 3 TAMANSARI menjunjung tinggi nilai-nilai agama dan moral, serta memberikan pendidikan yang holistik dan berimbang, baik dalam bidang akademik maupun non-akademik.</p>
            </div>
            <div class="col-lg-6 ps-lg-4">
                <img src="{{ asset('images/gambar/home.jpg') }}" 
                     class="img-fluid w-100 rounded-3 shadow-lg" alt="Gedung Sekolah" style="object-fit: cover;" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Visi, Misi, dan Tujuan Section (pricing-like cards) -->
<section class="py-5 vision-section">
    <div class="container">
        <h2 class="section-title">Visi, Misi, dan Tujuan</h2>

        <div class="row g-4 vision-cards">
            <!-- Card Visi (made light/white) -->
            <div class="col-lg-4">
                <div class="vision-card h-100">
                    <h5 class="mb-2">Visi</h5>
                    <p class="sub mb-3">Islami Mandiri Berprestasi Dan Peduli</p>
                    <ul class="checklist mb-0">
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Membangun karakter Islami</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mendorong kemandirian</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Berprestasi dan peduli lingkungan</span></li>
                    </ul>
                </div>
            </div>

            <!-- Card Misi (light) -->
            <div class="col-lg-4">
                <div class="vision-card h-100">
                    <h5 class="mb-2">Misi</h5>
                    <p class="sub">Ringkasan misi sekolah</p>
                    <ul class="checklist mb-0">
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Menyelenggarakan pembelajaran yang PAIKEM dalam upaya membentuk generasi umat yang Islami dan berkualitas.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Membentuk generasi umat yang taat dan tekun beribadah baik wajib maupun sunnah, serta mampu membaca Al-Qur'an dengan baik dan benar.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mewujudkan generasi umat yang santun bertutur dan berperilaku.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mewujudkan peserta didik yang unggul dalam prestasi akademik dan non akademik.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mewujudkan peserta didik yang peduli terhadap sesama makhluk hidup dan lingkungan.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Memberi kesempatan atau melayani peserta didik yang berkebutuhan khusus.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Menciptakan lingkungan madrasah yang ramah anak.</span></li>
                    </ul>
                </div>
            </div>

            <!-- Card Tujuan (light) -->
            <div class="col-lg-4">
                <div class="vision-card h-100">
                    <h5 class="mb-2">Tujuan</h5>
                    <p class="sub">Ringkasan tujuan sekolah</p>
                    <ul class="checklist mb-0">
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Memberikan dasar pendidikan agama Islam yang kuat kepada peserta didik agar menjadi pribadi yang beriman, bertakwa, dan berakhlak mulia.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mengembangkan kemampuan intelektual dan keterampilan dasar peserta didik sesuai kurikulum nasional dan kebutuhan masyarakat.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mempersiapkan peserta didik agar mampu melanjutkan ke jenjang pendidikan yang lebih tinggi dengan bekal akademik dan spiritual yang memadai.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Menanamkan nilai-nilai sosial, budaya, dan nasionalisme dalam kehidupan sehari-hari siswa.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mendorong kemandirian, kedisiplinan, dan rasa tanggung jawab dalam kehidupan pribadi maupun sosial.</span></li>
                        <li><span class="dot"><i class="fas fa-check"></i></span><span>Mengintegrasikan kemajuan teknologi dalam proses pembelajaran dan manajemen sekolah.</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5 bg-white values-section">
    <div class="container">
        <h2 class="section-title">Nilai-Nilai Kami</h2>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="value-card dark">
                    <div class="icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="text">
                        <h5>Inovasi</h5>
                        <p>Dalam setiap langkah inovasi pembelajaran</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="value-card lime">
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="text">
                        <h5>Integritas</h5>
                        <p>Dengan nilai-nilai Pancasila dan Karakter</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="value-card light">
                    <div class="icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <div class="text">
                        <h5>Kualitas</h5>
                        <p>Mengutamakan kualitas dalam setiap aspek</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="value-card blue">
                    <div class="icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="text">
                        <h5>Prestasi</h5>
                        <p>Meraih prestasi terbaik di berbagai bidang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- School Info Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Informasi Sekolah</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nama Sekolah:</strong> MI MA`ARIF NU 3 TAMANSARI</p>
                                <p><strong>NPSN:</strong> 60710578</p>
                                <p><strong>Status:</strong> Swasta</p>
                                <p><strong>Jenjang Pendidikan:</strong> MI</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Alamat:</strong> RT. 01 RW. 19, Tamansari, Kec. Karangmoncol</p>
                                <p><strong>Kabupaten:</strong> Purbalingga</p>
                                <p><strong>Provinsi:</strong> Jawa Tengah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
