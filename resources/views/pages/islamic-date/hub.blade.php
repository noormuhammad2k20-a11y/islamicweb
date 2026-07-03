@extends('layouts.app')

@php
$titleHijri = isset($globalDate) ? $globalDate->hijri_day . ' ' . $globalDate->hijri_month . ' ' . $globalDate->hijri_year . ' AH' : '';
@endphp

@section('content')
<style>
    /* Premium Page Styles */
    .page-header {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-bottom: 4px solid var(--gold);
    }
    .page-header::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.1) 0%, transparent 20%),
                          radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.1) 0%, transparent 20%);
        pointer-events: none;
    }
    .hero-date-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        color: var(--white);
        z-index: 2;
        position: relative;
    }
    .hero-gregorian {
        font-size: 1.1rem;
        color: var(--gold-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        margin-bottom: 10px;
    }
    .hero-hijri {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        margin-bottom: 5px;
    }
    .hero-hijri-year {
        font-family: 'Amiri', serif;
        font-size: 1.8rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 20px;
    }
    
    .theme-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 30px;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(10, 58, 42, 0.06);
        height: 100%;
        position: relative;
    }
    .theme-card.dark-card {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        color: var(--white);
        border: none;
        overflow: hidden;
    }
    .islamic-pattern-overlay {
        position: absolute;
        inset: 0;
        opacity: 0.05;
        background-image: radial-gradient(circle at center, var(--gold) 2px, transparent 2px), radial-gradient(circle at center, var(--gold) 2px, transparent 2px);
        background-size: 30px 30px;
        background-position: 0 0, 15px 15px;
        pointer-events: none;
    }
    .card-title-gold {
        font-family: 'Playfair Display', serif;
        color: var(--gold-light);
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    .theme-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(10, 58, 42, 0.08);
    }

    /* Fasting Alert */
    .fasting-alert {
        background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: var(--radius-lg);
        padding: 20px 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }
    .fasting-alert i {
        font-size: 2rem;
        color: var(--gold);
    }
    .fasting-alert h4 {
        color: var(--primary-dark);
        margin: 0 0 5px 0;
        font-size: 1.2rem;
        font-weight: 600;
    }
    .fasting-alert p {
        margin: 0;
        color: var(--text-medium);
        font-size: 0.95rem;
    }

    /* Modern Calendar */
    .calendar-modern {
        background: var(--white);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(10, 58, 42, 0.08);
        overflow: hidden;
    }
    .calendar-header {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: var(--primary-subtle);
        text-align: center;
        padding: 15px 0;
        font-weight: 600;
        color: var(--primary-dark);
        font-size: 0.9rem;
    }
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: #f8faf9;
        gap: 1px;
    }
    .calendar-day {
        background: var(--white);
        padding: 15px 5px;
        text-align: center;
        position: relative;
    }
    .calendar-day.today {
        background: var(--primary);
        color: var(--white);
    }
    .calendar-day.today .h-date { color: var(--white); }
    .calendar-day.today .g-date { color: rgba(255,255,255,0.7); }
    .h-date {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        line-height: 1;
        margin-bottom: 4px;
        display: block;
    }
    .g-date {
        font-size: 0.75rem;
        color: var(--text-light);
    }

    /* Multi-Region Box */
    .region-dates {
        display: flex;
        gap: 20px;
        margin-top: 15px;
        justify-content: center;
    }
    .region-box {
        background: rgba(0, 0, 0, 0.2);
        padding: 10px 20px;
        border-radius: var(--radius-md);
        border: 1px solid rgba(255, 255, 255, 0.1);
        text-align: left;
    }
    .region-box span {
        display: block;
        font-size: 0.8rem;
        color: var(--gold-light);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 4px;
    }
    .region-box strong {
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* History Events */
    .history-timeline {
        position: relative;
        padding-left: 30px;
    }
    .history-timeline::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--primary-subtle);
    }
    .history-item {
        position: relative;
        margin-bottom: 25px;
    }
    .history-item:last-child { margin-bottom: 0; }
    .history-item::before {
        content: '';
        position: absolute;
        left: -30px;
        top: 5px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: var(--white);
        border: 4px solid var(--gold);
        box-shadow: 0 0 0 4px var(--white);
    }
    .history-item h4 {
        color: var(--primary-dark);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .history-item p {
        color: var(--text-medium);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 10px;
    }
    .history-source {
        display: inline-block;
        background: var(--secondary);
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        font-size: 0.8rem;
        color: var(--text-light);
    }
</style>

<div class="page-header">
    <div class="container">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 25px; position: relative; z-index: 2;">
            <a href="{{ route('home') }}" style="color: var(--gold-light); text-decoration: none; font-weight: 500;"><i class="fas fa-home"></i> Home</a> 
            <span style="color: rgba(255,255,255,0.4); margin: 0 10px;">/</span> 
            <span style="color: var(--white); font-weight: 500;">Islamic Date Today</span>
        </div>
        <div class="hero-date-container">
            <div class="hero-gregorian"><i class="far fa-calendar-alt" style="margin-right: 8px;"></i>{{ date('l, d F Y') }}</div>
            <div class="hero-hijri">{{ $globalDate ? $globalDate->hijri_day . ' ' . $globalDate->hijri_month : '15 Jumada Al-Akhirah' }}</div>
            <div class="hero-hijri-year">{{ $globalDate ? $globalDate->hijri_year : '1446' }} AH</div>
            
            <div class="region-dates">
                @if($globalDate)
                <div class="region-box">
                    <span>Global (Umm al-Qura)</span>
                    <strong>{{ $globalDate->hijri_day }} {{ $globalDate->hijri_month }}</strong>
                </div>
                @endif
                @if($pakistanDate && $pakistanDate->hijri_day !== $globalDate->hijri_day)
                <div class="region-box">
                    <span>Pakistan (Local Sighting)</span>
                    <strong>{{ $pakistanDate->hijri_day }} {{ $pakistanDate->hijri_month }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<section class="section" style="padding-top: 50px; background-color: var(--secondary-light);">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        
        <x-social-share :title="'Islamic Date Today - ' . $titleHijri" />

        @if(isset($fastingDays) && count($fastingDays) > 0)
        <div class="fasting-alert">
            <i class="fas fa-star-and-crescent"></i>
            <div>
                <h4>Sunnah Fasting Today</h4>
                <p>Today is a recommended day for fasting: <strong>{{ implode(', ', $fastingDays) }}</strong>. May Allah accept your efforts.</p>
            </div>
        </div>
        @endif

        <div class="row g-4 mb-4">
            <!-- Moon Phase -->
            <div class="col-lg-5 col-md-6">
                <div class="theme-card dark-card text-center">
                    <div class="islamic-pattern-overlay"></div>
                    <div class="position-relative z-1">
                        <h3 class="card-title-gold"><i class="fas fa-moon"></i> Current Moon Phase</h3>
                        <x-moon-phase-widget :moonPhase="$moonPhase" />
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="col-lg-7 col-md-6">
                <div class="theme-card">
                    <h3 class="theme-section-title"><i class="fas fa-calendar-star" style="color: var(--gold);"></i> Upcoming Islamic Events</h3>
                    <x-countdown-timers :countdowns="$topCountdowns ?? []" />
                    <div style="margin-top: 20px; text-align: right;">
                        <a href="{{ route('events.index') }}" class="btn-outline" style="font-size: 0.9rem; padding: 8px 16px;">View Full Calendar <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Date Converter -->
            <div class="col-lg-4">
                <x-hijri-converter-widget />
                
                <div class="mt-4">
                    <x-prayer-widget city="Makkah" country="Saudi Arabia" :prayerTimes="null" />
                </div>
            </div>

            <!-- Calendar -->
            <div class="col-lg-8">
                @if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0)
                <div class="theme-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                        <h3 class="theme-section-title" style="margin-bottom: 0; padding-bottom: 0; border: none;"><i class="fas fa-calendar-alt" style="color: var(--primary);"></i> {{ $globalDate->hijri_month }} Calendar</h3>
                        <span style="font-weight: 600; color: var(--gold-dark); background: var(--secondary); padding: 6px 16px; border-radius: var(--radius-xl); font-size: 0.9rem;">
                            {{ $globalDate->hijri_year }} AH
                        </span>
                    </div>
                    
                    <div class="calendar-modern">
                        <div class="calendar-header">
                            <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                        </div>
                        <div class="calendar-grid">
                            @php
                                $firstDay = $monthlyCalendar->first();
                                $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                            @endphp
                            
                            @for($i = 0; $i < $dayOfWeek; $i++)
                                <div style="background: var(--white);"></div>
                            @endfor
                            
                            @foreach($monthlyCalendar as $day)
                                @php
                                    $isToday = $day->gregorian_date == date('Y-m-d');
                                @endphp
                                <div class="calendar-day {{ $isToday ? 'today' : '' }}">
                                    <span class="h-date">{{ $day->hijri_day }}</span>
                                    <span class="g-date">{{ date('j M', strtotime($day->gregorian_date)) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if($currentMonthDetails)
                    <div style="margin-top: 25px; padding: 20px; background: var(--secondary-light); border-radius: var(--radius-md);">
                        <h4 style="color: var(--primary-dark); font-size: 1.1rem; margin-bottom: 10px;">About {{ $currentMonthDetails->name_en }} ({{ $currentMonthDetails->name_ar }})</h4>
                        <p style="font-size: 0.95rem; color: var(--text-medium); margin: 0; line-height: 1.6;">{{ $currentMonthDetails->description }}</p>
                        @if($currentMonthDetails->is_sacred)
                            <div style="margin-top: 10px; display: inline-block; background: rgba(212, 175, 55, 0.2); color: var(--gold-dark); padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;"><i class="fas fa-mosque"></i> Sacred Month</div>
                        @endif
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>

        <!-- Historical Events -->
        @if(isset($historicalEvents) && $historicalEvents->count() > 0)
        <div class="theme-card" style="margin-bottom: 40px;">
            <h3 class="theme-section-title"><i class="fas fa-landmark" style="color: var(--primary);"></i> On This Day in History</h3>
            <p style="color: var(--text-medium); margin-bottom: 30px;">Events that occurred on {{ $globalDate ? $globalDate->hijri_day . ' ' . $globalDate->hijri_month : 'this day' }} across Islamic history.</p>
            
            <div class="history-timeline">
                @foreach($historicalEvents as $event)
                    <div class="history-item">
                        <h4>{{ $event->title }}</h4>
                        <p>{{ $event->description }}</p>
                        <div class="history-source">
                            <i class="fas fa-book-open" style="color: var(--gold); margin-right: 5px;"></i> Source: {{ $event->source_note }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- FAQs -->
        @php
        $faqs = [
            ['q' => 'Why is there a difference in Hijri dates between countries?', 'a' => 'The Islamic calendar is based on the lunar cycle. The start of each month depends on the physical sighting of the new moon. Since the moon becomes visible at different times around the world, countries following local sighting (like Pakistan, India) may start their month a day later than countries following calculated astronomical data or Saudi Arabia.'],
            ['q' => 'How accurate are the prayer times provided?', 'a' => 'We use the highly reliable AlAdhan API to calculate prayer times based on precise geographical coordinates and recognized calculation methods for each region. You can find the specific calculation method listed under the prayer times for your city.'],
            ['q' => 'What is the current Hijri year?', 'a' => 'The current Hijri year is ' . ($globalDate ? $globalDate->hijri_year : '1446') . ' AH. It marks the number of years since the Prophet Muhammad\'s (PBUH) migration (Hijrah) from Makkah to Madinah.'],
            ['q' => 'When do Islamic days start?', 'a' => 'Unlike the Gregorian calendar where the new day starts at midnight, an Islamic day begins at sunset (Maghrib). For example, the night of Friday begins on Thursday after sunset.']
        ];
        @endphp
        
        <div class="theme-card" style="margin-bottom: 40px;">
            <h3 class="theme-section-title text-center" style="justify-content: center; border: none;"><i class="fas fa-question-circle" style="color: var(--gold);"></i> Frequently Asked Questions</h3>
            <p class="text-center" style="color: var(--text-medium); margin-bottom: 30px;">Common questions about the Islamic calendar, moon sighting, and prayer times.</p>
            <x-faq-block :faqs="$faqs" />
        </div>

        <!-- Author Box -->
        <x-author-box />

    </div>
</section>

@endsection
