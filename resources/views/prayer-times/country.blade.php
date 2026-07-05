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
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    .grid-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; }
    .city-card { background: white; border: 1px solid var(--border-light); border-radius: 16px; padding: 25px; transition: all 0.3s; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.02); }
    .city-card:hover { transform: translateY(-5px); border-color: var(--gold); box-shadow: 0 8px 25px rgba(0,0,0,0.06); }
    .city-card h3 { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--primary); margin-bottom: 20px; }
    .prayer-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid var(--border-light); }
    .prayer-row:last-child { border-bottom: none; }
    .prayer-name { color: #555; font-weight: 500; }
    .prayer-time { color: var(--primary-dark); font-weight: 700; }
    .view-btn { display: inline-block; margin-top: 20px; padding: 10px 25px; background: transparent; border: 2px solid var(--primary); color: var(--primary); border-radius: 12px; font-weight: 600; text-decoration: none; transition: all 0.3s; font-size: 0.9rem; width: 100%; }
    .view-btn:hover { background: var(--primary); color: white; }

    .all-cities-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
    .all-city-link { display: block; padding: 15px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-align: center; color: var(--primary); font-weight: 600; text-decoration: none; transition: all 0.3s; }
    .all-city-link:hover { background: var(--primary); color: white; border-color: var(--primary); transform: translateY(-2px); }
</style>

<section class="date-hero">
    <h1 class="date-hero-title">Prayer Times in {{ $info['name'] }}</h1>
    <p class="date-hero-subtitle">Accurate Daily Salah Timings</p>
</section>

<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Top Cities in {{ $info['name'] }}</h2>
        <p>Get accurate daily prayer times (Salah) for major cities.</p>
    </div>

    <div class="grid-cards">
        @foreach($topPrayers as $cityName => $times)
        <div class="city-card">
            <h3>{{ $cityName }}</h3>
            <div>
                <div class="prayer-row"><span class="prayer-name">Fajr</span> <span class="prayer-time">{{ $times['fajr'] }}</span></div>
                <div class="prayer-row"><span class="prayer-name">Dhuhr</span> <span class="prayer-time">{{ $times['dhuhr'] }}</span></div>
                <div class="prayer-row"><span class="prayer-name">Asr</span> <span class="prayer-time">{{ $times['asr'] }}</span></div>
                <div class="prayer-row"><span class="prayer-name">Maghrib</span> <span class="prayer-time">{{ $times['maghrib'] }}</span></div>
                <div class="prayer-row"><span class="prayer-name">Isha</span> <span class="prayer-time">{{ $times['isha'] }}</span></div>
            </div>
            <a href="{{ url('/prayer-times/'.strtolower(str_replace(' ','-',$cityName))) }}" class="view-btn">View Timetable</a>
        </div>
        @endforeach
    </div>
</section>

<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">All Cities in {{ $info['name'] }}</h2>
    </div>
    
    <div class="all-cities-grid">
        @foreach($cities as $c)
        <a href="{{ url('/prayer-times/'.($c->slug ?? strtolower(str_replace(' ','-',$c->name)))) }}" class="all-city-link">
            {{ $c->name }}
        </a>
        @endforeach
    </div>
</section>
@endsection
