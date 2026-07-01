@extends('layouts.app')

@section('title', $dua->title_english . ' - ' . $category->name_english)

@section('content')
<style>
    .dua-detail-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 25px;
        position: relative;
        overflow: hidden;
    }
    .dua-detail-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--gold), var(--primary-light));
    }
    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.6;
        margin-bottom: 25px;
        text-align: right;
        background: linear-gradient(135deg, var(--primary-dark), #111);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .transliteration-box {
        background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.05), rgba(var(--gold-rgb), 0.01));
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 3px solid var(--gold);
        position: relative;
    }
    .box-label {
        color: var(--gold);
        margin-bottom: 8px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .transliteration-text {
        color: #444;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0;
        font-style: italic;
    }
    .translation-box {
        margin-bottom: 20px;
    }
    .translation-label {
        color: var(--primary);
        margin-bottom: 8px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .translation-text {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }
    .reference-tag {
        font-size: 0.75rem;
        color: #888;
        background: #f9f9f9;
        padding: 6px 12px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #eee;
        font-weight: 500;
    }
    .breadcrumb-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
    }
    .breadcrumb-nav {
        display: inline-flex;
        align-items: center;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 50px;
        padding: 8px 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .breadcrumb-nav a {
        color: #666;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: color 0.2s;
    }
    .breadcrumb-nav a:hover {
        color: var(--primary);
    }
    .breadcrumb-nav .separator {
        color: #ccc;
        margin: 0 10px;
        font-size: 0.7rem;
    }
    .breadcrumb-nav .current-page {
        color: var(--primary);
        font-weight: 600;
    }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb-nav">
                <a href="{{ route('duas.index') }}" class="parent-link"><i class="fas fa-book-open" style="margin-right: 5px;"></i> Duas Library</a>
                <i class="fas fa-chevron-right separator"></i>
                <a href="{{ route('duas.category', $category->slug) }}" class="current-page">{{ $category->name_english }}</a>
            </div>
        </div>

        <div style="max-width: 750px; margin: 0 auto;">
            <h1 style="color: var(--primary-dark); font-size: 1.8rem; margin-bottom: 30px; text-align: center;">{{ $dua->title_english }}</h1>

            <div class="dua-detail-card">
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
                <div style="margin-top: 30px; padding-top: 25px; border-top: 1px dashed #eee;">
                    <span class="reference-tag"><i class="fas fa-bookmark" style="color: var(--gold);"></i> {{ $dua->reference_source }}</span>
                </div>
                @endif
            </div>

            <!-- SEO INTERNAL LINKING: RELATED DUAS -->
            @if($relatedDuas->isNotEmpty())
            <div style="margin-top: 60px;">
                <h3 style="font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 20px; text-align: center; font-weight: 600;">
                    Explore More in {{ $category->name_english }}
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                    @foreach($relatedDuas as $related)
                    <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $related->seo_slug]) }}" style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 20px; text-decoration: none; display: flex; align-items: center; gap: 15px; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0,0,0,0.02);" onmouseover="this.style.borderColor='var(--primary)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.05)';" onmouseout="this.style.borderColor='#eee'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.02)';">
                        <div style="background: rgba(var(--primary-rgb), 0.05); color: var(--primary); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0;">
                            <i class="fas fa-praying-hands"></i>
                        </div>
                        <div>
                            <div style="color: #333; font-weight: 600; font-size: 0.95rem; line-height: 1.3; margin-bottom: 4px;">{{ Str::limit($related->title_english, 45) }}</div>
                            <div style="color: #999; font-size: 0.75rem;">Read Supplication &rarr;</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

@section('meta')
<link rel="canonical" href="{{ url()->current() }}" />
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $dua->title_english }} | {{ $category->name_english }}",
      "description": "Read the authentic {{ $dua->title_english }} including Arabic, Transliteration, and English Translation. Sourced from {{ $dua->reference_source ?? 'authentic hadith' }}.",
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
            "name": "{{ $dua->title_english }}",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    },
    {
      "@@type": "Article",
      "headline": "{{ $dua->title_english }}",
      "articleSection": "{{ $category->name_english }}",
      "articleBody": "{{ strip_tags($dua->translation) }}",
      "author": {
         "@@type": "Organization",
         "name": "Islamic Web Platform"
      }
    }
  ]
}
</script>
@endsection
@endsection
