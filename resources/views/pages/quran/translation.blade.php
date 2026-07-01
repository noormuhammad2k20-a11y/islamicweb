@extends('layouts.app')

@section('title', 'Quran Translation — Noor-e-Islam')
@section('meta_description', 'Multi-language Quran translation')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Quran Translation</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-language"></i> Feature</div>
            <h1 class="section-title">Quran Translation</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Multi-language Quran translation</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary); background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                
                <!-- CONTENT MOCKUP AREA -->
                <div style="text-align:center; padding: 50px 0;">
                    <i class="fas fa-language" style="font-size: 4rem; color: var(--gold); opacity: 0.5; margin-bottom: 20px;"></i>
                    <h2 style="color: var(--primary-dark); margin-bottom: 15px;">Detailed UI Under Construction</h2>
                    <p style="color: #666; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
                        This section has been scaffolded and integrated with the Laravel routing system. The dynamic content for <strong>Quran Translation</strong> will be populated here.
                    </p>
                    
                    <div style="margin-top: 40px; display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #eee; width: 250px;">
                            <i class="fas fa-database" style="color: var(--primary); margin-bottom: 10px; font-size: 1.5rem;"></i>
                            <h4 style="margin-bottom: 5px;">Database Ready</h4>
                            <p style="font-size: 0.9rem; color: #777;">Ready to connect to your models.</p>
                        </div>
                        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #eee; width: 250px;">
                            <i class="fas fa-paint-brush" style="color: var(--primary); margin-bottom: 10px; font-size: 1.5rem;"></i>
                            <h4 style="margin-bottom: 5px;">Theme Aligned</h4>
                            <p style="font-size: 0.9rem; color: #777;">Uses global CSS variables and fonts.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection