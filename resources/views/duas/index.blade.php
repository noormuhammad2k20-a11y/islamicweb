@extends('layouts.app')

@section('head')
<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<link rel="canonical" href="{{ $seo['canonical'] }}">
<meta property="og:title" content="{{ $seo['title'] }}">
<meta property="og:description" content="{{ $seo['description'] }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $seo['canonical'] }}">
<link rel="alternate" hreflang="ur" href="{{ str_replace(config('app.url'), config('app.url').'/ur', $seo['canonical']) }}">
<link rel="alternate" hreflang="en" href="{{ $seo['canonical'] }}">
<link rel="alternate" hreflang="x-default" href="{{ $seo['canonical'] }}">

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebPage",
  "name": "{{ $seo['title'] }}",
  "description": "{{ $seo['description'] }}"
}
</script>
<link rel="stylesheet" href="{{ asset('css/duas.css') }}">
@endsection

@section('content')
<div class="dua-page">
  <div class="section-inner" style="margin-top: 24px;">
    <div class="dua-breadcrumb-wrapper">
      <nav class="dua-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}"><i class="fas fa-home" style="margin-right: 4px;"></i> Home</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <span>Duas</span>
      </nav>
    </div>
  </div>

  <header class="dua-hero">
    <div class="dua-hero-inner">
      <h1 class="dua-title-urdu">تمام دعائیں</h1>
      <h2 class="dua-title-roman">All Islamic Duas</h2>
      <p class="dua-hero-desc">
        Sone ki dua, namaz ki dua, shifa ki dua aur 95+ Islamic duain mukammal Arabic text, Urdu tarjuma, Roman Urdu aur hadith hawale ke sath. NoorIslam par tamam zaroorat ki duain.
      </p>
    </div>
  </header>

  <div class="section-inner" style="margin-top: 40px; margin-bottom: 40px;">
    @if($featuredDuas->count() > 0)
    <div>
      <div class="section-header">
        <div class="section-badge"><i class="fas fa-star"></i> Must Read</div>
        <h2 class="section-title"><span>Featured</span> Duas</h2>
        <p class="section-subtitle">Highly recommended daily prayers for every Muslim</p>
      </div>
      
      <div class="featured-dua-grid">
        @foreach($featuredDuas as $dua)
        <a href="{{ route('duas.show', ['category' => $dua->primary_category_slug, 'slug' => $dua->seo_slug]) }}" style="text-decoration: none; color: inherit;">
          <div class="featured-dua-card">
            <h3 class="featured-dua-title">{{ $dua->title_roman_urdu ?? $dua->title_english ?? $dua->title_urdu }}</h3>
            <div class="featured-dua-arabic">{{ \Illuminate\Support\Str::limit($dua->arabic_text, 60) }}</div>
            <div class="featured-dua-meaning">{{ $dua->short_meaning ?? $dua->translation }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif
  </div>

  <section class="all-categories-section">
    <div class="section-inner">
      <div class="section-header">
        <div class="section-badge"><i class="fas fa-layer-group"></i> Browse By Topic</div>
        <h2 class="section-title">Dua <span>Categories</span></h2>
        <p class="section-subtitle">Find the exact supplication you need from our comprehensive collection</p>
      </div>

      <div class="category-tile-grid">
        @foreach($categories as $cat)
        <a href="{{ route('duas.category', $cat->slug) }}" class="dua-category-tile">
          <div class="dua-category-tile-icon"><i class="fas {{ $cat->icon_class }}"></i></div>
          <div class="dua-category-tile-content">
            <h3 class="dua-category-tile-title">{{ $cat->name_roman_urdu ?? $cat->name_english }}</h3>
            <p class="dua-category-tile-count">{{ $cat->duas_count }} Duas available</p>
          </div>
          <div class="dua-category-tile-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        @endforeach
      </div>
    </div>
  </section>
</div>
@endsection
