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
    
    .date-cards-wrapper { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 1000px; margin: 0 auto; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 25px; width: 100%; max-width: 250px; text-align: center; transition: transform 0.3s ease; }
    .main-date-card.active { border-color: var(--gold); background: rgba(255,255,255,0.15); transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
    .hijri-day-large { font-size: 2.5rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    .info-box { background: linear-gradient(135deg, #fdf6e3, #fefcf2); border: 1px solid var(--gold); border-radius: 16px; padding: 30px; margin-top: 30px; }
    .info-box h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; }
    .info-box p { color: #555; line-height: 1.8; }

    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444; }
    
    .controls-bar { background: white; padding: 20px; border-radius: 16px; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .control-select { padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 1rem; color: #333; outline: none; width: 100%; max-width: 300px; }
    
    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: auto; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .table-modern { width: 100%; border-collapse: collapse; min-width: 600px; text-align: center; }
    .table-modern th { background: var(--primary); color: white; padding: 15px; font-weight: 600; }
    .table-modern td { padding: 12px 15px; border-bottom: 1px solid var(--border-light); color: #333; }
    .table-modern tr:hover td { background: rgba(10,58,42,0.02); }
    .table-modern .today-row td { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); font-weight: 700; color: var(--primary); }

    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 30px; }
    .internal-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; font-size: 0.9rem; }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }

    @media (max-width: 768px) { 
        .date-hero-title { font-size: 1.6rem; } 
        .hijri-day-large { font-size: 2rem; } 
    }
</style>

<section class="date-hero">
    <h1 class="date-hero-title">Prayer Times in {{ $name }}</h1>
    <p class="date-hero-subtitle">{{ \Carbon\Carbon::now($tz)->format('d F Y') }}</p>

    <div style="margin-bottom: 30px; font-size: 1.2rem; color: white;">
        Next Prayer: <strong>{{ $next['name'] }}</strong> at {{ $next['time'] }} (in {{ $next['countdown'] }})
    </div>

    <div class="date-cards-wrapper">
        @foreach(['fajr'=>'Fajr','sunrise'=>'Sunrise','dhuhr'=>'Dhuhr','asr'=>'Asr','maghrib'=>'Maghrib','isha'=>'Isha'] as $key=>$label)
        <div class="main-date-card {{ $next['name'] == $label ? 'active' : '' }}">
            <div class="card-region">{{ $label }}</div>
            <div class="hijri-day-large">{{ $prayers[$key] }}</div>
        </div>
        @endforeach
    </div>
</section>

<section class="section-container">
    <div style="display: grid; grid-template-columns: 1fr; gap: 30px;">
        
        <div class="controls-bar" style="display: flex; gap: 20px; flex-wrap: wrap; align-items: center; justify-content: center;">
            <form method="GET" action="{{ url()->current() }}" style="display: flex; gap: 20px; width: 100%; justify-content: center; flex-wrap: wrap;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 5px;">Calculation Method</label>
                    <select name="method" class="control-select" onchange="this.form.submit()">
                        <option value="Karachi" {{ $method == 'Karachi' ? 'selected' : '' }}>Karachi</option>
                        <option value="MWL" {{ $method == 'MWL' ? 'selected' : '' }}>Muslim World League</option>
                        <option value="ISNA" {{ $method == 'ISNA' ? 'selected' : '' }}>ISNA</option>
                        <option value="Makkah" {{ $method == 'Makkah' ? 'selected' : '' }}>Umm Al-Qura</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 5px;">Asr Juristic</label>
                    <select name="madhab" class="control-select" onchange="this.form.submit()">
                        <option value="hanafi" {{ $madhab == 'hanafi' ? 'selected' : '' }}>Hanafi</option>
                        <option value="shafi" {{ $madhab == 'shafi' ? 'selected' : '' }}>Shafi / Standard</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="info-box" style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px; text-align: center;">
            <div>
                <h3>Qibla Direction</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);">{{ number_format($qibla, 2) }}°</div>
            </div>
            <div>
                <h3>Islamic Midnight</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);">{{ \Carbon\Carbon::instance($sunnah['middle_night'])->setTimezone($tz)->format('h:i A') }}</div>
            </div>
            <div>
                <h3>Last Third</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);">{{ \Carbon\Carbon::instance($sunnah['last_third'])->setTimezone($tz)->format('h:i A') }}</div>
            </div>
        </div>

        @if($content && $content->content)
        <div class="seo-content">
            <div class="prose max-w-none">
                {!! $content->content !!}
            </div>
        </div>
        @endif

        <div class="title-wrapper" style="margin-top: 30px;">
            <h2 class="section-title">Monthly Timetable</h2>
        </div>

        <div class="calendar-grid-wrapper">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Fajr</th>
                        <th>Sunrise</th>
                        <th>Dhuhr</th>
                        <th>Asr</th>
                        <th>Maghrib</th>
                        <th>Isha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthly as $day)
                    <tr class="{{ $day['is_today'] ? 'today-row' : '' }}">
                        <td>{{ $day['date'] }}</td>
                        <td>{{ $day['dow'] }}</td>
                        <td>{{ $day['fajr'] }}</td>
                        <td>{{ $day['sunrise'] }}</td>
                        <td>{{ $day['dhuhr'] }}</td>
                        <td>{{ $day['asr'] }}</td>
                        <td>{{ $day['maghrib'] }}</td>
                        <td>{{ $day['isha'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="title-wrapper" style="margin-top: 30px;">
            <h2 class="section-title">Nearby Cities</h2>
        </div>
        
        <div class="internal-links">
            @foreach($nearbyCities as $nc)
            <a href="{{ url('/prayer-times/'.($nc['slug'] ?? strtolower(str_replace(' ','-',$nc['name'])))) }}" class="internal-link">
                <span>{{ $nc['name'] }}</span> <i class="fas fa-chevron-right" style="color: var(--gold);"></i>
            </a>
            @endforeach
        </div>

    </div>
</section>
@endsection
