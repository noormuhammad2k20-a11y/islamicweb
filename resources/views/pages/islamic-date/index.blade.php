@extends('layouts.app')

@section('schema')
{!! isset($seoData['title']) ? '' : '' !!}
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "What is Islamic date today in Pakistan?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Islamic date today in Pakistan is {{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }} AH ({{ $nowPK->format('d F Y') }})."
      }
    },
    {
      "@@type": "Question",
      "name": "What is Islamic date today in Saudi Arabia?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Islamic date today in Saudi Arabia is {{ $hijriSA['day'] }} {{ $hijriSA['month_name'] }} {{ $hijriSA['year'] }} AH."
      }
    },
    {
      "@@type": "Question",
      "name": "Islamic date today in Karachi?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Islamic date today in Karachi is {{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }} Hijri ({{ $nowPK->format('d F Y') }})."
      }
    },
    {
      "@@type": "Question",
      "name": "Today Islamic date in Lahore Pakistan?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Today Islamic date in Lahore Pakistan is {{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }} AH."
      }
    },
    {
      "@@type": "Question",
      "name": "What is the exact Islamic date today?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Exact Islamic date today is {{ $hijriPK['formatted'] }} in Pakistan and {{ $hijriSA['formatted'] }} in Saudi Arabia."
      }
    },
    {
      "@@type": "Question",
      "name": "Which date of Islamic month today?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Today is {{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }} Hijri in Pakistan."
      }
    }
  ]
}
</script>
@endsection

@section('content')
<style>
    :root {
        --primary: #0A3A2A;
        --primary-dark: #052116;
        --gold: #D4AF37;
        --gold-light: #F3E5AB;
        --bg-light: #f8fafc;
        --border-light: rgba(10,58,42,0.1);
    }
    .date-hero {
        background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%);
        padding: 60px 20px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .date-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.05;
        background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px);
        background-size: 40px 40px;
    }
    .date-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }
    .date-hero-subtitle {
        font-size: 1.1rem;
        color: var(--gold-light);
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }
    .date-cards-wrapper {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
        max-width: 1000px;
        margin: 0 auto;
    }
    .main-date-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 20px;
        padding: 30px;
        width: 100%;
        max-width: 450px;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .main-date-card:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
    }
    .card-flag {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    .card-region {
        font-size: 0.9rem;
        color: var(--gold-light);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 15px;
    }
    .hijri-day-large {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 5px;
        font-family: 'Playfair Display', serif;
    }
    .hijri-month-name {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .hijri-urdu-arabic {
        font-family: 'Amiri', serif;
        font-size: 1.3rem;
        color: var(--gold-light);
        margin-bottom: 10px;
    }
    .gregorian-date {
        font-size: 0.9rem;
        opacity: 0.8;
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 15px;
        margin-top: 15px;
    }

    .section-container {
        max-width: 1100px;
        margin: 50px auto;
        padding: 0 20px;
    }
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--primary);
        text-align: center;
        margin-bottom: 30px;
        border-bottom: 2px solid var(--gold);
        display: inline-block;
        padding-bottom: 10px;
    }
    .title-wrapper {
        text-align: center;
        margin-bottom: 40px;
    }
    
    /* Bento Grid for Cities */
    .cities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }
    .city-card {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        display: block;
        text-decoration: none;
        color: inherit;
    }
    .city-card:hover {
        border-color: var(--gold);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transform: translateY(-3px);
    }
    .city-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 10px;
    }
    .city-date {
        font-size: 1.1rem;
        font-weight: 600;
    }
    .city-urdu {
        font-family: 'Amiri', serif;
        color: #666;
        font-size: 1.1rem;
    }

    /* Calendar Table */
    .calendar-table-wrapper {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        overflow: hidden;
        border: 1px solid var(--border-light);
    }
    .calendar-table {
        width: 100%;
        border-collapse: collapse;
    }
    .calendar-table th {
        background: var(--primary);
        color: white;
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }
    .calendar-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
    }
    .calendar-table tr:last-child td { border-bottom: none; }
    .calendar-table tr.today-row {
        background-color: rgba(212, 175, 55, 0.1);
        font-weight: 700;
    }
    .today-badge {
        background: var(--gold);
        color: white;
        font-size: 0.7rem;
        padding: 2px 8px;
        border-radius: 20px;
        margin-left: 10px;
        text-transform: uppercase;
    }

    /* Months List */
    .months-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 15px;
    }
    .month-item {
        background: white;
        padding: 15px 20px;
        border-radius: 12px;
        border: 1px solid var(--border-light);
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .month-num {
        background: var(--primary);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        flex-shrink: 0;
    }
    .month-name {
        font-weight: 600;
        color: var(--primary);
        font-size: 1.1rem;
    }
    .month-urdu {
        font-family: 'Amiri', serif;
        color: var(--gold);
        font-size: 1.2rem;
        margin-left: auto;
    }
    .current-month-badge {
        background: var(--gold);
        color: white;
        font-size: 0.7rem;
        padding: 2px 8px;
        border-radius: 10px;
        margin-top: 5px;
        display: inline-block;
    }

    /* SEO Content */
    .seo-content {
        background: white;
        padding: 40px;
        border-radius: 20px;
        border: 1px solid var(--border-light);
        margin-top: 50px;
        line-height: 1.8;
        color: #444;
    }
    .seo-content h2, .seo-content h3 {
        color: var(--primary);
        margin-top: 30px;
        margin-bottom: 15px;
        font-family: 'Playfair Display', serif;
    }
    
    /* FAQ Section */
    .faq-container {
        margin-top: 50px;
    }
    .faq-item {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 12px;
        margin-bottom: 15px;
        overflow: hidden;
    }
    .faq-question {
        padding: 20px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: var(--primary);
    }
    .faq-question i {
        color: var(--gold);
        transition: transform 0.3s;
    }
    .faq-answer {
        padding: 0 20px 20px;
        display: none;
        color: #555;
        line-height: 1.7;
    }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }
