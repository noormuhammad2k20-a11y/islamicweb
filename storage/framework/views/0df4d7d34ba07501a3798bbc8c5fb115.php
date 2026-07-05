<?php $__env->startSection('head'); ?>
<title><?php echo e($seo['title']); ?></title>
<meta name="description" content="<?php echo e($seo['description']); ?>">
<link rel="canonical" href="<?php echo e($seo['canonical']); ?>">
<meta property="og:title" content="<?php echo e($seo['title']); ?>">
<meta property="og:description" content="<?php echo e($seo['description']); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo e($seo['canonical']); ?>">
<link rel="alternate" hreflang="ur" href="<?php echo e(str_replace(config('app.url'), config('app.url').'/ur', $seo['canonical'])); ?>">
<link rel="alternate" hreflang="en" href="<?php echo e($seo['canonical']); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo e($seo['canonical']); ?>">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "<?php echo e($seo['title']); ?>",
  "description": "<?php echo e($seo['description']); ?>"
}
</script>
<link rel="stylesheet" href="<?php echo e(asset('css/duas.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="dua-page">
  <div class="section-inner" style="margin-top: 24px;">
    <div class="dua-breadcrumb-wrapper">
      <nav class="dua-breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home" style="margin-right: 4px;"></i> Home</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <a href="<?php echo e(route('duas.index')); ?>">Duas</a>
        <span class="separator"><i class="fas fa-chevron-right"></i></span>
        <span><?php echo e($category->name_english ?? $category->name_roman_urdu); ?></span>
      </nav>
    </div>
  </div>

  <header class="dua-hero">
    <div class="dua-hero-inner">
      <div style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;"><i class="fas <?php echo e($category->icon_class); ?>"></i></div>
      <h1 class="dua-title-roman"><?php echo e($category->name_roman_urdu ?? $category->name_english); ?></h1>
      <h2 class="dua-title-urdu"><?php echo e($category->name_urdu); ?></h2>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->seo_description): ?>
      <p class="dua-hero-desc">
        <?php echo e($category->seo_description); ?>

      </p>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  </header>

  <div class="section-inner dua-content-grid">
    <main class="dua-main">
      <div class="featured-dua-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $duas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a href="<?php echo e(route('duas.show', ['category' => $category->slug, 'slug' => $dua->seo_slug])); ?>" style="text-decoration: none; color: inherit;">
          <div class="featured-dua-card">
            <h3 class="featured-dua-title"><?php echo e($dua->title_roman_urdu ?? $dua->title_english ?? $dua->title_urdu); ?></h3>
            <div class="featured-dua-arabic"><?php echo e(\Illuminate\Support\Str::limit($dua->arabic_text, 60)); ?></div>
            <div class="featured-dua-meaning"><?php echo e($dua->short_meaning ?? $dua->translation); ?></div>
          </div>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <div style="grid-column: 1/-1; text-align: center; padding: 3rem; background: var(--secondary); border-radius: var(--radius-md);">
          <h3 style="color: var(--primary);">No duas found in this category yet.</h3>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>

      <div style="margin-top: 2rem;">
        <?php echo e($duas->links('vendor.pagination.custom')); ?>

      </div>
    </main>

    <aside class="dua-sidebar">
      <div class="sidebar-card">
        <h3 class="sidebar-heading">Other Categories</h3>
        <ul class="sidebar-category-list">
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <li>
            <a href="<?php echo e(route('duas.category', $cat->slug)); ?>">
              <i class="fas <?php echo e($cat->icon_class); ?>" style="color: var(--gold); margin-right: 6px;"></i>
              <?php echo e($cat->name_roman_urdu ?? $cat->name_english); ?>

            </a>
          </li>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </ul>
      </div>
    </aside>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/duas/category.blade.php ENDPATH**/ ?>