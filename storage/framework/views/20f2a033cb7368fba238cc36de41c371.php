

<?php $__env->startSection('title', 'Islamic Names Directory'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Professional Minimalist Design */
    :root {
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-600: #4b5563;
        --gray-800: #1f2937;
        --brand-light: #e0f2fe;
        --brand: #145DA0;
    }
    
    .filters-container {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 40px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    }

    .search-row {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .form-control {
        flex: 1;
        min-width: 200px;
        padding: 14px 20px;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        font-size: 1rem;
        color: var(--gray-800);
        background: var(--gray-50);
        transition: all 0.2s;
    }
    .form-control:focus {
        outline: none;
        border-color: var(--brand);
        background: white;
        box-shadow: 0 0 0 3px var(--brand-light);
    }
    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%234b5563' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
        padding-right: 40px;
    }

    .btn-primary {
        background: var(--brand);
        color: white;
        padding: 14px 32px;
        border-radius: 8px;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-primary:hover {
        background: #0d467c;
    }

    .quick-links {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--gray-100);
    }
    .quick-link {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        color: var(--gray-600);
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .quick-link:hover {
        background: var(--gray-100);
        color: var(--gray-800);
        border-color: var(--gray-300);
    }
    
    .alphabet-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-top: 20px;
    }
    .alpha-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        color: var(--gray-600);
        background: white;
        border: 1px solid var(--gray-200);
        transition: all 0.2s;
    }
    .alpha-link:hover {
        border-color: var(--gray-300);
        background: var(--gray-50);
    }
    .alpha-link.active {
        background: var(--brand);
        color: white;
        border-color: var(--brand);
    }

    .names-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 20px;
    }

    .name-card {
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        padding: 20px;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        position: relative;
        transition: border-color 0.2s, box-shadow 0.2s;
        height: 100%;
    }
    .name-card:hover {
        border-color: var(--gray-300);
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
    }
    .name-en {
        color: var(--gray-800);
        font-size: 1.25rem;
        font-weight: 600;
        margin: 0;
        letter-spacing: -0.01em;
    }
    .name-ar {
        font-family: 'Amiri', serif;
        font-size: 1.6rem;
        color: var(--brand);
        font-weight: bold;
        line-height: 1;
    }
    .name-meaning {
        color: var(--gray-600);
        font-size: 0.9rem;
        line-height: 1.5;
        margin: 0 0 16px 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex: 1;
    }

    .card-footer {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: auto;
    }

    .tag {
        display: inline-flex;
        align-items: center;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
        background: var(--gray-50);
        color: var(--gray-600);
        border: 1px solid var(--gray-200);
    }
    .tag i { margin-right: 4px; font-size: 0.7rem; }
    
    .tag.male { color: #0369a1; background: #f0f9ff; border-color: #e0f2fe; }
    .tag.female { color: #be185d; background: #fdf2f8; border-color: #fce7f3; }
    .tag.quranic { color: #15803d; background: #f0fdf4; border-color: #dcfce7; }
    .tag.sahabah { color: #6d28d9; background: #f5f3ff; border-color: #ede9fe; }

    .name-card-wrapper {
        position: relative;
        height: 100%;
    }
    .name-card-wrapper:hover .copy-btn, .copy-btn:focus {
        opacity: 1;
    }
    .copy-btn {
        position: absolute;
        bottom: 16px;
        right: 16px;
        background: white;
        border: 1px solid var(--gray-200);
        color: var(--gray-600);
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        opacity: 0;
        z-index: 10;
    }
    .copy-btn:hover {
        background: var(--gray-50);
        color: var(--brand);
        border-color: var(--gray-300);
    }
    
    /* Pagination Theme Styling */
    nav[role="navigation"] {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 20px;
        align-items: center;
    }
    
    /* Hide the mobile simple pagination block */
    nav[role="navigation"] > div:first-child {
        display: none;
    }
    
    /* Desktop pagination block */
    nav[role="navigation"] > div:last-child {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        gap: 16px;
    }
    @media (min-width: 640px) {
        nav[role="navigation"] > div:last-child {
            flex-direction: row;
            justify-content: space-between;
        }
    }
    
    /* Results Text */
    nav[role="navigation"] p {
        color: var(--gray-600);
        margin: 0;
        font-size: 0.95rem;
    }
    nav[role="navigation"] p span {
        font-weight: 600;
        color: var(--gray-800);
    }
    
    /* Pagination Links Container */
    nav[role="navigation"] .inline-flex {
        display: inline-flex;
        background: white;
        border: 1px solid var(--gray-200);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    
    /* Individual Links */
    nav[role="navigation"] a, 
    nav[role="navigation"] span[aria-current], 
    nav[role="navigation"] span[aria-disabled] {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 12px;
        font-size: 0.95rem;
        font-weight: 500;
        color: var(--gray-600);
        text-decoration: none;
        border-right: 1px solid var(--gray-200);
        background: white;
        transition: all 0.2s;
        cursor: pointer;
    }
    
    nav[role="navigation"] a:hover {
        background: var(--gray-50);
        color: var(--brand);
    }
    
    /* Active Page */
    nav[role="navigation"] span[aria-current="page"] {
        background: var(--brand);
        color: white;
        border-color: var(--brand);
        position: relative;
        z-index: 1;
    }
    
    /* Disabled State */
    nav[role="navigation"] span[aria-disabled="true"] {
        color: var(--gray-300);
        background: var(--gray-50);
        cursor: not-allowed;
    }
    
    /* Remove last border */
    nav[role="navigation"] .inline-flex > *:last-child {
        border-right: none;
    }
    
    nav[role="navigation"] svg {
        width: 18px;
        height: 18px;
    }
</style>

<section class="section" style="padding-top: 60px; padding-bottom: 80px; background: #fcfcfc;">
    <div class="section-inner">
        
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 2.5rem; color: var(--gray-800); font-weight: 700; margin-bottom: 12px; letter-spacing: -0.02em;">Islamic Names Directory</h1>
            <p style="color: var(--gray-600); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">Discover beautiful and meaningful names from Islamic history with authentic origins and translations.</p>
        </div>

        <div class="filters-container">
            <form action="<?php echo e(route('names.index')); ?>" method="GET" class="search-row">
                <input type="text" name="q" class="form-control" placeholder="Search names or meanings..." value="<?php echo e(request('q')); ?>">
                
                <select name="gender" class="form-control" style="flex: 0 1 180px;">
                    <option value="">Any Gender</option>
                    <option value="male" <?php echo e((isset($gender) && $gender == 'male') || request('gender') == 'male' ? 'selected' : ''); ?>>Boys</option>
                    <option value="female" <?php echo e((isset($gender) && $gender == 'female') || request('gender') == 'female' ? 'selected' : ''); ?>>Girls</option>
                </select>
                
                <select name="filter" class="form-control" style="flex: 0 1 200px;">
                    <option value="">All Categories</option>
                    <option value="quranic" <?php echo e(request('filter') == 'quranic' ? 'selected' : ''); ?>>Quranic Names</option>
                    <option value="sahabah" <?php echo e(request('filter') == 'sahabah' ? 'selected' : ''); ?>>Sahabah / Companions</option>
                    <option value="prophets" <?php echo e(request('filter') == 'prophets' ? 'selected' : ''); ?>>Prophets</option>
                </select>
                
                <select name="sort" class="form-control" style="flex: 0 1 180px;">
                    <option value="name_asc" <?php echo e(request('sort') == 'name_asc' ? 'selected' : ''); ?>>A to Z</option>
                    <option value="name_desc" <?php echo e(request('sort') == 'name_desc' ? 'selected' : ''); ?>>Z to A</option>
                    <option value="popular" <?php echo e(request('sort') == 'popular' ? 'selected' : ''); ?>>Popular</option>
                </select>

                <button type="submit" class="btn-primary"><i class="fas fa-search"></i> Search</button>
            </form>
            
            <div class="quick-links">
                <span style="color: var(--gray-600); font-size: 0.9rem; font-weight: 500; display: flex; align-items: center;">Quick Filters:</span>
                <a href="<?php echo e(route('names.gender', 'boys')); ?>" class="quick-link"><i class="fas fa-male" style="color: #0369a1;"></i> Boys</a>
                <a href="<?php echo e(route('names.gender', 'girls')); ?>" class="quick-link"><i class="fas fa-female" style="color: #be185d;"></i> Girls</a>
                <a href="<?php echo e(route('names.index', ['filter' => 'quranic'])); ?>" class="quick-link"><i class="fas fa-quran" style="color: #15803d;"></i> Quranic</a>
                <a href="<?php echo e(route('names.index', ['filter' => 'sahabah'])); ?>" class="quick-link"><i class="fas fa-users" style="color: #6d28d9;"></i> Sahabah</a>
            </div>

            <div class="alphabet-nav">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = range('A', 'Z'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $char): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('names.index', ['letter' => $char, 'gender' => request('gender')])); ?>" 
                       class="alpha-link <?php echo e(request('letter') == $char ? 'active' : ''); ?>">
                       <?php echo e($char); ?>

                    </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        <div>
            <div style="margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--gray-200); padding-bottom: 12px;">
                <h2 style="color: var(--gray-800); font-size: 1.25rem; font-weight: 600; margin: 0;">
                    <?php echo e(isset($gender) ? ucfirst($gender) . ' Names' : (request('search') ? 'Search Results' : 'Directory Listings')); ?>

                </h2>
                <span style="color: var(--gray-600); font-size: 0.9rem;">
                    <?php $collection = isset($names) ? $names : $popularNames; ?>
                    Showing <?php echo e($collection->count()); ?> results
                </span>
            </div>
            
            <div class="names-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div class="name-card-wrapper">
                    <a href="<?php echo e(route('names.show', $name->slug)); ?>" class="name-card">
                        <div class="card-header">
                            <h3 class="name-en" title="<?php echo e($name->name_english); ?>"><?php echo e(\Illuminate\Support\Str::limit($name->name_english, 18)); ?></h3>
                            <span class="name-ar" dir="rtl"><?php echo e($name->name_arabic); ?></span>
                        </div>
                        <p class="name-meaning"><?php echo e($name->translation_urdu); ?></p>
                        
                        <div class="card-footer">
                            <span class="tag <?php echo e($name->gender); ?>" title="<?php echo e(ucfirst($name->gender)); ?>">
                                <i class="fas <?php echo e($name->gender == 'male' ? 'fa-male' : 'fa-female'); ?>"></i> <?php echo e(ucfirst($name->gender)); ?>

                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->is_quranic): ?>
                                <span class="tag quranic" title="Quranic Name"><i class="fas fa-quran"></i> Quranic</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($name->is_sahabi || $name->is_sahabiyah): ?>
                                <span class="tag sahabah" title="Sahabah"><i class="fas fa-users"></i> Sahabi</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </a>
                    <button class="copy-btn" onclick="copyName('<?php echo e(addslashes($name->name_english)); ?>', this)" title="Copy Name">
                        <i class="far fa-copy"></i>
                    </button>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px; background: white; border-radius: 12px; border: 1px solid var(--gray-200);">
                    <i class="fas fa-search" style="font-size: 2.5rem; margin-bottom: 16px; color: var(--gray-300);"></i>
                    <h3 style="color: var(--gray-600); font-size: 1.1rem; font-weight: 500; margin-bottom: 8px;">No names found</h3>
                    <p style="color: var(--gray-500); font-size: 0.95rem; margin: 0;">Try adjusting your search criteria or clearing filters.</p>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($names) && method_exists($names, 'links')): ?>
                <div style="margin-top: 50px;">
                    <?php echo e($names->links()); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<script>
function copyName(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const icon = btn.querySelector('i');
        icon.className = 'fas fa-check';
        btn.style.background = '#28a745';
        btn.style.color = 'white';
        setTimeout(() => {
            icon.className = 'far fa-copy';
            btn.style.background = '';
            btn.style.color = '';
        }, 2000);
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/names/hub.blade.php ENDPATH**/ ?>