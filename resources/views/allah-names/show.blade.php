@extends('layouts.app')

@section('seo')
<title>{{ $name->transliteration }} ({{ $name->arabic }}) — Meaning & Benefits | 99 Names of Allah | Noor-e-Islam</title>
<meta name="description" content="{{ $name->transliteration }} meaning: {{ $name->meaning_english }}. Learn the linguistic root, Quranic references, virtues, and how to call upon Allah using the name {{ $name->arabic }}.">
<link rel="canonical" href="{{ url('/99-names-of-allah/' . $name->slug) }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url('/99-names-of-allah/' . $name->slug) }}">
<meta property="og:title" content="{{ $name->transliteration }} ({{ $name->arabic }}) — Meaning & Benefits">
<meta property="og:description" content="{{ $name->transliteration }} meaning: {{ $name->meaning_english }}. Learn the linguistic root, Quranic references, and virtues.">
<meta property="og:site_name" content="Noor-e-Islam">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $name->transliteration }} ({{ $name->arabic }}) — Meaning & Benefits">
<meta name="twitter:description" content="{{ $name->transliteration }} meaning: {{ $name->meaning_english }}. Learn the linguistic root, Quranic references, and virtues.">

<!-- Schema.org Data -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "Meaning and Benefits of {{ $name->transliteration }} ({{ $name->arabic }})",
      "description": "{{ $name->meaning_english }}",
      "url": "{{ url('/99-names-of-allah/' . $name->slug) }}",
      "author": {
        "@type": "Organization",
        "name": "Noor-e-Islam"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Noor-e-Islam"
      }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "99 Names of Allah",
          "item": "{{ url('/99-names-of-allah') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $name->transliteration }}"
        }
      ]
    }
  ]
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

    /* Hero Section */
    .name-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 60px 20px 80px; text-align: center; color: var(--white);
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

    /* Floating Breadcrumb */
    .hero-breadcrumb {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15); padding: 8px 20px;
        border-radius: var(--radius-full); margin-bottom: 40px; font-size: .85rem;
        color: rgba(255,255,255,0.7); position: relative; z-index: 2;
    }
    .hero-breadcrumb a { color: var(--white); text-decoration: none; font-weight: 600; transition: var(--tr-fast); }
    .hero-breadcrumb a:hover { color: var(--gold-light); }
    .hero-breadcrumb i { font-size: .65rem; color: rgba(255,255,255,0.4); }
    .hero-breadcrumb .active { color: var(--gold-light); font-weight: 600; }

    .hero-meta {
        display: inline-flex; align-items: center; gap: 8px; background: var(--gold-gradient);
        color: var(--navy); padding: 6px 18px; border-radius: var(--radius-full);
        font-size: .75rem; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 800;
        margin-bottom: 30px; position: relative; z-index: 2; box-shadow: var(--shadow-gold);
    }

    .arabic-display {
        font-family: 'Scheherazade New', serif; font-size: 7rem; line-height: 1.2;
        color: var(--gold-light); margin-bottom: 15px; position: relative; z-index: 2; font-weight: 600;
        text-shadow: 0 10px 30px rgba(201, 168, 76, 0.3);
    }
    .name-transliteration {
        font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; margin-bottom: 15px;
        position: relative; z-index: 2; line-height: 1.1; color: var(--white);
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
        text-decoration: none;
    }
    .action-btn-outline:hover {
        background: rgba(201, 168, 76, 0.1); border-color: var(--gold); color: var(--gold-light); transform: translateY(-2px);
    }
    .action-btn-outline i { font-size: .95rem; }

    /* Content Layout */
    .content-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; max-width: 1140px; margin: -60px auto 80px; padding: 0 20px; align-items: start; position: relative; z-index: 5; }
    @media (max-width: 1024px) { .content-grid { grid-template-columns: 1fr; margin-top: 40px; } }

    /* Meaning Cards */
    .meaning-cards-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 30px; }
    .meaning-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 30px; box-shadow: var(--shadow-md); text-align: center; position: relative; overflow: hidden;
    }
    .meaning-card.en-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--navy); }
    .meaning-card.ur-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .meaning-icon { width: 48px; height: 48px; background: var(--bg-main); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: var(--navy); font-size: 1.2rem; }
    .en-card .meaning-icon { color: var(--navy); background: var(--navy-tint); }
    .ur-card .meaning-icon { color: var(--gold-dark); background: var(--gold-tint); }
    .meaning-label { font-family: 'Outfit', sans-serif; font-size: .75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-light); margin-bottom: 10px; font-weight: 700; }
    .meaning-value { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; font-weight: 700; color: var(--navy); }
    .urdu-text { font-family: 'Scheherazade New', serif; font-size: 2rem; line-height: 1.5; color: var(--gold-dark); }

    /* Content Block Wrapper */
    .content-block-wrapper {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 35px; box-shadow: var(--shadow-sm); margin-bottom: 30px; transition: var(--tr);
    }
    .content-block-wrapper:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }
    .block-header { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid var(--border-light); }
    .block-icon { width: 40px; height: 40px; background: var(--gold-tint); color: var(--gold-dark); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
    .block-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin: 0; }
    .block-content p { color: var(--text-medium); line-height: 1.8; font-size: 1rem; margin-bottom: 15px; }
    .block-content p:last-child { margin-bottom: 0; }
    .block-content strong { color: var(--navy); font-weight: 600; }
    .quran-ayat { text-align: center; margin-top: 25px; padding: 20px; background: var(--bg-main); border-radius: var(--radius-sm); }
    .ayat-arabic { font-family: 'Scheherazade New', serif; font-size: 1.8rem; color: var(--gold-dark); font-weight: 600; margin-bottom: 10px; }
    .ayat-ref { font-size: .85rem; color: var(--text-light); font-style: italic; }

    /* Dhikr Box (Premium Widget) */
    .dhikr-widget {
        background: linear-gradient(150deg, var(--navy) 0%, var(--navy-mid) 100%);
        border-radius: var(--radius-md); padding: 40px; text-align: center; margin-bottom: 30px;
        position: relative; overflow: hidden; box-shadow: var(--shadow-lg); border: 1px solid rgba(201, 168, 76, 0.2);
    }
    .dhikr-widget::before {
        content: ""; position: absolute; top: -50px; right: -50px; width: 150px; height: 150px;
        background: var(--gold); border-radius: 50%; opacity: .08; filter: blur(40px);
    }
    .dhikr-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 700; color: var(--white); margin-bottom: 10px; }
    .dhikr-text { font-family: 'Outfit', sans-serif; color: rgba(255,255,255,0.7); margin-bottom: 25px; font-size: .95rem; }
    .dhikr-arabic { font-family: 'Scheherazade New', serif; font-size: 3rem; color: var(--gold-light); margin-bottom: 30px; font-weight: 600; }
    .dhikr-counter-display {
        font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; color: var(--white);
        margin-bottom: 20px; line-height: 1; text-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .dhikr-btn {
        background: var(--gold-gradient); color: var(--navy); border: none;
        padding: 15px 40px; font-size: 1rem; border-radius: var(--radius-full); cursor: pointer; transition: var(--tr);
        font-weight: 800; margin: 0 auto 15px; box-shadow: var(--shadow-gold); display: inline-flex; align-items: center; gap: 8px;
        text-transform: uppercase; letter-spacing: 1px;
    }
    .dhikr-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(201, 168, 76, 0.4); }
    .dhikr-btn:active { transform: scale(0.98); }
    .reset-btn { background: transparent; border: 1px solid rgba(255,255,255,0.2); color: rgba(255,255,255,0.7); padding: 8px 20px; border-radius: var(--radius-full); font-size: .8rem; cursor: pointer; transition: var(--tr-fast); }
    .reset-btn:hover { border-color: var(--gold-light); color: var(--gold-light); }

    /* Practical Lessons */
    .lessons-list { list-style: none; padding: 0; margin: 0; }
    .lessons-list li { position: relative; padding-left: 30px; margin-bottom: 15px; color: var(--text-medium); font-size: 1rem; line-height: 1.7; }
    .lessons-list li::before { content: "\f00c"; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--gold); position: absolute; left: 0; top: 2px; font-size: .9rem; }

    /* Sidebar */
    .sidebar-widget { background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 25px; margin-bottom: 30px; box-shadow: var(--shadow-sm); position: sticky; top: 100px; overflow: hidden; }
    .sidebar-widget::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .sidebar-title { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid var(--border-light); padding-bottom: 15px; }
    
    .names-list { max-height: 600px; overflow-y: auto; padding-right: 10px; }
    .names-list::-webkit-scrollbar { width: 6px; }
    .names-list::-webkit-scrollbar-thumb { background: var(--border); border-radius: 10px; }
    .name-list-item { display: flex; justify-content: space-between; align-items: center; padding: 12px 10px; border-radius: var(--radius-sm); margin-bottom: 5px; text-decoration: none; transition: var(--tr-fast); border: 1px solid transparent; }
    .name-list-item:hover { background: var(--bg-main); border-color: var(--border-light); }
    .name-list-item.active { background: var(--navy-tint); border-color: var(--navy); }
    .name-list-item.active span { color: var(--navy) !important; }
    
    /* Navigation */
    .nav-container { display: flex; justify-content: space-between; max-width: 1140px; margin: 0 auto 80px; padding: 0 20px; gap: 20px; }
    .nav-btn { display: flex; flex-direction: column; text-decoration: none; color: var(--navy); background: var(--white); border: 1px solid var(--border-light); padding: 20px 30px; border-radius: var(--radius-md); transition: var(--tr); flex: 1; box-shadow: var(--shadow-xs); position: relative; overflow: hidden; }
    .nav-btn::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr); }
    .nav-btn:hover { border-color: var(--navy-tint); box-shadow: var(--shadow-md); transform: translateY(-3px); }
    .nav-btn:hover::before { transform: scaleX(1); }
    .nav-label { font-family: 'Outfit', sans-serif; font-size: .75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-light); margin-bottom: 5px; font-weight: 700; }
    .nav-value { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 700; color: var(--navy); display: inline-flex; align-items: center; gap: 8px; }
    
    @media (max-width: 768px) {
        .content-grid { grid-template-columns: 1fr; gap: 0; }
        .sidebar-widget { position: static; margin-top: 40px; }
        .meaning-cards-grid { grid-template-columns: 1fr; }
        .nav-container { flex-direction: column; }
        .arabic-display { font-size: 5rem; }
        .name-transliteration { font-size: 2.5rem; }
    }