</style>

<!-- HERO SECTION -->
<section class="date-hero">
    @if(isset($targetCity))
        <h1 class="date-hero-title">Islamic Date Today in {{ $targetCity }} | آج کی اسلامی تاریخ</h1>
        <p class="date-hero-subtitle">Exact Hijri Date — {{ $targetCity }}, Pakistan</p>
    @else
        <h1 class="date-hero-title">Islamic Date Today | آج کی اسلامی تاریخ</h1>
        <p class="date-hero-subtitle">Exact Hijri Date — Pakistan, Saudi Arabia, Karachi, Lahore, Rawalpindi, Faisalabad</p>
    @endif
    
    <div class="date-cards-wrapper">
        <!-- PAKISTAN CARD -->
        <div class="main-date-card">
            <div class="card-flag">🇵🇰</div>
            <div class="card-region">Pakistan · Karachi · Lahore</div>
            <div class="hijri-day-large">{{ $hijriPK['day'] }}</div>
            <div class="hijri-month-name">{{ $hijriPK['month_name'] }}</div>
            <div class="hijri-urdu-arabic">{{ $hijriPK['month_urdu'] }} — {{ $hijriPK['month_arabic'] }}</div>
            <div style="font-size: 1.2rem; font-weight: 600;">{{ $hijriPK['year'] }} AH / ھجری</div>
            <div class="gregorian-date">
                {{ $nowPK->format('l, d F Y') }}<br>
                <span style="font-family: 'Amiri', serif; font-size: 1.1rem; color: var(--gold-light);">{{ $hijriPK['day_urdu'] }}</span>
            </div>
        </div>
        
        <!-- SAUDI CARD -->
        <div class="main-date-card">
            <div class="card-flag">🇸🇦</div>
            <div class="card-region">Saudi Arabia Islamic Date Today</div>
            <div class="hijri-day-large">{{ $hijriSA['day'] }}</div>
            <div class="hijri-month-name">{{ $hijriSA['month_name'] }}</div>
            <div class="hijri-urdu-arabic">{{ $hijriSA['month_urdu'] }} — {{ $hijriSA['month_arabic'] }}</div>
            <div style="font-size: 1.2rem; font-weight: 600;">{{ $hijriSA['year'] }} AH / ھجری</div>
            <div class="gregorian-date">
                Umm al-Qura Calendar
            </div>
        </div>
    </div>
