@extends('layouts.app')

@section('title', $seoMeta->title ?? 'Nawafil Prayer Times ' . $city->name)
@section('meta_description', $seoMeta->description ?? '')

@section('content')
<section class="section hero-section" style="padding-top: 100px; padding-bottom: 50px; background: var(--gradient-hero); color: white; text-align: center;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 20px;">
            <div style="background: rgba(255,255,255,0.1); padding: 8px 20px; border-radius: 50px; display: inline-block; font-size: 0.9rem; border: var(--border-gold);">
                <a href="{{ route('home') }}" style="color: var(--gold); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <a href="{{ route('prayer-times.hub') }}" style="color: #ddd; text-decoration: none;">Prayer Times</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <a href="{{ route('prayer-times.city', $city->slug) }}" style="color: #ddd; text-decoration: none;">{{ $city->name }}</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <span style="color: white; font-weight: 600;">Nawafil & Qaza</span>
            </div>
        </div>
        
        <h1 style="font-size: 2.5rem; margin-bottom: 15px; font-weight: 700;">{{ $seoMeta->h1 ?? $city->name . ' Nawafil & Qaza Times — نوافل اوقات' }}</h1>
        <p style="font-size: 1.1rem; color: #ddd; max-width: 600px; margin: 0 auto 30px;">
            {{ \Carbon\Carbon::now()->format('l, d F Y') }} <br>
            <span style="color: var(--gold);">Today's Supererogatory (Nawafil) Prayer Schedule</span>
        </p>

        @if($todayPrayer)
        <div class="prayer-cards-grid" style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; margin-top: 30px;">
            <div style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 15px; padding: 20px; min-width: 150px; backdrop-filter: blur(10px);">
                <div style="font-size: 1.2rem; font-weight: 600; color: var(--gold); margin-bottom: 5px;">Ishraq (اشراق)</div>
                <div style="font-size: 1.2rem; font-weight: 700;">{{ \Carbon\Carbon::parse($todayPrayer->sunrise)->addMinutes(15)->format('h:i A') }}</div>
            </div>
            <div style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 15px; padding: 20px; min-width: 150px; backdrop-filter: blur(10px);">
                <div style="font-size: 1.2rem; font-weight: 600; color: var(--gold); margin-bottom: 5px;">Chasht (چاشت)</div>
                <div style="font-size: 1.2rem; font-weight: 700;">{{ \Carbon\Carbon::parse($todayPrayer->sunrise)->addMinutes(45)->format('h:i A') }}</div>
            </div>
            <div style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 15px; padding: 20px; min-width: 150px; backdrop-filter: blur(10px);">
                <div style="font-size: 1.2rem; font-weight: 600; color: var(--gold); margin-bottom: 5px;">Awwabeen (اوابین)</div>
                <div style="font-size: 1.2rem; font-weight: 700;">After Maghrib</div>
            </div>
            <div style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 15px; padding: 20px; min-width: 150px; backdrop-filter: blur(10px);">
                <div style="font-size: 1.2rem; font-weight: 600; color: var(--gold); margin-bottom: 5px;">Tahajjud (تہجد)</div>
                <div style="font-size: 1.2rem; font-weight: 700;">After Isha</div>
            </div>
        </div>
        @endif
    </div>
</section>

<section class="section" style="padding: 60px 0; background: var(--cream);">
    <div class="section-inner">
        <div class="content-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <div class="main-content">
                <h2 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 20px;">What are Nawafil Prayers?</h2>
                <div class="content-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 40px;">
                    <p style="line-height: 1.8; color: var(--text-light);">
                        Nawafil (supererogatory) prayers are optional prayers that bring immense rewards. The most prominent ones are Ishraq, Chasht, Awwabeen, and Tahajjud. 
                        Performing these prayers is a Sunnah of the Prophet Muhammad (PBUH) and a means to attain closeness to Allah.
                    </p>
                </div>

                <h2 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 20px;">Qaza Namaz Rules</h2>
                <div class="content-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 40px;">
                    <p style="line-height: 1.8; color: var(--text-light);">
                        If you miss a Fard (obligatory) prayer, it becomes a Qaza. Qaza prayers must be offered as soon as possible. 
                        However, prayers cannot be offered during the three Makrooh (forbidden) times: Sunrise, Zawal (when the sun is at its zenith), and Sunset.
                    </p>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-widget" style="background: white; padding: 25px; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 30px; border-top: 4px solid var(--gold);">
                    <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px;">Quick Links</h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 10px;"><a href="{{ route('prayer-times.city', $city->slug) }}" style="color: var(--text-light); text-decoration: none;">Daily Fard Prayers</a></li>
                        <li style="margin-bottom: 10px;"><a href="{{ route('prayer-times.monthly', $city->slug) }}" style="color: var(--text-light); text-decoration: none;">Monthly Schedule</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
