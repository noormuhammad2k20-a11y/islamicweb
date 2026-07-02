<?php $__env->startSection('title', $seoMeta->title ?? 'Prayer Times in ' . $city->name); ?>
<?php $__env->startSection('meta_description', $seoMeta->description ?? ''); ?>
<?php $__env->startSection('canonical', url()->current()); ?>

<?php $__env->startSection('og_meta'); ?>
<meta property="og:title" content="<?php echo e($seoMeta->title ?? 'Prayer Times in ' . $city->name); ?>">
<meta property="og:description" content="<?php echo e($seoMeta->description ?? ''); ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($seoMeta->title ?? 'Prayer Times in ' . $city->name); ?>">
<meta name="twitter:description" content="<?php echo e($seoMeta->description ?? ''); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Premium Theme Definitions - Compact & Balanced */
    :root {
        --bento-radius: 12px;
        --bento-padding: 18px;
        --shadow-soft: 0 2px 8px rgba(0, 0, 0, 0.03);
        --shadow-hover: 0 4px 12px rgba(0, 0, 0, 0.05);
        --border-light: #F1F5F9;
        --glass-bg: rgba(255, 255, 255, 0.15);
        --glass-border: rgba(255, 255, 255, 0.2);
    }

    .premium-page-bg {
        background: #F8FAFC;
        min-height: 100vh;
        padding: 24px 0 40px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Typography & Headers */
    .page-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-dark, #0F172A);
        letter-spacing: -0.3px;
        margin: 0 0 4px 0;
        line-height: 1.2;
    }
    .page-subtitle {
        font-size: 0.85rem;
        color: #64748B;
        font-weight: 500;
        margin: 0;
    }

    /* Bento Card Base */
    .bento-card {
        background: #ffffff;
        border-radius: var(--bento-radius);
        box-shadow: var(--shadow-soft);
        border: 1px solid var(--border-light);
        padding: var(--bento-padding);
        margin-bottom: 16px;
        transition: box-shadow 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .bento-card:hover {
        box-shadow: var(--shadow-hover);
    }
    .bento-header {
        display: flex;
        align-items: center;
        margin-bottom: 14px;
    }
    .bento-header i {
        background: rgba(var(--primary-rgb, 34, 139, 34), 0.08);
        color: var(--primary, #10B981);
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        margin-right: 10px;
    }
    .bento-header h3 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary-dark, #0F172A);
        margin: 0;
    }

    /* Hero Widget */
    .hero-widget {
        background: linear-gradient(135deg, var(--primary-dark, #0F172A) 0%, var(--primary, #10B981) 100%);
        color: white;
        padding: 20px 24px;
        border: none;
    }
    .hero-pattern {
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .hero-content {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
        z-index: 2;
    }
    @media (min-width: 768px) {
        .hero-content {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
    }
    .countdown-display {
        font-size: 2rem;
        font-weight: 800;
        font-variant-numeric: tabular-nums;
        color: var(--gold, #F59E0B);
        line-height: 1;
        letter-spacing: -0.5px;
    }
    .next-prayer-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        color: rgba(255,255,255,0.85);
        margin-bottom: 4px;
    }

    /* Prayer Timeline */
    .prayer-timeline {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 6px;
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: 10px;
        padding: 6px;
        margin-top: 16px;
        position: relative;
        z-index: 2;
    }
    @media (min-width: 576px) {
        .prayer-timeline { grid-template-columns: repeat(6, 1fr); }
    }
    .timeline-item {
        text-align: center;
        padding: 8px 4px;
        border-radius: 6px;
        transition: background 0.2s;
    }
    .timeline-item.active {
        background: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .timeline-item .p-name {
        font-size: 0.7rem;
        font-weight: 700;
        color: rgba(255,255,255,0.9);
        text-transform: uppercase;
        margin-bottom: 2px;
    }
    .timeline-item .p-time {
        font-size: 0.9rem;
        font-weight: 700;
        color: #ffffff;
    }
    .timeline-item.active .p-name { color: var(--primary, #10B981); }
    .timeline-item.active .p-time { color: var(--primary-dark, #0F172A); }
    .timeline-item.dimmed { opacity: 0.75; }

    /* Grids & Cards */
    .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .grid-3 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .grid-4 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
    @media (min-width: 768px) {
        .grid-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-4 { grid-template-columns: repeat(4, 1fr); }
    }
    @media (min-width: 992px) {
        .grid-5 { display: grid; grid-template-columns: repeat(5, 1fr); gap: 12px; }
    }

    /* Nawafil & City Details Cards */
    .mini-card {
        background: #F8FAFC;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .mini-card i {
        color: var(--gold, #F59E0B);
        font-size: 1rem;
        margin-bottom: 4px;
    }
    .mini-card.icon-left {
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        gap: 10px;
    }
    .mini-card.icon-left i { margin-bottom: 0; font-size: 1.1rem; color: #94A3B8; }
    .mini-card .title {
        font-size: 0.7rem;
        font-weight: 600;
        color: #64748B;
        text-transform: uppercase;
        margin-bottom: 2px;
    }
    .mini-card .value {
        font-size: 0.85rem;
        font-weight: 700;
        color: #0F172A;
    }
    .mini-card.highlight .value { color: var(--gold, #F59E0B); }

    /* Prayer Guide Rules */
    .rule-card {
        background: #F8FAFC;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        padding: 10px 12px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    .rule-card i {
        color: var(--gold, #F59E0B);
        font-size: 1rem;
        margin-top: 2px;
    }
    .rule-card h4 {
        margin: 0 0 2px 0;
        font-size: 0.8rem;
        font-weight: 700;
        color: #0F172A;
    }
    .rule-card p {
        margin: 0;
        font-size: 0.75rem;
        color: #64748B;
        line-height: 1.3;
    }

    /* Timetable Redesign */
    .timetable-list {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .timetable-row {
        display: grid;
        grid-template-columns: 1.5fr repeat(6, 1fr);
        background: #fff;
        border: 1px solid var(--border-light);
        border-radius: 6px;
        padding: 8px 12px;
        align-items: center;
        font-size: 0.75rem;
        color: #334155;
        transition: background 0.15s;
    }
    .timetable-row:hover {
        background: #F8FAFC;
    }
    .timetable-row.header-row {
        background: transparent;
        color: #64748B;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.65rem;
        border: none;
        padding: 4px 12px;
        pointer-events: none;
    }
    .timetable-row.today-row {
        background: rgba(var(--gold-rgb, 218, 165, 32), 0.04);
        border-color: rgba(var(--gold-rgb, 218, 165, 32), 0.2);
    }
    .timetable-row .t-col {
        text-align: center;
        font-weight: 500;
    }
    .timetable-row .t-col:first-child {
        text-align: left;
        font-weight: 600;
        color: #0F172A;
    }
    .timetable-row.today-row .t-col {
        font-weight: 600;
        color: var(--primary-dark, #0F172A);
    }
    .timetable-row.today-row .t-col[data-label="Maghrib"] {
        font-weight: 800;
    }
    .today-badge {
        background: var(--gold, #F59E0B);
        color: #fff;
        font-size: 0.55rem;
        padding: 2px 5px;
        border-radius: 4px;
        margin-left: 6px;
        font-weight: 700;
        text-transform: uppercase;
        vertical-align: middle;
    }

    @media (max-width: 768px) {
        .timetable-row.header-row { display: none; }
        .timetable-row {
            grid-template-columns: 1fr;
            gap: 4px;
            padding: 10px 12px;
        }
        .timetable-row .t-col {
            display: flex;
            justify-content: space-between;
            text-align: right;
            padding: 2px 0;
        }
        .timetable-row .t-col::before {
            content: attr(data-label);
            font-weight: 600;
            color: #64748B;
            text-align: left;
            font-size: 0.7rem;
            text-transform: uppercase;
        }
        .timetable-row .t-col:first-child {
            justify-content: center;
            border-bottom: 1px solid var(--border-light);
            padding-bottom: 6px;
            margin-bottom: 4px;
        }
        .timetable-row .t-col:first-child::before {
            display: none;
        }
    }

    /* Custom Breadcrumb */
    .custom-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
        list-style: none;
        padding: 0;
        margin: 0 0 6px 0;
        font-size: 0.75rem;
        font-weight: 600;
    }
    .custom-breadcrumb li {
        display: flex;
        align-items: center;
    }
    .custom-breadcrumb li:not(:last-child)::after {
        content: '\f105';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-left: 6px;
        color: #94A3B8;
        font-size: 0.65rem;
    }
    .custom-breadcrumb a {
        color: var(--primary, #10B981);
        text-decoration: none;
        transition: color 0.2s;
    }
    .custom-breadcrumb a:hover {
        color: var(--primary-dark, #0F172A);
    }
    .custom-breadcrumb .active {
        color: #64748B;
    }

    /* Compact Link Cards (Tools & Cities) */
    .compact-link-card {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        background: #ffffff;
        border-radius: 8px;
        color: #334155;
        font-size: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid var(--border-light);
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }
    .compact-link-card i {
        background: #F8FAFC;
        color: var(--primary, #10B981);
        width: 28px;
        height: 28px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        border: 1px solid var(--border-light);
        transition: color 0.2s, background 0.2s, border-color 0.2s;
    }
    .compact-link-card:hover {
        border-color: #CBD5E1;
        box-shadow: var(--shadow-soft);
        color: var(--primary-dark, #0F172A);
    }
    .compact-link-card:hover i {
        background: rgba(var(--primary-rgb, 34, 139, 34), 0.08);
        border-color: transparent;
    }
    
    .grid-auto-fill {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
    @media (min-width: 768px) {
        .grid-auto-fill { grid-template-columns: repeat(4, 1fr); }
    }
    @media (min-width: 992px) {
        .grid-auto-fill { grid-template-columns: repeat(5, 1fr); }
    }

    /* Custom Layout Utility Classes */
    .container-10 {
        width: 100%;
        max-width: 1080px;
        margin: 0 auto;
        padding: 0 28px;
    }

    .layout-split {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    @media (min-width: 768px) {
        .layout-split {
            flex-direction: row;
            align-items: stretch;
        }
        .layout-split > .side-info {
            width: 35%;
        }
        .layout-split > .main-info {
            width: calc(65% - 16px);
        }
    }
    .mb-3 { margin-bottom: 16px; }
    .mt-3 { margin-top: 16px; }

</style>

<section class="premium-page-bg">
    <div class="container-10">
                
        <!-- Breadcrumb & Header -->
        <div style="display: flex; flex-direction: column; margin-bottom: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 8px;">
                <div>
                        <nav aria-label="breadcrumb">
                            <ul class="custom-breadcrumb">
                                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                <li><a href="<?php echo e(route('prayer-times.hub')); ?>">Prayer Times</a></li>
                                <li><span class="active"><?php echo e($city->name); ?></span></li>
                            </ul>
                        </nav>
                        <h1 class="page-title">Prayer Times in <?php echo e($city->name); ?></h1>
                    </div>
                    <p class="page-subtitle" style="margin-top: 4px;">
                        <?php echo e(date('F Y')); ?> Timetable & Nawafil
                    </p>
                </div>
            </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
                <!-- Hero Widget -->
                <div class="bento-card hero-widget">
                    <div class="hero-pattern"></div>
                    <div class="hero-content">
                        <div>
                            <div class="d-inline-block mb-2" style="background: rgba(255,255,255,0.2); color:white; padding: 4px 10px; border-radius: 20px; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px;">
                                Today's Prayers
                            </div>
                            <h2 style="font-size:1.05rem; color:rgba(255,255,255,0.95); font-weight:600; margin:0;">
                                <?php echo e(date('l, d M Y')); ?> &bull; <?php echo e(isset($hijriDate) && $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : date('d M')); ?>

                            </h2>
                        </div>
                        <div style="margin-top: 12px;">
                            <div class="next-prayer-label" id="nextPrayerName">Calculating...</div>
                            <div class="countdown-display" id="prayerCountdown">--:--:--</div>
                        </div>
                    </div>

                    <!-- Prayer Timeline -->
                    <div class="prayer-timeline">
                        <div class="timeline-item <?php echo e($nextPrayer == 'Fajr' ? 'active' : ''); ?>">
                            <div class="p-name">Fajr</div>
                            <div class="p-time"><?php echo e(\Carbon\Carbon::parse($todayPrayer->fajr)->format('h:i A')); ?></div>
                        </div>
                        <div class="timeline-item dimmed <?php echo e($nextPrayer == 'Sunrise' ? 'active' : ''); ?>">
                            <div class="p-name">Sunrise</div>
                            <div class="p-time"><?php echo e(\Carbon\Carbon::parse($todayPrayer->sunrise)->format('h:i A')); ?></div>
                        </div>
                        <div class="timeline-item <?php echo e($nextPrayer == 'Dhuhr' ? 'active' : ''); ?>">
                            <div class="p-name">Dhuhr</div>
                            <div class="p-time"><?php echo e(\Carbon\Carbon::parse($todayPrayer->dhuhr)->format('h:i A')); ?></div>
                        </div>
                        <div class="timeline-item <?php echo e($nextPrayer == 'Asr' ? 'active' : ''); ?>">
                            <div class="p-name">Asr</div>
                            <div class="p-time"><?php echo e(\Carbon\Carbon::parse($todayPrayer->asr)->format('h:i A')); ?></div>
                        </div>
                        <div class="timeline-item <?php echo e($nextPrayer == 'Maghrib' ? 'active' : ''); ?>">
                            <div class="p-name">Maghrib</div>
                            <div class="p-time"><?php echo e(\Carbon\Carbon::parse($todayPrayer->maghrib)->format('h:i A')); ?></div>
                        </div>
                        <div class="timeline-item <?php echo e($nextPrayer == 'Isha' ? 'active' : ''); ?>">
                            <div class="p-name">Isha</div>
                            <div class="p-time"><?php echo e(\Carbon\Carbon::parse($todayPrayer->isha)->format('h:i A')); ?></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- City Info & Nawafil (2 Sections Side by Side on Desktop) -->
                <div class="layout-split mt-3">
                    <!-- City Details -->
                    <div class="side-info">
                        <div class="bento-card h-100" style="height: 100%; margin-bottom: 0;">
                            <div class="bento-header">
                                <i class="fas fa-map-marker-alt"></i>
                                <h3><?php echo e($city->name); ?> Info</h3>
                            </div>
                            <div class="grid-2" style="grid-template-columns: 1fr;">
                                <div class="mini-card icon-left">
                                    <i class="fas fa-compass"></i>
                                    <div>
                                        <div class="title">Qibla Direction</div>
                                        <div class="value highlight"><?php echo e($qiblaDegree ?? 'N/A'); ?>°</div>
                                    </div>
                                </div>
                                <div class="mini-card icon-left">
                                    <i class="fas fa-globe"></i>
                                    <div>
                                        <div class="title">Coordinates</div>
                                        <div class="value"><?php echo e($city->latitude); ?>, <?php echo e($city->longitude); ?></div>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($city->province): ?>
                                <div class="mini-card icon-left">
                                    <i class="fas fa-map"></i>
                                    <div>
                                        <div class="title">Province</div>
                                        <div class="value"><?php echo e($city->province); ?></div>
                                    </div>
                                </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Nawafil Timings -->
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($nawafil)): ?>
                    <div class="main-info">
                        <div class="bento-card h-100" style="height: 100%; margin-bottom: 0;">
                            <div class="bento-header">
                                <i class="fas fa-sun" style="background:rgba(var(--gold-rgb, 218, 165, 32), 0.08); color:var(--gold, #F59E0B);"></i>
                                <h3>Nawafil Timings</h3>
                            </div>
                            <div class="grid-4 h-100" style="align-content: flex-start;">
                                <div class="mini-card text-center">
                                    <i class="fas fa-sun"></i>
                                    <div class="title">Ishraq</div>
                                    <div class="value"><?php echo e($nawafil->ishraq ?? 'N/A'); ?></div>
                                </div>
                                <div class="mini-card text-center">
                                    <i class="fas fa-cloud-sun"></i>
                                    <div class="title">Chasht</div>
                                    <div class="value"><?php echo e($nawafil->chasht ?? 'N/A'); ?></div>
                                </div>
                                <div class="mini-card text-center">
                                    <i class="fas fa-moon"></i>
                                    <div class="title">Awwabeen</div>
                                    <div class="value"><?php echo e($nawafil->awwabeen ?? 'N/A'); ?></div>
                                </div>
                                <div class="mini-card text-center">
                                    <i class="fas fa-star-and-crescent"></i>
                                    <div class="title">Tahajjud</div>
                                    <div class="value"><?php echo e($nawafil->tahajjud ?? 'N/A'); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Monthly Timetable -->
                <div class="bento-card mt-3">
                    <div class="bento-header">
                        <i class="fas fa-calendar-alt"></i>
                        <h3>Monthly Timetable</h3>
                    </div>
                    <div class="timetable-list">
                        <!-- Header Row for Desktop -->
                        <div class="timetable-row header-row">
                            <div class="t-col" data-label="Date">Date</div>
                            <div class="t-col" data-label="Fajr">Fajr</div>
                            <div class="t-col" data-label="Sunrise">Sunrise</div>
                            <div class="t-col" data-label="Dhuhr">Dhuhr</div>
                            <div class="t-col" data-label="Asr">Asr</div>
                            <div class="t-col" data-label="Maghrib">Maghrib</div>
                            <div class="t-col" data-label="Isha">Isha</div>
                        </div>
                        
                        <!-- Data Rows -->
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $prayerTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php $isToday = $pt->date == date('Y-m-d'); ?>
                        <div class="timetable-row <?php echo e($isToday ? 'today-row' : ''); ?>">
                            <div class="t-col" data-label="Date">
                                <?php echo e(\Carbon\Carbon::parse($pt->date)->format('d M, Y')); ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isToday): ?> <span class="today-badge">Today</span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <div class="t-col" data-label="Fajr"><?php echo e(\Carbon\Carbon::parse($pt->fajr)->format('h:i A')); ?></div>
                            <div class="t-col" data-label="Sunrise" style="color: #94A3B8;"><?php echo e(\Carbon\Carbon::parse($pt->sunrise)->format('h:i A')); ?></div>
                            <div class="t-col" data-label="Dhuhr"><?php echo e(\Carbon\Carbon::parse($pt->dhuhr)->format('h:i A')); ?></div>
                            <div class="t-col" data-label="Asr"><?php echo e(\Carbon\Carbon::parse($pt->asr)->format('h:i A')); ?></div>
                            <div class="t-col" data-label="Maghrib" style="color: <?php echo e($isToday ? 'var(--primary-dark)' : 'var(--primary, #10B981)'); ?>;">
                                <?php echo e(\Carbon\Carbon::parse($pt->maghrib)->format('h:i A')); ?>

                            </div>
                            <div class="t-col" data-label="Isha"><?php echo e(\Carbon\Carbon::parse($pt->isha)->format('h:i A')); ?></div>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>

                <!-- Prayer Guide -->
                <div class="bento-card">
                    <div class="bento-header">
                        <i class="fas fa-book-open"></i>
                        <h3>Prayer Guide</h3>
                    </div>
                    <div class="grid-4">
                        <div class="rule-card">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h4>Fajr</h4>
                                <p>Prayed before Sunrise.</p>
                            </div>
                        </div>
                        <div class="rule-card">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h4>Dhuhr</h4>
                                <p>Begins after zenith.</p>
                            </div>
                        </div>
                        <div class="rule-card">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h4>Asr</h4>
                                <p>Before sun turns pale.</p>
                            </div>
                        </div>
                        <div class="rule-card">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <h4>Maghrib</h4>
                                <p>Right after sunset.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Islamic Tools (4/5 Column Grid) -->
                <div class="bento-card">
                    <div class="bento-header">
                        <i class="fas fa-toolbox"></i>
                        <h3>Islamic Tools</h3>
                    </div>
                    <div class="grid-auto-fill">
                        <a href="<?php echo e(route('zakat.index')); ?>" class="compact-link-card">
                            <i class="fas fa-calculator"></i>
                            <span>Zakat Calculator</span>
                        </a>
                        <a href="<?php echo e(route('duas.index')); ?>" class="compact-link-card">
                            <i class="fas fa-hands"></i>
                            <span>Daily Duas</span>
                        </a>
                        <a href="<?php echo e(route('names.index')); ?>" class="compact-link-card">
                            <i class="fas fa-book"></i>
                            <span>99 Names</span>
                        </a>
                        <a href="<?php echo e(route('prayer-times.hub')); ?>" class="compact-link-card">
                            <i class="fas fa-globe"></i>
                            <span>Global Timings</span>
                        </a>
                    </div>
                </div>

                <!-- Nearby Cities -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($nearbyCities) && $nearbyCities->count() > 0): ?>
                <div class="bento-card mb-0">
                    <div class="bento-header">
                        <i class="fas fa-map"></i>
                        <h3>Nearby Cities</h3>
                    </div>
                    <div class="grid-auto-fill">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nearbyCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nearby): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('prayer-times.city', $nearby->slug)); ?>" class="compact-link-card">
                            <i class="fas fa-map-marker-alt" style="color: #94A3B8;"></i>
                            <span><?php echo e($nearby->name); ?></span>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const prayerTimes = [
            { name: "Fajr", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->fajr)->format('H:i:s')); ?>" },
            { name: "Sunrise", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->sunrise)->format('H:i:s')); ?>" },
            { name: "Dhuhr", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->dhuhr)->format('H:i:s')); ?>" },
            { name: "Asr", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->asr)->format('H:i:s')); ?>" },
            { name: "Maghrib", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->maghrib)->format('H:i:s')); ?>" },
            { name: "Isha", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->isha)->format('H:i:s')); ?>" }
        ];

        function getSeconds(timeStr) {
            let parts = timeStr.split(':');
            return parseInt(parts[0]) * 3600 + parseInt(parts[1]) * 60 + parseInt(parts[2]);
        }

        function updateCountdown() {
            let now = new Date();
            let currentSeconds = now.getHours() * 3600 + now.getMinutes() * 60 + now.getSeconds();

            let nextPrayer = null;
            let timeDiff = 0;

            for (let i = 0; i < prayerTimes.length; i++) {
                let pTimeSeconds = getSeconds(prayerTimes[i].time);
                if (pTimeSeconds > currentSeconds) {
                    nextPrayer = prayerTimes[i];
                    timeDiff = pTimeSeconds - currentSeconds;
                    break;
                }
            }

            if (!nextPrayer) {
                nextPrayer = prayerTimes[0];
                timeDiff = (24 * 3600 - currentSeconds) + getSeconds(nextPrayer.time);
            }

            let h = Math.floor(timeDiff / 3600);
            let m = Math.floor((timeDiff % 3600) / 60);
            let s = timeDiff % 60;

            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;

            let countdownEl = document.getElementById('prayerCountdown');
            if (countdownEl) {
                countdownEl.innerHTML = `${h}:${m}:${s}`;
            }

            let nameEl = document.getElementById('nextPrayerName');
            if (nameEl) {
                nameEl.innerText = `Time until ${nextPrayer.name}`;
            }
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();

        function highlightActiveCard() {
            let cards = document.querySelectorAll('.timeline-item');
            cards.forEach(card => card.classList.remove('active'));

            let now = new Date();
            let currentSeconds = now.getHours() * 3600 + now.getMinutes() * 60 + now.getSeconds();
            let activeIndex = -1;

            for (let i = prayerTimes.length - 1; i >= 0; i--) {
                if (currentSeconds >= getSeconds(prayerTimes[i].time)) {
                    activeIndex = i;
                    break;
                }
            }

            if (activeIndex >= 0 && activeIndex < cards.length) {
                if (prayerTimes[activeIndex].name !== 'Sunrise') {
                    cards[activeIndex].classList.add('active');
                }
            }
        }

        highlightActiveCard();
        setInterval(highlightActiveCard, 60000);
    });
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/prayer-times/city.blade.php ENDPATH**/ ?>