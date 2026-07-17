<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'desc', 'icon' => 'fa-star', 'url' => '#', 'badge' => null]));

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

foreach (array_filter((['title', 'desc', 'icon' => 'fa-star', 'url' => '#', 'badge' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<a href="<?php echo e($url); ?>" class="module-card">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($badge): ?>
        <span class="module-card-badge"><?php echo e($badge); ?></span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="module-card-icon">
        <i class="fas <?php echo e($icon); ?>"></i>
    </div>
    <div class="module-card-content">
        <h3><?php echo e($title); ?></h3>
        <p><?php echo e($desc); ?></p>
    </div>
</a>

<style>
.module-card {
    display: flex;
    flex-direction: column;
    background: var(--white);
    border-radius: var(--radius-md);
    padding: 25px;
    text-decoration: none;
    color: var(--text-dark);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(10, 58, 42, 0.05);
    transition: var(--tr);
    position: relative;
    overflow: hidden;
    height: 100%;
}

.module-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(10, 58, 42, 0.2);
}

.module-card-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary-subtle);
    color: var(--primary);
    font-size: 0.7rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: var(--radius-xl);
}

.module-card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, rgba(10, 58, 42, 0.05), rgba(10, 58, 42, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--primary);
    font-size: 1.5rem;
    transition: var(--tr);
}

.module-card:hover .module-card-icon {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    box-shadow: 0 4px 15px var(--primary-glow);
}

.module-card-content h3 {
    font-size: 1.15rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--primary-dark);
}

.module-card-content p {
    font-size: 0.85rem;
    color: var(--text-medium);
    line-height: 1.6;
    margin: 0;
}

/* Add grid container styles for parent containers */
.modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 30px;
}
</style>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\components\module-card.blade.php ENDPATH**/ ?>