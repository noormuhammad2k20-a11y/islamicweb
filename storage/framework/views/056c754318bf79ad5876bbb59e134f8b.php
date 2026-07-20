

<?php $__env->startSection('title', 'Prophets in Islam — Messengers of Allah'); ?>
<?php $__env->startSection('meta_description', 'Learn about the 25 Prophets mentioned in the Quran by name, their messages, and their significance in Islam.'); ?>
<?php $__env->startSection('meta_keywords', 'prophets in islam, prophets in quran, 25 prophets in islam, messengers of allah, anbiya in islam, ulul azm'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Prophets and Messengers in Islam",
  "description": "Learn about the Prophets mentioned in the Quran, their roles, and their significance in Islam.",
  "author": {
    "@type": "Organization",
    "name": "Noor-e-Islam"
  }
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap');

    :root {
        --primary: #145DA0;
        --primary-dark: #0C3D6E;
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
        --radius-md: 10px;
        --radius-lg: 16px;
        --tr: all 0.25s ease;
    }

    .k-page * { box-sizing: border-box; }
    .k-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; }

    .k-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .k-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; }
    .k-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .k-breadcrumb a:hover { color: var(--primary-dark); }
    .k-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .k-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .k-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 80px 0; text-align: center; overflow: hidden; }
    .k-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; pointer-events: none; }
    .k-hero-inner { max-width: 800px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .k-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; color: var(--white); border: 1px solid rgba(255,255,255,0.12); }
    .k-hero h1 { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .k-hero p { font-size: 1.1rem; color: rgba(255,255,255,0.85); line-height: 1.8; }

    .k-content { padding: 80px 0; }
    .k-content-inner { max-width: 1000px; margin: 0 auto; padding: 0 28px; }

    .intro-text { text-align: center; font-size: 1.1rem; color: var(--text-medium); max-width: 800px; margin: 0 auto 50px; }
    .quran-box { background: var(--secondary); border-left: 4px solid var(--gold); padding: 30px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 0 auto 50px; max-width: 800px; }
    .quran-box .translation { font-style: italic; color: var(--text-dark); margin-bottom: 10px; font-size: 1.05rem; line-height: 1.8; text-align: center; }
    .quran-box .reference { font-weight: 600; color: var(--primary); font-size: 0.9rem; text-align: center; }

    .ulul-azm-section { background: var(--white); border: 1px solid rgba(20,93,160,0.1); border-radius: var(--radius-lg); padding: 40px; margin-bottom: 60px; box-shadow: var(--shadow-sm); }
    .ulul-azm-section h2 { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary-dark); text-align: center; margin-bottom: 15px; }
    .ulul-azm-section p { text-align: center; color: var(--text-medium); margin-bottom: 30px; }

    .ulul-azm-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px; }
    .ulul-card { text-align: center; }
    .ulul-icon { width: 70px; height: 70px; background: var(--primary-subtle); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin: 0 auto 15px; transition: var(--tr); }
    .ulul-card:hover .ulul-icon { background: var(--primary); color: var(--white); box-shadow: 0 5px 15px rgba(20,93,160,0.2); }
    .ulul-card h4 { font-family: 'Playfair Display', serif; font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 5px; }
    .ulul-card span { font-size: 0.85rem; color: var(--text-light); }

    .prophet-list-section { text-align: center; }
    .prophet-list-section h2 { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary-dark); margin-bottom: 30px; }
    
    .names-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
    .name-badge { background: var(--white); border: 1px solid rgba(20,93,160,0.08); padding: 15px 20px; border-radius: var(--radius-md); font-family: 'Amiri', serif; font-size: 1.3rem; color: var(--primary-dark); box-shadow: var(--shadow-sm); transition: var(--tr); display: flex; flex-direction: column; align-items: center; justify-content: center; }
    .name-badge:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    .name-english { font-family: 'Poppins', sans-serif; font-size: 0.9rem; color: var(--text-medium); margin-top: 5px; }

    @media (max-width: 992px) {
        .ulul-azm-grid { grid-template-columns: repeat(3, 1fr); gap: 30px; }
    }
    @media (max-width: 768px) {
        .ulul-azm-grid { grid-template-columns: repeat(2, 1fr); }
        .k-hero h1 { font-size: 2.4rem; }
    }
    @media (max-width: 480px) {
        .ulul-azm-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="k-page">
    <div class="k-breadcrumb">
        <div class="k-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <a href="<?php echo e(route('knowledge.index')); ?>">Knowledge</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <span class="k-breadcrumb-current">Prophets in Islam</span>
        </div>
    </div>

    <section class="k-hero">
        <div class="k-hero-inner">
            <div class="k-hero-badge"><i class="fas fa-dove"></i> Divine Messengers</div>
            <h1>Prophets in <span>Islam</span></h1>
            <p>Belief in all the Prophets and Messengers sent by Allah is a fundamental pillar of Islamic faith.</p>
        </div>
    </section>

    <section class="k-content">
        <div class="k-content-inner">
            
            <p class="intro-text">Islam teaches that Allah has sent guides to every nation throughout history to call people to the worship of the One God (Tawhid) and to teach them righteous conduct. While Islamic tradition mentions that approximately 124,000 prophets were sent to humanity, exactly 25 are mentioned by name in the Holy Quran.</p>

            <div class="quran-box">
                <div class="translation">"And We certainly sent into every nation a messenger, [saying], 'Worship Allah and avoid false deities.'"</div>
                <div class="reference">— Surah An-Nahl (16:36)</div>
            </div>

            <div class="ulul-azm-section">
                <h2>Ulul Azm — The Resolute Messengers</h2>
                <p>Among all the prophets, five are given a special status in the Quran. They are known as <em>Ulul Azm</em> (Those of Steadfast Resolve) due to the extraordinary trials they faced and their unwavering patience in delivering Allah's message.</p>

                <div class="ulul-azm-grid">
                    <div class="ulul-card">
                        <div class="ulul-icon"><i class="fas fa-ship"></i></div>
                        <h4>Nuh (AS)</h4>
                        <span>Noah</span>
                    </div>
                    <div class="ulul-card">
                        <div class="ulul-icon"><i class="fas fa-fire"></i></div>
                        <h4>Ibrahim (AS)</h4>
                        <span>Abraham</span>
                    </div>
                    <div class="ulul-card">
                        <div class="ulul-icon"><i class="fas fa-mountain"></i></div>
                        <h4>Musa (AS)</h4>
                        <span>Moses</span>
                    </div>
                    <div class="ulul-card">
                        <div class="ulul-icon"><i class="fas fa-cross"></i></div>
                        <h4>Isa (AS)</h4>
                        <span>Jesus</span>
                    </div>
                    <div class="ulul-card">
                        <div class="ulul-icon"><i class="fas fa-quran"></i></div>
                        <h4>Muhammad (ﷺ)</h4>
                        <span>The Seal</span>
                    </div>
                </div>
            </div>

            <div class="prophet-list-section">
                <h2>The 25 Prophets Mentioned in the Quran</h2>
                
                <div class="names-grid">
                    <div class="name-badge">آدَم <span class="name-english">Adam (AS)</span></div>
                    <div class="name-badge">إِدْرِيس <span class="name-english">Idris (Enoch) (AS)</span></div>
                    <div class="name-badge">نُوح <span class="name-english">Nuh (Noah) (AS)</span></div>
                    <div class="name-badge">هُود <span class="name-english">Hud (AS)</span></div>
                    <div class="name-badge">صَالِح <span class="name-english">Salih (AS)</span></div>
                    <div class="name-badge">إِبْرَاهِيم <span class="name-english">Ibrahim (Abraham) (AS)</span></div>
                    <div class="name-badge">لُوط <span class="name-english">Lut (Lot) (AS)</span></div>
                    <div class="name-badge">إِسْمَاعِيل <span class="name-english">Ismail (Ishmael) (AS)</span></div>
                    <div class="name-badge">إِسْحَاق <span class="name-english">Ishaq (Isaac) (AS)</span></div>
                    <div class="name-badge">يَعْقُوب <span class="name-english">Yaqub (Jacob) (AS)</span></div>
                    <div class="name-badge">يُوسُف <span class="name-english">Yusuf (Joseph) (AS)</span></div>
                    <div class="name-badge">أَيُّوب <span class="name-english">Ayyub (Job) (AS)</span></div>
                    <div class="name-badge">شُعَيْب <span class="name-english">Shu'ayb (Jethro) (AS)</span></div>
                    <div class="name-badge">مُوسَى <span class="name-english">Musa (Moses) (AS)</span></div>
                    <div class="name-badge">هَارُون <span class="name-english">Harun (Aaron) (AS)</span></div>
                    <div class="name-badge">ذُو الْكِفْل <span class="name-english">Dhul-Kifl (Ezekiel) (AS)</span></div>
                    <div class="name-badge">دَاوُد <span class="name-english">Dawud (David) (AS)</span></div>
                    <div class="name-badge">سُلَيْمَان <span class="name-english">Sulayman (Solomon) (AS)</span></div>
                    <div class="name-badge">إِلْيَاس <span class="name-english">Ilyas (Elijah) (AS)</span></div>
                    <div class="name-badge">الْيَسَع <span class="name-english">Al-Yasa (Elisha) (AS)</span></div>
                    <div class="name-badge">يُونُس <span class="name-english">Yunus (Jonah) (AS)</span></div>
                    <div class="name-badge">زَكَرِيَّا <span class="name-english">Zakariyya (Zechariah) (AS)</span></div>
                    <div class="name-badge">يَحْيَى <span class="name-english">Yahya (John) (AS)</span></div>
                    <div class="name-badge">عِيسَى <span class="name-english">Isa (Jesus) (AS)</span></div>
                    <div class="name-badge">مُحَمَّد <span class="name-english">Muhammad (ﷺ)</span></div>
                </div>
            </div>

        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/knowledge/prophets.blade.php ENDPATH**/ ?>