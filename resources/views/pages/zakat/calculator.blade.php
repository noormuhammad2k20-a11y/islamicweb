@extends('layouts.app')

@section('title', 'Zakat Calculator — Detailed Assessment')
@section('meta_description', 'Calculate your Zakat accurately using our comprehensive Zakat Calculator. Evaluates Nisab threshold dynamically.')

@section('content')
<style>
    /* VIP Aesthetic */
    .vip-container {
        font-family: 'Inter', sans-serif;
    }
    .input-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0,0,0,0.06);
        padding: 40px;
        position: relative;
    }
    .input-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 5px;
        background: var(--primary);
        border-radius: 16px 16px 0 0;
    }
    .output-card {
        background: #fafafa;
        border-radius: 16px;
        box-shadow: inset 0 0 10px rgba(0,0,0,0.02);
        border: 1px solid rgba(0,0,0,0.06);
        padding: 40px;
    }
    .form-group-custom {
        margin-bottom: 25px;
    }
    .form-group-custom label {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 10px;
        display: block;
    }
    .input-wrapper {
        position: relative;
    }
    .input-wrapper .currency-symbol {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #777;
        font-weight: 600;
    }
    .form-control-vip {
        width: 100%;
        padding: 16px 16px 16px 60px;
        border: 2px solid #eaeaea;
        border-radius: 10px;
        font-size: 1.1rem;
        transition: border-color 0.3s;
    }
    .form-control-vip:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
    }
    .btn-vip {
        background: var(--primary);
        color: white;
        border: none;
        width: 100%;
        padding: 18px;
        border-radius: 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        transition: transform 0.2s;
        cursor: pointer;
    }
    .btn-vip:hover {
        transform: translateY(-2px);
    }
    .result-text {
        font-family: 'Inter', sans-serif;
        font-size: 1.15rem;
        color: #444;
        line-height: 1.6;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        border-left: 4px solid var(--primary);
        margin-top: 20px;
    }
    .seo-article {
        margin-top: 80px;
        padding-top: 50px;
        border-top: 1px solid #eee;
        font-family: 'Inter', sans-serif;
        color: #333;
        line-height: 1.8;
    }
    .seo-article h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 25px;
    }
    .seo-article h3 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: var(--primary);
        margin-top: 35px;
        margin-bottom: 15px;
    }
</style>

