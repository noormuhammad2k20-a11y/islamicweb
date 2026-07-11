@extends('layouts.app')

@section('seo')
<title>{{ $name->name_english }} ({{ $name->name_arabic }}) - Islamic Name Meaning, Origin & History | Noor-e-Islam</title>
<meta name="description" content="Meaning of the Islamic name {{ $name->name_english }} ({{ $name->name_arabic }}) is {{ $name->meaning_english }}. Learn its Urdu meaning, historical background, Quranic references, and personality traits.">
<link rel="canonical" href="{{ url('/names/' . $name->slug) }}">
<!-- Schema.org Data -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": "Meaning and Background of the Islamic Name {{ $name->name_english }}",
  "description": "Meaning of the Islamic name {{ $name->name_english }} ({{ $name->name_arabic }}) is {{ $name->meaning_english }}.",
  "url": "{{ url('/names/' . $name->slug) }}"
}
</script>
@endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
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

    /* Breadcrumb */
    .breadcrumb-bar {
        max-width: 1140px; margin: 0 auto; padding: 20px 20px 0; 
        font-size: .9rem; color: var(--text-light); display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
    }
    .breadcrumb-bar a { color: var(--navy); text-decoration: none; font-weight: 600; transition: var(--tr-fast); }
    .breadcrumb-bar a:hover { color: var(--gold-dark); }
    .breadcrumb-bar i { font-size: .7rem; color: var(--text-faint); }
    .breadcrumb-bar .active { color: var(--gold-dark); font-weight: 600; }

    /* Hero Section */
    .name-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 100px 20px 80px; text-align: center; color: var(--white);
        position: relative; overflow: hidden; border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .name-hero::before {
        content: ''; position: absolute; inset: 0; opacity: 0.04;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1;
    }
    .name-hero::after {
        content: ""; position: absolute; top: -15%; right: -10%;
        width: 700px; height: 700px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent 60%);
        border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 1;
    }

    .hero-meta {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 30px; position: relative; z-index: 2;
    }
    .hero-meta span { 
        background: rgba(255,255,255,0.08); backdrop-filter: blur(10px);
        padding: 6px 18px; border-radius: var(--radius-full); 
        border: 1px solid rgba(255,255,255,0.15); font-size: .75rem; font-weight: 700; 
        letter-spacing: 1px; text-transform: uppercase; color: var(--white);
        display: inline-flex; align-items: center; gap: 6px;
    }
    .hero-meta .tag-male { background: rgba(20, 70, 110, 0.4); border-color: var(--navy-light); color: var(--white); }
    .hero-meta .tag-female { background: rgba(201, 168, 76, 0.2); border-color: var(--gold); color: var(--gold-light); }
    .hero-meta .tag-quranic { background: rgba(13, 124, 95, 0.15); border-color: var(--emerald); color: var(--emerald-light); }
    .hero-meta .tag-sahabi { background: rgba(201, 168, 76, 0.1); border-color: var(--gold-dark); color: var(--gold-light); }
    
    .arabic-display {
        font-family: 'Scheherazade New', serif; font-size: 7rem; line-height: 1.2;
        color: var(--gold-light); margin-bottom: 15px; position: relative; z-index: 2; font-weight: 600;
        text-shadow: 0 10px 30px rgba(201, 168, 76, 0.3);
    }
    .name-transliteration {
        font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; margin-bottom: 15px;
        position: relative; z-index: 2; line-height: 1.1; color: var(--white); letter-spacing: -.5px;
    }
    .name-meaning-en {
        font-family: 'Outfit', sans-serif; font-size: 1.25rem; color: rgba(255,255,255,0.8); font-weight: 300;
        max-width: 800px; margin: 0 auto; position: relative; z-index: 2; font-style: italic;
    }

    .action-row { display: flex; justify-content: center; gap: 12px; margin-top: 40px; position: relative; z-index: 2; flex-wrap: wrap; }
    .action-btn-outline {
        background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.15); color: var(--white);
        padding: 12px 24px; border-radius: var(--radius-full); font-size: .85rem; cursor: pointer;
        transition: var(--tr-fast); display: inline-flex; align-items: center; gap: 8px; font-weight: 600;
    }
    .action-btn-outline:hover {
        background: rgba(201, 168, 76, 0.1); border-color: var(--gold); color: var(--gold-light); transform: translateY(-2px);
    }
    .action-btn-outline i { font-size: .95rem; }

    /* Content Layout */
    .content-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; max-width: 1140px; margin: -60px auto 80px; padding: 0 20px; align-items: start; position: relative; z-index: 5; }
    @media (max-width: 1024px) { .content-grid { grid-template-columns: 1fr; margin-top: 40px; } }

    /* Meaning Boxes */
    .meaning-box {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 40px; box-shadow: var(--shadow-md); margin-bottom: 30px; position: relative; overflow: hidden;
    }
    .meaning-box::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .meaning-box.urdu-box::before { background: var(--navy); }
    .meaning-label { font-family: 'Outfit', sans-serif; font-size: .8rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--text-light); margin-bottom: 15px; font-weight: 700; }
    .meaning-value { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 700; color: var(--navy); }
    .urdu-text { font-family: 'Scheherazade New', serif; font-size: 2.5rem; line-height: 1.5; color: var(--gold-dark); }

    /* Content Block Wrapper */
    .content-block-wrapper {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 35px; box-shadow: var(--shadow-sm); margin-bottom: 30px; transition: var(--tr);
    }
    .content-block-wrapper:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }
    .content-block-wrapper h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
    .content-block-wrapper p { color: var(--text-medium); line-height: 1.8; font-size: 1rem; margin-bottom: 15px; }
    .content-block-wrapper p:last-child { margin-bottom: 0; }
    .content-block-wrapper strong { color: var(--navy); font-weight: 600; }

    /* Personality Traits */
    .personality-box {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 35px; box-shadow: var(--shadow-sm); margin-bottom: 30px;
    }
    .personality-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid var(--border-light); }
    .personality-desc { color: var(--text-medium); margin-bottom: 20px; line-height: 1.7; }
    .personality-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .personality-item { display: flex; align-items: center; gap: 12px; padding: 15px; background: var(--bg-main); border-radius: var(--radius-sm); border: 1px solid var(--border-light); transition: var(--tr-fast); }
    .personality-item:hover { background: var(--gold-tint); border-color: var(--gold); }
    .trait-icon { color: var(--gold); font-size: 1.2rem; }
    .trait-text { font-weight: 600; font-size: .95rem; color: var(--text-dark); }
    .trait-note { font-size: .8rem; color: var(--text-faint); margin-top: 15px; font-style: italic; }

    /* Sidebar */
    .sidebar-widget { background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 25px; margin-bottom: 30px; box-shadow: var(--shadow-sm); position: sticky; top: 100px; overflow: hidden; }
    .sidebar-widget::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .sidebar-title { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid var(--border-light); padding-bottom: 15px; }
    
    .similar-names-grid { display: grid; gap: 12px; }
    .similar-name-card { 
        background: var(--bg-main); border: 1px solid var(--border-light); border-radius: var(--radius-sm); 
        padding: 15px; display: flex; justify-content: space-between; align-items: center; 
        text-decoration: none; transition: var(--tr-fast);
    }
    .similar-name-card:hover { border-color: var(--gold); background: var(--white); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
    .similar-name-card .en { font-family: 'Cormorant Garamond', serif; font-weight: 700; font-size: 1.2rem; color: var(--navy); }
    .similar-name-card .ar { font-family: 'Scheherazade New', serif; font-size: 1.5rem; color: var(--gold-dark); }

    .view-all-link { display: block; text-align: center; margin-top: 15px; color: var(--gold-dark); font-weight: 700; font-size: .85rem; text-decoration: none; transition: var(--tr-fast); }
    .view-all-link:hover { color: var(--navy); }

    /* Numerology Widget */
    .numerology-widget {
        background: linear-gradient(150deg, var(--navy) 0%, var(--navy-mid) 100%); color: var(--white);
        border-radius: var(--radius-md); padding: 25px; margin-bottom: 30px; box-shadow: var(--shadow-lg);
        text-align: center; position: relative; overflow: hidden;
    }
    .numerology-widget::before { content: ""; position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: var(--gold); border-radius: 50%; opacity: .08; filter: blur(40px); }
    .numerology-title { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--white); margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px; }
    .numerology-value { font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; color: var(--gold-light); margin-bottom: 10px; line-height: 1; }
    .numerology-desc { font-size: .9rem; color: rgba(255,255,255,0.7); }

    /* Compatibility Widget */
    .compat-list { list-style: none; padding: 0; margin: 0; }
    .compat-list li { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; font-size: .95rem; color: var(--text-medium); font-weight: 500; }
    .compat-list li::before { content: "\f005"; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--gold); font-size: .8rem; }

    @media (max-width: 768px) {
        .content-grid { grid-template-columns: 1fr; gap: 0; }
        .sidebar-widget { position: static; margin-top: 40px; }
        .personality-grid { grid-template-columns: 1fr; }
        .arabic-display { font-size: 5rem; }
        .name-transliteration { font-size: 2.5rem; }
    }
