@if($surah->getContentText('overview'))
<div class="surah-content-card" id="overview">
    <div class="surah-content-card-header">
        <i class="fas fa-info-circle"></i>
        <h3>Overview</h3>
    </div>
    <div style="padding: 20px;">
        {!! $surah->getContentText('overview') !!}
    </div>
</div>
@endif