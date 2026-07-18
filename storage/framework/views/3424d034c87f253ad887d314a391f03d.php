

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

    /* Province Map & Cards */
    .province-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }
    .province-card {
        background: white;
        border: 1px solid var(--border-light);
        border-radius: 16px;
        padding: 25px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.04);
    }
    .province-card:hover { border-color: var(--gold); transform: translateY(-3px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
    .province-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 12px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--gold);
    }
    .province-cities {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .province-city-tag {
        background: rgba(10,58,42,0.06);
        color: var(--primary);
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
    }
    .province-city-tag:hover { background: var(--gold); color: white; }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, #fdf6e3, #fefcf2);
        border: 1px solid var(--gold);
        border-radius: 16px;
        padding: 30px;
        margin-top: 30px;
    }
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
    @media (max-width: 768px) { .date-hero-title { font-size: 1.6rem; } .hijri-day-large { font-size: 3rem; } }
</style>


<section class="date-hero">
    <h1 class="date-hero-title">Islamic Date Today in Pakistan | آج کی اسلامی تاریخ پاکستان</h1>
    <p class="date-hero-subtitle">Official Pakistan Hijri Date — All 8 Provinces & 30+ Cities</p>

    <?php echo $__env->make('islamic-calendar.partials._date-card', ['hijriPK' => $hijriPK, 'hijriSA' => $hijriPK, 'nowPK' => $nowPK], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">Pakistan Province-Wise Islamic Date Today</h2>
        <p>Islamic date today in all 8 provinces of Pakistan — Punjab, Sindh, KPK, Balochistan, AJK, GB, ICT, FATA</p>
    </div>

    <div class="province-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provName => $provData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="province-card">
                <div class="province-name"><?php echo e($provName); ?></div>
                <div style="font-size: 1.1rem; font-weight: 600; color: var(--gold); margin-bottom: 12px;">
                    <?php echo e($hijriPK['formatted']); ?>

                </div>
                <div class="province-cities">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $provData['cities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cityName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php $citySlug = strtolower(str_replace(' ', '-', $cityName)); ?>
                        <a href="<?php echo e(route('islamic-date-city', $citySlug)); ?>" class="province-city-tag"><?php echo e($cityName); ?></a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>


<section class="section-container">
    <div class="info-box">
        <h3>🌙 Ruet-e-Hilal Committee — Pakistan's Official Moon Sighting Body</h3>
        <p>Pakistan's Islamic date is officially determined by the <strong>Central Ruet-e-Hilal Committee</strong>, headed by the Chairman appointed by the Federal Government. The committee is responsible for moon sighting (Ruet-e-Hilal) to determine the start of each Islamic month. The committee has zonal offices in all four provinces and regional committees in major cities.</p>
        <p>The Ruet-e-Hilal Committee announces the sighting of the new crescent moon (Hilal) for determining the start of Ramadan, Shawwal (Eid ul-Fitr), and Dhu al-Hijjah (Eid ul-Adha). Their decisions are binding across Pakistan and all provinces follow the same Islamic date.</p>
        <p>Today's official Islamic date in Pakistan: <strong><?php echo e($hijriPK['formatted']); ?></strong></p>
    </div>
</section>


<section class="section-container">
    <div class="info-box" style="background: white; border-color: var(--border-light);">
        <h3>🔍 Why Pakistan Islamic Date Differs from Saudi Arabia</h3>
        <p>Pakistan and Saudi Arabia often have a <strong>1-day difference</strong> in Islamic dates. This happens because:</p>
        <ul style="line-height: 2; color: #555;">
            <li><strong>Pakistan</strong> follows physical moon sighting — the new crescent moon must be visually spotted by the Ruet-e-Hilal Committee.</li>
            <li><strong>Saudi Arabia</strong> uses the Umm al-Qura calendar which is based on astronomical calculations, often declaring the new month 1 day earlier.</li>
            <li>Geographic location matters — Saudi Arabia is further west, so the moon is visible there before Pakistan due to the direction of the moon's orbit.</li>
            <li>Weather and visibility conditions in Pakistan can sometimes delay confirmed sightings.</li>
        </ul>
        <p>Currently: Pakistan is on <strong><?php echo e($hijriPK['formatted']); ?></strong>. This date applies to all cities in Pakistan including Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad, Peshawar, Quetta, and Multan.</p>
    </div>
</section>


<section class="section-container">
    <div class="seo-content">
        <h2>Islamic Date Today in Pakistan — Complete Guide <?php echo e($nowPK->format('Y')); ?></h2>
        <p><strong>Islamic date today in Pakistan</strong> is <strong><?php echo e($hijriPK['formatted']); ?></strong>. Pakistan, officially the Islamic Republic of Pakistan, has a population of over 230 million Muslims who follow the Islamic Hijri calendar for religious observances. The <strong>today Islamic date in Pakistan</strong> is determined by the Central Ruet-e-Hilal Committee and applies uniformly across all provinces — Punjab, Sindh, Khyber Pakhtunkhwa, Balochistan, Azad Jammu & Kashmir, Gilgit-Baltistan, and the Islamabad Capital Territory.</p>

        <h3>What Is Islamic Date Today in Pakistan?</h3>
        <p><strong>What is Islamic date today in Pakistan</strong>? The answer is <?php echo e($hijriPK['day']); ?> <?php echo e($hijriPK['month_name']); ?> <?php echo e($hijriPK['year']); ?> AH (<?php echo e($nowPK->format('d F Y')); ?>). This date is the same for all Pakistan cities. The <strong>which Islamic date is today in Pakistan</strong> query is answered by our real-time converter that uses Pakistan Standard Time (UTC+5) for accurate calculations.</p>

        <h3>Today Pakistan Islamic Date — All Cities</h3>
        <p><strong>Today Pakistan Islamic date</strong> applies to Karachi (Sindh), Lahore (Punjab), Islamabad (ICT), Rawalpindi (Punjab), Faisalabad (Punjab), Peshawar (KPK), Quetta (Balochistan), and Multan (Punjab). All these cities observe the same Islamic date: <?php echo e($hijriPK['formatted']); ?>. The <strong>today date Islamic in Pakistan</strong> is updated daily at midnight PKT.</p>

        <h3>Islamic Date Today in Pakistan — Madani Channel</h3>
        <p>Many Muslims check <strong>Islamic date today in Pakistan Madani Channel</strong> for the official Hijri date. Madani Channel follows the Ruet-e-Hilal Committee's announcements, same as our page. The official Pakistan Islamic date today is <?php echo e($hijriPK['formatted']); ?>.</p>
    </div>
</section>


<section class="section-container">
    <div class="internal-links">
        <a href="<?php echo e(route('islamic-calendar')); ?>" class="internal-link">📅 Islamic Calendar</a>
        <a href="<?php echo e(route('islamic-date-today')); ?>" class="internal-link">📅 Islamic Date Today</a>
        <a href="<?php echo e(route('islamic-date-saudi')); ?>" class="internal-link">🇸🇦 Saudi Arabia Date</a>
        <a href="<?php echo e(route('islamic-date-urdu')); ?>" class="internal-link">🔤 Urdu Date</a>
        <a href="<?php echo e(route('islamic-date-city', 'karachi')); ?>" class="internal-link">🏙️ Karachi</a>
        <a href="<?php echo e(route('islamic-date-city', 'lahore')); ?>" class="internal-link">🏙️ Lahore</a>
    </div>
</section>


<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">FAQ — Islamic Date Today Pakistan</h2>
    </div>
    <?php
    $faqs = [
        ['q' => 'What is Islamic date today in Pakistan?', 'a' => "<strong>Islamic date today in Pakistan</strong> is <strong>{$hijriPK['formatted']}</strong> ({$nowPK->format('d F Y')}). This date is determined by the Central Ruet-e-Hilal Committee."],
        ['q' => 'Today Islamic date in Pakistan ' . date('Y') . '?', 'a' => "Today Islamic date in Pakistan " . date('Y') . " is <strong>{$hijriPK['formatted']}</strong>. All Pakistan cities observe the same date."],
        ['q' => 'Which Islamic date is today in Pakistan?', 'a' => "It is <strong>{$hijriPK['day']}</strong> of <strong>{$hijriPK['month_name']}</strong> ({$hijriPK['month_urdu']}), {$hijriPK['year']} Hijri."],
        ['q' => 'Why is Pakistan Islamic date different from Saudi?', 'a' => "Pakistan follows local moon sighting via the Ruet-e-Hilal Committee, while Saudi Arabia uses the Umm al-Qura calculated calendar. This often results in a 1-day difference."],
        ['q' => 'Today date Islamic in Pakistan — all provinces same?', 'a' => "Yes, all provinces of Pakistan (Punjab, Sindh, KPK, Balochistan, AJK, GB, ICT) follow the same Islamic date as announced by the Central Ruet-e-Hilal Committee."],
        ['q' => 'Islamic date today in Pakistan Madani Channel?', 'a' => "Madani Channel follows the official Ruet-e-Hilal Committee date. Today's date is <strong>{$hijriPK['formatted']}</strong>, same as shown on our page."],
    ];
    ?>
    <?php echo $__env->make('islamic-calendar.partials._faq', ['faqs' => $faqs], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/islamic-calendar/pakistan.blade.php ENDPATH**/ ?>