@extends('layouts.app')

@section('title', 'Terms and Conditions — Noor-e-Islam')
@section('meta_description', 'Terms and Conditions for Noor-e-Islam. Read about the rules and guidelines for using our website.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Terms & Conditions</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-file-contract"></i> Legal</div>
            <h1 class="section-title">Terms & <span>Conditions</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Last Updated: {{ date('F d, Y') }}</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-gavel" style="color: var(--gold); margin-right: 10px;"></i> 1. Acceptance of Terms</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-book-open" style="color: var(--gold); margin-right: 10px;"></i> 2. Content Usage</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    The content of the pages of this website is for your general information and use only. It is subject to change without notice.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
