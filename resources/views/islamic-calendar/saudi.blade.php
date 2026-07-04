@extends('layouts.app')

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; }
    .date-cards-wrapper { display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 1000px; margin: 0 auto; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 30px; width: 100%; max-width: 450px; text-align: center; transition: transform 0.3s ease; }
    .main-date-card:hover { transform: translateY(-5px); border-color: var(--gold); }
    .card-flag { font-size: 2rem; margin-bottom: 10px; }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
    .hijri-day-large { font-size: 4rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    .hijri-month-name { font-size: 1.5rem; font-weight: 600; margin-bottom: 5px; }
    .hijri-urdu-arabic { font-family: 'Amiri', serif; font-size: 1.3rem; color: var(--gold-light); margin-bottom: 10px; }
    .gregorian-date { font-size: 0.9rem; opacity: 0.8; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px; margin-top: 15px; }
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    /* Countries Grid */
    .countries-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 15px;
    }
    .country-card {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 12px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        text-align: left;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        text-decoration: none;
        color: inherit;
    }
    .country-card:hover { 
        border-color: var(--gold); 
        transform: translateY(-3px); 
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.15); 
        background: #fdfcee;
    }
    .country-flag { 
        font-size: 2rem; 
        line-height: 1;
        background: rgba(10,58,42,0.03);
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 1px solid rgba(212,175,55,0.2);
        flex-shrink: 0;
    }
    .country-info {
        flex: 1;
    }
    .country-name { 
        font-weight: 700; 
        color: var(--primary); 
        font-size: 1.05rem; 
        margin-bottom: 3px; 
    }
    .country-date { 
        font-size: 0.85rem; 
        font-weight: 600; 
        color: var(--gold); 
    }
    .country-urdu {
        font-family: 'Amiri', serif; 
        color: #888; 
        font-size: 1.1rem;
        margin-left: auto;
        text-align: right;
    }

    /* Comparison Table */
    .compare-table {
        width: 100%; border-collapse: collapse; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }
    .compare-table th { background: var(--primary); color: white; padding: 15px 20px; text-align: center; font-weight: 600; }
    .compare-table td { padding: 14px 20px; border-bottom: 1px solid #eee; text-align: center; }
    .compare-table tr:last-child td { border-bottom: none; }
    .compare-table tr:hover { background: rgba(212,175,55,0.05); }

    .info-box { background: linear-gradient(135deg, #fdf6e3, #fefcf2); border: 1px solid var(--gold); border-radius: 16px; padding: 30px; margin-top: 30px; }
    .info-box h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; }
    .info-box p { color: #555; line-height: 1.8; }

    .faq-container { margin-top: 30px; }
    .faq-item { background: white; border: 1px solid var(--border-light); border-radius: 12px; margin-bottom: 12px; overflow: hidden; }
    .faq-question { padding: 18px 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; color: var(--primary); }
    .faq-question i { color: var(--gold); transition: transform 0.3s; }
    .faq-answer { padding: 0 20px 18px; display: none; color: #555; line-height: 1.7; }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }
    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444; }
    .seo-content h2, .seo-content h3 { color: var(--primary); margin-top: 25px; margin-bottom: 12px; font-family: 'Playfair Display', serif; }
    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 30px; }
    .internal-link { display: flex; align-items: center; gap: 8px; padding: 12px 18px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; font-size: 0.9rem; }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }
    
    /* Calendar Grid CSS */
    .controls-bar { background: white; padding: 20px; border-radius: 16px; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .control-select { padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 1rem; color: #333; outline: none; }
    .print-btn { padding: 10px 25px; background: transparent; border: 2px solid var(--primary); color: var(--primary); border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.9rem; }
    .print-btn:hover { background: var(--primary); color: white; }

    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .calendar-grid-header { background: var(--primary); color: white; padding: 15px 20px; }
    .calendar-grid-title { margin: 0; font-family: 'Playfair Display', serif; font-size: 1.3rem; }
    .calendar-grid { padding: 10px; }
    .calendar-grid-row { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; }
    .calendar-grid-header-row { margin-bottom: 8px; }
    .cal-cell { aspect-ratio: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 10px; padding: 6px; position: relative; min-height: 60px; transition: all 0.2s; cursor: default; }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) { background: rgba(10,58,42,0.05); transform: scale(1.05); }
    .cal-header { font-weight: 700; color: var(--primary); font-size: 0.85rem; min-height: auto; aspect-ratio: auto; }
    .cal-greg { font-weight: 700; font-size: 1rem; color: #333; }
    .cal-hijri { font-size: 0.75rem; color: var(--gold); font-weight: 600; }
    .cal-hijri-month { font-size: 0.55rem; color: var(--primary); font-weight: 500; position: absolute; bottom: 2px; }
    .cal-today { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); border: 2px solid var(--gold); border-radius: 12px; }
    .cal-friday { background: rgba(10,58,42,0.04); }
    .cal-empty { opacity: 0.3; }
    .cal-event-badge { font-size: 0.5rem; position: absolute; top: 3px; right: 5px; }
    .cal-event-eid { color: #22c55e; }
    .cal-event-ramadan { color: #8b5cf6; }
    .cal-event-hajj { color: #f59e0b; }
    .cal-event-muharram { color: #ef4444; }
    .cal-event-other { color: #3b82f6; }

    @media (max-width: 768px) { 
        .date-hero-title { font-size: 1.6rem; } 
        .hijri-day-large { font-size: 3rem; } 
        .cal-cell { min-height: 45px; padding: 3px; }
        .cal-greg { font-size: 0.8rem; }
        .cal-hijri { font-size: 0.6rem; }
    }
</style>

{{-- HERO --}}
<section class="date-hero">
    <h1 class="date-hero-title">Islamic Date Today in Saudi Arabia | التاريخ الهجري اليوم</h1>
    <p class="date-hero-subtitle">Saudi Arabia, UAE, Kuwait, Qatar, Bahrain & Arab Countries — Umm al-Qura Calendar</p>

    @include('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriSA, 'nowPK' => Carbon\Carbon::now('Asia/Karachi')])
</section>

{{-- CONTROLS --}}
<section class="section-container">
    <div class="controls-bar">
        <form method="GET" action="{{ route('islamic-date-saudi') }}" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center;">
            <select name="year" class="control-select" onchange="this.form.submit()">
                @for($y = 2018; $y <= 2030; $y++)
                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
            <select name="month" class="control-select" onchange="this.form.submit()">
                @for($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>{{ Carbon\Carbon::create($year, $m, 1)->format('F') }}</option>
                @endfor
            </select>
            <button type="button" class="print-btn" onclick="window.print()"><i class="fas fa-print"></i> Print Calendar</button>
        </form>
    </div>
</section>

{{-- FULL YEAR CALENDAR (SAUDI ARABIA) --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Saudi Arabia Islamic Calendar {{ $year }} — Full 12 Months</h2>
        <p>Complete Hijri calendar for Saudi Arabia (Umm al-Qura). Each day shows both Gregorian and Hijri dates.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 20px;">
        @foreach($fullYearCalendar as $mKey => $monthData)
            @include('islamic-calendar.partials._month-grid', [
                'monthData' => $monthData,
                'monthName' => $monthData['month_name'],
                'year' => $year,
                'yearEvents' => collect()
            ])
        @endforeach
    </div>
</section>

{{-- ARAB COUNTRIES GRID --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Date Today — 8 Arab & Muslim Countries</h2>
        <p>Side-by-side Islamic Hijri date for Saudi Arabia, UAE, Kuwait, Qatar, Bahrain, Jordan, Egypt, Turkey</p>
    </div>

    <div class="countries-grid">
        @foreach($countriesData as $name => $data)
            @php 
                $slug = strtolower(str_replace(' ', '-', $name));
                $url = ($slug === 'saudi-arabia') ? route('islamic-date-saudi') : route('islamic-date-country', $slug);
            @endphp
            <a href="{{ $url }}" class="country-card">
                <div class="country-flag">{{ $data['flag'] }}</div>
                <div class="country-info">
                    <div class="country-name">{{ $name }}</div>
                    <div class="country-date">{{ $data['day'] }} {{ $data['month_name'] }} {{ $data['year'] }}</div>
                </div>
                <div class="country-urdu">{{ $data['month_urdu'] }}</div>
            </a>
        @endforeach
    </div>
</section>

{{-- SAUDI vs PAKISTAN vs UK COMPARISON --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Saudi Arabia vs Pakistan — Islamic Date Comparison</h2>
    </div>

    <table class="compare-table">
        <thead>
            <tr>
                <th>Country</th>
                <th>Islamic Date</th>
                <th>Calendar Method</th>
                <th>Hijri Year</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>🇸🇦 Saudi Arabia</strong></td>
                <td>{{ $hijriSA['day'] }} {{ $hijriSA['month_name'] }}</td>
                <td>Umm al-Qura (Calculated)</td>
                <td>{{ $hijriSA['year'] }} AH</td>
            </tr>
            <tr>
                <td><strong>🇵🇰 Pakistan</strong></td>
                <td>{{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }}</td>
                <td>Local Moon Sighting</td>
                <td>{{ $hijriPK['year'] }} AH</td>
            </tr>
            <tr>
                <td><strong>🇦🇪 UAE</strong></td>
                <td>{{ $hijriUAE['day'] }} {{ $hijriUAE['month_name'] }}</td>
                <td>Follows Saudi/Calculated</td>
                <td>{{ $hijriUAE['year'] }} AH</td>
            </tr>
        </tbody>
    </table>
</section>

{{-- UMM AL-QURA EXPLANATION --}}
<section class="section-container">
    <div class="info-box">
        <h3>🕋 The Umm al-Qura Calendar — Saudi Arabia's Official Calendar</h3>
        <p>The <strong>Umm al-Qura calendar</strong> (Arabic: أم القرى) is the official Islamic calendar used in Saudi Arabia. It is based on astronomical calculations rather than physical moon sighting. The King Abdulaziz City for Science and Technology (KACST) in Riyadh prepares the calendar using precise astronomical data.</p>
        <p>Unlike Pakistan's traditional moon sighting method, the Umm al-Qura calendar can predict Islamic dates years in advance. This calendar determines the start of all Islamic months, including Ramadan, Shawwal, and Dhu al-Hijjah. Most Gulf countries (UAE, Kuwait, Qatar, Bahrain) also follow this calculated method.</p>
        <p>Today's Saudi Arabia Islamic date: <strong>{{ $hijriSA['formatted'] }}</strong></p>
    </div>
</section>

{{-- MAKKAH MOON SIGHTING --}}
<section class="section-container">
    <div class="info-box" style="background: white; border-color: var(--border-light);">
        <h3>🌙 Makkah Moon Sighting Tradition</h3>
        <p>Historically, the new Islamic month begins when the crescent moon (hilal) is first sighted after sunset in Makkah al-Mukarramah. The Hilal Committee in Saudi Arabia was responsible for physical moon sighting before the Umm al-Qura astronomical method became standard.</p>
        <p>The <strong>Islamic date today in Saudi Arabia</strong> is considered the "base date" by many Muslim-majority countries. Countries in the Gulf Cooperation Council (GCC) — UAE, Kuwait, Qatar, Bahrain, and Oman — generally follow Saudi Arabia's Islamic dates. However, some countries like Pakistan, Bangladesh, and India maintain their own independent moon sighting committees.</p>
    </div>
</section>

{{-- INTERNAL LINKS --}}
<section class="section-container">
    <div class="internal-links">
        <a href="{{ route('islamic-calendar') }}" class="internal-link">📅 Islamic Calendar</a>
        <a href="{{ route('islamic-date-today') }}" class="internal-link">📅 Islamic Date Today</a>
        <a href="{{ route('islamic-date-pakistan') }}" class="internal-link">🇵🇰 Pakistan Date</a>
        <a href="{{ route('islamic-date-urdu') }}" class="internal-link">🔤 Urdu Date</a>
    </div>
</section>

{{-- FAQ --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Date Saudi Arabia</h2>
    </div>
    @php
    $faqs = [
        ['q' => 'What is Islamic date today in Saudi Arabia?', 'a' => "<strong>Islamic date today in Saudi Arabia</strong> is <strong>{$hijriSA['formatted']}</strong>. Saudi Arabia follows the Umm al-Qura calculated calendar."],
        ['q' => 'Islamic date today in UAE?', 'a' => "Islamic date today in UAE is <strong>{$hijriUAE['formatted']}</strong>. UAE generally follows the same calendar as Saudi Arabia."],
        ['q' => 'Why is Saudi Arabia Islamic date different from Pakistan?', 'a' => "Saudi Arabia uses the <strong>Umm al-Qura calculated calendar</strong>, while Pakistan follows local physical moon sighting. This often causes a 1-day difference."],
        ['q' => 'What is Umm al-Qura calendar?', 'a' => "The Umm al-Qura calendar is Saudi Arabia's official Islamic calendar based on astronomical calculations by KACST. It can predict Islamic dates years in advance."],
        ['q' => 'Today Islamic date in Saudi Arabia 2026?', 'a' => "Today Islamic date in Saudi Arabia 2026 is <strong>{$hijriSA['formatted']}</strong>. This is the official date per the Umm al-Qura calendar."],
        ['q' => 'Do all Arab countries have the same Islamic date?', 'a' => "Most Gulf countries (UAE, Kuwait, Qatar, Bahrain) follow Saudi Arabia's Islamic date. However, countries like Egypt, Jordan, and Turkey may have 1-day differences depending on their own moon sighting or calculation methods."],
    ];
    @endphp
    @include('islamic-calendar.partials._faq', ['faqs' => $faqs])
</section>

{{-- SEO CONTENT --}}
<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Date Today in Saudi Arabia — Umm al-Qura Calendar Guide</h2>
        <p><strong>Islamic date today in Saudi Arabia</strong> is <strong>{{ $hijriSA['formatted'] }}</strong>. Saudi Arabia is home to Islam's two holiest cities — Makkah al-Mukarramah and Madinah al-Munawwarah — making its Islamic calendar particularly important for the global Muslim community. The <strong>Saudi Arabia Islamic date today</strong> is determined by the Umm al-Qura calendar, the kingdom's official Hijri calendar.</p>

        <h3>Islamic Date Today in UAE, Kuwait, Qatar</h3>
        <p>The <strong>Islamic date today in UAE</strong> is {{ $hijriUAE['formatted'] }}. The United Arab Emirates, along with Kuwait, Qatar, and Bahrain, generally follows Saudi Arabia's Islamic dates. These Gulf states use either the Saudi calendar or their own astronomical calculation methods that closely align with the Umm al-Qura system.</p>

        <h3>Saudi vs Pakistan Islamic Date Difference</h3>
        <p>The difference between <strong>Saudi Arabia Islamic date</strong> and <strong>Pakistan Islamic date</strong> is typically 0-1 days. Saudi Arabia ({{ $hijriSA['formatted'] }}) vs Pakistan ({{ $hijriPK['formatted'] }}). Saudi Arabia often declares the new month 1 day earlier because the Umm al-Qura calculation method is more predictive, while Pakistan's Ruet-e-Hilal Committee relies on visual confirmation of the crescent moon.</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
@endsection
