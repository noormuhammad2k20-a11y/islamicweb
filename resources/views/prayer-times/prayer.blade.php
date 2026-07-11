@extends('layouts.app')

@section('seo')
<title>{{ $seoData['title'] }}</title>
<meta name="description" content="{{ $seoData['description'] }}">
<link rel="canonical" href="{{ $seoData['canonical'] }}">
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ $seoData['title'] }}",
  "description": "{{ $seoData['description'] }}",
  "url": "{{ $seoData['canonical'] }}"
}
</script>
@endsection

@section('content')
<style>
    :root { 
        --primary: #0F2942; /* Premium Deep Navy */
        --primary-light: #1A4066;
        --gold: #C5A059; /* Refined Gold */
        --gold-light: #E8D8B6;
        --bg-page: #F4F7F9; /* Professional SaaS-like Background */
        --text-main: #334155;
        --text-muted: #64748B;
        --border-color: rgba(15, 41, 66, 0.06);
    }
    
    body { background-color: var(--bg-page); font-family: 'Poppins', sans-serif; }
    .font-playfair { font-family: 'Playfair Display', serif; }
    
    /* 10-Column Grid Layout System */
    .container-10-col { 
        width: 90%; 
        max-width: 1500px; 
        margin: 0 auto; 
        padding: 40px 0 80px;
    }
    
    .grid-10 {
        display: grid;
        grid-template-columns: repeat(10, 1fr);
        gap: 30px;
        margin-bottom: 30px;
    }
    
    .col-7 { grid-column: span 7; }
    .col-3 { grid-column: span 3; }
    .col-10 { grid-column: span 10; }
    
    @media (max-width: 1100px) {
        .col-7, .col-3 { grid-column: span 10; }
        .grid-10 { gap: 20px; }
        .container-10-col { width: 95%; padding-top: 20px; }
    }

    /* Core UI Components */
    .app-card {
        background: #FFFFFF;
        border-radius: 24px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 24px rgba(15, 41, 66, 0.03);
        padding: 32px;
        position: relative;
        overflow: hidden;
    }
    
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: var(--primary);
        font-weight: 700;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    /* Hero Section (7 Columns) */
    .hero-card {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 48px;
    }
    .hero-card::after {
        content: ''; position: absolute; inset: 0; opacity: 0.05;
        background-image: radial-gradient(circle at 100% 100%, var(--gold) 2px, transparent 2px);
        background-size: 32px 32px; pointer-events: none;
    }
    .hero-breadcrumbs {
        display: flex; align-items: center; gap: 8px; font-size: 0.85rem;
        color: rgba(255,255,255,0.6); margin-bottom: 24px; flex-wrap: wrap;
    }
    .hero-breadcrumbs a { color: rgba(255,255,255,0.8); text-decoration: none; transition: color 0.2s;}
    .hero-breadcrumbs a:hover { color: var(--gold); }
    .hero-breadcrumbs .active { color: var(--gold); font-weight: 600; }
    .hero-title { font-size: 3.5rem; font-weight: 800; line-height: 1.1; margin-bottom: 16px; letter-spacing: -1px;}
    .hero-subtitle { font-size: 1.1rem; color: var(--gold-light); opacity: 0.9; font-weight: 500;}

    /* Timer / Next Prayer Card (3 Columns) */
    .timer-card {
        display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;
        border: 2px solid var(--gold); background: linear-gradient(to bottom, #ffffff, #fafaf9);
    }
    .timer-label { font-size: 0.85rem; text-transform: uppercase; letter-spacing: 2px; color: var(--text-muted); font-weight: 700; margin-bottom: 16px;}
    .timer-value { font-family: 'Playfair Display', serif; font-size: 4.5rem; font-weight: 800; color: var(--primary); line-height: 1; margin-bottom: 8px;}
    .timer-countdown { background: var(--primary); color: white; padding: 8px 24px; border-radius: 30px; font-family: monospace; font-size: 1.25rem; font-weight: 700; box-shadow: 0 4px 12px rgba(15,41,66,0.15);}

    /* Table Design */
    .table-responsive { overflow-x: auto; margin: 0 -32px -32px; padding: 0 32px 32px;}
    .data-table { width: 100%; border-collapse: collapse; min-width: 600px; text-align: left; }
    .data-table th { background: #F8FAFC; color: var(--text-muted); padding: 16px 20px; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; border-bottom: 2px solid #E2E8F0;}
    .data-table td { padding: 16px 20px; color: var(--text-main); border-bottom: 1px solid #F1F5F9; font-weight: 500;}
    .data-table tr:hover td { background: #F8FAFC; }
    .data-table .row-today td { background: rgba(197, 160, 89, 0.05); color: var(--primary); font-weight: 700; border-bottom: 1px solid rgba(197, 160, 89, 0.2); border-top: 1px solid rgba(197, 160, 89, 0.2);}
    .data-table .row-today td:first-child { border-left: 3px solid var(--gold); }

    /* Info Lists (Sunnah, Methodology) */
    .info-list { display: flex; flex-direction: column; gap: 12px; }
    .info-item { display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #F8FAFC; border-radius: 12px; border: 1px solid #E2E8F0;}
    .info-label { font-size: 0.85rem; font-weight: 600; color: var(--text-muted); }
    .info-val { font-weight: 700; color: var(--primary); font-size: 1.05rem;}
    .info-highlight { background: rgba(197, 160, 89, 0.1); border-color: rgba(197, 160, 89, 0.3); border-left: 4px solid var(--gold);}
    
    /* Tools Grid */
    .tools-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .tool-box { background: #F8FAFC; border: 1px solid #E2E8F0; padding: 20px; border-radius: 16px; text-align: center; text-decoration: none; transition: all 0.2s;}
    .tool-box:hover { background: var(--primary); border-color: var(--primary); transform: translateY(-3px);}
    .tool-icon { font-size: 1.8rem; margin-bottom: 8px; display: block; transition: transform 0.2s;}
    .tool-box:hover .tool-icon { transform: scale(1.1); }
    .tool-name { font-size: 0.8rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;}
    .tool-box:hover .tool-name { color: white; }

    /* Print Styles: Only Print Calendar (Fix Blank Pages) */
    @media print {
        /* Hide everything we don't want so it takes ZERO space */
        header, footer, nav, #navbar, .premium-breadcrumbs, .hero-card, .timer-card, .col-3 { display: none !important; }
        .app-card:not(#printable-calendar) { display: none !important; }
        
        /* Remove grid structures so the table flows naturally */
        .container-10-col, .grid-10, .col-7 {
            display: block !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #printable-calendar {
            display: block !important;
            margin: 0; padding: 0 !important;
            box-shadow: none !important; border: none !important; background: white !important;
        }
        
        .print-hide { display: none !important; }
        @page { size: A4 portrait; margin: 10mm; }
        
        /* Compress table to fit exactly 1 page */
        .section-title { font-size: 14pt !important; margin-bottom: 10px !important; margin-top: 0 !important; padding-top: 0 !important;}
        .data-table th, .data-table td {
            padding: 4px 8px !important;
            font-size: 9pt !important;
            line-height: 1.1 !important;
            border-bottom: 1px solid #ccc !important;
        }
        .data-table th { padding-top: 6px !important; padding-bottom: 6px !important; }
        .data-table .row-today td { border-bottom: 1px solid black !important; border-top: 1px solid black !important;}
        .table-responsive { margin: 0 !important; padding: 0 !important; overflow: visible !important; }
    }
</style>

<div class="container-10-col">
    
    {{-- Top Grid (Hero & Timer) --}}
    <div class="grid-10">
        {{-- Left Hero (7 Columns) --}}
        <div class="app-card hero-card col-7">
            <nav class="hero-breadcrumbs">
                <a href="/">Home</a>
                <span>/</span>
                <a href="/prayer-times">Prayer Times</a>
                <span>/</span>
                <a href="/prayer-times/{{ $citySlug }}">{{ $city->name }}</a>
                <span>/</span>
                <span class="active">{{ ucfirst($prayerName) }}</span>
            </nav>
            
            <h1 class="hero-title font-playfair">{{ ucfirst($prayerName) }} Prayer in {{ $name }}</h1>
            <p class="hero-subtitle">Complete schedule, calculation methodology, and virtues for {{ is_object($city->country) ? $city->country->name : $city->country }}.</p>
            
            <div style="display: flex; gap: 16px; margin-top: 32px; flex-wrap: wrap;">
                <div style="background: rgba(255,255,255,0.1); padding: 10px 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.2);">
                    <div style="font-size: 0.75rem; text-transform: uppercase; opacity: 0.7; margin-bottom: 4px;">Gregorian Date</div>
                    <div style="font-weight: 600;">{{ now($tz)->format('l, d F Y') }}</div>
                </div>
                <div style="background: rgba(255,255,255,0.1); padding: 10px 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.2);">
                    <div style="font-size: 0.75rem; text-transform: uppercase; opacity: 0.7; margin-bottom: 4px;">Islamic Date</div>
                    <div style="font-weight: 600;">{{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }}</div>
                </div>
            </div>
        </div>

        {{-- Right Timer (3 Columns) --}}
        <div class="app-card timer-card col-3">
            <div class="timer-label">Today's {{ ucfirst($prayerName) }}</div>
            <div class="timer-value">{{ $prayers[$prayerKey] ?? '--:--' }}</div>
            
            <div style="width: 100%; height: 1px; background: #E2E8F0; margin: 24px 0;"></div>
            
            <div class="timer-label" style="color: var(--primary);">Next Prayer: {{ $next['name'] }}</div>
            <div class="timer-countdown">{{ $next['countdown'] ?? '00:00:00' }}</div>
        </div>
    </div>

    {{-- Bottom Grid (Content & Sidebar) --}}
    <div class="grid-10">
        {{-- Left Content (7 Columns) --}}
        <div class="col-7" style="display: flex; flex-direction: column; gap: 30px;">
            
            {{-- Monthly Timetable --}}
            <div class="app-card" id="printable-calendar">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h2 class="section-title" style="margin-bottom: 0;">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="print-hide"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Monthly Timetable - {{ $name }}
                    </h2>
                    <button class="print-hide" onclick="window.print()" style="background: #F8FAFC; border: 1px solid #E2E8F0; padding: 8px 16px; border-radius: 8px; color: var(--primary); font-weight: 600; font-size: 0.85rem; cursor: pointer;">Print Month</button>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Day</th>
                                <th style="color: var(--primary);">{{ ucfirst($prayerName) }}</th>
                                @if(in_array($prayerName, ['fajr'])) <th>Sunrise</th> @endif
                                @if(in_array($prayerName, ['maghrib'])) <th>Isha</th> @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monthly as $day)
                            <tr class="{{ $day['is_today'] ? 'row-today' : '' }}">
                                <td>{{ $day['date'] }}</td>
                                <td>{{ substr($day['dow'], 0, 3) }}</td>
                                <td style="font-size: 1.1rem;">{{ $day[$prayerKey] ?? '--:--' }}</td>
                                @if(in_array($prayerName, ['fajr'])) <td>{{ $day['sunrise'] ?? '--:--' }}</td> @endif
                                @if(in_array($prayerName, ['maghrib'])) <td>{{ $day['isha'] ?? '--:--' }}</td> @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Dynamic / SEO Content --}}
            @if($prayerContent && $prayerContent->content)
                <div class="app-card prose max-w-none" style="line-height: 1.8; color: var(--text-main);">
                    {!! $prayerContent->content !!}
                </div>
            @else
                <div class="app-card">
                    <h2 class="section-title">
                        <svg width="24" height="24" fill="none" stroke="var(--gold)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        Virtues & Importance
                    </h2>
                    <p style="color: var(--text-main); line-height: 1.8; margin-bottom: 24px;">
                        The <strong>{{ ucfirst($prayerName) }}</strong> prayer is an obligatory (Fard) prayer and holds immense significance in the daily life of a Muslim. Establishing the five daily prayers is the second pillar of Islam and serves as a direct link between the believer and Allah (SWT).
                    </p>
                    <div style="background: #F8FAFC; border-left: 4px solid var(--gold); padding: 24px; border-radius: 0 12px 12px 0;">
                        <p style="font-family: 'Amiri', serif; font-size: 1.6rem; text-align: center; color: var(--primary); line-height: 2; margin-bottom: 12px;">فَاصْبِرْ عَلَىٰ مَا يَقُولُونَ وَسَبِّحْ بِحَمْدِ رَبِّكَ قَبْلَ طُلُوعِ الشَّمْسِ وَقَبْلَ غُرُوبِهَا</p>
                        <p style="text-align: center; color: var(--text-muted); font-size: 0.9rem;">"So be patient over what they say and exalt [Allah] with praise of your Lord before the rising of the sun and before its setting..." <br><strong>Surah Taha (20:130)</strong></p>
                    </div>
                </div>
            @endif
        </div>

        {{-- Right Sidebar (3 Columns) --}}
        <div class="col-3" style="display: flex; flex-direction: column; gap: 30px;">
            
            {{-- Sunnah Widget --}}
            <div class="app-card" style="padding: 24px;">
                <h3 class="section-title" style="font-size: 1.2rem;">Sunnah & Nafl</h3>
                <div class="info-list">
                    @if($prayerName == 'fajr')
                        <div class="info-item">
                            <span class="info-label">Before Fard</span>
                            <span class="info-val">2 Rakaat</span>
                        </div>
                    @elseif($prayerName == 'zuhr')
                        <div class="info-item">
                            <span class="info-label">Before Fard</span>
                            <span class="info-val">4 Rakaat</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">After Fard</span>
                            <span class="info-val">2 Rakaat</span>
                        </div>
                    @elseif($prayerName == 'asr')
                        <div class="info-item">
                            <span class="info-label">Before Fard</span>
                            <span class="info-val">4 Rakaat</span>
                        </div>
                    @elseif($prayerName == 'maghrib')
                        <div class="info-item">
                            <span class="info-label">After Fard</span>
                            <span class="info-val">2 Rakaat</span>
                        </div>
                    @elseif($prayerName == 'isha')
                        <div class="info-item">
                            <span class="info-label">Before Fard</span>
                            <span class="info-val">4 Rakaat</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">After Fard</span>
                            <span class="info-val">2 Rakaat</span>
                        </div>
                        <div class="info-item info-highlight">
                            <span class="info-label" style="color: #b45309;">Witr</span>
                            <span class="info-val" style="color: #b45309;">3 Rakaat</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Methodology Widget --}}
            <div class="app-card" style="padding: 24px; background: var(--primary); color: white; border: none;">
                <h3 class="section-title" style="font-size: 1.2rem; color: white;">Methodology</h3>
                <p style="font-size: 0.85rem; color: rgba(255,255,255,0.7); margin-bottom: 20px;">Calculated using the <strong>University of Islamic Sciences, Karachi</strong> method.</p>
                <div class="info-list">
                    <div class="info-item" style="background: rgba(255,255,255,0.1); border: none;">
                        <span class="info-label" style="color: rgba(255,255,255,0.8);">Angles</span>
                        <span class="info-val" style="color: white;">18° / 18°</span>
                    </div>
                    <div class="info-item" style="background: rgba(197, 160, 89, 0.2); border: 1px solid rgba(197, 160, 89, 0.4);">
                        <span class="info-label" style="color: var(--gold-light);">Qibla</span>
                        <span class="info-val" style="color: var(--gold-light);">{{ number_format($qibla ?? 0, 1) }}° N</span>
                    </div>
                </div>
            </div>

            {{-- Tools Widget --}}
            <div class="app-card" style="padding: 24px;">
                <h3 class="section-title" style="font-size: 1.2rem;">Quick Tools</h3>
                <div class="tools-grid">
                    <a href="/tools/qibla-direction" class="tool-box">
                        <span class="tool-icon">🧭</span>
                        <span class="tool-name">Qibla</span>
                    </a>
                    <a href="/digital-tasbeeh-counter" class="tool-box">
                        <span class="tool-icon">📿</span>
                        <span class="tool-name">Tasbeeh</span>
                    </a>
                    <a href="/ramadan-guide/calendar" class="tool-box">
                        <span class="tool-icon">📅</span>
                        <span class="tool-name">Ramadan</span>
                    </a>
                    <a href="/calculators/zakat" class="tool-box">
                        <span class="tool-icon">💰</span>
                        <span class="tool-name">Zakat</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
