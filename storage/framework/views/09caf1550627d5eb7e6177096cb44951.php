
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['city' => 'Makkah', 'country' => 'Saudi Arabia', 'prayerTimes' => null]));

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

foreach (array_filter((['city' => 'Makkah', 'country' => 'Saudi Arabia', 'prayerTimes' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="prayer-widget">
    <div class="prayer-header">
        <i class="fas fa-mosque"></i>
        <h3>Prayer Times in <?php echo e($city); ?></h3>
    </div>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prayerTimes): ?>
    <div class="prayer-list">
        <div class="prayer-item" data-prayer="fajr">
            <span class="prayer-name">Fajr</span>
            <span class="prayer-time"><?php echo e(\Carbon\Carbon::parse($prayerTimes->fajr)->format('h:i A')); ?></span>
        </div>
        <div class="prayer-item" data-prayer="sunrise">
            <span class="prayer-name">Sunrise</span>
            <span class="prayer-time"><?php echo e(\Carbon\Carbon::parse($prayerTimes->sunrise)->format('h:i A')); ?></span>
        </div>
        <div class="prayer-item" data-prayer="dhuhr">
            <span class="prayer-name">Dhuhr</span>
            <span class="prayer-time"><?php echo e(\Carbon\Carbon::parse($prayerTimes->dhuhr)->format('h:i A')); ?></span>
        </div>
        <div class="prayer-item" data-prayer="asr">
            <span class="prayer-name">Asr</span>
            <span class="prayer-time"><?php echo e(\Carbon\Carbon::parse($prayerTimes->asr)->format('h:i A')); ?></span>
        </div>
        <div class="prayer-item" data-prayer="maghrib">
            <span class="prayer-name">Maghrib</span>
            <span class="prayer-time"><?php echo e(\Carbon\Carbon::parse($prayerTimes->maghrib)->format('h:i A')); ?></span>
        </div>
        <div class="prayer-item" data-prayer="isha">
            <span class="prayer-name">Isha</span>
            <span class="prayer-time"><?php echo e(\Carbon\Carbon::parse($prayerTimes->isha)->format('h:i A')); ?></span>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prayerTimes->method_name): ?>
    <div class="prayer-method">
        <i class="fas fa-info-circle"></i> Method: <?php echo e($prayerTimes->method_name); ?>

    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>
    <div class="prayer-empty">
        <p>Prayer times currently unavailable for this location.</p>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    
    <div class="prayer-footer">
        <a href="<?php echo e(route('prayer-times.hub')); ?>" class="btn-outline w-100">View Full Schedule</a>
    </div>
</div>

<style>
.prayer-widget {
    background: linear-gradient(to bottom, var(--white), #fdfcf9);
    padding: 25px;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(212, 175, 55, 0.2);
}
.prayer-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    color: var(--primary-dark);
}
.prayer-header i {
    font-size: 1.2rem;
    color: var(--gold);
}
.prayer-header h3 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
}
.prayer-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
}
.prayer-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background: var(--white);
    border: 1px solid rgba(10, 58, 42, 0.05);
    border-radius: var(--radius-md);
    transition: all 0.2s;
}
.prayer-item:hover, .prayer-item.active {
    background: rgba(10, 58, 42, 0.03);
    border-color: var(--primary-light);
    transform: translateX(4px);
}
.prayer-item.active {
    border-left: 4px solid var(--gold);
    padding-left: 12px;
}
.prayer-name {
    font-weight: 600;
    color: var(--text);
}
.prayer-time {
    font-weight: 700;
    color: var(--primary);
    font-family: 'Poppins', sans-serif;
}
.prayer-method {
    font-size: 0.75rem;
    color: var(--text-light);
    text-align: center;
    margin-bottom: 15px;
    line-height: 1.4;
}
.prayer-empty {
    text-align: center;
    padding: 30px 0;
    color: var(--text-light);
}
.prayer-footer .btn-outline {
    display: inline-block;
    text-align: center;
    padding: 10px;
    border: 1px solid var(--primary);
    color: var(--primary);
    border-radius: var(--radius-md);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s;
}
.prayer-footer .btn-outline:hover {
    background: var(--primary);
    color: var(--white);
}
.w-100 { width: 100%; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Highlight next prayer
    var now = new Date();
    // Simplified logic for highlighting - normally you'd parse exact times
});
</script>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\components\prayer-widget.blade.php ENDPATH**/ ?>