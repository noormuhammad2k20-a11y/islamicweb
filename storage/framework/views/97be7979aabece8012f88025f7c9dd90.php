

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
  "@type": "WebPage",
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
        <span>Duas</span>
      </nav>
    </div>
  </div>

  <header class="dua-hero">
    <div class="dua-hero-inner">
      <h1 class="dua-title-urdu">تمام دعائیں</h1>
      <h2 class="dua-title-roman">All Islamic Duas</h2>
      <p class="dua-hero-desc">
        Sone ki dua, namaz ki dua, shifa ki dua aur 95+ Islamic duain mukammal Arabic text, Urdu tarjuma, Roman Urdu aur hadith hawale ke sath. NoorIslam par tamam zaroorat ki duain.
      </p>
    </div>
  </header>

  <div class="section-inner" style="margin-top: 40px; margin-bottom: 40px;">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featuredDuas->count() > 0): ?>
    <div>
      <div class="section-header">
        <div class="section-badge"><i class="fas fa-star"></i> Must Read</div>
        <h2 class="section-title"><span>Featured</span> Duas</h2>
        <p class="section-subtitle">Highly recommended daily prayers for every Muslim</p>
      </div>
      
      <div class="featured-dua-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredDuas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a href="<?php echo e(route('duas.show', ['category' => $dua->primary_category_slug, 'slug' => $dua->seo_slug])); ?>" style="text-decoration: none; color: inherit;">
          <div class="featured-dua-card">
            <h3 class="featured-dua-title"><?php echo e($dua->title_roman_urdu ?? $dua->title_english ?? $dua->title_urdu); ?></h3>
            <div class="featured-dua-arabic"><?php echo e(\Illuminate\Support\Str::limit($dua->arabic_text, 60)); ?></div>
            <div class="featured-dua-meaning"><?php echo e($dua->short_meaning ?? $dua->translation); ?></div>
          </div>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
      </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
  </div>

  <section class="all-categories-section">
    <div class="section-inner">
      <div class="section-header">
        <div class="section-badge"><i class="fas fa-layer-group"></i> Browse By Topic</div>
        <h2 class="section-title">Dua <span>Categories</span></h2>
        <p class="section-subtitle">Find the exact supplication you need from our comprehensive collection</p>
      </div>

      <div class="category-tile-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a href="<?php echo e(route('duas.category', $cat->slug)); ?>" class="dua-category-tile">
          <div class="dua-category-tile-icon"><i class="fas <?php echo e($cat->icon_class); ?>"></i></div>
          <div class="dua-category-tile-content">
            <h3 class="dua-category-tile-title"><?php echo e($cat->name_roman_urdu ?? $cat->name_english); ?></h3>
            <p class="dua-category-tile-count"><?php echo e($cat->duas_count); ?> Duas available</p>
          </div>
          <div class="dua-category-tile-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
      </div>
    </div>
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\duas\index.blade.php ENDPATH**/ ?>