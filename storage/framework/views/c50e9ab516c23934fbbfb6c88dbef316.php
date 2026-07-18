

<?php $__env->startSection('title', 'Islamic Inheritance Calculator & Mirath Guide'); ?>
<?php $__env->startSection('meta_description', 'Learn the rules of Islamic Inheritance (Mirath) according to the Quran. Discover the fixed shares for heirs and use our guide to understand estate distribution.'); ?>
<?php $__env->startSection('meta_keywords', 'islamic inheritance calculator, mirath in islam, inheritance shares in islam, quran inheritance rules, faraid calculator, who inherits in islam'); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Islamic Inheritance (Mirath) Guide",
  "description": "Learn the rules of Islamic Inheritance (Mirath) according to the Quran.",
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
        --radius-md: 10px;
        --radius-lg: 16px;
        --tr: all 0.25s ease;
    }

    .c-page * { box-sizing: border-box; }
    .c-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; -webkit-font-smoothing: antialiased; }

    .c-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .c-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .c-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .c-breadcrumb a:hover { color: var(--primary-dark); }
    .c-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .c-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    .c-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); padding: 60px 0; text-align: center; overflow: hidden; }
    .c-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .c-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; }
    .c-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: 30px; font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .c-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .c-hero p { font-size: 1.05rem; color: rgba(255,255,255,0.75); max-width: 700px; margin: 0 auto; line-height: 1.8; }

    .c-content { padding: 60px 0; }
    .c-content-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: grid; grid-template-columns: 1fr 340px; gap: 40px; align-items: start; }
    
    .c-main-content { background: var(--white); padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); }
    .c-main-content h2 { font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 20px; margin-top: 40px; }
    .c-main-content h2:first-child { margin-top: 0; }
    .c-main-content p { font-size: 0.95rem; color: var(--text-medium); line-height: 1.8; margin-bottom: 16px; }

    .quran-box { background: var(--secondary); border-left: 4px solid var(--gold); padding: 30px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 30px 0; }
    .quran-box .translation { font-style: italic; color: var(--text-dark); margin-bottom: 10px; font-size: 1.05rem; line-height: 1.8; }
    .quran-box .reference { font-weight: 600; color: var(--primary); font-size: 0.9rem; }

    .c-table-wrap { overflow-x: auto; margin: 30px 0; border-radius: var(--radius-md); border: 1px solid rgba(20,93,160,0.1); }
    table { width: 100%; border-collapse: collapse; text-align: left; }
    th { background: var(--secondary); padding: 16px 20px; font-weight: 600; color: var(--primary-dark); font-size: 0.95rem; }
    td { padding: 16px 20px; border-top: 1px solid rgba(20,93,160,0.05); font-size: 0.9rem; color: var(--text-medium); }
    tr:nth-child(even) td { background: rgba(245,248,247,0.5); }
    td strong { color: var(--text-dark); }

    .alert-box { background: rgba(20,93,160,0.05); border-left: 4px solid var(--primary); padding: 20px; border-radius: 0 var(--radius-md) var(--radius-md) 0; margin: 20px 0; }
    .alert-box h4 { color: var(--primary-dark); margin-bottom: 8px; font-size: 1.05rem; }
    .alert-box p { margin: 0; font-size: 0.9rem; color: var(--text-dark); }

    .c-sidebar { position: sticky; top: 100px; }
    .c-widget { background: var(--white); padding: 24px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid rgba(20,93,160,0.05); margin-bottom: 24px; text-align: center; }
    .c-widget h4 { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--primary-dark); margin-bottom: 15px; }
    .c-widget p { font-size: 0.9rem; color: var(--text-medium); margin-bottom: 20px; }
    .c-widget-icon { font-size: 3rem; color: var(--gold-light); margin-bottom: 15px; }
    .contact-btn { display: inline-block; background: var(--primary); color: var(--white); text-decoration: none; font-weight: 600; padding: 10px 24px; border-radius: 30px; font-size: 0.9rem; transition: var(--tr); }
    .contact-btn:hover { background: var(--primary-dark); }

    @media (max-width: 992px) {
        .c-content-inner { grid-template-columns: 1fr; }
        .c-sidebar { display: grid; grid-template-columns: 1fr; gap: 20px; }
    }
    @media (max-width: 768px) {
        .c-hero h1 { font-size: 2.2rem; }
        .c-main-content { padding: 24px; }
    }
</style>

