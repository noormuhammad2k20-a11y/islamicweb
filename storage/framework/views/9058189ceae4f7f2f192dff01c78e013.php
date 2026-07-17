

<?php $__env->startSection('title', 'Islamic Names Directory'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
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
        --radius-sm: 12px;
        --radius-md: 20px;
        --radius-lg: 28px;
        --radius-full: 9999px;
        --tr: all .35s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .2s cubic-bezier(.25, .46, .45, .94);
    }

    .names-directory-section { background: var(--bg-main); padding: 60px 0 80px; }
    .section-inner { max-width: 1140px; margin: 0 auto; padding: 0 20px; }
    
    /* Breadcrumbs */
    .breadcrumb-nav { margin-bottom: 40px; }
    .breadcrumb { display: flex; flex-wrap: wrap; list-style: none; margin: 0; padding: 0; align-items: center; justify-content: center; font-family: 'Outfit', sans-serif; font-size: .9rem; }
    .breadcrumb-item { display: flex; align-items: center; color: var(--text-light); }
    .breadcrumb-item + .breadcrumb-item::before { content: "\f105"; font-family: "Font Awesome 6 Free"; font-weight: 900; margin: 0 12px; color: var(--text-faint); font-size: .8rem; }
    .breadcrumb-item a { color: var(--navy); text-decoration: none; font-weight: 500; transition: var(--tr-fast); }
    .breadcrumb-item a:hover { color: var(--gold-dark); }
    .breadcrumb-item.active { color: var(--gold-dark); font-weight: 600; }
    .breadcrumb-item a i { margin-right: 6px; font-size: .85rem; }

    /* Header */
    .page-header { text-align: center; margin-bottom: 50px; }
    .page-header h1 { 
        font-family: 'Cormorant Garamond', serif; font-size: 2.8rem; color: var(--navy); 
        font-weight: 700; margin-bottom: 12px; line-height: 1.1; letter-spacing: -.5px; 
    }
    .page-header h1 span { color: var(--gold-dark); font-style: italic; }
    .page-header p { color: var(--text-medium); font-size: 1.05rem; max-width: 600px; margin: 0 auto; line-height: 1.7; }
    .gold-divider { width: 60px; height: 3px; background: var(--gold-gradient); border-radius: 2px; margin: 0 auto 20px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25); }

    /* Filters Container */
    .filters-container {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 28px; margin-bottom: 40px; box-shadow: var(--shadow-sm); position: relative; overflow: hidden;
    }
    .filters-container::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient); }

    .search-row { display: flex; gap: 16px; flex-wrap: wrap; }
    .form-control {
        flex: 1; min-width: 200px; padding: 14px 20px; border: 1px solid var(--border);
        border-radius: var(--radius-sm); font-family: 'Outfit', sans-serif; font-size: .95rem;
        color: var(--text-dark); background: var(--bg-main); transition: var(--tr-fast); outline: none;
    }
    .form-control:focus { border-color: var(--gold); background: var(--white); box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.1); }
    select.form-control {
        appearance: none; cursor: pointer; padding-right: 40px;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238A6E2F' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat; background-position: right 16px center; background-size: 16px;
    }

    .btn-primary {
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--white);
        padding: 14px 32px; border-radius: var(--radius-sm); border: none; font-family: 'Outfit', sans-serif;
        font-size: .9rem; font-weight: 600; cursor: pointer; transition: var(--tr); display: inline-flex; align-items: center; gap: 8px; box-shadow: var(--shadow-sm);
    }
    .btn-primary:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }

    .quick-links { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--border-light); align-items: center; }
    .quick-links span { color: var(--text-light); font-size: .85rem; font-weight: 600; text-transform: uppercase; letter-spacing: .5px; margin-right: 5px; }
    .quick-link {
        padding: 8px 16px; border-radius: var(--radius-full); font-family: 'Outfit', sans-serif; font-size: .85rem;
        font-weight: 600; text-decoration: none; color: var(--navy); background: var(--bg-main);
        border: 1px solid var(--border-light); transition: var(--tr-fast); display: inline-flex; align-items: center; gap: 6px;
    }
    .quick-link:hover { background: var(--navy); color: var(--white) !important; border-color: var(--navy); }
    .quick-link i { color: var(--gold-dark); }
    .quick-link:hover i { color: var(--gold-light); }
    
    .alphabet-nav { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 20px; }
    .alpha-link {
        display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px;
        border-radius: var(--radius-sm); font-family: 'Outfit', sans-serif; font-size: .85rem; font-weight: 700;
        text-decoration: none; color: var(--navy); background: var(--white); border: 1px solid var(--border-light); transition: var(--tr-fast);
    }
    .alpha-link:hover { border-color: var(--navy); background: var(--navy-tint); }
    .alpha-link.active { background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--white); border-color: transparent; box-shadow: var(--shadow-sm); }

    /* Directory Header */
    .directory-header { margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-light); padding-bottom: 15px; }
    .directory-header h2 { font-family: 'Cormorant Garamond', serif; color: var(--navy); font-size: 1.8rem; font-weight: 700; margin: 0; }
    .directory-header span { color: var(--text-light); font-family: 'Outfit', sans-serif; font-size: .85rem; font-weight: 500; background: var(--bg-main); padding: 6px 12px; border-radius: 20px; }

    /* Names Grid */
    .names-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
    @media (max-width: 1024px) { .names-grid { grid-template-columns: repeat(3, 1fr); gap: 20px; } }
    @media (max-width: 768px) { .names-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; } }
    
    .name-card-wrapper { position: relative; height: 100%; }
    .name-card {
        background: var(--white); border: 1px solid var(--border-light); border-radius: var(--radius-md);
        padding: 25px; text-decoration: none; display: flex; flex-direction: column; position: relative;
        transition: var(--tr); height: 100%; box-shadow: var(--shadow-xs); overflow: hidden;
    }
    .name-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr); }
    /* Subtle Hover */
    .name-card:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); transform: translateY(-3px); }
    .name-card:hover::before { transform: scaleX(1); }

    .card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; gap: 10px; }
    .name-en {
        font-family: 'Cormorant Garamond', serif; color: var(--navy); font-size: 1.5rem; font-weight: 700;
        margin: 0; letter-spacing: -.02em; line-height: 1.2; transition: var(--tr-fast);
    }
    .name-card:hover .name-en { color: var(--navy-mid); }
    .name-ar {
        font-family: 'Scheherazade New', serif; font-size: 1.8rem; color: var(--gold-dark); font-weight: 700; line-height: 1;
    }
    .name-meaning {
        font-family: 'Outfit', sans-serif; color: var(--text-medium); font-size: .9rem; line-height: 1.5;
        margin: 0 0 20px 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; flex: 1;
    }

    .card-footer { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; margin-top: auto; }
    .tag {
        display: inline-flex; align-items: center; padding: 5px 10px; border-radius: var(--radius-sm);
        font-family: 'Outfit', sans-serif; font-size: .7rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px;
        background: var(--bg-main); color: var(--text-medium); border: 1px solid var(--border-light);
    }
    .tag i { margin-right: 4px; font-size: .65rem; }
    .tag.male { color: var(--navy); background: var(--navy-tint); border-color: var(--border); }
    .tag.female { color: var(--gold-dark); background: var(--gold-tint); border-color: rgba(201, 168, 76, 0.15); }
    .tag.quranic { color: var(--emerald); background: var(--emerald-tint); border-color: rgba(13, 124, 95, 0.15); }
    .tag.sahabah { color: var(--navy-light); background: #e0f2fe; border-color: #bae6fd; }

    .name-card-wrapper:hover .copy-btn, .copy-btn:focus { opacity: 1; }
    .copy-btn {
        position: absolute; bottom: 20px; right: 20px; background: var(--white); border: 1px solid var(--border);
        color: var(--text-light); width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center;
        justify-content: center; cursor: pointer; transition: var(--tr-fast); opacity: 0; z-index: 10;
    }
    .copy-btn:hover { background: var(--navy); color: var(--white); border-color: var(--navy); }

    /* Empty State */
    .empty-state { grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: var(--white); border-radius: var(--radius-md); border: 1px dashed var(--border); }
    .empty-state i { font-size: 2.5rem; margin-bottom: 16px; color: var(--text-faint); }
    .empty-state h3 { color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; margin-bottom: 8px; }
    .empty-state p { color: var(--text-light); font-size: .95rem; margin: 0; }

    /* Pagination Theme Styling */
    nav[role="navigation"] { display: flex; flex-direction: column; gap: 20px; margin-top: 50px; align-items: center; }
    nav[role="navigation"] > div:first-child { display: none; }
    nav[role="navigation"] > div:last-child { display: flex; flex-direction: column; align-items: center; width: 100%; gap: 16px; }
    @media (min-width: 640px) { nav[role="navigation"] > div:last-child { flex-direction: row; justify-content: space-between; } }
    nav[role="navigation"] p { color: var(--text-medium); margin: 0; font-family: 'Outfit', sans-serif; font-size: .9rem; }
    nav[role="navigation"] p span { font-weight: 700; color: var(--navy); }
    nav[role="navigation"] .inline-flex {
        display: inline-flex; background: var(--white); border: 1px solid var(--border-light);
        border-radius: var(--radius-full); overflow: hidden; box-shadow: var(--shadow-sm);
    }
    nav[role="navigation"] a, nav[role="navigation"] span[aria-current], nav[role="navigation"] span[aria-disabled] {
        display: inline-flex; align-items: center; justify-content: center; min-width: 40px; height: 40px; padding: 0 12px;
        font-family: 'Outfit', sans-serif; font-size: .9rem; font-weight: 600; color: var(--navy); text-decoration: none;
        border-right: 1px solid var(--border-light); background: var(--white); transition: var(--tr-fast); cursor: pointer;
    }
    nav[role="navigation"] a:hover { background: var(--bg-main); color: var(--gold-dark); }
    nav[role="navigation"] span[aria-current="page"] { background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--white); border-color: transparent; }
    nav[role="navigation"] span[aria-disabled="true"] { color: var(--text-faint); background: var(--bg-main); cursor: not-allowed; }
    nav[role="navigation"] .inline-flex > *:last-child { border-right: none; }
    nav[role="navigation"] svg { width: 18px; height: 18px; }
