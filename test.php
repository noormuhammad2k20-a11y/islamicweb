<?php $__env->startSection('title', $dua->title_english . ' - ' . $category->name_english); ?>

<?php $__env->startSection('content'); ?>
<style>
    .dua-detail-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 35px;
        position: relative;
        overflow: hidden;
    }
    .dua-detail-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--gold), var(--primary-light));
    }
    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2.5rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.8;
        margin-bottom: 30px;
        text-align: right;
        background: linear-gradient(135deg, var(--primary-dark), #111);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .transliteration-box {
        background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.08), rgba(var(--gold-rgb), 0.02));
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        border-left: 4px solid var(--gold);
        position: relative;
    }
    .box-label {
        color: var(--gold);
        margin-bottom: 10px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .transliteration-text {
        color: #444;
        font-size: 1.05rem;
        line-height: 1.6;
        margin: 0;
        font-style: italic;
    }
    .translation-box {
        margin-bottom: 25px;
    }
    .translation-label {
        color: var(--primary);
        margin-bottom: 10px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .translation-text {
        color: #555;
        font-size: 1.05rem;
        line-height: 1.7;
        margin: 0;
    }
    .reference-tag {
        font-size: 0.85rem;
        color: #888;
        background: #f9f9f9;
        padding: 8px 16px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #eee;
        font-weight: 500;
    }
    .breadcrumb-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }
    .breadcrumb-nav {
        display: inline-flex;
        align-items: center;
        background: rgba(var(--primary-rgb), 0.05);
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 0.85rem;
        border: 1px solid rgba(var(--primary-rgb), 0.1);
    }
    .breadcrumb-nav a {
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .breadcrumb-nav a.parent-link {
        color: #777;
    }
    .breadcrumb-nav a.parent-link:hover {
        color: var(--primary);
    }
    .breadcrumb-nav .separator {
        color: #ccc;
        font-size: 0.65rem;
        margin: 0 12px;
    }
    .breadcrumb-nav .current-page {
        color: var(--primary);
        font-weight: 600;
    }
</style>

<section class="section services-section" style="padding-top: 100px;">
    <div class="section-inner">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb-nav">
                <a href="<?php echo e(route('duas.index')); ?>" class="parent-link"><i class="fas fa-book-open" style="margin-right: 5px;"></i> Duas Library</a>
                <i class="fas fa-chevron-right separator"></i>
                <a href="<?php echo e(route('duas.category', $category->slug)); ?>" class="current-page"><?php echo e($category->name_english); ?></a>
            </div>
        </div>

        <div style="max-width: 750px; margin: 0 auto;">
            <h1 style="color: var(--primary-dark); font-size: 1.8rem; margin-bottom: 30px; text-align: center;"><?php echo e($dua->title_english); ?></h1>

            <div class="dua-detail-card">
                <div class="dua-arabic" dir="rtl">
                    <?php echo e($dua->arabic_text); ?>

                </div>
                
                <div class="transliteration-box">
                    <div class="box-label"><i class="fas fa-language"></i> Transliteration</div>
                    <p class="transliteration-text"><?php echo e($dua->transliteration); ?></p>
                </div>

                <div class="translation-box">
                    <div class="translation-label"><i class="fas fa-book-reader"></i> Translation</div>
                    <p class="translation-text"><?php echo e($dua->translation); ?></p>
                </div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dua->reference_source): ?>
                <div style="margin-top: 30px; padding-top: 25px; border-top: 1px dashed #eee;">
                    <span class="reference-tag"><i class="fas fa-bookmark" style="color: var(--gold);"></i> <?php echo e($dua->reference_source); ?></span>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- SEO INTERNAL LINKING: RELATED DUAS -->
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedDuas->isNotEmpty()): ?>
            <div style="margin-top: 60px;">
                <h3 style="font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 20px; text-align: center; font-weight: 600;">
                    Explore More in <?php echo e($category->name_english); ?>

                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedDuas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('duas.show', ['category_slug' => $category->slug, 'seo_slug' => $related->seo_slug])); ?>" style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 20px; text-decoration: none; display: flex; align-items: center; gap: 15px; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0,0,0,0.02);" onmouseover="this.style.borderColor='var(--primary)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.05)';" onmouseout="this.style.borderColor='#eee'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.02)';">
                        <div style="background: rgba(var(--primary-rgb), 0.05); color: var(--primary); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0;">
                            <i class="fas fa-praying-hands"></i>
                        </div>
                        <div>
                            <div style="color: #333; font-weight: 600; font-size: 0.95rem; line-height: 1.3; margin-bottom: 4px;"><?php echo e(Str::limit($related->title_english, 45)); ?></div>
                            <div style="color: #999; font-size: 0.75rem;">Read Supplication &rarr;</div>
                        </div>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS & SEO -->
<?php $__env->startSection('meta'); ?>
<link rel="canonical" href="<?php echo e(url()->current()); ?>" />
<?php $__env->stopSection(); ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>",
      "url": "<?php echo e(url()->current()); ?>",
      "name": "<?php echo e($dua->title_english); ?> | <?php echo e($category->name_english); ?>",
      "description": "Read the authentic <?php echo e($dua->title_english); ?> including Arabic, Transliteration, and English Translation. Sourced from <?php echo e($dua->reference_source ?? 'authentic hadith'); ?>.",
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
            "name": "<?php echo e($dua->title_english); ?>",
            "item": "<?php echo e(url()->current()); ?>"
          }
        ]
      }
    },
    {
      "@type": "Article",
      "headline": "<?php echo e($dua->title_english); ?>",
      "articleSection": "<?php echo e($category->name_english); ?>",
      "articleBody": "<?php echo e(strip_tags($dua->translation)); ?>",
      "author": {
         "@type": "Organization",
         "name": "Islamic Web Platform"
      }
    }
  ]
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>