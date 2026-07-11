

<?php $__env->startSection('title', $seoMeta->title ?? 'وظیفہ | NoorIslam'); ?>
<?php $__env->startSection('meta_description', $seoMeta->meta_description ?? ''); ?>

<?php $__env->startSection('content'); ?>
<div style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">

    
    <nav style="font-size: 0.85rem; color: #888; margin-bottom: 24px;">
        <a href="<?php echo e(route('home')); ?>" style="color: #1a6b42; text-decoration: none;">Home</a>
        <span style="margin: 0 6px;">/</span>
        <a href="<?php echo e(route('wazaif.index')); ?>" style="color: #1a6b42; text-decoration: none;">وظائف</a>
        <span style="margin: 0 6px;">/</span>
        <span><?php echo e($wazifa->title_urdu); ?></span>
    </nav>

    
    <article style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">

        
        <div style="background: linear-gradient(135deg, #0d4a2e, #1a6b42); padding: 32px; text-align: center; color: #fff; position: relative;">
            <button onclick="window.print()" style="position: absolute; top: 16px; right: 16px; background: rgba(255,255,255,0.2); border: none; color: white; width: 36px; height: 36px; border-radius: 50%; cursor: pointer;" title="Print Wazifa">
                <i class="fas fa-print"></i>
            </button>
            <h1 style="font-family: 'Amiri', serif; font-size: 1.8rem; margin-bottom: 8px; direction: rtl;"><?php echo e($wazifa->title_urdu); ?></h1>
            <p style="opacity: 0.85; font-size: 1rem;"><?php echo e($wazifa->title_english); ?></p>
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; margin-top: 10px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $wazifa->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <span style="display: inline-block; background: rgba(255,255,255,0.2); padding: 4px 16px; border-radius: 20px; font-size: 0.85rem; direction: rtl;"><?php echo e($cat->name_urdu ?? $cat->name_english); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        <div style="padding: 32px;">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->arabic_text): ?>
            <div style="background: linear-gradient(135deg, #f0faf4, #e8f5ee); border-radius: 12px; padding: 28px; text-align: center; margin-bottom: 28px; border: 1px solid #d4edda;">
                <div style="font-family: 'Amiri', serif; font-size: 2rem; color: #0d4a2e; direction: rtl; line-height: 2.2;">
                    <?php echo e($wazifa->arabic_text); ?>

                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->urdu_text): ?>
            <div style="direction: rtl; margin-bottom: 24px;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #1a6b42; margin-bottom: 12px;">
                    <i class="fas fa-file-alt"></i> تفصیل
                </h2>
                <p style="font-family: 'Amiri', serif; font-size: 1.1rem; line-height: 2; color: #333; background: #fafafa; padding: 20px; border-radius: 8px; border-right: 4px solid #1a6b42;">
                    <?php echo e($wazifa->urdu_text); ?>

                </p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 24px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->benefits): ?>
                <div style="direction: rtl;">
                    <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #10b981; margin-bottom: 12px;">
                        <i class="fas fa-star"></i> فوائد / Benefits
                    </h2>
                    <div style="background: #f0fdf4; padding: 20px; border-radius: 8px; border-right: 4px solid #10b981; font-size: 1rem; line-height: 1.8; color: #333;">
                        <?php echo e($wazifa->benefits); ?>

                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->conditions || $wazifa->precautions): ?>
                <div style="direction: rtl;">
                    <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #c0392b; margin-bottom: 12px;">
                        <i class="fas fa-exclamation-triangle"></i> شرائط و احتیاط
                    </h2>
                    <div style="background: #fde8e8; padding: 20px; border-radius: 8px; border-right: 4px solid #c0392b; font-size: 1rem; line-height: 1.8; color: #333;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->conditions): ?> <p><strong>شرائط:</strong> <?php echo e($wazifa->conditions); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->precautions): ?> <p><strong>احتیاط:</strong> <?php echo e($wazifa->precautions); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->method || $wazifa->frequency || $wazifa->before_after_salah): ?>
            <div style="direction: rtl; margin-bottom: 24px;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #c9982e; margin-bottom: 12px;">
                    <i class="fas fa-clipboard-list"></i> طریقہ / Method
                </h2>
                <div style="background: linear-gradient(135deg, #fffbf0, #fff8e8); padding: 20px; border-radius: 8px; border-right: 4px solid #c9982e; font-family: 'Amiri', serif; font-size: 1.05rem; line-height: 1.8; color: #555;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->frequency): ?> <p><strong>اوقات:</strong> <?php echo e($wazifa->frequency); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->before_after_salah): ?> <p><strong>نماز کے بعد/پہلے:</strong> <?php echo e($wazifa->before_after_salah); ?></p> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->method): ?> <div><?php echo e($wazifa->method); ?></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->reference || $wazifa->book_name): ?>
            <div style="display: flex; flex-direction: column; gap: 8px; padding: 20px; background: #f8f9fa; border-radius: 8px; margin-bottom: 24px; border: 1px solid #e9ecef;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-book-open" style="color: #1a6b42; font-size: 1.2rem;"></i>
                    <span style="font-size: 1rem; font-weight: 600; color: #333;">Reference Details</span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->authenticity_grade || $wazifa->scholar_verified): ?>
                    <span style="margin-left: auto; background: #1a6b42; color: #fff; padding: 4px 12px; border-radius: 16px; font-size: 0.8rem;">
                        <i class="fas fa-check-circle"></i> <?php echo e($wazifa->authenticity_grade ?: 'مستند و محقق'); ?>

                    </span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div style="font-size: 0.9rem; color: #555; margin-top: 8px; margin-left: 28px;">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->book_name): ?> <div><strong>Book:</strong> <?php echo e($wazifa->book_name); ?></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->chapter): ?> <div><strong>Chapter:</strong> <?php echo e($wazifa->chapter); ?></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->hadith_number): ?> <div><strong>Hadith:</strong> <?php echo e($wazifa->hadith_number); ?></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->reference): ?> <div><strong>General Ref:</strong> <?php echo e($wazifa->reference); ?></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($wazifa->reference_details): ?> <div style="margin-top: 8px; color: #777;"><em><?php echo e($wazifa->reference_details); ?></em></div> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div style="display: flex; gap: 10px; flex-wrap: wrap; padding-top: 20px; border-top: 1px solid #eee;">
                <span style="font-size: 0.9rem; color: #888; display: flex; align-items: center; gap: 6px;"><i class="fas fa-share-alt"></i> شیئر کریں:</span>
                <a href="https://wa.me/?text=<?php echo e(urlencode($wazifa->title_urdu . ' - ' . url()->current())); ?>" target="_blank" style="background: #25d366; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank" style="background: #1877f2; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-facebook-f"></i> Facebook</a>
                <button onclick="navigator.clipboard.writeText('<?php echo e(url()->current()); ?>'); this.textContent='✓ Copied!'; setTimeout(() => this.textContent='Copy Link', 2000);" style="background: #6c757d; color: #fff; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; font-size: 0.85rem;">Copy Link</button>
            </div>
        </div>
    </article>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->count()): ?>
    <div style="margin-top: 48px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #333; margin-bottom: 20px; direction: rtl;">متعلقہ وظائف</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('wazaif.show', $r->slug)); ?>" style="text-decoration: none; color: inherit;">
                <div style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border: 1px solid #eee; transition: all 0.3s;" onmouseover="this.style.borderColor='#1a6b42'" onmouseout="this.style.borderColor='#eee'">
                    <h3 style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #1a6b42; direction: rtl; margin-bottom: 6px;"><?php echo e($r->title_urdu); ?></h3>
                    <p style="font-size: 0.85rem; color: #666;"><?php echo e($r->title_english); ?></p>
                </div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/wazaif/show.blade.php ENDPATH**/ ?>