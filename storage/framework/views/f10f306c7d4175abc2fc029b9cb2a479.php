<?php $__env->startSection('title', 'Surah ' . $surah->name_en . ' (' . $surah->number . ') — Read Online Arabic with Urdu & English Translation'); ?>
<?php $__env->startSection('meta_description', 'Read Surah ' . $surah->name_en . ' (' . $surah->name_ar . ') online with complete Arabic text, Urdu and English translation. ' . $surah->ayah_count . ' Ayahs, ' . $surah->revelation_place . ' Surah, Juz ' . $surah->para_juz . '. Listen to audio recitation and download PDF.'); ?>

<?php
if (!function_exists('ordinal')) {
    function ordinal($number) {
        $suffixes = ['th','st','nd','rd','th','th','th','th','th','th'];
        if (($number % 100) >= 11 && ($number % 100) <= 13) return $number . 'th';
        return $number . $suffixes[$number % 10];
    }
}
?>

<?php $__env->startSection('content'); ?>
<style>
    .surah-page-nav-wrapper {
        position: sticky;
        top: 80px; /* Adjust based on your main header height */
        z-index: 100;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border-radius: 50px;
        margin: 30px auto;
        max-width: 900px;
        padding: 5px;
        display: flex;
        overflow-x: auto;
        scrollbar-width: none; /* Firefox */
    }
    .surah-page-nav-wrapper::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }
    .surah-page-nav {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 0 auto;
    }
    .surah-nav-link {
        padding: 10px 20px;
        color: #555;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        border-radius: 50px;
        white-space: nowrap;
        transition: all 0.3s ease;
    }
    .surah-nav-link:hover, .surah-nav-link.active {
        background: var(--primary);
        color: white;
    }
    html {
        scroll-behavior: smooth;
    }
    /* Add scroll margin for sticky nav offset */
    #overview, #virtues, #audioPlayer, #mushaf, #arabic-text, #translations, #faq {
        scroll-margin-top: 150px;
    }