</style>

<section class="name-hero">
    <div class="hero-breadcrumb">
        <a href="/" title="IslamicWeb Home">Home</a> 
        <i class="fas fa-chevron-right"></i>
        <a href="/99-names-of-allah" title="All 99 Names of Allah">99 Names</a> 
        <i class="fas fa-chevron-right"></i>
        <span class="active">{{ $name->transliteration }}</span>
    </div>

    <div class="hero-meta">
        <i class="fas fa-star"></i> Name #{{ $name->number }} of 99
    </div>
    
    <div class="arabic-display">{{ $name->arabic }}</div>
    <h1 class="name-transliteration">{{ $name->transliteration }}</h1>
    <p class="name-meaning-en">"{{ $name->meaning_english }}"</p>

    <div class="action-row">
        <button class="action-btn-outline" onclick="copyName()">
            <i class="fas fa-copy"></i> Copy Arabic
        </button>
    </div>
</section>

<div class="content-grid">
    <!-- Main Content -->
    <div>
        <div class="meaning-cards-grid">
            <div class="meaning-card en-card">
                <div class="meaning-icon"><i class="fas fa-language"></i></div>
                <div class="meaning-label">Meaning in English</div>
                <div class="meaning-value">{{ $name->meaning_english }}</div>
            </div>
            <div class="meaning-card ur-card">
                <div class="meaning-icon"><i class="fas fa-book-reader"></i></div>
                <div class="meaning-label">Meaning in Urdu</div>
                <div class="meaning-value urdu-text" dir="rtl">{{ $name->meaning_urdu ?? 'جلد آرہا ہے' }}</div>
            </div>
        </div>

        <div class="content-block-wrapper">
            <div class="block-header">
                <div class="block-icon"><i class="fas fa-info-circle"></i></div>
                <h2 class="block-title">Explanation</h2>
            </div>
            <div class="block-content">
                @if($name->explanation)
                    <p>{{ $name->explanation }}</p>
                @else
                    <p>The name <strong>{{ $name->transliteration }}</strong> ({{ $name->arabic }}) comes from an Arabic root which conveys the deepest essence of its meaning. To understand this attribute is to understand how Allah interacts with His creation through this specific manifestation of His power, mercy, or majesty.</p>
                @endif
            </div>
        </div>

        @if($name->virtues || $name->benefits)
        <div class="content-block-wrapper">
            <div class="block-header">
                <div class="block-icon"><i class="fas fa-star"></i></div>
                <h2 class="block-title">Virtues & Benefits</h2>
            </div>
            <div class="block-content">
                <p>{{ $name->virtues ?? $name->benefits }}</p>
            </div>
        </div>
        @endif

        <div class="content-block-wrapper">
            <div class="block-header">
                <div class="block-icon"><i class="fas fa-book-quran"></i></div>
                <h2 class="block-title">Quranic Reference</h2>
            </div>
            <div class="block-content">
                @if($name->quran_reference)
                    <p>{{ $name->quran_reference }}</p>
                @else
                    <p>This beautiful name is invoked in the Quran to remind believers of Allah's absolute perfection and to encourage calling upon Him through His most beautiful names.</p>
                @endif

                <div class="quran-ayat">
                    @if($name->quran_verse_arabic && $name->quran_verse_translation)
                        <div class="ayat-arabic">{{ $name->quran_verse_arabic }}</div>
                        <div class="ayat-ref">"{{ $name->quran_verse_translation }}" - {{ $name->quran_reference ?? '' }}</div>
                    @else
                        <div class="ayat-arabic">وَلِلَّهِ الْأَسْمَاءُ الْحُسْنَىٰ فَادْعُوهُ بِهَا</div>
                        <div class="ayat-ref">"And to Allah belong the best names, so invoke Him by them." (Surah Al-A'raf 7:180)</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="dhikr-widget">
            <h2 class="dhikr-title">Dhikr & Reflection</h2>
            <p class="dhikr-text">
                @if($name->dhikr_reflection)
                    {{ $name->dhikr_reflection }}
                @else
                    Call upon Allah by saying <strong>يَا {{ $name->arabic }}</strong> (Ya {{ $name->transliteration }})
                @endif
            </p>
            
            <div class="dhikr-arabic">يَا {{ $name->arabic }}</div>
            
            <div class="dhikr-counter-display"><span id="dhikr-count">0</span></div>
            
            <button id="dhikr-btn" class="dhikr-btn" onclick="countDhikr()">
                <i class="fas fa-hand-pointer"></i> Tap to Count
            </button>
            <div>
                <button class="reset-btn" onclick="resetDhikr()">Reset Counter</button>
            </div>
        </div>
        
        <div class="content-block-wrapper">
            <div class="block-header">
                <div class="block-icon"><i class="fas fa-lightbulb"></i></div>
                <h2 class="block-title">Practical Lessons</h2>
            </div>
            <div class="block-content">
                <ul class="lessons-list">
                    @if($name->practical_lessons)
                        @foreach(explode("\n", $name->practical_lessons) as $lesson)
                            @if(trim($lesson) !== '')
                                <li>{{ preg_replace('/^\d+\.\s*/', '', trim($lesson)) }}</li>
                            @endif
                        @endforeach
                    @else
                        <li>Recognize this attribute in your daily life and trust in Allah's infinite wisdom.</li>
                        <li>Call upon Him using this specific name when making dua related to its meaning.</li>
                        <li>Emulate the positive traits associated with this name in your interactions with others, to the extent humanly possible (e.g., being merciful).</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <aside>
        <div class="sidebar-widget">
            <h3 class="sidebar-title"><i class="fas fa-list-ul" style="color: var(--gold);"></i> All 99 Names</h3>
            <div class="names-list">
                @foreach($allNames ?? [] as $n)
                <a href="/99-names-of-allah/{{ $n->slug }}" title="Learn the meaning of {{ $n->transliteration }}" class="name-list-item {{ $n->id === $name->id ? 'active' : '' }}" style="color: var(--text-medium);">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: .75rem; color: var(--text-faint); font-weight: 600;">{{ $n->number }}.</span>
                        <span style="font-weight: 600; color: var(--navy);">{{ $n->transliteration }}</span>
                    </div>
                    <span style="font-family: 'Scheherazade New', serif; font-size: 1.2rem; color: {{ $n->id === $name->id ? 'var(--gold-dark)' : 'var(--text-light)' }};">{{ $n->arabic }}</span>
                </a>
                @endforeach
            </div>
        </div>

        <div class="sidebar-widget" style="margin-top: 30px;">
            <h3 class="sidebar-title"><i class="fas fa-compass" style="color: var(--gold);"></i> Explore More</h3>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <a href="/prayer-times" title="Accurate Prayer Times" style="display: flex; align-items: center; gap: 10px; color: var(--text-medium); text-decoration: none; font-weight: 500; transition: var(--tr-fast); padding: 8px 0; border-bottom: 1px solid var(--border-light);">
                    <i class="fas fa-clock" style="color: var(--gold); width: 20px; text-align: center;"></i> Prayer Times
                </a>
                <a href="/islamic-names" title="Muslim Baby Names Dictionary" style="display: flex; align-items: center; gap: 10px; color: var(--text-medium); text-decoration: none; font-weight: 500; transition: var(--tr-fast); padding: 8px 0; border-bottom: 1px solid var(--border-light);">
                    <i class="fas fa-child" style="color: var(--gold); width: 20px; text-align: center;"></i> Islamic Names
                </a>
                <a href="/ramadan-guide/calendar" title="Ramadan Calendar & Timetable" style="display: flex; align-items: center; gap: 10px; color: var(--text-medium); text-decoration: none; font-weight: 500; transition: var(--tr-fast); padding: 8px 0; border-bottom: 1px solid var(--border-light);">
                    <i class="fas fa-moon" style="color: var(--gold); width: 20px; text-align: center;"></i> Ramadan Calendar
                </a>

            </div>
        </div>
    </aside>
</div>

<!-- Prev/Next Navigation -->
<div class="nav-container">
    @if($previousName)
        <a href="/99-names-of-allah/{{ $previousName->slug }}" class="nav-btn" style="align-items: flex-start;">
            <span class="nav-label">Previous Name</span>
            <span class="nav-value"><i class="fas fa-arrow-left"></i> {{ $previousName->transliteration }}</span>
        </a>
    @else
        <div style="flex: 1;"></div>
    @endif

    @if($nextName)
        <a href="/99-names-of-allah/{{ $nextName->slug }}" class="nav-btn" style="align-items: flex-end; text-align: right;">
            <span class="nav-label">Next Name</span>
            <span class="nav-value">{{ $nextName->transliteration }} <i class="fas fa-arrow-right"></i></span>
        </a>
    @else
        <div style="flex: 1;"></div>
    @endif
</div>

@push('scripts')
<script>
let count = 0;
function countDhikr() {
    count++;
    document.getElementById('dhikr-count').textContent = count;
    
    // Add a slight haptic feedback if available
    if (window.navigator && window.navigator.vibrate) {
        window.navigator.vibrate(50);
    }
}
function resetDhikr() {
    count = 0;
    document.getElementById('dhikr-count').textContent = '0';
}
function copyName() {
    navigator.clipboard.writeText('{{ $name->arabic }}');
    alert('Arabic text copied to clipboard!');
}
</script>
@endpush

@endsection
