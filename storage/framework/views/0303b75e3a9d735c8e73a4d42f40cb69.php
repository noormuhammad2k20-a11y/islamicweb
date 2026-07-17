<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->importantAyahs && $surah->importantAyahs->count() > 0): ?>
<div class="surah-content-card" id="important-ayahs" style="margin-top:30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-star" style="color:var(--gold);"></i>
        <h3>Important Ayahs</h3>
    </div>
    <div style="padding:20px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surah->importantAyahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $impAyah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div id="important-ayah-<?php echo e($impAyah->anchor_id ?? $impAyah->id); ?>" style="margin-bottom:20px; scroll-margin-top: 150px;">
                <h4 style="color:var(--primary);"><i class="fas fa-check-circle"></i> <?php echo e($impAyah->label_en); ?></h4>
                <div style="padding:15px; background:#f9f9f9; border-radius:8px; margin-top:10px;">
                    <p style="font-size:1.5rem; text-align:right;" dir="rtl"><?php echo e($impAyah->ayah->arabic_text ?? ''); ?></p>
                    <p><strong>Translation:</strong> <?php echo e($impAyah->ayah->englishTranslation->text ?? ''); ?></p>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($impAyah->significance_en): ?>
                        <p style="margin-top:10px; font-style:italic;"><?php echo e($impAyah->significance_en); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\surah\partials\_important-ayahs.blade.php ENDPATH**/ ?>