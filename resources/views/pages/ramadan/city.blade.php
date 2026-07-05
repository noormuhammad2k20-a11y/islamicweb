@extends('layouts.app')

@section('title', $seoMeta->title ?? 'Sehri & Iftar Time ' . $city->name . ' ' . $year)
@section('meta_description', $seoMeta->description ?? '')

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .breadcrumb-modern { background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); padding: 8px 20px; border-radius: 50px; display: inline-block; font-size: 0.9rem; border: 1px solid rgba(212,175,55,0.3); margin-bottom: 25px; position: relative; z-index: 2; }
    .breadcrumb-modern a { color: var(--gold); text-decoration: none; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 40px; position: relative; z-index: 2; max-width: 600px; margin-left: auto; margin-right: auto; }
    
    .prayer-cards-grid { display: flex; justify-content: center; gap: 25px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid var(--gold); border-radius: 20px; padding: 30px; width: 100%; max-width: 280px; text-align: center; transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    .card-region { font-size: 1.2rem; color: var(--gold-light); font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; }
    .hijri-day-large { font-size: 2.8rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    
    .table-modern { width: 100%; border-collapse: collapse; min-width: 600px; text-align: center; }
    .table-modern th { background: var(--primary); color: white; padding: 15px; font-weight: 600; }
    .table-modern td { padding: 12px 15px; border-bottom: 1px solid var(--border-light); color: #333; }
    .table-modern tr:hover td { background: rgba(10,58,42,0.02); }
    .table-modern .today-row td { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); font-weight: 700; color: var(--primary); }
</style>

<section class="date-hero">
    <div class="breadcrumb-modern">
        <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a> 
        <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
        <a href="{{ route('ramadan.hub', $year) }}" style="color: #ddd; text-decoration: none;">Ramadan {{ $year }}</a> 
        <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
        <span style="color: white; font-weight: 600;">{{ $city->name }}</span>
    </div>
    
    <h1 class="date-hero-title">{{ $seoMeta->h1 ?? $city->name . ' Sehri & Iftar Timings ' . $year . ' — رمضان اوقات' }}</h1>
    <p class="date-hero-subtitle">
        Complete Ramadan {{ $year }} sehri and iftar timings for {{ $city->name }}.
    </p>


        @if($todayTiming)
        <div class="prayer-cards-grid">
            <div class="main-date-card">
                <div class="card-region">Today's Sehri Time</div>
                <div class="hijri-day-large">{{ $todayTiming->sehri_time }}</div>
            </div>
            <div class="main-date-card">
                <div class="card-region">Today's Iftar Time</div>
                <div class="hijri-day-large">{{ $todayTiming->iftar_time }}</div>
            </div>
        </div>
        @endif
</section>

<section class="section-container">
    <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-bottom: 40px;">
        <div style="background: white; padding: 25px; border-radius: 16px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); flex: 1; min-width: 300px; text-align: center;">
            <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px; font-family: 'Playfair Display', serif;">Sehri Dua</h3>
            <div style="color: var(--text-light); font-size: 1.5rem; margin-bottom: 10px; font-weight: bold; color: var(--gold);">وَبِصَوْمِ غَدٍ نَّوَيْتُ مِنْ شَهْرِ رَمَضَانَ</div>
            <div style="color: #666; font-size: 0.95rem;">I intend to keep the fast for tomorrow in the month of Ramadan.</div>
        </div>
        <div style="background: white; padding: 25px; border-radius: 16px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); flex: 1; min-width: 300px; text-align: center;">
            <h3 style="color: var(--primary); font-size: 1.3rem; margin-bottom: 15px; font-family: 'Playfair Display', serif;">Iftar Dua</h3>
            <div style="color: var(--text-light); font-size: 1.5rem; margin-bottom: 10px; font-weight: bold; color: var(--gold);">اللَّهُمَّ اِنِّى لَكَ صُمْتُ وَبِكَ امنْتُ وَعَليْكَ تَوَكَّلْتُ وَ عَلَى رِزْقِكَ اَفْطَرْتُ</div>
            <div style="color: #666; font-size: 0.95rem;">O Allah! I fasted for You and I believe in You and I put my trust in You and I break my fast with Your sustenance.</div>
        </div>
    </div>

    <div id="monthly-timetable-section">
        <div style="display: flex; justify-content: center; align-items: center; gap: 20px; flex-wrap: wrap; margin-bottom: 30px;">
            <h2 class="section-title" style="margin-bottom: 0;">Full Ramadan {{ $year }} Timetable — {{ $city->name }}</h2>
            <button onclick="printTimetable()" class="print-btn" style="background: var(--primary); color: white; border: none; padding: 8px 15px; border-radius: 8px; cursor: pointer; font-size: 0.9rem; font-weight: 600; display: flex; align-items: center; gap: 8px; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='none'">
                🖨️ Print Table
            </button>
        </div>

        <script>
            function printTimetable() {
                var printWindow = window.open('', '_blank');
                var tableHTML = document.querySelector('#monthly-timetable-section .table-modern').outerHTML;
                var cityName = '{{ $city->name }}';
                var title = 'Ramadan {{ $year }} Timetable - ' + cityName;
                
                printWindow.document.write('<html><head><title>' + title + '</title>');
                printWindow.document.write('<style>');
                printWindow.document.write('body { font-family: system-ui, -apple-system, sans-serif; margin: 0; color: #000; }');
                printWindow.document.write('h2 { text-align: center; color: #004d40; border-bottom: 2px solid #004d40; padding-bottom: 5px; margin: 10px 0; font-size: 14pt; }');
                printWindow.document.write('.table-modern { width: 100%; border-collapse: collapse; font-size: 8.5pt; margin: 0 auto; line-height: 1.2; }');
                printWindow.document.write('.table-modern th, .table-modern td { border: 1px solid #ccc; padding: 3px 2px; text-align: center; }');
                printWindow.document.write('.table-modern th { background-color: #eee; font-weight: bold; -webkit-print-color-adjust: exact; print-color-adjust: exact; }');
                printWindow.document.write('.today-row { font-weight: bold; background-color: #e8f5e9 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }');
                printWindow.document.write('tr { page-break-inside: avoid; }');
                printWindow.document.write('@media print { @page { size: portrait; margin: 5mm; } body { margin: 0; padding: 5mm; } }');
                printWindow.document.write('</style></head><body>');
                printWindow.document.write('<h2>' + title + '</h2>');
                printWindow.document.write(tableHTML);
                printWindow.document.write('<div style="text-align: center; margin-top: 15px; font-size: 9pt; color: #666;">Generated from Noor-e-Islam</div>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.focus();
                
                setTimeout(function() {
                    printWindow.print();
                    printWindow.close();
                }, 250);
            }
        </script>
        
        <div style="background: white; border-radius: 16px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); overflow: auto; margin-bottom: 50px;">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Ramadan Day</th>
                        <th>Date</th>
                        <th>Sehri Time</th>
                        <th>Iftar Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timings as $t)
                    <tr class="{{ \Carbon\Carbon::parse($t->date)->isToday() ? 'today-row' : '' }}">
                        <td>{{ $t->day }}</td>
                        <td>{{ \Carbon\Carbon::parse($t->date)->format('d M, Y') }}</td>
                        <td>{{ $t->sehri_time }}</td>
                        <td>{{ $t->iftar_time }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div style="text-align: center;">
        <h2 class="section-title">{{ $city->name }} Ramadan Guidelines</h2>
    </div>
    <div style="background: white; padding: 30px; border-radius: 16px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); margin-bottom: 50px; text-align: center;">
        <p style="line-height: 1.8; color: #555; font-size: 1.1rem;">
            The Sehri and Iftar times provided for <strong>{{ $city->name }}</strong> are calculated using the <strong>Karachi / Islamic University of Sciences</strong> method.
            It is recommended to stop eating 1-2 minutes before the exact Sehri time and break your fast exactly at the Iftar time.
        </p>
    </div>

    <div style="text-align: center;">
        <h2 class="section-title">Frequently Asked Questions</h2>
    </div>
    <div class="faq-section" itemscope itemtype="https://schema.org/FAQPage" style="max-width: 800px; margin: 0 auto; margin-bottom: 50px;">
        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">What is the exact Sehri time in {{ $city->name }} today?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    Today, the Sehri time in {{ $city->name }} ends at exactly <strong>{{ $todayTiming ? $todayTiming->sehri_time : 'N/A' }}</strong>. It is highly recommended to stop eating and drinking at least 1-2 minutes before this time to be safe.
                </div>
            </div>
        </div>
        
        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">What is the Iftar time in {{ $city->name }} today?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    Iftar time in {{ $city->name }} today is at <strong>{{ $todayTiming ? $todayTiming->iftar_time : 'N/A' }}</strong>. This marks the time of Maghrib prayer, when Muslims break their fast.
                </div>
            </div>
        </div>

        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">How is the Ramadan timetable calculated for {{ $city->name }}?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    The Ramadan timings for {{ $city->name }} are calculated using the widely accepted <strong>Islamic University of Sciences (Karachi)</strong> methodology, which is the standard calculation method for the Hanafi school of thought in this region.
                </div>
            </div>
        </div>

        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">Are the Sehri and Iftar times valid for both Fiqa Hanafi and Jafria?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    The default times shown above follow the Hanafi and Shafi'i calculation. For <strong>Fiqa Jafria (Shia)</strong>, Sehri typically ends about 10 minutes earlier, and Iftar begins about 10 minutes later after the stars become visible.
                </div>
            </div>
        </div>
    </div>

    <!-- INTERNAL LINKING FOR SEO -->
    <div style="text-align: center;">
        <h2 class="section-title">Explore More for {{ $city->name }}</h2>
    </div>
    <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-bottom: 50px; max-width: 1000px; margin-left: auto; margin-right: auto;">
        <a href="{{ route('prayer-times.city', ['city' => Str::slug($city->name)]) }}" style="text-decoration: none; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); padding: 25px; border-radius: 16px; flex: 1; min-width: 250px; text-align: center; color: white; box-shadow: var(--card-shadow); border: 1px solid var(--gold); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="font-size: 2rem; margin-bottom: 10px;">🕌</div>
            <h3 style="font-size: 1.2rem; margin: 0 0 5px; color: var(--gold-light);">Daily Prayer Times</h3>
            <p style="font-size: 0.9rem; margin: 0; opacity: 0.9;">View exact Fajr, Zuhr, Asr, Maghrib, and Isha timings for {{ $city->name }}.</p>
        </a>

        <a href="{{ route('islamic-date-today') }}" style="text-decoration: none; background: white; padding: 25px; border-radius: 16px; flex: 1; min-width: 250px; text-align: center; color: var(--text-dark); box-shadow: var(--card-shadow); border: 1px solid var(--border-light); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="font-size: 2rem; margin-bottom: 10px;">📅</div>
            <h3 style="font-size: 1.2rem; margin: 0 0 5px; color: var(--primary);">Today's Islamic Date</h3>
            <p style="font-size: 0.9rem; margin: 0; color: #666;">Check the current Hijri date according to the moon sighting.</p>
        </a>

        <a href="{{ route('zakat.index') }}" style="text-decoration: none; background: white; padding: 25px; border-radius: 16px; flex: 1; min-width: 250px; text-align: center; color: var(--text-dark); box-shadow: var(--card-shadow); border: 1px solid var(--border-light); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="font-size: 2rem; margin-bottom: 10px;">⚖️</div>
            <h3 style="font-size: 1.2rem; margin: 0 0 5px; color: var(--primary);">Zakat Calculator</h3>
            <p style="font-size: 0.9rem; margin: 0; color: #666;">Calculate your Zakat during the blessed month of Ramadan.</p>
        </a>
    </div>
</section>
@endsection
