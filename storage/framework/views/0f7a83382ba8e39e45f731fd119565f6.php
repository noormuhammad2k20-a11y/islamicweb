

<?php $__env->startSection('title', $seoMeta->title ?? 'وظائف | NoorIslam'); ?>
<?php $__env->startSection('meta_description', $seoMeta->meta_description ?? ''); ?>

<?php $__env->startSection('content'); ?>
<section class="wazaif-hero" style="background: linear-gradient(135deg, #0d4a2e 0%, #1a6b42 50%, #0d4a2e 100%); padding: 60px 0; text-align: center; color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; opacity: 0.06; background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 80 80%22><circle cx=%2240%22 cy=%2240%22 r=%2235%22 fill=%22none%22 stroke=%22white%22 stroke-width=%220.5%22/></svg>'); background-size: 80px;"></div>
    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">
        <h1 style="font-family: 'Amiri', serif; font-size: 2.6rem; margin-bottom: 12px; direction: rtl;">مسنون وظائف</h1>
        <p style="font-size: 1.1rem; opacity: 0.9; direction: rtl; font-family: 'Amiri', serif;">قرآن و حدیث سے ثابت مستند وظائف — ہر مشکل کا حل</p>
        <p style="font-size: 0.95rem; opacity: 0.75; margin-top: 8px;">Authentic Wazaif from Quran & Hadith</p>
    </div>
</section>

<div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($purposes->count()): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
    <div style="margin-bottom: 48px;">
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #1a6b42;">
            <span style="background: linear-gradient(135deg, #1a6b42, #2d9254); color: #fff; padding: 6px 18px; border-radius: 20px; font-family: 'Amiri', serif; font-size: 1.1rem; direction: rtl;"><?php echo e($purpose); ?></span>
            <span style="color: #888; font-size: 0.9rem;"><?php echo e($items->count()); ?> وظائف</span>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 20px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wazifa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('wazaif.show', $wazifa->slug)); ?>" style="text-decoration: none; color: inherit;">
                <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #eee; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 24px rgba(26,107,66,0.12)'; this.style.borderColor='#1a6b42';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'; this.style.borderColor='#eee';">

                    <div style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #1a6b42; text-align: center; direction: rtl; line-height: 2; margin-bottom: 12px; padding: 12px; background: linear-gradient(135deg, #f0faf4, #e8f5ee); border-radius: 8px;">
                        <?php echo e(\Illuminate\Support\Str::limit($wazifa->arabic_text, 80)); ?>

                    </div>

                    <h3 style="font-family: 'Amiri', serif; font-size: 1.15rem; color: #333; direction: rtl; margin-bottom: 6px;"><?php echo e($wazifa->title_urdu); ?></h3>
                    <p style="font-size: 0.85rem; color: #666; margin-bottom: 8px;"><?php echo e($wazifa->title_english); ?></p>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->reference): ?>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #1a6b42; margin-top: 8px;">
                        <i class="fas fa-book-open"></i>
                        <span><?php echo e($wazifa->reference); ?></span>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->scholar_verified): ?>
                    <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 0.75rem; color: #fff; background: #1a6b42; padding: 3px 10px; border-radius: 12px; margin-top: 8px;">
                        <i class="fas fa-check-circle"></i> مستند
                    </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <?php else: ?>
    <div style="text-align: center; padding: 60px 20px; color: #888;">
        <i class="fas fa-book" style="font-size: 3rem; opacity: 0.3; margin-bottom: 16px;"></i>
        <p style="font-size: 1.1rem;">وظائف جلد شامل کیے جائیں گے</p>
        <p>Wazaif content coming soon</p>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/wazaif/index.blade.php ENDPATH**/ ?>