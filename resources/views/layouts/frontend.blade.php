<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Mi Ma\'arif NU 03 Tamansari')</title>
    <meta name="description" content="@yield('meta_description', 'Website resmi Mi Ma\'arif NU 03 Tamansari - informasi sekolah, profil, berita, dan galeri.')">
    <!-- Open Graph / Twitter -->
    <meta property="og:title" content="@yield('title', 'Mi Ma\'arif NU 03 Tamansari')">
    <meta property="og:description" content="@yield('meta_description', 'Website resmi Mi Ma\'arif NU 03 Tamansari - informasi sekolah, profil, berita, dan galeri.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:image" content="{{ asset('images/logos/logo1.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Mi Ma\'arif NU 03 Tamansari')">
    <meta name="twitter:description" content="@yield('meta_description', 'Website resmi Mi Ma\'arif NU 03 Tamansari - informasi sekolah, profil, berita, dan galeri.')">
    <meta name="twitter:image" content="{{ asset('images/logos/logo1.png') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e40af;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --dark-color: #1f2937;
            --radius-card: 20px;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .btn-primary-custom {
            background-color: #000000;
            border-color: #000000;
            color: #ffffff;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            background-color: #ffffff;
            border-color: #ffffff;
            color: #000000;
            transform: translateY(-2px);
        }
        
        .navbar-nav .nav-link.active {
            color: var(--primary-color) !important;
            border-bottom: 2px solid var(--primary-color);
        }
        /* Sticky navbar with subtle blur on scroll */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1020;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
            transition: box-shadow .2s ease, backdrop-filter .2s ease, background-color .2s ease;
        }
        .navbar.nav-scrolled {
            background-color: rgba(255,255,255,0.85) !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            box-shadow: 0 6px 18px rgba(2,6,23,0.06);
        }
        
        .hero-section {
            background-color: transparent;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 500px;
            display: flex;
            align-items: center;
            color: white;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .hero-content h1 {
            font-size: clamp(2.25rem, 6vw, 3rem);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: .2px;
            margin-bottom: 1rem;
            text-shadow: 0 4px 18px rgba(0,0,0,.35);
        }
        
        .hero-content p {
            font-size: clamp(1rem, 2.2vw, 1.5rem);
            font-weight: 500;
            color: rgba(255,255,255,.92);
            margin-bottom: 2rem;
            text-shadow: 0 2px 12px rgba(0,0,0,.35);
        }

        /* Pill highlight inside hero subtitle like the reference */
        .hero-content .hero-pill {
            display: inline-block;
            padding: .15rem .6rem;
            border-radius: .6rem;
            background: #0f0f0f;
            color: #ffffff;
            box-shadow: 0 6px 14px rgba(0,0,0,.28);
            line-height: 1.2;
            margin: 0 .15rem;
            white-space: nowrap;
        }
        .card-stats {
            border: none;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease;
            height: 100%;
        }
        
        .card-stats:hover {
            transform: translateY(-5px);
        }
        
        .card-stats.blue {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
        }
        
        .card-stats.green {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }
        
        .card-stats.orange {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }
        
        .card-stats h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .card-stats p {
            font-size: 1rem;
            margin-bottom: 0;
            opacity: 0.9;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 3rem;
            text-align: center;
        }
        /* Services section (home) */
        .services-eyebrow {
            display: block;
            text-align: center;
            font-size: .95rem;
            font-weight: 600;
            color: #7c7c7c;
            margin-bottom: .5rem;
        }
        .services-title {
            text-align: center;
            font-weight: 800;
            line-height: 1.15;
            font-size: clamp(1.8rem, 3.5vw, 3.25rem);
            color: #0f172a;
            margin-bottom: 2rem;
        }
        .services-title .highlight {
            position: relative;
            display: inline-block;
            z-index: 0;
        }
        .services-title .highlight::after {
            content: "";
            position: absolute;
            left: .15rem;
            right: .15rem;
            bottom: .2rem;
            height: .9em;
            background: #dbeafe; /* soft blue highlight */
            border-radius: .35rem;
            z-index: -1;
            opacity: .9;
        }
        .service-card {
            border-radius: 22px;
            padding: 1.75rem;
            height: 100%;
            box-shadow: 0 10px 28px rgba(0,0,0,0.08);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .service-card:hover { transform: translateY(-6px); box-shadow: 0 16px 40px rgba(0,0,0,0.12); }
        .service-card .service-icon {
            width: 56px; height: 56px; border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.25rem; margin-bottom: .9rem;
            background: #0f0f0f; color: var(--primary-color);
        }
        .service-card h5 { font-weight: 700; margin-bottom: .35rem; }
        .service-card p { margin: 0; color: #6b7280; }
        .service-card.dark { background: #111; color: #e5e7eb; }
        .service-card.dark .service-icon { background: #0b0b0b; color: var(--primary-color); }
        .service-card.dark h5, .service-card.dark p { color: #e5e7eb; }
        .service-card.lime { background: #eff6ff; color: #0b0b0b; }
        .service-card.lime .service-icon { background: #0b0b0b; color: var(--primary-color); border: 1px solid rgba(255,255,255,0.25); }
        .service-card.lime p { color: rgba(0,0,0,0.7); }
        .service-card.light { background: #fff; }
        .service-card.light .service-icon { background: #111; color: #b7ff4f; }
        .service-card.white { background: #ffffff; color: #0f172a; border: 1px solid rgba(15,23,42,0.06); }
        .service-card.white .service-icon { background: #0f0f0f; color: var(--primary-color); border: 1px solid rgba(0,0,0,0.06); }
        .service-card.white h5, .service-card.white p { color: #0f172a; }
        
        .card-news {
            border: none;
            border-radius: var(--radius-card);
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .card-news:hover {
            transform: translateY(-5px);
        }
        
        .card-news img {
            height: 200px;
            object-fit: cover;
        }
        /* Style for small news card button: Baca Selengkapnya */
        .card-news .btn.btn-primary.btn-sm {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: #ffffff;
            font-weight: 600;
        }
        .card-news .btn.btn-primary.btn-sm:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: #ffffff;
            transform: translateY(-1px);
        }
        
        .footer {
            background-color: #0f1113; /* deep dark */
            color: #e5e7eb;
            padding: 3rem 0 2rem 0;
        }
        .footer h5 { color: #fff; font-weight: 700; }
        .footer p { color: #cbd5e1; margin-bottom: .5rem; }
        .footer i { color: #b7ff4f; }
        .footer .social a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 34px; height: 34px; border-radius: 8px; margin-right: .5rem;
            color: #0f1113; background: #b7ff4f; text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .footer .social a i { font-size: 1rem; color: #0f1113 !important; }
        .footer .social a svg { width: 22px; height: 22px; fill: #0f1113 !important; display: block; }
        .footer .social a svg path { fill: #0f1113 !important; stroke: #0f1113 !important; stroke-width: 1.2; }
        .footer .social a:hover { transform: translateY(-2px); box-shadow: 0 8px 16px rgba(183,255,79,.25); }
        .footer hr { border-color: rgba(255,255,255,0.12); }
        .footer .copyright { color: #94a3b8; }
        
        .value-card {
            background: white;
            border-radius: var(--radius-card);
            padding: 1.5rem 2rem;
            text-align: left;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            height: 100%;
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }
        
        .value-card:hover {
            transform: translateY(-5px);
        }
        
        .value-card .icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-size: 1.6rem;
            flex: 0 0 64px;
            background: #0f0f0f; /* black circle like reference */
            color: var(--primary-color); /* blue glyph */
            border: 1px solid rgba(255,255,255,0.15);
        }
        .value-card .text { flex: 1; }
        
        .value-card.blue .icon {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
        }
        
        .value-card.green .icon {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }
        
        .value-card.orange .icon {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        /* Value card color variants - color the entire card background */
        .value-card.blue {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: #fff;
        }
        .value-card.green {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            color: #fff;
        }
        .value-card.orange {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: #fff;
        }
        /* New variants to match home services look */
        .value-card.dark { background: #111; color: #e5e7eb; }
        .value-card.dark h5, .value-card.dark p { color: #e5e7eb; }
        .value-card.lime { background: #b7ff4f; color: #0b0b0b; }
        .value-card.lime h5, .value-card.lime p { color: #0b0b0b; }
        .value-card.light { background: #ffffff; color: #0f172a; }
        .value-card.blue h5, .value-card.blue p,
        .value-card.green h5, .value-card.green p,
        .value-card.orange h5, .value-card.orange p {
            color: #fff;
        }
        /* Make icon contrast on colored cards */
        .value-card.blue .icon,
        .value-card.green .icon,
        .value-card.orange .icon {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.35);
        }

        /* Values Section: force cards to white background regardless of variant */
        .values-section .value-card,
        .values-section .value-card.dark,
        .values-section .value-card.lime,
        .values-section .value-card.light,
        .values-section .value-card.blue,
        .values-section .value-card.green,
        .values-section .value-card.orange {
            background: #ffffff !important;
            color: #0f172a !important;
            border: 1px solid rgba(15,23,42,0.06);
        }
        .values-section .value-card h5,
        .values-section .value-card p {
            color: #0f172a !important;
        }
        .values-section .value-card .icon {
            background: #0f0f0f !important;
            color: var(--primary-color) !important;
            border: 1px solid rgba(0,0,0,0.06) !important;
        }
        /* Hover to black for values cards */
        .values-section .value-card:hover {
            background: #0f0f0f !important;
            color: #e5e7eb !important;
            border-color: #0f0f0f !important;
        }
        .values-section .value-card:hover h5,
        .values-section .value-card:hover p {
            color: #e5e7eb !important;
        }
        .values-section .value-card:hover .icon {
            background: #0b0b0b !important;
            color: var(--primary-color) !important;
            border-color: rgba(255,255,255,0.15) !important;
        }

        /* Visi & Misi tidy styles */
        .visi-misi h2 {
            font-size: 1.75rem;
        }
        .visi-misi h4 {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }
        .visi-misi ul li {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }
        .visi-misi ul li i {
            color: var(--success-color);
            width: 1.25rem;
        }
        .visi-misi .illustration {
            max-height: 320px;
            object-fit: cover;
            border-radius: 12px;
        }
        
        /* Modern Vision/Mission Section */
        .vision-section {
            position: relative;
            background:rgb(250, 250, 250) !important; /* soft green */
            overflow: hidden;
        }
        .vision-section::before,
        .vision-section::after { display: none; }
        .vision-section .section-title {
            color: #111 !important;
            letter-spacing: 0.3px;
        }
        /* Vision quote font styling */
        .vision-quote {
            font-size: clamp(1.25rem, 2.5vw, 1.75rem);
            font-weight: 700;
            font-style: italic;
            color: #0f172a; /* very dark slate for strong contrast */
            letter-spacing: 0.2px;
        }
        .glass-card {
            background: rgba(255,255,255,0.7);
            border: 1px solid rgba(255,255,255,0.6);
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.08);
            border-radius: 16px;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .glass-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.12);
        }
        .glass-card h5 {
            font-weight: 700;
            color: #111;
        }
        .glass-card ol {
            padding-left: 1rem;
        }
        .glass-card ol li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }
        .vision-section i {
            font-size: 1.1rem;
        }

        /* Modern numbered list */
        .modern-list { counter-reset: item; list-style: none; padding-left: 0; }
        .modern-list li { position: relative; padding-left: 2.75rem; margin-bottom: 0.85rem; }
        .modern-list li::before {
            counter-increment: item;
            content: counter(item);
            position: absolute;
            left: 0; top: 0.1rem;
            width: 2rem; height: 2rem; line-height: 2rem; text-align: center;
            border-radius: 10px;
            color: #fff; font-weight: 700;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            box-shadow: 0 6px 14px rgba(30,64,175,0.25);
        }

        /* Pricing-like cards for Visi Misi Tujuan */
        .vision-cards .vision-card {
            border-radius: var(--radius-card);
            padding: 1.5rem;
            height: 100%;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            border: 1px solid rgba(15,23,42,0.08);
            background: #fff;
        }
        .vision-cards .vision-card.dark {
            background: #0f1113;
            color: #e5e7eb;
            border-color: #0f1113;
        }
        .vision-cards .vision-card h5 { font-weight: 700; }
        .vision-cards .vision-card.dark h5,
        .vision-cards .vision-card.dark p,
        .vision-cards .vision-card.dark li { color: #e5e7eb; }
        .vision-cards .checklist { list-style: none; padding: 0; margin: 0; }
        .vision-cards .checklist li { display: flex; gap: .5rem; align-items: flex-start; margin-bottom: .5rem; color: #475569; }
        .vision-cards .vision-card.dark .checklist li { color: #cbd5e1; }
        .vision-cards .checklist .dot { width: 22px; height: 22px; border-radius: 50%; background: #b7ff4f; display: inline-flex; align-items: center; justify-content: center; flex: 0 0 22px; }
        .vision-cards .checklist .dot i { color: #0f1113; font-size: .85rem; }
        .vision-cards .sub { color: #6b7280; margin-bottom: .75rem; }
        .vision-cards .vision-card.dark .sub { color: #cbd5e1; opacity: .9; }

        /* Reveal animations */
        .reveal { opacity: 0; transform: translateY(20px); transition: all 500ms ease; }
        .reveal.show { opacity: 1; transform: translateY(0); }

        /* Utilities */
        .text-justify { text-align: justify; text-justify: inter-word; }
        .leading-relaxed { line-height: 1.8; }
        /* Accessible focus styles */
        a:focus-visible, .btn:focus-visible, .nav-link:focus-visible {
            outline: 3px solid rgba(59, 130, 246, 0.6);
            outline-offset: 2px;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }
        
        /* Remove hover effects on navbar brand and logo */
        .navbar-brand:hover {
            transform: none !important;
            scale: none !important;
        }
        
        .navbar-brand img:hover {
            transform: none !important;
            scale: none !important;
        }
        
        /* Remove all hover effects on gallery images */
        .gallery-image-container img:hover,
        .gallery-card img:hover,
        img.gallery-image:hover,
        .gallery-item img:hover {
            transform: none !important;
            scale: none !important;
            zoom: none !important;
            transition: none !important;
        }
        
        /* Disable all image hover effects globally */
        .gallery-image-container,
        .gallery-card,
        .gallery-item {
            overflow: hidden !important;
        }
        
        .gallery-image-container:hover,
        .gallery-card:hover {
            overflow: hidden !important;
        }
        
        /* Force disable all transforms and transitions on gallery images */
        .gallery-image-container img,
        .gallery-card img,
        .gallery-item img,
        img.gallery-image,
        [class*="gallery"] img {
            transform: none !important;
            scale: 1 !important;
            zoom: 1 !important;
            transition: none !important;
            animation: none !important;
            -webkit-transform: none !important;
            -moz-transform: none !important;
        }
        
        .gallery-image-container img:hover,
        .gallery-card img:hover,
        .gallery-item img:hover,
        img.gallery-image:hover,
        [class*="gallery"] img:hover {
            transform: none !important;
            scale: 1 !important;
            zoom: 1 !important;
            transition: none !important;
            animation: none !important;
            -webkit-transform: none !important;
            -moz-transform: none !important;
        }

        /* Testimonial Cards */
        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .testimonial-content {
            flex: 1;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-text {
            font-style: italic;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 0;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .author-info h6 {
            margin-bottom: 0;
            font-weight: 600;
            color: #1f2937;
        }
        
        .author-info small {
            color: #6b7280;
        }

        /* Counter Animation */
        .counter {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        /* Gallery Styles */
        .gallery-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .gallery-image-container {
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        
        .gallery-image {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            cursor: pointer !important;
            transition: none !important;
            transform: none !important;
            scale: 1 !important;
            zoom: 1 !important;
        }
        
        .gallery-image:hover,
        .gallery-image:focus,
        .gallery-image:active {
            transform: none !important;
            scale: 1 !important;
            transition: none !important;
            zoom: 1 !important;
            -webkit-transform: none !important;
            -moz-transform: none !important;
        }
        
        /* Gallery hover effects - subtle and elegant */
        .gallery-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .gallery-image {
            transition: opacity 0.3s ease;
        }
        
        .gallery-card:hover .gallery-image {
            opacity: 0.9;
        }
        
        /* Prevent zoom on images only, allow other hover effects */
        .gallery-image {
            transform: none !important;
            scale: 1 !important;
        }
        
        .gallery-image:hover {
            transform: none !important;
            scale: 1 !important;
        }
        
        /* Gallery overlay icon removed */
        
        .gallery-info {
            padding: 1rem;
        }
        
        .gallery-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1f2937;
            font-size: 1rem;
        }
        
        .gallery-description {
            color: #6b7280;
            font-size: 0.875rem;
            line-height: 1.4;
            margin-bottom: 0.75rem;
            margin-top: 0;
        }
        
        .gallery-category {
            background: linear-gradient(135deg, #3b82f6, #1e40af);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .filter-btn {
            margin: 0 0.25rem;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }
        
        .filter-btn.active,
        .filter-btn:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .gallery-item {
            transition: all 0.3s ease;
        }
        
        .gallery-item.hidden {
            display: none;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="d-flex align-items-center me-2">
                    <img src="{{ asset('images/logos/logo1.png') }}" alt="Logo NU" class="me-1" style="height: 30px;">
                    <img src="{{ asset('images/logos/logo2.png') }}" alt="Logo Kemenag" style="height: 40px;">
                </div>
                Mi Ma'arif NU 03 Tamansari
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}" href="{{ route('informasi') }}">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('galeri') ? 'active' : '' }}" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row gy-4 align-items-start">
                <div class="col-lg-6">
                    <h5>Mi Ma'arif NU 03 Tamansari</h5>
                    <p>Terdepan dalam pendidikan, berkarakter dan berprestasi.</p>
                    <div class="social mt-2">
                        <a href="https://www.instagram.com/mima3tamansari?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 1.9.2 2.6.5.7.3 1.2.6 1.8 1.2.6.6.9 1.1 1.2 1.8.3.7.5 1.4.5 2.6.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 1.9-.5 2.6-.3.7-.6 1.2-1.2 1.8-.6.6-1.1.9-1.8 1.2-.7.3-1.4.5-2.6.5-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-1.9-.2-2.6-.5a4.9 4.9 0 0 1-1.8-1.2 4.9 4.9 0 0 1-1.2-1.8c-.3-.7-.5-1.4-.5-2.6C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.9c.1-1.2.2-1.9.5-2.6.3-.7.6-1.2 1.2-1.8.6-.6 1.1-.9 1.8-1.2.7-.3 1.4-.5 2.6-.5C8.4 2.2 8.8 2.2 12 2.2Zm0 1.8c-3.1 0-3.5 0-4.7.1-1 .1-1.6.2-2 .4-.5.2-.8.4-1.1.8-.3.3-.6.6-.8 1.1-.2.4-.3 1-.4 2-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c.1 1 .2 1.6.4 2 .2.5.4.8.8 1.1.3.3.6.6 1.1.8.4.2 1 .3 2 .4 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1-.1 1.6-.2 2-.4.5-.2.8-.4 1.1-.8.3-.3.6-.6.8-1.1.2-.4.3-1 .4-2 .1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c-.1-1-.2-1.6-.4-2-.2-.5-.4-.8-.8-1.1-.3-.3-.6-.6-1.1-.8-.4-.2-1-.3-2-.4-1.2-.1-1.6-.1-4.7-.1Zm0 3.1a6.9 6.9 0 1 1 0 13.8 6.9 6.9 0 0 1 0-13.8Zm0 1.8a5.1 5.1 0 1 0 0 10.2 5.1 5.1 0 0 0 0-10.2Zm6.9-1.4a1.6 1.6 0 1 1-3.3 0 1.6 1.6 0 0 1 3.3 0Z"/>
                            </svg>
                        </a>
                        <a href="https://l.instagram.com/?u=https%3A%2F%2Fwww.facebook.com%2Fmi.maarif.9003%3Fmibextid%3DZbWKwL&e=AT34uGC8e_F6VsS4jVPiwX1rnaOSI5n2srlU5CfrqZL2ZTduSFDuZN9DmlCCeM76R-TGQOwnRu9lUERrllZU2KEVqBx9ptgL8PtAQk5O1A" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://l.instagram.com/?u=https%3A%2F%2Fwww.youtube.com%2F%40mima3tamansari%3Ffbclid%3DPAZXh0bgNhZW0CMTEAAacIuHe__-xYsINPJ5aTyMh0bChrMTBduDH-P5eqODqPu_M6c6zLL7JBaIilZA_aem_UvChNSctRDzpaoqDQBxNtQ&e=AT31TJ9RnlvSqobO2astsgIp7kDkixKbq1L2awvxYkw7oWrbQ2W5_RnJpU8FXpolmL7sMKFKFp32WjFLlIQtNS7_Q07hYhqdCv6D_kN3Fw" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M23.5 7.5s-.2-1.6-.8-2.4c-.8-.8-1.7-.8-2.1-.9C17.8 4 12 4 12 4h0s-5.8 0-8.6.2c-.4 0-1.3.1-2.1.9-.6.8-.8 2.4-.8 2.4S0 9.4 0 11.3v1.4c0 1.9.2 3.8.2 3.8s.2 1.6.8 2.4c.8.8 1.9.8 2.4.9 1.8.2 7.6.2 7.6.2s5.8 0 8.6-.2c.4 0 1.3-.1 2.1-.9.6-.8.8-2.4-.8-2.4s.2-1.9.2-3.8v-1.4c0-1.9-.2-3.8-.2-3.8ZM9.6 14.9V8.9l6.2 3-6.2 3Z"/>
                            </svg>
                        </a>
                        @php
                            $whatsappNumber = \App\Models\Pengaturan::get('whatsapp_sekolah');
                            $whatsappUrl = $whatsappNumber ? 'https://wa.me/' . $whatsappNumber . '?text=Halo,%20saya%20ingin%20bertanya%20tentang%20MI%20Ma\'arif%20NU%2003%20Tamansari' : '#';
                        @endphp
                        @if($whatsappNumber && !empty(trim($whatsappNumber)))
                        <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
                        @else
                        <a href="#" onclick="alert('Nomor WhatsApp belum dikonfigurasi'); return false;" aria-label="WhatsApp">
                        @endif
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.51 3.488"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5>Kontak</h5>
                    @php
                        $alamatSekolah = \App\Models\Pengaturan::get('alamat_sekolah', 'RT. 01 RW. 19, Tamansari Kec. Karangmoncol, Kab. Purbalingga Jawa Tengah');
                        $teleponSekolah = \App\Models\Pengaturan::get('telepon_sekolah', '(021) 123-4567');
                        $emailSekolah = \App\Models\Pengaturan::get('email_sekolah', 'info@mimaarifnu03tamansari.sch.id');
                    @endphp
                    <p><i class="fas fa-map-marker-alt me-2"></i> {{ $alamatSekolah }}</p>
                    <p><i class="fas fa-phone me-2"></i> {{ $teleponSekolah }}</p>
                    <p><i class="fas fa-envelope me-2"></i> {{ $emailSekolah }}</p>
                </div>

            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="copyright">&copy; {{ date('Y') }} Mi Ma'arif NU 03 Tamansari. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple scroll reveal for elements with .reveal
        (function(){
            const els = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window) || els.length === 0) {
                els.forEach(el => el.classList.add('show'));
                return;
            }
            const io = new IntersectionObserver((entries)=>{
                entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('show'); io.unobserve(e.target); } });
            }, { threshold: 0.15 });
            els.forEach(el => io.observe(el));
        })();

        // Toggle navbar blur/shadow on scroll
        (function(){
            const nav = document.querySelector('.navbar');
            if(!nav) return;
            const onScroll = () => {
                if(window.scrollY > 10) nav.classList.add('nav-scrolled');
                else nav.classList.remove('nav-scrolled');
            };
            onScroll();
            window.addEventListener('scroll', onScroll, { passive: true });
        })();

        // Counter Animation
        (function(){
            const counters = document.querySelectorAll('.counter');
            if(counters.length === 0) return;
            
            const animateCounter = (counter) => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16); // 60fps
                let current = 0;
                
                const timer = setInterval(() => {
                    current += increment;
                    if(current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    counter.textContent = Math.floor(current);
                }, 16);
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if(entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => observer.observe(counter));
        })();

        // Gallery Filter and Modal
        (function(){
            // Gallery Filter
            const filterBtns = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('.gallery-item');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    btn.classList.add('active');
                    
                    const filter = btn.getAttribute('data-filter');
                    
                    galleryItems.forEach(item => {
                        if(filter === 'all' || item.getAttribute('data-category') === filter) {
                            item.classList.remove('hidden');
                        } else {
                            item.classList.add('hidden');
                        }
                    });
                });
            });
            
            // Gallery Modal
            const galleryModal = document.getElementById('galleryModal');
            if(galleryModal) {
                galleryModal.addEventListener('show.bs.modal', (event) => {
                    const button = event.relatedTarget;
                    const image = button.getAttribute('data-image');
                    const title = button.getAttribute('data-title');
                    const description = button.getAttribute('data-description');
                    
                    const modalImage = galleryModal.querySelector('#modalImage');
                    const modalTitle = galleryModal.querySelector('#modalTitle');
                    const modalDescription = galleryModal.querySelector('#modalDescription');
                    
                    modalImage.src = image;
                    modalImage.alt = title;
                    modalTitle.textContent = title;
                    modalDescription.textContent = description || '';
                });
            }
        })();


    </script>
    @stack('scripts')
</body>
</html>
