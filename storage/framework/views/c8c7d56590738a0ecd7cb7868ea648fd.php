

<?php $__env->startSection('title', 'Hadith by Topic — احادیث بموضوع | Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Browse authentic Hadiths organized by topics. Read Arabic text with Urdu and English translations from Sahih Bukhari, Muslim, Tirmidhi and more.'); ?>
<?php $__env->startSection('canonical', url('/hadith')); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Hadith by Topic",
  "description": "Collection of authentic Hadiths organized by Islamic topics",
  "url": "<?php echo e(url('/hadith')); ?>",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(url('/')); ?>"},
      {"@type": "ListItem", "position": 2, "name": "Hadith by Topic", "item": "<?php echo e(url('/hadith')); ?>"}
    ]
  }
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --emerald: #0D7C5F;
        --emerald-tint: #E8F5F0;
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --radius-sm: 12px;
        --radius-md: 20px;
        --radius-lg: 28px;
        --radius-full: 9999px;
        --tr: all .35s ease;
        --tr-fast: all .2s ease;
    }

    body { background: var(--bg-main); }

    /* Hero Search Input */
    #topicSearch {
        width: 100%; padding: 15px 20px 15px 45px; border-radius: var(--radius-full);
        border: 1px solid rgba(201, 168, 76, 0.3); background: rgba(255, 255, 255, 0.08);
        color: var(--white); outline: none; font-size: 1rem; backdrop-filter: blur(8px);
        transition: var(--tr); font-family: 'Outfit', sans-serif;
    }
    #topicSearch::placeholder { color: rgba(255, 255, 255, 0.6); }
    #topicSearch:focus { 
        border-color: var(--gold); background: rgba(255, 255, 255, 0.12); 
        box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.1); 
    }

    /* Topic Grid & Cards */
    .topics-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    @media (max-width: 1024px) { .topics-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 768px) { .topics-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 576px) { .topics-grid { grid-template-columns: 1fr; } }
    .topic-card-wrapper { height: 100%; }
    
    /* Common Section Header */
    .section-header { text-align: center; margin-bottom: 50px; }
    .section-header h2 { font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; color: var(--navy); margin-bottom: 10px; font-weight: 700; }
    .section-header h2 span { color: var(--gold-dark); font-style: italic; }
    .section-header p { color: var(--text-medium); max-width: 600px; margin: 0 auto; font-size: 1rem; }
    .section-badge { 
        display: inline-flex; align-items: center; gap: 8px; background: var(--navy-tint); color: var(--navy); 
        padding: 6px 16px; border-radius: var(--radius-full); font-size: .75rem; font-weight: 700; 
        text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; border: 1px solid var(--border-light); 
    }
    .section-badge i { color: var(--gold-dark); }

    /* 1. Topic Cards (Premium & Clean) */
    .topic-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 28px; height: 100%; display: flex; flex-direction: column; text-decoration: none; color: var(--text-dark);
        transition: var(--tr); box-shadow: var(--shadow-xs); position: relative; overflow: hidden;
    }
    .topic-card::before { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 3px; background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: transform .35s ease; }
    .topic-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); border-color: var(--border); }
    .topic-card:hover::before { transform: scaleX(1); }

    .topic-card-head { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; gap: 10px; }
    .topic-icon { width: 44px; height: 44px; background: var(--gold-tint); color: var(--gold-dark); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
    .topic-native { text-align: right; }
    .topic-native-ar { font-family: 'Scheherazade New', serif; font-size: 1.3rem; color: var(--navy); line-height: 1; display: block; }
    .topic-native-ur { font-size: .85rem; color: var(--text-light); margin-top: 4px; display: block; }

    .topic-name { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); margin-bottom: 6px; line-height: 1.2; }
    .topic-count-badge { display: inline-block; font-size: .75rem; font-weight: 600; color: var(--gold-dark); background: var(--gold-tint); padding: 4px 10px; border-radius: 6px; margin-bottom: 16px; border: 1px solid rgba(201, 168, 76, 0.15); }
    .topic-desc { font-size: .9rem; color: var(--text-medium); line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }

    .topic-stats-bar { margin-bottom: 16px; }
    .topic-stats-track { display: flex; width: 100%; height: 5px; border-radius: 4px; overflow: hidden; background: var(--bg-tinted); }
    .stat-sahih { background: var(--navy); }
    .stat-hasan { background: var(--gold-dark); }
    .stat-daif { background: #cbd5e1; }
    .topic-stats-labels { display: flex; justify-content: space-between; margin-top: 6px; font-size: .7rem; color: var(--text-light); font-weight: 600; }

    .read-more-link { display: inline-flex; align-items: center; gap: 6px; font-family: 'Outfit', sans-serif; font-size: .85rem; font-weight: 600; color: var(--navy); margin-top: auto; }
    .topic-card:hover .read-more-link { color: var(--gold-dark); }
    .topic-card:hover .read-more-link i { transform: translateX(3px); }

    /* 2. Collection Cards (Premium Library Look) */
    .collection-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 24px; height: 100%; display: flex; flex-direction: column; text-decoration: none; 
        color: var(--text-dark); transition: var(--tr); box-shadow: var(--shadow-sm); 
        position: relative; z-index: 1; overflow: hidden;
    }
    .collection-card::after {
        content: ""; position: absolute; right: -20px; bottom: -20px; width: 100px; height: 100px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.08) 0%, transparent 70%);
        z-index: -1; pointer-events: none; transition: var(--tr);
    }
    .collection-card:hover { box-shadow: var(--shadow-md); border-color: var(--gold-light); transform: translateY(-3px); }
    .collection-card:hover::after { transform: scale(1.5); }

    .collection-head { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 16px; }
    
    .collection-icon-wrapper { 
        width: 44px; height: 44px; background: var(--navy); color: var(--gold-light); 
        border-radius: 12px; display: flex; align-items: center; justify-content: center; 
        font-size: 1.1rem; flex-shrink: 0; box-shadow: 0 4px 10px rgba(10,31,63,0.15);
    }
    .collection-ar { font-family: 'Scheherazade New', serif; font-size: 1.5rem; color: var(--gold-dark); line-height: 1.2; text-align: right; margin-top: 4px; }
    
    .collection-name { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; line-height: 1.2; }
    
    .collection-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 16px; font-size: .8rem; }
    .collection-count { font-weight: 600; color: var(--navy); background: var(--navy-tint); padding: 4px 12px; border-radius: var(--radius-full); display: inline-flex; align-items: center; gap: 5px; border: 1px solid var(--border-light); }
    .collection-count i { color: var(--gold-dark); font-size: .7rem; }
    
    .collection-desc { font-size: .85rem; color: var(--text-medium); line-height: 1.6; flex-grow: 1; margin: 0; }
    
    .collection-footer { margin-top: 20px; padding-top: 15px; border-top: 1px solid var(--border-light); font-family: 'Outfit', sans-serif; font-size: .85rem; font-weight: 600; color: var(--navy); display: flex; align-items: center; justify-content: space-between; transition: var(--tr); }
    .collection-card:hover .collection-footer { color: var(--gold-dark); }
    .collection-card:hover .collection-footer i { transform: translateX(3px); transition: var(--tr); }

    /* 3. Narrator Cards (Profile Style) */
    .narrator-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 28px; display: flex; align-items: center; gap: 20px; text-decoration: none; color: var(--text-dark);
        transition: var(--tr); box-shadow: var(--shadow-xs); height: 100%;
    }
    .narrator-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); border-color: var(--gold-light); background: var(--gold-tint); }

    .narrator-avatar { width: 56px; height: 56px; background: var(--navy); color: var(--gold-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; border: 2px solid var(--gold); }
    .narrator-info { flex: 1; }
    .narrator-name { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; font-weight: 700; color: var(--navy); margin-bottom: 4px; line-height: 1.2; }
    .narrator-count { font-size: .8rem; color: var(--text-light); font-weight: 600; display: flex; align-items: center; gap: 5px; }
    .narrator-count i { color: var(--gold-dark); font-size: .7rem; }

    /* Featured Hadiths */
    .hadith-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 30px; margin-bottom: 24px; box-shadow: var(--shadow-sm); transition: var(--tr);
        position: relative; overflow: hidden;
    }
    .hadith-card:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }
    .hadith-card::before { content: ""; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--gold-gradient); }
    .hadith-card-header {
        display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;
        padding-bottom: 15px; border-bottom: 1px solid var(--border-light);
    }
    .hadith-card-body { text-align: left; }
    .hadith-arabic {
        font-family: 'Scheherazade New', serif; font-size: 1.8rem; color: var(--navy);
        line-height: 2.2; text-align: right; margin-bottom: 20px; direction: rtl;
    }
    .hadith-reference {
        display: flex; align-items: center; flex-wrap: wrap; gap: 15px; margin-top: 20px;
        padding-top: 15px; border-top: 1px solid var(--border-light); font-size: .85rem; color: var(--text-light);
    }
    .hadith-reference i { color: var(--gold); margin-right: 5px; }
    .grade-badge {
        font-size: .7rem; font-weight: 700; padding: 5px 12px; border-radius: var(--radius-full);
        text-transform: uppercase; letter-spacing: .5px;
    }
    .grade-sahih { background: var(--emerald-tint); color: var(--emerald); border: 1px solid rgba(13, 124, 95, 0.15); }
    .grade-hasan { background: var(--gold-tint); color: var(--gold-dark); border: 1px solid rgba(201, 168, 76, 0.15); }

    /* SEO Content */
    .seo-content-box {
        margin-top: 80px; background: var(--white); padding: 40px; border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm); border: 1px solid var(--border-light); position: relative; overflow: hidden;
    }
    .seo-content-box::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .seo-content-box h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: var(--navy); margin-bottom: 20px; font-weight: 700; }
    .seo-content-box p { color: var(--text-medium); line-height: 1.8; font-size: 1rem; margin-bottom: 15px; }

    /* Buttons */
    .btn-outline-navy {
        display: inline-flex; align-items: center; gap: 10px; background: var(--white); color: var(--navy);
        padding: 12px 28px; border-radius: var(--radius-full); text-decoration: none; font-weight: 600;
        font-size: .9rem; border: 1px solid var(--navy); cursor: pointer; box-shadow: var(--shadow-xs); 
        transition: var(--tr); letter-spacing: .3px; font-family: 'Outfit', sans-serif;
    }
    .btn-outline-navy:hover { background: var(--navy); color: var(--white); transform: translateY(-2px); box-shadow: var(--shadow-md); }

    @media (max-width: 768px) {
        .narrator-card { flex-direction: column; text-align: center; }
    }
