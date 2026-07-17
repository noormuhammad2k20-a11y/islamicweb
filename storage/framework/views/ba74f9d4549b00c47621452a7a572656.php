

<?php $__env->startSection('seo'); ?>
<title>Ramadan <?php echo e($year); ?> Hub — Sehri, Iftar, Ashras & Zakat | IslamicWeb</title>
<meta name="description" content="Complete Ramadan <?php echo e($year); ?> calendar, sehri and iftar timings, Ashra duas, Zakat calculator, Fidyah/Kaffarah rules, and Lailatul Qadr guide.">
<link rel="canonical" href="<?php echo e(url('/ramadan/' . $year)); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .font-playfair { font-family: 'Playfair Display', serif; }
    .font-amiri { font-family: 'Amiri', serif; }

    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 80px 20px 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; box-shadow: 0 10px 30px rgba(10,58,42,0.2); margin-bottom: 40px;}
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .date-hero-subtitle { font-size: 1.2rem; color: rgba(255,255,255,0.9); margin-bottom: 40px; position: relative; z-index: 2; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.6;}
    
    .section-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--primary); margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    
    .ashra-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 60px; }
    .ashra-card { background: white; border-radius: 20px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); text-align: center; transition: transform 0.3s; position: relative; overflow: hidden;}
    .ashra-card:hover { transform: translateY(-10px); border-color: var(--gold); }
    .ashra-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: var(--gold); }
    .ashra-badge { display: inline-block; background: rgba(212,175,55,0.1); color: var(--primary); padding: 5px 15px; border-radius: 20px; font-weight: bold; margin-bottom: 15px; border: 1px solid rgba(212,175,55,0.3); }
    .ashra-title { font-size: 1.5rem; color: var(--primary); margin-bottom: 15px; font-family: 'Playfair Display', serif;}
    .ashra-dua-ar { font-family: 'Amiri', serif; font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 15px; line-height: 1.4; }
    
    .country-section { margin-bottom: 50px; }
    .country-title { font-size: 1.5rem; color: var(--primary); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
    .country-title::after { content: ''; flex: 1; height: 1px; background: var(--border-light); }
    
    .city-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
    .city-card { background: white; padding: 20px; border-radius: 12px; box-shadow: var(--card-shadow); text-align: center; text-decoration: none; border: 1px solid var(--border-light); transition: all 0.3s ease; position: relative; overflow: hidden; }
    .city-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 3px; background: var(--gold); transform: scaleX(0); transition: transform 0.3s ease; }
    .city-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-color: rgba(212,175,55,0.3); }
    .city-card:hover::before { transform: scaleX(1); }
    .city-card h3 { margin: 0; font-size: 1.2rem; color: var(--primary); font-weight: 600; }
    .city-card p { margin: 5px 0 0; color: #666; font-size: 0.85rem; }

    .guides-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 60px; }
    .guide-card { display: flex; flex-direction: column; align-items: center; text-align: center; padding: 30px 20px; background: white; border-radius: 16px; border: 1px solid var(--border-light); box-shadow: var(--card-shadow); text-decoration: none; transition: transform 0.3s; }
    .guide-card:hover { transform: translateY(-5px); border-color: var(--primary); background: rgba(10,58,42,0.02); }
    .guide-icon { font-size: 3rem; margin-bottom: 15px; }
    .guide-title { font-size: 1.3rem; color: var(--primary); font-weight: bold; margin-bottom: 10px; }
    .guide-desc { color: #666; font-size: 0.95rem; line-height: 1.5; }
</style>

<section class="date-hero">
    <h1 class="date-hero-title">Ramadan <?php echo e($year); ?> Global Hub</h1>
    <p class="date-hero-subtitle">
        Your comprehensive spiritual companion. Find precise Sehri and Iftar timetables, explore the virtues of the Ashras, calculate Zakat, and prepare for Lailatul Qadr.
    </p>
</section>

<section class="section-container">

    <!-- The 3 Ashras -->
    <div style="text-align: center;">
        <h2 class="section-title">The Three Ashras of Ramadan</h2>
    </div>
    <div class="ashra-grid">
        <!-- Ashra 1 -->
        <div class="ashra-card">
            <span class="ashra-badge">Days 1 - 10</span>
            <h3 class="ashra-title">Mercy (Rehmat)</h3>
            <p class="text-gray-600 mb-4">The first ten days are dedicated to seeking Allah's boundless mercy.</p>
            <div class="ashra-dua-ar" dir="rtl">رَبِّ اغْفِرْ وَارْحَمْ وَأَنْتَ خَيْرُ الرَّاحِمِينَ</div>
            <p class="text-sm text-gray-500 italic">"O My Lord! Forgive and have mercy, for You are the Best of those who show mercy."</p>
        </div>
        <!-- Ashra 2 -->
        <div class="ashra-card">
            <span class="ashra-badge">Days 11 - 20</span>
            <h3 class="ashra-title">Forgiveness (Maghfirat)</h3>
            <p class="text-gray-600 mb-4">The middle ten days are for seeking forgiveness for all our sins.</p>
            <div class="ashra-dua-ar" dir="rtl">اَسْتَغْفِرُ اللہَ رَبِّی مِنْ کُلِّ ذَنْبٍ وَّ اَتُوْبُ اِلَیْہِ</div>
            <p class="text-sm text-gray-500 italic">"I seek forgiveness from Allah, my Lord, from every sin I committed."</p>
        </div>
        <!-- Ashra 3 -->
        <div class="ashra-card">
            <span class="ashra-badge">Days 21 - 30</span>
            <h3 class="ashra-title">Refuge (Nijat)</h3>
            <p class="text-gray-600 mb-4">The last ten days are for seeking refuge from the Hellfire.</p>
            <div class="ashra-dua-ar" dir="rtl">اَللَّهُمَّ أَجِرْنِي مِنَ النَّارِ</div>
            <p class="text-sm text-gray-500 italic">"O Allah! Save me from the Hell-fire."</p>
        </div>
    </div>
    
    <!-- Find City Timetable -->
    <div style="text-align: center;">
        <h2 class="section-title">City Timetables</h2>
    </div>
    <div class="mb-10 text-center">
        <input type="text" id="citySearch" placeholder="Search for your city..." style="width: 100%; max-width: 500px; padding: 15px 20px; border-radius: 50px; border: 2px solid var(--border-light); font-size: 1rem; outline: none; transition: border-color 0.3s;">
    </div>

    <?php
        $groupedCities = $cities->groupBy(function($city) {
            return $city->country ? $city->country->name : 'Other';
        });
    ?>

    <div id="citiesContainer">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $groupedCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryName => $countryCities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="country-section" data-country="<?php echo e(strtolower($countryName)); ?>">
            <h3 class="country-title">📍 <?php echo e($countryName); ?></h3>
            <div class="city-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $countryCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('ramadan.city', ['year' => $year, 'city' => $city->slug])); ?>" class="city-card" data-city="<?php echo e(strtolower($city->name)); ?>">
                    <h3><?php echo e($city->name); ?></h3>
                    <p>Sehri & Iftar Timings</p>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>

    <!-- Essential Ramadan Guides -->
    <div style="text-align: center; margin-top: 60px;">
        <h2 class="section-title">Essential Ramadan Guides</h2>
    </div>
    
    <div class="guides-grid">
        <a href="<?php echo e(route('ramadan.laylatul_qadr')); ?>" class="guide-card">
            <div class="guide-icon">🌙</div>
            <h3 class="guide-title">Lailatul Qadr Guide</h3>
            <p class="guide-desc">Signs, virtues, and specific Ibadah (worship) to perform on the Night of Power.</p>
        </a>

        <a href="<?php echo e(route('zakat.index')); ?>" class="guide-card">
            <div class="guide-icon">⚖️</div>
            <h3 class="guide-title">Zakat Calculator</h3>
            <p class="guide-desc">Calculate your Nisab and obligatory Zakat accurately for cash, gold, and assets.</p>
        </a>

        <a href="<?php echo e(route('ramadan.rules')); ?>" class="guide-card">
            <div class="guide-icon">📖</div>
            <h3 class="guide-title">Fidyah & Kaffarah</h3>
            <p class="guide-desc">Rules for missed fasts, pregnant women, travelers, and exact Fidyah amounts.</p>
        </a>

        <a href="<?php echo e(route('ramadan.duas')); ?>" class="guide-card">
            <div class="guide-icon">🤲</div>
            <h3 class="guide-title">Comprehensive Duas</h3>
            <p class="guide-desc">Authentic Duas for Sehri, Iftar, Taraweeh, and breaking fast at someone's house.</p>
        </a>
    </div>

</section>

<?php $__env->startPush('scripts'); ?>
<script>
    // Search Functionality
    document.getElementById('citySearch').addEventListener('keyup', function(e) {
        let term = e.target.value.toLowerCase();
        let countrySections = document.querySelectorAll('.country-section');
        
        countrySections.forEach(section => {
            let cards = section.querySelectorAll('.city-card');
            let hasVisibleCards = false;
            
            cards.forEach(card => {
                if(card.dataset.city.includes(term)) {
                    card.style.display = 'block';
                    hasVisibleCards = true;
                } else {
                    card.style.display = 'none';
                }
            });
            
            if(hasVisibleCards || section.dataset.country.includes(term)) {
                section.style.display = 'block';
                if(section.dataset.country.includes(term)) {
                    cards.forEach(c => c.style.display = 'block'); // Show all if country matches
                }
            } else {
                section.style.display = 'none';
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\ramadan\hub.blade.php ENDPATH**/ ?>