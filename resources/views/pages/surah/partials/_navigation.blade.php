<div class="surah-page-nav-wrapper">
    <nav class="surah-page-nav">
        <a href="#overview" class="surah-nav-link">Overview</a>
        @if($surah->fazilatEntries && $surah->fazilatEntries->count() > 0)
        <a href="#virtues" class="surah-nav-link">Virtues & Benefits</a>
        @endif
        @if($surah->audio_url)
        <a href="#audioPlayer" class="surah-nav-link">Audio</a>
        @endif
        @if($surah->ayahs->count() > 0)
        <a href="#translations" class="surah-nav-link">Translations</a>
        @endif
        <a href="#faq" class="surah-nav-link">FAQ</a>
    </nav>
</div>