

<?php $__env->startSection('title', $seoMeta->title ?? 'تعبیر الرؤیا | NoorIslam'); ?>
<?php $__env->startSection('meta_description', $seoMeta->meta_description ?? ''); ?>

<?php $__env->startSection('head'); ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->seo_index == 0): ?>
        <meta name="robots" content="noindex, follow">
        <link rel="canonical" href="<?php echo e($symbol->parent ? url('/khwabon-ki-tabeer/' . $symbol->parent->slug) : url('/khwabon-ki-tabeer')); ?>">
    <?php else: ?>
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="<?php echo e($seoMeta->canonical_url ?? url()->current()); ?>">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">

    <nav style="font-size: 0.85rem; color: #888; margin-bottom: 24px;">
        <a href="<?php echo e(route('home')); ?>" style="color: #1a6b42; text-decoration: none;">Home</a>
        <span style="margin: 0 6px;">/</span>
        <a href="<?php echo e(route('dreams.index')); ?>" style="color: #1a6b42; text-decoration: none;">خوابوں کی تعبیر</a>
        <span style="margin: 0 6px;">/</span>
        <span><?php echo e($symbol->symbol_roman_urdu); ?></span>
    </nav>

    <article style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
        <div style="background: linear-gradient(135deg, #1a1a3e, #2d1b69); padding: 40px; text-align: center; color: #fff;">
            <h1 style="font-size: 2.2rem; margin-bottom: 8px; direction: <?php echo e(getDir($symbol->symbol_roman_urdu)); ?>; text-align: center;">
                <?php echo e($symbol->symbol_roman_urdu); ?>

            </h1>
            <p style="opacity: 0.9; font-size: 1.1rem; margin-bottom: 4px;"><?php echo e($symbol->symbol_english); ?> — Islamic Dream Interpretation</p>
            <p style="opacity: 0.7; font-size: 0.95rem; font-family: 'Amiri', serif; direction: rtl;">
                <?php echo e($symbol->symbol_arabic ? 'عربی: ' . $symbol->symbol_arabic : ''); ?> 
                <?php echo e($symbol->symbol_roman_urdu ? ' | Roman Urdu: ' . $symbol->symbol_roman_urdu : ''); ?>

            </p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->dream_type === 1 || $symbol->is_good_dream === 1): ?>
            <span style="display: inline-block; background: rgba(26,107,66,0.8); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px;">
                <i class="fas fa-smile"></i> اچھا خواب — Good Dream
            </span>
            <?php elseif($symbol->dream_type === 2 || $symbol->is_good_dream === 0): ?>
            <span style="display: inline-block; background: rgba(192,57,43,0.8); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px;">
                <i class="fas fa-frown"></i> خبردار — Bad Dream
            </span>
            <?php elseif($symbol->dream_type === 3): ?>
            <span style="display: inline-block; background: rgba(230,126,34,0.9); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px; color: #fff;">
                <i class="fas fa-exclamation-triangle"></i> تنبیہی خواب — Warning Dream
            </span>
            <?php elseif($symbol->dream_type === 0): ?>
            <span style="display: inline-block; background: rgba(127,140,141,0.8); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px; color: #fff;">
                <i class="fas fa-minus-circle"></i> عام خواب — Neutral Dream
            </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div style="padding: 36px;">
            
            <?php 
                $interpContent = $symbol->detailed_interpretation_urdu ?? $symbol->interpretation_urdu; 
                $interpDir = getDir($interpContent);
                $interpAlign = getAlign($interpContent);
            ?>
            <div style="margin-bottom: 28px;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #2d1b69; margin-bottom: 14px; direction: <?php echo e($interpDir); ?>; text-align: <?php echo e($interpAlign); ?>;">
                    <i class="fas fa-moon"></i> اسلامی تعبیر
                </h2>
                <div style="font-family: 'Amiri', serif; font-size: 1.15rem; line-height: 2.2; color: #333; background: linear-gradient(135deg, #f8f4ff, #f0ecf8); padding: 24px; border-radius: 10px; border-<?php echo e($interpDir === 'ltr' ? 'left' : 'right'); ?>: 4px solid #2d1b69; direction: <?php echo e($interpDir); ?>; text-align: <?php echo e($interpAlign); ?>;">
                    <?php echo $interpContent; ?>

                </div>
            </div>

            
            <?php 
                $positives = json_decode($symbol->positive_meaning, true);
                $negatives = json_decode($symbol->negative_meaning, true);
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($positives) || !empty($negatives)): ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 28px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($positives)): ?>
                <div style="background: #e8f5ee; padding: 20px; border-radius: 10px;">
                    <h3 style="color: #1a6b42; font-family: 'Amiri', serif; font-size: 1.2rem; margin-bottom: 10px; direction: rtl;"><i class="fas fa-check-circle"></i> مثبت پہلو</h3>
                    <ul style="padding: 0 20px; color: #222; font-size: 1rem; line-height: 1.8;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $positives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li style="direction: <?php echo e(getDir($pos)); ?>; text-align: <?php echo e(getAlign($pos)); ?>;"><?php echo e($pos); ?></li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($negatives)): ?>
                <div style="background: #fde8e8; padding: 20px; border-radius: 10px;">
                    <h3 style="color: #c0392b; font-family: 'Amiri', serif; font-size: 1.2rem; margin-bottom: 10px; direction: rtl;"><i class="fas fa-exclamation-circle"></i> منفی پہلو / تنبیہ</h3>
                    <ul style="padding: 0 20px; color: #222; font-size: 1rem; line-height: 1.8;">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $negatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $neg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li style="direction: <?php echo e(getDir($neg)); ?>; text-align: <?php echo e(getAlign($neg)); ?>;"><?php echo e($neg); ?></li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->scholarly_opinions && is_array($symbol->scholarly_opinions) && count($symbol->scholarly_opinions) > 0): ?>
                <div style="margin-bottom: 28px;">
                    <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #2d1b69; margin-bottom: 14px; direction: rtl;">
                        <i class="fas fa-user-graduate"></i> علمائے کرام کی آراء
                    </h2>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $symbol->scholarly_opinions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholar => $opinionText): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php
                        $opText = is_string($opinionText) ? $opinionText : ($opinionText['interpretation_urdu'] ?? '');
                        $opDir = getDir($opText);
                        $opAlign = getAlign($opText);
                        $scholarName = is_string($scholar) ? $scholar : ($opinionText['scholar'] ?? 'عالم');
                    ?>
                    <div style="display: flex; align-items: flex-start; gap: 16px; padding: 20px; background: #fafafa; border-radius: 10px; margin-bottom: 12px; border-<?php echo e($opDir === 'ltr' ? 'left' : 'right'); ?>: 3px solid #c9982e; direction: <?php echo e($opDir); ?>; text-align: <?php echo e($opAlign); ?>;">
                        <i class="fas fa-quote-<?php echo e($opDir === 'ltr' ? 'left' : 'right'); ?>" style="color: #e0e0e0; font-size: 1.8rem; margin-top: 4px;"></i>
                        <div style="width: 100%;">
                            <span style="display: block; font-weight: 700; color: #1a1a3e; margin-bottom: 6px; font-family: 'Amiri', serif; font-size: 1.1rem;"><?php echo e($scholarName); ?></span>
                            <p style="font-family: 'Amiri', serif; font-size: 1.05rem; line-height: 1.8; color: #444; margin-bottom: 4px;"><?php echo e($opText); ?></p>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->quran_reference && isset($symbol->quran_reference['verse'])): ?>
            <div style="background: linear-gradient(135deg, #f8fcf9, #e8f5ee); border-radius: 10px; padding: 20px; margin-bottom: 28px; border: 1px solid #c3e6cb;">
                <h3 style="font-size: 1.1rem; color: #1a6b42; margin-bottom: 12px; direction: rtl; font-family: 'Amiri', serif;">
                    <i class="fas fa-quran"></i> قرآنی حوالہ
                </h3>
                <p style="font-family: 'Amiri', serif; font-size: 1.25rem; color: #333; direction: rtl; line-height: 2.2; text-align: center; margin-bottom: 10px;">
                    <?php echo e($symbol->quran_reference['arabic'] ?? ''); ?>

                </p>
                <p style="font-family: 'Amiri', serif; font-size: 1rem; color: #555; direction: rtl; line-height: 1.9;">
                    <?php echo e($symbol->quran_reference['urdu_translation'] ?? $symbol->quran_reference['verse']); ?>

                </p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->hadith_reference && isset($symbol->hadith_reference['text'])): ?>
            <div style="background: linear-gradient(135deg, #fffbf0, #fff8e8); border-radius: 10px; padding: 20px; margin-bottom: 28px; border: 1px solid #f0e6c8;">
                <h3 style="font-size: 1.1rem; color: #c9982e; margin-bottom: 12px; direction: rtl; font-family: 'Amiri', serif;">
                    <i class="fas fa-star"></i> حدیث کا حوالہ
                </h3>
                <p style="font-family: 'Amiri', serif; font-size: 1rem; color: #555; direction: rtl; line-height: 1.9;">
                    <?php echo e($symbol->hadith_reference['text']); ?>

                </p>
                <p style="font-size: 0.85rem; color: #888; direction: rtl; margin-top: 8px;">( <?php echo e($symbol->hadith_reference['source'] ?? 'حدیث'); ?> )</p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbol->faqs && is_array($symbol->faqs) && count($symbol->faqs) > 0): ?>
            <div style="margin-bottom: 32px; padding-top: 24px; border-top: 1px solid #eee;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #1a1a3e; margin-bottom: 16px; direction: rtl;">عمومی سوالات (FAQs)</h2>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $symbol->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php
                    $faqQ = $faq['question'] ?? '';
                    $faqA = $faq['answer'] ?? '';
                    $qDir = getDir($faqQ);
                    $aDir = getDir($faqA);
                ?>
                <div style="margin-bottom: 16px; background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 16px;">
                    <h3 style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #2d1b69; margin-bottom: 8px; direction: <?php echo e($qDir); ?>; text-align: <?php echo e(getAlign($faqQ)); ?>;">
                        <i class="fas fa-question-circle" style="color: #c9982e; margin-<?php echo e($qDir === 'ltr' ? 'right' : 'left'); ?>: 6px;"></i> <?php echo e($faqQ); ?>

                    </h3>
                    <p style="font-family: 'Amiri', serif; font-size: 0.95rem; line-height: 1.8; color: #555; direction: <?php echo e($aDir); ?>; text-align: <?php echo e(getAlign($faqA)); ?>;"><?php echo e($faqA); ?></p>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <div style="display: flex; gap: 10px; flex-wrap: wrap; padding-top: 20px; border-top: 1px solid #eee;">
                <span style="font-size: 0.9rem; color: #888; display: flex; align-items: center; gap: 6px;"><i class="fas fa-share-alt"></i> شیئر کریں:</span>
                <a href="https://wa.me/?text=<?php echo e(urlencode($symbol->symbol_roman_urdu . ' - ' . url()->current())); ?>" target="_blank" style="background: #25d366; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>" target="_blank" style="background: #1877f2; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-facebook-f"></i> Facebook</a>
            </div>
        </div>
    </article>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->count()): ?>
    <div style="margin-top: 48px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #333; margin-bottom: 20px; direction: rtl;">مزید خوابوں کی تعبیر</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php
                $rDir = getDir($r->symbol_roman_urdu);
                $rAlign = getAlign($r->symbol_roman_urdu);
            ?>
            <a href="<?php echo e(route('dreams.show', $r->slug)); ?>" style="text-decoration: none; background: #fff; border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border: 1px solid #eee; text-align: <?php echo e($rAlign); ?>; direction: <?php echo e($rDir); ?>; transition: all 0.3s;" onmouseover="this.style.borderColor='#2d1b69'" onmouseout="this.style.borderColor='#eee'">
                <span style="font-size: 1.2rem; color: #2d1b69; display: block; margin-bottom: 4px;"><?php echo e($r->symbol_roman_urdu); ?></span>
                <span style="font-size: 0.8rem; color: #888;"><?php echo e($r->symbol_english); ?></span>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($opposite && $opposite->count()): ?>
    <div style="margin-top: 36px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #c0392b; margin-bottom: 20px; direction: rtl;">اس کے برعکس خواب</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $opposite; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php
                $oDir = getDir($o->symbol_roman_urdu);
                $oAlign = getAlign($o->symbol_roman_urdu);
            ?>
            <a href="<?php echo e(route('dreams.show', $o->slug)); ?>" style="text-decoration: none; background: #fff; border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px rgba(192,57,43,0.05); border: 1px solid #fde8e8; text-align: <?php echo e($oAlign); ?>; direction: <?php echo e($oDir); ?>; transition: all 0.3s;" onmouseover="this.style.borderColor='#c0392b'" onmouseout="this.style.borderColor='#fde8e8'">
                <span style="font-size: 1.2rem; color: #c0392b; display: block; margin-bottom: 4px;"><?php echo e($o->symbol_roman_urdu); ?></span>
                <span style="font-size: 0.8rem; color: #888;"><?php echo e($o->symbol_english); ?></span>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($popular->count()): ?>
    <div style="margin-top: 36px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #333; margin-bottom: 16px; direction: rtl;">سب سے زیادہ تلاش کیے گئے</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 8px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('dreams.show', $p->slug)); ?>" style="padding: 6px 16px; background: #f0ecf8; color: #2d1b69; border-radius: 20px; text-decoration: none; font-size: 0.85rem; transition: all 0.2s; direction: <?php echo e(getDir($p->symbol_roman_urdu)); ?>;" onmouseover="this.style.background='#2d1b69'; this.style.color='#fff'" onmouseout="this.style.background='#f0ecf8'; this.style.color='#2d1b69'">
                <?php echo e($p->symbol_roman_urdu); ?>

            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($recent) && $recent->count()): ?>
    <div style="margin-top: 48px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #333; margin-bottom: 20px; direction: rtl;">نئے شامل کیے گئے خواب</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <?php
                $recDir = getDir($rec->symbol_roman_urdu);
                $recAlign = getAlign($rec->symbol_roman_urdu);
            ?>
            <a href="<?php echo e(route('dreams.show', $rec->slug)); ?>" style="text-decoration: none; background: #fff; border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border: 1px solid #eee; text-align: <?php echo e($recAlign); ?>; direction: <?php echo e($recDir); ?>; transition: all 0.3s;" onmouseover="this.style.borderColor='#1a6b42'" onmouseout="this.style.borderColor='#eee'">
                <span style="font-size: 1.2rem; color: #1a6b42; display: block; margin-bottom: 4px;"><?php echo e($rec->symbol_roman_urdu); ?></span>
                <span style="font-size: 0.8rem; color: #888;"><?php echo e($rec->symbol_english); ?></span>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/dreams/show.blade.php ENDPATH**/ ?>