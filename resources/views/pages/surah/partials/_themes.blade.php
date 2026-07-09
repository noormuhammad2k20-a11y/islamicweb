@if($surah->themes && $surah->themes->count() > 0)
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-lightbulb"></i>
        <h3>Themes & Topics</h3>
    </div>
    <div style="padding:20px;">
        <ul style="list-style:none; padding:0;">
            @foreach($surah->themes as $theme)
                <li style="margin-bottom:15px; padding-bottom:15px; border-bottom:1px solid #eee;">
                    <div style="text-decoration:none; color:inherit;">
                        <h4 style="margin-bottom:5px; transition:color 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='inherit'">{{ $theme->theme_title_en }}</h4>
                    </div>
                    <p style="color:#555;">{{ $theme->theme_description_en }}</p>
                    <small style="color:var(--primary);">Ayahs: {{ $theme->ayah_range }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif