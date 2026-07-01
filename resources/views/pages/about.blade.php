@extends('layouts.app')

@section('title', 'About Us — Noor-e-Islam')
@section('meta_description', 'Learn about Noor-e-Islam, our mission to provide accurate Islamic timings, authentic Quranic resources, and reliable Hijri dates for Muslims worldwide.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">About Us</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-info-circle"></i> Info</div>
            <h1 class="section-title">About <span>Noor-e-Islam</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Our Mission and Vision</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-family: 'Amiri', serif;">Our Purpose</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px;">
                    Noor-e-Islam is dedicated to serving the global Muslim ummah by providing accurate, accessible, and authentic Islamic resources. In an increasingly digital world, having a reliable source for daily prayers, authentic Quranic translations, and precise Hijri calendar dates is essential.
                </p>

                <h3 style="color: var(--gold); margin-bottom: 20px;"><i class="fas fa-gift" style="margin-right: 10px;"></i> What We Provide</h3>
                <ul style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 20px; list-style-type: square;">
                    <li style="margin-bottom: 10px;"><strong>Accurate Prayer Times:</strong> Calculated using recognized astronomical methods tailored to your exact city.</li>
                    <li style="margin-bottom: 10px;"><strong>Hijri Calendar & Events:</strong> Stay updated with important Islamic dates and observances.</li>
                    <li style="margin-bottom: 10px;"><strong>Quranic Resources:</strong> Read and listen to the Holy Quran with translations in Urdu and English.</li>
                    <li style="margin-bottom: 10px;"><strong>Authentic Hadith:</strong> Explore carefully categorized traditions of the Prophet Muhammad (PBUH).</li>
                </ul>

                <h3 style="color: var(--primary); margin-bottom: 20px;"><i class="fas fa-shield-alt" style="margin-right: 10px;"></i> Our Commitment to Authenticity</h3>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555;">
                    We take the responsibility of sharing Islamic knowledge very seriously. All our Surah virtues (Fazilat) and Hadith references are reviewed against major, authentic collections. Where an established popular virtue is cited, we clearly label its scholarly consensus status.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
