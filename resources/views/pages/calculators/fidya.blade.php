@extends('layouts.app')

@section('title', 'Fidya Calculator — Calculate Ramadan Fidya Online')
@section('meta_description', 'Calculate your Ramadan Fidya easily with our online Fidya Calculator. Learn when Fidya is required, the current cost per meal, and the rules of Fidya in Islam.')
@section('meta_keywords', 'fidya calculator, calculate fidya, ramadan fidya, fidya cost, how much is fidya, fidya rules, fidya for missed fasts')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Fidya Calculator",
  "applicationCategory": "CalculatorApplication",
  "description": "Calculate the Fidya owed for missed Ramadan fasts.",
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
    
    .calc-result { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); padding: 40px; color: var(--white); display: flex; flex-direction: column; justify-content: center; text-align: center; position: relative; }
    .calc-result::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle, var(--gold) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; }
    .calc-result h4 { font-size: 1.1rem; color: rgba(255,255,255,0.8); margin-bottom: 15px; font-weight: 500; }
    .result-value { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 800; color: var(--gold-light); margin-bottom: 10px; line-height: 1; }
    .result-desc { font-size: 0.9rem; color: rgba(255,255,255,0.7); }

    .info-section h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 20px; }
    .info-section p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 15px; }
    .info-section ul { padding-left: 20px; margin-bottom: 20px; }
    .info-section li { font-size: 0.95rem; color: var(--text-medium); margin-bottom: 8px; }
    
    .quran-box { background: var(--secondary); border-left: 4px solid var(--gold); padding: 25px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 30px 0; }
    .quran-text { font-size: 1.05rem; font-style: italic; color: var(--text-dark); line-height: 1.8; margin-bottom: 10px; }
    .quran-ref { font-weight: 600; font-size: 0.9rem; color: var(--primary); }

    @media (max-width: 768px) {
        .calc-container { grid-template-columns: 1fr; }
        .calc-form, .calc-result { padding: 30px 20px; }
        .result-value { font-size: 2.8rem; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <a href="{{ route('calculators.index') }}">Calculators</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Fidya</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <h1>Fidya <span>Calculator</span></h1>
            <p>Calculate the compensation required for fasts missed due to chronic illness or old age.</p>
        </div>
    </section>

    <section class="c-content">
        <div class="c-content-inner">
            
            <div class="calc-container">
                <div class="calc-form">
                    <h3>Calculate Your Fidya</h3>
                    <div class="input-group">
                        <label>Cost of Two Meals (in your local currency)</label>
                        <div class="input-wrap">
                            <i class="fas fa-money-bill-wave"></i>
                            <input type="number" id="mealCost" class="input-field" value="300" min="0" step="1">
                        </div>
                        <small style="color:var(--text-light); font-size:0.8rem; margin-top:5px; display:block;">Average cost to feed one person for a day (two meals). In Pakistan, it is roughly PKR 300 - 450.</small>
                    </div>
                    <div class="input-group">
                        <label>Number of Missed Fasts</label>
                        <div class="input-wrap">
                            <i class="fas fa-calendar-times"></i>
                            <input type="number" id="missedDays" class="input-field" value="1" min="1" max="30">
                        </div>
                    </div>
                </div>
                <div class="calc-result">
                    <h4>Total Fidya Owed</h4>
                    <div class="result-value" id="fidyaTotal">300</div>
                    <div class="result-desc">To be distributed to the poor and needy.</div>
                </div>
            </div>

            <div class="info-section">
                <h2>What is Fidya?</h2>
                <p>Fidya (Fidyah) is a religious donation required from Muslims who are unable to fast during the month of Ramadan due to chronic illness, old age, or a medical condition that prevents them from fasting, and they are not expected to recover and make up the fasts later.</p>
                
                <div class="quran-box">
                    <div class="quran-text">"And upon those who are able [to fast, but with hardship] - a ransom [as substitute] of feeding a poor person [each day]."</div>
                    <div class="quran-ref">— Surah Al-Baqarah (2:184)</div>
                </div>

                <h2>Who must pay Fidya?</h2>
                <ul>
                    <li>The elderly who are too frail to fast.</li>
                    <li>Those suffering from a chronic, incurable illness that makes fasting dangerously harmful.</li>
                    <li>Those who are permanently dependent on medication that must be taken during fasting hours.</li>
                </ul>
                <p><strong>Note:</strong> If you miss a fast due to temporary sickness, travel, pregnancy, or menstruation, you do not pay Fidya. Instead, you must make up the missed fasts (Qada) at a later date before the next Ramadan.</p>

                <h2>How is Fidya Calculated?</h2>
                <p>The standard measure of Fidya for one missed fast is equivalent to feeding one poor person two full meals for a day. In modern terms, this is estimated based on the average cost of two basic meals in your country of residence.</p>
                <p>If you miss the entire month of Ramadan (30 days), you must pay the Fidya amount multiplied by 30.</p>
            </div>

        </div>
    </section>
</div>

<script>
    const mealCostInput = document.getElementById('mealCost');
    const missedDaysInput = document.getElementById('missedDays');
    const fidyaTotal = document.getElementById('fidyaTotal');

    function calculateFidya() {
        const cost = parseFloat(mealCostInput.value) || 0;
        const days = parseInt(missedDaysInput.value) || 0;
        const total = cost * days;
        fidyaTotal.textContent = total.toLocaleString(undefined, { minimumFractionDigits: 0, maximumFractionDigits: 2 });
    }

    mealCostInput.addEventListener('input', calculateFidya);
    missedDaysInput.addEventListener('input', calculateFidya);
    
    // Initial calculation
    calculateFidya();
</script>
@endsection
