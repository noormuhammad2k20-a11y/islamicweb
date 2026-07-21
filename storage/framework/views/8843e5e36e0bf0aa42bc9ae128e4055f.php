<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'desc', 'icon' => 'fa-star']));

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

foreach (array_filter((['title', 'desc', 'icon' => 'fa-star']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
    <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
        <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
        <span style="color: #ccc; margin: 0 10px;">/</span> 
        <span style="color: #666; font-weight: 600;"><?php echo e($title); ?></span>
    </div>
</div>

<div class="section-header">
    <div class="section-badge"><i class="fas <?php echo e($icon); ?>"></i> Feature</div>
    <h1 class="section-title"><?php echo e($title); ?></h1>
    <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
    <p class="section-subtitle"><?php echo e($desc); ?></p>
</div>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/components/page-header.blade.php ENDPATH**/ ?>