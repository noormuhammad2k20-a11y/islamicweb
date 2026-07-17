

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

    /* Month Hero Card */
    .month-hero-card {
        background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);
        border-radius: 20px; padding: 40px; max-width: 600px; margin: 20px auto 0; text-align: center; position: relative; z-index: 2;
    }
    .month-number-badge { background: var(--gold); color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 800; margin: 0 auto 15px; }
    .month-name-en { font-size: 2.5rem; font-weight: 800; font-family: 'Playfair Display', serif; }
    .month-name-ur { font-family: 'Amiri', serif; font-size: 2rem; color: var(--gold-light); margin-top: 5px; }
    .month-name-ar { font-family: 'Amiri', serif; font-size: 1.5rem; color: rgba(255,255,255,0.7); margin-top: 5px; }

    /* Content Sections */
    .month-content-card {
        background: white; border: 1px solid var(--border-light); border-radius: 20px; padding: 35px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05); margin-bottom: 25px;
    }
    .month-content-card h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; font-size: 1.3rem; }
    .month-content-card p { color: #555; line-height: 1.9; font-size: 1rem; }

    /* Important Dates */
    .important-dates-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 12px; margin-top: 15px;
    }
    .date-item {
        background: rgba(10,58,42,0.04); border: 1px solid var(--border-light); border-radius: 12px; padding: 15px; display: flex; align-items: center; gap: 12px;
    }
    .date-num { background: var(--primary); color: white; width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; }
    .date-event { font-weight: 600; color: var(--primary); font-size: 0.95rem; }

    /* Current Month Badge */
    .current-badge {
        background: var(--gold); color: white; padding: 6px 20px; border-radius: 20px;
        font-size: 0.85rem; font-weight: 700; display: inline-block; margin-top: 15px;
        position: relative; z-index: 2;
    }

    /* All Months Nav */
    .months-nav { display: flex; flex-wrap: wrap; gap: 8px; justify-content: center; margin-bottom: 30px; }
    .months-nav a {
        padding: 8px 16px; border: 1px solid var(--border-light); border-radius: 10px;
        text-decoration: none; color: var(--primary); font-weight: 600; font-size: 0.85rem; transition: all 0.3s;
    }
    .months-nav a:hover, .months-nav a.active { background: var(--primary); color: white; border-color: var(--primary); }

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
    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .calendar-grid-header { background: var(--primary); color: white; padding: 15px 20px; text-align: center; }
    .calendar-grid-title { margin: 0; font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; }
    .calendar-grid { padding: 15px; }
    .calendar-grid-row { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; }
    .calendar-grid-header-row { margin-bottom: 10px; }
    .cal-cell { aspect-ratio: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 12px; padding: 8px; position: relative; min-height: 70px; transition: all 0.2s; cursor: default; }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) { background: rgba(10,58,42,0.04); transform: scale(1.05); }
    .cal-header { font-weight: 700; color: var(--primary); font-size: 0.85rem; min-height: auto; aspect-ratio: auto; }
    .cal-greg { font-weight: 800; font-size: 1.2rem; color: #333; }
    .cal-hijri { font-size: 0.85rem; color: var(--gold); font-weight: 700; margin-top: 2px; }
    .cal-hijri-month { font-size: 0.65rem; color: var(--primary); font-weight: 600; text-transform: uppercase; margin-top: 2px; }
    .cal-today { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); border: 2px solid var(--gold); border-radius: 14px; }
    .cal-friday { background: rgba(10,58,42,0.03); }
    .cal-empty { opacity: 0.2; }

    @media (max-width: 768px) { 
        .date-hero-title { font-size: 1.6rem; } 
        .month-name-en { font-size: 1.8rem; } 
        .cal-cell { min-height: 50px; padding: 4px; }
        .cal-greg { font-size: 0.95rem; }
        .cal-hijri { font-size: 0.75rem; }
        .cal-hijri-month { font-size: 0.55rem; }
    }
</style>


<section class="date-hero">
    <h1 class="date-hero-title"><?php echo e($content->month_name_en); ?> <?php echo e($hijriPK['year']); ?> | <?php echo e($content->month_name_urdu); ?></h1>
    <p class="date-hero-subtitle">Islamic Month <?php echo e($content->month_name_en); ?> — <?php echo e($content->month_name_arabic); ?></p>

    <div class="month-hero-card">
        <div class="month-number-badge"><?php echo e($content->month_number); ?></div>
        <div class="month-name-en"><?php echo e($content->month_name_en); ?></div>
        <div class="month-name-ur"><?php echo e($content->month_name_urdu); ?></div>
        <div class="month-name-ar"><?php echo e($content->month_name_arabic); ?></div>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isCurrentMonth): ?>
        <div class="current-badge">✨ This is the Current Islamic Month</div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>


