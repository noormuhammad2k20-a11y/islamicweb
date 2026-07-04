<?php $__env->startSection('title', $seoMeta->title ?? 'Prayer Times in ' . $city->name); ?>
<?php $__env->startSection('meta_description', $seoMeta->description ?? ''); ?>
<?php $__env->startSection('meta_keywords', "namaz timing {$city->name}, prayer time {$city->name}, fajr time {$city->name}, azan time {$city->name}, namaz waqt {$city->name}, {$city->name} prayer times today, {$city->name} namaz schedule, maghrib time {$city->name}, isha time {$city->name}, zohar namaz time {$city->name}, asr time {$city->name}, namaz timing {$city->name} hanafi"); ?>
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
    /* ======= PREMIUM PRAYER PAGE — BENTO DESIGN ======= */
    :root {
        --bento-radius: 12px;
        --bento-padding: 20px;
        --shadow-soft: 0 2px 8px rgba(0,0,0,0.03);
        --shadow-hover: 0 4px 14px rgba(0,0,0,0.06);
        --border-light: #F1F5F9;
        --glass-bg: rgba(255,255,255,0.15);
        --glass-border: rgba(255,255,255,0.2);
    }

    .prayer-page-bg {
        background: #F8FAFC;
        min-height: 100vh;
        padding: 0 0 50px;
        font-family: 'Poppins', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    .prayer-container {
        width: 100%;
        max-width: 1080px;
        margin: 0 auto;
        padding: 0 28px;
    }

    /* Breadcrumb */
    .p-breadcrumb {
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
    .p-breadcrumb li { display: flex; align-items: center; }
    .p-breadcrumb li:not(:last-child)::after {
        content: '\f105';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-left: 6px;
        color: #94A3B8;
        font-size: 0.6rem;
    }
    .p-breadcrumb a { color: var(--primary, #0A3A2A); text-decoration: none; transition: color 0.2s; }
    .p-breadcrumb a:hover { color: var(--primary-dark, #052116); }
    .p-breadcrumb .current { color: #64748B; }

    /* Page Header */
    .page-h1 {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--text-dark, #111A16);
        letter-spacing: -0.3px;
        margin: 0 0 4px 0;
        line-height: 1.2;
    }
    .page-sub {
        font-size: 0.82rem;
        color: #64748B;
        font-weight: 500;
        margin: 0 0 16px;
    }

    /* Bento Card */
    .b-card {
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
    .b-card:hover { box-shadow: var(--shadow-hover); }
    .b-card-header {
        display: flex;
        align-items: center;
        margin-bottom: 14px;
    }
    .b-card-header i {
        background: rgba(10,58,42,0.07);
        color: var(--primary, #0A3A2A);
        width: 30px; height: 30px;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.85rem;
        margin-right: 10px;
    }
    .b-card-header h2, .b-card-header h3 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
        margin: 0;
    }
    .b-card-header .urdu-sub {
        font-family: 'Amiri', serif;
        font-size: 0.82rem;
        color: var(--gold-dark, #996515);
        margin-left: auto;
    }

    /* ======= SECTION 1: HERO COUNTDOWN BANNER ======= */
    .hero-banner {
        background: linear-gradient(135deg, var(--primary-dark, #052116) 0%, var(--primary, #0A3A2A) 55%, #125740 100%);
        color: white;
        padding: 24px 28px;
        border: none;
        position: relative;
    }
    .hero-banner::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -8%;
        width: 320px; height: 320px;
        background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
    .hero-banner-content {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: relative;
        z-index: 2;
    }
    @media (min-width: 768px) {
        .hero-banner-content {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
    }
    .hero-tag {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.68rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }
    .hero-date-line {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.9);
        font-weight: 600;
        margin: 0;
    }
    .next-label {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        color: rgba(255,255,255,0.8);
        margin: 0 0 4px;
    }
    .countdown-big {
        font-size: 2.2rem;
        font-weight: 800;
        font-variant-numeric: tabular-nums;
        color: var(--gold-light, #F3E5AB);
        line-height: 1;
        letter-spacing: -0.5px;
    }

    /* Prayer Timeline Strip */
    .prayer-timeline {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 5px;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 10px;
        padding: 5px;
        margin-top: 16px;
        position: relative;
        z-index: 2;
    }
    @media (min-width: 576px) {
        .prayer-timeline { grid-template-columns: repeat(6, 1fr); }
    }
    .tl-item {
        text-align: center;
        padding: 8px 4px;
        border-radius: 7px;
        transition: background 0.2s;
    }
    .tl-item.tl-active {
        background: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    }
    .tl-item .tl-name {
        font-size: 0.65rem;
        font-weight: 700;
        color: rgba(255,255,255,0.85);
        text-transform: uppercase;
        margin-bottom: 2px;
        letter-spacing: 0.3px;
    }
    .tl-item .tl-time {
        font-size: 0.85rem;
        font-weight: 700;
        color: #ffffff;
    }
    .tl-item.tl-active .tl-name { color: var(--primary, #0A3A2A); }
    .tl-item.tl-active .tl-time { color: var(--primary-dark, #052116); }
    .tl-item.tl-dimmed { opacity: 0.6; }

    /* ======= SECTION 2: HIJRI + GREGORIAN DATE BAR ======= */
    .date-bar {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
        padding: 14px 20px;
    }
    .date-bar i { color: var(--gold, #D4AF37); }
    .date-bar .greg-date {
        font-weight: 600;
        font-size: 0.88rem;
        color: var(--text-dark, #111A16);
    }
    .date-bar .hijri-date-text {
        font-family: 'Amiri', serif;
        font-size: 0.95rem;
        color: var(--gold-dark, #996515);
    }
    .date-bar .hijri-urdu {
        font-family: 'Amiri', serif;
        font-size: 0.88rem;
        color: var(--text-light, #73877D);
    }

    /* ======= SECTION 3: CITY SELECTOR + SETTINGS ======= */
    .settings-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }
    @media (min-width: 768px) {
        .settings-grid { grid-template-columns: 2fr 1fr 1fr; }
    }
    .setting-group label {
        display: block;
        font-size: 0.7rem;
        font-weight: 700;
        color: #64748B;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }
    .setting-group select {
        width: 100%;
        padding: 9px 12px;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--text-dark, #111A16);
        background: #F8FAFC;
        appearance: auto;
        cursor: pointer;
        transition: border-color 0.2s;
    }
    .setting-group select:focus {
        outline: none;
        border-color: var(--primary, #0A3A2A);
    }

    /* ======= SECTION 4: PRAYER TIMES TABLE ======= */
    .prayer-row {
        display: flex;
        align-items: center;
        padding: 12px 14px;
        border-radius: 8px;
        margin-bottom: 4px;
        transition: background 0.15s;
        border: 1px solid transparent;
    }
    .prayer-row:hover { background: #F8FAFC; }
    .prayer-row.pr-active {
        background: rgba(10,58,42,0.04);
        border-color: rgba(10,58,42,0.1);
    }
    .prayer-row .pr-icon {
        font-size: 1.1rem;
        width: 36px;
        text-align: center;
        flex-shrink: 0;
    }
    .prayer-row .pr-names {
        flex: 1;
        min-width: 0;
    }
    .prayer-row .pr-en {
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
    }
    .prayer-row .pr-ur {
        font-family: 'Amiri', serif;
        font-size: 0.8rem;
        color: var(--text-light, #73877D);
    }
    .prayer-row .pr-time-12 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary, #0A3A2A);
        text-align: right;
        min-width: 80px;
    }
    .prayer-row .pr-time-24 {
        font-size: 0.75rem;
        font-weight: 500;
        color: #94A3B8;
        text-align: right;
        min-width: 50px;
        margin-left: 10px;
    }
    .prayer-row.pr-active .pr-time-12 { color: var(--gold-dark, #996515); }

    /* ======= SECTION 5: SUNNAH TIMES ======= */
    .sunnah-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
    @media (min-width: 768px) {
        .sunnah-grid { grid-template-columns: repeat(5, 1fr); }
    }
    .sunnah-card {
        background: #F8FAFC;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        padding: 12px;
        text-align: center;
    }
    .sunnah-card i {
        color: var(--gold, #D4AF37);
        font-size: 1rem;
        margin-bottom: 6px;
    }
    .sunnah-card .s-title {
        font-size: 0.65rem;
        font-weight: 700;
        color: #64748B;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-bottom: 2px;
    }
    .sunnah-card .s-urdu {
        font-family: 'Amiri', serif;
        font-size: 0.72rem;
        color: var(--text-light, #73877D);
        margin-bottom: 4px;
    }
    .sunnah-card .s-time {
        font-size: 0.82rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
    }
    .sunnah-card .s-desc {
        font-size: 0.65rem;
        color: #94A3B8;
        margin-top: 3px;
    }

    /* ======= SECTION 6: QIBLA COMPASS ======= */
    .qibla-content {
        display: flex;
        align-items: center;
        gap: 28px;
        flex-wrap: wrap;
    }
    @media (max-width: 576px) {
        .qibla-content { justify-content: center; }
    }
    .qibla-compass {
        width: 120px; height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #F8FAFC, #EEF2FF);
        border: 3px solid var(--border-light);
        position: relative;
        flex-shrink: 0;
    }
    .compass-n {
        position: absolute;
        top: 6px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.6rem;
        font-weight: 800;
        color: var(--primary, #0A3A2A);
    }
    .compass-needle {
        position: absolute;
        top: 50%; left: 50%;
        width: 3px; height: 45px;
        background: linear-gradient(to top, var(--gold, #D4AF37), var(--gold-dark, #996515));
        border-radius: 2px;
        transform-origin: bottom center;
        transform: translate(-50%, -100%);
        transition: transform 0.5s ease;
    }
    .compass-dot {
        position: absolute;
        top: 50%; left: 50%;
        width: 10px; height: 10px;
        background: var(--gold, #D4AF37);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 0 8px rgba(212,175,55,0.4);
    }
    .qibla-info h3 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
        margin: 0 0 4px;
    }
    .qibla-info .q-degree {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--gold-dark, #996515);
        line-height: 1;
    }
    .qibla-info .q-direction {
        font-size: 0.82rem;
        color: var(--text-medium, #3B4D45);
        margin-top: 4px;
    }

    /* ======= SECTION 7: MONTHLY TIMETABLE ======= */
    .tt-list { display: flex; flex-direction: column; gap: 4px; }
    .tt-row {
        display: grid;
        grid-template-columns: 1.6fr repeat(6, 1fr);
        background: #fff;
        border: 1px solid var(--border-light);
        border-radius: 6px;
        padding: 8px 12px;
        align-items: center;
        font-size: 0.72rem;
        color: #334155;
        transition: background 0.15s;
    }
    .tt-row:hover { background: #FAFBFC; }
    .tt-row.tt-header {
        background: transparent;
        color: #64748B;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.6rem;
        border: none;
        padding: 4px 12px;
        letter-spacing: 0.3px;
    }
    .tt-row.tt-today {
        background: rgba(212,175,55,0.04);
        border-color: rgba(212,175,55,0.2);
    }
    .tt-col { text-align: center; font-weight: 500; }
    .tt-col:first-child { text-align: left; font-weight: 600; color: var(--text-dark, #111A16); }
    .tt-row.tt-today .tt-col { font-weight: 600; color: var(--text-dark, #111A16); }
    .tt-today-badge {
        background: var(--gold, #D4AF37);
        color: #fff;
        font-size: 0.5rem;
        padding: 2px 5px;
        border-radius: 4px;
        margin-left: 6px;
        font-weight: 700;
        text-transform: uppercase;
        vertical-align: middle;
    }
    @media (max-width: 768px) {
        .tt-row.tt-header { display: none; }
        .tt-row {
            grid-template-columns: 1fr;
            gap: 3px;
            padding: 10px 14px;
        }
        .tt-col {
            display: flex;
            justify-content: space-between;
            text-align: right;
            padding: 2px 0;
        }
        .tt-col::before {
            content: attr(data-label);
            font-weight: 600;
            color: #64748B;
            text-align: left;
            font-size: 0.65rem;
            text-transform: uppercase;
        }
        .tt-col:first-child {
            justify-content: center;
            border-bottom: 1px solid var(--border-light);
            padding-bottom: 6px;
            margin-bottom: 3px;
        }
        .tt-col:first-child::before { display: none; }
    }

    /* ======= SECTION 8: CITIES GRID ======= */
    .cities-internal-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }
    @media (min-width: 576px) { .cities-internal-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (min-width: 768px) { .cities-internal-grid { grid-template-columns: repeat(4, 1fr); } }
    @media (min-width: 992px) { .cities-internal-grid { grid-template-columns: repeat(5, 1fr); } }
    .city-link {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 10px;
        background: #F8FAFC;
        border-radius: 6px;
        color: #334155;
        font-size: 0.72rem;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid var(--border-light);
        transition: all 0.2s;
    }
    .city-link:hover {
        border-color: var(--primary, #0A3A2A);
        color: var(--primary, #0A3A2A);
        box-shadow: var(--shadow-soft);
    }
    .city-link.cl-active {
        background: rgba(10,58,42,0.06);
        border-color: var(--primary, #0A3A2A);
        color: var(--primary, #0A3A2A);
    }
    .city-link i { font-size: 0.6rem; color: #94A3B8; }
    .city-link:hover i { color: var(--primary, #0A3A2A); }

    /* ======= SECTION 9: FAQ ======= */
    .faq-card {
        border: 1px solid var(--border-light);
        border-radius: 8px;
        margin-bottom: 6px;
        overflow: hidden;
        background: #fff;
    }
    .faq-q {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 16px;
        cursor: pointer;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-dark, #111A16);
        transition: background 0.2s;
    }
    .faq-q:hover { background: #FAFBFC; }
    .faq-q i { color: var(--gold, #D4AF37); font-size: 0.7rem; transition: transform 0.3s; }
    .faq-card.faq-open .faq-q i { transform: rotate(180deg); }
    .faq-a {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease, padding 0.2s;
        padding: 0 16px;
    }
    .faq-card.faq-open .faq-a {
        max-height: 300px;
        padding: 0 16px 14px;
    }
    .faq-a p {
        font-size: 0.8rem;
        color: var(--text-medium, #3B4D45);
        line-height: 1.75;
        margin: 0;
    }

    /* ======= SECTION 10: SEO CONTENT ======= */
    .seo-block h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
        margin: 0 0 12px;
    }
    .seo-block p {
        font-size: 0.85rem;
        color: var(--text-medium, #3B4D45);
        line-height: 1.85;
        margin-bottom: 10px;
    }
    .seo-block p:last-child { margin-bottom: 0; }

    /* ======= Layout Helpers ======= */
    .layout-2col {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    @media (min-width: 768px) {
        .layout-2col { flex-direction: row; align-items: stretch; }
        .layout-2col > .col-side { width: 38%; }
        .layout-2col > .col-main { width: calc(62% - 16px); }
    }
    .mb-16 { margin-bottom: 16px; }

    /* Jamaat row */
    .jamaat-row {
        display: flex;
        align-items: center;
        padding: 10px 14px;
        border-radius: 8px;
        background: rgba(212,175,55,0.04);
        border: 1px dashed rgba(212,175,55,0.25);
        margin-top: 4px;
    }
    .jamaat-row .pr-icon { font-size: 0.9rem; width: 36px; text-align: center; }
    .jamaat-row .pr-names { flex: 1; }
    .jamaat-row .pr-en { font-size: 0.78rem; font-weight: 600; color: var(--gold-dark, #996515); }
    .jamaat-row .pr-ur { font-family: 'Amiri', serif; font-size: 0.72rem; color: #94A3B8; }
    .jamaat-row .pr-time-12 { font-size: 0.82rem; font-weight: 700; color: var(--gold-dark, #996515); text-align: right; min-width: 80px; }
    .jamaat-row .pr-time-24 { font-size: 0.7rem; color: #94A3B8; text-align: right; min-width: 50px; margin-left: 10px; }

    /* Tomorrow Fajr Card */
    .tomorrow-card {
        background: linear-gradient(135deg, #0F2027, #203A43, #0A3A2A);
        color: white;
        border-radius: var(--bento-radius);
        padding: 20px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 16px;
        border: 1px solid rgba(255,255,255,0.08);
    }
    .tomorrow-card .tc-label {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(255,255,255,0.65);
        font-weight: 700;
    }
    .tomorrow-card .tc-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-top: 4px;
    }
    .tomorrow-card .tc-time {
        font-size: 2rem;
        font-weight: 800;
        color: var(--gold-light, #F3E5AB);
    }

    /* Download Button */
    .download-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: var(--primary, #0A3A2A);
        color: #fff;
        border-radius: 8px;
        font-size: 0.72rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s, transform 0.1s;
    }
    .download-btn:hover { background: var(--primary-dark, #052116); transform: translateY(-1px); }
    .download-btn i { font-size: 0.7rem; }
</style>

<section class="prayer-page-bg">
    <div class="prayer-container" style="padding-top: 24px;">

        
        <div style="margin-bottom: 16px;">
            <nav aria-label="breadcrumb">
                <ul class="p-breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('prayer-times.hub')); ?>">Prayer Times</a></li>
                    <li><span class="current"><?php echo e($city->name); ?></span></li>
                </ul>
            </nav>
            <h1 class="page-h1">Namaz Timing <?php echo e($city->name); ?> Today | Prayer Times <?php echo e($city->name); ?> | اوقاتِ نماز <?php echo e($city->name); ?></h1>
            <p class="page-sub"><?php echo e(date('d M Y')); ?> — آج کے نماز کے اوقات <?php echo e($city->name); ?> — Aaj ke namaz ke awqat <?php echo e($city->name); ?></p>
        </div>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
        <div class="b-card hero-banner mb-16">
            <div class="hero-banner-content">
                <div>
                    <div class="hero-tag"><i class="fas fa-mosque" style="margin-right:4px;"></i> Today's Prayers</div>
                    <p class="hero-date-line">
                        <?php echo e(date('l, d M Y')); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hijriDate): ?>
                        &bull; <span style="font-family:'Amiri',serif; color: var(--gold-light, #F3E5AB);"><?php echo e($hijriDate->hijri_day); ?> <?php echo e($hijriDate->hijri_month); ?> <?php echo e($hijriDate->hijri_year); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                </div>
                <div style="text-align: right;">
                    <p class="next-label" id="nextPrayerLabel">Time until <?php echo e($nextPrayer); ?></p>
                    <div class="countdown-big" id="liveCountdown">--:--:--</div>
                </div>
            </div>

            
            <div class="prayer-timeline">
                <?php
                    $tlPrayers = [
                        ['name' => 'Fajr', 'time' => $todayPrayer->fajr],
                        ['name' => 'Sunrise', 'time' => $todayPrayer->sunrise],
                        ['name' => 'Dhuhr', 'time' => $todayPrayer->dhuhr],
                        ['name' => 'Asr', 'time' => $todayPrayer->asr],
                        ['name' => 'Maghrib', 'time' => $todayPrayer->maghrib],
                        ['name' => 'Isha', 'time' => $todayPrayer->isha],
                    ];
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tlPrayers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tlP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="tl-item <?php echo e($nextPrayer == $tlP['name'] ? 'tl-active' : ''); ?> <?php echo e($tlP['name'] == 'Sunrise' ? 'tl-dimmed' : ''); ?>">
                    <div class="tl-name"><?php echo e($tlP['name']); ?></div>
                    <div class="tl-time"><?php echo e(\Carbon\Carbon::parse($tlP['time'])->format('h:i A')); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <div class="b-card mb-16">
            <div class="date-bar">
                <i class="fas fa-calendar-alt"></i>
                <span class="greg-date"><?php echo e(date('l, d F Y')); ?></span>
                <span style="color: #CBD5E1;">|</span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hijriDate): ?>
                <span class="hijri-date-text"><?php echo e($hijriDate->hijri_day); ?> <?php echo e($hijriDate->hijri_month); ?> <?php echo e($hijriDate->hijri_year); ?> AH</span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hijriUrduMonth): ?>
                <span class="hijri-urdu">(<?php echo e($hijriUrduMonth); ?>)</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php else: ?>
                <span class="hijri-date-text">Hijri Date</span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>


        
        <div class="b-card mb-16">
            <div class="b-card-header">
                <i class="fas fa-cog"></i>
                <h2>Select City / شہر منتخب کریں</h2>
            </div>
            <form id="prayerSettingsForm" method="GET" action="<?php echo e(route('prayer-times.city', $city->slug)); ?>">
                <div class="settings-grid">
                    <div class="setting-group">
                        <label>City / شہر</label>
                        <select name="city" onchange="window.location.href='/prayer-times/' + this.value">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($allCities)): ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <option value="<?php echo e($c->slug); ?>" <?php echo e($city->id == $c->id ? 'selected' : ''); ?>>
                                <?php echo e($c->name); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($c->name_ur): ?> — <?php echo e($c->name_ur); ?><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                    </div>
                    <div class="setting-group">
                        <label>Madhab / مسلک</label>
                        <select name="madhab" disabled title="Coming soon">
                            <option value="hanafi" selected>Hanafi (حنفی)</option>
                            <option value="shafi">Shafi (شافعی)</option>
                        </select>
                    </div>
                    <div class="setting-group">
                        <label>Calculation Method</label>
                        <select name="method" disabled title="Coming soon">
                            <option value="Karachi" selected>Karachi (Islamic Sciences)</option>
                            <option value="Muslim World League">Muslim World League</option>
                            <option value="Egyptian">Egyptian General Authority</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
        <div class="b-card mb-16">
            <div class="b-card-header">
                <i class="fas fa-mosque"></i>
                <h2>Namaz Time Today <?php echo e($city->name); ?> — آج کی نماز</h2>
                <span class="urdu-sub">اوقات نماز</span>
            </div>
            <p style="font-size: 0.8rem; color: #64748B; margin: -8px 0 14px 40px;">
                Fajr time <?php echo e($city->name); ?>, Zuhr, Asr, Maghrib, Isha aur Sunrise timings — azan time <?php echo e($city->name); ?>.
            </p>

            <?php
                $prayerList = [
                    ['name'=>'Fajr','urdu'=>'فجر','icon'=>'🌙','time'=>$todayPrayer->fajr,'key'=>'Fajr'],
                    ['name'=>'Sunrise','urdu'=>'طلوعِ آفتاب','icon'=>'🌅','time'=>$todayPrayer->sunrise,'key'=>'Sunrise'],
                    ['name'=>'Dhuhr / Zuhr','urdu'=>'ظہر','icon'=>'☀️','time'=>$todayPrayer->dhuhr,'key'=>'Dhuhr'],
                    ['name'=>'Asr','urdu'=>'عصر','icon'=>'🌤️','time'=>$todayPrayer->asr,'key'=>'Asr'],
                    ['name'=>'Maghrib','urdu'=>'مغرب','icon'=>'🌇','time'=>$todayPrayer->maghrib,'key'=>'Maghrib'],
                    ['name'=>'Isha','urdu'=>'عشاء','icon'=>'🌌','time'=>$todayPrayer->isha,'key'=>'Isha'],
                ];
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $prayerList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prayer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="prayer-row <?php echo e($nextPrayer == $prayer['key'] ? 'pr-active' : ''); ?>">
                <span class="pr-icon"><?php echo e($prayer['icon']); ?></span>
                <div class="pr-names">
                    <div class="pr-en"><?php echo e($prayer['name']); ?></div>
                    <div class="pr-ur"><?php echo e($prayer['urdu']); ?></div>
                </div>
                <span class="pr-time-12"><?php echo e(\Carbon\Carbon::parse($prayer['time'])->format('h:i A')); ?></span>
                <span class="pr-time-24"><?php echo e(\Carbon\Carbon::parse($prayer['time'])->format('H:i')); ?></span>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($jamaatTimes)): ?>
            <div style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed rgba(212,175,55,0.2);">
                <p style="font-size: 0.65rem; font-weight: 700; color: #64748B; text-transform: uppercase; letter-spacing: 0.5px; margin: 0 0 6px 36px;">Estimated Jamaat Times — جماعت کے اوقات</p>
                <?php
                    $jamaatList = [
                        ['name' => 'Fajr Jamaat', 'urdu' => 'فجر جماعت', 'time' => $jamaatTimes->fajr],
                        ['name' => 'Dhuhr Jamaat', 'urdu' => 'ظہر جماعت', 'time' => $jamaatTimes->dhuhr],
                        ['name' => 'Asr Jamaat', 'urdu' => 'عصر جماعت', 'time' => $jamaatTimes->asr],
                        ['name' => 'Maghrib Jamaat', 'urdu' => 'مغرب جماعت', 'time' => $jamaatTimes->maghrib],
                        ['name' => 'Isha Jamaat', 'urdu' => 'عشاء جماعت', 'time' => $jamaatTimes->isha],
                    ];
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $jamaatList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="jamaat-row">
                    <span class="pr-icon">🕌</span>
                    <div class="pr-names">
                        <div class="pr-en"><?php echo e($j['name']); ?></div>
                        <div class="pr-ur"><?php echo e($j['urdu']); ?></div>
                    </div>
                    <span class="pr-time-12"><?php echo e($j['time']); ?></span>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <p style="font-size: 0.6rem; color: #94A3B8; margin: 6px 0 0 36px;">* Estimated times. Actual jamaat timing varies by masjid — fajr jamaat timing <?php echo e($city->name); ?> masjid se confirm karein.</p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <div class="layout-2col mb-16">

            
            <div class="col-main">
                <div class="b-card" style="height:100%; margin-bottom:0;">
                    <div class="b-card-header">
                        <i class="fas fa-sun" style="background:rgba(212,175,55,0.08); color:var(--gold, #D4AF37);"></i>
                        
                        <h3>Sunnah & Nafl Prayer Times <?php echo e($city->name); ?></h3>
                        <span class="urdu-sub">سنت اور نوافل</span>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($sunnahTimes): ?>
                    <div class="sunnah-grid">
                        <div class="sunnah-card">
                            <i class="fas fa-moon"></i>
                            <div class="s-title">Tahajjud</div>
                            <div class="s-urdu">تہجد</div>
                            <div class="s-time"><?php echo e($sunnahTimes->midnight); ?></div>
                            <div class="s-desc">Midnight</div>
                        </div>
                        <div class="sunnah-card">
                            <i class="fas fa-star-and-crescent"></i>
                            <div class="s-title">Last Third</div>
                            <div class="s-urdu">آخری تہائی رات</div>
                            <div class="s-time"><?php echo e($sunnahTimes->last_third); ?></div>
                            <div class="s-desc">Best Tahajjud</div>
                        </div>
                        <div class="sunnah-card">
                            <i class="fas fa-sun"></i>
                            <div class="s-title">Ishraq</div>
                            <div class="s-urdu">اشراق</div>
                            <div class="s-time"><?php echo e($sunnahTimes->ishraq); ?></div>
                            <div class="s-desc">~20min after Sunrise</div>
                        </div>
                        <div class="sunnah-card">
                            <i class="fas fa-cloud-sun"></i>
                            <div class="s-title">Chaasht</div>
                            <div class="s-urdu">چاشت</div>
                            <div class="s-time"><?php echo e($sunnahTimes->chaasht); ?></div>
                            <div class="s-desc">Mid-morning</div>
                        </div>
                        <div class="sunnah-card">
                            <i class="fas fa-exclamation-circle"></i>
                            <div class="s-title">Zawal</div>
                            <div class="s-urdu">زوال</div>
                            <div class="s-time"><?php echo e($sunnahTimes->zawal); ?></div>
                            <div class="s-desc">Before Dhuhr</div>
                        </div>
                    </div>
                    <?php else: ?>
                    <p style="color:#64748B; font-size:0.85rem;">Sunnah times not available.</p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            
            <div class="col-side">
                <div class="b-card" style="height:100%; margin-bottom:0;">
                    <div class="b-card-header">
                        <i class="fas fa-compass" style="background:rgba(212,175,55,0.08); color:var(--gold, #D4AF37);"></i>
                        <h3>Qibla Direction</h3>
                    </div>
                    <div class="qibla-content" style="justify-content:center; text-align:center; flex-direction:column; align-items:center;">
                        <div class="qibla-compass">
                            <span class="compass-n">N</span>
                            <div class="compass-needle" style="transform: translate(-50%, -100%) rotate(<?php echo e(($qiblaDegree ?? 260) - 0); ?>deg);"></div>
                            <div class="compass-dot"></div>
                        </div>
                        <div class="qibla-info" style="text-align:center; margin-top:12px;">
                            <div class="q-degree"><?php echo e(number_format($qiblaDegree ?? 0, 2)); ?>°</div>
                            <div class="q-direction">
                                Face <strong><?php echo e($qiblaDirectionText ?? 'West-Northwest'); ?></strong> from <?php echo e($city->name); ?>

                            </div>
                            <div style="font-family:'Amiri',serif; color:var(--gold-dark); font-size:0.82rem; margin-top:4px;">
                                قبلہ سمت — <?php echo e(number_format($qiblaDegree ?? 0, 2)); ?>° شمال سے
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        <div class="b-card mb-16" id="monthlyTimetable">
            <div class="b-card-header">
                <i class="fas fa-calendar-alt"></i>
                <h2>Monthly Prayer Timetable <?php echo e($city->name); ?> — ماہانہ نماز شیڈول</h2>
                <div style="margin-left: auto;">
                    <button class="download-btn" onclick="downloadTimetable()">
                        <i class="fas fa-download"></i> Download
                    </button>
                </div>
            </div>
            <p style="font-size: 0.78rem; color: #64748B; margin: -8px 0 14px 40px;">
                Complete namaz timing schedule for <?php echo e($city->name); ?> for <?php echo e(date('F Y')); ?>.
            </p>
            <div class="tt-list">
                
                <div class="tt-row tt-header">
                    <div class="tt-col" data-label="Date">Date / تاریخ</div>
                    <div class="tt-col" data-label="Fajr">Fajr / فجر</div>
                    <div class="tt-col" data-label="Sunrise">Sunrise / طلوع</div>
                    <div class="tt-col" data-label="Dhuhr">Dhuhr / ظہر</div>
                    <div class="tt-col" data-label="Asr">Asr / عصر</div>
                    <div class="tt-col" data-label="Maghrib">Maghrib / مغرب</div>
                    <div class="tt-col" data-label="Isha">Isha / عشاء</div>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $prayerTimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php $isToday = $pt->date == date('Y-m-d'); ?>
                <div class="tt-row <?php echo e($isToday ? 'tt-today' : ''); ?>">
                    <div class="tt-col" data-label="Date">
                        <?php echo e(\Carbon\Carbon::parse($pt->date)->format('d M, l')); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isToday): ?> <span class="tt-today-badge">Today</span> <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div class="tt-col" data-label="Fajr"><?php echo e(\Carbon\Carbon::parse($pt->fajr)->format('h:i A')); ?></div>
                    <div class="tt-col" data-label="Sunrise" style="color:#94A3B8;"><?php echo e(\Carbon\Carbon::parse($pt->sunrise)->format('h:i A')); ?></div>
                    <div class="tt-col" data-label="Dhuhr"><?php echo e(\Carbon\Carbon::parse($pt->dhuhr)->format('h:i A')); ?></div>
                    <div class="tt-col" data-label="Asr"><?php echo e(\Carbon\Carbon::parse($pt->asr)->format('h:i A')); ?></div>
                    <div class="tt-col" data-label="Maghrib" style="color: <?php echo e($isToday ? 'var(--primary-dark)' : 'var(--primary, #0A3A2A)'); ?>;">
                        <?php echo e(\Carbon\Carbon::parse($pt->maghrib)->format('h:i A')); ?>

                    </div>
                    <div class="tt-col" data-label="Isha"><?php echo e(\Carbon\Carbon::parse($pt->isha)->format('h:i A')); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($allCities) && $allCities->count() > 0): ?>
        <div class="b-card mb-16">
            <div class="b-card-header">
                <i class="fas fa-globe-asia"></i>
                <h2>Prayer Times All Cities Pakistan</h2>
                <span class="urdu-sub">پاکستان کے تمام شہروں کے اوقاتِ نماز</span>
            </div>
            <div class="cities-internal-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('prayer-times.city', $c->slug)); ?>"
                   class="city-link <?php echo e($city->id == $c->id ? 'cl-active' : ''); ?>">
                    <i class="fas fa-mosque"></i>
                    <span><?php echo e($c->name); ?></span>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <div class="b-card mb-16">
            <div class="b-card-header">
                <i class="fas fa-question-circle"></i>
                <h2>Frequently Asked Questions</h2>
                <span class="urdu-sub">اکثر پوچھے گئے سوالات</span>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
            
            <div class="faq-card faq-open" id="faq1">
                <div class="faq-q" onclick="toggleFaq('faq1')">
                    <span>Fajr time <?php echo e($city->name); ?> today?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Fajr time <?php echo e($city->name); ?> today <?php echo e(date('d M Y')); ?> is
                        <strong><?php echo e($fajrFormatted); ?></strong>.
                        Fajar namaz time in <?php echo e($city->name); ?> starts at <?php echo e($fajrFormatted); ?> and
                        ends at sunrise <?php echo e($sunriseFormatted); ?>. Fajr end time <?php echo e($city->name); ?>

                        today is <?php echo e($sunriseFormatted); ?>.
                    </p>
                </div>
            </div>

            
            <div class="faq-card" id="faq2">
                <div class="faq-q" onclick="toggleFaq('faq2')">
                    <span>Namaz timing in <?php echo e($city->name); ?> today?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Namaz timing <?php echo e($city->name); ?> today <?php echo e(date('d M Y')); ?>:
                        Fajr <?php echo e($fajrFormatted); ?>, Sunrise <?php echo e($sunriseFormatted); ?>,
                        Zuhr/Dhuhr <?php echo e($dhuhrFormatted); ?>, Asr <?php echo e($asrFormatted); ?>,
                        Maghrib <?php echo e($maghribFormatted); ?>, Isha <?php echo e($ishaFormatted); ?>.
                        Ye timings Hanafi method ke mutabiq hain.
                    </p>
                </div>
            </div>

            
            <div class="faq-card" id="faq3">
                <div class="faq-q" onclick="toggleFaq('faq3')">
                    <span>Azan time in <?php echo e($city->name); ?> today?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Azan time <?php echo e($city->name); ?> today: Fajr azan <?php echo e($fajrFormatted); ?>,
                        Zohar azan <?php echo e($dhuhrFormatted); ?>, Asr azan <?php echo e($asrFormatted); ?>,
                        Maghrib azan <?php echo e($maghribFormatted); ?>, Isha azan <?php echo e($ishaFormatted); ?>.
                    </p>
                </div>
            </div>

            
            <div class="faq-card" id="faq4">
                <div class="faq-q" onclick="toggleFaq('faq4')">
                    <span>Maghrib time <?php echo e($city->name); ?> today?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Maghrib time <?php echo e($city->name); ?> today <?php echo e(date('d M Y')); ?> is <strong><?php echo e($maghribFormatted); ?></strong>.
                        Maghrib azan time <?php echo e($city->name); ?> is same as Maghrib prayer time.
                        Maghrib namaz time today changes daily.
                    </p>
                </div>
            </div>

            
            <div class="faq-card" id="faq5">
                <div class="faq-q" onclick="toggleFaq('faq5')">
                    <span>Namaz timing <?php echo e($city->name); ?> Hanafi?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Namaz timing <?php echo e($city->name); ?> Hanafi method (University of Islamic Sciences Karachi):
                        Fajr <?php echo e($fajrFormatted); ?>, Dhuhr <?php echo e($dhuhrFormatted); ?>,
                        Asr <?php echo e($asrFormatted); ?> (Hanafi shadow = 2x),
                        Maghrib <?php echo e($maghribFormatted); ?>, Isha <?php echo e($ishaFormatted); ?>.
                        Namaz timing <?php echo e($city->name); ?> Ahle Sunnat bhi same Hanafi method hai.
                    </p>
                </div>
            </div>

            
            <div class="faq-card" id="faq6">
                <div class="faq-q" onclick="toggleFaq('faq6')">
                    <span>Fajar ka time kya hai?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Fajar ka time aaj <?php echo e($city->name); ?> mein <?php echo e($fajrFormatted); ?> hai.
                        Fajar ki namaz ka time subah sadiq se shuru hota hai
                        aur sunrise tak rehta hai. Aaj fajr end time <?php echo e($sunriseFormatted); ?> hai.
                    </p>
                </div>
            </div>

            
            <div class="faq-card" id="faq7">
                <div class="faq-q" onclick="toggleFaq('faq7')">
                    <span>Jumma time in <?php echo e($city->name); ?>?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-a">
                    <p>
                        Jumma time in <?php echo e($city->name); ?> is at Zuhr time which today is <?php echo e($dhuhrFormatted); ?>.
                        Juma ki namaz Zuhr ke waqt mein ada hoti hai.
                        Most mosques in <?php echo e($city->name); ?> hold Jummah between 1:00 PM and 2:30 PM.
                    </p>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
        <div class="b-card seo-block mb-16">
            <h2>Namaz Timing <?php echo e($city->name); ?> — Complete Prayer Times Guide</h2>
            <p>
                <strong>Namaz timing <?php echo e($city->name); ?></strong> today
                <strong><?php echo e(date('d F Y')); ?></strong><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hijriDate): ?> (<?php echo e($hijriDate->hijri_day); ?> <?php echo e($hijriDate->hijri_month); ?> <?php echo e($hijriDate->hijri_year); ?> Hijri)<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>.
                Aaj <?php echo e($city->name); ?> mein <strong>fajr time <?php echo e($city->name); ?></strong>
                <?php echo e($fajrFormatted); ?> hai. <strong>Fajr namaz time</strong>
                Pakistan mein Karachi method se calculate hoti hai.
                <strong>Fajr ka time</strong> ya <strong>fajar ki namaz ka time</strong>
                roz thoda badalta hai — ye page daily auto-update hota hai.
            </p>

            <h3 style="font-size:0.95rem; font-weight:700; color:var(--text-dark); margin:14px 0 6px;">Azan Time <?php echo e($city->name); ?> — اذان کا وقت</h3>
            <p>
                <strong>Azan time <?php echo e($city->name); ?></strong> —
                <strong>Zohar namaz time</strong> <?php echo e($dhuhrFormatted); ?>,
                <strong>Asr time <?php echo e($city->name); ?></strong> <?php echo e($asrFormatted); ?>,
                <strong>Maghrib time <?php echo e($city->name); ?></strong> <?php echo e($maghribFormatted); ?>,
                <strong>Isha namaz time</strong> <?php echo e($ishaFormatted); ?>.
                Ye <strong>namaz time today</strong> ke liye complete schedule hai.
            </p>

            <h3 style="font-size:0.95rem; font-weight:700; color:var(--text-dark); margin:14px 0 6px;">Fajr Time <?php echo e($city->name); ?> Today — فجر کا وقت</h3>
            <p>
                <strong>Namaz timing <?php echo e($city->name); ?> Hanafi</strong> aur
                <strong>namaz timing <?php echo e($city->name); ?> ahle sunnat</strong> ke liye
                Karachi method use hoti hai. Asr time Hanafi aur Shafi mein
                farq hota hai — upar selector se change kar saktay hain.
                <strong>Fajr end time <?php echo e($city->name); ?></strong>
                (آخری وقتِ فجر) sunrise par hota hai jo aaj
                <?php echo e($sunriseFormatted); ?> hai.
            </p>

            <h3 style="font-size:0.95rem; font-weight:700; color:var(--text-dark); margin:14px 0 6px;">Zuhr / Zohar Namaz Time <?php echo e($city->name); ?></h3>
            <p>
                <strong>Jumma time in <?php echo e($city->name); ?></strong> — Jummah prayer
                Zuhr time ke baad hoti hai. <?php echo e($city->name); ?> mein Jumma ki namaz
                generally 1:00 PM – 2:30 PM ke darmiyan hoti hai.
                <strong>Fajr qaza time <?php echo e($city->name); ?></strong> — Fajr ki qaza
                Zuhr se pehle ada kar saktay hain.
            </p>

            <h3 style="font-size:0.95rem; font-weight:700; color:var(--text-dark); margin:14px 0 6px;">Fajr Jamaat Timing & Pakistan Fajr Time</h3>
            <p>
                <strong>Fajr jamaat timing <?php echo e($city->name); ?></strong>
                masjid se puchein kyunki har masjid ki jamaat alag hoti hai.
                <strong>Pakistan fajr time</strong> —
                Pakistan mein sab se pehle fajr Chitral aur Gilgit mein
                hoti hai aur sab se baad mein Gwadar aur Karachi mein.
                <strong>Shia fajr time <?php echo e($city->name); ?></strong> bhi is page par
                available hai — Shia calculation method alag hoti hai.
                Upar "Calculation Method" dropdown se change kar saktay hain.
            </p>

            <p style="font-family:'Amiri',serif; font-size:0.92rem; color:var(--gold-dark); line-height:2;">
                آج <?php echo e($city->name); ?> میں نماز کے اوقات — فجر <?php echo e($fajrFormatted); ?>،
                ظہر <?php echo e($dhuhrFormatted); ?>،
                عصر <?php echo e($asrFormatted); ?>،
                مغرب <?php echo e($maghribFormatted); ?>،
                عشاء <?php echo e($ishaFormatted); ?>۔
                یہ اوقات جامعہ العلوم الاسلامیہ کراچی کے طریقے سے حساب کیے گئے ہیں۔
            </p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($tomorrowFajr)): ?>
        <div class="tomorrow-card">
            <div>
                <div class="tc-label"><i class="fas fa-moon" style="margin-right:6px;"></i> Tomorrow's Fajr Time <?php echo e($city->name); ?></div>
                <div class="tc-title">Fajr time in <?php echo e($city->name); ?> tomorrow — کل فجر کا وقت</div>
            </div>
            <div class="tc-time"><?php echo e($tomorrowFajr); ?></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


        
        <div class="layout-2col mb-16">
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($nearbyCities) && $nearbyCities->count() > 0): ?>
            <div class="col-main">
                <div class="b-card" style="height:100%; margin-bottom:0;">
                    <div class="b-card-header">
                        <i class="fas fa-map"></i>
                        <h3>Nearby Cities</h3>
                    </div>
                    <div style="display:grid; grid-template-columns: repeat(2,1fr); gap:8px;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nearbyCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nearby): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('prayer-times.city', $nearby->slug)); ?>" class="city-link">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo e($nearby->name); ?></span>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div class="col-side">
                <div class="b-card" style="height:100%; margin-bottom:0;">
                    <div class="b-card-header">
                        <i class="fas fa-toolbox"></i>
                        <h3>Islamic Tools</h3>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <a href="<?php echo e(route('zakat.index')); ?>" class="city-link" style="border-color:var(--border-light);">
                            <i class="fas fa-calculator"></i>
                            <span>Zakat Calculator</span>
                        </a>
                        <a href="<?php echo e(route('duas.index')); ?>" class="city-link" style="border-color:var(--border-light);">
                            <i class="fas fa-praying-hands"></i>
                            <span>Daily Duas</span>
                        </a>
                        <a href="<?php echo e(route('names.index')); ?>" class="city-link" style="border-color:var(--border-light);">
                            <i class="fas fa-book"></i>
                            <span>99 Names of Allah</span>
                        </a>
                        <a href="<?php echo e(route('prayer-times.hub')); ?>" class="city-link" style="border-color:var(--border-light);">
                            <i class="fas fa-globe"></i>
                            <span>All Cities</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($todayPrayer): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Prayer times data from server
    var prayerTimes = [
        { name: "Fajr", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->fajr)->format('H:i:s')); ?>" },
        { name: "Sunrise", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->sunrise)->format('H:i:s')); ?>" },
        { name: "Dhuhr", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->dhuhr)->format('H:i:s')); ?>" },
        { name: "Asr", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->asr)->format('H:i:s')); ?>" },
        { name: "Maghrib", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->maghrib)->format('H:i:s')); ?>" },
        { name: "Isha", time: "<?php echo e(\Carbon\Carbon::parse($todayPrayer->isha)->format('H:i:s')); ?>" }
    ];

    function getSeconds(t) {
        var p = t.split(':');
        return parseInt(p[0]) * 3600 + parseInt(p[1]) * 60 + parseInt(p[2]);
    }

    function updateCountdown() {
        var now = new Date();
        var cs = now.getHours() * 3600 + now.getMinutes() * 60 + now.getSeconds();
        var next = null, diff = 0;

        for (var i = 0; i < prayerTimes.length; i++) {
            var pts = getSeconds(prayerTimes[i].time);
            if (pts > cs) {
                next = prayerTimes[i];
                diff = pts - cs;
                break;
            }
        }

        if (!next) {
            next = prayerTimes[0];
            diff = (24 * 3600 - cs) + getSeconds(next.time);
        }

        var h = Math.floor(diff / 3600);
        var m = Math.floor((diff % 3600) / 60);
        var s = diff % 60;

        var countdownEl = document.getElementById('liveCountdown');
        if (countdownEl) {
            countdownEl.textContent =
                String(h).padStart(2,'0') + ':' +
                String(m).padStart(2,'0') + ':' +
                String(s).padStart(2,'0');
        }

        var labelEl = document.getElementById('nextPrayerLabel');
        if (labelEl) {
            labelEl.textContent = 'Time until ' + next.name;
        }
    }

    setInterval(updateCountdown, 1000);
    updateCountdown();

    // Highlight active prayer card in timeline
    function highlightActive() {
        var cards = document.querySelectorAll('.tl-item');
        cards.forEach(function(c) { c.classList.remove('tl-active'); });

        var now = new Date();
        var cs = now.getHours() * 3600 + now.getMinutes() * 60 + now.getSeconds();
        var activeIdx = -1;

        for (var i = prayerTimes.length - 1; i >= 0; i--) {
            if (cs >= getSeconds(prayerTimes[i].time)) {
                activeIdx = i;
                break;
            }
        }

        // Find next prayer index
        var nextIdx = -1;
        for (var i = 0; i < prayerTimes.length; i++) {
            if (getSeconds(prayerTimes[i].time) > cs) {
                nextIdx = i;
                break;
            }
        }
        if (nextIdx === -1) nextIdx = 0;

        if (nextIdx >= 0 && nextIdx < cards.length) {
            cards[nextIdx].classList.add('tl-active');
        }
    }

    highlightActive();
    setInterval(highlightActive, 60000);
});

// FAQ Toggle
function toggleFaq(id) {
    var el = document.getElementById(id);
    if (el) el.classList.toggle('faq-open');
}

// Download Timetable as Image (Part D — html2canvas)
function downloadTimetable() {
    var el = document.getElementById('monthlyTimetable');
    if (!el) return alert('Timetable not found');

    // Check if html2canvas is loaded
    if (typeof html2canvas === 'undefined') {
        // Load it dynamically
        var script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';
        script.onload = function() { captureAndDownload(el); };
        document.head.appendChild(script);
    } else {
        captureAndDownload(el);
    }
}

function captureAndDownload(el) {
    html2canvas(el, {
        scale: 2,
        backgroundColor: '#ffffff',
        useCORS: true
    }).then(function(canvas) {
        var link = document.createElement('a');
        link.download = 'namaz-time-table-<?php echo e($city->slug); ?>-<?php echo e(date("Y-m")); ?>.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    }).catch(function(err) {
        console.error('Download failed:', err);
        alert('Download failed. Please try again.');
    });
}
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/prayer-times/city.blade.php ENDPATH**/ ?>