<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->getContentText('overview')): ?>
<div class="surah-content-card" id="overview">
    <div class="surah-content-card-header">
        <i class="fas fa-info-circle"></i>
        <h3>Overview</h3>
    </div>
    <div style="padding: 20px;">
        <?php echo $surah->getContentText('overview'); ?>

    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/partials/_overview.blade.php ENDPATH**/ ?>