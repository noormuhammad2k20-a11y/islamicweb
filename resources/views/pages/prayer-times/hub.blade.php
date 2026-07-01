@extends('layouts.app')

@section('title', 'Accurate Islamic Prayer Times — Salat & Namaz Timings Worldwide')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Prayer Times</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-clock"></i> Timings</div>
            <h1 class="section-title">Prayer <span>Times</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Accurate daily Salat timings for major cities around the world.</p>
        </div>

        <div class="services-grid">
            @foreach($cities as $city)
            <div class="service-card" style="text-align: center;">
                <div class="service-icon"><i class="fas fa-mosque"></i></div>
                <h3 style="margin-bottom: 15px;">{{ $city->name }}</h3>
                <p style="margin-bottom: 20px; font-size: 0.95rem; color: #666;">View daily Namaz timings and the monthly calendar for {{ $city->name }}.</p>
                <a href="{{ route('prayer-times.city', $city->slug) }}" class="service-link">View Timings <i class="fas fa-arrow-right"></i></a>
            </div>
            @endforeach
            @if($cities->count() == 0)
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                <p style="color: #666;">No cities found.</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
