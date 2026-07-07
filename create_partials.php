<?php
$dir = __DIR__ . '/resources/views/pages/surah/partials';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$partials = [
    '_header' => <<<BLADE
<div class="surah-detail-hero">
    @php
        \$surahImagePath = 'images/surahs/default.png';
        \$possiblePaths = [
            'images/surahs/' . \$surah->slug . '.png',
            'images/surahs/' . \$surah->slug . '.jpg',
            'images/surahs/' . \$surah->id . '.png',
            'images/surahs/' . \$surah->id . '.jpg'
        ];
        foreach(\$possiblePaths as \$path) {
            if(file_exists(public_path(\$path))) {
                \$surahImagePath = \$path;
                break;
            }
        }
    @endphp
    <img src="{{ asset(\$surahImagePath) }}" alt="Surah {{ \$surah->name_en }}" class="surah-hero-bg-img" loading="lazy">
    <div class="surah-detail-hero-bg"></div>
    <div class="surah-detail-hero-content">
        <div class="surah-detail-number-badge">{{ \$surah->number }}</div>
        <h1 class="surah-detail-title-ar">سورة {{ \$surah->name_ar }}</h1>
        <div class="arabic-divider" style="margin: 10px 0;">
            <span class="line" style="background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);"></span>
            <span class="symbol" style="color: var(--gold-light);">﷽</span>
            <span class="line" style="background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);"></span>
        </div>
        <h2 class="surah-detail-title-en">Surah {{ \$surah->name_en }}</h2>
        <p class="surah-detail-title-ur">{{ \$surah->name_ur }}</p>
    </div>
</div>
BLADE,

    '_navigation' => <<<BLADE
<div class="surah-page-nav-wrapper">
    <nav class="surah-page-nav">
        <a href="#overview" class="surah-nav-link">Overview</a>
        @if(\$surah->fazilatEntries && \$surah->fazilatEntries->count() > 0)
        <a href="#virtues" class="surah-nav-link">Virtues & Benefits</a>
        @endif
        @if(\$surah->audio_url)
        <a href="#audioPlayer" class="surah-nav-link">Audio</a>
        @endif
        @if(\$surah->ayahs->count() > 0)
        <a href="#translations" class="surah-nav-link">Translations</a>
        @endif
        <a href="#faq" class="surah-nav-link">FAQ</a>
    </nav>
</div>
BLADE,

    '_quick-facts' => <<<BLADE
<div class="surah-stat-pills">
    <div class="surah-stat-pill">
        <i class="fas fa-list-ol"></i>
        <div>
            <span class="pill-value">{{ \$surah->total_ayahs }}</span>
            <span class="pill-label">Ayahs</span>
        </div>
    </div>
    <div class="surah-stat-pill">
        <i class="fas fa-bookmark"></i>
        <div>
            <span class="pill-value">{{ \$surah->juz_start }}</span>
            <span class="pill-label">Juz/Para</span>
        </div>
    </div>
    @if(\$surah->total_rukus)
    <div class="surah-stat-pill">
        <i class="fas fa-layer-group"></i>
        <div>
            <span class="pill-value">{{ \$surah->total_rukus }}</span>
            <span class="pill-label">Rukus</span>
        </div>
    </div>
    @endif
    <div class="surah-stat-pill">
        <i class="fas {{ (\$surah->revelation_type == 'Madani' || \$surah->revelation_type == 'Medinan') ? 'fa-mosque' : 'fa-kaaba' }}"></i>
        <div>
            <span class="pill-value">{{ \$surah->revelation_type }}</span>
            <span class="pill-label">Revealed In</span>
        </div>
    </div>
</div>
BLADE,

    '_overview' => <<<BLADE
@if(\$surah->getContentText('overview'))
<div class="surah-content-card" id="overview">
    <div class="surah-content-card-header">
        <i class="fas fa-info-circle"></i>
        <h3>Overview</h3>
    </div>
    <div style="padding: 20px;">
        {!! \$surah->getContentText('overview') !!}
    </div>
</div>
@endif
BLADE,

    '_audio-player' => <<<BLADE
@if(\$surah->audio_url)
<div class="surah-audio-container" id="audioPlayer" style="margin-top:20px;">
    <div class="surah-audio-header">
        <i class="fas fa-headphones"></i>
        <span>Listen to Surah {{ \$surah->name_en }}</span>
    </div>
    <audio controls preload="none" style="width: 100%;">
        <source src="{{ \$surah->audio_url }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>
@endif
BLADE,

    '_ayahs' => <<<BLADE
@if(\$surah->ayahs->count() > 0)
<div class="surah-content-card" id="translations" style="margin-top: 30px;" aria-label="Translations and Tafsir">
    <div class="surah-content-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <i class="fas fa-align-right" aria-hidden="true"></i>
            <h3 style="display: inline-block; margin-left: 10px; margin-bottom: 0;">Verse by Verse with Translation & Tafsir</h3>
        </div>
        <button id="readingModeBtn" class="surah-action-btn" onclick="toggleReadingMode()" aria-label="Toggle Reading Mode" style="margin: 0; padding: 8px 15px; font-size: 0.9rem;"><i class="fas fa-book-reader" aria-hidden="true"></i> Reading Mode</button>
    </div>
    <div style="padding: 0;">
        @foreach(\$surah->ayahs as \$ayah)
            <div class="surah-ayah-block" id="ayah-{{ \$ayah->ayah_number }}">
                <div class="surah-ayah-arabic-row">
                    <div class="surah-ayah-number-circle">{{ \$ayah->ayah_number }}</div>
                    <div class="surah-ayah-arabic-text">{{ \$ayah->arabic_text }}</div>
                </div>
                <div class="surah-ayah-actions" style="margin-top: 5px; display: flex; gap: 10px; justify-content: flex-end;">
                    <button class="surah-action-btn copy-ayah-btn" data-text="{{ \$ayah->arabic_text }}" onclick="copyAyah(this)" style="font-size: 0.85rem; padding: 5px 12px;"><i class="fas fa-copy"></i> Copy</button>
                </div>
                <div class="surah-ayah-translations">
                    <div class="surah-ayah-translation urdu">
                        <h4><i class="fas fa-language"></i> Urdu Translation</h4>
                        <p>{{ \$ayah->urduTranslation->text ?? '' }}</p>
                        @php \$urduTafseer = \$ayah->tafsirs->where('language', 'urdu')->first(); @endphp
                        @if(\$urduTafseer)
                            <details style="margin-top: 15px;">
                                <summary><i class="fas fa-book-open"></i> View Tafsir</summary>
                                <div style="margin-top:12px; padding:18px; background:#fdfbf7; border-left:4px solid var(--primary);">{!! nl2br(e(\$urduTafseer->text)) !!}</div>
                            </details>
                        @endif
                    </div>
                    <div class="surah-ayah-translation english">
                        <h4><i class="fas fa-globe"></i> English Translation</h4>
                        <p>{{ \$ayah->englishTranslation->text ?? '' }}</p>
                        @php \$enTafseer = \$ayah->tafsirs->where('language', 'english')->first(); @endphp
                        @if(\$enTafseer)
                            <details style="margin-top: 15px;">
                                <summary><i class="fas fa-book-open"></i> View Tafsir</summary>
                                <div style="margin-top:12px; padding:18px; background:#fdfbf7; border-left:4px solid var(--primary);">{!! nl2br(e(\$enTafseer->text)) !!}</div>
                            </details>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
BLADE,

    '_important-ayahs' => <<<BLADE
@if(\$surah->importantAyahs && \$surah->importantAyahs->count() > 0)
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-star" style="color:var(--gold);"></i>
        <h3>Important Ayahs</h3>
    </div>
    <div style="padding:20px;">
        @foreach(\$surah->importantAyahs as \$impAyah)
            <div style="margin-bottom:20px;">
                <h4 style="color:var(--primary);"><i class="fas fa-check-circle"></i> {{ \$impAyah->title_en }}</h4>
                <div style="padding:15px; background:#f9f9f9; border-radius:8px; margin-top:10px;">
                    <p style="font-size:1.5rem; text-align:right;" dir="rtl">{{ \$impAyah->ayah->arabic_text ?? '' }}</p>
                    <p><strong>Translation:</strong> {{ \$impAyah->ayah->englishTranslation->text ?? '' }}</p>
                    @if(\$impAyah->explanation_en)
                        <p style="margin-top:10px; font-style:italic;">{{ \$impAyah->explanation_en }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
BLADE,

    '_themes' => <<<BLADE
@if(\$surah->themes && \$surah->themes->count() > 0)
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-lightbulb"></i>
        <h3>Themes & Topics</h3>
    </div>
    <div style="padding:20px;">
        <ul style="list-style:none; padding:0;">
            @foreach(\$surah->themes as \$theme)
                <li style="margin-bottom:15px; padding-bottom:15px; border-bottom:1px solid #eee;">
                    <h4 style="margin-bottom:5px;">{{ \$theme->theme_en }}</h4>
                    <p style="color:#555;">{{ \$theme->description_en }}</p>
                    <small style="color:var(--primary);">Ayahs: {{ \$theme->ayah_range }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif
BLADE,

    '_history' => <<<BLADE
@if(\$surah->getContentText('revelation_context'))
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-history"></i>
        <h3>Revelation History</h3>
    </div>
    <div style="padding:20px;">
        {!! \$surah->getContentText('revelation_context') !!}
    </div>
</div>
@endif
BLADE,

    '_lessons' => <<<BLADE
@if(\$surah->getContentText('key_lessons'))
<div class="surah-content-card" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-graduation-cap"></i>
        <h3>Key Lessons</h3>
    </div>
    <div style="padding:20px;">
        {!! \$surah->getContentText('key_lessons') !!}
    </div>
</div>
@endif
BLADE,

    '_virtues' => <<<BLADE
@if(\$surah->fazilatEntries && \$surah->fazilatEntries->count() > 0)
<div class="surah-content-card" id="virtues" style="margin-top: 30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-star" style="color: var(--gold);"></i>
        <h3>Virtues & Benefits (Fazilat)</h3>
    </div>
    <div style="padding: 30px;">
        @foreach(\$surah->fazilatEntries as \$fazilat)
            <div style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                <h4 style="color: var(--primary-dark); margin-bottom: 12px; font-size: 1.25rem;">
                    <i class="fas fa-question-circle" style="color: var(--gold-light); margin-right: 8px;"></i> 
                    {{ \$fazilat->question }}
                </h4>
                <div style="font-size: 1.05rem; line-height: 1.8; color: #444; margin-bottom: 15px; padding-left: 32px;">
                    {{ \$fazilat->answer }}
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
BLADE,

    '_faqs' => <<<BLADE
@if(\$surah->faqs && \$surah->faqs->count() > 0)
<div class="section-header" id="faq" style="margin-top: 70px;">
    <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
    <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
</div>
<div class="surah-content-card">
    <div style="padding: 30px;">
        @foreach(\$surah->faqs as \$faq)
        <div class="surah-faq-item">
            <h3 class="surah-faq-question"><i class="fas fa-question-circle"></i> {{ \$faq->question_en }}</h3>
            <p class="surah-faq-answer">{!! \$faq->answer_en !!}</p>
        </div>
        @endforeach
    </div>
</div>
@endif
BLADE,

    '_toc' => <<<BLADE
<div class="sidebar-widget">
    <h3 class="widget-title">Table of Contents</h3>
    <ul class="widget-list toc-list">
        <li><a href="#overview">Overview</a></li>
        @if(\$surah->fazilatEntries && \$surah->fazilatEntries->count() > 0)
        <li><a href="#virtues">Virtues</a></li>
        @endif
        @if(\$surah->ayahs->count() > 0)
        <li><a href="#translations">Translations & Tafsir</a></li>
        @endif
        <li><a href="#faq">FAQ</a></li>
    </ul>
</div>
BLADE,

    '_learning-path' => <<<BLADE
@if(\$surah->learningPath)
<div class="sidebar-widget">
    <h3 class="widget-title">Learning Path</h3>
    <div class="widget-content">
        <p style="margin-bottom:10px;"><strong>Difficulty:</strong> {{ \$surah->learningPath->difficulty_level }}</p>
        <p style="margin-bottom:10px;"><strong>Estimated Time:</strong> {{ \$surah->learningPath->estimated_memorization_days }} days</p>
        <p style="font-size:0.9rem; color:#666;">{{ \$surah->learningPath->prerequisites_en }}</p>
    </div>
</div>
@endif
BLADE,

    '_entities' => <<<BLADE
@if(\$surah->entities && \$surah->entities->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Mentioned Entities</h3>
    <ul class="widget-tags">
        @foreach(\$surah->entities as \$entity)
            <li><span class="badge" style="background:#f0f0f0; padding:5px 10px; border-radius:15px; margin:2px; display:inline-block;">{{ \$entity->name_en }} ({{ \$entity->entity_type }})</span></li>
        @endforeach
    </ul>
</div>
@endif
BLADE,

    '_collections' => <<<BLADE
@if(\$surah->collections && \$surah->collections->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Collections</h3>
    <ul class="widget-list">
        @foreach(\$surah->collections as \$collection)
            <li><a href="{{ route('surah.collection', \$collection->slug) }}">{{ \$collection->name_en }}</a></li>
        @endforeach
    </ul>
</div>
@endif
BLADE,

    '_related-surahs' => <<<BLADE
@if(\$surah->relatedSurahs && \$surah->relatedSurahs->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Related Surahs</h3>
    <ul class="widget-list">
        @foreach(\$surah->relatedSurahs as \$related)
            <li>
                <a href="{{ route('surah.show', \$related->relatedSurah->slug) }}">
                    {{ \$related->relatedSurah->number }}. {{ \$related->relatedSurah->name_en }}
                </a>
                <p style="font-size:0.8rem; color:#666; margin:0;">{{ \$related->relationship_type_en }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endif
BLADE,

    '_hadiths' => <<<BLADE
@if(\$surah->hadiths && \$surah->hadiths->count() > 0)
<div class="sidebar-widget">
    <h3 class="widget-title">Related Hadiths</h3>
    <ul class="widget-list">
        @foreach(\$surah->hadiths as \$hadith)
            <li>
                <a href="{{ route('hadith.hadithShow', ['topic' => \$hadith->topic->slug ?? 'general', 'hadith' => \$hadith->slug]) }}">
                    {{ Str::limit(\$hadith->english_text, 60) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endif
BLADE,

    '_related-duas' => <<<BLADE
@if(false)
<div class="sidebar-widget">
    <h3 class="widget-title">Related Duas</h3>
    <!-- Placeholder if relationship added later -->
</div>
@endif
BLADE,

    '_downloads' => <<<BLADE
<div class="sidebar-widget">
    <h3 class="widget-title">Downloads</h3>
    <div class="surah-action-buttons" style="display:flex; flex-direction:column; gap:10px;">
        @if(\$surah->pdf_url)
            <a href="{{ \$surah->pdf_url }}" class="surah-action-btn" target="_blank" style="width:100%; text-align:center;"><i class="fas fa-file-pdf"></i> PDF Download</a>
        @endif
        @if(\$surah->audio_url)
            <a href="{{ \$surah->audio_url }}" class="surah-action-btn" target="_blank" style="width:100%; text-align:center;"><i class="fas fa-download"></i> MP3 Audio</a>
        @endif
    </div>
</div>
BLADE,
];

foreach ($partials as $name => $content) {
    file_put_contents("$dir/$name.blade.php", $content);
}

echo "Created " . count($partials) . " partials.\n";
