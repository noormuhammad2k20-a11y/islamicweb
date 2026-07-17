

<?php $__env->startSection('seo'); ?>
<title>Lailatul Qadr (The Night of Power) — Signs, Virtues & Duas | IslamicWeb</title>
<meta name="description" content="A comprehensive guide to Lailatul Qadr, the Night of Decree. Learn its signs, virtues, recommended prayers, and authentic Duas.">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
    
    .guide-container { max-width: 1000px; margin: 0 auto 60px auto; padding: 0 20px; }
    .guide-card { background: white; border-radius: 20px; padding: 40px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); margin-bottom: 30px; position: relative; overflow: hidden; }
    .guide-card::before { content: ''; position: absolute; left: 0; top: 0; height: 100%; width: 5px; background: var(--gold); }
    .guide-title { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary); margin-bottom: 20px; font-weight: bold; border-bottom: 1px solid #eee; padding-bottom: 10px;}
    .guide-list { list-style: none; padding: 0; margin: 0; }
    .guide-list li { padding: 15px 0; border-bottom: 1px dashed #eee; font-size: 1.1rem; color: #444; display: flex; align-items: flex-start; gap: 15px; }
    .guide-list li:last-child { border-bottom: none; }
    .guide-list li i { color: var(--primary); margin-top: 5px; font-size: 1.2rem; }
    .guide-text { font-size: 1.15rem; line-height: 1.7; color: #444; }
    
    .dua-arabic { font-family: 'Amiri', serif; font-size: 2.2rem; color: var(--primary-dark); margin: 20px 0; line-height: 1.6; direction: rtl; text-align: center;}
    .dua-transliteration { font-style: italic; color: #666; margin-bottom: 15px; font-size: 1.05rem; text-align: center;}
    .dua-translation { color: #444; font-weight: 500; font-size: 1.1rem; line-height: 1.5; border-top: 1px dashed #eee; padding-top: 15px; text-align: center;}
</style>

<section class="page-hero">
    <h1 class="page-title">Lailatul Qadr (Night of Decree)</h1>
    <p class="page-subtitle">A night better than a thousand months. Learn its virtues, signs, and the best ways to observe it.</p>
</section>

<div class="guide-container">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($guide) && is_array($guide)): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $guide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="guide-card">
            <h2 class="guide-title"><?php echo e($title); ?></h2>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($content)): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($content['arabic'])): ?>
                    <div class="dua-arabic"><?php echo e($content['arabic']); ?></div>
                    <div class="dua-transliteration">"<?php echo e($content['transliteration']); ?>"</div>
                    <div class="dua-translation"><?php echo e($content['translation']); ?></div>
                <?php else: ?>
                    <ul class="guide-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li><i class="fas fa-star"></i> <span><?php echo e($item); ?></span></li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <p class="guide-text"><?php echo e($content); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php else: ?>
        <p style="text-align:center;">Guide is currently being updated.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\ramadan\laylatul_qadr.blade.php ENDPATH**/ ?>