

<?php $__env->startSection('title', 'Ramadan ' . $year . ' Sehri & Iftar Timings | Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Get complete Ramadan ' . $year . ' calendar, sehri and iftar timings for your city.'); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 40px; position: relative; z-index: 2; max-width: 600px; margin-left: auto; margin-right: auto; }
    
    .section-container { max-width: 1200px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    
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
</style>

<section class="date-hero">
    <h1 class="date-hero-title">Ramadan <?php echo e($year); ?> Hub</h1>
    <p class="date-hero-subtitle">
        Find complete Sehri and Iftar timings for your city, explore Ramadan guidelines, Duas, and more.
    </p>
</section>

<section class="section-container">
    
    <div style="text-align: center;">
        <h2 class="section-title">Select Your City</h2>
    </div>

    <?php
        $groupedCities = $cities->groupBy(function($city) {
            return $city->country ? $city->country->name : 'Other';
        });
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $groupedCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryName => $countryCities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
    <div class="country-section">
        <h3 class="country-title">📍 <?php echo e($countryName); ?></h3>
        <div class="city-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $countryCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('ramadan.city', ['year' => $year, 'city' => $city->slug])); ?>" class="city-card">
                <h3><?php echo e($city->name); ?></h3>
                <p>Sehri & Iftar Timings</p>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    <!-- EXPLORE RAMADAN SECTION -->
    <div style="text-align: center; margin-top: 60px;">
        <h2 class="section-title">Explore Ramadan <?php echo e($year); ?></h2>
    </div>
    
    <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; margin-bottom: 60px;">
        <a href="<?php echo e(route('ramadan.duas')); ?>" style="text-decoration: none; background: white; padding: 25px; border-radius: 16px; flex: 1; min-width: 250px; text-align: center; color: var(--text-dark); box-shadow: var(--card-shadow); border: 1px solid var(--border-light); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="font-size: 2.5rem; margin-bottom: 15px;">🤲</div>
            <h3 style="font-size: 1.3rem; margin: 0 0 10px; color: var(--primary);">Ramadan Duas</h3>
            <p style="font-size: 0.95rem; margin: 0; color: #666;">Read essential Duas for Sehri, Iftar, and all 3 Ashras of Ramadan.</p>
        </a>

        <a href="<?php echo e(route('ramadan.rules')); ?>" style="text-decoration: none; background: white; padding: 25px; border-radius: 16px; flex: 1; min-width: 250px; text-align: center; color: var(--text-dark); box-shadow: var(--card-shadow); border: 1px solid var(--border-light); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="font-size: 2.5rem; margin-bottom: 15px;">📜</div>
            <h3 style="font-size: 1.3rem; margin: 0 0 10px; color: var(--primary);">Fasting Rules</h3>
            <p style="font-size: 0.95rem; margin: 0; color: #666;">Learn the guidelines, what breaks a fast, and what is allowed.</p>
        </a>

        <a href="<?php echo e(route('zakat.index')); ?>" style="text-decoration: none; background: white; padding: 25px; border-radius: 16px; flex: 1; min-width: 250px; text-align: center; color: var(--text-dark); box-shadow: var(--card-shadow); border: 1px solid var(--border-light); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='none'">
            <div style="font-size: 2.5rem; margin-bottom: 15px;">⚖️</div>
            <h3 style="font-size: 1.3rem; margin: 0 0 10px; color: var(--primary);">Zakat Calculator</h3>
            <p style="font-size: 0.95rem; margin: 0; color: #666;">Calculate your Zakat accurately using our digital tool.</p>
        </a>
    </div>

    <!-- SEO FAQ -->
    <div style="text-align: center;">
        <h2 class="section-title">Ramadan <?php echo e($year); ?> FAQs</h2>
    </div>
    
    <div class="faq-section" itemscope itemtype="https://schema.org/FAQPage" style="max-width: 900px; margin: 0 auto; margin-bottom: 50px;">
        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">When will Ramadan <?php echo e($year); ?> begin?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    The exact start date of Ramadan <?php echo e($year); ?> depends on the sighting of the new moon. Generally, the dates are calculated based on the global astronomical moon phases, but local moon sighting committees will make the final announcement in your country.
                </div>
            </div>
        </div>
        
        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">Why do Sehri and Iftar times vary by city?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    Sehri and Iftar times are directly tied to the position of the sun. Sehri ends exactly at Fajr (dawn), while Iftar begins exactly at Maghrib (sunset). Because coordinates (latitude and longitude) differ across cities, the sun rises and sets at different times.
                </div>
            </div>
        </div>

        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="background: white; padding: 25px; border-radius: 16px; margin-bottom: 20px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="font-size: 1.2rem; color: var(--primary); font-family: 'Playfair Display', serif; margin: 0 0 10px;">Is the timetable applicable for all Fiqa schools?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text" style="color: #555; line-height: 1.8;">
                    The basic timings generated apply to Hanafi and Shafi'i schools. For Fiqa Jafria, it is generally recommended to stop eating (Sehri) 10 minutes earlier and break the fast (Iftar) 10 minutes later, when the redness in the eastern sky vanishes.
                </div>
            </div>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/ramadan/hub.blade.php ENDPATH**/ ?>