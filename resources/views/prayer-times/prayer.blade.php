@extends('layouts.app')

@section('seo')
<title>{{ $seoData['title'] }}</title>
<meta name="description" content="{{ $seoData['description'] }}">
<link rel="canonical" href="{{ $seoData['canonical'] }}">
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    
    .date-cards-wrapper { display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 1000px; margin: 0 auto; margin-top: 30px; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 40px; width: 100%; max-width: 450px; text-align: center; transition: transform 0.3s ease; border-color: var(--gold); }
    .card-region { font-size: 1.1rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; }
    .hijri-day-large { font-size: 4.5rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444; }
    
    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: auto; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .table-modern { width: 100%; border-collapse: collapse; min-width: 400px; text-align: center; }
    .table-modern th { background: var(--primary); color: white; padding: 15px; font-weight: 600; }
    .table-modern td { padding: 12px 15px; border-bottom: 1px solid var(--border-light); color: #333; }
    .table-modern tr:hover td { background: rgba(10,58,42,0.02); }
    .table-modern .today-row td { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); font-weight: 700; color: var(--primary); }
    
    .print-btn { display: inline-block; padding: 10px 25px; background: transparent; border: 2px solid var(--primary); color: var(--primary); border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.9rem; text-decoration: none; text-align: center; margin: 0 auto; margin-top: 20px;}
    .print-btn:hover { background: var(--primary); color: white; }
</style>

<section class="date-hero">
    <h1 class="date-hero-title">{{ ucfirst($prayerName) }} Time in {{ $name }}</h1>

    <div class="date-cards-wrapper">
        <div class="main-date-card">
            <div class="card-region">Today's {{ ucfirst($prayerName) }} Time</div>
            <div class="hijri-day-large">{{ $prayers[$prayerName] }}</div>
        </div>
    </div>
</section>

<section class="section-container">
    @if($prayerContent && $prayerContent->content)
    <div class="seo-content">
        <div class="prose max-w-none">
            {!! $prayerContent->content !!}
        </div>
    </div>
    @endif

    <div class="title-wrapper" style="margin-top: 40px;">
        <h2 class="section-title">Monthly {{ ucfirst($prayerName) }} Timetable</h2>
    </div>

    <div class="calendar-grid-wrapper">
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>{{ ucfirst($prayerName) }} Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monthly as $day)
                <tr class="{{ $day['is_today'] ? 'today-row' : '' }}">
                    <td>{{ $day['date'] }}</td>
                    <td>{{ $day['dow'] }}</td>
                    <td style="font-weight: 600;">{{ $day[$prayerName] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="text-align: center;">
        <a href="{{ url('/prayer-times/'.$citySlug) }}" class="print-btn">View All Prayer Times for {{ $name }}</a>
    </div>
</section>
@endsection
