<?php $__env->startSection('title', ($dua->seo_title ?? $dua->title_english) . ' - ' . $category->name_english); ?>

<?php $__env->startSection('content'); ?>
<style>
    .dua-detail-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 25px;
        position: relative;
        overflow: hidden;
        transition: background 0.3s, color 0.3s;
    }
    .dua-detail-card.dark-mode {
        background: #1a1a2e;
        border-color: #2a2a4a;
        color: #e0e0e0;
    }
    .dua-detail-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--gold), var(--primary-light));
    }
    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.6;
        margin-bottom: 20px;
        text-align: right;
        background: linear-gradient(135deg, var(--primary-dark), #111);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        transition: font-size 0.2s;
    }
    .dua-detail-card.dark-mode .dua-arabic {
        background: linear-gradient(135deg, #e0e0e0, #fff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .dua-utilities {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 10px;
        margin-bottom: 25px;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 15px;
    }
    .dua-detail-card.dark-mode .dua-utilities {
        border-bottom-color: #333;
    }
    .btn-utility {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        color: #555;
        border-radius: 50px;
        padding: 6px 15px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
    }
    .btn-utility:hover {
        background: #e9ecef;
        color: var(--primary);
    }
    .dua-detail-card.dark-mode .btn-utility {
        background: #2a2a4a;
        border-color: #3a3a5a;
        color: #ccc;
    }
    .dua-detail-card.dark-mode .btn-utility:hover {
        background: #3a3a5a;
        color: var(--gold);
    }
    .translation-box {
        margin-bottom: 20px;
        background: #fdfdfd;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #f0f0f0;
    }
    .dua-detail-card.dark-mode .translation-box {
        background: #161625;
        border-color: #2a2a4a;
    }
    .translation-label {
        color: var(--primary);
        margin-bottom: 8px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .dua-detail-card.dark-mode .translation-label {
        color: var(--gold);
    }
    .translation-text {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }
    .dua-detail-card.dark-mode .translation-text {
        color: #ccc;
    }
    .reference-tag {
        font-size: 0.75rem;
        color: #888;
        background: #f9f9f9;
        padding: 6px 12px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #eee;
        font-weight: 500;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .dua-detail-card.dark-mode .reference-tag {
        background: #222;
        border-color: #333;
        color: #bbb;
    }
    .breadcrumb-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
    }
    .breadcrumb-nav {
        display: inline-flex;
        align-items: center;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 50px;
        padding: 8px 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .breadcrumb-nav a {
        color: #666;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: color 0.2s;
    }
    .breadcrumb-nav a:hover {
        color: var(--primary);
    }
    .breadcrumb-nav .separator {
        color: #ccc;
        margin: 0 10px;
        font-size: 0.7rem;
    }
    .breadcrumb-nav .current-page {
        color: var(--primary);
        font-weight: 600;
    }
    .audio-controls {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px dashed #eee;
    }
    .dua-detail-card.dark-mode .audio-controls {
        border-top-color: #333;
    }
    .nav-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    .faq-item {
        background: #fff;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
    }
    .faq-question {
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 5px;
    }
    @media print {
        header, footer, .breadcrumb-wrapper, .dua-utilities, .section-related, .nav-buttons, .audio-controls {
            display: none !important;
        }
        .dua-detail-card {
            box-shadow: none;
            border: none;
        }
        .translation-box { break-inside: avoid; }
    }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb-nav">
                <a href="<?php echo e(route('duas.index')); ?>" class="parent-link"><i class="fas fa-book-open" style="margin-right: 5px;"></i> Duas Library</a>
                <i class="fas fa-chevron-right separator"></i>
                <a href="<?php echo e(route('duas.category', $category->slug)); ?>" class="current-page"><?php echo e($category->name_english); ?></a>
            </div>
        </div>

        <div style="max-width: 800px; margin: 0 auto;">
            <h1 style="color: var(--primary-dark); font-size: 1.8rem; margin-bottom: 5px; text-align: center;"><?php echo e($dua->title_english ?? $dua->title_urdu); ?></h1>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->title_urdu): ?>
                <p style="text-align: center; color: #777; font-size: 1.1rem; margin-bottom: 30px; font-family: 'Jameel Noori Nastaleeq', serif;"><?php echo e($dua->title_urdu); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <div style="text-align: center; margin-bottom: 20px;">
                <span class="reference-tag" style="background: rgba(var(--primary-rgb), 0.1); color: var(--primary); border-color: var(--primary-light);">
                    <i class="fas <?php echo e($dua->content_type === 'Hadith' ? 'fa-book-reader' : 'fa-hands-praying'); ?>"></i> 
                    <?php echo e($dua->content_type ?? 'Prophetic Dua'); ?>

                </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->reading_time): ?>
                <span class="reference-tag"><i class="far fa-clock"></i> <?php echo e($dua->reading_time); ?> sec read</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->verified_status): ?>
                <span class="reference-tag"><i class="fas fa-shield-alt" style="color: green;"></i> Verified Authentic</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="dua-detail-card" id="printableDua">
                
                <div class="dua-utilities">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->audio_url): ?>
                        <button class="btn-utility" onclick="toggleAudio()"><i class="fas fa-play" id="playIcon"></i> Listen</button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->audio_url): ?>
                <div class="audio-controls" id="audioControls" style="display:none; justify-content: center; margin-bottom: 25px; background: rgba(var(--primary-rgb), 0.05); padding: 15px; border-radius: 8px;">
                    <audio id="duaAudio" src="<?php echo e($dua->audio_url); ?>" preload="metadata"></audio>
                    <button class="btn-utility" onclick="document.getElementById('duaAudio').currentTime -= 5" title="Rewind 5s"><i class="fas fa-undo"></i></button>
                    <button class="btn-utility" id="audioMainBtn" onclick="toggleAudio()" style="background: var(--primary); color: white;"><i class="fas fa-pause"></i> Pause</button>
                    <button class="btn-utility" onclick="document.getElementById('duaAudio').currentTime += 5" title="Forward 5s"><i class="fas fa-redo"></i></button>
                    <select class="btn-utility" onchange="document.getElementById('duaAudio').playbackRate = this.value" style="appearance: auto; padding-right: 5px;">
                        <option value="0.75">0.75x</option>
                        <option value="1" selected>1x Speed</option>
                        <option value="1.25">1.25x</option>
                        <option value="1.5">1.5x</option>
                    </select>
                    <button class="btn-utility" onclick="toggleAudioRepeat()" id="btnRepeat" title="Loop"><i class="fas fa-sync"></i></button>
                    <a href="<?php echo e($dua->audio_url); ?>" download class="btn-utility" title="Download Audio"><i class="fas fa-download"></i></a>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="dua-arabic" dir="rtl" id="duaArabicText">
                    <?php echo e($dua->arabic_text); ?>

                </div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->transliteration): ?>
                <div class="translation-box" style="background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.05), rgba(var(--gold-rgb), 0.01)); border-left: 3px solid var(--gold);">
                    <div class="translation-label"><i class="fas fa-language"></i> Transliteration</div>
                    <p class="translation-text" style="font-style: italic;"><?php echo e($dua->transliteration); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->translation || $dua->short_meaning): ?>
                <div class="translation-box">
                    <div class="translation-label"><i class="fas fa-globe"></i> English Translation</div>
                    <p class="translation-text" id="duaTranslation"><?php echo e($dua->translation ?? $dua->short_meaning); ?></p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->word_by_word_translation || $dua->difficult_words_meanings): ?>
                <div class="translation-box">
                    <div class="translation-label"><i class="fas fa-spell-check"></i> Vocabulary & Meanings</div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($dua->word_by_word_translation)): ?>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;" dir="rtl">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dua->word_by_word_translation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $word => $meaning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div style="background: rgba(0,0,0,0.03); padding: 5px 10px; border-radius: 5px; text-align: center;">
                                <div style="font-family: 'Amiri', serif; font-size: 1.2rem; color: var(--primary-dark);"><?php echo e($word); ?></div>
                                <div style="font-size: 0.75rem; color: #666;"><?php echo e($meaning); ?></div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($dua->difficult_words_meanings)): ?>
                        <ul style="margin-top: 10px; padding-left: 20px; font-size: 0.9rem; color: #555;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dua->difficult_words_meanings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $word => $meaning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li><strong><?php echo e($word); ?>:</strong> <?php echo e($meaning); ?></li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </ul>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->content_type === 'Hadith'): ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->narrator || $dua->chain_of_narration): ?>
                    <div class="translation-box">
                        <div class="translation-label"><i class="fas fa-users"></i> Chain of Narration (Isnad)</div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->narrator): ?>
                        <p class="translation-text" style="margin-bottom: 5px;"><strong>Narrated by:</strong> <?php echo e($dua->narrator); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->chain_of_narration): ?>
                        <p class="translation-text" style="font-size: 0.85rem; color: #777;"><strong>Full Chain:</strong> <?php echo e($dua->chain_of_narration); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->book_name || $dua->chapter): ?>
                    <div class="translation-box">
                        <div class="translation-label"><i class="fas fa-book-medical"></i> Collection Details</div>
                        <ul style="margin:0; padding-left: 20px; font-size: 0.9rem; color: #555;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->collection_name || $dua->book_name): ?><li><strong>Collection:</strong> <?php echo e($dua->collection_name ?? $dua->book_name); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->book_number): ?><li><strong>Book Number:</strong> <?php echo e($dua->book_number); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->chapter): ?><li><strong>Chapter:</strong> <?php echo e($dua->chapter); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->chapter_number): ?> (#<?php echo e($dua->chapter_number); ?>) <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php else: ?>
                
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->when_to_read || $dua->best_time || $dua->how_many_times): ?>
                    <div class="translation-box" style="border-left: 3px solid #28a745;">
                        <div class="translation-label"><i class="fas fa-clock" style="color: #28a745;"></i> When & How to Recite</div>
                        <ul style="margin:0; padding-left: 20px; font-size: 0.9rem; color: #555;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->when_to_read): ?><li><strong>When to Read:</strong> <?php echo e($dua->when_to_read); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->best_time): ?><li><strong>Best Time:</strong> <?php echo e($dua->best_time); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->how_many_times): ?><li><strong>How Many Times:</strong> <?php echo e($dua->how_many_times); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->daily_routine_placement): ?><li><strong>Daily Routine:</strong> <?php echo e($dua->daily_routine_placement); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->detailed_explanation || $dua->lessons_learned): ?>
                <div class="translation-box" style="background: #fafafa;">
                    <div class="translation-label"><i class="fas fa-info-circle"></i> Explanation (Sharh) & Lessons</div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->detailed_explanation): ?>
                    <p class="translation-text" style="margin-bottom: 10px;"><?php echo nl2br(e($dua->detailed_explanation)); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->lessons_learned): ?>
                    <div style="font-weight: 600; font-size: 0.9rem; margin-top: 10px; color: var(--primary-dark);">Key Lessons:</div>
                    <p class="translation-text" style="font-size: 0.9rem;"><?php echo nl2br(e($dua->lessons_learned)); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->virtues || $dua->benefits || $dua->practical_benefits): ?>
                <div class="translation-box" style="border-left: 3px solid var(--primary-light);">
                    <div class="translation-label"><i class="fas fa-star"></i> Virtues & Practical Benefits</div>
                    <p class="translation-text"><?php echo nl2br(e($dua->virtues ?? $dua->benefits)); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->practical_benefits): ?>
                    <p class="translation-text" style="margin-top: 10px; font-size: 0.9rem;"><strong>Practical Application:</strong> <?php echo nl2br(e($dua->practical_benefits)); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->authenticity_notes || $dua->important_notes || $dua->common_mistakes): ?>
                <div class="translation-box" style="border-left: 3px solid #dc3545;">
                    <div class="translation-label" style="color: #dc3545;"><i class="fas fa-exclamation-triangle"></i> Important Notes</div>
                    <ul style="margin:0; padding-left: 20px; font-size: 0.9rem; color: #555;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->authenticity_notes): ?><li><strong>Authenticity Note:</strong> <?php echo e($dua->authenticity_notes); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->important_notes): ?><li><strong>Important:</strong> <?php echo e($dua->important_notes); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->common_mistakes): ?><li><strong>Common Mistakes:</strong> <?php echo e($dua->common_mistakes); ?></li><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <div style="margin-top: 30px; padding-top: 25px; border-top: 1px dashed #eee; display: flex; flex-wrap: wrap; gap: 5px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->reference_source): ?>
                        <span class="reference-tag"><i class="fas fa-bookmark" style="color: var(--gold);"></i> <?php echo e($dua->reference_source); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->authenticity): ?>
                        <span class="reference-tag"><i class="fas fa-check-circle" style="color: green;"></i> Grade: <?php echo e($dua->authenticity); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->scholar_authentication): ?> (<?php echo e($dua->scholar_authentication); ?>) <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->hadith_reference): ?>
                        <span class="reference-tag"><i class="fas fa-book"></i> <?php echo e($dua->hadith_reference); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->quran_reference): ?>
                        <span class="reference-tag"><i class="fas fa-quran" style="color: var(--primary);"></i> <?php echo e($dua->quran_reference); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($dua->tags)): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dua->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <span class="reference-tag"><i class="fas fa-tag"></i> <?php echo e($tag); ?></span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                <div style="margin-top: 15px; font-size: 0.75rem; color: #aaa; text-align: right;">
                    Last updated: <?php echo e($dua->updated_at->format('M d, Y')); ?>

                </div>
            </div>

            <!-- FAQs -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($faqs)): ?>
            <div style="margin-top: 40px;">
                <h3 style="font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 20px; font-weight: 600;">
                    Frequently Asked Questions
                </h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="faq-item">
                    <div class="faq-question"><i class="fas fa-question-circle" style="color: var(--primary); margin-right: 5px;"></i> <?php echo e($faq['question']); ?></div>
                    <div style="color: #666; font-size: 0.95rem; line-height: 1.5; margin-left: 20px;"><?php echo e($faq['answer']); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <!-- Navigation -->
            <div class="nav-buttons">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($previousDua): ?>
                <a href="<?php echo e(route('duas.show', ['category' => $category->slug, 'seo_slug' => $previousDua->seo_slug ?? $previousDua->id])); ?>" class="btn-utility" style="padding: 10px 20px;">
                    <i class="fas fa-arrow-left"></i> Previous <?php echo e($previousDua->content_type ?? 'Dua'); ?>

                </a>
                <?php else: ?>
                <div></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextDua): ?>
                <a href="<?php echo e(route('duas.show', ['category' => $category->slug, 'seo_slug' => $nextDua->seo_slug ?? $nextDua->id])); ?>" class="btn-utility" style="padding: 10px 20px;">
                    Next <?php echo e($nextDua->content_type ?? 'Dua'); ?> <i class="fas fa-arrow-right"></i>
                </a>
                <?php else: ?>
                <div></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- SEO INTERNAL LINKING: RELATED DUAS -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedDuas->isNotEmpty()): ?>
            <div class="section-related" style="margin-top: 60px;">
                <h3 style="font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 20px; text-align: center; font-weight: 600;">
                    Explore More in <?php echo e($category->name_english); ?>

                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedDuas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('duas.show', ['category' => $category->slug, 'seo_slug' => $related->seo_slug ?? $related->id])); ?>" style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 20px; text-decoration: none; display: flex; align-items: center; gap: 15px; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0,0,0,0.02);" onmouseover="this.style.borderColor='var(--primary)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.05)';" onmouseout="this.style.borderColor='#eee'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.02)';">
                        <div style="background: rgba(var(--primary-rgb), 0.05); color: var(--primary); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0;">
                            <i class="fas <?php echo e(($related->content_type ?? '') === 'Hadith' ? 'fa-book-reader' : 'fa-praying-hands'); ?>"></i>
                        </div>
                        <div>
                            <div style="color: #333; font-weight: 600; font-size: 0.95rem; line-height: 1.3; margin-bottom: 4px;"><?php echo e(Str::limit($related->title_english ?? $related->title_urdu, 45)); ?></div>
                            <div style="color: #999; font-size: 0.75rem;">Read <?php echo e($related->content_type ?? 'Supplication'); ?> &rarr;</div>
                        </div>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
