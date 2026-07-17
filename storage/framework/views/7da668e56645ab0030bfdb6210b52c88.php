

<?php $__env->startSection('title', 'Zakat Rules & Conditions — How to Calculate Zakat Correctly'); ?>
<?php $__env->startSection('meta_description', 'Learn the complete rules of Zakat in Islam. Discover what assets are zakatable, how to calculate it, and the conditions for paying Zakat.'); ?>
<?php $__env->startSection('meta_keywords', 'zakat rules, how to calculate zakat, zakat conditions, what is zakatable, zakat in islam, rules of zakat on gold, zakat on business'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Zakat Rules & Conditions",
  "description": "Learn the complete rules of Zakat in Islam. Discover what assets are zakatable and how to calculate them.",
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
        --radius-sm: 6px;
        --radius-md: 10px;
        --radius-lg: 16px;
        --tr: all 0.25s ease;
    }

    .z-page * { box-sizing: border-box; }
    .z-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; -webkit-font-smoothing: antialiased; }

    .z-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .z-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .z-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .z-breadcrumb a:hover { color: var(--primary-dark); }
    .z-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .z-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .z-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .z-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .z-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .z-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .z-hero-badge i { color: var(--gold-light); }
    .z-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .z-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .z-content-section { padding: 70px 0; }
    .z-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }
    
    .z-main-content { background: var(--white); padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); }
    .z-main-content h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .z-main-content h2:first-child { margin-top: 0; }
    .z-main-content h3 { font-size: 1.3rem; font-weight: 600; color: var(--text-dark); margin-bottom: 16px; margin-top: 30px; }
    .z-main-content p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 16px; }
    
    .z-table-wrap { overflow-x: auto; margin: 30px 0; border-radius: var(--radius-md); border: 1px solid rgba(20,93,160,0.1); }
    table { width: 100%; border-collapse: collapse; text-align: left; }
    th { background: var(--secondary); padding: 16px 20px; font-weight: 600; color: var(--primary-dark); font-size: 0.95rem; }
    td { padding: 16px 20px; border-top: 1px solid rgba(20,93,160,0.05); font-size: 0.9rem; color: var(--text-medium); }
    tr:nth-child(even) td { background: rgba(245,248,247,0.5); }
    td i.fa-check-circle { color: #27AE60; margin-right: 8px; }
    td i.fa-times-circle { color: #C0392B; margin-right: 8px; }

    .step-box { display: flex; gap: 20px; margin-bottom: 24px; padding: 20px; background: var(--secondary-light); border-radius: var(--radius-md); border-left: 4px solid var(--primary); }
    .step-num { width: 40px; height: 40px; background: var(--primary); color: var(--white); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.2rem; flex-shrink: 0; }
    .step-content h4 { font-size: 1.1rem; color: var(--text-dark); margin-bottom: 8px; }
    .step-content p { margin: 0; font-size: 0.9rem; }

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
    .calc-banner p { font-size: 0.9rem; color: rgba(255,255,255,0.8); margin-bottom: 20px; line-height: 1.6; }
    .calc-banner-btn { display: inline-block; background: var(--white); color: var(--primary-dark); text-decoration: none; font-weight: 600; padding: 10px 24px; border-radius: 30px; font-size: 0.9rem; transition: var(--tr); }
    .calc-banner-btn:hover { background: var(--gold); color: var(--white); }

    @media (max-width: 992px) {
        .z-content-inner { grid-template-columns: 1fr; }
        .z-sidebar { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    }
    @media (max-width: 768px) {
        .z-hero h1 { font-size: 2.2rem; }
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
            <span class="z-breadcrumb-current">Rules & Conditions</span>
        </div>
    </div>

    <section class="z-hero">
        <div class="z-hero-inner">
            <div class="z-hero-badge"><i class="fas fa-book-open"></i> Islamic Jurisprudence</div>
            <h1>Zakat <span>Rules</span> & Conditions</h1>
            <p>A comprehensive guide on what assets are Zakatable, how to evaluate them, and the rules governing Zakat.</p>
        </div>
    </section>

    <section class="z-content-section">
        <div class="z-content-inner">
            <div class="z-main-content">
                <h2>The Fundamental Rule</h2>
                <p>Zakat is obligatory at the rate of <strong>2.5% (or 1/40th)</strong> on wealth that exceeds the Nisab threshold and has been in the owner's possession for one full Islamic lunar year (Hawl).</p>
                <p>It is not an income tax, but a tax on accumulated, dormant wealth. Assets meant for personal use (like your house, car, or clothes) are exempt from Zakat.</p>

                <h2>What is Zakatable vs Non-Zakatable?</h2>
                <div class="z-table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Asset Category</th>
                                <th>Zakatable?</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cash (at home or in bank)</td>
                                <td><i class="fas fa-check-circle"></i> Yes</td>
                                <td>Subject to 2.5% if total wealth meets Nisab.</td>
                            </tr>
                            <tr>
                                <td>Gold & Silver</td>
                                <td><i class="fas fa-check-circle"></i> Yes</td>
                                <td>Applies to jewelry, coins, and bullion.</td>
                            </tr>
                            <tr>
                                <td>Business Inventory</td>
                                <td><i class="fas fa-check-circle"></i> Yes</td>
                                <td>Goods intended for sale are valued at current market price.</td>
                            </tr>
                            <tr>
                                <td>Personal Residence</td>
                                <td><i class="fas fa-times-circle"></i> No</td>
                                <td>The home you live in is exempt.</td>
                            </tr>
                            <tr>
                                <td>Rental Properties</td>
                                <td><i class="fas fa-check-circle"></i> On Income</td>
                                <td>The property itself is exempt, but the rental income saved is Zakatable.</td>
                            </tr>
                            <tr>
                                <td>Personal Vehicles</td>
                                <td><i class="fas fa-times-circle"></i> No</td>
                                <td>Vehicles for personal use are exempt.</td>
                            </tr>
                            <tr>
                                <td>Shares / Stocks (for trading)</td>
                                <td><i class="fas fa-check-circle"></i> Yes</td>
                                <td>Total market value is subject to Zakat.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2>Step-by-Step Calculation Guide</h2>
                <div class="step-box">
                    <div class="step-num">1</div>
                    <div class="step-content">
                        <h4>Evaluate All Assets</h4>
                        <p>Total up all your cash, gold, silver, business inventory, and tradable investments based on their current market value on the day your Zakat is due.</p>
                    </div>
                </div>
                <div class="step-box">
                    <div class="step-num">2</div>
                    <div class="step-content">
                        <h4>Deduct Immediate Liabilities</h4>
                        <p>Subtract any immediate debts or bills that are due within the next lunar year. Long-term debts (like a 30-year mortgage) should only have the upcoming year's installments deducted.</p>
                    </div>
                </div>
                <div class="step-box">
                    <div class="step-num">3</div>
                    <div class="step-content">
                        <h4>Compare against Nisab</h4>
                        <p>Check if your net wealth equals or exceeds the current Nisab value (usually the silver standard: 612.36g).</p>
                    </div>
                </div>
                <div class="step-box">
                    <div class="step-num">4</div>
                    <div class="step-content">
                        <h4>Calculate 2.5%</h4>
                        <p>If your net wealth is above Nisab, multiply it by 0.025 to find your obligatory Zakat amount.</p>
                    </div>
                </div>

                <h2>Rules regarding Debts</h2>
                <p>If you have lent money to someone, do you pay Zakat on it?</p>
                <p><strong>Strong Debts:</strong> If the debt is likely to be repaid (the debtor acknowledges it and is capable of paying), it is Zakatable each year. You can either pay it annually or wait until you receive it and pay for all past years.</p>
                <p><strong>Weak Debts:</strong> If it is unlikely to be repaid, you do not pay Zakat on it until you actually receive it, and then only for that year (according to many scholars).</p>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\zakat\rules.blade.php ENDPATH**/ ?>