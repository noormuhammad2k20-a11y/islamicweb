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
    "name": "What is the Iftar time today?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "The Iftar time today starts precisely at <?php echo e($prayers['maghrib']); ?>."
    }
  }, {
    "@type": "Question",
    "name": "What is the Dua for breaking the fast?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Allahumma inni laka sumtu, wa bika aamantu, wa 'alayka tawakkaltu, wa 'ala rizqika aftartu (O Allah! I fasted for You and I believe in You and I put my trust in You and I break my fast with Your sustenance)."
    }
  }]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header text-center" style="padding: 60px 20px; background: var(--bg-tinted); border-bottom: 1px solid var(--border-light);">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.8rem; color: var(--navy); margin-bottom: 15px;">Iftar Time Today</h1>
        <p style="font-size: 1.1rem; color: var(--text-medium); line-height: 1.6;">Today's Iftar (Fast Breaking) time for <strong><?php echo e($date->format('d F Y')); ?></strong> (<?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?> <?php echo e($hijri['year']); ?> AH).</p>
    </div>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
    
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 40px; margin-bottom: 40px; text-align: center;">
        <h2 style="color: var(--navy); margin-bottom: 15px;">Iftar Time</h2>
        <div style="font-size: 3.5rem; font-weight: bold; color: var(--gold-dark); font-family: monospace;">
            <?php echo e($prayers['maghrib']); ?>

        </div>
        <p style="color: var(--text-medium); margin-top: 10px;">The time to break your fast begins exactly at Maghrib.</p>
    </div>

    <div style="line-height: 1.8; color: var(--text-dark); margin-bottom: 50px; display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
        <div style="background: var(--bg-tinted); padding: 30px; border-radius: 8px;">
            <h3 style="color: var(--navy); margin-bottom: 15px;">Dua for Iftar (Breaking Fast)</h3>
            <p class="arabic" style="font-size: 2rem; text-align: right; color: var(--navy); margin-bottom: 15px;" dir="rtl">اللَّهُمَّ اِنِّى لَكَ صُمْتُ وَبِكَ امَنْتُ وَعَلَيْكَ تَوَكَّلْتُ وَعَلَى رِزْقِكَ اَفْطَرْتُ</p>
            <p><strong>Transliteration:</strong> Allahumma inni laka sumtu, wa bika aamantu, wa 'alayka tawakkaltu, wa 'ala rizqika aftartu.</p>
            <p><strong>Translation:</strong> O Allah! I fasted for You and I believe in You and I put my trust in You and I break my fast with Your sustenance.</p>
        </div>
        
        <div>
            <h3 style="color: var(--navy); margin-bottom: 15px;">Sunnah of Breaking the Fast</h3>
            <p style="margin-bottom: 15px;">It is highly recommended to break the fast immediately after the sun has set (Maghrib time) without delay. The Prophet Muhammad (ﷺ) said: <em>"The people will remain on the right path as long as they hasten the breaking of the fast."</em> (Sahih Bukhari).</p>
            <p>The Sunnah is to break the fast with fresh dates, or dry dates, or water, before praying Maghrib.</p>
        </div>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <a href="<?php echo e(route('ramadan.hub', ['year' => $date->year])); ?>" style="display: inline-block; padding: 12px 25px; background: var(--navy); color: white; border-radius: 5px; text-decoration: none; font-weight: bold;">View Full Ramadan Calendar</a>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/seo-pages/iftar-time-today.blade.php ENDPATH**/ ?>