


<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['countdowns' => []]));

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

foreach (array_filter((['countdowns' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="countdown-grid" id="countdownTimers">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $countdowns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countdown): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
    <div class="countdown-card">
        <div class="countdown-icon">
            <i class="fas <?php echo e($countdown['icon']); ?>"></i>
        </div>
        <div class="countdown-info">
            <h4><?php echo e($countdown['name']); ?></h4>
            <p class="countdown-hijri"><?php echo e($countdown['hijri_date']); ?></p>
        </div>
        <div class="countdown-days">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($countdown['is_today'] ?? false): ?>
                <span class="days-number today-badge">Today!</span>
            <?php else: ?>
                <span class="days-number"><?php echo e($countdown['days_away']); ?></span>
                <span class="days-label">days</span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
</div>

<style>
.countdown-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 16px;
}
.countdown-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--white);
    padding: 20px;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(10, 58, 42, 0.06);
    box-shadow: var(--shadow-sm);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.countdown-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
.countdown-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    font-size: 1.3rem;
    flex-shrink: 0;
}
.countdown-info {
    flex: 1;
    min-width: 0;
}
.countdown-info h4 {
    margin: 0 0 4px 0;
    font-size: 1rem;
    font-weight: 600;
    color: var(--primary-dark);
}
.countdown-hijri {
    margin: 0;
    font-size: 0.85rem;
    color: var(--text-light);
}
.countdown-days {
    text-align: center;
    flex-shrink: 0;
}
.days-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}
.days-number.today-badge {
    font-size: 1rem;
    background: var(--gold);
    color: var(--primary-dark);
    padding: 6px 14px;
    border-radius: var(--radius-xl);
    font-weight: 700;
}
.days-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-light);
    font-weight: 600;
}
@media (max-width: 768px) {
    .countdown-grid {
        grid-template-columns: 1fr 1fr;
    }
}
@media (max-width: 480px) {
    .countdown-grid {
        grid-template-columns: 1fr;
    }
}
</style>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/components/countdown-timers.blade.php ENDPATH**/ ?>