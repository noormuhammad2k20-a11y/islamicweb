

<?php $__env->startSection('title', 'Ramadan Timetable — Noor-e-Islam'); ?>
<?php $__env->startSection('meta_description', 'Interactive 30-day Ramadan Timetable with Sehri and Iftar timings. Comprehensive technical and spiritual guide.'); ?>

<?php $__env->startSection('content'); ?>


<div class="container">
  <nav class="breadcrumb">
    <a href="/">Home</a> &rsaquo;
    <a href="/ramadan-guide">Ramadan Guide</a> &rsaquo;
    <span>Timetable</span>
  </nav>
</div>

<section class="page-hero">
  <div class="container">
    <div class="bismillah">﷽</div>
    <h1>Global Ramadan Timetable</h1>
    <p>Accurate Sehri and Iftar timings for major cities</p>
  </div>
</section>

<div class="container section-gap">
  
  <div class="table-wrapper">
    <table class="prayer-table">
      <thead>
        <tr>
          <th>Day</th>
          <th>Date</th>
          <th>Sehri Time</th>
          <th>Iftar Time</th>
        </tr>
      </thead>
      <tbody>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($timings) && $timings->count() > 0): ?>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $timings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
          <tr>
            <td><strong><?php echo e($timing->day); ?></strong></td>
            <td><?php echo e(\Carbon\Carbon::parse($timing->date)->format('d M, Y')); ?></td>
            <td style="color: var(--primary); font-weight: 600;"><?php echo e($timing->sehri_time); ?></td>
            <td style="color: var(--accent); font-weight: 600;"><?php echo e($timing->iftar_time); ?></td>
          </tr>
          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" style="text-align:center; padding:2rem;">
              Timetable updating... please check back shortly.
            </td>
          </tr>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- SEO Authoritative Content Section -->
  <div class="content-article" style="margin-top: 4rem;">
      <h2>The Astronomical Calculation of Ramadan Timings</h2>
      <p>
          The determination of Ramadan timings is a meticulous process that combines advanced astronomical calculations with traditional Islamic jurisprudence. Throughout history, the precise tracking of the lunar cycle and solar positions has been critical to ensuring the accurate observance of Sehri (the pre-dawn meal) and Iftar (the breaking of the fast). Today, high-precision algorithms developed by global astronomical observatories enable us to predict these timings with unprecedented accuracy down to the minute.
      </p>
      <h3>Understanding Fajr and Maghrib Parameters</h3>
      <p>
          Sehri ends and the fast begins at the onset of Fajr, which is astronomically defined by the solar depression angle. Organizations such as the Muslim World League, the Islamic Society of North America (ISNA), and the University of Islamic Sciences in Karachi have established specific degrees of solar depression (typically ranging from 15° to 18°) to calculate the exact moment of true dawn (Al-Fajr Al-Sadiq). The variance in these calculations accounts for geographical latitude and atmospheric refraction, ensuring that the fasting window is correctly strictly bounded according to Sharia principles. 
      </p>
      <p>
          Conversely, Iftar coincides with the Maghrib prayer, signifying the moment the sun entirely dips below the horizon. The calculation of sunset incorporates adjustments for elevation and local topography. For instance, individuals residing in high-rise buildings experience sunset slightly later than those at ground level, a phenomenon meticulously accounted for in localized Islamic timetables.
      </p>
      <h3>The Lunar Calendar and Sighting the Crescent Moon</h3>
      <p>
          Ramadan is the ninth month of the Islamic lunar calendar (Hijri calendar), which consists of 354 or 355 days. Because the lunar year is roughly 11 days shorter than the Gregorian solar year, the month of Ramadan regresses through all seasons over a 33-year cycle. The commencement of the month relies on the visual sighting of the new crescent moon (Hilal). While modern astronomical data can pinpoint the "conjunction" (the exact moment the moon aligns between the Earth and the sun), the actual visibility of the crescent depends on the moon's age, altitude, and elongation at sunset, as well as atmospheric clarity.
      </p>
      <h3>Geographical Variations in Fasting Duration</h3>
      <p>
          Due to the axial tilt of the Earth, the duration of the fast varies dramatically across different latitudes. During summer months in the Northern Hemisphere, regions closer to the Arctic Circle can experience daylight lasting upwards of 20 hours. In extreme cases, where the sun never truly sets or the twilight extends throughout the night, scholars employ the methodology of estimating times based on the nearest moderate region or the city of Mecca (Umm Al-Qura). Understanding these geographical dynamics is essential for creating comprehensive and inclusive Ramadan timetables that serve the global Muslim ummah.
      </p>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\ramadan-guide\timetable.blade.php ENDPATH**/ ?>