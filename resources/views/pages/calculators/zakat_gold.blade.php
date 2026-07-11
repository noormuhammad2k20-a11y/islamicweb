@extends('layouts.app')

@section('title', 'Zakat on Gold Calculator — Calculate Gold Zakat Online')
@section('meta_description', 'Calculate Zakat on your gold jewelry and bullion accurately. Input your gold weight in grams or tolas and get instant Zakat calculations based on current rates.')
@section('meta_keywords', 'zakat on gold calculator, gold zakat, how to calculate zakat on gold, nisab of gold, zakat on jewelry')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Zakat on Gold Calculator",
  "applicationCategory": "CalculatorApplication",
  "description": "Calculate the Zakat owed specifically on gold assets.",
  "offers": {
    "@type": "Offer",
    "price": "0.00",
    "priceCurrency": "USD"
  }
}
</script>
@endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap');

    :root {
        --primary: #145DA0;
        --primary-dark: #0C3D6E;
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

    .c-hero { position: relative; background: linear-gradient(160deg, var(--gold-dark) 0%, var(--gold) 45%, var(--gold-light) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .c-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.1; background-image: radial-gradient(circle at 25% 25%, var(--white) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .c-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .c-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; text-shadow: 0 2px 4px rgba(0,0,0,0.2); }
    .c-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.9); max-width: 650px; margin: 0 auto; line-height: 1.8; text-shadow: 0 1px 2px rgba(0,0,0,0.1); }

    .c-content { padding: 60px 0; }
    .c-content-inner { max-width: 1000px; margin: 0 auto; padding: 0 28px; }

    .calc-container { background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid rgba(184,134,59,0.15); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; margin-bottom: 60px; }
    
    .calc-form { padding: 40px; }
    .calc-form h3 { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--gold-dark); margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }
    
    .input-group { margin-bottom: 20px; }
    .input-group label { display: block; font-size: 0.9rem; font-weight: 600; color: var(--text-dark); margin-bottom: 8px; }
    .input-wrap { position: relative; display: flex; }
    .input-wrap i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--gold); font-size: 1rem; }
    .input-field { width: 100%; padding: 14px 16px 14px 45px; border: 1.5px solid rgba(184,134,59,0.2); border-radius: var(--radius-md) 0 0 var(--radius-md); font-family: 'Poppins', sans-serif; font-size: 1rem; color: var(--text-dark); transition: var(--tr); outline: none; }
    .input-field:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184,134,59,0.1); z-index: 2; }
    
    .unit-select { padding: 0 15px; border: 1.5px solid rgba(184,134,59,0.2); border-left: none; border-radius: 0 var(--radius-md) var(--radius-md) 0; background: var(--secondary); font-family: 'Poppins', sans-serif; font-weight: 600; color: var(--text-dark); outline: none; }
    
    .calc-result { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); padding: 40px; color: var(--white); display: flex; flex-direction: column; justify-content: center; text-align: center; position: relative; }
    .calc-result::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle, var(--white) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; }
    .calc-result h4 { font-size: 1.1rem; color: rgba(255,255,255,0.9); margin-bottom: 15px; font-weight: 500; }
    .result-value { font-family: 'Playfair Display', serif; font-size: 3.2rem; font-weight: 800; color: var(--white); margin-bottom: 10px; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .result-desc { font-size: 0.9rem; color: rgba(255,255,255,0.8); }

    .status-box { margin-top: 20px; padding: 15px; border-radius: var(--radius-sm); font-size: 0.9rem; font-weight: 600; display: flex; align-items: center; gap: 10px; }
    .status-box.eligible { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); }
    .status-box.not-eligible { background: rgba(0,0,0,0.15); border: 1px solid rgba(0,0,0,0.2); color: rgba(255,255,255,0.9); }

    .info-section h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .info-section p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 15px; }
    .info-section ul { padding-left: 20px; margin-bottom: 20px; }
    .info-section li { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 8px; }

    @media (max-width: 768px) {
        .calc-container { grid-template-columns: 1fr; }
        .calc-form, .calc-result { padding: 30px 20px; }
        .result-value { font-size: 2.5rem; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <a href="{{ route('calculators.index') }}">Calculators</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Zakat on Gold</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <h1>Zakat on <span>Gold</span></h1>
            <p>Calculate Zakat specifically for your gold jewelry, coins, and bullion.</p>
        </div>
    </section>

    <section class="c-content">
        <div class="c-content-inner">
            
            <div class="calc-container">
                <div class="calc-form">
                    <h3><i class="fas fa-coins"></i> Gold Details</h3>
                    <div class="input-group">
                        <label>Current Price of Gold (per Gram)</label>
                        <div class="input-wrap">
                            <i class="fas fa-tags"></i>
                            <input type="number" id="goldRate" class="input-field" style="border-radius:var(--radius-md);" placeholder="e.g. 20000" value="20000" min="0" step="0.01">
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Total Weight of Gold</label>
                        <div class="input-wrap">
                            <i class="fas fa-balance-scale"></i>
                            <input type="number" id="goldWeight" class="input-field" placeholder="e.g. 100" value="0" min="0" step="0.01">
                            <select id="weightUnit" class="unit-select">
                                <option value="grams">Grams</option>
                                <option value="tolas">Tolas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="calc-result">
                    <h4>Your Zakat on Gold</h4>
                    <div class="result-value" id="zakatTotal">0.00</div>
                    <div class="result-desc" id="goldValue">Total Value: 0.00</div>
                    
                    <div class="status-box not-eligible" id="nisabStatus">
                        <i class="fas fa-times-circle"></i> Below Gold Nisab (87.48g)
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h2>The Nisab for Gold</h2>
                <p>The Nisab (minimum threshold) for gold is <strong>87.48 grams</strong> (equivalent to about 7.5 tolas or 3 ounces). If the total weight of all the gold you own equals or exceeds this amount, and you have possessed it for a full Islamic lunar year, Zakat is obligatory.</p>

                <h2>Is Zakat due on Gold Jewelry?</h2>
                <p>There is a difference of opinion among Islamic scholars regarding gold jewelry intended for personal use:</p>
                <ul>
                    <li><strong>Hanafi School:</strong> Zakat is obligatory on all gold and silver, whether it is jewelry for personal use, kept as an investment, or bullion.</li>
                    <li><strong>Shafi'i, Maliki, and Hanbali Schools:</strong> Gold and silver jewelry meant for personal, lawful use and worn regularly is generally exempt from Zakat. However, if it is hoarded, bought as an investment, or is an extravagant amount, Zakat must be paid.</li>
                </ul>
                <p>Many scholars suggest it is safer and more rewarding to pay Zakat on all gold jewelry to avoid doubt.</p>

                <h2>How to calculate the weight?</h2>
                <p>If you have gold of different karats (e.g., 18k, 22k, 24k), you should value each according to its respective market price per gram, or calculate the pure gold content. The Zakat rate is always 2.5% of the total current market value.</p>
            </div>

        </div>
    </section>
</div>

<script>
    const goldRateInput = document.getElementById('goldRate');
    const goldWeightInput = document.getElementById('goldWeight');
    const weightUnitSelect = document.getElementById('weightUnit');
    const zakatTotal = document.getElementById('zakatTotal');
    const goldValueText = document.getElementById('goldValue');
    const nisabStatus = document.getElementById('nisabStatus');

    const GRAMS_PER_TOLA = 11.6638;
    const GOLD_NISAB_GRAMS = 87.48;

    function calculateGoldZakat() {
        const rate = parseFloat(goldRateInput.value) || 0;
        let weight = parseFloat(goldWeightInput.value) || 0;
        const unit = weightUnitSelect.value;

        let weightInGrams = weight;
        if (unit === 'tolas') {
            weightInGrams = weight * GRAMS_PER_TOLA;
        }

        const totalValue = weightInGrams * rate;
        
        goldValueText.textContent = 'Total Value: ' + totalValue.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        if (weightInGrams >= GOLD_NISAB_GRAMS) {
            const zakat = totalValue * 0.025;
            zakatTotal.textContent = zakat.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            nisabStatus.className = 'status-box eligible';
            nisabStatus.innerHTML = '<i class="fas fa-check-circle"></i> Reaches Nisab. Zakat is Due (2.5%).';
        } else {
            zakatTotal.textContent = '0.00';
            nisabStatus.className = 'status-box not-eligible';
            nisabStatus.innerHTML = '<i class="fas fa-times-circle"></i> Below Gold Nisab (' + GOLD_NISAB_GRAMS + 'g).';
        }
    }

    goldRateInput.addEventListener('input', calculateGoldZakat);
    goldWeightInput.addEventListener('input', calculateGoldZakat);
    weightUnitSelect.addEventListener('change', calculateGoldZakat);
    
    calculateGoldZakat();
</script>
@endsection
