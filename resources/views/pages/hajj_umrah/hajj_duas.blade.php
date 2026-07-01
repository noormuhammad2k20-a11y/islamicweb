@extends('layouts.app')

@section('title', 'Hajj Duas — Noor-e-Islam')
@section('meta_description', 'Duas for each step of Hajj')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Hajj Duas</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-hands-praying"></i> Feature</div>
            <h1 class="section-title">Hajj Duas</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Duas for each step of Hajj</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            
            <!-- Card 1 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Talbiyah</h3>
                    <span style="font-size: 0.8rem; color: #888;">Recited upon entering Ihram</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">لَبَّيْكَ اللَّهُمَّ لَبَّيْكَ، لَبَّيْكَ لاَ شَرِيكَ لَكَ لَبَّيْكَ، إِنَّ الْحَمْدَ، وَالنِّعْمَةَ، لَكَ وَالْمُلْكَ، لاَ شَرِيكَ لَكَ</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"Here I am, O Allah, here I am. Here I am, You have no partner, here I am. Verily all praise and blessings are Yours, and all sovereignty, You have no partner."</p>
            </div>

            <!-- Card 2 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Dua on the Day of Arafah</h3>
                    <span style="font-size: 0.8rem; color: #888;">The best supplication</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">لاَ إِلَهَ إِلاَّ اللَّهُ وَحْدَهُ لاَ شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ، وَهُوَ عَلَى كُلِّ شَيْءٍ قَدِيرٌ</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"None has the right to be worshipped but Allah alone, Who has no partner. His is the dominion and His is the praise, and He is Able to do all things."</p>
            </div>

            <!-- Card 3 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Dua at Safa and Marwah</h3>
                    <span style="font-size: 0.8rem; color: #888;">During Sa'i</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">إِنَّ الصَّفَا وَالْمَرْوَةَ مِن شَعَائِرِ اللَّهِ</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"Indeed, Safa and Marwah are among the symbols of Allah."</p>
            </div>

            <!-- Card 4 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                    <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Dua between the Yemeni Corner & Black Stone</h3>
                    <span style="font-size: 0.8rem; color: #888;">During Tawaf</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.5rem; color: var(--text-color); direction: rtl; line-height: 1.8; margin-bottom: 15px; text-align: right;">رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ</p>
                <p style="font-size: 0.9rem; color: #555; line-height: 1.6; margin: 0;">"Our Lord, give us in this world [that which is] good and in the Hereafter [that which is] good and protect us from the punishment of the Fire."</p>
            </div>

        </div>
    </div>
</section>
@endsection