

<?php $__env->startSection('title', 'Sitemap — Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Sitemap for Noor-e-Islam. Find links to all pages on our website.'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Sitemap</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-sitemap"></i> Navigation</div>
            <h1 class="section-title">Website <span>Sitemap</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-link" style="color: var(--gold); margin-right: 10px;"></i> Important Links</h2>
                <ul style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px; list-style-type: disc;">
                    <li><a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;">Home</a></li>
                    <li><a href="<?php echo e(route('about')); ?>" style="color: var(--primary); text-decoration: none;">About Us</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>" style="color: var(--primary); text-decoration: none;">Contact Us</a></li>
                    <li><a href="<?php echo e(route('privacy')); ?>" style="color: var(--primary); text-decoration: none;">Privacy Policy</a></li>
                    <li><a href="<?php echo e(route('terms')); ?>" style="color: var(--primary); text-decoration: none;">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\sitemap.blade.php ENDPATH**/ ?>