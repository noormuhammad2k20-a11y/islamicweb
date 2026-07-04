<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    {{-- Main Calendar Pages --}}
    <url>
        <loc>{{ route('islamic-calendar') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('islamic-date-today') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('islamic-date-pakistan') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('islamic-date-saudi') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('islamic-date-urdu') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>

    {{-- City Pages --}}
    @foreach($cities as $city)
    <url>
        <loc>{{ route('islamic-date-city', $city->city_slug) }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Month Pages --}}
    @foreach($months as $month)
    <url>
        <loc>{{ route('islamic-month', $month->slug) }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

    {{-- Year Archive Pages --}}
    @foreach($years as $year)
    <url>
        <loc>{{ route('islamic-calendar-year', $year) }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
