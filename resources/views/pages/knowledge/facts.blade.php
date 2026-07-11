@extends('layouts.app')

@section('title', 'Fascinating Islamic Facts — Did You Know?')
@section('meta_description', 'Discover fascinating facts about Islam, the Quran, Prophet Muhammad (PBUH), and the Islamic world. Expand your knowledge of the fastest-growing religion.')
@section('meta_keywords', 'islamic facts, facts about islam, interesting islamic facts, did you know islam, quran facts, prophet muhammad facts')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": "Fascinating Islamic Facts",
  "description": "Discover fascinating facts about Islam, the Quran, and the Islamic world.",
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
    .k-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }

    .facts-masonry { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }
    
    .fact-card { background: var(--white); border-radius: var(--radius-lg); padding: 35px; box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); transition: var(--tr); position: relative; overflow: hidden; }
    .fact-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    .fact-card::before { content: '\f0eb'; font-family: 'Font Awesome 5 Free'; font-weight: 900; position: absolute; right: -15px; top: -15px; font-size: 8rem; color: rgba(20,93,160,0.03); transform: rotate(15deg); transition: var(--tr); }
    .fact-card:hover::before { color: rgba(184,134,59,0.08); transform: rotate(0); }
    
    .fact-icon { width: 50px; height: 50px; background: linear-gradient(135deg, var(--gold-light), var(--gold)); color: var(--white); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 20px; box-shadow: 0 4px 10px rgba(184,134,59,0.2); }
    .fact-card h3 { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--primary-dark); margin-bottom: 15px; position: relative; z-index: 2; }
    .fact-card p { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 0; line-height: 1.8; position: relative; z-index: 2; }

    @media (max-width: 768px) {
        .k-hero h1 { font-size: 2.4rem; }
        .facts-masonry { grid-template-columns: 1fr; }
    }
</style>

<div class="k-page">
    <div class="k-breadcrumb">
        <div class="k-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <a href="{{ route('knowledge.index') }}">Knowledge</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <span class="k-breadcrumb-current">Islamic Facts</span>
        </div>
    </div>

    <section class="k-hero">
        <div class="k-hero-inner">
            <div class="k-hero-badge"><i class="fas fa-lightbulb"></i> Did You Know?</div>
            <h1>Fascinating <span>Islamic</span> Facts</h1>
            <p>Expand your knowledge with these amazing facts about Islam, the Quran, and the rich history of the Muslim world.</p>
        </div>
    </section>

    <section class="k-content">
        <div class="k-content-inner">
            
            <div class="facts-masonry">
                
                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-globe"></i></div>
                    <h3>The Word "Islam"</h3>
                    <p>The word "Islam" shares the same Arabic root as the word "Salam", which means peace. It literally translates to "voluntary submission to the will of God." A Muslim is one who submits to this will.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-book-open"></i></div>
                    <h3>Memorization of the Quran</h3>
                    <p>The Quran is the only religious book in the world that is memorized entirely, word-for-word, by millions of people (known as Hafiz) around the globe, ensuring its preservation.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-chart-line"></i></div>
                    <h3>Fastest Growing Religion</h3>
                    <p>According to the Pew Research Center, Islam is currently the fastest-growing major religion in the world, projected to be the largest by the end of the 21st century.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-female"></i></div>
                    <h3>The First University</h3>
                    <p>The oldest existing, and continually operating educational institution in the world is the University of Al-Qarawiyyin in Fez, Morocco. It was founded in 859 CE by a Muslim woman named Fatima al-Fihri.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-child"></i></div>
                    <h3>Jesus in Islam</h3>
                    <p>Jesus (Isa, peace be upon him) is a highly revered Prophet in Islam. His name is mentioned in the Quran 25 times, which is more times than Prophet Muhammad (PBUH) is mentioned by name.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-cat"></i></div>
                    <h3>Love for Cats</h3>
                    <p>Prophet Muhammad (PBUH) was known for his fondness for cats. According to Islamic tradition, cats are considered ritually clean animals and are permitted to enter homes and even mosques.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-star-and-crescent"></i></div>
                    <h3>Not Just the Middle East</h3>
                    <p>While Islam originated in the Middle East, only about 20% of the world's Muslims live there today. The country with the largest Muslim population is Indonesia in Southeast Asia.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-heartbeat"></i></div>
                    <h3>Discovering Circulation</h3>
                    <p>Ibn al-Nafis, a 13th-century Arab Muslim physician, was the first person to accurately describe pulmonary blood circulation, centuries before European scientists.</p>
                </div>

                <div class="fact-card">
                    <div class="fact-icon"><i class="fas fa-coffee"></i></div>
                    <h3>The Origins of Coffee</h3>
                    <p>Coffee was first brewed as a drink by Sufi monks in Yemen in the 15th century. They used it to stay awake during late-night devotions and prayers.</p>
                </div>

            </div>

        </div>
    </section>
</div>
@endsection
