@extends('layouts.app')

@section('title', 'The 5 Pillars of Islam — Arkan al-Islam')
@section('meta_description', 'Learn about the Five Pillars of Islam: Shahada (Faith), Salah (Prayer), Zakat (Charity), Sawm (Fasting), and Hajj (Pilgrimage).')
@section('meta_keywords', '5 pillars of islam, arkan al islam, shahada, salah, zakat, sawm, hajj, pillars of islam explained')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": "The 5 Pillars of Islam",
  "description": "Learn about the Five Pillars of Islam (Arkan al-Islam), the foundation of Muslim life.",
  "author": {
    "@type": "Organization",
    "name": "Noor-e-Islam"
  }
}
</script>
@endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap');

    :root {
        --primary: #145DA0;
        --primary-dark: #0C3D6E;
        --secondary: #F5F8F7;
        --secondary-light: #FBFDFC;
        --gold: #B8863B;
        --gold-light: #D9AE6C;
        --text-dark: #15211D;
        --text-medium: #44544E;
        --text-light: #76867F;
        --white: #ffffff;
        --shadow-sm: 0 1px 4px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 16px rgba(0,0,0,0.07);
        --radius-md: 10px;
        --radius-lg: 16px;
        --tr: all 0.25s ease;
    }

    .k-page * { box-sizing: border-box; }
    .k-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; }

    .k-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .k-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; }
    .k-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .k-breadcrumb a:hover { color: var(--primary-dark); }
    .k-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .k-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .k-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 80px 0; text-align: center; overflow: hidden; }
    .k-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; pointer-events: none; }
    .k-hero-inner { max-width: 800px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .k-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; color: var(--white); border: 1px solid rgba(255,255,255,0.12); }
    .k-hero h1 { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .k-hero p { font-size: 1.1rem; color: rgba(255,255,255,0.85); line-height: 1.8; }

    .k-content { padding: 80px 0; }
    .k-content-inner { max-width: 1000px; margin: 0 auto; padding: 0 28px; }

    .hadith-box { background: var(--secondary); border-left: 4px solid var(--primary); padding: 30px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 0 auto 50px; max-width: 800px; text-align: center; }
    .hadith-box .text { font-style: italic; color: var(--text-dark); margin-bottom: 10px; font-size: 1.05rem; line-height: 1.8; }
    .hadith-box .reference { font-weight: 600; color: var(--primary); font-size: 0.9rem; }

    .pillars-container { display: flex; flex-direction: column; gap: 40px; }
    
    .pillar-card { background: var(--white); border: 1px solid rgba(20,93,160,0.08); border-radius: var(--radius-lg); padding: 40px; display: flex; gap: 30px; box-shadow: var(--shadow-sm); transition: var(--tr); }
    .pillar-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    
    .pillar-num { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: var(--white); display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 800; flex-shrink: 0; position: relative; box-shadow: 0 5px 15px rgba(20,93,160,0.2); }
    
    .pillar-content h3 { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 5px; }
    .pillar-content h4 { font-family: 'Amiri', serif; font-size: 1.2rem; color: var(--gold-dark); margin-bottom: 15px; font-weight: 700; }
    .pillar-content p { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 0; line-height: 1.8; }

    @media (max-width: 768px) {
        .k-hero h1 { font-size: 2.4rem; }
        .pillar-card { flex-direction: column; text-align: center; align-items: center; padding: 30px; }
    }
</style>

<div class="k-page">
    <div class="k-breadcrumb">
        <div class="k-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <a href="{{ route('knowledge.index') }}">Knowledge</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <span class="k-breadcrumb-current">The 5 Pillars of Islam</span>
        </div>
    </div>

    <section class="k-hero">
        <div class="k-hero-inner">
            <div class="k-hero-badge"><i class="fas fa-mosque"></i> Foundations</div>
            <h1>The 5 <span>Pillars</span> of Islam</h1>
            <p>Arkan al-Islam: The fundamental practices that form the foundation of a Muslim's faith and life.</p>
        </div>
    </section>

    <section class="k-content">
        <div class="k-content-inner">
            
            <div class="hadith-box">
                <div class="text">"Islam is built upon five [pillars]: testifying that there is no deity worthy of worship except Allah and that Muhammad is the Messenger of Allah, establishing the prayer, paying the zakat, making the hajj to the House, and fasting in Ramadan."</div>
                <div class="reference">— Prophet Muhammad (ﷺ) [Sahih al-Bukhari & Muslim]</div>
            </div>

            <div class="pillars-container">
                
                <div class="pillar-card">
                    <div class="pillar-num">1</div>
                    <div class="pillar-content">
                        <h3>Shahada</h3>
                        <h4>شَهَادَة (Declaration of Faith)</h4>
                        <p>The Shahada is the Islamic declaration of faith. It is the sincere belief and vocal recitation of: <em>"La ilaha illallah, Muhammadur rasulullah"</em> (There is no god but Allah, and Muhammad is the messenger of Allah). This single statement is the absolute core of Islam. Uttering it with sincere conviction is the requirement to enter the fold of Islam.</p>
                    </div>
                </div>

                <div class="pillar-card">
                    <div class="pillar-num">2</div>
                    <div class="pillar-content">
                        <h3>Salah</h3>
                        <h4>صَلَاة (Ritual Prayer)</h4>
                        <p>Salah refers to the five obligatory daily prayers performed by Muslims: Fajr (dawn), Dhuhr (midday), Asr (afternoon), Maghrib (sunset), and Isha (night). The prayers involve physical movements—standing, bowing, and prostrating—directed towards the Kaaba in Mecca. It serves as a direct, physical, and spiritual connection between the worshipper and Allah.</p>
                    </div>
                </div>

                <div class="pillar-card">
                    <div class="pillar-num">3</div>
                    <div class="pillar-content">
                        <h3>Zakat</h3>
                        <h4>زَكَاة (Obligatory Charity)</h4>
                        <p>Zakat is the purification of wealth. It requires all Muslims whose wealth meets or exceeds a certain threshold (Nisab) for a full year to donate a fixed portion (usually 2.5%) of their accumulated wealth to the poor, needy, and other specified categories. It prevents the hoarding of wealth and ensures society's most vulnerable are cared for.</p>
                    </div>
                </div>

                <div class="pillar-card">
                    <div class="pillar-num">4</div>
                    <div class="pillar-content">
                        <h3>Sawm</h3>
                        <h4>صَوْم (Fasting in Ramadan)</h4>
                        <p>Sawm is the mandatory fasting observed during the ninth month of the Islamic lunar calendar, Ramadan. From dawn until sunset, Muslims abstain from food, drink, and intimate relations. Fasting teaches self-control, empathy for the hungry, and God-consciousness (Taqwa).</p>
                    </div>
                </div>

                <div class="pillar-card">
                    <div class="pillar-num">5</div>
                    <div class="pillar-content">
                        <h3>Hajj</h3>
                        <h4>حَجّ (Pilgrimage to Mecca)</h4>
                        <p>Hajj is the annual pilgrimage to the holy city of Mecca. It is obligatory at least once in a lifetime for every adult Muslim who is physically and financially capable of undertaking the journey. Millions of Muslims gather in Mecca during the month of Dhu al-Hijjah to perform ancient rituals tracking the footsteps of Prophet Ibrahim (Abraham).</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
@endsection
