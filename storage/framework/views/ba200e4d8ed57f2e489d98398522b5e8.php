

<?php $__env->startSection('title', 'Daily Duas & Azkar'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --bg-tinted: #EFF2F7;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
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
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    .duas-section { 
        background: var(--bg-main); 
        padding: 100px 0; 
        position: relative; 
        overflow: hidden; 
    }
    .duas-section::before {
        content: "";
        position: absolute;
        top: 10%; right: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.05), transparent 60%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }
    .duas-section .section-inner { 
        max-width: 1140px; 
        margin: 0 auto; 
        padding: 0 20px; 
        position: relative; 
        z-index: 1; 
    }

    /* Section Header */
    .section-header { text-align: center; margin-bottom: 50px; }
    .section-badge { 
        display: inline-flex; align-items: center; gap: 8px; 
        background: var(--navy-tint); color: var(--navy); 
        padding: 8px 20px; border-radius: var(--radius-full); 
        font-size: .75rem; font-weight: 700; text-transform: uppercase; 
        letter-spacing: 1.5px; margin-bottom: 15px; border: 1px solid var(--border-light); 
    }
    .section-badge i { color: var(--gold); }
    .section-title { 
        font-family: 'Cormorant Garamond', serif; 
        font-size: 3rem; color: var(--navy); 
        margin-bottom: 20px; font-weight: 700; line-height: 1.1; 
    }
    .section-title span { color: var(--gold-dark); font-style: italic; }
    .arabic-divider { display: flex; align-items: center; justify-content: center; gap: 15px; margin: 25px 0; }
    .arabic-divider .line { width: 80px; height: 1px; background: linear-gradient(90deg, transparent, var(--gold), transparent); }
    .arabic-divider .symbol { font-size: 1.8rem; font-family: 'Scheherazade New', serif; color: var(--gold-dark); }
    .section-subtitle { font-size: 1.05rem; color: var(--text-medium); max-width: 600px; margin: 0 auto; line-height: 1.85; }

    /* Search Box */
    .dua-search-wrapper { 
        max-width: 600px; margin: 30px auto 0; position: relative; 
    }
    .dua-search-box { 
        position: relative; width: 100%; 
    }
    .dua-search-box i { 
        position: absolute; left: 25px; top: 50%; transform: translateY(-50%); color: var(--text-light); 
        font-size: 1.1rem; transition: var(--tr-fast); pointer-events: none;
    }
    .dua-search-box input { 
        width: 100%; padding: 15px 25px 15px 55px; border: 1px solid var(--border); 
        border-radius: var(--radius-full); background: var(--white); 
        font-family: 'Outfit', sans-serif; font-size: .95rem; color: var(--text-dark); 
        transition: var(--tr); outline: none; box-shadow: var(--shadow-sm); 
    }
    .dua-search-box input:focus { 
        border-color: var(--gold); box-shadow: 0 0 0 4px rgba(201, 168, 76, 0.1); 
    }
    .dua-search-box input:focus ~ i { color: var(--gold-dark); }
    .dua-search-box input::placeholder { color: var(--text-light); }

    /* Category Pills */
    .category-pills {
        display: flex; gap: 12px; overflow-x: auto; padding: 10px 5px 20px; margin-bottom: 30px;
        scrollbar-width: none;
        justify-content: flex-start;
    }
    .category-pills::-webkit-scrollbar { display: none; }
    .cat-pill {
        white-space: nowrap; padding: 12px 24px; border-radius: var(--radius-full);
        background: var(--white); color: var(--text-medium); font-weight: 600; font-size: .85rem;
        text-decoration: none; border: 1px solid var(--border); transition: var(--tr-fast);
        display: flex; align-items: center; gap: 8px; box-shadow: var(--shadow-xs);
    }
    .cat-pill i { font-size: .75rem; color: var(--gold-dark); }
    .cat-pill:hover { 
        border-color: var(--navy); color: var(--navy); background: var(--bg-tinted); 
    }
    .cat-pill.active {
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); 
        color: var(--white); border-color: transparent; box-shadow: var(--shadow-md); 
    }
    .cat-pill.active i { color: var(--gold-light); }

    /* Loader */
    .dua-loader { 
        display: none; text-align: center; padding: 80px 20px; 
        color: var(--gold); font-size: 2.5rem; 
    }
    .dua-loader i { animation: spin 1s linear infinite; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

    #dua-container { min-height: 400px; }
    
    @media (max-width: 768px) {
        .duas-section { padding: 60px 0; }
        .section-title { font-size: 2.2rem; }
    }
</style>

<section class="section duas-section">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-praying-hands"></i> Hisnul Muslim</div>
            <h1 class="section-title">Daily <span>Duas & Azkar</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Authentic supplications from the Quran and Sunnah. Filter by category or search below.</p>
            
            <div class="dua-search-wrapper">
                <div class="dua-search-box">
                    <input type="text" id="dua-search" placeholder="Search duas by title, arabic, or translation..." autocomplete="off">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>

        <!-- CATEGORY NAVIGATION -->
        <div class="category-pills">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('duas.category', $cat->slug)); ?>" 
                   class="cat-pill <?php echo e(($activeCategory && $activeCategory->id === $cat->id) ? 'active' : ''); ?>"
                   data-slug="<?php echo e($cat->slug); ?>">
                    <i class="fas <?php echo e($cat->icon_class ?? 'fa-book-open'); ?>"></i> <?php echo e($cat->name_english); ?>

                </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <!-- AJAX CONTAINER -->
        <div id="dua-loader" class="dua-loader">
            <i class="fas fa-circle-notch"></i>
        </div>
        
        <div id="dua-container">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeCategory): ?>
                <?php echo $__env->make('pages.duas.partials.dua_list', ['activeCategory' => $activeCategory], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>",
      "url": "<?php echo e(url()->current()); ?>",
      "name": "Daily Duas & Azkar",
      "description": "Authentic daily duas and azkar from Hisnul Muslim."
    }
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pills = document.querySelectorAll('.cat-pill');
    const container = document.getElementById('dua-container');
    const loader = document.getElementById('dua-loader');
    const searchInput = document.getElementById('dua-search');
    let searchTimeout;
    
    // Function to fetch data
    const fetchDuas = (url, query = '') => {
        container.style.display = 'none';
        loader.style.display = 'block';

        const fetchUrl = query ? `${url}?search=${encodeURIComponent(query)}` : url;

        fetch(fetchUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            container.innerHTML = html;
            loader.style.display = 'none';
            container.style.display = 'block';
        })
        .catch(err => {
            console.error(err);
            loader.style.display = 'none';
            container.style.display = 'block';
        });
    };

    // Category click
    pills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            
            pills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            window.history.pushState({}, '', url);
            
            // Clear search when switching categories
            searchInput.value = '';
            fetchDuas(url);
        });
    });

    // Search input
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        searchTimeout = setTimeout(() => {
            // Get active category URL, or default to current URL
            let activePill = document.querySelector('.cat-pill.active');
            let url = activePill ? activePill.getAttribute('href') : window.location.href.split('?')[0];
            
            fetchDuas(url, query);
        }, 300); // 300ms debounce
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\duas\hub.blade.php ENDPATH**/ ?>