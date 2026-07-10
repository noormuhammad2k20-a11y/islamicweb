<?php $__env->startSection('title', $topic->topic_name . ' Hadiths — ' . $topic->hadiths_count . ' Authentic Hadiths | Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Read authentic Hadiths about ' . $topic->topic_name . ' with Arabic text, Urdu and English translations from Sahih Bukhari and other major hadith books.'); ?>
<?php $__env->startSection('canonical', url('/hadith/' . $topic->slug)); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "<?php echo e($topic->topic_name); ?> Hadiths",
  "description": "<?php echo e(Str::limit($topic->content, 150)); ?>",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(url('/')); ?>"},
      {"@type": "ListItem", "position": 2, "name": "Hadith by Topic", "item": "<?php echo e(url('/hadith')); ?>"},
      {"@type": "ListItem", "position": 3, "name": "<?php echo e($topic->topic_name); ?>", "item": "<?php echo e(url('/hadith/' . $topic->slug)); ?>"}
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
        --primary-subtle: #E4EBF3;
        
        --bg-main: #F7F8FA;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
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
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    /* Breadcrumb */
    .hadith-page-breadcrumb {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 100%);
        padding: 15px 0; border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .hadith-page-breadcrumb a { color: rgba(255,255,255,0.7); text-decoration: none; transition: var(--tr-fast); }
    .hadith-page-breadcrumb a:hover { color: var(--gold-light); }
    .hadith-page-breadcrumb span { color: var(--gold-light); }

    /* Topic Header */
    .topic-header h1 { 
        font-family: 'Cormorant Garamond', serif; font-size: 2.5rem; color: var(--navy); 
        margin-bottom: 15px; font-weight: 700; line-height: 1.1; 
    }
    .topic-header h1 span { color: var(--gold-dark); font-style: italic; }
    .topic-header p { color: var(--text-medium); line-height: 1.8; font-size: 1.05rem; margin-bottom: 20px; }
    .topic-badge { 
        display: inline-flex; align-items: center; gap: 8px; background: var(--gold-tint); color: var(--gold-dark); 
        padding: 8px 18px; border-radius: var(--radius-full); font-size: .75rem; font-weight: 700; 
        text-transform: uppercase; letter-spacing: 1.5px; border: 1px solid rgba(201, 168, 76, 0.15); 
    }
    .topic-badge i { color: var(--gold); }

    /* Hadith Cards */
    .hadith-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 30px; margin-bottom: 24px; box-shadow: var(--shadow-sm); transition: var(--tr);
        position: relative; overflow: hidden;
    }
    .hadith-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    /* Subtle Hover */
    .hadith-card:hover { 
        box-shadow: var(--shadow-md); border-color: var(--navy-tint); transform: translateY(-3px); 
    }
    .hadith-card:hover::before { transform: scaleX(1); }

    .hadith-card-header {
        display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;
        padding-bottom: 15px; border-bottom: 1px solid var(--border-light);
    }
    .hadith-card-header span { font-weight: 700; color: var(--navy); font-size: .9rem; }
    .hadith-card-header i { color: var(--gold-dark); }

    .hadith-arabic {
        font-family: 'Scheherazade New', serif; font-size: 1.9rem; color: var(--navy);
        line-height: 2.4; text-align: right; margin-bottom: 20px; direction: rtl; font-weight: 500;
    }

    .urdu-translation {
        background: var(--bg-main); border: 1px solid var(--border-light); border-right: 4px solid var(--navy);
        border-radius: var(--radius-sm); padding: 1.2rem; text-align: right; direction: rtl; 
        font-family: 'Amiri', serif; font-size: 1.4rem; line-height: 2.2; color: var(--text-dark); margin-bottom: 1.5rem;
    }
    .urdu-translation strong { color: var(--navy); }

    .eng-translation { font-size: 1.1rem; line-height: 1.8; color: var(--text-dark); }
    .eng-translation strong { color: var(--navy); }

    .hadith-reference {
        display: flex; align-items: center; flex-wrap: wrap; gap: 15px; margin-top: 20px;
        padding-top: 15px; border-top: 1px solid var(--border-light); font-size: .85rem; color: var(--text-light);
    }
    .hadith-reference i { color: var(--gold-dark); margin-right: 5px; }

    .grade-badge {
        font-size: .7rem; font-weight: 700; padding: 5px 12px; border-radius: var(--radius-full);
        text-transform: uppercase; letter-spacing: .5px;
    }
    .grade-sahih { background: var(--emerald-tint); color: var(--emerald); border: 1px solid rgba(13, 124, 95, 0.15); }
    .grade-hasan { background: var(--gold-tint); color: var(--gold-dark); border: 1px solid rgba(201, 168, 76, 0.15); }

    /* Sidebar */
    .sidebar-widget {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 25px; box-shadow: var(--shadow-sm); margin-bottom: 24px; position: relative; overflow: hidden;
    }
    .sidebar-widget::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient);
    }
    .widget-title { 
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); 
        margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-light); font-weight: 700; 
    }
    .topic-pill {
        background: var(--bg-main); color: var(--text-medium); padding: 8px 16px; border-radius: var(--radius-full);
        font-size: .85rem; text-decoration: none; transition: var(--tr-fast); border: 1px solid var(--border-light); font-weight: 600;
    }
    .topic-pill:hover { 
        background: var(--navy); color: var(--white); border-color: var(--navy); transform: translateY(-2px); 
    }

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
        font-weight: 700; text-decoration: none; transition: var(--tr); width: 100%; 
    }
    .btn-primary-nav:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(201, 168, 76, 0.3); }

    .share-btn { 
        margin-left: auto; background: none; border: none; color: var(--navy); font-weight: 600; 
        cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: .85rem; transition: var(--tr-fast); 
    }
    .share-btn:hover { color: var(--gold-dark); }

    @media (max-width: 991px) {
        .hadith-layout { grid-template-columns: 1fr !important; }
        .sidebar { position: static !important; }
    }
