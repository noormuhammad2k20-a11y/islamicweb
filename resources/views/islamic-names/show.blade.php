@extends('layouts.app')

@section('title', $islamicName->name . ' Name Meaning in Urdu & English | IslamicWeb')
@section('meta_description', $islamicName->name . ' name meaning: ' . $islamicName->meaning_english . '. ' . $islamicName->name . ' ka matlab Urdu mein: ' . ($islamicName->meaning_urdu ?? '') . '. ' . ($islamicName->origin ?? 'Arabic') . ' origin Muslim name.')

@section('content')

{{-- Breadcrumb --}}
<div class="container">
  <nav class="breadcrumb">
    <a href="/">Home</a> &rsaquo;
    <a href="/islamic-names">Islamic Names</a> &rsaquo;
    <span>{{ $islamicName->name }}</span>
  </nav>
</div>

{{-- Name Hero --}}
<section class="page-hero">
  <div class="container">
    @if(!empty($islamicName->arabic))
      <div class="arabic-name-hero">{{ $islamicName->arabic }}</div>
    @endif
    <h1>{{ $islamicName->name }}</h1>

    <div class="name-badges">
      @if(!empty($islamicName->gender))
        <span class="badge badge-gender">{{ $islamicName->gender }}</span>
      @endif
      @if(!empty($islamicName->origin))
        <span class="badge badge-origin">{{ $islamicName->origin }} Origin</span>
      @endif
      @if(!empty($islamicName->is_quranic) && $islamicName->is_quranic)
        <span class="badge badge-quran">✦ Quranic Name</span>
      @endif
      @if(!empty($islamicName->is_prophet_name) && $islamicName->is_prophet_name)
        <span class="badge badge-prophet">☪ Prophet Name</span>
      @endif
    </div>
  </div>
</section>

<div class="container section-gap">
  <div class="name-detail-grid">

    {{-- Left: Meanings + Info --}}
    <div class="name-main">

      {{-- Meaning Cards --}}
      <div class="meaning-row">
        <div class="meaning-card">
          <div class="meaning-label">Meaning in Urdu</div>
          <div class="meaning-value urdu-text">{{ $islamicName->meaning_urdu ?? '—' }}</div>
        </div>
        <div class="meaning-card">
          <div class="meaning-label">Meaning in English</div>
          <div class="meaning-value">{{ $islamicName->meaning_english ?? '—' }}</div>
        </div>
      </div>

      {{-- About the Name --}}
      <div class="content-block">
        <h2>About the Name {{ $islamicName->name }}</h2>
        <p>
          <strong>{{ $islamicName->name }}</strong> is a beautiful Islamic name
          @if(!empty($islamicName->origin)) of <strong>{{ $islamicName->origin }}</strong> origin @endif
          suitable for
          @if(!empty($islamicName->gender)) {{ strtolower($islamicName->gender) }}s @else Muslims @endif.
          @if(!empty($islamicName->is_quranic) && $islamicName->is_quranic)
            This name appears in the Holy Quran, which makes it especially blessed and recommended.
          @endif
          @if(!empty($islamicName->is_prophet_name) && $islamicName->is_prophet_name)
            This name belongs to one of the Prophets of Allah, making it highly recommended
            for Muslim children as it connects them to prophetic legacy.
          @endif
        </p>
      </div>

      {{-- Quick Facts Grid --}}
      <div class="quick-facts-grid">
        <div class="fact-box">
          <span class="fact-label">Language</span>
          <span class="fact-value">{{ $islamicName->origin ?? 'Arabic' }}</span>
        </div>
        <div class="fact-box">
          <span class="fact-label">Gender</span>
          <span class="fact-value">{{ $islamicName->gender ?? '—' }}</span>
        </div>
        <div class="fact-box">
          <span class="fact-label">Religion</span>
          <span class="fact-value">Islam</span>
        </div>
        <div class="fact-box">
          <span class="fact-label">Short Name</span>
          <span class="fact-value">{{ strlen($islamicName->name) <= 6 ? 'Yes' : 'No' }}</span>
        </div>
        @if(!empty($islamicName->is_quranic))
        <div class="fact-box">
          <span class="fact-label">Quranic</span>
          <span class="fact-value">{{ $islamicName->is_quranic ? 'Yes' : 'No' }}</span>
        </div>
        @endif
        @if(!empty($islamicName->is_prophet_name))
        <div class="fact-box">
          <span class="fact-label">Prophet Name</span>
          <span class="fact-value">{{ $islamicName->is_prophet_name ? 'Yes' : 'No' }}</span>
        </div>
        @endif
      </div>

      {{-- Share & Save --}}
      <div class="name-actions">
        <button class="btn-action" onclick="shareThis()">📤 Share this Name</button>
        <button class="btn-action" onclick="copyName()">📋 Copy Name</button>
      </div>

    </div>

    {{-- Right Sidebar --}}
    <aside class="name-sidebar">
      <div class="sidebar-card">
        <h3>Quick Summary</h3>
        <dl class="detail-list">
          <dt>Name</dt>
          <dd>{{ $islamicName->name }}</dd>
          @if(!empty($islamicName->arabic))
          <dt>Arabic</dt>
          <dd class="arabic-inline">{{ $islamicName->arabic }}</dd>
          @endif
          <dt>Meaning</dt>
          <dd>{{ Str::limit($islamicName->meaning_english, 60) }}</dd>
          <dt>Gender</dt>
          <dd>{{ $islamicName->gender ?? '—' }}</dd>
          <dt>Origin</dt>
          <dd>{{ $islamicName->origin ?? 'Arabic' }}</dd>
        </dl>
      </div>

      <div class="sidebar-card">
        <h3>Browse Names</h3>
        <a href="/islamic-names?gender=male" class="sidebar-link">👦 Boy Names</a>
        <a href="/islamic-names?gender=female" class="sidebar-link">👧 Girl Names</a>
        <a href="/islamic-names?filter=quranic" class="sidebar-link">📖 Quranic Names</a>
        <a href="/islamic-names?filter=prophet" class="sidebar-link">☪ Prophet Names</a>
      </div>
    </aside>

  </div>
</div>

@push('scripts')
<script>
function shareThis() {
  if (navigator.share) {
    navigator.share({
      title: '{{ $islamicName->name }} — Islamic Name Meaning',
      text: '{{ $islamicName->name }}: {{ $islamicName->meaning_english }}',
      url: window.location.href
    });
  } else {
    navigator.clipboard.writeText(window.location.href);
    alert('Link copied to clipboard!');
  }
}
function copyName() {
  navigator.clipboard.writeText('{{ $islamicName->name }}');
  alert('Name "{{ $islamicName->name }}" copied!');
}
</script>
@endpush

@endsection
