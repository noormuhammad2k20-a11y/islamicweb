@extends('layouts.app')

@section('title', $category->name_english . ' - Duas')

@section('content')
<style>
    .dua-detail-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    .dua-detail-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; bottom: 0; width: 4px;
        background: linear-gradient(180deg, var(--primary), var(--primary-light));
    }
    .dua-title-box {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .dua-number {
        width: 40px; height: 40px;
        background: rgba(var(--primary-rgb), 0.1);
        color: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.1rem;
    }
    .dua-detail-title {
        color: var(--primary-dark);
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        flex: 1;
    }
    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2.8rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.8;
        margin-bottom: 30px;
        text-align: right;
        background: linear-gradient(135deg, var(--primary-dark), #111);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .transliteration-box {
        background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.08), rgba(var(--gold-rgb), 0.02));
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 25px;
        border-left: 4px solid var(--gold);
        position: relative;
    }
    .box-label {
        color: var(--gold);
        margin-bottom: 8px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .transliteration-text {
        color: #444;
        font-size: 1.2rem;
        line-height: 1.6;
        margin: 0;
        font-style: italic;
    }
    .translation-box {
        margin-bottom: 25px;
    }
    .translation-label {
        color: var(--primary);
        margin-bottom: 8px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .translation-text {
        color: #555;
        font-size: 1.2rem;
        line-height: 1.7;
        margin: 0;
    }
    .reference-tag {
        font-size: 0.9rem;
        color: #888;
        background: #f9f9f9;
        padding: 8px 15px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #eee;
    }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 30px;">
            <a href="{{ route('duas.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-arrow-left"></i> Back to Categories</a>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas {{ $category->icon_class ?? 'fa-praying-hands' }}"></i> Category</div>
            <h1 class="section-title"><span>{{ $category->name_english }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle" style="font-family: 'Amiri', serif; font-size: 2rem; color: var(--gold); margin-top: 10px;">{{ $category->name_urdu }}</p>
        </div>

        <!-- OUTPUT CARD: Duas List -->
        <div style="display: grid; grid-template-columns: 1fr; gap: 35px; max-width: 900px; margin: 0 auto;">
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
                <div style="margin-top: 25px; padding-top: 20px; border-top: 1px dashed #eee;">
                    <span class="reference-tag"><i class="fas fa-bookmark" style="color: var(--gold);"></i> {{ $dua->reference_source }}</span>
                </div>
                @endif
            </div>
            @empty
            <div style="text-align: center; padding: 60px; background: white; border-radius: 20px; border: 1px dashed #ddd;">
                <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 20px; color: #ccc;"></i>
                <h4 style="color: #777; font-size: 1.2rem;">No duas found in this category yet.</h4>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $category->name_english }} Duas",
      "description": "Authentic daily duas for {{ $category->name_english }}."
    }
  ]
}
</script>
@endsection