</style>

{{-- Breadcrumbs --}}
<div class="breadcrumb-bar">
    <a href="/">Home</a> 
    <i class="fas fa-chevron-right"></i>
    <a href="/names">Islamic Names</a> 
    <i class="fas fa-chevron-right"></i>
    <span class="active">{{ $name->name_english }}</span>
</div>

<section class="name-hero">
    <div class="hero-meta">
        <span class="tag-{{ $name->gender }}"><i class="fas {{ $name->gender == 'male' ? 'fa-male' : 'fa-female' }}"></i> {{ ucfirst($name->gender) }}</span>
        @if($name->origin)
            <span><i class="fas fa-globe"></i> {{ ucfirst($name->origin) }}</span>
        @endif
        @if($name->is_quranic)
            <span class="tag-quranic"><i class="fas fa-quran"></i> Quranic</span>
        @endif
        @if($name->is_sahabi || $name->is_sahabiyah)
            <span class="tag-sahabi"><i class="fas fa-users"></i> Sahabah</span>
        @endif
    </div>
    
    <div class="arabic-display">{{ $name->name_arabic }}</div>
    <h1 class="name-transliteration">{{ $name->name_english }}</h1>
    @if($name->meaning_english)
        <p class="name-meaning-en">"{{ $name->meaning_english }}"</p>
    @endif

    <div class="action-row">
        <button class="action-btn-outline" onclick="playSound()">
            <i class="fas fa-volume-up"></i> Pronounce
        </button>
        <button class="action-btn-outline" onclick="saveName()">
            <i class="fas fa-heart"></i> Save to Favorites
        </button>
        <button class="action-btn-outline" onclick="shareThis()">
            <i class="fas fa-share-alt"></i> Share
        </button>
    </div>
