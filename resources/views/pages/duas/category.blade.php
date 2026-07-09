@extends('layouts.app')

@section('title', $category->name_english . ' - Duas')

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
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    .dua-category-section { 
        background: var(--bg-main); 
        padding: 100px 0; 
        position: relative; 
        overflow: hidden; 
    }
    .dua-category-section .section-inner { 
        max-width: 1000px; 
        margin: 0 auto; 
        padding: 0 20px; 
        position: relative; 
        z-index: 1; 
    }

    /* Back Button */
    .dua-back-btn { 
        display: inline-flex; align-items: center; gap: 8px; 
        background: var(--white); color: var(--navy); 
        padding: 10px 20px; border-radius: var(--radius-full); 
        text-decoration: none; font-weight: 600; font-size: .85rem; 
        border: 1px solid var(--border); box-shadow: var(--shadow-xs); 
        transition: var(--tr-fast); margin-bottom: 40px; 
    }
    .dua-back-btn:hover { border-color: var(--navy); box-shadow: var(--shadow-sm); transform: translateX(-3px); }

    /* Section Header */
    .section-header { text-align: center; margin-bottom: 60px; }
    .section-badge { 
        display: inline-flex; align-items: center; gap: 8px; 
        background: var(--navy-tint); color: var(--navy); 
        padding: 8px 20px; border-radius: var(--radius-full); 
        font-size: .75rem; font-weight: 700; text-transform: uppercase; 
        letter-spacing: 1.5px; margin-bottom: 15px; border: 1px solid var(--border-light); 
    }
    .section-badge i { color: var(--gold); }
    .section-title { 
        font-family: 'Cormorant Garamond', serif; 
        font-size: 2.8rem; color: var(--navy); 
        margin-bottom: 15px; font-weight: 700; line-height: 1.1; 
    }
    .section-title span { color: var(--gold-dark); font-style: italic; }
    .arabic-divider { display: flex; align-items: center; justify-content: center; gap: 15px; margin: 20px 0; }
    .arabic-divider .line { width: 80px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold), transparent); }
    .arabic-divider .symbol { font-size: 1.8rem; font-family: 'Scheherazade New', serif; color: var(--gold-dark); }
    .section-subtitle { 
        font-family: 'Scheherazade New', serif; 
        font-size: 2.2rem; color: var(--gold-dark); 
        margin-top: 15px; font-weight: 600; 
    }

    /* Dua Card */
    .dua-list-grid { 
        display: grid; grid-template-columns: 1fr; gap: 30px; 
    }
    .dua-detail-card {
        background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); box-shadow: var(--shadow-sm);
        padding: 35px; position: relative; overflow: hidden; transition: var(--tr);
    }
    .dua-detail-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    .dua-detail-card:hover { box-shadow: var(--shadow-lg); border-color: var(--navy-tint); transform: translateY(-3px); }
    .dua-detail-card:hover::before { transform: scaleX(1); }

    .dua-title-box {
        display: flex; align-items: center; gap: 15px; margin-bottom: 25px;
        padding-bottom: 20px; border-bottom: 1px solid var(--border-light);
    }
    .dua-number {
        width: 42px; height: 42px; background: var(--navy-tint); color: var(--navy);
        border-radius: 12px; display: flex; align-items: center; justify-content: center;
        font-family: 'Cormorant Garamond', serif; font-weight: 700; font-size: 1.2rem;
    }
    .dua-detail-title {
        font-family: 'Cormorant Garamond', serif; color: var(--navy);
        margin: 0; font-size: 1.5rem; font-weight: 700; flex: 1; line-height: 1.2;
    }

    .dua-arabic {
        font-family: 'Scheherazade New', serif; font-size: 2.2rem;
        color: var(--navy); font-weight: 500; line-height: 2.4;
        margin-bottom: 30px; text-align: right;
        padding: 20px 0; border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light);
    }

    .transliteration-box {
        background: var(--gold-tint); border: 1px solid rgba(201, 168, 76, 0.15);
        padding: 20px 25px; border-radius: var(--radius-sm); margin-bottom: 25px;
    }
    .box-label {
        color: var(--gold-dark); margin-bottom: 10px; font-size: .75rem; text-transform: uppercase;
        letter-spacing: 1px; font-weight: 700; display: flex; align-items: center; gap: 8px;
        font-family: 'Outfit', sans-serif;
    }
    .box-label i { font-size: .9rem; }
    .transliteration-text {
        color: var(--text-medium); font-size: 1.1rem; line-height: 1.6; margin: 0; font-style: italic;
    }

    .translation-box { margin-bottom: 25px; }
    .translation-label {
        color: var(--navy); margin-bottom: 10px; font-size: .75rem; text-transform: uppercase;
        letter-spacing: 1px; font-weight: 700; display: flex; align-items: center; gap: 8px;
        font-family: 'Outfit', sans-serif;
    }
    .translation-text {
        color: var(--text-medium); font-size: 1.1rem; line-height: 1.7; margin: 0;
    }

    .reference-tag {
        font-size: .8rem; color: var(--navy); background: var(--navy-tint);
        padding: 8px 16px; border-radius: var(--radius-full); display: inline-flex;
        align-items: center; gap: 8px; border: 1px solid var(--border-light); font-weight: 600;
    }
    .reference-tag i { color: var(--gold-dark); }

    .no-results-box {
        text-align: center; padding: 60px 20px; background: var(--white);
        border-radius: var(--radius-md); border: 1px dashed var(--border);
    }
    .no-results-box i { font-size: 3rem; margin-bottom: 20px; color: var(--text-faint); }
    .no-results-box h4 { color: var(--navy); font-size: 1.4rem; font-family: 'Cormorant Garamond', serif; margin: 0; }
    
    @media (max-width: 768px) {
        .dua-category-section { padding: 60px 0; }
        .section-title { font-size: 2.2rem; }
        .dua-detail-card { padding: 25px; }
        .dua-arabic { font-size: 1.8rem; }
    }
