<?php $__env->startSection('title', 'Zakat Calculator Online 2024 — Fast, Accurate & Free'); ?>
<?php $__env->startSection('meta_description', 'Use our free online Zakat calculator to easily compute your Zakat on cash, gold, silver, investments, and business assets. Get real-time Nisab updates.'); ?>
<?php $__env->startSection('meta_keywords', 'zakat calculator online, online zakat calculator, zakat on gold online, zakat calculation online, calculate zakat online, zakat 2024'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Zakat Calculator Online",
  "url": "<?php echo e(url()->current()); ?>",
  "description": "A comprehensive online tool to instantly calculate Zakat on gold, silver, cash, and business assets.",
  "applicationCategory": "FinanceApplication",
  "operatingSystem": "All"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How does the online Zakat calculator work?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Simply enter the value of your cash, gold, silver, investments, and deduct your immediate liabilities. The online tool automatically checks if your net wealth exceeds the current Nisab threshold and calculates the 2.5% Zakat owed."
      }
    },
    {
      "@type": "Question",
      "name": "Is this online Zakat calculator accurate?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, it uses the standard 2.5% calculation rule prescribed by Islamic law and allows you to compare your wealth against real-time Nisab values for both Gold and Silver."
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
        --primary-light: #2E8BC0;
        --primary-dark: #0C2D48;
        --primary-subtle: #E1F0FA;
        --secondary: #B1D4E0;
        --accent: #F4A261;
        --text-main: #2C3E50;
        --text-muted: #7F8C8D;
        --bg-main: #F8FAFC;
        --bg-card: #FFFFFF;
        --border-color: #E2E8F0;
        --shadow-sm: 0 2px 10px rgba(0,0,0,0.05);
        --shadow-md: 0 8px 25px rgba(20, 93, 160, 0.08);
        --radius: 16px;
    }

    .zo-page { background-color: var(--bg-main); font-family: 'Poppins', sans-serif; color: var(--text-main); line-height: 1.6; padding-bottom: 60px; }
    
    .zo-hero {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: white;
        padding: 80px 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .zo-hero::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l15 15-15 15L15 15z' fill='rgba(255,255,255,0.03)' fill-rule='evenodd'/%3E%3C/svg%3E");
        background-size: 60px 60px; opacity: 0.5;
    }
    .zo-hero-inner { max-width: 800px; margin: 0 auto; position: relative; z-index: 2; }
    .zo-hero h1 { font-family: 'Playfair Display', serif; font-size: 3rem; margin-bottom: 20px; font-weight: 700; line-height: 1.2; }
    .zo-hero p { font-size: 1.15rem; opacity: 0.9; max-width: 600px; margin: 0 auto 30px; }
    .zo-hero-badge { display: inline-block; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); padding: 6px 16px; border-radius: 20px; font-size: 0.9rem; font-weight: 500; margin-bottom: 20px; letter-spacing: 1px; text-transform: uppercase; }

    .zo-content-section { max-width: 1200px; margin: -40px auto 0; padding: 0 20px; position: relative; z-index: 10; display: grid; grid-template-columns: 1fr 380px; gap: 40px; align-items: start; }
    
    /* Calculator UI */
    .zo-calc-wrapper {
        background: var(--bg-card);
        border-radius: 24px;
        box-shadow: var(--shadow-md);
        padding: 40px;
        border: 1px solid rgba(255,255,255,0.8);
    }
    
    .zo-header-stats {
        display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;
        background: var(--primary-subtle); padding: 20px; border-radius: 16px;
    }
    .zo-stat-box { text-align: center; }
    .zo-stat-label { font-size: 0.85rem; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
    .zo-stat-val { font-size: 1.2rem; font-weight: 700; color: var(--primary-dark); margin-top: 5px; }
    
    .zo-form-group { margin-bottom: 25px; }
    .zo-form-group h3 { font-family: 'Playfair Display', serif; font-size: 1.4rem; color: var(--primary-dark); margin-bottom: 15px; display: flex; align-items: center; gap: 10px; border-bottom: 2px solid var(--primary-subtle); padding-bottom: 10px; }
    .zo-form-group h3 i { color: var(--accent); }
    
    .zo-input-row { display: flex; flex-direction: column; gap: 8px; margin-bottom: 15px; }
    .zo-input-row label { font-size: 0.95rem; font-weight: 500; color: var(--text-main); }
    .zo-input-wrapper { position: relative; display: flex; align-items: center; }
    .zo-input-wrapper .curr-symbol { position: absolute; left: 15px; color: var(--text-muted); font-weight: 600; }
    .zo-input-wrapper input {
        width: 100%; padding: 12px 15px 12px 45px;
        border: 1px solid var(--border-color); border-radius: 12px;
        font-family: inherit; font-size: 1rem; color: var(--primary-dark); font-weight: 600;
        background: #fcfcfc; transition: all 0.3s ease;
    }
    .zo-input-wrapper input:focus { outline: none; border-color: var(--primary-light); box-shadow: 0 0 0 3px rgba(46, 139, 192, 0.1); background: white; }

    .zo-summary {
        background: linear-gradient(135deg, var(--primary), var(--primary-light));
        border-radius: 16px; padding: 30px; color: white; margin-top: 40px; text-align: center;
        box-shadow: 0 10px 30px rgba(20, 93, 160, 0.2);
    }
    .zo-summary h3 { font-family: 'Playfair Display', serif; font-size: 1.8rem; margin-bottom: 10px; font-weight: 700; }
    .zo-total-zakat { font-size: 3.5rem; font-weight: 800; line-height: 1; margin: 20px 0; font-family: 'Playfair Display', serif; }
    .zo-summary p { opacity: 0.9; font-size: 1rem; }
    .zo-status { display: inline-block; padding: 6px 15px; background: rgba(255,255,255,0.2); border-radius: 20px; font-weight: 600; font-size: 0.9rem; margin-top: 15px; }

    /* Sidebar Content */
    .zo-sidebar-content { background: var(--bg-card); border-radius: 20px; box-shadow: var(--shadow-sm); padding: 30px; }
    .zo-sidebar-content h3 { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--primary-dark); margin-bottom: 20px; }
    .zo-sidebar-content p { font-size: 0.95rem; color: var(--text-muted); margin-bottom: 15px; }
    .zo-info-list { list-style: none; padding: 0; margin: 0; }
    .zo-info-list li { display: flex; gap: 15px; margin-bottom: 20px; align-items: flex-start; }
    .zo-info-list li i { color: var(--accent); font-size: 1.2rem; margin-top: 2px; }
    .zo-info-text strong { display: block; color: var(--text-main); font-weight: 600; margin-bottom: 4px; }
    .zo-info-text span { font-size: 0.9rem; color: var(--text-muted); }

    .zo-faq { margin-top: 30px; }
    .zo-faq h4 { font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 15px; border-bottom: 2px solid var(--primary-subtle); padding-bottom: 10px; }
    .zo-faq-item { border-bottom: 1px solid var(--border-color); padding: 15px 0; }
    .zo-faq-item:last-child { border-bottom: none; }
    .zo-faq-q { font-weight: 600; font-size: 0.95rem; color: var(--text-main); margin-bottom: 5px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; }
    .zo-faq-a { font-size: 0.9rem; color: var(--text-muted); display: none; margin-top: 10px; }
    .zo-faq-item.open .zo-faq-a { display: block; }
    .zo-faq-item.open .zo-faq-q { color: var(--primary); }

    @media (max-width: 992px) {
        .zo-content-section { grid-template-columns: 1fr; margin-top: 20px; }
        .zo-hero { padding: 60px 20px; }
    }
    @media (max-width: 768px) {
        .zo-hero h1 { font-size: 2.2rem; }
        .zo-calc-wrapper { padding: 25px 20px; }
        .zo-header-stats { grid-template-columns: 1fr; }
        .zo-total-zakat { font-size: 2.8rem; }
    }
