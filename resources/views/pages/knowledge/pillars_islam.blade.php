@extends('layouts.app')

@section('title', '5 Pillars of Islam — Noor-e-Islam')
@section('meta_description', 'Detailed explanation of the Five Pillars')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">5 Pillars of Islam</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-mosque"></i> Feature</div>
            <h1 class="section-title">5 Pillars of Islam</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Detailed explanation of the Five Pillars</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary); background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                
                <!-- CONTENT MOCKUP AREA -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-hand-holding-heart" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">1. Shahada</h3>
        <p style="color: #666; font-size: 0.95rem;">Declaration of Faith. Bearing witness that there is no god but Allah and Muhammad (PBUH) is His messenger.</p>
    </div>
    
    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-praying-hands" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">2. Salah</h3>
        <p style="color: #666; font-size: 0.95rem;">Establishing the five daily prayers. It is the direct connection between the servant and the Creator.</p>
    </div>

    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-hand-holding-usd" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">3. Zakat</h3>
        <p style="color: #666; font-size: 0.95rem;">Almsgiving. Purifying one's wealth by giving a specific portion to those in need.</p>
    </div>

    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-moon" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">4. Sawm</h3>
        <p style="color: #666; font-size: 0.95rem;">Fasting during the month of Ramadan. Abstaining from food, drink, and worldly desires from dawn to dusk.</p>
    </div>

    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-kaaba" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">5. Hajj</h3>
        <p style="color: #666; font-size: 0.95rem;">The pilgrimage to Makkah. Mandatory at least once in a lifetime for those physically and financially able.</p>
    </div>
</div>
            </div>
        </div>
    </div>
                
            </div>
        </div>
    </div>
</section>
@endsection