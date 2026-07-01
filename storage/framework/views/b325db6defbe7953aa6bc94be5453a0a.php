<?php $__env->startSection('title', '99 Names of Allah (Asma ul Husna)'); ?>

<?php $__env->startSection('content'); ?>
<style>
/* Screen styles */
@media screen {
    .names-grid { 
        display: grid; 
        grid-template-columns: repeat(5, 1fr); 
        gap: 25px; 
    }
    @media (max-width: 1200px) {
        .names-grid { grid-template-columns: repeat(4, 1fr); }
    }
    @media (max-width: 992px) {
        .names-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 768px) {
        .names-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .name-card { padding: 20px 15px !important; }
        .name-arabic { font-size: 2rem !important; }
        .name-transliteration { font-size: 1.1rem !important; }
        .name-meaning-en { font-size: 0.9rem !important; }
    }
}

/* Print styles */
@media print {
    body * { visibility: hidden; }
    .print-section, .print-section * { visibility: visible; }
    .print-section { position: absolute; left: 0; top: 0; width: 100%; padding: 0 !important; }
    .names-grid { display: grid !important; grid-template-columns: repeat(5, 1fr) !important; gap: 8px !important; }
    .name-card { break-inside: avoid; border: 1px solid #ccc !important; box-shadow: none !important; padding: 8px !important; transform: none !important; min-height: 0 !important; }
    .name-card .copy-btn { display: none !important; }
    .name-number { width: 20px !important; height: 20px !important; font-size: 0.7rem !important; top: 5px !important; left: 5px !important; }
    .name-arabic { font-size: 1.5rem !important; margin-bottom: 4px !important; margin-top: 5px !important; }
    .name-transliteration { font-size: 0.95rem !important; margin-bottom: 2px !important; }
    .name-meaning-en { font-size: 0.75rem !important; margin-bottom: 2px !important; line-height: 1.2 !important; }
    .name-meaning-ur { font-size: 0.85rem !important; margin-top: 2px !important; line-height: 1.2 !important; }
}
</style>

<div class="page-header" style="background: var(--primary); color: white; padding: 40px 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 10px;">99 Names of Allah</h1>
        <p style="opacity: 0.8; margin-bottom: 20px;">Explore the beautiful names of Allah (Asma-ul-Husna) with English meanings and transliterations.</p>
        <button onclick="window.print()" class="btn-primary" style="background: white; color: var(--primary); border: 2px solid white; padding: 8px 20px; border-radius: 20px; font-weight: 600;">
            <i class="fas fa-print"></i> Print Names
        </button>
    </div>
</div>

<div class="container print-section" style="padding: 60px 20px;">
    <h2 style="text-align: center; display: none; margin-bottom: 15px; font-size: 1.5rem;" class="d-print-block">99 Names of Allah</h2>
    <div class="names-grid">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <a href="<?php echo e(route('names_allah.show', $name->slug)); ?>" class="name-card" style="background: var(--white); border: 1px solid rgba(17, 70, 121, 0.1); border-radius: 12px; padding: 30px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.03); transition: transform 0.3s ease, box-shadow 0.3s ease; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; text-decoration: none;">
            <div class="name-number" style="position: absolute; top: 15px; left: 15px; background: var(--secondary-light); color: var(--primary); font-weight: 700; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.9rem;">
                <?php echo e($name->number); ?>

            </div>
            
            <button class="copy-btn" onclick="event.preventDefault(); copyName('<?php echo e($name->arabic); ?> - <?php echo e($name->transliteration); ?>', this)" title="Copy Name" style="position: absolute; top: 15px; right: 15px; background: none; border: none; color: var(--text-light); cursor: pointer; font-size: 1.2rem; transition: color 0.2s; z-index: 10;">
                <i class="far fa-copy"></i>
            </button>
            
            <div class="name-arabic" style="font-size: 2.5rem; color: var(--gold); font-family: 'Amiri', serif; margin-bottom: 15px; line-height: 1.2;">
                <?php echo e($name->arabic); ?>

            </div>
            
            <h3 class="name-transliteration" style="font-size: 1.4rem; color: var(--primary); font-weight: 700; margin-bottom: 10px;">
                <?php echo e($name->transliteration); ?>

            </h3>
            
            <p class="name-meaning-en" style="color: var(--text-dark); font-size: 1rem; margin-bottom: 0;">
                <?php echo e($name->meaning_english); ?>

            </p>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->meaning_urdu): ?>
            <p class="name-meaning-ur" style="color: var(--text-light); font-size: 1.1rem; font-family: 'Jameel Noori Nastaleeq', 'Noto Naskh Arabic', serif; margin-top: 10px; margin-bottom: 0;">
                <?php echo e($name->meaning_urdu); ?>

            </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</div>

<script>
function copyName(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const icon = btn.querySelector('i');
        icon.className = 'fas fa-check';
        btn.style.color = '#28a745';
        setTimeout(() => {
            icon.className = 'far fa-copy';
            btn.style.color = 'var(--text-light)';
        }, 2000);
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/allah_names/index.blade.php ENDPATH**/ ?>