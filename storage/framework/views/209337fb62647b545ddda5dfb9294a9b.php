

<?php $__env->startSection('title', 'Zakat Nisab Thresholds 2024 — Gold & Silver Nisab Value'); ?>
<?php $__env->startSection('meta_description', 'Understand the Zakat Nisab threshold for gold, silver, and cash. Learn the current Nisab values in Islam and how it determines your Zakat eligibility.'); ?>
<?php $__env->startSection('meta_keywords', 'zakat nisab, nisab threshold, nisab of gold, nisab of silver, zakat eligibility, nisab 2024, nisab value, what is nisab, islamic nisab'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo e(url()->current()); ?>"
  },
  "headline": "Zakat Nisab Thresholds Explained",
  "description": "Understand the Zakat Nisab threshold for gold, silver, and cash. Learn the current Nisab values in Islam and how it determines your Zakat eligibility.",
  "author": {
    "@type": "Organization",
    "name": "Noor-e-Islam"
  }
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the Nisab for gold?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Nisab for gold is 87.48 grams (or 7.5 tolas). If you possess this amount of gold or its cash equivalent for a full lunar year, Zakat becomes obligatory."
      }
    },
    {
      "@type": "Question",
      "name": "What is the Nisab for silver?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "The Nisab for silver is 612.36 grams (or 52.5 tolas). Many contemporary scholars recommend using the silver standard for cash to benefit the poor."
      }
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
        --primary-glow: rgba(20, 93, 160, 0.25);
        --primary-subtle: rgba(20, 93, 160, 0.07);
        --secondary: #F5F8F7;
        --secondary-light: #FBFDFC;
        --gold: #B8863B;
        --gold-light: #D9AE6C;
        --gold-dark: #8C631F;
        --text-dark: #15211D;
        --text-medium: #44544E;
        --text-light: #76867F;
        --white: #ffffff;
        --shadow-sm: 0 1px 4px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 16px rgba(0,0,0,0.07);
        --shadow-lg: 0 8px 32px rgba(0,0,0,0.10);
        --radius-sm: 6px;
        --radius-md: 10px;
        --radius-lg: 16px;
        --tr: all 0.25s ease;
    }

    .z-page * { box-sizing: border-box; }
    .z-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; -webkit-font-smoothing: antialiased; }

    /* ====== BREADCRUMB ====== */
    .z-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .z-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .z-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .z-breadcrumb a:hover { color: var(--primary-dark); }
    .z-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .z-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    /* ====== HERO ====== */
    .z-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .z-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .z-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .z-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .z-hero-badge i { color: var(--gold-light); }
    .z-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .z-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    /* ====== CONTENT ====== */
    .z-content-section { padding: 70px 0; }
    .z-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }
    
    .z-main-content { background: var(--white); padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); }
    .z-main-content h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .z-main-content h2:first-child { margin-top: 0; }
    .z-main-content h3 { font-size: 1.3rem; font-weight: 600; color: var(--text-dark); margin-bottom: 16px; margin-top: 30px; }
    .z-main-content p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 16px; }
    .z-main-content ul { padding-left: 20px; margin-bottom: 20px; }
    .z-main-content li { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 8px; position: relative; }
    .z-main-content li::marker { color: var(--primary); }

    /* ====== NISAB CARDS ====== */
    .nisab-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin: 30px 0; }
    .nisab-card { background: var(--secondary-light); border: 1px solid rgba(20,93,160,0.08); border-radius: var(--radius-md); padding: 24px; text-align: center; position: relative; overflow: hidden; }
    .nisab-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px; }
    .nisab-card.gold::before { background: var(--gold); }
    .nisab-card.silver::before { background: #A0A9B0; }
    .nisab-card-icon { font-size: 2rem; margin-bottom: 15px; }
    .nisab-card.gold .nisab-card-icon { color: var(--gold); }
    .nisab-card.silver .nisab-card-icon { color: #83919A; }
    .nisab-card h3 { margin: 0 0 10px !important; font-size: 1.4rem !important; }
    .nisab-value { font-size: 1.1rem; font-weight: 600; color: var(--primary-dark); background: var(--white); display: inline-block; padding: 6px 16px; border-radius: 30px; margin-bottom: 10px; border: 1px solid rgba(0,0,0,0.05); box-shadow: var(--shadow-sm); }
    .nisab-card p { font-size: 0.85rem !important; margin: 0 !important; }

    /* ====== HADITH BOX ====== */
    .hadith-box { background: var(--secondary); border-left: 4px solid var(--primary); padding: 24px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 30px 0; font-family: 'Amiri', serif; }
    .hadith-text { font-size: 1.2rem; color: var(--text-dark); line-height: 1.8; margin-bottom: 12px; }
    .hadith-ref { font-size: 0.9rem; color: var(--text-light); font-family: 'Poppins', sans-serif; font-weight: 500; }

    /* ====== SIDEBAR ====== */
    .z-sidebar { position: sticky; top: 100px; }
    .z-widget { background: var(--white); padding: 24px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); margin-bottom: 24px; }
    .z-widget h4 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 16px; border-bottom: 1px solid rgba(20,93,160,0.08); padding-bottom: 10px; }
    .z-widget-links { list-style: none; padding: 0; margin: 0; }
    .z-widget-links li { margin-bottom: 10px; }
    .z-widget-links li:last-child { margin-bottom: 0; }
    .z-widget-links a { display: flex; align-items: center; gap: 10px; text-decoration: none; color: var(--text-medium); font-size: 0.9rem; font-weight: 500; transition: var(--tr); }
    .z-widget-links a:hover { color: var(--primary); transform: translateX(4px); }
    .z-widget-links i { color: var(--gold-light); font-size: 0.8rem; }

    .calc-banner { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: var(--radius-lg); padding: 30px 24px; text-align: center; color: var(--white); box-shadow: var(--shadow-md); }
    .calc-banner i { font-size: 2.5rem; color: var(--gold-light); margin-bottom: 16px; }
    .calc-banner h4 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; margin-bottom: 10px; }
    .calc-banner p { font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-bottom: 20px; line-height: 1.6; }
    .calc-banner-btn { display: inline-block; background: var(--white); color: var(--primary-dark); text-decoration: none; font-weight: 600; padding: 10px 24px; border-radius: 30px; font-size: 0.9rem; transition: var(--tr); }
    .calc-banner-btn:hover { background: var(--gold); color: var(--white); }

    /* ====== FAQ ====== */
    .z-faq { margin-top: 40px; }
    .z-faq-item { border: 1px solid rgba(20,93,160,0.1); border-radius: var(--radius-sm); margin-bottom: 12px; overflow: hidden; }
    .z-faq-q { background: var(--secondary-light); padding: 16px 20px; font-weight: 600; color: var(--primary-dark); cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-size: 0.95rem; }
    .z-faq-q i { transition: var(--tr); color: var(--primary); }
    .z-faq-a { padding: 0 20px; max-height: 0; overflow: hidden; transition: max-height 0.3s ease; background: var(--white); font-size: 0.9rem; color: var(--text-medium); line-height: 1.7; }
    .z-faq-item.active .z-faq-q { background: var(--primary-subtle); }
    .z-faq-item.active .z-faq-q i { transform: rotate(180deg); }
    .z-faq-item.active .z-faq-a { padding: 16px 20px; max-height: 500px; }

    @media (max-width: 992px) {
        .z-content-inner { grid-template-columns: 1fr; }
        .z-sidebar { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    }
    @media (max-width: 768px) {
        .z-hero h1 { font-size: 2.2rem; }
        .nisab-grid { grid-template-columns: 1fr; }
        .z-sidebar { grid-template-columns: 1fr; }
        .z-main-content { padding: 24px; }
    }
</style>

<div class="z-page">
    <div class="z-breadcrumb">
        <div class="z-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right z-breadcrumb-sep"></i>
            <a href="<?php echo e(route('zakat.index')); ?>">Zakat</a>
            <i class="fas fa-chevron-right z-breadcrumb-sep"></i>
            <span class="z-breadcrumb-current">Nisab Thresholds</span>
        </div>
    </div>

    <section class="z-hero">
        <div class="z-hero-inner">
            <div class="z-hero-badge"><i class="fas fa-balance-scale"></i> Wealth Threshold</div>
            <h1>Zakat <span>Nisab</span> Thresholds</h1>
            <p>Understand the minimum amount of wealth a Muslim must possess before Zakat becomes obligatory.</p>
        </div>
    </section>

    <section class="z-content-section">
        <div class="z-content-inner">
            <div class="z-main-content">
                <h2>What is Nisab?</h2>
                <p><strong>Nisab</strong> (نصاب) is the minimum threshold of wealth that a Muslim must possess for one full lunar year (Hawl) before Zakat becomes obligatory upon them. If your zakatable wealth falls below this amount at any point during the year, the year resets once your wealth reaches the Nisab again.</p>
                
                <div class="hadith-box">
                    <div class="hadith-text">"No Zakat is payable on property until a year passes upon it."</div>
                    <div class="hadith-ref">Sunan Ibn Majah (1792)</div>
                </div>

                <h2>The Two Standards of Nisab</h2>
                <p>During the time of Prophet Muhammad (ﷺ), the Nisab was set using the two primary currencies: gold and silver. Today, we calculate the Nisab based on the current market value of these metals.</p>

                <div class="nisab-grid">
                    <div class="nisab-card gold">
                        <div class="nisab-card-icon"><i class="fas fa-coins"></i></div>
                        <h3>Gold Nisab</h3>
                        <div class="nisab-value">87.48 Grams</div>
                        <p>(Equates to 7.5 Tolas / 3 Ounces)</p>
                    </div>
                    <div class="nisab-card silver">
                        <div class="nisab-card-icon"><i class="fas fa-coins" style="color:#A0A9B0;"></i></div>
                        <h3>Silver Nisab</h3>
                        <div class="nisab-value">612.36 Grams</div>
                        <p>(Equates to 52.5 Tolas / 21 Ounces)</p>
                    </div>
                </div>

                <h2>Which Nisab should I use?</h2>
                <p>Contemporary Islamic scholars generally advise using the <strong>Silver Nisab</strong> to evaluate your wealth (cash, savings, business assets). Because the value of silver is significantly lower than gold today, using the silver standard means the threshold is lower. This results in more people paying Zakat, which ultimately benefits the poor and needy.</p>
                <p>However, if your wealth consists <em>entirely</em> of gold, you would evaluate it against the Gold Nisab.</p>

                <h2>How to Calculate if you meet the Nisab</h2>
                <ul>
                    <li><strong>Step 1:</strong> Determine the current market rate for 1 gram of silver in your local currency.</li>
                    <li><strong>Step 2:</strong> Multiply that rate by 612.36.</li>
                    <li><strong>Step 3:</strong> The resulting figure is the Nisab threshold.</li>
                    <li><strong>Step 4:</strong> If your total Zakatable wealth (Cash, Gold, Silver, Investments, Business inventory minus immediate debts) equals or exceeds this figure, Zakat is due.</li>
                </ul>

                <div class="z-faq">
                    <h2>Frequently Asked Questions</h2>
                    <div class="z-faq-item">
                        <div class="z-faq-q">What if my wealth fluctuates during the year? <i class="fas fa-chevron-down"></i></div>
                        <div class="z-faq-a">According to the Hanafi school of thought, as long as your wealth is above the Nisab at the beginning and the end of the Islamic lunar year, fluctuations in between do not matter, provided your wealth never reaches absolute zero. If it reaches zero, a new year begins when you acquire Nisab again.</div>
                    </div>
                    <div class="z-faq-item">
                        <div class="z-faq-q">Do I use my local currency to check Nisab? <i class="fas fa-chevron-down"></i></div>
                        <div class="z-faq-a">Yes. You should check the value of 612.36 grams of silver in your local currency (e.g., PKR, USD, GBP) on the day your Zakat is due to see if your cash and assets meet the threshold.</div>
                    </div>
                    <div class="z-faq-item">
                        <div class="z-faq-q">What is a Lunar Year (Hawl)? <i class="fas fa-chevron-down"></i></div>
                        <div class="z-faq-a">A lunar year is based on the Hijri calendar, which is approximately 354 days long (about 11 days shorter than the Gregorian calendar). You must calculate your Zakat based on the Islamic year.</div>
                    </div>
                </div>
            </div>

            <div class="z-sidebar">
                <div class="z-widget">
                    <h4>Zakat Guide</h4>
                    <ul class="z-widget-links">
                        <li><a href="<?php echo e(route('zakat.index')); ?>"><i class="fas fa-calculator"></i> Zakat Calculator</a></li>
                        <li><a href="<?php echo e(route('zakat.rules')); ?>"><i class="fas fa-book"></i> Zakat Rules & Conditions</a></li>
                        <li><a href="<?php echo e(route('zakat.nisab')); ?>"><i class="fas fa-balance-scale"></i> Nisab Threshold</a></li>
                        <li><a href="<?php echo e(route('zakat.whomustpay')); ?>"><i class="fas fa-user-check"></i> Who Must Pay Zakat?</a></li>
                        <li><a href="<?php echo e(route('zakat.whocanreceive')); ?>"><i class="fas fa-hand-holding-heart"></i> Who Can Receive Zakat?</a></li>
                    </ul>
                </div>
                
                <div class="calc-banner">
                    <i class="fas fa-calculator"></i>
                    <h4>Calculate Your Zakat</h4>
                    <p>Use our accurate, online calculator based on real-time Nisab values.</p>
                    <a href="<?php echo e(route('zakat.index')); ?>" class="calc-banner-btn">Go to Calculator</a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.querySelectorAll('.z-faq-q').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var item = this.parentElement;
            item.classList.toggle('active');
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\zakat\nisab.blade.php ENDPATH**/ ?>