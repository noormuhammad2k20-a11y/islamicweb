@extends('layouts.app')

@section('schema')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebPage",
    "name": "{{ $seoData['title'] }}",
    "description": "{{ $seoData['description'] }}",
    "url": "{{ $seoData['canonical'] }}"
}
</script>
@endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --shadow-xl: 0 24px 64px rgba(10, 31, 63, 0.14);
        --shadow-2xl: 0 32px 80px rgba(10, 31, 63, 0.18);
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --shadow-navy: 0 12px 40px rgba(10, 31, 63, 0.25);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-xl: 44px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    /* ===== HERO SECTION ===== */
    .date-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 140px 20px 120px;
        text-align: center;
        color: var(--white);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .date-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.04;
        background-image: radial-gradient(var(--navy-tint) 1px, transparent 1px);
        background-size: 28px 28px;
        mask-image: linear-gradient(to left, rgba(0,0,0,0.5), transparent 70%);
        -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,0.5), transparent 70%);
        z-index: 1;
    }
    .date-hero::after {
        content: "";
        position: absolute;
        top: -10%; left: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.08), transparent 60%);
        border-radius: 50%;
        filter: blur(60px);
        pointer-events: none;
        z-index: 1;
    }
    .date-hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 16px;
        position: relative;
        z-index: 2;
        line-height: 1.1;
        letter-spacing: -.5px;
    }
    .date-hero-subtitle {
        font-size: 1.1rem;
        color: var(--gold-light);
        margin-bottom: 60px;
        position: relative;
        z-index: 2;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.85;
        font-weight: 500;
    }
    .date-cards-wrapper {
        display: flex;
        justify-content: center;
        gap: 28px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
        max-width: 1000px;
        margin: 0 auto;
    }
    .main-date-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: var(--radius-lg);
        padding: 44px 30px;
        width: 100%;
        max-width: 450px;
        text-align: center;
        transition: var(--tr);
        color: var(--white);
        position: relative;
        overflow: hidden;
    }
    .main-date-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: var(--tr);
    }
    .main-date-card:hover {
        transform: translateY(-10px);
        border-color: rgba(201, 168, 76, 0.3);
        box-shadow: 0 24px 60px rgba(10, 31, 63, 0.3);
        background: rgba(255, 255, 255, 0.12);
    }
    .main-date-card:hover::before { transform: scaleX(1); }
    
    .card-flag { font-size: 2.5rem; margin-bottom: 12px; } 
    .card-region { 
        font-size: .75rem; 
        color: var(--gold-light); 
        text-transform: uppercase; 
        letter-spacing: 1.5px; 
        margin-bottom: 20px; 
        font-weight: 700;
    }
    .hijri-day-large { 
        font-size: 5rem; 
        font-weight: 700; 
        line-height: 1; 
        margin-bottom: 8px; 
        font-family: 'Cormorant Garamond', serif; 
        color: var(--white);
    }
    .hijri-month-name { 
        font-size: 1.6rem; 
        font-weight: 600; 
        margin-bottom: 8px; 
        font-family: 'Cormorant Garamond', serif;
    }
    .hijri-urdu-arabic { 
        font-family: 'Scheherazade New', serif; 
        font-size: 1.5rem; 
        color: var(--gold-light); 
        margin-bottom: 20px; 
        line-height: 1.5;
    }
    .gregorian-date { 
        font-size: .9rem; 
        opacity: 0.7; 
        border-top: 1px solid rgba(255,255,255,0.1); 
        padding-top: 20px; 
        margin-top: 20px; 
        font-weight: 500;
    }

    /* ===== CONTROLS BAR ===== */
    .section-container { max-width: 1140px; margin: 90px auto; padding: 0 20px; }
    
    .controls-section {
        max-width: 800px;
        margin: -60px auto 80px;
        position: relative;
        z-index: 10;
        padding: 0 20px;
    }
    .controls-bar {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: var(--radius-full);
        padding: 12px;
        box-shadow: var(--shadow-xl);
        border: 1px solid rgba(255,255,255,0.8);
    }
    .control-select {
        padding: 12px 24px;
        border: 1px solid var(--border);
        border-radius: var(--radius-full);
        background: var(--bg-main);
        color: var(--navy);
        font-weight: 600;
        font-size: .9rem;
        cursor: pointer;
        transition: var(--tr);
        box-shadow: var(--shadow-xs);
        font-family: 'Outfit', sans-serif;
        outline: none;
    }
    .control-select:hover, .control-select:focus {
        border-color: var(--navy);
        background: var(--white);
        box-shadow: var(--shadow-sm);
    }
    .print-btn {
        padding: 12px 28px; 
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); 
        border: 1px solid transparent;
        color: var(--white); 
        border-radius: var(--radius-full); 
        font-weight: 600; 
        cursor: pointer;
        transition: var(--tr); 
        font-size: .9rem;
        font-family: 'Outfit', sans-serif;
        box-shadow: var(--shadow-md), inset 0 1px 0 rgba(255,255,255,0.1);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .print-btn:hover { 
        background: linear-gradient(145deg, var(--navy-mid), var(--navy-light)); 
        transform: translateY(-2px); 
        box-shadow: var(--shadow-lg), inset 0 1px 0 rgba(255,255,255,0.1);
    }

    /* ===== SECTION TITLE ===== */
    .section-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.8rem;
        color: var(--navy);
        text-align: center;
        margin-bottom: 0;
        display: inline-block;
        position: relative;
        font-weight: 600;
        letter-spacing: -.5px;
    }
    .section-title::after {
        content: "";
        position: absolute;
        bottom: -14px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: var(--gold-gradient);
        border-radius: 2px;
        box-shadow: 0 0 12px rgba(201, 168, 76, 0.25);
    }
    .title-wrapper { text-align: center; margin-bottom: 60px; }
    .title-wrapper p { 
        color: var(--text-medium); 
        max-width: 600px; 
        margin: 30px auto 0; 
        line-height: 1.85; 
        font-size: 1.02rem;
    }

    /* ===== CALENDAR GRID ===== */
    .calendar-grid-wrapper {
        background: var(--white);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        border: 1px solid var(--border-light);
        margin-bottom: 24px;
        transition: var(--tr);
    }
    .calendar-grid-wrapper:hover {
        box-shadow: var(--shadow-md); 
        border-color: var(--navy-tint);
        transform: translateY(-3px); 
    }
    .calendar-grid-header {
        background: linear-gradient(150deg, var(--navy), var(--navy-mid));
        color: var(--white);
        padding: 18px 24px;
        position: relative;
        overflow: hidden;
    }
    .calendar-grid-header::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; height: 2px;
        background: var(--gold-gradient);
    }
    .calendar-grid-title {
        margin: 0;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem;
        font-weight: 600;
    }
    .calendar-grid { padding: 12px; }
    .calendar-grid-row {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 6px;
    }
    .calendar-grid-header-row { margin-bottom: 10px; }
    
    /* Refined Cal Cell - Perfectly Fixed */
    .cal-cell {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-sm);
        padding: 4px 2px; /* Reduced padding */
        position: relative;
        min-height: 50px; /* Fixed appropriate height */
        transition: all 0.3s ease;
        cursor: default;
        background: var(--bg-main);
        border: 1px solid transparent;
        overflow: visible; 
    }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) {
        background: var(--white);
        border-color: var(--gold);
        transform: scale(1.05);
        z-index: 1;
        box-shadow: 0 6px 15px rgba(10, 31, 63, 0.08);
    }
    .cal-header {
        font-weight: 700;
        color: var(--navy);
        font-size: .7rem;
        min-height: auto;
        padding: 8px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: transparent;
    }
    .cal-greg { 
        font-weight: 700; 
        font-size: .9rem; 
        color: var(--text-dark); 
        line-height: 1.1; 
        white-space: nowrap; /* Prevents breaking */
    }
    .cal-hijri { 
        font-size: .7rem; 
        color: var(--gold-dark); 
        font-weight: 600; 
        margin-top: 1px; 
        line-height: 1.1; 
        white-space: nowrap; /* Prevents breaking */
    }
    .cal-hijri-month { 
        font-size: .55rem; 
        color: var(--text-light); 
        font-weight: 500; 
        margin-top: 1px; 
        line-height: 1.1;
        text-align: center;
        white-space: nowrap; /* Prevents breaking */
    }
    .cal-today { 
        background: linear-gradient(135deg, var(--gold), var(--gold-light)); 
        border: 1px solid var(--gold-dark); 
        box-shadow: 0 4px 15px rgba(201, 168, 76, 0.3);
    }
    .cal-today .cal-greg { color: var(--navy); }
    .cal-today .cal-hijri { color: var(--navy); }
    .cal-friday { background: var(--navy-tint); }
    .cal-empty { opacity: 0.3; background: transparent; }
    .cal-event-badge { font-size: .6rem; position: absolute; top: 4px; right: 6px; }
    .cal-event-eid { color: #22c55e; }
    .cal-event-ramadan { color: #8b5cf6; }
    .cal-event-hajj { color: #f59e0b; }
    .cal-event-muharram { color: #ef4444; }
    .cal-event-other { color: #3b82f6; }

    /* ===== EVENTS TIMELINE ===== */
    .events-timeline {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
        margin-top: 20px;
    }
    .event-card {
        background: var(--white);
        border: 1px solid var(--border-light);
        border-radius: var(--radius-md);
        padding: 28px;
        display: flex;
        gap: 20px;
        align-items: center;
        transition: var(--tr);
        box-shadow: var(--shadow-xs);
        position: relative;
        overflow: hidden;
    }
    .event-card::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient);
        transform: scaleX(0);
        transform-origin: left;
        transition: var(--tr);
    }
    .event-card:hover { 
        box-shadow: var(--shadow-md); 
        transform: translateY(-4px); 
        border-color: var(--navy-tint);
    }
    .event-card:hover::before { transform: scaleX(1); }
    
    .event-icon {
        width: 56px; height: 56px;
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 1.4rem; color: white; flex-shrink: 0;
        box-shadow: var(--shadow-sm);
    }
    .event-icon-eid { background: linear-gradient(135deg, #22c55e, #16a34a); }
    .event-icon-ramadan { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .event-icon-hajj { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .event-icon-muharram { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .event-icon-other { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .event-name { font-weight: 700; color: var(--navy); font-size: 1.15rem; font-family: 'Outfit', sans-serif; }
    .event-date { font-size: .85rem; color: var(--text-light); margin-top: 4px; }

    /* ===== INTERNAL LINKS ===== */
    .internal-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
        margin-top: 30px;
    }
    .internal-link {
        display: flex; align-items: center; gap: 12px;
        padding: 18px 24px; 
        background: var(--white); 
        border: 1px solid var(--border-light);
        border-radius: var(--radius-sm); 
        text-decoration: none; 
        color: var(--navy);
        font-weight: 600; 
        transition: var(--tr); 
        font-size: .95rem;
        box-shadow: var(--shadow-xs);
    }
    .internal-link:hover { 
        border-color: var(--gold); 
        background: var(--gold-tint); 
        transform: translateY(-3px); 
        box-shadow: var(--shadow-sm); 
    }

    /* ===== FAQ ===== */
    .faq-container { margin-top: 30px; }
    .faq-item { 
        background: var(--white); 
        border: 1px solid var(--border-light); 
        border-radius: var(--radius-md); 
        margin-bottom: 16px; 
        overflow: hidden;
        transition: var(--tr);
        box-shadow: var(--shadow-xs);
    }
    .faq-item:hover { box-shadow: var(--shadow-sm); border-color: var(--navy-tint); }
    .faq-question { 
        padding: 22px 28px; 
        cursor: pointer; 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        font-weight: 600; 
        color: var(--navy); 
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.3rem;
    }
    .faq-question i { color: var(--gold); transition: transform 0.3s; font-size: 1rem; }
    .faq-answer { padding: 0 28px 24px; display: none; color: var(--text-medium); line-height: 1.8; font-size: 1rem; }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }
    .faq-open { box-shadow: var(--shadow-md); border-color: var(--gold); }

    /* ===== SEO CONTENT ===== */
    .seo-content {
        background: var(--white); 
        padding: 50px; 
        border-radius: var(--radius-lg);
        border: 1px solid var(--border-light); 
        margin-top: 40px; 
        line-height: 1.8; 
        color: var(--text-medium);
        box-shadow: var(--shadow-lg);
        position: relative;
    }
    .seo-content::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: var(--gold-gradient);
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }
    .seo-content h2, .seo-content h3 { 
        color: var(--navy); 
        margin-top: 30px; 
        margin-bottom: 15px; 
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        font-size: 1.8rem;
    }
    .seo-content p { margin-bottom: 20px; }
    .seo-content a { color: var(--gold-dark); text-decoration: none; font-weight: 600; transition: var(--tr-fast); }
    .seo-content a:hover { color: var(--navy); }

    @media (max-width: 768px) {
        .date-hero { padding: 80px 20px 100px; }
        .date-hero-title { font-size: 2.4rem; }
        .section-title { font-size: 2rem; }
        .hijri-day-large { font-size: 3.5rem; }
        
        /* Mobile adjustments for calendar cells */
        .cal-cell { min-height: 45px; padding: 2px 1px; }
        .cal-greg { font-size: .8rem; }
        .cal-hijri { font-size: .6rem; }
        .cal-hijri-month { font-size: .5rem; }
        
        .seo-content { padding: 30px; }
        .controls-bar { flex-direction: column; border-radius: var(--radius-md); }
        .control-select, .print-btn { width: 100%; justify-content: center; }
    }

    /* Print Styles */
    @media print {
        body * { visibility: hidden; }
        #calendar-print-area, #calendar-print-area * { visibility: visible; }
        #calendar-print-area { position: absolute; left: 0; top: 0; width: 100%; margin: 0; padding: 10px; }
        .print-btn { display: none !important; }
        .calendar-grid-wrapper { box-shadow: none !important; border: 1px solid #ccc !important; break-inside: avoid; page-break-inside: avoid; margin-bottom: 20px; transform: none !important; }
        .section-container { max-width: 100%; padding: 0; margin: 0; }
        .title-wrapper { text-align: center !important; justify-content: center !important; width: 100%; margin-bottom: 20px; }
        .section-title { border-bottom: 2px solid #ccc !important; font-size: 1.8rem; }
        /* Two columns per page for print */
        #calendar-print-area > div[style*="display: grid"] { grid-template-columns: repeat(2, 1fr) !important; gap: 15px !important; }
        /* Hide navbar/footer completely so they don't take up space */
        header, footer, .top-bar, .controls-bar { display: none !important; }
        /* Enforce background colors on print */
        .cal-header { color: #000 !important; }
        .calendar-grid-header { background: #eee !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
</style>

{{-- HERO SECTION --}}
<section class="date-hero">
    <h1 class="date-hero-title">Islamic Calendar {{ $year }} | Hijri Calendar {{ $hijriPK['year'] }} AH</h1>
    <p class="date-hero-subtitle">Complete Islamic Calendar with Hijri Dates — Today: {{ $hijriPK['formatted'] }}</p>

    @include('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriSA, 'nowPK' => $nowPK])
</section>

{{-- CONTROLS --}}
<section class="controls-section">
    <div class="controls-bar">
        <form method="GET" action="{{ route('islamic-calendar') }}" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center; width: 100%;">
            <select name="year" class="control-select" onchange="this.form.submit()">
                @for($y = 2018; $y <= 2036; $y++)
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

{{-- FULL YEAR CALENDAR --}}
<section class="section-container" id="calendar-print-area">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Calendar {{ $year }} — Full 12-Month Hijri Calendar</h2>
        <p>Today's date according to Islamic calendar for {{ $year }}. Each day shows both Gregorian and Hijri dates.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 20px;">
        @foreach($fullYearCalendar as $mKey => $monthData)
            @include('islamic-calendar.partials._month-grid', [
                'monthData' => $monthData,
                'monthName' => $monthData['month_name'],
                'year' => $year,
                'yearEvents' => $yearEvents
            ])
        @endforeach
    </div>
</section>

{{-- ISLAMIC EVENTS TIMELINE --}}
@if($yearEvents->count() > 0)
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Events {{ $year }} — Important Islamic Dates</h2>
        <p>All major Islamic events and holidays for {{ $year }}</p>
    </div>

    <div class="events-timeline">
        @foreach($yearEvents as $event)
            <div class="event-card">
                <div class="event-icon event-icon-{{ $event->event_type }}">
                    @switch($event->event_type)
                        @case('eid') 🌙 @break
                        @case('ramadan') 🕌 @break
                        @case('hajj') 🕋 @break
                        @case('muharram') 📿 @break
                        @default ☪️
                    @endswitch
                </div>
                <div>
                    <div class="event-name">{{ $event->event_name }}</div>
                    <div class="event-date">
                        {{ $event->hijri_date ?? '' }}
                        @if($event->gregorian_date) · {{ $event->gregorian_date->format('d M Y') }} @endif
                    </div>
                    @if($event->event_name_urdu)
                        <div style="font-family: 'Amiri', serif; color: var(--gold-dark); font-size: 0.9rem; margin-top: 4px;">{{ $event->event_name_urdu }}</div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

{{-- INTERNAL LINKS --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Date Pages</h2>
    </div>
    <div class="internal-links">
        <a href="{{ route('islamic-date-today') }}" class="internal-link">📅 Islamic Date Today</a>
        <a href="{{ route('islamic-date-pakistan') }}" class="internal-link">🇵🇰 Pakistan Islamic Date</a>
        <a href="{{ route('islamic-date-saudi') }}" class="internal-link">🇸🇦 Saudi Arabia Date</a>
        <a href="{{ route('islamic-date-urdu') }}" class="internal-link">🔤 Urdu Islamic Date</a>
        <a href="{{ route('islamic-date-city', 'karachi') }}" class="internal-link">🏙️ Karachi Date</a>
        <a href="{{ route('islamic-date-city', 'lahore') }}" class="internal-link">🏙️ Lahore Date</a>
        <a href="{{ route('islamic-date-city', 'islamabad') }}" class="internal-link">🏙️ Islamabad Date</a>
        <a href="{{ route('islamic-date-city', 'rawalpindi') }}" class="internal-link">🏙️ Rawalpindi Date</a>
    </div>
</section>

{{-- FAQ --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Frequently Asked Questions — Islamic Calendar {{ $year }}</h2>
    </div>

    @php
    $faqs = [
        ['q' => "What is the Islamic calendar {$year} today date?", 'a' => "Islamic calendar {$year} today date is <strong>{$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']}</strong> AH in Pakistan ({$nowPK->format('d F Y')}). The Islamic calendar is a lunar calendar with 354 or 355 days per year."],
        ['q' => "Today's date according to Islamic calendar?", 'a' => "Today's date according to Islamic calendar is <strong>{$hijriPK['formatted']}</strong>. The current Islamic month is {$hijriPK['month_name']} ({$hijriPK['month_urdu']}), which is the {$hijriPK['month']}th month of the Hijri year."],
        ['q' => "How many months are in the Islamic calendar?", 'a' => "The Islamic calendar has <strong>12 months</strong>: Muharram, Safar, Rabi al-Awwal, Rabi al-Thani, Jumada al-Awwal, Jumada al-Thani, Rajab, Shaban, Ramadan, Shawwal, Dhu al-Qadah, and Dhu al-Hijjah. Each month has 29 or 30 days based on moon sighting."],
        ['q' => "When is Ramadan {$year}?", 'a' => "Ramadan {$year} is expected to begin around February/March {$year} (exact date depends on moon sighting). Check our <a href='" . url("/islamic-calendar/{$year}") . "'>Islamic Calendar {$year}</a> for complete Ramadan dates."],
        ['q' => "What is Islamic month date today?", 'a' => "Islamic month date today is <strong>{$hijriPK['day']}</strong> of <strong>{$hijriPK['month_name']}</strong> ({$hijriPK['month_urdu']}). This is the {$hijriPK['month']}th month of the Islamic Hijri year {$hijriPK['year']}."],
        ['q' => "Islamic calendar date today in Pakistan and Saudi Arabia?", 'a' => "Islamic date today in Pakistan is <strong>{$hijriPK['formatted']}</strong>. Islamic date today in Saudi Arabia is <strong>{$hijriSA['formatted']}</strong>. Pakistan and Saudi Arabia may differ by 1 day due to different moon sighting methods."],
        ['q' => "Is the Islamic calendar the same worldwide?", 'a' => "No, Islamic dates can differ by 1-2 days between countries. Pakistan follows local moon sighting by Ruet-e-Hilal Committee, while Saudi Arabia uses the Umm al-Qura calculated calendar. UAE, Kuwait, and other Gulf countries generally follow Saudi Arabia."],
        ['q' => "How is the Islamic calendar different from Gregorian?", 'a' => "The Islamic calendar is a <strong>lunar calendar</strong> with 354-355 days per year, while the Gregorian calendar is solar with 365-366 days. Islamic months begin with new crescent moon sighting, shifting Islamic dates about 10-11 days earlier each Gregorian year."],
    ];
    @endphp

    @include('islamic-calendar.partials._faq', ['faqs' => $faqs])
</section>

{{-- SEO CONTENT --}}
<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Calendar {{ $year }} — Complete Hijri Calendar Guide</h2>
        <p>The <strong>Islamic calendar {{ $year }}</strong> displays all 12 months with both Gregorian and Hijri dates. The current Islamic year is <strong>{{ $hijriPK['year'] }} AH</strong>, and today's Hijri date is <strong>{{ $hijriPK['formatted'] }}</strong>. This comprehensive <strong>Hijri calendar {{ $year }}</strong> helps Muslims track important Islamic dates including Ramadan, Eid ul-Fitr, Eid ul-Adha, Muharram, and other significant events throughout the year.</p>

        <p>Our <strong>Islamic calendar date today</strong> page covers the complete year with an interactive grid showing each day's corresponding Hijri date. The <strong>Islamic calendar {{ $year }} today date</strong> is dynamically updated based on Pakistan Standard Time (UTC+5). You can also view specific year archives by navigating to previous years like <a href="{{ url('/islamic-calendar/2025') }}">Islamic Calendar 2025</a> or <a href="{{ url('/islamic-calendar/2024') }}">Islamic Calendar 2024</a>.</p>

        <h3>About the Hijri Calendar</h3>
        <p>The <strong>Hijri calendar</strong> (Islamic calendar) began in 622 CE when Prophet Muhammad (PBUH) migrated from Makkah to Madinah. It is a purely lunar calendar with 12 months of 29 or 30 days each. Important months include <strong>Muharram</strong> (1st month, Ashura on 10th), <strong>Rabi al-Awwal</strong> (birth month of Prophet PBUH), <strong>Rajab</strong> (month of Isra and Miraj), <strong>Shaban</strong> (Shab-e-Barat on 15th), <strong>Ramadan</strong> (fasting month), and <strong>Dhu al-Hijjah</strong> (Hajj pilgrimage, Eid ul-Adha on 10th).</p>

        <h3>Islamic Calendar vs Gregorian Calendar</h3>
        <p>Since the Islamic year is approximately 10-11 days shorter than the Gregorian year, Islamic dates shift backward through the Gregorian calendar each year. This means Ramadan, Eid, and other Islamic events occur on different Gregorian dates every year. For <strong>{{ $year }}</strong>, the Hijri year spans approximately <strong>{{ $hijriPK['year'] }}</strong> AH, covering the Islamic months from Muharram to Dhu al-Hijjah.</p>
    </div>
</section>

<script>
function toggleFaq(id) {
    var el = document.getElementById(id);
    if (el) { el.classList.toggle('faq-open'); }
}
</script>
@endsection