<section class="section vip-container" style="padding-top: 60px; background-color: #fcfcfc;">
    <div class="container">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Zakat Calculator</span>
            </div>
        </div>

        <div class="text-center mb-5">
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: var(--primary-dark);">Zakat Calculator</h1>
            <p class="text-muted">Accurately determine your obligatory alms based on real-time Nisab values.</p>
        </div>

        <div class="row">
            <!-- 12-Column Stacked Input Card -->
            <div class="col-12 col-lg-12 mb-4">
                <div class="input-card w-100">
                    <h3 style="font-family: 'Poppins', sans-serif; color: var(--primary-dark); margin-bottom: 30px;">
                        <i class="fas fa-coins" style="color: var(--gold); margin-right: 10px;"></i> Wealth Assessment
                    </h3>
                    
                    <form id="zakatForm">
                        <div class="row">
                            <div class="col-md-6 form-group-custom">
                                <label>Cash in Hand / Bank</label>
                                <div class="input-wrapper">
                                    <span class="currency-symbol">{{ $config->currency_code }}</span>
                                    <input type="number" id="cashAmount" class="form-control-vip" placeholder="Enter amount" min="0" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6 form-group-custom">
                                <label>Value of Gold</label>
                                <div class="input-wrapper">
                                    <span class="currency-symbol">{{ $config->currency_code }}</span>
                                    <input type="number" id="goldAmount" class="form-control-vip" placeholder="Enter amount" min="0" step="0.01">
                                </div>
                                <small class="text-muted mt-2 d-block">Current Rate: {{ $config->currency_code }} {{ number_format($config->gold_price_per_gram, 2) }} / gram</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group-custom">
                                <label>Value of Silver</label>
                                <div class="input-wrapper">
                                    <span class="currency-symbol">{{ $config->currency_code }}</span>
                                    <input type="number" id="silverAmount" class="form-control-vip" placeholder="Enter amount" min="0" step="0.01">
                                </div>
                                <small class="text-muted mt-2 d-block">Current Rate: {{ $config->currency_code }} {{ number_format($config->silver_price_per_gram, 2) }} / gram</small>
                            </div>
                            <div class="col-md-6 form-group-custom">
                                <label>Debts / Liabilities</label>
                                <div class="input-wrapper">
                                    <span class="currency-symbol" style="color: #e74c3c;">- {{ $config->currency_code }}</span>
                                    <input type="number" id="liabilitiesAmount" class="form-control-vip" placeholder="Enter amount" min="0" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="button" id="calculateBtn" class="btn-vip">
                                Calculate My Zakat
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 12-Column Stacked Output Card -->
            <div class="col-12 col-lg-12">
                <div class="output-card w-100" id="outputCard">
                    <h3 style="font-family: 'Poppins', sans-serif; color: var(--primary-dark); margin-bottom: 20px;">
                        <i class="fas fa-file-invoice-dollar" style="color: var(--primary); margin-right: 10px;"></i> Calculation Results
                    </h3>
                    
                    <div id="zakatResultContainer">
                        <div class="result-text" style="border-left-color: #ccc;">
                            Please enter your assets and liabilities in the form above and click calculate to view your detailed Zakat obligation.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Authoritative Content -->
        <div class="seo-article">
            <h2>The Jurisprudence and Economic Impact of Zakat</h2>
            <p>
                Zakat is one of the Five Pillars of Islam, representing a mandatory religious duty for all eligible Muslims whose wealth meets or exceeds a specific threshold known as the Nisab. Far more than mere charity, Zakat is an institutionalized mechanism designed to purify wealth, eradicate poverty, and foster socio-economic equity within society. The calculation of Zakat is governed by precise jurisprudential rules derived from the Quran and the Sunnah, ensuring that the distribution of wealth occurs systematically and fairly.
            </p>
            <h3>Understanding the Nisab Threshold</h3>
            <p>
                The Nisab serves as the minimum baseline of wealth that a Muslim must possess for one complete lunar year (Hawl) before Zakat becomes obligatory. Historically, the Prophet Muhammad (PBUH) established the Nisab based on two primary standards: gold and silver. The threshold was set at 20 Mithqal of gold (approximately 85 grams) or 200 Dirhams of silver (approximately 595 grams). In modern financial contexts, the value of these precious metals is converted into local fiat currency to determine the threshold. Due to the significant divergence in the contemporary valuation of gold and silver, many scholars recommend utilizing the silver Nisab standard, as it is lower and thus ensures a broader safety net for the marginalized members of society.
            </p>
            <h3>Assets Subject to Zakat (Zakatable Assets)</h3>
            <p>
                Not all forms of wealth are subject to Zakat. Islamic jurisprudence distinguishes between wealth that actively grows (or has the potential for growth) and personal items used for basic living. Zakatable assets strictly include cash in hand, bank balances, physical gold and silver, business inventory, agricultural produce, and livestock. Furthermore, investments such as stocks, mutual funds, and real estate acquired explicitly for resale are also factored into the net calculation. Conversely, one's primary residence, personal vehicle, clothing, and household furniture are strictly exempt from Zakat, as they constitute necessities of life rather than hoarded wealth.
            </p>
            <h3>The Calculation Methodology</h3>
            <p>
                The standard rate of Zakat on accumulated monetary wealth, gold, silver, and business inventory is unequivocally set at 2.5% (or 1/40th of the total value). The algorithmic approach to calculation requires summing the total value of all Zakatable assets and subsequently subtracting any immediate, short-term debts or liabilities. If the resulting net wealth equals or exceeds the current Nisab threshold, the 2.5% rate is applied to the entire net amount. It is critical to note that if the net wealth falls below the Nisab, the obligation drops entirely, resulting in a zero payable amount. This progressive structure ensures that individuals experiencing financial hardship are protected from the obligation.
            </p>
            <h3>The Eight Categories of Recipients</h3>
            <p>
                The distribution of Zakat is heavily regulated and restricted to eight specific categories (Asnaf) as explicitly delineated in Surah At-Tawbah (9:60) of the Quran. These categories include the destitute (Al-Fuqara), the needy (Al-Masakin), the administrators of Zakat (Al-Amilina 'Alayha), those whose hearts are to be reconciled (Al-Mu'allafati Qulubuhum), the enslaved or captives seeking freedom (Fir-Riqab), the debt-ridden (Al-Gharimin), those striving in the cause of Allah (Fi Sabilillah), and the stranded traveler (Ibn As-Sabil). Adherence to these strict distribution channels ensures that the socio-economic intervention of Zakat directly targets the most vulnerable demographics, facilitating robust societal stability and economic circulation.
            </p>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var goldRate = {{ $config->gold_price_per_gram }};
    var silverRate = {{ $config->silver_price_per_gram }};
    var currency = '{{ $config->currency_code }}';
    
    // Default to silver Nisab (595 grams)
    var nisabThreshold = silverRate * 595; 

    var calculateBtn = document.getElementById('calculateBtn');
    
    calculateBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        var cash = parseFloat(document.getElementById('cashAmount').value) || 0;
        var gold = parseFloat(document.getElementById('goldAmount').value) || 0;
        var silver = parseFloat(document.getElementById('silverAmount').value) || 0;
        var liabilities = parseFloat(document.getElementById('liabilitiesAmount').value) || 0;

        var totalAssets = cash + gold + silver;
        var netWealth = totalAssets - liabilities;
        
        var resultContainer = document.getElementById('zakatResultContainer');
        var formattedNisab = nisabThreshold.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        var formattedNetWealth = Math.max(0, netWealth).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        if (netWealth <= 0 && totalAssets === 0) {
            resultContainer.innerHTML = \`
                <div class="result-text" style="border-left-color: #f39c12; background: #fdfae6;">
                    <strong>Notice:</strong> Please enter your asset values above to receive a calculation. 
                    The current Nisab threshold based on silver is <strong>\${currency} \${formattedNisab}</strong>.
                </div>
            \`;
            return;
        }

        if (netWealth >= nisabThreshold) {
            var zakatPayable = netWealth * 0.025;
            var formattedZakat = zakatPayable.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            
            resultContainer.innerHTML = \`
                <div class="result-text" style="border-left-color: var(--primary); background: rgba(var(--primary-rgb), 0.03);">
                    <p style="margin-bottom: 10px;">Your calculated net wealth of <strong>\${currency} \${formattedNetWealth}</strong> successfully meets the Nisab threshold of <strong>\${currency} \${formattedNisab}</strong>.</p>
                    <p style="margin-bottom: 10px; font-size: 1.3rem; font-weight: 700; color: var(--primary-dark);">
                        Obligatory Zakat Payable: <span style="color: var(--gold);">\${currency} \${formattedZakat}</span>
                    </p>
                    <p style="font-size: 0.9rem; color: #666; margin-bottom: 0;">This calculation is based on the 2.5% requirement applied to your total eligible net assets after deducting liabilities.</p>
                </div>
            \`;
        } else {
            resultContainer.innerHTML = \`
                <div class="result-text" style="border-left-color: #e74c3c; background: #fdf5f4;">
                    <p style="margin-bottom: 10px;">Your calculated net wealth of <strong>\${currency} \${formattedNetWealth}</strong> does not meet the minimum Nisab threshold of <strong>\${currency} \${formattedNisab}</strong>.</p>
                    <p style="margin-bottom: 10px; font-size: 1.3rem; font-weight: 700; color: #e74c3c;">
                        Obligatory Zakat Payable: 0.00
                    </p>
                    <p style="font-size: 0.9rem; color: #666; margin-bottom: 0;">Because your net assets fall below the Nisab threshold, you are legally exempt from the obligation of paying Zakat at this time.</p>
                </div>
            \`;
        }
    });
});
</script>
@endsection
