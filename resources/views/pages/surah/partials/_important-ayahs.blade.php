@if($surah->importantAyahs && $surah->importantAyahs->count() > 0)
<div class="surah-content-card" id="important-ayahs" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-star" style="color:var(--gold);"></i>
        <h3>Important Ayahs</h3>
    </div>
    <div style="padding:20px;">
        @foreach($surah->importantAyahs as $impAyah)
            <div id="important-ayah-{{ $impAyah->anchor_id ?? $impAyah->id }}" style="margin-bottom:20px; scroll-margin-top: 150px;">
                <h4 style="color:var(--primary);"><i class="fas fa-check-circle"></i> {{ $impAyah->label_en }}</h4>
                <div style="padding:15px; background:#f9f9f9; border-radius:8px; margin-top:10px;">
                    <p style="font-size:1.5rem; text-align:right;" dir="rtl">{{ $impAyah->ayah->arabic_text ?? '' }}</p>
                    <p><strong>Translation:</strong> {{ $impAyah->ayah->englishTranslation->text ?? '' }}</p>
                    @if($impAyah->significance_en)
                        <p style="margin-top:10px; font-style:italic;">{{ $impAyah->significance_en }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif