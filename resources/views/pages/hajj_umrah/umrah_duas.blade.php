@extends('layouts.app')

@section('seo')
<title>Umrah Duas — Authentic Supplications | IslamicWeb</title>
<meta name="description" content="Authentic Duas for Tawaf, Sa'i, and every step of your Umrah journey.">
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
</style>

<section class="page-hero">
    <h1 class="page-title">Umrah Duas</h1>
    <p class="page-subtitle">Essential supplications to memorize or read during Tawaf, Sa'i, and entering Masjid al-Haram.</p>
</section>

<section class="section" style="padding-bottom: 60px;">
    <div class="section-inner">
        <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px;">
            
            <!-- Card 1 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                    <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.5rem; margin: 0;">Intention for Umrah (Niyyah)</h3>
                    <span style="font-size: 0.9rem; color: #888;">Recited at the Miqat</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.8rem; color: var(--primary); direction: rtl; line-height: 1.8; margin-bottom: 20px; text-align: center;">لَبَّيْكَ اللَّهُمَّ عُمْرَةً</p>
                <div style="background: #faf9f6; padding: 15px; border-radius: 8px;">
                    <p style="font-size: 1rem; color: #444; line-height: 1.6; margin: 0; text-align: center; font-style: italic;">"O Allah, here I am to perform Umrah."</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                    <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.5rem; margin: 0;">Upon seeing the Kaaba</h3>
                    <span style="font-size: 0.9rem; color: #888;">When entering Masjid al-Haram</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.8rem; color: var(--primary); direction: rtl; line-height: 1.8; margin-bottom: 20px; text-align: center;">اللَّهُمَّ زِدْ هَذَا الْبَيْتَ تَشْرِيفًا وَتَعْظِيمًا وَتَكْرِيمًا وَمَهَابَةً</p>
                <div style="background: #faf9f6; padding: 15px; border-radius: 8px;">
                    <p style="font-size: 1rem; color: #444; line-height: 1.6; margin: 0; text-align: center; font-style: italic;">"O Allah, increase this House in honor, esteem, respect, and reverence."</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                    <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.5rem; margin: 0;">Drinking Zamzam Water</h3>
                    <span style="font-size: 0.9rem; color: #888;">After completing Tawaf</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.8rem; color: var(--primary); direction: rtl; line-height: 1.8; margin-bottom: 20px; text-align: center;">اللَّهُمَّ إِنِّي أَسْأَلُكَ عِلْمَاً نَافِعَاً وَرِزْقَاً وَاسِعَاً وَشِفَاءً مِنْ كُلِّ دَاءٍ</p>
                <div style="background: #faf9f6; padding: 15px; border-radius: 8px;">
                    <p style="font-size: 1rem; color: #444; line-height: 1.6; margin: 0; text-align: center; font-style: italic;">"O Allah, I ask You for beneficial knowledge, abundant provision, and healing from every disease."</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                    <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.5rem; margin: 0;">Ascending Safa & Marwah</h3>
                    <span style="font-size: 0.9rem; color: #888;">Before starting Sa'i</span>
                </div>
                <p style="font-family: 'Amiri', serif; font-size: 1.8rem; color: var(--primary); direction: rtl; line-height: 1.8; margin-bottom: 20px; text-align: center;">نَبْدَأُ بِمَا بَدَأَ اللَّهُ بِهِ</p>
                <div style="background: #faf9f6; padding: 15px; border-radius: 8px;">
                    <p style="font-size: 1rem; color: #444; line-height: 1.6; margin: 0; text-align: center; font-style: italic;">"We begin with what Allah began with."</p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
