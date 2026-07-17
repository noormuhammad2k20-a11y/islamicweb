

<?php $__env->startSection('title', 'Hadith Topics — Authentic Islamic Traditions'); ?>

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
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    .hadith-topics-section { 
        background: var(--bg-main); 
        padding: 120px 0; 
        position: relative; 
        overflow: hidden; 
    }
    .hadith-topics-section::before {
        content: ""; position: absolute; top: 10%; left: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(10, 31, 63, 0.04), transparent 60%);
        border-radius: 50%; pointer-events: none; z-index: 0;
    }
    .hadith-topics-section .section-inner { 
        max-width: 1140px; margin: 0 auto; padding: 0 20px; 
        position: relative; z-index: 1; 
    }

    /* Breadcrumb */
    .hadith-breadcrumb { text-align: center; margin-bottom: 50px; }
    .hadith-breadcrumb-inner { 
        background: var(--white); padding: 12px 30px; border-radius: var(--radius-full); 
        display: inline-block; box-shadow: var(--shadow-md); font-size: .9rem; 
        font-weight: 600; border: 1px solid var(--border-light); 
    }
    .hadith-breadcrumb-inner a { color: var(--navy); text-decoration: none; transition: var(--tr-fast); }
    .hadith-breadcrumb-inner a:hover { color: var(--gold-dark); }
    .hadith-breadcrumb-inner span { color: var(--text-faint); margin: 0 10px; }
    .hadith-breadcrumb-inner .active { color: var(--text-medium); }

    /* Section Header */
    .section-header { text-align: center; margin-bottom: 60px; }
    .section-badge { 
        display: inline-flex; align-items: center; gap: 8px; 
        background: var(--navy-tint); color: var(--navy); 
        padding: 8px 20px; border-radius: var(--radius-full); 
        font-size: .75rem; font-weight: 700; text-transform: uppercase; 
        letter-spacing: 1.5px; margin-bottom: 15px; border: 1px solid var(--border-light); 
    }
    .section-badge i { color: var(--gold); }
    .section-title { 
        font-family: 'Cormorant Garamond', serif; font-size: 3rem; color: var(--navy); 
        margin-bottom: 20px; font-weight: 700; line-height: 1.1; 
    }
    .section-title span { color: var(--gold-dark); font-style: italic; }
    .arabic-divider { display: flex; align-items: center; justify-content: center; gap: 15px; margin: 25px 0; }
    .arabic-divider .line { width: 80px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold), transparent); }
    .arabic-divider .symbol { font-size: 1.8rem; font-family: 'Scheherazade New', serif; color: var(--gold-dark); }
    .section-subtitle { font-size: 1.05rem; color: var(--text-medium); max-width: 600px; margin: 0 auto; line-height: 1.85; }

    /* Grid & Cards */
    .topics-grid { 
        display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; 
    }
    .topic-card { 
        position: relative; background: var(--white); border: 1px solid var(--border-light); 
        border-radius: var(--radius-md); padding: 36px 30px; text-decoration: none; color: var(--text-dark); 
        overflow: hidden; transition: var(--tr); box-shadow: var(--shadow-xs); display: flex; flex-direction: column; align-items: center; text-align: center;
    }
    .topic-card::before { 
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; 
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr); 
    }
    /* Subtle Hover Effect */
    .topic-card:hover { 
        transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--navy-tint); 
    }
    .topic-card:hover::before { transform: scaleX(1); }
    
    .topic-icon-wrap { 
        width: 64px; height: 64px; background: var(--navy-tint); 
        border: 1px solid var(--border-light); border-radius: 18px; 
        display: flex; align-items: center; justify-content: center; margin-bottom: 24px; 
        transition: var(--tr); flex-shrink: 0; 
    }
    .topic-icon-wrap i { font-size: 1.4rem; color: var(--navy); transition: var(--tr); }
    .topic-card:hover .topic-icon-wrap { 
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); border-color: var(--navy); 
    }
    .topic-card:hover .topic-icon-wrap i { color: var(--gold-light); }

    .topic-title { 
        font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 700; color: var(--navy); 
        margin-bottom: 12px; line-height: 1.2; transition: var(--tr-fast); 
    }
    .topic-card:hover .topic-title { color: var(--navy-mid); }
    
    .topic-desc { 
        font-size: .95rem; color: var(--text-medium); line-height: 1.75; margin-bottom: 24px; flex-grow: 1; 
    }
    
    .topic-cta { 
        display: inline-flex; align-items: center; gap: 8px; font-family: 'Outfit', sans-serif; 
        font-size: .85rem; font-weight: 600; color: var(--navy); padding: 10px 24px; 
        border-radius: var(--radius-full); border: 1.5px solid var(--border); background: transparent; 
        transition: var(--tr); align-self: center; letter-spacing: .2px; 
    }
    .topic-cta i { font-size: .7rem; transition: var(--tr-fast); }
    .topic-card:hover .topic-cta { 
        background: var(--navy); color: var(--white); border-color: var(--navy); 
    }
    .topic-card:hover .topic-cta i { transform: translateX(3px); color: var(--gold-light); }

    /* Empty State */
    .empty-state-box { 
        background: var(--white); border: 1px dashed var(--border); border-radius: var(--radius-md); 
        padding: 60px 20px; text-align: center; margin-top: 40px; 
    }
    .empty-state-box i { font-size: 2.5rem; color: var(--gold-light); margin-bottom: 20px; }
    .empty-state-box p { color: var(--text-medium); font-size: 1.1rem; font-weight: 500; margin: 0; }

    @media (max-width: 768px) {
        .hadith-topics-section { padding: 80px 0; }
        .section-title { font-size: 2.2rem; }
        .topics-grid { grid-template-columns: 1fr; }
    }
</style>

<section class="section hadith-topics-section">
    <div class="section-inner">
        <div class="hadith-breadcrumb">
            <div class="hadith-breadcrumb-inner">
                <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a> 
                <span>/</span> 
                <span class="active">Hadith Topics</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-open"></i> Authentic</div>
            <h1 class="section-title">Hadith by <span>Topic</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Explore collections of authentic Ahadeeth categorized by subject.</p>
        </div>

        <div class="topics-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('hadith.show', $topic->slug)); ?>" class="topic-card">
                <div class="topic-icon-wrap"><i class="fas fa-book-reader"></i></div>
                <h3 class="topic-title"><?php echo e($topic->topic_name); ?></h3>
                <p class="topic-desc">Read authentic narrations related to <?php echo e(strtolower($topic->topic_name)); ?>.</p>
                <span class="topic-cta">View Hadith <i class="fas fa-arrow-right"></i></span>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topics->count() == 0): ?>
        <div class="empty-state-box">
            <i class="fas fa-info-circle"></i>
            <p>Hadith topics are currently being updated.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\hadith\index.blade.php ENDPATH**/ ?>