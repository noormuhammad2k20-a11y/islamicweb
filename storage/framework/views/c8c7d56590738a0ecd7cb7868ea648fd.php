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
        /* Mapping old variables to New Premium Theme */
        --primary: #0A1F3F;
        --primary-dark: #0F2D52;
        --primary-light: #C9A84C;
        --primary-rgb: 10, 31, 63;
        
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
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-xl: 44px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

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
    .topics-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; }
    .topic-card-wrapper { height: 100%; }
    .topic-card {
        position: relative; background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-md); padding: 32px; overflow: hidden; transition: var(--tr);
        box-shadow: var(--shadow-xs); height: 100%; display: flex; flex-direction: column; 
        align-items: center; text-align: center;
    }
    .topic-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    /* Subtle Hover */
    .topic-card:hover { 
        transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--navy-tint); 
    }
    .topic-card:hover::before { transform: scaleX(1); }

    .topic-card-icon {
        width: 64px; height: 64px; background: var(--navy-tint); border: 1px solid var(--border-light);
        border-radius: 18px; display: flex; align-items: center; justify-content: center; 
        margin-bottom: 20px; transition: var(--tr); flex-shrink: 0; color: var(--navy); font-size: 1.4rem;
    }
    .topic-card:hover .topic-card-icon { 
        background: var(--navy); color: var(--gold-light); border-color: var(--navy); 
    }

    .topic-name {
        font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700;
        color: var(--navy); margin-bottom: 8px; line-height: 1.2; transition: var(--tr-fast);
    }
    .topic-card:hover .topic-name { color: var(--navy-mid); }

    .hadith-count-badge {
        display: inline-block; font-size: .75rem; font-weight: 700; color: var(--gold-dark);
        background: var(--gold-tint); padding: 5px 14px; border-radius: var(--radius-full);
        border: 1px solid rgba(201, 168, 76, 0.15); margin-bottom: 16px;
    }

    .topic-card p {
        font-size: .9rem; color: var(--text-medium); line-height: 1.7; margin-bottom: 20px; flex-grow: 1;
    }

    .read-more {
        display: inline-flex; align-items: center; gap: 8px; font-family: 'Outfit', sans-serif;
        font-size: .85rem; font-weight: 600; color: var(--navy); padding: 10px 24px;
        border-radius: var(--radius-full); border: 1px solid var(--border); background: transparent;
        transition: var(--tr); letter-spacing: .2px;
    }
    .topic-card:hover .read-more { 
        background: var(--navy); color: var(--white); border-color: var(--navy); 
    }
    .topic-card:hover .read-more i { color: var(--gold-light); transform: translateX(3px); }

    /* Featured Hadiths */
    .hadith-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 30px; margin-bottom: 24px; box-shadow: var(--shadow-sm); transition: var(--tr);
        position: relative; overflow: hidden;
    }
    .hadith-card:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); }
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
    .seo-content-box::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient);
    }
    .seo-content-box h2 {
        font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: var(--navy); 
        margin-bottom: 20px; font-weight: 700;
    }
    .seo-content-box p { color: var(--text-medium); line-height: 1.8; font-size: 1rem; margin-bottom: 15px; }

    /* Buttons */
    .btn-outline-navy {
        display: inline-flex; align-items: center; gap: 10px; background: var(--white); color: var(--navy);
        padding: 12px 28px; border-radius: var(--radius-full); text-decoration: none; font-weight: 600;
        font-size: .9rem; border: 1px solid var(--navy); cursor: pointer; box-shadow: var(--shadow-xs); 
        transition: var(--tr); letter-spacing: .3px; font-family: 'Outfit', sans-serif;
    }
    .btn-outline-navy:hover { 
        background: var(--navy); color: var(--white); transform: translateY(-2px); box-shadow: var(--shadow-md); 
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
            <i class="fas fa-list-ul"></i> Total Topics: <?php echo e($topics->count()); ?>

        </div>
        <div class="prayer-ticker-label">
            <i class="fas fa-quote-right"></i> Total Hadiths: <?php echo e($topics->sum('hadiths_count')); ?>

        </div>
        <div class="prayer-ticker-label">
            <i class="fas fa-book"></i> Major Books Covered
        </div>
    </div>
</div>

<section class="section">
    <div class="section-inner">
        
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-bookmark"></i> Collections</div>
            <h2 class="section-title">Browse by <span>Topic</span></h2>
            <p class="section-subtitle">Select a topic to read related authentic hadiths.</p>
        </div>

        <div class="topics-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="topic-card-wrapper">
                <a href="<?php echo e(route('hadith.show', $topic->slug)); ?>" style="text-decoration: none; color: inherit; display: block; height: 100%;">
                    <div class="topic-card">
                        <div class="topic-card-icon">
                            <i class="fas fa-star-and-crescent"></i>
                        </div>
                        <h3 class="topic-name"><?php echo e($topic->topic_name); ?></h3>
                        <div class="hadith-count-badge">
                            <?php echo e($topic->hadiths_count); ?> Hadiths
                        </div>
                        <p>
                            <?php echo e(Str::limit($topic->content, 100)); ?>

                        </p>
                        <div class="read-more">
                            Read Hadiths <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <!-- Featured Hadiths -->
        <?php
            $featuredHadiths = \App\Models\Hadith::where('is_featured', 1)->inRandomOrder()->limit(3)->get();
        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featuredHadiths->isNotEmpty()): ?>
        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-star"></i> Featured</div>
            <h2 class="section-title">Featured <span>Hadiths</span></h2>
        </div>
        <div style="max-width: 800px; margin: 0 auto;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredHadiths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fhadith): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="hadith-card">
                <div class="hadith-card-header">
                    <span style="font-weight: 600; color: var(--navy);"><i class="fas fa-star" style="color: var(--gold);"></i> Featured Hadith</span>
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
                    <a href="<?php echo e(route('hadith.show', $fhadith->topic->slug)); ?>" style="color: var(--navy); font-weight: 600; margin-left: auto; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">Read More <i class="fas fa-arrow-right"></i></a>
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
    document.querySelectorAll('.topic-card-wrapper').forEach(card => {
        const name = card.querySelector('.topic-name').textContent.toLowerCase();
        card.style.display = name.includes(query) ? 'block' : 'none';
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/hadith/index.blade.php ENDPATH**/ ?>