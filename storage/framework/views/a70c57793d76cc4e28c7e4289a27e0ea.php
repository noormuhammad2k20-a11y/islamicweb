<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->learningPath): ?>
<div class="sidebar-widget">
    <h3 class="widget-title">Learning Path</h3>
    <div class="widget-content">
        <p style="margin-bottom:10px;"><strong>Difficulty:</strong> <?php echo e($surah->learningPath->difficulty_level); ?></p>
        <p style="margin-bottom:10px;"><strong>Reading Time:</strong> ~<?php echo e($surah->learningPath->estimated_reading_minutes); ?> minutes</p>
        <p style="font-size:0.9rem; color:#666;"><strong>Tips:</strong> <?php echo e($surah->learningPath->memorization_tips_en); ?></p>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\surah\partials\_learning-path.blade.php ENDPATH**/ ?>