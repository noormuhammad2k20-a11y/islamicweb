@extends('layouts.app')

@section('seo')
<title>Nawafil Times in {{ ucfirst($city->name) }} Today — {{ date('F Y') }} | IslamicWeb</title>
<meta name="description" content="Complete Nawafil prayer times in {{ ucfirst($city->name) }} for {{ date('F Y') }}. Includes Ishraq, Chasht, Awwabin and Tahajjud timings, virtues, and how to perform.">
<link rel="canonical" href="{{ url('/prayer-times/' . $citySlug . '/nawafil') }}">
<!-- Schema.org Data -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Nawafil Times in {{ ucfirst($city->name) }} Today",
  "description": "Complete Nawafil prayer times in {{ ucfirst($city->name) }} for {{ date('F Y') }}. Includes Ishraq, Chasht, Awwabin and Tahajjud timings.",
  "url": "{{ url('/prayer-times/' . $citySlug . '/nawafil') }}"
}
</script>
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .font-playfair { font-family: 'Playfair Display', serif; }
    
    .date-hero { 
        background: linear-gradient(160deg, var(--primary-dark) 0%, #1a4f3b 50%, #125740 100%); 
        padding: 80px 20px 60px; 
        text-align: center; 
        color: white; 
        position: relative; 
        overflow: hidden; 
        border-radius: 0 0 40px 40px;
        margin-bottom: 40px;
        box-shadow: 0 10px 30px rgba(10,58,42,0.2);
    }
    .date-hero::before { 
        content: ''; position: absolute; inset: 0; opacity: 0.05; 
        background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; 
    }
    
    .hero-meta {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 20px; position: relative; z-index: 2;
        font-size: 0.9rem; color: rgba(255,255,255,0.8);
    }
    .hero-meta span { background: rgba(0,0,0,0.2); padding: 5px 15px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); }
    
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; line-height: 1.2; }
    
    .nawafil-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; max-width: 1200px; margin: 0 auto; position: relative; z-index: 2; margin-top: 30px;}
    
    .nawafil-card { 
        background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 30px 20px; 
        text-align: center; transition: transform 0.3s ease; 
    }
    .nawafil-card:hover { transform: translateY(-5px); background: rgba(255,255,255,0.15); border-color: var(--gold); }
    
    .nawafil-icon { font-size: 2.5rem; margin-bottom: 10px; }
    .nawafil-name { font-size: 1.3rem; font-weight: 700; color: var(--gold-light); font-family: 'Playfair Display', serif; margin-bottom: 5px;}
    .nawafil-time { font-size: 2.2rem; font-weight: 800; color: white; margin-bottom: 5px; }
    .nawafil-rakaat { font-size: 0.9rem; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1px;}
    
    .section-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    .content-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; margin-top: 40px; }
    @media (max-width: 1024px) { .content-grid { grid-template-columns: 1fr; } }
    
    .section-title { font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--primary); margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    
    .calendar-grid-wrapper { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: auto; border: 1px solid var(--border-light); margin-bottom: 40px; }
    .table-modern { width: 100%; border-collapse: collapse; min-width: 600px; text-align: center; }
    .table-modern th { background: var(--primary); color: white; padding: 18px 15px; font-weight: 600; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;}
    .table-modern td { padding: 15px; border-bottom: 1px solid var(--border-light); color: #444; font-size: 1.05rem;}
    .table-modern tr:hover td { background: rgba(10,58,42,0.02); }
    .table-modern .today-row td { background: linear-gradient(135deg, rgba(212,175,55,0.1), rgba(10,58,42,0.05)); font-weight: 700; color: var(--primary); border-left: 3px solid var(--gold); border-right: 3px solid var(--gold);}
    
    .sidebar-widget { background: white; border: 1px solid var(--border-light); border-radius: 20px; padding: 25px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.02); }
    .sidebar-title { font-size: 1.2rem; font-weight: 700; color: var(--primary); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid #eee; padding-bottom: 10px;}
    
    .action-btn { display: inline-flex; align-items: center; gap: 8px; padding: 12px 25px; background: white; border: 2px solid var(--primary); color: var(--primary); border-radius: 50px; font-weight: 600; cursor: pointer; transition: all 0.3s; text-decoration: none; font-size: 0.95rem; }
    .action-btn:hover { background: var(--primary); color: white; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(10,58,42,0.2); }
</style>

{{-- Breadcrumbs --}}
<div class="max-w-[1200px] mx-auto px-5 py-4 text-sm text-gray-500 font-medium">
    <a href="/" class="hover:text-[#0A3A2A] transition-colors">Home</a> &rsaquo; 
    <a href="/prayer-times" class="hover:text-[#0A3A2A] transition-colors">Prayer Times</a> &rsaquo; 
    <a href="/prayer-times/{{ $citySlug }}" class="hover:text-[#0A3A2A] transition-colors">{{ $city->name }}</a> &rsaquo; 
    <span class="text-[#D4AF37]">Nawafil</span>
</div>

<section class="date-hero">
    <div class="hero-meta">
        <span>📍 {{ $name }}, {{ is_object($city->country) ? $city->country->name : $city->country }}</span>
        <span>📅 {{ now($tz)->format('d F Y') }}</span>
        <span>🌙 {{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }} AH</span>
    </div>

    <h1 class="date-hero-title">Nawafil Prayer Times in {{ ucfirst($city->name) }}</h1>
    <p class="text-xl mb-6 text-[rgba(255,255,255,0.8)]">Voluntary prayers to draw closer to Allah (SWT).</p>

    <div class="nawafil-grid">
        <div class="nawafil-card">
            <div class="nawafil-icon">🌅</div>
            <div class="nawafil-name">Ishraq</div>
            <div class="nawafil-time">{{ $todayNawafil['ishraq'] }}</div>
            <div class="nawafil-rakaat">2–4 Rakaat</div>
        </div>
        <div class="nawafil-card">
            <div class="nawafil-icon">☀️</div>
            <div class="nawafil-name">Chasht / Duha</div>
            <div class="nawafil-time">{{ $todayNawafil['chasht'] }}</div>
            <div class="nawafil-rakaat">2–12 Rakaat</div>
        </div>
        <div class="nawafil-card">
            <div class="nawafil-icon">🌆</div>
            <div class="nawafil-name">Awwabin</div>
            <div class="nawafil-time">{{ $todayNawafil['awwabin'] }}</div>
            <div class="nawafil-rakaat">6 Rakaat</div>
        </div>
        <div class="nawafil-card border-[#D4AF37] bg-[rgba(212,175,55,0.1)]">
            <div class="nawafil-icon">🌙</div>
            <div class="nawafil-name">Tahajjud</div>
            <div class="nawafil-time">{{ $todayNawafil['tahajjud'] }}</div>
            <div class="nawafil-rakaat text-[#F3E5AB]">8–12 Rakaat</div>
        </div>
    </div>
</section>

<section class="section-container">
    <div class="content-grid">
        <!-- Main Content Column -->
        <div>
            <x-islamic-knowledge-section title="What are Nawafil Prayers?" type="info">
                <p>Nawafil (نوافل) are voluntary (nafl) prayers in Islam performed in addition to the five obligatory (Fardh) prayers. The word "nafl" means "extra" or "supererogatory." These prayers are highly recommended as they compensate for any deficiencies in the obligatory prayers and elevate a believer's status.</p>
                <p>The Prophet Muhammad ﷺ regularly performed Nawafil, emphasizing their spiritual benefits. In a Hadith Qudsi, Allah says: <em>"My servant keeps drawing closer to Me with voluntary acts of worship until I love him."</em></p>
            </x-islamic-knowledge-section>

            <div class="flex items-center justify-between mb-6 border-b-2 border-[#D4AF37] pb-2 mt-12">
                <h2 class="font-playfair text-3xl font-bold text-[#0A3A2A] m-0">Monthly Nawafil Timetable</h2>
                <button class="action-btn text-sm py-2 px-4" onclick="window.print()">Print Schedule</button>
            </div>

            <div class="calendar-grid-wrapper">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Ishraq</th>
                            <th>Chasht</th>
                            <th>Awwabin</th>
                            <th>Tahajjud</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monthlyNawafil as $row)
                        <tr class="{{ $row['is_today'] ? 'today-row' : '' }}">
                            <td class="font-medium">{{ $row['date'] }}</td>
                            <td>{{ $row['dow'] }}</td>
                            <td>{{ $row['ishraq'] }}</td>
                            <td>{{ $row['chasht'] }}</td>
                            <td>{{ $row['awwabin'] }}</td>
                            <td class="font-bold">{{ $row['tahajjud'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <x-islamic-knowledge-section title="Virtues of the Night Prayer" type="hadith" reference="Sahih Muslim 1163a">
                <p>Abu Huraira reported Allah's Messenger (ﷺ) as saying: <strong>"The most excellent fast after Ramadan is God's month. al-Muharram, and the most excellent prayer after what is prescribed is prayer during the night."</strong></p>
            </x-islamic-knowledge-section>

            <div class="mt-12 bg-white rounded-2xl border border-[rgba(10,58,42,0.1)] p-8 shadow-sm">
                <h3 class="font-playfair text-2xl font-bold text-[#0A3A2A] mb-6 border-b pb-4">Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <details class="group bg-gray-50 rounded-lg open:bg-[rgba(212,175,55,0.05)] border border-gray-200 open:border-[rgba(212,175,55,0.3)] transition-colors">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-4 text-[#0A3A2A] text-lg">
                            <span>What is the best Nawafil prayer to perform regularly?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>
                        <p class="text-gray-600 mt-3 group-open:animate-fadeIn px-4 pb-4">Tahajjud is considered the best Nawafil prayer. The Prophet ﷺ said: "The best prayer after the obligatory prayers is the night prayer (Tahajjud)."</p>
                    </details>
                    <details class="group bg-gray-50 rounded-lg open:bg-[rgba(212,175,55,0.05)] border border-gray-200 open:border-[rgba(212,175,55,0.3)] transition-colors">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-4 text-[#0A3A2A] text-lg">
                            <span>Can I pray Ishraq if I did not sit after Fajr?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>
                        <p class="text-gray-600 mt-3 group-open:animate-fadeIn px-4 pb-4">According to most scholars, the full reward of Ishraq (reward of Hajj & Umrah) is achieved when one sits in the place of prayer after Fajr until sunrise, then prays 2 rakaat. However, if one leaves and returns, they can still pray Ishraq but may not receive the complete mentioned reward.</p>
                    </details>
                    <details class="group bg-gray-50 rounded-lg open:bg-[rgba(212,175,55,0.05)] border border-gray-200 open:border-[rgba(212,175,55,0.3)] transition-colors">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-4 text-[#0A3A2A] text-lg">
                            <span>How many rakaat is Tahajjud?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>
                        <p class="text-gray-600 mt-3 group-open:animate-fadeIn px-4 pb-4">Tahajjud can be 2, 4, 6, 8, 10, or 12 rakaat, prayed in sets of 2. The Prophet ﷺ most commonly prayed 8 rakaat of Tahajjud followed by 3 Witr.</p>
                    </details>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div>
            <div class="sidebar-widget bg-[rgba(10,58,42,0.03)] border-[#D4AF37]">
                <h3 class="sidebar-title">Today's Fard Prayers</h3>
                <ul class="space-y-3">
                    <li class="flex justify-between border-b border-gray-200 pb-2"><span class="text-gray-600">Fajr</span><span class="font-bold text-[#0A3A2A]">{{ $prayers['fajr'] }}</span></li>
                    <li class="flex justify-between border-b border-gray-200 pb-2"><span class="text-gray-600">Dhuhr</span><span class="font-bold text-[#0A3A2A]">{{ $prayers['dhuhr'] }}</span></li>
                    <li class="flex justify-between border-b border-gray-200 pb-2"><span class="text-gray-600">Asr</span><span class="font-bold text-[#0A3A2A]">{{ $prayers['asr'] }}</span></li>
                    <li class="flex justify-between border-b border-gray-200 pb-2"><span class="text-gray-600">Maghrib</span><span class="font-bold text-[#0A3A2A]">{{ $prayers['maghrib'] }}</span></li>
                    <li class="flex justify-between pb-2"><span class="text-gray-600">Isha</span><span class="font-bold text-[#0A3A2A]">{{ $prayers['isha'] }}</span></li>
                </ul>
                <div class="mt-4 text-center">
                    <a href="/prayer-times/{{ $citySlug }}" class="text-sm text-[#D4AF37] font-bold hover:underline">View Full Details &rarr;</a>
                </div>
            </div>

            <div class="sidebar-widget">
                <h3 class="sidebar-title">Other Sunnah Prayers</h3>
                <ul class="space-y-4">
                    <li class="flex justify-between border-b pb-2"><span class="font-medium text-gray-700">Salat al-Hajah</span><span class="text-sm text-gray-500">Prayer of Need</span></li>
                    <li class="flex justify-between border-b pb-2"><span class="font-medium text-gray-700">Salat al-Taubah</span><span class="text-sm text-gray-500">Prayer of Repentance</span></li>
                    <li class="flex justify-between border-b pb-2"><span class="font-medium text-gray-700">Salat al-Istikhara</span><span class="text-sm text-gray-500">Prayer of Guidance</span></li>
                    <li class="flex justify-between pb-2"><span class="font-medium text-gray-700">Tahiyyat al-Masjid</span><span class="text-sm text-gray-500">Greeting the Mosque</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
