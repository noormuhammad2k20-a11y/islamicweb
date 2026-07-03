<?php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
?>
<?php $__env->startSection('title', 'Islamic Date Today — Hijri Date Worldwide, ' . $titleHijri); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Premium Page Styles */
    .page-header {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
        border-bottom: 4px solid var(--gold);
    }
    .page-header::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.1) 0%, transparent 20%),
                          radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.1) 0%, transparent 20%);
        pointer-events: none;
    }
    .hero-date-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        color: var(--white);
        z-index: 2;
        position: relative;
    }
    .hero-gregorian {
        font-size: 1.1rem;
        color: var(--gold-light);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 500;
        margin-bottom: 10px;
    }
    .hero-hijri {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        margin-bottom: 5px;
    }
    .hero-hijri-year {
        font-family: 'Amiri', serif;
        font-size: 1.8rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 20px;
    }
    
    .premium-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 30px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(10, 58, 42, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .premium-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    .premium-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 4px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .premium-card:hover::before {
        opacity: 1;
    }

    .section-title-premium {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--primary-dark);
        font-size: 1.5rem;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .section-title-premium i {
        color: var(--gold);
        font-size: 1.3rem;
        background: var(--secondary);
        width: 40px; height: 40px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* Moon Phase */
    .moon-phase-wrapper {
        text-align: center;
        padding: 20px 0;
    }
    .moon-icon-container {
        font-size: 5rem;
        color: var(--gold);
        margin-bottom: 20px;
        filter: drop-shadow(0 0 20px rgba(212, 175, 55, 0.4));
        animation: floatMoon 4s ease-in-out infinite;
    }
    @keyframes floatMoon {
        0% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0); }
    }
    .moon-name {
        font-size: 1.4rem;
        color: var(--primary-dark);
        font-weight: 600;
    }
    .moon-desc {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-top: 5px;
    }

    /* Events List */
    .event-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .event-item-premium {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: var(--secondary-light);
        border-radius: var(--radius-md);
        border-left: 4px solid var(--primary);
        transition: var(--tr);
    }
    .event-item-premium:hover {
        background: var(--secondary);
    }
    .event-item-premium.upcoming-event {
        border-left-color: var(--gold);
    }
    .event-info h4 {
        margin: 0;
        color: var(--primary-dark);
        font-weight: 600;
        font-size: 1.1rem;
    }
    .event-info span {
        font-size: 0.85rem;
        color: var(--text-medium);
    }
    .event-countdown {
        text-align: center;
        background: var(--white);
        padding: 8px 12px;
        border-radius: var(--radius-sm);
        box-shadow: var(--shadow-sm);
        min-width: 60px;
    }
    .event-countdown strong {
        display: block;
        font-size: 1.3rem;
        color: var(--primary);
        line-height: 1;
    }
    .event-countdown small {
        font-size: 0.7rem;
        text-transform: uppercase;
        color: var(--text-light);
        font-weight: 600;
    }

    /* Fasting Alert */
    .fasting-alert {
        background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(212, 175, 55, 0.05));
        border: 1px solid rgba(212, 175, 55, 0.3);
        border-radius: var(--radius-lg);
        padding: 20px 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }
    .fasting-alert i {
        font-size: 2rem;
        color: var(--gold);
    }
    .fasting-alert h4 {
        color: var(--primary-dark);
        margin: 0 0 5px 0;
        font-size: 1.2rem;
        font-weight: 600;
    }
    .fasting-alert p {
        margin: 0;
        color: var(--text-medium);
        font-size: 0.95rem;
    }

    /* Modern Calendar */
    .calendar-modern {
        background: var(--white);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(10, 58, 42, 0.08);
        overflow: hidden;
    }
    .calendar-header {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: var(--primary-subtle);
        text-align: center;
        padding: 15px 0;
        font-weight: 600;
        color: var(--primary-dark);
        font-size: 0.9rem;
    }
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: #f8faf9;
        gap: 1px;
    }
    .calendar-day {
        background: var(--white);
        padding: 15px 5px;
        text-align: center;
        transition: var(--tr);
        position: relative;
    }
    .calendar-day:hover {
        background: var(--secondary-light);
    }
    .calendar-day.today {
        background: var(--primary);
        color: var(--white);
    }
    .calendar-day.today .h-date {
        color: var(--white);
    }
    .calendar-day.today .g-date {
        color: rgba(255,255,255,0.7);
    }
    .h-date {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-dark);
        line-height: 1;
        margin-bottom: 4px;
        display: block;
    }
    .g-date {
        font-size: 0.75rem;
        color: var(--text-light);
    }

    /* Converter Form */
    .converter-form .form-label {
        font-weight: 600;
        color: var(--primary-dark);
        font-size: 0.9rem;
        margin-bottom: 8px;
    }
    .converter-form .form-control {
        background: var(--secondary-light);
        border: 1px solid rgba(10, 58, 42, 0.1);
        border-radius: var(--radius-md);
        padding: 12px 15px;
        color: var(--text-dark);
        transition: var(--tr);
    }
    .converter-form .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--primary-subtle);
        background: var(--white);
    }
    .btn-convert {
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        color: var(--primary-dark);
        font-weight: 600;
        border: none;
        padding: 12px 25px;
        border-radius: var(--radius-md);
        width: 100%;
        transition: var(--tr);
        box-shadow: 0 4px 10px rgba(212, 175, 55, 0.2);
    }
    .btn-convert:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(212, 175, 55, 0.3);
    }

    /* History Events */
    .history-timeline {
        position: relative;
        padding-left: 30px;
    }
    .history-timeline::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--primary-subtle);
    }
    .history-item {
        position: relative;
        margin-bottom: 25px;
    }
    .history-item:last-child {
        margin-bottom: 0;
    }
    .history-item::before {
        content: '';
        position: absolute;
        left: -30px;
        top: 5px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: var(--white);
        border: 4px solid var(--gold);
        box-shadow: 0 0 0 4px var(--white);
    }
    .history-item h4 {
        color: var(--primary-dark);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .history-item p {
        color: var(--text-medium);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 10px;
    }
    .history-source {
        display: inline-block;
        background: var(--secondary);
        padding: 4px 10px;
        border-radius: var(--radius-sm);
        font-size: 0.8rem;
        color: var(--text-light);
    }
</style>

<div class="page-header">
    <div class="container">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 25px; position: relative; z-index: 2;">
            <a href="<?php echo e(route('home')); ?>" style="color: var(--gold-light); text-decoration: none; font-weight: 500;"><i class="fas fa-home"></i> Home</a> 
            <span style="color: rgba(255,255,255,0.4); margin: 0 10px;">/</span> 
            <span style="color: var(--white); font-weight: 500;">Islamic Date Today</span>
        </div>
        <div class="hero-date-container">
            <div class="hero-gregorian"><i class="far fa-calendar-alt" style="margin-right: 8px;"></i><?php echo e(date('l, d F Y')); ?></div>
            <div class="hero-hijri"><?php echo e($hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah'); ?></div>
            <div class="hero-hijri-year"><?php echo e($hijriDate ? $hijriDate->hijri_year : '1446'); ?> AH</div>
        </div>
    </div>
</div>

<section class="section" style="padding-top: 50px; background-color: var(--secondary-light);">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fastingDays) && count($fastingDays) > 0): ?>
        <div class="fasting-alert">
            <i class="fas fa-star-and-crescent"></i>
            <div>
                <h4>Sunnah Fasting Today</h4>
                <p>Today is a recommended day for fasting: <strong><?php echo e(implode(', ', $fastingDays)); ?></strong>. May Allah accept your efforts.</p>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="row g-4 mb-4">
            <!-- Moon Phase -->
            <div class="col-lg-5 col-md-6">
                <div class="premium-card">
                    <h3 class="section-title-premium"><i class="fas fa-moon"></i> Moon Phase</h3>
                    <div class="moon-phase-wrapper">
                        <div class="moon-icon-container">
                            <i class="fas <?php echo e($moonPhase['icon'] ?? 'fa-moon'); ?>"></i>
                        </div>
                        <div class="moon-name"><?php echo e($moonPhase['name'] ?? 'Unknown'); ?></div>
                        <div class="moon-desc"><?php echo e($moonPhase['description'] ?? ''); ?></div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="col-lg-7 col-md-6">
                <div class="premium-card">
                    <h3 class="section-title-premium"><i class="fas fa-calendar-star"></i> Upcoming Islamic Events</h3>
                    <div class="event-list">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($upcomingEvents) && $upcomingEvents->count() > 0): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $upcomingEvents->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="event-item-premium upcoming-event">
                                <div class="event-info">
                                    <h4><?php echo e($event->name); ?></h4>
                                    <span><i class="far fa-calendar" style="color: var(--text-light); margin-right: 5px;"></i> <?php echo e($event->hijri_day); ?> <?php echo e($event->hijriMonth->name_en ?? ''); ?></span>
                                </div>
                                <div class="event-countdown">
                                    <strong><?php echo e($event->days_away); ?></strong>
                                    <small>Days</small>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <?php else: ?>
                            <div style="text-align: center; padding: 30px 0; color: var(--text-light);">
                                <i class="fas fa-calendar-times" style="font-size: 2.5rem; margin-bottom: 15px; opacity: 0.5;"></i>
                                <p>No upcoming events recorded.</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <!-- Date Converter -->
            <div class="col-lg-4">
                <div class="premium-card">
                    <h3 class="section-title-premium"><i class="fas fa-exchange-alt"></i> Date Converter</h3>
                    
                    <form id="converterWidgetForm" class="converter-form" style="margin-top: 20px;">
                        <div style="margin-bottom: 15px;">
                            <label class="form-label">Conversion Type</label>
                            <select id="convDirection" class="form-control" style="width: 100%;">
                                <option value="g2h">Gregorian to Hijri</option>
                                <option value="h2g">Hijri to Gregorian</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 25px;">
                            <label class="form-label">Select Date</label>
                            <input type="date" id="convDate" required class="form-control" style="width: 100%;">
                        </div>
                        <button type="submit" class="btn-convert">
                            <i class="fas fa-sync-alt" style="margin-right: 8px;"></i> Convert Date
                        </button>
                    </form>
                    
                    <div id="convResult" style="display: none; margin-top: 25px; padding: 15px; background: var(--secondary); border-radius: var(--radius-sm); text-align: center; border: 1px solid rgba(10,58,42,0.1);">
                        <h4 style="color: var(--primary-dark); font-size: 1.1rem; font-weight: 700; margin-bottom: 5px;" id="resText"></h4>
                        <p style="color: var(--text-medium); font-size: 0.9rem; margin: 0;" id="resSub"></p>
                    </div>
                </div>
            </div>

            <!-- Calendar -->
            <div class="col-lg-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0): ?>
                <div class="premium-card">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                        <h3 class="section-title-premium" style="margin-bottom: 0;"><i class="fas fa-calendar-alt"></i> <?php echo e($hijriDate->hijri_month); ?> Calendar</h3>
                        <span style="font-weight: 600; color: var(--gold-dark); background: var(--secondary); padding: 6px 16px; border-radius: var(--radius-xl); font-size: 0.9rem;">
                            <?php echo e($hijriDate->hijri_year); ?> AH
                        </span>
                    </div>
                    
                    <div class="calendar-modern">
                        <div class="calendar-header">
                            <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                        </div>
                        <div class="calendar-grid">
                            <?php
                                $firstDay = $monthlyCalendar->first();
                                $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                            ?>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 0; $i < $dayOfWeek; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div style="background: var(--white);"></div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $monthlyCalendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <?php
                                    $isToday = $day->gregorian_date == date('Y-m-d');
                                ?>
                                <div class="calendar-day <?php echo e($isToday ? 'today' : ''); ?>">
                                    <span class="h-date"><?php echo e($day->hijri_day); ?></span>
                                    <span class="g-date"><?php echo e(date('j M', strtotime($day->gregorian_date))); ?></span>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <!-- Historical Events -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($historicalEvents) && $historicalEvents->count() > 0): ?>
        <div class="premium-card" style="margin-bottom: 40px;">
            <h3 class="section-title-premium"><i class="fas fa-landmark"></i> On This Day in History</h3>
            <p style="color: var(--text-medium); margin-bottom: 30px;">Events that occurred on <?php echo e($hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'this day'); ?> across Islamic history.</p>
            
            <div class="history-timeline">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $historicalEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="history-item">
                        <h4><?php echo e($event->title); ?></h4>
                        <p><?php echo e($event->description); ?></p>
                        <div class="history-source">
                            <i class="fas fa-book-open" style="color: var(--gold); margin-right: 5px;"></i> Source: <?php echo e($event->source_note); ?>

                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>",
      "url": "<?php echo e(url()->current()); ?>",
      "name": "Islamic Date Today — Hijri Date Worldwide",
      "description": "Find today's Islamic date (Hijri date), moon phase, and upcoming Islamic events worldwide.",
      "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "<?php echo e(route('home')); ?>"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Islamic Date Today",
            "item": "<?php echo e(route('islamic-date.hub')); ?>"
          }
        ]
      }
    }
    <?php if(isset($upcomingEvents) && $upcomingEvents->count() > 0): ?>
    ,<?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    {
      "@type": "Event",
      "name": "<?php echo e($event->name); ?>",
      "description": "<?php echo e($event->description); ?>",
      "startDate": "<?php echo e(date('Y-m-d', strtotime('+' . $event->days_away . ' days'))); ?>",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "Worldwide"
      }
    }<?php echo e($loop->last ? '' : ','); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('converterWidgetForm');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var date = document.getElementById('convDate').value;
            var dir = document.getElementById('convDirection').value;
            var btn = this.querySelector('button');
            var originalBtnText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i> Converting...';
            btn.disabled = true;

            fetch('/ajax/hijri-convert?date=' + date + '&direction=' + dir)
            .then(res => res.json())
            .then(data => {
                document.getElementById('convResult').style.display = 'block';
                document.getElementById('resText').innerText = data.result_text;
                document.getElementById('resSub').innerText = data.result_subtext;
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            }).catch(err => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
                alert('Conversion failed. Please try again.');
            });
        });
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/islamic-date/hub.blade.php ENDPATH**/ ?>