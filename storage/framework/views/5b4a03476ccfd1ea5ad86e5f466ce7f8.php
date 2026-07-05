<?php $__env->startSection('head'); ?>

<title><?php echo e($seo['title']); ?></title>
<meta name="description" content="<?php echo e($seo['description']); ?>">
<link rel="canonical" href="<?php echo e($seo['canonical']); ?>">
<meta property="og:title" content="<?php echo e($seo['title']); ?>">
<meta property="og:description" content="<?php echo e($seo['description']); ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php echo e($seo['canonical']); ?>">
<meta property="og:image" content="<?php echo e(config('app.url')); ?>/images/dua-og-default.jpg">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($seo['title']); ?>">
<link rel="alternate" hreflang="ur" href="<?php echo e(str_replace(config('app.url'), config('app.url').'/ur', $seo['canonical'])); ?>">
<link rel="alternate" hreflang="en" href="<?php echo e($seo['canonical']); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo e($seo['canonical']); ?>">


<script type="application/ld+json"><?php echo json_encode($seo['schema_breadcrumb'], JSON_UNESCAPED_UNICODE); ?></script>
<script type="application/ld+json"><?php echo json_encode($seo['schema_article'], JSON_UNESCAPED_UNICODE); ?></script>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seo['schema_faq'])): ?>
<script type="application/ld+json"><?php echo json_encode($seo['schema_faq'], JSON_UNESCAPED_UNICODE); ?></script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('css/duas.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="dua-page" itemscope itemtype="https://schema.org/Article">

  
  <div class="section-inner" style="margin-top: 24px;">
    <div class="dua-breadcrumb-wrapper">
      <nav class="dua-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home" style="margin-right: 4px;"></i> Home</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <a href="<?php echo e(route('duas.index')); ?>">Duas</a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeCategory): ?>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <a href="<?php echo e(route('duas.category', $activeCategory->slug)); ?>"><?php echo e($activeCategory->name_english ?? $activeCategory->name_roman_urdu); ?></a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <span><?php echo e($dua->title_english ?? $dua->title_roman_urdu); ?></span>
      </nav>
    </div>
  </div>

  
  <header class="dua-hero">
    <div class="dua-hero-inner">
      <div class="dua-category-badge">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dua->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <a href="<?php echo e(route('duas.category', $cat->slug)); ?>" class="badge-gold">
            <i class="fas <?php echo e($cat->icon_class); ?>"></i> <?php echo e($cat->name_roman_urdu ?? $cat->name_english); ?>

          </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
      </div>
      <h1 class="dua-title-roman" itemprop="headline"><?php echo e($dua->title_roman_urdu); ?></h1>
      <h2 class="dua-title-urdu"><?php echo e($dua->title_urdu); ?></h2>
      <p class="dua-short-meaning" itemprop="description"><?php echo e($dua->short_meaning); ?></p>
      
      <div class="dua-meta-badges">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->when_to_read): ?>
          <span class="meta-badge"><i class="fas fa-clock"></i> <?php echo e($dua->when_to_read); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->how_many_times): ?>
          <span class="meta-badge"><i class="fas fa-redo"></i> <?php echo e($dua->how_many_times); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->hadith_grade): ?>
          <span class="meta-badge grade-<?php echo e(strtolower($dua->hadith_grade)); ?>">
            <i class="fas fa-check-circle"></i> <?php echo e($dua->hadith_grade); ?>

          </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>
    </div>
  </header>

  <div class="section-inner dua-content-grid">
    <main class="dua-main">

      
      <section class="arabic-card" aria-label="Arabic Dua Text">
        <div class="arabic-text" dir="rtl" lang="ar">
          <?php echo e($dua->arabic_text); ?>

        </div>
        <div class="dua-action-bar">
          <button class="copy-btn" onclick="copyArabic(this)" aria-label="Copy Arabic text">
            <i class="far fa-copy"></i> Copy
          </button>
          <button class="listen-btn" onclick="readAloud(this)" aria-label="Listen to dua">
            <i class="fas fa-volume-up"></i> Listen
          </button>
        </div>
      </section>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->transliteration): ?>
      <section class="transliteration-card">
        <h2 class="section-heading"><span class="gold-line"></span> Transliteration (تلفظ)</h2>
        <p class="transliteration-text"><?php echo e($dua->transliteration); ?></p>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->translation): ?>
      <section class="translation-card">
        <h2 class="section-heading"><span class="gold-line"></span> Translation (ترجمہ)</h2>
        <p class="translation-text" dir="auto"><?php echo e($dua->translation); ?></p>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->word_by_word_translation): ?>
      <section class="word-by-word-card">
        <h2 class="section-heading"><span class="gold-line"></span> Word by Word Meaning (لفظ بہ لفظ ترجمہ)</h2>
        <div class="word-grid" dir="rtl">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dua->word_by_word_translation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <div class="word-item">
            <span class="word-arabic"><?php echo e($word['arabic'] ?? ''); ?></span>
            <span class="word-urdu"><?php echo e($word['urdu'] ?? ''); ?></span>
            <span class="word-english"><?php echo e($word['english'] ?? ''); ?></span>
          </div>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->reference_source || $dua->hadith_reference): ?>
      <section class="hadith-reference-card">
        <h2 class="section-heading"><span class="gold-line"></span> حوالہ / Hadith Reference</h2>
        <div class="reference-box">
          <i class="fas fa-book-open"></i>
          <div>
            <strong><?php echo e($dua->book_name ?? $dua->collection_name); ?></strong>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->hadith_number): ?> — Hadith #<?php echo e($dua->hadith_number); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->hadith_grade): ?> <span class="grade-badge"><?php echo e($dua->hadith_grade); ?></span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->reference_source): ?> <p><?php echo e($dua->reference_source); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->narrator): ?> <p class="narrator">Narrator: <?php echo e($dua->narrator); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          </div>
        </div>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedDuas->count() > 0): ?>
      <section class="related-duas-card" style="margin-bottom: 32px;">
        <h2 class="section-heading"><span class="gold-line"></span> Related Duas (متعلقہ دعائیں)</h2>
        <div class="category-tile-grid">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedDuas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <?php
             // Generate an SEO friendly title
             $title = $related->title_roman_urdu ?? $related->seo_title;
             
             // Fallback to title_english if it's short and not a narration
             if (!$title && $related->title_english) {
                 $isNarration = str_contains(strtolower($related->title_english), 'o allah') || str_contains(strtolower($related->title_english), 'narrated') || strlen($related->title_english) > 50;
                 $title = $isNarration ? null : $related->title_english;
             }
             
             // Ultimate fallback: Parse the SEO slug into a readable title
             if (!$title) {
                 $title = ucwords(str_replace('-', ' ', $related->seo_slug));
                 if (!str_contains(strtolower($title), 'dua')) {
                     $title .= ' Dua';
                 }
             }
             
             $categoryName = $related->categories->first() ? $related->categories->first()->name_english : 'Supplication';
          ?>
          <a href="<?php echo e(route('duas.show', ['category' => $related->primary_category_slug, 'slug' => $related->seo_slug])); ?>" class="dua-category-tile">
            <div class="dua-category-tile-icon" style="width: 40px; height: 40px; font-size: 1.1rem; margin-right: 12px; background: var(--primary-subtle); color: var(--primary);">
              <i class="fas fa-praying-hands"></i>
            </div>
            <div class="dua-category-tile-content">
              <h3 class="dua-category-tile-title" style="font-size: 1rem; margin-bottom: 6px; line-height: 1.3;"><?php echo e($title); ?></h3>
              <div>
                <span class="badge-gold" style="font-size: 0.65rem; padding: 3px 8px; border-radius: 12px;"><?php echo e($categoryName); ?></span>
              </div>
            </div>
            <div class="dua-category-tile-arrow">
              <i class="fas fa-chevron-right"></i>
            </div>
          </a>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->detailed_explanation): ?>
      <section class="explanation-card" itemprop="articleBody">
        <h2 class="section-heading"><span class="gold-line"></span> تفصیلی وضاحت (Detailed Explanation)</h2>
        <div class="explanation-content">
          <?php echo nl2br(e($dua->detailed_explanation)); ?>

        </div>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->benefits): ?>
      <section class="benefits-card">
        <h2 class="section-heading"><span class="gold-line"></span> فوائد اور برکات (Benefits & Virtues)</h2>
        <div class="benefits-content">
          <?php echo nl2br(e($dua->benefits)); ?>

        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->practical_benefits): ?>
        <div class="practical-benefits">
          <h3>Amaliat Fayde (Practical Benefits)</h3>
          <?php echo nl2br(e($dua->practical_benefits)); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->when_to_read || $dua->how_many_times || $dua->best_time || $dua->common_mistakes): ?>
      <section class="how-to-read-card">
        <h2 class="section-heading"><span class="gold-line"></span> کیسے پڑھیں (How to Read)</h2>
        <div class="how-to-grid">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->when_to_read): ?>
          <div class="how-item">
            <i class="fas fa-clock gold"></i>
            <strong>Kab Parhen:</strong> <?php echo e($dua->when_to_read); ?>

          </div>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->how_many_times): ?>
          <div class="how-item">
            <i class="fas fa-redo gold"></i>
            <strong>Kitni Baar:</strong> <?php echo e($dua->how_many_times); ?>

          </div>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->best_time): ?>
          <div class="how-item">
            <i class="fas fa-star gold"></i>
            <strong>Best Waqt:</strong> <?php echo e($dua->best_time); ?>

          </div>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->common_mistakes): ?>
        <div class="common-mistakes">
          <h3><i class="fas fa-exclamation-triangle"></i> Aam Ghaltiyan (Common Mistakes)</h3>
          <?php echo nl2br(e($dua->common_mistakes)); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->important_notes || $dua->authenticity_notes): ?>
      <section class="notes-card">
        <h2 class="section-heading"><span class="gold-line"></span> اہم نوٹس (Important Notes)</h2>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->important_notes): ?>
        <div class="notes-box"><?php echo nl2br(e($dua->important_notes)); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->authenticity_notes): ?>
        <div class="authenticity-box">
          <i class="fas fa-shield-alt"></i> <strong>Authenticity:</strong> <?php echo nl2br(e($dua->authenticity_notes)); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->lessons_learned): ?>
      <section class="lessons-card">
        <h2 class="section-heading"><span class="gold-line"></span> Seekhne Ke Nuqaat (Lessons Learned)</h2>
        <?php echo nl2br(e($dua->lessons_learned)); ?>

      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->faqs && is_array($dua->faqs) && count($dua->faqs) > 0): ?>
      <section class="faq-section" aria-label="Frequently Asked Questions">
        <h2 class="section-heading"><span class="gold-line"></span> اکثر پوچھے گئے سوالات (FAQ)</h2>
        <div class="faq-accordion">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $dua->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="faq-question" aria-expanded="false" aria-controls="faq-<?php echo e($i); ?>" itemprop="name">
              <span><?php echo e($faq['question'] ?? ''); ?></span>
              <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer" id="faq-<?php echo e($i); ?>" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
              <div itemprop="text"><?php echo e($faq['answer'] ?? ''); ?></div>
            </div>
          </div>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
      </section>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

      
      <nav class="dua-pagination" aria-label="Previous and Next Dua">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prevDua): ?>
        <a href="<?php echo e(route('duas.show', ['category' => $prevDua->primary_category_slug, 'slug' => $prevDua->seo_slug])); ?>" class="prev-dua">
          <i class="fas fa-arrow-right"></i> <?php echo e($prevDua->title_roman_urdu); ?>

        </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextDua): ?>
        <a href="<?php echo e(route('duas.show', ['category' => $nextDua->primary_category_slug, 'slug' => $nextDua->seo_slug])); ?>" class="next-dua">
          <?php echo e($nextDua->title_roman_urdu); ?> <i class="fas fa-arrow-left"></i>
        </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </nav>

    </main>

    
    <aside class="dua-sidebar">
      
      
      <div class="sidebar-card quick-info">
        <h3 class="sidebar-heading">Quick Info</h3>
        <ul>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->dua_type ?? $dua->content_type): ?> <li><strong>Type:</strong> <?php echo e(ucfirst($dua->dua_type ?? $dua->content_type)); ?></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->difficulty_level): ?> <li><strong>Level:</strong> <?php echo e(ucfirst($dua->difficulty_level)); ?></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->reading_time): ?> <li><strong>Read Time:</strong> <?php echo e($dua->reading_time); ?> min</li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->occasion): ?> <li><strong>Occasion:</strong> <?php echo e($dua->occasion); ?></li> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </ul>
      </div>

      
      <div class="sidebar-card">
        <h3 class="sidebar-heading">Dua Categories</h3>
        <ul class="sidebar-category-list">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = \App\Models\DuaCategory::whereNull('parent_id')->withCount('duas')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <li>
            <a href="<?php echo e(route('duas.category', $cat->slug)); ?>" class="<?php echo e($dua->categories->contains('id', $cat->id) ? 'active' : ''); ?>">
              <i class="fas <?php echo e($cat->icon_class); ?>"></i>
              <?php echo e($cat->name_roman_urdu ?? $cat->name_english); ?>

              <span class="count"><?php echo e($cat->duas_count); ?></span>
            </a>
          </li>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </ul>
      </div>

      
      <div class="sidebar-card share-widget">
        <h3 class="sidebar-heading">Share This Dua</h3>
        <div class="share-buttons">
          <a href="https://wa.me/?text=<?php echo e(urlencode($dua->title_roman_urdu . ' - ' . $seo['canonical'])); ?>" target="_blank" class="share-wa">
            <i class="fab fa-whatsapp"></i> WhatsApp
          </a>
          <button onclick="copyPageLink()" class="share-copy">
            <i class="fas fa-link"></i> Copy Link
          </button>
        </div>
      </div>

    </aside>
  </div>

  
  <section class="all-categories-section">
    <div class="section-inner">
      <h2 class="section-heading" style="justify-content: center; font-size: 1.8rem; margin-bottom: 32px;">
        <span class="gold-line"></span> Browse More Duas
      </h2>
      <div class="category-tile-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = \App\Models\DuaCategory::whereNull('parent_id')->withCount('duas')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a href="<?php echo e(route('duas.category', $cat->slug)); ?>" class="dua-category-tile">
          <div class="dua-category-tile-icon">
            <i class="fas <?php echo e($cat->icon_class); ?>"></i>
          </div>
          <div class="dua-category-tile-content">
            <h3 class="dua-category-tile-title"><?php echo e($cat->name_english); ?></h3>
            <p class="dua-category-tile-count"><?php echo e($cat->duas_count); ?> Duas</p>
          </div>
          <div class="dua-category-tile-arrow">
            <i class="fas fa-chevron-right"></i>
          </div>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
      </div>
    </div>
  </section>

