<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <url>
        <loc>{{ route('about') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>    
    <url>
        <loc>{{ route('contact') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
        </url>
    <url>
        <loc>{{ route('privacy') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ route('converter.show') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    
    @foreach ($surahs as $surah)
        <url>
            <loc>{{ route('surah.show', $surah->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <url>
            <loc>{{ route('fazilat.show', $surah->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    @foreach ($cities as $city)
        <url>
            <loc>{{ route('prayer-times.city', $city->slug) }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
        @if($city->country)
            <url>
                <loc>{{ route('islamic-date.city', ['country' => $city->country->slug, 'city' => $city->slug]) }}</loc>
                <changefreq>daily</changefreq>
                <priority>0.9</priority>
            </url>
        @endif
    @endforeach
</urlset>
