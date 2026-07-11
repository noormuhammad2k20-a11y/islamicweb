@extends('layouts.app')

@section('title', 'Who Must Pay Zakat? — Eligibility Criteria & Conditions')
@section('meta_description', 'Find out who is obligated to pay Zakat in Islam. Learn the 5 strict criteria including being Muslim, sane, adult, having full ownership, and reaching Nisab.')
@section('meta_keywords', 'who must pay zakat, zakat eligibility, criteria for zakat, who is obligated to pay zakat, zakat on children, zakat conditions in islam')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": "Who Must Pay Zakat?",
  "description": "Find out who is obligated to pay Zakat in Islam. Learn the 5 strict criteria.",
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
        --radius-md: 10px;
        --tr: all 0.25s ease;
    }

    .z-page * { box-sizing: border-box; }
    .z-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; -webkit-font-smoothing: antialiased; }

    .z-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .z-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .z-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .z-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .z-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .z-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .z-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .z-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .z-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .z-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .z-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .z-content-section { padding: 70px 0; }
    .z-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }
    
    .z-main-content { background: var(--white); padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); }
    .z-main-content h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .z-main-content h2:first-child { margin-top: 0; }
    .z-main-content p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 16px; }

    .criteria-grid { display: grid; gap: 20px; margin-top: 30px; }
    .criteria-card { background: var(--secondary-light); border: 1px solid rgba(20,93,160,0.1); padding: 25px; border-radius: var(--radius-md); display: flex; gap: 20px; transition: var(--tr); }
    .criteria-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    .criteria-icon { width: 50px; height: 50px; border-radius: 50%; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0; }
    .criteria-text h3 { font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 8px; }
    .criteria-text p { margin: 0; font-size: 0.9rem; }

    .z-sidebar { position: sticky; top: 100px; }
    .z-widget { background: var(--white); padding: 24px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); margin-bottom: 24px; }
    .z-widget h4 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 16px; border-bottom: 1px solid rgba(20,93,160,0.08); padding-bottom: 10px; }
    .z-widget-links { list-style: none; padding: 0; margin: 0; }
    .z-widget-links li { margin-bottom: 10px; }
    .z-widget-links a { display: flex; align-items: center; gap: 10px; text-decoration: none; color: var(--text-medium); font-size: 0.9rem; font-weight: 500; transition: var(--tr); }
    .z-widget-links a:hover { color: var(--primary); transform: translateX(4px); }
    .z-widget-links i { color: var(--gold-light); font-size: 0.8rem; }
    
    .calc-banner { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: var(--radius-lg); padding: 30px 24px; text-align: center; color: var(--white); box-shadow: var(--shadow-md); }
    .calc-banner i { font-size: 2.5rem; color: var(--gold-light); margin-bottom: 16px; }
    .calc-banner h4 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; margin-bottom: 10px; }
    .calc-banner-btn { display: inline-block; background: var(--white); color: var(--primary-dark); text-decoration: none; font-weight: 600; padding: 10px 24px; border-radius: 30px; font-size: 0.9rem; transition: var(--tr); margin-top: 15px; }

    @media (max-width: 992px) {
        .z-content-inner { grid-template-columns: 1fr; }
        .z-sidebar { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    }
    @media (max-width: 768px) {
        .criteria-card { flex-direction: column; gap: 15px; text-align: center; align-items: center; }
        .z-sidebar { grid-template-columns: 1fr; }
    }
</style>

<div class="z-page">
    <div class="z-breadcrumb">
        <div class="z-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right z-breadcrumb-sep"></i>
            <a href="{{ route('zakat.index') }}">Zakat</a>
            <i class="fas fa-chevron-right z-breadcrumb-sep"></i>
            <span class="z-breadcrumb-current">Who Must Pay</span>
        </div>
    </div>

    <section class="z-hero">
        <div class="z-hero-inner">
            <div class="z-hero-badge"><i class="fas fa-user-check"></i> Obligation</div>
            <h1>Who Must <span>Pay Zakat?</span></h1>
            <p>Determine if you meet the Islamic criteria for Zakat obligation.</p>
        </div>
    </section>

    <section class="z-content-section">
        <div class="z-content-inner">
            <div class="z-main-content">
                <h2>The 5 Criteria for Zakat Eligibility</h2>
                <p>Zakat is not obligatory upon every single person. In Islamic jurisprudence, a specific set of conditions must be met before an individual is required to pay Zakat. If you meet all five of these criteria, Zakat is a strict religious duty (Fard) upon you.</p>

                <div class="criteria-grid">
                    <div class="criteria-card">
                        <div class="criteria-icon"><i class="fas fa-moon"></i></div>
                        <div class="criteria-text">
                            <h3>1. Being a Muslim</h3>
                            <p>Zakat is a religious obligation and an act of worship specifically prescribed for Muslims. It is not collected from non-Muslims.</p>
                        </div>
                    </div>
                    <div class="criteria-card">
                        <div class="criteria-icon"><i class="fas fa-brain"></i></div>
                        <div class="criteria-text">
                            <h3>2. Being Sane (Aql)</h3>
                            <p>The individual must be of sound mind. Most scholars agree that a person suffering from severe mental illness who cannot comprehend their finances is not obligated to pay.</p>
                        </div>
                    </div>
                    <div class="criteria-card">
                        <div class="criteria-icon"><i class="fas fa-child"></i></div>
                        <div class="criteria-text">
                            <h3>3. Reaching Puberty (Baligh)</h3>
                            <p>Zakat is generally obligatory on adults. Note: In the Shafi'i, Maliki, and Hanbali schools, Zakat is due on the wealth of minors (paid by their guardians), but in the Hanafi school, it is only obligatory once they reach puberty.</p>
                        </div>
                    </div>
                    <div class="criteria-card">
                        <div class="criteria-icon"><i class="fas fa-hand-holding-usd"></i></div>
                        <div class="criteria-text">
                            <h3>4. Full Ownership (Milkiyyah)</h3>
                            <p>You must have full, absolute ownership of the wealth. You must have the ability to access and dispose of the asset. Stolen property, or money lost without hope of recovery, is not zakatable until regained.</p>
                        </div>
                    </div>
                    <div class="criteria-card">
                        <div class="criteria-icon"><i class="fas fa-balance-scale"></i></div>
                        <div class="criteria-text">
                            <h3>5. Reaching Nisab & Hawl</h3>
                            <p>Your net wealth must meet or exceed the Nisab threshold, and this wealth must be maintained in your possession for one complete Islamic lunar year (Hawl).</p>
                        </div>
                    </div>
                </div>

                <h2>What if my child has savings?</h2>
                <p>There is a difference of opinion among Islamic scholars regarding the wealth of minors and orphans:</p>
                <ul>
                    <li><strong>Hanafi School:</strong> Zakat is not obligatory on the wealth of minors. It only becomes obligatory once they reach puberty.</li>
                    <li><strong>Shafi'i, Maliki, and Hanbali Schools:</strong> Zakat is due on the wealth of minors and orphans if it meets the Nisab and Hawl. Their appointed guardian is responsible for calculating and paying the Zakat on their behalf to protect the wealth from being depleted without purification.</li>
                </ul>
            </div>

            <div class="z-sidebar">
                <div class="z-widget">
                    <h4>Zakat Guide</h4>
                    <ul class="z-widget-links">
                        <li><a href="{{ route('zakat.index') }}"><i class="fas fa-calculator"></i> Zakat Calculator</a></li>
                        <li><a href="{{ route('zakat.rules') }}"><i class="fas fa-book"></i> Zakat Rules & Conditions</a></li>
                        <li><a href="{{ route('zakat.nisab') }}"><i class="fas fa-balance-scale"></i> Nisab Threshold</a></li>
                        <li><a href="{{ route('zakat.whomustpay') }}"><i class="fas fa-user-check"></i> Who Must Pay Zakat?</a></li>
                        <li><a href="{{ route('zakat.whocanreceive') }}"><i class="fas fa-hand-holding-heart"></i> Who Can Receive Zakat?</a></li>
                    </ul>
                </div>
                <div class="calc-banner">
                    <i class="fas fa-calculator"></i>
                    <h4>Calculate Your Zakat</h4>
                    <a href="{{ route('zakat.index') }}" class="calc-banner-btn">Go to Calculator</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
