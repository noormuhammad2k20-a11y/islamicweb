@extends('layouts.app')

@push('seo')
    <x-seo-head :seo="$seoData" />
    @if(!empty($schemaOrg))
        @foreach($schemaOrg as $schema)
            <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
        @endforeach
    @endif
@endpush

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        /* Mapping old variables to new theme for included partials */
        --primary: #0A1F3F;
        --primary-dark: #0F2D52;
        --primary-light: #C9A84C;
        
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

    .scroll-progress-container {
        position: fixed; top: 0; left: 0; width: 100%; height: 4px; 
        background: rgba(10, 31, 63, 0.1); z-index: 9999;
    }
    #scrollProgressBar {
        height: 100%; background: var(--gold-gradient); width: 0%; 
        transition: width 0.1s; box-shadow: 0 0 10px rgba(201, 168, 76, 0.5);
    }

    html { scroll-behavior: smooth; }
    
    /* Sticky Nav Offset */
    #overview, #virtues, #mushaf, #arabic-text, #translations, #faq {
        scroll-margin-top: 150px;
    }

    /* Surah Container */
    .surah-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 15px;
    }

    /* Breadcrumb */
    .surah-breadcrumb { text-align: center; margin-bottom: 40px; }
    .surah-breadcrumb-inner { 
        background: var(--white); padding: 12px 30px; border-radius: var(--radius-full); 
        display: inline-block; box-shadow: var(--shadow-md); font-size: .9rem; 
        font-weight: 600; border: 1px solid var(--border-light); 
    }
    .surah-breadcrumb-inner a { color: var(--navy); text-decoration: none; transition: var(--tr-fast); }
    .surah-breadcrumb-inner a:hover { color: var(--gold-dark); }
    .surah-breadcrumb-inner span { color: var(--text-faint); margin: 0 10px; }
    .surah-breadcrumb-inner .active { color: var(--text-medium); }

    /* Scholar Badge */
    .scholar-badge-container { text-align: center; margin-bottom: 40px; }
    .scholar-badge { 
        display: inline-flex; align-items: center; background: var(--emerald-tint); 
        color: var(--emerald); padding: 10px 24px; border-radius: var(--radius-full); 
        font-size: .9rem; font-weight: 600; border: 1px solid rgba(13, 124, 95, 0.15); 
        box-shadow: var(--shadow-sm);
    }
    .scholar-badge i { margin-right: 10px; font-size: 1.1rem; }

    /* Sticky Page Navigation */
    .surah-page-nav-wrapper {
        position: sticky; top: 80px; z-index: 100;
        background: rgba(255, 255, 255, 0.90);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(255,255,255,0.8);
        border-radius: var(--radius-full);
        margin: 30px auto 50px;
        max-width: 900px;
        padding: 6px;
        display: flex;
        overflow-x: auto;
        scrollbar-width: none;
    }
    .surah-page-nav-wrapper::-webkit-scrollbar { display: none; }
    .surah-page-nav {
        display: flex; align-items: center; gap: 5px; margin: 0 auto;
    }
    .surah-nav-link {
        padding: 10px 22px; color: var(--text-medium); text-decoration: none;
        font-weight: 600; font-size: .85rem; border-radius: var(--radius-full);
        white-space: nowrap; transition: var(--tr-fast);
    }
    .surah-nav-link:hover { background: var(--bg-main); color: var(--navy); }
    .surah-nav-link.active { 
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); 
        color: var(--white); box-shadow: var(--shadow-sm); 
    }

    /* Grid Layout */
    .surah-grid {
        display: grid; grid-template-columns: 1fr 300px; gap: 30px; margin-top: 30px;
    }
    @media (max-width: 991px) {
        .surah-grid { grid-template-columns: 1fr; }
        .surah-sidebar { order: -1; }
    }

    /* Sidebar Widgets */
    .sidebar-widget {
        background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); padding: 24px; margin-bottom: 24px;
        box-shadow: var(--shadow-sm); position: relative; overflow: hidden;
    }
    .sidebar-widget::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient);
    }
    .widget-title {
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700;
        color: var(--navy); margin-bottom: 18px; padding-bottom: 12px;
        border-bottom: 1px solid var(--border-light);
    }
    .widget-list { list-style: none; padding: 0; margin: 0; }
    .widget-list li {
        margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border-light);
    }
    .widget-list li:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
    .widget-list a {
        color: var(--text-medium); text-decoration: none; transition: var(--tr-fast);
        font-weight: 500; display: block; padding: 4px 0;
    }
    .widget-list a:hover { color: var(--gold-dark); transform: translateX(4px); }
    .widget-tags { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 8px; }

    /* Next/Prev Navigation */
    .surah-nav-footer { display: flex; justify-content: space-between; margin-top: 60px; border-top: 1px solid var(--border-light); padding-top: 30px; gap: 20px; }
    .surah-nav-btn {
        display: flex; align-items: center; gap: 15px; text-decoration: none; color: var(--text-medium);
        padding: 20px 30px; background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); transition: var(--tr); box-shadow: var(--shadow-sm);
        flex: 1; max-width: 48%;
    }
    .surah-nav-btn:hover { box-shadow: var(--shadow-md); border-color: var(--gold); transform: translateY(-3px); color: var(--navy); }
    .surah-nav-btn i { font-size: 1.2rem; color: var(--gold); }
    .surah-nav-label { display: block; font-size: .75rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
    .surah-nav-name { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 700; color: var(--navy); }

    /* Popular Surahs Section */
    .section-header { text-align: center; margin-top: 80px; margin-bottom: 40px; }
    .section-title { font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; color: var(--navy); margin-bottom: 0; font-weight: 700; }
    .section-title span { color: var(--gold-dark); font-style: italic; }
    .section-title::after { content: ""; position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background: var(--gold-gradient); border-radius: 2px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25); }
    .arabic-divider { display: flex; align-items: center; justify-content: center; gap: 15px; margin: 25px 0; }
    .arabic-divider .line { width: 80px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold), transparent); }
    .arabic-divider .symbol { font-size: 1.8rem; font-family: 'Scheherazade New', serif; color: var(--gold-dark); }

    .surah-popular-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
    .surah-popular-card {
        display: flex; align-items: center; background: var(--white); padding: 20px;
        border: 1px solid var(--border-light); border-radius: var(--radius-md);
        text-decoration: none; color: var(--text-dark); transition: var(--tr); box-shadow: var(--shadow-xs);
    }
    .surah-popular-card:hover { box-shadow: var(--shadow-md); border-color: var(--gold); transform: translateY(-4px); }
    .surah-popular-number {
        width: 44px; height: 44px; background: var(--navy-tint); color: var(--navy);
        border-radius: 12px; display: flex; align-items: center; justify-content: center;
        font-family: 'Cormorant Garamond', serif; font-weight: 700; font-size: 1.2rem;
        margin-right: 16px; transition: var(--tr); flex-shrink: 0;
    }
    .surah-popular-card:hover .surah-popular-number { background: var(--navy); color: var(--gold-light); }
    .surah-popular-info h3 { margin: 0; font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; color: var(--navy); font-weight: 700; }
    .surah-popular-meta { font-size: .8rem; color: var(--text-light); font-weight: 500; }

    @media (max-width: 768px) {
        .surah-nav-footer { flex-direction: column; }
        .surah-nav-btn { max-width: 100%; }
        .section-title { font-size: 2rem; }
    }
