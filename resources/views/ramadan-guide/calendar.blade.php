@extends('layouts.app')

@section('title', 'Ramadan Calendar 2027 | Sehri & Iftar Times | IslamicWeb')
@section('meta_description', 'Ramadan 2027 complete calendar with accurate Sehri and Iftar timings for all major Pakistani cities. Monthly Ramadan timetable 1448 AH.')

@section('content')

<div class="container">
  <nav class="breadcrumb">
    <a href="/">Home</a> &rsaquo;
    <a href="/ramadan-guide">Ramadan Guide</a> &rsaquo;
    <span>Ramadan Calendar</span>
  </nav>
</div>

<section class="page-hero">
  <div class="container">
    <div class="bismillah">﷽</div>
    <h1>Ramadan Calendar 2027 | رمضان کیلنڈر</h1>
    <p>Complete Sehri & Iftar timetable for Ramadan 1448 AH</p>
  </div>
</section>

<div class="container section-gap">

  {{-- Countdown to Ramadan --}}
  <div class="ramadan-countdown-card">
    <h2>Next Ramadan</h2>
    <p>Ramadan 1448 AH is expected to begin in <strong>late January / early February 2027</strong>,
    subject to moon sighting confirmation by religious authorities.</p>
    <div id="countdown-display" class="countdown-timer">
      <div class="cd-unit"><span id="cd-days">—</span><label>Days</label></div>
      <div class="cd-unit"><span id="cd-hours">—</span><label>Hours</label></div>
      <div class="cd-unit"><span id="cd-mins">—</span><label>Minutes</label></div>
    </div>
  </div>

  {{-- City Selector --}}
  <div class="city-selector-row">
    <label for="city-select">Select City:</label>
    <select id="city-select" onchange="changeCity(this.value)">
      <option value="karachi" selected>Karachi</option>
      <option value="lahore">Lahore</option>
      <option value="islamabad">Islamabad</option>
      <option value="rawalpindi">Rawalpindi</option>
      <option value="faisalabad">Faisalabad</option>
      <option value="multan">Multan</option>
      <option value="peshawar">Peshawar</option>
      <option value="quetta">Quetta</option>
    </select>
  </div>

  {{-- Calendar Table --}}
  <div class="table-wrapper">
    <table class="prayer-table">
      <thead>
        <tr>
          <th>Ramadan Day</th>
          <th>Date (2027)</th>
          <th>Sehri Ends</th>
          <th>Iftar Time</th>
          <th>Fasting Duration</th>
        </tr>
      </thead>
      <tbody>
        {{--
          Loop through $ramadanCalendar (array of days from controller)
          Each row: day number, gregorian date, sehri, iftar, duration
        --}}
        @if(!empty($ramadanCalendar))
          @foreach($ramadanCalendar as $day)
          <tr>
            <td><strong>{{ $day['ramadan_day'] }}</strong></td>
            <td>{{ $day['date'] }}</td>
            <td>{{ $day['sehri'] }}</td>
            <td>{{ $day['iftar'] }}</td>
            <td>{{ $day['duration'] }}</td>
          </tr>
          @endforeach
        @else
          <tr>
            <td colspan="5" style="text-align:center; padding:2rem;">
              Ramadan 2027 timetable will be available closer to the month. 
              Please check back in December 2026.
            </td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Important Note --}}
  <div class="info-note">
    ⚠️ These times are calculated using the University of Islamic Sciences Karachi method
    (18° Fajr angle). Please confirm Sehri end time with your local mosque.
    Iftar time is at Maghrib (sunset).
  </div>

  {{-- SEO Article --}}
  <div class="content-article">
    <h2>About Ramadan 2027</h2>
    <p>Ramadan is the ninth month of the Islamic (Hijri) lunar calendar and is observed by Muslims
    worldwide as a month of fasting (Sawm), prayer, reflection, and community. The fast begins at
    Fajr (pre-dawn) and ends at Maghrib (sunset) each day. In Pakistan, the month of Ramadan holds
    special cultural and spiritual significance, with markets staying open late at night and families
    gathering for Sehri and Iftar together.</p>

    <h3>Sehri and Iftar Times in Pakistan</h3>
    <p>Sehri (سحری) is the pre-dawn meal eaten before the fast begins, and Iftar (افطار) is the
    meal eaten at sunset to break the fast. The times vary by city due to Pakistan's geography.
    Cities further north like Islamabad and Peshawar tend to have earlier Fajr and later Maghrib
    compared to Karachi in the south.</p>

    <h3>How to Use This Calendar</h3>
    <p>Select your city from the dropdown above to view accurate Sehri and Iftar timings for your
    location. The times shown are based on astronomical calculations and are generally reliable.
    However, always add 2–3 minutes as a precaution before Sehri ends.</p>
  </div>
</div>

@push('scripts')
<script>
function changeCity(city) {
  window.location.href = '/ramadan-guide/calendar?city=' + city;
}
// Countdown to Feb 1, 2027 (approximate Ramadan start)
const target = new Date('2027-02-01T00:00:00');
function updateCountdown() {
  const now = new Date();
  const diff = target - now;
  if (diff > 0) {
    document.getElementById('cd-days').textContent  = Math.floor(diff / 86400000);
    document.getElementById('cd-hours').textContent = Math.floor((diff % 86400000) / 3600000);
    document.getElementById('cd-mins').textContent  = Math.floor((diff % 3600000) / 60000);
  }
}
updateCountdown();
setInterval(updateCountdown, 60000);
</script>
@endpush

@endsection
