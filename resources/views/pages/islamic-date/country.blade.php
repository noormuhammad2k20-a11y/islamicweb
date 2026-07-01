@extends('layouts.app')

@php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
@endphp
@section('title', 'Islamic Date Today in ' . $country->name . ' — ' . $titleHijri . ' AH')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="{{ route('islamic-date.hub') }}" style="color: #999; text-decoration: none;">Islamic Date Today</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{{ $country->name }}</span>
            </div>
        </div>
        
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-map-marker-alt"></i> {{ $country->name }}</div>
            <h1 class="section-title">Islamic Date in <span>{{ $country->name }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">{{ $country->local_context_note ?? 'Today\'s Hijri Date and Islamic Calendar for ' . $country->name }}</p>
        </div>

        <!-- HERO HIJRI DATE & MOON PHASE -->
        <div class="contact-grid" style="grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 50px;">
            <div class="contact-info" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; border: none; text-align: center; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; box-shadow: 0 15px 35px rgba(5,67,62,0.2);">
                <div style="position: absolute; top: -50px; left: -50px; opacity: 0.05; font-size: 250px;"><i class="fas fa-map"></i></div>
                <h3 style="color: var(--gold); font-size: 1.5rem; margin-bottom: 10px; z-index: 1;">{{ date('l, d F Y') }}</h3>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 10px; line-height: 1.2; z-index: 1;">
                    {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah' }}
                </div>
                <div style="font-size: 1.8rem; color: rgba(255,255,255,0.8); z-index: 1;">{{ $hijriDate ? $hijriDate->hijri_year : '1446' }} AH</div>
            </div>

            <div class="contact-info" style="text-align: center; border-left: 4px solid var(--gold); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h4 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 15px;">Current Moon Phase</h4>
                <div style="font-size: 4rem; color: var(--gold); margin-bottom: 15px;">
                    <i class="fas {{ $moonPhase['icon'] ?? 'fa-moon' }}"></i>
                </div>
                <h3 style="color: var(--primary); margin-bottom: 5px;">{{ $moonPhase['name'] ?? 'Unknown' }}</h3>
                <p style="color: #666; font-size: 0.9rem;">{{ $moonPhase['description'] ?? '' }}</p>
            </div>
        </div>

        @if(count($fastingDays) > 0)
        <!-- FASTING ALERTS -->
        <div style="background: rgba(var(--gold-rgb), 0.1); border-left: 4px solid var(--gold); padding: 20px; border-radius: 8px; margin-bottom: 50px;">
            <h4 style="color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-star-and-crescent" style="color: var(--gold);"></i> Sunnah Fasting Today</h4>
            <p style="color: #555; margin: 0;">Today is a recommended day for fasting: <strong>{{ implode(', ', $fastingDays) }}</strong>.</p>
        </div>
        @endif

        <div class="contact-grid" style="grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 50px;">
            <!-- UPCOMING EVENTS -->
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-calendar-star" style="color: var(--gold);"></i> Upcoming Events</h3>
                @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                    @foreach($upcomingEvents as $index => $event)
                    <div style="padding: 15px; background: {{ $index == 0 ? 'rgba(5,67,62,0.05)' : '#fff' }}; border-radius: 8px; margin-bottom: 15px; border: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="color: var(--primary-dark); margin: 0 0 5px 0;">{{ $event->name }}</h4>
                                <span style="font-size: 0.85rem; color: #666;">{{ $event->hijri_day }} {{ $event->hijriMonth->name_en ?? '' }}</span>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary);">{{ $event->days_away }}</div>
                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase;">Days Away</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>No upcoming events found.</p>
                @endif
            </div>

            <!-- HIJRI TO GREGORIAN CONVERTER -->
            <div class="contact-info" style="border-left: 4px solid var(--gold);">
                <h3><i class="fas fa-exchange-alt" style="color: var(--gold);"></i> Date Converter</h3>
                <p style="margin-bottom: 20px;">Instantly convert dates between Hijri and Gregorian.</p>
                <form id="converterWidgetForm">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Conversion Type</label>
                        <select id="convDirection" style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                            <option value="g2h">Gregorian to Hijri</option>
                            <option value="h2g">Hijri to Gregorian</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Date</label>
                        <input type="date" id="convDate" required style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 12px;"><i class="fas fa-sync"></i> Convert</button>
                </form>
                <div id="convResult" style="margin-top: 20px; text-align: center; display: none; padding: 15px; background: rgba(var(--gold-rgb), 0.05); border-radius: 8px; border: 1px solid rgba(var(--gold-rgb), 0.2);">
                    <h4 style="color: var(--primary-dark); margin-bottom: 5px; font-size: 1.2rem;" id="resText"></h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;" id="resSub"></p>
                </div>
            </div>
        </div>

        @if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0)
        <!-- MONTHLY CALENDAR GRID -->
        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h2 class="section-title">Islamic Month <span>Calendar</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Calendar for {{ $hijriDate->hijri_month }} {{ $hijriDate->hijri_year }} AH in {{ $country->name }}</p>
        </div>
        
        <div style="background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 50px;">
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); background: var(--primary); color: white; text-align: center; font-weight: bold;">
                <div style="padding: 15px 5px;">Sun</div>
                <div style="padding: 15px 5px;">Mon</div>
                <div style="padding: 15px 5px;">Tue</div>
                <div style="padding: 15px 5px;">Wed</div>
                <div style="padding: 15px 5px;">Thu</div>
                <div style="padding: 15px 5px;">Fri</div>
                <div style="padding: 15px 5px;">Sat</div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); text-align: center;">
                @php
                    $firstDay = $monthlyCalendar->first();
                    $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                @endphp
                
                @for($i = 0; $i < $dayOfWeek; $i++)
                    <div style="padding: 20px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background: #fafafa;"></div>
                @endfor
                
                @foreach($monthlyCalendar as $day)
                    @php
                        $isToday = $day->gregorian_date == date('Y-m-d');
                    @endphp
                    <div style="padding: 15px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; position: relative; {{ $isToday ? 'background: rgba(var(--gold-rgb), 0.1); border-bottom: 3px solid var(--gold);' : '' }}">
                        <div style="font-size: 1.2rem; font-weight: bold; color: {{ $isToday ? 'var(--primary-dark)' : 'var(--primary)' }};">{{ $day->hijri_day }}</div>
                        <div style="font-size: 0.8rem; color: #999;">{{ date('j M', strtotime($day->gregorian_date)) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        @if(isset($historicalEvents) && $historicalEvents->count() > 0)
        <div class="contact-grid" style="margin-bottom: 50px; grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-history" style="color: var(--gold);"></i> On This Day in Islamic History</h3>
                <p style="margin-bottom: 20px;">Events that occurred on {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'this day' }}</p>
                @foreach($historicalEvents as $event)
                    <div style="margin-bottom: 15px;">
                        <h4 style="margin-bottom: 5px; color: var(--primary-dark);">{{ $event->title }}</h4>
                        <p style="color: #666; margin-bottom: 5px;">{{ $event->description }}</p>
                        <p style="font-size: 0.85rem; color: #999; font-style: italic;">Source: {{ $event->source_note }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Knowledge</div>
            <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>
        
        <div class="contact-grid" style="grid-template-columns: 1fr;" itemscope itemtype="https://schema.org/FAQPage">
            <div class="contact-info">
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px;">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-moon" style="color: var(--gold); margin-right: 10px;"></i>Why does today's Islamic date differ between {{ $country->name }} and Saudi Arabia?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">Differences occur because Saudi Arabia predominantly uses a pre-calculated calendar (Umm al-Qura) or relies on local sightings within the Kingdom. Meanwhile, {{ $country->name }} has its own criteria and local moon-sighting committees, meaning the crescent moon may be visible on different days depending on geographical location.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-binoculars" style="color: var(--gold); margin-right: 10px;"></i>Which moon-sighting authority does {{ $country->name }} follow?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">Generally, each country relies on its national religious authorities or appointed Hilal (crescent) sighting committees. Local scholars and observatories work together to confirm the new moon and officially announce the start of Islamic months.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Islamic Date Today in {{ $country->name }}",
      "description": "Find today's Islamic date (Hijri date), moon phase, and upcoming Islamic events in {{ $country->name }}.",
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
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $country->name }}",
            "item": "{{ url()->current() }}"
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
        "name": "{{ $country->name }}"
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