<div class="c-page">
    <div class="c-breadcrumb">
        <div class="c-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <a href="<?php echo e(route('calculators.index')); ?>">Calculators</a>
            <i class="fas fa-chevron-right c-breadcrumb-sep"></i>
            <span class="c-breadcrumb-current">Islamic Inheritance</span>
        </div>
    </div>

    <section class="c-hero">
        <div class="c-hero-inner">
            <div class="c-hero-badge"><i class="fas fa-sitemap"></i> Ilm al-Faraid</div>
            <h1>Islamic <span>Inheritance</span> Guide</h1>
            <p>Understand the divine laws of Mirath (Inheritance) as detailed in the Holy Quran.</p>
        </div>
    </section>

    <section class="c-content">
        <div class="c-content-inner">
            <div class="c-main-content">
                <h2>The Laws of Mirath</h2>
                <p>In Islam, the distribution of a deceased person's estate is not left to human discretion. Allah (SWT) has explicitly outlined the precise shares for each eligible heir in the Quran, primarily in Surah An-Nisa. This science of inheritance is known as <em>Ilm al-Faraid</em>.</p>

                <div class="quran-box">
                    <div class="translation">"Allah instructs you concerning your children: for the male, what is equal to the share of two females. But if there are [only] daughters, two or more, for them is two thirds of one's estate... And for one's parents, to each one of them is a sixth of his estate if he left children."</div>
                    <div class="reference">— Surah An-Nisa (4:11)</div>
                </div>

                <div class="alert-box">
                    <h4>Pre-Distribution Obligations</h4>
                    <p>Before any wealth is distributed to the heirs, three critical obligations must be settled from the deceased's estate in the following order:</p>
                    <ol style="margin-top:10px; margin-bottom:0; padding-left:20px; font-size:0.9rem;">
                        <li><strong>Funeral & Burial Expenses:</strong> Reasonable costs associated with the burial.</li>
                        <li><strong>Debts & Liabilities:</strong> Including pending Zakat, unpaid Kaffarah, Mahr (dowry) owed to the wife, and commercial/personal debts.</li>
                        <li><strong>Wasiyyah (Bequest/Will):</strong> Up to a maximum of <strong>1/3rd (33.3%)</strong> of the remaining estate can be willed to non-heirs or charities.</li>
                    </ol>
                </div>

                <h2>Primary Fixed Shares (Ashab al-Furud)</h2>
                <p>The Quran prescribes fixed fractional shares (1/2, 1/4, 1/8, 2/3, 1/3, 1/6) for certain primary heirs. The actual distribution depends entirely on who survives the deceased. Here is a basic overview of potential shares for primary heirs:</p>

                <div class="c-table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Heir</th>
                                <th>Share</th>
                                <th>Condition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Husband</strong></td>
                                <td>1/2</td>
                                <td>If the deceased wife leaves no children/descendants.</td>
                            </tr>
                            <tr>
                                <td><strong>Husband</strong></td>
                                <td>1/4</td>
                                <td>If the deceased wife leaves children.</td>
                            </tr>
                            <tr>
                                <td><strong>Wife</strong></td>
                                <td>1/4</td>
                                <td>If the deceased husband leaves no children (shared equally if multiple wives).</td>
                            </tr>
                            <tr>
                                <td><strong>Wife</strong></td>
                                <td>1/8</td>
                                <td>If the deceased husband leaves children.</td>
                            </tr>
                            <tr>
                                <td><strong>Daughter (Single)</strong></td>
                                <td>1/2</td>
                                <td>If she is the only child (no sons or other daughters).</td>
                            </tr>
                            <tr>
                                <td><strong>Daughters (Multiple)</strong></td>
                                <td>2/3</td>
                                <td>If there are 2 or more daughters and no sons (they share the 2/3 equally).</td>
                            </tr>
                            <tr>
                                <td><strong>Mother</strong></td>
                                <td>1/6</td>
                                <td>If the deceased has children or multiple siblings.</td>
                            </tr>
                            <tr>
                                <td><strong>Mother</strong></td>
                                <td>1/3</td>
                                <td>If the deceased has no children and no multiple siblings.</td>
                            </tr>
                            <tr>
                                <td><strong>Father</strong></td>
                                <td>1/6</td>
                                <td>If the deceased has children. (May also inherit the remainder if applicable).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2>The Rule of Asabah (Residuaries)</h2>
                <p>After the fixed shares (Ashab al-Furud) are distributed, the remaining estate goes to the residuary heirs (Al-Asabah), which are typically male relatives on the paternal side. The most common residuaries are sons.</p>
                <p><strong>Example:</strong> If a man dies leaving a wife, a son, and a daughter:</p>
                <ul>
                    <li>The <strong>Wife</strong> gets 1/8 (fixed share because there are children).</li>
                    <li>The remaining 7/8 is divided between the <strong>Son</strong> and the <strong>Daughter</strong>.</li>
                    <li>The rule applies: <em>"for the male, what is equal to the share of two females."</em> So the son gets twice the share of the daughter.</li>
                </ul>

            </div>

            <div class="c-sidebar">
                <div class="c-widget">
                    <div class="c-widget-icon"><i class="fas fa-balance-scale"></i></div>
                    <h4>Complex Calculations</h4>
                    <p>Islamic Inheritance involves highly complex rules regarding exclusion (Al-Hajb) and proportional reduction (Al-Awal). A simple online calculator cannot account for all edge cases.</p>
                    <p style="font-weight:600; color:var(--primary-dark);">We strongly recommend consulting a qualified Islamic scholar or Mufti for actual estate distribution.</p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/calculators/inheritance.blade.php ENDPATH**/ ?>