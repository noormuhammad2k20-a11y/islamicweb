

<?php $__env->startSection('title', 'Islamic Calendar & Events — Explore Hijri Months'); ?>
<?php $__env->startSection('meta_description', 'Explore the Islamic Hijri calendar. Learn about the 12 Islamic months, their significance, and major events like Ramadan, Hajj, and Muharram.'); ?>
<?php $__env->startSection('meta_keywords', 'islamic calendar, hijri calendar, islamic events, islamic months, ramadan, muharram, dhul hijjah'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Islamic Calendar & Events",
  "description": "Explore the Islamic Hijri calendar and learn about the 12 Islamic months."
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap');

    :root {
        --primary: #145DA0;
        --primary-dark: #0C3D6E;
        --primary-light: #3D8FD1;
        --secondary: #F5F8F7;
        --secondary-light: #FBFDFC;
        --gold: #B8863B;
        --gold-light: #D9AE6C;
        --text-dark: #15211D;
        --text-medium: #44544E;
        --text-light: #76867F;
        --white: #ffffff;
        --shadow-sm: 0 1px 4px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 16px rgba(0,0,0,0.07);
        --radius-lg: 16px;
        --radius-md: 10px;
        --tr: all 0.25s ease;
    }

    .e-page * { box-sizing: border-box; }
    .e-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); -webkit-font-smoothing: antialiased; }

    .e-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .e-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .e-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .e-breadcrumb a:hover { color: var(--primary-dark); }
    .e-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .e-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .e-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 70px 0; text-align: center; overflow: hidden; }
    .e-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .e-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .e-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .e-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .e-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .e-grid-section { padding: 60px 0 90px; }
    .e-grid-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }

    .months-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 25px; }

    .month-card { background: var(--white); border-radius: var(--radius-md); padding: 30px; text-align: center; border: 1px solid rgba(20,93,160,0.08); transition: var(--tr); display: flex; flex-direction: column; align-items: center; text-decoration: none; position: relative; overflow: hidden; }
    .month-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    
    .m-number { width: 50px; height: 50px; border-radius: 50%; background: var(--secondary); color: var(--primary); font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 800; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; transition: var(--tr); border: 2px solid rgba(20,93,160,0.1); }
    .month-card:hover .m-number { background: var(--primary); color: var(--white); border-color: var(--primary); }

    .m-arabic { font-family: 'Amiri', serif; font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 5px; line-height: 1.2; }
    .m-english { font-family: 'Playfair Display', serif; font-size: 1.3rem; font-weight: 700; color: var(--text-dark); margin-bottom: 5px; }
    .m-urdu { font-size: 0.9rem; color: var(--text-medium); margin-bottom: 20px; }
    
    .m-btn { display: inline-flex; align-items: center; justify-content: center; width: 100%; padding: 10px; border-radius: 30px; background: var(--secondary); color: var(--primary-dark); font-weight: 600; font-size: 0.9rem; transition: var(--tr); gap: 8px; margin-top: auto; }
    .month-card:hover .m-btn { background: var(--primary-subtle); color: var(--primary); }

    /* Highlights for sacred months */
    .sacred-card .m-number { border-color: var(--gold-light); color: var(--gold-dark); background: rgba(184,134,59,0.05); }
    .sacred-card:hover .m-number { background: var(--gold); border-color: var(--gold); color: var(--white); }
    .sacred-card .m-arabic { color: var(--gold-dark); }
    .sacred-badge { position: absolute; top: 15px; right: -30px; background: var(--gold); color: var(--white); font-size: 0.7rem; font-weight: 700; padding: 4px 30px; transform: rotate(45deg); text-transform: uppercase; letter-spacing: 1px; }

    @media (max-width: 768px) {
        .e-hero h1 { font-size: 2.2rem; }
        .months-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="e-page">
    <div class="e-breadcrumb">
        <div class="e-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right e-breadcrumb-sep"></i>
            <span class="e-breadcrumb-current">Islamic Events</span>
        </div>
    </div>

    <section class="e-hero">
        <div class="e-hero-inner">
            <div class="e-hero-badge"><i class="fas fa-calendar-alt"></i> The Hijri Calendar</div>
            <h1>Islamic <span>Events</span></h1>
            <p>Explore the 12 months of the Islamic Hijri calendar, learn their meanings, and discover significant historical events.</p>
        </div>
    </section>

    <section class="e-grid-section">
        <div class="e-grid-inner">
            <div class="months-grid">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($months) && count($months) > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php
                            $isSacred = in_array($month->month_number, [1, 7, 11, 12]);
                        ?>
                        <a href="<?php echo e(route('events.month', $month->slug)); ?>" class="month-card <?php echo e($isSacred ? 'sacred-card' : ''); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSacred): ?>
                                <div class="sacred-badge">Sacred</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="m-number"><?php echo e($month->month_number); ?></div>
                            <div class="m-arabic"><?php echo e($month->name_ar); ?></div>
                            <div class="m-english"><?php echo e($month->name_en); ?></div>
                            <div class="m-urdu">(<?php echo e($month->name_ur); ?>)</div>
                            <div class="m-btn">View Events <i class="fas fa-arrow-right"></i></div>
                        </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php else: ?>
                    <!-- Fallback if database is empty -->
                    <?php
                        $fallbackMonths = [
                            ['num' => 1, 'ar' => 'مُحَرَّم', 'en' => 'Muharram', 'ur' => 'محرم'],
                            ['num' => 2, 'ar' => 'صَفَر', 'en' => 'Safar', 'ur' => 'صفر'],
                            ['num' => 3, 'ar' => 'رَبِيع ٱلْأَوَّل', 'en' => 'Rabi al-Awwal', 'ur' => 'ربیع الاول'],
                            ['num' => 4, 'ar' => 'رَبِيع ٱلْآخِر', 'en' => 'Rabi al-Akhir', 'ur' => 'ربیع الثانی'],
                            ['num' => 5, 'ar' => 'جُمَادَىٰ ٱلْأُولَىٰ', 'en' => 'Jumada al-Ula', 'ur' => 'جمادی الاول'],
                            ['num' => 6, 'ar' => 'جُمَادَىٰ ٱلْآخِرَة', 'en' => 'Jumada al-Akhirah', 'ur' => 'جمادی الثانی'],
                            ['num' => 7, 'ar' => 'رَجَب', 'en' => 'Rajab', 'ur' => 'رجب'],
                            ['num' => 8, 'ar' => 'شَعْبَان', 'en' => 'Sha\'ban', 'ur' => 'شعبان'],
                            ['num' => 9, 'ar' => 'رَمَضَان', 'en' => 'Ramadan', 'ur' => 'رمضان'],
                            ['num' => 10, 'ar' => 'شَوَّال', 'en' => 'Shawwal', 'ur' => 'شوال'],
                            ['num' => 11, 'ar' => 'ذُو ٱلْقَعْدَة', 'en' => 'Dhul Qadah', 'ur' => 'ذیقعد'],
                            ['num' => 12, 'ar' => 'ذُو ٱلْحِجَّة', 'en' => 'Dhul Hijjah', 'ur' => 'ذی الحجہ'],
                        ];
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $fallbackMonths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php
                            $isSacred = in_array($m['num'], [1, 7, 11, 12]);
                        ?>
                        <a href="#" class="month-card <?php echo e($isSacred ? 'sacred-card' : ''); ?>">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isSacred): ?>
                                <div class="sacred-badge">Sacred</div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="m-number"><?php echo e($m['num']); ?></div>
                            <div class="m-arabic"><?php echo e($m['ar']); ?></div>
                            <div class="m-english"><?php echo e($m['en']); ?></div>
                            <div class="m-urdu">(<?php echo e($m['ur']); ?>)</div>
                            <div class="m-btn">View Events <i class="fas fa-arrow-right"></i></div>
                        </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\events\index.blade.php ENDPATH**/ ?>