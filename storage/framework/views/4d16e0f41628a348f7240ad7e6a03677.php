

<?php $__env->startSection('title', 'Islamic Knowledge Hub — Learn About Islam'); ?>
<?php $__env->startSection('meta_description', 'Explore the Islamic Knowledge Hub. Learn about the 5 Pillars of Islam, 6 Pillars of Iman, the Prophets, Islamic History, and fascinating facts.'); ?>
<?php $__env->startSection('meta_keywords', 'islamic knowledge, learn islam, pillars of islam, history of islam, prophets in quran, islamic facts'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "The 5 Pillars of Islam",
      "url": "<?php echo e(route('knowledge.pillars_islam')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "The 6 Pillars of Iman",
      "url": "<?php echo e(route('knowledge.pillars_iman')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Prophets in Islam",
      "url": "<?php echo e(route('knowledge.prophets')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 4,
      "name": "Islamic History",
      "url": "<?php echo e(route('knowledge.history')); ?>"
    },
    {
      "@type": "ListItem",
      "position": 5,
      "name": "Islamic Facts",
      "url": "<?php echo e(route('knowledge.facts')); ?>"
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

    .k-page * { box-sizing: border-box; }
    .k-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); -webkit-font-smoothing: antialiased; }

    .k-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .k-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .k-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .k-breadcrumb a:hover { color: var(--primary-dark); }
    .k-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .k-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .k-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 70px 0; text-align: center; overflow: hidden; }
    .k-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .k-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .k-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .k-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .k-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .k-grid-section { padding: 60px 0 90px; }
    .k-grid-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }
    
    .knowledge-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }
    
    .knowledge-card { background: var(--white); border-radius: var(--radius-lg); padding: 35px 30px; text-align: center; border: 1px solid rgba(20,93,160,0.08); transition: var(--tr); display: flex; flex-direction: column; align-items: center; text-decoration: none; position: relative; overflow: hidden; }
    .knowledge-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--primary-light), var(--primary)); opacity: 0; transition: var(--tr); }
    .knowledge-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); border-color: transparent; }
    .knowledge-card:hover::before { opacity: 1; }
    
    .knowledge-icon { width: 80px; height: 80px; border-radius: 50%; background: var(--secondary); display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--primary); margin-bottom: 20px; transition: var(--tr); }
    .knowledge-card:hover .knowledge-icon { background: var(--primary); color: var(--white); box-shadow: 0 8px 20px rgba(20,93,160,0.2); }
    
    .knowledge-card h3 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 12px; }
    .knowledge-card p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.6; margin-bottom: 25px; flex-grow: 1; }
    
    .knowledge-btn { display: inline-flex; align-items: center; justify-content: center; width: 100%; padding: 12px; border-radius: var(--radius-md); background: var(--secondary); color: var(--primary-dark); font-weight: 600; font-size: 0.95rem; transition: var(--tr); gap: 8px; }
    .knowledge-card:hover .knowledge-btn { background: var(--primary-subtle); color: var(--primary); }

    @media (max-width: 768px) {
        .k-hero h1 { font-size: 2.2rem; }
        .knowledge-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="k-page">
    <div class="k-breadcrumb">
        <div class="k-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <span class="k-breadcrumb-current">Islamic Knowledge</span>
        </div>
    </div>

    <section class="k-hero">
        <div class="k-hero-inner">
            <div class="k-hero-badge"><i class="fas fa-book-open"></i> Learn & Grow</div>
            <h1>Islamic <span>Knowledge</span> Hub</h1>
            <p>Explore the fundamental teachings, history, and wisdom of Islam.</p>
        </div>
    </section>

    <section class="k-grid-section">
        <div class="k-grid-inner">
            <div class="knowledge-grid">
                
                <a href="<?php echo e(route('knowledge.pillars_islam')); ?>" class="knowledge-card">
                    <div class="knowledge-icon"><i class="fas fa-mosque"></i></div>
                    <h3>The 5 Pillars of Islam</h3>
                    <p>Discover the physical foundations of Islamic practice: Faith, Prayer, Charity, Fasting, and Pilgrimage.</p>
                    <div class="knowledge-btn">Read Article <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('knowledge.pillars_iman')); ?>" class="knowledge-card">
                    <div class="knowledge-icon"><i class="fas fa-heart"></i></div>
                    <h3>The 6 Pillars of Iman</h3>
                    <p>Learn the internal articles of faith every Muslim must believe in, from Allah to the Divine Decree.</p>
                    <div class="knowledge-btn">Read Article <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('knowledge.prophets')); ?>" class="knowledge-card">
                    <div class="knowledge-icon"><i class="fas fa-dove"></i></div>
                    <h3>Prophets in Islam</h3>
                    <p>Explore the 25 Messengers of Allah mentioned by name in the Quran, including the Ulul Azm.</p>
                    <div class="knowledge-btn">Read Article <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('knowledge.history')); ?>" class="knowledge-card">
                    <div class="knowledge-icon"><i class="fas fa-landmark"></i></div>
                    <h3>Islamic History</h3>
                    <p>A timeline of the most significant events, from the birth of Prophet Muhammad (PBUH) to the Khulafa Rashidun.</p>
                    <div class="knowledge-btn">Read Article <i class="fas fa-arrow-right"></i></div>
                </a>

                <a href="<?php echo e(route('knowledge.facts')); ?>" class="knowledge-card">
                    <div class="knowledge-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Fascinating Facts</h3>
                    <p>Did you know? Expand your horizons with amazing facts about Islam, science, and the Muslim world.</p>
                    <div class="knowledge-btn">Read Article <i class="fas fa-arrow-right"></i></div>
                </a>

            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\knowledge\index.blade.php ENDPATH**/ ?>