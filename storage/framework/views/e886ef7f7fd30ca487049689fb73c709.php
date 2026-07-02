<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($paginator->hasPages()): ?>
    <nav style="display: flex; justify-content: center; align-items: center; gap: 8px; font-family: 'Amiri', serif; margin-top: 40px; margin-bottom: 20px;">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($paginator->onFirstPage()): ?>
            <span style="padding: 10px 16px; border-radius: 8px; background: #f3f4f6; color: #9ca3af; cursor: not-allowed; border: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-left"></i>
            </span>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" style="padding: 10px 16px; border-radius: 8px; background: #fff; border: 1px solid #1a6b42; color: #1a6b42; text-decoration: none; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='#1a6b42'; this.style.color='#fff';" onmouseout="this.style.background='#fff'; this.style.color='#1a6b42';">
                <i class="fas fa-chevron-left"></i>
            </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_string($element)): ?>
                <span style="padding: 10px 16px; color: #6b7280; font-weight: bold; font-size: 1.1rem;"><?php echo e($element); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($element)): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page == $paginator->currentPage()): ?>
                        <span style="padding: 10px 18px; border-radius: 8px; background: #1a6b42; color: #fff; font-weight: bold; font-size: 1.1rem; box-shadow: 0 2px 4px rgba(26,107,66,0.2);">
                            <?php echo e($page); ?>

                        </span>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" style="padding: 10px 18px; border-radius: 8px; background: #fff; border: 1px solid #e5e7eb; color: #374151; text-decoration: none; transition: all 0.2s; font-size: 1.1rem; font-weight: 500;" onmouseover="this.style.borderColor='#1a6b42'; this.style.color='#1a6b42';" onmouseout="this.style.borderColor='#e5e7eb'; this.style.color='#374151';">
                            <?php echo e($page); ?>

                        </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" style="padding: 10px 16px; border-radius: 8px; background: #fff; border: 1px solid #1a6b42; color: #1a6b42; text-decoration: none; transition: all 0.2s; display: flex; align-items: center; justify-content: center;" onmouseover="this.style.background='#1a6b42'; this.style.color='#fff';" onmouseout="this.style.background='#fff'; this.style.color='#1a6b42';">
                <i class="fas fa-chevron-right"></i>
            </a>
        <?php else: ?>
            <span style="padding: 10px 16px; border-radius: 8px; background: #f3f4f6; color: #9ca3af; cursor: not-allowed; border: 1px solid #e5e7eb; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chevron-right"></i>
            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </nav>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>