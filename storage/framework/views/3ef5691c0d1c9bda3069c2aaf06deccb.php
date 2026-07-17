<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->recitationGuides && $surah->recitationGuides->count() > 0): ?>
<div class="surah-audio-container" id="audioPlayer" style="margin-top:30px;">
    <div class="surah-content-card-header" style="margin-bottom: 15px;">
        <i class="fas fa-headphones" style="color:var(--primary);"></i>
        <h3>Recitations (Tilawat)</h3>
    </div>
    <div style="background: #f9f9f9; padding: 20px; border-radius: 10px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surah->recitationGuides->sortBy('sort_order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reciter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div style="margin-bottom: 15px; border-bottom: 1px solid #eaeaea; padding-bottom: 15px;">
                <h4 style="margin-bottom: 10px; font-size: 1.05rem;">
                    <?php echo e($reciter->reciter_name_en); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($reciter->is_featured): ?>
                        <span style="background: var(--gold); color: #fff; font-size: 0.7rem; padding: 2px 6px; border-radius: 10px; vertical-align: middle; margin-left: 5px;">Featured</span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </h4>
                <audio controls preload="none" style="width: 100%; height: 40px;">
                    <source src="<?php echo e($reciter->audio_url ?? $surah->audio_url ?? '#'); ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\surah\partials\_audio-player.blade.php ENDPATH**/ ?>