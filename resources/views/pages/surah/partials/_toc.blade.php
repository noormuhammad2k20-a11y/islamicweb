<div class="sidebar-widget">
    <h3 class="widget-title">Table of Contents</h3>
    <ul class="widget-list toc-list">
        <li><a href="#overview">Overview</a></li>

        @if($surah->importantAyahs && $surah->importantAyahs->count() > 0)
        <li><a href="#important-ayahs">Important Ayahs</a></li>
        @endif
        @if($surah->getContentText('authentic_virtues'))
        <li><a href="#virtues">Virtues</a></li>
        @endif
        @if($surah->ayahs->count() > 0)
        <li><a href="#continuous-reading">Complete Reading</a></li>
        <li><a href="#translations">Translations & Tafsir</a></li>
        @endif
        @if($surah->faqs->count() > 0)
        <li><a href="#faq">FAQ</a></li>
        @endif
    </ul>
</div>