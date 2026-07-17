

<?php $__env->startSection('seo'); ?>
<title><?php echo e($seoData['title']); ?></title>
<meta name="description" content="<?php echo e($seoData['description']); ?>">
<link rel="canonical" href="<?php echo e($seoData['canonical']); ?>">
<!-- Schema.org Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "<?php echo e($seoData['title']); ?>",
  "description": "<?php echo e($seoData['description']); ?>",
  "url": "<?php echo e($seoData['canonical']); ?>"
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { 
        --primary: #1A365D; /* Deep Navy Blue */
        --primary-dark: #0F172A; /* Slate very dark */
        --primary-light: #2C5282;
        --gold: #D4AF37; 
        --gold-light: #F3E5AB; 
        --border-light: rgba(26,54,93,0.1); 
    }
    .font-playfair { font-family: 'Playfair Display', serif; }
    
    .date-hero { 
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%); 
        padding: 40px 20px; 
        text-align: center; 
        color: white; 
        position: relative; 
        overflow: hidden; 
        border-radius: 0 0 24px 24px;
        margin-bottom: 30px;
        box-shadow: 0 10px 25px rgba(15,23,42,0.2);
    }
    .date-hero::before { 
        content: ''; position: absolute; inset: 0; opacity: 0.05; 
        background-image: radial-gradient(circle at 20% 20%, var(--gold) 1px, transparent 1px); background-size: 30px 30px; 
    }
    
    .hero-meta {
        display: inline-flex; flex-wrap: wrap; justify-content: center; gap: 8px; margin-bottom: 15px; position: relative; z-index: 2;
        font-size: 0.8rem; color: rgba(255,255,255,0.85); font-weight: 500;
    }
    .hero-meta span { background: rgba(255,255,255,0.1); backdrop-filter: blur(5px); padding: 4px 12px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); display: flex; align-items: center; gap: 5px;}
    
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 800; margin-bottom: 5px; position: relative; z-index: 2; line-height: 1.2; text-shadow: 0 2px 4px rgba(0,0,0,0.5);}
    .date-hero-subtitle { font-size: 0.95rem; color: var(--gold-light); margin-bottom: 25px; opacity: 0.9; position: relative; z-index: 2; font-weight: 500;}

    .date-cards-wrapper { display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 850px; margin: 0 auto; align-items: stretch;}
    
    .main-time-card { 
        background: linear-gradient(145deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.02) 100%);
        backdrop-filter: blur(10px); border: 1px solid rgba(212,175,55,0.3); border-radius: 16px; padding: 20px; 
        flex: 2; min-width: 250px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.2); position: relative;
        display: flex; flex-direction: column; justify-content: center;
    }
    .main-time-card::before {
        content: ''; position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 50px; height: 3px; background: var(--gold); border-radius: 0 0 4px 4px; opacity: 0.8;
    }
    
    .card-label { font-size: 0.8rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 5px; font-weight: 600; }
    .large-time { font-size: 3.5rem; font-weight: 800; line-height: 1; margin-bottom: 8px; font-family: 'Playfair Display', serif; text-shadow: 0 4px 10px rgba(0,0,0,0.4); color: white;}
    
    .side-card { background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.05); border-radius: 16px; padding: 15px; flex: 1; min-width: 160px; text-align: center; display: flex; flex-direction: column; justify-content: center; transition: transform 0.3s ease;}
    .side-card:hover { transform: translateY(-2px); background: rgba(0,0,0,0.3);}
    .side-card-title { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: #cbd5e1; margin-bottom: 5px; }
    .side-card-value { font-size: 1.3rem; font-weight: 700; color: white; font-family: 'Playfair Display', serif;}
    .side-card-sub { font-size: 0.8rem; margin-top: 3px; color: var(--gold); font-weight: 500;}
    
    .countdown-box { margin-top: 10px; background: rgba(212,175,55,0.1); border: 1px solid rgba(212,175,55,0.2); padding: 6px 16px; border-radius: 30px; display: inline-flex; align-items: center; justify-content: center; gap: 8px; }
    .countdown-box span { font-family: monospace; font-size: 1rem; font-weight: bold; color: var(--gold-light); }
    
    /* Content Layout */
    .section-container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }
    .content-grid { display: grid; grid-template-columns: 1fr 300px; gap: 30px; margin-top: 30px; }
    @media (max-width: 900px) { .content-grid { grid-template-columns: 1fr; } }
    
    .section-title { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--primary); margin-bottom: 20px; display: flex; align-items: center; gap: 10px;}
    .section-title::after { content: ""; flex-grow: 1; height: 2px; background: linear-gradient(to right, rgba(212,175,55,0.5), transparent); margin-left: 15px;}
    
    .calendar-grid-wrapper { background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); overflow: auto; border: 1px solid var(--border-light); margin-bottom: 30px; }
    .table-modern { width: 100%; border-collapse: collapse; min-width: 600px; text-align: center; }
    .table-modern th { background: var(--primary-dark); color: white; padding: 12px 15px; font-weight: 500; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px;}
    .table-modern td { padding: 12px 15px; border-bottom: 1px solid #f1f5f9; color: #334155; font-size: 0.95rem;}
    .table-modern tr:hover td { background: #f8fafc; }
    .table-modern .today-row td { background: #f0fdf4; font-weight: 700; color: var(--primary); border-top: 1px solid #bbf7d0; border-bottom: 1px solid #bbf7d0;}
    
    .sidebar-widget { background: white; border: 1px solid var(--border-light); border-radius: 12px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.02); }
    .sidebar-title { font-size: 1.05rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 15px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px;}
    
    .action-btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; background: white; border: 1px solid var(--primary-light); color: var(--primary); border-radius: 6px; font-weight: 600; cursor: pointer; transition: all 0.2s; text-decoration: none; font-size: 0.85rem; }
    .action-btn:hover { background: var(--primary-dark); color: white; border-color: var(--primary-dark); }
    .btn-gold { border-color: var(--gold); color: #b45309; background: #fffbeb;}
    .btn-gold:hover { background: var(--gold); color: white; border-color: var(--gold);}
    
    .sunnah-list li { padding-top: 8px; padding-bottom: 8px;}
    .sunnah-list li:last-child { border-bottom: none;}
</style>


<nav class="max-w-[1100px] mx-auto px-5 py-4 flex items-center text-sm font-medium text-gray-500" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2">
    <li class="inline-flex items-center">
      <a href="/" class="inline-flex items-center hover:text-[var(--primary)] transition-colors">
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg width="16" height="16" class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <a href="/prayer-times" class="hover:text-[var(--primary)] transition-colors">Prayer Times</a>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg width="16" height="16" class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <a href="/prayer-times/<?php echo e($citySlug); ?>" class="hover:text-[var(--primary)] transition-colors"><?php echo e($city->name); ?></a>
      </div>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg width="16" height="16" class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <span class="text-[var(--primary)] font-bold bg-[rgba(26,54,93,0.05)] px-3 py-1 rounded-full border border-[rgba(26,54,93,0.1)]"><?php echo e(ucfirst($prayerName)); ?></span>
      </div>
    </li>
  </ol>
</nav>

<section class="date-hero">
    <div class="hero-meta">
        <span>?? <?php echo e($name); ?>, <?php echo e(is_object($city->country) ? $city->country->name : $city->country); ?></span>
        <span>±? <?php echo e($tz); ?></span>
        <span>?? Lat: <?php echo e(number_format($city->latitude ?? $city->lat, 4)); ?>, Lng: <?php echo e(number_format($city->longitude ?? $city->lng, 4)); ?></span>
    </div>

    <h1 class="date-hero-title"><?php echo e(ucfirst($prayerName)); ?> Prayer in <?php echo e($name); ?></h1>
    <p class="date-hero-subtitle">Today's schedule, virtues, and monthly calendar.</p>

    <div class="date-cards-wrapper">
        <div class="side-card">
            <div class="side-card-title">Gregorian Date</div>
            <div class="side-card-value"><?php echo e(now($tz)->format('d M, Y')); ?></div>
            <div class="side-card-sub"><?php echo e(now($tz)->format('l')); ?></div>
        </div>

        <div class="main-time-card">
            <div class="card-label">Today's <?php echo e(ucfirst($prayerName)); ?> Time</div>
            <div class="large-time"><?php echo e($prayers[$prayerKey] ?? '--:--'); ?></div>
            
            <div class="countdown-box">
                <span class="w-2 h-2 rounded-full bg-[var(--gold)] animate-pulse inline-block mr-1 shadow-[0_0_8px_var(--gold)]"></span>
                <span class="text-sm font-semibold uppercase tracking-wider text-white opacity-80">Time Left:</span>
                <span class="countdown-timer"><?php echo e($next['countdown'] ?? '00:00:00'); ?></span>
            </div>
        </div>

        <div class="side-card">
            <div class="side-card-title">Islamic Date</div>
            <div class="side-card-value"><?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?></div>
            <div class="side-card-sub"><?php echo e($hijri['year']); ?> AH</div>
        </div>
    </div>
</section>

<section class="section-container">
    <div class="content-grid">
        <!-- Main Content Column -->
        <div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prayerContent && $prayerContent->content): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-[rgba(26,54,93,0.1)] p-8 mb-10 prose max-w-none text-gray-700 leading-relaxed">
                    <?php echo $prayerContent->content; ?>

                </div>
            <?php else: ?>
                <!-- Dynamic High-Quality Fallback Content -->
                <?php if (isset($component)) { $__componentOriginal4f8bd1738a5fdfa4149c1f069b942017 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.islamic-knowledge-section','data' => ['title' => 'Importance of '.e(ucfirst($prayerName)).' Prayer','type' => 'info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('islamic-knowledge-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Importance of '.e(ucfirst($prayerName)).' Prayer','type' => 'info']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <p>The <strong><?php echo e(ucfirst($prayerName)); ?></strong> prayer is an obligatory (Fard) prayer and holds immense significance in the daily life of a Muslim. Establishing the five daily prayers is the second pillar of Islam and serves as a direct link between the believer and Allah (SWT).</p>
                    <p>Performing <?php echo e(ucfirst($prayerName)); ?> on time not only fulfills a divine command but also purifies the soul, instills discipline, and protects the believer from evil deeds. The precise timing depends on the movement of the sun, and Muslims are encouraged to pray in congregation at the mosque whenever possible.</p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017)): ?>
