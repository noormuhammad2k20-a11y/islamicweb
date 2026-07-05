<?php $__env->startSection('seo'); ?>
<title><?php echo e($seoData['title']); ?></title>
<meta name="description" content="<?php echo e($seoData['description']); ?>">
<link rel="canonical" href="<?php echo e($seoData['canonical']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; }
    
    .date-cards-wrapper { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 1000px; margin: 0 auto; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 25px; width: 100%; max-width: 250px; text-align: center; transition: transform 0.3s ease; }
    .main-date-card.active { border-color: var(--gold); background: rgba(255,255,255,0.15); transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
    .hijri-day-large { font-size: 2.5rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    .info-box { background: linear-gradient(135deg, #fdf6e3, #fefcf2); border: 1px solid var(--gold); border-radius: 16px; padding: 30px; margin-top: 30px; }
    .info-box h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; }
    .info-box p { color: #555; line-height: 1.8; }

    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444; }
    
    .controls-bar { background: white; padding: 20px; border-radius: 16px; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .control-select { padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 1rem; color: #333; outline: none; width: 100%; max-width: 300px; }
    
    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: auto; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .table-modern { width: 100%; border-collapse: collapse; min-width: 600px; text-align: center; }
    .table-modern th { background: var(--primary); color: white; padding: 15px; font-weight: 600; }
    .table-modern td { padding: 12px 15px; border-bottom: 1px solid var(--border-light); color: #333; }
    .table-modern tr:hover td { background: rgba(10,58,42,0.02); }
    .table-modern .today-row td { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); font-weight: 700; color: var(--primary); }

    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 30px; }
    .internal-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; font-size: 0.9rem; }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }

    @media (max-width: 768px) { 
        .date-hero-title { font-size: 1.6rem; } 
        .hijri-day-large { font-size: 2rem; } 
    }
</style>

<section class="date-hero">
    <h1 class="date-hero-title">Prayer Times in <?php echo e($name); ?></h1>
    <p class="date-hero-subtitle"><?php echo e(\Carbon\Carbon::now($tz)->format('d F Y')); ?></p>

    <div style="margin-bottom: 30px; font-size: 1.2rem; color: white;">
        Next Prayer: <strong><?php echo e($next['name']); ?></strong> at <?php echo e($next['time']); ?> (in <?php echo e($next['countdown']); ?>)
    </div>

    <div class="date-cards-wrapper">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['fajr'=>'Fajr','sunrise'=>'Sunrise','dhuhr'=>'Dhuhr','asr'=>'Asr','maghrib'=>'Maghrib','isha'=>'Isha']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="main-date-card <?php echo e($next['name'] == $label ? 'active' : ''); ?>">
            <div class="card-region"><?php echo e($label); ?></div>
            <div class="hijri-day-large"><?php echo e($prayers[$key]); ?></div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>

<section class="section-container">
    <div style="display: grid; grid-template-columns: 1fr; gap: 30px;">
        
        <div class="controls-bar" style="display: flex; gap: 20px; flex-wrap: wrap; align-items: center; justify-content: center;">
            <form method="GET" action="<?php echo e(url()->current()); ?>" style="display: flex; gap: 20px; width: 100%; justify-content: center; flex-wrap: wrap;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 5px;">Calculation Method</label>
                    <select name="method" class="control-select" onchange="this.form.submit()">
                        <option value="Karachi" <?php echo e($method == 'Karachi' ? 'selected' : ''); ?>>Karachi</option>
                        <option value="MWL" <?php echo e($method == 'MWL' ? 'selected' : ''); ?>>Muslim World League</option>
                        <option value="ISNA" <?php echo e($method == 'ISNA' ? 'selected' : ''); ?>>ISNA</option>
                        <option value="Makkah" <?php echo e($method == 'Makkah' ? 'selected' : ''); ?>>Umm Al-Qura</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 5px;">Asr Juristic</label>
                    <select name="madhab" class="control-select" onchange="this.form.submit()">
                        <option value="hanafi" <?php echo e($madhab == 'hanafi' ? 'selected' : ''); ?>>Hanafi</option>
                        <option value="shafi" <?php echo e($madhab == 'shafi' ? 'selected' : ''); ?>>Shafi / Standard</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="info-box" style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px; text-align: center;">
            <div>
                <h3>Qibla Direction</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e(number_format($qibla, 2)); ?>°</div>
            </div>
            <div>
                <h3>Islamic Midnight</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e(\Carbon\Carbon::instance($sunnah['middle_night'])->setTimezone($tz)->format('h:i A')); ?></div>
            </div>
            <div>
                <h3>Last Third</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e(\Carbon\Carbon::instance($sunnah['last_third'])->setTimezone($tz)->format('h:i A')); ?></div>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && $content->content): ?>
        <div class="seo-content">
            <div class="prose max-w-none">
                <?php echo $content->content; ?>

            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="title-wrapper" style="margin-top: 30px;">
            <h2 class="section-title">Monthly Timetable</h2>
        </div>

        <div class="calendar-grid-wrapper">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Fajr</th>
                        <th>Sunrise</th>
                        <th>Dhuhr</th>
                        <th>Asr</th>
                        <th>Maghrib</th>
                        <th>Isha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr class="<?php echo e($day['is_today'] ? 'today-row' : ''); ?>">
                        <td><?php echo e($day['date']); ?></td>
                        <td><?php echo e($day['dow']); ?></td>
                        <td><?php echo e($day['fajr']); ?></td>
                        <td><?php echo e($day['sunrise']); ?></td>
                        <td><?php echo e($day['dhuhr']); ?></td>
                        <td><?php echo e($day['asr']); ?></td>
                        <td><?php echo e($day['maghrib']); ?></td>
                        <td><?php echo e($day['isha']); ?></td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="title-wrapper" style="margin-top: 30px;">
            <h2 class="section-title">Nearby Cities</h2>
        </div>
        
        <div class="internal-links">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nearbyCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(url('/prayer-times/'.($nc['slug'] ?? strtolower(str_replace(' ','-',$nc['name']))))); ?>" class="internal-link">
                <span><?php echo e($nc['name']); ?></span> <i class="fas fa-chevron-right" style="color: var(--gold);"></i>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/prayer-times/city.blade.php ENDPATH**/ ?>