</style>

<section class="names-directory-section">
    <div class="section-inner">
        
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a></li>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($gender) || request('filter') || request('letter') || request('q')): ?>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('names.index')); ?>">Islamic Names</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(request('q')): ?>
                            Search Results
                        <?php elseif(isset($gender)): ?>
                            <?php echo e(ucfirst($gender)); ?> Names
                        <?php elseif(request('filter') == 'sahabah'): ?>
                            Sahabah Names
                        <?php elseif(request('filter') == 'quranic'): ?>
                            Quranic Names
                        <?php elseif(request('filter') == 'prophets'): ?>
                            Prophets Names
                        <?php elseif(request('letter')): ?>
                            Names Starting With <?php echo e(strtoupper(request('letter'))); ?>

                        <?php else: ?>
                            Directory
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </li>
                <?php else: ?>
                    <li class="breadcrumb-item active" aria-current="page">Islamic Names</li>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ol>
        </nav>

        <div class="page-header">
            <div class="gold-divider"></div>
            <h1>Islamic Names <span>Directory</span></h1>
            <p>Discover beautiful and meaningful names from Islamic history with authentic origins and translations.</p>
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
                <span>Quick Filters:</span>
                <a href="<?php echo e(route('names.gender', 'boys')); ?>" class="quick-link"><i class="fas fa-male"></i> Boys</a>
                <a href="<?php echo e(route('names.gender', 'girls')); ?>" class="quick-link"><i class="fas fa-female"></i> Girls</a>
                <a href="<?php echo e(route('names.index', ['filter' => 'quranic'])); ?>" class="quick-link"><i class="fas fa-book-quran"></i> Quranic</a>
                <a href="<?php echo e(route('names.index', ['filter' => 'sahabah'])); ?>" class="quick-link"><i class="fas fa-users"></i> Sahabah</a>
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
            <div class="directory-header">
                <h2>
                    <?php echo e(isset($gender) ? ucfirst($gender) . ' Names' : (request('search') ? 'Search Results' : 'Directory Listings')); ?>

                </h2>
                <span>
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
                                <span class="tag quranic" title="Quranic Name"><i class="fas fa-book-quran"></i> Quranic</span>
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
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h3>No names found</h3>
                    <p>Try adjusting your search criteria or clearing filters.</p>
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
        btn.style.background = 'var(--navy)';
        btn.style.color = 'var(--gold-light)';
        btn.style.borderColor = 'var(--navy)';
        setTimeout(() => {
            icon.className = 'far fa-copy';
            btn.style.background = '';
            btn.style.color = '';
            btn.style.borderColor = '';
        }, 2000);
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\names\hub.blade.php ENDPATH**/ ?>