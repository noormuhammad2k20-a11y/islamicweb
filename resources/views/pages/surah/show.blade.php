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
<div class="scroll-progress-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 4px; background: rgba(0,0,0,0.1); z-index: 9999;">
    <div id="scrollProgressBar" style="height: 100%; background: var(--primary); width: 0%; transition: width 0.1s;"></div>
</div>
<style>
    .surah-page-nav-wrapper {
        position: sticky;
        top: 80px; /* Adjust based on your main header height */
        z-index: 100;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border-radius: 50px;
        margin: 30px auto;
        max-width: 900px;
        padding: 5px;
        display: flex;
        overflow-x: auto;
        scrollbar-width: none; /* Firefox */
    }
    .surah-page-nav-wrapper::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }
    .surah-page-nav {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 0 auto;
    }
    .surah-nav-link {
        padding: 10px 20px;
        color: #555;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        border-radius: 50px;
        white-space: nowrap;
        transition: all 0.3s ease;
    }
    .surah-nav-link:hover, .surah-nav-link.active {
        background: var(--primary);
        color: white;
    }
    html {
        scroll-behavior: smooth;
    }
    /* Add scroll margin for sticky nav offset */
    #overview, #virtues, #audioPlayer, #mushaf, #arabic-text, #translations, #faq {
        scroll-margin-top: 150px;
    }
    
    /* New Grid Layout CSS */
    .surah-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    .surah-grid {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 30px;
        margin-top: 30px;
    }
    @media (max-width: 991px) {
        .surah-grid {
            grid-template-columns: 1fr;
        }
        .surah-sidebar {
            order: -1; /* optionally move sidebar to top on mobile, or bottom */
        }
    }
    .sidebar-widget {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .widget-title {
        font-size: 1.1rem;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--primary-light);
        color: var(--primary-dark);
    }
    .widget-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .widget-list li {
        margin-bottom: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f0f0f0;
    }
    .widget-list li:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .widget-list a {
        color: #444;
        text-decoration: none;
        transition: color 0.3s;
    }
    .widget-list a:hover {
        color: var(--primary);
    }
    .widget-tags {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
</style>

<div class="surah-container" style="padding-top: 50px; padding-bottom: 50px;">
    
    {{-- Breadcrumbs --}}
    <div class="breadcrumb" style="text-align: center; margin-bottom: 35px;">
        <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
            <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a>
            <span style="color: #ccc; margin: 0 8px;">/</span>
            <a href="{{ route('quran.index') }}" style="color: var(--primary); text-decoration: none;">Quran</a>
            <span style="color: #ccc; margin: 0 8px;">/</span>
            <a href="{{ route('surah.index') }}" style="color: var(--primary); text-decoration: none;">Surahs</a>
            <span style="color: #ccc; margin: 0 8px;">/</span>
            <span style="color: #666; font-weight: 600;">Surah {{ $surah->name_en }}</span>
        </div>
    </div>

    @include('pages.surah.partials._header')
    @include('pages.surah.partials._navigation')
    @include('pages.surah.partials._continuous-reading')
    
    {{-- Scholar Verification Badge --}}
    @if($surah->reviews && $surah->reviews->count() > 0)
        @php $review = $surah->reviews->first(); @endphp
        <div style="text-align: center; margin-bottom: 35px;">
            <div style="display: inline-flex; align-items: center; background: #e8f5e9; color: #2e7d32; padding: 8px 20px; border-radius: 50px; font-size: 0.95rem; border: 1px solid #c8e6c9;">
                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                <span>Verified by <strong>{{ $review->scholar->name }}</strong> ({{ $review->scholar->credential }})</span>
            </div>
        </div>
    @endif


    <div class="surah-grid">
        <main class="surah-main">
            @include('pages.surah.partials._quick-facts')
            @include('pages.surah.partials._overview')
            @include('pages.surah.partials._audio-player')
            @include('pages.surah.partials._ayahs')
            @include('pages.surah.partials._important-ayahs')
            @include('pages.surah.partials._themes')
            @include('pages.surah.partials._history')
            @include('pages.surah.partials._lessons')
            @include('pages.surah.partials._virtues')
            @include('pages.surah.partials._faqs')
            
            {{-- Next/Previous Navigation --}}
            <div class="surah-nav-footer" style="display:flex; justify-content:space-between; margin-top:50px; border-top:1px solid #eee; padding-top:20px;">
                @if($prevSurah)
                <a href="{{ route('surah.show', $prevSurah->slug) }}" class="surah-nav-btn prev">
                    <i class="fas fa-arrow-left"></i>
                    <div>
                        <span class="surah-nav-label" style="display:block; font-size:0.8rem; color:#888;">Previous Surah</span>
                        <span class="surah-nav-name" style="font-weight:bold;">{{ $prevSurah->number }}. {{ $prevSurah->name_en }}</span>
                    </div>
                </a>
                @else
                <div></div>
                @endif

                @if($nextSurah)
                <a href="{{ route('surah.show', $nextSurah->slug) }}" class="surah-nav-btn next" style="text-align:right;">
                    <div>
                        <span class="surah-nav-label" style="display:block; font-size:0.8rem; color:#888;">Next Surah</span>
                        <span class="surah-nav-name" style="font-weight:bold;">{{ $nextSurah->number }}. {{ $nextSurah->name_en }}</span>
                    </div>
                    <i class="fas fa-arrow-right"></i>
                </a>
                @else
                <div></div>
                @endif
            </div>

            {{-- Popular Surahs --}}
            @if(isset($popularSurahs) && $popularSurahs->count() > 0)
            <div class="section-header" style="margin-top: 70px;">
                <h2 class="section-title">Most Popular <span>Surahs</span></h2>
                <div class="arabic-divider" style="text-align:center; margin-bottom:20px;"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>

            <div class="surah-popular-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(250px, 1fr)); gap:20px;">
                @foreach($popularSurahs as $popular)
                <a href="{{ route('surah.show', $popular->slug) }}" class="surah-popular-card" style="display:flex; align-items:center; background:#fff; padding:15px; border-radius:10px; text-decoration:none; color:inherit; box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                    <div class="surah-popular-number" style="width:40px; height:40px; background:#f0f0f0; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; margin-right:15px;">{{ $popular->number }}</div>
                    <div class="surah-popular-info">
                        <h3 style="margin:0; font-size:1.1rem;">{{ $popular->name_en }}</h3>
                        <span class="surah-popular-meta" style="font-size:0.85rem; color:#666;">{{ $popular->total_ayahs }} Ayahs</span>
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
