<?php $__env->startSection('title', 'Hadith about ' . $topic->topic_name . ' — Authentic Islamic Traditions'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="<?php echo e(route('hadith.index')); ?>" style="color: #999; text-decoration: none;">Hadith Topics</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;"><?php echo e($topic->topic_name); ?></span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-reader"></i> Topic</div>
            <h1 class="section-title">Hadith: <span><?php echo e($topic->topic_name); ?></span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <div style="display: inline-block; background: var(--primary-light); color: var(--primary-dark); padding: 8px 20px; border-radius: 50px; font-weight: bold; margin-bottom: 25px; font-size: 0.9rem;">
                    <i class="fas fa-book"></i> <?php echo e($topic->hadith_book); ?> (Hadith <?php echo e($topic->hadith_number); ?>)
                </div>
                
                <p style="font-size: 1.25rem; line-height: 2; color: #444; margin-bottom: 0;">
                    <?php echo e($topic->content); ?>

                </p>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo e(route('hadith.index')); ?>" class="btn-primary">Browse All Topics</a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/hadith/show.blade.php ENDPATH**/ ?>