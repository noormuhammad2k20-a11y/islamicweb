@extends('layouts.app')

@section('title', 'Islamic History — The Timeline of the Prophet & Caliphs')
@section('meta_description', 'Explore the rich history of Islam. From the birth of Prophet Muhammad (PBUH) in Mecca, the Hijrah, to the era of the Rightly Guided Caliphs.')
@section('meta_keywords', 'islamic history, history of islam, prophet muhammad history, khulafa rashidun, rightly guided caliphs, islamic timeline')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": "A Brief Timeline of Islamic History",
  "description": "Explore the rich history of Islam from the birth of Prophet Muhammad (PBUH) to the era of the Rightly Guided Caliphs.",
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

    .timeline { position: relative; margin: 40px 0; }
    .timeline::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 4px; background: rgba(20,93,160,0.1); transform: translateX(-50%); border-radius: 2px; }

    .t-item { position: relative; margin-bottom: 50px; display: flex; align-items: center; width: 100%; justify-content: flex-start; }
    .t-item:nth-child(even) { justify-content: flex-end; }
    
    .t-marker { position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 24px; height: 24px; background: var(--white); border: 4px solid var(--primary); border-radius: 50%; z-index: 2; box-shadow: 0 0 0 4px rgba(20,93,160,0.1); }
    .t-item:hover .t-marker { background: var(--primary); border-color: var(--white); }

    .t-content { width: calc(50% - 40px); background: var(--white); padding: 30px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); position: relative; transition: var(--tr); }
    .t-content:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    
    .t-year { display: inline-block; background: var(--primary-subtle); color: var(--primary-dark); font-weight: 700; font-size: 0.9rem; padding: 6px 16px; border-radius: 20px; margin-bottom: 15px; }
    .t-content h3 { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--primary-dark); margin-bottom: 10px; }
    .t-content p { font-size: 0.95rem; color: var(--text-medium); margin: 0; }

    .caliph-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 25px; margin-top: 50px; }
    .caliph-card { background: var(--white); border-radius: var(--radius-lg); padding: 30px; border-top: 4px solid var(--gold); box-shadow: var(--shadow-sm); transition: var(--tr); }
    .caliph-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
    .caliph-num { font-size: 0.9rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
    .caliph-card h4 { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: var(--primary-dark); margin-bottom: 10px; }
    .caliph-card p { font-size: 0.9rem; color: var(--text-medium); margin: 0; }

    .section-title { font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--primary-dark); text-align: center; margin-bottom: 40px; margin-top: 80px; }

    @media (max-width: 768px) {
        .timeline::before { left: 30px; }
        .t-item { justify-content: flex-end !important; }
        .t-marker { left: 30px; }
        .t-content { width: calc(100% - 70px); }
        .caliph-grid { grid-template-columns: 1fr; }
        .k-hero h1 { font-size: 2.4rem; }
    }
</style>