</style>

<div class="zo-page">
    <section class="zo-hero">
        <div class="zo-hero-inner">
            <div class="zo-hero-badge"><i class="fas fa-desktop"></i> Online Tool</div>
            <h1>Zakat Calculator Online</h1>
            <p>Compute your Zakat obligations instantly, privately, and accurately using real-time Nisab values.</p>
        </div>
    </section>

    <section class="zo-content-section">
        <div class="zo-calc-wrapper">
            <div class="zo-header-stats">
                <div class="zo-stat-box">
                    <div class="zo-stat-label">Current Gold Nisab (87.48g)</div>
                    <div class="zo-stat-val"><?php echo e($config->currency_code); ?> <?php echo e(number_format(87.48 * $config->gold_price_per_gram)); ?></div>
                </div>
                <div class="zo-stat-box">
                    <div class="zo-stat-label">Current Silver Nisab (612.36g)</div>
                    <div class="zo-stat-val"><?php echo e($config->currency_code); ?> <?php echo e(number_format(612.36 * $config->silver_price_per_gram)); ?></div>
                </div>
            </div>

            <form id="onlineZakatForm">
                <div class="zo-form-group">
                    <h3><i class="fas fa-money-bill-wave"></i> Cash & Savings</h3>
                    <div class="zo-input-row">
                        <label>Cash at home & bank accounts</label>
                        <div class="zo-input-wrapper">
                            <span class="curr-symbol"><?php echo e($config->currency_code); ?></span>
                            <input type="number" class="z-input" id="z_cash" placeholder="0" min="0" step="any">
                        </div>
                    </div>
                </div>

                <div class="zo-form-group">
                    <h3><i class="fas fa-ring"></i> Gold & Silver</h3>
                    <div class="zo-input-row">
                        <label>Value of Gold you own</label>
                        <div class="zo-input-wrapper">
                            <span class="curr-symbol"><?php echo e($config->currency_code); ?></span>
                            <input type="number" class="z-input" id="z_gold" placeholder="0" min="0" step="any">
                        </div>
                    </div>
                    <div class="zo-input-row">
                        <label>Value of Silver you own</label>
                        <div class="zo-input-wrapper">
                            <span class="curr-symbol"><?php echo e($config->currency_code); ?></span>
                            <input type="number" class="z-input" id="z_silver" placeholder="0" min="0" step="any">
                        </div>
                    </div>
                </div>

                <div class="zo-form-group">
                    <h3><i class="fas fa-chart-line"></i> Investments & Business</h3>
                    <div class="zo-input-row">
                        <label>Shares, Stocks & Mutual Funds</label>
                        <div class="zo-input-wrapper">
                            <span class="curr-symbol"><?php echo e($config->currency_code); ?></span>
                            <input type="number" class="z-input" id="z_invest" placeholder="0" min="0" step="any">
                        </div>
                    </div>
                    <div class="zo-input-row">
                        <label>Business Inventory (Stock in trade)</label>
                        <div class="zo-input-wrapper">
                            <span class="curr-symbol"><?php echo e($config->currency_code); ?></span>
                            <input type="number" class="z-input" id="z_business" placeholder="0" min="0" step="any">
                        </div>
                    </div>
                </div>

                <div class="zo-form-group">
                    <h3><i class="fas fa-file-invoice-dollar"></i> Liabilities (Deductibles)</h3>
                    <div class="zo-input-row">
                        <label>Borrowed money, short-term debts</label>
                        <div class="zo-input-wrapper">
                            <span class="curr-symbol"><?php echo e($config->currency_code); ?></span>
                            <input type="number" class="z-input" id="z_liabilities" placeholder="0" min="0" step="any">
                        </div>
                    </div>
                </div>
            </form>

            <div class="zo-summary" id="z_summary">
                <h3>Your Zakat Due</h3>
                <div class="zo-total-zakat"><?php echo e($config->currency_code); ?> <span id="z_result_val">0</span></div>
                <p>Based on 2.5% of your net Zakatable wealth.</p>
                <div class="zo-status" id="z_status_msg">Enter your assets to begin</div>
            </div>
        </div>

        <div class="zo-sidebar">
            <div class="zo-sidebar-content">
                <h3>Why Calculate Online?</h3>
                <p>Our online Zakat calculator streamlines the entire process of evaluating your wealth according to Islamic jurisprudence.</p>
                
                <ul class="zo-info-list">
                    <li>
                        <i class="fas fa-bolt"></i>
                        <div class="zo-info-text">
                            <strong>Instant & Accurate</strong>
                            <span>Your Zakat is computed instantly as you type, ensuring 100% mathematical accuracy.</span>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-shield-alt"></i>
                        <div class="zo-info-text">
                            <strong>Private & Secure</strong>
                            <span>All calculations happen locally on your device. No financial data is sent to our servers.</span>
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-sync"></i>
                        <div class="zo-info-text">
                            <strong>Live Nisab Tracking</strong>
                            <span>We maintain updated silver and gold thresholds to ensure you only pay when obligated.</span>
                        </div>
                    </li>
                </ul>

                <div class="zo-faq">
                    <h4>Common Questions</h4>
                    <div class="zo-faq-item">
                        <div class="zo-faq-q">What is the 2.5% rule? <i class="fas fa-plus"></i></div>
                        <div class="zo-faq-a">Zakat is calculated at 2.5% (or 1/40th) of your total qualifying wealth once it has been held for a full lunar year (Hawl).</div>
                    </div>
                    <div class="zo-faq-item">
                        <div class="zo-faq-q">Which Nisab is used? <i class="fas fa-plus"></i></div>
                        <div class="zo-faq-a">Most modern scholars recommend the Silver Nisab because it is lower, thereby allowing more people to give to charity and benefit the community.</div>
                    </div>
                    <div class="zo-faq-item">
                        <div class="zo-faq-q">Do I deduct my mortgage? <i class="fas fa-plus"></i></div>
                        <div class="zo-faq-a">Only the upcoming year's mortgage payments (short-term debt) should be deducted, not the entire long-term principal.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.z-input');
    const resultEl = document.getElementById('z_result_val');
    const statusEl = document.getElementById('z_status_msg');
    
    // Server-provided values
    const silverNisab = <?php echo e(612.36 * $config->silver_price_per_gram); ?>;
    
    function calculate() {
        let cash = parseFloat(document.getElementById('z_cash').value) || 0;
        let gold = parseFloat(document.getElementById('z_gold').value) || 0;
        let silver = parseFloat(document.getElementById('z_silver').value) || 0;
        let invest = parseFloat(document.getElementById('z_invest').value) || 0;
        let business = parseFloat(document.getElementById('z_business').value) || 0;
        let liabilities = parseFloat(document.getElementById('z_liabilities').value) || 0;

        let totalAssets = cash + gold + silver + invest + business;
        let netWealth = totalAssets - liabilities;

        if(netWealth < 0) netWealth = 0;

        if (totalAssets === 0 && liabilities === 0) {
            resultEl.textContent = '0';
            statusEl.textContent = 'Enter your assets to begin';
            statusEl.style.backgroundColor = 'rgba(255,255,255,0.2)';
            return;
        }

        if (netWealth >= silverNisab) {
            let zakatDue = netWealth * 0.025;
            resultEl.textContent = zakatDue.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
            statusEl.textContent = 'Alhamdulillah, you meet the Nisab. Zakat is due.';
            statusEl.style.backgroundColor = 'rgba(255,255,255,0.2)';
        } else {
            resultEl.textContent = '0';
            statusEl.textContent = 'Net wealth is below Nisab. No Zakat due.';
            statusEl.style.backgroundColor = 'rgba(0,0,0,0.1)';
        }
    }

    inputs.forEach(input => {
        input.addEventListener('input', calculate);
    });

    // FAQ Accordion
    document.querySelectorAll('.zo-faq-q').forEach(q => {
        q.addEventListener('click', function() {
            let parent = this.parentElement;
            parent.classList.toggle('open');
            let icon = this.querySelector('i');
            if(parent.classList.contains('open')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
            } else {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/zakat/calculator_online.blade.php ENDPATH**/ ?>