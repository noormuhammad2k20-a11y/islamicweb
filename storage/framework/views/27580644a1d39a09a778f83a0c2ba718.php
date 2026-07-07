<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->getContentText('authentic_virtues')): ?>
<div class="surah-content-card" id="virtues" style="margin-top: 30px;">
    <div class="surah-content-card-header">
        <i class="fas fa-star" style="color: var(--gold);"></i>
        <h3>Virtues & Benefits (Fazilat)</h3>
    </div>
    <div style="padding: 30px;">
        <div style="margin-bottom: 25px; padding-bottom: 20px;">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <span style="background: #e8f5e9; color: #2e7d32; padding: 4px 10px; border-radius: 5px; font-size: 0.8rem; font-weight: bold; margin-right: 10px; border: 1px solid #c8e6c9;">Sahih (Authentic)</span>
            </div>
            <div style="font-size: 1.05rem; line-height: 1.8; color: #444; margin-bottom: 15px;">
                <?php echo $surah->getContentText('authentic_virtues'); ?>

            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/partials/_virtues.blade.php ENDPATH**/ ?>