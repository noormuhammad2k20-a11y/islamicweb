<div class="surah-stat-pills" style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 25px;">
    <div class="surah-stat-pill" style="display: flex; align-items: center; background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 10px 15px; flex: 1; min-width: 140px; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
        <i class="fas fa-list-ol" style="color: var(--primary); font-size: 1.5rem; margin-right: 15px;"></i>
        <div style="display: flex; flex-direction: column;">
            <span class="pill-value" style="font-weight: 700; font-size: 1.1rem; color: #333;"><?php echo e($surah->total_ayahs); ?></span>
            <span class="pill-label" style="font-size: 0.8rem; color: #777; text-transform: uppercase; letter-spacing: 0.5px;">Ayahs</span>
        </div>
    </div>
    <div class="surah-stat-pill" style="display: flex; align-items: center; background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 10px 15px; flex: 1; min-width: 140px; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
        <i class="fas fa-bookmark" style="color: var(--primary); font-size: 1.5rem; margin-right: 15px;"></i>
        <div style="display: flex; flex-direction: column;">
                <span class="pill-value" style="font-weight: 700; font-size: 1.1rem; color: var(--primary);"><?php echo e($surah->juz_start); ?></span>
            <span class="pill-label" style="font-size: 0.8rem; color: #777; text-transform: uppercase; letter-spacing: 0.5px;">Juz / Para</span>
        </div>
    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->total_rukus): ?>
    <div class="surah-stat-pill" style="display: flex; align-items: center; background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 10px 15px; flex: 1; min-width: 140px; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
        <i class="fas fa-layer-group" style="color: var(--primary); font-size: 1.5rem; margin-right: 15px;"></i>
        <div style="display: flex; flex-direction: column;">
            <span class="pill-value" style="font-weight: 700; font-size: 1.1rem; color: #333;"><?php echo e($surah->total_rukus); ?></span>
            <span class="pill-label" style="font-size: 0.8rem; color: #777; text-transform: uppercase; letter-spacing: 0.5px;">Rukus</span>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <div class="surah-stat-pill" style="display: flex; align-items: center; background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 10px 15px; flex: 1; min-width: 140px; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
        <i class="fas <?php echo e(($surah->revelation_type == 'Madani' || $surah->revelation_type == 'Medinan') ? 'fa-mosque' : 'fa-kaaba'); ?>" style="color: var(--primary); font-size: 1.5rem; margin-right: 15px;"></i>
        <div style="display: flex; flex-direction: column;">
            <span class="pill-value" style="font-weight: 700; font-size: 1.1rem; color: #333;"><?php echo e($surah->revelation_type); ?></span>
            <span class="pill-label" style="font-size: 0.8rem; color: #777; text-transform: uppercase; letter-spacing: 0.5px;">Revealed In</span>
        </div>
    </div>
</div><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/partials/_quick-facts.blade.php ENDPATH**/ ?>