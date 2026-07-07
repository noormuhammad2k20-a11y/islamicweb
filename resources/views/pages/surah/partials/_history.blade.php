@if($surah->getContentText('revelation_context'))
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-history"></i>
        <h3>Revelation History</h3>
    </div>
    <div style="padding:20px;">
        {!! $surah->getContentText('revelation_context') !!}
    </div>
</div>
@endif