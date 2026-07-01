<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($categories as $cat)
    <url>
        <loc>{{ url('/duas/' . $cat->slug) }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @foreach($duas as $dua)
    <url>
        <loc>{{ url('/duas/' . ($dua->category ? $dua->category->slug . '/' : '') . $dua->slug) }}</loc>
        <lastmod>{{ $dua->updated_at ? $dua->updated_at->toW3cString() : now()->toW3cString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
