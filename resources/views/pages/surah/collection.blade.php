@extends('layouts.app')
@section('title', $collection->name_en . ' - Surahs of the Quran')
@section('content')
<style>
.collection-container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 0 15px;
}
.collection-header {
    text-align: center;
    margin-bottom: 40px;
}
.collection-header h1 {
    color: var(--primary-dark);
    font-size: 2.5rem;
    margin-bottom: 15px;
}
.collection-header p {
    color: #555;
    font-size: 1.1rem;
    max-width: 800px;
    margin: 0 auto;
}
</style>
<div class="collection-container">
    {{-- Breadcrumb --}}
    <div class="breadcrumb" style="text-align: center; margin-bottom: 30px;">
        <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
            <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a>
            <span style="color: #ccc; margin: 0 10px;">/</span>
            <a href="{{ route('surah.index') }}" style="color: var(--primary); text-decoration: none;">Surahs</a>
            <span style="color: #ccc; margin: 0 10px;">/</span>
            <span style="color: #666; font-weight: 600;">{{ $collection->name_en }}</span>
        </div>
    </div>

    <div class="collection-header">
        <h1>{{ $collection->name_en }}</h1>
        <p>{{ $collection->description_en }}</p>
    </div>
    
    <div class="surah-popular-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:25px;">
        @foreach($collection->surahs as $surah)
            <a href="{{ route('surah.show', $surah->slug) }}" class="surah-popular-card" style="display:flex; align-items:center; background:#fff; padding:20px; border-radius:12px; text-decoration:none; color:inherit; box-shadow:0 4px 15px rgba(0,0,0,0.05); transition:transform 0.3s ease;">
                <div class="surah-popular-number" style="width:50px; height:50px; background:#f0f0f0; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold; font-size:1.2rem; margin-right:20px; color:var(--primary);">{{ $surah->number }}</div>
                <div class="surah-popular-info">
                    <h3 style="margin:0 0 5px 0; font-size:1.2rem; color:var(--primary-dark);">{{ $surah->name_en }}</h3>
                    <div class="surah-meta" style="font-size:0.9rem; color:#666;">
                        <span><i class="fas {{ ($surah->revelation_type == 'Madani') ? 'fa-mosque' : 'fa-kaaba' }}"></i> {{ $surah->revelation_type }}</span>
                        <span style="margin:0 8px;">•</span>
                        <span><i class="fas fa-list-ol"></i> {{ $surah->total_ayahs }} Ayahs</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