</style>

<div class="scroll-progress-container">
    <div id="scrollProgressBar"></div>
</div>

<div class="surah-container">
    
    {{-- Breadcrumbs --}}
    <div class="surah-breadcrumb">
        <div class="surah-breadcrumb-inner">
            <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
            <span>/</span>

            <a href="{{ route('surah.index') }}">Surahs</a>
            <span>/</span>
            <span class="active">Surah {{ $surah->name_en }}</span>
        </div>
    </div>

    @include('pages.surah.partials._header')
    @include('pages.surah.partials._navigation')
    @include('pages.surah.partials._continuous-reading')
    
    {{-- Scholar Verification Badge --}}
    @if($surah->reviews && $surah->reviews->count() > 0)
        @php $review = $surah->reviews->first(); @endphp
        <div class="scholar-badge-container">
            <div class="scholar-badge">
                <i class="fas fa-check-circle"></i>
                <span>Verified by <strong>{{ $review->scholar->name }}</strong> ({{ $review->scholar->credential }})</span>
            </div>
        </div>
    @endif

    <div class="surah-grid">
        <main class="surah-main">
            @include('pages.surah.partials._quick-facts')
            @include('pages.surah.partials._overview')
            @include('pages.surah.partials._ayahs')
            @include('pages.surah.partials._important-ayahs')
            @include('pages.surah.partials._themes')
            @include('pages.surah.partials._history')
            @include('pages.surah.partials._lessons')
            @include('pages.surah.partials._virtues')
            @include('pages.surah.partials._faqs')
            
            {{-- Next/Previous Navigation --}}
            <div class="surah-nav-footer">
                @if($prevSurah)
                <a href="{{ route('surah.show', $prevSurah->slug) }}" class="surah-nav-btn prev">
                    <i class="fas fa-arrow-left"></i>
                    <div>
                        <span class="surah-nav-label">Previous Surah</span>
                        <span class="surah-nav-name">{{ $prevSurah->number }}. {{ $prevSurah->name_en }}</span>
                    </div>
                </a>
                @else
                <div></div>
                @endif

                @if($nextSurah)
                <a href="{{ route('surah.show', $nextSurah->slug) }}" class="surah-nav-btn next" style="text-align:right;">
                    <div>
                        <span class="surah-nav-label">Next Surah</span>
                        <span class="surah-nav-name">{{ $nextSurah->number }}. {{ $nextSurah->name_en }}</span>
                    </div>
                    <i class="fas fa-arrow-right"></i>
                </a>
                @else
                <div></div>
                @endif
            </div>

            {{-- Popular Surahs --}}
            @if(isset($popularSurahs) && $popularSurahs->count() > 0)
            <div class="section-header">
                <h2 class="section-title">Most Popular <span>Surahs</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>

            <div class="surah-popular-grid">
                @foreach($popularSurahs as $popular)
                <a href="{{ route('surah.show', $popular->slug) }}" class="surah-popular-card">
                    <div class="surah-popular-number">{{ $popular->number }}</div>
                    <div class="surah-popular-info">
                        <h3>{{ $popular->name_en }}</h3>
                        <span class="surah-popular-meta">{{ $popular->total_ayahs }} Ayahs</span>
                    </div>
                </a>
                @endforeach
            </div>
            @endif

        </main>
        
        <aside class="surah-sidebar">
            @include('pages.surah.partials._toc')
            @include('pages.surah.partials._learning-path')
            @include('pages.surah.partials._entities')
            @include('pages.surah.partials._collections')
            @include('pages.surah.partials._related-surahs')
            @include('pages.surah.partials._hadiths')
            @include('pages.surah.partials._related-duas')
            @include('pages.surah.partials._downloads')
        </aside>
    </div>