<link rel="canonical" href="<?php echo e($dua->canonical_url ?? url()->current()); ?>" />
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->meta_description): ?>
    <meta name="description" content="<?php echo e($dua->meta_description); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>",
      "url": "<?php echo e(url()->current()); ?>",
      "name": "<?php echo e($dua->seo_title ?? $dua->title_english); ?> | <?php echo e($category->name_english); ?>",
      "description": "<?php echo e($dua->meta_description ?? 'Read the authentic ' . ($dua->title_english ?? 'dua') . ' including Arabic, Transliteration, and English Translation.'); ?>",
      "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Duas Library",
            "item": "<?php echo e(route('duas.index')); ?>"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "<?php echo e($category->name_english); ?>",
            "item": "<?php echo e(route('duas.category', $category->slug)); ?>"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "<?php echo e($dua->title_english ?? $dua->title_urdu); ?>",
            "item": "<?php echo e(url()->current()); ?>"
          }
        ]
      }
    },
    {
      "@type": "Article",
      "headline": "<?php echo e($dua->title_english ?? $dua->title_urdu); ?>",
      "articleSection": "<?php echo e($category->name_english); ?>",
      "articleBody": "<?php echo e(strip_tags($dua->translation ?? $dua->short_meaning ?? $dua->arabic_text)); ?>",
      "author": {
         "@type": "Organization",
         "name": "Islamic Web Platform"
      }
    }
    <?php if(!empty($faqs)): ?>
    ,{
      "@type": "FAQPage",
      "mainEntity": [
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
          "@type": "Question",
          "name": "<?php echo e($faq['question']); ?>",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "<?php echo e($faq['answer']); ?>"
          }
        }<?php echo e($index < count($faqs) - 1 ? ',' : ''); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ]
    }
    <?php endif; ?>
  ]
}
</script>
<script>
    let currentFontSize = 2;
    function changeFontSize(step) {
        currentFontSize += step * 0.2;
        if(currentFontSize < 1.5) currentFontSize = 1.5;
        if(currentFontSize > 3.5) currentFontSize = 3.5;
        document.getElementById('duaArabicText').style.fontSize = currentFontSize + 'rem';
    }

    function toggleDarkMode() {
        const card = document.getElementById('printableDua');
        const icon = document.getElementById('darkModeIcon');
        card.classList.toggle('dark-mode');
        if (card.classList.contains('dark-mode')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    }

    function copyToClipboard(elementId, typeLabel) {
        const text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert(typeLabel + ' copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy: ', err);
            alert('Failed to copy. Please select and copy manually.');
        });
    }
    
    function sharePage() {
        if (navigator.share) {
            navigator.share({
                title: '<?php echo e($dua->title_english ?? $dua->title_urdu); ?>',
                text: 'Read this beautiful <?php echo e($dua->content_type ?? "supplication"); ?> on Noor-e-Islam.',
                url: window.location.href,
            })
            .catch((error) => console.log('Error sharing', error));
        } else {
            // Fallback
            copyToClipboard(window.location.href, 'Link');
            alert("Link copied to share!");
        }
    }

    let isPlaying = false;
    let isRepeating = false;
    
    function toggleAudio() {
        const audio = document.getElementById('duaAudio');
        if (!audio) return;
        
        const controls = document.getElementById('audioControls');
        const mainBtnIcon = document.getElementById('playIcon');
        const internalBtn = document.getElementById('audioMainBtn');
        
        controls.style.display = 'flex';
        
        if (isPlaying) {
            audio.pause();
            if(mainBtnIcon) { mainBtnIcon.classList.remove('fa-pause'); mainBtnIcon.classList.add('fa-play'); }
            internalBtn.innerHTML = '<i class="fas fa-play"></i> Play';
        } else {
            audio.play();
            if(mainBtnIcon) { mainBtnIcon.classList.remove('fa-play'); mainBtnIcon.classList.add('fa-pause'); }
            internalBtn.innerHTML = '<i class="fas fa-pause"></i> Pause';
        }
        isPlaying = !isPlaying;
        
        audio.onended = function() {
            if (isRepeating) {
                audio.currentTime = 0;
                audio.play();
            } else {
                isPlaying = false;
                if(mainBtnIcon) { mainBtnIcon.classList.remove('fa-pause'); mainBtnIcon.classList.add('fa-play'); }
                internalBtn.innerHTML = '<i class="fas fa-play"></i> Play';
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/duas/show.blade.php ENDPATH**/ ?>