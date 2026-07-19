<?php $__env->startSection('title', ($topic->meta_title ?? $topic->topic_name . ' Hadiths — Authentic Hadiths') . ' | Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', $topic->meta_description ?? 'Read authentic Hadiths about ' . $topic->topic_name . ' with Arabic text, Urdu and English translations from Sahih Bukhari and other major hadith books.'); ?>
<?php $__env->startSection('canonical', url('/hadith/' . $topic->slug)); ?>

<?php $__env->startSection('schema'); ?>
<?php
    $faqs = json_decode($topic->faqs, true) ?? [];
    $schemaGraph = [];
    
    // WebPage Schema
    $schemaGraph[] = [
        "@type" => "WebPage",
        "name" => $topic->meta_title ?? $topic->topic_name . " Hadiths",
        "description" => $topic->meta_description ?? Str::limit($topic->content, 150),
        "breadcrumb" => [
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                ["@type" => "ListItem", "position" => 1, "name" => "Home", "item" => url('/')],
                ["@type" => "ListItem", "position" => 2, "name" => "Hadith by Topic", "item" => url('/hadith')],
                ["@type" => "ListItem", "position" => 3, "name" => $topic->topic_name, "item" => url('/hadith/' . $topic->slug)]
            ]
        ]
    ];
    
    // FAQ Schema if FAQs exist
    if(!empty($faqs)) {
        $faqItems = [];
        foreach($faqs as $faq) {
            $faqItems[] = [
                "@type" => "Question",
                "name" => $faq['question'],
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $faq['answer']
                ]
            ];
        }
        $schemaGraph[] = [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => $faqItems
        ];
    }
