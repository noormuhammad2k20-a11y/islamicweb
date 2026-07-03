
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name' => 'Editorial Team', 'role' => 'Islamic Content Reviewer', 'avatar' => null]));

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

foreach (array_filter((['name' => 'Editorial Team', 'role' => 'Islamic Content Reviewer', 'avatar' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="author-box" itemscope itemtype="https://schema.org/Person">
    <div class="author-avatar">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($avatar): ?>
            <img src="<?php echo e(asset($avatar)); ?>" alt="<?php echo e($name); ?>" itemprop="image">
        <?php else: ?>
            <div class="avatar-placeholder">
                <i class="fas fa-user-edit"></i>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <div class="author-info">
        <h4 itemprop="name"><?php echo e($name); ?></h4>
        <span class="author-role" itemprop="jobTitle"><?php echo e($role); ?></span>
        <p class="author-bio" itemprop="description">
            Content verified by authentic Islamic scholars and astronomical data sources to ensure maximum accuracy for Hijri dates and prayer times.
        </p>
    </div>
</div>

<style>
.author-box {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 25px;
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(10, 58, 42, 0.05);
    margin: 30px 0;
}
.author-avatar {
    flex-shrink: 0;
}
.author-avatar img,
.avatar-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--gold);
}
.avatar-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(10, 58, 42, 0.05);
    color: var(--primary);
    font-size: 2rem;
}
.author-info h4 {
    margin: 0 0 5px 0;
    font-size: 1.2rem;
    color: var(--primary-dark);
}
.author-role {
    display: inline-block;
    font-size: 0.85rem;
    color: var(--gold);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}
.author-bio {
    margin: 0;
    color: var(--text);
    font-size: 0.95rem;
    line-height: 1.5;
}
@media (max-width: 576px) {
    .author-box {
        flex-direction: column;
        text-align: center;
    }
}
</style>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/components/author-box.blade.php ENDPATH**/ ?>