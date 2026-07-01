<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($surahs as $surah)
        <url>
            <loc>{{ route('surah.show', $surah->slug) }}</loc>
            <lastmod>{{ $surah->updated_at ? $surah->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        <url>
            <loc>{{ route('fazilat.show', $surah->slug) }}</loc>
            <lastmod>{{ $surah->updated_at ? $surah->updated_at->toAtomString() : now()->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
