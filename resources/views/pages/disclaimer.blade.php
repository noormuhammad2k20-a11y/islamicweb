@extends('layouts.app')

@section('title', 'Disclaimer — Noor-e-Islam')
@section('meta_description', 'Disclaimer for Noor-e-Islam. Read about our liability limitations.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Disclaimer</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-exclamation-circle"></i> Notice</div>
            <h1 class="section-title">Website <span>Disclaimer</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Last Updated: {{ date('F d, Y') }}</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-info-circle" style="color: var(--gold); margin-right: 10px;"></i> 1. General Information</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    The information provided by our website is for general informational purposes only. All information on the site is provided in good faith.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-pray" style="color: var(--gold); margin-right: 10px;"></i> 2. Prayer Times Accuracy</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    While we strive to provide the most accurate prayer times based on established calculation methods, slight variations may occur. Always consult your local mosque for absolute certainty.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
