<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/wazaif') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach($wazaif as $w)
    <url>
        <loc>{{ url('/wazaif/' . $w->slug) }}</loc>
        <lastmod>{{ $w->updated_at ? $w->updated_at->toW3cString() : now()->toW3cString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
