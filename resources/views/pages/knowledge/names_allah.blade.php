@extends('layouts.app')

@section('title', '99 Names of Allah — Noor-e-Islam')
@section('meta_description', 'Asma-ul-Husna with meanings & audio')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">99 Names of Allah</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-list-ol"></i> Feature</div>
            <h1 class="section-title">99 Names of Allah</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Asma-ul-Husna with meanings & audio</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary); background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                
                <!-- CONTENT MOCKUP AREA -->
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
    <!-- Name 1 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلرَّحْمَٰنُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Ar-Rahman</h3>
        <p style="color: #666; font-size: 0.9rem;">The Most or Entirely Merciful</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
    <!-- Name 2 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلرَّحِيمُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Ar-Raheem</h3>
        <p style="color: #666; font-size: 0.9rem;">The Bestower of Mercy</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
    <!-- Name 3 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلْمَلِكُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Al-Malik</h3>
        <p style="color: #666; font-size: 0.9rem;">The King and Owner of Dominion</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
    <!-- Name 4 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلْقُدُّوسُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Al-Quddus</h3>
        <p style="color: #666; font-size: 0.9rem;">The Absolutely Pure</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
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