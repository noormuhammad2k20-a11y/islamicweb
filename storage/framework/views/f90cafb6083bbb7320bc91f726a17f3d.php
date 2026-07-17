

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; }
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    /* Calendar Grid */
    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .calendar-grid-header { background: var(--primary); color: white; padding: 15px 20px; }
    .calendar-grid-title { margin: 0; font-family: 'Playfair Display', serif; font-size: 1.3rem; }
    .calendar-grid { padding: 10px; }
    .calendar-grid-row { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; }
    .calendar-grid-header-row { margin-bottom: 8px; }
    .cal-cell { aspect-ratio: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 10px; padding: 6px; position: relative; min-height: 60px; transition: all 0.2s; }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) { background: rgba(10,58,42,0.05); transform: scale(1.05); }
    .cal-header { font-weight: 700; color: var(--primary); font-size: 0.85rem; min-height: auto; aspect-ratio: auto; }
    .cal-greg { font-weight: 700; font-size: 1rem; color: #333; }
    .cal-hijri { font-size: 0.75rem; color: var(--gold); font-weight: 600; }
    .cal-hijri-month { font-size: 0.55rem; color: var(--primary); font-weight: 500; position: absolute; bottom: 2px; }
    .cal-today { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); border: 2px solid var(--gold); border-radius: 12px; }
    .cal-friday { background: rgba(10,58,42,0.04); }
    .cal-empty { opacity: 0.3; }
    .cal-event-badge { font-size: 0.5rem; position: absolute; top: 3px; right: 5px; }
    .cal-event-eid { color: #22c55e; } .cal-event-ramadan { color: #8b5cf6; } .cal-event-hajj { color: #f59e0b; } .cal-event-muharram { color: #ef4444; } .cal-event-other { color: #3b82f6; }

    /* Events */
    .events-timeline { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 15px; margin-top: 20px; }
    .event-card { background: white; border: 1px solid var(--border-light); border-radius: 14px; padding: 18px; display: flex; gap: 15px; align-items: center; transition: all 0.3s; }
    .event-card:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.06); transform: translateY(-2px); }
    .event-icon { width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem; color: white; flex-shrink: 0; }
    .event-icon-eid { background: linear-gradient(135deg, #22c55e, #16a34a); }
    .event-icon-ramadan { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .event-icon-hajj { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .event-icon-muharram { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .event-icon-other { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .event-name { font-weight: 700; color: var(--primary); font-size: 0.95rem; }
    .event-date { font-size: 0.85rem; color: #666; margin-top: 3px; }

    /* Hijri Span */
    .hijri-span-card {
        background: linear-gradient(135deg, #fdf6e3, #fefcf2); border: 2px solid var(--gold); border-radius: 20px; padding: 30px; text-align: center; margin-bottom: 30px;
    }
    .hijri-span-label { font-size: 1rem; font-weight: 700; color: var(--gold); text-transform: uppercase; letter-spacing: 1px; }
    .hijri-span-value { font-size: 2rem; font-weight: 800; color: var(--primary); margin-top: 10px; font-family: 'Playfair Display', serif; }

    /* Year Nav */
    .year-nav { display: flex; justify-content: center; gap: 10px; flex-wrap: wrap; margin-bottom: 30px; }
    .year-nav-link { padding: 8px 18px; border: 2px solid var(--border-light); border-radius: 10px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; }
    .year-nav-link:hover, .year-nav-link.active { background: var(--primary); color: white; border-color: var(--primary); }

    .faq-container { margin-top: 30px; }
    .faq-item { background: white; border: 1px solid var(--border-light); border-radius: 12px; margin-bottom: 12px; overflow: hidden; }
    .faq-question { padding: 18px 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; color: var(--primary); }
    .faq-question i { color: var(--gold); transition: transform 0.3s; }
    .faq-answer { padding: 0 20px 18px; display: none; color: #555; line-height: 1.7; }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }
    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444; }
    .seo-content h2, .seo-content h3 { color: var(--primary); margin-top: 25px; margin-bottom: 12px; font-family: 'Playfair Display', serif; }
    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 30px; }
    .internal-link { display: flex; align-items: center; gap: 8px; padding: 12px 18px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; font-size: 0.9rem; }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }
    @media (max-width: 768px) { .date-hero-title { font-size: 1.6rem; } .cal-cell { min-height: 45px; padding: 3px; } .cal-greg { font-size: 0.8rem; } .cal-hijri { font-size: 0.6rem; } }

    /* Print Styles */
    .print-btn { background: var(--primary); color: white; border: none; padding: 10px 22px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 1rem; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(10,58,42,0.2); }
    .print-btn:hover { background: var(--gold); color: var(--primary-dark); transform: translateY(-2px); }
    
    @media print {
        body * { visibility: hidden; }
        #calendar-print-area, #calendar-print-area * { visibility: visible; }
        #calendar-print-area { position: absolute; left: 0; top: 0; width: 100%; margin: 0; padding: 10px; }
        .print-btn { display: none !important; }
        .calendar-grid-wrapper { box-shadow: none !important; border: 1px solid #ccc !important; break-inside: avoid; page-break-inside: avoid; margin-bottom: 20px; }
        .section-container { max-width: 100%; padding: 0; margin: 0; }
        .title-wrapper { text-align: center !important; justify-content: center !important; width: 100%; margin-bottom: 20px; }
        .section-title { border-bottom: 2px solid #ccc !important; font-size: 1.8rem; }
        /* Two columns per page for print */
        #calendar-print-area > div[style*="display: grid"] { grid-template-columns: repeat(2, 1fr) !important; gap: 15px !important; }
        /* Hide navbar/footer completely so they don't take up space */
        header, footer, .top-bar { display: none !important; }
        /* Enforce background colors on print */
        .cal-header { color: #000 !important; }
        .calendar-grid-header { background: #eee !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Calendar <?php echo e($monthName); ?> <?php echo e($year); ?></h1>
    <p class="date-hero-subtitle">Complete Hijri Calendar for <?php echo e($monthName); ?> <?php echo e($year); ?></p>
</section>






<section class="section-container" id="calendar-print-area">
    <div class="title-wrapper" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <h2 class="section-title" style="margin-bottom: 0;">Islamic Calendar <?php echo e($monthName); ?> <?php echo e($year); ?></h2>
        <button onclick="window.print()" class="print-btn"><i class="fas fa-print"></i> Print Calendar</button>
    </div>

    <div style="max-width: 500px; margin: 0 auto;">
        <?php echo $__env->make('islamic-calendar.partials._month-grid', [
            'monthData' => $monthData,
            'monthName' => $monthName,
            'year' => $year,
            'yearEvents' => collect()
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</section>




<section class="section-container">
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Current Calendar</a>
        <a href="<?php echo e(route('islamic-calendar-year', $year)); ?>" class="internal-link">🗓️ Full Year <?php echo e($year); ?></a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Date Today</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Calendar <?php echo e($monthName); ?> <?php echo e($year); ?></h2>
    </div>
    <?php
    $faqs = [
        ['q' => "What is the Islamic date today in {$monthName} {$year}?", 'a' => "Please check the calendar grid above for exact Hijri dates corresponding to {$monthName} {$year}."],
        ['q' => "Is {$monthName} {$year} calendar accurate for Pakistan?", 'a' => "Yes, this calendar provides the estimated Hijri dates for Pakistan. However, actual Islamic months begin with the sighting of the new moon by the Ruet-e-Hilal Committee."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Calendar <?php echo e($monthName); ?> <?php echo e($year); ?></h2>
        <p>The <strong>Islamic calendar for <?php echo e($monthName); ?> <?php echo e($year); ?></strong> helps you easily find the Hijri date for any Gregorian date in <?php echo e($monthName); ?>. Since the Islamic calendar is lunar, the Hijri dates shift relative to the Gregorian calendar each year.</p>
        <p>You can print this monthly calendar or check other months by visiting the <a href="<?php echo e(route('islamic-calendar-year', $year)); ?>">Full <?php echo e($year); ?> Islamic Calendar</a> page.</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\islamic-calendar\year-month.blade.php ENDPATH**/ ?>