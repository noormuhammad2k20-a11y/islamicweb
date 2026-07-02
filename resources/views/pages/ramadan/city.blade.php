@extends('layouts.app')

@section('title', $seoMeta->title ?? 'Sehri & Iftar Time ' . $city->name . ' ' . $year)
@section('meta_description', $seoMeta->description ?? '')

@section('content')
<section class="section hero-section" style="padding-top: 100px; padding-bottom: 50px; background: var(--gradient-hero); color: white; text-align: center;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 20px;">
            <div style="background: rgba(255,255,255,0.1); padding: 8px 20px; border-radius: 50px; display: inline-block; font-size: 0.9rem; border: var(--border-gold);">
                <a href="{{ route('home') }}" style="color: var(--gold); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <a href="{{ route('ramadan.hub', $year) }}" style="color: #ddd; text-decoration: none;">Ramadan {{ $year }}</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <span style="color: white; font-weight: 600;">{{ $city->name }}</span>
            </div>
        </div>
        
        <h1 style="font-size: 2.5rem; margin-bottom: 15px; font-weight: 700;">{{ $seoMeta->h1 ?? $city->name . ' Sehri & Iftar Timings ' . $year . ' — رمضان اوقات' }}</h1>
        <p style="font-size: 1.1rem; color: #ddd; max-width: 600px; margin: 0 auto 30px;">
            Complete Ramadan {{ $year }} sehri and iftar timings for {{ $city->name }}.
        </p>

        @if($todayTiming)
        <div class="prayer-cards-grid" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-top: 30px;">
            <div style="background: rgba(255,255,255,0.1); border: 2px solid var(--gold); border-radius: 15px; padding: 25px; min-width: 200px; backdrop-filter: blur(10px);">
                <div style="font-size: 1.2rem; font-weight: 600; color: var(--gold); margin-bottom: 10px;">Today's Sehri Time</div>
                <div style="font-size: 2rem; font-weight: 700;">{{ \Carbon\Carbon::parse($todayTiming->sehri_time)->format('h:i A') }}</div>
            </div>
            <div style="background: rgba(255,255,255,0.1); border: 2px solid var(--gold); border-radius: 15px; padding: 25px; min-width: 200px; backdrop-filter: blur(10px);">
                <div style="font-size: 1.2rem; font-weight: 600; color: var(--gold); margin-bottom: 10px;">Today's Iftar Time</div>
                <div style="font-size: 2rem; font-weight: 700;">{{ \Carbon\Carbon::parse($todayTiming->iftar_time)->format('h:i A') }}</div>
            </div>
        </div>
        @endif
    </div>
</section>

<section class="section" style="padding: 60px 0; background: var(--cream);">
    <div class="section-inner">
        <div class="content-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            <div class="main-content">
                <h2 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 20px;">Full Ramadan {{ $year }} Timetable — {{ $city->name }}</h2>
                <div class="content-card" style="background: white; padding: 0; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 40px; overflow: hidden;">
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                            <thead>
                                <tr style="background: var(--primary-light); color: white;">
                                    <th style="padding: 15px; text-align: center;">Ramadan Day</th>
                                    <th style="padding: 15px; text-align: left;">Date</th>
                                    <th style="padding: 15px; text-align: center;">Sehri Time</th>
                                    <th style="padding: 15px; text-align: center;">Iftar Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($timings as $t)
                                <tr style="border-bottom: 1px solid #eee; {{ \Carbon\Carbon::parse($t->date)->isToday() ? 'background: rgba(201,162,39,0.1);' : '' }}">
                                    <td style="padding: 12px 15px; text-align: center; font-weight: 600; color: var(--primary);">{{ $t->day }}</td>
                                    <td style="padding: 12px 15px; font-weight: 600; color: var(--text-dark);">{{ \Carbon\Carbon::parse($t->date)->format('d M, Y') }}</td>
                                    <td style="padding: 12px 15px; text-align: center;">{{ \Carbon\Carbon::parse($t->sehri_time)->format('h:i A') }}</td>
                                    <td style="padding: 12px 15px; text-align: center; font-weight: 700;">{{ \Carbon\Carbon::parse($t->iftar_time)->format('h:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <h2 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 20px;">{{ $city->name }} Ramadan Guidelines</h2>
                <div class="content-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 40px;">
                    <p style="line-height: 1.8; color: var(--text-light);">
                        The Sehri and Iftar times provided for {{ $city->name }} are calculated using the {{ $city->prayer_calc_method ?? 'local standard' }} method.
                        It is recommended to stop eating 1-2 minutes before the exact Sehri time and break your fast exactly at the Iftar time.
                    </p>
                </div>

                <!-- FAQ Section for Schema -->
                <h2 style="color: var(--primary); font-size: 1.8rem; margin-bottom: 20px;">Frequently Asked Questions</h2>
                <div class="faq-section" itemscope itemtype="https://schema.org/FAQPage">
                    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 20px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <h3 itemprop="name" style="font-size: 1.1rem; color: var(--text-dark); margin: 0 0 10px;">What is sehri time in {{ $city->name }} today?</h3>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text" style="color: var(--text-light);">
                                Sehri time in {{ $city->name }} today is {{ $todayTiming ? \Carbon\Carbon::parse($todayTiming->sehri_time)->format('h:i A') : 'N/A' }}.
                            </div>
                        </div>
                    </div>
                    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 20px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                        <h3 itemprop="name" style="font-size: 1.1rem; color: var(--text-dark); margin: 0 0 10px;">What is iftar time in {{ $city->name }} today?</h3>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div itemprop="text" style="color: var(--text-light);">
                                Iftar time in {{ $city->name }} today is {{ $todayTiming ? \Carbon\Carbon::parse($todayTiming->iftar_time)->format('h:i A') : 'N/A' }}.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-widget" style="background: white; padding: 25px; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 30px; border-top: 4px solid var(--gold);">
                    <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px;">Ramadan Duas</h3>
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 15px;">
                            <strong style="display:block; color: var(--text-dark);">Sehri Dua:</strong>
                            <span style="color: var(--text-light); font-size: 0.9rem;">وَبِصَوْمِ غَدٍ نَّوَيْتُ مِنْ شَهْرِ رَمَضَانَ</span>
                        </li>
                        <li>
                            <strong style="display:block; color: var(--text-dark);">Iftar Dua:</strong>
                            <span style="color: var(--text-light); font-size: 0.9rem;">اللَّهُمَّ اِنِّى لَكَ صُمْتُ وَبِكَ امنْتُ وَعَليْكَ تَوَكَّلْتُ وَ عَلَى رِزْقِكَ اَفْطَرْتُ</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
