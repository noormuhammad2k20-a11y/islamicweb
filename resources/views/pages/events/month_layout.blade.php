@extends('layouts.app')

@section('title', $hijri_month->name_en . ' (' . $hijri_month->name_ar . ') ' . ($currentHijriYear ?? '') . ' — Islamic Calendar & Historical Events')
@section('meta_description', 'Complete guide to ' . $hijri_month->name_en . '. Explore its historical significance, timeline, and the 30-day Hijri calendar.')

@section('seo_head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@@type": "ListItem",
      "position": 2,
      "name": "Islamic Events",
      "item": "{{ route('events.index') }}"
    },
    {
      "@@type": "ListItem",
      "position": 3,
      "name": "{{ $hijri_month->name_en }}"
    }
  ]
}
</script>
@endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap');

    :root {
        --primary: #145DA0;
        --primary-dark: #0C3D6E;
        --primary-light: #3D8FD1;
        --primary-subtle: rgba(20,93,160,0.06);
        --secondary: #F5F8F7;
        --secondary-light: #FBFDFC;
        --gold: #B8863B;
        --gold-dark: #8A642B;
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

    .n-page * { box-sizing: border-box; }
    .n-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); -webkit-font-smoothing: antialiased; }

    .n-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .n-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .n-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .n-breadcrumb a:hover { color: var(--primary-dark); }
    .n-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .n-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .n-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 70px 0; text-align: center; overflow: hidden; }
    .n-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .n-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .n-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .n-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .n-hero .arabic-title { font-family: 'Amiri', serif; font-size: 4.5rem; color: var(--gold-light); display: block; margin-bottom: 5px; text-shadow: 0 4px 15px rgba(0,0,0,0.2); }
    .n-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .n-grid-section { padding: 60px 0 90px; }
    .n-grid-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }

    .guides-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 40px; }

    .guide-card { background: var(--white); border-radius: var(--radius-lg); padding: 18px 20px; border: 1px solid rgba(20,93,160,0.08); transition: var(--tr); display: flex; flex-direction: column; text-decoration: none; position: relative; overflow: hidden; box-shadow: var(--shadow-sm); }
    .guide-card:hover { transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0,0,0,0.04); border-color: rgba(20,93,160,0.15); }
    .guide-card::before { content: ''; position: absolute; left: 0; top: 0; width: 3px; height: 100%; background: var(--primary); transition: var(--tr); opacity: 0; }
    .guide-card:hover::before { opacity: 1; }
    
    .g-header { display: flex; align-items: center; gap: 12px; margin-bottom: 8px; }
    .g-icon { width: 42px; height: 42px; border-radius: 10px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; transition: var(--tr); }
    
    .g-title { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 700; color: var(--primary-dark); margin: 0; }
    .g-desc { font-size: 0.95rem; font-weight: 500; color: var(--text-medium); line-height: 1.4; flex-grow: 1; margin: 0; }

    .content-layout { display: grid; grid-template-columns: 2.5fr 1fr; gap: 40px; }
    @media (max-width: 991px) { .content-layout { grid-template-columns: 1fr; } }
    
    .article-box { background: var(--white); border-radius: var(--radius-lg); padding: 40px; border: 1px solid rgba(20,93,160,0.08); box-shadow: var(--shadow-sm); margin-bottom: 40px; }
    .article-box h2 { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 1px solid rgba(20,93,160,0.1); }
    .article-box h3 { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--primary); font-weight: 700; margin-top: 30px; margin-bottom: 15px; }
    .article-box p { color: var(--text-medium); line-height: 1.8; font-size: 1.05rem; margin-bottom: 20px; }
    .article-box ul { color: var(--text-medium); line-height: 1.8; font-size: 1.05rem; margin-bottom: 20px; }

    /* Calendar Grid */
    .calendar-wrapper { display: grid; grid-template-columns: repeat(7, 1fr); gap: 12px; margin-top: 25px; }
    @media (max-width: 768px) { .calendar-wrapper { grid-template-columns: repeat(5, 1fr); } }
    @media (max-width: 480px) { .calendar-wrapper { grid-template-columns: repeat(4, 1fr); gap: 8px; } }
    .day-box { aspect-ratio: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 10px; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.15rem; border: 1px solid rgba(20,93,160,0.1); background: var(--secondary-light); transition: var(--tr); }
    .day-box.has-event { background: var(--primary-subtle); color: var(--primary-dark); border-color: rgba(20,93,160,0.3); }
    .day-box.is-today { background: var(--primary); color: var(--white); border-color: var(--primary); box-shadow: 0 4px 15px rgba(20,93,160, 0.3); transform: translateY(-2px); }

    /* Event Cards */
    .event-card { display: flex; align-items: flex-start; gap: 20px; padding: 25px 0; border-bottom: 1px solid rgba(20,93,160,0.08); }
    .event-card:last-child { border-bottom: none; padding-bottom: 0; }
    .event-date { background: var(--primary-subtle); color: var(--primary-dark); min-width: 75px; text-align: center; padding: 15px 10px; border-radius: 14px; border: 1px solid rgba(20,93,160,0.1); }
    .event-date .day { font-size: 2rem; font-weight: 700; font-family: 'Poppins', sans-serif; line-height: 1; display: block; }
    .event-date .month-abbr { font-size: 0.8rem; text-transform: uppercase; font-weight: 600; letter-spacing: 1px; margin-top: 6px; display: block; color: var(--primary); }
    .event-details h4 { font-family: 'Poppins', sans-serif; font-size: 1.25rem; color: var(--primary-dark); font-weight: 600; margin-bottom: 8px; margin-top: 0; }
    .event-details p { color: var(--text-medium); line-height: 1.6; margin-bottom: 0; font-size: 1rem; }
    .empty-state { text-align: center; padding: 50px 20px; background: var(--secondary-light); border-radius: 14px; border: 1px dashed rgba(20,93,160,0.2); }

    .sidebar-widget { background: var(--white); border-radius: var(--radius-lg); padding: 30px; border: 1px solid rgba(20,93,160,0.08); box-shadow: var(--shadow-sm); margin-bottom: 30px; }
    .sidebar-widget h4 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px; }

    /* Modern FAQ Styling */
    .modern-faq .accordion-item { border: none; background: var(--secondary-light); border-radius: 12px !important; margin-bottom: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.02); transition: var(--tr); overflow: hidden; }
    .modern-faq .accordion-item:hover { box-shadow: 0 4px 15px rgba(20,93,160,0.08); transform: translateY(-2px); }
    .modern-faq .accordion-button { background: transparent; font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--primary-dark); font-size: 1.1rem; padding: 20px 24px; box-shadow: none; transition: var(--tr); }
    .modern-faq .accordion-button:not(.collapsed) { background: var(--primary); color: var(--white); }
    .modern-faq .accordion-button:not(.collapsed)::after { filter: brightness(0) invert(1); }
    .modern-faq .accordion-body { font-size: 1.05rem; color: var(--text-medium); line-height: 1.8; padding: 20px 24px; background: var(--white); border-top: 1px solid rgba(20,93,160,0.05); }

    /* Modern Sidebar Links */
    .month-link { display: flex; align-items: center; padding: 14px 18px; color: var(--text-medium); text-decoration: none; border-radius: 10px; margin-bottom: 8px; transition: var(--tr); font-weight: 500; background: var(--white); border: 1px solid transparent; }
    .month-link:hover { background: var(--secondary); color: var(--primary); transform: translateX(5px); border-color: rgba(20,93,160,0.1); }
    .month-link.active { background: var(--primary-subtle); color: var(--primary); border: 1px solid rgba(20,93,160,0.2); font-weight: 600; box-shadow: 0 4px 10px rgba(20,93,160,0.05); }
    .month-link .m-num { width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center; background: rgba(20,93,160,0.05); color: var(--primary); border-radius: 50%; font-size: 0.85rem; margin-right: 12px; font-weight: 700; transition: var(--tr); }
    .month-link.active .m-num { background: var(--primary); color: var(--white); }
    .month-link .m-icon { margin-left: auto; font-size: 0.9rem; opacity: 0; transition: var(--tr); transform: translateX(-10px); }
    .month-link:hover .m-icon { opacity: 1; transform: translateX(0); }
    .month-link.active .m-icon { opacity: 1; transform: translateX(0); color: var(--primary); }

    /* Modern Related Tools */
    .tool-card { display: flex; align-items: center; text-decoration: none; padding: 16px; background: var(--secondary-light); border: 1px solid rgba(20,93,160,0.08); border-radius: 12px; margin-bottom: 12px; transition: var(--tr); position: relative; overflow: hidden; }
    .tool-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(20,93,160,0.08); border-color: var(--primary-light); background: var(--white); }
    .tool-icon { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-right: 16px; flex-shrink: 0; transition: var(--tr); }
    .tool-card:hover .tool-icon { transform: scale(1.1) rotate(-5deg); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    .tool-info { flex-grow: 1; }
    .tool-info h5 { margin: 0; font-family: 'Poppins', sans-serif; font-size: 1.05rem; font-weight: 600; color: var(--primary-dark); transition: var(--tr); }
    .tool-card:hover .tool-info h5 { color: var(--primary); }
    .tool-info small { color: var(--text-light); font-size: 0.85rem; display: block; margin-top: 2px; }
    .tool-arrow { color: rgba(20,93,160,0.2); transition: var(--tr); }
    .tool-card:hover .tool-arrow { color: var(--primary); transform: translateX(3px); }
</style>

<div class="n-page">
    <div class="n-breadcrumb">
        <div class="n-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right n-breadcrumb-sep"></i>
            <a href="{{ route('events.index') }}">Islamic Calendar</a>
            <i class="fas fa-chevron-right n-breadcrumb-sep"></i>
            <span class="n-breadcrumb-current">{{ $hijri_month->name_en }}</span>
        </div>
    </div>

    @php
        $startDate = '';
        $endDate = '';
        if(isset($calendarDates) && $calendarDates->count() > 0) {
            $first = $calendarDates->first();
            $last = $calendarDates->last();
            $startDate = \Carbon\Carbon::parse($first->gregorian_date)->format('d M Y');
            $endDate = \Carbon\Carbon::parse($last->gregorian_date)->format('d M Y');
        }
    @endphp

    <section class="n-hero">
        <div class="n-hero-inner">
            <h1><span class="arabic-title">{{ $hijri_month->name_ar }}</span>{{ $hijri_month->name_en }} {{ $currentHijriYear ?? '' }}</h1>
            
            <p>{{ $hijri_month->significance_content ?? 'A month of spiritual significance in the Islamic Hijri Calendar.' }}</p>
            @if($startDate)
                <p style="font-weight: 600; margin-top: 15px; color: var(--gold-light);"><i class="fas fa-calendar-alt"></i> {{ $startDate }} — {{ $endDate }}</p>
            @endif
        </div>
    </section>

    <section class="n-grid-section">
        <div class="n-grid-inner">
            
            <!-- Quick Info Cards -->
            <div class="guides-grid">
                <div class="guide-card">
                    <div class="g-header">
                        <div class="g-icon"><i class="fas fa-list-ol"></i></div>
                        <div><h3 class="g-title">Position</h3></div>
                    </div>
                    <div class="g-desc">{{ $hijri_month->month_number }}{{ in_array($hijri_month->month_number, [1,21,31]) ? 'st' : (in_array($hijri_month->month_number, [2,22]) ? 'nd' : (in_array($hijri_month->month_number, [3,23]) ? 'rd' : 'th')) }} Islamic Month</div>
                </div>
                
                <div class="guide-card">
                    <div class="g-header">
                        <div class="g-icon"><i class="fas fa-moon"></i></div>
                        <div><h3 class="g-title">Total Days</h3></div>
                    </div>
                    <div class="g-desc">29 or 30 Days</div>
                </div>

                <div class="guide-card">
                    <div class="g-header">
                        <div class="g-icon"><i class="fas fa-history"></i></div>
                        <div><h3 class="g-title">Events</h3></div>
                    </div>
                    <div class="g-desc">{{ $stats['total_events'] ?? 0 }} Recorded Events</div>
                </div>
                
                <div class="guide-card">
                    <div class="g-header">
                        <div class="g-icon"><i class="fas fa-mosque"></i></div>
                        <div><h3 class="g-title">Sacred Status</h3></div>
                    </div>
                    <div class="g-desc">{{ in_array($hijri_month->month_number, [1, 7, 11, 12]) ? 'Sacred (Haram)' : 'Standard' }}</div>
                </div>
                
                <div class="guide-card" style="grid-column: 1 / -1;">
                    <div class="g-header">
                        <div class="g-icon"><i class="fas fa-star-and-crescent"></i></div>
                        <div><h3 class="g-title">Significance</h3></div>
                    </div>
                    <div class="g-desc">{{ Str::limit($hijri_month->significance_content ?? 'Significant month in Islamic history.', 120) }}</div>
                </div>
            </div>

            <!-- Main Layout -->
            <div class="content-layout">
                <div class="main-content">
                    
                    <div class="article-box">
                        @section('unique_significance')
                        <h2>Significance of {{ $hijri_month->name_en }} in Islamic History</h2>
                        <p>The month of <strong>{{ $hijri_month->name_en }}</strong> ({{ $hijri_month->name_ar }}) holds profound historical and spiritual significance within the Islamic lunar calendar. Operating within a completely lunar cycle, this month shifts by approximately 10 to 12 days each year relative to the Gregorian calendar, ensuring that the observation of its core events circulates through all seasons over a 33-year cycle.</p>
                        
                        <p>Historically, the designation of Islamic months was intrinsically linked to the climatic conditions and socio-economic activities of the pre-Islamic Arabian Peninsula. However, following the advent of Islam, the focus shifted from seasonal agriculture to spiritual development, communal obligations, and the remembrance of pivotal historical milestones that shaped the Muslim Ummah.</p>
                        
                        <p>Understanding the chronological context of {{ $hijri_month->name_en }} requires an appreciation of the Hijri calendar's structure, which was formally institutionalized during the caliphate of Umar ibn Al-Khattab (RA). The events recorded in this month—ranging from significant battles and treaties to the births and passing of notable scholars and companions—serve as crucial anchor points for Islamic historiography.</p>
                        @show
                    </div>

                    <!-- Featured Historical Event -->
                    @if(isset($featuredEvent) && $featuredEvent)
                    <div class="article-box" style="border-left: 4px solid var(--gold-light);">
                        <h2 style="color: var(--gold-dark); margin-bottom: 15px;"><i class="fas fa-star" style="font-size:1.5rem;"></i> Featured: {{ $featuredEvent->title }}</h2>
                        <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 20px;">
                            <span style="display:inline-block; font-weight:600; color:var(--primary); background:var(--primary-subtle); padding: 5px 12px; border-radius: 6px; font-size: 0.9rem;">
                                <i class="fas fa-calendar"></i> {{ $featuredEvent->hijri_day }} {{ $hijri_month->name_en }}
                            </span>
                            @if($featuredEvent->category)
                                <span style="display:inline-block; font-weight:600; color:var(--gold-dark); background:rgba(184,134,59,0.1); padding: 5px 12px; border-radius: 6px; font-size: 0.9rem;">
                                    <i class="fas fa-tag"></i> {{ $featuredEvent->category }}
                                </span>
                            @endif
                            @if($featuredEvent->location)
                                <span style="display:inline-block; font-weight:600; color:var(--text-medium); background:var(--secondary); padding: 5px 12px; border-radius: 6px; font-size: 0.9rem;">
                                    <i class="fas fa-map-marker-alt"></i> {{ $featuredEvent->location }}{{ $featuredEvent->country ? ', '.$featuredEvent->country : '' }}
                                </span>
                            @endif
                        </div>
                        
                        @if($featuredEvent->historical_context)
                            <h3 style="margin-top: 20px; font-size: 1.2rem;">Historical Context</h3>
                            <p>{{ $featuredEvent->historical_context }}</p>
                        @endif
                        
                        <h3 style="margin-top: 20px; font-size: 1.2rem;">Detailed History</h3>
                        <p>{{ $featuredEvent->full_history ?? $featuredEvent->description }}</p>
                        
                        @if($featuredEvent->lessons)
                            <div style="background: var(--secondary-light); padding: 20px; border-radius: 12px; border: 1px solid rgba(20,93,160,0.1); margin-top:25px;">
                                <h4 style="font-family:'Poppins', sans-serif; font-size:1.15rem; color:var(--primary-dark); margin-bottom: 10px; margin-top: 0;"><i class="fas fa-lightbulb" style="color:var(--gold-dark);"></i> Lessons & Wisdom</h4>
                                <p style="margin-bottom:0; font-size:1rem; color:var(--text-medium);">{{ $featuredEvent->lessons }}</p>
                            </div>
                        @endif
                    </div>
                    @endif

                    <div class="article-box">
                        <h2>{{ $hijri_month->name_en }} Calendar {{ $currentHijriYear ?? '' }}</h2>
                        <p>The interactive Hijri calendar for the month of {{ $hijri_month->name_en }}. Dates highlighted indicate a recorded historical event.</p>
                        
                        @php
                            $eventDays = $hijri_month->events ? $hijri_month->events->pluck('day')->toArray() : [];
                        @endphp
                        
                        <div class="calendar-wrapper">
                            @if(isset($calendarDates) && $calendarDates->count() > 0)
                                @foreach($calendarDates as $date)
                                    @php
                                        $hasEvent = in_array($date->hijri_day, $eventDays);
                                        $isToday = $date->gregorian_date === date('Y-m-d');
                                    @endphp
                                    <div class="day-box {{ $hasEvent ? 'has-event' : '' }} {{ $isToday ? 'is-today' : '' }}" title="{{ $hasEvent ? 'Event recorded on this day' : $date->gregorian_date }}">
                                        <div style="font-size: 1.3rem; line-height: 1;">{{ $date->hijri_day }}</div>
                                        <div style="font-size: 0.75rem; color: #888; margin-top: 4px; text-transform: uppercase;">
                                            {{ \Carbon\Carbon::parse($date->gregorian_date)->format('d M') }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @for($i = 1; $i <= 30; $i++)
                                    @php
                                        $hasEvent = in_array($i, $eventDays);
                                    @endphp
                                    <div class="day-box {{ $hasEvent ? 'has-event' : '' }}" title="{{ $hasEvent ? 'Event recorded on this day' : 'Day ' . $i }}">
                                        {{ $i }}
                                    </div>
                                @endfor
                            @endif
                        </div>
                        <div style="margin-top: 20px; text-align: center; font-size: 0.95rem; color: var(--text-light); font-family: 'Poppins', sans-serif; font-weight: 500;">
                            <span style="display: inline-block; width: 10px; height: 10px; background: var(--primary-subtle); border: 1px solid rgba(20,93,160,0.3); border-radius: 50%; margin-right: 8px;"></span> 
                            Indicates a day with a recorded historical event
                        </div>
                    </div>

                    <!-- Chronological Timeline -->
                    @if(isset($eventsByDate) && $eventsByDate->count() > 0)
                    <div class="article-box">
                        <h2>Chronological Timeline</h2>
                        <p>Day-by-day breakdown of major milestones occurring in {{ $hijri_month->name_en }}.</p>
                        
                        <div class="events-list mt-4">
                            @foreach($eventsByDate as $day => $eventsForDay)
                                <h3 style="border-bottom: 2px solid rgba(20,93,160,0.1); padding-bottom: 12px; margin-top: 35px; font-size: 1.3rem;">
                                    <i class="fas fa-calendar-day" style="color:var(--primary); margin-right:8px;"></i> {{ $day }} {{ $hijri_month->name_en }}
                                </h3>
                                @foreach($eventsForDay as $event)
                                    <div class="event-card" style="padding: 18px 0;">
                                        <div class="event-details" style="width: 100%;">
                                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                                                <h4 style="margin: 0; font-size: 1.15rem;">{{ $event->title }}</h4>
                                                @if($event->category)
                                                    <span style="font-size:0.75rem; background:var(--primary-subtle); color:var(--primary-dark); padding:4px 10px; border-radius:20px; font-weight:600; white-space: nowrap;">{{ $event->category }}</span>
                                                @endif
                                            </div>
                                            <p style="font-size: 0.95rem; color: var(--text-medium); margin-bottom: 6px;">{{ $event->description }}</p>
                                            
                                            <div style="display:flex; gap: 15px; font-size:0.8rem; color:var(--text-light); margin-top:10px;">
                                                @if($event->location)
                                                    <span><i class="fas fa-map-marker-alt" style="color:var(--gold-dark);"></i> {{ $event->location }}</span>
                                                @endif
                                                @if($event->dynasty)
                                                    <span><i class="fas fa-flag" style="color:var(--primary-light);"></i> {{ $event->dynasty }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="article-box">
                        <h2>Historical Events in {{ $hijri_month->name_en }}</h2>
                        <div class="empty-state mt-4">
                            <i class="fas fa-scroll" style="font-size: 3.5rem; color: rgba(20,93,160,0.1); margin-bottom: 20px;"></i>
                            <h4 style="font-family: 'Poppins', sans-serif; color: var(--text-medium); font-weight: 500; margin-bottom: 10px;">No Events Found</h4>
                            <p style="color: var(--text-light); margin-bottom: 0;">We currently have no major historical events recorded for this specific month.</p>
                        </div>
                    </div>
                    @endif

                    <!-- Events by Category -->
                    @if(isset($eventsByCategory) && $eventsByCategory->count() > 0)
                    <div class="article-box">
                        <h2>Events by Category</h2>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 25px;">
                            @php $catIndex = 0; @endphp
                            @foreach($eventsByCategory as $category => $catEvents)
                                <button onclick="showCategory('{{ Str::slug($category) }}')" id="btn-{{ Str::slug($category) }}" class="category-btn {{ $catIndex === 0 ? 'active' : '' }}" style="font-family:'Poppins', sans-serif; font-size:0.95rem; font-weight:600; color: {{ $catIndex === 0 ? 'var(--white)' : 'var(--primary-dark)' }}; border: 1px solid rgba(20,93,160,0.2); background: {{ $catIndex === 0 ? 'var(--primary)' : 'var(--secondary-light)' }}; padding: 8px 18px; border-radius: 30px; cursor: pointer; transition: var(--tr);">
                                    {{ $category }} <span style="background: {{ $catIndex === 0 ? 'rgba(255,255,255,0.2)' : 'rgba(20,93,160,0.1)' }}; padding: 2px 6px; border-radius: 10px; font-size: 0.8rem; margin-left: 6px;">{{ $catEvents->count() }}</span>
                                </button>
                                @php $catIndex++; @endphp
                            @endforeach
                        </div>

                        <div id="categoryTabContent">
                            @php $catIndex = 0; @endphp
                            @foreach($eventsByCategory as $category => $catEvents)
                                <div class="category-pane" id="pane-{{ Str::slug($category) }}" style="display: {{ $catIndex === 0 ? 'block' : 'none' }};">
                                    <div class="events-list">
                                        @foreach($catEvents as $event)
                                            <div class="event-card" style="padding: 15px 0;">
                                                <div class="event-date" style="min-width: 65px; padding: 10px 8px;">
                                                    <span class="day" style="font-size: 1.5rem;">{{ $event->hijri_day }}</span>
                                                </div>
                                                <div class="event-details">
                                                    <h4 style="font-size: 1.1rem; margin-bottom: 4px;">{{ $event->title }}</h4>
                                                    <p style="font-size: 0.95rem;">{{ $event->description }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @php $catIndex++; @endphp
                            @endforeach
                        </div>
                    </div>
                    <script>
                        function showCategory(slug) {
                            document.querySelectorAll('.category-pane').forEach(el => el.style.display = 'none');
                            document.querySelectorAll('.category-btn').forEach(el => {
                                el.style.background = 'var(--secondary-light)';
                                el.style.color = 'var(--primary-dark)';
                                el.querySelector('span').style.background = 'rgba(20,93,160,0.1)';
                            });
                            
                            document.getElementById('pane-' + slug).style.display = 'block';
                            let btn = document.getElementById('btn-' + slug);
                            btn.style.background = 'var(--primary)';
                            btn.style.color = 'var(--white)';
                            btn.querySelector('span').style.background = 'rgba(255,255,255,0.2)';
                        }
                    </script>
                    @endif

                    <!-- Quran & Hadith References -->
                    @if(isset($featuredEvent) && (!empty($featuredEvent->quran_references) || !empty($featuredEvent->hadith_references)))
                    <div class="article-box">
                        <h2>Authentic References</h2>
                        <p>Key scriptural mentions and ahadith associated with events in this month.</p>
                        
                        @if(!empty($featuredEvent->quran_references))
                            <h3 style="margin-top: 25px;"><i class="fas fa-book-open" style="color:var(--gold-dark); margin-right:8px;"></i> Quranic Context</h3>
                            @foreach($featuredEvent->quran_references as $quran)
                                <div style="background: var(--secondary-light); padding: 25px; border-radius: 12px; margin-bottom: 20px; border-right: 4px solid var(--primary);">
                                    <p style="font-family: 'Amiri', serif; font-size: 2rem; text-align: right; color: var(--text-dark); margin-bottom: 20px; line-height: 2;">{{ $quran['text'] ?? '' }}</p>
                                    <p style="font-size: 1.05rem; color: var(--text-medium); font-style: italic; margin-bottom: 12px;">"{{ $quran['translation'] ?? 'Translation not available.' }}"</p>
                                    <span style="font-weight: 600; color: var(--primary); font-size: 0.95rem; background: rgba(20,93,160,0.06); padding: 6px 14px; border-radius: 8px; display: inline-block;">— Surah {{ $quran['surah'] ?? '' }}, Ayah {{ $quran['ayah'] ?? '' }}</span>
                                </div>
                            @endforeach
                        @endif

                        @if(!empty($featuredEvent->hadith_references))
                            <h3 style="margin-top: 35px;"><i class="fas fa-scroll" style="color:var(--gold-dark); margin-right:8px;"></i> Authentic Hadith</h3>
                            @foreach($featuredEvent->hadith_references as $hadith)
                                <div style="background: var(--white); padding: 20px; border-radius: 12px; margin-bottom: 15px; border-left: 4px solid var(--gold-dark); border: 1px solid rgba(20,93,160,0.08); box-shadow: var(--shadow-sm);">
                                    <p style="font-size: 1.05rem; color: var(--text-medium); margin-bottom: 15px; line-height: 1.7;">{{ $hadith['text'] ?? '' }}</p>
                                    <span style="display:inline-block; font-weight: 600; color: var(--gold-dark); font-size: 0.9rem; background:rgba(184,134,59,0.1); padding: 5px 12px; border-radius: 6px;">{{ $hadith['book'] ?? '' }} ({{ $hadith['grading'] ?? '' }})</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    @endif

                    <!-- Events by Dynasty -->
                    @if(isset($eventsByDynasty) && $eventsByDynasty->count() > 0)
                    <div class="article-box">
                        <h2>Events by Historical Era (Dynasty)</h2>
                        <div class="events-list mt-4">
                            @foreach($eventsByDynasty as $dynasty => $dynastyEvents)
                                <h3 style="border-bottom: 2px solid rgba(20,93,160,0.1); padding-bottom: 12px; margin-top: 30px; font-size: 1.3rem;">
                                    <i class="fas fa-flag" style="color:var(--primary); margin-right:8px;"></i> {{ $dynasty }} Era
                                </h3>
                                @foreach($dynastyEvents as $event)
                                    <div class="event-card" style="padding: 15px 0;">
                                        <div class="event-details">
                                            <h4 style="font-size: 1.1rem; margin-bottom: 4px;">{{ $event->title }}</h4>
                                            <p style="font-size: 0.95rem;">{{ $event->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Important Personalities -->
                    @if(isset($featuredEvent) && !empty($featuredEvent->related_personalities))
                    <div class="article-box">
                        <h2>Important Personalities</h2>
                        <div class="guides-grid mt-4">
                            @foreach($featuredEvent->related_personalities as $person)
                            <div class="guide-card">
                                <div class="g-header">
                                    <div class="g-icon" style="background: rgba(184,134,59,0.1); color: var(--gold-dark);"><i class="fas fa-user-tie"></i></div>
                                    <div><h3 class="g-title">{{ $person['name'] ?? '' }}</h3></div>
                                </div>
                                <div class="g-desc">
                                    <p style="margin-bottom: 5px;"><strong>Role:</strong> {{ $person['role'] ?? '' }}</p>
                                    @if(isset($person['born']) || isset($person['died']))
                                        <p style="margin-bottom: 0; font-size: 0.85rem; color: var(--text-light);">{{ $person['born'] ?? '?' }} – {{ $person['died'] ?? '?' }}</p>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="article-box">
                        @section('unique_worship')
                        <h2>Recommended Worship & Sunnah Acts</h2>
                        <p>Based on the practice of the Prophet Muhammad (ï·º) and his companions.</p>
                        <ul style="list-style-type: none; padding-left: 0;">
                            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting the White Days:</strong> The 13th, 14th, and 15th of the lunar month.</li>
                            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Increased Dhikr:</strong> Remembering Allah frequently.</li>
                            <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Charity:</strong> Giving Sadaqah is always recommended.</li>
                        </ul>
                        @show
                    </div>

                    <div class="article-box">
                        @section('unique_misconceptions')
                        <h2>Misconceptions & Clarifications</h2>
                        <div class="accordion modern-faq mt-4" id="misconceptionsFaq">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="mFaqOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                                        Are there specific mandatory fasts for {{ $hijri_month->name_en }}?
                                    </button>
                                </h2>
                                <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
                                    <div class="accordion-body">
                                        No authentic narrations specify mandatory fasts unique to this month. Voluntary fasting is encouraged, especially during the 'White Days' (13th, 14th, 15th), but isolating this month for specific acts of worship without evidence is considered an innovation.
                                    </div>
                                </div>
                            </div>
                        </div>
                        @show
                    </div>

                    <div class="article-box">
                        @section('unique_faqs')
                        <h2>Frequently Asked Questions</h2>
                        
                        <div class="accordion modern-faq mt-4" id="monthFaq">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        What is the significance of {{ $hijri_month->name_en }}?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
                                    <div class="accordion-body">
                                        {{ $hijri_month->significance_content ?? 'This month holds significance in Islamic history and marks important events and periods in the Hijri calendar.' }}
                                    </div>
                                </div>
                            </div>
    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                        How many days are in {{ $hijri_month->name_en }}?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
                                    <div class="accordion-body">
                                        Like all Islamic months, {{ $hijri_month->name_en }} consists of 29 or 30 days, depending on the sighting of the new moon.
                                    </div>
                                </div>
                            </div>
                        </div>
                        @show
                    </div>

                </div>

                <div class="sidebar">
                    
                    <div class="sidebar-widget">
                        <h4>Islamic Months</h4>
                        <div class="months-nav">
                            @php
                                $allMonths = \App\Models\HijriMonth::orderBy('month_number')->get();
                            @endphp
                            @foreach($allMonths as $m)
                                <a href="{{ url('/islamic-events/'.$m->slug) }}" class="month-link {{ $hijri_month->slug == $m->slug ? 'active' : '' }}">
                                    <div><span class="m-num">{{ $m->month_number }}</span> {{ $m->name_en }}</div>
                                    @if($hijri_month->slug == $m->slug)
                                        <i class="fas fa-check m-icon"></i>
                                    @else
                                        <i class="fas fa-arrow-right m-icon"></i>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget">
                        <h4>Related Tools</h4>
                        
                        <div class="tools-list">
                            <a href="{{ url('/prayer-times') }}" class="tool-card">
                                <div class="tool-icon" style="background: var(--primary-subtle); color: var(--primary);">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="tool-info">
                                    <h5>Prayer Times</h5>
                                    <small>Accurate daily namaz</small>
                                </div>
                                <i class="fas fa-chevron-right tool-arrow"></i>
                            </a>
                            
                            <a href="{{ url('/islamic-date-today') }}" class="tool-card">
                                <div class="tool-icon" style="background: rgba(184,134,59,0.1); color: var(--gold-dark);">
                                    <i class="fas fa-calendar-day"></i>
                                </div>
                                <div class="tool-info">
                                    <h5>Islamic Date</h5>
                                    <small>Today's Hijri date</small>
                                </div>
                                <i class="fas fa-chevron-right tool-arrow"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
