@extends('layouts.app')

@section('title', ($dua->seo_title ?? $dua->title_english) . ' - ' . $category->name_english)

@section('content')
<style>
    /* Premium Dua Page Styles */
    .dua-hero {
        background: linear-gradient(145deg, var(--primary-dark) 0%, var(--primary) 100%);
        padding: 60px 0 100px 0;
        position: relative;
        overflow: hidden;
    }
    .dua-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(circle at top right, rgba(212, 175, 55, 0.15), transparent 60%);
        pointer-events: none;
    }
    .dua-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .breadcrumb-nav {
        display: inline-flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 50px;
        padding: 8px 24px;
        margin-bottom: 25px;
    }
    .breadcrumb-nav a {
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: color 0.3s;
    }
    .breadcrumb-nav a:hover {
        color: var(--gold);
    }
    .breadcrumb-nav .separator {
        color: rgba(255, 255, 255, 0.5);
        margin: 0 12px;
        font-size: 0.7rem;
    }
    .breadcrumb-nav .current-page {
        color: var(--gold);
        font-weight: 600;
    }
    .hero-title-eng {
        font-family: 'Playfair Display', serif;
        color: #ffffff;
        font-size: 2.4rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 15px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }
    .hero-title-urdu {
        font-family: 'Jameel Noori Nastaleeq', 'Amiri', serif;
        color: var(--gold-light);
        font-size: 1.8rem;
        margin-bottom: 20px;
        line-height: 1.5;
    }
    .hero-meta {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 12px;
    }
    .meta-pill {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(5px);
        color: #fff;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .meta-pill i {
        color: var(--gold);
    }

    .dua-main-container {
        max-width: 900px;
        margin: -60px auto 60px auto;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }
    
    .dua-detail-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: var(--shadow-xl);
        padding: 40px;
        position: relative;
        border: 1px solid rgba(0,0,0,0.03);
        transition: var(--tr);
    }
    
    .dua-detail-card.dark-mode {
        background: #111A16;
        border-color: #1a2a22;
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    }

    .dua-utilities-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--secondary-dark);
        margin-bottom: 30px;
    }
    .dua-detail-card.dark-mode .dua-utilities-bar {
        border-bottom-color: #22332a;
    }

    .util-btn {
        background: var(--secondary);
        border: none;
        color: var(--text-medium);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }
    .util-btn:hover {
        background: var(--primary);
        color: #fff;
        transform: translateY(-2px);
    }
    .dua-detail-card.dark-mode .util-btn {
        background: #1a2a22;
        color: #a0b0a8;
    }
    .dua-detail-card.dark-mode .util-btn:hover {
        background: var(--gold);
        color: #000;
    }

    .audio-player-wrapper {
        background: var(--secondary-light);
        border: 1px solid var(--secondary-dark);
        border-radius: 12px;
        padding: 15px 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 35px;
        box-shadow: var(--shadow-sm);
    }
    .dua-detail-card.dark-mode .audio-player-wrapper {
        background: #0d1712;
        border-color: #1a2a22;
    }
    .audio-btn {
        background: var(--primary);
        color: white;
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        font-size: 1.1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px var(--primary-glow);
        transition: transform 0.2s;
    }
    .audio-btn:active {
        transform: scale(0.95);
    }
    .audio-controls {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .audio-ctrl-btn {
        background: transparent;
        border: none;
        color: var(--text-medium);
        cursor: pointer;
        font-size: 1rem;
        transition: color 0.2s;
    }
    .audio-ctrl-btn:hover { color: var(--primary); }
    .dua-detail-card.dark-mode .audio-ctrl-btn { color: #a0b0a8; }
    .dua-detail-card.dark-mode .audio-ctrl-btn:hover { color: var(--gold); }
    
    .audio-select {
        background: transparent;
        border: 1px solid #ccc;
        border-radius: 50px;
        padding: 4px 10px;
        font-size: 0.8rem;
        color: var(--text-medium);
        outline: none;
    }

    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2.2rem;
        color: var(--text-dark);
        line-height: 1.8;
        text-align: right;
        margin-bottom: 35px;
        direction: rtl;
    }
    .dua-detail-card.dark-mode .dua-arabic {
        color: #f0f0f0;
    }
    
    .content-block {
        background: var(--secondary-light);
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        border-left: 4px solid var(--gold);
    }
    .dua-detail-card.dark-mode .content-block {
        background: #0d1712;
        border-left-color: var(--gold-dark);
    }
    
    .block-title {
        color: var(--primary);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .dua-detail-card.dark-mode .block-title {
        color: var(--gold);
    }
    
    .block-text {
        color: var(--text-medium);
        font-size: 1.05rem;
        line-height: 1.7;
    }
    .dua-detail-card.dark-mode .block-text {
        color: #c0c0c0;
    }

    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px dashed var(--secondary-dark);
    }
    .dua-detail-card.dark-mode .tags-container {
        border-top-color: #22332a;
    }
    
    .tag-item {
        background: var(--secondary);
        color: var(--text-medium);
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.8rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid var(--secondary-dark);
    }
    .dua-detail-card.dark-mode .tag-item {
        background: #111A16;
        color: #a0b0a8;
        border-color: #22332a;
    }

    .nav-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        gap: 15px;
    }
    .nav-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 15px 20px;
        background: white;
        border: 1px solid var(--secondary-dark);
        border-radius: 12px;
        color: var(--primary-dark);
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
    }
    .nav-btn:hover {
        border-color: var(--primary);
        background: var(--secondary-light);
        transform: translateY(-2px);
    }
    
    /* Related Section */
    .related-section {
        margin-top: 60px;
        margin-bottom: 60px;
    }
    .related-title {
        text-align: center;
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--text-dark);
        margin-bottom: 30px;
    }
    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 15px;
    }
    .related-card {
        background: white;
        border-radius: 12px;
        padding: 16px 20px;
        border: 1px solid var(--secondary-dark);
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: var(--shadow-sm);
    }
    .related-card:hover {
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }
    .related-icon {
        width: 40px;
        height: 40px;
        background: var(--primary-subtle);
        color: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    .related-card-content {
        flex: 1;
        overflow: hidden;
    }
    .related-card-title {
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.95rem;
        line-height: 1.3;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .related-card-action {
        color: var(--text-light);
        font-size: 0.8rem;
        font-weight: 400;
    }
    .related-arrow {
        color: var(--primary);
        font-size: 0.85rem;
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.3s ease;
    }
    .related-card:hover .related-arrow {
        opacity: 1;
        transform: translateX(0);
    }
    
    /* FAQs */
    .faq-wrapper {
        margin-top: 50px;
    }
    .faq-item {
        background: white;
        border: 1px solid var(--secondary-dark);
        border-radius: 12px;
        margin-bottom: 15px;
        padding: 20px;
        box-shadow: var(--shadow-sm);
    }
    .faq-question {
        font-weight: 600;
        color: var(--text-dark);
        display: flex;
        gap: 12px;
        font-size: 1.05rem;
        margin-bottom: 10px;
    }
    .faq-question i {
        color: var(--gold);
        margin-top: 4px;
    }
    .faq-answer {
        color: var(--text-medium);
        padding-left: 28px;
        line-height: 1.7;
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        .dua-detail-card {
            padding: 25px;
        }
        .hero-title-eng {
            font-size: 1.8rem;
        }
        .dua-arabic {
            font-size: 1.8rem;
        }
        .audio-player-wrapper {
            flex-direction: column;
            gap: 15px;
        }
        .nav-buttons {
            flex-direction: column;
        }
    }

    @media print {
        .dua-hero, .dua-utilities-bar, .audio-player-wrapper, .nav-buttons, .related-section, .faq-wrapper {
            display: none !important;
        }
        .dua-detail-card {
            box-shadow: none !important;
            border: none !important;
        }
        .dua-main-container {
            margin-top: 0;
        }
    }
</style>

<!-- Hero Section -->
<div class="dua-hero">
    <div class="dua-hero-content">
        <div class="breadcrumb-nav">
            <a href="{{ route('duas.index') }}"><i class="fas fa-book-open" style="margin-right: 5px;"></i> Duas Library</a>
            <i class="fas fa-chevron-right separator"></i>
            <a href="{{ route('duas.category', $category->slug) }}" class="current-page">{{ $category->name_english }}</a>
        </div>
        
        <h1 class="hero-title-eng">{{ $dua->title_english ?? $dua->title_urdu }}</h1>
        @if($dua->title_urdu)
            <div class="hero-title-urdu">{{ $dua->title_urdu }}</div>
        @endif
        
        <div class="hero-meta">
            @if($dua->reading_time)
            <span class="meta-pill"><i class="far fa-clock"></i> {{ $dua->reading_time }} sec read</span>
            @endif
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="dua-main-container">
    <div class="dua-detail-card" id="printableDua">
        

        <!-- Audio Player -->
        @if($dua->audio_url)
        <div class="audio-player-wrapper" id="audioContainer">
            <audio id="duaAudio" src="{{ $dua->audio_url }}" preload="metadata"></audio>
            <button class="audio-btn" id="mainAudioBtn" onclick="toggleAudio()">
                <i class="fas fa-play" id="audioIcon"></i>
            </button>
            
            <div class="audio-controls">
                <div style="flex: 1; height: 6px; background: rgba(0,0,0,0.05); border-radius: 10px; position: relative; overflow: hidden;" id="progressContainer">
                    <div id="progressBar" style="height: 100%; width: 0%; background: var(--primary); border-radius: 10px; transition: width 0.1s linear;"></div>
                </div>
                
                <button class="audio-ctrl-btn" onclick="document.getElementById('duaAudio').currentTime -= 5" title="Rewind 5s"><i class="fas fa-undo-alt"></i></button>
                <button class="audio-ctrl-btn" onclick="document.getElementById('duaAudio').currentTime += 5" title="Forward 5s"><i class="fas fa-redo-alt"></i></button>
                
                <select class="audio-select" onchange="document.getElementById('duaAudio').playbackRate = this.value">
                    <option value="0.75">0.75x</option>
                    <option value="1" selected>1.0x</option>
                    <option value="1.25">1.25x</option>
                    <option value="1.5">1.5x</option>
                </select>
                
                <button class="audio-ctrl-btn" onclick="toggleAudioRepeat()" id="btnRepeat" title="Loop Audio"><i class="fas fa-sync"></i></button>
            </div>
        </div>
        @endif

        <!-- Arabic Text -->
        <div class="dua-arabic" id="duaArabicText">
            {{ $dua->arabic_text }}
        </div>
        
        <!-- Transliteration -->
        @if($dua->transliteration)
        <div class="content-block" style="border-left-color: var(--primary-light);">
            <div class="block-title"><i class="fas fa-language"></i> Transliteration</div>
            <p class="block-text" style="font-style: italic;">{{ $dua->transliteration }}</p>
        </div>
        @endif

        <!-- Translation -->
        @if($dua->translation || $dua->short_meaning)
        <div class="content-block">
            <div class="block-title"><i class="fas fa-globe"></i> English Translation</div>
            <p class="block-text" id="duaTranslation">{{ $dua->translation ?? $dua->short_meaning }}</p>
        </div>
        @endif
        
        <!-- Vocabulary -->
        @if($dua->word_by_word_translation || $dua->difficult_words_meanings)
        <div class="content-block" style="border-left-color: #3498DB;">
            <div class="block-title"><i class="fas fa-spell-check"></i> Vocabulary & Meanings</div>
            @if(is_array($dua->word_by_word_translation))
                <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 15px;" dir="rtl">
                    @foreach($dua->word_by_word_translation as $word => $meaning)
                    <div style="background: rgba(0,0,0,0.03); padding: 8px 15px; border-radius: 8px; text-align: center; border: 1px solid rgba(0,0,0,0.05);">
                        <div style="font-family: 'Amiri', serif; font-size: 1.3rem; color: var(--primary-dark);">{{ $word }}</div>
                        <div style="font-size: 0.8rem; color: var(--text-medium); margin-top: 4px;">{{ $meaning }}</div>
                    </div>
                    @endforeach
                </div>
            @endif
            @if(is_array($dua->difficult_words_meanings))
                <ul style="margin-top: 15px; padding-left: 20px; font-size: 0.95rem; color: var(--text-medium);">
                    @foreach($dua->difficult_words_meanings as $word => $meaning)
                    <li style="margin-bottom: 6px;"><strong>{{ $word }}:</strong> {{ $meaning }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        @endif
        
        <!-- Context / When to Read -->
        @if($dua->content_type === 'Hadith')
            @if($dua->narrator || $dua->chain_of_narration || $dua->book_name)
            <div class="content-block" style="border-left-color: #8E44AD;">
                <div class="block-title"><i class="fas fa-book-medical"></i> Hadith Reference & Chain</div>
                <div class="block-text" style="font-size: 0.95rem;">
                    @if($dua->narrator)<p style="margin-bottom: 8px;"><strong>Narrated by:</strong> {{ $dua->narrator }}</p>@endif
                    @if($dua->collection_name || $dua->book_name)<p style="margin-bottom: 8px;"><strong>Collection:</strong> {{ $dua->collection_name ?? $dua->book_name }} @if($dua->book_number)(Book {{ $dua->book_number }})@endif</p>@endif
                    @if($dua->chapter)<p style="margin-bottom: 8px;"><strong>Chapter:</strong> {{ $dua->chapter }}</p>@endif
                    @if($dua->chain_of_narration)<p style="font-size: 0.85rem; opacity: 0.8;"><strong>Isnad:</strong> {{ $dua->chain_of_narration }}</p>@endif
                </div>
            </div>
            @endif
        @else
            @if($dua->when_to_read || $dua->best_time || $dua->how_many_times)
            <div class="content-block" style="border-left-color: #27AE60;">
                <div class="block-title"><i class="fas fa-clock"></i> When & How to Recite</div>
                <ul style="margin:0; padding-left: 20px; font-size: 0.95rem; color: var(--text-medium);">
                    @if($dua->when_to_read)<li style="margin-bottom: 6px;"><strong>When to Read:</strong> {{ $dua->when_to_read }}</li>@endif
                    @if($dua->best_time)<li style="margin-bottom: 6px;"><strong>Best Time:</strong> {{ $dua->best_time }}</li>@endif
                    @if($dua->how_many_times)<li style="margin-bottom: 6px;"><strong>Repetitions:</strong> {{ $dua->how_many_times }} times</li>@endif
                    @if($dua->daily_routine_placement)<li style="margin-bottom: 6px;"><strong>Routine:</strong> {{ $dua->daily_routine_placement }}</li>@endif
                </ul>
            </div>
            @endif
        @endif

        <!-- Explanations & Virtues -->
        @if($dua->detailed_explanation || $dua->virtues || $dua->benefits)
        <div class="content-block" style="border-left-color: var(--gold); background: rgba(212, 175, 55, 0.04);">
            <div class="block-title"><i class="fas fa-star"></i> Virtues & Explanation</div>
            @if($dua->virtues || $dua->benefits)
                <p class="block-text" style="margin-bottom: 15px;">{!! nl2br(e($dua->virtues ?? $dua->benefits)) !!}</p>
            @endif
            @if($dua->detailed_explanation)
                <p class="block-text" style="font-size: 0.95rem;">{!! nl2br(e($dua->detailed_explanation)) !!}</p>
            @endif
            @if($dua->lessons_learned)
                <div style="margin-top: 15px; font-weight: 600; font-size: 0.95rem; color: var(--primary-dark);">Key Lessons:</div>
                <p class="block-text" style="font-size: 0.9rem;">{!! nl2br(e($dua->lessons_learned)) !!}</p>
            @endif
        </div>
        @endif

        <!-- Warnings / Notes -->
        @if($dua->authenticity_notes || $dua->important_notes || $dua->common_mistakes)
        <div class="content-block" style="border-left-color: #E74C3C; background: rgba(231, 76, 60, 0.04);">
            <div class="block-title" style="color: #E74C3C;"><i class="fas fa-exclamation-circle"></i> Important Notes</div>
            <ul style="margin:0; padding-left: 20px; font-size: 0.95rem; color: var(--text-medium);">
                @if($dua->authenticity_notes)<li style="margin-bottom: 6px;"><strong>Authenticity:</strong> {{ $dua->authenticity_notes }}</li>@endif
                @if($dua->important_notes)<li style="margin-bottom: 6px;"><strong>Note:</strong> {{ $dua->important_notes }}</li>@endif
                @if($dua->common_mistakes)<li style="margin-bottom: 6px;"><strong>Common Mistakes:</strong> {{ $dua->common_mistakes }}</li>@endif
            </ul>
        </div>
        @endif
        
        <!-- Tags & References -->
        <div class="tags-container">
            @if($dua->reference_source)
                <span class="tag-item"><i class="fas fa-bookmark" style="color: var(--gold);"></i> {{ $dua->reference_source }}</span>
            @endif
            @if($dua->authenticity)
                <span class="tag-item"><i class="fas fa-check-circle" style="color: #27AE60;"></i> {{ $dua->authenticity }}</span>
            @endif
            @if($dua->hadith_reference)
                <span class="tag-item"><i class="fas fa-book"></i> {{ $dua->hadith_reference }}</span>
            @endif
            @if($dua->quran_reference)
                <span class="tag-item"><i class="fas fa-quran" style="color: var(--primary);"></i> {{ $dua->quran_reference }}</span>
            @endif
            @if(is_array($dua->tags))
                @foreach($dua->tags as $tag)
                <span class="tag-item"><i class="fas fa-hashtag" style="opacity: 0.5;"></i> {{ $tag }}</span>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        @if($previousDua)
        <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $previousDua->seo_slug ?? $previousDua->id]) }}" class="nav-btn">
            <i class="fas fa-arrow-left"></i> 
            <span style="flex:1; text-align: left;">
                <div style="font-size: 0.75rem; color: var(--text-light); text-transform: uppercase;">Previous</div>
                <div style="font-size: 0.95rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 200px;">{{ $previousDua->title_english ?? 'Dua' }}</div>
            </span>
        </a>
        @else
        <div style="flex:1;"></div>
        @endif

        @if($nextDua)
        <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $nextDua->seo_slug ?? $nextDua->id]) }}" class="nav-btn">
            <span style="flex:1; text-align: right;">
                <div style="font-size: 0.75rem; color: var(--text-light); text-transform: uppercase;">Next</div>
                <div style="font-size: 0.95rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 200px;">{{ $nextDua->title_english ?? 'Dua' }}</div>
            </span>
            <i class="fas fa-arrow-right"></i>
        </a>
        @else
        <div style="flex:1;"></div>
        @endif
    </div>

    <!-- FAQs -->
    @if(!empty($faqs))
    <div class="faq-wrapper">
        <h3 style="font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--text-dark); margin-bottom: 25px;">Common Questions</h3>
        @foreach($faqs as $faq)
        <div class="faq-item">
            <div class="faq-question">
                <i class="fas fa-question-circle"></i> 
                <span>{{ $faq['question'] }}</span>
            </div>
            <div class="faq-answer">{{ $faq['answer'] }}</div>
        </div>
        @endforeach
    </div>
    @endif