<section class="section-container">
    <?php
    $allMonths = [
        1 => ['slug' => 'muharram', 'name' => 'Muharram'],
        2 => ['slug' => 'safar', 'name' => 'Safar'],
        3 => ['slug' => 'rabi-ul-awwal', 'name' => 'Rabi al-Awwal'],
        4 => ['slug' => 'rabi-ul-thani', 'name' => 'Rabi al-Thani'],
        5 => ['slug' => 'jumada-al-awwal', 'name' => 'Jumada al-Awwal'],
        6 => ['slug' => 'jumada-al-thani', 'name' => 'Jumada al-Thani'],
        7 => ['slug' => 'rajab', 'name' => 'Rajab'],
        8 => ['slug' => 'shaban', 'name' => 'Shaban'],
        9 => ['slug' => 'ramadan', 'name' => 'Ramadan'],
        10 => ['slug' => 'shawwal', 'name' => 'Shawwal'],
        11 => ['slug' => 'dhu-al-qadah', 'name' => 'Dhu al-Qadah'],
        12 => ['slug' => 'dhu-al-hijjah', 'name' => 'Dhu al-Hijjah'],
    ];
    ?>
    <div class="months-nav">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allMonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('islamic-month', $m['slug'])); ?>" class="<?php echo e($content->slug === $m['slug'] ? 'active' : ''); ?>"><?php echo e($m['name']); ?></a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Significance of <?php echo e($content->month_name_en); ?></h2>
    </div>
    <div class="month-content-card">
        <h3>📖 About <?php echo e($content->month_name_en); ?> (<?php echo e($content->month_name_urdu); ?>)</h3>
        <p><?php echo e($content->significance_en); ?></p>
    </div>
</section>


<section class="section-container" id="calendar">
    <div class="title-wrapper">
        <h2 class="section-title"><?php echo e($content->month_name_en); ?> Calendar <?php echo e($hijriYear); ?></h2>
    </div>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
        <p style="color: #666; font-size: 1.05rem; margin: 0;">
            Below is the complete Hijri calendar specifically for <strong><?php echo e($content->month_name_en); ?> <?php echo e($hijriYear); ?></strong>.
        </p>
        <form method="GET" action="<?php echo e(route('islamic-month', $content->slug)); ?>#calendar" style="display: flex; gap: 10px; align-items: center; background: white; padding: 10px 15px; border-radius: 12px; border: 1px solid var(--border-light);">
            <label for="year" style="font-weight: 600; color: var(--primary); margin: 0;">Hijri Year:</label>
            <select name="year" id="year" onchange="this.form.submit()" style="padding: 6px 12px; border-radius: 8px; border: 1px solid #ccc; font-weight: 600; color: #333; outline: none; cursor: pointer;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($y = $hijriPK['year'] - 2; $y <= $hijriPK['year'] + 3; $y++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <option value="<?php echo e($y); ?>" <?php echo e($hijriYear == $y ? 'selected' : ''); ?>><?php echo e($y); ?> AH</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
        </form>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($hijriMonthGrid)): ?>
        <div style="max-width: 500px; margin: 0 auto;">
            <?php echo $__env->make('islamic-calendar.partials._month-grid', [
                'monthData' => $hijriMonthGrid,
                'monthName' => $content->month_name_en,
                'year' => $hijriYear,
                'yearEvents' => collect()
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php else: ?>
        <div style="text-align:center; padding:30px; background:#fff3cd; color:#856404; border-radius:12px; border: 1px solid #ffeeba;">
            <i class="fas fa-exclamation-triangle" style="font-size: 2rem; margin-bottom: 10px;"></i>
            <p><strong>Calendar data unavailable.</strong><br>We could not generate the calendar for this specific year.</p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>


<?php
    $importantDates = is_string($content->important_dates) ? json_decode($content->important_dates, true) : $content->important_dates;
?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($importantDates && count($importantDates) > 0): ?>
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Important Dates in <?php echo e($content->month_name_en); ?></h2>
    </div>
    <div class="important-dates-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $importantDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iDate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="date-item">
                <div class="date-num"><?php echo e($iDate['date'] ?? '—'); ?></div>
                <div class="date-event"><?php echo e($iDate['event'] ?? ''); ?></div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->recommended_ibadah): ?>
<section class="section-container">
    <div class="month-content-card" style="background: linear-gradient(135deg, #fdf6e3, #fefcf2); border-color: var(--gold);">
        <h3>🤲 Recommended Ibadah in <?php echo e($content->month_name_en); ?></h3>
        <p><?php echo e($content->recommended_ibadah); ?></p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->hadith_about_month): ?>
<section class="section-container">
    <div class="month-content-card">
        <h3>📜 Hadith About <?php echo e($content->month_name_en); ?></h3>
        <p style="font-style: italic; border-left: 4px solid var(--gold); padding-left: 20px;"><?php echo e($content->hadith_about_month); ?></p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->significance_urdu): ?>