</div>

<?php $__env->startPush('scripts'); ?>
<script>
function copyArabic(btn) {
    const text = <?php echo json_encode($dua->arabic_text, 15, 512) ?>;
    if (text) {
        navigator.clipboard.writeText(text);
        showToast('Arabic text copied!');
        
        // Change button style temporarily
        const originalHtml = btn.innerHTML;
        btn.classList.add('copied-state');
        btn.innerHTML = '<i class="fas fa-check"></i> Copied';
        setTimeout(() => {
            btn.classList.remove('copied-state');
            btn.innerHTML = originalHtml;
        }, 2000);
    }
}
function copyPageLink() {
    navigator.clipboard.writeText(window.location.href);
    showToast('Link copied!');
}
function readAloud(btn) {
    const text = <?php echo json_encode($dua->transliteration, 15, 512) ?>;
    if (text) {
        // Change button style
        const originalHtml = btn.innerHTML;
        btn.classList.add('playing-state');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Playing';
        
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'ar-SA';
        utterance.onend = function() {
            btn.classList.remove('playing-state');
            btn.innerHTML = originalHtml;
        };
        window.speechSynthesis.speak(utterance);
    }
}
function showToast(msg) {
    const t = document.createElement('div');
    t.className = 'toast';
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 3000);
}
// FAQ accordion
document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', !expanded);
        btn.nextElementSibling.style.display = expanded ? 'none' : 'block';
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/duas/show.blade.php ENDPATH**/ ?>