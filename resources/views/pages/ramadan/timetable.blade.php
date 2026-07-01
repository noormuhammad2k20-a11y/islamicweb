@extends('layouts.app')

@section('title', 'Ramadan Timetable — Noor-e-Islam')
@section('meta_description', 'Interactive 30-day Ramadan Timetable with Sehri and Iftar timings. Comprehensive technical and spiritual guide.')

@section('content')
<style>
    /* VIP Aesthetic styling */
    .vip-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 40px;
    }
    .ramadan-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-family: 'Inter', sans-serif;
    }
    .ramadan-table th, .ramadan-table td {
        padding: 16px 20px;
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
    }
    .ramadan-table th {
        background-color: #f8f9fa;
        color: var(--primary-dark);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    .ramadan-table tr:hover td {
        background-color: #fdfdfd;
    }
    .ramadan-table tr:last-child td {
        border-bottom: none;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #fafafa;
        border-radius: 12px;
        border: 1px dashed #ddd;
    }
    .seo-content-section {
        margin-top: 60px;
        padding: 50px 0;
        border-top: 1px solid #eee;
        font-family: 'Inter', sans-serif;
        color: #444;
        line-height: 1.8;
    }
    .seo-content-section h2 {
        color: var(--primary-dark);
        font-weight: 700;
        margin-bottom: 24px;
        font-size: 2rem;
    }
    .seo-content-section h3 {
        color: var(--primary);
        font-weight: 600;
        margin-top: 32px;
        margin-bottom: 16px;
        font-size: 1.4rem;
    }
</style>

<section class="section services-section" style="padding-top: 60px; background-color: #fcfcfc;">
    <div class="container">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Ramadan Timetable</span>
            </div>
        </div>

        <div class="section-header text-center mb-5">
            <h1 class="section-title" style="font-family: 'Poppins', sans-serif; font-weight: 700;">Ramadan Timetable</h1>
            <p class="section-subtitle text-muted">Accurate Sehri and Iftar timings for the holy month</p>
        </div>

        <div class="vip-card mb-5">
            @if(isset($timings) && $timings->count() > 0)
                <div class="table-responsive">
                    <table class="ramadan-table">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Date</th>
                                <th>Sehri Time</th>
                                <th>Iftar Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($timings as $timing)
                                <tr>
                                    <td><strong>{{ $timing->day }}</strong></td>
                                    <td>{{ \Carbon\Carbon::parse($timing->date)->format('d M, Y') }}</td>
                                    <td style="color: var(--primary); font-weight: 600;">{{ $timing->sehri_time }}</td>
                                    <td style="color: var(--gold); font-weight: 600;">{{ $timing->iftar_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-calendar-times" style="font-size: 3rem; color: #ccc; margin-bottom: 15px;"></i>
                    <h3 style="color: var(--primary-dark); font-weight: 600;">Timetable Updating</h3>
                    <p class="text-muted mb-0">The Ramadan timetable for the current year is being calculated and will be available shortly.</p>
                </div>
            @endif
        </div>

        <!-- SEO Authoritative Content Section -->
        <div class="seo-content-section">
            <h2>The Astronomical Calculation of Ramadan Timings</h2>
            <p>
                The determination of Ramadan timings is a meticulous process that combines advanced astronomical calculations with traditional Islamic jurisprudence. Throughout history, the precise tracking of the lunar cycle and solar positions has been critical to ensuring the accurate observance of Sehri (the pre-dawn meal) and Iftar (the breaking of the fast). Today, high-precision algorithms developed by global astronomical observatories enable us to predict these timings with unprecedented accuracy down to the minute.
            </p>
            <h3>Understanding Fajr and Maghrib Parameters</h3>
            <p>
                Sehri ends and the fast begins at the onset of Fajr, which is astronomically defined by the solar depression angle. Organizations such as the Muslim World League, the Islamic Society of North America (ISNA), and the University of Islamic Sciences in Karachi have established specific degrees of solar depression (typically ranging from 15° to 18°) to calculate the exact moment of true dawn (Al-Fajr Al-Sadiq). The variance in these calculations accounts for geographical latitude and atmospheric refraction, ensuring that the fasting window is correctly strictly bounded according to Sharia principles. 
            </p>
            <p>
                Conversely, Iftar coincides with the Maghrib prayer, signifying the moment the sun entirely dips below the horizon. The calculation of sunset incorporates adjustments for elevation and local topography. For instance, individuals residing in high-rise buildings experience sunset slightly later than those at ground level, a phenomenon meticulously accounted for in localized Islamic timetables.
            </p>
            <h3>The Lunar Calendar and Sighting the Crescent Moon</h3>
            <p>
                Ramadan is the ninth month of the Islamic lunar calendar (Hijri calendar), which consists of 354 or 355 days. Because the lunar year is roughly 11 days shorter than the Gregorian solar year, the month of Ramadan regresses through all seasons over a 33-year cycle. The commencement of the month relies on the visual sighting of the new crescent moon (Hilal). While modern astronomical data can pinpoint the "conjunction" (the exact moment the moon aligns between the Earth and the sun), the actual visibility of the crescent depends on the moon's age, altitude, and elongation at sunset, as well as atmospheric clarity.
            </p>
            <h3>Geographical Variations in Fasting Duration</h3>
            <p>
                Due to the axial tilt of the Earth, the duration of the fast varies dramatically across different latitudes. During summer months in the Northern Hemisphere, regions closer to the Arctic Circle can experience daylight lasting upwards of 20 hours. In extreme cases, where the sun never truly sets or the twilight extends throughout the night, scholars employ the methodology of estimating times based on the nearest moderate region or the city of Mecca (Umm Al-Qura). Understanding these geographical dynamics is essential for creating comprehensive and inclusive Ramadan timetables that serve the global Muslim ummah.
            </p>
        </div>
    </div>
</section>
@endsection