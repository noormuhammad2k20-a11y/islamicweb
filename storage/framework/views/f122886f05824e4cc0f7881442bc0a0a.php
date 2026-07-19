

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

    /* City-specific styles */
    .city-info-card {
        background: white; border: 1px solid var(--border-light); border-radius: 20px; padding: 35px; margin-bottom: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    .city-info-card h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; font-size: 1.3rem; }
    .city-info-card p { color: #555; line-height: 1.8; }
    .mosque-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 15px; }
    .mosque-item {
        background: rgba(10,58,42,0.04); padding: 12px 18px; border-radius: 12px; font-weight: 600; color: var(--primary); display: flex; align-items: center; gap: 8px;
    }

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
    @media (max-width: 768px) { .date-hero-title { font-size: 1.6rem; } .hijri-day-large { font-size: 3rem; } }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Date Today in <?php echo e($cityName); ?> | آج کی اسلامی تاریخ <?php echo e($cityName); ?></h1>
    <p class="date-hero-subtitle">Exact Hijri Date — <?php echo e($cityName); ?>, Pakistan — <?php echo e($hijri['formatted']); ?></p>

    <?php echo $__env->make('islamic-calendar.partials._date-card', ['hijriPK' => $hijri, 'hijriSA' => $hijri, 'nowPK' => $nowPK], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cityContent && $cityContent->islamic_history): ?>
<section class="section-container">
    <div class="city-info-card">
        <h3>🏛️ Islamic History of <?php echo e($cityName); ?></h3>
        <p><?php echo e($cityContent->islamic_history); ?></p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cityContent && $cityContent->famous_mosques): ?>
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Famous Mosques in <?php echo e($cityName); ?></h2>
    </div>
    <div class="mosque-list">
        <?php 
            $mosques = is_string($cityContent->famous_mosques) ? json_decode($cityContent->famous_mosques, true) : $cityContent->famous_mosques;
            if (!is_array($mosques)) $mosques = [];
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mosques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mosque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="mosque-item">🕌 <?php echo e($mosque); ?></div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cityContent && $cityContent->local_events): ?>
<section class="section-container">
    <div class="city-info-card">
        <h3>📅 Local Islamic Events in <?php echo e($cityName); ?></h3>
        <p><?php echo e($cityContent->local_events); ?></p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-container">
    <div class="city-info-card" style="background: linear-gradient(135deg, #fdf6e3, #fefcf2); border-color: var(--gold);">
        <h3>🕐 Prayer Times in <?php echo e($cityName); ?></h3>
        <p>Check today's prayer times (Namaz timings) for <?php echo e($cityName); ?> including Fajr, Dhuhr, Asr, Maghrib, and Isha.</p>
        <?php $prayerSlug = strtolower(str_replace(' ', '-', $cityName)); ?>
        <a href="<?php echo e(url("/prayer-times/{$prayerSlug}")); ?>" style="display: inline-block; margin-top: 10px; padding: 10px 25px; background: var(--primary); color: white; border-radius: 12px; text-decoration: none; font-weight: 700; transition: all 0.3s;">View Prayer Times <?php echo e($cityName); ?> →</a>
    </div>
</section>


<section class="section-container">
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Islamic Calendar</a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Date Today</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi</a>
        <a href="<?php echo e(route('islamic-date-city', 'karachi')); ?>" class="internal-link">🏙️ Karachi</a>
        <a href="<?php echo e(route('islamic-date-city', 'lahore')); ?>" class="internal-link">🏙️ Lahore</a>
        <a href="<?php echo e(route('islamic-date-city', 'islamabad')); ?>" class="internal-link">🏙️ Islamabad</a>
        <a href="<?php echo e(route('islamic-date-city', 'rawalpindi')); ?>" class="internal-link">🏙️ Rawalpindi</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Date <?php echo e($cityName); ?></h2>
    </div>
    <?php
    $faqs = [
        ['q' => "What is Islamic date today in {$cityName}?", 'a' => "<strong>Islamic date today in {$cityName}</strong> is <strong>{$hijri['formatted']}</strong> ({$nowPK->format('d F Y')}). {$cityName} follows Pakistan's official Hijri calendar."],
        ['q' => "Today Islamic date in {$cityName}?", 'a' => "Today Islamic date in {$cityName} is <strong>{$hijri['day']} {$hijri['month_name']} {$hijri['year']}</strong> AH. This is the same for all cities in Pakistan."],
        ['q' => "Is {$cityName} Islamic date same as all Pakistan?", 'a' => "Yes, {$cityName} and all other Pakistani cities observe the same Islamic date as determined by the Central Ruet-e-Hilal Committee. Today: {$hijri['formatted']}."],
        ['q' => "Prayer times in {$cityName} today?", 'a' => "For today's prayer times in {$cityName}, visit our <a href='" . url("/prayer-times/" . strtolower(str_replace(' ', '-', $cityName))) . "'>Prayer Times {$cityName}</a> page."],
        ['q' => "Islamic date today {$cityName} vs Saudi Arabia?", 'a' => "{$cityName} Islamic date ({$hijri['formatted']}) may differ from Saudi Arabia by 1 day because Pakistan uses local moon sighting while Saudi uses the Umm al-Qura calculated calendar."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Date Today in <?php echo e($cityName); ?> — Hijri Date Guide</h2>
        <p><strong>Islamic date today in <?php echo e($cityName); ?></strong> is <strong><?php echo e($hijri['formatted']); ?></strong> (<?php echo e($nowPK->format('d F Y')); ?>). <?php echo e($cityName); ?> is one of the major cities of Pakistan with a significant Muslim population. The <strong>today Islamic date in <?php echo e($cityName); ?></strong> follows Pakistan's official Hijri calendar as announced by the Central Ruet-e-Hilal Committee.</p>

        <p>Muslims in <?php echo e($cityName); ?> observe all Islamic dates and events including Ramadan, Eid ul-Fitr, Eid ul-Adha, Muharram, Rabi ul-Awwal, and Shab-e-Meraj according to the official Pakistan calendar. The current Islamic month in <?php echo e($cityName); ?> is <?php echo e($hijri['month_name']); ?> (<?php echo e($hijri['month_urdu']); ?>), <?php echo e($hijri['year']); ?> AH.</p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cityContent && $cityContent->islamic_history): ?>
        <h3><?php echo e($cityName); ?>'s Islamic Heritage</h3>
        <p><?php echo e(Str::limit($cityContent->islamic_history, 300)); ?></p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/islamic-calendar/city.blade.php ENDPATH**/ ?>