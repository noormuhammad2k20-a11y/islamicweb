<?php $__env->startSection('title', $collection->name_en . ' - Surahs of the Quran'); ?>
<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        /* Mapping for potential layout.app dependencies */
        --primary: #0A1F3F;
        --primary-dark: #0F2D52;
        --primary-light: #C9A84C;
        
        /* Premium Theme Variables */
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
        --emerald: #0D7C5F;
        --emerald-tint: #E8F5F0;
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
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    .collection-page-section { 
        background: var(--bg-main); 
        padding: 100px 0; 
        position: relative; 
        overflow: hidden; 
    }
    .collection-page-section::before {
        content: "";
        position: absolute;
        top: 10%; left: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(10, 31, 63, 0.04), transparent 60%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }
    .collection-container { 
        max-width: 1140px; 
        margin: 0 auto; 
        padding: 0 20px; 
        position: relative; 
        z-index: 1; 
    }

    /* Breadcrumb */
    .surah-breadcrumb { text-align: center; margin-bottom: 50px; }
    .surah-breadcrumb-inner { 
        background: var(--white); padding: 12px 30px; border-radius: var(--radius-full); 
        display: inline-block; box-shadow: var(--shadow-md); font-size: .9rem; 
        font-weight: 600; border: 1px solid var(--border-light); 
    }
    .surah-breadcrumb-inner a { color: var(--navy); text-decoration: none; transition: var(--tr-fast); }
    .surah-breadcrumb-inner a:hover { color: var(--gold-dark); }
    .surah-breadcrumb-inner span { color: var(--text-faint); margin: 0 10px; }
    .surah-breadcrumb-inner .active { color: var(--text-medium); }

    /* Header */
    .collection-header { text-align: center; margin-bottom: 60px; }
    .collection-header h1 { 
        font-family: 'Cormorant Garamond', serif; 
        font-size: 3rem; color: var(--navy); 
        margin-bottom: 15px; font-weight: 700; line-height: 1.1; 
    }
    .collection-header h1 span { color: var(--gold-dark); font-style: italic; }
    .collection-header p { 
        font-size: 1.05rem; color: var(--text-medium); 
        max-width: 700px; margin: 0 auto; line-height: 1.85; 
    }
    .gold-divider { 
        width: 60px; height: 3px; background: var(--gold-gradient); 
        border-radius: 2px; margin: 0 auto 25px; 
        box-shadow: 0 0 12px rgba(201, 168, 76, 0.25); 
    }

    /* Grid & Cards */
    .collection-grid { 
        display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); gap: 24px; 
    }
    .collection-card { 
        position: relative; display: flex; align-items: center; background: var(--white); 
        border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 24px; 
        text-decoration: none; color: var(--text-dark); transition: var(--tr); box-shadow: var(--shadow-xs); 
        overflow: hidden;
    }
    .collection-card::before {
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr);
    }
    .collection-card:hover { 
        transform: translateY(-4px); box-shadow: var(--shadow-lg); border-color: var(--gold); 
    }
    .collection-card:hover::before { transform: scaleX(1); }

    .collection-card-number { 
        width: 50px; height: 50px; border-radius: 14px; background: var(--navy-tint); 
        color: var(--navy); display: flex; align-items: center; justify-content: center; 
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; 
        margin-right: 20px; flex-shrink: 0; transition: var(--tr); 
    }
    .collection-card:hover .collection-card-number { 
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--gold-light); 
    }
    
    .collection-card-info { flex: 1; }
    .collection-card-info h3 { 
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; font-weight: 700; 
        color: var(--navy); margin: 0 0 6px 0; line-height: 1.2; transition: var(--tr-fast); 
    }
    .collection-card:hover .collection-card-info h3 { color: var(--navy-mid); }
    
    .collection-card-meta { 
        font-size: .85rem; color: var(--text-light); font-weight: 500; 
        display: flex; align-items: center; gap: 10px; 
    }
    .collection-card-meta i { color: var(--gold); margin-right: 5px; }
    
    @media (max-width: 768px) {
        .collection-page-section { padding: 60px 0; }
        .collection-header h1 { font-size: 2.2rem; }
        .collection-grid { grid-template-columns: 1fr; }
    }
</style>

<section class="collection-page-section">
    <div class="collection-container">
        
        <div class="surah-breadcrumb">
            <div class="surah-breadcrumb-inner">
                <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a>
                <span>/</span>
                <a href="<?php echo e(route('surah.index')); ?>">Surahs</a>
                <span>/</span>
                <span class="active"><?php echo e($collection->name_en); ?></span>
            </div>
        </div>

        <div class="collection-header">
            <h1><?php echo e($collection->name_en); ?></h1>
            <div class="gold-divider"></div>
            <p><?php echo e($collection->description_en); ?></p>
        </div>
        
        <div class="collection-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $collection->surahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('surah.show', $surah->slug)); ?>" class="collection-card">
                    <div class="collection-card-number"><?php echo e($surah->number); ?></div>
                    <div class="collection-card-info">
                        <h3><?php echo e($surah->name_en); ?></h3>
                        <div class="collection-card-meta">
                            <span><i class="fas <?php echo e(($surah->revelation_type == 'Madani') ? 'fa-mosque' : 'fa-kaaba'); ?>"></i> <?php echo e($surah->revelation_type); ?></span>
                            <span style="color: var(--border);">•</span>
                            <span><i class="fas fa-list-ol"></i> <?php echo e($surah->total_ayahs); ?> Ayahs</span>
                        </div>
                    </div>
                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/collection.blade.php ENDPATH**/ ?>