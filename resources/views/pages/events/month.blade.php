@extends('layouts.app')

@section('title', $hijri_month->name_en . ' — Islamic Calendar & Historical Events')
@section('meta_description', 'Discover the historical events, significance, and detailed overview of the Islamic month of ' . $hijri_month->name_en . '.')

@section('content')
<style>
    /* VIP Aesthetic styling */
    .vip-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 40px;
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .vip-card:hover {
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
    }
    .month-hero {
        text-align: center;
        padding: 40px 0 30px;
    }
    .month-arabic {
        font-family: 'Amiri', serif;
        font-size: 4.5rem;
        color: var(--primary-dark);
        margin-bottom: 10px;
        line-height: 1;
        text-shadow: 0 2px 10px rgba(var(--primary-rgb), 0.05);
    }
    .month-english {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: #555;
        text-transform: uppercase;
        letter-spacing: 3px;
    }
    .calendar-wrapper {
        display: grid;
        /* Strictly 8 Column Grid as requested */
        grid-template-columns: repeat(8, 1fr);
        gap: 12px;
        margin-top: 25px;
    }
    @media (max-width: 768px) {
        .calendar-wrapper {
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }
    }
    @media (max-width: 480px) {
        .calendar-wrapper {
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }
    }
    .day-box {
        aspect-ratio: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 1.15rem;
        position: relative;
        transition: all 0.2s ease;
        border: 1px solid #f0f0f0;
        background: #fafafa;
        color: #444;
        cursor: default;
    }
    .day-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.06);
        border-color: rgba(var(--primary-rgb), 0.2);
        background: #fff;
    }
    .day-box.has-event {
        border-color: rgba(var(--primary-rgb), 0.4);
        background: rgba(var(--primary-rgb), 0.03);
        color: var(--primary-dark);
    }
    .day-box.is-today {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(var(--primary-rgb), 0.3);
    }
    .day-box.is-today .gregorian-text {
        color: rgba(255, 255, 255, 0.9) !important;
    }
    .day-box.is-today.has-event::after {
        background: white;
        box-shadow: 0 0 5px rgba(255,255,255, 0.8);
    }
    .day-box.has-event::after {
        content: '';
        position: absolute;
        bottom: 8px;
        width: 6px;
        height: 6px;
        background: var(--gold);
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(var(--gold-rgb), 0.5);
    }
    .event-card {
        display: flex;
        align-items: flex-start;
        gap: 25px;
        padding: 30px 0;
        border-bottom: 1px solid #f5f5f5;
    }
    .event-card:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    .event-date {
        background: linear-gradient(135deg, rgba(var(--primary-rgb), 0.05), rgba(var(--primary-rgb), 0.02));
        color: var(--primary-dark);
        min-width: 75px;
        text-align: center;
        padding: 15px 10px;
        border-radius: 14px;
        border: 1px solid rgba(var(--primary-rgb), 0.08);
    }
    .event-date .day {
        font-size: 2rem;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        line-height: 1;
        display: block;
    }
    .event-date .month-abbr {
        font-size: 0.8rem;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 1px;
        margin-top: 6px;
        display: block;
        color: var(--gold);
    }
    .event-details h4 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.3rem;
        color: var(--primary-dark);
        font-weight: 600;
        margin-bottom: 10px;
        margin-top: 0;
    }
    .event-details p {
        font-family: 'Inter', sans-serif;
        color: #555;
        line-height: 1.8;
        margin-bottom: 0;
        font-size: 1.05rem;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #fdfdfd;
        border-radius: 14px;
        border: 1px dashed #e0e0e0;
    }
    
    /* SEO Authority Content Block */
    .seo-authority-content {
        margin-top: 50px;
        padding-top: 40px;
        border-top: 1px solid #eee;
        font-family: 'Inter', sans-serif;
        color: #444;
        line-height: 1.8;
    }
    .seo-authority-content h2 {
        font-family: 'Poppins', sans-serif;
        color: var(--primary-dark);
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .seo-authority-content p {
        margin-bottom: 20px;
        font-size: 1.05rem;
    }
</style>

<section class="section" style="padding-top: 60px; padding-bottom: 60px; background-color: #fbfbfb;">
    <div class="container">
        
        <div class="breadcrumb" style="text-align: center; margin-bottom: 30px;">
            <div style="background: rgba(255,255,255,0.9); padding: 12px 30px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.03); font-size: 0.95rem; border: 1px solid rgba(0,0,0,0.02);">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none; font-weight: 500;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 12px;">/</span> 
                <a href="{{ route('events.index') }}" style="color: #888; text-decoration: none; font-weight: 500;">Islamic Calendar</a> 
                <span style="color: #ccc; margin: 0 12px;">/</span> 
                <span style="color: var(--primary-dark); font-weight: 600;">{{ $hijri_month->name_en }}</span>
            </div>
        </div>

        <div class="month-hero">
            <h1 class="month-arabic">{{ $hijri_month->name_ar }}</h1>
            <div class="month-english">{{ $hijri_month->name_en }} {{ $currentHijriYear ?? '' }}</div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                
                <div class="vip-card">
                    <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--primary-dark); margin-bottom: 20px; font-size: 1.4rem; text-align: center;">
                        <i class="fas fa-calendar-day" style="color: var(--gold); margin-right: 8px;"></i> Month Overview
                    </h3>
                    
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
                                    <div class="gregorian-text" style="font-size: 0.75rem; color: #888; margin-top: 4px; font-weight: 500; text-transform: uppercase;">
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
                    
                    <div style="margin-top: 30px; text-align: center; font-size: 0.95rem; color: #777; font-family: 'Inter', sans-serif; font-weight: 500;">
                        <span style="display: inline-block; width: 10px; height: 10px; background: var(--gold); border-radius: 50%; margin-right: 8px; box-shadow: 0 0 5px rgba(var(--gold-rgb), 0.5);"></span> 
                        Indicates a day with a recorded historical event
                    </div>
                </div>

                <div class="vip-card">
                    <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--primary-dark); margin-bottom: 30px; font-size: 1.4rem;">
                        <i class="fas fa-landmark" style="color: var(--primary); margin-right: 8px;"></i> Historical Events
                    </h3>

                    @if($hijri_month->events && $hijri_month->events->count() > 0)
                        <div class="events-list">
                            @foreach($hijri_month->events as $event)
                                <div class="event-card">
                                    <div class="event-date">
                                        <span class="day">{{ $event->day }}</span>
                                        <span class="month-abbr">{{ substr($hijri_month->name_en, 0, 3) }}</span>
                                    </div>
                                    <div class="event-details">
                                        <h4>{{ $event->title }}</h4>
                                        <p>{{ $event->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-scroll" style="font-size: 3.5rem; color: #eaeaea; margin-bottom: 20px;"></i>
                            <h4 style="font-family: 'Poppins', sans-serif; color: #777; font-weight: 500; margin-bottom: 10px;">No Events Found</h4>
                            <p style="color: #999; margin-bottom: 0;">We currently have no major historical events recorded for this specific month.</p>
                        </div>
                    @endif
                </div>

                <div class="vip-card seo-authority-content">
                    <h2>Significance of {{ $hijri_month->name_en }} in Islamic History</h2>
                    
                    <p>The month of <strong>{{ $hijri_month->name_en }}</strong> ({{ $hijri_month->name_ar }}) holds profound historical and spiritual significance within the Islamic lunar calendar. Operating within a completely lunar cycle, this month shifts by approximately 10 to 12 days each year relative to the Gregorian calendar, ensuring that the observation of its core events circulates through all seasons over a 33-year cycle.</p>
                    
                    <p>Historically, the designation of Islamic months was intrinsically linked to the climatic conditions and socio-economic activities of the pre-Islamic Arabian Peninsula. However, following the advent of Islam, the focus shifted from seasonal agriculture to spiritual development, communal obligations, and the remembrance of pivotal historical milestones that shaped the Muslim Ummah.</p>
                    
                    <p>Understanding the chronological context of {{ $hijri_month->name_en }} requires an appreciation of the Hijri calendar's structure, which was formally institutionalized during the caliphate of Umar ibn Al-Khattab (RA). The events recorded in this month—ranging from significant battles and treaties to the births and passing of notable scholars and companions—serve as crucial anchor points for Islamic historiography. By exploring these dynamic records, researchers and practicing Muslims alike gain deeper insights into the resilience, socio-political dynamics, and theological developments of early Islamic society.</p>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection