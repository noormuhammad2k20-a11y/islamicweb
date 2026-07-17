

<?php $__env->startSection('title', 'Who Can Receive Zakat? — The 8 Eligible Categories'); ?>
<?php $__env->startSection('meta_description', 'Discover the 8 categories of people eligible to receive Zakat as outlined in the Quran (Surah At-Tawbah 9:60), including the poor, the needy, and those in debt.'); ?>
<?php $__env->startSection('meta_keywords', 'who can receive zakat, zakat recipients, 8 categories of zakat, asnaf, faqir, miskin, who is eligible for zakat, surah tawbah 60'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Who Can Receive Zakat?",
  "description": "Discover the 8 categories of people eligible to receive Zakat as outlined in the Quran.",
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
        --radius-lg: 16px;
        --radius-md: 10px;
        --tr: all 0.25s ease;
    }

    .z-page * { box-sizing: border-box; }
    .z-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; -webkit-font-smoothing: antialiased; }

    .z-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .z-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .z-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .z-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .z-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .z-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .z-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .z-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .z-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .z-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .z-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .z-content-section { padding: 70px 0; }
    .z-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }
    
    .z-main-content { background: var(--white); padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); }
    .z-main-content h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .z-main-content h2:first-child { margin-top: 0; }
    .z-main-content p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 16px; }

    .quran-box { background: var(--secondary); border-top: 4px solid var(--gold); padding: 30px; border-radius: var(--radius-md); margin: 30px 0; text-align: center; }
    .quran-box .arabic { font-family: 'Amiri', serif; font-size: 1.6rem; color: var(--primary-dark); line-height: 2; margin-bottom: 15px; direction: rtl; }
    .quran-box .translation { font-style: italic; color: var(--text-medium); margin-bottom: 10px; font-size: 0.95rem; }
    .quran-box .reference { font-weight: 600; color: var(--text-dark); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; }

    .categories-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-top: 30px; }
    .cat-card { background: var(--white); border: 1px solid rgba(20,93,160,0.1); padding: 25px; border-radius: var(--radius-md); transition: var(--tr); }
    .cat-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); border-color: var(--primary-light); }
    .cat-card-header { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; }
    .cat-icon { width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: var(--white); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0; }
    .cat-title h3 { margin: 0; font-size: 1.15rem; color: var(--text-dark); }
    .cat-title span { font-family: 'Amiri', serif; color: var(--gold-dark); font-size: 0.9rem; }
    .cat-card p { margin: 0; font-size: 0.9rem; color: var(--text-medium); }

    .z-sidebar { position: sticky; top: 100px; }
    .z-widget { background: var(--white); padding: 24px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); margin-bottom: 24px; }
    .z-widget h4 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 16px; border-bottom: 1px solid rgba(20,93,160,0.08); padding-bottom: 10px; }
    .z-widget-links { list-style: none; padding: 0; margin: 0; }
    .z-widget-links li { margin-bottom: 10px; }
    .z-widget-links a { display: flex; align-items: center; gap: 10px; text-decoration: none; color: var(--text-medium); font-size: 0.9rem; font-weight: 500; transition: var(--tr); }
    .z-widget-links a:hover { color: var(--primary); transform: translateX(4px); }
    .z-widget-links i { color: var(--gold-light); font-size: 0.8rem; }
    
    .calc-banner { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: var(--radius-lg); padding: 30px 24px; text-align: center; color: var(--white); box-shadow: var(--shadow-md); }
    .calc-banner i { font-size: 2.5rem; color: var(--gold-light); margin-bottom: 16px; }
    .calc-banner h4 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; margin-bottom: 10px; }
    .calc-banner-btn { display: inline-block; background: var(--white); color: var(--primary-dark); text-decoration: none; font-weight: 600; padding: 10px 24px; border-radius: 30px; font-size: 0.9rem; transition: var(--tr); margin-top: 15px; }

    @media (max-width: 992px) {
        .z-content-inner { grid-template-columns: 1fr; }
        .z-sidebar { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    }
    @media (max-width: 768px) {
        .z-hero h1 { font-size: 2.2rem; }
        .categories-grid { grid-template-columns: 1fr; }
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
            <span class="z-breadcrumb-current">Who Can Receive</span>
        </div>
    </div>

    <section class="z-hero">
        <div class="z-hero-inner">
            <div class="z-hero-badge"><i class="fas fa-hand-holding-heart"></i> Distribution</div>
            <h1>Who Can <span>Receive</span> Zakat?</h1>
            <p>Allah (SWT) has explicitly defined the 8 categories of people eligible to receive Zakat in the Holy Quran.</p>
        </div>
    </section>

    <section class="z-content-section">
        <div class="z-content-inner">
            <div class="z-main-content">
                <h2>The 8 Categories (Asnaf)</h2>
                <p>Unlike regular charity (Sadaqah) which can be given to anyone, Zakat is a divine obligation with strict rules on distribution. In Surah At-Tawbah, Allah has restricted the recipients of Zakat to eight specific categories.</p>

                <div class="quran-box">
                    <div class="arabic">إِنَّمَا الصَّدَقَاتُ لِلْفُقَرَاءِ وَالْمَسَاكِينِ وَالْعَامِلِينَ عَلَيْهَا وَالْمُؤَلَّفَةِ قُلُوبُهُمْ وَفِي الرِّقَابِ وَالْغَارِمِينَ وَفِي سَبِيلِ اللَّهِ وَابْنِ السَّبِيلِ ۖ فَرِيضَةً مِّنَ اللَّهِ ۗ وَاللَّهُ عَلِيمٌ حَكِيمٌ</div>
                    <div class="translation">"Zakat expenditures are only for the poor and for the needy and for those employed to collect [zakat] and for bringing hearts together [for Islam] and for freeing captives [or slaves] and for those in debt and for the cause of Allah and for the [stranded] traveler - an obligation [imposed] by Allah. And Allah is Knowing and Wise."</div>
                    <div class="reference">— Surah At-Tawbah (9:60)</div>
                </div>

                <div class="categories-grid">
                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-hands-helping"></i></div>
                            <div class="cat-title">
                                <h3>The Poor</h3>
                                <span>Al-Fuqara'</span>
                            </div>
                        </div>
                        <p>Those who have no income or property and live in absolute poverty, unable to meet their basic daily needs.</p>
                    </div>
                    
                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-house-damage"></i></div>
                            <div class="cat-title">
                                <h3>The Needy</h3>
                                <span>Al-Masakin</span>
                            </div>
                        </div>
                        <p>Those who have some income or property, but it is insufficient to cover their basic necessities (food, shelter, clothing) for the year.</p>
                    </div>

                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-users-cog"></i></div>
                            <div class="cat-title">
                                <h3>Zakat Administrators</h3>
                                <span>Al-Amilina 'Alayha</span>
                            </div>
                        </div>
                        <p>Individuals formally appointed by an Islamic authority to collect and distribute Zakat. They are paid from Zakat funds for their work.</p>
                    </div>

                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-heart"></i></div>
                            <div class="cat-title">
                                <h3>To Reconcile Hearts</h3>
                                <span>Al-Mu'allafatu Qulubuhum</span>
                            </div>
                        </div>
                        <p>New Muslims who are in need of financial support or protection, or those inclining towards Islam who need support.</p>
                    </div>

                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-unlock"></i></div>
                            <div class="cat-title">
                                <h3>Freeing Captives</h3>
                                <span>Fir-Riqab</span>
                            </div>
                        </div>
                        <p>Historically used to purchase the freedom of slaves. Today, it can be applied to freeing unjustly imprisoned individuals or captives.</p>
                    </div>

                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                            <div class="cat-title">
                                <h3>Those in Debt</h3>
                                <span>Al-Gharimin</span>
                            </div>
                        </div>
                        <p>People overwhelmed by halal (permissible) debts that they cannot repay, provided their remaining wealth does not reach the Nisab.</p>
                    </div>

                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-mosque"></i></div>
                            <div class="cat-title">
                                <h3>In the Cause of Allah</h3>
                                <span>Fi Sabilillah</span>
                            </div>
                        </div>
                        <p>Those striving in the path of Allah, defending the faith, or working to establish and protect the Muslim community.</p>
                    </div>

                    <div class="cat-card">
                        <div class="cat-card-header">
                            <div class="cat-icon"><i class="fas fa-route"></i></div>
                            <div class="cat-title">
                                <h3>The Traveler</h3>
                                <span>Ibn As-Sabil</span>
                            </div>
                        </div>
                        <p>A traveler who is stranded away from home without sufficient means to return, even if they are wealthy in their homeland.</p>
                    </div>
                </div>

                <h2>Who Cannot Receive Zakat?</h2>
                <p>It is important to note that you cannot give Zakat to:</p>
                <ul>
                    <li>Your immediate dependents (parents, grandparents, children, grandchildren, or spouse).</li>
                    <li>The family of the Prophet Muhammad (ﷺ) (Banu Hashim).</li>
                    <li>Non-Muslims (they can receive Sadaqah, but not obligatory Zakat).</li>
                    <li>Wealthy individuals whose net assets equal or exceed the Nisab.</li>
                </ul>
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
                    <a href="<?php echo e(route('zakat.index')); ?>" class="calc-banner-btn">Go to Calculator</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\zakat\whocanreceive.blade.php ENDPATH**/ ?>