</style>

<section class="section dua-category-section">
    <div class="section-inner">
        <div class="breadcrumb">
            <a href="{{ route('duas.index') }}" class="dua-back-btn">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas {{ $category->icon_class ?? 'fa-praying-hands' }}"></i> Category</div>
            <h1 class="section-title"><span>{{ $category->name_english }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">{{ $category->name_urdu }}</p>
        </div>

        <!-- OUTPUT CARD: Duas List -->
        <div class="dua-list-grid">
            @forelse($category->duas as $index => $dua)
            <div class="dua-detail-card">
                <div class="dua-title-box">
                    <div class="dua-number">{{ $index + 1 }}</div>
                    <h3 class="dua-detail-title">{{ $dua->title_english }}</h3>
                </div>
                
                <div class="dua-arabic" dir="rtl">
                    {{ $dua->arabic_text }}
                </div>
                
                <div class="transliteration-box">
                    <div class="box-label"><i class="fas fa-language"></i> Transliteration</div>
                    <p class="transliteration-text">{{ $dua->transliteration }}</p>
                </div>

                <div class="translation-box">
                    <div class="translation-label"><i class="fas fa-book-reader"></i> Translation</div>
                    <p class="translation-text">{{ $dua->translation }}</p>
                </div>
                
                @if($dua->reference_source)
                <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid var(--border-light);">
                    <span class="reference-tag"><i class="fas fa-bookmark"></i> {{ $dua->reference_source }}</span>
                </div>
                @endif
            </div>
            @empty
            <div class="no-results-box">
                <i class="fas fa-search"></i>
                <h4>No duas found in this category yet.</h4>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@type": "WebPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $category->name_english }} Duas",
      "description": "Authentic daily duas for {{ $category->name_english }}."
    }
  ]
}
</script>
@endsection