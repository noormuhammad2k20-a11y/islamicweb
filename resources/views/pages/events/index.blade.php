@extends('layouts.app')

@section('title', 'Islamic Calendar & Events — Hijri Dates')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Islamic Calendar</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h1 class="section-title">Islamic <span>Events</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Months and Significant Dates</p>
        </div>

        <div class="services-grid">
            @foreach($months as $month)
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="font-size: 1.5rem; font-weight: bold; background: var(--primary-light); color: var(--primary-dark); width: 60px; height: 60px; border-radius: 50%; line-height: 60px; margin: 0 auto 20px auto;">{{ $month->month_number }}</div>
                <h3 style="font-family: 'Amiri', serif; font-size: 1.8rem; margin-bottom: 5px;">{{ $month->name_ar }}</h3>
                <h4 style="color: #666; font-size: 1.1rem; margin-bottom: 20px;">{{ $month->name_en }} ({{ $month->name_ur }})</h4>
                <a href="{{ route('events.month', $month->slug) }}" class="service-link">View Month <i class="fas fa-arrow-right"></i></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