</style>

<!-- Hero Section -->
<section class="hero" style="min-height: 60vh; background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);">
    <div class="hero-bg-dots"></div>
    <div class="islamic-pattern"></div>
    <div class="hero-glow hero-glow-1"></div>
    <div class="hero-glow hero-glow-2"></div>
    
    <div class="hero-inner" style="grid-template-columns: 1fr; text-align: center; max-width: 800px;">
        <div class="hero-content">
            <div class="hero-badge" style="margin: 0 auto 22px;">
                <i class="fas fa-book-open"></i> Islamic Knowledge
            </div>
            <h1 class="hero-title">Hadith by Topic | <span>احادیث بموضوع</span></h1>
            <p class="hero-desc" style="margin: 0 auto 32px; max-width: 600px;">
                Explore authentic Hadiths organized by topics — with Arabic text, Urdu and English translations
            </p>
            
            <div class="search-container" style="max-width: 500px; margin: 0 auto;">
                <div style="position: relative;">
                    <input type="text" id="topicSearch" placeholder="Search topics...">
                    <i class="fas fa-search" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--gold-light); pointer-events: none;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<div class="prayer-ticker">
    <div class="prayer-ticker-inner" style="justify-content: center; gap: 40px;">
        <div class="prayer-ticker-label">
            <i class="fas fa-list-ul"></i> Total Topics: <?php echo e($stats['total_topics']); ?>

        </div>
        <div class="prayer-ticker-label">
            <i class="fas fa-quote-right"></i> Total Hadiths: <?php echo e($stats['total_hadiths']); ?>

        </div>
        <div class="prayer-ticker-label">
            <i class="fas fa-book"></i> Authentic Collections: <?php echo e($stats['total_collections']); ?>

        </div>
        <div class="prayer-ticker-label">
            <i class="fas fa-users"></i> Key Narrators: <?php echo e($stats['total_narrators']); ?>

        </div>
    </div>
