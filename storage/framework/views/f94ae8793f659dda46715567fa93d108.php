

<?php $__env->startSection('seo'); ?>
<title>Ramadan FAQs — Common Questions About Fasting | IslamicWeb</title>
<meta name="description" content="Find answers to frequently asked questions about Ramadan, fasting rules, timings, and common misconceptions.">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
    
    .faq-container { max-width: 900px; margin: 0 auto 60px auto; padding: 0 20px; }
    .faq-item { background: white; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); padding: 25px; transition: transform 0.3s; }
    .faq-item:hover { transform: translateY(-3px); border-color: var(--primary); }
    .faq-q { font-size: 1.3rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 15px 0; font-weight: bold; display: flex; gap: 15px; align-items: flex-start; }
    .faq-q::before { content: 'Q.'; color: var(--gold); font-size: 1.5rem; line-height: 1; }
    .faq-a { font-size: 1.05rem; color: #555; line-height: 1.7; padding-left: 35px; }
</style>

<section class="page-hero">
    <h1 class="page-title">Ramadan FAQs</h1>
    <p class="page-subtitle">Answers to the most common questions regarding fasting, prayer times, and Ramadan rulings.</p>
</section>

<div class="faq-container">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($faqs) && is_array($faqs)): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="faq-item">
            <h3 class="faq-q"><?php echo e($faq['q']); ?></h3>
            <div class="faq-a"><?php echo e($faq['a']); ?></div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php else: ?>
        <p style="text-align:center;">FAQs are currently being updated.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\ramadan\faqs.blade.php ENDPATH**/ ?>