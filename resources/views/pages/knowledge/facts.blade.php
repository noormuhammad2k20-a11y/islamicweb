@extends('layouts.app')

@section('title', 'Islamic Facts — Noor-e-Islam')
@section('meta_description', 'Discover profound Islamic facts and historical knowledge dynamically retrieved from our comprehensive database.')

@section('content')
<style>
    .vip-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }
    .fact-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.04);
        padding: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .fact-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: var(--primary);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .fact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.08);
    }
    .fact-card:hover::before {
        opacity: 1;
    }
    .fact-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 15px;
    }
    .fact-content {
        font-family: 'Inter', sans-serif;
        color: #555;
        font-size: 0.95rem;
        line-height: 1.6;
    }
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: #fff;
        border-radius: 16px;
        border: 1px dashed #e0e0e0;
        grid-column: 1 / -1;
    }
    .seo-article {
        padding: 60px 0;
        border-top: 1px solid #eaeaea;
        font-family: 'Inter', sans-serif;
        line-height: 1.8;
        color: #333;
    }
    .seo-article h2 {
        font-family: 'Poppins', sans-serif;
        color: var(--primary-dark);
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 25px;
    }
    .seo-article h3 {
        font-family: 'Poppins', sans-serif;
        color: var(--primary);
        font-weight: 600;
        font-size: 1.5rem;
        margin-top: 40px;
        margin-bottom: 20px;
    }
</style>

<section class="section" style="padding-top: 60px; background-color: #fbfbfb;">
    <div class="container">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Islamic Facts</span>
            </div>
        </div>

        <div class="text-center mb-5">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: var(--primary-dark);">Islamic Facts & Knowledge</h1>
            <p class="text-muted">Profound insights and historical context derived from authentic sources.</p>
        </div>

        <div class="vip-grid">
            @if(isset($facts) && $facts->count() > 0)
                @foreach($facts as $fact)
                    <div class="fact-card">
                        <h3 class="fact-title">{{ $fact->title ?? 'Fascinating Insight' }}</h3>
                        <p class="fact-content">
                            {{ $fact->content ?? $fact->description }}
                        </p>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <i class="fas fa-book-open" style="font-size: 3.5rem; color: #ddd; margin-bottom: 20px;"></i>
                    <h3 style="font-family: 'Poppins', sans-serif; color: var(--primary-dark);">Curating Knowledge</h3>
                    <p class="text-muted mb-0">Our scholars are currently compiling verified Islamic facts. Please check back soon.</p>
                </div>
            @endif
        </div>

        <!-- SEO Authoritative Content -->
        <div class="seo-article">
            <h2>The Preservation and Transmission of Islamic Knowledge</h2>
            <p>
                The foundation of Islamic epistemology rests heavily upon the rigorous preservation and systematic transmission of knowledge (Ilm). From the earliest days of revelation, the meticulous documentation of the Quran and the Prophetic traditions (Ahadith) established an unprecedented standard for historical accuracy and textual integrity. Understanding the methodology behind this preservation offers profound insight into the authenticity of Islamic facts and historical narratives.
            </p>
            <h3>The Science of Hadith (Ilm al-Hadith)</h3>
            <p>
                The authentication of Islamic facts is intricately linked to the Science of Hadith. This highly sophisticated academic discipline involves the critical evaluation of both the text (Matn) and the chain of narrators (Isnad). Early scholars, such as Imam Al-Bukhari and Imam Muslim, developed stringent criteria to verify the reliability, memory, and character of every individual in a chain of transmission. If a single narrator was found to have a weak memory or a lapse in integrity, the hadith could be downgraded from "Sahih" (authentic) to "Da'if" (weak). This unparalleled methodology ensured that the sayings, actions, and approvals of Prophet Muhammad (PBUH) were preserved without corruption.
            </p>
            <h3>The Golden Age of Islamic Scholarship</h3>
            <p>
                During the Islamic Golden Age, from the 8th to the 14th century, the pursuit of knowledge expanded beyond theology into the empirical sciences, mathematics, medicine, and astronomy. Institutions like the House of Wisdom (Bayt al-Hikmah) in Baghdad served as global centers of learning where scholars translated classical texts and produced original research. Prominent figures such as Al-Khwarizmi (the father of algebra), Ibn Sina (Avicenna), and Al-Biruni authored encyclopedic works that heavily influenced both the Eastern and Western intellectual worlds. The facts derived from this era are not merely historical footnotes; they form the bedrock of many modern scientific disciplines.
            </p>
            <h3>Textual Integrity of the Quran</h3>
            <p>
                A core factual tenet of Islam is the immaculate preservation of the Quranic text. Unlike other historical manuscripts that underwent numerous revisions, the Quran was compiled into a single standardized text during the caliphate of Uthman ibn Affan, less than two decades after the Prophet's passing. This compilation was cross-referenced with the oral recitations of hundreds of companions (Hafiz) who had memorized the text verbatim. Modern manuscript discoveries, such as the Birmingham Quran manuscript, have provided empirical carbon-dated evidence that aligns perfectly with the traditional Islamic narrative, confirming that the text read today is identical to the text revealed over 1,400 years ago.
            </p>
            <h3>The Ongoing Legacy of Islamic Epistemology</h3>
            <p>
                The integration of faith and reason remains a hallmark of Islamic theology. The Quran continuously exhorts believers to observe the natural world, reflect upon history, and seek empirical truth as a means to recognize the Creator. This holistic approach to knowledge ensures that Islamic facts are not merely dogmatic assertions but are grounded in a rich tradition of scholarly inquiry, historical verification, and intellectual rigor.
            </p>
        </div>
    </div>
</section>
@endsection