</style>

<!-- Breadcrumbs -->
<div class="hadith-page-breadcrumb">
    <div style="max-width: 1280px; margin: 0 auto; padding: 0 28px; color: rgba(255,255,255,0.7); font-size: 0.85rem;">
        <a href="<?php echo e(url('/')); ?>">Home</a> 
        <i class="fas fa-chevron-right" style="font-size: 0.7rem; margin: 0 8px;"></i> 
        <a href="<?php echo e(url('/hadith')); ?>">Hadith by Topic</a> 
        <i class="fas fa-chevron-right" style="font-size: 0.7rem; margin: 0 8px;"></i> 
        <span><?php echo e($topic->topic_name); ?></span>
    </div>
</div>

<section class="section" style="background: var(--bg-main);">
    <div class="section-inner">
        <div class="hadith-layout" style="display: grid; grid-template-columns: 1fr 300px; gap: 40px; align-items: start;">
            
            <!-- Main Content -->
            <div>
                <!-- Topic Header -->
                <div class="topic-header" style="margin-bottom: 40px; padding-bottom: 20px; border-bottom: 1px solid var(--border-light);">
                    <h1><?php echo e($topic->topic_name); ?> Hadiths | <span><?php echo e($topic->topic_name); ?> احادیث</span></h1>
                    <p><?php echo e($topic->content); ?></p>
                    <div class="topic-badge">
                        <i class="fas fa-list"></i> <?php echo e($hadiths->total()); ?> Hadiths in this topic
                    </div>
                </div>

                <!-- Hadiths List -->
                <div class="hadiths-list">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $hadiths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hadith): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="hadith-card" id="hadith-<?php echo e($hadith->id); ?>">
                        
                        <div class="hadith-card-header">
                            <span>
                                <i class="fas fa-hashtag"></i> <?php echo e($hadiths->firstItem() + $index); ?>

                            </span>
                            <span class="grade-badge grade-<?php echo e(strtolower($hadith->sahih_grade ?? 'sahih')); ?>">
                                <?php echo e($hadith->sahih_grade ?? 'Sahih'); ?>

                            </span>
                        </div>
                        
                        <div class="hadith-card-body">
                            <div class="hadith-arabic">
                                <?php echo e($hadith->arabic_text); ?>

                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->urdu_translation): ?>
                            <div class="urdu-translation">
                                <strong>ترجمہ:</strong> <?php echo e($hadith->urdu_translation); ?>

                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <div class="eng-translation">
                                <strong>Translation:</strong> <?php echo e($hadith->english_translation); ?>

                            </div>
                        </div>

                        <div class="hadith-reference">
                            <span><i class="fas fa-book"></i> <?php echo e($hadith->book_name); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->chapter): ?>
                            <span><i class="fas fa-bookmark"></i> <?php echo e($hadith->chapter); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->hadith_number): ?>
                            <span><i class="fas fa-hashtag"></i> <?php echo e($hadith->hadith_number); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hadith->narrator): ?>
                            <span><i class="fas fa-user"></i> Narrated <?php echo e($hadith->narrator); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <span><i class="fas fa-link"></i> <?php echo e($hadith->reference); ?></span>
                            
                            <button onclick="copyLink('<?php echo e(url('/hadith/' . $topic->slug . '#hadith-' . $hadith->id)); ?>')" class="share-btn">
                                <i class="fas fa-share-alt"></i> Share
                            </button>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                <!-- Pagination -->
                <div style="margin-top: 40px; display: flex; justify-content: center;">
                    <?php echo e($hadiths->links('pagination::bootstrap-4')); ?>

                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar" style="position: sticky; top: 100px;">
                <div class="sidebar-widget">
                    <h3 class="widget-title">Other Topics</h3>
                    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $otherTopics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
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
            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

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

// CSS overrides for the pagination
document.addEventListener("DOMContentLoaded", function() {
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/hadith/show.blade.php ENDPATH**/ ?>