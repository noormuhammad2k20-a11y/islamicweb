

<?php $__env->startSection('title', $seoMeta->title ?? 'Namaz Timing Pakistan — Prayer Times All Cities'); ?>
<?php $__env->startSection('meta_description', $seoMeta->description ?? ''); ?>

<?php $__env->startSection('og_meta'); ?>
<meta property="og:title" content="<?php echo e($seoMeta->title ?? 'Prayer Times Pakistan'); ?>">
<meta property="og:description" content="<?php echo e($seoMeta->description ?? ''); ?>">
<meta property="og:url" content="<?php echo e(route('prayer-times.hub')); ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e($seoMeta->title ?? 'Prayer Times Pakistan'); ?>">
<meta name="twitter:description" content="<?php echo e($seoMeta->description ?? ''); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* ======= PRAYER HUB PREMIUM STYLES ======= */
    .prayer-hub-hero {
        background: linear-gradient(160deg, var(--primary-dark, #052116) 0%, var(--primary, #0A3A2A) 50%, #125740 100%);
        padding: 56px 0 48px;
        position: relative;
        overflow: hidden;
    }
    .prayer-hub-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0.04;
        background-image:
            radial-gradient(circle at 25% 25%, var(--gold, #D4AF37) 1px, transparent 1px),
            radial-gradient(circle at 75% 75%, #fff 1px, transparent 1px);
        background-size: 50px 50px;
    }
    .prayer-hub-hero .hero-glow {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }
    .prayer-hub-hero .hero-glow-1 {
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(212,175,55,0.1), transparent 70%);
        top: -120px; right: -60px;
    }
    .prayer-hub-hero .hero-glow-2 {
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(10,58,42,0.15), transparent 70%);
        bottom: -80px; left: -50px;
    }
    .hub-hero-inner {
        max-width: 1080px;
        margin: 0 auto;
        padding: 0 28px;
        position: relative;
        z-index: 2;
        text-align: center;
        color: white;
    }
    .hub-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255,255,255,0.09);
        backdrop-filter: blur(8px);
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 18px;
        border: 1px solid rgba(255,255,255,0.12);
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    .hub-hero-badge i { color: var(--gold-light, #F3E5AB); }
    .hub-hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 800;
        line-height: 1.15;
        margin-bottom: 10px;
    }
    .hub-hero-title span { color: var(--gold-light, #F3E5AB); }
    .hub-hero-subtitle {
        font-size: 1rem;
        color: rgba(255,255,255,0.75);
        max-width: 620px;
        margin: 0 auto 24px;
        line-height: 1.7;
    }
    .hub-hero-stats {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
    }
    .hub-stat-item {
        text-align: center;
    }
    .hub-stat-item h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--gold-light, #F3E5AB);
        margin: 0;
    }
    .hub-stat-item p {
        font-size: 0.72rem;
        color: rgba(255,255,255,0.55);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 2px 0 0;
    }
    .hub-hijri-bar {
        margin-top: 18px;
        padding: 8px 20px;
        background: rgba(255,255,255,0.08);
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 0.85rem;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .hub-hijri-bar i { color: var(--gold-light, #F3E5AB); font-size: 0.8rem; }
    .hub-hijri-bar .hijri-text { font-family: 'Amiri', serif; color: var(--gold-light, #F3E5AB); }

    /* Province Sections */
    .hub-container {
        max-width: 1080px;
        margin: 0 auto;
        padding: 0 28px;
    }
    .hub-section {
        padding: 40px 0 20px;
    }
    .province-section {
        margin-bottom: 28px;
    }
    .province-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 14px;
        padding-bottom: 8px;
        border-bottom: 1px solid rgba(10,58,42,0.06);
    }
    .province-header i {
        color: var(--gold, #D4AF37);
        font-size: 1rem;
    }
    .province-header h2 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
        margin: 0;
    }
    .province-header .city-count {
        font-size: 0.7rem;
        color: var(--text-light, #73877D);
        background: var(--primary-subtle, rgba(10,58,42,0.07));
        padding: 2px 10px;
        border-radius: 20px;
        font-weight: 600;
    }
    .cities-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }
    @media (min-width: 576px) {
        .cities-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (min-width: 768px) {
        .cities-grid { grid-template-columns: repeat(4, 1fr); }
    }
    @media (min-width: 992px) {
        .cities-grid { grid-template-columns: repeat(5, 1fr); }
    }
    .city-link-card {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 12px;
        background: #ffffff;
        border-radius: 8px;
        color: var(--text-dark, #334155);
        font-size: 0.78rem;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid rgba(10,58,42,0.05);
        transition: all 0.2s ease;
    }
    .city-link-card:hover {
        border-color: var(--primary, #0A3A2A);
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        color: var(--primary, #0A3A2A);
    }
    .city-link-card i {
        color: var(--primary, #0A3A2A);
        font-size: 0.7rem;
        opacity: 0.5;
        transition: opacity 0.2s;
    }
    .city-link-card:hover i { opacity: 1; }
    .city-link-card .urdu-name {
        font-family: 'Amiri', serif;
        font-size: 0.7rem;
        color: var(--text-light, #73877D);
        margin-left: auto;
    }

    /* SEO Content Block */
    .seo-content-block {
        background: #ffffff;
        border-radius: 12px;
        padding: 28px;
        border: 1px solid rgba(10,58,42,0.05);
        margin-top: 16px;
    }
    .seo-content-block h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-dark, #111A16);
        margin: 0 0 14px;
    }
    .seo-content-block p {
        font-size: 0.88rem;
        color: var(--text-medium, #3B4D45);
        line-height: 1.8;
        margin-bottom: 12px;
    }
    .seo-content-block p:last-child { margin-bottom: 0; }

    /* FAQ */
    .faq-item {
        background: #ffffff;
        border: 1px solid rgba(10,58,42,0.05);
        border-radius: 10px;
        margin-bottom: 8px;
        overflow: hidden;
    }
    .faq-question {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        cursor: pointer;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--text-dark, #111A16);
        transition: background 0.2s;
    }
    .faq-question:hover { background: rgba(10,58,42,0.02); }
    .faq-question i {
        color: var(--gold, #D4AF37);
        font-size: 0.75rem;
        transition: transform 0.3s;
    }
    .faq-item.active .faq-question i { transform: rotate(180deg); }
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        padding: 0 18px;
    }
    .faq-item.active .faq-answer {
        max-height: 200px;
        padding: 0 18px 14px;
    }
    .faq-answer p {
        font-size: 0.82rem;
        color: var(--text-medium, #3B4D45);
        line-height: 1.7;
        margin: 0;
    }
</style>


<section class="prayer-hub-hero">
    <div class="hero-glow hero-glow-1"></div>
    <div class="hero-glow hero-glow-2"></div>
    <div class="hub-hero-inner">
        <div class="hub-hero-badge">
            <i class="fas fa-mosque"></i> Namaz Timing Pakistan
        </div>
        <h1 class="hub-hero-title">
            Prayer <span>Times</span> — All Cities Pakistan
        </h1>
        <p class="hub-hero-subtitle">
            Accurate daily Salat timings for <?php echo e($cities->count()); ?>+ cities across Pakistan.
            Fajr, Zuhr, Asr, Maghrib, Isha — with monthly timetable, Qibla direction, and Sunnah times.
        </p>
        <div class="hub-hero-stats">
            <div class="hub-stat-item">
                <h3><?php echo e($cities->count()); ?>+</h3>
                <p>Cities</p>
            </div>
            <div class="hub-stat-item">
                <h3>6</h3>
                <p>Daily Prayers</p>
            </div>
            <div class="hub-stat-item">
                <h3>5</h3>
                <p>Nawafil Timings</p>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hijriDate): ?>
        <div class="hub-hijri-bar">
            <i class="fas fa-moon"></i>
            <span><?php echo e(date('l, d F Y')); ?></span>
            <span style="opacity:0.3">|</span>
            <span class="hijri-text"><?php echo e($hijriDate->hijri_day); ?> <?php echo e($hijriDate->hijri_month); ?> <?php echo e($hijriDate->hijri_year); ?> AH</span>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>


<section class="hub-section" style="background: #F8FAFC; padding-bottom: 40px;">
    <div class="hub-container">

        
        <nav aria-label="breadcrumb" style="margin-bottom: 20px; padding-top: 20px;">
            <div style="display: inline-flex; align-items: center; gap: 8px; font-size: 0.78rem; font-weight: 600;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;">Home</a>
                <i class="fas fa-chevron-right" style="font-size: 0.55rem; color: #94A3B8;"></i>
                <span style="color: #64748B;">Prayer Times</span>
            </div>
        </nav>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $citiesByProvince; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province => $provinceCities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="province-section">
            <div class="province-header">
                <i class="fas fa-map-marker-alt"></i>
                <h2><?php echo e($province); ?></h2>
                <span class="city-count"><?php echo e($provinceCities->count()); ?> cities</span>
            </div>
            <div class="cities-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $provinceCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('prayer-times.city', $cityItem->slug)); ?>" class="city-link-card">
                    <i class="fas fa-mosque"></i>
                    <span><?php echo e($cityItem->name); ?></span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cityItem->name_ur): ?>
                    <span class="urdu-name"><?php echo e($cityItem->name_ur); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cities->count() == 0): ?>
        <div style="text-align: center; padding: 60px 0;">
            <i class="fas fa-mosque" style="font-size: 3rem; color: var(--primary-subtle); margin-bottom: 16px;"></i>
            <p style="color: #666;">No cities found. Please check back later.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="seo-content-block">
            <h2>Namaz Timing Pakistan — Complete Prayer Times Guide</h2>
            <p>
                Welcome to the most comprehensive prayer times page for Pakistan. We provide accurate namaz timing for
                <strong><?php echo e($cities->count()); ?>+ cities</strong> across all provinces including Punjab, Sindh, KPK, Balochistan,
                Azad Kashmir, and Gilgit-Baltistan. Our prayer times are calculated using the
                <strong>University of Islamic Sciences, Karachi</strong> method which is the official calculation method for Pakistan.
            </p>
            <p>
                آج کے نماز کے اوقات پاکستان کے تمام شہروں کے لیے — فجر، ظہر، عصر، مغرب، عشاء کے مکمل اوقات۔
                ماہانہ ٹائم ٹیبل، قبلہ سمت، اور سنت نمازوں کے اوقات بھی دیکھیں۔
            </p>
            <p>
                Each city page includes today's Fajr time, Maghrib time, Azan time, complete monthly prayer timetable,
                Qibla direction, Sunnah prayer times (Ishraq, Chaasht, Tahajjud, Zawal), and a live countdown
                timer to the next prayer. Select your city above to view prayer times.
            </p>
        </div>

        
        <div class="seo-content-block" style="margin-top: 16px;">
            <h2>Frequently Asked Questions — اکثر پوچھے گئے سوالات</h2>

            <div class="faq-item active" id="faq-hub-1">
                <div class="faq-question" onclick="toggleFaq('faq-hub-1')">
                    <span>How are prayer times calculated in Pakistan?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Prayer times in Pakistan are calculated using the University of Islamic Sciences, Karachi method.
                    This uses Fajr at 18° and Isha at 18°. The Hanafi madhab is used by default for Asr timing,
                    where Asr begins when the shadow of an object is twice its length plus the shadow at noon.</p>
                </div>
            </div>

            <div class="faq-item" id="faq-hub-2">
                <div class="faq-question" onclick="toggleFaq('faq-hub-2')">
                    <span>What is the difference between Hanafi and Shafi Asr time?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>In the Hanafi madhab, Asr starts when the shadow of an object is twice its length.
                    In the Shafi madhab, Asr starts when the shadow equals the object's length.
                    This means Shafi Asr time is earlier than Hanafi.</p>
                </div>
            </div>

            <div class="faq-item" id="faq-hub-3">
                <div class="faq-question" onclick="toggleFaq('faq-hub-3')">
                    <span>Do prayer times change daily?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes, prayer times change daily based on the sun's position. The variation is very small
                    day-to-day but becomes noticeable over weeks and months. Summer days have earlier Fajr and later
                    Isha times, while winter is the opposite.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
function toggleFaq(id) {
    var el = document.getElementById(id);
    if (el) el.classList.toggle('active');
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\prayer-times\hub.blade.php ENDPATH**/ ?>