</section>

<div class="content-grid">
    <!-- Main Content -->
    <div>
        <div class="meaning-box urdu-box">
            <div class="meaning-label">Meaning in Urdu</div>
            <div class="meaning-value urdu-text" dir="rtl">{{ $name->translation_urdu ?? 'تفصیلات جلد شامل کی جائیں گی' }}</div>
        </div>

        @if($name->meaning_english)
        <div class="meaning-box" style="padding: 30px;">
            <div class="meaning-label">Meaning in English</div>
            <div class="meaning-value" style="font-size: 1.6rem;">{{ $name->meaning_english }}</div>
        </div>
        @endif

        <div class="content-block-wrapper">
            <h2><i class="fas fa-info-circle" style="color: var(--gold);"></i> Root Word & Linguistic Breakdown</h2>
            <p>The name <strong>{{ $name->name_english }}</strong> is rooted in the Arabic language. In Arabic morphology, names are often derived from root letters (usually three) that define a broad concept. Understanding the root provides deep insight into the name's true essence and psychological impact.</p>
        </div>

        @if($name->is_quranic || $name->quranic_reference)
        <div class="content-block-wrapper">
            <h2><i class="fas fa-book-quran" style="color: var(--gold);"></i> Usage in Quran</h2>
            @if($name->quranic_reference)
                <p>{{ $name->quranic_reference }}</p>
            @else
                <p>This name or its root word is mentioned in the Holy Quran, making it a blessed and highly recommended name for Muslim children.</p>
            @endif
        </div>
        @endif

        @if($name->biography || $name->is_sahabi || $name->is_sahabiyah)
        <div class="content-block-wrapper">
            <h2><i class="fas fa-scroll" style="color: var(--gold);"></i> Historical Context & Usage</h2>
            @if($name->biography)
                <p>{{ $name->biography }}</p>
            @else
                <p>This name was used by the noble Companions (Sahabah/Sahabiyat) of Prophet Muhammad ﷺ. Naming children after the righteous predecessors is a beloved Sunnah in Islam, instilling a sense of spiritual connection and high moral standards.</p>
            @endif
        </div>
        @endif

        <div class="personality-box">
            <h3 class="personality-title">Personality Traits & Psychology</h3>
            <p class="personality-desc">In Islamic tradition, it is believed that a person's name influences their personality (<em>Tafa'ul</em>). Those named <strong>{{ $name->name_english }}</strong> are often associated with:</p>
            <div class="personality-grid">
                <div class="personality-item">
                    <span class="trait-icon"><i class="fas fa-star"></i></span> <span class="trait-text">Positive outlook</span>
                </div>
                <div class="personality-item">
                    <span class="trait-icon"><i class="fas fa-shield-alt"></i></span> <span class="trait-text">Strong character</span>
                </div>
                <div class="personality-item">
                    <span class="trait-icon"><i class="fas fa-dove"></i></span> <span class="trait-text">Peaceful nature</span>
                </div>
                <div class="personality-item">
                    <span class="trait-icon"><i class="fas fa-book"></i></span> <span class="trait-text">Wisdom</span>
                </div>
            </div>
            <p class="trait-note">* Note: Personality traits are general cultural observations and not definitive religious guarantees.</p>
        </div>
    </div>

    <!-- Sidebar -->
    <aside>
        <div class="sidebar-widget">
            <h3 class="sidebar-title"><i class="fas fa-list" style="color: var(--gold);"></i> Similar Names</h3>
            <p style="font-size: .9rem; color: var(--text-light); margin-bottom: 20px;">Other {{ $name->gender }} names starting with '{{ $name->initial_letter }}'</p>
            <div class="similar-names-grid">
                @if(isset($similarNames) && $similarNames->count() > 0)
                    @foreach($similarNames as $sim)
                    <a href="/names/{{ $sim->slug }}" class="similar-name-card">
                        <span class="en">{{ $sim->name_english }}</span>
                        <span class="ar">{{ $sim->name_arabic }}</span>
                    </a>
                    @endforeach
                @else
                    <div style="font-size: .9rem; color: var(--text-light); font-style: italic; padding: 15px; background: var(--bg-main); border-radius: var(--radius-sm); border: 1px solid var(--border-light);">More names coming soon...</div>
                @endif
            </div>
            <a href="/names?gender={{ $name->gender }}&letter={{ $name->initial_letter }}" class="view-all-link">View All '{{ $name->initial_letter }}' Names &rarr;</a>
        </div>

        @if($name->numerology_value)
        <div class="numerology-widget">
            <h3 class="numerology-title">Numerology (Abjad)</h3>
            <div class="numerology-value">{{ $name->numerology_value }}</div>
            <p class="numerology-desc">The numerical value of the Arabic letters in {{ $name->name_english }} according to the Abjad system.</p>
        </div>
        @endif
        
        <div class="sidebar-widget">
            <h3 class="sidebar-title"><i class="fas fa-heart" style="color: var(--gold);"></i> Compatibility</h3>
            <p style="font-size: .9rem; color: var(--text-medium); margin-bottom: 20px;">Names that pair well with {{ $name->name_english }}:</p>
            <ul class="compat-list">
                <li>Muhammad {{ $name->name_english }}</li>
                <li>{{ $name->name_english }} Ali</li>
                <li>Fatima {{ $name->name_english }}</li>
            </ul>
        </div>
    </aside>
</div>

@push('scripts')
<script>
function playSound() {
    alert('Audio pronunciation feature coming soon.');
}
function saveName() {
    alert('{{ $name->name_english }} has been saved to your favorites!');
    // In a real app, this would make an AJAX call to save to user's profile
}
function shareThis() {
    if (navigator.share) {
        navigator.share({ 
            title: 'Meaning of {{ $name->name_english }}', 
            text: 'I found the beautiful meaning of the name {{ $name->name_english }} on Noor-e-Islam.',
            url: window.location.href 
        });
    } else {
        navigator.clipboard.writeText(window.location.href);
        alert('Link copied to clipboard!');
    }
}
</script>
@endpush

@endsection
