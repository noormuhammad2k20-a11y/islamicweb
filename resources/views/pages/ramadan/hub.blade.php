@extends('layouts.app')

@section('title', 'Ramadan ' . $year . ' Sehri & Iftar Timings | Noor-e-Islam')
@section('meta_description', 'Get complete Ramadan ' . $year . ' calendar, sehri and iftar timings for your city.')

@section('content')
<section class="section hero-section" style="padding-top: 100px; padding-bottom: 50px; background: var(--gradient-hero); color: white; text-align: center;">
    <div class="section-inner">
        <h1 style="font-size: 2.5rem; margin-bottom: 15px; font-weight: 700;">Ramadan {{ $year }} Sehri & Iftar Timings</h1>
        <p style="font-size: 1.1rem; color: #ddd; max-width: 600px; margin: 0 auto 30px;">
            Select your city to view the complete 30-day Ramadan timetable.
        </p>
    </div>
</section>

<section class="section" style="padding: 60px 0; background: var(--cream);">
    <div class="section-inner">
        <div class="content-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
            @foreach($cities as $city)
            <a href="{{ route('ramadan.city', ['year' => $year, 'city' => $city->slug]) }}" class="content-card" style="background: white; padding: 20px; border-radius: 10px; box-shadow: var(--card-shadow); text-align: center; text-decoration: none; color: var(--text-dark); display: block;">
                <h3 style="margin: 0; font-size: 1.2rem; color: var(--primary);">{{ $city->name }}</h3>
                <p style="margin: 5px 0 0; color: var(--text-light); font-size: 0.9rem;">Sehri & Iftar Timings</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
