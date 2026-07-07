<div class="surah-page-nav-wrapper">
    <nav class="surah-page-nav">
        <a href="#overview" class="surah-nav-link">Overview</a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->fazilatEntries && $surah->fazilatEntries->count() > 0): ?>
        <a href="#virtues" class="surah-nav-link">Virtues & Benefits</a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->audio_url): ?>
        <a href="#audioPlayer" class="surah-nav-link">Audio</a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($surah->ayahs->count() > 0): ?>
        <a href="#translations" class="surah-nav-link">Translations</a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <a href="#faq" class="surah-nav-link">FAQ</a>
    </nav>
</div><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/surah/partials/_navigation.blade.php ENDPATH**/ ?>