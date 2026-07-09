

<?php $__env->startSection('title', 'Step-by-step Umrah Guide — Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Complete rituals for performing Umrah'); ?>

<?php $__env->startSection('content'); ?>
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['title' => 'Step-by-step Umrah Guide','desc' => 'Complete rituals for performing Umrah','icon' => 'fa-kaaba']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Step-by-step Umrah Guide','desc' => 'Complete rituals for performing Umrah','icon' => 'fa-kaaba']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $attributes = $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $component = $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>

        <div style="max-width: 800px; margin: 0 auto;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($guides) && count($guides) > 0): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--shadow-sm); margin-bottom: 40px;">
                        <h2 style="color: var(--primary-dark); border-bottom: 2px solid var(--primary-light); padding-bottom: 15px; margin-bottom: 25px;"><i class="fas <?php echo e($guide->icon ?? 'fa-kaaba'); ?>" style="color: var(--gold); margin-right: 10px;"></i><?php echo e($guide->title ?? $guide->name); ?></h2>
                        <p style="color: var(--text-medium); margin-bottom: 30px;"><?php echo e($guide->description ?? $guide->overview ?? $guide->content); ?></p>

                        <?php
                            $guideSteps = isset($steps) ? $steps->where('hajj_guide_id', $guide->id)->sortBy('step_number') : [];
                        ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($guideSteps->count() > 0): ?>
                            <div style="position: relative; padding-left: 20px; border-left: 2px solid var(--primary-light);">
                                <div style="margin-bottom: 30px;">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $guideSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <div style="background: var(--bg-color); border-radius: 8px; padding: 20px; margin-bottom: 15px; border-left: 4px solid var(--gold); position: relative;">
                                            <div style="position: absolute; left: -31px; top: 20px; width: 16px; height: 16px; background: var(--gold); border-radius: 50%; border: 4px solid white;"></div>
                                            <h4 style="margin-bottom: 10px; color: var(--primary-dark); display: flex; align-items: center; justify-content: space-between;">
                                                <span><span style="display: inline-block; width: 24px; height: 24px; background: rgba(184, 134, 59, 0.1); color: var(--gold); text-align: center; border-radius: 50%; font-size: 0.8rem; line-height: 24px; margin-right: 10px;"><?php echo e($step->step_number); ?></span><?php echo e($step->title); ?></span>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step->location): ?>
                                                    <span style="font-size: 0.8rem; font-weight: normal; color: #666; background: #eee; padding: 3px 8px; border-radius: 4px;"><i class="fas fa-map-marker-alt" style="color: var(--primary); margin-right: 4px;"></i><?php echo e($step->location); ?></span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </h4>
                                            <p style="color: var(--text-color); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo e($step->content); ?></p>
                                        </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div style="text-align: center; padding: 30px; background: #f9f9f9; border-radius: 8px;">
                                <i class="fas fa-tools" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                <p style="color: #888;">Detailed steps are being updated.</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <?php else: ?>
                <div style="text-align: center; padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm);">
                    <i class="fas fa-tools" style="font-size: 3rem; color: var(--gold-light); margin-bottom: 15px;"></i>
                    <h3 style="color: var(--primary-dark);">Under Construction</h3>
                    <p style="color: var(--text-medium);">The dynamic content for this section is currently being updated. Please check back later.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/hajj_umrah/umrah_guide.blade.php ENDPATH**/ ?>