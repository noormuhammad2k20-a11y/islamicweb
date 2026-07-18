

<?php $__env->startSection('title', 'Kaffarah Calculator — Ramadan Fasting Penalty'); ?>
<?php $__env->startSection('meta_description', 'Calculate your Kaffarah (penalty) for deliberately breaking a Ramadan fast. Learn the rules, cost, and alternatives of Kaffarah in Islam.'); ?>
<?php $__env->startSection('meta_keywords', 'kaffarah calculator, kaffarah for broken fast, ramadan kaffarah, cost of kaffarah, kaffarah penalty'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Kaffarah Calculator",
  "applicationCategory": "CalculatorApplication",
  "description": "Calculate the Kaffarah owed for deliberately breaking a Ramadan fast.",
  "offers": {
    "@type": "Offer",
    "price": "0.00",
    "priceCurrency": "USD"
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

    .c-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .c-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .c-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .c-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .c-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 650px; margin: 0 auto; line-height: 1.8; }

    .c-content { padding: 60px 0; }
    .c-content-inner { max-width: 1000px; margin: 0 auto; padding: 0 28px; }

    .calc-container { background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid rgba(20,93,160,0.08); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; margin-bottom: 60px; }
    
    .calc-form { padding: 40px; }
    .calc-form h3 { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--primary-dark); margin-bottom: 25px; }
    
    .input-group { margin-bottom: 20px; }
    .input-group label { display: block; font-size: 0.9rem; font-weight: 600; color: var(--text-dark); margin-bottom: 8px; }
    .input-wrap { position: relative; }
    .input-wrap i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--primary); font-size: 1rem; }
    .input-field { width: 100%; padding: 14px 16px 14px 45px; border: 1.5px solid rgba(20,93,160,0.15); border-radius: var(--radius-md); font-family: 'Poppins', sans-serif; font-size: 1rem; color: var(--text-dark); transition: var(--tr); outline: none; }
    .input-field:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-subtle); }
    
    .calc-result { background: linear-gradient(135deg, #C0392B, #922B21); padding: 40px; color: var(--white); display: flex; flex-direction: column; justify-content: center; text-align: center; position: relative; }
    .calc-result::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle, var(--white) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; }
    .calc-result h4 { font-size: 1.1rem; color: rgba(255,255,255,0.9); margin-bottom: 15px; font-weight: 500; }
    .result-value { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 800; color: #F5B041; margin-bottom: 10px; line-height: 1; }
    .result-desc { font-size: 0.9rem; color: rgba(255,255,255,0.8); }

    .info-section h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .info-section p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 15px; }
    .info-section ul { padding-left: 20px; margin-bottom: 20px; }
    .info-section li { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 8px; }

    .alert-box { background: rgba(192,57,43,0.05); border-left: 4px solid #C0392B; padding: 20px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 20px 0; }
    .alert-box h4 { color: #C0392B; margin-bottom: 8px; font-size: 1.05rem; }
    .alert-box p { margin: 0; font-size: 0.9rem; color: var(--text-dark); }

    @media (max-width: 768px) {
        .calc-container { grid-template-columns: 1fr; }
        .calc-form, .calc-result { padding: 30px 20px; }
        .result-value { font-size: 2.8rem; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <a href="<?php echo e(route('calculators.index')); ?>">Calculators</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Kaffarah</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <h1>Kaffarah <span>Calculator</span></h1>
            <p>Calculate the penalty owed for deliberately breaking a fast during the month of Ramadan without a valid reason.</p>
        </div>
    </section>

    <section class="c-content">
        <div class="c-content-inner">
            
            <div class="calc-container">
                <div class="calc-form">
                    <h3>Calculate Financial Kaffarah</h3>
                    <div class="input-group">
                        <label>Cost of Two Meals (in your local currency)</label>
                        <div class="input-wrap">
                            <i class="fas fa-money-bill-wave"></i>
                            <input type="number" id="mealCost" class="input-field" value="300" min="0" step="1">
                        </div>
                        <small style="color:var(--text-light); font-size:0.8rem; margin-top:5px; display:block;">Average cost to feed one person two meals for a day.</small>
                    </div>
                    <div class="input-group">
                        <label>Number of Deliberately Broken Fasts</label>
                        <div class="input-wrap">
                            <i class="fas fa-calendar-times"></i>
                            <input type="number" id="brokenDays" class="input-field" value="1" min="1" max="30">
                        </div>
                    </div>
                </div>
                <div class="calc-result">
                    <h4>Total Kaffarah Owed</h4>
                    <div class="result-value" id="kaffarahTotal">18,000</div>
                    <div class="result-desc">Equivalent to feeding 60 poor people per broken fast.</div>
                </div>
            </div>

            <div class="info-section">
                <h2>What is Kaffarah?</h2>
                <p>Kaffarah is a major religious penalty or expiation. In the context of Ramadan, it is mandatory upon a Muslim who deliberately breaks their fast during the day without a valid Islamic exemption (such as illness or travel).</p>

                <div class="alert-box">
                    <h4>The Primary Obligation: Fasting 60 Days</h4>
                    <p>According to Islamic law, the primary Kaffarah for breaking a Ramadan fast intentionally is to fast for <strong>60 consecutive days</strong>. If a person is physically unable to fast for 60 consecutive days due to chronic illness or extreme old age, only then are they permitted to pay the financial Kaffarah (feeding 60 poor people).</p>
                </div>

                <h2>How is the Financial Kaffarah Calculated?</h2>
                <p>If you are unable to fast 60 consecutive days, the financial penalty is to feed 60 poor people two full meals (or feed one poor person two meals a day for 60 days) for <em>each</em> fast you broke intentionally.</p>
                <ul>
                    <li>If you broke <strong>1 fast</strong> intentionally: You must feed 60 poor people.</li>
                    <li>If you broke <strong>2 fasts</strong> intentionally: You must feed 120 poor people.</li>
                </ul>
                
                <h2>Difference Between Fidya and Kaffarah</h2>
                <p><strong>Fidya</strong> is paid for missing a fast due to a valid, chronic inability to fast (e.g., permanent illness or extreme old age). It requires feeding just <strong>one</strong> poor person per missed fast.</p>
                <p><strong>Kaffarah</strong> is a severe penalty for breaking a fast intentionally and without excuse. It requires fasting 60 consecutive days, or feeding <strong>60</strong> poor people per broken fast if fasting is physically impossible.</p>
            </div>

        </div>
    </section>
</div>

<script>
    const mealCostInput = document.getElementById('mealCost');
    const brokenDaysInput = document.getElementById('brokenDays');
    const kaffarahTotal = document.getElementById('kaffarahTotal');

    function calculateKaffarah() {
        const cost = parseFloat(mealCostInput.value) || 0;
        const days = parseInt(brokenDaysInput.value) || 0;
        
        // Kaffarah is 60 people per day broken
        const total = (cost * 60) * days;
        kaffarahTotal.textContent = total.toLocaleString(undefined, { minimumFractionDigits: 0, maximumFractionDigits: 2 });
    }

    mealCostInput.addEventListener('input', calculateKaffarah);
    brokenDaysInput.addEventListener('input', calculateKaffarah);
    
    // Initial calculation
    calculateKaffarah();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/calculators/kaffarah.blade.php ENDPATH**/ ?>