<?php $__env->startSection('title', 'Online Zakat Calculator 2024 — Calculate Zakat on Gold & PKR'); ?>
<?php $__env->startSection('meta_description', 'Learn how to calculate zakat in Islam using our online zakat calculator 2024. Accurate zakat calculator for Pakistan in rupees (PKR), gold, and silver.'); ?>
<?php $__env->startSection('meta_keywords', 'zakat calculator, gold zakat calculator, zakat calculator pakistan, how to calculate zakat in islam, how to calculate zakat on gold, zakat calculator pakistan 2022, how to calculate zakat, zakat calculator on gold, zakat calculator pkr, zakat calculator rupees, zakat calculator 2023, online zakat calculator, zakat calculator 2024, zakat calculator in rupees, zakat calculator pakistan 2021'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap');

    :root {
        --primary: #145DA0;
        --primary-dark: #0C3D6E;
        --primary-light: #3D8FD1;
        --primary-glow: rgba(20, 93, 160, 0.25);
        --primary-subtle: rgba(20, 93, 160, 0.07);
        --secondary: #F5F8F7;
        --secondary-dark: #E8F1ED;
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
        --shadow-lg: 0 8px 32px rgba(0,0,0,0.10);
        --shadow-xl: 0 12px 48px rgba(0,0,0,0.12);
        --radius-sm: 6px;
        --radius-md: 10px;
        --radius-lg: 16px;
        --radius-xl: 28px;
        --tr: all 0.25s ease;
    }

    .zakat-page * { box-sizing: border-box; }
    .zakat-page { font-family: 'Poppins', sans-serif; background: var(--secondary-light); color: var(--text-dark); line-height: 1.7; -webkit-font-smoothing: antialiased; overflow-x: hidden; }

    /* ====== TOP BAR ====== */
    .z-top-bar { background: var(--primary-dark); padding: 7px 0; font-size: 0.78rem; color: rgba(255,255,255,0.85); }
    .z-top-bar-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; justify-content: space-between; align-items: center; }
    .z-top-bar-left { display: flex; align-items: center; gap: 22px; }
    .z-top-bar-left span { display: flex; align-items: center; gap: 6px; }
    .z-top-bar-left i { color: var(--gold-light); font-size: 0.72rem; }
    .z-top-bar-right { display: flex; align-items: center; gap: 12px; }
    .z-top-bar-right a { color: rgba(255,255,255,0.85); text-decoration: none; width: 26px; height: 26px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; font-size: 0.68rem; transition: var(--tr); }
    .z-top-bar-right a:hover { background: var(--gold); color: var(--primary-dark); border-color: var(--gold); }
    .z-hijri-date { font-family: 'Amiri', serif; color: var(--gold-light); font-size: 0.88rem; }

    /* ====== NAVBAR ====== */
    .z-navbar { background: var(--white); position: sticky; top: 0; z-index: 1000; border-bottom: 1px solid rgba(20,93,160,0.06); transition: var(--tr); }
    .z-navbar.scrolled { box-shadow: var(--shadow-md); border-bottom-color: transparent; }
    .z-navbar-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; justify-content: space-between; height: 72px; }
    .z-logo { display: flex; align-items: center; gap: 11px; text-decoration: none; }
    .z-logo-icon { width: 44px; height: 44px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; position: relative; box-shadow: 0 3px 12px var(--primary-glow); }
    .z-logo-icon i { color: var(--white); font-size: 1.1rem; }
    .z-logo-icon::after { content: ''; position: absolute; inset: -2.5px; border-radius: 50%; border: 1.5px solid var(--gold); opacity: 0.4; }
    .z-logo-text { display: flex; flex-direction: column; }
    .z-logo-text-ar { font-family: 'Amiri', serif; font-size: 1.3rem; font-weight: 700; color: var(--primary-dark); line-height: 1.15; }
    .z-logo-text-en { font-size: 0.6rem; color: var(--text-light); letter-spacing: 2.5px; text-transform: uppercase; font-weight: 500; }
    .z-nav-links { display: flex; align-items: center; gap: 2px; list-style: none; }
    .z-nav-links a { text-decoration: none; color: var(--text-medium); font-size: 0.85rem; font-weight: 500; padding: 8px 14px; border-radius: var(--radius-sm); transition: var(--tr); position: relative; }
    .z-nav-links a:hover { color: var(--primary); background: var(--primary-subtle); }
    .z-nav-links a.active { color: var(--primary); background: var(--primary-subtle); }
    .z-nav-links a.active::after { content: ''; position: absolute; bottom: 3px; left: 50%; transform: translateX(-50%); width: 18px; height: 2px; background: var(--primary); border-radius: 2px; }

    .z-mobile-toggle { display: none; flex-direction: column; gap: 5px; cursor: pointer; padding: 8px; border: none; background: none; z-index: 1002; }
    .z-mobile-toggle span { width: 22px; height: 2px; background: var(--text-dark); border-radius: 2px; transition: var(--tr); }
    .z-mobile-toggle.active span:nth-child(1) { transform: rotate(45deg) translate(5px, 5px); }
    .z-mobile-toggle.active span:nth-child(2) { opacity: 0; }
    .z-mobile-toggle.active span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }

    .z-mobile-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 1000; opacity: 0; transition: opacity 0.3s ease; }
    .z-mobile-overlay.active { opacity: 1; }
    .z-mobile-menu { position: fixed; top: 0; right: -300px; width: 290px; height: 100%; background: var(--white); z-index: 1001; padding: 90px 24px 30px; transition: right 0.35s ease; overflow-y: auto; box-shadow: -4px 0 24px rgba(0,0,0,0.1); }
    .z-mobile-menu.active { right: 0; }
    .z-mobile-menu a { display: flex; align-items: center; gap: 12px; text-decoration: none; color: var(--text-dark); font-size: 0.95rem; font-weight: 500; padding: 14px 16px; border-radius: var(--radius-sm); transition: var(--tr); border-bottom: 1px solid rgba(20,93,160,0.05); }
    .z-mobile-menu a:hover, .z-mobile-menu a.active { color: var(--primary); background: var(--primary-subtle); }
    .z-mobile-menu a i { width: 20px; text-align: center; color: var(--primary); font-size: 0.9rem; }

    /* ====== BREADCRUMB ====== */
    .z-breadcrumb { background: var(--secondary); border-bottom: 1px solid rgba(20,93,160,0.06); padding: 14px 0; }
    .z-breadcrumb-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; display: flex; align-items: center; gap: 10px; font-size: 0.82rem; list-style: none; }
    .z-breadcrumb a { color: var(--primary); text-decoration: none; font-weight: 500; transition: var(--tr); }
    .z-breadcrumb a:hover { color: var(--primary-dark); }
    .z-breadcrumb-sep { color: var(--text-light); font-size: 0.7rem; }
    .z-breadcrumb-current { color: var(--text-light); font-weight: 500; }

    /* ====== PAGE HERO ====== */
    .z-hero { position: relative; background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%); overflow: hidden; padding: 60px 0 55px; }
    .z-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.04; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px), radial-gradient(circle at 75% 75%, var(--white) 1px, transparent 1px); background-size: 50px 50px; pointer-events: none; }
    .z-hero-glow { position: absolute; border-radius: 50%; pointer-events: none; }
    .z-hero-glow-1 { width: 400px; height: 400px; background: radial-gradient(circle, rgba(184,134,59,0.1), transparent 70%); top: -150px; right: -60px; }
    .z-hero-glow-2 { width: 300px; height: 300px; background: radial-gradient(circle, rgba(20,93,160,0.12), transparent 70%); bottom: -100px; left: -60px; }
    .z-hero-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; position: relative; z-index: 2; text-align: center; }
    .z-hero-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.09); backdrop-filter: blur(8px); padding: 6px 18px; border-radius: var(--radius-xl); font-size: 0.76rem; font-weight: 500; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.12); color: var(--white); }
    .z-hero-badge i { color: var(--gold-light); }
    .z-hero h1 { font-family: 'Playfair Display', serif; font-size: 2.8rem; font-weight: 800; color: var(--white); margin-bottom: 12px; line-height: 1.2; }
    .z-hero h1 span { color: var(--gold-light); }
    .z-hero p { font-size: 1rem; color: rgba(255,255,255,0.72); max-width: 600px; margin: 0 auto; line-height: 1.8; }

    /* ====== CALCULATOR SECTION ====== */
    .z-calc-section { padding: 70px 0; background: var(--secondary-light); position: relative; }
    .z-calc-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px; }
    .z-calc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; align-items: start; }

    .z-calc-form { background: var(--white); border-radius: var(--radius-lg); padding: 36px; box-shadow: var(--shadow-md); border: 1px solid rgba(20,93,160,0.05); }
    .z-calc-form-header { display: flex; align-items: center; gap: 12px; margin-bottom: 6px; }
    .z-calc-form-header i { color: var(--gold); font-size: 1.2rem; width: 36px; height: 36px; background: linear-gradient(135deg, rgba(184,134,59,0.08), rgba(184,134,59,0.14)); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; }
    .z-calc-form-header h2 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: var(--text-dark); margin: 0; }
    .z-calc-form > .z-form-desc { font-size: 0.85rem; color: var(--text-light); margin-bottom: 28px; }

    .z-field { margin-bottom: 22px; }
    .z-field-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px; }
    .z-field-top label { font-size: 0.84rem; font-weight: 600; color: var(--text-dark); display: flex; align-items: center; gap: 8px; }
    .z-field-top label i { color: var(--primary); font-size: 0.8rem; width: 28px; height: 28px; background: var(--primary-subtle); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
    .z-rate-badge { font-size: 0.72rem; color: var(--text-light); background: var(--secondary); padding: 3px 10px; border-radius: var(--radius-xl); font-weight: 500; }
    .z-rate-badge strong { color: var(--gold-dark); }
    .z-input-wrap { position: relative; display: flex; align-items: center; }
    .z-input-prefix { position: absolute; left: 14px; font-size: 0.84rem; font-weight: 600; color: var(--text-light); pointer-events: none; }
    .z-input-prefix.negative { color: #C0392B; }
    .z-input { width: 100%; padding: 13px 16px 13px 52px; border: 1.5px solid rgba(20,93,160,0.10); border-radius: var(--radius-sm); font-family: 'Poppins', sans-serif; font-size: 0.92rem; color: var(--text-dark); background: var(--secondary-light); outline: none; transition: var(--tr); }
    .z-input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px var(--primary-subtle); background: var(--white); }
    .z-input::placeholder { color: var(--text-light); font-weight: 400; font-size: 0.84rem; }
    .z-input.negative-input:focus { border-color: #C0392B; box-shadow: 0 0 0 3px rgba(192,57,43,0.08); }

    .z-input-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; }
    .z-input-grid .z-field:last-child { margin-bottom: 0; }

    .z-calc-btn { width: 100%; padding: 15px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: var(--white); border: none; border-radius: var(--radius-sm); font-family: 'Poppins', sans-serif; font-size: 1rem; font-weight: 700; cursor: pointer; transition: var(--tr); display: flex; align-items: center; justify-content: center; gap: 10px; box-shadow: 0 3px 16px var(--primary-glow); margin-top: 8px; }
    .z-calc-btn:hover { box-shadow: 0 6px 24px var(--primary-glow); transform: translateY(-2px); }
    .z-calc-btn:active { transform: translateY(0); }

    /* ====== RESULTS CARD ====== */
    .z-result-card { background: var(--white); border-radius: var(--radius-lg); padding: 36px; box-shadow: var(--shadow-md); border: 1px solid rgba(20,93,160,0.05); position: sticky; top: 96px; }
    .z-result-header { display: flex; align-items: center; gap: 12px; margin-bottom: 24px; }
    .z-result-header i { color: var(--primary); font-size: 1.1rem; width: 36px; height: 36px; background: var(--primary-subtle); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; }
    .z-result-header h2 { font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: var(--text-dark); margin: 0; }

    .z-result-placeholder { text-align: center; padding: 40px 20px; }
    .z-result-placeholder-icon { width: 72px; height: 72px; border-radius: 50%; background: var(--secondary); display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; }
    .z-result-placeholder-icon i { font-size: 1.6rem; color: var(--text-light); }
    .z-result-placeholder p { font-size: 0.88rem; color: var(--text-light); line-height: 1.7; max-width: 320px; margin: 0 auto; }

    .z-result-content { display: none; }
    .z-result-content.active { display: block; animation: zResultFade 0.4s ease; }
    @keyframes zResultFade { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    .z-nisab-status { display: flex; align-items: center; gap: 12px; padding: 14px 18px; border-radius: var(--radius-md); margin-bottom: 22px; font-size: 0.88rem; font-weight: 600; }
    .z-nisab-status.eligible { background: rgba(39, 174, 96, 0.08); color: #1E8449; border: 1px solid rgba(39, 174, 96, 0.15); }
    .z-nisab-status.not-eligible { background: rgba(192, 57, 43, 0.06); color: #922B21; border: 1px solid rgba(192, 57, 43, 0.12); }
    .z-nisab-status i { font-size: 1.1rem; }

    .z-breakdown { margin-bottom: 24px; }
    .z-bd-row { display: flex; justify-content: space-between; align-items: center; padding: 11px 0; border-bottom: 1px solid rgba(20,93,160,0.05); font-size: 0.86rem; }
    .z-bd-row:last-child { border-bottom: none; }
    .z-bd-label { color: var(--text-medium); display: flex; align-items: center; gap: 8px; }
    .z-bd-label i { font-size: 0.75rem; color: var(--text-light); width: 18px; text-align: center; }
    .z-bd-value { font-weight: 600; color: var(--text-dark); }
    .z-bd-value.neg { color: #C0392B; }
    .z-bd-row.total { border-top: 2px solid rgba(20,93,160,0.10); border-bottom: none; margin-top: 4px; padding-top: 14px; }
    .z-bd-row.total .z-bd-label { font-weight: 700; color: var(--text-dark); }
    .z-bd-row.total .z-bd-value { font-weight: 700; color: var(--primary); font-size: 0.95rem; }

    .z-zakat-box { background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: var(--radius-md); padding: 28px; text-align: center; color: var(--white); position: relative; overflow: hidden; }
    .z-zakat-box::before { content: ''; position: absolute; inset: 0; opacity: 0.03; background-image: radial-gradient(circle, var(--gold) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; }
    .z-zakat-box-label { font-size: 0.82rem; color: rgba(255,255,255,0.65); margin-bottom: 8px; position: relative; z-index: 1; }
    .z-zakat-box-amount { font-family: 'Playfair Display', serif; font-size: 2.4rem; font-weight: 800; color: var(--gold-light); margin-bottom: 4px; position: relative; z-index: 1; }
    .z-zakat-box-rate { font-size: 0.76rem; color: rgba(255,255,255,0.45); position: relative; z-index: 1; }

    .z-no-zakat { text-align: center; padding: 30px 20px; }
    .z-no-zakat-icon { width: 64px; height: 64px; border-radius: 50%; background: rgba(192,57,43,0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; }
    .z-no-zakat-icon i { font-size: 1.4rem; color: #C0392B; }
    .z-no-zakat h4 { font-size: 1rem; font-weight: 600; color: var(--text-dark); margin-bottom: 6px; }
    .z-no-zakat p { font-size: 0.84rem; color: var(--text-light); line-height: 1.7; }

    .z-nisab-info { margin-top: 20px; padding: 14px 18px; background: var(--secondary); border-radius: var(--radius-sm); font-size: 0.78rem; color: var(--text-light); line-height: 1.7; }
    .z-nisab-info strong { color: var(--text-medium); }

    /* ====== INFO / SEO SECTION ====== */
    .z-info-section { padding: 80px 0 0; background: var(--secondary-light); }
    .z-info-inner { max-width: 1280px; margin: 0 auto; padding: 0 28px 60px; }

    .z-info-block { margin-bottom: 50px; }
    .z-info-block:last-child { margin-bottom: 0; }
    .z-info-header { display: flex; align-items: flex-start; gap: 18px; margin-bottom: 18px; }
    .z-info-icon { width: 52px; height: 52px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--primary-subtle), rgba(20,93,160,0.12)); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; color: var(--primary); flex-shrink: 0; border: 1px solid rgba(20,93,160,0.08); }
    .z-info-header h2 { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 700; color: var(--text-dark); line-height: 1.3; margin: 0; }
    .z-info-block p { font-size: 0.92rem; color: var(--text-medium); line-height: 1.9; margin-bottom: 14px; }
    .z-info-block p:last-child { margin-bottom: 0; }
    .z-info-block strong { color: var(--text-dark); font-weight: 600; }

    .z-info-divider { height: 1px; background: linear-gradient(to right, transparent, rgba(20,93,160,0.10), transparent); margin: 0 0 50px; }

    .z-categories-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 18px; }
    .z-cat-item { display: flex; align-items: center; gap: 12px; padding: 14px 18px; background: var(--white); border-radius: var(--radius-sm); border: 1px solid rgba(20,93,160,0.05); transition: var(--tr); }
    .z-cat-item:hover { border-color: var(--primary); box-shadow: 0 0 0 2px var(--primary-subtle); }
    .z-cat-num { width: 30px; height: 30px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: var(--white); font-size: 0.78rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .z-cat-item h4 { font-size: 0.84rem; font-weight: 600; color: var(--text-dark); margin: 0; }
    .z-cat-item span { font-family: 'Amiri', serif; font-size: 0.82rem; color: var(--primary); display: block; margin-top: 1px; }



    /* ====== TOAST ====== */
    .z-toast { position: fixed; bottom: 28px; left: 50%; transform: translateX(-50%) translateY(100px); background: var(--text-dark); color: var(--white); padding: 14px 28px; border-radius: var(--radius-md); font-size: 0.88rem; font-weight: 500; z-index: 9999; opacity: 0; transition: all 0.4s ease; display: flex; align-items: center; gap: 10px; box-shadow: var(--shadow-xl); }
    .z-toast.show { opacity: 1; transform: translateX(-50%) translateY(0); }
    .z-toast i { color: var(--gold-light); }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 1024px) {
        .z-calc-grid { grid-template-columns: 1fr; }
        .z-result-card { position: static; }
        .z-categories-grid { grid-template-columns: 1fr; }
        .z-hero h1 { font-size: 2.3rem; }
    }
    @media (max-width: 768px) {
        .z-top-bar-left { display: none; }
        .z-top-bar-inner { justify-content: center; }
        .z-nav-links { display: none; }
        .z-mobile-toggle { display: flex; }
        .z-calc-section { padding: 50px 0; }
        .z-calc-inner { padding: 0 20px; }
        .z-calc-form, .z-result-card { padding: 24px; }
        .z-hero { padding: 45px 0 40px; }
        .z-hero-inner { padding: 0 20px; }
        .z-hero h1 { font-size: 1.9rem; }
        .z-info-section { padding: 60px 0 0; }
        .z-info-inner { padding: 0 20px 40px; }
        .z-info-header h2 { font-size: 1.3rem; }
        .z-info-block p { font-size: 0.88rem; }
        .z-breadcrumb-inner { padding: 0 20px; }
        .z-input-grid { grid-template-columns: 1fr; }
        .z-input-grid .z-field:last-child { margin-bottom: 22px; }
    }
    @media (max-width: 480px) {
        .z-top-bar { padding: 6px 0; font-size: 0.72rem; }
        .z-top-bar-right a { width: 24px; height: 24px; font-size: 0.62rem; }
        .z-navbar-inner { height: 64px; padding: 0 16px; }
        .z-logo-icon { width: 38px; height: 38px; }
        .z-logo-icon i { font-size: 0.95rem; }
        .z-logo-text-ar { font-size: 1.1rem; }
        .z-hero h1 { font-size: 1.5rem; }
        .z-hero p { font-size: 0.88rem; }
        .z-calc-inner { padding: 0 16px; }
        .z-calc-form, .z-result-card { padding: 20px 16px; }
        .z-calc-form-header h2, .z-result-header h2 { font-size: 1.15rem; }
        .z-input { padding: 12px 14px 12px 48px; font-size: 0.86rem; }
        .z-zakat-box-amount { font-size: 1.9rem; }
        .z-info-inner { padding: 0 16px 30px; }
        .z-info-header h2 { font-size: 1.15rem; }
        .z-info-icon { width: 44px; height: 44px; font-size: 1.1rem; }
        .z-cat-item { padding: 12px 14px; }
        .z-cat-item h4 { font-size: 0.8rem; }
        .z-toast { padding: 12px 20px; font-size: 0.82rem; bottom: 20px; }
    }
</style>

<div class="zakat-page">



    <!-- ====== BREADCRUMB ====== -->
    <div class="z-breadcrumb">
        <div class="z-breadcrumb-inner">
            <a href="<?php echo e(route('home')); ?>">Home</a>
            <i class="fas fa-chevron-right z-breadcrumb-sep"></i>
            <span class="z-breadcrumb-current">Zakat Calculator</span>
        </div>
    </div>

    <!-- ====== PAGE HERO ====== -->
    <section class="z-hero">
        <div class="z-hero-glow z-hero-glow-1"></div>
        <div class="z-hero-glow z-hero-glow-2"></div>
        <div class="z-hero-inner">
            <div class="z-hero-badge"><i class="fas fa-hand-holding-usd"></i> Islamic Obligation</div>
            <h1>Zakat <span>Calculator</span></h1>
            <p>Accurately determine your obligatory alms based on real-time Nisab values.</p>
        </div>
    </section>

    <!-- ====== CALCULATOR SECTION ====== -->
    <section class="z-calc-section" id="zCalculator">
        <div class="z-calc-inner">
            <div class="z-calc-grid">

                <!-- FORM -->
                <div class="z-calc-form z-reveal">
                    <div class="z-calc-form-header">
                        <i class="fas fa-coins"></i>
                        <h2>Wealth Assessment</h2>
                    </div>
                    <p class="z-form-desc">Enter your total assets and liabilities to calculate your Zakat obligation.</p>

                    <div class="z-input-grid">
                        <div class="z-field">
                            <div class="z-field-top">
                                <label><i class="fas fa-money-bill-wave"></i> Cash in Hand / Bank</label>
                            </div>
                            <div class="z-input-wrap">
                                <span class="z-input-prefix"><?php echo e($config->currency_code); ?></span>
                                <input type="number" id="zCash" class="z-input" placeholder="0.00" min="0" step="0.01">
                            </div>
                        </div>
                        <div class="z-field">
                            <div class="z-field-top">
                                <label><i class="fas fa-store"></i> Business Inventory</label>
                            </div>
                            <div class="z-input-wrap">
                                <span class="z-input-prefix"><?php echo e($config->currency_code); ?></span>
                                <input type="number" id="zInventory" class="z-input" placeholder="0.00" min="0" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="z-input-grid">
                        <div class="z-field">
                            <div class="z-field-top">
                                <label><i class="fas fa-gem"></i> Value of Gold</label>
                                <span class="z-rate-badge">Current Rate: <strong><?php echo e($config->currency_code); ?> <?php echo e(number_format($config->gold_price_per_gram, 2)); ?></strong> / g</span>
                            </div>
                            <div class="z-input-wrap">
                                <span class="z-input-prefix"><?php echo e($config->currency_code); ?></span>
                                <input type="number" id="zGold" class="z-input" placeholder="0.00" min="0" step="0.01">
                            </div>
                        </div>
                        <div class="z-field">
                            <div class="z-field-top">
                                <label><i class="fas fa-ring"></i> Value of Silver</label>
                                <span class="z-rate-badge">Current Rate: <strong><?php echo e($config->currency_code); ?> <?php echo e(number_format($config->silver_price_per_gram, 2)); ?></strong> / g</span>
                            </div>
                            <div class="z-input-wrap">
                                <span class="z-input-prefix"><?php echo e($config->currency_code); ?></span>
                                <input type="number" id="zSilver" class="z-input" placeholder="0.00" min="0" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="z-field" style="margin-top: 10px;">
                        <div class="z-field-top">
                            <label><i class="fas fa-file-invoice-dollar"></i> Debts & Immediate Liabilities</label>
                        </div>
                        <div class="z-input-wrap">
                            <span class="z-input-prefix negative">- <?php echo e($config->currency_code); ?></span>
                            <input type="number" id="zDebt" class="z-input negative-input" placeholder="0.00" min="0" step="0.01">
                        </div>
                    </div>

                    <button type="button" class="z-calc-btn" id="zCalcBtn">
                        <i class="fas fa-calculator"></i> Calculate My Zakat
                    </button>
                </div>

                <!-- RESULTS -->
                <div class="z-result-card z-reveal">
                    <div class="z-result-header">
                        <i class="fas fa-chart-pie"></i>
                        <h2>Calculation Results</h2>
                    </div>

                    <div class="z-result-placeholder" id="zPlaceholder">
                        <div class="z-result-placeholder-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <p>Please enter your assets and liabilities in the form above and click calculate to view your detailed Zakat obligation.</p>
                    </div>

                    <div class="z-result-content" id="zResultContent">
                        <div class="z-nisab-status" id="zNisabStatus">
                            <i class="fas fa-check-circle"></i>
                            <span id="zNisabText">Your wealth exceeds the Nisab threshold. Zakat is obligatory.</span>
                        </div>

                        <div class="z-breakdown" id="zBreakdown">
                            <div class="z-bd-row">
                                <span class="z-bd-label"><i class="fas fa-money-bill-wave"></i> Cash in Hand / Bank</span>
                                <span class="z-bd-value" id="zResCash"><?php echo e($config->currency_code); ?> 0.00</span>
                            </div>
                            <div class="z-bd-row">
                                <span class="z-bd-label"><i class="fas fa-store"></i> Business Inventory</span>
                                <span class="z-bd-value" id="zResInv"><?php echo e($config->currency_code); ?> 0.00</span>
                            </div>
                            <div class="z-bd-row">
                                <span class="z-bd-label"><i class="fas fa-gem"></i> Value of Gold</span>
                                <span class="z-bd-value" id="zResGold"><?php echo e($config->currency_code); ?> 0.00</span>
                            </div>
                            <div class="z-bd-row">
                                <span class="z-bd-label"><i class="fas fa-ring"></i> Value of Silver</span>
                                <span class="z-bd-value" id="zResSilver"><?php echo e($config->currency_code); ?> 0.00</span>
                            </div>
                            <div class="z-bd-row">
                                <span class="z-bd-label"><i class="fas fa-file-invoice-dollar"></i> Debts / Liabilities</span>
                                <span class="z-bd-value neg" id="zResDebt">- <?php echo e($config->currency_code); ?> 0.00</span>
                            </div>
                            <div class="z-bd-row total">
                                <span class="z-bd-label"><i class="fas fa-balance-scale"></i> Net Zakatable Wealth</span>
                                <span class="z-bd-value" id="zResNet"><?php echo e($config->currency_code); ?> 0.00</span>
                            </div>
                        </div>

                        <div class="z-zakat-box" id="zZakatBox">
                            <div class="z-zakat-box-label">Your Zakat Obligation</div>
                            <div class="z-zakat-box-amount" id="zZakatAmount"><?php echo e($config->currency_code); ?> 0.00</div>
                            <div class="z-zakat-box-rate">Calculated at 2.5% (1/40th) of net wealth</div>
                        </div>

                        <div class="z-no-zakat" id="zNoZakat" style="display:none;">
                            <div class="z-no-zakat-icon"><i class="fas fa-info-circle"></i></div>
                            <h4>No Zakat Obligation</h4>
                            <p>Your net wealth is below the Nisab threshold. Zakat is not obligatory for you at this time.</p>
                        </div>

                        <div class="z-nisab-info" id="zNisabInfo">
                            <strong>Nisab (Silver Standard):</strong> 595 grams × <?php echo e($config->currency_code); ?> <?php echo e(number_format($config->silver_price_per_gram, 2)); ?> = <strong><?php echo e($config->currency_code); ?> <?php echo e(number_format($config->silver_price_per_gram * 595, 2)); ?></strong><br>
                            <strong>Nisab (Gold Standard):</strong> 85 grams × <?php echo e($config->currency_code); ?> <?php echo e(number_format($config->gold_price_per_gram, 2)); ?> = <strong><?php echo e($config->currency_code); ?> <?php echo e(number_format($config->gold_price_per_gram * 85, 2)); ?></strong><br>
                            Calculation uses the silver Nisab as recommended by many scholars for broader coverage.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ====== INFO / SEO SECTION ====== -->
    <section class="z-info-section" id="zInfo">
        <?php echo $__env->make('pages.zakat.seo_article', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </section>

</div>

<!-- ====== TOAST ====== -->
<div class="z-toast" id="zToast"><i class="fas fa-check-circle"></i><span id="zToastMsg"></span></div>

<script>
    /* ====== CONFIG FROM PHP ====== */
    var goldRate = <?php echo e($config->gold_price_per_gram); ?>;
    var silverRate = <?php echo e($config->silver_price_per_gram); ?>;
    var currency = '<?php echo e($config->currency_code); ?>';
    var nisabSilver = silverRate * 595;
    var nisabGold = goldRate * 85;

    /* ====== TOAST ====== */
    var zToast = document.getElementById('zToast');
    var zToastMsg = document.getElementById('zToastMsg');
    var zToastTimer;
    function zShowToast(msg) {
        clearTimeout(zToastTimer);
        if(zToastMsg) zToastMsg.textContent = msg;
        if(zToast) zToast.classList.add('show');
        zToastTimer = setTimeout(function() { if(zToast) zToast.classList.remove('show'); }, 3500);
    }

    /* ====== FORMAT ====== */
    function zFormat(num) {
        var abs = Math.abs(num);
        var f = abs.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        return (num < 0 ? '- ' : '') + currency + ' ' + f;
    }

    /* ====== CALCULATE ====== */
    var zCalcBtn = document.getElementById('zCalcBtn');
    if (zCalcBtn) {
        zCalcBtn.addEventListener('click', function(e) {
            e.preventDefault();

            var cash = parseFloat(document.getElementById('zCash').value) || 0;
            var inv = parseFloat(document.getElementById('zInventory').value) || 0;
            var gold = parseFloat(document.getElementById('zGold').value) || 0;
            var silver = parseFloat(document.getElementById('zSilver').value) || 0;
            var debt = parseFloat(document.getElementById('zDebt').value) || 0;

            var totalAssets = cash + inv + gold + silver;
            var netWealth = totalAssets - debt;

            /* Hide placeholder, show results */
            var zPlaceholder = document.getElementById('zPlaceholder');
            if (zPlaceholder) zPlaceholder.style.display = 'none';
            
            var rc = document.getElementById('zResultContent');
            if (rc) {
                rc.classList.remove('active');
                void rc.offsetWidth;
                rc.classList.add('active');
            }

            /* Fill breakdown */
            document.getElementById('zResCash').textContent = zFormat(cash);
            document.getElementById('zResInv').textContent = zFormat(inv);
            document.getElementById('zResGold').textContent = zFormat(gold);
            document.getElementById('zResSilver').textContent = zFormat(silver);
            document.getElementById('zResDebt').textContent = '- ' + zFormat(debt).replace('- ', '');
            document.getElementById('zResNet').textContent = zFormat(Math.max(0, netWealth));

            var nisabStatus = document.getElementById('zNisabStatus');
            var nisabText = document.getElementById('zNisabText');
            var zakatBox = document.getElementById('zZakatBox');
            var noZakat = document.getElementById('zNoZakat');
            var breakdown = document.getElementById('zBreakdown');
            var nisabInfo = document.getElementById('zNisabInfo');
            var formattedNisab = nisabSilver.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            if (totalAssets === 0) {
                breakdown.style.display = 'none';
                zakatBox.style.display = 'none';
                noZakat.style.display = 'none';
                nisabInfo.style.display = 'none';
                nisabStatus.className = 'z-nisab-status not-eligible';
                nisabStatus.querySelector('i').className = 'fas fa-exclamation-triangle';
                nisabText.textContent = 'Please enter at least one asset value to receive a calculation.';
                zShowToast('Please enter your asset values first.');
                return;
            }

            breakdown.style.display = '';
            nisabInfo.style.display = '';

            if (netWealth >= nisabSilver) {
                var zakat = netWealth * 0.025;

                nisabStatus.className = 'z-nisab-status eligible';
                nisabStatus.querySelector('i').className = 'fas fa-check-circle';
                nisabText.textContent = 'Your wealth exceeds the Nisab threshold (' + currency + ' ' + formattedNisab + '). Zakat is obligatory.';

                zakatBox.style.display = '';
                noZakat.style.display = 'none';
                document.getElementById('zZakatAmount').textContent = zFormat(zakat);

                zShowToast('Zakat calculated: ' + zFormat(zakat));
            } else {
                nisabStatus.className = 'z-nisab-status not-eligible';
                nisabStatus.querySelector('i').className = 'fas fa-times-circle';
                nisabText.textContent = 'Your net wealth (' + currency + ' ' + Math.max(0, netWealth).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ') is below the Nisab threshold (' + currency + ' ' + formattedNisab + ').';

                zakatBox.style.display = 'none';
                noZakat.style.display = '';

                zShowToast('Your wealth is below the Nisab. No Zakat is due.');
            }

            /* Scroll to results on mobile */
            if (window.innerWidth <= 1024 && rc) {
                setTimeout(function() {
                    rc.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 150);
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/zakat/calculator.blade.php ENDPATH**/ ?>