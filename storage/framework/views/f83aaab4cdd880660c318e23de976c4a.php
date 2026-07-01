<?php $__env->startSection('title', 'Prayer Times in ' . $city->name . ' — Accurate Monthly Salat Schedule'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="<?php echo e(route('prayer-times.hub')); ?>" style="color: #999; text-decoration: none;">Prayer Times</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;"><?php echo e($city->name); ?></span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-map-marker-alt"></i> <?php echo e($city->name); ?></div>
            <h1 class="section-title">Prayer Times in <span><?php echo e($city->name); ?></span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Accurate 30-day Salat and Namaz schedule for <?php echo e($city->name); ?>.</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="padding: 30px; overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                    <thead>
                        <tr style="background: var(--primary-light); color: var(--primary-dark); border-bottom: 2px solid var(--primary);">
                            <th style="padding: 15px; text-align: left;">Date</th>
                            <th style="padding: 15px; text-align: center;">Fajr</th>
                            <th style="padding: 15px; text-align: center;">Sunrise</th>
                            <th style="padding: 15px; text-align: center;">Dhuhr</th>
                            <th style="padding: 15px; text-align: center;">Asr</th>
                            <th style="padding: 15px; text-align: center;">Maghrib</th>
                            <th style="padding: 15px; text-align: center;">Isha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $prayerTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; font-weight: bold; color: var(--text-color);"><?php echo e(\Carbon\Carbon::parse($pt->date)->format('M d, Y')); ?></td>
                            <td style="padding: 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->fajr)->format('h:i A')); ?></td>
                            <td style="padding: 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->sunrise)->format('h:i A')); ?></td>
                            <td style="padding: 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->dhuhr)->format('h:i A')); ?></td>
                            <td style="padding: 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->asr)->format('h:i A')); ?></td>
                            <td style="padding: 15px; text-align: center; font-weight: bold; color: var(--primary-dark);"><?php echo e(\Carbon\Carbon::parse($pt->maghrib)->format('h:i A')); ?></td>
                            <td style="padding: 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->isha)->format('h:i A')); ?></td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prayerTimes->count() == 0): ?>
                <div style="text-align: center; padding: 40px; color: #666;">
                    <i class="fas fa-info-circle fa-2x" style="color: var(--gold); margin-bottom: 15px; display: block;"></i>
                    Prayer times schedule is currently being updated for <?php echo e($city->name); ?>.
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/prayer-times/city.blade.php ENDPATH**/ ?>