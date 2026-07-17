

<?php $__env->startSection('title', '99 Names of Allah (Asma ul Husna) - Meaning & Benefits'); ?>

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
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    /* Hero Section */
    .names-hero {
        background: linear-gradient(150deg, var(--navy-mid) 0%, var(--navy) 50%, #0D1B33 100%);
        padding: 100px 20px 80px; text-align: center; color: var(--white);
        position: relative; overflow: hidden; border-bottom: 1px solid rgba(201, 168, 76, 0.15);
    }
    .hero-breadcrumb { margin-bottom: 25px; display: flex; justify-content: center; position: relative; z-index: 2; }
    .hero-breadcrumb ol { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; align-items: center; gap: 10px; font-family: 'Outfit', sans-serif; font-size: .9rem; font-weight: 500; }
    .hero-breadcrumb li { display: flex; align-items: center; color: rgba(255, 255, 255, 0.7); }
    .hero-breadcrumb a { color: rgba(255, 255, 255, 0.9); text-decoration: none; transition: var(--tr-fast); }
    .hero-breadcrumb a:hover { color: var(--gold-light); text-decoration: underline; }
    .hero-breadcrumb i { font-size: .7rem; color: rgba(255, 255, 255, 0.4); margin: 0 4px; }
    .hero-breadcrumb [aria-current="page"] { color: var(--gold-light); font-weight: 600; }
    .names-hero::before {
        content: ''; position: absolute; inset: 0; opacity: 0.04;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1;
    }
    .names-hero::after {
        content: ""; position: absolute; top: -15%; right: -10%;
        width: 700px; height: 700px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.1), transparent 60%);
        border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 1;
    }
    .hero-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
    .hero-title { font-family: 'Cormorant Garamond', serif; font-size: 3.5rem; font-weight: 700; margin-bottom: 15px; line-height: 1.1; color: var(--white); }
    .hero-title span { color: var(--gold-light); font-style: italic; }
    .hero-desc { font-family: 'Outfit', sans-serif; font-size: 1.2rem; color: rgba(255,255,255,0.8); font-weight: 300; margin: 0 auto 30px auto; text-align: center; max-width: 600px; line-height: 1.6; }
    .btn-print-hero {
        display: inline-flex; align-items: center; gap: 8px; background: var(--gold-gradient);
        color: var(--navy) !important; border: none; padding: 12px 30px; border-radius: var(--radius-full);
        font-family: 'Outfit', sans-serif; font-weight: 700; font-size: .9rem; cursor: pointer;
        transition: var(--tr); box-shadow: var(--shadow-gold); text-decoration: none; text-transform: uppercase; letter-spacing: 1px;
    }
    .btn-print-hero:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(201, 168, 76, 0.4); }

    /* Grid Layout */
    .names-section { background: var(--bg-main); padding: 80px 0; position: relative; overflow: hidden; }
    .names-section::before { content: ""; position: absolute; top: 10%; left: -5%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(10, 31, 63, 0.04), transparent 60%); border-radius: 50%; pointer-events: none; z-index: 0; }
    .names-grid { 
        display: grid; grid-template-columns: repeat(5, 1fr); gap: 24px; 
        max-width: 1280px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;
    }
    
    @media (max-width: 1200px) { .names-grid { grid-template-columns: repeat(4, 1fr); } }
    @media (max-width: 992px) { .names-grid { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 768px) { 
        .names-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; } 
        .hero-title { font-size: 2.5rem; }
    }

    /* Name Card */
    .name-card { 
        background: var(--white); border: 1px solid var(--border-light); 
        border-radius: var(--radius-md); padding: 30px 20px; text-decoration: none; color: var(--text-dark); 
        box-shadow: var(--shadow-xs); display: flex; flex-direction: column; align-items: center; 
        justify-content: center; text-align: center; position: relative; overflow: hidden; transition: var(--tr);
        min-height: 260px;
    }
    .name-card::before { 
        content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; 
        background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr); 
    }
    /* Subtle Hover */
    .name-card:hover { 
        transform: translateY(-4px); box-shadow: var(--shadow-md); border-color: var(--navy-tint); 
    }
    .name-card:hover::before { transform: scaleX(1); }

    .name-number { 
        position: absolute; top: 12px; left: 12px; background: var(--navy-tint); color: var(--navy); 
        font-family: 'Outfit', sans-serif; font-weight: 700; width: 32px; height: 32px; 
        border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .8rem;
        transition: var(--tr-fast);
    }
    .name-card:hover .name-number { background: var(--navy); color: var(--gold-light); }
    
    .copy-btn { 
        position: absolute; top: 14px; right: 12px; background: transparent; border: none; 
        color: var(--text-faint); cursor: pointer; font-size: 1rem; transition: var(--tr-fast); z-index: 10; 
        padding: 5px;
    }
    .copy-btn:hover { color: var(--gold-dark); }

    .name-arabic { 
        font-family: 'Scheherazade New', serif; font-size: 2.5rem; color: var(--gold-dark); 
        margin-bottom: 15px; line-height: 1.2; font-weight: 600; 
        text-shadow: 0 4px 10px rgba(201, 168, 76, 0.1);
    }
    .name-transliteration { 
        font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--navy); 
        font-weight: 700; margin-bottom: 8px; line-height: 1.2; transition: var(--tr-fast); 
    }
    .name-card:hover .name-transliteration { color: var(--navy-mid); }
    
    .name-meaning-en { 
        font-family: 'Outfit', sans-serif; color: var(--text-medium); font-size: .9rem; margin: 0; line-height: 1.4; 
    }
    .name-meaning-ur { 
        font-family: 'Scheherazade New', serif; color: var(--text-light); font-size: 1.1rem; 
        margin-top: 8px; margin-bottom: 0; line-height: 1.4; 
    }

    /* Print Styles */
    @media print {
        body * { visibility: hidden; }
        .print-section, .print-section * { visibility: visible; }
        .print-section { position: absolute; left: 0; top: 0; width: 100%; padding: 0 !important; background: white !important; }
        .names-section { padding: 0 !important; background: white !important; }
        .names-grid { display: grid !important; grid-template-columns: repeat(5, 1fr) !important; gap: 8px !important; max-width: 100% !important; padding: 10px !important; }
        .name-card { break-inside: avoid; border: 1px solid #ccc !important; box-shadow: none !important; padding: 8px !important; transform: none !important; min-height: 0 !important; border-radius: 4px !important; }
        .name-card::before { display: none !important; }
        .name-card .copy-btn { display: none !important; }
        .name-number { width: 20px !important; height: 20px !important; font-size: 0.7rem !important; top: 5px !important; left: 5px !important; background: #eee !important; color: #000 !important; }
        .name-arabic { font-size: 1.5rem !important; margin-bottom: 4px !important; margin-top: 5px !important; color: #000 !important; text-shadow: none !important; }
        .name-transliteration { font-size: 0.95rem !important; margin-bottom: 2px !important; color: #000 !important; }
        .name-meaning-en { font-size: 0.75rem !important; margin-bottom: 2px !important; line-height: 1.2 !important; color: #333 !important; }
        .name-meaning-ur { font-size: 0.85rem !important; margin-top: 2px !important; line-height: 1.2 !important; color: #333 !important; }
        .names-hero, .btn-print-hero { display: none !important; }
    }
</style>

<!-- Hero Section -->
<section class="names-hero">
    <div class="hero-content">
        <nav aria-label="breadcrumb" class="hero-breadcrumb">
            <ol>
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li><a href="<?php echo e(url('/knowledge')); ?>">Knowledge Base</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li aria-current="page">99 Names of Allah</li>
            </ol>
        </nav>
        <h1 class="hero-title">99 Names of <span>Allah</span></h1>
        <p class="hero-desc">Explore the beautiful names of Allah (Asma-ul-Husna) with English meanings and transliterations.</p>
        <button onclick="window.print()" class="btn-print-hero">
            <i class="fas fa-print"></i> Print Names
        </button>
    </div>
</section>

<!-- Grid Section -->
<section class="names-section print-section">
    <div class="names-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a href="<?php echo e(route('names_allah.show', $name->slug)); ?>" class="name-card">
            <div class="name-number">
                <?php echo e($name->number); ?>

            </div>
            
            <button class="copy-btn" onclick="event.preventDefault(); copyName('<?php echo e($name->arabic); ?> - <?php echo e($name->transliteration); ?>', this)" title="Copy Name">
                <i class="far fa-copy"></i>
            </button>
            
            <div class="name-arabic">
                <?php echo e($name->arabic); ?>

            </div>
            
            <h3 class="name-transliteration">
                <?php echo e($name->transliteration); ?>

            </h3>
            
            <p class="name-meaning-en">
                <?php echo e($name->meaning_english); ?>

            </p>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->meaning_urdu): ?>
            <p class="name-meaning-ur">
                <?php echo e($name->meaning_urdu); ?>

            </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>

<script>
function copyName(text, btn) {
    // Prevent the link click from triggering
    event.preventDefault();
    event.stopPropagation();

    navigator.clipboard.writeText(text).then(() => {
        const icon = btn.querySelector('i');
        icon.className = 'fas fa-check';
        btn.style.color = 'var(--gold-dark)';
        setTimeout(() => {
            icon.className = 'far fa-copy';
            btn.style.color = '';
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\allah_names\index.blade.php ENDPATH**/ ?>