<?php $attributes = $__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017; ?>
<?php unset($__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f8bd1738a5fdfa4149c1f069b942017)): ?>
<?php $component = $__componentOriginal4f8bd1738a5fdfa4149c1f069b942017; ?>
<?php unset($__componentOriginal4f8bd1738a5fdfa4149c1f069b942017); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal4f8bd1738a5fdfa4149c1f069b942017 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.islamic-knowledge-section','data' => ['title' => 'Quranic Reference','type' => 'quran','reference' => 'Surah Taha (20:130)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('islamic-knowledge-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Quranic Reference','type' => 'quran','reference' => 'Surah Taha (20:130)']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                    <p class="text-xl font-medium text-center mb-4 leading-relaxed" style="font-family: 'Amiri', serif;">????????? ?????? ??? ?????????? ????????? ???????? ??????? ?????? ??????? ????????? ???????? ?????????? ? ?????? ?????? ????????? ????????? ??????????? ?????????? ????????? ????????</p>
                    <p>"So be patient over what they say and exalt [Allah] with praise of your Lord before the rising of the sun and before its setting; and during periods of the night [exalt Him] and at the ends of the day, that you may be satisfied."</p>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017)): ?>
<?php $attributes = $__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017; ?>
<?php unset($__attributesOriginal4f8bd1738a5fdfa4149c1f069b942017); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4f8bd1738a5fdfa4149c1f069b942017)): ?>
<?php $component = $__componentOriginal4f8bd1738a5fdfa4149c1f069b942017; ?>
<?php unset($__componentOriginal4f8bd1738a5fdfa4149c1f069b942017); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div class="flex items-center justify-between mb-6 border-b-2 border-[#D4AF37] pb-2 mt-8">
                <h2 class="font-playfair text-2xl md:text-3xl font-bold text-[#1A365D] m-0">Monthly Timetable (<?php echo e(now($tz)->format('F Y')); ?>)</h2>
                <div class="flex gap-2">
                    <button class="action-btn hidden md:flex text-xs py-1.5 px-3" onclick="window.print()">
                        <svg width="16" height="16" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    </button>
                    <a href="/prayer-times/<?php echo e($citySlug); ?>" class="action-btn text-xs py-1.5 px-3 btn-gold">All Prayers</a>
                </div>
            </div>

            <div class="calendar-grid-wrapper mb-10">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th><?php echo e(ucfirst($prayerName)); ?></th>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($prayerName, ['fajr'])): ?> <th>Sunrise</th> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($prayerName, ['maghrib'])): ?> <th>Isha</th> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <tr class="<?php echo e($day['is_today'] ? 'today-row' : ''); ?>">
                            <td class="font-medium"><?php echo e($day['date']); ?></td>
                            <td><?php echo e(substr($day['dow'], 0, 3)); ?></td>
                            <td class="font-bold text-lg"><?php echo e($day[$prayerKey] ?? '--:--'); ?></td>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($prayerName, ['fajr'])): ?> <td class="text-gray-500"><?php echo e($day['sunrise'] ?? '--:--'); ?></td> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($prayerName, ['maghrib'])): ?> <td class="text-gray-500"><?php echo e($day['isha'] ?? '--:--'); ?></td> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div class="bg-gradient-to-br from-[#f8fafc] to-[#f1f5f9] rounded-2xl p-6 border border-[#e2e8f0] shadow-sm relative overflow-hidden mb-10">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[var(--gold)] opacity-5 rounded-bl-full pointer-events-none"></div>
                
                <h3 class="text-xl font-bold text-[var(--primary)] mb-4 flex items-center gap-2 border-b border-gray-200 pb-3">
                    <svg width="24" height="24" class="w-6 h-6 text-[var(--gold)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    Prayer Calculation Methodology
                </h3>
                
                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    Prayer times in <strong class="text-gray-800"><?php echo e($city->name); ?></strong> are calculated using the <strong class="text-gray-800">University of Islamic Sciences, Karachi</strong> method by default. This method is widely adopted across South Asia and parts of the Middle East.
                </p>
                
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-5">
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center justify-center text-center">
                        <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-1">Fajr Angle</span>
                        <span class="text-2xl font-bold text-[var(--primary)] font-playfair">18°</span>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm flex flex-col items-center justify-center text-center">
                        <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-1">Isha Angle</span>
                        <span class="text-2xl font-bold text-[var(--primary)] font-playfair">18°</span>
                    </div>
                    <div class="bg-white p-4 rounded-xl border border-[rgba(212,175,55,0.3)] shadow-sm flex flex-col items-center justify-center text-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-[var(--gold)] opacity-5"></div>
                        <span class="text-xs text-gray-500 uppercase font-semibold tracking-wider mb-1 relative z-10">Qibla Dir</span>
                        <span class="text-xl font-bold text-[var(--gold)] font-playfair relative z-10"><?php echo e(number_format($qibla ?? 0, 1)); ?>° N</span>
                    </div>
                </div>
                
                <div class="mt-4 text-xs text-gray-400 bg-white/50 inline-block px-3 py-1.5 rounded-md border border-gray-100">
                    <span class="font-semibold text-gray-500">Note:</span> Slight variations may occur due to elevation. Adding 1-2 minutes for safety is advisable.
                </div>
            </div>

        </div>

        <!-- Sidebar -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\prayer-times\prayer_backup.blade.php ENDPATH**/ ?>