</div>

<script>
function copySurahLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        var btn = document.querySelector('.copy-link');
        btn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(function() { btn.innerHTML = '<i class="fas fa-link"></i>'; }, 2000);
    });
}

function copyAyah(btn) {
    const text = btn.getAttribute('data-text');
    navigator.clipboard.writeText(text).then(function() {
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i> Copied';
        setTimeout(function() { btn.innerHTML = originalHTML; }, 2000);
    });
}

function toggleReadingMode() {
    const isReadingMode = document.body.classList.toggle('quran-reading-mode');
    const translations = document.querySelectorAll('.surah-ayah-translations');
    translations.forEach(el => {
        el.style.display = isReadingMode ? 'none' : 'grid';
    });
    const btn = document.getElementById('readingModeBtn');
    if (btn) {
        if (isReadingMode) {
            btn.innerHTML = '<i class="fas fa-eye" aria-hidden="true"></i> Show Translations';
        } else {
            btn.innerHTML = '<i class="fas fa-book-reader" aria-hidden="true"></i> Reading Mode';
        }
    }
}

let currentAyahIndex = 1;
function scrollToAyah(index) {
    const ayahEl = document.getElementById('ayah-' + index);
    if(ayahEl) {
        ayahEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
        currentAyahIndex = index;
    }
}
function scrollToNextAyah() {
    scrollToAyah(currentAyahIndex + 1);
}
function scrollToPrevAyah() {
    if(currentAyahIndex > 1) scrollToAyah(currentAyahIndex - 1);
}

document.addEventListener("DOMContentLoaded", function() {
    const ayahs = document.querySelectorAll('.surah-ayah-block');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const idAttr = entry.target.id;
                if(idAttr) {
                    currentAyahIndex = parseInt(idAttr.split('-')[1]);
                }
            }
        });
    }, { threshold: 0.5 });
    
    ayahs.forEach(ayah => observer.observe(ayah));

    const navLinks = document.querySelectorAll('.surah-nav-link, .toc-list a');
    const sections = Array.from(navLinks).map(link => {
        return document.querySelector(link.getAttribute('href'));
    }).filter(Boolean);

    function updateNav() {
        let currentSection = sections[0];
        
        for (let i = 0; i < sections.length; i++) {
            const section = sections[i];
            if(!section) continue;
            const rect = section.getBoundingClientRect();
            if (rect.top <= 200) {
                currentSection = section;
            }
        }
        
        if(currentSection) {
            navLinks.forEach(link => {
                if(link.getAttribute('href') === '#' + currentSection.id) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }
    }

    window.addEventListener('scroll', function() {
        updateNav();
        
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        const progressBar = document.getElementById("scrollProgressBar");
        if(progressBar) {
            progressBar.style.width = scrolled + "%";
        }
    }, { passive: true });
    updateNav();
});
</script>

@endsection