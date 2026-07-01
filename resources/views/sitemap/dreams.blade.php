<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/khwabon-ki-tabeer') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach($symbols as $s)
    <url>
        <loc>{{ url('/khwabon-ki-tabeer/' . $s->slug) }}</loc>
        <lastmod>{{ $s->updated_at ? $s->updated_at->toW3cString() : now()->toW3cString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
