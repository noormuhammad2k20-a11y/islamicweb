

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; }
    .date-cards-wrapper { display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 1000px; margin: 0 auto; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 30px; width: 100%; max-width: 450px; text-align: center; transition: transform 0.3s ease; }
    .main-date-card:hover { transform: translateY(-5px); border-color: var(--gold); }
    .card-flag { font-size: 2rem; margin-bottom: 10px; }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
    .hijri-day-large { font-size: 4rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    .hijri-month-name { font-size: 1.5rem; font-weight: 600; margin-bottom: 5px; }
    .hijri-urdu-arabic { font-family: 'Amiri', serif; font-size: 1.3rem; color: var(--gold-light); margin-bottom: 10px; }
    .gregorian-date { font-size: 0.9rem; opacity: 0.8; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px; margin-top: 15px; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    .info-box { background: linear-gradient(135deg, #fdf6e3, #fefcf2); border: 1px solid var(--gold); border-radius: 16px; padding: 30px; margin-top: 30px; }
    .info-box h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; }
    .info-box p { color: #555; line-height: 1.8; }

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

    /* Calendar Grid CSS */
    .controls-bar { background: white; padding: 20px; border-radius: 16px; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .control-select { padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 1rem; color: #333; outline: none; }
    .print-btn { padding: 10px 25px; background: transparent; border: 2px solid var(--primary); color: var(--primary); border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.9rem; }
    .print-btn:hover { background: var(--primary); color: white; }

    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .calendar-grid-header { background: var(--primary); color: white; padding: 15px 20px; }
    .calendar-grid-title { margin: 0; font-family: 'Playfair Display', serif; font-size: 1.3rem; }
    .calendar-grid { padding: 10px; }
    .calendar-grid-row { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; }
    .calendar-grid-header-row { margin-bottom: 8px; }
    .cal-cell { aspect-ratio: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 10px; padding: 6px; position: relative; min-height: 60px; transition: all 0.2s; cursor: default; }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) { background: rgba(10,58,42,0.05); transform: scale(1.05); }
    .cal-header { font-weight: 700; color: var(--primary); font-size: 0.85rem; min-height: auto; aspect-ratio: auto; }
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

    @media (max-width: 768px) { 
        .date-hero-title { font-size: 1.6rem; } 
        .hijri-day-large { font-size: 3rem; } 
        .cal-cell { min-height: 45px; padding: 3px; }
        .cal-greg { font-size: 0.8rem; }
        .cal-hijri { font-size: 0.6rem; }
    }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Date Today in <?php echo e($cData['full_name']); ?></h1>
    <p class="date-hero-subtitle">Official Hijri Date & Calendar for <?php echo e($cData['name']); ?></p>

    <div class="date-cards-wrapper">
        
        <div class="main-date-card">
            <div class="card-flag"><?php echo e($cData['flag']); ?></div>
            <div class="card-region">Islamic Date in <?php echo e($cData['name']); ?></div>
            <div class="hijri-day-large"><?php echo e($hijri['day']); ?></div>
            <div class="hijri-month-name"><?php echo e($hijri['month_name']); ?></div>
            <div class="hijri-urdu-arabic"><?php echo e($hijri['month_urdu']); ?> - <?php echo e($hijri['year']); ?> AH</div>
            <div class="gregorian-date"><i class="far fa-calendar"></i> <?php echo e($now->format('d F Y, l')); ?></div>
        </div>

        
        <div class="main-date-card" style="max-width: 350px;">
            <div class="card-flag">🇸🇦</div>
            <div class="card-region">Saudi Arabia (Umm al-Qura)</div>
            <div class="hijri-day-large" style="font-size: 3rem;"><?php echo e($hijriSA['day']); ?></div>
            <div class="hijri-month-name" style="font-size: 1.2rem;"><?php echo e($hijriSA['month_name']); ?></div>
            <div class="hijri-urdu-arabic" style="font-size: 1.1rem;"><?php echo e($hijriSA['year']); ?> AH</div>
            <div class="gregorian-date"><i class="far fa-calendar"></i> <?php echo e(Carbon\Carbon::now('Asia/Riyadh')->format('d M Y')); ?></div>
        </div>
    </div>
</section>


<section class="section-container">
    <div class="controls-bar">
        <form method="GET" action="<?php echo e(route('islamic-date-country', $country)); ?>" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center;">
            <select name="year" class="control-select" onchange="this.form.submit()">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($y = 2018; $y <= 2036; $y++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
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


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Calendar <?php echo e($year); ?> in <?php echo e($cData['name']); ?></h2>
        <p>Complete 12-month Hijri calendar for <?php echo e($cData['full_name']); ?>. Each day shows both Gregorian and Hijri dates.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 20px;">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $fullYearCalendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mKey => $monthData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php echo $__env->make('islamic-calendar.partials._month-grid', [
                'monthData' => $monthData,
                'monthName' => $monthData['month_name'],
                'year' => $year,
                'yearEvents' => collect()
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>


<section class="section-container">
    <div class="info-box">
        <h3>🌙 Moon Sighting and Islamic Dates in <?php echo e($cData['name']); ?></h3>
        <p>The Islamic calendar is a lunar calendar, meaning that months begin with the sighting of the new crescent moon. In <strong><?php echo e($cData['full_name']); ?></strong>, the Islamic date may sometimes align exactly with Saudi Arabia's Umm al-Qura calendar, or it may differ by a day depending on local moon sighting authorities and astronomical calculations.</p>
        <p>Today's official Islamic date in <?php echo e($cData['name']); ?> is <strong><?php echo e($hijri['formatted']); ?></strong>. This date is widely followed across all major cities and provinces in <?php echo e($cData['name']); ?> for religious observances, fasting, and Islamic holidays.</p>
    </div>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Date Today in <?php echo e($cData['full_name']); ?> <?php echo e($cData['flag']); ?></h2>
        <p><strong>Islamic date today in <?php echo e($cData['name']); ?></strong> is <strong><?php echo e($hijri['formatted']); ?></strong>. The Hijri calendar is essential for Muslims in <?php echo e($cData['full_name']); ?> to determine the correct dates for religious rituals such as fasting during Ramadan, performing Hajj, and celebrating Eid ul-Fitr and Eid ul-Adha.</p>

        <h3>Current Hijri Year in <?php echo e($cData['name']); ?></h3>
        <p>The current Islamic year is <strong><?php echo e($hijri['year']); ?> AH</strong>. "AH" stands for Anno Hegirae, marking the migration (Hijrah) of Prophet Muhammad (PBUH) from Makkah to Madinah. Muslims in <?php echo e($cData['name']); ?> observe the Hijri calendar alongside the standard Gregorian calendar for daily life and worship.</p>

        <h3><?php echo e($cData['name']); ?> vs Saudi Arabia Islamic Date</h3>
        <p>Many Muslims wonder about the difference in Islamic dates. Today, the Islamic date in <strong>Saudi Arabia</strong> is <?php echo e($hijriSA['formatted']); ?>, while in <strong><?php echo e($cData['name']); ?></strong> it is <?php echo e($hijri['formatted']); ?>. Certain Arab countries strictly follow Saudi Arabia's calculations, while others rely on their own national moon sighting committees.</p>
    </div>
</section>


<section class="section-container">
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Main Islamic Calendar</a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Global Date Today</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi Arabia Date</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan Date</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — <?php echo e($cData['name']); ?> Islamic Date</h2>
    </div>
    <?php
    $faqs = [
        ['q' => "What is the Islamic date today in {$cData['full_name']}?", 'a' => "The Islamic date today in <strong>{$cData['name']}</strong> is <strong>{$hijri['formatted']}</strong>. This translates to {$now->format('d F Y')} in the Gregorian calendar."],
        ['q' => "What is the current Islamic month in {$cData['name']}?", 'a' => "The current Islamic month is <strong>{$hijri['month_name']}</strong>, which is the {$hijri['month']}th month of the Hijri calendar year {$hijri['year']} AH."],
        ['q' => "Does {$cData['name']} follow Saudi Arabia for Islamic dates?", 'a' => "It depends on the country. Most Gulf states (like UAE, Kuwait, Qatar, Bahrain) generally follow Saudi Arabia's Umm al-Qura calendar. However, some countries like Egypt, Jordan, and Turkey may have their own calculation or moon-sighting methodologies."],
        ['q' => "How many days are in the Islamic calendar?", 'a' => "The Islamic (Hijri) calendar is lunar and consists of 12 months with a total of 354 or 355 days in a year. This is about 10-11 days shorter than the Gregorian solar year."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\islamic-calendar\country.blade.php ENDPATH**/ ?>