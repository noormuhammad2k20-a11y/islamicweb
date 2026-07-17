

<?php $__env->startSection('seo'); ?>
<title><?php echo e($name->name_english); ?> (<?php echo e($name->name_arabic); ?>) - Islamic Name Meaning, Origin & History | Noor-e-Islam</title>
<meta name="description" content="Meaning of the Islamic name <?php echo e($name->name_english); ?> (<?php echo e($name->name_arabic); ?>) is <?php echo e($name->meaning_english); ?>. Learn its Urdu meaning, historical background, Quranic references, and personality traits.">
<link rel="canonical" href="<?php echo e(url('/names/' . $name->slug)); ?>">
<!-- Schema.org Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Meaning and Background of the Islamic Name <?php echo e($name->name_english); ?>",
  "description": "Meaning of the Islamic name <?php echo e($name->name_english); ?> (<?php echo e($name->name_arabic); ?>) is <?php echo e($name->meaning_english); ?>.",
  "url": "<?php echo e(url('/names/' . $name->slug)); ?>"
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --text-faint: #B8C2D4;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --shadow-xl: 0 24px 64px rgba(10, 31, 63, 0.14);
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    /* Breadcrumb */
    .breadcrumb-bar {
        max-width: 1140px; margin: 0 auto 30px; padding: 0; position: relative; z-index: 2;
        font-size: .9rem; color: rgba(255, 255, 255, 0.6); display: flex; align-items: center; justify-content: center; gap: 10px; flex-wrap: wrap;
    }
    .breadcrumb-bar a { color: rgba(255, 255, 255, 0.9); text-decoration: none; font-weight: 500; transition: var(--tr-fast); }
    .breadcrumb-bar a:hover { color: var(--gold-light); }
    .breadcrumb-bar i { font-size: .7rem; color: rgba(255, 255, 255, 0.4); }
    .breadcrumb-bar .active { color: var(--gold-light); font-weight: 600; }

    /* SEO Links */
    .seo-link-btn {
        display: flex; align-items: center; gap: 12px; background: var(--white);
        border: 1px solid var(--border-light); padding: 16px 20px; border-radius: var(--radius-md);
        text-decoration: none; color: var(--navy); font-weight: 600; font-family: 'Outfit', sans-serif;
        transition: var(--tr); box-shadow: var(--shadow-xs);
    }
    .seo-link-btn:hover {
        background: var(--gold-tint); border-color: var(--gold); transform: translateY(-3px);
        box-shadow: var(--shadow-sm); color: var(--gold-dark);
    }
    .seo-link-btn i { color: var(--gold); font-size: 1.2rem; width: 24px; text-align: center; }

    /* Hero Section */
    .name-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 100px 20px 80px; text-align: center; color: var(--white);
        position: relative; overflow: hidden; border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .name-hero::before {
        content: ''; position: absolute; inset: 0; opacity: 0.04;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1;
    }
    .name-hero::after {
        content: ""; position: absolute; top: -15%; right: -10%;
        width: 700px; height: 700px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent 60%);
        border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 1;
    }

    .hero-meta {
        display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 30px; position: relative; z-index: 2;
    }
    .hero-meta span { 
        background: rgba(255,255,255,0.08); backdrop-filter: blur(10px);
        padding: 6px 18px; border-radius: var(--radius-full); 
        border: 1px solid rgba(255,255,255,0.15); font-size: .75rem; font-weight: 700; 
        letter-spacing: 1px; text-transform: uppercase; color: var(--white);
        display: inline-flex; align-items: center; gap: 6px;
    }
    .hero-meta .tag-male { background: rgba(20, 70, 110, 0.4); border-color: var(--navy-light); color: var(--white); }
    .hero-meta .tag-female { background: rgba(201, 168, 76, 0.2); border-color: var(--gold); color: var(--gold-light); }
    .hero-meta .tag-quranic { background: rgba(13, 124, 95, 0.15); border-color: var(--emerald); color: var(--emerald-light); }
    .hero-meta .tag-sahabi { background: rgba(201, 168, 76, 0.1); border-color: var(--gold-dark); color: var(--gold-light); }
    
    .arabic-display {
        font-family: 'Scheherazade New', serif; font-size: 7rem; line-height: 1.2;
        color: var(--gold-light); margin-bottom: 15px; position: relative; z-index: 2; font-weight: 600;
        text-shadow: 0 10px 30px rgba(201, 168, 76, 0.3);
    }
    .name-transliteration {
        font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; margin-bottom: 15px;
        position: relative; z-index: 2; line-height: 1.1; color: var(--white); letter-spacing: -.5px;
    }
    .name-meaning-en {
        font-family: 'Outfit', sans-serif; font-size: 1.25rem; color: rgba(255,255,255,0.8); font-weight: 300;
        max-width: 800px; margin: 0 auto; position: relative; z-index: 2; font-style: italic;
    }

    .action-row { display: flex; justify-content: center; gap: 12px; margin-top: 40px; position: relative; z-index: 2; flex-wrap: wrap; }
    .action-btn-outline {
        background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.15); color: var(--white);
        padding: 12px 24px; border-radius: var(--radius-full); font-size: .85rem; cursor: pointer;
        transition: var(--tr-fast); display: inline-flex; align-items: center; gap: 8px; font-weight: 600;
    }
    .action-btn-outline:hover {
        background: rgba(201, 168, 76, 0.1); border-color: var(--gold); color: var(--gold-light); transform: translateY(-2px);
    }
    .action-btn-outline i { font-size: .95rem; }

    /* Content Layout */
    .content-grid { display: grid; grid-template-columns: 1fr 350px; gap: 40px; max-width: 1140px; margin: -60px auto 80px; padding: 0 20px; align-items: start; position: relative; z-index: 5; }
    @media (max-width: 1024px) { .content-grid { grid-template-columns: 1fr; margin-top: 40px; } }

    /* Meaning Boxes */
    .meaning-box {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 40px; box-shadow: var(--shadow-md); margin-bottom: 30px; position: relative; overflow: hidden;
    }
    .meaning-box::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .meaning-box.urdu-box::before { background: var(--navy); }
    .meaning-label { font-family: 'Outfit', sans-serif; font-size: .8rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--text-light); margin-bottom: 15px; font-weight: 700; }
    .meaning-value { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 700; color: var(--navy); }
    .urdu-text { font-family: 'Scheherazade New', serif; font-size: 2.5rem; line-height: 1.5; color: var(--gold-dark); }

    /* Content Block Wrapper */
    .content-block-wrapper {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 35px; box-shadow: var(--shadow-sm); margin-bottom: 30px; transition: var(--tr);
    }
    .content-block-wrapper:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }
    .content-block-wrapper h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
    .content-block-wrapper p { color: var(--text-medium); line-height: 1.8; font-size: 1rem; margin-bottom: 15px; }
    .content-block-wrapper p:last-child { margin-bottom: 0; }
    .content-block-wrapper strong { color: var(--navy); font-weight: 600; }

    /* Personality Traits */
    .personality-box {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 35px; box-shadow: var(--shadow-sm); margin-bottom: 30px;
    }
    .personality-title { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid var(--border-light); }
    .personality-desc { color: var(--text-medium); margin-bottom: 20px; line-height: 1.7; }
    .personality-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .personality-item { display: flex; align-items: center; gap: 12px; padding: 15px; background: var(--bg-main); border-radius: var(--radius-sm); border: 1px solid var(--border-light); transition: var(--tr-fast); }
    .personality-item:hover { background: var(--gold-tint); border-color: var(--gold); }
    .trait-icon { color: var(--gold); font-size: 1.2rem; }
    .trait-text { font-weight: 600; font-size: .95rem; color: var(--text-dark); }
    .trait-note { font-size: .8rem; color: var(--text-faint); margin-top: 15px; font-style: italic; }

    /* Sidebar */
    .sidebar-widget { background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 25px; margin-bottom: 30px; box-shadow: var(--shadow-sm); position: sticky; top: 100px; overflow: hidden; }
    .sidebar-widget::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .sidebar-title { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--navy); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid var(--border-light); padding-bottom: 15px; }
    
    .similar-names-grid { display: grid; gap: 12px; }
    .similar-name-card { 
        background: var(--bg-main); border: 1px solid var(--border-light); border-radius: var(--radius-sm); 
        padding: 15px; display: flex; justify-content: space-between; align-items: center; 
        text-decoration: none; transition: var(--tr-fast);
    }
    .similar-name-card:hover { border-color: var(--gold); background: var(--white); box-shadow: var(--shadow-sm); transform: translateY(-2px); }
    .similar-name-card .en { font-family: 'Cormorant Garamond', serif; font-weight: 700; font-size: 1.2rem; color: var(--navy); }
    .similar-name-card .ar { font-family: 'Scheherazade New', serif; font-size: 1.5rem; color: var(--gold-dark); }

    .view-all-link { display: block; text-align: center; margin-top: 15px; color: var(--gold-dark); font-weight: 700; font-size: .85rem; text-decoration: none; transition: var(--tr-fast); }
    .view-all-link:hover { color: var(--navy); }

    /* Numerology Widget */
    .numerology-widget {
        background: linear-gradient(150deg, var(--navy) 0%, var(--navy-mid) 100%); color: var(--white);
        border-radius: var(--radius-md); padding: 25px; margin-bottom: 30px; box-shadow: var(--shadow-lg);
        text-align: center; position: relative; overflow: hidden;
    }
    .numerology-widget::before { content: ""; position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: var(--gold); border-radius: 50%; opacity: .08; filter: blur(40px); }
    .numerology-title { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--white); margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px; }
    .numerology-value { font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; color: var(--gold-light); margin-bottom: 10px; line-height: 1; }
    .numerology-desc { font-size: .9rem; color: rgba(255,255,255,0.7); }

    /* Compatibility Widget */
    .compat-list { list-style: none; padding: 0; margin: 0; }
    .compat-list li { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; font-size: .95rem; color: var(--text-medium); font-weight: 500; }
    .compat-list li::before { content: "\f005"; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--gold); font-size: .8rem; }

    @media (max-width: 768px) {
        .content-grid { grid-template-columns: 1fr; gap: 0; }
        .sidebar-widget { position: static; margin-top: 40px; }
        .personality-grid { grid-template-columns: 1fr; }
        .arabic-display { font-size: 5rem; }
        .name-transliteration { font-size: 2.5rem; }
    }
