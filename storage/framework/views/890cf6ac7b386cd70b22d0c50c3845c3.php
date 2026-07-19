<?php $__env->startSection('title', $seo['title']); ?>
<?php $__env->startSection('meta_description', $seo['description']); ?>
<?php $__env->startSection('canonical', $seo['canonical']); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Qibla Finder Online",
  "description": "<?php echo e($seo['description']); ?>",
  "url": "<?php echo e($seo['canonical']); ?>",
  "applicationCategory": "Utility",
  "operatingSystem": "All"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "How to find Qibla direction online?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "You can find the exact Qibla direction online by using our live compass tool which uses your device's GPS and magnetometer to point directly to the Kaaba."
    }
  }]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header text-center" style="padding: 60px 20px; background: var(--bg-tinted); border-bottom: 1px solid var(--border-light);">
    <div style="max-width: 800px; margin: 0 auto;">
        <h1 style="font-size: 2.8rem; color: var(--navy); margin-bottom: 15px;">Qibla Finder Online</h1>
        <p style="font-size: 1.1rem; color: var(--text-medium); line-height: 1.6;">Find the exact direction of the Kaaba from anywhere in the world using our high-precision online compass and GPS tracker.</p>
    </div>
</div>

<div class="container" style="max-width: 1000px; margin: 50px auto; padding: 0 20px;">
    
    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 50px; margin-bottom: 40px; text-align: center;">
        <div style="margin-bottom: 30px;">
            <i class="fas fa-kaaba" style="font-size: 5rem; color: var(--gold);"></i>
        </div>
        <h2 style="color: var(--navy); margin-bottom: 15px;">Live Interactive Qibla Compass</h2>
        <p style="color: var(--text-medium); max-width: 600px; margin: 0 auto 30px; line-height: 1.8;">Our interactive tool calculates the exact Great Circle bearing to Masjid al-Haram. Click below to launch the live compass and interactive map.</p>
        
        <a href="<?php echo e(route('tools.qibla')); ?>" style="display: inline-block; padding: 15px 35px; background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: white; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 1.1rem; box-shadow: 0 4px 15px rgba(10,31,63,0.2);">
            <i class="fas fa-location-arrow"></i> Open Live Qibla Compass
        </a>
    </div>

    <div style="line-height: 1.8; color: var(--text-dark); margin-bottom: 50px;">
        <h2 style="color: var(--navy); margin-bottom: 20px;">How does our Qibla Finder work?</h2>
        <p style="margin-bottom: 15px;">Finding the Qibla accurately is essential for the validity of the five daily prayers (Salah). Our Qibla Finder online tool uses the <strong>Great Circle formula</strong> (Haversine formula) to calculate the shortest distance between your current GPS coordinates and the coordinates of the Kaaba (21.4225° N, 39.8262° E).</p>
        
        <h3 style="color: var(--navy); margin-top: 30px; margin-bottom: 15px;">Tips for accurate calibration:</h3>
        <ul style="list-style-type: disc; padding-left: 20px; color: var(--text-medium);">
            <li style="margin-bottom: 10px;">Ensure location services (GPS) are enabled on your device.</li>
            <li style="margin-bottom: 10px;">Stand away from large metallic objects or electronic devices that can interfere with the magnetic sensor.</li>
            <li style="margin-bottom: 10px;">Calibrate your phone's compass by moving it in a figure-8 motion before using the tool.</li>
            <li style="margin-bottom: 10px;">If the compass fails, use the "Map View" in our tool to align yourself using nearby streets and landmarks.</li>
        </ul>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/seo-pages/qibla-finder-online.blade.php ENDPATH**/ ?>