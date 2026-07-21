<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($seoMeta->title) && $seoMeta->title ? $seoMeta->title : View::getSection('title', 'نورِ اسلام | Noor-e-Islam') }}</title>
    <meta name="description" content="{{ isset($seoMeta->meta_description) && $seoMeta->meta_description ? $seoMeta->meta_description : (isset($seoMeta->description) && $seoMeta->description ? $seoMeta->description : View::getSection('meta_description', 'Noor-e-Islam: Accurate Islamic knowledge, prayer times, and Quran.')) }}">
    @if(View::hasSection('meta_keywords'))
    <meta name="keywords" content="@yield('meta_keywords')">
    @endif

    <!-- SEO Canonical and Hreflang -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="canonical" href="{{ isset($seoMeta->canonical_url) && $seoMeta->canonical_url ? $seoMeta->canonical_url : (View::hasSection('canonical') ? View::getSection('canonical') : url()->current()) }}">

    @if(isset($seoMeta->schema_override_json) && $seoMeta->schema_override_json)
    <script type="application/ld+json">
    {!! $seoMeta->schema_override_json !!}
    </script>
    @endif
    @yield('schema')
    @php
        $currentRouteName = Route::currentRouteName();
        $routeParams = Route::current() ? Route::current()->parameters() : [];
    @endphp
    @if($currentRouteName)
        <link rel="alternate" hreflang="x-default" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => null])) }}" />
        <link rel="alternate" hreflang="en" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => null])) }}" />
        <link rel="alternate" hreflang="ur" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'ur'])) }}" />
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap"></noscript>
    
    
    @yield('og_meta')
    
    @if(isset($seoMeta) && isset($seoMeta->og_title))
    <meta property="og:title" content="{{ $seoMeta->og_title }}">
    <meta property="og:description" content="{{ $seoMeta->og_description ?? '' }}">
    <meta property="og:image" content="{{ $seoMeta->og_image ?? '' }}">
    <meta property="og:url" content="{{ $seoMeta->canonical_url ?? url()->current() }}">
    <meta property="og:type" content="article">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoMeta->twitter_title ?? $seoMeta->og_title }}">
    <meta name="twitter:description" content="{{ $seoMeta->twitter_description ?? $seoMeta->og_description ?? '' }}">
    <meta name="twitter:image" content="{{ $seoMeta->twitter_image ?? $seoMeta->og_image ?? '' }}">
    @endif

    
    @yield('head')


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --bg-main: #F7F8FA;
            --bg-alt: #FFFFFF;
            --bg-tinted: #EFF2F7;
            --card-bg: #FFFFFF;
            --navy: #0A1F3F;
            --navy-mid: #0F2D52;
            --navy-light: #14466E;
            --navy-soft: #1A5C8A;
            --navy-tint: #E4EBF3;
            --navy-glow: rgba(10, 31, 63, 0.12);
            --gold: #C9A84C;
            --gold-light: #E4D08C;
            --gold-dark: #8A6E2F;
            --gold-glow: rgba(201, 168, 76, 0.25);
            --gold-tint: #FBF8EE;
            --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
            --emerald: #0D7C5F;
            --emerald-light: #10A37F;
            --emerald-tint: #E8F5F0;
            --text-dark: #0C1425;
            --text-medium: #4A5568;
            --text-light: #8E9AB0;
            --text-faint: #B8C2D4;
            --white: #ffffff;
            --border: #DFE5ED;
            --border-light: #EDF0F5;
            --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
            --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
            --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
            --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
            --shadow-xl: 0 24px 64px rgba(10, 31, 63, 0.14);
            --shadow-2xl: 0 32px 80px rgba(10, 31, 63, 0.18);
            --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
            --shadow-navy: 0 12px 40px rgba(10, 31, 63, 0.25);
            --radius-xs: 8px;
            --radius-sm: 14px;
            --radius-md: 22px;
            --radius-lg: 32px;
            --radius-xl: 44px;
            --radius-full: 9999px;
            --tr: all .45s cubic-bezier(.25, .46, .45, .94);
            --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
            --tr-bounce: all .5s cubic-bezier(.34, 1.56, .64, 1);
        }

        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-main);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--navy);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--navy-light);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg-main);
            color: var(--text-dark);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        ::selection {
            background: var(--navy);
            color: var(--gold-light);
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            line-height: 1.1;
            letter-spacing: -.5px;
        }

        .arabic {
            font-family: 'Scheherazade New', serif;
            line-height: 2.2;
        }

        .islamic-pattern {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: .04;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230A1F3F' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .gold-line {
            width: 60px;
            height: 3px;
            border-radius: 2px;
            margin: 0 auto 20px;
            background: var(--gold-gradient);
            box-shadow: 0 0 12px var(--gold-glow);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(255, 255, 255, 0.80);
            backdrop-filter: saturate(200%) blur(24px);
            -webkit-backdrop-filter: saturate(200%) blur(24px);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(223, 229, 237, 0.6);
            transition: var(--tr);
            color: var(--text-dark);
        }

        .navbar.scrolled {
            box-shadow: 0 4px 24px rgba(10, 31, 63, 0.08);
            background: rgba(255, 255, 255, 0.96);
            border-bottom-color: transparent;
        }

        .navbar-inner {
            max-width: 1150px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .logo-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 20px var(--navy-glow), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: var(--tr);
            position: relative;
            overflow: hidden;
        }

        .logo-icon::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 40%, rgba(255, 255, 255, 0.08) 50%, transparent 60%);
            transition: var(--tr);
        }

        .logo-icon i {
            color: var(--gold);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .logo:hover .logo-icon {
            transform: rotate(-5deg) scale(1.08);
            border-radius: 50%;
        }

        .logo:hover .logo-icon::after {
            transform: translateX(100%);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text-ar {
            font-family: 'Amiri', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--navy);
            line-height: 1.15;
        }

        .logo-text-en {
            font-size: .55rem;
            color: var(--gold-dark);
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-medium);
            font-size: .8rem;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            transition: var(--tr-fast);
            position: relative;
            white-space: nowrap;
            letter-spacing: .2px;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--gold);
            border-radius: 2px;
            transition: var(--tr-fast);
        }

        .nav-links a:hover {
            color: var(--navy);
            background: rgba(10, 31, 63, 0.04);
        }

        .nav-links a:hover::after {
            width: 16px;
        }

        .nav-links a.active {
            color: var(--navy);
            font-weight: 600;
        }

        .nav-links a.active::after {
            width: 16px;
        }

        .nav-cta {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid)) !important;
            color: var(--white) !important;
            padding: 9px 20px !important;
            border-radius: var(--radius-full) !important;
            font-weight: 600 !important;
            box-shadow: var(--shadow-sm), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            margin-left: 4px;
            border: 1px solid rgba(255, 255, 255, 0.05) !important;
            letter-spacing: .2px !important;
        }

        .nav-cta:hover {
            background: linear-gradient(145deg, var(--navy-mid), var(--navy-light)) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md), inset 0 1px 0 rgba(255, 255, 255, 0.1) !important;
        }

        .nav-cta::after {
            display: none !important;
        }

        .mobile-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            cursor: pointer;
            padding: 8px;
            border: none;
            background: none;
            z-index: 1002;
        }

        .mobile-toggle span {
            width: 24px;
            height: 2px;
            background: var(--navy);
            border-radius: 2px;
            transition: var(--tr);
        }

        .mobile-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* ===== MOBILE MENU ===== */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            z-index: 1001;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 28px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .mobile-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .mobile-menu a {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--navy);
            text-decoration: none;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .mobile-menu.active a {
            opacity: 1;
            transform: translateY(0);
        }

        .mobile-menu a:nth-child(1) { transition-delay: 0.1s; }
        .mobile-menu a:nth-child(2) { transition-delay: 0.15s; }
        .mobile-menu a:nth-child(3) { transition-delay: 0.2s; }
        .mobile-menu a:nth-child(4) { transition-delay: 0.25s; }
        .mobile-menu a:nth-child(5) { transition-delay: 0.3s; }
        .mobile-menu a:nth-child(6) { transition-delay: 0.35s; }
        .mobile-menu a:nth-child(7) { transition-delay: 0.4s; }
        .mobile-menu a:nth-child(8) { transition-delay: 0.45s; }

        .mobile-menu a:hover {
            color: var(--gold);
            transform: scale(1.05);
        }

        /* ===== HERO ===== */
        .hero {
            position: relative;
            min-height: 92vh;
            display: flex;
            align-items: center;
            background: var(--bg-main);
            overflow: hidden;
            padding: 60px 0 40px;
            color: var(--text-dark);
        }

        .hero-bg-pattern {
            position: absolute;
            top: 0;
            right: 0;
            width: 55%;
            height: 100%;
            background-image: radial-gradient(var(--navy-tint) 1px, transparent 1px);
            background-size: 28px 28px;
            mask-image: linear-gradient(to left, rgba(0, 0, 0, 0.5), transparent 70%);
            -webkit-mask-image: linear-gradient(to left, rgba(0, 0, 0, 0.5), transparent 70%);
            z-index: 1;
        }

        .hero-glow-1 {
            position: absolute;
            top: 10%;
            left: -5%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.06), transparent 65%);
            border-radius: 50%;
            filter: blur(60px);
            pointer-events: none;
            z-index: 1;
        }

        .hero-glow-2 {
            position: absolute;
            bottom: 0;
            right: 5%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(10, 31, 63, 0.06), transparent 65%);
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 1;
        }

        .hero-inner {
            max-width: 1150px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            gap: 70px;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .hero-content {
            color: var(--text-dark);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--white);
            padding: 8px 20px;
            border-radius: var(--radius-full);
            font-size: .78rem;
            font-weight: 600;
            margin-bottom: 32px;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-xs);
            color: var(--navy);
            letter-spacing: .3px;
        }

        .hero-badge i {
            color: var(--gold);
            font-size: .75rem;
        }

        .hero-bismillah {
            font-size: 2.6rem;
            color: var(--navy);
            margin-bottom: 18px;
            opacity: .85;
        }

        .hero-title {
            font-size: 4.2rem;
            font-weight: 700;
            margin-bottom: 24px;
            color: var(--navy);
            line-height: 1.05;
        }

        .hero-title span {
            font-style: italic;
            color: var(--gold-dark);
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--text-medium);
            margin-bottom: 40px;
            max-width: 480px;
            line-height: 1.85;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            color: var(--white);
            padding: 15px 34px;
            border-radius: var(--radius-full);
            text-decoration: none;
            font-weight: 600;
            font-size: .92rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            cursor: pointer;
            box-shadow: var(--shadow-md), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transition: var(--tr);
            letter-spacing: .3px;
        }

        .btn-primary:hover {
            background: linear-gradient(145deg, var(--navy-mid), var(--navy-light));
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .btn-primary i {
            font-size: .85rem;
        }

        .btn-outline-hero {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--white);
            color: var(--navy);
            padding: 15px 34px;
            border-radius: var(--radius-full);
            text-decoration: none;
            font-weight: 600;
            font-size: .92rem;
            border: 1px solid var(--border);
            cursor: pointer;
            box-shadow: var(--shadow-xs);
            transition: var(--tr);
            letter-spacing: .3px;
        }

        .btn-outline-hero:hover {
            border-color: var(--navy);
            background: var(--white);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .hero-visual {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 520px;
        }

        .hero-visual-bg-card {
            position: absolute;
            width: 100%;
            height: 100%;
            max-width: 420px;
            max-height: 420px;
            background: linear-gradient(150deg, var(--navy) 0%, var(--navy-mid) 50%, var(--navy-light) 100%);
            border-radius: var(--radius-xl);
            z-index: 1;
            box-shadow: var(--shadow-2xl);
            transform: rotate(-6deg);
            overflow: hidden;
        }

        .hero-visual-bg-card .islamic-pattern {
            opacity: .06;
        }

        .hero-visual-main-card {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(24px);
            border-radius: var(--radius-xl);
            padding: 44px;
            width: 100%;
            max-width: 390px;
            box-shadow: var(--shadow-2xl);
            border: 1px solid rgba(255, 255, 255, 0.7);
            color: var(--text-dark);
        }

        .main-card-icon {
            width: 56px;
            height: 56px;
            background: var(--gold-tint);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-dark);
            font-size: 1.1rem;
            margin-bottom: 22px;
            border: 1px solid rgba(201, 168, 76, 0.15);
            box-shadow: var(--shadow-xs);
        }

        .main-card-arabic {
            font-size: 2rem;
            color: var(--navy);
            margin-bottom: 14px;
            text-align: right;
        }

        .main-card-trans {
            font-size: 1rem;
            color: var(--text-medium);
            font-style: italic;
            margin-bottom: 28px;
            font-family: 'Cormorant Garamond', serif;
            line-height: 1.6;
        }

        .hero-stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 28px;
            border-top: 1px solid var(--border-light);
            padding-top: 28px;
        }

        .hero-stat-item {
            text-align: center;
        }

        .hero-stat-item h4 {
            font-size: 1.4rem;
            color: var(--navy);
            margin-bottom: 2px;
            font-family: 'Cormorant Garamond', serif;
        }

        .hero-stat-item p {
            font-size: .7rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .floating-ayah-card {
            position: absolute;
            bottom: -16px;
            left: -24px;
            z-index: 3;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            padding: 18px 26px;
            border-radius: var(--radius-md);
            box-shadow: 0 16px 40px rgba(10, 31, 63, 0.15);
            display: flex;
            align-items: center;
            gap: 14px;
            transition: var(--tr);
            color: var(--text-dark);
        }

        .floating-ayah-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 48px rgba(10, 31, 63, 0.2);
        }

        .floating-ayah-card .f-icon {
            width: 44px;
            height: 44px;
            background: var(--gold-tint);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-dark);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .floating-ayah-card h5 {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            color: var(--navy);
        }

        .floating-ayah-card p {
            font-size: .72rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .hero-float-star {
            position: absolute;
            z-index: 3;
            color: var(--gold);
            opacity: .15;
            font-size: 1.2rem;
            animation: floatStar 6s ease-in-out infinite;
        }

        .hero-float-star:nth-child(1) {
            top: 10%;
            right: 5%;
            animation-delay: 0s;
        }

        .hero-float-star:nth-child(2) {
            top: 60%;
            right: -5%;
            animation-delay: 2s;
            font-size: .8rem;
        }

        .hero-float-star:nth-child(3) {
            bottom: 15%;
            left: 10%;
            animation-delay: 4s;
            font-size: 1rem;
        }

        @keyframes floatStar {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(15deg);
            }
        }

        /* ===== PRAYER WIDGET ===== */
        .prayer-widget-section {
            background: var(--bg-main);
            padding: 0 0 90px;
            margin-top: -50px;
            position: relative;
            z-index: 5;
            color: var(--text-dark);
        }

        .prayer-widget {
            max-width: 1140px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border-radius: var(--radius-lg);
            padding: 28px 36px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            color: var(--text-dark);
        }

        .pw-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .pw-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(145deg, var(--navy-tint), var(--white));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-size: 1.2rem;
            border: 1px solid var(--border-light);
            box-shadow: var(--shadow-xs);
        }

        .pw-text h4 {
            font-size: 1.35rem;
            color: var(--navy);
            margin-bottom: 2px;
        }

        .pw-text p {
            font-size: .82rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .pw-list {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .pw-time {
            background: var(--bg-main);
            padding: 12px 18px;
            border-radius: var(--radius-sm);
            text-align: center;
            border: 1px solid var(--border-light);
            transition: var(--tr);
            min-width: 80px;
            color: var(--text-dark);
        }

        .pw-time:hover {
            border-color: var(--navy-tint);
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .pw-time.active {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            color: var(--white);
            border-color: transparent;
            box-shadow: var(--shadow-navy);
        }

        .pw-time.active .pw-val {
            color: var(--gold-light);
        }

        .pw-name {
            font-size: .65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-light);
            font-weight: 700;
            margin-bottom: 5px;
            display: block;
        }

        .pw-time.active .pw-name {
            color: rgba(255, 255, 255, 0.6);
        }

        .pw-val {
            font-size: 1rem;
            font-weight: 700;
            color: var(--navy);
            font-variant-numeric: tabular-nums;
        }

        /* ===== SECTION COMMON ===== */
        .section {
            padding: 120px 0;
            position: relative;
            color: var(--text-dark);
        }

        .section-inner {
            max-width: 1150px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 72px;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--navy-tint);
            color: var(--navy);
            padding: 7px 18px;
            border-radius: var(--radius-full);
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 18px;
            border: 1px solid var(--border-light);
        }

        .section-badge i {
            color: var(--gold);
            font-size: .7rem;
        }

        .section-title {
            font-size: 2.9rem;
            color: var(--navy);
            margin-bottom: 16px;
        }

        .section-title span {
            color: var(--gold-dark);
            font-style: italic;
        }

        .section-subtitle {
            font-size: 1.02rem;
            color: var(--text-medium);
            max-width: 560px;
            margin: 0 auto;
            line-height: 1.85;
        }

        /* ===== EXPLORE FEATURES ===== */
        .explore-features-section {
            padding: 110px 0 100px;
            position: relative;
            overflow: hidden;
            color: var(--text-dark);
        }

        .explore-features-section::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.04), transparent 55%);
            border-radius: 50%;
            pointer-events: none;
        }

        .explore-features-section .section-bismillah {
            font-family: 'Scheherazade New', serif;
            font-size: 2rem;
            color: var(--gold-dark);
            margin-bottom: 10px;
            opacity: .7;
        }

        .explore-features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .explore-feature-card {
            display: flex;
            flex-direction: column;
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 36px 30px 32px;
            text-decoration: none;
            color: var(--text-dark);
            position: relative;
            overflow: hidden;
            transition: var(--tr);
            box-shadow: var(--shadow-xs);
        }

        .explore-feature-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--tr);
        }

        .explore-feature-card::after {
            content: "";
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent);
            border-radius: 50%;
            opacity: 0;
            transition: var(--tr);
            pointer-events: none;
        }

        .explore-feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--navy-tint);
        }

        .explore-feature-card:hover::before {
            transform: scaleX(1);
        }

        .explore-feature-card:hover::after {
            opacity: 1;
        }

        .explore-feature-card:hover .ef-icon-wrap {
            background: var(--navy);
            border-color: var(--navy);
            box-shadow: var(--shadow-navy);
        }

        .explore-feature-card:hover .ef-icon-wrap i {
            color: var(--gold-light);
        }

        .ef-icon-wrap {
            width: 56px;
            height: 56px;
            background: var(--navy-tint);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            transition: var(--tr);
            flex-shrink: 0;
        }

        .ef-icon-wrap i {
            font-size: 1.05rem;
            color: var(--navy);
            transition: var(--tr);
        }

        .ef-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 12px;
            line-height: 1.2;
            transition: var(--tr-fast);
        }

        .explore-feature-card:hover .ef-title {
            color: var(--navy-mid);
        }

        .ef-desc {
            font-size: .9rem;
            color: var(--text-medium);
            line-height: 1.75;
            margin-bottom: 28px;
            flex-grow: 1;
        }

        .ef-cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            font-weight: 600;
            color: var(--navy);
            padding: 11px 24px;
            border-radius: var(--radius-full);
            border: 1.5px solid var(--border);
            background: transparent;
            transition: var(--tr);
            align-self: flex-start;
            letter-spacing: .2px;
        }

        .ef-cta i {
            font-size: .7rem;
            transition: var(--tr-fast);
        }

        .explore-feature-card:hover .ef-cta {
            background: var(--navy);
            border-color: var(--navy);
            color: var(--white);
        }

        .explore-feature-card:hover .ef-cta i {
            transform: translateX(3px);
            color: var(--gold-light);
        }

        /* ===== ABOUT SECTION — REDESIGNED ===== */
        .about-section {
            background: var(--bg-alt);
            position: relative;
            overflow: hidden;
        }

        .about-section::before {
            content: "";
            position: absolute;
            top: -120px;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.05), transparent 55%);
            border-radius: 50%;
            pointer-events: none;
        }

        .about-section::after {
            content: "";
            position: absolute;
            bottom: -200px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(10, 31, 63, 0.03), transparent 60%);
            border-radius: 50%;
            pointer-events: none;
        }

        .about-content-wrap {
            text-align: center;
            max-width: 780px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .about-content-wrap .about-bismillah {
            font-size: 2.1rem;
            color: var(--gold-dark);
            margin-bottom: 8px;
            opacity: .75;
        }

        .about-content-wrap .about-gold-line {
            width: 60px;
            height: 3px;
            border-radius: 2px;
            margin: 0 auto 24px;
            background: var(--gold-gradient);
            box-shadow: 0 0 12px var(--gold-glow);
        }

        .about-content-wrap h2 {
            font-size: 3rem;
            color: var(--navy);
            margin-bottom: 20px;
            line-height: 1.1;
        }

        .about-content-wrap h2 span {
            color: var(--gold-dark);
            font-style: italic;
        }

        .about-content-wrap .about-desc {
            font-size: 1.05rem;
            color: var(--text-medium);
            line-height: 1.9;
            margin-bottom: 56px;
            max-width: 640px;
            margin-left: auto;
            margin-right: auto;
        }

        .about-features-new {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            max-width: 960px;
            margin: 0 auto 52px;
            position: relative;
            z-index: 2;
        }

        .af-card {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 32px 24px 28px;
            text-decoration: none;
            color: var(--text-dark);
            position: relative;
            overflow: hidden;
            transition: var(--tr);
            box-shadow: var(--shadow-xs);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .af-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--tr);
        }

        .af-card::after {
            content: "";
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.08), transparent);
            border-radius: 50%;
            opacity: 0;
            transition: var(--tr);
            pointer-events: none;
        }

        .af-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
            border-color: var(--navy-tint);
        }

        .af-card:hover::before {
            transform: scaleX(1);
        }

        .af-card:hover::after {
            opacity: 1;
        }

        .af-card:hover .af-icon {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            border-color: var(--navy);
            box-shadow: var(--shadow-navy);
        }

        .af-card:hover .af-icon i {
            color: var(--gold-light);
        }

        .af-icon {
            width: 42px; height: 42px;
            background: var(--navy-tint);
            border: 1px solid var(--border-light);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            transition: var(--tr);
            flex-shrink: 0;
        }

        .af-icon i {
            font-size: 1.15rem;
            color: var(--navy);
            transition: var(--tr);
        }

        .af-card h4 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .af-card p {
            font-size: .85rem;
            color: var(--text-light);
            line-height: 1.6;
        }

        .about-cta-wrap {
            position: relative;
            z-index: 2;
        }

        /* ===== PILLARS SECTION ===== */
        .pillars-section {
            background: linear-gradient(160deg, var(--navy) 0%, var(--navy-mid) 50%, #0D1B33 100%);
            position: relative;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.6);
        }

        .pillars-section .islamic-pattern {
            opacity: .03;
        }

        .pillars-section::after {
            content: "";
            position: absolute;
            bottom: -20%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.08), transparent 60%);
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .pillars-section .section-badge {
            background: rgba(255, 255, 255, 0.06);
            color: var(--gold-light);
            border-color: rgba(255, 255, 255, 0.08);
        }

        .pillars-section .section-title {
            color: var(--white);
        }

        .pillars-section .section-title span {
            color: var(--gold-light);
        }

        .pillars-section .section-subtitle {
            color: rgba(255, 255, 255, 0.55);
        }

        .pillars-section .gold-line {
            box-shadow: 0 0 16px rgba(201, 168, 76, 0.3);
        }

        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            position: relative;
            z-index: 2;
        }

        .pillar-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: var(--radius-md);
            padding: 36px 20px;
            text-align: center;
            transition: var(--tr);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            color: rgba(255, 255, 255, 0.6);
        }

        .pillar-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold-gradient);
            transform: scaleX(0);
            transition: var(--tr);
            transform-origin: left;
        }

        .pillar-card::after {
            content: "";
            position: absolute;
            bottom: -30px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent);
            border-radius: 50%;
            opacity: 0;
            transition: var(--tr);
        }

        .pillar-card:hover {
            background: rgba(255, 255, 255, 0.07);
            transform: translateY(-10px);
            border-color: rgba(201, 168, 76, 0.2);
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.25);
            color: rgba(255, 255, 255, 0.7);
        }

        .pillar-card:hover::before {
            transform: scaleX(1);
        }

        .pillar-card:hover::after {
            opacity: 1;
        }

        .pillar-num {
            width: 38px;
            height: 38px;
            background: var(--gold-gradient);
            color: var(--navy);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin: 0 auto 20px;
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            transition: var(--tr);
            box-shadow: var(--shadow-gold);
        }

        .pillar-card:hover .pillar-num {
            transform: scale(1.12) rotate(-5deg);
        }

        .pillar-icon {
            font-size: 1.6rem;
            margin-bottom: 16px;
            display: block;
            color: rgba(255, 255, 255, 0.7);
        }

        .pillar-card h3 {
            font-size: 1.1rem;
            color: var(--white);
            margin-bottom: 6px;
        }

        .pillar-card .arabic {
            font-size: 1.05rem;
            color: var(--gold-light);
            margin-bottom: 14px;
            display: block;
        }

        .pillar-card p {
            font-size: .82rem;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.65;
        }

        /* ===== QURAN CAROUSEL ===== */
        .quran-wrapper {
            display: flex;
            flex-direction: column;
            gap: 60px;
            max-width: 1140px;
            margin: 0 auto;
            color: var(--text-dark);
        }

        .verse-carousel-container {
            position: relative;
            width: 100%;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .verse-carousel-track {
            display: flex;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .verse-slide-card {
            flex: 0 0 100%;
            position: relative;
            background: linear-gradient(150deg, var(--navy) 0%, var(--navy-mid) 40%, var(--navy-light) 100%);
            padding: 70px 50px;
            min-height: 420px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.75);
        }

        .verse-slide-card .islamic-pattern {
            opacity: .05;
        }

        .verse-slide-card::after {
            content: "\f6cb";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16rem;
            color: var(--white);
            opacity: .025;
            z-index: 0;
            pointer-events: none;
        }

        .verse-slide-card .arabic {
            font-size: 2.5rem;
            color: var(--white);
            margin-bottom: 22px;
            z-index: 1;
            position: relative;
        }

        .verse-slide-card .translation {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.75);
            font-style: italic;
            margin-bottom: 28px;
            max-width: 600px;
            z-index: 1;
            position: relative;
            font-family: 'Cormorant Garamond', serif;
            line-height: 1.7;
        }

        .verse-slide-card .bento-ref {
            z-index: 1;
            position: relative;
        }

        .verse-slide-card .bento-ref span {
            display: inline-block;
            background: rgba(201, 168, 76, 0.15);
            color: var(--gold-light);
            padding: 9px 22px;
            border-radius: var(--radius-full);
            font-size: .78rem;
            font-weight: 700;
            border: 1px solid rgba(201, 168, 76, 0.2);
            letter-spacing: .5px;
        }

        .carousel-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-top: 32px;
        }

        .carousel-btn {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-full);
            background: var(--white);
            border: 1px solid var(--border-light);
            color: var(--navy);
            cursor: pointer;
            transition: var(--tr);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .9rem;
            box-shadow: var(--shadow-xs);
        }

        .carousel-btn:hover {
            background: var(--navy);
            color: var(--gold);
            border-color: var(--navy);
            transform: scale(1.08);
            box-shadow: var(--shadow-md);
        }

        .carousel-dots {
            display: flex;
            gap: 8px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: var(--radius-full);
            background: var(--border);
            cursor: pointer;
            transition: var(--tr);
            border: none;
            padding: 0;
        }

        .dot.active {
            background: var(--navy);
            width: 32px;
            border-radius: 5px;
        }

        .quran-features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .quran-feature-card {
            display: flex;
            align-items: center;
            gap: 24px;
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 36px;
            box-shadow: var(--shadow-sm);
            transition: var(--tr);
            color: var(--text-dark);
        }

        .quran-feature-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-6px);
            border-color: var(--navy-tint);
        }

        .quran-feature-card .feat-icon {
            width: 64px;
            height: 64px;
            background: var(--navy-tint);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--navy);
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: var(--tr);
        }

        .quran-feature-card:hover .feat-icon {
            background: var(--navy);
            color: var(--gold);
            border-radius: var(--radius-full);
        }

        .quran-feature-card .feat-content h4 {
            font-size: 1.15rem;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .quran-feature-card .feat-content p {
            font-size: .88rem;
            color: var(--text-medium);
            margin-bottom: 14px;
            line-height: 1.7;
        }

        .quran-feature-card .feat-content .btn-text {
            font-weight: 600;
            color: var(--navy);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--tr);
            font-size: .88rem;
        }

        .quran-feature-card .feat-content .btn-text:hover {
            gap: 14px;
            color: var(--gold-dark);
        }

        .quran-feature-card.gold {
            background: linear-gradient(150deg, var(--navy), var(--navy-mid));
            border: none;
            position: relative;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.7);
        }

        .quran-feature-card.gold::before {
            content: "";
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            background: var(--gold);
            border-radius: 50%;
            opacity: .1;
            filter: blur(30px);
        }

        .quran-feature-card.gold .feat-icon {
            background: rgba(255, 255, 255, 0.08);
            color: var(--gold-light);
        }

        .quran-feature-card.gold:hover .feat-icon {
            background: var(--gold);
            color: var(--navy);
        }

        .quran-feature-card.gold .feat-content h4 {
            color: var(--white);
        }

        .quran-feature-card.gold .feat-content p {
            color: rgba(255, 255, 255, 0.6);
        }

        .quran-feature-card.gold .feat-content .btn-text {
            color: var(--gold-light);
        }

        .quran-feature-card.gold .feat-content .btn-text:hover {
            color: var(--white);
        }

        /* ===== AYAH SECTION ===== */
        .ayah-section {
            background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
            padding: 60px 0;
            position: relative;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.7);
        }

        .ayah-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 75% 20%, rgba(201, 168, 76, 0.12), transparent 50%), radial-gradient(ellipse at 25% 80%, rgba(255, 255, 255, 0.03), transparent 50%);
        }

        .ayah-section .islamic-pattern {
            opacity: .03;
        }

        .ayah-content {
            text-align: center;
            position: relative;
            z-index: 2;
            max-width: 880px;
            margin: 0 auto;
        }

        .ayah-arabic {
            font-size: 2.3rem;
            color: var(--white);
            margin: 36px 0;
            line-height: 1.9;
        }

        .ayah-translation {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.7);
            font-style: italic;
            font-family: 'Cormorant Garamond', serif;
            margin-bottom: 28px;
            line-height: 1.7;
        }

        .ayah-ref {
            display: inline-block;
            padding: 10px 28px;
            background: rgba(201, 168, 76, 0.12);
            border-radius: var(--radius-full);
            color: var(--gold-light);
            font-weight: 700;
            font-size: .85rem;
            border: 1px solid rgba(201, 168, 76, 0.2);
            letter-spacing: .5px;
        }

        /* ===== 99 NAMES ===== */
        .names-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 16px;
        }

        .name-card {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 32px;
            position: relative;
            overflow: hidden;
            transition: var(--tr);
            color: var(--text-dark);
        }

        .name-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold-gradient);
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--tr);
        }

        .name-card::after {
            content: "";
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            background: var(--gold-tint);
            border-radius: 50%;
            opacity: 0;
            transition: var(--tr);
            filter: blur(20px);
        }

        .name-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: var(--navy-tint);
        }

        .name-card:hover::before {
            transform: scaleX(1);
        }

        .name-card:hover::after {
            opacity: 1;
        }

        .name-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .name-num {
            font-size: 2rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            color: var(--border);
        }

        .name-card:hover .name-num {
            color: var(--navy-tint);
        }

        .name-arabic {
            font-size: 1.6rem;
            color: var(--gold-dark);
        }

        .name-card h4 {
            font-size: 1.1rem;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .name-meaning {
            font-size: .88rem;
            color: var(--text-medium);
            line-height: 1.7;
        }

        /* ===== EVENTS & RESOURCES ===== */
        .bento-events {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        .events-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .event-item {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 24px 28px;
            display: flex;
            align-items: center;
            gap: 24px;
            transition: var(--tr);
            color: var(--text-dark);
        }

        .event-item:hover {
            border-color: var(--navy-tint);
            box-shadow: var(--shadow-md);
            transform: translateX(6px);
        }

        .event-date {
            background: var(--navy-tint);
            color: var(--navy);
            padding: 14px 18px;
            border-radius: var(--radius-sm);
            text-align: center;
            min-width: 72px;
            border: 1px solid var(--border-light);
        }

        .event-date .day {
            font-size: 1.15rem;
            font-weight: 700;
            font-family: 'Cormorant Garamond', serif;
            display: block;
        }

        .event-date .month {
            font-size: .68rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .event-info h4 {
            font-size: 1.05rem;
            color: var(--navy);
            margin-bottom: 4px;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
        }

        .event-info p {
            font-size: .82rem;
            color: var(--text-light);
        }

        .event-info p i {
            color: var(--gold);
            margin-right: 6px;
        }

        .resources-box {
            background: linear-gradient(150deg, var(--navy), var(--navy-mid));
            border-radius: var(--radius-lg);
            padding: 36px;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .resources-box .islamic-pattern {
            opacity: .04;
        }

        .resources-box::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background: var(--gold);
            border-radius: 50%;
            opacity: .08;
            filter: blur(50px);
        }

        .resources-box h4 {
            font-size: 1.7rem;
            color: var(--white);
            margin-bottom: 14px;
            position: relative;
            z-index: 2;
        }

        .resources-box p {
            font-size: .88rem;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 28px;
            position: relative;
            z-index: 2;
            line-height: 1.7;
        }

        .resource-links {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            position: relative;
            z-index: 2;
        }

        .res-link {
            background: rgba(255, 255, 255, 0.05);
            padding: 14px 8px;
            border-radius: var(--radius-sm);
            text-align: center;
            color: var(--white);
            text-decoration: none;
            font-size: .72rem;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.06);
            transition: var(--tr);
            letter-spacing: .2px;
        }

        .res-link:hover {
            background: var(--gold);
            color: var(--navy);
            transform: scale(1.05);
            border-color: var(--gold);
            box-shadow: var(--shadow-gold);
        }

        .res-link i {
            display: block;
            font-size: 1.05rem;
            margin-bottom: 8px;
            color: var(--gold-light);
        }

        .res-link:hover i {
            color: var(--navy);
        }

        /* ===== CONTACT ===== */
        .contact-section .section-inner {
            max-width: 1140px;
        }

        .contact-card-wide {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            position: relative;
        }

        .contact-card-wide::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold-gradient);
            z-index: 3;
        }

        .contact-info-side {
            background: linear-gradient(160deg, var(--navy) 0%, var(--navy-mid) 100%);
            color: rgba(255, 255, 255, 0.7);
            padding: 56px 44px;
            position: relative;
            overflow: hidden;
        }

        .contact-info-side .islamic-pattern {
            opacity: .04;
        }

        .contact-info-side::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background: var(--gold);
            border-radius: 50%;
            opacity: .08;
            filter: blur(50px);
        }

        .contact-info-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .contact-info-content h3 {
            font-size: 1.6rem;
            color: var(--white);
            margin-bottom: 14px;
        }

        .contact-info-content>p {
            font-size: .92rem;
            color: rgba(255, 255, 255, 0.6);
            margin-bottom: 44px;
            line-height: 1.7;
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 30px;
        }

        .contact-info-item i {
            width: 46px;
            height: 46px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold-light);
            font-size: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.06);
            flex-shrink: 0;
        }

        .contact-info-item h4 {
            font-size: 1rem;
            color: var(--white);
            margin-bottom: 4px;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
        }

        .contact-info-item p {
            font-size: .88rem;
            color: rgba(255, 255, 255, 0.5);
            margin: 0;
        }

        .contact-form-side {
            padding: 56px 44px;
            color: var(--text-dark);
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-size: .82rem;
            font-weight: 600;
            color: var(--text-medium);
            letter-spacing: .3px;
        }

        .form-group input,
        .form-group textarea {
            font-family: 'Outfit', sans-serif;
            font-size: .92rem;
            color: var(--text-dark);
            background: var(--bg-main);
            border: 1.5px solid var(--border-light);
            border-radius: var(--radius-sm);
            padding: 14px 18px;
            outline: none;
            transition: var(--tr);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--navy);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(10, 31, 63, 0.06);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--text-faint);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-submit-btn {
            width: 100%;
            justify-content: center;
            margin-top: 8px;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(160deg, var(--navy) 0%, #070F1F 100%);
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .footer .islamic-pattern {
            opacity: .02;
        }

        .footer-top {
            padding: 90px 0 70px;
            position: relative;
            z-index: 2;
        }

        .footer-grid {
            max-width: 1150px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
            gap: 50px;
        }

        .footer-brand .logo {
            margin-bottom: 28px;
        }

        .footer-brand .logo-text-ar {
            color: var(--white);
        }

        .footer-brand .logo-text-en {
            color: var(--gold);
        }

        .footer-brand p {
            font-size: .88rem;
            line-height: 1.9;
            margin-bottom: 28px;
            color: rgba(255, 255, 255, 0.45);
        }

        .footer-newsletter {
            display: flex;
            gap: 10px;
            max-width: 360px;
        }

        .footer-newsletter input {
            flex: 1;
            padding: 14px 18px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-sm);
            background: rgba(255, 255, 255, 0.04);
            color: var(--white);
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            outline: none;
            transition: var(--tr);
        }

        .footer-newsletter input::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }

        .footer-newsletter input:focus {
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.06);
        }

        .footer-newsletter button {
            padding: 14px 22px;
            background: var(--gold-gradient);
            color: var(--navy);
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-weight: 700;
            font-size: .82rem;
            transition: var(--tr);
            letter-spacing: .3px;
        }

        .footer-newsletter button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-gold);
        }

        .footer-col h4 {
            color: var(--white);
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 26px;
            position: relative;
            padding-bottom: 16px;
            font-family: 'Cormorant Garamond', serif;
        }

        .footer-col h4::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 28px;
            height: 2px;
            background: var(--gold);
            border-radius: 2px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 14px;
        }

        .footer-col ul li a {
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            font-size: .88rem;
            transition: var(--tr-fast);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-col ul li a:hover {
            color: var(--gold-light);
            transform: translateX(4px);
        }

        .footer-col ul li a i {
            font-size: .55rem;
            color: var(--gold);
            opacity: .4;
        }

        .footer-prayer-times {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .footer-prayer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 255, 255, 0.04);
            transition: var(--tr-fast);
        }

        .footer-prayer-item:hover {
            background: rgba(255, 255, 255, 0.06);
        }

        .footer-prayer-item .fp-name {
            font-size: .82rem;
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
        }

        .footer-prayer-item .fp-time {
            font-size: .82rem;
            font-weight: 700;
            color: var(--gold-light);
            font-variant-numeric: tabular-nums;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            padding: 28px 0;
            position: relative;
            z-index: 2;
        }

        .footer-bottom-inner {
            max-width: 1150px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .footer-bottom p {
            font-size: .82rem;
            color: rgba(255, 255, 255, 0.35);
        }

        .footer-bottom p a {
            color: var(--gold-light);
            text-decoration: none;
            transition: var(--tr-fast);
        }

        .footer-bottom p a:hover {
            color: var(--gold);
        }

        .footer-bottom-links {
            display: flex;
            gap: 24px;
        }

        .footer-bottom-links a {
            font-size: .82rem;
            color: rgba(255, 255, 255, 0.35);
            text-decoration: none;
            transition: var(--tr-fast);
        }

        .footer-bottom-links a:hover {
            color: var(--gold-light);
        }

        /* ===== MOBILE MENU ===== */
        .mobile-menu {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(24px);
            z-index: 1001;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--text-dark);
        }

        .mobile-menu.active {
            display: flex;
        }

        .mobile-menu a {
            text-decoration: none;
            color: var(--navy);
            font-size: 1.1rem;
            font-weight: 600;
            padding: 16px 32px;
            border-radius: var(--radius-sm);
            transition: var(--tr-fast);
            font-family: 'Cormorant Garamond', serif;
        }

        .mobile-menu a:hover {
            background: var(--navy-tint);
        }

        /* ===== SCROLL ANIMATIONS ===== */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ===== DAILY DUAS SECTION (VIP ENHANCED) ===== */
        .duas-section {
            background: linear-gradient(180deg, #F9FAFC 0%, #FFFFFF 100%);
            position: relative;
            overflow: hidden;
        }

        .duas-section::before {
            content: "";
            position: absolute;
            top: 10%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.06), transparent 60%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }

        .duas-section::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(10, 31, 63, 0.05), transparent 60%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }

        .duas-header-wrap {
            position: relative;
            text-align: center;
            margin-bottom: 35px;
        }

        .duas-bismillah {
            font-family: 'Scheherazade New', serif;
            font-size: 1.6rem;
            color: var(--gold-dark);
            margin-bottom: 6px;
            opacity: .8;
        }

        .duas-view-all-btn {
            position: absolute;
            top: 10px;
            right: 0;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            color: var(--white);
            padding: 13px 28px;
            border-radius: var(--radius-full);
            text-decoration: none;
            font-weight: 600;
            font-size: .85rem;
            border: 1px solid transparent;
            box-shadow: 0 8px 20px rgba(10, 31, 63, 0.2);
            transition: var(--tr);
            letter-spacing: .3px;
            font-family: 'Outfit', sans-serif;
            z-index: 5;
        }

        .duas-view-all-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(10, 31, 63, 0.3);
        }

        .duas-view-all-btn i {
            font-size: .75rem;
            transition: var(--tr-fast);
        }

        .duas-view-all-btn:hover i {
            transform: translateX(3px);
            color: var(--gold-light);
        }

        .duas-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            position: relative;
            z-index: 2;
        }

        .dua-card {
            display: flex;
            flex-direction: column;
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: 28px;
            padding: 20px 20px 20px;
            text-decoration: none;
            color: var(--text-dark);
            position: relative;
            overflow: hidden;
            transition: all .45s cubic-bezier(.25, .46, .45, .94);
            box-shadow: 0 10px 40px rgba(10, 31, 63, 0.05);
            min-height: 400px;
        }

        .dua-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--tr);
        }

        .dua-card::after {
            content: "";
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent);
            border-radius: 50%;
            opacity: 0;
            transition: var(--tr);
            pointer-events: none;
        }

        .dua-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 25px 60px rgba(10, 31, 63, 0.12);
            border-color: rgba(201, 168, 76, 0.2);
        }

        .dua-card:hover::before {
            transform: scaleX(1);
        }

        .dua-card:hover::after {
            opacity: 1;
        }

        .dua-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .dua-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(145deg, var(--navy-tint), var(--white));
            border: 1px solid var(--border-light);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--tr);
            flex-shrink: 0;
            box-shadow: 0 6px 18px rgba(10, 31, 63, 0.06);
        }

        .dua-icon i {
            font-size: 1.1rem;
            color: var(--navy);
            transition: var(--tr);
        }

        .dua-card:hover .dua-icon {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            border-color: var(--navy);
            box-shadow: 0 10px 25px rgba(10, 31, 63, 0.2);
            transform: rotate(-5deg);
        }

        .dua-card:hover .dua-icon i {
            color: var(--gold-light);
        }

        .dua-category-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--gold-tint);
            color: var(--gold-dark);
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            border: 1px solid rgba(201, 168, 76, 0.15);
        }

        .dua-category-badge i {
            font-size: .5rem;
        }

        .dua-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 16px;
            line-height: 1.2;
            transition: var(--tr-fast);
        }

        .dua-card:hover .dua-name {
            color: var(--navy-light);
        }

        .dua-arabic {
            font-size: 1.1rem;
            color: var(--navy);
            text-align: right;
            margin-bottom: 18px;
            line-height: 2.4;
            font-weight: 500;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            border-top: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
            padding: 18px 0;
        }

        .dua-desc {
            font-size: .88rem;
            color: var(--text-medium);
            line-height: 1.7;
            margin-bottom: 26px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .dua-read-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: .8rem;
            font-weight: 600;
            color: var(--navy);
            padding: 10px 20px;
            border-radius: var(--radius-full);
            border: 1px solid transparent;
            background: var(--bg-tinted);
            transition: var(--tr);
            align-self: stretch;
            letter-spacing: .2px;
        }

        .dua-read-btn i {
            font-size: .7rem;
            transition: var(--tr-fast);
        }

        .dua-card:hover .dua-read-btn {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            color: var(--white);
            box-shadow: 0 8px 20px rgba(10, 31, 63, 0.15);
        }

        .dua-card:hover .dua-read-btn i {
            transform: translateX(4px);
            color: var(--gold-light);
        }

        .dua-skeleton {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: 28px;
            padding: 20px 20px 20px;
            min-height: 400px;
        }

        .dua-skeleton .skel-block {
            background: linear-gradient(90deg, var(--bg-tinted) 25%, var(--border-light) 50%, var(--bg-tinted) 75%);
            background-size: 200% 100%;
            animation: duaSkel 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes duaSkel {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        /* ===== POPULAR SURAHS SECTION (SUBTLE HOVER) ===== */
        .surahs-section {
            background: var(--bg-alt);
            position: relative;
            overflow: hidden;
        }

        .surahs-section::before {
            content: "";
            position: absolute;
            top: 10%;
            left: -8%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(10, 31, 63, 0.04), transparent 60%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }

        .surahs-section::after {
            content: "";
            position: absolute;
            bottom: 10%;
            right: -8%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.05), transparent 60%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }

        .surahs-header-wrap {
            position: relative;
            text-align: center;
            margin-bottom: 35px;
        }

        .surahs-bismillah {
            font-family: 'Scheherazade New', serif;
            font-size: 1.6rem;
            color: var(--gold-dark);
            margin-bottom: 6px;
            opacity: .8;
        }

        .surahs-view-all-btn {
            position: absolute;
            top: 10px;
            right: 0;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            color: var(--white);
            padding: 13px 28px;
            border-radius: var(--radius-full);
            text-decoration: none;
            font-weight: 600;
            font-size: .85rem;
            border: 1px solid transparent;
            box-shadow: 0 8px 20px rgba(10, 31, 63, 0.2);
            transition: var(--tr);
            letter-spacing: .3px;
            font-family: 'Outfit', sans-serif;
            z-index: 5;
        }

        .surahs-view-all-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(10, 31, 63, 0.15);
        }

        .surahs-view-all-btn i {
            font-size: .75rem;
            transition: var(--tr-fast);
        }

        .surahs-view-all-btn:hover i {
            transform: translateX(3px);
            color: var(--gold-light);
        }

        .surahs-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            position: relative;
            z-index: 2;
        }

        .surah-card {
            display: flex;
            flex-direction: column;
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: 28px;
            padding: 20px 20px 20px;
            text-decoration: none;
            color: var(--text-dark);
            position: relative;
            overflow: hidden;
            transition: all .45s cubic-bezier(.25, .46, .45, .94);
            box-shadow: 0 10px 40px rgba(10, 31, 63, 0.05);
            min-height: 280px;
        }

        .surah-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold-dark), var(--gold), var(--gold-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: var(--tr);
        }

        .surah-card::after {
            content: "";
            position: absolute;
            bottom: -40px;
            right: -40px;
            width: 140px;
            height: 140px;
            background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent);
            border-radius: 50%;
            opacity: 0;
            transition: var(--tr);
            pointer-events: none;
        }

        .surah-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(10, 31, 63, 0.08);
            border-color: rgba(201, 168, 76, 0.2);
        }

        .surah-card:hover::before {
            transform: scaleX(1);
        }

        .surah-card:hover::after {
            opacity: 1;
        }

        .surah-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .surah-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(145deg, var(--navy-tint), var(--white));
            border: 1px solid var(--border-light);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--tr);
            flex-shrink: 0;
            box-shadow: 0 6px 18px rgba(10, 31, 63, 0.06);
        }

        .surah-icon i {
            font-size: 1.1rem;
            color: var(--navy);
            transition: var(--tr);
        }

        .surah-card:hover .surah-icon {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            border-color: var(--navy);
            box-shadow: 0 6px 15px rgba(10, 31, 63, 0.15);
            transform: rotate(-3deg);
        }

        .surah-card:hover .surah-icon i {
            color: var(--gold-light);
        }

        .surah-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--gold-tint);
            color: var(--gold-dark);
            padding: 6px 14px;
            border-radius: var(--radius-full);
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            border: 1px solid rgba(201, 168, 76, 0.15);
        }

        .surah-badge i {
            font-size: .5rem;
        }

        .surah-badge.makki {
            background: var(--navy-tint);
            color: var(--navy);
            border-color: var(--border-light);
        }

        .surah-badge.madani {
            background: var(--emerald-tint);
            color: var(--emerald);
            border-color: rgba(13, 124, 95, 0.15);
        }

        .surah-num {
            font-family: 'Outfit', sans-serif;
            font-size: .75rem;
            font-weight: 700;
            color: var(--gold-dark);
            margin-bottom: 8px;
            line-height: 1;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .surah-name-en {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 8px;
            line-height: 1.2;
            transition: var(--tr-fast);
        }

        .surah-card:hover .surah-name-en {
            color: var(--navy-light);
        }

        .surah-name-ar {
            font-size: 1.4rem;
            color: var(--navy);
            text-align: right;
            margin-bottom: 16px;
            line-height: 1.5;
            font-weight: 500;
        }

        .surah-meta {
            display: flex;
            gap: 12px;
            margin-bottom: 18px;
            font-size: .78rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .surah-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .surah-meta i {
            color: var(--gold-dark);
            font-size: .7rem;
        }

        .surah-desc {
            font-size: .88rem;
            color: var(--text-medium);
            line-height: 1.7;
            margin-bottom: 26px;
            flex-grow: 1;
        }

        .surah-read-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: 'Outfit', sans-serif;
            font-size: .8rem;
            font-weight: 600;
            color: var(--navy);
            padding: 10px 20px;
            border-radius: var(--radius-full);
            border: 1px solid transparent;
            background: var(--bg-tinted);
            transition: var(--tr);
            align-self: stretch;
            letter-spacing: .2px;
        }

        .surah-read-btn i {
            font-size: .7rem;
            transition: var(--tr-fast);
        }

        .surah-card:hover .surah-read-btn {
            background: linear-gradient(145deg, var(--navy), var(--navy-mid));
            color: var(--white);
            box-shadow: 0 8px 20px rgba(10, 31, 63, 0.15);
        }

        .surah-card:hover .surah-read-btn i {
            transform: translateX(4px);
            color: var(--gold-light);
        }

        .surah-skeleton {
            background: var(--white);
            border: 1px solid var(--border-light);
            border-radius: 28px;
            padding: 20px 20px 20px;
            min-height: 280px;
        }

        .surah-skeleton .skel-block {
            background: linear-gradient(90deg, var(--bg-tinted) 25%, var(--border-light) 50%, var(--bg-tinted) 75%);
            background-size: 200% 100%;
            animation: surahSkel 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes surahSkel {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(5, 33, 22, 0.6);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
        }

        .mobile-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .hero-inner {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .hero-title {
                font-size: 2.3rem;
            }

            .hero-visual {
                min-height: 400px;
            }

            .pillars-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .pillars-grid .pillar-card:last-child {
                grid-column: 1 / -1;
                max-width: 300px;
                margin: 0 auto;
            }

            .bento-events {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .explore-features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-features-new {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .navbar-inner {
                padding: 0 20px;
                height: 64px;
            }

            .nav-links {
                position: fixed;
                top: 0;
                left: -100%;
                width: 85%;
                max-width: 340px;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                padding: 100px 24px 30px;
                box-shadow: 5px 0 30px rgba(0, 0, 0, 0.1);
                transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                gap: 8px;
                align-items: flex-start;
                z-index: 1001;
                border-radius: 0 24px 24px 0;
                overflow-y: auto;
            }

            .nav-links.open {
                left: 0;
            }

            .nav-links a {
                width: 100%;
                padding: 12px 18px;
                font-size: 1rem;
                font-weight: 600;
                border-radius: 12px;
                transition: var(--tr);
            }

            .mobile-toggle {
                display: flex;
            }

            .hero {
                min-height: auto;
                padding: 40px 0 60px;
            }

            .hero-inner {
                padding: 0 20px;
            }

            .hero-title {
                font-size: 2.1rem;
            }

            .hero-bismillah {
                font-size: 1.4rem;
            }

            .hero-desc {
                font-size: .95rem;
            }

            .hero-visual {
                min-height: 360px;
            }

            .hero-visual-main-card {
                padding: 28px;
                max-width: 320px;
            }

            .section {
                padding: 80px 0;
            }

            .section-inner {
                padding: 0 20px;
            }

            .section-title {
                font-size: 2.1rem;
            }

            .pillars-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .pillars-grid .pillar-card:last-child {
                grid-column: auto;
                max-width: none;
            }

            .prayer-widget {
                padding: 20px;
                flex-direction: column;
                align-items: flex-start;
            }

            .pw-list {
                width: 100%;
                justify-content: center;
            }

            .explore-features-grid {
                grid-template-columns: 1fr;
            }

            .quran-features-grid {
                grid-template-columns: 1fr;
            }

            .names-grid {
                grid-template-columns: 1fr;
            }

            .contact-card-wide {
                grid-template-columns: 1fr;
            }

            .contact-info-side {
                padding: 40px 28px;
            }

            .contact-form-side {
                padding: 40px 28px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 36px;
            }

            .footer-top {
                padding: 60px 0 50px;
            }

            .footer-bottom-inner {
                flex-direction: column;
                text-align: center;
            }

            .ayah-arabic {
                font-size: 2rem;
            }

            .ayah-translation {
                font-size: 1rem;
            }

            .verse-slide-card {
                padding: 40px 24px;
                min-height: 280px;
            }

            .verse-slide-card .arabic {
                font-size: 1.4rem;
            }

            .floating-ayah-card {
                display: none;
            }

            .about-features-new {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-content-wrap h2 {
                font-size: 2.1rem;
            }

            .about-content-wrap .about-bismillah {
                font-size: 1.6rem;
            }

            .resource-links {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary,
            .btn-outline-hero {
                width: 100%;
                justify-content: center;
            }

            .pw-time {
                min-width: 65px;
                padding: 10px 12px;
            }

            .pw-name {
                font-size: .58rem;
            }

            .pw-val {
                font-size: .88rem;
            }

            .about-features-new {
                grid-template-columns: 1fr;
            }

            .resource-links {
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }

            .res-link {
                padding: 12px 4px;
                font-size: .65rem;
            }

            .res-link i {
                font-size: 1rem;
                margin-bottom: 6px;
            }
        }

        
        /* Responsive — Duas & Surahs Section only */
        @media (max-width: 1100px) {
            .duas-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .duas-view-all-btn {
                position: static;
                margin: 0 auto 28px;
                display: inline-flex;
            }

            .surahs-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .surahs-view-all-btn {
                position: static;
                margin: 0 auto 28px;
                display: inline-flex;
            }
        }
        @media (max-width: 600px) {
            .duas-grid {
                grid-template-columns: 1fr;
            }

            .dua-card {
                min-height: auto;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon"><i class="fas fa-mosque"></i></div>
                <div class="logo-text">
                    <span class="logo-text-ar">نور الإسلام</span>
                    <span class="logo-text-en">Noor-e-Islam</span>
                </div>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="{{ route('prayer-times.hub') }}">Prayer Times</a></li>
                <li><a href="{{ route('duas.index') }}">Duas</a></li>
                <li><a href="{{ route('names_allah.index') }}">Names</a></li>
                <li><a href="#wazaif">Wazaif</a></li>
                <li><a href="#dreams">Dreams</a></li>
                <li><a href="#zakat" class="nav-cta">Zakat</a></li>
            </ul>
            <button class="mobile-toggle" id="mobileToggle" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Hero -->
    <section class="hero" id="home">
        <div class="hero-bg-pattern"></div>
        <div class="hero-glow-1"></div>
        <div class="hero-glow-2"></div>
        <i class="fas fa-star hero-float-star"></i>
        <i class="fas fa-star hero-float-star"></i>
        <i class="fas fa-star hero-float-star"></i>
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge"><i class="fas fa-star-and-crescent"></i> @if(isset($hijriDate))
                        {{ $hijriDate->hijri_day }} {{ $hijriDate->hijri_month }} {{ $hijriDate->hijri_year }} AH - Welcome to the Path of Peace
                    @else
                        Welcome to the Path of Peace
                    @endif</div>
                <p class="hero-bismillah arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</p>
                <h1 class="hero-title">Illuminate Your Path with <span>Noor-e-Islam</span></h1>
                <p class="hero-desc">Your trusted companion for daily prayers, Quranic wisdom, the beautiful 99 Names of
                    Allah, and authentic Hadith — all in one place.</p>
            </div>
            <div class="hero-visual">
                <div class="hero-visual-bg-card">
                    <div class="islamic-pattern"></div>
                </div>
                <div class="hero-visual-main-card">
                    <div class="main-card-icon"><i class="fas fa-book-open"></i></div>
                    <p class="main-card-arabic arabic">ٱللَّهُ نُورُ ٱلسَّمَـٰوَ ٰتِ وَٱلْأَرْضِ</p>
                    <p class="main-card-trans">"Allah is the Light of the heavens and the earth."</p>
                    <div class="hero-stats-grid">
                        <div class="hero-stat-item">
                            <h4>114</h4>
                            <p>Surahs</p>
                        </div>
                        <div class="hero-stat-item">
                            <h4>6,236</h4>
                            <p>Ayahs</p>
                        </div>
                        <div class="hero-stat-item">
                            <h4>99</h4>
                            <p>Names</p>
                        </div>
                        <div class="hero-stat-item">
                            <h4>5</h4>
                            <p>Pillars</p>
                        </div>
                    </div>
                </div>
                <div class="floating-ayah-card">
                    <div class="f-icon"><i class="fas fa-moon"></i></div>
                    <div>
                        <h5>Next Prayer</h5>
                        @php
                            $prayerData = [];
                            if(isset($prayerTimes)) {
                                $currentPrayerTime = $prayerTimes instanceof \Illuminate\Support\Collection ? $prayerTimes->first() : $prayerTimes;
                                if ($currentPrayerTime) {
                                    $prayerData = [
                                        'Fajr' => \Carbon\Carbon::parse($currentPrayerTime->fajr)->format('Y-m-d H:i:s'),
                                        'Dhuhr' => \Carbon\Carbon::parse($currentPrayerTime->dhuhr)->format('Y-m-d H:i:s'),
                                        'Asr' => \Carbon\Carbon::parse($currentPrayerTime->asr)->format('Y-m-d H:i:s'),
                                        'Maghrib' => \Carbon\Carbon::parse($currentPrayerTime->maghrib)->format('Y-m-d H:i:s'),
                                        'Isha' => \Carbon\Carbon::parse($currentPrayerTime->isha)->format('Y-m-d H:i:s')
                                    ];
                                }
                            }
                        @endphp
                        <p id="next-prayer-text">Loading...</p>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const prayers = @json($prayerData);
                                const nextPrayerText = document.getElementById('next-prayer-text');

                                function updateNextPrayer() {
                                    if (!prayers || Object.keys(prayers).length === 0) {
                                        nextPrayerText.innerText = 'Unavailable';
                                        return;
                                    }
                                    
                                    const now = new Date();
                                    let nextPrayerName = 'Fajr';
                                    let nextPrayerTime = null;
                                    let found = false;

                                    for (const [name, timeStr] of Object.entries(prayers)) {
                                        const timeParts = timeStr.split(/[- :]/);
                                        const time = new Date(timeParts[0], timeParts[1] - 1, timeParts[2], timeParts[3], timeParts[4], timeParts[5]);
                                        
                                        if (time > now) {
                                            nextPrayerName = name;
                                            nextPrayerTime = time;
                                            found = true;
                                            break;
                                        }
                                    }

                                    if (!found && prayers['Fajr']) {
                                        nextPrayerName = 'Fajr';
                                        const timeParts = prayers['Fajr'].split(/[- :]/);
                                        nextPrayerTime = new Date(timeParts[0], timeParts[1] - 1, timeParts[2], timeParts[3], timeParts[4], timeParts[5]);
                                        nextPrayerTime.setDate(nextPrayerTime.getDate() + 1);
                                    }

                                    if (nextPrayerTime) {
                                        const timeString = nextPrayerTime.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });
                                        nextPrayerText.innerText = nextPrayerName + ' at ' + timeString;
                                    }
                                }

                                updateNextPrayer();
                                setInterval(updateNextPrayer, 30000); // Check every 30 seconds
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prayer Widget -->
    <section class="prayer-widget-section" id="prayer-times">
        <div class="prayer-widget">
            <div class="pw-left">
                <div class="pw-icon"><i class="fas fa-clock"></i></div>
                <div class="pw-text">
                    <h4>Prayer Times</h4>
                    <p>Today's schedule</p>
                </div>
            </div>
            <div class="pw-list">
                    @php
                        $currentPrayerTime = null;
                        if (isset($prayerTimes)) {
                            $currentPrayerTime = $prayerTimes instanceof \Illuminate\Support\Collection ? $prayerTimes->first() : $prayerTimes;
                        }
                    @endphp
                    @if($currentPrayerTime)
                        <div class="pw-time"><span class="pw-name">Fajr</span><span class="pw-val">{{ \Carbon\Carbon::parse($currentPrayerTime->fajr)->format('h:i A') }}</span></div>
                        <div class="pw-time"><span class="pw-name">Sunrise</span><span class="pw-val">{{ \Carbon\Carbon::parse($currentPrayerTime->sunrise)->format('h:i A') }}</span></div>
                        <div class="pw-time"><span class="pw-name">Dhuhr</span><span class="pw-val">{{ \Carbon\Carbon::parse($currentPrayerTime->dhuhr)->format('h:i A') }}</span></div>
                        <div class="pw-time active"><span class="pw-name">Asr</span><span class="pw-val">{{ \Carbon\Carbon::parse($currentPrayerTime->asr)->format('h:i A') }}</span></div>
                        <div class="pw-time"><span class="pw-name">Maghrib</span><span class="pw-val">{{ \Carbon\Carbon::parse($currentPrayerTime->maghrib)->format('h:i A') }}</span></div>
                        <div class="pw-time"><span class="pw-name">Isha</span><span class="pw-val">{{ \Carbon\Carbon::parse($currentPrayerTime->isha)->format('h:i A') }}</span></div>
                    @else
                        <div class="pw-time"><span class="pw-name">Fajr</span><span class="pw-val">05:12 AM</span></div>
                        <div class="pw-time"><span class="pw-name">Sunrise</span><span class="pw-val">06:28 AM</span></div>
                        <div class="pw-time"><span class="pw-name">Dhuhr</span><span class="pw-val">12:35 PM</span></div>
                        <div class="pw-time active"><span class="pw-name">Asr</span><span class="pw-val">04:02 PM</span></div>
                        <div class="pw-time"><span class="pw-name">Maghrib</span><span class="pw-val">06:48 PM</span></div>
                        <div class="pw-time"><span class="pw-name">Isha</span><span class="pw-val">08:15 PM</span></div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- About — Redesigned (No Image) -->
    <section class="section about-section" id="about">
        <div class="section-inner">
            <div class="about-content-wrap">
                <p class="about-bismillah arabic">إِنَّ مَعَ الْعُسْرِ يُسْرًا</p>
                <div class="about-gold-line"></div>
                <h2>Welcome to <span>Noor-e-Islam</span></h2>
                <p class="about-desc">A comprehensive Islamic platform designed to bring authentic knowledge closer to
                    you. We believe understanding Islam should be accessible, beautiful, and deeply connected to the
                    Quran and Sunnah — all verified by qualified scholars.</p>
            </div>
            <div class="about-features-new">
                <a href="{{ route('islamic-calendar') }}" class="af-card">
                    <div class="af-icon"><i class="fas fa-calendar-day"></i></div>
                    <h4>Live Hijri Date</h4>
                    <p>Accurate Islamic calendar date updated in real time.</p>
                </a>
                <a href="{{ route('prayer-times.hub') }}" class="af-card">
                    <div class="af-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h4>Prayer Times by City</h4>
                    <p>Precise Salah timings for any city worldwide.</p>
                </a>
                <a href="{{ route('duas.index') }}" class="af-card">
                    <div class="af-icon"><i class="fas fa-hands-praying"></i></div>
                    <h4>Daily Islamic Duas</h4>
                    <p>Essential supplications for every moment of life.</p>
                </a>
                <a href="{{ route('surah.index') }}" class="af-card">
                    <div class="af-icon"><i class="fas fa-book-open"></i></div>
                    <h4>Surah & Fazilat</h4>
                    <p>Read Surahs with their virtues and benefits.</p>
                </a>
                <a href="{{ route('hadith.index') }}" class="af-card">
                    <div class="af-icon"><i class="fas fa-scroll"></i></div>
                    <h4>Authentic Hadith</h4>
                    <p>Verified narrations from trusted sources.</p>
                </a>
                <a href="{{ route('converter.show') }}" class="af-card">
                    <div class="af-icon"><i class="fas fa-exchange-alt"></i></div>
                    <h4>Hijri Converter</h4>
                    <p>Convert between Gregorian and Hijri dates.</p>
                </a>
            </div>
            <div class="about-cta-wrap" style="text-align:center;">
                <a href="#contact" class="btn-primary"><i class="fas fa-arrow-right"></i> Get in Touch</a>
            </div>
        </div>
    </section>

    <!-- Explore Features -->
    <section class="explore-features-section" id="explore">
        <div class="section-inner">
            <div class="section-header">
                <p class="section-bismillah arabic">بِسْمِ ٱللَّهِ ٱلرَّحْمَـٰنِ ٱلرَّحِيمِ</p>
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-compass"></i> EXPLORE</span>
                <h2 class="section-title">Discover the <span>Path of Light</span></h2>
                <p class="section-subtitle">Everything you need for your daily Islamic journey — from prayer times to
                    Quranic verses and sacred knowledge.</p>
            </div>
            <div class="explore-features-grid">
                <a href="{{ route('duas.index') }}" class="explore-feature-card">
                    <div class="ef-icon-wrap"><i class="fas fa-hands-praying"></i></div>
                    <h3 class="ef-title">Daily Duas</h3>
                    <p class="ef-desc">A comprehensive collection of daily supplications for every occasion — morning,
                        evening, meals, and travel.</p>
                    <span class="ef-cta">Explore <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="{{ route('hadith.index') }}" class="explore-feature-card">
                    <div class="ef-icon-wrap"><i class="fas fa-scroll"></i></div>
                    <h3 class="ef-title">Hadith Collection</h3>
                    <p class="ef-desc">Authentic Hadith from Sahih Bukhari, Muslim, and other trusted sources with
                        explanations.</p>
                    <span class="ef-cta">Read <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="{{ route('names_allah.index') }}" class="explore-feature-card">
                    <div class="ef-icon-wrap"><i class="fas fa-star-and-crescent"></i></div>
                    <h3 class="ef-title">99 Names of Allah</h3>
                    <p class="ef-desc">Learn the beautiful Asma ul Husna with meanings, benefits, and how to incorporate
                        them in your prayers.</p>
                    <span class="ef-cta">Learn <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="{{ route('islamic-calendar') }}" class="explore-feature-card">
                    <div class="ef-icon-wrap"><i class="fas fa-calendar-alt"></i></div>
                    <h3 class="ef-title">Islamic Calendar</h3>
                    <p class="ef-desc">Track important Islamic dates, Ramadan timings, Eid celebrations, and the Hijri
                        calendar.</p>
                    <span class="ef-cta">View <i class="fas fa-arrow-right"></i></span>
                </a>
                <a href="{{ route('knowledge.index') }}" class="explore-feature-card">
                    <div class="ef-icon-wrap"><i class="fas fa-graduation-cap"></i></div>
                    <h3 class="ef-title">Islamic Learning</h3>
                    <p class="ef-desc">Structured courses on Fiqh, Seerah, Tafseer, and Aqeedah for beginners and
                        advanced learners.</p>
                    <span class="ef-cta">Start <i class="fas fa-arrow-right"></i></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Pillars of Islam -->
    <section class="section pillars-section">
        <div class="islamic-pattern"></div>
        <div class="section-inner">
            <div class="section-header">
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-layer-group"></i> FOUNDATION</span>
                <h2 class="section-title">The Five <span>Pillars of Islam</span></h2>
                <p class="section-subtitle">The essential acts of worship that form the foundation of a Muslim's faith
                    and practice.</p>
            </div>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="pillar-num">1</div><span class="pillar-icon">🕋</span>
                    <h3>Shahada</h3><span class="arabic">الشهادة</span>
                    <p>Declaration of faith: There is no god but Allah, and Muhammad is His messenger.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-num">2</div><span class="pillar-icon">🤲</span>
                    <h3>Salah</h3><span class="arabic">الصلاة</span>
                    <p>Performing the five daily prayers as a direct link between the servant and Allah.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-num">3</div><span class="pillar-icon">💰</span>
                    <h3>Zakat</h3><span class="arabic">الزكاة</span>
                    <p>Giving a fixed portion of one's wealth to those in need as an act of purification.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-num">4</div><span class="pillar-icon">🌙</span>
                    <h3>Sawm</h3><span class="arabic">الصوم</span>
                    <p>Fasting during the month of Ramadan from dawn to sunset for spiritual growth.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-num">5</div><span class="pillar-icon">🕋</span>
                    <h3>Hajj</h3><span class="arabic">الحج</span>
                    <p>Pilgrimage to Makkah at least once in a lifetime for those who are able.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Daily Duas Section (VIP ENHANCED) -->
    <section class="section duas-section" id="duas">
        <div class="section-inner">
            <div class="duas-header-wrap">
                <a href="#" class="duas-view-all-btn">View All Duas <i class="fas fa-arrow-right"></i></a>
                <p class="duas-bismillah arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</p>
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-hands-praying"></i> DAILY DUAS</span>
                <h2 class="section-title">Essential Daily <span>Islamic Duas</span></h2>
                <p class="section-subtitle">Beautiful supplications for every moment of your day — recite, reflect, and
                    strengthen your connection with Allah.</p>
            </div>
            <div class="duas-grid" id="duasGrid" role="list" aria-label="Featured Daily Duas">
                @if(isset($dailyDuas) && $dailyDuas->count() > 0)
                    @foreach($dailyDuas as $dua)
                    <a href="{{ url('/duas/' . ($dua->primary_category_slug ?? 'general') . '/' . $dua->seo_slug) }}" class="dua-card reveal visible" role="listitem" aria-label="Read full {{ $dua->title_english ?? $dua->title_roman_urdu }}">
                        <div class="dua-card-top">
                            <div class="dua-icon"><i class="fas fa-hands-praying" aria-hidden="true"></i></div>
                            <span class="dua-category-badge"><i class="fas fa-tag" aria-hidden="true"></i> {{ $dua->categories->first()->name ?? 'Daily Life' }}</span>
                        </div>
                        <h3 class="dua-name">{{ $dua->title_english ?? $dua->title_roman_urdu }}</h3>
                        <p class="dua-arabic arabic" dir="rtl" lang="ar">{{ Str::limit($dua->arabic_text, 100) }}</p>
                        <p class="dua-desc">{{ Str::limit($dua->short_meaning, 80) }}</p>
                        <span class="dua-read-btn">Read Full Dua <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                    @endforeach
                @else
                    <p style="text-align:center; grid-column: 1/-1;">No daily duas available at the moment.</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Quran Section -->
    <section class="section quran-section" id="quran" style="color: var(--text-dark);">
        <div class="section-inner">
            <div class="section-header">
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-book-quran"></i> QURAN</span>
                <h2 class="section-title">Verses of <span>Guidance</span></h2>
                <p class="section-subtitle">Reflect upon the noble verses of the Holy Quran — a guidance and mercy for
                    the believers.</p>
            </div>
            <div class="quran-wrapper">
                <div class="verse-carousel-container">
                    <div class="verse-carousel-track" id="verseTrack">
                        <div class="verse-slide-card">
                            <div class="islamic-pattern"></div>
                            <p class="arabic">بِسْمِ ٱللَّهِ ٱلرَّحْمَـٰنِ ٱلرَّحِيمِ ٱلْحَمْدُ لِلَّهِ رَبِّ
                                ٱلْعَـٰلَمِينَ</p>
                            <p class="translation">"In the name of Allah, the Most Gracious, the Most Merciful. All
                                praise is due to Allah, Lord of all the worlds."</p>
                            <div class="bento-ref"><span>Surah Al-Fatiha 1:1-2</span></div>
                        </div>
                        <div class="verse-slide-card">
                            <div class="islamic-pattern"></div>
                            <p class="arabic">اللَّهُ لَا إِلَٰهَ إِلَّا هُوَ ٱلْحَىُّ ٱلْقَيُّومُ</p>
                            <p class="translation">"Allah — there is no deity except Him, the Ever-Living, the Sustainer
                                of all existence."</p>
                            <div class="bento-ref"><span>Ayatul Kursi — Al-Baqarah 2:255</span></div>
                        </div>
                        <div class="verse-slide-card">
                            <div class="islamic-pattern"></div>
                            <p class="arabic">وَمَن يَتَوَكَّلْ عَلَى ٱللَّهِ فَهُوَ حَسْبُهُ</p>
                            <p class="translation">"And whoever relies upon Allah — then He is sufficient for him."</p>
                            <div class="bento-ref"><span>Surah At-Talaq 65:3</span></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button class="carousel-btn" id="prevBtn" aria-label="Previous"><i
                            class="fas fa-chevron-left"></i></button>
                    <div class="carousel-dots" id="carouselDots"><button class="dot active"
                            data-index="0"></button><button class="dot" data-index="1"></button><button class="dot"
                            data-index="2"></button></div>
                    <button class="carousel-btn" id="nextBtn" aria-label="Next"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
                <div class="quran-features-grid">
                    <div class="quran-feature-card">
                        <div class="feat-icon"><i class="fas fa-search"></i></div>
                        <div class="feat-content">
                            <h4>Search Quran</h4>
                            <p>Find any verse, word, or topic instantly across all 114 Surahs.</p><a href="#"
                                class="btn-text">Start Searching <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="quran-feature-card gold">
                        <div class="feat-icon"><i class="fas fa-headphones"></i></div>
                        <div class="feat-content">
                            <h4>Listen & Recite</h4>
                            <p>Audio recitations by renowned Qaris. Follow along word by word.</p><a href="#"
                                class="btn-text">Listen Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="quran-feature-card gold">
                        <div class="feat-icon"><i class="fas fa-bookmark"></i></div>
                        <div class="feat-content">
                            <h4>Bookmarks & Notes</h4>
                            <p>Save favorite verses, add personal notes, and build your collection.</p><a href="#"
                                class="btn-text">Get Started <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="quran-feature-card">
                        <div class="feat-icon"><i class="fas fa-language"></i></div>
                        <div class="feat-content">
                            <h4>Multi-Language</h4>
                            <p>Read translations in English, Urdu, Hindi, and many more languages.</p><a href="#"
                                class="btn-text">Choose Language <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Ayah -->
    <section class="ayah-section">
        <div class="islamic-pattern"></div>
        <div class="section-inner">
            <div class="ayah-content">
                <div class="gold-line"></div>
                <p class="arabic ayah-arabic">وَلَقَدْ يَسَّرْنَا ٱلْقُرْءَانَ لِلذِّكْرِ فَهَلْ مِن مُّدَّكِرٍ</p>
                <p class="ayah-translation">"And We have certainly made the Quran easy for remembrance, so is there any
                    who will remember?"</p>
                <span class="ayah-ref">Surah Al-Qamar 54:17</span>
            </div>
        </div>
    </section>

    <!-- Popular Surahs Section -->
    <section class="section surahs-section" id="popular-surahs">
        <div class="section-inner">
            <div class="surahs-header-wrap">
                <a href="{{ route('surah.index') }}" class="surahs-view-all-btn">View All 114 Surahs <i class="fas fa-arrow-right"></i></a>
                <p class="surahs-bismillah arabic">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</p>
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-book-quran"></i> POPULAR SURAHS</span>
                <h2 class="section-title">Frequently Recited <span>Surahs</span></h2>
                <p class="section-subtitle">Discover the most beloved chapters of the Holy Quran, recited daily by
                    Muslims around the world for spiritual benefit.</p>
            </div>
            
            <div class="surahs-grid" id="surahsGrid" role="list" aria-label="Featured Popular Surahs">
                @if(isset($popularSurahs) && $popularSurahs->count() > 0)
                    @foreach($popularSurahs as $surah)
                    <a href="{{ route('surah.show', $surah->slug ?? $surah->id) }}" class="surah-card reveal visible" role="listitem" aria-label="Read Surah {{ $surah->english_name }}">
                        <div class="surah-card-top">
                            <div class="surah-icon"><i class="fas fa-book-open" aria-hidden="true"></i></div>
                            <span class="surah-badge {{ strtolower($surah->revelation_type) }}"><i class="fas fa-circle" aria-hidden="true"></i> {{ $surah->revelation_type }}</span>
                        </div>
                        <span class="surah-num">Surah {{ $surah->number }}</span>
                        <h3 class="surah-name-en">{{ $surah->name_en }}</h3>
                        <p class="surah-name-ar arabic" dir="rtl" lang="ar">{{ $surah->name_ar }}</p>
                        <div class="surah-meta">
                            <span><i class="fas fa-list-ol" aria-hidden="true"></i> {{ $surah->total_ayahs }} Ayahs</span>
                        </div>
                        <p class="surah-desc">{{ Str::limit($surah->meaning_en ?? 'A beautiful and profound chapter of the Holy Quran.', 80) }}</p>
                        <span class="surah-read-btn">Read Surah <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                    @endforeach
                @else
                    <p style="text-align:center; grid-column: 1/-1;">No popular surahs available at the moment.</p>
                @endif
            </div>

        </div>
    </section>

    
    <!-- 99 Names -->
    <section class="section names-section" id="names">
        <div class="section-inner">
            <div class="section-header">
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-star-and-crescent"></i> ASMA UL HUSNA</span>
                <h2 class="section-title">The 99 Beautiful <span>Names of Allah</span></h2>
                <p class="section-subtitle">Learn and memorize the glorious names of Allah with their meanings and significance.</p>
            </div>
            <div class="names-grid">
                @if(isset($allahNames) && $allahNames->count() > 0)
                    @foreach($allahNames->take(12) as $index => $name)
                    <div class="name-card">
                        <div class="name-header"><span class="name-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span><span class="name-arabic arabic">{{ $name->arabic }}</span></div>
                        <h4>{{ $name->transliteration }}</h4>
                        <p class="name-meaning">{{ Str::limit($name->meaning_english, 50) }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
            <div class="center-btn-wrap" style="text-align:center;margin-top:50px;"><a href="{{ route('names_allah.index') }}" class="btn-primary"><i class="fas fa-list-ol"></i> View All 99 Names</a></div>
        </div>
    </section>

    <!-- Events & Resources -->
    <section class="section events-section">
        <div class="section-inner">
            <div class="section-header">
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-calendar-check"></i> UPDATES</span>
                <h2 class="section-title">Events & <span>Resources</span></h2>
                <p class="section-subtitle">Stay connected with upcoming Islamic events and access valuable resources.
                </p>
            </div>
            <div class="bento-events">
                <div class="events-list">
                    @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                        @foreach($upcomingEvents as $event)
                        <div class="event-item">
                            <div class="event-date"><span class="day">{{ $event->hijri_day }}</span><span class="month">{{ substr($event->hijri_month, 0, 3) }}</span></div>
                            <div class="event-info">
                                <h4>{{ $event->name }}</h4>
                                <p><i class="fas fa-calendar-check"></i> Expected: {{ \Carbon\Carbon::parse($event->estimated_gregorian_date)->format('M d, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="event-item">
                            <div class="event-date"><span class="day">15</span><span class="month">Dhul Qa'dah</span></div>
                            <div class="event-info">
                                <h4>Quran Study Circle</h4>
                                <p><i class="fas fa-clock"></i> After Maghrib — Community Hall</p>
                            </div>
                        </div>
                        <div class="event-item">
                            <div class="event-date"><span class="day">22</span><span class="month">Dhul Qa'dah</span></div>
                            <div class="event-info">
                                <h4>Seerah Lecture Series</h4>
                                <p><i class="fas fa-clock"></i> After Isha — Online & In-Person</p>
                            </div>
                        </div>
                        <div class="event-item">
                            <div class="event-date"><span class="day">28</span><span class="month">Dhul Qa'dah</span></div>
                            <div class="event-info">
                                <h4>Youth Islamic Workshop</h4>
                                <p><i class="fas fa-clock"></i> 10:00 AM — Islamic Center</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="resources-box">
                    <div class="islamic-pattern"></div>
                    <div>
                        <h4>Latest Articles</h4>
                        <p>Explore recent insights and Islamic knowledge.</p>
                    </div>
                    <div class="resource-links">
                        @if(isset($latestArticles) && $latestArticles->count() > 0)
                            @foreach($latestArticles as $article)
                            <a href="{{ url('/articles/' . $article->slug) }}" class="res-link"><i class="fas fa-book-open"></i> {{ Str::limit($article->title, 25) }}</a>
                            @endforeach
                            <a href="{{ url('/articles') }}" class="res-link" style="color: var(--gold);"><i class="fas fa-arrow-right"></i> View All Articles</a>
                        @else
                            <a href="#" class="res-link"><i class="fas fa-hands-praying"></i> Islamic Duas</a>
                            <a href="#" class="res-link"><i class="fas fa-person-praying"></i> Learn Salah</a>
                            <a href="#" class="res-link"><i class="fas fa-coins"></i> Zakat Portal</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="section contact-section" id="contact">
        <div class="section-inner">
            <div class="section-header">
                <div class="gold-line"></div>
                <span class="section-badge"><i class="fas fa-envelope"></i> CONTACT</span>
                <h2 class="section-title">Get in <span>Touch</span></h2>
                <p class="section-subtitle">Have questions, suggestions, or want to contribute? We'd love to hear from
                    you.</p>
            </div>
            <div class="contact-card-wide">
                <div class="contact-info-side">
                    <div class="islamic-pattern"></div>
                    <div class="contact-info-content">
                        <h3>Let's Connect</h3>
                        <p>Reach out to us for any inquiries about our content, suggestions for improvement, or
                            collaboration opportunities.</p>
                        <div class="contact-info-item"><i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>Location</h4>
                                <p>123 Islamic Center Road, City, Country</p>
                            </div>
                        </div>
                        <div class="contact-info-item"><i class="fas fa-envelope"></i>
                            <div>
                                <h4>Email</h4>
                                <p>info@nooreislam.com</p>
                            </div>
                        </div>
                        <div class="contact-info-item"><i class="fas fa-phone"></i>
                            <div>
                                <h4>Phone</h4>
                                <p>+1 (234) 567-8900</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form-side">
                    <form class="contact-form" onsubmit="event.preventDefault();">
                        <div class="form-row">
                            <div class="form-group"><label for="fname">First Name</label><input type="text" id="fname"
                                    placeholder="Your first name"></div>
                            <div class="form-group"><label for="lname">Last Name</label><input type="text" id="lname"
                                    placeholder="Your last name"></div>
                        </div>
                        <div class="form-group"><label for="email">Email Address</label><input type="email" id="email"
                                placeholder="your@email.com"></div>
                        <div class="form-group"><label for="subject">Subject</label><input type="text" id="subject"
                                placeholder="How can we help?"></div>
                        <div class="form-group"><label for="message">Message</label><textarea id="message"
                                placeholder="Write your message here..."></textarea></div>
                        <button type="submit" class="btn-primary form-submit-btn"><i class="fas fa-paper-plane"></i>
                            Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="islamic-pattern"></div>
        <div class="footer-top">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <div class="logo-icon"><i class="fas fa-mosque"></i></div>
                        <div class="logo-text"><span class="logo-text-ar">نور الإسلام</span><span
                                class="logo-text-en">Noor-e-Islam</span></div>
                    </a>
                    <p>Your trusted companion for authentic Islamic knowledge, daily worship, and spiritual growth.
                        Built with love for the Ummah.</p>
                    <div class="footer-newsletter"><input type="email"
                            placeholder="Your email address"><button>Subscribe</button></div>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>

                        <li><a href="{{ route('names_allah.index') }}"><i class="fas fa-chevron-right"></i> 99 Names</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#contact"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Prayer Times</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Hadith Library</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Dua Collection</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Islamic Calendar</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Zakat Calculator</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Prayer Times</h4>
                    <div class="footer-prayer-times">
                        @php
                            $footerPrayerTime = null;
                            if (isset($prayerTimes)) {
                                $footerPrayerTime = $prayerTimes instanceof \Illuminate\Support\Collection ? $prayerTimes->first() : $prayerTimes;
                            }
                        @endphp
                        @if($footerPrayerTime)
                            <div class="footer-prayer-item"><span class="fp-name">Fajr</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->fajr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Sunrise</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->sunrise)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Dhuhr</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->dhuhr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Asr</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->asr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Maghrib</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->maghrib)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Isha</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->isha)->format('h:i A') }}</span></div>
                        @else
                            <div class="footer-prayer-item"><span class="fp-name">Fajr</span><span class="fp-time">05:12 AM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Sunrise</span><span class="pw-val">06:28 AM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Dhuhr</span><span class="fp-time">12:35 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Asr</span><span class="fp-time">04:02 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Maghrib</span><span class="fp-time">06:48 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Isha</span><span class="fp-time">08:15 PM</span></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <p>&copy; 2025 <a href="#">Noor-e-Islam</a>. All rights reserved. Made with ❤️ for the Ummah.</p>
                <div class="footer-bottom-links"><a href="#">Privacy Policy</a><a href="#">Terms of Use</a><a
                        href="#">Sitemap</a></div>
            </div>
        </div>
    </footer>

    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => { navbar.classList.toggle('scrolled', window.scrollY > 50); });

        const mobileToggle = document.getElementById('mobileToggle');
        const navLinksMobile = document.getElementById('navLinks');
        const mobileOverlay = document.getElementById('mobileOverlay');

        function toggleMenu() {
            mobileToggle.classList.toggle('active');
            navLinksMobile.classList.toggle('open');
            mobileOverlay.classList.toggle('show');
            document.body.style.overflow = navLinksMobile.classList.contains('open') ? 'hidden' : '';
        }
        
        function closeMenu() {
            if (navLinksMobile.classList.contains('open')) {
                mobileToggle.classList.remove('active');
                navLinksMobile.classList.remove('open');
                mobileOverlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        }

        mobileToggle.addEventListener('click', toggleMenu);
        if (mobileOverlay) mobileOverlay.addEventListener('click', closeMenu);

        navLinksMobile.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Close on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeMenu();
        });

        // Duas are now loaded dynamically via Blade

        const verseTrack = document.getElementById('verseTrack');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentSlide = 0;
        const totalSlides = document.querySelectorAll('.verse-slide-card').length;
        function goToSlide(i) {
            currentSlide = ((i % totalSlides) + totalSlides) % totalSlides;
            verseTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((d, idx) => d.classList.toggle('active', idx === currentSlide));
        }
        nextBtn.addEventListener('click', () => goToSlide(currentSlide + 1));
        prevBtn.addEventListener('click', () => goToSlide(currentSlide - 1));
        dots.forEach(d => d.addEventListener('click', () => goToSlide(+d.dataset.index)));
        let autoSlide = setInterval(() => goToSlide(currentSlide + 1), 6000);
        [prevBtn, nextBtn, ...dots].forEach(el => el.addEventListener('click', () => { clearInterval(autoSlide); autoSlide = setInterval(() => goToSlide(currentSlide + 1), 6000); }));

        const revealEls = document.querySelectorAll('.explore-feature-card, .pillar-card, .name-card, .event-item, .quran-feature-card, .af-card');
        const rObs = new IntersectionObserver((entries) => { entries.forEach((e, i) => { if (e.isIntersecting) { setTimeout(() => e.target.classList.add('visible'), i * 70); rObs.unobserve(e.target); } }); }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(el => { el.classList.add('reveal'); rObs.observe(el); });

        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-links a:not(.nav-cta)');
        window.addEventListener('scroll', () => {
            let cur = '';
            sections.forEach(s => { if (window.scrollY >= s.offsetTop - 120) cur = s.id; });
            navLinks.forEach(l => l.classList.toggle('active', l.getAttribute('href') === '#' + cur));
        });
    </script>
</body>

</html>
