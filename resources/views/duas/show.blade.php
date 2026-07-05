@extends('layouts.app')

@section('head')
{{-- === CRITICAL SEO META TAGS === --}}
<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<link rel="canonical" href="{{ $seo['canonical'] }}">
<meta property="og:title" content="{{ $seo['title'] }}">
<meta property="og:description" content="{{ $seo['description'] }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ $seo['canonical'] }}">
<meta property="og:image" content="{{ config('app.url') }}/images/dua-og-default.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo['title'] }}">
<link rel="alternate" hreflang="ur" href="{{ str_replace(config('app.url'), config('app.url').'/ur', $seo['canonical']) }}">
<link rel="alternate" hreflang="en" href="{{ $seo['canonical'] }}">
<link rel="alternate" hreflang="x-default" href="{{ $seo['canonical'] }}">

{{-- === SCHEMA MARKUP (3 schemas) === --}}
<script type="application/ld+json">{!! json_encode($seo['schema_breadcrumb'], JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($seo['schema_article'], JSON_UNESCAPED_UNICODE) !!}</script>
@if(!empty($seo['schema_faq']))
<script type="application/ld+json">{!! json_encode($seo['schema_faq'], JSON_UNESCAPED_UNICODE) !!}</script>
@endif
<link rel="stylesheet" href="{{ asset('css/duas.css') }}">
@endsection

@section('content')
<div class="dua-page" itemscope itemtype="https://schema.org/Article">

  {{-- === BREADCRUMB === --}}
  <div class="section-inner" style="margin-top: 24px;">
    <div class="dua-breadcrumb-wrapper">
      <nav class="dua-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}"><i class="fas fa-home" style="margin-right: 4px;"></i> Home</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <a href="{{ route('duas.index') }}">Duas</a>
        @if($activeCategory)
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <a href="{{ route('duas.category', $activeCategory->slug) }}">{{ $activeCategory->name_english ?? $activeCategory->name_roman_urdu }}</a>
        @endif
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <span>{{ $dua->title_english ?? $dua->title_roman_urdu }}</span>
      </nav>
    </div>
  </div>

  {{-- === HERO HEADER === --}}
  <header class="dua-hero">
    <div class="dua-hero-inner">
      <div class="dua-category-badge">
        @foreach($dua->categories as $cat)
          <a href="{{ route('duas.category', $cat->slug) }}" class="badge-gold">
            <i class="fas {{ $cat->icon_class }}"></i> {{ $cat->name_roman_urdu ?? $cat->name_english }}
          </a>
        @endforeach
      </div>
      <h1 class="dua-title-roman" itemprop="headline">{{ $dua->title_roman_urdu }}</h1>
      <h2 class="dua-title-urdu">{{ $dua->title_urdu }}</h2>
      <p class="dua-short-meaning" itemprop="description">{{ $dua->short_meaning }}</p>
      
      <div class="dua-meta-badges">
        @if($dua->when_to_read)
          <span class="meta-badge"><i class="fas fa-clock"></i> {{ $dua->when_to_read }}</span>
        @endif
        @if($dua->how_many_times)
          <span class="meta-badge"><i class="fas fa-redo"></i> {{ $dua->how_many_times }}</span>
        @endif
        @if($dua->hadith_grade)
          <span class="meta-badge grade-{{ strtolower($dua->hadith_grade) }}">
            <i class="fas fa-check-circle"></i> {{ $dua->hadith_grade }}
          </span>
        @endif
      </div>
    </div>
  </header>

  <div class="section-inner dua-content-grid">
    <main class="dua-main">

      {{-- === ARABIC TEXT CARD (PRIMARY CONTENT) === --}}
      <section class="arabic-card" aria-label="Arabic Dua Text">
        <div class="arabic-text" dir="rtl" lang="ar">
          {{ $dua->arabic_text }}
        </div>
        <div class="dua-action-bar">
          <button class="copy-btn" onclick="copyArabic(this)" aria-label="Copy Arabic text">
            <i class="far fa-copy"></i> Copy
          </button>
          <button class="listen-btn" onclick="readAloud(this)" aria-label="Listen to dua">
            <i class="fas fa-volume-up"></i> Listen
          </button>
        </div>
      </section>

      {{-- === TRANSLITERATION === --}}
      @if($dua->transliteration)
      <section class="transliteration-card">
        <h2 class="section-heading"><span class="gold-line"></span> Transliteration (تلفظ)</h2>
        <p class="transliteration-text">{{ $dua->transliteration }}</p>
      </section>
      @endif

      {{-- === TRANSLATION === --}}
      @if($dua->translation)
      <section class="translation-card">
        <h2 class="section-heading"><span class="gold-line"></span> Translation (ترجمہ)</h2>
        <p class="translation-text" dir="auto">{{ $dua->translation }}</p>
      </section>
      @endif

      {{-- === WORD BY WORD (if available) === --}}
      @if($dua->word_by_word_translation)
      <section class="word-by-word-card">
        <h2 class="section-heading"><span class="gold-line"></span> Word by Word Meaning (لفظ بہ لفظ ترجمہ)</h2>
        <div class="word-grid" dir="rtl">
          @foreach($dua->word_by_word_translation as $word)
          <div class="word-item">
            <span class="word-arabic">{{ $word['arabic'] ?? '' }}</span>
            <span class="word-urdu">{{ $word['urdu'] ?? '' }}</span>
            <span class="word-english">{{ $word['english'] ?? '' }}</span>
          </div>
          @endforeach
        </div>
      </section>
      @endif

      {{-- === HADITH REFERENCE === --}}
      @if($dua->reference_source || $dua->hadith_reference)
      <section class="hadith-reference-card">
        <h2 class="section-heading"><span class="gold-line"></span> حوالہ / Hadith Reference</h2>
        <div class="reference-box">
          <i class="fas fa-book-open"></i>
          <div>
            <strong>{{ $dua->book_name ?? $dua->collection_name }}</strong>
            @if($dua->hadith_number) — Hadith #{{ $dua->hadith_number }} @endif
            @if($dua->hadith_grade) <span class="grade-badge">{{ $dua->hadith_grade }}</span> @endif
            @if($dua->reference_source) <p>{{ $dua->reference_source }}</p> @endif
            @if($dua->narrator) <p class="narrator">Narrator: {{ $dua->narrator }}</p> @endif
          </div>
        </div>
      </section>
      @endif

      {{-- === RELATED DUAS === --}}
      @if($relatedDuas->count() > 0)
      <section class="related-duas-card" style="margin-bottom: 32px;">
        <h2 class="section-heading"><span class="gold-line"></span> Related Duas (متعلقہ دعائیں)</h2>
        <div class="category-tile-grid">
          @foreach($relatedDuas as $related)
          @php
             // Generate an SEO friendly title
             $title = $related->title_roman_urdu ?? $related->seo_title;
             
             // Fallback to title_english if it's short and not a narration
             if (!$title && $related->title_english) {
                 $isNarration = str_contains(strtolower($related->title_english), 'o allah') || str_contains(strtolower($related->title_english), 'narrated') || strlen($related->title_english) > 50;
                 $title = $isNarration ? null : $related->title_english;
             }
             
             // Ultimate fallback: Parse the SEO slug into a readable title
             if (!$title) {
                 $title = ucwords(str_replace('-', ' ', $related->seo_slug));
                 if (!str_contains(strtolower($title), 'dua')) {
                     $title .= ' Dua';
                 }
             }
             
             $categoryName = $related->categories->first() ? $related->categories->first()->name_english : 'Supplication';
          @endphp
          <a href="{{ route('duas.show', ['category' => $related->primary_category_slug, 'slug' => $related->seo_slug]) }}" class="dua-category-tile">
            <div class="dua-category-tile-icon" style="width: 40px; height: 40px; font-size: 1.1rem; margin-right: 12px; background: var(--primary-subtle); color: var(--primary);">
              <i class="fas fa-praying-hands"></i>
            </div>
            <div class="dua-category-tile-content">
              <h3 class="dua-category-tile-title" style="font-size: 1rem; margin-bottom: 6px; line-height: 1.3;">{{ $title }}</h3>
              <div>
                <span class="badge-gold" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 12px;">{{ $categoryName }}</span>
              </div>
            </div>
            <div class="dua-category-tile-arrow">
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          @endforeach
        </div>
      </section>
      @endif

      {{-- === DETAILED EXPLANATION (200+ words — SEO content body) === --}}
      @if($dua->detailed_explanation)
      <section class="explanation-card" itemprop="articleBody">
        <h2 class="section-heading"><span class="gold-line"></span> تفصیلی وضاحت (Detailed Explanation)</h2>
        <div class="explanation-content">
          {!! nl2br(e($dua->detailed_explanation)) !!}
        </div>
      </section>
      @endif

      {{-- === BENEFITS === --}}
      @if($dua->benefits)
      <section class="benefits-card">
        <h2 class="section-heading"><span class="gold-line"></span> فوائد اور برکات (Benefits & Virtues)</h2>
        <div class="benefits-content">
          {!! nl2br(e($dua->benefits)) !!}
        </div>
        @if($dua->practical_benefits)
        <div class="practical-benefits">
          <h3>Amaliat Fayde (Practical Benefits)</h3>
          {!! nl2br(e($dua->practical_benefits)) !!}
        </div>
        @endif
      </section>
      @endif

      {{-- === HOW TO READ === --}}
      @if($dua->when_to_read || $dua->how_many_times || $dua->best_time || $dua->common_mistakes)
      <section class="how-to-read-card">
        <h2 class="section-heading"><span class="gold-line"></span> کیسے پڑھیں (How to Read)</h2>
        <div class="how-to-grid">
          @if($dua->when_to_read)
          <div class="how-item">
            <i class="fas fa-clock gold"></i>
            <strong>Kab Parhen:</strong> {{ $dua->when_to_read }}
          </div>
          @endif
          @if($dua->how_many_times)
          <div class="how-item">
            <i class="fas fa-redo gold"></i>
            <strong>Kitni Baar:</strong> {{ $dua->how_many_times }}
          </div>
          @endif
          @if($dua->best_time)
          <div class="how-item">
            <i class="fas fa-star gold"></i>
            <strong>Best Waqt:</strong> {{ $dua->best_time }}
          </div>
          @endif
        </div>
        @if($dua->common_mistakes)
        <div class="common-mistakes">
          <h3><i class="fas fa-exclamation-triangle"></i> Aam Ghaltiyan (Common Mistakes)</h3>
          {!! nl2br(e($dua->common_mistakes)) !!}
        </div>
        @endif
      </section>
      @endif

      {{-- === IMPORTANT NOTES === --}}
      @if($dua->important_notes || $dua->authenticity_notes)
      <section class="notes-card">
        <h2 class="section-heading"><span class="gold-line"></span> اہم نوٹس (Important Notes)</h2>
        @if($dua->important_notes)
        <div class="notes-box">{!! nl2br(e($dua->important_notes)) !!}</div>
        @endif
        @if($dua->authenticity_notes)
        <div class="authenticity-box">
          <i class="fas fa-shield-alt"></i> <strong>Authenticity:</strong> {!! nl2br(e($dua->authenticity_notes)) !!}
        </div>
        @endif
      </section>
      @endif

      {{-- === LESSONS LEARNED === --}}
      @if($dua->lessons_learned)
      <section class="lessons-card">
        <h2 class="section-heading"><span class="gold-line"></span> Seekhne Ke Nuqaat (Lessons Learned)</h2>
        {!! nl2br(e($dua->lessons_learned)) !!}
      </section>
      @endif

      {{-- === FAQ SECTION (Schema FAQPage — Google Featured Snippets) === --}}
      @if($dua->faqs && is_array($dua->faqs) && count($dua->faqs) > 0)
      <section class="faq-section" aria-label="Frequently Asked Questions">
        <h2 class="section-heading"><span class="gold-line"></span> اکثر پوچھے گئے سوالات (FAQ)</h2>
        <div class="faq-accordion">
          @foreach($dua->faqs as $i => $faq)
          <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-{{ $i }}" itemprop="name">
              <span>{{ $faq['question'] ?? '' }}</span>
              <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" id="faq-{{ $i }}" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text">{{ $faq['answer'] ?? '' }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      @endif

      {{-- === PREV / NEXT NAVIGATION === --}}
      <nav class="dua-pagination" aria-label="Previous and Next Dua">
        @if($prevDua)
        <a href="{{ route('duas.show', ['category' => $prevDua->primary_category_slug, 'slug' => $prevDua->seo_slug]) }}" class="prev-dua">
          <i class="fas fa-arrow-right"></i> {{ $prevDua->title_roman_urdu }}
        </a>
        @endif
        @if($nextDua)
        <a href="{{ route('duas.show', ['category' => $nextDua->primary_category_slug, 'slug' => $nextDua->seo_slug]) }}" class="next-dua">
          {{ $nextDua->title_roman_urdu }} <i class="fas fa-arrow-left"></i>
        </a>
        @endif
      </nav>

    </main>

    {{-- === SIDEBAR === --}}
    <aside class="dua-sidebar">
      
      {{-- Quick Info Box --}}
      <div class="sidebar-card quick-info">
        <h3 class="sidebar-heading">Quick Info</h3>
        <ul>
          @if($dua->dua_type ?? $dua->content_type) <li><strong>Type:</strong> {{ ucfirst($dua->dua_type ?? $dua->content_type) }}</li> @endif
          @if($dua->difficulty_level) <li><strong>Level:</strong> {{ ucfirst($dua->difficulty_level) }}</li> @endif
          @if($dua->reading_time) <li><strong>Read Time:</strong> {{ $dua->reading_time }} min</li> @endif
          @if($dua->occasion) <li><strong>Occasion:</strong> {{ $dua->occasion }}</li> @endif
        </ul>
      </div>

      {{-- Category Navigation --}}
      <div class="sidebar-card">
        <h3 class="sidebar-heading">Dua Categories</h3>
        <ul class="sidebar-category-list">
          @foreach(\App\Models\DuaCategory::whereNull('parent_id')->withCount('duas')->get() as $cat)
          <li>
            <a href="{{ route('duas.category', $cat->slug) }}" class="{{ $dua->categories->contains('id', $cat->id) ? 'active' : '' }}">
              <i class="fas {{ $cat->icon_class }}"></i>
              {{ $cat->name_roman_urdu ?? $cat->name_english }}
              <span class="count">{{ $cat->duas_count }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>

      {{-- Share Widget --}}
      <div class="sidebar-card share-widget">
        <h3 class="sidebar-heading">Share This Dua</h3>
        <div class="share-buttons">
          <a href="https://wa.me/?text={{ urlencode($dua->title_roman_urdu . ' - ' . $seo['canonical']) }}" target="_blank" class="share-wa">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
          <button onclick="copyPageLink()" class="share-copy">
            <i class="fas fa-link"></i> Copy Link
          </button>
        </div>
      </div>

    </aside>
  </div>

  {{-- === BOTTOM INTERNAL LINKING GRID === --}}
  <section class="all-categories-section">
    <div class="section-inner">
      <h2 class="section-heading" style="justify-content: center; font-size: 1.8rem; margin-bottom: 32px;">
        <span class="gold-line"></span> Browse More Duas
      </h2>
      <div class="category-tile-grid">
        @foreach(\App\Models\DuaCategory::whereNull('parent_id')->withCount('duas')->get() as $cat)
        <a href="{{ route('duas.category', $cat->slug) }}" class="dua-category-tile">
          <div class="dua-category-tile-icon">
            <i class="fas {{ $cat->icon_class }}"></i>
          </div>
          <div class="dua-category-tile-content">
            <h3 class="dua-category-tile-title">{{ $cat->name_english }}</h3>
            <p class="dua-category-tile-count">{{ $cat->duas_count }} Duas</p>
          </div>
          <div class="dua-category-tile-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </section>

</div>

@push('scripts')
<script>
function copyArabic(btn) {
    const text = @json($dua->arabic_text);
    if (text) {
        navigator.clipboard.writeText(text);
        showToast('Arabic text copied!');
        
        // Change button style temporarily
        const originalHtml = btn.innerHTML;
        btn.classList.add('copied-state');
        btn.innerHTML = '<i class="fas fa-check"></i> Copied';
        setTimeout(() => {
            btn.classList.remove('copied-state');
            btn.innerHTML = originalHtml;
        }, 2000);
    }
}
function copyPageLink() {
    navigator.clipboard.writeText(window.location.href);
    showToast('Link copied!');
}
function readAloud(btn) {
    const text = @json($dua->transliteration);
    if (text) {
        // Change button style
        const originalHtml = btn.innerHTML;
        btn.classList.add('playing-state');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Playing';
        
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'ar-SA';
        utterance.onend = function() {
            btn.classList.remove('playing-state');
            btn.innerHTML = originalHtml;
        };
        window.speechSynthesis.speak(utterance);
    }
}
function showToast(msg) {
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 3000);
}
// FAQ accordion
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', !expanded);
        btn.nextElementSibling.style.display = expanded ? 'none' : 'block';
    });
});
</script>
@endpush
@endsection
