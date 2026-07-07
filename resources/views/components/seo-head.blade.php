@props(['seo' => []])

<title>{{ $seo['title'] ?? config('app.name') }}</title>
<meta name="description" content="{{ $seo['description'] ?? '' }}">
@if(!empty($seo['canonical']))
    <link rel="canonical" href="{{ $seo['canonical'] }}">
@endif

<meta property="og:title" content="{{ $seo['og_title'] ?? ($seo['title'] ?? '') }}">
<meta property="og:description" content="{{ $seo['og_description'] ?? ($seo['description'] ?? '') }}">
@if(!empty($seo['og_image']))
    <meta property="og:image" content="{{ $seo['og_image'] }}">
@endif
<meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">

<meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
<meta name="twitter:title" content="{{ $seo['og_title'] ?? ($seo['title'] ?? '') }}">
<meta name="twitter:description" content="{{ $seo['og_description'] ?? ($seo['description'] ?? '') }}">
@if(!empty($seo['og_image']))
    <meta name="twitter:image" content="{{ $seo['og_image'] }}">
@endif

@if(!empty($seo['robots']))
    <meta name="robots" content="{{ $seo['robots'] }}">
@endif
