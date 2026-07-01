<?php $__env->startSection('title', 'Hadith Topics — Authentic Islamic Traditions'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Hadith Topics</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-open"></i> Authentic</div>
            <h1 class="section-title">Hadith by <span>Topic</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Explore collections of authentic Ahadeeth categorized by subject.</p>
        </div>

        <div class="services-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="service-card" style="text-align: center;">
                <div class="service-icon"><i class="fas fa-book-reader"></i></div>
                <h3 style="margin-bottom: 15px;"><?php echo e($topic->topic_name); ?></h3>
                <p style="margin-bottom: 20px; font-size: 0.95rem; color: #666;">Read authentic narrations related to <?php echo e(strtolower($topic->topic_name)); ?>.</p>
                <a href="<?php echo e(route('hadith.show', $topic->slug)); ?>" class="service-link">View Hadith <i class="fas fa-arrow-right"></i></a>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topics->count() == 0): ?>
        <div class="contact-grid" style="grid-template-columns: 1fr; margin-top: 40px;">
            <div class="contact-info" style="text-align: center;">
                <i class="fas fa-info-circle fa-2x" style="margin-bottom: 15px; color: var(--gold);"></i>
                <p>Hadith topics are currently being updated.</p>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/hadith/index.blade.php ENDPATH**/ ?>