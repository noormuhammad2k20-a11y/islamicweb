

<?php $__env->startSection('title', $seoMeta->title ?? 'Monthly Prayer Times ' . $city->name); ?>
<?php $__env->startSection('meta_description', $seoMeta->description ?? ''); ?>

<?php $__env->startSection('content'); ?>
<section class="section hero-section" style="padding-top: 100px; padding-bottom: 50px; background: var(--gradient-hero); color: white; text-align: center;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 20px;">
            <div style="background: rgba(255,255,255,0.1); padding: 8px 20px; border-radius: 50px; display: inline-block; font-size: 0.9rem; border: var(--border-gold);">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--gold); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <a href="<?php echo e(route('prayer-times.hub')); ?>" style="color: #ddd; text-decoration: none;">Prayer Times</a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <a href="<?php echo e(route('prayer-times.city', $city->slug)); ?>" style="color: #ddd; text-decoration: none;"><?php echo e($city->name); ?></a> 
                <span style="color: rgba(255,255,255,0.5); margin: 0 8px;">/</span> 
                <span style="color: white; font-weight: 600;">Monthly Schedule</span>
            </div>
        </div>
        
        <h1 style="font-size: 2.5rem; margin-bottom: 15px; font-weight: 700;"><?php echo e($seoMeta->h1 ?? $monthName . ' ' . $year . ' Prayer Timetable ' . $city->name); ?></h1>
        <p style="font-size: 1.1rem; color: #ddd; max-width: 600px; margin: 0 auto 30px;">
            Complete 30-day namaz schedule for <?php echo e($monthName); ?> <?php echo e($year); ?> in <?php echo e($city->name); ?>. <br>
            <span style="color: var(--gold);">Calculation Method: <?php echo e($city->prayer_calc_method ?? 'Local Method'); ?></span>
        </p>
    </div>
</section>

<section class="section" style="padding: 60px 0; background: var(--cream);">
    <div class="section-inner">
        <div class="content-grid" style="display: grid; grid-template-columns: 1fr;">
            <div class="main-content">
                <div class="content-card" style="background: white; padding: 0; border-radius: 15px; box-shadow: var(--card-shadow); margin-bottom: 40px; overflow: hidden;">
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                            <thead>
                                <tr style="background: var(--primary-light); color: white;">
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
                                <tr style="border-bottom: 1px solid #eee; <?php echo e(\Carbon\Carbon::parse($pt->date)->isToday() ? 'background: rgba(201,162,39,0.1);' : ''); ?>">
                                    <td style="padding: 12px 15px; font-weight: 600; color: var(--text-dark);">
                                        <?php echo e(\Carbon\Carbon::parse($pt->date)->format('M d, Y')); ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(\Carbon\Carbon::parse($pt->date)->isToday()): ?>
                                            <span style="font-size: 0.8rem; background: var(--gold); color: white; padding: 2px 6px; border-radius: 4px; margin-left: 5px;">Today</span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </td>
                                    <td style="padding: 12px 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->fajr)->format('h:i A')); ?></td>
                                    <td style="padding: 12px 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->sunrise)->format('h:i A')); ?></td>
                                    <td style="padding: 12px 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->dhuhr)->format('h:i A')); ?></td>
                                    <td style="padding: 12px 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->asr)->format('h:i A')); ?></td>
                                    <td style="padding: 12px 15px; text-align: center; font-weight: 700; color: var(--primary);"><?php echo e(\Carbon\Carbon::parse($pt->maghrib)->format('h:i A')); ?></td>
                                    <td style="padding: 12px 15px; text-align: center;"><?php echo e(\Carbon\Carbon::parse($pt->isha)->format('h:i A')); ?></td>
                                </tr>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/prayer-times/monthly.blade.php ENDPATH**/ ?>