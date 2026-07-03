@extends('layouts.app')

@php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year . ' AH' : '';
@endphp

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        padding: 50px 0 35px;
        position: relative;
        overflow: hidden;
        border-bottom: 4px solid var(--gold);
    }
    .hero-content {
        text-align: center;
        color: var(--white);
        position: relative;
        z-index: 2;
    }
    .hero-gregorian {
        font-size: 1.1rem;
        color: var(--gold-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        margin-bottom: 10px;
    }
    .hero-hijri {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 700;
        line-height: 1.2;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        margin-bottom: 5px;
    }
    .hero-city {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 20px;
        background: rgba(0, 0, 0, 0.2);
        display: inline-block;
        padding: 5px 15px;
        border-radius: var(--radius-xl);
    }

    .theme-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 25px;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(10, 58, 42, 0.06);
        height: 100%;
        margin-bottom: 25px;
    }
    .theme-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(10, 58, 42, 0.08);
    }
</style>

<div class="page-header">
    <div class="container">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 20px; position: relative; z-index: 2;">
            <a href="{{ route('home') }}" style="color: var(--gold-light); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
            <span style="color: rgba(255,255,255,0.4); margin: 0 10px;">/</span> 
            <a href="{{ route('islamic-date.hub') }}" style="color: var(--gold-light); text-decoration: none;">Islamic Date</a>
            <span style="color: rgba(255,255,255,0.4); margin: 0 10px;">/</span>
            <a href="{{ route('islamic-date.country', $country->slug) }}" style="color: var(--gold-light); text-decoration: none;">{{ $country->name }}</a>
            <span style="color: rgba(255,255,255,0.4); margin: 0 10px;">/</span>
            <span style="color: var(--white);">{{ $city->name }}</span>
        </div>
        <div class="hero-content">
            <div class="hero-gregorian"><i class="far fa-calendar-alt" style="margin-right: 8px;"></i>{{ date('l, d F Y') }}</div>
            <div class="hero-hijri">{{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'Unknown' }}</div>
            <div class="hero-city"><i class="fas fa-map-marker-alt" style="color: var(--gold);"></i> {{ $city->name }}, {{ $country->name }} ({{ $hijriDate ? $hijriDate->hijri_year : '' }} AH)</div>
        </div>
    </div>
</div>

<section class="section" style="padding-top: 40px; background-color: var(--secondary-light);">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        
        <x-social-share :title="'Islamic Date & Prayer Times in ' . $city->name . ' - ' . $titleHijri" />

        @if($city->local_context_note)
        <div style="background: var(--white); padding: 20px; border-left: 4px solid var(--primary); border-radius: 0 var(--radius-md) var(--radius-md) 0; margin-bottom: 30px; box-shadow: var(--shadow-sm);">
            <h4 style="margin: 0 0 5px 0; color: var(--primary-dark); font-size: 1.1rem;"><i class="fas fa-info-circle text-primary"></i> Local Context</h4>
            <p style="margin: 0; color: var(--text-medium); font-size: 0.95rem;">{{ $city->local_context_note }}</p>
        </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-4">
                <x-prayer-widget :city="$city->name" :country="$country->name" :prayerTimes="$prayerTimes" />
            </div>

            <div class="col-lg-4">
                <div class="theme-card" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); color: var(--white); border: none;">
                    <h3 class="theme-section-title" style="color: var(--gold-light); border-color: rgba(255,255,255,0.1);"><i class="fas fa-moon"></i> Moon Phase in {{ $city->name }}</h3>
                    <x-moon-phase-widget :moonPhase="$moonPhase" />
                </div>
            </div>

            <div class="col-lg-4">
                <x-hijri-converter-widget />
            </div>
        </div>
        
        <!-- FAQs -->
        @php
        $faqs = [
            ['q' => "What is the Islamic date today in {$city->name}?", 'a' => "Today's Islamic date in {$city->name} is " . ($hijriDate ? "{$hijriDate->hijri_day} {$hijriDate->hijri_month} {$hijriDate->hijri_year} AH" : "currently calculating") . "."],
            ['q' => "Which prayer calculation method is used for {$city->name}?", 'a' => "The prayer times for {$city->name} are calculated using the " . ($city->prayer_calc_method ?? 'standard recognized method for this region') . "."],
        ];
        @endphp
        
        <div class="theme-card" style="margin-top: 20px; margin-bottom: 40px;">
            <h3 class="theme-section-title text-center" style="justify-content: center; border: none;"><i class="fas fa-question-circle" style="color: var(--gold);"></i> FAQs - {{ $city->name }}</h3>
            <x-faq-block :faqs="$faqs" />
        </div>

        <x-author-box />
    </div>
</section>
@endsection
