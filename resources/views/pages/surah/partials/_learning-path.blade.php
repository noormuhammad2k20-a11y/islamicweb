@if($surah->learningPath)
<div class="sidebar-widget">
    <h3 class="widget-title">Learning Path</h3>
    <div class="widget-content">
        <p style="margin-bottom:10px;"><strong>Difficulty:</strong> {{ $surah->learningPath->difficulty_level }}</p>
        <p style="margin-bottom:10px;"><strong>Reading Time:</strong> ~{{ $surah->learningPath->estimated_reading_minutes }} minutes</p>
        <p style="font-size:0.9rem; color:#666;"><strong>Tips:</strong> {{ $surah->learningPath->memorization_tips_en }}</p>
    </div>
</div>
@endif