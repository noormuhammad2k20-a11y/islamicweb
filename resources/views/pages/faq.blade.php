@extends('layouts.app')

@section('title', 'Frequently Asked Questions (FAQ) — Noor-e-Islam')
@section('meta_description', 'Frequently Asked Questions about Islam, Prayer Times, Zakat, and our website.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">FAQ</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Help Center</div>
            <h1 class="section-title">Frequently Asked <span>Questions</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;">How are the prayer times calculated?</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 0;">
                    We use internationally recognized calculation methods. You can usually choose the method specific to your region in our app settings.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;">How accurate is the Qibla direction?</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 0;">
                    Our Qibla direction uses device geolocation and standard compass APIs. Ensure your device is calibrated for the best results.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
