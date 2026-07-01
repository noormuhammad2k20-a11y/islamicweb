@extends('layouts.app')

@section('title', 'Privacy Policy — Noor-e-Islam')
@section('meta_description', 'Privacy Policy for Noor-e-Islam. Read about how we handle and protect your personal information.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Privacy Policy</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-shield-alt"></i> Policy</div>
            <h1 class="section-title">Privacy <span>Policy</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Last Updated: {{ date('F d, Y') }}</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-database" style="color: var(--gold); margin-right: 10px;"></i> 1. Information We Collect</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    We collect minimal personal information. When you subscribe to our newsletter or fill out a contact form, we collect your name and email address. We do not sell or share this information with third parties.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-cookie-bite" style="color: var(--gold); margin-right: 10px;"></i> 2. Use of Cookies</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    Our website may use "cookies" to enhance user experience. You may choose to set your web browser to refuse cookies, or to alert you when cookies are being sent. If you do so, note that some parts of the Site may not function properly.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-map-marker-alt" style="color: var(--gold); margin-right: 10px;"></i> 3. Location Data</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    To provide accurate prayer times, we may ask for your location. This data is only used locally on your device or to query our database for city-specific times. We do not store or track your exact GPS location.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-envelope" style="color: var(--gold); margin-right: 10px;"></i> 4. Contacting Us</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 20px; padding-left: 35px;">
                    If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at <a href="{{ route('contact') }}" style="color: var(--primary); font-weight: bold; text-decoration: none;">our contact page</a>.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
