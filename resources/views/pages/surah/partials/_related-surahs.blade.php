@if($surah->relatedSurahs && $surah->relatedSurahs->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Related Surahs</h3>
    <ul class="widget-list">
        @foreach($surah->relatedSurahs as $related)
            <li>
                <a href="{{ route('surah.show', $related->relatedSurah->slug) }}">
                    {{ $related->relatedSurah->number }}. {{ $related->relatedSurah->name_en }}
                </a>
                <p style="font-size:0.8rem; color:#666; margin:0;">{{ $related->relation_type }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endif