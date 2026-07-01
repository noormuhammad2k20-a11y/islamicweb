<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/islamic-names') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach($names as $name)
    <url>
        <loc>{{ url('/islamic-names/' . $name->slug) }}</loc>
        <lastmod>{{ $name->updated_at ? $name->updated_at->toW3cString() : now()->toW3cString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
