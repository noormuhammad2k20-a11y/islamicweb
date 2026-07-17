<?php $__env->startSection('title', $seoMeta->title); ?>
<?php $__env->startSection('meta_description', $seoMeta->meta_description); ?>

<?php $__env->startSection('content'); ?>
<section style="background: linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #1a1a3e 100%); padding: 50px 0; text-align: center; color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; opacity: 0.08; background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2220%22 fill=%22none%22 stroke=%22%23c9982e%22 stroke-width=%220.5%22/><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22%23c9982e%22 stroke-width=%220.3%22/></svg>'); background-size: 100px;"></div>
    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">
        <span style="font-size: 3rem; display: block; margin-bottom: 12px;"><?php echo e($category->icon ?? '🔮'); ?></span>
        <h1 style="font-family: 'Amiri', serif; font-size: 2.6rem; margin-bottom: 12px; direction: rtl;"><?php echo e($category->name_urdu); ?> کے خواب</h1>
        <p style="font-size: 1.1rem; opacity: 0.9; direction: rtl; font-family: 'Amiri', serif;"><?php echo e($category->description ?? 'اس زمرے سے متعلق خوابوں کی اسلامی تعبیر'); ?></p>
        <p style="font-size: 0.95rem; opacity: 0.7; margin-top: 6px;">Total Dreams: <?php echo e($category->dream_symbols_count); ?></p>

        
        <form action="<?php echo e(url('/khwabon-ki-tabeer/' . $category->slug)); ?>" method="GET" style="margin-top: 24px; display: flex; max-width: 500px; margin-left: auto; margin-right: auto;">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="اس زمرے میں تلاش کریں..." style="flex: 1; padding: 14px 20px; border: none; border-radius: 10px 0 0 10px; font-size: 1rem; direction: rtl; font-family: 'Amiri', serif;">
            <button type="submit" style="padding: 14px 24px; background: #c9982e; color: #fff; border: none; border-radius: 0 10px 10px 0; cursor: pointer; font-size: 1rem;">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</section>

