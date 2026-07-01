<?php $__env->startSection('title', ucfirst($title ?? 'Page') . ' — Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Learn more about ' . ($title ?? 'this topic') . ' on Noor-e-Islam.'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;"><?php echo e(ucfirst($title ?? 'Page')); ?></span>
            </div>
        </div>

        <div class="section-header">
            <h1 class="section-title">Coming <span>Soon</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">This page (<?php echo e(ucfirst($title ?? 'Page')); ?>) is currently under construction and will be available soon.</p>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/placeholder.blade.php ENDPATH**/ ?>