@extends('layouts.app')

@section('seo')
<title>Hajj & Umrah Hub — Complete Step-by-Step Guides | IslamicWeb</title>
<meta name="description" content="Comprehensive guides, interactive checklists, maps, and authentic Duas for performing Hajj and Umrah. Prepare for your sacred journey.">
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 80px 20px 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.2rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 700px; margin: 0 auto; line-height: 1.6;}
    
    .hub-container { max-width: 1200px; margin: 0 auto 60px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--primary); margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    
    .hub-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 60px; }
    .hub-card { background: white; border-radius: 20px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); text-align: center; transition: transform 0.3s; position: relative; overflow: hidden; text-decoration: none; display: block;}
    .hub-card:hover { transform: translateY(-10px); border-color: var(--gold); }
    .hub-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: var(--primary); transition: background 0.3s;}
    .hub-card:hover::before { background: var(--gold); }
    
    .hub-icon { font-size: 3rem; color: var(--primary); margin-bottom: 20px; transition: color 0.3s; }
    .hub-card:hover .hub-icon { color: var(--gold); }
    .hub-card-title { font-size: 1.5rem; color: var(--primary-dark); margin-bottom: 15px; font-family: 'Playfair Display', serif; font-weight: bold; }
    .hub-card-desc { color: #666; font-size: 1rem; line-height: 1.5; margin: 0; }
</style>

<section class="page-hero">
    <h1 class="page-title">Hajj & Umrah Hub</h1>
    <p class="page-subtitle">Your complete digital companion for the sacred journeys. Explore interactive step-by-step guides, packing checklists, and authentic Duas for Tawaf and Sa'i.</p>
</section>

<div class="hub-container">
    
    <div style="text-align: center;">
        <h2 class="section-title">The Sacred Pilgrimage (Hajj)</h2>
    </div>
    
    <div class="hub-grid">
        <a href="{{ route('hajj_umrah.hajj_guide') }}" class="hub-card">
            <i class="fas fa-kaaba hub-icon"></i>
            <h3 class="hub-card-title">Step-by-Step Hajj Guide</h3>
            <p class="hub-card-desc">Comprehensive day-by-day walkthrough of Hajj rituals, from Ihram to Tawaf al-Wida.</p>
        </a>
        <a href="{{ route('hajj_umrah.hajj_duas') }}" class="hub-card">
            <i class="fas fa-hands-praying hub-icon"></i>
            <h3 class="hub-card-title">Hajj Duas</h3>
            <p class="hub-card-desc">Authentic supplications for Arafat, Muzdalifah, Mina, and the stoning of the Jamarat.</p>
        </a>
        <a href="{{ route('hajj_umrah.hajj_checklist') }}" class="hub-card">
            <i class="fas fa-list-check hub-icon"></i>
            <h3 class="hub-card-title">Hajj Checklist</h3>
            <p class="hub-card-desc">Essential packing list, spiritual preparation, and administrative requirements.</p>
        </a>
    </div>

    <div style="text-align: center;">
        <h2 class="section-title">The Minor Pilgrimage (Umrah)</h2>
    </div>
    
    <div class="hub-grid">
        <a href="{{ route('hajj_umrah.umrah_guide') }}" class="hub-card">
            <i class="fas fa-mosque hub-icon"></i>
            <h3 class="hub-card-title">Step-by-Step Umrah Guide</h3>
            <p class="hub-card-desc">A complete guide to Ihram, Tawaf, Sa'i, and Halq/Taqsir for your Umrah journey.</p>
        </a>
        <a href="{{ route('hajj_umrah.umrah_duas') }}" class="hub-card">
            <i class="fas fa-book-open hub-icon"></i>
            <h3 class="hub-card-title">Umrah Duas</h3>
            <p class="hub-card-desc">Prophetic Duas for every round of Tawaf and traversing Safa and Marwa.</p>
        </a>
        <a href="{{ route('hajj_umrah.umrah_checklist') }}" class="hub-card">
            <i class="fas fa-suitcase-rolling hub-icon"></i>
            <h3 class="hub-card-title">Umrah Checklist</h3>
            <p class="hub-card-desc">What to pack for Umrah, from Ihram clothing to comfortable walking shoes.</p>
        </a>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('hajj_umrah.hajj_faqs') }}" style="display: inline-block; background: var(--primary); color: white; padding: 15px 40px; border-radius: 50px; font-size: 1.2rem; font-weight: bold; text-decoration: none; transition: transform 0.3s; box-shadow: 0 4px 15px rgba(10,58,42,0.3);" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='none'">
            <i class="fas fa-circle-question" style="margin-right: 10px;"></i> Read Hajj & Umrah FAQs
        </a>
    </div>

</div>
@endsection
