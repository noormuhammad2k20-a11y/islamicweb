@if($surah->entities && $surah->entities->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Mentioned Entities</h3>
    <ul class="widget-tags">
        @foreach($surah->entities as $entity)
            <li><span class="badge" style="background:#f0f0f0; padding:5px 10px; border-radius:15px; margin:2px; display:inline-block;">{{ $entity->name_en }} ({{ $entity->entity_type }})</span></li>
        @endforeach
    </ul>
</div>
@endif