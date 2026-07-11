@extends('layouts.app')

@section('title', ($dua->seo_title ?? $dua->title_english) . ' - ' . $category->name_english)

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        /* Mapping old variables to new theme for compatibility */
        --primary: #0A1F3F;
        --primary-dark: #0F2D52;
        --primary-light: #C9A84C;
        --primary-rgb: 10, 31, 63;
        --gold-rgb: 201, 168, 76;
        
        /* Premium Theme Variables */
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --emerald: #0D7C5F;
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
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    /* ===== HERO SECTION ===== */
    .dua-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 100px 0 120px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .dua-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.04;
        background-image: radial-gradient(var(--navy-tint) 1px, transparent 1px);
        background-size: 28px 28px;
        mask-image: linear-gradient(to left, rgba(0,0,0,0.5), transparent 70%);
        -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,0.5), transparent 70%);
        z-index: 1;
    }
    .dua-hero::after {
        content: "";
        position: absolute;
        top: -10%; right: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.08), transparent 60%);
        border-radius: 50%;
        filter: blur(60px);
        pointer-events: none;
        z-index: 1;
    }
    .dua-hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .breadcrumb-nav {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: var(--radius-full);
        padding: 10px 24px;
        margin-bottom: 30px;
    }
    .breadcrumb-nav a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: .85rem;
        font-weight: 600;
        transition: var(--tr-fast);
    }
    .breadcrumb-nav a:hover { color: var(--gold-light); }
    .breadcrumb-nav .separator {
        color: rgba(255, 255, 255, 0.3);
        margin: 0 12px;
        font-size: .7rem;
    }
    .breadcrumb-nav .current-page { color: var(--gold-light); font-weight: 700; }
    
    .hero-title-eng {
        font-family: 'Cormorant Garamond', serif;
        color: var(--white);
        font-size: 3rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 15px;
    }
    .hero-title-urdu {
        font-family: 'Scheherazade New', serif;
        color: var(--gold-light);
        font-size: 2rem;
        margin-bottom: 25px;
        line-height: 1.5;
    }
    .hero-meta {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
    }
    .meta-pill {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        color: var(--white);
        padding: 8px 20px;
        border-radius: var(--radius-full);
        font-size: .8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .meta-pill i { color: var(--gold-light); }

    /* ===== MAIN CONTAINER ===== */
    .dua-main-container {
        max-width: 900px;
        margin: -60px auto 60px auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }
    
    /* ===== DETAIL CARD ===== */
    .dua-detail-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-xl);
        padding: 40px;
        position: relative;
        border: 1px solid var(--border-light);
        transition: var(--tr);
        overflow: hidden;
    }
    .dua-detail-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: var(--gold-gradient);
        z-index: 5;
    }
    .dua-detail-card.dark-mode {
        background: #0A1F3F;
        border-color: rgba(255,255,255,0.1);
        box-shadow: var(--shadow-xl);
    }

    /* Utilities Bar */
    .dua-utilities-bar {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border-light);
        margin-bottom: 30px;
    }
    .dua-detail-card.dark-mode .dua-utilities-bar {
        border-bottom-color: rgba(255,255,255,0.1);
    }
    .util-btn {
        background: var(--bg-main);
        border: 1px solid var(--border-light);
        color: var(--navy);
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--tr-fast);
        font-size: .9rem;
    }
    .util-btn:hover {
        background: var(--navy);
        color: var(--gold-light);
        border-color: var(--navy);
        transform: translateY(-2px);
    }
    .dua-detail-card.dark-mode .util-btn {
        background: rgba(255,255,255,0.05);
        color: var(--white);
        border-color: rgba(255,255,255,0.1);
    }
    .dua-detail-card.dark-mode .util-btn:hover {
        background: var(--gold);
        color: var(--navy);
        border-color: var(--gold);
    }

    /* Audio Player */
    .audio-player-wrapper {
        background: var(--bg-main);
        border: 1px solid var(--border-light);
        border-radius: var(--radius-md);
        padding: 15px 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 35px;
    }
    .dua-detail-card.dark-mode .audio-player-wrapper {
        background: rgba(255,255,255,0.05);
        border-color: rgba(255,255,255,0.1);
    }
    .audio-btn {
        background: linear-gradient(145deg, var(--navy), var(--navy-mid));
        color: var(--white);
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        font-size: 1.1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-md);
        transition: var(--tr-fast);
        flex-shrink: 0;
    }
    .audio-btn:hover { transform: scale(1.05); }
    .audio-btn:active { transform: scale(0.95); }
    .audio-controls { flex: 1; display: flex; align-items: center; gap: 15px; }
    .audio-ctrl-btn {
        background: transparent;
        border: none;
        color: var(--text-medium);
        cursor: pointer;
        font-size: 1rem;
        transition: var(--tr-fast);
    }
    .audio-ctrl-btn:hover { color: var(--navy); }
    .dua-detail-card.dark-mode .audio-ctrl-btn { color: rgba(255,255,255,0.7); }
    .dua-detail-card.dark-mode .audio-ctrl-btn:hover { color: var(--gold); }
    
    .audio-select {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-full);
        padding: 5px 12px;
        font-size: .8rem;
        color: var(--navy);
        outline: none;
        font-family: 'Outfit', sans-serif;
        cursor: pointer;
    }
    .dua-detail-card.dark-mode .audio-select {
        background: rgba(255,255,255,0.1);
        color: var(--white);
        border-color: rgba(255,255,255,0.1);
    }

    /* Arabic Text */
    .dua-arabic {
        font-family: 'Scheherazade New', serif;
        font-size: 2.4rem;
        color: var(--navy);
        font-weight: 500;
        line-height: 2.4;
        text-align: right;
        margin-bottom: 35px;
        direction: rtl;
        padding: 20px 0;
        border-top: 1px solid var(--border-light);
        border-bottom: 1px solid var(--border-light);
    }
    .dua-detail-card.dark-mode .dua-arabic {
        color: var(--white);
        border-color: rgba(255,255,255,0.1);
    }
    
    /* Content Blocks */
    .content-block {
        background: var(--bg-main);
        border-radius: var(--radius-sm);
        padding: 24px;
        margin-bottom: 25px;
        border-left: 4px solid var(--gold);
    }
    .dua-detail-card.dark-mode .content-block {
        background: rgba(255,255,255,0.05);
        border-left-color: var(--gold);
    }
    
    .block-title {
        font-family: 'Outfit', sans-serif;
        color: var(--navy);
        font-size: .8rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .block-title i { color: var(--gold); }
    .dua-detail-card.dark-mode .block-title { color: var(--gold-light); }
    
    .block-text {
        color: var(--text-medium);
        font-size: 1.05rem;
        line-height: 1.8;
    }
    .dua-detail-card.dark-mode .block-text { color: rgba(255,255,255,0.8); }

    /* Tags & References */
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid var(--border-light);
    }
    .dua-detail-card.dark-mode .tags-container { border-top-color: rgba(255,255,255,0.1); }
    
    .tag-item {
        background: var(--bg-tinted);
        color: var(--navy);
        padding: 8px 16px;
        border-radius: var(--radius-full);
        font-size: .8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid var(--border-light);
    }
    .dua-detail-card.dark-mode .tag-item {
        background: rgba(255,255,255,0.1);
        color: var(--white);
        border-color: rgba(255,255,255,0.1);
    }

    /* Navigation Buttons */
    .nav-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        gap: 20px;
    }
    .nav-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        padding: 20px 25px;
        background: var(--white);
        border: 1px solid var(--border-light);
        border-radius: var(--radius-md);
        color: var(--navy);
        text-decoration: none;
        font-weight: 600;
        transition: var(--tr);
        box-shadow: var(--shadow-sm);
    }
    .nav-btn:hover {
        border-color: var(--gold);
        background: var(--gold-tint);
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }
    .nav-btn i { color: var(--gold); font-size: 1.1rem; }
    .nav-btn .surah-nav-label { display: block; font-size: .75rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
    .nav-btn .surah-nav-name { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 700; color: var(--navy); }

    /* ===== RELATED SECTION ===== */
    .related-section {
        margin-top: 80px;
        margin-bottom: 80px;
    }
    .related-title {
        text-align: center;
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        color: var(--navy);
        margin-bottom: 15px;
        font-weight: 700;
    }
    .related-title span { color: var(--gold-dark); font-style: italic; }
    .related-divider {
        width: 60px; height: 3px; background: var(--gold-gradient);
        border-radius: 2px; margin: 0 auto 40px;
        box-shadow: 0 0 12px var(--gold-glow);
    }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }
    .related-card {
        background: var(--white);
        border-radius: var(--radius-md);
        padding: 20px;
        border: 1px solid var(--border-light);
        transition: var(--tr);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: var(--shadow-xs);
    }
    .related-card:hover {
        border-color: var(--gold);
        box-shadow: var(--shadow-md);
        transform: translateY(-3px);
    }
    .related-icon {
        width: 44px; height: 44px;
        background: var(--navy-tint);
        color: var(--navy);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
        transition: var(--tr);
    }
    .related-card:hover .related-icon {
        background: var(--navy);
        color: var(--gold-light);
    }
    .related-card-content { flex: 1; overflow: hidden; }
    .related-card-title {
        color: var(--navy);
        font-weight: 700;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.2rem;
        line-height: 1.3;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .related-card-action {
        color: var(--text-light);
        font-size: .8rem;
        font-weight: 500;
    }
    .related-arrow {
        color: var(--gold);
        font-size: .85rem;
        opacity: 0;
        transform: translateX(-10px);
        transition: var(--tr);
    }
    .related-card:hover .related-arrow {
        opacity: 1;
        transform: translateX(0);
    }
    
    /* ===== FAQs ===== */
    .faq-wrapper {
        margin-top: 60px;
    }
    .faq-item {
        background: var(--white);
        border: 1px solid var(--border-light);
        border-radius: var(--radius-md);
        margin-bottom: 15px;
        padding: 25px;
        box-shadow: var(--shadow-xs);
        transition: var(--tr);
    }
    .faq-item:hover { box-shadow: var(--shadow-sm); border-color: var(--navy-tint); }
    .faq-question {
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        color: var(--navy);
        display: flex;
        gap: 12px;
        font-size: 1.3rem;
        margin-bottom: 10px;
    }
    .faq-question i {
        color: var(--gold);
        margin-top: 6px;
    }
    .faq-answer {
        color: var(--text-medium);
        padding-left: 28px;
        line-height: 1.8;
        font-size: 1rem;
    }

    @media (max-width: 768px) {
        .dua-hero { padding: 80px 0 100px; }
        .hero-title-eng { font-size: 2.2rem; }
        .dua-detail-card { padding: 25px; }
        .dua-arabic { font-size: 1.8rem; }
        .audio-player-wrapper { flex-direction: column; gap: 15px; align-items: stretch; }
        .audio-controls { justify-content: center; }
        .nav-buttons { flex-direction: column; }
        .related-grid { grid-template-columns: 1fr; }
    }

    @media print {
        .dua-hero, .dua-utilities-bar, .audio-player-wrapper, .nav-buttons, .related-section, .faq-wrapper {
            display: none !important;
        }
        .dua-detail-card {
            box-shadow: none !important;
            border: none !important;
            padding: 0 !important;
        }
        .dua-main-container {
            margin-top: 0;
        }
    }
</style>

<!-- Hero Section -->
<div class="dua-hero">
    <div class="dua-hero-content">
        <div class="breadcrumb-nav">
            <a href="{{ route('duas.index') }}"><i class="fas fa-book-open" style="margin-right: 5px;"></i> Duas Library</a>
            <i class="fas fa-chevron-right separator"></i>
            <a href="{{ route('duas.category', $category->slug) }}" class="current-page">{{ $category->name_english }}</a>
        </div>
        
        <h1 class="hero-title-eng">{{ $dua->title_english ?? $dua->title_urdu }}</h1>
        @if($dua->title_urdu)
            <div class="hero-title-urdu">{{ $dua->title_urdu }}</div>
        @endif
        
        <div class="hero-meta">
            @if($dua->reading_time)
            <span class="meta-pill"><i class="far fa-clock"></i> {{ $dua->reading_time }} sec read</span>
            @endif
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="dua-main-container">
    <div class="dua-detail-card" id="printableDua">
        

        <!-- Utilities Bar -->
        <div class="dua-utilities-bar">
            <button class="util-btn" onclick="changeFontSize(-1)" title="Decrease Font"><i class="fas fa-search-minus"></i></button>
            <button class="util-btn" onclick="changeFontSize(1)" title="Increase Font"><i class="fas fa-search-plus"></i></button>
            <button class="util-btn" onclick="toggleDarkMode()" title="Toggle Dark Mode"><i class="fas fa-moon" id="darkModeIcon"></i></button>
            <button class="util-btn" onclick="copyDuaText()" title="Copy Arabic Text"><i class="fas fa-copy"></i></button>
            <button class="util-btn" onclick="sharePage()" title="Share Dua"><i class="fas fa-share-alt"></i></button>
            <button class="util-btn" onclick="window.print()" title="Print Dua"><i class="fas fa-print"></i></button>
        </div>

        <!-- Audio Player -->
        @if($dua->audio_url)
        <div class="audio-player-wrapper" id="audioContainer">
            <audio id="duaAudio" src="{{ $dua->audio_url }}" preload="metadata"></audio>
            <button class="audio-btn" id="mainAudioBtn" onclick="toggleAudio()">
                <i class="fas fa-play" id="audioIcon"></i>
            </button>
            
            <div class="audio-controls">
                <div style="flex: 1; height: 6px; background: rgba(0,0,0,0.05); border-radius: 10px; position: relative; overflow: hidden;" id="progressContainer">
                    <div id="progressBar" style="height: 100%; width: 0%; background: var(--gold-gradient); border-radius: 10px; transition: width 0.1s linear;"></div>
                </div>
                
                <button class="audio-ctrl-btn" onclick="document.getElementById('duaAudio').currentTime -= 5" title="Rewind 5s"><i class="fas fa-undo-alt"></i></button>
                <button class="audio-ctrl-btn" onclick="document.getElementById('duaAudio').currentTime += 5" title="Forward 5s"><i class="fas fa-redo-alt"></i></button>
                
                <select class="audio-select" onchange="document.getElementById('duaAudio').playbackRate = this.value">
                    <option value="0.75">0.75x</option>
                    <option value="1" selected>1.0x</option>
                    <option value="1.25">1.25x</option>
                    <option value="1.5">1.5x</option>
                </select>
                
                <button class="audio-ctrl-btn" onclick="toggleAudioRepeat()" id="btnRepeat" title="Loop Audio"><i class="fas fa-sync"></i></button>
            </div>
        </div>
        @endif

        <!-- Arabic Text -->
        <div class="dua-arabic" id="duaArabicText">
            {{ $dua->arabic_text }}
        </div>
        
        <!-- Transliteration -->
        @if($dua->transliteration)
        <div class="content-block" style="border-left-color: var(--navy);">
            <div class="block-title"><i class="fas fa-language"></i> Transliteration</div>
            <p class="block-text" style="font-style: italic;">{{ $dua->transliteration }}</p>
        </div>
        @endif

        <!-- Translation -->
        @if($dua->translation || $dua->short_meaning)
        <div class="content-block">
            <div class="block-title"><i class="fas fa-globe"></i> English Translation</div>
            <p class="block-text" id="duaTranslation">{{ $dua->translation ?? $dua->short_meaning }}</p>
        </div>
        @endif
        
        <!-- Vocabulary -->
        @if($dua->word_by_word_translation || $dua->difficult_words_meanings)
        <div class="content-block" style="border-left-color: #14466E;">
            <div class="block-title"><i class="fas fa-spell-check"></i> Vocabulary & Meanings</div>
            @if(is_array($dua->word_by_word_translation))
                <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 15px;" dir="rtl">
                    @foreach($dua->word_by_word_translation as $word => $meaning)
                    <div style="background: var(--white); padding: 10px 18px; border-radius: var(--radius-sm); text-align: center; border: 1px solid var(--border-light);">
                        <div style="font-family: 'Scheherazade New', serif; font-size: 1.4rem; color: var(--navy);">{{ $word }}</div>
                        <div style="font-size: .8rem; color: var(--text-medium); margin-top: 4px;">{{ $meaning }}</div>
                    </div>
                    @endforeach
                </div>
            @endif
            @if(is_array($dua->difficult_words_meanings))
                <ul style="margin-top: 15px; padding-left: 20px; font-size: .95rem; color: var(--text-medium);">
                    @foreach($dua->difficult_words_meanings as $word => $meaning)
                    <li style="margin-bottom: 6px;"><strong>{{ $word }}:</strong> {{ $meaning }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        @endif
        
        <!-- Context / When to Read -->
        @if($dua->content_type === 'Hadith')
            @if($dua->narrator || $dua->chain_of_narration || $dua->book_name)
            <div class="content-block" style="border-left-color: #8E44AD;">
                <div class="block-title"><i class="fas fa-book-medical"></i> Hadith Reference & Chain</div>
                <div class="block-text" style="font-size: .95rem;">
                    @if($dua->narrator)<p style="margin-bottom: 8px;"><strong>Narrated by:</strong> {{ $dua->narrator }}</p>@endif
                    @if($dua->collection_name || $dua->book_name)<p style="margin-bottom: 8px;"><strong>Collection:</strong> {{ $dua->collection_name ?? $dua->book_name }} @if($dua->book_number)(Book {{ $dua->book_number }})@endif</p>@endif
                    @if($dua->chapter)<p style="margin-bottom: 8px;"><strong>Chapter:</strong> {{ $dua->chapter }}</p>@endif
                    @if($dua->chain_of_narration)<p style="font-size: .85rem; opacity: .8;"><strong>Isnad:</strong> {{ $dua->chain_of_narration }}</p>@endif
                </div>
            </div>
            @endif
        @else
            @if($dua->when_to_read || $dua->best_time || $dua->how_many_times)
            <div class="content-block" style="border-left-color: #27AE60;">
                <div class="block-title"><i class="fas fa-clock"></i> When & How to Recite</div>
                <ul style="margin:0; padding-left: 20px; font-size: .95rem; color: var(--text-medium);">
                    @if($dua->when_to_read)<li style="margin-bottom: 6px;"><strong>When to Read:</strong> {{ $dua->when_to_read }}</li>@endif
                    @if($dua->best_time)<li style="margin-bottom: 6px;"><strong>Best Time:</strong> {{ $dua->best_time }}</li>@endif
                    @if($dua->how_many_times)<li style="margin-bottom: 6px;"><strong>Repetitions:</strong> {{ $dua->how_many_times }} times</li>@endif
                    @if($dua->daily_routine_placement)<li style="margin-bottom: 6px;"><strong>Routine:</strong> {{ $dua->daily_routine_placement }}</li>@endif
                </ul>
            </div>
            @endif
        @endif

        <!-- Explanations & Virtues -->
        @if($dua->detailed_explanation || $dua->virtues || $dua->benefits)
        <div class="content-block" style="border-left-color: var(--gold); background: var(--gold-tint);">
            <div class="block-title"><i class="fas fa-star"></i> Virtues & Explanation</div>
            @if($dua->virtues || $dua->benefits)
                <p class="block-text" style="margin-bottom: 15px;">{!! nl2br(e($dua->virtues ?? $dua->benefits)) !!}</p>
            @endif
            @if($dua->detailed_explanation)
                <p class="block-text" style="font-size: .95rem;">{!! nl2br(e($dua->detailed_explanation)) !!}</p>
            @endif
            @if($dua->lessons_learned)
                <div style="margin-top: 15px; font-weight: 700; font-size: .95rem; color: var(--navy);">Key Lessons:</div>
                <p class="block-text" style="font-size: .9rem;">{!! nl2br(e($dua->lessons_learned)) !!}</p>
            @endif
        </div>
        @endif

        <!-- Warnings / Notes -->
        @if($dua->authenticity_notes || $dua->important_notes || $dua->common_mistakes)
        <div class="content-block" style="border-left-color: #E74C3C; background: rgba(231, 76, 60, 0.04);">
            <div class="block-title" style="color: #E74C3C;"><i class="fas fa-exclamation-circle"></i> Important Notes</div>
            <ul style="margin:0; padding-left: 20px; font-size: .95rem; color: var(--text-medium);">
                @if($dua->authenticity_notes)<li style="margin-bottom: 6px;"><strong>Authenticity:</strong> {{ $dua->authenticity_notes }}</li>@endif
                @if($dua->important_notes)<li style="margin-bottom: 6px;"><strong>Note:</strong> {{ $dua->important_notes }}</li>@endif
                @if($dua->common_mistakes)<li style="margin-bottom: 6px;"><strong>Common Mistakes:</strong> {{ $dua->common_mistakes }}</li>@endif
            </ul>
        </div>
        @endif
        
        <!-- Tags & References -->
        <div class="tags-container">
            @if($dua->reference_source)
                <span class="tag-item"><i class="fas fa-bookmark" style="color: var(--gold);"></i> {{ $dua->reference_source }}</span>
            @endif
            @if($dua->authenticity)
                <span class="tag-item"><i class="fas fa-check-circle" style="color: #27AE60;"></i> {{ $dua->authenticity }}</span>
            @endif
            @if($dua->hadith_reference)
                <span class="tag-item"><i class="fas fa-book"></i> {{ $dua->hadith_reference }}</span>
            @endif
            @if($dua->quran_reference)
                <span class="tag-item"><i class="fas fa-quran" style="color: var(--navy);"></i> {{ $dua->quran_reference }}</span>
            @endif
            @if(is_array($dua->tags))
                @foreach($dua->tags as $tag)
                <span class="tag-item"><i class="fas fa-hashtag" style="opacity: 0.5;"></i> {{ $tag }}</span>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        @if($previousDua)
        <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $previousDua->seo_slug ?? $previousDua->id]) }}" class="nav-btn">
            <i class="fas fa-arrow-left"></i> 
            <span style="flex:1; text-align: left;">
                <span class="surah-nav-label">Previous</span>
                <span class="surah-nav-name">{{ $previousDua->title_english ?? 'Dua' }}</span>
            </span>
        </a>
        @else
        <div style="flex:1;"></div>
        @endif

        @if($nextDua)
        <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $nextDua->seo_slug ?? $nextDua->id]) }}" class="nav-btn">
            <span style="flex:1; text-align: right;">
                <span class="surah-nav-label">Next</span>
                <span class="surah-nav-name">{{ $nextDua->title_english ?? 'Dua' }}</span>
            </span>
            <i class="fas fa-arrow-right"></i>
        </a>
        @else
        <div style="flex:1;"></div>
        @endif
    </div>

    <!-- FAQs -->
    @if(!empty($faqs))
    <div class="faq-wrapper">
        <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--navy); margin-bottom: 25px; text-align: center;">Common Questions</h3>
        @foreach($faqs as $faq)
        <div class="faq-item">
            <div class="faq-question">
                <i class="fas fa-question-circle"></i> 
                <span>{{ $faq['question'] }}</span>
            </div>
            <div class="faq-answer">{{ $faq['answer'] }}</div>
        </div>
        @endforeach
    </div>
    @endif

