

<?php $__env->startSection('title', 'The 6 Pillars of Iman — Articles of Faith in Islam'); ?>
<?php $__env->startSection('meta_description', 'Learn the Six Pillars of Iman (Articles of Faith) in Islam: Belief in Allah, Angels, Divine Books, Prophets, the Day of Judgment, and Divine Decree.'); ?>
<?php $__env->startSection('meta_keywords', 'pillars of iman, 6 articles of faith, iman in islam, belief in allah, destiny in islam, qadar'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "The 6 Pillars of Iman (Faith)",
  "description": "Learn the Six Pillars of Iman, the internal articles of faith required of every Muslim.",
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

    .hadith-box { background: var(--secondary); border-top: 4px solid var(--gold); padding: 30px; border-radius: var(--radius-md); margin: 0 auto 50px; max-width: 800px; text-align: center; box-shadow: var(--shadow-sm); }
    .hadith-box .text { font-style: italic; color: var(--text-dark); margin-bottom: 10px; font-size: 1.05rem; line-height: 1.8; }
    .hadith-box .reference { font-weight: 600; color: var(--primary); font-size: 0.9rem; }

    .iman-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 30px; }
    
    .iman-card { background: var(--white); border: 1px solid rgba(20,93,160,0.08); border-radius: var(--radius-lg); padding: 35px; box-shadow: var(--shadow-sm); transition: var(--tr); position: relative; overflow: hidden; }
    .iman-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    .iman-card::before { content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--primary); transition: var(--tr); opacity: 0; }
    .iman-card:hover::before { opacity: 1; }
    
    .iman-icon { width: 60px; height: 60px; border-radius: 50%; background: var(--primary-subtle); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 20px; }
    .iman-card h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--primary-dark); margin-bottom: 5px; }
    .iman-card h4 { font-family: 'Amiri', serif; font-size: 1.1rem; color: var(--gold-dark); margin-bottom: 15px; font-weight: 700; }
    .iman-card p { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 0; line-height: 1.8; }

    @media (max-width: 768px) {
        .k-hero h1 { font-size: 2.4rem; }
        .iman-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="k-page">
    <div class="k-breadcrumb">
        <div class="k-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <a href="<?php echo e(route('knowledge.index')); ?>">Knowledge</a>
            <i class="fas fa-chevron-right k-breadcrumb-sep"></i>
            <span class="k-breadcrumb-current">The 6 Pillars of Iman</span>
        </div>
    </div>

    <section class="k-hero">
        <div class="k-hero-inner">
            <div class="k-hero-badge"><i class="fas fa-heart"></i> Internal Belief</div>
            <h1>The 6 <span>Pillars</span> of Iman</h1>
            <p>While the Pillars of Islam govern outward actions, the Pillars of Iman (Faith) govern the inward beliefs required of a Muslim.</p>
        </div>
    </section>

    <section class="k-content">
        <div class="k-content-inner">
            
            <p class="intro-text">Iman translates to "Faith" or "Belief". In the famous Hadith of Jibril, the Angel Gabriel asked the Prophet (PBUH) about the core tenets of faith. The Prophet's response established the six fundamental beliefs that every Muslim must hold in their heart.</p>

            <div class="hadith-box">
                <div class="text">"Faith is to believe in Allah, His angels, His books, His messengers, the Last Day, and to believe in divine destiny, both the good and the evil thereof."</div>
                <div class="reference">— Prophet Muhammad (ﷺ) [Sahih Muslim]</div>
            </div>

            <div class="iman-grid">
                
                <div class="iman-card">
                    <div class="iman-icon"><i class="fas fa-fingerprint"></i></div>
                    <h3>1. Belief in Allah</h3>
                    <h4>التوحيد (Tawhid)</h4>
                    <p>The core of Islam is strict monotheism. A Muslim must believe that there is only one God, Allah. He has no partners, no parents, and no children. He is the Creator, the Sustainer, and the Master of the universe. He possesses perfect names and attributes.</p>
                </div>

                <div class="iman-card">
                    <div class="iman-icon"><i class="fas fa-feather"></i></div>
                    <h3>2. Belief in His Angels</h3>
                    <h4>الملائكة (Al-Mala'ikah)</h4>
                    <p>Muslims believe in the existence of angels, unseen beings created from light. They do not possess free will and exist solely to obey and worship Allah. Examples include Jibril (Gabriel) who brought revelation, and Mika'il (Michael).</p>
                </div>

                <div class="iman-card">
                    <div class="iman-icon"><i class="fas fa-book-open"></i></div>
                    <h3>3. Belief in His Books</h3>
                    <h4>الكتب (Al-Kutub)</h4>
                    <p>Muslims believe in all original divine scriptures sent by Allah to various prophets for guidance. This includes the Tawrat (Torah) given to Moses, the Zabur (Psalms) to David, the Injeel (Gospel) to Jesus, and the final preservation of guidance: the Quran given to Muhammad.</p>
                </div>

                <div class="iman-card">
                    <div class="iman-icon"><i class="fas fa-users"></i></div>
                    <h3>4. Belief in His Messengers</h3>
                    <h4>الرسل (Ar-Rusul)</h4>
                    <p>Muslims believe that Allah chose specific human beings to deliver His message to humanity. A Muslim must believe in all of them without distinction—from Adam, Noah, Abraham, Moses, and Jesus, ending with the final Prophet, Muhammad (peace be upon them all).</p>
                </div>

                <div class="iman-card">
                    <div class="iman-icon"><i class="fas fa-hourglass-end"></i></div>
                    <h3>5. Belief in the Last Day</h3>
                    <h4>اليوم الآخر (Al-Yawm Al-Akhir)</h4>
                    <p>Belief in the Day of Judgment is central to accountability in Islam. It is the belief that this world will end, and all humanity will be resurrected by Allah to be judged for their earthly deeds, resulting in admission to Jannah (Paradise) or Jahannam (Hell).</p>
                </div>

                <div class="iman-card">
                    <div class="iman-icon"><i class="fas fa-balance-scale-right"></i></div>
                    <h3>6. Belief in Divine Decree</h3>
                    <h4>القدر (Al-Qadar)</h4>
                    <p>Muslims believe that Allah has supreme knowledge and power over everything in the universe. Everything that happens—good or perceived bad—occurs by His Will and according to His pre-ordained decree, while humans simultaneously possess free will to choose their actions.</p>
                </div>

            </div>

        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\knowledge\pillars_iman.blade.php ENDPATH**/ ?>