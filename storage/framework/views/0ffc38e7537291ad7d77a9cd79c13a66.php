<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ayahs->count() > 0): ?>
<div class="surah-content-card" id="continuous-reading" style="margin-top: 30px;" aria-label="Complete Surah Reading">
    <div class="surah-content-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <i class="fas fa-book-open" aria-hidden="true" style="color:var(--primary);"></i>
            <h3 style="display: inline-block; margin-left: 10px; margin-bottom: 0;">Complete Surah Reading</h3>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="#translations" class="surah-action-btn" style="margin: 0; padding: 8px 15px; font-size: 0.9rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                <i class="fas fa-list" aria-hidden="true" style="margin-right: 5px;"></i> Verse by Verse
            </a>
        </div>
    </div>
    
    <div style="padding: 25px; background: #fff; border-radius: 0 0 10px 10px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->number != 9): ?>
        <div style="text-align: center; font-size: 2rem; font-family: 'Amiri', 'Traditional Arabic', serif; color: var(--primary-dark); margin-bottom: 25px;">
            بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        <!-- Continuous Arabic Text -->
        <div class="continuous-arabic" style="font-size: 1.8rem; line-height: 2.5; text-align: justify; direction: rtl; font-family: 'Amiri', 'Traditional Arabic', serif; color: #222;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surah->ayahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php echo e($ayah->arabic_text); ?> 
                <span class="ayah-marker" style="color: var(--gold); font-size: 1.4rem; margin: 0 5px;">﴿<?php echo e($ayah->ayah_number); ?>﴾</span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/partials/_continuous-reading.blade.php ENDPATH**/ ?>