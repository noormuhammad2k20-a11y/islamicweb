<div class="sidebar-widget">
    <h3 class="widget-title">Table of Contents</h3>
    <ul class="widget-list toc-list">
        <li><a href="#overview">Overview</a></li>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->importantAyahs && $surah->importantAyahs->count() > 0): ?>
        <li><a href="#important-ayahs">Important Ayahs</a></li>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->getContentText('authentic_virtues')): ?>
        <li><a href="#virtues">Virtues</a></li>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ayahs->count() > 0): ?>
        <li><a href="#continuous-reading">Complete Reading</a></li>
        <li><a href="#translations">Translations & Tafsir</a></li>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->faqs->count() > 0): ?>
        <li><a href="#faq">FAQ</a></li>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ul>
</div><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/partials/_toc.blade.php ENDPATH**/ ?>