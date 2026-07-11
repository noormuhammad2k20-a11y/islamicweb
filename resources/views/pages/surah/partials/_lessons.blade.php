@if($surah->getContentText('key_lessons'))
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-graduation-cap"></i>
        <h3>Key Lessons</h3>
    </div>
    <div style="padding:20px;">
        {!! $surah->getContentText('key_lessons') !!}
    </div>
</div>
@endif
