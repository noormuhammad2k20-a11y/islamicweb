

<?php $__env->startSection('title', 'Zakat on Silver Calculator — Calculate Silver Zakat Online'); ?>
<?php $__env->startSection('meta_description', 'Calculate Zakat on your silver assets and jewelry accurately. Input your silver weight in grams or tolas and get instant Zakat calculations based on current silver rates.'); ?>
<?php $__env->startSection('meta_keywords', 'zakat on silver calculator, silver zakat, how to calculate zakat on silver, nisab of silver, zakat on silver jewelry'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Zakat on Silver Calculator",
  "applicationCategory": "CalculatorApplication",
  "description": "Calculate the Zakat owed specifically on silver assets.",
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
        --secondary: #F5F8F7;
        --secondary-light: #FBFDFC;
        --silver: #9EA9B1;
        --silver-light: #C0C8CF;
        --silver-dark: #6C7A86;
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

    .c-hero { position: relative; background: linear-gradient(160deg, var(--silver-dark) 0%, var(--silver) 45%, var(--silver-light) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .c-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.1; background-image: radial-gradient(circle at 25% 25%, var(--white) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .c-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .c-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; text-shadow: 0 2px 4px rgba(0,0,0,0.15); }
    .c-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.95); max-width: 650px; margin: 0 auto; line-height: 1.8; text-shadow: 0 1px 2px rgba(0,0,0,0.1); }

    .c-content { padding: 60px 0; }
    .c-content-inner { max-width: 1000px; margin: 0 auto; padding: 0 28px; }

    .calc-container { background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid rgba(158,169,177,0.2); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; margin-bottom: 60px; }
    
    .calc-form { padding: 40px; }
    .calc-form h3 { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--silver-dark); margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }
    
    .input-group { margin-bottom: 20px; }
    .input-group label { display: block; font-size: 0.9rem; font-weight: 600; color: var(--text-dark); margin-bottom: 8px; }
    .input-wrap { position: relative; display: flex; }
    .input-wrap i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--silver-dark); font-size: 1rem; }
    .input-field { width: 100%; padding: 14px 16px 14px 45px; border: 1.5px solid rgba(158,169,177,0.3); border-radius: var(--radius-md) 0 0 var(--radius-md); font-family: 'Poppins', sans-serif; font-size: 1rem; color: var(--text-dark); transition: var(--tr); outline: none; }
    .input-field:focus { border-color: var(--silver-dark); box-shadow: 0 0 0 3px rgba(158,169,177,0.15); z-index: 2; }
    
    .unit-select { padding: 0 15px; border: 1.5px solid rgba(158,169,177,0.3); border-left: none; border-radius: 0 var(--radius-md) var(--radius-md) 0; background: var(--secondary); font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--text-dark); outline: none; }
    
    .calc-result { background: linear-gradient(135deg, var(--silver), var(--silver-dark)); padding: 40px; color: var(--white); display: flex; flex-direction: column; justify-content: center; text-align: center; position: relative; }
    .calc-result::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle, var(--white) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; }
    .calc-result h4 { font-size: 1.1rem; color: rgba(255,255,255,0.9); margin-bottom: 15px; font-weight: 500; }
    .result-value { font-family: 'Playfair Display', serif; font-size: 3.2rem; font-weight: 800; color: var(--white); margin-bottom: 10px; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .result-desc { font-size: 0.9rem; color: rgba(255,255,255,0.9); }

    .status-box { margin-top: 20px; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; font-weight: 600; display: flex; align-items: center; gap: 10px; }
    .status-box.eligible { background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.4); }
    .status-box.not-eligible { background: rgba(0,0,0,0.15); border: 1px solid rgba(0,0,0,0.2); color: rgba(255,255,255,0.9); }

    .info-section h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .info-section p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 15px; }

    @media (max-width: 768px) {
        .calc-container { grid-template-columns: 1fr; }
        .calc-form, .calc-result { padding: 30px 20px; }
        .result-value { font-size: 2.5rem; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <a href="<?php echo e(route('calculators.index')); ?>">Calculators</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Zakat on Silver</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <h1>Zakat on <span>Silver</span></h1>
            <p>Calculate Zakat specifically for your silver jewelry, utensils, and assets.</p>
        </div>
    </section>

    <section class="c-content">
        <div class="c-content-inner">
            
            <div class="calc-container">
                <div class="calc-form">
                    <h3><i class="fas fa-ring"></i> Silver Details</h3>
                    <div class="input-group">
                        <label>Current Price of Silver (per Gram)</label>
                        <div class="input-wrap">
                            <i class="fas fa-tags"></i>
                            <input type="number" id="silverRate" class="input-field" style="border-radius:var(--radius-md);" placeholder="e.g. 250" value="250" min="0" step="0.01">
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Total Weight of Silver</label>
                        <div class="input-wrap">
                            <i class="fas fa-balance-scale"></i>
                            <input type="number" id="silverWeight" class="input-field" placeholder="e.g. 500" value="0" min="0" step="0.01">
                            <select id="weightUnit" class="unit-select">
                                <option value="grams">Grams</option>
                                <option value="tolas">Tolas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="calc-result">
                    <h4>Your Zakat on Silver</h4>
                    <div class="result-value" id="zakatTotal">0.00</div>
                    <div class="result-desc" id="silverValue">Total Value: 0.00</div>
                    
                    <div class="status-box not-eligible" id="nisabStatus">
                        <i class="fas fa-times-circle"></i> Below Silver Nisab (612.36g)
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h2>The Nisab for Silver</h2>
                <p>The Nisab (minimum threshold) for silver is <strong>612.36 grams</strong> (equivalent to 52.5 tolas or 21 ounces). If the total weight of all the silver you own equals or exceeds this amount, and you have possessed it for a full Islamic lunar year, Zakat is obligatory.</p>

                <h2>Why is the Silver Nisab important?</h2>
                <p>While the Gold Nisab is quite high in modern currency value, the Silver Nisab is much lower. Most contemporary Islamic scholars advise that the <strong>Silver Nisab</strong> should be used as the benchmark for calculating Zakat on <strong>cash, savings, and business assets</strong>. This ensures that more people qualify to pay Zakat, thereby benefiting the poor and needy to a greater extent.</p>

                <h2>Is Zakat due on Silver Utensils?</h2>
                <p>Yes. If you own utensils, cutlery, or decorative items made of pure silver, their weight must be included in your Zakat calculation, as they hold intrinsic value just like silver jewelry or bullion.</p>
            </div>

        </div>
    </section>
</div>

<script>
    const silverRateInput = document.getElementById('silverRate');
    const silverWeightInput = document.getElementById('silverWeight');
    const weightUnitSelect = document.getElementById('weightUnit');
    const zakatTotal = document.getElementById('zakatTotal');
    const silverValueText = document.getElementById('silverValue');
    const nisabStatus = document.getElementById('nisabStatus');

    const GRAMS_PER_TOLA = 11.6638;
    const SILVER_NISAB_GRAMS = 612.36;

    function calculateSilverZakat() {
        const rate = parseFloat(silverRateInput.value) || 0;
        let weight = parseFloat(silverWeightInput.value) || 0;
        const unit = weightUnitSelect.value;

        let weightInGrams = weight;
        if (unit === 'tolas') {
            weightInGrams = weight * GRAMS_PER_TOLA;
        }

        const totalValue = weightInGrams * rate;
        
        silverValueText.textContent = 'Total Value: ' + totalValue.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        if (weightInGrams >= SILVER_NISAB_GRAMS) {
            const zakat = totalValue * 0.025;
            zakatTotal.textContent = zakat.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            nisabStatus.className = 'status-box eligible';
            nisabStatus.innerHTML = '<i class="fas fa-check-circle"></i> Reaches Nisab. Zakat is Due (2.5%).';
        } else {
            zakatTotal.textContent = '0.00';
            nisabStatus.className = 'status-box not-eligible';
            nisabStatus.innerHTML = '<i class="fas fa-times-circle"></i> Below Silver Nisab (' + SILVER_NISAB_GRAMS + 'g).';
        }
    }

    silverRateInput.addEventListener('input', calculateSilverZakat);
    silverWeightInput.addEventListener('input', calculateSilverZakat);
    weightUnitSelect.addEventListener('change', calculateSilverZakat);
    
    calculateSilverZakat();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/calculators/zakat_silver.blade.php ENDPATH**/ ?>