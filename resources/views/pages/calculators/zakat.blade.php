@extends('layouts.app')

@section('title', 'Comprehensive Zakat Calculator — Calculate Your Total Zakat')
@section('meta_description', 'Calculate your total Zakat accurately with our comprehensive online Zakat Calculator. Input your cash, gold, silver, business assets, and liabilities.')
@section('meta_keywords', 'zakat calculator, online zakat calculator, comprehensive zakat calculator, calculate total zakat, zakat on cash, zakat on business')

@section('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Comprehensive Zakat Calculator",
  "applicationCategory": "CalculatorApplication",
  "description": "A comprehensive calculator to determine your total Zakat obligation across all asset classes.",
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
        --danger: #E74C3C;
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
    .c-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: grid; grid-template-columns: 1fr 380px; gap: 40px; align-items: start; }
    
    .calc-card { background: var(--white); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.08); padding: 40px; margin-bottom: 30px; }
    .calc-card-title { display: flex; align-items: center; gap: 12px; margin-bottom: 25px; border-bottom: 1px solid rgba(20,93,160,0.08); padding-bottom: 15px; }
    .calc-card-title i { font-size: 1.4rem; color: var(--primary); }
    .calc-card-title h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--primary-dark); margin: 0; }

    .input-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
    .input-group label { display: block; font-size: 0.9rem; font-weight: 600; color: var(--text-dark); margin-bottom: 8px; }
    .input-wrap { position: relative; }
    .input-wrap i { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: var(--text-light); font-size: 0.9rem; }
    .input-field { width: 100%; padding: 12px 16px 12px 40px; border: 1.5px solid rgba(20,93,160,0.15); border-radius: var(--radius-md); font-family: 'Poppins', sans-serif; font-size: 0.95rem; color: var(--text-dark); transition: var(--tr); outline: none; }
    .input-field:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-subtle); }
    .input-desc { font-size: 0.8rem; color: var(--text-light); margin-top: 5px; }

    .result-sidebar { position: sticky; top: 100px; background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: var(--radius-lg); padding: 30px; color: var(--white); box-shadow: var(--shadow-md); }
    .result-sidebar::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle, var(--gold) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; }
    
    .nisab-box { background: rgba(255,255,255,0.1); border-radius: var(--radius-md); padding: 20px; margin-bottom: 25px; border: 1px solid rgba(255,255,255,0.15); }
    .nisab-box h4 { font-size: 0.95rem; color: rgba(255,255,255,0.9); margin-bottom: 10px; }
    .nisab-input { width: 100%; background: transparent; border: none; border-bottom: 2px solid var(--gold-light); color: var(--gold-light); font-size: 1.5rem; font-weight: 700; padding: 5px 0; outline: none; font-family: 'Poppins', sans-serif; }

    .summary-row { display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px dashed rgba(255,255,255,0.2); font-size: 0.95rem; }
    .summary-row:last-of-type { border-bottom: none; }
    .summary-val { font-weight: 600; }
    .summary-val.minus { color: #FFA0A0; }

    .grand-total { margin-top: 25px; text-align: center; background: rgba(0,0,0,0.15); padding: 20px; border-radius: var(--radius-md); }
    .grand-total h4 { font-size: 1rem; font-weight: 500; color: rgba(255,255,255,0.9); margin-bottom: 5px; }
    .grand-total-val { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--gold-light); line-height: 1; margin-bottom: 10px; }

    .status-badge { display: inline-block; padding: 6px 15px; border-radius: 30px; font-size: 0.85rem; font-weight: 600; }
    .status-badge.eligible { background: rgba(46,204,113,0.2); color: #2ECC71; border: 1px solid rgba(46,204,113,0.3); }
    .status-badge.not-eligible { background: rgba(231,76,60,0.2); color: #E74C3C; border: 1px solid rgba(231,76,60,0.3); }

    @media (max-width: 992px) {
        .c-content-inner { grid-template-columns: 1fr; }
        .input-row { grid-template-columns: 1fr; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="{{ route('home') }}">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <a href="{{ route('calculators.index') }}">Calculators</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Zakat</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <div class="c-hero-badge"><i class="fas fa-calculator"></i> Comprehensive Tool</div>
            <h1>Zakat <span>Calculator</span></h1>
            <p>Calculate your total Zakat obligation across all Zakatable assets accurately and securely.</p>
        </div>
    </section>

    <section class="c-content">
        <div class="c-content-inner">
            
            <div class="calc-main">
                
                <!-- CASH SECTION -->
                <div class="calc-card">
                    <div class="calc-card-title">
                        <i class="fas fa-wallet"></i>
                        <h3>1. Cash & Bank Balances</h3>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Cash at Home</label>
                            <div class="input-wrap">
                                <i class="fas fa-money-bill"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="cash" value="0" min="0">
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Cash in Bank Accounts</label>
                            <div class="input-wrap">
                                <i class="fas fa-university"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="cash" value="0" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GOLD/SILVER SECTION -->
                <div class="calc-card">
                    <div class="calc-card-title">
                        <i class="fas fa-coins"></i>
                        <h3>2. Gold & Silver</h3>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Value of Gold</label>
                            <div class="input-wrap">
                                <i class="fas fa-ring" style="color:var(--gold);"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="metals" value="0" min="0">
                            </div>
                            <div class="input-desc">Total current market value of pure gold.</div>
                        </div>
                        <div class="input-group">
                            <label>Value of Silver</label>
                            <div class="input-wrap">
                                <i class="fas fa-ring" style="color:#A0A9B0;"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="metals" value="0" min="0">
                            </div>
                            <div class="input-desc">Total current market value of pure silver.</div>
                        </div>
                    </div>
                </div>

                <!-- INVESTMENTS SECTION -->
                <div class="calc-card">
                    <div class="calc-card-title">
                        <i class="fas fa-chart-line"></i>
                        <h3>3. Investments & Shares</h3>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Shares (For Trading)</label>
                            <div class="input-wrap">
                                <i class="fas fa-chart-pie"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="investments" value="0" min="0">
                            </div>
                            <div class="input-desc">Current market value of shares bought to resell.</div>
                        </div>
                        <div class="input-group">
                            <label>Strong Debts Owed to You</label>
                            <div class="input-wrap">
                                <i class="fas fa-hand-holding-usd"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="investments" value="0" min="0">
                            </div>
                            <div class="input-desc">Money lent out that you are confident will be returned.</div>
                        </div>
                    </div>
                </div>

                <!-- BUSINESS SECTION -->
                <div class="calc-card">
                    <div class="calc-card-title">
                        <i class="fas fa-store"></i>
                        <h3>4. Business Assets</h3>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Business Inventory</label>
                            <div class="input-wrap">
                                <i class="fas fa-boxes"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="business" value="0" min="0">
                            </div>
                            <div class="input-desc">Current retail value of stock intended for sale.</div>
                        </div>
                        <div class="input-group">
                            <label>Business Cash / Savings</label>
                            <div class="input-wrap">
                                <i class="fas fa-cash-register"></i>
                                <input type="number" class="input-field z-input z-asset" data-category="business" value="0" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LIABILITIES SECTION -->
                <div class="calc-card">
                    <div class="calc-card-title">
                        <i class="fas fa-file-invoice-dollar" style="color:var(--danger);"></i>
                        <h3 style="color:var(--danger);">5. Liabilities (Deductibles)</h3>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Immediate Debts</label>
                            <div class="input-wrap">
                                <i class="fas fa-credit-card"></i>
                                <input type="number" class="input-field z-input z-liability" value="0" min="0">
                            </div>
                            <div class="input-desc">Credit cards, personal loans, or bills due immediately.</div>
                        </div>
                        <div class="input-group">
                            <label>Upcoming Installments</label>
                            <div class="input-wrap">
                                <i class="fas fa-calendar-alt"></i>
                                <input type="number" class="input-field z-input z-liability" value="0" min="0">
                            </div>
                            <div class="input-desc">Mortgage or long-term loan installments due within the next lunar year ONLY.</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RESULT SIDEBAR -->
            <div class="result-sidebar">
                
                <div class="nisab-box">
                    <h4>Current Nisab Value (Local Currency)</h4>
                    <input type="number" id="nisabValue" class="nisab-input" value="150000" min="0">
                    <div style="font-size:0.8rem; margin-top:8px; color:rgba(255,255,255,0.7);">Enter the current value of 612.36g of Silver in your local currency.</div>
                </div>

                <div class="summary-row">
                    <span>Total Zakatable Assets</span>
                    <span class="summary-val" id="totalAssets">0</span>
                </div>
                <div class="summary-row">
                    <span>Total Liabilities</span>
                    <span class="summary-val minus" id="totalLiabilities">- 0</span>
                </div>
                <div class="summary-row" style="border-top: 1px solid rgba(255,255,255,0.3); margin-top:10px; padding-top:15px; font-size:1.05rem;">
                    <span>Net Wealth</span>
                    <span class="summary-val" id="netWealth">0</span>
                </div>

                <div class="grand-total">
                    <h4>Total Zakat Payable (2.5%)</h4>
                    <div class="grand-total-val" id="zakatPayable">0</div>
                    <div id="statusBadge" class="status-badge not-eligible">Below Nisab</div>
                </div>
                
            </div>

        </div>
    </section>
</div>

<script>
    const inputs = document.querySelectorAll('.z-input');
    const nisabInput = document.getElementById('nisabValue');
    
    const displayAssets = document.getElementById('totalAssets');
    const displayLiabilities = document.getElementById('totalLiabilities');
    const displayNetWealth = document.getElementById('netWealth');
    const displayZakat = document.getElementById('zakatPayable');
    const statusBadge = document.getElementById('statusBadge');

    function formatNumber(num) {
        return num.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function calculateTotal() {
        let assets = 0;
        let liabilities = 0;

        document.querySelectorAll('.z-asset').forEach(input => {
            assets += parseFloat(input.value) || 0;
        });

        document.querySelectorAll('.z-liability').forEach(input => {
            liabilities += parseFloat(input.value) || 0;
        });

        const net = assets - liabilities;
        const nisab = parseFloat(nisabInput.value) || 0;

        displayAssets.textContent = formatNumber(assets);
        displayLiabilities.textContent = '- ' + formatNumber(liabilities);
        
        if (net > 0) {
            displayNetWealth.textContent = formatNumber(net);
        } else {
            displayNetWealth.textContent = '0.00';
        }

        if (net >= nisab && nisab > 0) {
            const zakat = net * 0.025;
            displayZakat.textContent = formatNumber(zakat);
            statusBadge.textContent = 'Reaches Nisab';
            statusBadge.className = 'status-badge eligible';
        } else {
            displayZakat.textContent = '0.00';
            statusBadge.textContent = 'Below Nisab';
            statusBadge.className = 'status-badge not-eligible';
        }
    }

    inputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    nisabInput.addEventListener('input', calculateTotal);

    // Initial calc
    calculateTotal();
</script>
@endsection