</section>

<!-- ALL CITIES -->
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Today Islamic Date in Pakistan — All Cities</h2>
        <p>Islamic date today in Karachi, Lahore, Rawalpindi, Faisalabad, Islamabad Pakistan</p>
    </div>
    
    <div class="cities-grid">
        @foreach($cities as $cityName => $hijri)
            @continue(in_array($cityName, ['Saudi Arabia', 'UAE']))
            <a href="{{ route('islamic-date.city', strtolower(str_replace(' ', '-', $cityName))) }}" class="city-card">
                <div class="city-name">{{ $cityName }}</div>
                <div class="city-date">{{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }} AH</div>
                <div class="city-urdu">{{ $hijri['month_urdu'] }} — {{ $hijri['month_arabic'] }}</div>
            </a>
        @endforeach
        
        <!-- UAE Special Card -->
        <div class="city-card" style="border-color: var(--gold); background: #faf9f5;">
            <div class="city-name">UAE 🇦🇪</div>
            <div class="city-date">{{ $hijriUAE['day'] }} {{ $hijriUAE['month_name'] }} {{ $hijriUAE['year'] }} AH</div>
            <div class="city-urdu">{{ $hijriUAE['month_urdu'] }}</div>
        </div>
    </div>
</section>

<!-- CALENDAR SECTION -->
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Calendar {{ $nowPK->format('F Y') }} — Hijri Calendar Today</h2>
        <p>Today's date according to Islamic calendar for {{ $nowPK->format('F Y') }}</p>
    </div>
    
    <div class="calendar-table-wrapper">
        <table class="calendar-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Islamic Date</th>
                    <th>Hijri Month</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monthCalendar as $row)
                <tr class="{{ $row['is_today'] ? 'today-row' : '' }}">
                    <td>{{ $row['gregorian_date'] }}</td>
                    <td>{{ $row['gregorian_day'] }}</td>
                    <td>
                        {{ $row['hijri_day'] }}
                        @if($row['is_today']) 
                            <span class="today-badge">Today</span> 
                        @endif
                    </td>
                    <td>{{ $row['hijri_month'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<!-- MONTHS EXPLANATION -->
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">{{ $monthInfo['name'] }} {{ $hijriPK['year'] }} — {{ $monthInfo['urdu'] }}</h2>
    </div>
    
    <div style="background: white; padding: 25px; border-radius: 16px; border: 1px solid var(--border-light); margin-bottom: 30px;">
        <h3 style="color: var(--primary); margin-bottom: 10px;">Current Islamic Month</h3>
        <p>{{ $monthInfo['significance'] }}</p>
        
        <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">
        
        <h3 style="color: var(--primary); margin-bottom: 10px;">Next Islamic Month: {{ $nextMonth['name'] }} — {{ $nextMonth['urdu'] }}</h3>
        <p>{{ $nextMonth['significance'] }}</p>
    </div>
    
    <div class="title-wrapper" style="margin-top: 50px;">
        <h2 class="section-title">Islamic Calendar Months — 12 Months of Islamic Year | اسلامی مہینے</h2>
    </div>
    
    <div class="months-list">
        @for($m = 1; $m <= 12; $m++)
            @php $mInfo = app(App\Http\Controllers\IslamicDateController::class)->getMonthInfoPublic($m); @endphp
            <div class="month-item" @if($m === $hijriPK['month']) style="border-color: var(--gold); background: #fdfcee;" @endif>
                <div class="month-num">{{ $m }}</div>
                <div>
                    <div class="month-name">{{ $mInfo['name'] }}</div>
                    @if($m === $hijriPK['month'])
                        <span class="current-month-badge">Current Month</span>
                    @endif
                </div>
                <div class="month-urdu">{{ $mInfo['urdu'] }}</div>
            </div>
        @endfor
    </div>
</section>

<!-- SEO & FAQ -->
<section class="section-container">
    
    <div class="title-wrapper">
        <h2 class="section-title">Frequently Asked Questions — Islamic Date Today</h2>
    </div>
    
    <div class="faq-container">
        <div class="faq-item" id="faq1">
            <div class="faq-question" onclick="toggleFaq('faq1')">
                <span>Islamic date today in Pakistan?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <strong>Islamic date today in Pakistan</strong> is <strong>{{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }}</strong> AH ({{ $nowPK->format('d F Y') }}). Islamic date today in Karachi, Lahore, Rawalpindi, Faisalabad, and Islamabad is the same: {{ $hijriPK['formatted'] }}.
            </div>
        </div>

        <div class="faq-item" id="faq2">
            <div class="faq-question" onclick="toggleFaq('faq2')">
                <span>What is Islamic date today in Saudi Arabia?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                <strong>Islamic date today in Saudi Arabia</strong> is <strong>{{ $hijriSA['day'] }} {{ $hijriSA['month_name'] }} {{ $hijriSA['year'] }}</strong> AH. Saudi Arabia Islamic date is often 1 day ahead of Pakistan because Saudi Arabia follows moon sighting differently. Islamic date today in UAE is also {{ $hijriUAE['formatted'] }}.
            </div>
        </div>

        <div class="faq-item" id="faq3">
            <div class="faq-question" onclick="toggleFaq('faq3')">
                <span>Islamic date today in Karachi?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Today Islamic date in Karachi is <strong>{{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }}</strong>. Karachi follows Pakistan's official Hijri calendar.
            </div>
        </div>

        <div class="faq-item" id="faq4">
            <div class="faq-question" onclick="toggleFaq('faq4')">
                <span>Today Islamic date in Lahore Pakistan?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Today Islamic date in Lahore Pakistan is <strong>{{ $hijriPK['formatted'] }}</strong>. Islamic date today in Lahore is same as all Pakistan cities.
            </div>
        </div>

        <div class="faq-item" id="faq5">
            <div class="faq-question" onclick="toggleFaq('faq5')">
                <span>Which date of Islamic month today?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Today is the <strong>{{ $hijriPK['day'] }}th</strong> of <strong>{{ $hijriPK['month_name'] }}</strong> ({{ $hijriPK['month_urdu'] }}) {{ $hijriPK['year'] }} Hijri. This is the {{ $hijriPK['month'] }}th month of the Islamic year.
            </div>
        </div>

        <div class="faq-item" id="faq6">
            <div class="faq-question" onclick="toggleFaq('faq6')">
                <span>Why is Pakistan Islamic date different from Saudi Arabia?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Pakistan, India, and Bangladesh follow moon sighting locally, so the <strong>Islamic date in Pakistan</strong> is often 1 day behind Saudi Arabia. Saudi Arabia, UAE, and most Arab countries use astronomical calculation or early moon sighting. This is why <strong>today Islamic date in Pakistan</strong> may differ from Saudi Islamic date today.
            </div>
        </div>
        
        <div class="faq-item" id="faq7">
            <div class="faq-question" onclick="toggleFaq('faq7')">
                <span>Islamic date today in Urdu?</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                آج کی اسلامی تاریخ: <strong>{{ $hijriPK['day'] }} {{ $hijriPK['month_urdu'] }} {{ $hijriPK['year'] }} ھجری</strong> ({{ $nowPK->format('d F Y') }}). یہ پاکستان، کراچی، لاہور، راولپنڈی اور فیصل آباد کی اسلامی تاریخ ہے۔
            </div>
        </div>
    </div>
    
    <div class="seo-content">
        <h2>Islamic Date Today — Complete Hijri Date Guide</h2>
        <p><strong>Islamic date today in Pakistan</strong> is <strong>{{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }} {{ $hijriPK['year'] }}</strong> AH ({{ $nowPK->format('d F Y') }}). The <strong>Islamic month date today</strong> is {{ $hijriPK['month_name'] }}, which is the {{ $hijriPK['month'] }}th month of the Hijri calendar year.</p>
        
        <p><strong>Today Islamic date Pakistan</strong> is observed across all cities — Karachi, Lahore, Islamabad, Rawalpindi, and Faisalabad. <strong>Islamic date today in Saudi Arabia</strong> is {{ $hijriSA['day'] }} {{ $hijriSA['month_name'] }} {{ $hijriSA['year'] }} AH. <strong>Saudi Arabia Islamic date today</strong> may be one day ahead of Pakistan. <strong>Islamic date today in UAE</strong> is same as Saudi Arabia: {{ $hijriUAE['formatted'] }}. <strong>Today Islamic date in Saudi Arabia 2026</strong> uses Umm al-Qura calendar officially.</p>
        
        <p><strong>Exact Islamic date today</strong> — The Hijri calendar is a lunar calendar with 354 or 355 days per year. Each month begins with the sighting of the crescent moon. <strong>Today's date according to Islamic calendar</strong> is {{ $hijriPK['formatted'] }} for Pakistan. <strong>Which Islamic date is today in Pakistan</strong>? It is {{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }}.</p>
        
        <p><strong>Islamic date today in Karachi</strong>: {{ $hijriPK['formatted'] }}. <strong>Today Islamic date in Lahore</strong>: {{ $hijriPK['formatted'] }}. <strong>Islamic date today Rawalpindi</strong>: {{ $hijriPK['formatted'] }}. <strong>Islamic date today Faisalabad</strong>: {{ $hijriPK['formatted'] }}. All Pakistan cities observe the same Islamic date.</p>
        
        <p><strong>Islamic date today in Urdu / اسلامی تاریخ</strong>: آج کی اسلامی تاریخ {{ $hijriPK['day'] }} {{ $hijriPK['month_urdu'] }} {{ $hijriPK['year'] }} ہجری ہے۔ <strong>Moon date Islamic today</strong> — Islamic moon date today in Pakistan is {{ $hijriPK['day'] }} {{ $hijriPK['month_name'] }}. <strong>Islamic moon date today</strong> changes every month based on lunar cycle.</p>
        
        <h3>About the Islamic Hijri Calendar</h3>
        <p>The <strong>Islamic calendar</strong> (Hijri calendar) started from the Hijra — migration of Prophet Muhammad (PBUH) from Makkah to Madinah in 622 CE. <strong>Islamic calendar date today</strong> is {{ $hijriPK['year'] }} AH. The calendar has 12 months: Muharram, Safar, Rabi al-Awwal, Rabi al-Thani, Jumada al-Awwal, Jumada al-Thani, Rajab, Shaban, Ramadan, Shawwal, Dhu al-Qadah, Dhu al-Hijjah.</p>
        
        <h3>Islamic Date Today in Pakistan Madani Channel</h3>
        <p>Many Muslims in Pakistan check Islamic date on Madani Channel. <strong>Islamic date today in Pakistan Madani Channel</strong> follows the Ruet-e-Hilal Committee's official announcement. Our page shows the same official Pakistan Hijri date: {{ $hijriPK['formatted'] }}.</p>
    </div>
</section>

<script>
function toggleFaq(id) {
    var el = document.getElementById(id);
    if (el) {
        el.classList.toggle('faq-open');
    }
}
</script>
@endsection