</div>

<!-- Related Duas Section (Full Width Background) -->
@if($relatedDuas->isNotEmpty())
<div style="background: var(--secondary); padding: 1px 0;">
    <div class="section-inner related-section">
        <h2 class="related-title">Explore More in {{ $category->name_english }}</h2>
        <div class="related-grid">
            @foreach($relatedDuas as $related)
            <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $related->seo_slug ?? $related->id]) }}" class="related-card">
                <div class="related-icon">
                    <i class="fas {{ ($related->content_type ?? '') === 'Hadith' ? 'fa-book-reader' : 'fa-praying-hands' }}"></i>
                </div>
                <div class="related-card-content">
                    <h3 class="related-card-title">{{ $related->title_english ?? $related->title_urdu }}</h3>
                    <div class="related-card-action">
                        Read {{ $related->content_type ?? 'Supplication' }}
                    </div>
                </div>
                <i class="fas fa-chevron-right related-arrow"></i>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection

@section('meta')
<link rel="canonical" href="{{ $dua->canonical_url ?? url()->current() }}" />
@if($dua->meta_description)
    <meta name="description" content="{{ $dua->meta_description }}">
@endif
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $dua->seo_title ?? $dua->title_english }} | {{ $category->name_english }}",
      "description": "{{ $dua->meta_description ?? 'Read the authentic ' . ($dua->title_english ?? 'dua') . ' including Arabic, Transliteration, and English Translation.' }}",
      "breadcrumb": {
        "@@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@@type": "ListItem",
            "position": 1,
            "name": "Duas Library",
            "item": "{{ route('duas.index') }}"
          },
          {
            "@@type": "ListItem",
            "position": 2,
            "name": "{{ $category->name_english }}",
            "item": "{{ route('duas.category', $category->slug) }}"
          },
          {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $dua->title_english ?? $dua->title_urdu }}",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    },
    {
      "@@type": "Article",
      "headline": "{{ $dua->title_english ?? $dua->title_urdu }}",
      "articleSection": "{{ $category->name_english }}",
      "articleBody": "{{ strip_tags($dua->translation ?? $dua->short_meaning ?? $dua->arabic_text) }}",
      "author": {
         "@@type": "Organization",
         "name": "Noor-e-Islam"
      }
    }
    @if(!empty($faqs))
    ,{
      "@@type": "FAQPage",
      "mainEntity": [
        @foreach($faqs as $index => $faq)
        {
          "@@type": "Question",
          "name": "{{ $faq['question'] }}",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "{{ $faq['answer'] }}"
          }
        }{{ $index < count($faqs) - 1 ? ',' : '' }}
        @endforeach
      ]
    }
    @endif
  ]
}
</script>
<script>
    // Font Sizer
    let currentFontSize = 2.2;
    function changeFontSize(step) {
        currentFontSize += step * 0.2;
        if(currentFontSize < 1.5) currentFontSize = 1.5;
        if(currentFontSize > 3.5) currentFontSize = 3.5;
        document.getElementById('duaArabicText').style.fontSize = currentFontSize + 'rem';
    }

    // Dark Mode Toggle
    function toggleDarkMode() {
        const card = document.getElementById('printableDua');
        const icon = document.getElementById('darkModeIcon');
        card.classList.toggle('dark-mode');
        
        if (card.classList.contains('dark-mode')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            document.body.style.background = '#0a100d'; // Darken the page background too for better effect
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            document.body.style.background = 'var(--secondary-light)';
        }
    }

    // Utilities
    function copyDuaText() {
        const text = document.getElementById('duaArabicText').innerText;
        navigator.clipboard.writeText(text).then(() => {
            if(typeof showToast === 'function') {
                showToast('Dua copied to clipboard!', 'success');
            } else {
                alert('Dua copied to clipboard!');
            }
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }
    
    function sharePage() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $dua->title_english ?? $dua->title_urdu }}',
                text: 'Read this beautiful {{ $dua->content_type ?? "supplication" }} on Noor-e-Islam.',
                url: window.location.href,
            }).catch((error) => console.log('Error sharing', error));
        } else {
            navigator.clipboard.writeText(window.location.href);
            if(typeof showToast === 'function') {
                showToast("Link copied to share!", 'success');
            } else {
                alert("Link copied to share!");
            }
        }
    }

    // Audio Player Logic
    const audio = document.getElementById('duaAudio');
    let isPlaying = false;
    let isRepeating = false;
    
    if(audio) {
        const progressBar = document.getElementById('progressBar');
        
        function toggleAudio() {
            const icon = document.getElementById('audioIcon');
            
            if (isPlaying) {
                audio.pause();
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
            } else {
                audio.play();
                icon.classList.remove('fa-play');
                icon.classList.add('fa-pause');
            }
            isPlaying = !isPlaying;
        }
        
        audio.addEventListener('timeupdate', () => {
            const progress = (audio.currentTime / audio.duration) * 100;
            progressBar.style.width = `${progress}%`;
        });
        
        audio.onended = function() {
            if (isRepeating) {
                audio.currentTime = 0;
                audio.play();
            } else {
                isPlaying = false;
                document.getElementById('audioIcon').classList.remove('fa-pause');
                document.getElementById('audioIcon').classList.add('fa-play');
                progressBar.style.width = '0%';
            }
        };
    }
    
    function toggleAudioRepeat() {
        isRepeating = !isRepeating;
        const btn = document.getElementById('btnRepeat');
        if (isRepeating) {
            btn.style.color = 'var(--primary)';
        } else {
            btn.style.color = '';
        }
    }
</script>
@endsection