?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": <?php echo json_encode($schemaGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>

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
        --radius-sm: 12px;
        --radius-md: 20px;
        --radius-lg: 28px;
        --radius-full: 9999px;
        --tr: all .35s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .2s cubic-bezier(.25, .46, .45, .94);
    }

    body { background: var(--bg-main); }

    /* Hero Section */
    .topic-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 60%, #050A14 100%);
        padding: 80px 20px 100px;
        text-align: center;
        color: var(--white);
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .topic-hero::before {
        content: '';
        position: absolute; inset: 0; opacity: 0.03; pointer-events: none;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .topic-hero::after {
        content: ""; position: absolute; top: -100px; right: -100px;
        width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.12), transparent 60%);
        border-radius: 50%; filter: blur(60px); pointer-events: none;
    }

    .hero-breadcrumb {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.15); padding: 8px 20px;
        border-radius: var(--radius-full); margin-bottom: 30px; font-size: .85rem;
        color: rgba(255,255,255,0.7); position: relative; z-index: 2;
    }
    .hero-breadcrumb a { color: var(--white); text-decoration: none; font-weight: 500; transition: var(--tr-fast); }
    .hero-breadcrumb a:hover { color: var(--gold-light); }
    .hero-breadcrumb i { font-size: .65rem; color: rgba(255,255,255,0.4); }
    .hero-breadcrumb span { color: var(--gold-light); font-weight: 600; }

    .hero-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
    .hero-title { 
        font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; 
        margin-bottom: 20px; line-height: 1.1; color: var(--white); letter-spacing: -.5px;
    }
    .hero-title span { color: var(--gold-light); font-style: italic; }
    .hero-intro { 
        font-family: 'Outfit', sans-serif; font-size: 1.15rem; color: rgba(255,255,255,0.8); 
        line-height: 1.8; font-weight: 300; max-width: 700px; margin: 0 auto;
    }

    /* Floating Stats */
    .stats-row {
        display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;
        margin-top: -50px; position: relative; z-index: 10; margin-bottom: 40px;
        padding: 0 20px;
    }
    .stat-pill {
        background: var(--white); border-radius: var(--radius-full); padding: 15px 30px;
        box-shadow: 0 15px 40px rgba(10,31,63,0.08); display: flex; align-items: center; gap: 15px;
        border: 1px solid var(--border-light); transition: var(--tr);
    }
    .stat-pill:hover { box-shadow: 0 20px 50px rgba(10,31,63,0.12); transform: translateY(-3px); }
    .stat-icon { width: 40px; height: 40px; background: var(--navy-tint); color: var(--navy); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
    .stat-text { display: flex; flex-direction: column; line-height: 1.2; }
    .stat-val { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--navy); }
    .stat-label { font-family: 'Outfit', sans-serif; font-size: .75rem; color: var(--text-light); text-transform: uppercase; letter-spacing: .5px; font-weight: 600; }

    /* Layout */
    .layout-grid { display: grid; grid-template-columns: 1fr 320px; gap: 40px; max-width: 1140px; margin: 0 auto; padding: 0 20px 80px; align-items: start; }
    
    /* Section Titles */
    .section-title-wrapper { margin-bottom: 25px; display: flex; align-items: center; gap: 15px; }
    .section-title-icon { width: 40px; height: 40px; background: var(--navy); color: var(--gold-light); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
    .section-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: var(--navy); font-weight: 700; margin: 0; }
    .section-line { flex: 1; height: 1px; background: var(--border-light); }

    /* Search Bar */
    .search-container { margin-bottom: 30px; position: relative; }
    .search-container i { position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: var(--text-light); font-size: 1rem; }
    .search-input {
        width: 100%; padding: 15px 20px 15px 50px; border: 1px solid var(--border-light);
        border-radius: var(--radius-full); font-family: 'Outfit', sans-serif; font-size: .95rem;
        outline: none; transition: var(--tr-fast); background: var(--white); box-shadow: var(--shadow-sm);
    }
    .search-input:focus { border-color: var(--gold); box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.1); }

    /* Quran Refs */
    .quran-refs-box { background: var(--white); border-radius: var(--radius-md); border: 1px solid var(--border-light); padding: 30px; margin-bottom: 40px; box-shadow: var(--shadow-sm); }
    .quran-ref-item { padding: 20px 0; border-bottom: 1px solid var(--border-light); }
    .quran-ref-item:last-child { border-bottom: none; padding-bottom: 0; }
    .quran-ref-item:first-child { padding-top: 0; }
    .quran-ref-arabic { font-family: 'Scheherazade New', serif; font-size: 1.8rem; color: var(--navy); text-align: right; direction: rtl; margin-bottom: 12px; font-weight: 600; line-height: 1.6; }
    .quran-ref-trans { color: var(--text-medium); font-style: italic; margin-bottom: 8px; font-size: 1rem; line-height: 1.6; }
    .quran-ref-source { font-family: 'Outfit', sans-serif; font-size: .8rem; font-weight: 700; color: var(--gold-dark); text-transform: uppercase; letter-spacing: .5px; }

    /* Hadith Cards (Premium Manuscript Style) */
    .hadith-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        margin-bottom: 30px; box-shadow: var(--shadow-sm); transition: var(--tr);
        overflow: hidden; position: relative;
    }
    .hadith-card:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }

    .hadith-header {
        display: flex; justify-content: space-between; align-items: center; 
        padding: 20px 30px; background: var(--bg-main); border-bottom: 1px solid var(--border-light);
    }
    .hadith-num { font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; font-weight: 700; color: var(--navy); display: flex; align-items: center; gap: 10px; }
    .hadith-num i { color: var(--gold-dark); }
    .hadith-narrator { font-size: .85rem; color: var(--text-light); font-weight: 500; margin-left: 10px; }

    .grade-badge {
        font-family: 'Outfit', sans-serif; font-size: .7rem; font-weight: 700; padding: 6px 14px; border-radius: var(--radius-full);
        text-transform: uppercase; letter-spacing: .5px; display: inline-flex; align-items: center; gap: 5px;
    }
    .grade-sahih { background: var(--navy); color: var(--gold-light); }
    .grade-hasan { background: var(--gold-tint); color: var(--gold-dark); border: 1px solid rgba(201, 168, 76, 0.15); }
    .grade-daeef { background: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }

    .hadith-body { padding: 30px; }
    .hadith-arabic {
        font-family: 'Scheherazade New', serif; font-size: 2.2rem; color: var(--navy);
        line-height: 2.4; text-align: right; margin-bottom: 30px; direction: rtl; font-weight: 500;
        padding-bottom: 25px; border-bottom: 1px solid var(--border-light);
    }

    .urdu-translation {
        background: var(--bg-main); border: 1px solid var(--border-light); border-right: 4px solid var(--gold);
        border-radius: var(--radius-sm); padding: 20px; text-align: right; direction: rtl; 
        font-family: 'Scheherazade New', serif; font-size: 1.6rem; line-height: 2.2; color: var(--text-dark); margin-bottom: 25px;
    }
    .urdu-translation strong { color: var(--navy); font-weight: 600; }
    
    .eng-translation { font-size: 1.1rem; line-height: 1.8; color: var(--text-dark); margin-bottom: 25px;}
    .eng-translation strong { color: var(--navy); font-weight: 600; }
    
    .hadith-explanation {
        background: var(--gold-tint); padding: 25px; border-radius: var(--radius-sm); margin-bottom: 25px;
        border: 1px solid rgba(201, 168, 76, 0.15);
    }
    .hadith-explanation h4 { margin-top: 0; font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); margin-bottom: 10px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
    .hadith-explanation h4 i { color: var(--gold-dark); }
    .hadith-explanation p { margin: 0; font-size: .95rem; line-height: 1.7; color: var(--text-medium); }
    
    .hadith-lessons { margin-bottom: 25px; background: var(--white); border: 1px dashed var(--border); border-radius: var(--radius-sm); padding: 20px; }
    .hadith-lessons h4 { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); margin-top: 0; margin-bottom: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px; }
    .hadith-lessons h4 i { color: var(--gold-dark); }
    .hadith-lessons ul { padding-left: 20px; color: var(--text-medium); line-height: 1.7; margin: 0; }
    .hadith-lessons ul li { margin-bottom: 8px; }

    .hadith-tags { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px; }
    .hadith-tag { background: var(--bg-main); border: 1px solid var(--border); padding: 5px 14px; border-radius: var(--radius-full); font-size: .75rem; color: var(--text-medium); font-weight: 600; }

    .hadith-footer {
        display: flex; align-items: center; flex-wrap: wrap; gap: 20px;
        padding: 20px 30px; background: var(--bg-main); border-top: 1px solid var(--border-light);
        font-size: .85rem; color: var(--text-light);
    }
    .hadith-footer i { color: var(--gold-dark); margin-right: 6px; }

    .share-btn { 
        margin-left: auto; background: var(--white); border: 1px solid var(--border); color: var(--navy); font-weight: 600; 
        cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: .8rem; transition: var(--tr-fast); padding: 8px 16px; border-radius: var(--radius-full); 
    }
    .share-btn:hover { color: var(--gold-dark); border-color: var(--gold); background: var(--white); }

    /* Pagination */
    .pagination-container { margin-top: 40px; display: flex; justify-content: center; }

    /* FAQs */
    .faq-section { margin-top: 60px; }
    .faq-item { margin-bottom: 15px; border: 1px solid var(--border-light); border-radius: var(--radius-sm); overflow: hidden; transition: var(--tr-fast); background: var(--white); }
    .faq-item:hover { border-color: var(--navy-tint); box-shadow: var(--shadow-sm); }
    .faq-question { padding: 20px 25px; background: var(--white); font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 600; color: var(--navy); cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: var(--tr-fast); }
    .faq-question:hover { background: var(--bg-main); }
    .faq-question.active { background: var(--navy); color: var(--white); }
    .faq-answer { padding: 25px; color: var(--text-medium); display: none; line-height: 1.8; font-size: .95rem; background: var(--bg-main); border-top: 1px solid var(--border-light); }
    .faq-question i { color: var(--gold); transition: transform 0.3s; font-size: .9rem; }
    .faq-question.active i { transform: rotate(180deg); color: var(--gold-light); }

    /* Sidebar */
    .sidebar { position: sticky; top: 100px; display: flex; flex-direction: column; gap: 24px; }
    .sidebar-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 25px; box-shadow: var(--shadow-sm); position: relative; overflow: hidden;
    }
    .sidebar-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient); }
    .sidebar-title { 
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); 
        margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-light); font-weight: 700; 
        display: flex; align-items: center; gap: 8px;
    }
    .topic-pill {
        background: var(--bg-main); color: var(--navy); padding: 8px 16px; border-radius: var(--radius-full);
        font-family: 'Outfit', sans-serif; font-size: .85rem; text-decoration: none; transition: var(--tr-fast); border: 1px solid var(--border-light); font-weight: 600;
    }
    .topic-pill:hover { background: var(--navy); color: var(--white) !important; border-color: var(--navy); }
    
    .related-links { display: flex; flex-direction: column; gap: 12px; }
    .related-links a { color: var(--text-medium); text-decoration: none; padding: 10px 0; border-bottom: 1px solid var(--border-light); transition: var(--tr-fast); font-size: .95rem; font-weight: 500; display: flex; align-items: center; gap: 8px; }
    .related-links a:last-child { border-bottom: none; }
    .related-links a:hover { color: var(--gold-dark); padding-left: 5px; }
    .related-links a i { color: var(--gold-dark); font-size: .8rem; }

    .sidebar-cta {
        background: linear-gradient(150deg, var(--navy), var(--navy-mid)); border-radius: var(--radius-md);
        padding: 30px; color: rgba(255,255,255,0.7); text-align: center; position: relative; overflow: hidden; 
        border: 1px solid rgba(255,255,255,0.05);
    }
    .sidebar-cta::before {
        content: ""; position: absolute; top: -40px; right: -40px; width: 160px; height: 160px;
        background: var(--gold); border-radius: 50%; opacity: .08; filter: blur(50px);
    }
    .sidebar-cta h3 { color: var(--white); font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; margin-bottom: 10px; }
    .sidebar-cta p { font-size: .9rem; color: rgba(255,255,255,0.6); margin-bottom: 20px; }
    .btn-primary-nav { 
        display: inline-flex; align-items: center; justify-content: center; gap: 8px; background: var(--gold-gradient); 
        color: var(--navy) !important; border: none; padding: 12px 24px; border-radius: var(--radius-full); 
        font-family: 'Outfit', sans-serif; font-weight: 700; font-size: .85rem; text-decoration: none; transition: var(--tr); width: 100%; 
        text-transform: uppercase; letter-spacing: 1px;
    }
    .btn-primary-nav:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(201, 168, 76, 0.3); }

    @media (max-width: 991px) {
        .layout-grid { grid-template-columns: 1fr; }
        .sidebar { position: static; margin-top: 40px; }
        .hero-title { font-size: 2.5rem; }
    }
