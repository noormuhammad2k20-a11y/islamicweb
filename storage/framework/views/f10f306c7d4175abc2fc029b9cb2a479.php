

<?php $__env->startPush('seo'); ?>
    <?php if (isset($component)) { $__componentOriginal4232ba5ed77147a6b6573253fafb715d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4232ba5ed77147a6b6573253fafb715d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.seo-head','data' => ['seo' => $seoData]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('seo-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['seo' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($seoData)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4232ba5ed77147a6b6573253fafb715d)): ?>
<?php $attributes = $__attributesOriginal4232ba5ed77147a6b6573253fafb715d; ?>
<?php unset($__attributesOriginal4232ba5ed77147a6b6573253fafb715d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4232ba5ed77147a6b6573253fafb715d)): ?>
<?php $component = $__componentOriginal4232ba5ed77147a6b6573253fafb715d; ?>
<?php unset($__componentOriginal4232ba5ed77147a6b6573253fafb715d); ?>
<?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($schemaOrg)): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $schemaOrg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <script type="application/ld+json"><?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Chapter",
  "name": "<?php echo e($surah->name_en); ?>",
  "position": <?php echo e($surah->number); ?>,
  "isPartOf": {"@type": "Book", "name": "The Holy Quran"},
  "inLanguage": ["ar", "ur", "en"]
}
</script>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($surah->faqs) && $surah->faqs->count()): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php $__currentLoopData = $surah->faqs->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    {
      "@type": "Question",
      "name": "<?php echo e($faq->question_en); ?>",
      "acceptedAnswer": {"@type": "Answer", "text": "<?php echo e($faq->answer_en); ?>"}
    }<?php echo e(!$loop->last ? ',' : ''); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  ]
}
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        /* Mapping old variables to new theme for included partials */
        --primary: #0A1F3F;
        --primary-dark: #0F2D52;
        --primary-light: #C9A84C;
        
        /* Premium Theme Variables */
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --emerald: #0D7C5F;
        --emerald-tint: #E8F5F0;
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --text-faint: #B8C2D4;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --shadow-xl: 0 24px 64px rgba(10, 31, 63, 0.14);
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    .scroll-progress-container {
        position: fixed; top: 0; left: 0; width: 100%; height: 4px; 
        background: rgba(10, 31, 63, 0.1); z-index: 9999;
    }
    #scrollProgressBar {
        height: 100%; background: var(--gold-gradient); width: 0%; 
        transition: width 0.1s; box-shadow: 0 0 10px rgba(201, 168, 76, 0.5);
    }

    html { scroll-behavior: smooth; }
    
    /* Sticky Nav Offset */
    #overview, #virtues, #mushaf, #arabic-text, #translations, #faq {
        scroll-margin-top: 150px;
    }

    /* Surah Container */
    .surah-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 60px 15px;
    }

    /* Breadcrumb */
    .surah-breadcrumb { text-align: center; margin-bottom: 40px; }
    .surah-breadcrumb-inner { 
        background: var(--white); padding: 12px 30px; border-radius: var(--radius-full); 
        display: inline-block; box-shadow: var(--shadow-md); font-size: .9rem; 
        font-weight: 600; border: 1px solid var(--border-light); 
    }
    .surah-breadcrumb-inner a { color: var(--navy); text-decoration: none; transition: var(--tr-fast); }
    .surah-breadcrumb-inner a:hover { color: var(--gold-dark); }
    .surah-breadcrumb-inner span { color: var(--text-faint); margin: 0 10px; }
    .surah-breadcrumb-inner .active { color: var(--text-medium); }

    /* Scholar Badge */
    .scholar-badge-container { text-align: center; margin-bottom: 40px; }
    .scholar-badge { 
        display: inline-flex; align-items: center; background: var(--emerald-tint); 
        color: var(--emerald); padding: 10px 24px; border-radius: var(--radius-full); 
        font-size: .9rem; font-weight: 600; border: 1px solid rgba(13, 124, 95, 0.15); 
        box-shadow: var(--shadow-sm);
    }
    .scholar-badge i { margin-right: 10px; font-size: 1.1rem; }

    /* Sticky Page Navigation */
    .surah-page-nav-wrapper {
        position: sticky; top: 80px; z-index: 100;
        background: rgba(255, 255, 255, 0.90);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(255,255,255,0.8);
        border-radius: var(--radius-full);
        margin: 30px auto 50px;
        max-width: 900px;
        padding: 6px;
        display: flex;
        overflow-x: auto;
        scrollbar-width: none;
    }
    .surah-page-nav-wrapper::-webkit-scrollbar { display: none; }
    .surah-page-nav {
        display: flex; align-items: center; gap: 5px; margin: 0 auto;
    }
    .surah-nav-link {
        padding: 10px 22px; color: var(--text-medium); text-decoration: none;
        font-weight: 600; font-size: .85rem; border-radius: var(--radius-full);
        white-space: nowrap; transition: var(--tr-fast);
    }
    .surah-nav-link:hover { background: var(--bg-main); color: var(--navy); }
    .surah-nav-link.active { 
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); 
        color: var(--white); box-shadow: var(--shadow-sm); 
    }

    /* Grid Layout */
    .surah-grid {
        display: grid; grid-template-columns: 1fr 300px; gap: 30px; margin-top: 30px;
    }
    @media (max-width: 991px) {
        .surah-grid { grid-template-columns: 1fr; }
        .surah-sidebar { order: -1; }
    }

    /* Sidebar Widgets */
    .sidebar-widget {
        background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); padding: 24px; margin-bottom: 24px;
        box-shadow: var(--shadow-sm); position: relative; overflow: hidden;
    }
    .sidebar-widget::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient);
    }
    .widget-title {
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700;
        color: var(--navy); margin-bottom: 18px; padding-bottom: 12px;
        border-bottom: 1px solid var(--border-light);
    }
    .widget-list { list-style: none; padding: 0; margin: 0; }
    .widget-list li {
        margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border-light);
    }
    .widget-list li:last-child { margin-bottom: 0; padding-bottom: 0; border-bottom: none; }
    .widget-list a {
        color: var(--text-medium); text-decoration: none; transition: var(--tr-fast);
        font-weight: 500; display: block; padding: 4px 0;
    }
    .widget-list a:hover { color: var(--gold-dark); transform: translateX(4px); }
    .widget-tags { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: 8px; }

    /* Next/Prev Navigation */
    .surah-nav-footer { display: flex; justify-content: space-between; margin-top: 60px; border-top: 1px solid var(--border-light); padding-top: 30px; gap: 20px; }
    .surah-nav-btn {
        display: flex; align-items: center; gap: 15px; text-decoration: none; color: var(--text-medium);
        padding: 20px 30px; background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); transition: var(--tr); box-shadow: var(--shadow-sm);
        flex: 1; max-width: 48%;
    }
    .surah-nav-btn:hover { box-shadow: var(--shadow-md); border-color: var(--gold); transform: translateY(-3px); color: var(--navy); }
    .surah-nav-btn i { font-size: 1.2rem; color: var(--gold); }
    .surah-nav-label { display: block; font-size: .75rem; color: var(--text-light); text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
    .surah-nav-name { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 700; color: var(--navy); }

    /* Popular Surahs Section */
    .section-header { text-align: center; margin-top: 80px; margin-bottom: 40px; }
    .section-title { font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; color: var(--navy); margin-bottom: 0; font-weight: 700; }
    .section-title span { color: var(--gold-dark); font-style: italic; }
    .section-title::after { content: ""; position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%); width: 60px; height: 3px; background: var(--gold-gradient); border-radius: 2px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25); }
    .arabic-divider { display: flex; align-items: center; justify-content: center; gap: 15px; margin: 25px 0; }
    .arabic-divider .line { width: 80px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold), transparent); }
    .arabic-divider .symbol { font-size: 1.8rem; font-family: 'Scheherazade New', serif; color: var(--gold-dark); }

    .surah-popular-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
    .surah-popular-card {
        display: flex; align-items: center; background: var(--white); padding: 20px;
        border: 1px solid var(--border-light); border-radius: var(--radius-md);
        text-decoration: none; color: var(--text-dark); transition: var(--tr); box-shadow: var(--shadow-xs);
    }
    .surah-popular-card:hover { box-shadow: var(--shadow-md); border-color: var(--gold); transform: translateY(-4px); }
    .surah-popular-number {
        width: 44px; height: 44px; background: var(--navy-tint); color: var(--navy);
        border-radius: 12px; display: flex; align-items: center; justify-content: center;
        font-family: 'Cormorant Garamond', serif; font-weight: 700; font-size: 1.2rem;
        margin-right: 16px; transition: var(--tr); flex-shrink: 0;
    }
    .surah-popular-card:hover .surah-popular-number { background: var(--navy); color: var(--gold-light); }
    .surah-popular-info h3 { margin: 0; font-family: 'Cormorant Garamond', serif; font-size: 1.25rem; color: var(--navy); font-weight: 700; }
    .surah-popular-meta { font-size: .8rem; color: var(--text-light); font-weight: 500; }

    @media (max-width: 768px) {
        .surah-nav-footer { flex-direction: column; }
        .surah-nav-btn { max-width: 100%; }
        .section-title { font-size: 2rem; }
    }
