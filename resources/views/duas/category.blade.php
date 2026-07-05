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
  "@@type": "CollectionPage",
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
        <a href="{{ route('duas.index') }}">Duas</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <span>{{ $category->name_english ?? $category->name_roman_urdu }}</span>
      </nav>
    </div>
  </div>

  <header class="dua-hero">
    <div class="dua-hero-inner">
      <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;"><i class="fas {{ $category->icon_class }}"></i></div>
      <h1 class="dua-title-roman">{{ $category->name_roman_urdu ?? $category->name_english }}</h1>
      <h2 class="dua-title-urdu">{{ $category->name_urdu }}</h2>
      @if($category->seo_description)
      <p class="dua-hero-desc">
        {{ $category->seo_description }}
      </p>
      @endif
    </div>
  </header>

  <div class="section-inner dua-content-grid">
    <main class="dua-main">
      <div class="featured-dua-grid">
        @forelse($duas as $dua)
        <a href="{{ route('duas.show', ['category' => $category->slug, 'slug' => $dua->seo_slug]) }}" style="text-decoration: none; color: inherit;">
          <div class="featured-dua-card">
            <h3 class="featured-dua-title">{{ $dua->title_roman_urdu ?? $dua->title_english ?? $dua->title_urdu }}</h3>
            <div class="featured-dua-arabic">{{ \Illuminate\Support\Str::limit($dua->arabic_text, 60) }}</div>
            <div class="featured-dua-meaning">{{ $dua->short_meaning ?? $dua->translation }}</div>
          </div>
        </a>
        @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 3rem; background: var(--secondary); border-radius: var(--radius-md);">
          <h3 style="color: var(--primary);">No duas found in this category yet.</h3>
        </div>
        @endforelse
      </div>

      <div style="margin-top: 2rem;">
        {{ $duas->links('vendor.pagination.custom') }}
      </div>
    </main>

    <aside class="dua-sidebar">
      <div class="sidebar-card">
        <h3 class="sidebar-heading">Other Categories</h3>
        <ul class="sidebar-category-list">
          @foreach($relatedCategories as $cat)
          <li>
            <a href="{{ route('duas.category', $cat->slug) }}">
              <i class="fas {{ $cat->icon_class }}" style="color: var(--gold); margin-right: 6px;"></i>
              {{ $cat->name_roman_urdu ?? $cat->name_english }}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </aside>
  </div>
</div>
@endsection