<div class="k-page">
    <div class="k-breadcrumb">
        <div class="k-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <a href="{{ route('knowledge.index') }}">Knowledge</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <span class="k-breadcrumb-current">Islamic History</span>
        </div>
    </div>

    <section class="k-hero">
        <div class="k-hero-inner">
            <div class="k-hero-badge"><i class="fas fa-landmark"></i> Heritage</div>
            <h1>Islamic <span>History</span></h1>
            <p>Trace the monumental events from the birth of the Prophet Muhammad (PBUH) to the era of the Rightly Guided Caliphs.</p>
        </div>
    </section>

    <section class="k-content">
        <div class="k-content-inner">
            
            <h2 class="section-title">The Prophetic Era Timeline</h2>

            <div class="timeline">
                
                <div class="t-item">
                    <div class="t-marker"></div>
                    <div class="t-content">
                        <span class="t-year">570 CE</span>
                        <h3>Birth of the Prophet</h3>
                        <p>Prophet Muhammad (PBUH) is born in the city of Mecca in the Year of the Elephant. He belongs to the noble tribe of Quraysh.</p>
                    </div>
                </div>

                <div class="t-item">
                    <div class="t-marker"></div>
                    <div class="t-content">
                        <span class="t-year">610 CE</span>
                        <h3>First Revelation</h3>
                        <p>At the age of 40, Muhammad (PBUH) receives the first verses of the Quran from the Angel Jibril (Gabriel) in the Cave of Hira. Prophethood begins.</p>
                    </div>
                </div>

                <div class="t-item">
                    <div class="t-marker"></div>
                    <div class="t-content">
                        <span class="t-year">622 CE</span>
                        <h3>The Hijrah (Migration)</h3>
                        <p>Facing severe persecution, the Prophet (PBUH) and his companions migrate from Mecca to Medina. This event marks the beginning of the Islamic Hijri calendar.</p>
                    </div>
                </div>

                <div class="t-item">
                    <div class="t-marker"></div>
                    <div class="t-content">
                        <span class="t-year">624 - 627 CE</span>
                        <h3>Major Battles</h3>
                        <p>The Muslims face the Quraysh in critical defensive battles to protect the nascent community: the Battle of Badr, Uhud, and the Trench (Khandaq).</p>
                    </div>
                </div>

                <div class="t-item">
                    <div class="t-marker"></div>
                    <div class="t-content">
                        <span class="t-year">630 CE</span>
                        <h3>Conquest of Mecca</h3>
                        <p>The Prophet (PBUH) returns to Mecca peacefully with 10,000 companions. The Kaaba is cleansed of idols, and general amnesty is granted to the Meccans.</p>
                    </div>
                </div>

                <div class="t-item">
                    <div class="t-marker"></div>
                    <div class="t-content">
                        <span class="t-year">632 CE</span>
                        <h3>The Farewell Pilgrimage & Passing</h3>
                        <p>The Prophet (PBUH) performs his final Hajj, delivers the historic Farewell Sermon, and passes away shortly after returning to Medina.</p>
                    </div>
                </div>

            </div>

            <h2 class="section-title">The Khulafa Rashidun<br><span style="font-size:1.1rem; color:var(--text-medium); font-family:'Poppins', sans-serif; font-weight:400;">The Rightly Guided Caliphs (632 – 661 CE)</span></h2>

            <div class="caliph-grid">
                <div class="caliph-card">
                    <div class="caliph-num">1st Caliph (632 - 634 CE)</div>
                    <h4>Abu Bakr as-Siddiq (RA)</h4>
                    <p>The closest companion of the Prophet. He unified the Arabian Peninsula during the Ridda (Apostasy) wars and ordered the initial compilation of the Quran into a single manuscript.</p>
                </div>
                
                <div class="caliph-card">
                    <div class="caliph-num">2nd Caliph (634 - 644 CE)</div>
                    <h4>Umar ibn al-Khattab (RA)</h4>
                    <p>Known for his profound justice (Al-Farooq). Under his leadership, the Islamic state expanded immensely to include Persia, the Levant, and Egypt. He established the Hijri calendar and public welfare systems.</p>
                </div>

                <div class="caliph-card">
                    <div class="caliph-num">3rd Caliph (644 - 656 CE)</div>
                    <h4>Uthman ibn Affan (RA)</h4>
                    <p>Known for his modesty and generosity. He oversaw the standardization of the Quranic text (the Uthmani script) and its distribution across the expanding Muslim world to preserve unity.</p>
                </div>

                <div class="caliph-card">
                    <div class="caliph-num">4th Caliph (656 - 661 CE)</div>
                    <h4>Ali ibn Abi Talib (RA)</h4>
                    <p>The cousin and son-in-law of the Prophet (PBUH), known for his immense wisdom, eloquence, and bravery. His caliphate was marked by internal political turmoil (Fitna), yet he maintained strict adherence to Islamic justice.</p>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
