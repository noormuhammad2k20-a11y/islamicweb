<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ayahs->count() > 0): ?>
<div class="surah-content-card" id="translations" style="margin-top: 30px;" aria-label="Translations and Tafsir">
    <div class="surah-content-card-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <i class="fas fa-align-right" aria-hidden="true"></i>
            <h3 style="display: inline-block; margin-left: 10px; margin-bottom: 0;">Verse by Verse with Translation & Tafsir</h3>
        </div>
        <button id="readingModeBtn" class="surah-action-btn" onclick="toggleReadingMode()" aria-label="Toggle Reading Mode" style="margin: 0; padding: 8px 15px; font-size: 0.9rem;"><i class="fas fa-book-reader" aria-hidden="true"></i> Reading Mode</button>
    </div>
    <div style="padding: 0;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surah->ayahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="surah-ayah-block" id="ayah-<?php echo e($ayah->ayah_number); ?>">
                <div class="surah-ayah-arabic-row">
                    <div class="surah-ayah-number-circle"><?php echo e($ayah->ayah_number); ?></div>
                    <div class="surah-ayah-arabic-text"><?php echo e($ayah->arabic_text); ?></div>
                </div>
                <div class="surah-ayah-actions" style="margin-top: 5px; display: flex; gap: 10px; justify-content: flex-end;">
                    <button class="surah-action-btn copy-ayah-btn" data-text="<?php echo e($ayah->arabic_text); ?>" onclick="copyAyah(this)" style="font-size: 0.85rem; padding: 5px 12px;"><i class="fas fa-copy"></i> Copy</button>
                </div>
                <div class="surah-ayah-translations">
                    <div class="surah-ayah-translation urdu">
                        <h4><i class="fas fa-language"></i> Urdu Translation</h4>
                        <p><?php echo e($ayah->urduTranslation->text ?? ''); ?></p>
                        <?php $urduTafseer = $ayah->tafsirs->where('language', 'urdu')->first(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($urduTafseer): ?>
                            <details style="margin-top: 15px;">
                                <summary><i class="fas fa-book-open"></i> View Tafsir</summary>
                                <div style="margin-top:12px; padding:18px; background:#fdfbf7; border-left:4px solid var(--primary);"><?php echo nl2br(e($urduTafseer->text)); ?></div>
                            </details>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="surah-ayah-translation english">
                        <h4><i class="fas fa-globe"></i> English Translation</h4>
                        <p><?php echo e($ayah->englishTranslation->text ?? ''); ?></p>
                        <?php $enTafseer = $ayah->tafsirs->where('language', 'english')->first(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($enTafseer): ?>
                            <details style="margin-top: 15px;">
                                <summary><i class="fas fa-book-open"></i> View Tafsir</summary>
                                <div style="margin-top:12px; padding:18px; background:#fdfbf7; border-left:4px solid var(--primary);"><?php echo nl2br(e($enTafseer->text)); ?></div>
                            </details>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\surah\partials\_ayahs.blade.php ENDPATH**/ ?>