</style>

<section class="name-hero">
    
    <div class="breadcrumb-bar">
        <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a> 
        <i class="fas fa-chevron-right"></i>
        <a href="<?php echo e(route('names.index')); ?>">Islamic Names</a> 
        <i class="fas fa-chevron-right"></i>
        <span class="active"><?php echo e($name->name_english); ?></span>
    </div>

    <div class="hero-meta">
        <span class="tag-<?php echo e($name->gender); ?>"><i class="fas <?php echo e($name->gender == 'male' ? 'fa-male' : 'fa-female'); ?>"></i> <?php echo e(ucfirst($name->gender)); ?></span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->origin): ?>
            <span><i class="fas fa-globe"></i> <?php echo e(ucfirst($name->origin)); ?></span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->is_quranic): ?>
            <span class="tag-quranic"><i class="fas fa-quran"></i> Quranic</span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->is_sahabi || $name->is_sahabiyah): ?>
            <span class="tag-sahabi"><i class="fas fa-users"></i> Sahabah</span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    
    <div class="arabic-display"><?php echo e($name->name_arabic); ?></div>
    <h1 class="name-transliteration"><?php echo e($name->name_english); ?></h1>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->meaning_english): ?>
        <p class="name-meaning-en">"<?php echo e($name->meaning_english); ?>"</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="action-row">
        <button class="action-btn-outline" onclick="shareThis()">
            <i class="fas fa-share-alt"></i> Share
        </button>
    </div>
