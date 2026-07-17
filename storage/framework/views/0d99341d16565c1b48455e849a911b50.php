<div class="sidebar-widget">
    <h3 class="widget-title">Downloads</h3>
    <div class="surah-action-buttons" style="display:flex; flex-direction:column; gap:10px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->pdf_url): ?>
            <a href="<?php echo e($surah->pdf_url); ?>" class="surah-action-btn" target="_blank" style="width:100%; text-align:center; padding: 10px; background: var(--primary); color: white; border-radius: 5px; text-decoration: none;"><i class="fas fa-file-pdf"></i> PDF Download</a>
        <?php else: ?>
            <button disabled style="width:100%; text-align:center; padding: 10px; background: #ddd; color: #888; border-radius: 5px; cursor: not-allowed; border: none;"><i class="fas fa-file-pdf"></i> PDF Coming Soon</button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->audio_url): ?>
            <a href="<?php echo e($surah->audio_url); ?>" class="surah-action-btn" target="_blank" style="width:100%; text-align:center; padding: 10px; background: var(--primary); color: white; border-radius: 5px; text-decoration: none; margin-top: 5px;"><i class="fas fa-download"></i> MP3 Audio</a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\surah\partials\_downloads.blade.php ENDPATH**/ ?>