<div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">
    
    
    <nav aria-label="breadcrumb" style="background: #f8f9fa; padding: 12px 20px; border-radius: 8px; font-size: 0.9rem; margin-bottom: 30px; direction: rtl; display: flex; align-items: center; border: 1px solid #eee;">
        <a href="<?php echo e(url('/')); ?>" style="color: #1a6b42; text-decoration: none;">ہوم</a>
        <span style="margin: 0 6px;">/</span>
        <a href="<?php echo e(route('dreams.index')); ?>" style="color: #1a6b42; text-decoration: none;">خوابوں کی تعبیر</a>
        <span style="margin: 0 6px;">/</span>
        <span style="color: #666;"><?php echo e($category->name_english); ?></span>
    </nav>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request()->has('search')): ?>
        
        <h2 style="font-family: 'Amiri', serif; font-size: 1.8rem; color: #1a1a3e; text-align: center; direction: rtl; margin-bottom: 24px;">تلاش کے نتائج: <?php echo e(request('search')); ?></h2>
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbols->count()): ?>
            <div class="dreams-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $symbols; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php echo $__env->make('pages.dreams.partials.dream_card', ['symbol' => $symbol], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
            <div style="margin-top: 32px; display: flex; justify-content: center;">
                <?php echo e($symbols->appends(request()->query())->links('vendor.pagination.custom')); ?>

            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 60px 20px; color: #888;">
                <span style="font-size: 3rem; display: block; margin-bottom: 16px;">🔍</span>
                <p style="font-size: 1.1rem; direction: rtl;">کوئی نتیجہ نہیں ملا۔</p>
                <a href="<?php echo e(url('/khwabon-ki-tabeer/' . $category->slug)); ?>" style="display: inline-block; margin-top: 16px; padding: 10px 24px; background: #1a1a3e; color: #fff; border-radius: 8px; text-decoration: none;">واپس جائیں</a>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php else: ?>
        
        <style>
            .dreams-grid { display: grid; gap: 20px; grid-template-columns: repeat(2, 1fr); }
            @media (min-width: 768px) { .dreams-grid { grid-template-columns: repeat(4, 1fr); } }
            .section-title { font-family: 'Amiri', serif; font-size: 1.8rem; color: #1a1a3e; direction: rtl; margin-bottom: 20px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        </style>

        
        <div style="background: #f8f9fa; padding: 30px; border-radius: 16px; margin-bottom: 40px; text-align: center; border: 1px solid #eee;">
            <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #1a1a3e; direction: rtl; margin-bottom: 16px;">Search by Alphabet</h2>
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px;">
                <?php
                    $alphabets = range('A', 'Z');
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $alphabets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(url('/khwabon-ki-tabeer/' . $category->slug . '?search=' . $letter)); ?>" style="display: inline-block; width: 36px; height: 36px; line-height: 36px; text-align: center; background: #fff; border: 1px solid #ddd; border-radius: 8px; color: #333; text-decoration: none; font-weight: bold;" onmouseover="this.style.background='#1a1a3e'; this.style.color='#fff'; this.style.borderColor='#1a1a3e'" onmouseout="this.style.background='#fff'; this.style.color='#333'; this.style.borderColor='#ddd'">
                    <?php echo e($letter); ?>

                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($popularDreams->count() > 0): ?>
        <div style="margin-bottom: 50px;">
            <h2 class="section-title">🔥 مقبول ترین خواب (Popular)</h2>
            <div class="dreams-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $popularDreams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php echo $__env->make('pages.dreams.partials.dream_card', ['symbol' => $symbol], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($featuredDreams->count() > 0): ?>
        <div style="margin-bottom: 50px;">
            <h2 class="section-title">⭐ نمایاں خواب (Featured)</h2>
            <div class="dreams-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $featuredDreams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php echo $__env->make('pages.dreams.partials.dream_card', ['symbol' => $symbol], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recentDreams->count() > 0): ?>
        <div style="margin-bottom: 50px;">
            <h2 class="section-title">✨ نئے خواب (Recently Added)</h2>
            <div class="dreams-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recentDreams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php echo $__env->make('pages.dreams.partials.dream_card', ['symbol' => $symbol], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div style="margin-bottom: 50px;">
            <h2 class="section-title">📚 تمام خواب (All Dreams)</h2>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($symbols->count()): ?>
                <div class="dreams-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $symbols; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <?php echo $__env->make('pages.dreams.partials.dream_card', ['symbol' => $symbol], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <div style="margin-top: 32px; display: flex; justify-content: center;">
                    <?php echo e($symbols->appends(request()->query())->links('vendor.pagination.custom')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedCategories->count() > 0): ?>
        <div style="margin-bottom: 50px; background: #f8f9fa; padding: 40px; border-radius: 16px;">
            <h2 style="font-family: 'Amiri', serif; font-size: 1.8rem; color: #1a1a3e; text-align: center; direction: rtl; margin-bottom: 24px;">متعلقہ زمرے (Related Categories)</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 16px; direction: rtl;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $relatedCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(url('/khwabon-ki-tabeer/' . $relCat->slug)); ?>" style="background: #fff; padding: 20px 10px; border-radius: 12px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-decoration: none; color: #1a1a3e; transition: all 0.3s; border: 1px solid #eee;" onmouseover="this.style.borderColor='#c9982e'; this.style.transform='translateY(-3px)'" onmouseout="this.style.borderColor='#eee'; this.style.transform='none'">
                    <span style="font-size: 2rem; display: block; margin-bottom: 10px;"><?php echo e($relCat->icon ?? '🔮'); ?></span>
                    <span style="font-size: 1.1rem; font-weight: bold; display: block;"><?php echo e($relCat->name_english); ?></span>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div style="margin-bottom: 30px;">
            <h2 class="section-title">❓ اکثر پوچھے گئے سوالات (FAQs)</h2>
            <div style="direction: rtl; text-align: right; line-height: 1.8;">
                <p><strong>سوال: کیا ہر خواب کی تعبیر سچی ہوتی ہے؟</strong><br>
                جواب: نہیں، خواب کی تین قسمیں ہیں: رحمانی (اللہ کی طرف سے)، شیطانی (شیطان کی طرف سے)، اور نفسانی (دن بھر کے خیالات)۔ صرف رحمانی خوابوں کی تعبیر ہوتی ہے۔</p>
                <p><strong>سوال: اس زمرے کے خوابوں کا کیا مطلب ہے؟</strong><br>
                جواب: ہر خواب کی تعبیر انسان کے حالات، وقت اور خواب کی نوعیت پر منحصر ہوتی ہے۔ مستند تعبیر کے لیے علماء سے رجوع کرنا بہتر ہے۔</p>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\dreams\category.blade.php ENDPATH**/ ?>