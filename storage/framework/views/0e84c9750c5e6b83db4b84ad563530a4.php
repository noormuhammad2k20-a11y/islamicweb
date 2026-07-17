

<?php $__env->startSection('seo'); ?>
<title>Ramadan Duas — Authentic Supplications for Fasting & Taraweeh | IslamicWeb</title>
<meta name="description" content="Complete collection of authentic Ramadan Duas including Sehri, Iftar, Taraweeh, and Ashras. Beautiful Arabic with transliteration and translation.">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
    
    .dua-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto 60px auto; padding: 0 20px; }
    .dua-card { background: white; border-radius: 20px; padding: 40px 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); text-align: center; transition: transform 0.3s; position: relative; overflow: hidden; }
    .dua-card:hover { transform: translateY(-5px); border-color: var(--gold); }
    .dua-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: var(--gold); }
    .dua-category { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary); margin-bottom: 25px; font-weight: bold; }
    .dua-arabic { font-family: 'Amiri', serif; font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 25px; line-height: 1.6; direction: rtl; }
    .dua-transliteration { font-style: italic; color: #666; margin-bottom: 15px; font-size: 1.05rem; }
    .dua-translation { color: #444; font-weight: 500; font-size: 1.1rem; line-height: 1.5; border-top: 1px dashed #eee; padding-top: 15px; }
</style>

<section class="page-hero">
    <h1 class="page-title">Ramadan Duas</h1>
    <p class="page-subtitle">A comprehensive collection of authentic supplications to maximize your blessings during the holy month.</p>
</section>

<div class="dua-grid">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($duas) && is_array($duas)): ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $duas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title => $dua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="dua-card">
            <h2 class="dua-category"><?php echo e($title); ?> Dua</h2>
            <div class="dua-arabic"><?php echo e($dua['arabic']); ?></div>
            <div class="dua-transliteration">"<?php echo e($dua['transliteration']); ?>"</div>
            <div class="dua-translation"><?php echo e($dua['translation']); ?></div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php else: ?>
        <p style="text-align:center; grid-column: 1/-1;">Duas are currently being updated.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\ramadan\duas.blade.php ENDPATH**/ ?>