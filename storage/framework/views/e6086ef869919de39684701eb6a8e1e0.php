

<?php $__env->startSection('title', 'Hadith ' . $number . ' - ' . $bookName); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header" style="background: var(--primary); color: white; padding: 40px 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 10px;">Hadith Number <?php echo e($number); ?></h1>
        <p style="opacity: 0.8; margin-bottom: 0;"><?php echo e($bookName); ?> &mdash; Chapter <?php echo e($chapter); ?></p>
    </div>
</div>

<div class="container" style="padding: 40px 20px;">
    <!-- Content goes here -->
    <div style="background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px;">
        <h3><?php echo e($hadith->reference ?? 'Reference not found'); ?></h3>
        <h4 style="color: var(--primary); font-family: 'Amiri', serif; font-size: 1.5rem; text-align: right; margin-top: 20px;">
            <?php echo e($hadith->arabic_text ?? 'Arabic text missing'); ?>

        </h4>
        <p style="font-size: 1.1rem; line-height: 1.8; margin-top: 20px;">
            <?php echo e($hadith->english_translation ?? 'Translation missing'); ?>

        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\hadith\collection_hadith_show.blade.php ENDPATH**/ ?>