</section>

<div class="content-grid">
    <!-- Main Content -->
    <div>
        <div class="meaning-box urdu-box">
            <div class="meaning-label">Meaning in Urdu</div>
            <?php
                $urduText = 'تفصیلات جلد شامل کی جائیں گی';
                if (!empty($name->meaning_urdu)) {
                    $urduText = $name->meaning_urdu;
                } elseif (!empty($name->translation_urdu) && preg_match('/[\x{0600}-\x{06FF}]/u', $name->translation_urdu)) {
                    $urduText = $name->translation_urdu;
                }
            ?>
            <div class="meaning-value urdu-text" dir="rtl"><?php echo e($urduText); ?></div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->meaning_english): ?>
        <div class="meaning-box" style="padding: 30px;">
            <div class="meaning-label">Meaning in English</div>
            <div class="meaning-value" style="font-size: 1.6rem;"><?php echo e($name->meaning_english); ?></div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="content-block-wrapper">
            <h2><i class="fas fa-info-circle" style="color: var(--gold);"></i> Linguistic Breakdown</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($name->root_letters)): ?>
                <p>The name <strong><?php echo e($name->name_english); ?></strong> is beautifully derived from the Arabic root letters <strong><?php echo e($name->root_letters); ?></strong>.</p>
            <?php elseif(!empty($name->origin)): ?>
                <p>The name <strong><?php echo e($name->name_english); ?></strong> originates from the <strong><?php echo e(ucfirst($name->origin)); ?></strong> language, carrying deep cultural and linguistic heritage.</p>
            <?php else: ?>
                <p>The name <strong><?php echo e($name->name_english); ?></strong> has a beautiful linguistic origin. Like many Islamic names, its phonetic structure carries deep meaning and psychological impact.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($name->detailed_meaning)): ?>
                <p><?php echo e($name->detailed_meaning); ?></p>
            <?php else: ?>
                <p>In Islamic naming traditions, understanding a name's origin provides profound insight into its true essence. The phonetic sound of <strong><?php echo e($name->name_english); ?></strong> is known to evoke a sense of 
                <?php
                    $sounds = ['strength and dignity', 'peace and tranquility', 'wisdom and grace', 'honor and respect', 'purity and devotion'];
                    $soundSeed = strlen($name->name_english) % 5;
                ?>
                <?php echo e($sounds[$soundSeed]); ?>.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->is_quranic || $name->quranic_reference): ?>
        <div class="content-block-wrapper">
            <h2><i class="fas fa-book-quran" style="color: var(--gold);"></i> Usage in Quran</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->quranic_reference): ?>
                <p><?php echo e($name->quranic_reference); ?></p>
            <?php else: ?>
                <p>This name or its root word is mentioned in the Holy Quran, making it a blessed and highly recommended name for Muslim children.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->biography || $name->is_sahabi || $name->is_sahabiyah): ?>
        <div class="content-block-wrapper">
            <h2><i class="fas fa-scroll" style="color: var(--gold);"></i> Historical Context & Usage</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->biography): ?>
                <p><?php echo e($name->biography); ?></p>
            <?php else: ?>
                <p>This name was used by the noble Companions (Sahabah/Sahabiyat) of Prophet Muhammad ﷺ. Naming children after the righteous predecessors is a beloved Sunnah in Islam, instilling a sense of spiritual connection and high moral standards.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php
            $traits = [];
            if (!empty($name->personality_traits)) {
                $traits = is_string($name->personality_traits) ? json_decode($name->personality_traits, true) : $name->personality_traits;
                if (!is_array($traits)) {
                    $traits = array_map('trim', explode(',', $name->personality_traits));
                }
            }
            
            if (empty($traits)) {
                $allTraits = [
                    ['icon' => 'fa-star', 'text' => 'Positive outlook'],
                    ['icon' => 'fa-shield-alt', 'text' => 'Strong character'],
                    ['icon' => 'fa-dove', 'text' => 'Peaceful nature'],
                    ['icon' => 'fa-book', 'text' => 'Wisdom'],
                    ['icon' => 'fa-heart', 'text' => 'Compassionate'],
                    ['icon' => 'fa-lightbulb', 'text' => 'Creative thinker'],
                    ['icon' => 'fa-balance-scale', 'text' => 'Just and fair'],
                    ['icon' => 'fa-users', 'text' => 'Leadership qualities'],
                    ['icon' => 'fa-hand-holding-heart', 'text' => 'Generous'],
                    ['icon' => 'fa-leaf', 'text' => 'Modest and humble'],
                    ['icon' => 'fa-bolt', 'text' => 'Energetic'],
                    ['icon' => 'fa-eye', 'text' => 'Visionary']
                ];
                
                $seed = strlen($name->name_english) + ord(strtolower(substr($name->name_english, 0, 1)));
                $traitCount = count($allTraits);
                
                $traits = [
                    $allTraits[($seed) % $traitCount],
                    $allTraits[($seed + 3) % $traitCount],
                    $allTraits[($seed + 7) % $traitCount],
                    $allTraits[($seed + 11) % $traitCount],
                ];
            } else {
                $mappedTraits = [];
                foreach($traits as $t) {
                    $mappedTraits[] = ['icon' => 'fa-check-circle', 'text' => $t];
                }
                $traits = $mappedTraits;
            }
        ?>
        
        <div class="personality-box">
            <h3 class="personality-title">Personality Traits & Psychology</h3>
            <p class="personality-desc">In Islamic tradition, it is believed that a person's name influences their personality (<em>Tafa'ul</em>). Those named <strong><?php echo e($name->name_english); ?></strong> are often associated with:</p>
            <div class="personality-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_slice($traits, 0, 4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trait): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="personality-item">
                    <span class="trait-icon"><i class="fas <?php echo e($trait['icon']); ?>"></i></span> <span class="trait-text"><?php echo e($trait['text']); ?></span>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <p class="trait-note">* Note: Personality traits are general cultural observations and not definitive religious guarantees.</p>
        </div>

        <!-- SEO Internal Linking Block -->
        <div class="content-block-wrapper" style="background: var(--bg-main); border: 1px solid var(--border-light); padding: 40px;">
            <div style="text-align: center; margin-bottom: 30px;">
                <h2 style="justify-content: center; font-size: 2rem;"><i class="fas fa-compass" style="color: var(--gold);"></i> Explore More Names</h2>
                <p>Discover other beautiful Islamic names by category to find the perfect match.</p>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
                <a href="<?php echo e(route('names.gender', 'boys')); ?>" class="seo-link-btn">
                    <i class="fas fa-male" style="color: var(--navy-light);"></i>
                    <span>Islamic Boy Names</span>
                </a>
                <a href="<?php echo e(route('names.gender', 'girls')); ?>" class="seo-link-btn">
                    <i class="fas fa-female" style="color: #be185d;"></i>
                    <span>Islamic Girl Names</span>
                </a>
                <a href="<?php echo e(route('names.index', ['filter' => 'quranic'])); ?>" class="seo-link-btn">
                    <i class="fas fa-book-quran" style="color: var(--emerald);"></i>
                    <span>Quranic Names</span>
                </a>
                <a href="<?php echo e(route('names.index', ['filter' => 'sahabah'])); ?>" class="seo-link-btn">
                    <i class="fas fa-users" style="color: var(--navy);"></i>
                    <span>Sahabah Names</span>
                </a>
                <a href="<?php echo e(route('names.index', ['filter' => 'prophets'])); ?>" class="seo-link-btn">
                    <i class="fas fa-moon" style="color: var(--gold-dark);"></i>
                    <span>Prophet Names</span>
                </a>
                <a href="<?php echo e(route('names.index', ['letter' => $name->initial_letter])); ?>" class="seo-link-btn">
                    <i class="fas fa-font" style="color: var(--navy-mid);"></i>
                    <span>Names Starting With <?php echo e(strtoupper($name->initial_letter)); ?></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <aside>
        <div class="sidebar-widget">
            <h3 class="sidebar-title"><i class="fas fa-list" style="color: var(--gold);"></i> Similar Names</h3>
            <p style="font-size: .9rem; color: var(--text-light); margin-bottom: 20px;">Other <?php echo e($name->gender); ?> names starting with '<?php echo e($name->initial_letter); ?>'</p>
            <div class="similar-names-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($similarNames) && $similarNames->count() > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $similarNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('names.show', $sim->slug)); ?>" class="similar-name-card">
                        <span class="en"><?php echo e($sim->name_english); ?></span>
                        <span class="ar"><?php echo e($sim->name_arabic); ?></span>
                    </a>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php else: ?>
                    <div style="font-size: .9rem; color: var(--text-light); font-style: italic; padding: 15px; background: var(--bg-main); border-radius: var(--radius-sm); border: 1px solid var(--border-light);">More names coming soon...</div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <a href="<?php echo e(route('names.index', ['gender' => $name->gender, 'letter' => $name->initial_letter])); ?>" class="view-all-link">View All '<?php echo e($name->initial_letter); ?>' Names &rarr;</a>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->numerology_value): ?>
        <div class="numerology-widget">
            <h3 class="numerology-title">Numerology (Abjad)</h3>
            <div class="numerology-value"><?php echo e($name->numerology_value); ?></div>
            <p class="numerology-desc">The numerical value of the Arabic letters in <?php echo e($name->name_english); ?> according to the Abjad system.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        <div class="sidebar-widget">
            <h3 class="sidebar-title"><i class="fas fa-heart" style="color: var(--gold);"></i> Compatibility</h3>
            <p style="font-size: .9rem; color: var(--text-medium); margin-bottom: 20px;">Names that pair well with <?php echo e($name->name_english); ?>:</p>
            <ul class="compat-list">
                <li>Muhammad <?php echo e($name->name_english); ?></li>
                <li><?php echo e($name->name_english); ?> Ali</li>
                <li>Fatima <?php echo e($name->name_english); ?></li>
            </ul>
        </div>
    </aside>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function shareThis() {
    if (navigator.share) {
        navigator.share({ 
            title: 'Meaning of <?php echo e($name->name_english); ?>', 
            text: 'I found the beautiful meaning of the name <?php echo e($name->name_english); ?> on Noor-e-Islam.',
            url: window.location.href 
        });
    } else {
        navigator.clipboard.writeText(window.location.href);
        alert('Link copied to clipboard!');
    }
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\names\show.blade.php ENDPATH**/ ?>