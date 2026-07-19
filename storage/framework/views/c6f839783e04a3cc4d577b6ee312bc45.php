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
    "name": "What is the Sehri time today?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The Sehri time today ends precisely at <?php echo e($prayers['fajr']); ?>."
    }
  }, {
    "@type": "Question",
    "name": "What is the Dua for keeping a fast?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Wa bisawmi ghadinn nawaiytu min shahri ramadan (I intend to keep the fast for tomorrow in the month of Ramadan)."
    }
  }]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header text-center" style="padding: 60px 20px; background: var(--bg-tinted); border-bottom: 1px solid var(--border-light);">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.8rem; color: var(--navy); margin-bottom: 15px;">Sehri Time Today</h1>
        <p style="font-size: 1.1rem; color: var(--text-medium); line-height: 1.6;">Today's Suhoor (Sehri) end time for <strong><?php echo e($date->format('d F Y')); ?></strong> (<?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?> <?php echo e($hijri['year']); ?> AH).</p>
    </div>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
    
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px; margin-bottom: 40px; text-align: center;">
        <h2 style="color: var(--navy); margin-bottom: 15px;">Sehri Ends At</h2>
        <div style="font-size: 3.5rem; font-weight: bold; color: var(--gold-dark); font-family: monospace;">
            <?php echo e($prayers['fajr']); ?>

        </div>
        <p style="color: var(--text-medium); margin-top: 10px;">Please stop eating and drinking at least 2-3 minutes before this time out of precaution.</p>
    </div>

    <div style="line-height: 1.8; color: var(--text-dark); margin-bottom: 50px; display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div style="background: var(--bg-tinted); padding: 30px; border-radius: 8px;">
            <h3 style="color: var(--navy); margin-bottom: 15px;">Dua for Sehri (Intention to Fast)</h3>
            <p class="arabic" style="font-size: 2rem; text-align: right; color: var(--navy); margin-bottom: 15px;" dir="rtl">وَبِصَوْمِ غَدٍ نَّوَيْتُ مِنْ شَهْرِ رَمَضَانَ</p>
            <p><strong>Transliteration:</strong> Wa bisawmi ghadinn nawaiytu min shahri ramadan.</p>
            <p><strong>Translation:</strong> I intend to keep the fast for tomorrow in the month of Ramadan.</p>
        </div>
        
        <div>
            <h3 style="color: var(--navy); margin-bottom: 15px;">Importance of Suhoor</h3>
            <p style="margin-bottom: 15px;">The Prophet Muhammad (ﷺ) said: <em>"Take Suhoor as there is a blessing in it."</em> (Sahih Bukhari). Waking up for Sehri is a Sunnah and it provides the necessary energy to observe the fast throughout the day.</p>
            <p>Remember that the time for Sehri ends exactly when the time for Fajr prayer begins. Eating even a minute after Fajr time starts invalidates the fast.</p>
        </div>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <a href="<?php echo e(route('ramadan.hub', ['year' => $date->year])); ?>" style="display: inline-block; padding: 12px 25px; background: var(--navy); color: white; border-radius: 5px; text-decoration: none; font-weight: bold;">View Full Ramadan Calendar</a>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/seo-pages/sehri-time-today.blade.php ENDPATH**/ ?>