</style>

<div class="scroll-progress-container">
    <div id="scrollProgressBar"></div>
</div>

<div class="surah-container">
    
    
    <div class="surah-breadcrumb">
        <div class="surah-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a>
            <span>/</span>

            <a href="<?php echo e(route('surah.index')); ?>">Surahs</a>
            <span>/</span>
            <span class="active">Surah <?php echo e($surah->name_en); ?></span>
        </div>
    </div>

    <?php echo $__env->make('pages.surah.partials._header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.surah.partials._navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('pages.surah.partials._continuous-reading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->reviews && $surah->reviews->count() > 0): ?>
        <?php $review = $surah->reviews->first(); ?>
        <div class="scholar-badge-container">
            <div class="scholar-badge">
                <i class="fas fa-check-circle"></i>
                <span>Verified by <strong><?php echo e($review->scholar->name); ?></strong> (<?php echo e($review->scholar->credential); ?>)</span>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="surah-grid">
        <main class="surah-main">
            <?php echo $__env->make('pages.surah.partials._quick-facts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._overview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._ayahs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._important-ayahs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._themes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._history', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._lessons', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._virtues', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._faqs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            
            
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

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextSurah): ?>
                <a href="<?php echo e(route('surah.show', $nextSurah->slug)); ?>" class="surah-nav-btn next" style="text-align:right;">
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

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($popularSurahs) && $popularSurahs->count() > 0): ?>
            <div class="section-header">
                <h2 class="section-title">Most Popular <span>Surahs</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>

            <div class="surah-popular-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $popularSurahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('surah.show', $popular->slug)); ?>" class="surah-popular-card">
                    <div class="surah-popular-number"><?php echo e($popular->number); ?></div>
                    <div class="surah-popular-info">
                        <h3><?php echo e($popular->name_en); ?></h3>
                        <span class="surah-popular-meta"><?php echo e($popular->total_ayahs); ?> Ayahs</span>
                    </div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </main>
        
        <aside class="surah-sidebar">
            <?php echo $__env->make('pages.surah.partials._toc', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._learning-path', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._entities', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._collections', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._related-surahs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._hadiths', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._related-duas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('pages.surah.partials._downloads', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </aside>
    </div>
</div>

<script>
function copySurahLink() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        var btn = document.querySelector('.copy-link');
        btn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(function() { btn.innerHTML = '<i class="fas fa-link"></i>'; }, 2000);
    });
}