</div>

<section class="section">
    <div class="section-inner">
        
        <!-- Browse by Topic -->
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-bookmark"></i> Directory</div>
            <h2>Browse by <span>Topic</span></h2>
            <p>Select a topic to read related authentic hadiths.</p>
        </div>

        <div class="topics-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('hadith.show', $topic->slug)); ?>" class="topic-card">
                <div class="topic-card-head">
                    <div class="topic-icon"><i class="fas fa-bookmark"></i></div>
                    <div class="topic-native">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topic->topic_name_arabic): ?>
                        <span class="topic-native-ar"><?php echo e($topic->topic_name_arabic); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topic->topic_name_urdu): ?>
                        <span class="topic-native-ur"><?php echo e($topic->topic_name_urdu); ?></span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                
                <h3 class="topic-name"><?php echo e($topic->topic_name); ?></h3>
                <div class="topic-count-badge"><?php echo e($topic->hadiths_count); ?> Hadiths</div>
                
                <p class="topic-desc">
                    <?php echo e(Str::limit($topic->introduction ?? $topic->content, 85)); ?>

                </p>
                
                <?php
                    $sahihCount = \App\Models\Hadith::whereHas('topics', function($q) use ($topic) { $q->where('hadith_topics.id', $topic->id); })->where('sahih_grade', 'Sahih')->count();
                    $hasanCount = \App\Models\Hadith::whereHas('topics', function($q) use ($topic) { $q->where('hadith_topics.id', $topic->id); })->where('sahih_grade', 'Hasan')->count();
                    $daifCount = max(0, $topic->hadiths_count - $sahihCount - $hasanCount);
                    $total = max(1, $topic->hadiths_count);
                ?>
                <div class="topic-stats-bar">
                    <div class="topic-stats-track">
                        <div class="stat-sahih" style="width: <?php echo e(($sahihCount / $total) * 100); ?>%;" title="Sahih: <?php echo e($sahihCount); ?>"></div>
                        <div class="stat-hasan" style="width: <?php echo e(($hasanCount / $total) * 100); ?>%;" title="Hasan: <?php echo e($hasanCount); ?>"></div>
                        <div class="stat-daif" style="width: <?php echo e(($daifCount / $total) * 100); ?>%;" title="Daif: <?php echo e($daifCount); ?>"></div>
                    </div>
                    <div class="topic-stats-labels">
                        <span>Sahih <?php echo e($sahihCount); ?></span>
                        <span>Hasan <?php echo e($hasanCount); ?></span>
                    </div>
                </div>

                <div class="read-more-link">
                    Explore Topic <i class="fas fa-arrow-right" style="transition: transform .2s;"></i>
                </div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <!-- Browse by Collection -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($collections) && $collections->count() > 0): ?>
        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-book-open"></i> Sources</div>
            <h2>Browse by <span>Collection</span></h2>
            <p>Explore hadiths by their original books of compilation.</p>
        </div>
        <div class="topics-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('hadith.collection', $collection->slug)); ?>" class="collection-card">
                <div class="collection-head">
                    <div class="collection-icon-wrapper">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($collection->name_ar): ?>
                    <div class="collection-ar"><?php echo e($collection->name_ar); ?></div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <h3 class="collection-name"><?php echo e($collection->name_en); ?></h3>
                <div class="collection-meta">
                    <div class="collection-count"><i class="fas fa-list-ol"></i> <?php echo e($collection->hadiths_count); ?> Hadiths</div>
                </div>
                <p class="collection-desc"><?php echo e(Str::limit($collection->introduction, 90)); ?></p>
                <div class="collection-footer">
                    <span>Read Collection</span>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Browse by Narrator -->
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($narrators) && $narrators->count() > 0): ?>
        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-users"></i> Transmitters</div>
            <h2>Browse by <span>Narrator</span></h2>
            <p>Discover hadiths transmitted by the prominent companions (Sahabah).</p>
        </div>
        <div class="topics-grid" style="grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $narrators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $narrator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="narrator-card">
                <div class="narrator-avatar"><i class="fas fa-user-tie"></i></div>
                <div class="narrator-info">
                    <h3 class="narrator-name"><?php echo e($narrator->name_en); ?></h3>
                    <div class="narrator-count"><i class="fas fa-quote-right"></i> <?php echo e($narrator->hadiths_count); ?> Narrations</div>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- Featured Hadiths -->
        <?php
            $featuredHadiths = \App\Models\Hadith::where('is_featured', 1)->inRandomOrder()->limit(3)->get();
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featuredHadiths->isNotEmpty()): ?>
        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-star"></i> Featured</div>
            <h2>Featured <span>Hadiths</span></h2>
        </div>
        <div style="max-width: 800px; margin: 0 auto;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredHadiths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fhadith): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="hadith-card">
                <div class="hadith-card-header">
                    <span style="font-weight: 600; color: var(--navy); font-family: 'Outfit', sans-serif; font-size: .9rem;"><i class="fas fa-star" style="color: var(--gold);"></i> Featured Hadith</span>
                    <span class="grade-badge grade-<?php echo e(strtolower($fhadith->sahih_grade ?? 'sahih')); ?>">
                        <?php echo e($fhadith->sahih_grade ?? 'Sahih'); ?>

                    </span>
                </div>
                <div class="hadith-card-body">
                    <div class="hadith-arabic">
                        <?php echo e($fhadith->arabic_text); ?>

                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-dark);">
                        <?php echo e(Str::limit($fhadith->english_translation, 150)); ?>

                    </p>
                </div>
                <div class="hadith-reference">
                    <span><i class="fas fa-book"></i> <?php echo e($fhadith->book_name); ?></span>
                    <span><i class="fas fa-hashtag"></i> <?php echo e($fhadith->reference); ?></span>
                    <a href="<?php echo e(route('hadith.show', $fhadith->topic->slug)); ?>" style="color: var(--navy); font-weight: 600; margin-left: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-size: .9rem;">Read Full <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- SEO Content -->
        <div class="seo-content-box">
            <h2>What are Hadiths?</h2>
            <p>
                Hadith (أحاديث) refers to the recorded sayings, actions, and approvals of the Prophet Muhammad (ﷺ). They are a crucial source of Islamic guidance, second only to the Quran. The Hadith provides the practical explanation and application of the Quranic teachings, showing Muslims how to pray, fast, perform Hajj, and conduct their daily lives with the highest moral character.
            </p>
            <p>
                The most authentic collections of Hadith are known as the Sihah Sittah (The Authentic Six), which include Sahih Bukhari, Sahih Muslim, Sunan Abu Dawud, Jami at-Tirmidhi, Sunan an-Nasai, and Sunan Ibn Majah. Our collection organizes these authentic narrations by topic, making it easy for you to study and apply the beautiful teachings of the Prophet (ﷺ) in your life.
            </p>
        </div>

        <!-- Internal Links -->
        <div style="margin-top: 60px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
            <a href="<?php echo e(route('surah.index')); ?>" class="btn-outline-navy">Explore Quran</a>
            <a href="<?php echo e(route('islamic-calendar')); ?>" class="btn-outline-navy">Islamic Date</a>
            <a href="<?php echo e(route('prayer-times.hub')); ?>" class="btn-outline-navy">Prayer Times</a>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.getElementById('topicSearch').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    document.querySelectorAll('.topic-card').forEach(card => {
        const name = card.querySelector('.topic-name').textContent.toLowerCase();
        card.style.display = name.includes(query) ? 'flex' : 'none';
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/hadith/index.blade.php ENDPATH**/ ?>