</div>

<!-- Related Duas Section (Full Width Background) -->
@if($relatedDuas->isNotEmpty())
<div style="background: var(--bg-main); padding: 1px 0;">
    <div class="section-inner related-section" style="max-width: 1140px; margin: 80px auto;">
        <h2 class="related-title">Explore More in <span>{{ $category->name_english }}</span></h2>
        <div class="related-divider"></div>
        <div class="related-grid">
            @foreach($relatedDuas as $related)
            <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $related->seo_slug ?? $related->id]) }}" class="related-card">
                <div class="related-icon">
                    <i class="fas {{ ($related->content_type ?? '') === 'Hadith' ? 'fa-book-reader' : 'fa-praying-hands' }}"></i>
                </div>
                <div class="related-card-content">
                    <h3 class="related-card-title">{{ $related->title_english ?? $related->title_urdu }}</h3>
                    <div class="related-card-action">
                        Read {{ $related->content_type ?? 'Supplication' }}
                    </div>
                </div>
                <i class="fas fa-chevron-right related-arrow"></i>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection

@section('meta')
<link rel="canonical" href="{{ $dua->canonical_url ?? url()->current() }}" />
@if($dua->meta_description)
    <meta name="description" content="{{ $dua->meta_description }}">
@endif
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $dua->seo_title ?? $dua->title_english }} | {{ $category->name_english }}",
      "description": "{{ $dua->meta_description ?? 'Read the authentic ' . ($dua->title_english ?? 'dua') . ' including Arabic, Transliteration, and English Translation.' }}",
      "breadcrumb": {
        "@@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@@type": "ListItem",
            "position": 1,
            "name": "Duas Library",
            "item": "{{ route('duas.index') }}"
          },
          {
            "@@type": "ListItem",
            "position": 2,
            "name": "{{ $category->name_english }}",
            "item": "{{ route('duas.category', $category->slug) }}"
          },
          {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $dua->title_english ?? $dua->title_urdu }}",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    },
    {
      "@@type": "Article",
      "headline": "{{ $dua->title_english ?? $dua->title_urdu }}",
      "articleSection": "{{ $category->name_english }}",
      "articleBody": "{{ strip_tags($dua->translation ?? $dua->short_meaning ?? $dua->arabic_text) }}",
      "author": {
         "@@type": "Organization",
         "name": "Noor-e-Islam"
      }
    }
    @if(!empty($faqs))
    ,{
      "@@type": "FAQPage",
      "mainEntity": [
        @foreach($faqs as $index => $faq)
        {
          "@@type": "Question",
          "name": "{{ $faq['question'] }}",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "{{ $faq['answer'] }}"
          }
        }{{ $index < count($faqs) - 1 ? ',' : '' }}
        @endforeach
      ]
    }
    @endif
  ]
}
</script>
<script>
    // Font Sizer
    let currentFontSize = 2.4;
    function changeFontSize(step) {
        currentFontSize += step * 0.2;
        if(currentFontSize < 1.5) currentFontSize = 1.5;
        if(currentFontSize > 3.5) currentFontSize = 3.5;
        document.getElementById('duaArabicText').style.fontSize = currentFontSize + 'rem';
    }

    // Dark Mode Toggle
    function toggleDarkMode() {
        const card = document.getElementById('printableDua');
        const icon = document.getElementById('darkModeIcon');
        card.classList.toggle('dark-mode');
        
        if (card.classList.contains('dark-mode')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            document.body.style.background = '#070F1F'; 
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            document.body.style.background = 'var(--bg-main)';
        }
    }

    // Utilities
    function copyDuaText() {
        const text = document.getElementById('duaArabicText').innerText;
        navigator.clipboard.writeText(text).then(() => {
            if(typeof showToast === 'function') {
                showToast('Dua copied to clipboard!', 'success');
            } else {
                alert('Dua copied to clipboard!');
            }
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
    
    function sharePage() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $dua->title_english ?? $dua->title_urdu }}',
                text: 'Read this beautiful {{ $dua->content_type ?? "supplication" }} on Noor-e-Islam.',
                url: window.location.href,
            }).catch((error) => console.log('Error sharing', error));
        } else {
            navigator.clipboard.writeText(window.location.href);
            if(typeof showToast === 'function') {
                showToast("Link copied to share!", 'success');
            } else {
                alert("Link copied to share!");
            }
        }
    }

    // Audio Player Logic
    const audio = document.getElementById('duaAudio');
    let isPlaying = false;
    let isRepeating = false;
    
    if(audio) {
        const progressBar = document.getElementById('progressBar');
        
        function toggleAudio() {
            const icon = document.getElementById('audioIcon');
            
            if (isPlaying) {
                audio.pause();
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
            } else {
                audio.play();
                icon.classList.remove('fa-play');
                icon.classList.add('fa-pause');
            }
            isPlaying = !isPlaying;
        }
        
        audio.addEventListener('timeupdate', () => {
            const progress = (audio.currentTime / audio.duration) * 100;
            progressBar.style.width = `${progress}%`;
        });
        
        audio.onended = function() {
            if (isRepeating) {
                audio.currentTime = 0;
                audio.play();
            } else {
                isPlaying = false;
                document.getElementById('audioIcon').classList.remove('fa-pause');
                document.getElementById('audioIcon').classList.add('fa-play');
                progressBar.style.width = '0%';
            }
        };
    }
    
    function toggleAudioRepeat() {
        isRepeating = !isRepeating;
        const btn = document.getElementById('btnRepeat');
        if (isRepeating) {
            btn.style.color = 'var(--navy)';
        } else {
            btn.style.color = '';
        }
    }
</script>
@endsection
