

<?php $__env->startSection('title', $islamicName->name . ' Name Meaning in Urdu & English | IslamicWeb'); ?>
<?php $__env->startSection('meta_description', $islamicName->name . ' name meaning: ' . $islamicName->meaning_english . '. ' . $islamicName->name . ' ka matlab Urdu mein: ' . ($islamicName->meaning_urdu ?? '') . '. ' . ($islamicName->origin ?? 'Arabic') . ' origin Muslim name.'); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
  <nav class="breadcrumb">
    <a href="/">Home</a> &rsaquo;
    <a href="/islamic-names">Islamic Names</a> &rsaquo;
    <span><?php echo e($islamicName->name); ?></span>
  </nav>
</div>


<section class="page-hero">
  <div class="container">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->arabic)): ?>
      <div class="arabic-name-hero"><?php echo e($islamicName->arabic); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <h1><?php echo e($islamicName->name); ?></h1>

    <div class="name-badges">
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->gender)): ?>
        <span class="badge badge-gender"><?php echo e($islamicName->gender); ?></span>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->origin)): ?>
        <span class="badge badge-origin"><?php echo e($islamicName->origin); ?> Origin</span>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->is_quranic) && $islamicName->is_quranic): ?>
        <span class="badge badge-quran">✦ Quranic Name</span>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->is_prophet_name) && $islamicName->is_prophet_name): ?>
        <span class="badge badge-prophet">☪ Prophet Name</span>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
  </div>
</section>

<div class="container section-gap">
  <div class="name-detail-grid">

    
    <div class="name-main">

      
      <div class="meaning-row">
        <div class="meaning-card">
          <div class="meaning-label">Meaning in Urdu</div>
          <div class="meaning-value urdu-text"><?php echo e($islamicName->meaning_urdu ?? '—'); ?></div>
        </div>
        <div class="meaning-card">
          <div class="meaning-label">Meaning in English</div>
          <div class="meaning-value"><?php echo e($islamicName->meaning_english ?? '—'); ?></div>
        </div>
      </div>

      
      <div class="content-block">
        <h2>About the Name <?php echo e($islamicName->name); ?></h2>
        <p>
          <strong><?php echo e($islamicName->name); ?></strong> is a beautiful Islamic name
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->origin)): ?> of <strong><?php echo e($islamicName->origin); ?></strong> origin <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          suitable for
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->gender)): ?> <?php echo e(strtolower($islamicName->gender)); ?>s <?php else: ?> Muslims <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>.
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->is_quranic) && $islamicName->is_quranic): ?>
            This name appears in the Holy Quran, which makes it especially blessed and recommended.
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->is_prophet_name) && $islamicName->is_prophet_name): ?>
            This name belongs to one of the Prophets of Allah, making it highly recommended
            for Muslim children as it connects them to prophetic legacy.
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </p>
      </div>

      
      <div class="quick-facts-grid">
        <div class="fact-box">
          <span class="fact-label">Language</span>
          <span class="fact-value"><?php echo e($islamicName->origin ?? 'Arabic'); ?></span>
        </div>
        <div class="fact-box">
          <span class="fact-label">Gender</span>
          <span class="fact-value"><?php echo e($islamicName->gender ?? '—'); ?></span>
        </div>
        <div class="fact-box">
          <span class="fact-label">Religion</span>
          <span class="fact-value">Islam</span>
        </div>
        <div class="fact-box">
          <span class="fact-label">Short Name</span>
          <span class="fact-value"><?php echo e(strlen($islamicName->name) <= 6 ? 'Yes' : 'No'); ?></span>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->is_quranic)): ?>
        <div class="fact-box">
          <span class="fact-label">Quranic</span>
          <span class="fact-value"><?php echo e($islamicName->is_quranic ? 'Yes' : 'No'); ?></span>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->is_prophet_name)): ?>
        <div class="fact-box">
          <span class="fact-label">Prophet Name</span>
          <span class="fact-value"><?php echo e($islamicName->is_prophet_name ? 'Yes' : 'No'); ?></span>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </div>

      
      <div class="name-actions">
        <button class="btn-action" onclick="shareThis()">📤 Share this Name</button>
        <button class="btn-action" onclick="copyName()">📋 Copy Name</button>
      </div>

    </div>

    
    <aside class="name-sidebar">
      <div class="sidebar-card">
        <h3>Quick Summary</h3>
        <dl class="detail-list">
          <dt>Name</dt>
          <dd><?php echo e($islamicName->name); ?></dd>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($islamicName->arabic)): ?>
          <dt>Arabic</dt>
          <dd class="arabic-inline"><?php echo e($islamicName->arabic); ?></dd>
          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
          <dt>Meaning</dt>
          <dd><?php echo e(Str::limit($islamicName->meaning_english, 60)); ?></dd>
          <dt>Gender</dt>
          <dd><?php echo e($islamicName->gender ?? '—'); ?></dd>
          <dt>Origin</dt>
          <dd><?php echo e($islamicName->origin ?? 'Arabic'); ?></dd>
        </dl>
      </div>

      <div class="sidebar-card">
        <h3>Browse Names</h3>
        <a href="/islamic-names?gender=male" class="sidebar-link">👦 Boy Names</a>
        <a href="/islamic-names?gender=female" class="sidebar-link">👧 Girl Names</a>
        <a href="/islamic-names?filter=quranic" class="sidebar-link">📖 Quranic Names</a>
        <a href="/islamic-names?filter=prophet" class="sidebar-link">☪ Prophet Names</a>
      </div>
    </aside>

  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function shareThis() {
  if (navigator.share) {
    navigator.share({
      title: '<?php echo e($islamicName->name); ?> — Islamic Name Meaning',
      text: '<?php echo e($islamicName->name); ?>: <?php echo e($islamicName->meaning_english); ?>',
      url: window.location.href
    });
  } else {
    navigator.clipboard.writeText(window.location.href);
    alert('Link copied to clipboard!');
  }
}
function copyName() {
  navigator.clipboard.writeText('<?php echo e($islamicName->name); ?>');
  alert('Name "<?php echo e($islamicName->name); ?>" copied!');
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\islamic-names\show.blade.php ENDPATH**/ ?>