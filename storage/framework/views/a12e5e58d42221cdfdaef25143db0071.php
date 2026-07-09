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
        padding: 140px 20px 120px;
        text-align: center;
        color: var(--white);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .date-hero::before {
        content: ''; position: absolute; inset: 0; opacity: 0.04;
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
        font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700;
        margin-bottom: 16px; position: relative; z-index: 2; line-height: 1.1; letter-spacing: -.5px;
    }
    .date-hero-subtitle {
        font-size: 1.1rem; color: var(--gold-light); margin-bottom: 60px; position: relative; z-index: 2;
        max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.85; font-weight: 500;
    }
    .date-cards-wrapper {
        display: flex; justify-content: center; gap: 28px; flex-wrap: wrap;
        position: relative; z-index: 2; max-width: 1000px; margin: 0 auto;
    }
    .main-date-card {
        background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.15); border-radius: var(--radius-lg);
        padding: 44px 30px; width: 100%; max-width: 450px; text-align: center;
        transition: var(--tr); color: var(--white); position: relative; overflow: hidden;
    }
    .main-date-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    .main-date-card:hover {
        transform: translateY(-8px); border-color: rgba(201, 168, 76, 0.3);
        box-shadow: 0 24px 60px rgba(10, 31, 63, 0.3); background: rgba(255, 255, 255, 0.12);
    }
    .main-date-card:hover::before { transform: scaleX(1); }
    .card-flag { font-size: 2.5rem; margin-bottom: 12px; }
    .card-region { 
        font-size: .75rem; color: var(--gold-light); text-transform: uppercase; 
        letter-spacing: 1.5px; margin-bottom: 20px; font-weight: 700; 
    }
    .hijri-day-large { 
        font-size: 5rem; font-weight: 700; line-height: 1; margin-bottom: 8px; 
        font-family: 'Cormorant Garamond', serif; color: var(--white); 
    }
    .hijri-month-name { 
        font-size: 1.6rem; font-weight: 600; margin-bottom: 8px; 
        font-family: 'Cormorant Garamond', serif; color: var(--white); 
    }
    .hijri-urdu-arabic { 
        font-family: 'Scheherazade New', serif; font-size: 1.5rem; color: var(--gold-light); 
        margin-bottom: 20px; line-height: 1.5; 
    }
    .gregorian-date { 
        font-size: .9rem; opacity: 0.7; border-top: 1px solid rgba(255,255,255,0.1); 
        padding-top: 20px; margin-top: 20px; font-weight: 500; 
    }

    /* ===== CONTROLS BAR ===== */
    .controls-bar { 
        max-width: 600px; margin: -60px auto 80px; position: relative; z-index: 10; padding: 0 20px; 
    }
    .controls-bar form {
        background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px);
        border-radius: var(--radius-full); padding: 12px; box-shadow: var(--shadow-xl);
        border: 1px solid rgba(255,255,255,0.8);
    }
    .control-select {
        padding: 12px 24px; border: 1px solid var(--border); border-radius: var(--radius-full);
        background: var(--bg-main); color: var(--navy); font-weight: 600; font-size: .9rem;
        cursor: pointer; transition: var(--tr); font-family: 'Outfit', sans-serif; outline: none;
    }
    .control-select:hover, .control-select:focus { border-color: var(--navy); background: var(--white); }
    .print-btn {
        padding: 12px 28px; background: linear-gradient(145deg, var(--navy), var(--navy-mid));
        border: 1px solid transparent; color: var(--white); border-radius: var(--radius-full);
        font-weight: 600; cursor: pointer; transition: var(--tr); font-size: .9rem;
        font-family: 'Outfit', sans-serif; box-shadow: var(--shadow-md); display: inline-flex; align-items: center; gap: 8px;
    }
    .print-btn:hover { background: linear-gradient(145deg, var(--navy-mid), var(--navy-light)); transform: translateY(-2px); }

    /* ===== CONTAINERS & TITLES ===== */
    .section-container { max-width: 1140px; margin: 90px auto; padding: 0 20px; }
    .section-title {
        font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; color: var(--navy);
        text-align: center; margin-bottom: 0; display: inline-block; position: relative;
        font-weight: 600; letter-spacing: -.5px;
    }
    .section-title::after {
        content: ""; position: absolute; bottom: -14px; left: 50%; transform: translateX(-50%);
        width: 60px; height: 3px; background: var(--gold-gradient);
        border-radius: 2px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25);
    }
    .title-wrapper { text-align: center; margin-bottom: 60px; }
    .title-wrapper p { color: var(--text-medium); max-width: 600px; margin: 30px auto 0; line-height: 1.85; }

    /* ===== CALENDAR GRID ===== */
    .calendar-grid-wrapper {
        background: var(--white); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);
        overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 24px; transition: var(--tr);
    }
    .calendar-grid-wrapper:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); transform: translateY(-3px); }
    .calendar-grid-header {
        background: linear-gradient(150deg, var(--navy), var(--navy-mid)); color: var(--white);
        padding: 16px 24px; position: relative; overflow: hidden;
    }
    .calendar-grid-header::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: var(--gold-gradient); }
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
    .cal-today { background: linear-gradient(135deg, var(--gold), var(--gold-light)); border: 1px solid var(--gold-dark); box-shadow: 0 4px 15px rgba(201, 168, 76, 0.3); }
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

    /* ===== COUNTRIES GRID ===== */
    .countries-grid {
        display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px;
    }
    .country-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 20px 24px; display: flex; align-items: center; gap: 16px; text-align: left;
        transition: var(--tr); box-shadow: var(--shadow-xs); text-decoration: none; color: var(--text-dark);
        position: relative; overflow: hidden;
    }
    .country-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    .country-card:hover { 
        border-color: var(--navy-tint); transform: translateY(-4px); box-shadow: var(--shadow-md); 
    }
    .country-card:hover::before { transform: scaleX(1); }
    .country-flag { 
        font-size: 2rem; line-height: 1; background: var(--navy-tint); width: 52px; height: 52px;
        display: flex; align-items: center; justify-content: center; border-radius: 14px;
        border: 1px solid var(--border-light); flex-shrink: 0; transition: var(--tr);
    }
    .country-card:hover .country-flag { background: var(--navy); }
    .country-info { flex: 1; }
    .country-name { 
        font-family: 'Cormorant Garamond', serif; font-weight: 700; color: var(--navy); 
        font-size: 1.3rem; margin-bottom: 2px; transition: var(--tr-fast); 
    }
    .country-card:hover .country-name { color: var(--navy-mid); }
    .country-date { font-size: .85rem; font-weight: 600; color: var(--gold-dark); }
    .country-urdu {
        font-family: 'Scheherazade New', serif; color: var(--text-light); font-size: 1.4rem;
        margin-left: auto; text-align: right;
    }

    /* ===== COMPARISON TABLE ===== */
    .compare-table-wrapper {
        background: var(--white); border-radius: var(--radius-md); overflow: hidden;
        box-shadow: var(--shadow-md); border: 1px solid var(--border-light);
    }
    .compare-table {
        width: 100%; border-collapse: collapse;
    }
    .compare-table th { 
        background: linear-gradient(150deg, var(--navy), var(--navy-mid)); color: var(--white); 
        padding: 18px 24px; text-align: center; font-weight: 600; font-family: 'Outfit', sans-serif; 
        font-size: .9rem; text-transform: uppercase; letter-spacing: 1px;
    }
    .compare-table td { 
        padding: 16px 24px; border-bottom: 1px solid var(--border-light); text-align: center;
        color: var(--text-medium); font-weight: 500;
    }
    .compare-table tr:last-child td { border-bottom: none; }
    .compare-table tr:hover td { background: var(--gold-tint); color: var(--navy); }

    /* ===== INFO BOX ===== */
    .info-box {
        background: var(--gold-tint); border: 1px solid rgba(201, 168, 76, 0.15);
        border-left: 4px solid var(--gold); border-radius: var(--radius-md);
        padding: 30px; margin-top: 30px; box-shadow: var(--shadow-sm);
    }
    .info-box.white-bg {
        background: var(--white); border-left-color: var(--navy); border-color: var(--border-light);
    }
    .info-box h3 { color: var(--navy); font-family: 'Cormorant Garamond', serif; margin-bottom: 15px; font-size: 1.5rem; font-weight: 700; }
    .info-box p { color: var(--text-medium); line-height: 1.8; }

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
    .faq-item { background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md); margin-bottom: 16px; overflow: hidden; transition: var(--tr); box-shadow: var(--shadow-xs); }
    .faq-item:hover { box-shadow: var(--shadow-sm); border-color: var(--navy-tint); }
    .faq-question { padding: 22px 28px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; }
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
    .seo-content::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); border-radius: var(--radius-lg) var(--radius-lg) 0 0; }
    .seo-content h2, .seo-content h3 { color: var(--navy); margin-top: 30px; margin-bottom: 15px; font-family: 'Cormorant Garamond', serif; font-weight: 600; font-size: 1.8rem; }
    .seo-content p { margin-bottom: 20px; }
    .seo-content strong { color: var(--text-dark); }

    @media (max-width: 768px) {
        .date-hero { padding: 80px 20px 100px; }
        .date-hero-title { font-size: 2.4rem; }
        .section-title { font-size: 2rem; }
        .cal-cell { min-height: 55px; padding: 4px 2px; }
        .cal-greg { font-size: .85rem; }
        .cal-hijri { font-size: .65rem; }
        .cal-hijri-month { font-size: .55rem; }
        .controls-bar form { flex-direction: column; border-radius: var(--radius-md); }
        .control-select, .print-btn { width: 100%; justify-content: center; }
        .seo-content { padding: 30px; }
        .compare-table th, .compare-table td { padding: 12px 15px; font-size: .85rem; }
    }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Date Today in Saudi Arabia | التاريخ الهجري اليوم</h1>
    <p class="date-hero-subtitle">Saudi Arabia, UAE, Kuwait, Qatar, Bahrain & Arab Countries — Umm al-Qura Calendar</p>

    <?php echo $__env->make('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriSA, 'nowPK' => Carbon\Carbon::now('Asia/Karachi')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="controls-bar">
    <form method="GET" action="<?php echo e(route('islamic-date-saudi')); ?>" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center;">
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
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Saudi Arabia Islamic Calendar <?php echo e($year); ?> — Full 12 Months</h2>
        <p>Complete Hijri calendar for Saudi Arabia (Umm al-Qura). Each day shows both Gregorian and Hijri dates.</p>
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
    <div class="title-wrapper">
        <h2 class="section-title">Islamic Date Today — 8 Arab & Muslim Countries</h2>
        <p>Side-by-side Islamic Hijri date for Saudi Arabia, UAE, Kuwait, Qatar, Bahrain, Jordan, Egypt, Turkey</p>
    </div>

    <div class="countries-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $countriesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php 
                $slug = strtolower(str_replace(' ', '-', $name));
                $url = ($slug === 'saudi-arabia') ? route('islamic-date-saudi') : route('islamic-date-country', $slug);
            ?>
            <a href="<?php echo e($url); ?>" class="country-card">
                <div class="country-flag"><?php echo e($data['flag']); ?></div>
                <div class="country-info">
                    <div class="country-name"><?php echo e($name); ?></div>
                    <div class="country-date"><?php echo e($data['day']); ?> <?php echo e($data['month_name']); ?> <?php echo e($data['year']); ?></div>
                </div>
                <div class="country-urdu"><?php echo e($data['month_urdu']); ?></div>
            </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Saudi Arabia vs Pakistan — Islamic Date Comparison</h2>
    </div>

    <div class="compare-table-wrapper">
        <table class="compare-table">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>Islamic Date</th>
                    <th>Calendar Method</th>
                    <th>Hijri Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>🇸🇦 Saudi Arabia</strong></td>
                    <td><?php echo e($hijriSA['day']); ?> <?php echo e($hijriSA['month_name']); ?></td>
                    <td>Umm al-Qura (Calculated)</td>
                    <td><?php echo e($hijriSA['year']); ?> AH</td>
                </tr>
                <tr>
                    <td><strong>🇵🇰 Pakistan</strong></td>
                    <td><?php echo e($hijriPK['day']); ?> <?php echo e($hijriPK['month_name']); ?></td>
                    <td>Local Moon Sighting</td>
                    <td><?php echo e($hijriPK['year']); ?> AH</td>
                </tr>
                <tr>
                    <td><strong>🇦🇪 UAE</strong></td>
                    <td><?php echo e($hijriUAE['day']); ?> <?php echo e($hijriUAE['month_name']); ?></td>
                    <td>Follows Saudi/Calculated</td>
                    <td><?php echo e($hijriUAE['year']); ?> AH</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<section class="section-container">
    <div class="info-box">
        <h3>🕋 The Umm al-Qura Calendar — Saudi Arabia's Official Calendar</h3>
        <p>The <strong>Umm al-Qura calendar</strong> (Arabic: أم القرى) is the official Islamic calendar used in Saudi Arabia. It is based on astronomical calculations rather than physical moon sighting. The King Abdulaziz City for Science and Technology (KACST) in Riyadh prepares the calendar using precise astronomical data.</p>
        <p>Unlike Pakistan's traditional moon sighting method, the Umm al-Qura calendar can predict Islamic dates years in advance. This calendar determines the start of all Islamic months, including Ramadan, Shawwal, and Dhu al-Hijjah. Most Gulf countries (UAE, Kuwait, Qatar, Bahrain) also follow this calculated method.</p>
        <p>Today's Saudi Arabia Islamic date: <strong><?php echo e($hijriSA['formatted']); ?></strong></p>
    </div>
</section>


<section class="section-container">
    <div class="info-box white-bg">
        <h3>🌙 Makkah Moon Sighting Tradition</h3>
        <p>Historically, the new Islamic month begins when the crescent moon (hilal) is first sighted after sunset in Makkah al-Mukarramah. The Hilal Committee in Saudi Arabia was responsible for physical moon sighting before the Umm al-Qura astronomical method became standard.</p>
        <p>The <strong>Islamic date today in Saudi Arabia</strong> is considered the "base date" by many Muslim-majority countries. Countries in the Gulf Cooperation Council (GCC) — UAE, Kuwait, Qatar, Bahrain, and Oman — generally follow Saudi Arabia's Islamic dates. However, some countries like Pakistan, Bangladesh, and India maintain their own independent moon sighting committees.</p>
    </div>
</section>


<section class="section-container">
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Islamic Calendar</a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Islamic Date Today</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan Date</a>
        <a href="<?php echo e(route('islamic-date-urdu')); ?>" class="internal-link">🔤 Urdu Date</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Date Saudi Arabia</h2>
    </div>
    <?php
    $faqs = [
        ['q' => 'What is Islamic date today in Saudi Arabia?', 'a' => "<strong>Islamic date today in Saudi Arabia</strong> is <strong>{$hijriSA['formatted']}</strong>. Saudi Arabia follows the Umm al-Qura calculated calendar."],
        ['q' => 'Islamic date today in UAE?', 'a' => "Islamic date today in UAE is <strong>{$hijriUAE['formatted']}</strong>. UAE generally follows the same calendar as Saudi Arabia."],
        ['q' => 'Why is Saudi Arabia Islamic date different from Pakistan?', 'a' => "Saudi Arabia uses the <strong>Umm al-Qura calculated calendar</strong>, while Pakistan follows local physical moon sighting. This often causes a 1-day difference."],
        ['q' => 'What is Umm al-Qura calendar?', 'a' => "The Umm al-Qura calendar is Saudi Arabia's official Islamic calendar based on astronomical calculations by KACST. It can predict Islamic dates years in advance."],
        ['q' => 'Today Islamic date in Saudi Arabia ' . date('Y') . '?', 'a' => "Today Islamic date in Saudi Arabia " . date('Y') . " is <strong>{$hijriSA['formatted']}</strong>. This is the official date per the Umm al-Qura calendar."],
        ['q' => 'Do all Arab countries have the same Islamic date?', 'a' => "Most Gulf countries (UAE, Kuwait, Qatar, Bahrain) follow Saudi Arabia's Islamic date. However, countries like Egypt, Jordan, and Turkey may have 1-day differences depending on their own moon sighting or calculation methods."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Date Today in Saudi Arabia — Umm al-Qura Calendar Guide</h2>
        <p><strong>Islamic date today in Saudi Arabia</strong> is <strong><?php echo e($hijriSA['formatted']); ?></strong>. Saudi Arabia is home to Islam's two holiest cities — Makkah al-Mukarramah and Madinah al-Munawwarah — making its Islamic calendar particularly important for the global Muslim community. The <strong>Saudi Arabia Islamic date today</strong> is determined by the Umm al-Qura calendar, the kingdom's official Hijri calendar.</p>

        <h3>Islamic Date Today in UAE, Kuwait, Qatar</h3>
        <p>The <strong>Islamic date today in UAE</strong> is <?php echo e($hijriUAE['formatted']); ?>. The United Arab Emirates, along with Kuwait, Qatar, and Bahrain, generally follows Saudi Arabia's Islamic dates. These Gulf states use either the Saudi calendar or their own astronomical calculation methods that closely align with the Umm al-Qura system.</p>

        <h3>Saudi vs Pakistan Islamic Date Difference</h3>
        <p>The difference between <strong>Saudi Arabia Islamic date</strong> and <strong>Pakistan Islamic date</strong> is typically 0-1 days. Saudi Arabia (<?php echo e($hijriSA['formatted']); ?>) vs Pakistan (<?php echo e($hijriPK['formatted']); ?>). Saudi Arabia often declares the new month 1 day earlier because the Umm al-Qura calculation method is more predictive, while Pakistan's Ruet-e-Hilal Committee relies on visual confirmation of the crescent moon.</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/islamic-calendar/saudi.blade.php ENDPATH**/ ?>