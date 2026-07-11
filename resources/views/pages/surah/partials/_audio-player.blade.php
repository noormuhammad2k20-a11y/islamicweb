@if($surah->recitationGuides && $surah->recitationGuides->count() > 0)
<div class="surah-audio-container" id="audioPlayer" style="margin-top:30px;">
    <div class="surah-content-card-header" style="margin-bottom: 15px;">
        <i class="fas fa-headphones" style="color:var(--primary);"></i>
        <h3>Recitations (Tilawat)</h3>
    </div>
    <div style="background: #f9f9f9; padding: 20px; border-radius: 10px;">
        @foreach($surah->recitationGuides->sortBy('sort_order') as $reciter)
            <div style="margin-bottom: 15px; border-bottom: 1px solid #eaeaea; padding-bottom: 15px;">
                <h4 style="margin-bottom: 10px; font-size: 1.05rem;">
                    {{ $reciter->reciter_name_en }}
                    @if($reciter->is_featured)
                        <span style="background: var(--gold); color: #fff; font-size: 0.7rem; padding: 2px 6px; border-radius: 10px; vertical-align: middle; margin-left: 5px;">Featured</span>
                    @endif
                </h4>
                <audio controls preload="none" style="width: 100%; height: 40px;">
                    <source src="{{ $reciter->audio_url ?? $surah->audio_url ?? '#' }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        @endforeach
    </div>
</div>
@endif
