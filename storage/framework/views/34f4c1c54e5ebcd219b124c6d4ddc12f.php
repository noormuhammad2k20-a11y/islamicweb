<?php $__env->startSection('schema'); ?>
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
        --primary: #0A3A2A;
        --primary-dark: #052116;
        --gold: #D4AF37;
        --gold-light: #F3E5AB;
        --bg-light: #f8fafc;
        --border-light: rgba(10,58,42,0.1);
    }
    .date-hero {
        background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%);
        padding: 60px 20px;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }
    .date-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.05;
        background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px);
        background-size: 40px 40px;
    }
    .date-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 10px;
        position: relative;
        z-index: 2;
    }
    .date-hero-subtitle {
        font-size: 1.1rem;
        color: var(--gold-light);
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }
    .date-cards-wrapper {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        position: relative;
        z-index: 2;
        max-width: 1000px;
        margin: 0 auto;
    }
    .main-date-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 20px;
        padding: 30px;
        width: 100%;
        max-width: 450px;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .main-date-card:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
    }
    .card-flag { font-size: 2rem; margin-bottom: 10px; }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
    .hijri-day-large { font-size: 4rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    .hijri-month-name { font-size: 1.5rem; font-weight: 600; margin-bottom: 5px; }
    .hijri-urdu-arabic { font-family: 'Amiri', serif; font-size: 1.3rem; color: var(--gold-light); margin-bottom: 10px; }
    .gregorian-date { font-size: 0.9rem; opacity: 0.8; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px; margin-top: 15px; }

    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--primary);
        text-align: center;
        margin-bottom: 30px;
        border-bottom: 2px solid var(--gold);
        display: inline-block;
        padding-bottom: 10px;
    }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    /* Year / Month Selectors */
    .controls-bar {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 30px;
    }
    .control-select {
        padding: 10px 20px;
        border: 2px solid var(--primary);
        border-radius: 12px;
        background: white;
        color: var(--primary);
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    .control-select:hover, .control-select:focus {
        background: var(--primary);
        color: white;
        outline: none;
    }
    .control-btn {
        padding: 10px 25px;
        background: var(--gold);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 1rem;
    }
    .control-btn:hover { background: #c49b2f; transform: translateY(-2px); }

    /* Calendar Grid */
    .calendar-grid-wrapper {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        overflow: hidden;
        border: 1px solid var(--border-light);
        margin-bottom: 25px;
    }
    .calendar-grid-header {
        background: var(--primary);
        color: white;
        padding: 15px 20px;
    }
    .calendar-grid-title {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
    }
    .calendar-grid { padding: 10px; }
    .calendar-grid-row {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
    }
    .calendar-grid-header-row { margin-bottom: 8px; }
    .cal-cell {
        aspect-ratio: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        padding: 6px;
        position: relative;
        min-height: 60px;
        transition: all 0.2s;
        cursor: default;
    }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) {
        background: rgba(10,58,42,0.05);
        transform: scale(1.05);
    }
    .cal-header {
        font-weight: 700;
        color: var(--primary);
        font-size: 0.85rem;
        min-height: auto;
        aspect-ratio: auto;
    }
    .cal-greg { font-weight: 700; font-size: 1rem; color: #333; }
    .cal-hijri { font-size: 0.75rem; color: var(--gold); font-weight: 600; }
    .cal-hijri-month { font-size: 0.55rem; color: var(--primary); font-weight: 500; position: absolute; bottom: 2px; }
    .cal-today { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); border: 2px solid var(--gold); border-radius: 12px; }
    .cal-friday { background: rgba(10,58,42,0.04); }
    .cal-empty { opacity: 0.3; }
    .cal-event-badge { font-size: 0.5rem; position: absolute; top: 3px; right: 5px; }
    .cal-event-eid { color: #22c55e; }
    .cal-event-ramadan { color: #8b5cf6; }
    .cal-event-hajj { color: #f59e0b; }
    .cal-event-muharram { color: #ef4444; }
    .cal-event-other { color: #3b82f6; }

    /* Events Timeline */
    .events-timeline {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }
    .event-card {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 14px;
        padding: 18px;
        display: flex;
        gap: 15px;
        align-items: center;
        transition: all 0.3s;
    }
    .event-card:hover { box-shadow: 0 8px 20px rgba(0,0,0,0.06); transform: translateY(-2px); }
    .event-icon {
        width: 45px; height: 45px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 0.9rem; color: white; flex-shrink: 0;
    }
    .event-icon-eid { background: linear-gradient(135deg, #22c55e, #16a34a); }
    .event-icon-ramadan { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .event-icon-hajj { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .event-icon-muharram { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .event-icon-other { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .event-name { font-weight: 700; color: var(--primary); font-size: 0.95rem; }
    .event-date { font-size: 0.85rem; color: #666; margin-top: 3px; }

    /* FAQ */
    .faq-container { margin-top: 30px; }
    .faq-item { background: white; border: 1px solid var(--border-light); border-radius: 12px; margin-bottom: 12px; overflow: hidden; }
    .faq-question { padding: 18px 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; color: var(--primary); }
    .faq-question i { color: var(--gold); transition: transform 0.3s; }
    .faq-answer { padding: 0 20px 18px; display: none; color: #555; line-height: 1.7; }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }

    /* SEO Content */
    .seo-content {
        background: white; padding: 35px; border-radius: 20px;
        border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444;
    }
    .seo-content h2, .seo-content h3 { color: var(--primary); margin-top: 25px; margin-bottom: 12px; font-family: 'Playfair Display', serif; }

    /* Internal Links */
    .internal-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 12px;
        margin-top: 30px;
    }
    .internal-link {
        display: flex; align-items: center; gap: 8px;
        padding: 12px 18px; background: white; border: 1px solid var(--border-light);
        border-radius: 12px; text-decoration: none; color: var(--primary);
        font-weight: 600; transition: all 0.3s; font-size: 0.9rem;
    }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }

    /* Print Button */
    .print-btn {
        padding: 10px 25px; background: transparent; border: 2px solid var(--primary);
        color: var(--primary); border-radius: 12px; font-weight: 600; cursor: pointer;
        transition: all 0.3s; font-size: 0.9rem;
    }
    .print-btn:hover { background: var(--primary); color: white; }

    @media (max-width: 768px) {
        .date-hero-title { font-size: 1.6rem; }
        .hijri-day-large { font-size: 3rem; }
        .cal-cell { min-height: 45px; padding: 3px; }
        .cal-greg { font-size: 0.8rem; }
        .cal-hijri { font-size: 0.6rem; }
    }

    /* Print Styles */
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
        header, footer, .top-bar, .controls-bar { display: none !important; }
        /* Enforce background colors on print */
        .cal-header { color: #000 !important; }
        .calendar-grid-header { background: #eee !important; color: #000 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Calendar <?php echo e($year); ?> | Hijri Calendar <?php echo e($hijriPK['year']); ?> AH</h1>
    <p class="date-hero-subtitle">Complete Islamic Calendar with Hijri Dates — Today: <?php echo e($hijriPK['formatted']); ?></p>

    <?php echo $__env->make('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriSA, 'nowPK' => $nowPK], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="controls-bar">
        <form method="GET" action="<?php echo e(route('islamic-calendar')); ?>" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center;">
            <select name="year" class="control-select" onchange="this.form.submit()">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($y = 2018; $y <= 2030; $y++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <option value="<?php echo e($y); ?>" <?php echo e($year == $y ? 'selected' : ''); ?>><?php echo e($y); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
            <select name="month" class="control-select" onchange="this.form.submit()">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($m = 1; $m <= 12; $m++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <option value="<?php echo e($m); ?>" <?php echo e($month == $m ? 'selected' : ''); ?>><?php echo e(Carbon\Carbon::create($year, $m, 1)->format('F')); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
            <button type="button" class="print-btn" onclick="window.print()"><i class="fas fa-print"></i> Print Calendar</button>
        </form>
    </div>
</section>


<section class="section-container" id="calendar-print-area">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Calendar <?php echo e($year); ?> — Full 12-Month Hijri Calendar</h2>
        <p>Today's date according to Islamic calendar for <?php echo e($year); ?>. Each day shows both Gregorian and Hijri dates.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 20px;">
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
        <h2 class="section-title">Islamic Events <?php echo e($year); ?> — Important Islamic Dates</h2>
        <p>All major Islamic events and holidays for <?php echo e($year); ?></p>
    </div>

    <div class="events-timeline">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $yearEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="event-card">
                <div class="event-icon event-icon-<?php echo e($event->event_type); ?>">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($event->event_type):
                        case ('eid'): ?> 🌙 <?php break; ?>
                        <?php case ('ramadan'): ?> 🕌 <?php break; ?>
                        <?php case ('hajj'): ?> 🕋 <?php break; ?>
                        <?php case ('muharram'): ?> 📿 <?php break; ?>
                        <?php default: ?> ☪️
                    <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <div class="event-name"><?php echo e($event->event_name); ?></div>
                    <div class="event-date">
                        <?php echo e($event->hijri_date ?? ''); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($event->gregorian_date): ?> · <?php echo e($event->gregorian_date->format('d M Y')); ?> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($event->event_name_urdu): ?>
                        <div style="font-family: 'Amiri', serif; color: var(--gold); font-size: 0.9rem;"><?php echo e($event->event_name_urdu); ?></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Date Pages</h2>
    </div>
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Islamic Date Today</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan Islamic Date</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi Arabia Date</a>
        <a href="<?php echo e(route('islamic-date-urdu')); ?>" class="internal-link">🔤 Urdu Islamic Date</a>
        <a href="<?php echo e(route('islamic-date-city', 'karachi')); ?>" class="internal-link">🏙️ Karachi Date</a>
        <a href="<?php echo e(route('islamic-date-city', 'lahore')); ?>" class="internal-link">🏙️ Lahore Date</a>
        <a href="<?php echo e(route('islamic-date-city', 'islamabad')); ?>" class="internal-link">🏙️ Islamabad Date</a>
        <a href="<?php echo e(route('islamic-date-city', 'rawalpindi')); ?>" class="internal-link">🏙️ Rawalpindi Date</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Frequently Asked Questions — Islamic Calendar <?php echo e($year); ?></h2>
    </div>

    <?php
    $faqs = [
        ['q' => "What is the Islamic calendar {$year} today date?", 'a' => "Islamic calendar {$year} today date is <strong>{$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']}</strong> AH in Pakistan ({$nowPK->format('d F Y')}). The Islamic calendar is a lunar calendar with 354 or 355 days per year."],
        ['q' => "Today's date according to Islamic calendar?", 'a' => "Today's date according to Islamic calendar is <strong>{$hijriPK['formatted']}</strong>. The current Islamic month is {$hijriPK['month_name']} ({$hijriPK['month_urdu']}), which is the {$hijriPK['month']}th month of the Hijri year."],
        ['q' => "How many months are in the Islamic calendar?", 'a' => "The Islamic calendar has <strong>12 months</strong>: Muharram, Safar, Rabi al-Awwal, Rabi al-Thani, Jumada al-Awwal, Jumada al-Thani, Rajab, Shaban, Ramadan, Shawwal, Dhu al-Qadah, and Dhu al-Hijjah. Each month has 29 or 30 days based on moon sighting."],
        ['q' => "When is Ramadan {$year}?", 'a' => "Ramadan {$year} is expected to begin around February/March {$year} (exact date depends on moon sighting). Check our <a href='" . url("/islamic-calendar/{$year}") . "'>Islamic Calendar {$year}</a> for complete Ramadan dates."],
        ['q' => "What is Islamic month date today?", 'a' => "Islamic month date today is <strong>{$hijriPK['day']}</strong> of <strong>{$hijriPK['month_name']}</strong> ({$hijriPK['month_urdu']}). This is the {$hijriPK['month']}th month of the Islamic Hijri year {$hijriPK['year']}."],
        ['q' => "Islamic calendar date today in Pakistan and Saudi Arabia?", 'a' => "Islamic date today in Pakistan is <strong>{$hijriPK['formatted']}</strong>. Islamic date today in Saudi Arabia is <strong>{$hijriSA['formatted']}</strong>. Pakistan and Saudi Arabia may differ by 1 day due to different moon sighting methods."],
        ['q' => "Is the Islamic calendar the same worldwide?", 'a' => "No, Islamic dates can differ by 1-2 days between countries. Pakistan follows local moon sighting by Ruet-e-Hilal Committee, while Saudi Arabia uses the Umm al-Qura calculated calendar. UAE, Kuwait, and other Gulf countries generally follow Saudi Arabia."],
        ['q' => "How is the Islamic calendar different from Gregorian?", 'a' => "The Islamic calendar is a <strong>lunar calendar</strong> with 354-355 days per year, while the Gregorian calendar is solar with 365-366 days. Islamic months begin with new crescent moon sighting, shifting Islamic dates about 10-11 days earlier each Gregorian year."],
    ];
    ?>

    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Calendar <?php echo e($year); ?> — Complete Hijri Calendar Guide</h2>
        <p>The <strong>Islamic calendar <?php echo e($year); ?></strong> displays all 12 months with both Gregorian and Hijri dates. The current Islamic year is <strong><?php echo e($hijriPK['year']); ?> AH</strong>, and today's Hijri date is <strong><?php echo e($hijriPK['formatted']); ?></strong>. This comprehensive <strong>Hijri calendar <?php echo e($year); ?></strong> helps Muslims track important Islamic dates including Ramadan, Eid ul-Fitr, Eid ul-Adha, Muharram, and other significant events throughout the year.</p>

        <p>Our <strong>Islamic calendar date today</strong> page covers the complete year with an interactive grid showing each day's corresponding Hijri date. The <strong>Islamic calendar <?php echo e($year); ?> today date</strong> is dynamically updated based on Pakistan Standard Time (UTC+5). You can also view specific year archives by navigating to previous years like <a href="<?php echo e(url('/islamic-calendar/2025')); ?>">Islamic Calendar 2025</a> or <a href="<?php echo e(url('/islamic-calendar/2024')); ?>">Islamic Calendar 2024</a>.</p>

        <h3>About the Hijri Calendar</h3>
        <p>The <strong>Hijri calendar</strong> (Islamic calendar) began in 622 CE when Prophet Muhammad (PBUH) migrated from Makkah to Madinah. It is a purely lunar calendar with 12 months of 29 or 30 days each. Important months include <strong>Muharram</strong> (1st month, Ashura on 10th), <strong>Rabi al-Awwal</strong> (birth month of Prophet PBUH), <strong>Rajab</strong> (month of Isra and Miraj), <strong>Shaban</strong> (Shab-e-Barat on 15th), <strong>Ramadan</strong> (fasting month), and <strong>Dhu al-Hijjah</strong> (Hajj pilgrimage, Eid ul-Adha on 10th).</p>

        <h3>Islamic Calendar vs Gregorian Calendar</h3>
        <p>Since the Islamic year is approximately 10-11 days shorter than the Gregorian year, Islamic dates shift backward through the Gregorian calendar each year. This means Ramadan, Eid, and other Islamic events occur on different Gregorian dates every year. For <strong><?php echo e($year); ?></strong>, the Hijri year spans approximately <strong><?php echo e($hijriPK['year']); ?></strong> AH, covering the Islamic months from Muharram to Dhu al-Hijjah.</p>
    </div>
</section>

<script>
function toggleFaq(id) {
    var el = document.getElementById(id);
    if (el) { el.classList.toggle('faq-open'); }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/islamic-calendar/main.blade.php ENDPATH**/ ?>