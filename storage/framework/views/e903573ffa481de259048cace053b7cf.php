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

    /* Giant Date Display */
    .giant-date-display {
        text-align: center;
        padding: 40px 20px;
        position: relative;
        z-index: 2;
    }
    .giant-day {
        font-size: 10rem;
        font-weight: 900;
        font-family: 'Playfair Display', serif;
        line-height: 1;
        color: white;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .giant-month {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--gold-light);
        margin-top: 10px;
    }
    .giant-year {
        font-size: 1.5rem;
        color: rgba(255,255,255,0.7);
        margin-top: 5px;
    }

    /* Live Clock */
    .live-clock {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 20px 30px;
        display: inline-block;
        margin-top: 20px;
        position: relative;
        z-index: 2;
    }
    .clock-time {
        font-size: 2rem;
        font-weight: 700;
        font-family: 'JetBrains Mono', monospace;
        color: var(--gold);
    }
    .clock-label { font-size: 0.85rem; color: rgba(255,255,255,0.7); margin-top: 5px; }

    /* Progress Bars */
    .progress-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }
    .progress-card {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.04);
    }
    .progress-label { font-weight: 700; color: var(--primary); margin-bottom: 10px; font-size: 1rem; }
    .progress-bar-bg {
        background: #e5e7eb;
        border-radius: 10px;
        height: 14px;
        overflow: hidden;
        position: relative;
    }
    .progress-bar-fill {
        height: 100%;
        border-radius: 10px;
        transition: width 1s ease;
    }
    .progress-bar-green { background: linear-gradient(90deg, #22c55e, #16a34a); }
    .progress-bar-gold { background: linear-gradient(90deg, var(--gold), #c49b2f); }
    .progress-value { font-size: 0.9rem; color: #666; margin-top: 8px; }

    /* Cities Table */
    .cities-table { width: 100%; border-collapse: collapse; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.04); }
    .cities-table th { background: var(--primary); color: white; padding: 15px 20px; text-align: left; font-weight: 600; }
    .cities-table td { padding: 14px 20px; border-bottom: 1px solid #eee; }
    .cities-table tr:last-child td { border-bottom: none; }
    .cities-table tr:hover { background: rgba(212,175,55,0.05); }

    /* Tomorrow Card */
    .tomorrow-card {
        background: linear-gradient(135deg, #fdf6e3, #fefcf2);
        border: 2px solid var(--gold);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        margin-top: 30px;
    }
    .tomorrow-label { font-size: 1rem; font-weight: 700; color: var(--gold); text-transform: uppercase; letter-spacing: 1px; }
    .tomorrow-date { font-size: 1.8rem; font-weight: 800; color: var(--primary); margin-top: 10px; font-family: 'Playfair Display', serif; }

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

    @media (max-width: 768px) { .giant-day { font-size: 6rem; } .giant-month { font-size: 1.8rem; } .date-hero-title { font-size: 1.6rem; } }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Date Today <?php echo e($nowPK->format('d F Y')); ?> | آج کی اسلامی تاریخ</h1>
    <p class="date-hero-subtitle">Exact Islamic Hijri Date — Pakistan, Saudi Arabia, All Cities</p>

    <div class="giant-date-display">
        <div class="giant-day"><?php echo e($hijriPK['day']); ?></div>
        <div class="giant-month"><?php echo e($hijriPK['month_name']); ?> <?php echo e($hijriPK['year']); ?> AH</div>
        <div class="giant-year"><?php echo e($hijriPK['month_urdu']); ?> — <?php echo e($hijriPK['month_arabic']); ?></div>
    </div>

    
    <div class="live-clock">
        <div class="clock-time" id="liveClock">--:--:--</div>
        <div class="clock-label">Pakistan Standard Time (PKT)</div>
    </div>

    <div style="margin-top: 30px;">
        <?php echo $__env->make('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriSA, 'nowPK' => $nowPK], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Hijri Year & Month Progress</h2>
    </div>

    <?php
        $hijriDaysInYear = 354;
        $hijriMonthDays = 30;
        $daysPassed = (($hijriPK['month'] - 1) * 29.5) + $hijriPK['day'];
        $yearPercent = min(100, round(($daysPassed / $hijriDaysInYear) * 100));
        $daysRemainingMonth = $hijriMonthDays - $hijriPK['day'];
        $monthPercent = min(100, round(($hijriPK['day'] / $hijriMonthDays) * 100));
    ?>

    <div class="progress-section">
        <div class="progress-card">
            <div class="progress-label">📅 Days Passed in Hijri Year <?php echo e($hijriPK['year']); ?> AH</div>
            <div class="progress-bar-bg">
                <div class="progress-bar-fill progress-bar-green" style="width: <?php echo e($yearPercent); ?>%"></div>
            </div>
            <div class="progress-value">~<?php echo e(round($daysPassed)); ?> of ~<?php echo e($hijriDaysInYear); ?> days (<?php echo e($yearPercent); ?>%)</div>
        </div>

        <div class="progress-card">
            <div class="progress-label">🌙 Days Remaining in <?php echo e($hijriPK['month_name']); ?></div>
            <div class="progress-bar-bg">
                <div class="progress-bar-fill progress-bar-gold" style="width: <?php echo e($monthPercent); ?>%"></div>
            </div>
            <div class="progress-value"><?php echo e($daysRemainingMonth); ?> days remaining (Day <?php echo e($hijriPK['day']); ?> of ~<?php echo e($hijriMonthDays); ?>)</div>
        </div>
    </div>
</section>


<section class="section-container">
    <div class="tomorrow-card">
        <div class="tomorrow-label">Tomorrow's Islamic Date</div>
        <div class="tomorrow-date"><?php echo e($hijriTomorrow['formatted']); ?></div>
        <div style="color: #666; margin-top: 8px;"><?php echo e($hijriTomorrow['month_urdu']); ?> — <?php echo e($hijriTomorrow['day_name']); ?></div>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Today Islamic Date in Pakistan — All Cities</h2>
        <p>Islamic date today in Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad, Peshawar, Quetta, Multan</p>
    </div>

    <table class="cities-table">
        <thead>
            <tr>
                <th>City</th>
                <th>Islamic Date</th>
                <th>Hijri Month</th>
                <th>اردو</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $citiesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityName => $hijri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <tr>
                    <td><strong><a href="<?php echo e(route('islamic-date-city', strtolower(str_replace(' ', '-', $cityName)))); ?>" style="color: var(--primary); text-decoration: none;"><?php echo e($cityName); ?></a></strong></td>
                    <td><?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?> <?php echo e($hijri['year']); ?> AH</td>
                    <td><?php echo e($hijri['month_name']); ?></td>
                    <td style="font-family: 'Amiri', serif;"><?php echo e($hijri['month_urdu']); ?></td>
                </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>
</section>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($monthContent): ?>
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title"><?php echo e($monthContent->month_name_en ?? $hijriPK['month_name']); ?> <?php echo e($hijriPK['year']); ?> — Current Islamic Month</h2>
    </div>
    <div style="background: white; padding: 30px; border-radius: 16px; border: 1px solid var(--border-light);">
        <p><?php echo e(Str::limit($monthContent->significance_en ?? '', 500)); ?></p>
        <a href="<?php echo e(route('islamic-month', $monthContent->slug ?? 'muharram')); ?>" style="color: var(--gold); font-weight: 700; text-decoration: none;">Read more about <?php echo e($monthContent->month_name_en ?? $hijriPK['month_name']); ?> →</a>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Explore More Islamic Dates</h2>
    </div>
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Full Islamic Calendar</a>
        <a href="<?php echo e(route('islamic-date-pakistan')); ?>" class="internal-link">🇵🇰 Pakistan Date</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi Arabia Date</a>
        <a href="<?php echo e(route('islamic-date-urdu')); ?>" class="internal-link">🔤 Urdu Date</a>
        <a href="<?php echo e(route('islamic-date-city', 'karachi')); ?>" class="internal-link">🏙️ Karachi</a>
        <a href="<?php echo e(route('islamic-date-city', 'lahore')); ?>" class="internal-link">🏙️ Lahore</a>
        <a href="<?php echo e(route('islamic-date-city', 'rawalpindi')); ?>" class="internal-link">🏙️ Rawalpindi</a>
        <a href="<?php echo e(route('islamic-date-city', 'faisalabad')); ?>" class="internal-link">🏙️ Faisalabad</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Date Today</h2>
    </div>
    <?php
    $faqs = [
        ['q' => 'What is Islamic date today in Pakistan?', 'a' => "<strong>Islamic date today in Pakistan</strong> is <strong>{$hijriPK['day']} {$hijriPK['month_name']} {$hijriPK['year']}</strong> AH ({$nowPK->format('d F Y')}). This date applies to all Pakistan cities including Karachi, Lahore, Islamabad, Rawalpindi, and Faisalabad."],
        ['q' => 'What is exact Islamic date today?', 'a' => "The <strong>exact Islamic date today</strong> is <strong>{$hijriPK['formatted']}</strong> in Pakistan and <strong>{$hijriSA['formatted']}</strong> in Saudi Arabia. Dates may differ by 1 day between regions."],
        ['q' => 'Today Islamic date in Karachi?', 'a' => "Today Islamic date in Karachi is <strong>{$hijriPK['formatted']}</strong>. Karachi follows Pakistan's official Hijri calendar as announced by the Ruet-e-Hilal Committee."],
        ['q' => 'Today Islamic date in Lahore Pakistan?', 'a' => "Today Islamic date in Lahore Pakistan is <strong>{$hijriPK['formatted']}</strong>. Lahore and all Punjab cities observe the same Hijri date."],
        ['q' => 'Which date of Islamic month today?', 'a' => "Today is the <strong>{$hijriPK['day']}th</strong> of <strong>{$hijriPK['month_name']}</strong> ({$hijriPK['month_urdu']}) {$hijriPK['year']} Hijri. This is the {$hijriPK['month']}th month of the Islamic year."],
        ['q' => 'Islamic moon date today?', 'a' => "The <strong>Islamic moon date today</strong> is {$hijriPK['day']} {$hijriPK['month_name']}. Islamic calendar is a lunar calendar — each month starts with the sighting of the new crescent moon (hilal)."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Date Today — Complete Hijri Date Guide <?php echo e($nowPK->format('d F Y')); ?></h2>
        <p><strong>Islamic date today</strong> is <strong><?php echo e($hijriPK['formatted']); ?></strong> in Pakistan. This is the most searched Islamic date query with over 823,000 monthly searches. Muslims around the world check the <strong>today Islamic date</strong> daily for prayer schedules, fasting, and Islamic events. The <strong>exact Islamic date today</strong> is determined by the lunar Hijri calendar.</p>

        <p><strong>Today Islamic date in Pakistan</strong> is observed uniformly across all cities — Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad, Peshawar, Quetta, and Multan all follow the same date as announced by Pakistan's Central Ruet-e-Hilal Committee. The <strong>Islamic date today in Saudi Arabia</strong> is <?php echo e($hijriSA['formatted']); ?> according to the Umm al-Qura calendar.</p>

        <h3>Why Check Islamic Date Today?</h3>
        <p>Muslims check the <strong>todays Islamic date</strong> to know the current position in the Hijri calendar for religious observances. Important occasions like fasting in Ramadan, Eid celebrations, Hajj pilgrimage, and optional fasting on Mondays, Thursdays, and the 13th-15th of each Hijri month all depend on knowing the <strong>Islamic moon date today</strong>. Our page provides real-time updates with a live Pakistan time clock.</p>

        <p>The current Islamic month is <strong><?php echo e($hijriPK['month_name']); ?></strong> (<?php echo e($hijriPK['month_urdu']); ?>), which is the <?php echo e($hijriPK['month']); ?>th month of the Hijri year <?php echo e($hijriPK['year']); ?>. Tomorrow's Islamic date will be <strong><?php echo e($hijriTomorrow['formatted']); ?></strong>.</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }

// Live Clock
function updateClock() {
    var now = new Date();
    // Convert to PKT (UTC+5)
    var utc = now.getTime() + (now.getTimezoneOffset() * 60000);
    var pkt = new Date(utc + (3600000 * 5));
    var h = String(pkt.getHours()).padStart(2, '0');
    var m = String(pkt.getMinutes()).padStart(2, '0');
    var s = String(pkt.getSeconds()).padStart(2, '0');
    document.getElementById('liveClock').textContent = h + ':' + m + ':' + s;
}
setInterval(updateClock, 1000);
updateClock();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/islamic-calendar/today.blade.php ENDPATH**/ ?>