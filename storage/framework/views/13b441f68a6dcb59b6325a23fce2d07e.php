

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --shadow-xl: 0 24px 64px rgba(10, 31, 63, 0.14);
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    /* ===== HERO SECTION ===== */
    .date-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 100px 20px 120px;
        text-align: center;
        color: var(--white);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .date-hero::before {
        content: '';
        position: absolute; inset: 0; opacity: 0.04;
        background-image: radial-gradient(var(--navy-tint) 1px, transparent 1px);
        background-size: 28px 28px;
        mask-image: linear-gradient(to left, rgba(0,0,0,0.5), transparent 70%);
        -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,0.5), transparent 70%);
        z-index: 1;
    }
    .date-hero::after {
        content: ""; position: absolute; top: -10%; left: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.08), transparent 60%);
        border-radius: 50%; filter: blur(60px); pointer-events: none; z-index: 1;
    }
    .date-hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3.5rem; font-weight: 700; margin-bottom: 16px;
        position: relative; z-index: 2; line-height: 1.1; letter-spacing: -.5px;
    }
    .date-hero-subtitle {
        font-size: 1.1rem; color: var(--gold-light);
        margin-bottom: 30px; position: relative; z-index: 2;
        max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.85; font-weight: 500;
    }

    /* ===== CONTAINERS & TITLES ===== */
    .section-container { max-width: 1140px; margin: 90px auto; padding: 0 20px; }
    .section-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.8rem; color: var(--navy); text-align: center; margin-bottom: 0;
        display: inline-block; position: relative; font-weight: 600; letter-spacing: -.5px;
    }
    .section-title::after {
        content: ""; position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%);
        width: 60px; height: 3px; background: var(--gold-gradient);
        border-radius: 2px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25);
    }
    .title-wrapper { text-align: center; margin-bottom: 60px; }

    /* ===== HIJRI SPAN CARD ===== */
    .hijri-span-card {
        background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); box-shadow: var(--shadow-md);
        padding: 40px; text-align: center; margin-bottom: 50px; position: relative; overflow: hidden;
    }
    .hijri-span-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px;
        background: var(--gold-gradient);
    }
    .hijri-span-label { font-size: .8rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: 1.5px; }
    .hijri-span-value { font-size: 2.5rem; font-weight: 700; color: var(--navy); margin-top: 12px; font-family: 'Cormorant Garamond', serif; }

    /* ===== YEAR NAVIGATION ===== */
    .year-nav { display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-bottom: 50px; }
    .year-nav-link {
        padding: 10px 22px; border: 1px solid var(--border); border-radius: var(--radius-full);
        text-decoration: none; color: var(--text-medium); font-weight: 600; font-size: .9rem;
        transition: var(--tr); background: var(--white); box-shadow: var(--shadow-xs);
    }
    .year-nav-link:hover { border-color: var(--navy); color: var(--navy); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
    .year-nav-link.active {
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--white);
        border-color: transparent; box-shadow: var(--shadow-md);
    }

    /* ===== CALENDAR GRID ===== */
    .calendar-grid-wrapper {
        background: var(--white); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);
        overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 24px; transition: var(--tr);
    }
    .calendar-grid-wrapper:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); transform: translateY(-4px); }
    .calendar-grid-header {
        background: linear-gradient(150deg, var(--navy), var(--navy-mid)); color: var(--white);
        padding: 16px 24px; position: relative; overflow: hidden;
    }
    .calendar-grid-header::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: var(--gold-gradient);
    }
    .calendar-grid-title { margin: 0; font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; }
    .calendar-grid { padding: 12px; }
    .calendar-grid-row { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; }
    .calendar-grid-header-row { margin-bottom: 10px; }
    .cal-cell {
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        border-radius: var(--radius-sm); padding: 8px 4px; position: relative; min-height: 72px;
        transition: all 0.3s ease; cursor: default; background: var(--bg-main); border: 1px solid transparent; overflow: visible;
    }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) {
        background: var(--white); border-color: var(--gold); transform: scale(1.05);
        z-index: 1; box-shadow: 0 6px 15px rgba(10, 31, 63, 0.08);
    }
    .cal-header {
        font-weight: 700; color: var(--navy); font-size: .75rem; min-height: auto; padding: 8px 0;
        text-transform: uppercase; letter-spacing: 1px; background: transparent; border: none;
    }
    .cal-greg { font-weight: 700; font-size: 1rem; color: var(--text-dark); line-height: 1.2; white-space: nowrap; }
    .cal-hijri { font-size: .75rem; color: var(--gold-dark); font-weight: 600; margin-top: 2px; line-height: 1.2; white-space: nowrap; }
    .cal-hijri-month { font-size: .6rem; color: var(--text-light); font-weight: 500; margin-top: 2px; line-height: 1.2; text-align: center; white-space: nowrap; }
    .cal-today { 
        background: linear-gradient(135deg, var(--gold), var(--gold-light)); 
        border: 1px solid var(--gold-dark); 
        box-shadow: 0 4px 15px rgba(201, 168, 76, 0.3); 
    }
    .cal-today .cal-greg { color: var(--navy); }
    .cal-today .cal-hijri { color: var(--navy); }
    .cal-friday { background: var(--navy-tint); }
    .cal-empty { opacity: 0.3; background: transparent; }
    .cal-event-badge { font-size: .6rem; position: absolute; top: 4px; right: 6px; }
    .cal-event-eid { color: #22c55e; } 
    .cal-event-ramadan { color: #8b5cf6; } 
    .cal-event-hajj { color: #f59e0b; } 
    .cal-event-muharram { color: #ef4444; } 
    .cal-event-other { color: #3b82f6; }

    /* ===== EVENTS TIMELINE ===== */
    .events-timeline { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-top: 20px; }
    .event-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 28px; display: flex; gap: 20px; align-items: center; transition: var(--tr);
        box-shadow: var(--shadow-xs); position: relative; overflow: hidden;
    }
    .event-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    .event-card:hover { box-shadow: var(--shadow-md); transform: translateY(-4px); border-color: var(--navy-tint); }
    .event-card:hover::before { transform: scaleX(1); }
    .event-icon {
        width: 56px; height: 56px; border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 1.4rem; color: white; flex-shrink: 0; box-shadow: var(--shadow-sm);
    }
    .event-icon-eid { background: linear-gradient(135deg, #22c55e, #16a34a); }
    .event-icon-ramadan { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .event-icon-hajj { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .event-icon-muharram { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .event-icon-other { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .event-name { font-weight: 700; color: var(--navy); font-size: 1.15rem; font-family: 'Outfit', sans-serif; }
    .event-date { font-size: .85rem; color: var(--text-light); margin-top: 4px; }

    /* ===== INTERNAL LINKS ===== */
    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-top: 30px; }
    .internal-link {
        display: flex; align-items: center; gap: 12px; padding: 18px 24px; background: var(--white);
        border: 1px solid var(--border-light); border-radius: var(--radius-sm); text-decoration: none;
        color: var(--navy); font-weight: 600; transition: var(--tr); font-size: .95rem; box-shadow: var(--shadow-xs);
    }
    .internal-link:hover { border-color: var(--gold); background: var(--gold-tint); transform: translateY(-3px); box-shadow: var(--shadow-sm); }

    /* ===== FAQ ===== */
    .faq-container { margin-top: 30px; }
    .faq-item { 
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        margin-bottom: 16px; overflow: hidden; transition: var(--tr); box-shadow: var(--shadow-xs); 
    }
    .faq-item:hover { box-shadow: var(--shadow-sm); border-color: var(--navy-tint); }
    .faq-question { 
        padding: 22px 28px; cursor: pointer; display: flex; justify-content: space-between; align-items: center;
        font-weight: 600; color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; 
    }
    .faq-question i { color: var(--gold); transition: transform 0.3s; font-size: 1rem; }
    .faq-answer { padding: 0 28px 24px; display: none; color: var(--text-medium); line-height: 1.8; font-size: 1rem; }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }
    .faq-open { box-shadow: var(--shadow-md); border-color: var(--gold); }

    /* ===== SEO CONTENT ===== */
    .seo-content {
        background: var(--white); padding: 50px; border-radius: var(--radius-lg);
        border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: var(--text-medium);
        box-shadow: var(--shadow-lg); position: relative;
    }
    .seo-content::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px;
        background: var(--gold-gradient); border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    }
    .seo-content h2, .seo-content h3 { 
        color: var(--navy); margin-top: 30px; margin-bottom: 15px; 
        font-family: 'Cormorant Garamond', serif; font-weight: 600; font-size: 1.8rem; 
    }
    .seo-content p { margin-bottom: 20px; }
    .seo-content a { color: var(--gold-dark); text-decoration: none; font-weight: 600; transition: var(--tr-fast); }
    .seo-content a:hover { color: var(--navy); }

    /* ===== PRINT BUTTON ===== */
    .print-btn {
        padding: 12px 28px; background: linear-gradient(145deg, var(--navy), var(--navy-mid));
        border: 1px solid transparent; color: var(--white); border-radius: var(--radius-full);
        font-weight: 600; cursor: pointer; transition: var(--tr); font-size: .9rem;
        font-family: 'Outfit', sans-serif; box-shadow: var(--shadow-md), inset 0 1px 0 rgba(255,255,255,0.1);
        display: inline-flex; align-items: center; gap: 8px;
    }
    .print-btn:hover { 
        background: linear-gradient(145deg, var(--navy-mid), var(--navy-light)); 
        transform: translateY(-2px); box-shadow: var(--shadow-lg), inset 0 1px 0 rgba(255,255,255,0.1); 
    }

    @media (max-width: 768px) {
        .date-hero { padding: 80px 20px 100px; }
        .date-hero-title { font-size: 2.4rem; }
        .section-title { font-size: 2rem; }
        .cal-cell { min-height: 55px; padding: 4px 2px; }
        .cal-greg { font-size: .85rem; }
        .cal-hijri { font-size: .65rem; }
        .cal-hijri-month { font-size: .55rem; }
        .seo-content { padding: 30px; }
        .print-btn { width: 100%; justify-content: center; }
    }

    /* ===== PRINT STYLES ===== */
    @media print {
        body * { visibility: hidden; }
        #calendar-print-area, #calendar-print-area * { visibility: visible; }
        #calendar-print-area { position: absolute; left: 0; top: 0; width: 100%; margin: 0; padding: 10px; }
        .print-btn { display: none !important; }
        .calendar-grid-wrapper { box-shadow: none !important; border: 1px solid #ccc !important; break-inside: avoid; page-break-inside: avoid; margin-bottom: 20px; transform: none !important; }
        .section-container { max-width: 100%; padding: 0; margin: 0; }
        .title-wrapper { text-align: center !important; justify-content: center !important; width: 100%; margin-bottom: 20px; }
        .section-title { border-bottom: 2px solid #ccc !important; font-size: 1.8rem; }
        #calendar-print-area > div[style*="display: grid"] { grid-template-columns: repeat(2, 1fr) !important; gap: 15px !important; }
        header, footer, .top-bar { display: none !important; }
        .cal-header { color: #000 !important; }
        .calendar-grid-header { background: #eee !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Calendar <?php echo e($year); ?> | Hijri Calendar <?php echo e($startHijri['year']); ?>–<?php echo e($endHijri['year']); ?> AH</h1>
    <p class="date-hero-subtitle">Complete Islamic Calendar for <?php echo e($year); ?> with all 12 months, Ramadan, Eid dates</p>
</section>


<section class="section-container">
    <div class="hijri-span-card">
        <div class="hijri-span-label">Hijri Year Coverage</div>
        <div class="hijri-span-value"><?php echo e($year); ?> covers <?php echo e($startHijri['year']); ?>–<?php echo e($endHijri['year']); ?> AH</div>
        <div style="color: var(--text-medium); margin-top: 8px;">January <?php echo e($year); ?>: <?php echo e($startHijri['formatted']); ?> — December <?php echo e($year); ?>: <?php echo e($endHijri['formatted']); ?></div>
    </div>
</section>


<section class="section-container">
    <div class="year-nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($y = 2018; $y <= 2036; $y++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('islamic-calendar-year', $y)); ?>" class="year-nav-link <?php echo e($y == $year ? 'active' : ''); ?>"><?php echo e($y); ?></a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>


<section class="section-container" id="calendar-print-area">
    <div class="title-wrapper" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <h2 class="section-title" style="margin-bottom: 0;">Full Islamic Calendar <?php echo e($year); ?></h2>
        <button onclick="window.print()" class="print-btn"><i class="fas fa-print"></i> Print Calendar</button>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 20px; margin-top: 40px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $fullYearCalendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mKey => $monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php echo $__env->make('islamic-calendar.partials._month-grid', [
                'monthData' => $monthData,
                'monthName' => $monthData['month_name'],
                'year' => $year,
                'yearEvents' => $yearEvents
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($yearEvents->count() > 0): ?>
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Events in <?php echo e($year); ?></h2>
    </div>
    <div class="events-timeline">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $yearEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="event-card">
                <div class="event-icon event-icon-<?php echo e($event->event_type); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($event->event_type): case ('eid'): ?> 🌙 <?php break; ?> <?php case ('ramadan'): ?> 🕌 <?php break; ?> <?php case ('hajj'): ?> 🕋 <?php break; ?> <?php case ('muharram'): ?> 📿 <?php break; ?> <?php default: ?> ☪️ <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <div class="event-name"><?php echo e($event->event_name); ?></div>
                    <div class="event-date"><?php echo e($event->hijri_date ?? ''); ?> <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($event->gregorian_date): ?> · <?php echo e($event->gregorian_date->format('d M Y')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></div>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-container">
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Current Calendar</a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Date Today</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi</a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($year > 2018): ?><a href="<?php echo e(route('islamic-calendar-year', $year - 1)); ?>" class="internal-link">← <?php echo e($year - 1); ?></a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($year < 2036): ?><a href="<?php echo e(route('islamic-calendar-year', $year + 1)); ?>" class="internal-link"><?php echo e($year + 1); ?> →</a><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Calendar <?php echo e($year); ?></h2>
    </div>
    <?php
    $faqs = [
        ['q' => "Islamic calendar {$year} today date?", 'a' => "Islamic calendar {$year} today date is <strong>" . (($year == now()->year) ? $startHijri['formatted'] : "varies — see the full calendar above") . "</strong>. Browse the complete {$year} calendar above for all dates."],
        ['q' => "Islamic date today in Pakistan {$year}?", 'a' => "Islamic date in Pakistan for {$year} covers Hijri years <strong>{$startHijri['year']}–{$endHijri['year']}</strong> AH. " . (($year == now()->year) ? "Today's date: " . $startHijri['formatted'] : "See the calendar above for all dates.")],
        ['q' => "When was Ramadan in {$year}?", 'a' => "Check the Islamic Calendar {$year} above for exact Ramadan dates. Ramadan is the 9th month of the Islamic calendar and its Gregorian dates shift by ~10 days each year."],
        ['q' => "What Hijri year was {$year}?", 'a' => "The Gregorian year <strong>{$year}</strong> corresponds to Hijri years <strong>{$startHijri['year']}–{$endHijri['year']}</strong> AH."],
        ['q' => "Islamic calendar {$year} vs {$year} — same dates?", 'a' => "No, Islamic dates shift by approximately 10-11 days each year because the Hijri calendar is lunar (354-355 days) while the Gregorian calendar is solar (365-366 days)."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Calendar <?php echo e($year); ?> — Complete Hijri Calendar <?php echo e($startHijri['year']); ?>–<?php echo e($endHijri['year']); ?> AH</h2>
        <p>The <strong>Islamic calendar <?php echo e($year); ?></strong> covers Hijri years <?php echo e($startHijri['year']); ?> to <?php echo e($endHijri['year']); ?> AH. This page displays the complete 12-month calendar for <?php echo e($year); ?> with both Gregorian and Hijri dates side by side. Each month shows the corresponding Islamic date, making it easy to track when Ramadan, Eid ul-Fitr, Eid ul-Adha, Muharram, and other Islamic events fall in <?php echo e($year); ?>.</p>

        <h3>Islamic Calendar <?php echo e($year); ?> Today Date</h3>
        <p>The <strong>Islamic calendar <?php echo e($year); ?> today date</strong> in Pakistan is shown in the calendar grid above. January 1, <?php echo e($year); ?> corresponds to <?php echo e($startHijri['formatted']); ?>, and December 31, <?php echo e($year); ?> corresponds to <?php echo e($endHijri['formatted']); ?>. The Hijri calendar is approximately 10-11 days shorter than the Gregorian calendar, so two Hijri years typically overlap in a single Gregorian year.</p>

        <h3>Islamic Events in <?php echo e($year); ?></h3>
        <p>Major Islamic events in <?php echo e($year); ?> include Ramadan (9th month), Eid ul-Fitr (1 Shawwal), Eid ul-Adha (10 Dhu al-Hijjah), Muharram (1st month with Ashura on 10th), Shab-e-Meraj (27 Rajab), Shab-e-Barat (15 Shaban), and Eid Milad-un-Nabi (12 Rabi al-Awwal). All these events are marked in the calendar above with color-coded badges.</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/islamic-calendar/year.blade.php ENDPATH**/ ?>