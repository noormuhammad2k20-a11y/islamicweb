@extends('layouts.app')

@section('title', 'Umrah Duas — Noor-e-Islam')
@section('meta_description', "Duas for Tawaf and Sa'i")

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Umrah Duas</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-hands-praying"></i> Feature</div>
            <h1 class="section-title">Umrah Duas</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Duas for Tawaf and Sa'i</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            
            <!-- Card 1 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Intention for Umrah</h3>
                    <span style="font-size: 0.8rem; color: #888;">Niyyah</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">لَبَّيْكَ اللَّهُمَّ عُمْرَةً</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"O Allah, here I am to perform Umrah."</p>
            </div>

            <!-- Card 2 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Upon seeing the Kaaba</h3>
                    <span style="font-size: 0.8rem; color: #888;">When entering Masjid al-Haram</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">اللَّهُمَّ زِدْ هَذَا الْبَيْتَ تَشْرِيفًا وَتَعْظِيمًا وَتَكْرِيمًا وَمَهَابَةً</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"O Allah, increase this House in honor, esteem, respect, and reverence."</p>
            </div>

            <!-- Card 3 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Drinking Zamzam Water</h3>
                    <span style="font-size: 0.8rem; color: #888;">After Tawaf</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">اللَّهُمَّ إِنِّي أَسْأَلُكَ عِلْمَاً نَافِعَاً وَرِزْقَاً وَاسِعَاً وَشِفَاءً مِنْ كُلِّ دَاءٍ</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"O Allah, I ask You for beneficial knowledge, abundant provision, and healing from every disease."</p>
            </div>

            <!-- Card 4 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Ascending Safa & Marwah</h3>
                    <span style="font-size: 0.8rem; color: #888;">Before Sa'i</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">نَبْدَأُ بِمَا بَدَأَ اللَّهُ بِهِ</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"We begin with what Allah began with."</p>
            </div>

        </div>
    </div>
</section>
@endsection