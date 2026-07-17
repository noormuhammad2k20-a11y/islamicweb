

<?php $__env->startSection('title', 'Learn Namaz (Salah) — Step-by-Step Prayer Guides'); ?>
<?php $__env->startSection('meta_description', 'Learn how to perform Namaz (Salah) correctly with our comprehensive step-by-step guides. Essential for beginners and those looking to perfect their prayer.'); ?>
<?php $__env->startSection('meta_keywords', 'learn namaz, how to pray salah, step by step namaz, islamic prayer guide, namaz rules, wudu guide'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Namaz (Salah) Guides",
  "description": "Learn how to perform Namaz (Salah) correctly with our step-by-step guides."
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

    .n-page * { box-sizing: border-box; }
    .n-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); -webkit-font-smoothing: antialiased; }

    .n-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .n-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .n-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .n-breadcrumb a:hover { color: var(--primary-dark); }
    .n-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .n-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .n-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 70px 0; text-align: center; overflow: hidden; }
    .n-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .n-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .n-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .n-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .n-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .n-grid-section { padding: 60px 0 90px; }
    .n-grid-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }

    .guides-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; }

    .guide-card { background: var(--white); border-radius: var(--radius-lg); padding: 30px; border: 1px solid rgba(20,93,160,0.08); transition: var(--tr); display: flex; flex-direction: column; text-decoration: none; position: relative; overflow: hidden; box-shadow: var(--shadow-sm); }
    .guide-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    .guide-card::before { content: ''; position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: var(--primary); transition: var(--tr); opacity: 0; }
    .guide-card:hover::before { opacity: 1; }
    
    .g-header { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
    .g-icon { width: 50px; height: 50px; border-radius: 12px; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; transition: var(--tr); }
    .guide-card:hover .g-icon { background: var(--primary); color: var(--white); box-shadow: 0 4px 12px rgba(20,93,160,0.2); }
    
    .g-title { font-family: 'Playfair Display', serif; font-size: 1.3rem; font-weight: 700; color: var(--primary-dark); margin: 0; }
    .g-badge { background: rgba(184,134,59,0.1); color: var(--gold-dark); font-size: 0.7rem; padding: 3px 10px; border-radius: 20px; font-weight: 600; text-transform: uppercase; margin-top: 5px; display: inline-block; }
    
    .g-desc { font-size: 0.95rem; color: var(--text-medium); line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }
    
    .g-btn { display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.9rem; color: var(--primary); transition: var(--tr); margin-top: auto; }
    .guide-card:hover .g-btn { color: var(--gold-dark); }
    .g-btn i { font-size: 0.8rem; transition: transform 0.2s; }
    .guide-card:hover .g-btn i { transform: translateX(4px); }

    @media (max-width: 768px) {
        .n-hero h1 { font-size: 2.2rem; }
        .guides-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="n-page">
    <div class="n-breadcrumb">
        <div class="n-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right n-breadcrumb-sep"></i>
            <span class="n-breadcrumb-current">Namaz Guides</span>
        </div>
    </div>

    <section class="n-hero">
        <div class="n-hero-inner">
            <div class="n-hero-badge"><i class="fas fa-praying-hands"></i> Essential Worship</div>
            <h1>Learn <span>Salah</span></h1>
            <p>Comprehensive, step-by-step guides to help you perfect your prayer, ablution, and supplications.</p>
        </div>
    </section>

    <section class="n-grid-section">
        <div class="n-grid-inner">
            <div class="guides-grid">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($guides) && count($guides) > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="#" class="guide-card">
                            <div class="g-header">
                                <div class="g-icon"><i class="fas <?php echo e($guide->icon ?? 'fa-praying-hands'); ?>"></i></div>
                                <div>
                                    <h3 class="g-title"><?php echo e($guide->title ?? $guide->name); ?></h3>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($guide->type)): ?>
                                        <div class="g-badge"><?php echo e($guide->type); ?></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                            <div class="g-desc"><?php echo e(Str::limit($guide->description ?? $guide->overview ?? $guide->content, 120)); ?></div>
                            <div class="g-btn">Read Guide <i class="fas fa-arrow-right"></i></div>
                        </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php else: ?>
                    <!-- Fallback data -->
                    <?php
                        $fallbackGuides = [
                            ['title' => 'How to perform Wudu (Ablution)', 'desc' => 'Step-by-step guide to ritual purification before prayer. Includes obligatory acts (Fard) and sunnah acts.', 'icon' => 'fa-tint', 'badge' => 'Preparation'],
                            ['title' => 'Beginner\'s Guide to Salah', 'desc' => 'A complete, easy-to-understand guide for new Muslims or beginners on how to pray the 5 daily prayers.', 'icon' => 'fa-praying-hands', 'badge' => 'Essential'],
                            ['title' => 'The 5 Daily Prayers (Rakat Guide)', 'desc' => 'Detailed breakdown of the number of Fard, Sunnah, and Nafl rakats for Fajr, Dhuhr, Asr, Maghrib, and Isha.', 'icon' => 'fa-clock', 'badge' => 'Reference'],
                            ['title' => 'Jumu\'ah (Friday) Prayer', 'desc' => 'Rules, virtues, and the method of performing the congregational Friday prayer and listening to the Khutbah.', 'icon' => 'fa-users', 'badge' => 'Congregation'],
                            ['title' => 'Salatul Janazah (Funeral Prayer)', 'desc' => 'How to perform the funeral prayer in Islam. Learn the 4 Takbeers and the specific duas recited.', 'icon' => 'fa-book-dead', 'badge' => 'Special Prayer'],
                            ['title' => 'Salatul Tahajjud', 'desc' => 'The virtues and method of performing the voluntary night prayer (Qiyam al-Layl) in the last third of the night.', 'icon' => 'fa-moon', 'badge' => 'Voluntary'],
                        ];
                    ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $fallbackGuides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="#" class="guide-card">
                            <div class="g-header">
                                <div class="g-icon"><i class="fas <?php echo e($g['icon']); ?>"></i></div>
                                <div>
                                    <h3 class="g-title"><?php echo e($g['title']); ?></h3>
                                    <div class="g-badge"><?php echo e($g['badge']); ?></div>
                                </div>
                            </div>
                            <div class="g-desc"><?php echo e($g['desc']); ?></div>
                            <div class="g-btn">Read Guide <i class="fas fa-arrow-right"></i></div>
                        </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\namaz\index.blade.php ENDPATH**/ ?>