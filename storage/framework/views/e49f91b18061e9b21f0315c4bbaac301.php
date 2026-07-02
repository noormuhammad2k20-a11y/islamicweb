

<?php $__env->startSection('title', 'All 114 Surahs of the Holy Quran — Read Online | Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Browse all 114 Surahs of the Holy Quran. Read Surah Al-Fatihah to Surah An-Nas with Arabic text, Urdu & English translation, audio recitation, and PDF download.'); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">

        
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a>
                <span style="color: #ccc; margin: 0 10px;">/</span>
                <a href="<?php echo e(route('quran.index')); ?>" style="color: var(--primary); text-decoration: none;">Quran</a>
                <span style="color: #ccc; margin: 0 10px;">/</span>
                <span style="color: #666; font-weight: 600;">All Surahs</span>
            </div>
        </div>

        
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-quran"></i> Holy Quran</div>
            <h1 class="section-title">All 114 <span>Surahs</span> of the Quran</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Browse the complete Holy Quran — Read every Surah with Arabic text, Urdu & English translation, audio, and more.</p>
        </div>

        
        <div class="surah-search-bar">
            <div class="surah-search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="surahSearchInput" placeholder="Search by Surah name or number..." value="<?php echo e(request('search')); ?>" autocomplete="off">
            </div>
            <div class="surah-filter-chips">
                <button class="surah-filter-chip <?php echo e(!request('filter') ? 'active' : ''); ?>" data-filter="all">
                    <i class="fas fa-quran"></i> All (114)
                </button>
                <button class="surah-filter-chip <?php echo e(request('filter') == 'Makki' ? 'active' : ''); ?>" data-filter="Makki">
                    <i class="fas fa-kaaba"></i> Makki
                </button>
                <button class="surah-filter-chip <?php echo e(request('filter') == 'Madani' ? 'active' : ''); ?>" data-filter="Madani">
                    <i class="fas fa-mosque"></i> Madani
                </button>
            </div>
        </div>

        
        <div class="surah-stats-row">
            <div class="surah-stat-item">
                <div class="surah-stat-icon"><i class="fas fa-book-quran"></i></div>
                <div class="surah-stat-info">
                    <span class="surah-stat-number">114</span>
                    <span class="surah-stat-label">Total Surahs</span>
                </div>
            </div>
            <div class="surah-stat-item">
                <div class="surah-stat-icon"><i class="fas fa-list-ol"></i></div>
                <div class="surah-stat-info">
                    <span class="surah-stat-number">6,236</span>
                    <span class="surah-stat-label">Total Ayahs</span>
                </div>
            </div>
            <div class="surah-stat-item">
                <div class="surah-stat-icon"><i class="fas fa-bookmark"></i></div>
                <div class="surah-stat-info">
                    <span class="surah-stat-number">30</span>
                    <span class="surah-stat-label">Juz (Paras)</span>
                </div>
            </div>
            <div class="surah-stat-item">
                <div class="surah-stat-icon"><i class="fas fa-scroll"></i></div>
                <div class="surah-stat-info">
                    <span class="surah-stat-number">558</span>
                    <span class="surah-stat-label">Total Rukus</span>
                </div>
            </div>
        </div>

        
        <div class="surah-index-grid" id="surahGrid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $surahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route('surah.show', $surah->slug)); ?>" class="surah-card" data-name="<?php echo e(strtolower($surah->name_en)); ?>" data-number="<?php echo e($surah->number); ?>" data-place="<?php echo e($surah->revelation_place); ?>">
                <div class="surah-card-number">
                    <span><?php echo e($surah->number); ?></span>
                </div>
                <div class="surah-card-body">
                    <div class="surah-card-names">
                        <h3 class="surah-card-en"><?php echo e($surah->name_en); ?></h3>
                        <span class="surah-card-ur"><?php echo e($surah->name_ur); ?></span>
                    </div>
                    <div class="surah-card-arabic"><?php echo e($surah->name_ar); ?></div>
                </div>
                <div class="surah-card-meta">
                    <span class="surah-card-ayahs"><i class="fas fa-list-ol"></i> <?php echo e($surah->ayah_count); ?> Ayahs</span>
                    <span class="surah-card-place <?php echo e(strtolower($surah->revelation_place ?? 'makki')); ?>">
                        <i class="fas <?php echo e(($surah->revelation_place == 'Madani') ? 'fa-mosque' : 'fa-kaaba'); ?>"></i>
                        <?php echo e($surah->revelation_place); ?>

                    </span>
                </div>
                <div class="surah-card-hover-arrow"><i class="fas fa-arrow-right"></i></div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="surah-no-results" id="surahNoResults" style="display: none;">
            <i class="fas fa-search fa-3x" style="color: var(--gold-light); margin-bottom: 15px;"></i>
            <h3 style="color: var(--primary-dark); margin-bottom: 8px;">No Surahs Found</h3>
            <p style="color: var(--text-medium);">Try a different search term or clear your filter.</p>
        </div>

    </div>
</section>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "All 114 Surahs of the Holy Quran",
    "description": "Browse all 114 Surahs of the Holy Quran with Arabic text, Urdu & English translation.",
    "url": "<?php echo e(route('surah.index')); ?>",
    "isPartOf": {
        "@type": "WebSite",
        "name": "Noor-e-Islam",
        "url": "<?php echo e(route('home')); ?>"
    },
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
            { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo e(route('home')); ?>" },
            { "@type": "ListItem", "position": 2, "name": "Quran", "item": "<?php echo e(route('quran.index')); ?>" },
            { "@type": "ListItem", "position": 3, "name": "All Surahs" }
        ]
    }
}
</script>


<script>
(function() {
    var searchInput = document.getElementById('surahSearchInput');
    var grid = document.getElementById('surahGrid');
    var cards = grid.querySelectorAll('.surah-card');
    var noResults = document.getElementById('surahNoResults');
    var filterChips = document.querySelectorAll('.surah-filter-chip');
    var activeFilter = 'all';

    function filterCards() {
        var term = searchInput.value.toLowerCase().trim();
        var visible = 0;

        cards.forEach(function(card) {
            var name = card.getAttribute('data-name');
            var number = card.getAttribute('data-number');
            var place = card.getAttribute('data-place');

            var matchesSearch = !term || name.indexOf(term) !== -1 || number.indexOf(term) !== -1;
            var matchesFilter = activeFilter === 'all' || place === activeFilter;

            if (matchesSearch && matchesFilter) {
                card.style.display = '';
                visible++;
            } else {
                card.style.display = 'none';
            }
        });

        noResults.style.display = visible === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterCards);

    filterChips.forEach(function(chip) {
        chip.addEventListener('click', function() {
            filterChips.forEach(function(c) { c.classList.remove('active'); });
            chip.classList.add('active');
            activeFilter = chip.getAttribute('data-filter');
            filterCards();
        });
    });
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/index.blade.php ENDPATH**/ ?>