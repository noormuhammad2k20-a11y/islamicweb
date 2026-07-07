<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['seo' => []]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['seo' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<title><?php echo e($seo['title'] ?? config('app.name')); ?></title>
<meta name="description" content="<?php echo e($seo['description'] ?? ''); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seo['canonical'])): ?>
    <link rel="canonical" href="<?php echo e($seo['canonical']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<meta property="og:title" content="<?php echo e($seo['og_title'] ?? ($seo['title'] ?? '')); ?>">
<meta property="og:description" content="<?php echo e($seo['og_description'] ?? ($seo['description'] ?? '')); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seo['og_image'])): ?>
    <meta property="og:image" content="<?php echo e($seo['og_image']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<meta property="og:type" content="<?php echo e($seo['og_type'] ?? 'website'); ?>">

<meta name="twitter:card" content="<?php echo e($seo['twitter_card'] ?? 'summary_large_image'); ?>">
<meta name="twitter:title" content="<?php echo e($seo['og_title'] ?? ($seo['title'] ?? '')); ?>">
<meta name="twitter:description" content="<?php echo e($seo['og_description'] ?? ($seo['description'] ?? '')); ?>">
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seo['og_image'])): ?>
    <meta name="twitter:image" content="<?php echo e($seo['og_image']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($seo['robots'])): ?>
    <meta name="robots" content="<?php echo e($seo['robots']); ?>">
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/components/seo-head.blade.php ENDPATH**/ ?>