@if($surah->collections && $surah->collections->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Collections</h3>
    <ul class="widget-list">
        @foreach($surah->collections as $collection)
            <li><a href="{{ route('surah.collection', $collection->slug) }}">{{ $collection->name_en }}</a></li>
        @endforeach
    </ul>
</div>
@endif