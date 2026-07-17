

<?php $__env->startSection('title', 'Islamic Calculators — Zakat, Fidya, Kaffarah & Inheritance'); ?>
<?php $__env->startSection('meta_description', 'Free online Islamic calculators. Calculate your Zakat, Gold/Silver Nisab, Ramadan Fidya, Kaffarah, and Islamic Inheritance accurately according to Shariah.'); ?>
<?php $__env->startSection('meta_keywords', 'islamic calculators, zakat calculator, fidya calculator, kaffarah calculator, inheritance calculator islam, online zakat calculator, islamic tools'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Zakat Calculator",
      "url": "<?php echo e(route('calculators.zakat')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Fidya Calculator",
      "url": "<?php echo e(route('calculators.fidya')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Kaffarah Calculator",
      "url": "<?php echo e(route('calculators.kaffarah')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "Inheritance Calculator",
      "url": "<?php echo e(route('calculators.inheritance')); ?>"
    }
  ]
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
        --shadow-lg: 0 10px 30px rgba(0,0,0,0.1);
        --radius-md: 10px;
        --radius-lg: 16px;
        --tr: all 0.25s ease;
    }

    .c-page * { box-sizing: border-box; }
    .c-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); -webkit-font-smoothing: antialiased; }

    .c-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .c-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .c-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .c-breadcrumb a:hover { color: var(--primary-dark); }
    .c-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .c-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .c-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 70px 0; text-align: center; overflow: hidden; }
    .c-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .c-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .c-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .c-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .c-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .c-grid-section { padding: 60px 0 90px; }
    .c-grid-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }
    
    .calc-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }
    
    .calc-card { background: var(--white); border-radius: var(--radius-lg); padding: 35px 30px; text-align: center; border: 1px solid rgba(20,93,160,0.08); transition: var(--tr); display: flex; flex-direction: column; align-items: center; text-decoration: none; position: relative; overflow: hidden; }
    .calc-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--primary-light), var(--primary)); opacity: 0; transition: var(--tr); }
    .calc-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); border-color: transparent; }
    .calc-card:hover::before { opacity: 1; }
    
    .calc-icon { width: 80px; height: 80px; border-radius: 50%; background: var(--secondary); display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--primary); margin-bottom: 20px; transition: var(--tr); }
    .calc-card:hover .calc-icon { background: var(--primary); color: var(--white); box-shadow: 0 8px 20px rgba(20,93,160,0.2); }
    
    .calc-card h3 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 12px; }
    .calc-card p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.6; margin-bottom: 25px; flex-grow: 1; }
    
    .calc-btn { display: inline-flex; align-items: center; justify-content: center; width: 100%; padding: 12px; border-radius: var(--radius-md); background: var(--secondary); color: var(--primary-dark); font-weight: 600; font-size: 0.95rem; transition: var(--tr); gap: 8px; }
    .calc-card:hover .calc-btn { background: var(--primary-subtle); color: var(--primary); }

    .calc-card.gold-card:hover::before { background: linear-gradient(90deg, var(--gold-light), var(--gold)); }
    .calc-card.gold-card:hover .calc-icon { background: var(--gold); box-shadow: 0 8px 20px rgba(184,134,59,0.2); }
    .calc-card.gold-card:hover .calc-btn { background: rgba(184,134,59,0.08); color: var(--gold-dark); }

    @media (max-width: 768px) {
        .c-hero h1 { font-size: 2.2rem; }
        .calc-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Islamic Calculators</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <div class="c-hero-badge"><i class="fas fa-calculator"></i> Smart Tools</div>
            <h1>Islamic <span>Calculators</span> Hub</h1>
            <p>Accurate, real-time calculators to help you fulfill your Islamic financial obligations according to Shariah.</p>
        </div>
    </section>

    <section class="c-grid-section">
        <div class="c-grid-inner">
            <div class="calc-grid">
                
                <a href="<?php echo e(route('zakat.index')); ?>" class="calc-card">
                    <div class="calc-icon"><i class="fas fa-hand-holding-usd"></i></div>
                    <h3>Zakat Calculator</h3>
                    <p>Calculate your total Zakat obligation on cash, business, gold, and silver based on live Nisab values.</p>
                    <div class="calc-btn">Open Calculator <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('calculators.zakat_gold')); ?>" class="calc-card gold-card">
                    <div class="calc-icon"><i class="fas fa-coins"></i></div>
                    <h3>Zakat on Gold</h3>
                    <p>A specialized calculator to determine Zakat strictly on gold assets, jewelry, and bullion.</p>
                    <div class="calc-btn">Open Calculator <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('calculators.zakat_silver')); ?>" class="calc-card">
                    <div class="calc-icon"><i class="fas fa-ring" style="color:#A0A9B0;"></i></div>
                    <h3>Zakat on Silver</h3>
                    <p>Calculate Zakat specifically for silver assets and utensils using the current silver market rate.</p>
                    <div class="calc-btn">Open Calculator <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('calculators.fidya')); ?>" class="calc-card">
                    <div class="calc-icon"><i class="fas fa-bread-slice"></i></div>
                    <h3>Fidya Calculator</h3>
                    <p>Unable to fast in Ramadan due to chronic illness or old age? Calculate your Fidya compensation.</p>
                    <div class="calc-btn">Open Calculator <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('calculators.kaffarah')); ?>" class="calc-card">
                    <div class="calc-icon"><i class="fas fa-user-shield"></i></div>
                    <h3>Kaffarah Calculator</h3>
                    <p>Calculate the penalty (Kaffarah) for deliberately breaking a Ramadan fast without a valid exemption.</p>
                    <div class="calc-btn">Open Calculator <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('calculators.inheritance')); ?>" class="calc-card">
                    <div class="calc-icon"><i class="fas fa-sitemap"></i></div>
                    <h3>Inheritance (Mirath)</h3>
                    <p>Understand the Islamic distribution of wealth and estimate shares among eligible heirs.</p>
                    <div class="calc-btn">Open Guide <i class="fas fa-arrow-right"></i></div>
                </a>

            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\calculators\index.blade.php ENDPATH**/ ?>