</style>
<section class="section services-section" style="padding-top: 50px;">
    <div class="section-inner">

        
        <div class="breadcrumb" style="text-align: center; margin-bottom: 35px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a>
                <span style="color: #ccc; margin: 0 8px;">/</span>
                <a href="<?php echo e(route('quran.index')); ?>" style="color: var(--primary); text-decoration: none;">Quran</a>
                <span style="color: #ccc; margin: 0 8px;">/</span>
                <a href="<?php echo e(route('surah.index')); ?>" style="color: var(--primary); text-decoration: none;">Surahs</a>
                <span style="color: #ccc; margin: 0 8px;">/</span>
                <span style="color: #666; font-weight: 600;">Surah <?php echo e($surah->name_en); ?></span>
            </div>
        </div>

        
        <div class="surah-detail-hero">
            <div class="surah-detail-hero-bg"></div>
            <div class="surah-detail-hero-content">
                <div class="surah-detail-number-badge"><?php echo e($surah->number); ?></div>
                <h1 class="surah-detail-title-ar">سورة <?php echo e($surah->name_ar); ?></h1>
                <div class="arabic-divider" style="margin: 10px 0;">
                    <span class="line" style="background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);"></span>
                    <span class="symbol" style="color: var(--gold-light);">﷽</span>
                    <span class="line" style="background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);"></span>
                </div>
                <h2 class="surah-detail-title-en">Surah <?php echo e($surah->name_en); ?></h2>
                <p class="surah-detail-title-ur"><?php echo e($surah->name_ur); ?></p>
            </div>

            
            <div class="surah-stat-pills">
                <div class="surah-stat-pill">
                    <i class="fas fa-list-ol"></i>
                    <div>
                        <span class="pill-value"><?php echo e($surah->ayah_count); ?></span>
                        <span class="pill-label">Ayahs</span>
                    </div>
                </div>
                <div class="surah-stat-pill">
                    <i class="fas fa-bookmark"></i>
                    <div>
                        <span class="pill-value"><?php echo e($surah->para_juz); ?></span>
                        <span class="pill-label">Juz/Para</span>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ruku_count): ?>
                <div class="surah-stat-pill">
                    <i class="fas fa-layer-group"></i>
                    <div>
                        <span class="pill-value"><?php echo e($surah->ruku_count); ?></span>
                        <span class="pill-label">Rukus</span>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <div class="surah-stat-pill">
                    <i class="fas <?php echo e(($surah->revelation_place == 'Madani') ? 'fa-mosque' : 'fa-kaaba'); ?>"></i>
                    <div>
                        <span class="pill-value"><?php echo e($surah->revelation_place); ?></span>
                        <span class="pill-label">Revealed In</span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="surah-action-buttons">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->audio_url): ?>
                <a href="#audioPlayer" class="surah-action-btn"><i class="fas fa-headphones"></i> Listen Audio</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->pdf_url): ?>
                <a href="<?php echo e($surah->pdf_url); ?>" class="surah-action-btn" target="_blank"><i class="fas fa-file-pdf"></i> Download PDF</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <button class="surah-action-btn" onclick="shareSurah()"><i class="fas fa-share-alt"></i> Share</button>
        </div>

        
        <div class="surah-page-nav-wrapper">
            <nav class="surah-page-nav">
                <a href="#overview" class="surah-nav-link">Overview</a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->fazilatEntries && $surah->fazilatEntries->count() > 0): ?>
                <a href="#virtues" class="surah-nav-link">Virtues & Benefits</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->audio_url): ?>
                <a href="#audioPlayer" class="surah-nav-link">Audio</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($mushafPages)): ?>
                <a href="#mushaf" class="surah-nav-link">Mushaf</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->arabic_text): ?>
                <a href="#arabic-text" class="surah-nav-link">Arabic Text</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ayahs->count() > 0): ?>
                <a href="#translations" class="surah-nav-link">Translations</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="#faq" class="surah-nav-link">FAQ</a>
            </nav>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->reviews->count() > 0): ?>
            <?php $review = $surah->reviews->first(); ?>
            <div style="text-align: center; margin-bottom: 35px;">
                <div style="display: inline-flex; align-items: center; background: #e8f5e9; color: #2e7d32; padding: 8px 20px; border-radius: 50px; font-size: 0.95rem; border: 1px solid #c8e6c9;">
                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                    <span>Verified by <strong><?php echo e($review->scholar->name); ?></strong> (<?php echo e($review->scholar->credential); ?>)</span>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div id="overview"></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->number != 9): ?>
        <div class="surah-bismillah">
            بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->fazilatEntries && $surah->fazilatEntries->count() > 0): ?>
        <div class="surah-content-card" id="virtues" style="margin-top: 30px;">
            <div class="surah-content-card-header">
                <i class="fas fa-star" style="color: var(--gold);"></i>
                <h3>Virtues & Benefits (Fazilat)</h3>
            </div>
            <div style="padding: 30px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surah->fazilatEntries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fazilat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div style="margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                        <h4 style="color: var(--primary-dark); margin-bottom: 12px; font-size: 1.25rem;">
                            <i class="fas fa-question-circle" style="color: var(--gold-light); margin-right: 8px;"></i> 
                            <?php echo e($fazilat->question); ?>

                        </h4>
                        <div style="font-size: 1.05rem; line-height: 1.8; color: #444; margin-bottom: 15px; padding-left: 32px;">
                            <?php echo e($fazilat->answer); ?>

                        </div>
                        <div style="background: #fafafa; padding: 12px 18px; border-radius: 8px; font-size: 0.9rem; color: #666; margin-left: 32px; border-left: 4px solid var(--primary-light);">
                            <strong><i class="fas fa-book"></i> Reference:</strong> <?php echo e($fazilat->hadith_reference); ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fazilat->verification_status === 'commonly_cited'): ?>
                                <span style="display: inline-block; margin-left: 10px; padding: 3px 8px; background: #fff3cd; color: #856404; border-radius: 4px; font-size: 0.8rem; font-weight: bold;"><i class="fas fa-exclamation-circle"></i> Commonly Cited</span>
                            <?php else: ?>
                                <span style="display: inline-block; margin-left: 10px; padding: 3px 8px; background: #d4edda; color: #155724; border-radius: 4px; font-size: 0.8rem; font-weight: bold;"><i class="fas fa-check"></i> Verified</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->audio_url): ?>
        <div class="surah-audio-container" id="audioPlayer">
            <div class="surah-audio-header">
                <i class="fas fa-headphones"></i>
                <span>Listen to Surah <?php echo e($surah->name_en); ?></span>
            </div>
            <audio controls preload="none" style="width: 100%;">
                <source src="<?php echo e($surah->audio_url); ?>" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($mushafPages)): ?>
            <div class="surah-content-card" id="mushaf">
                <div class="surah-content-card-header">
                    <i class="fas fa-book-open-reader"></i>
                    <h3>Mushaf Mode (Page View)</h3>
                </div>
                <div class="mushaf-pages-container">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mushafPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php
                            $imagePath = 'images/quran/pages/' . $page . '.png';
                            $imageExists = file_exists(public_path($imagePath));
                        ?>
                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($imageExists): ?>
                            <div class="mushaf-page-wrapper">
                                <img src="<?php echo e(asset($imagePath)); ?>" alt="Quran Page <?php echo e($page); ?>" class="mushaf-page-image" loading="lazy">
                                <div class="mushaf-page-number">Page <?php echo e($page); ?></div>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($mushafPages) > 0 && !file_exists(public_path('images/quran/pages/' . $mushafPages[0] . '.png'))): ?>
                        <div style="padding: 40px; text-align: center;">
                            <i class="fas fa-cloud-download-alt fa-3x" style="color: var(--gold-light); margin-bottom: 15px;"></i>
                            <h4 style="color: var(--primary-dark);">Mushaf Images Not Found</h4>
                            <p style="color: var(--text-medium);">Please run <code>php artisan quran:download-pages</code> to download the high-quality page images.</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->arabic_text): ?>
            <div class="surah-content-card" id="arabic-text">
                <div class="surah-content-card-header">
                    <i class="fas fa-book-open"></i>
                    <h3>Full Arabic Text</h3>
                </div>
                <div style="text-align: right; padding: 30px;">
                    <p style="font-family: 'Amiri', serif; font-size: 2.2rem; line-height: 2.5; color: #222;">
                        <?php echo e($surah->arabic_text); ?>

                    </p>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ayahs->count() > 0): ?>
            <div class="surah-content-card" id="translations" style="margin-top: 30px;">
                <div class="surah-content-card-header">
                    <i class="fas fa-align-right"></i>
                    <h3>Verse by Verse with Translation</h3>
                </div>
                <div style="padding: 0;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surah->ayahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="surah-ayah-block">
                            
                            <div class="surah-ayah-arabic-row">
                                <div class="surah-ayah-number-circle"><?php echo e($ayah->ayah_number); ?></div>
                                <div class="surah-ayah-arabic-text">
                                    <?php echo e($ayah->arabic_text); ?>

                                </div>
                            </div>
                            
                            <div class="surah-ayah-translations">
                                <div class="surah-ayah-translation urdu">
                                    <h4><i class="fas fa-language"></i> Urdu Translation</h4>
                                    <p><?php echo e($ayah->urdu_translation); ?></p>
                                </div>
                                <div class="surah-ayah-translation english">
                                    <h4><i class="fas fa-globe"></i> English Translation</h4>
                                    <p><?php echo e($ayah->english_translation); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$surah->arabic_text && $surah->ayahs->count() == 0): ?>
            <div class="surah-content-card" style="text-align: center; padding: 60px 30px;">
                <i class="fas fa-book-quran fa-3x" style="color: var(--gold-light); margin-bottom: 18px;"></i>
                <h3 style="color: var(--primary-dark); margin-bottom: 10px;">Surah Content Coming Soon</h3>
                <p style="color: var(--text-medium); max-width: 480px; margin: 0 auto;">
                    The full Arabic text, Urdu and English translations for Surah <?php echo e($surah->name_en); ?> are currently being prepared by our scholars. Please check back soon, InshaAllah.
                </p>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="surah-share-bar">
            <span class="surah-share-label"><i class="fas fa-share-alt"></i> Share this Surah:</span>
            <div class="surah-share-buttons">
                <a href="https://wa.me/?text=Read%20Surah%20<?php echo e(urlencode($surah->name_en)); ?>%20online%20<?php echo e(urlencode(route('surah.show', $surah->slug))); ?>" target="_blank" class="surah-share-btn whatsapp" aria-label="Share on WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('surah.show', $surah->slug))); ?>" target="_blank" class="surah-share-btn facebook" aria-label="Share on Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text=Read%20Surah%20<?php echo e(urlencode($surah->name_en)); ?>%20online&url=<?php echo e(urlencode(route('surah.show', $surah->slug))); ?>" target="_blank" class="surah-share-btn twitter" aria-label="Share on Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <button class="surah-share-btn copy-link" onclick="copySurahLink()" aria-label="Copy link">
                    <i class="fas fa-link"></i>
                </button>
            </div>
        </div>

        
        <div class="section-header" id="faq" style="margin-top: 70px;">
            <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="surah-content-card" itemscope itemtype="https://schema.org/FAQPage">
            <div style="padding: 30px;">
                <div class="surah-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" class="surah-faq-question">
                        <i class="fas fa-question-circle"></i> Where was Surah <?php echo e($surah->name_en); ?> revealed?
                    </h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="surah-faq-answer">Surah <?php echo e($surah->name_en); ?> (<?php echo e($surah->name_ar); ?>) is a <strong><?php echo e($surah->revelation_place); ?></strong> Surah, meaning it was revealed in <strong><?php echo e($surah->revelation_place == 'Makki' ? 'Makkah before the Hijrah (migration)' : 'Madinah after the Hijrah (migration)'); ?></strong>.</p>
                    </div>
                </div>

                <div class="surah-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" class="surah-faq-question">
                        <i class="fas fa-question-circle"></i> How many Ayahs are in Surah <?php echo e($surah->name_en); ?>?
                    </h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="surah-faq-answer">Surah <?php echo e($surah->name_en); ?> contains <strong><?php echo e($surah->ayah_count); ?> Ayahs</strong> (verses). It is the <?php echo e(ordinal($surah->number)); ?> Surah of the Holy Quran.</p>
                    </div>
                </div>

                <div class="surah-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" class="surah-faq-question">
                        <i class="fas fa-question-circle"></i> Which Juz (Para) contains Surah <?php echo e($surah->name_en); ?>?
                    </h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="surah-faq-answer">Surah <?php echo e($surah->name_en); ?> is located in <strong>Juz <?php echo e($surah->para_juz); ?></strong> of the Holy Quran.<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ruku_count): ?> It consists of <strong><?php echo e($surah->ruku_count); ?> <?php echo e($surah->ruku_count == 1 ? 'Ruku' : 'Rukus'); ?></strong>.<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></p>
                    </div>
                </div>

                <div class="surah-faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="border-bottom: none; margin-bottom: 0; padding-bottom: 0;">
                    <h3 itemprop="name" class="surah-faq-question">
                        <i class="fas fa-question-circle"></i> What is the meaning of Surah <?php echo e($surah->name_en); ?>?
                    </h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" class="surah-faq-answer">The name "<?php echo e($surah->name_en); ?>" translates to "<?php echo e($surah->name_ur); ?>" in Urdu. It is Surah number <?php echo e($surah->number); ?> in the Holy Quran with <?php echo e($surah->ayah_count); ?> verses, revealed in <?php echo e($surah->revelation_place == 'Makki' ? 'Makkah' : 'Madinah'); ?>.</p>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="surah-nav-footer">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prevSurah): ?>
            <a href="<?php echo e(route('surah.show', $prevSurah->slug)); ?>" class="surah-nav-btn prev">
                <i class="fas fa-arrow-left"></i>
                <div>
                    <span class="surah-nav-label">Previous Surah</span>
                    <span class="surah-nav-name"><?php echo e($prevSurah->number); ?>. <?php echo e($prevSurah->name_en); ?></span>
                </div>
            </a>
            <?php else: ?>
            <div></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <a href="<?php echo e(route('surah.index')); ?>" class="surah-nav-center">
                <i class="fas fa-th-large"></i>
                <span>All Surahs</span>
            </a>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextSurah): ?>
            <a href="<?php echo e(route('surah.show', $nextSurah->slug)); ?>" class="surah-nav-btn next">
                <div>
                    <span class="surah-nav-label">Next Surah</span>
                    <span class="surah-nav-name"><?php echo e($nextSurah->number); ?>. <?php echo e($nextSurah->name_en); ?></span>
                </div>
                <i class="fas fa-arrow-right"></i>
            </a>
            <?php else: ?>
            <div></div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($popularSurahs->count() > 0): ?>
        <div class="section-header" style="margin-top: 70px;">
            <h2 class="section-title">Most Popular <span>Surahs</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Explore the most frequently recited Surahs of the Holy Quran.</p>
        </div>

        <div class="surah-popular-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $popularSurahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('surah.show', $popular->slug)); ?>" class="surah-popular-card">
                <div class="surah-popular-number"><?php echo e($popular->number); ?></div>
                <div class="surah-popular-info">
                    <span class="surah-popular-ar"><?php echo e($popular->name_ar); ?></span>
                    <h3><?php echo e($popular->name_en); ?></h3>
                    <span class="surah-popular-meta"><?php echo e($popular->ayah_count); ?> Ayahs · <?php echo e($popular->revelation_place); ?></span>
                </div>
                <i class="fas fa-chevron-right surah-popular-arrow"></i>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "Surah <?php echo e($surah->name_en); ?> – Complete with Translation",
    "description": "Read Surah <?php echo e($surah->name_en); ?> online with Arabic text, Urdu and English translation. <?php echo e($surah->ayah_count); ?> Ayahs, <?php echo e($surah->revelation_place); ?> Surah.",
    "url": "<?php echo e(route('surah.show', $surah->slug)); ?>",
    "author": { "@type": "Organization", "name": "Noor-e-Islam" },
    "publisher": { "@type": "Organization", "name": "Noor-e-Islam" },
    "inLanguage": ["ar", "en", "ur"]
}
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(route('home')); ?>" },
        { "@type": "ListItem", "position": 2, "name": "Quran", "item": "<?php echo e(route('quran.index')); ?>" },
        { "@type": "ListItem", "position": 3, "name": "All Surahs", "item": "<?php echo e(route('surah.index')); ?>" },
        { "@type": "ListItem", "position": 4, "name": "Surah <?php echo e($surah->name_en); ?>" }
    ]
}
</script>

<script>
function copySurahLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        var btn = document.querySelector('.copy-link');
        btn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(function() { btn.innerHTML = '<i class="fas fa-link"></i>'; }, 2000);
    });
}

function shareSurah() {
    if (navigator.share) {
        navigator.share({
            title: 'Surah <?php echo e($surah->name_en); ?>',
            text: 'Read Surah <?php echo e($surah->name_en); ?> online with translation',
            url: window.location.href
        });
    } else {
        copySurahLink();
    }
}

// Active link highlighting on scroll
document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.surah-nav-link');
    const sections = Array.from(navLinks).map(link => {
        return document.querySelector(link.getAttribute('href'));
    }).filter(Boolean);

    function updateNav() {
        let currentSection = sections[0];
        
        for (let i = 0; i < sections.length; i++) {
            const section = sections[i];
            const rect = section.getBoundingClientRect();
            // If the top of the section is near the top of the viewport
            if (rect.top <= 200) {
                currentSection = section;
            }
        }
        
        if(currentSection) {
            navLinks.forEach(link => {
                if(link.getAttribute('href') === '#' + currentSection.id) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }
    }

    window.addEventListener('scroll', updateNav, { passive: true });
    updateNav(); // Init
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/show.blade.php ENDPATH**/ ?>