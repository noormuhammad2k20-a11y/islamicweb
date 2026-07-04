{{-- Reusable Pakistan + Saudi Date Cards --}}
{{-- Usage: @include('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriSA, 'nowPK' => $nowPK]) --}}

<div class="date-cards-wrapper">
    {{-- PAKISTAN CARD --}}
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

    {{-- SAUDI CARD --}}
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
