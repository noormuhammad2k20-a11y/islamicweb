


<div class="date-cards-wrapper">
    
    <div class="main-date-card">
        <div class="card-flag">🇵🇰</div>
        <div class="card-region">Pakistan · Karachi · Lahore</div>
        <div class="hijri-day-large"><?php echo e($hijriPK['day']); ?></div>
        <div class="hijri-month-name"><?php echo e($hijriPK['month_name']); ?></div>
        <div class="hijri-urdu-arabic"><?php echo e($hijriPK['month_urdu']); ?> — <?php echo e($hijriPK['month_arabic']); ?></div>
        <div style="font-size: 1.2rem; font-weight: 600;"><?php echo e($hijriPK['year']); ?> AH / ھجری</div>
        <div class="gregorian-date">
            <?php echo e($nowPK->format('l, d F Y')); ?><br>
            <span style="font-family: 'Amiri', serif; font-size: 1.1rem; color: var(--gold-light);"><?php echo e($hijriPK['day_urdu']); ?></span>
        </div>
    </div>

    
    <div class="main-date-card">
        <div class="card-flag">🇸🇦</div>
        <div class="card-region">Saudi Arabia Islamic Date Today</div>
        <div class="hijri-day-large"><?php echo e($hijriSA['day']); ?></div>
        <div class="hijri-month-name"><?php echo e($hijriSA['month_name']); ?></div>
        <div class="hijri-urdu-arabic"><?php echo e($hijriSA['month_urdu']); ?> — <?php echo e($hijriSA['month_arabic']); ?></div>
        <div style="font-size: 1.2rem; font-weight: 600;"><?php echo e($hijriSA['year']); ?> AH / ھجری</div>
        <div class="gregorian-date">
            Umm al-Qura Calendar
        </div>
    </div>
</div>
<?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\islamic-calendar\partials\_date-card.blade.php ENDPATH**/ ?>