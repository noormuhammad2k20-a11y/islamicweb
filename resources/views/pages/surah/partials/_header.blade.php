<div class="surah-detail-hero">
    @php
        $surahImagePath = 'images/surahs/default.png';
        $possiblePaths = [
            'images/surahs/' . $surah->slug . '.png',
            'images/surahs/' . $surah->slug . '.jpg',
            'images/surahs/' . $surah->id . '.png',
            'images/surahs/' . $surah->id . '.jpg'
        ];
        foreach($possiblePaths as $path) {
            if(file_exists(public_path($path))) {
                $surahImagePath = $path;
                break;
            }
        }
    @endphp
    <img src="{{ asset($surahImagePath) }}" alt="Surah {{ $surah->name_en }}" class="surah-hero-bg-img" loading="lazy">
    <div class="surah-detail-hero-bg"></div>
    <div class="surah-detail-hero-content">
        <div class="surah-detail-number-badge">{{ $surah->number }}</div>
        <h1 class="surah-detail-title-ar">{{ str_replace('سُورَةُ ', '', $surah->name_ar) }}</h1>
        <div class="arabic-divider" style="margin: 10px 0;">
            <span class="line" style="background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);"></span>
            <span class="symbol" style="color: var(--gold-light);">﷽</span>
            <span class="line" style="background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);"></span>
        </div>
        <h2 class="surah-detail-title-en">Surah {{ $surah->name_en }}</h2>
        <p class="surah-detail-title-ur">{{ $surah->name_ur }}</p>
    </div>
</div>