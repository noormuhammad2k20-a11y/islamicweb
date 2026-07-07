@if($surah->hadiths && $surah->hadiths->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Related Hadiths</h3>
    <ul class="widget-list">
        @foreach($surah->hadiths as $hadith)
            <li>
                <a href="{{ route('hadith.hadithShow', ['topic' => $hadith->topic->slug ?? 'general', 'hadith' => $hadith->slug]) }}">
                    {{ Str::limit($hadith->english_text, 60) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endif