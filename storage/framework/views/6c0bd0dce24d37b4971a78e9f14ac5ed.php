<?php $__env->startSection('title', $seo['title']); ?>
<?php $__env->startSection('meta_description', $seo['description']); ?>
<?php $__env->startSection('canonical', $seo['canonical']); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "What time is Fajr today?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Fajr prayer time today begins at <?php echo e($prayers['fajr']); ?>."
    }
  }, {
    "@type": "Question",
    "name": "What time is Maghrib today?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Maghrib prayer time today begins at <?php echo e($prayers['maghrib']); ?>."
    }
  }]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header text-center" style="padding: 60px 20px; background: var(--bg-tinted); border-bottom: 1px solid var(--border-light);">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.8rem; color: var(--navy); margin-bottom: 15px;">Prayer Times Today</h1>
        <p style="font-size: 1.1rem; color: var(--text-medium); line-height: 1.6;">Accurate Namaz timings for today, <strong><?php echo e($date->format('d F Y')); ?></strong> (<?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?> <?php echo e($hijri['year']); ?> AH).</p>
    </div>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
    
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 40px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px; text-align: center;">
            <div style="padding: 20px; background: var(--bg-tinted); border-radius: 8px;">
                <h3 style="color: var(--navy); margin-bottom: 10px;">Fajr</h3>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gold-dark);"><?php echo e($prayers['fajr']); ?></div>
            </div>
            <div style="padding: 20px; background: var(--bg-tinted); border-radius: 8px;">
                <h3 style="color: var(--navy); margin-bottom: 10px;">Sunrise</h3>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--text-medium);"><?php echo e($prayers['sunrise']); ?></div>
            </div>
            <div style="padding: 20px; background: var(--bg-tinted); border-radius: 8px;">
                <h3 style="color: var(--navy); margin-bottom: 10px;">Dhuhr</h3>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gold-dark);"><?php echo e($prayers['dhuhr']); ?></div>
            </div>
            <div style="padding: 20px; background: var(--bg-tinted); border-radius: 8px;">
                <h3 style="color: var(--navy); margin-bottom: 10px;">Asr</h3>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gold-dark);"><?php echo e($prayers['asr']); ?></div>
            </div>
            <div style="padding: 20px; background: var(--bg-tinted); border-radius: 8px;">
                <h3 style="color: var(--navy); margin-bottom: 10px;">Maghrib</h3>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gold-dark);"><?php echo e($prayers['maghrib']); ?></div>
            </div>
            <div style="padding: 20px; background: var(--bg-tinted); border-radius: 8px;">
                <h3 style="color: var(--navy); margin-bottom: 10px;">Isha</h3>
                <div style="font-size: 1.5rem; font-weight: bold; color: var(--gold-dark);"><?php echo e($prayers['isha']); ?></div>
            </div>
        </div>
    </div>

    <div style="line-height: 1.8; color: var(--text-dark); margin-bottom: 50px;">
        <h2 style="color: var(--navy); margin-bottom: 20px;">Importance of Offering Prayer on Time</h2>
        <p style="margin-bottom: 15px;">Prayer (Salah) is the second pillar of Islam and offering it at its prescribed time is obligatory for every adult Muslim. Allah says in the Holy Quran: <em>"Indeed, prayer has been decreed upon the believers a decree of specified times."</em> (Surah An-Nisa 4:103).</p>
        <p>The times provided above are calculated using the standard methodology (Hanafi juristic method and University of Islamic Sciences, Karachi conventions) widely used in Pakistan and South Asia. However, you should also observe your local mosque's jamaat timings.</p>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="<?php echo e(route('prayer-times.hub')); ?>" style="display: inline-block; padding: 12px 25px; background: var(--navy); color: white; border-radius: 5px; text-decoration: none; font-weight: bold;">View Timings for Your Specific City</a>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/seo-pages/prayer-times-today.blade.php ENDPATH**/ ?>