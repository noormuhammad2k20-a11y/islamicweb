<div class="sidebar-widget">
    <h3 class="widget-title">Downloads</h3>
    <div class="surah-action-buttons" style="display:flex; flex-direction:column; gap:10px;">
        @if($surah->pdf_url)
            <a href="{{ $surah->pdf_url }}" class="surah-action-btn" target="_blank" style="width:100%; text-align:center; padding: 10px; background: var(--primary); color: white; border-radius: 5px; text-decoration: none;"><i class="fas fa-file-pdf"></i> PDF Download</a>
        @else
            <button disabled style="width:100%; text-align:center; padding: 10px; background: #ddd; color: #888; border-radius: 5px; cursor: not-allowed; border: none;"><i class="fas fa-file-pdf"></i> PDF Coming Soon</button>
        @endif
        @if($surah->audio_url)
            <a href="{{ $surah->audio_url }}" class="surah-action-btn" target="_blank" style="width:100%; text-align:center; padding: 10px; background: var(--primary); color: white; border-radius: 5px; text-decoration: none; margin-top: 5px;"><i class="fas fa-download"></i> MP3 Audio</a>
        @endif
    </div>
</div>
