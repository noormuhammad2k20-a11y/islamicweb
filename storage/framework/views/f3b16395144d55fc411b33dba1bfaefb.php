<?php $__env->startSection('title', $narrator->name_en . ' - Hadith Narrator'); ?>
<?php $__env->startSection('meta_description', 'Learn about the biography, life, and hadith narrations of ' . $narrator->name_en . ' (' . $narrator->name_ar . ').'); ?>

<?php $__env->startPush('schema'); ?>
<script type="application/ld+json">
{
  "<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>": "https://schema.org",
  "@type": "Person",
  "name": "<?php echo e($narrator->name_en); ?>",
  "alternateName": "<?php echo e($narrator->name_ar); ?>",
  "description": "Hadith Narrator and Companion",
  <?php if($narrator->birth): ?>
  "birthDate": "<?php echo e($narrator->birth); ?>",
  <?php endif; ?>
  <?php if($narrator->death): ?>
  "deathDate": "<?php echo e($narrator->death); ?>",
  <?php endif; ?>
  "url": "<?php echo e(route('hadith.narratorShow', $narrator->slug)); ?>"
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header" style="background: var(--primary); color: white; padding: 40px 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 10px;"><?php echo e($narrator->name_en); ?> <span style="font-family: 'Amiri', serif;"><?php echo e($narrator->name_ar); ?></span></h1>
        <p style="opacity: 0.8; margin-bottom: 0;"><?php echo e($narrator->status ?? 'Companion of the Prophet ﷺ'); ?></p>
    </div>
</div>

<div class="container" style="padding: 40px 20px;">
    <div class="row">
        <div class="col-md-4">
            <div style="background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px;">
                <h3 style="border-bottom: 2px solid var(--accent); padding-bottom: 10px; margin-bottom: 20px; font-size: 1.2rem; color: var(--primary);">Narrator Profile</h3>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($narrator->birth): ?>
                <p><strong>Birth:</strong> <?php echo e($narrator->birth); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($narrator->death): ?>
                <p><strong>Death:</strong> <?php echo e($narrator->death); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <p><strong>Total Narrations:</strong> <?php echo e($hadiths->total()); ?></p>
                <p><strong>Companion:</strong> <?php echo e($narrator->companion ? 'Yes' : 'No'); ?></p>
            </div>
        </div>
        
        <div class="col-md-8">
            <div style="background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px;">
                <h3 style="border-bottom: 2px solid var(--accent); padding-bottom: 10px; margin-bottom: 20px; font-size: 1.2rem; color: var(--primary);">Biography</h3>
                <div style="line-height: 1.8; color: #444;">
                    <?php echo nl2br(e($narrator->biography ?? 'Biography coming soon.')); ?>

                </div>
            </div>
            
            <h3 style="margin-top: 40px; margin-bottom: 20px; color: var(--primary);">Narrations by <?php echo e($narrator->name_en); ?></h3>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $hadiths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hadith): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="hadith-card" style="background: white; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px; overflow: hidden; border: 1px solid #eee;">
                    <div class="hadith-header" style="background: #f8f9fa; padding: 15px 25px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                        <div class="hadith-meta">
                            <span class="badge" style="background: var(--primary); color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 500;"><?php echo e($hadith->book_name); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->hadith_number): ?>
                            <span style="color: #666; font-size: 0.9rem; margin-left: 10px;">Hadith <?php echo e($hadith->hadith_number); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <div class="hadith-grade">
                            <span class="badge" style="background: #28a745; color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.85rem;"><i class="fas fa-check-circle mr-1"></i> <?php echo e($hadith->grade ?? 'Authentic'); ?></span>
                        </div>
                    </div>
                    <div class="hadith-body" style="padding: 25px;">
                        <div class="arabic-text" style="font-family: 'Amiri', serif; font-size: 1.8rem; line-height: 2.2; text-align: right; color: #222; margin-bottom: 25px;" dir="rtl">
                            <?php echo e($hadith->arabic_text); ?>

                        </div>
                        <div class="translation-text" style="font-size: 1.1rem; line-height: 1.8; color: #444;">
                            <p><strong>Narrated <?php echo e($narrator->name_en); ?>:</strong></p>
                            <p><?php echo e($hadith->english_translation); ?></p>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->reference): ?>
                        <div class="hadith-reference" style="margin-top: 20px; padding-top: 15px; border-top: 1px dashed #ddd; font-size: 0.9rem; color: #777;">
                            Reference: <?php echo e($hadith->reference); ?>

                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($hadiths->links('pagination::bootstrap-4')); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\hadith\narrator_show.blade.php ENDPATH**/ ?>