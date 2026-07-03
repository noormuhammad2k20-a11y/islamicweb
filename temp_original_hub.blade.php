@extends('layouts.app')

@php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
@endphp
@section('title', 'Islamic Date Today — Hijri Date Worldwide, ' . $titleHijri)

@section('content')
<style>
    /* Premium VIP Aesthetic - 8 Column Stacked Layout */
    .vip-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.02);
        padding: 40px;
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .vip-card:hover {
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
    }
    
    .hero-card {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        text-align: center;
        border: none;
        padding: 60px 30px;
    }
    .hero-card .bg-icon {
        position: absolute;
        top: -20px;
        right: -20px;
        opacity: 0.05;
        font-size: 250px;
        pointer-events: none;
    }
    .hero-date-gregorian {
        color: var(--gold);
        font-size: 1.5rem;
        margin-bottom: 20px;
        font-weight: 500;
        letter-spacing: 1px;
    }
    .hero-date-hijri {
        font-family: 'Poppins', sans-serif;
        font-size: 4rem;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 15px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .hero-date-year {
        font-family: 'Inter', sans-serif;
        font-size: 1.8rem;
        color: rgba(255,255,255,0.9);
        font-weight: 500;
    }
    
    .section-title-custom {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 25px;
        font-size: 1.6rem;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .event-item {
        padding: 20px 25px;
        background: #fafafa;
        border-radius: 12px;
        margin-bottom: 15px;
        border-left: 5px solid var(--primary);
        transition: all 0.2s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .event-item:hover {
        background: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        transform: translateX(5px);
    }
    .event-item.upcoming {
        border-left-color: var(--gold);
    }
    
    /* Calendar Grid */
    .cal-grid-wrapper {
        background: white;
        border-radius: 16px;
        border: 1px solid #f0f0f0;
        overflow: hidden;
    }
    .cal-header-row {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: var(--primary-dark);
        color: white;
        text-align: center;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
    }
    .cal-header-cell {
        padding: 18px 5px;
        font-size: 1rem;
        letter-spacing: 1px;
    }
    .cal-body-row {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
    }
    .cal-cell {
        padding: 25px 10px;
        border-bottom: 1px solid #f5f5f5;
        border-right: 1px solid #f5f5f5;
        transition: background 0.2s;
    }
    .cal-cell:hover {
        background: #fafafa;
    }
    .cal-cell.is-today {
        background: rgba(var(--gold-rgb), 0.08);
        border-bottom: 4px solid var(--gold);
    }
    .cal-cell-hijri {
        font-size: 1.6rem;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        color: var(--primary);
        line-height: 1;
        margin-bottom: 8px;
    }
    .cal-cell.is-today .cal-cell-hijri {
        color: var(--primary-dark);
    }
    .cal-cell-greg {
        font-size: 0.85rem;
        color: #888;
        font-weight: 500;
        text-transform: uppercase;
    }
    
    .form-control-vip {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #eaeaea;
        border-radius: 12px;
        background: #fcfcfc;
        font-family: 'Inter', sans-serif;
        color: #444;
        font-size: 1.05rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .form-control-vip:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
        outline: none;
        background: #fff;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .cal-cell { padding: 15px 5px; }
        .cal-cell-hijri { font-size: 1.2rem; }
        .hero-date-hijri { font-size: 2.5rem; }
        .event-item { flex-direction: column; align-items: flex-start; gap: 10px; }
        .event-item > div:last-child { text-align: left !important; }
    }
</style>

<section class="section" style="padding-top: 60px; padding-bottom: 60px; background-color: #fbfbfb;">
    <div class="container">
        
        <!-- Breadcrumb -->
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 12px 30px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.03); font-size: 0.95rem; border: 1px solid rgba(0,0,0,0.02);">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none; font-weight: 500;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 12px;">/</span> 
                <span style="color: var(--primary-dark); font-weight: 600;">Islamic Date Today</span>
            </div>
        </div>

        <!-- STACKED 8-COLUMN LAYOUT START -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                
                @if(count($fastingDays) > 0)
                <!-- FASTING ALERTS -->
                <div class="vip-card" style="background: rgba(var(--gold-rgb), 0.1); border-left: 5px solid var(--gold); display: flex; align-items: center; gap: 20px; padding: 25px 35px;">
                    <i class="fas fa-star-and-crescent" style="color: var(--gold); font-size: 2rem;"></i>
                    <div>
                        <h4 style="color: var(--primary-dark); margin-bottom: 5px; font-weight: 600; font-family: 'Poppins', sans-serif; font-size: 1.2rem;">Sunnah Fasting Today</h4>
                        <p style="color: #555; margin: 0; font-size: 1.05rem;">Today is a recommended day for fasting: <strong>{{ implode(', ', $fastingDays) }}</strong>.</p>
                    </div>
                </div>
                @endif

                <!-- 1. HERO CARD -->
                <div class="vip-card hero-card">
                    <i class="fas fa-moon bg-icon"></i>
                    <div class="hero-date-gregorian">{{ date('l, d F Y') }}</div>
                    <div class="hero-date-hijri">
                        {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah' }}
                    </div>
                    <div class="hero-date-year">{{ $hijriDate ? $hijriDate->hijri_year : '1446' }} AH</div>
                </div>

                <!-- 2. MOON PHASE CARD -->
                <div class="vip-card" style="text-align: center; padding: 50px 30px;">
                    <h3 class="section-title-custom" style="justify-content: center; border: none; margin-bottom: 10px;">
                        Current Moon Phase
                    </h3>
                    <div style="font-size: 5rem; color: var(--gold); margin: 20px 0; filter: drop-shadow(0 4px 15px rgba(var(--gold-rgb), 0.4));">
                        <i class="fas {{ $moonPhase['icon'] ?? 'fa-moon' }}"></i>
                    </div>
                    <h3 style="color: var(--primary-dark); font-family: 'Poppins', sans-serif; font-size: 1.8rem; font-weight: 600; margin-bottom: 10px;">{{ $moonPhase['name'] ?? 'Unknown' }}</h3>
                    <p style="color: #666; font-size: 1.1rem; margin: 0 auto; max-width: 600px;">{{ $moonPhase['description'] ?? '' }}</p>
                </div>

                <!-- 3. UPCOMING EVENTS CARD -->
                <div class="vip-card">
                    <h3 class="section-title-custom"><i class="fas fa-calendar-star" style="color: var(--gold);"></i> Upcoming Islamic Events</h3>
                    
                    @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                        @foreach($upcomingEvents as $index => $event)
                        <div class="event-item upcoming">
                            <div>
                                <h4 style="color: var(--primary-dark); margin: 0 0 8px 0; font-family: 'Poppins', sans-serif; font-size: 1.25rem; font-weight: 600;">{{ $event->name }}</h4>
                                <span style="font-size: 1rem; color: #666; font-weight: 500;"><i class="fas fa-calendar-day" style="color: var(--primary); opacity: 0.6; margin-right: 8px;"></i>{{ $event->hijri_day }} {{ $event->hijriMonth->name_en ?? '' }}</span>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 2rem; font-weight: bold; color: var(--primary); line-height: 1;">{{ $event->days_away }}</div>
                                <div style="font-size: 0.85rem; color: #999; text-transform: uppercase; font-weight: 600; margin-top: 5px;">Days Away</div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div style="padding: 30px; text-align: center; background: #fafafa; border-radius: 12px; border: 1px dashed #ddd;">
                            <p style="color: #888; font-size: 1.1rem; margin: 0;"><i class="fas fa-info-circle" style="margin-right: 8px;"></i> No upcoming events found.</p>
                        </div>
                    @endif
                </div>

                <!-- 4. DATE CONVERTER CARD -->
                <div class="vip-card">
                    <h3 class="section-title-custom"><i class="fas fa-exchange-alt" style="color: var(--primary);"></i> Date Converter</h3>
                    <p style="margin-bottom: 30px; color: #555; font-size: 1.05rem;">Instantly convert dates between the Hijri and Gregorian calendars.</p>
                    
                    <form id="converterWidgetForm" style="background: #fafafa; padding: 30px; border-radius: 16px; border: 1px solid #f0f0f0;">
                        <div class="row g-4 align-items-end">
                            <div class="col-md-5">
                                <label style="font-weight: 600; margin-bottom: 10px; display: block; color: var(--primary-dark);">Conversion Type</label>
                                <select id="convDirection" class="form-control-vip">
                                    <option value="g2h">Gregorian to Hijri</option>
                                    <option value="h2g">Hijri to Gregorian</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label style="font-weight: 600; margin-bottom: 10px; display: block; color: var(--primary-dark);">Date</label>
                                <input type="date" id="convDate" required class="form-control-vip">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn-primary" style="width: 100%; height: 54px; border-radius: 12px; font-weight: 600; font-size: 1.1rem;">
                                    <i class="fas fa-sync"></i> Convert
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div id="convResult" style="margin-top: 30px; text-align: center; display: none; padding: 25px; background: rgba(var(--primary-rgb), 0.05); border-radius: 12px; border: 2px dashed rgba(var(--primary-rgb), 0.2);">
                        <h4 style="color: var(--primary-dark); margin-bottom: 8px; font-size: 1.4rem; font-family: 'Poppins', sans-serif; font-weight: 600;" id="resText"></h4>
                        <p style="color: #666; font-size: 1.1rem; margin: 0;" id="resSub"></p>
                    </div>
                </div>

                <!-- 5. MONTHLY CALENDAR GRID -->
                @if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0)
                <div class="vip-card" style="padding: 0; background: transparent; box-shadow: none; border: none;">
                    <div class="cal-grid-wrapper">
                        <div style="background: #fff; padding: 30px; text-align: center; border-bottom: 1px solid #f0f0f0;">
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--primary-dark); margin: 0; font-size: 1.6rem;">
                                <i class="fas fa-calendar-alt" style="color: var(--primary); margin-right: 10px;"></i> Hijri Calendar — {{ $hijriDate->hijri_month }}
                            </h3>
                        </div>
                        <div class="cal-header-row">
                            <div class="cal-header-cell">Sun</div>
                            <div class="cal-header-cell">Mon</div>
                            <div class="cal-header-cell">Tue</div>
                            <div class="cal-header-cell">Wed</div>
                            <div class="cal-header-cell">Thu</div>
                            <div class="cal-header-cell">Fri</div>
                            <div class="cal-header-cell">Sat</div>
                        </div>
                        <div class="cal-body-row" style="background: white;">
                            @php
                                $firstDay = $monthlyCalendar->first();
                                $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                            @endphp
                            
                            @for($i = 0; $i < $dayOfWeek; $i++)
                                <div style="padding: 20px 5px; border-bottom: 1px solid #f5f5f5; border-right: 1px solid #f5f5f5; background: #fafafa;"></div>
                            @endfor
                            
                            @foreach($monthlyCalendar as $day)
                                @php
                                    $isToday = $day->gregorian_date == date('Y-m-d');
                                @endphp
                                <div class="cal-cell {{ $isToday ? 'is-today' : '' }}">
                                    <div class="cal-cell-hijri">{{ $day->hijri_day }}</div>
                                    <div class="cal-cell-greg">{{ date('j M', strtotime($day->gregorian_date)) }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- 6. HISTORY LOG -->
                @if(isset($historicalEvents) && $historicalEvents->count() > 0)
                <div class="vip-card">
                    <h3 class="section-title-custom"><i class="fas fa-history" style="color: var(--gold);"></i> On This Day in Islamic History</h3>
                    <p style="margin-bottom: 25px; color: #666; font-size: 1.05rem;">Major events that occurred on {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'this day' }}:</p>
                    
                    @foreach($historicalEvents as $event)
                        <div class="event-item" style="border-left-color: #eee;">
                            <div style="width: 100%;">
                                <h4 style="margin-bottom: 10px; color: var(--primary-dark); font-family: 'Poppins', sans-serif; font-size: 1.25rem; font-weight: 600;">{{ $event->title }}</h4>
                                <p style="color: #555; margin-bottom: 15px; line-height: 1.7; font-size: 1.05rem;">{{ $event->description }}</p>
                                <div style="font-size: 0.9rem; color: #888; font-weight: 500; background: #fff; display: inline-block; padding: 5px 15px; border-radius: 50px; border: 1px solid #f0f0f0;">
                                    <i class="fas fa-book-open" style="margin-right: 6px; color: var(--gold);"></i> Source: {{ $event->source_note }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
                
                <!-- 7. LOCALIZED COUNTRIES -->
                <div class="vip-card">
                    <h3 class="section-title-custom"><i class="fas fa-map-marker-alt" style="color: var(--primary);"></i> Localized Dates by Country</h3>
                    <p style="margin-bottom: 30px; color: #555; font-size: 1.05rem;">View local Hijri dates and specific prayer times based on official country moon sightings.</p>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
                        @foreach($countries as $country)
                        <a href="{{ route('islamic-date.country', ['country' => $country->slug]) }}" style="text-decoration: none; color: inherit;">
                            <div style="text-align: center; padding: 30px 20px; background: #fafafa; border-radius: 12px; border: 1px solid #f0f0f0; transition: all 0.3s ease;" onmouseover="this.style.background='#fff'; this.style.borderColor='var(--primary)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.background='#fafafa'; this.style.borderColor='#f0f0f0'; this.style.transform='translateY(0)';">
                                <div style="font-size: 2rem; color: var(--primary); margin-bottom: 15px;"><i class="fas fa-flag"></i></div>
                                <h4 style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; font-weight: 600; margin: 0; color: var(--primary-dark);">{{ $country->name }}</h4>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- 8. FAQ SECTION -->
                <div class="vip-card" itemscope itemtype="https://schema.org/FAQPage">
                    <h3 class="section-title-custom"><i class="fas fa-question-circle" style="color: var(--gold);"></i> Frequently Asked Questions</h3>
                    
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 35px; background: #fafafa; padding: 25px; border-radius: 12px; border-left: 4px solid var(--primary);">
                        <h4 itemprop="name" style="margin-bottom: 15px; font-family: 'Poppins', sans-serif; font-size: 1.25rem; color: var(--primary-dark); font-weight: 600;">Why does the Islamic day start at sunset, not midnight?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: #555; line-height: 1.7; margin: 0; font-size: 1.05rem;">In the Islamic calendar, a new day begins at Maghrib (sunset), following the lunar cycle. This is rooted in the Quran and Sunnah, where the night precedes the daytime, unlike the Gregorian calendar which starts at midnight.</p>
                        </div>
                    </div>
                    
                    <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 0; background: #fafafa; padding: 25px; border-radius: 12px; border-left: 4px solid var(--gold);">
                        <h4 itemprop="name" style="margin-bottom: 15px; font-family: 'Poppins', sans-serif; font-size: 1.25rem; color: var(--primary-dark); font-weight: 600;">Why do Hijri dates shift earlier each Gregorian year?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text" style="color: #555; line-height: 1.7; margin: 0; font-size: 1.05rem;">The Hijri calendar is strictly lunar, consisting of 354 or 355 days. Because it is approximately 10 to 12 days shorter than the 365-day solar Gregorian year, Islamic dates and months (like Ramadan) shift backward through the seasons each year.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- STACKED 8-COLUMN LAYOUT END -->

    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Islamic Date Today — Hijri Date Worldwide",
      "description": "Find today's Islamic date (Hijri date), moon phase, and upcoming Islamic events worldwide.",
      "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Islamic Date Today",
            "item": "{{ route('islamic-date.hub') }}"
          }
        ]
      }
    }
    @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
    ,@foreach($upcomingEvents as $index => $event)
    {
      "@type": "Event",
      "name": "{{ $event->name }}",
      "description": "{{ $event->description }}",
      "startDate": "{{ date('Y-m-d', strtotime('+' . $event->days_away . ' days')) }}",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "Worldwide"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
    @endif
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('converterWidgetForm');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var date = document.getElementById('convDate').value;
            var dir = document.getElementById('convDirection').value;
            var btn = this.querySelector('button');
            var originalBtnText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Converting...';
            btn.disabled = true;

            fetch('/ajax/hijri-convert?date=' + date + '&direction=' + dir)
            .then(res => res.json())
            .then(data => {
                document.getElementById('convResult').style.display = 'block';
                document.getElementById('resText').innerText = data.result_text;
                document.getElementById('resSub').innerText = data.result_subtext;
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            }).catch(err => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
                alert('Conversion failed. Please try again.');
            });
        });
    }
});
</script>
@endsection