function copyAyah(btn) {
    const text = btn.getAttribute('data-text');
    navigator.clipboard.writeText(text).then(function() {
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check"></i> Copied';
        setTimeout(function() { btn.innerHTML = originalHTML; }, 2000);
    });
}

function toggleReadingMode() {
    const isReadingMode = document.body.classList.toggle('quran-reading-mode');
    const translations = document.querySelectorAll('.surah-ayah-translations');
    translations.forEach(el => {
        el.style.display = isReadingMode ? 'none' : 'grid';
    });
    const btn = document.getElementById('readingModeBtn');
    if (btn) {
        if (isReadingMode) {
            btn.innerHTML = '<i class="fas fa-eye" aria-hidden="true"></i> Show Translations';
        } else {
            btn.innerHTML = '<i class="fas fa-book-reader" aria-hidden="true"></i> Reading Mode';
        }
    }
}

let currentAyahIndex = 1;
function scrollToAyah(index) {
    const ayahEl = document.getElementById('ayah-' + index);
    if(ayahEl) {
        ayahEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
        currentAyahIndex = index;
    }
}
function scrollToNextAyah() {
    scrollToAyah(currentAyahIndex + 1);
}
function scrollToPrevAyah() {
    if(currentAyahIndex > 1) scrollToAyah(currentAyahIndex - 1);
}

document.addEventListener("DOMContentLoaded", function() {
    const ayahs = document.querySelectorAll('.surah-ayah-block');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const idAttr = entry.target.id;
                if(idAttr) {
                    currentAyahIndex = parseInt(idAttr.split('-')[1]);
                }
            }
        });
    }, { threshold: 0.5 });
    
    ayahs.forEach(ayah => observer.observe(ayah));

    const navLinks = document.querySelectorAll('.surah-nav-link, .toc-list a');
    const sections = Array.from(navLinks).map(link => {
        return document.querySelector(link.getAttribute('href'));
    }).filter(Boolean);

    function updateNav() {
        let currentSection = sections[0];
        
        for (let i = 0; i < sections.length; i++) {
            const section = sections[i];
            if(!section) continue;
            const rect = section.getBoundingClientRect();
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

    window.addEventListener('scroll', function() {
        updateNav();
        
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        const progressBar = document.getElementById("scrollProgressBar");
        if(progressBar) {
            progressBar.style.width = scrolled + "%";
        }
    }, { passive: true });
    updateNav();
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/show.blade.php ENDPATH**/ ?>