<section class="section-container">
    <div class="month-content-card" style="direction: rtl; font-family: 'Amiri', serif;">
        <h3 style="font-family: 'Amiri', serif;"><?php echo e($content->month_name_urdu); ?> کی فضیلت</h3>
        <p style="line-height: 2.2; font-size: 1.05rem;"><?php echo e($content->significance_urdu); ?></p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Explore More Islamic Resources</h2>
    </div>
    <div class="internal-links" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-top: 20px;">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;"><i class="far fa-calendar-alt"></i></div>
            <div>Islamic Calendar</div>
        </a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;"><i class="fas fa-calendar-day"></i></div>
            <div>Date Today</div>
        </a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">🇵🇰</div>
            <div>Pakistan Calendar</div>
        </a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">🇸🇦</div>
            <div>Saudi Arabia</div>
        </a>
        <a href="<?php echo e(route('prayer-times.hub')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;"><i class="fas fa-mosque"></i></div>
            <div>Prayer Times</div>
        </a>

        <a href="<?php echo e(route('zakat.index')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;"><i class="fas fa-hand-holding-heart"></i></div>
            <div>Zakat Calculator</div>
        </a>
        <a href="<?php echo e(route('tools.qibla')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;"><i class="fas fa-kaaba"></i></div>
            <div>Qibla Direction</div>
        </a>
        <a href="<?php echo e(route('ramadan.timetable')); ?>" class="internal-link" style="display: flex; align-items: center; gap: 15px; padding: 18px; border-radius: 14px; background: white; border: 1px solid var(--border-light); text-decoration: none; color: var(--primary); font-weight: 700; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <div style="font-size: 1.8rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; border-radius: 10px;"><i class="fas fa-moon"></i></div>
            <div>Ramadan Timetable</div>
        </a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — <?php echo e($content->month_name_en); ?></h2>
    </div>
    <?php
    $faqs = [
        ['q' => "What is {$content->month_name_en} in Islam?", 'a' => "<strong>{$content->month_name_en}</strong> ({$content->month_name_urdu}) is the {$content->month_number}th month of the Islamic Hijri calendar. " . Str::limit($content->significance_en, 200)],
        ['q' => "What are the important dates in {$content->month_name_en}?", 'a' => ($importantDates ? "Important dates in {$content->month_name_en} include: " . collect($importantDates)->map(fn($d) => ($d['date'] ?? '') . ' - ' . ($d['event'] ?? ''))->implode(', ') . "." : "See the important dates section above for all significant events in {$content->month_name_en}.")],
        ['q' => "Is {$content->month_name_en} the current Islamic month?", 'a' => ($isCurrentMonth ? "Yes! {$content->month_name_en} is the current Islamic month. Today is {$hijriPK['formatted']}." : "No, the current Islamic month is {$hijriPK['month_name']}. {$content->month_name_en} is the {$content->month_number}th month of the Islamic year.")],
        ['q' => "When is {$content->month_name_en} {$hijriPK['year']}?", 'a' => "{$content->month_name_en} {$hijriPK['year']} AH falls in the Gregorian year " . now()->year . ". The exact dates depend on moon sighting. Check our <a href='" . route('islamic-calendar') . "'>Islamic Calendar</a> for precise dates."],
        ['q' => "What is the Urdu name of {$content->month_name_en}?", 'a' => "The Urdu name of {$content->month_name_en} is <strong>{$content->month_name_urdu}</strong>. In Arabic, it is written as <strong>{$content->month_name_arabic}</strong>."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2><?php echo e($content->month_name_en); ?> <?php echo e($hijriPK['year']); ?> — Complete Islamic Month Guide</h2>
        <p><strong><?php echo e($content->month_name_en); ?></strong> (<?php echo e($content->month_name_urdu); ?> / <?php echo e($content->month_name_arabic); ?>) is the <?php echo e($content->month_number); ?>th month of the Islamic Hijri calendar. This month holds special significance in Islam with unique events, recommended prayers, and historical importance. <?php echo e(Str::limit($content->significance_en, 250)); ?></p>

        <h3><?php echo e($content->month_name_en); ?> in the Islamic Calendar</h3>
        <p>The Islamic calendar year begins with Muharram and ends with Dhu al-Hijjah. <?php echo e($content->month_name_en); ?> is the <?php echo e($content->month_number); ?>th month, occurring after <?php echo e($content->month_number > 1 ? $allMonths[$content->month_number - 1]['name'] : 'Dhu al-Hijjah'); ?> and before <?php echo e($content->month_number < 12 ? $allMonths[$content->month_number + 1]['name'] : 'Muharram'); ?>. Each Islamic month has 29 or 30 days, determined by moon sighting.</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\islamic-calendar\month.blade.php ENDPATH**/ ?>