</style>

<!-- Hero Section -->
<section class="topic-hero">
    <div class="hero-breadcrumb">
        <a href="<?php echo e(url('/')); ?>">Home</a> 
        <i class="fas fa-chevron-right"></i> 
        <a href="<?php echo e(url('/hadith')); ?>">Hadith Topics</a> 
        <i class="fas fa-chevron-right"></i> 
        <span><?php echo e($topic->topic_name); ?></span>
    </div>
    <div class="hero-content">
        <h1 class="hero-title"><?php echo e($topic->topic_name); ?> <span>Hadiths</span></h1>
        <p class="hero-intro"><?php echo e($topic->introduction ?? $topic->content); ?></p>
    </div>
</section>

<!-- Floating Stats -->
<?php $stats = json_decode($topic->quick_stats, true); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stats): ?>
<div class="stats-row">
    <div class="stat-pill">
        <div class="stat-icon"><i class="fas fa-list-ol"></i></div>
        <div class="stat-text">
            <span class="stat-val"><?php echo e($stats['total_hadiths'] ?? $hadiths->total()); ?></span>
            <span class="stat-label">Total Hadiths</span>
        </div>
    </div>
    <div class="stat-pill">
        <div class="stat-icon"><i class="fas fa-book-open"></i></div>
        <div class="stat-text">
            <span class="stat-val"><?php echo e(isset($stats['authentic_sources']) ? count($stats['authentic_sources']) : 0); ?></span>
            <span class="stat-label">Authentic Sources</span>
        </div>
    </div>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<div class="layout-grid">
    <!-- Main Content -->
    <div class="main-content">
        
        <!-- Topic Overview & Practical Guidance -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topic->overview || $topic->lessons || $topic->practical_guidance): ?>
        <div class="quran-refs-box" style="margin-bottom: 40px; padding: 30px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topic->overview): ?>
            <div style="margin-bottom: 25px;">
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: var(--navy); margin-bottom: 12px; font-weight: 700;">Overview</h3>
                <p style="color: var(--text-medium); line-height: 1.8; font-size: 1.05rem; margin: 0;"><?php echo e($topic->overview); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topic->lessons): ?>
            <div style="margin-bottom: 25px; padding-top: 25px; border-top: 1px solid var(--border-light);">
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); margin-bottom: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;"><i class="fas fa-graduation-cap" style="color: var(--gold-dark);"></i> Key Lessons</h3>
                <p style="color: var(--text-medium); line-height: 1.7; font-size: .95rem; margin: 0;"><?php echo e($topic->lessons); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topic->practical_guidance): ?>
            <div style="padding-top: 25px; border-top: 1px solid var(--border-light);">
                <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); margin-bottom: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;"><i class="fas fa-compass" style="color: var(--gold-dark);"></i> Practical Guidance</h3>
                <p style="color: var(--text-medium); line-height: 1.7; font-size: .95rem; margin: 0;"><?php echo e($topic->practical_guidance); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Quran References -->
        <?php $quranRefs = json_decode($topic->quran_references, true); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($quranRefs && count($quranRefs) > 0): ?>
        <div class="quran-refs-box">
            <div class="section-title-wrapper">
                <div class="section-title-icon"><i class="fas fa-book-quran"></i></div>
                <h3 class="section-title">Quranic Context</h3>
                <div class="section-line"></div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $quranRefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="quran-ref-item">
                <div class="quran-ref-arabic"><?php echo e(is_array($ref) ? ($ref['arabic'] ?? '') : ''); ?></div>
                <div class="quran-ref-trans">"<?php echo e(is_array($ref) ? ($ref['translation'] ?? '') : ''); ?>"</div>
                <div class="quran-ref-source">— <?php echo e(is_array($ref) ? ($ref['reference'] ?? '') : ''); ?></div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Advanced Filters -->
        <div class="quran-refs-box" style="margin-bottom: 30px; padding: 25px;">
            <div class="section-title-wrapper" style="margin-bottom: 20px;">
                <div class="section-title-icon"><i class="fas fa-filter"></i></div>
                <h3 class="section-title" style="font-size: 1.5rem;">Advanced Filters</h3>
                <div class="section-line"></div>
            </div>
            
            <form action="<?php echo e(route('hadith.show', $topic->slug)); ?>" method="GET" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: flex-end;">
                <div style="flex: 1; min-width: 200px;">
                    <label style="font-size: .85rem; color: var(--text-medium); font-weight: 600; margin-bottom: 8px; display: block;">Authenticity</label>
                    <select name="grade" style="width: 100%; padding: 12px 15px; border-radius: var(--radius-sm); border: 1px solid var(--border-light); font-family: 'Outfit', sans-serif; font-size: .95rem; outline: none;">
                        <option value="">All Grades</option>
                        <option value="Sahih" <?php echo e(request('grade') == 'Sahih' ? 'selected' : ''); ?>>Sahih (Authentic)</option>
                        <option value="Hasan" <?php echo e(request('grade') == 'Hasan' ? 'selected' : ''); ?>>Hasan (Good)</option>
                        <option value="Daeef" <?php echo e(request('grade') == 'Daeef' ? 'selected' : ''); ?>>Da'if (Weak)</option>
                    </select>
                </div>
                
                <div style="flex: 1; min-width: 200px;">
                    <label style="font-size: .85rem; color: var(--text-medium); font-weight: 600; margin-bottom: 8px; display: block;">Collection</label>
                    <select name="collection" style="width: 100%; padding: 12px 15px; border-radius: var(--radius-sm); border: 1px solid var(--border-light); font-family: 'Outfit', sans-serif; font-size: .95rem; outline: none;">
                        <option value="">All Collections</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topicBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <option value="<?php echo e($b->id); ?>" <?php echo e(request('collection') == $b->id ? 'selected' : ''); ?>><?php echo e($b->name_en); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>
                
                <div style="flex: 1; min-width: 200px;">
                    <label style="font-size: .85rem; color: var(--text-medium); font-weight: 600; margin-bottom: 8px; display: block;">Narrator</label>
                    <select name="narrator" style="width: 100%; padding: 12px 15px; border-radius: var(--radius-sm); border: 1px solid var(--border-light); font-family: 'Outfit', sans-serif; font-size: .95rem; outline: none;">
                        <option value="">All Narrators</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topicNarrators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <option value="<?php echo e($n->id); ?>" <?php echo e(request('narrator') == $n->id ? 'selected' : ''); ?>><?php echo e(Str::limit($n->name_en, 25)); ?></option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                </div>
                
                <div>
                    <button type="submit" class="btn-primary-nav" style="width: auto; padding: 12px 30px;"><i class="fas fa-check"></i> Apply Filters</button>
                </div>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->hasAny(['grade', 'collection', 'narrator'])): ?>
                <div>
                    <a href="<?php echo e(route('hadith.show', $topic->slug)); ?>" style="color: #e53e3e; font-size: .9rem; font-weight: 600; text-decoration: none; display: inline-block; padding: 12px 15px;">Clear</a>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </form>
        </div>

        <!-- Search Bar -->
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="hadithSearch" class="search-input" placeholder="Search hadiths within these results...">
        </div>

        <!-- Hadiths List -->
        <div class="hadiths-list" id="hadithsContainer">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $hadiths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hadith): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="hadith-card hadith-item" id="hadith-<?php echo e($hadith->id); ?>">
                
                <div class="hadith-header">
                    <div class="hadith-num">
                        <i class="fas fa-hashtag"></i> #<?php echo e($hadiths->firstItem() + $index); ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->narrator): ?>
                        <span class="hadith-narrator">| Narrated by <?php echo e($hadith->narrator); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php
                        $gradeClass = 'grade-sahih';
                        if(stripos($hadith->grade, 'hasan') !== false) $gradeClass = 'grade-hasan';
                        if(stripos($hadith->grade, 'daeef') !== false || stripos($hadith->grade, 'weak') !== false) $gradeClass = 'grade-daeef';
                    ?>
                    <span class="grade-badge <?php echo e($gradeClass); ?>">
                        <i class="fas fa-check-circle"></i> <?php echo e($hadith->grade ?? 'Sahih'); ?>

                    </span>
                </div>
                
                <div class="hadith-body">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->arabic_text && !Str::contains($hadith->arabic_text, 'placeholder')): ?>
                    <div class="hadith-arabic" dir="rtl" lang="ar" style="
                        font-family: 'Scheherazade New', 'Amiri', serif;
                        font-size: 1.4rem;
                        line-height: 2.2;
                        text-align: right;
                        padding: 1rem;
                        background: rgba(201,167,99, 0.08);
                        border-right: 3px solid #c9a763;
                        border-radius: 6px;
                        margin-bottom: 1rem;
                        direction: rtl;
                    ">
                        <?php echo e($hadith->arabic_text); ?>

                    </div>
                    <?php else: ?>
                    <div class="hadith-arabic-placeholder" style="
                        padding: 0.75rem 1rem;
                        background: #f8f9fa;
                        border-radius: 6px;
                        margin-bottom: 1rem;
                        color: #aaa;
                        font-size: 0.85rem;
                    ">
                        Arabic text loading... Run: php artisan hadith:fetch-arabic
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div class="hadith-translation">
                        <span class="label">Translation:</span>
                        <p><?php echo e($hadith->english_translation); ?></p>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->urdu_translation): ?>
                    <div class="hadith-urdu" dir="rtl" lang="ur">
                        <span class="label">اردو:</span>
                        <p><?php echo e($hadith->urdu_translation); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->explanation): ?>
                    <div class="hadith-explanation">
                        <h4><i class="fas fa-lightbulb"></i> Explanation (Sharh)</h4>
                        <p><?php echo e($hadith->explanation); ?></p>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php $lessons = json_decode($hadith->key_lessons, true); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($lessons && count($lessons) > 0): ?>
                    <div class="hadith-lessons">
                        <h4><i class="fas fa-graduation-cap"></i> Key Lessons</h4>
                        <ul>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li><?php echo e($lesson); ?></li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php $duas = json_decode($hadith->related_duas, true); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($duas && count($duas) > 0): ?>
                    <div class="hadith-lessons" style="background: var(--bg-main);">
                        <h4><i class="fas fa-hands-praying"></i> Related Duas</h4>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $duas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e($dua['url']); ?>" style="text-decoration: none; padding: 8px 15px; background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-full); font-size: .85rem; color: var(--navy); font-weight: 600; display: inline-flex; align-items: center; gap: 5px; box-shadow: var(--shadow-sm);"><i class="fas fa-external-link-alt" style="font-size: .75rem; color: var(--text-light);"></i> <?php echo e($dua['title']); ?></a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <?php $tags = json_decode($hadith->tags, true); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tags && count($tags) > 0): ?>
                    <div class="hadith-tags">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <span class="hadith-tag"><?php echo e($tag); ?></span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    
                    <div class="hadith-meta">
                        <span class="chapter"><?php echo e($hadith->chapter ?? $hadith->book_name); ?></span>
                        <span class="reference"><?php echo e($hadith->reference); ?></span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->narrator): ?>
                        <span class="narrator">Narrated by <?php echo e($hadith->narrator); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <button class="share-btn" onclick="copyLink('<?php echo e(url('/hadith/' . $topic->slug . '#hadith-' . $hadith->id)); ?>')">Share</button>
                    </div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination-container" id="paginationContainer">
            <?php echo e($hadiths->links('pagination::bootstrap-4')); ?>

        </div>

        <!-- FAQs Section -->
        <?php $faqsData = json_decode($topic->faqs, true); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faqsData && count($faqsData) > 0): ?>
        <div class="faq-section">
            <div class="section-title-wrapper" style="margin-bottom: 30px;">
                <div class="section-title-icon"><i class="fas fa-question-circle"></i></div>
                <h3 class="section-title">Frequently Asked Questions</h3>
                <div class="section-line"></div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $faqsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <?php echo e($faq['question']); ?>

                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <?php echo e($faq['answer']); ?>

                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>

    <!-- Sidebar -->
    <aside class="sidebar">
        <?php $misconceptions = json_decode($topic->common_misconceptions, true); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($misconceptions && count($misconceptions) > 0): ?>
        <div class="sidebar-card">
            <h3 class="sidebar-title"><i class="fas fa-exclamation-triangle" style="color: var(--gold-dark);"></i> Common Misconceptions</h3>
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $misconceptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div style="border-left: 3px solid var(--gold); padding-left: 15px;">
                    <div style="font-weight: 700; color: var(--navy); margin-bottom: 5px; font-size: .95rem;">Myth: <?php echo e($misc['myth']); ?></div>
                    <div style="color: var(--text-medium); font-size: .85rem; line-height: 1.6;">Fact: <?php echo e($misc['fact']); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($topicNarrators) && count($topicNarrators) > 0): ?>
        <div class="sidebar-card">
            <h3 class="sidebar-title"><i class="fas fa-users" style="color: var(--gold-dark);"></i> Key Narrators</h3>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topicNarrators->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $narrator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid var(--border-light);">
                    <span style="font-weight: 600; color: var(--navy); font-size: .9rem;"><?php echo e($narrator->name_en); ?></span>
                    <a href="<?php echo e(route('hadith.show', $topic->slug)); ?>?narrator=<?php echo e($narrator->id); ?>" style="color: var(--gold-dark); text-decoration: none; font-size: .8rem; font-weight: 700;">Filter</a>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php $relatedArticles = json_decode($topic->related_articles, true); ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedArticles && count($relatedArticles) > 0): ?>
        <div class="sidebar-card">
            <h3 class="sidebar-title"><i class="fas fa-newspaper" style="color: var(--gold-dark);"></i> Related Articles</h3>
            <div class="related-links">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e($article['url']); ?>"><i class="fas fa-angle-right"></i> <?php echo e($article['title']); ?></a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="sidebar-card">
            <h3 class="sidebar-title"><i class="fas fa-list-ul" style="color: var(--gold-dark);"></i> Other Topics</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('hadith.show', $other->slug)); ?>" class="topic-pill">
                    <?php echo e($other->topic_name); ?>

                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        <div class="sidebar-cta">
            <i class="fas fa-book-quran" style="font-size: 2.5rem; color: var(--gold-light); margin-bottom: 15px;"></i>
            <h3>Read the Quran</h3>
            <p>Explore the Holy Quran with translations and tafseer.</p>
            <a href="<?php echo e(route('surah.index')); ?>" class="btn-primary-nav">Explore Now</a>
        </div>
    </aside>
