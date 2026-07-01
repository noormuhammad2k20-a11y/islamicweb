<?php $__env->startSection('title', 'Islamic Calendar & Events — Hijri Dates'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Islamic Calendar</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h1 class="section-title">Islamic <span>Events</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Months and Significant Dates</p>
        </div>

        <div class="services-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="font-size: 1.5rem; font-weight: bold; background: var(--primary-light); color: var(--primary-dark); width: 60px; height: 60px; border-radius: 50%; line-height: 60px; margin: 0 auto 20px auto;"><?php echo e($month->month_number); ?></div>
                <h3 style="font-family: 'Amiri', serif; font-size: 1.8rem; margin-bottom: 5px;"><?php echo e($month->name_ar); ?></h3>
                <h4 style="color: #666; font-size: 1.1rem; margin-bottom: 20px;"><?php echo e($month->name_en); ?> (<?php echo e($month->name_ur); ?>)</h4>
                <a href="<?php echo e(route('events.month', $month->slug)); ?>" class="service-link">View Month <i class="fas fa-arrow-right"></i></a>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/events/index.blade.php ENDPATH**/ ?>