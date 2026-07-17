<a href="<?php echo e(route('dreams.show', $symbol->slug)); ?>" style="text-decoration: none; color: inherit;">
    <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #eee; transition: all 0.3s; cursor: pointer; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 24px rgba(26,27,62,0.12)'; this.style.borderColor='#2d1b69';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'; this.style.borderColor='#eee';">

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->dream_type === 1 || $symbol->is_good_dream === 1): ?>
        <span style="position: absolute; top: 12px; right: 12px; background: #e8f5ee; color: #1a6b42; padding: 3px 10px; border-radius: 12px; font-size: 0.75rem;"><i class="fas fa-smile"></i> اچھا</span>
        <?php elseif($symbol->dream_type === 2 || $symbol->is_good_dream === 0): ?>
        <span style="position: absolute; top: 12px; right: 12px; background: #fde8e8; color: #c0392b; padding: 3px 10px; border-radius: 12px; font-size: 0.75rem;"><i class="fas fa-frown"></i> خبردار</span>
        <?php elseif($symbol->dream_type === 3): ?>
        <span style="position: absolute; top: 12px; right: 12px; background: #fcf3cf; color: #e67e22; padding: 3px 10px; border-radius: 12px; font-size: 0.75rem;"><i class="fas fa-exclamation-triangle"></i> تنبیہ</span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div style="text-align: center; margin-bottom: 16px;">
            <span style="font-size: 2.5rem; display: block; margin-bottom: 8px;">
                <?php
                    $icons = ['water-pani' => '💧', 'snake-saanp' => '🐍', 'flying-urna' => '🕊️', 'teeth-falling-dant' => '🦷', 'milk-doodh' => '🥛', 'mosque-masjid' => '🕌', 'quran-pak' => '📖', 'fire-aag' => '🔥', 'rain-barish' => '🌧️', 'lion-sher' => '🦁', 'honey-shehad' => '🍯', 'kaaba-sharif' => '🕋', 'moon-chand' => '🌙', 'sun-suraj' => '☀️', 'dead-person-murda' => '👤', 'horse-ghora' => '🐴', 'sea-samandar' => '🌊', 'seeing-prophet-muhammad' => '✨', 'tree-darakht' => '🌳', 'ring-anguthi' => '💍', 'blood-khoon' => '🩸', 'mountain-pahar' => '⛰️', 'sword-talwar' => '⚔️', 'white-clothes-safed' => '👕', 'cat-billi' => '🐱', 'bird-parinda' => '🐦', 'well-kunwan' => '🪣', 'key-chabi' => '🔑', 'bread-roti' => '🍞'];
                ?>
                <?php echo e($symbol->icon ?? $icons[$symbol->slug] ?? '🔮'); ?>

            </span>
        </div>

        <?php
            $titleDir = getDir($symbol->symbol_roman_urdu);
            $titleAlign = getAlign($symbol->symbol_roman_urdu);
            $shortInterp = $symbol->short_interpretation ?? $symbol->interpretation_urdu;
            $interpDir = getDir($shortInterp);
            $interpAlign = getAlign($shortInterp);
        ?>

        <h3 style="font-size: 1.15rem; font-weight: 600; color: #1a1a3e; text-align: <?php echo e($titleAlign); ?>; direction: <?php echo e($titleDir); ?>; margin-bottom: 4px;"><?php echo e($symbol->symbol_roman_urdu); ?></h3>
        <p style="text-align: <?php echo e($titleAlign); ?>; direction: <?php echo e($titleDir); ?>; font-size: 0.85rem; color: #888; margin-bottom: 12px;"><?php echo e($symbol->symbol_english); ?></p>

        <p style="font-size: 0.9rem; color: #555; direction: <?php echo e($interpDir); ?>; text-align: <?php echo e($interpAlign); ?>; font-family: 'Amiri', serif; line-height: 1.8;">
            <?php echo e(\Illuminate\Support\Str::limit($shortInterp, 100)); ?>

        </p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->scholar_reference): ?>
        <div style="font-size: 0.8rem; color: #999; margin-top: 10px;">
            <i class="fas fa-user-tie"></i> <?php echo e($symbol->scholar_reference); ?>

        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</a>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\dreams\partials\dream_card.blade.php ENDPATH**/ ?>