</div>

<?php $__env->startPush('styles'); ?>
<link href="https://fonts.googleapis.com/css2?family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet">
<style>
    /* Additions for Hadith Module */
    .hadith-arabic {
        font-family: 'Scheherazade New', 'Amiri', 'Traditional Arabic', serif;
        font-size: 1.4rem;
        line-height: 2.2;
        text-align: right;
        direction: rtl;
    }
    .hadith-translation .label,
    .hadith-urdu .label {
        font-weight: 600;
        color: var(--gold-color, #c9a763);
        display: block;
        margin-bottom: 0.3rem;
    }
    .hadith-meta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
        padding-top: 0.75rem;
        border-top: 1px solid #eee;
        font-size: 0.85rem;
        color: #666;
        margin-top: 0.75rem;
    }
    .hadith-meta .reference {
        font-weight: 600;
        color: var(--primary-dark, #1a3a5c);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function copyLink(url) {
    navigator.clipboard.writeText(url).then(function() {
        if(typeof showToast === 'function') {
            showToast('Link copied to clipboard!', 'success');
        } else {
            alert('Link copied to clipboard!');
        }
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}

function toggleFaq(el) {
    el.classList.toggle('active');
    var icon = el.querySelector('i');
    if(el.classList.contains('active')) {
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
    } else {
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
    }
    var answer = el.nextElementSibling;
    if (answer.style.display === "block") {
        answer.style.display = "none";
    } else {
        answer.style.display = "block";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // Client-side search
    const searchInput = document.getElementById('hadithSearch');
    if(searchInput) {
        searchInput.addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            const hadiths = document.querySelectorAll('.hadith-item');
            
            let hasVisible = false;
            hadiths.forEach(function(item) {
                const text = item.innerText.toLowerCase();
                if(text.includes(term)) {
                    item.style.display = 'block';
                    hasVisible = true;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // hide pagination if searching
            const pagination = document.getElementById('paginationContainer');
            if(pagination) {
                if(term.length > 0) {
                    pagination.style.display = 'none';
                } else {
                    pagination.style.display = 'flex';
                }
            }
        });
    }

    // CSS overrides for the pagination
    var paginationUl = document.querySelector('.pagination');
    if (paginationUl) {
        paginationUl.style.display = 'flex';
        paginationUl.style.listStyle = 'none';
        paginationUl.style.padding = '0';
        paginationUl.style.gap = '6px';
        
        var links = paginationUl.querySelectorAll('li a, li span');
        links.forEach(function(link) {
            link.style.padding = '10px 16px';
            link.style.borderRadius = '9999px';
            link.style.background = 'white';
            link.style.color = '#0A1F3F';
            link.style.border = '1px solid #DFE5ED';
            link.style.textDecoration = 'none';
            link.style.fontWeight = '600';
            link.style.fontSize = '0.85rem';
            link.style.transition = 'all 0.2s';
        });

        var linkHovers = paginationUl.querySelectorAll('li a');
        linkHovers.forEach(function(link) {
            link.addEventListener('mouseenter', function() {
                this.style.borderColor = '#0A1F3F';
                this.style.background = '#F7F8FA';
            });
            link.addEventListener('mouseleave', function() {
                this.style.borderColor = '#DFE5ED';
                this.style.background = 'white';
            });
        });
        
        var active = paginationUl.querySelector('.active span');
        if (active) {
            active.style.background = '#0A1F3F';
            active.style.color = 'white';
            active.style.borderColor = '#0A1F3F';
        }
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/hadith/show.blade.php ENDPATH**/ ?>