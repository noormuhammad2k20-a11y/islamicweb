<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($names as $name)
    <url>
        <loc>{{ config('app.url') }}/99-names-of-allah/{{ $name->slug }}</loc>
        <lastmod>{{ $name->updated_at ? $name->updated_at->toDateString() : now()->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
