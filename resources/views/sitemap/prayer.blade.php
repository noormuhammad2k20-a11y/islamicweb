<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Country Hubs -->
    @foreach ($countries as $country)
        <url>
            <loc>{{ url('/prayer-times/'.$country) }}</loc>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach

    <!-- Pakistan Cities -->
    @foreach ($cities as $city)
        <url>
            <loc>{{ url('/prayer-times/'.$city->slug) }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
        @foreach ($prayers as $prayer)
        <url>
            <loc>{{ url('/prayer-times/'.$city->slug.'/'.$prayer) }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
        @endforeach
    @endforeach

    <!-- World Cities -->
    @foreach ($worldCities as $city)
        <url>
            <loc>{{ url('/prayer-times/'.$city->slug) }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
        @foreach ($prayers as $prayer)
        <url>
            <loc>{{ url('/prayer-times/'.$city->slug.'/'.$prayer) }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
        @endforeach
    @endforeach
</urlset>
