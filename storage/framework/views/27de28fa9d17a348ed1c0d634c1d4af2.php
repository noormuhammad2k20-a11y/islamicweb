

<?php $__env->startSection('seo'); ?>
<title><?php echo e($seoData['title']); ?></title>
<meta name="description" content="<?php echo e($seoData['description']); ?>">
<link rel="canonical" href="<?php echo e($seoData['canonical']); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.1rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; }
    
    .date-cards-wrapper { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; position: relative; z-index: 2; max-width: 1000px; margin: 0 auto; }
    .main-date-card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); border-radius: 20px; padding: 25px; width: 100%; max-width: 250px; text-align: center; transition: transform 0.3s ease; }
    .main-date-card.active { border-color: var(--gold); background: rgba(255,255,255,0.15); transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
    .card-region { font-size: 0.9rem; color: var(--gold-light); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
    .hijri-day-large { font-size: 2.5rem; font-weight: 800; line-height: 1; margin-bottom: 5px; font-family: 'Playfair Display', serif; }
    
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; }
    .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    .info-box { background: linear-gradient(135deg, #fdf6e3, #fefcf2); border: 1px solid var(--gold); border-radius: 16px; padding: 30px; margin-top: 30px; }
    .info-box h3 { color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 15px; }
    .info-box p { color: #555; line-height: 1.8; }

    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 1.8; color: #444; }
    
    .controls-bar { background: white; padding: 20px; border-radius: 16px; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .control-select { padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 1rem; color: #333; outline: none; width: 100%; max-width: 300px; }
    
    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: auto; border: 1px solid var(--border-light); margin-bottom: 25px; }
    .table-modern { width: 100%; border-collapse: collapse; min-width: 600px; text-align: center; }
    .table-modern th { background: var(--primary); color: white; padding: 15px; font-weight: 600; }
    .table-modern td { padding: 12px 15px; border-bottom: 1px solid var(--border-light); color: #333; }
    .table-modern tr:hover td { background: rgba(10,58,42,0.02); }
    .table-modern .today-row td { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); font-weight: 700; color: var(--primary); }

    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 30px; }
    .internal-link { display: flex; align-items: center; justify-content: space-between; padding: 12px 18px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; font-size: 0.9rem; }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }

    @media (max-width: 768px) { 
        .date-hero-title { font-size: 1.6rem; } 
        .hijri-day-large { font-size: 2rem; } 
    }
</style>

<section class="date-hero">
    <h1 class="date-hero-title">Prayer Times in <?php echo e($name); ?></h1>
    <p class="date-hero-subtitle"><?php echo e(\Carbon\Carbon::now($tz)->format('d F Y')); ?></p>

    <div style="margin-bottom: 30px; font-size: 1.2rem; color: white;">
        Next Prayer: <strong><?php echo e($next['name']); ?></strong> at <?php echo e($next['time']); ?> (in <?php echo e($next['countdown']); ?>)
    </div>

    <div class="date-cards-wrapper">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['fajr'=>'Fajr','sunrise'=>'Sunrise','dhuhr'=>'Dhuhr','asr'=>'Asr','maghrib'=>'Maghrib','isha'=>'Isha']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="main-date-card <?php echo e($next['name'] == $label ? 'active' : ''); ?>">
            <div class="card-region"><?php echo e($label); ?></div>
            <div class="hijri-day-large"><?php echo e($prayers[$key]); ?></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($key !== 'sunrise'): ?>
            <a href="<?php echo e(url('/prayer-times/'.$citySlug.'/'.$key)); ?>" style="display: block; margin-top: 15px; padding: 8px; border: 1px solid rgba(255,255,255,0.2); border-radius: 8px; color: white; text-decoration: none; font-size: 0.85rem; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='transparent'" title="<?php echo e($label); ?> time <?php echo e($name); ?>"><?php echo e($label); ?> Details &rarr;</a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </div>
</section>

<section class="section-container">
    <div style="display: grid; grid-template-columns: 1fr; gap: 30px;">
        
        <div class="controls-bar" style="display: flex; gap: 20px; flex-wrap: wrap; align-items: center; justify-content: center;">
            <form method="GET" action="<?php echo e(url()->current()); ?>" style="display: flex; gap: 20px; width: 100%; justify-content: center; flex-wrap: wrap;">
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 5px;">Calculation Method</label>
                    <select name="method" class="control-select" onchange="this.form.submit()">
                        <option value="Karachi" <?php echo e($method == 'Karachi' ? 'selected' : ''); ?>>Karachi</option>
                        <option value="MWL" <?php echo e($method == 'MWL' ? 'selected' : ''); ?>>Muslim World League</option>
                        <option value="ISNA" <?php echo e($method == 'ISNA' ? 'selected' : ''); ?>>ISNA</option>
                        <option value="Makkah" <?php echo e($method == 'Makkah' ? 'selected' : ''); ?>>Umm Al-Qura</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; color: var(--primary); margin-bottom: 5px;">Asr Juristic</label>
                    <select name="madhab" class="control-select" onchange="this.form.submit()">
                        <option value="hanafi" <?php echo e($madhab == 'hanafi' ? 'selected' : ''); ?>>Hanafi</option>
                        <option value="shafi" <?php echo e($madhab == 'shafi' ? 'selected' : ''); ?>>Shafi / Standard</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="info-box" style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px; text-align: center;">
            <div>
                <h3>Qibla Direction</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e(number_format($qibla, 2)); ?>°</div>
            </div>
            <div>
                <h3>Islamic Midnight</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e(\Carbon\Carbon::instance($sunnah['middle_night'])->setTimezone($tz)->format('h:i A')); ?></div>
            </div>
            <div>
                <h3>Last Third</h3>
                <div style="font-size: 2rem; font-weight: 700; color: var(--primary);"><?php echo e(\Carbon\Carbon::instance($sunnah['last_third'])->setTimezone($tz)->format('h:i A')); ?></div>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && $content->content): ?>
        <div class="seo-content">
            <div class="prose max-w-none">
                <?php echo $content->content; ?>

            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div id="monthly-timetable-section">
            <div class="title-wrapper" style="margin-top: 30px; display: flex; justify-content: center; align-items: center; gap: 20px; position: relative;">
                <h2 class="section-title" style="margin-bottom: 0;">Monthly Timetable</h2>
                <button onclick="printTimetable()" class="print-btn" style="background: var(--primary); color: white; border: none; padding: 8px 15px; border-radius: 8px; cursor: pointer; font-size: 0.9rem; font-weight: 600; display: flex; align-items: center; gap: 8px; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='none'">
                    🖨️ Print Table
                </button>
            </div>

            <script>
                function printTimetable() {
                    var printWindow = window.open('', '_blank');
                    var tableHTML = document.querySelector('#monthly-timetable-section .table-modern').outerHTML;
                    var cityName = '<?php echo e($name); ?>';
                    var title = 'Monthly Prayer Timetable - ' + cityName;
                    
                    printWindow.document.write('<html><head><title>' + title + '</title>');
                    printWindow.document.write('<style>');
                    printWindow.document.write('body { font-family: system-ui, -apple-system, sans-serif; margin: 0; color: #000; }');
                    printWindow.document.write('h2 { text-align: center; color: #004d40; border-bottom: 2px solid #004d40; padding-bottom: 5px; margin: 10px 0; font-size: 14pt; }');
                    printWindow.document.write('.table-modern { width: 100%; border-collapse: collapse; font-size: 8.5pt; margin: 0 auto; line-height: 1.2; }');
                    printWindow.document.write('.table-modern th, .table-modern td { border: 1px solid #ccc; padding: 3px 2px; text-align: center; }');
                    printWindow.document.write('.table-modern th { background-color: #eee; font-weight: bold; -webkit-print-color-adjust: exact; print-color-adjust: exact; }');
                    printWindow.document.write('.today-row { font-weight: bold; background-color: #e8f5e9 !important; -webkit-print-color-adjust: exact; print-color-adjust: exact; }');
                    printWindow.document.write('tr { page-break-inside: avoid; }');
                    printWindow.document.write('@media print { @page { size: portrait; margin: 5mm; } body { margin: 0; padding: 5mm; } }');
                    printWindow.document.write('</style></head><body>');
                    printWindow.document.write('<h2>' + title + '</h2>');
                    printWindow.document.write(tableHTML);
                    printWindow.document.write('<div style="text-align: center; margin-top: 15px; font-size: 9pt; color: #666;">Generated from Noor-e-Islam</div>');
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();
                    printWindow.focus();
                    
                    setTimeout(function() {
                        printWindow.print();
                        printWindow.close();
                    }, 250);
                }
            </script>

            <div class="calendar-grid-wrapper">
                <table class="table-modern">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Fajr</th>
                            <th>Sunrise</th>
                            <th>Dhuhr</th>
                            <th>Asr</th>
                            <th>Maghrib</th>
                            <th>Isha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $monthly; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <tr class="<?php echo e($day['is_today'] ? 'today-row' : ''); ?>">
                            <td><?php echo e($day['date']); ?></td>
                            <td><?php echo e($day['dow']); ?></td>
                            <td><?php echo e($day['fajr']); ?></td>
                            <td><?php echo e($day['sunrise']); ?></td>
                            <td><?php echo e($day['dhuhr']); ?></td>
                            <td><?php echo e($day['asr']); ?></td>
                            <td><?php echo e($day['maghrib']); ?></td>
                            <td><?php echo e($day['isha']); ?></td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="title-wrapper" style="margin-top: 30px;">
            <h2 class="section-title">Nearby Cities</h2>
        </div>
        
        <div class="internal-links">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $nearbyCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(url('/prayer-times/'.($nc['slug'] ?? strtolower(str_replace(' ','-',$nc['name']))))); ?>" class="internal-link">
                <span><?php echo e($nc['name']); ?></span> <i class="fas fa-chevron-right" style="color: var(--gold);"></i>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

    
        

        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Namaz Rakat Information &mdash; <?php echo e($name); ?></h2>
        </div>
        <div class="calendar-grid-wrapper">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Prayer / نماز</th>
                        <th>Sunnah (Muakkadah)</th>
                        <th>Farz</th>
                        <th>Sunnah (Ghair Muakkadah)</th>
                        <th>Nafl</th>
                        <th>Witr</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Fajr / فجر</strong></td><td>2</td><td>2</td><td>&mdash;</td><td>&mdash;</td><td>&mdash;</td><td>4</td>
                    </tr>
                    <tr>
                        <td><strong>Dhuhr / ظہر</strong></td><td>4 (before)</td><td>4</td><td>2</td><td>2</td><td>&mdash;</td><td>12</td>
                    </tr>
                    <tr>
                        <td><strong>Asr / عصر</strong></td><td>&mdash;</td><td>4</td><td>4</td><td>&mdash;</td><td>&mdash;</td><td>8</td>
                    </tr>
                    <tr>
                        <td><strong>Maghrib / مغرب</strong></td><td>&mdash;</td><td>3</td><td>&mdash;</td><td>2</td><td>&mdash;</td><td>7</td>
                    </tr>
                    <tr>
                        <td><strong>Isha / عشاء</strong></td><td>4 (before)</td><td>4</td><td>2</td><td>2</td><td>3</td><td>17</td>
                    </tr>
                </tbody>
            </table>
        </div>

        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Tomorrow Prayer Time <?php echo e($name); ?> &mdash; <?php echo e(\Carbon\Carbon::now($tz)->addDay()->format('d M Y')); ?></h2>
        </div>
        <div class="calendar-grid-wrapper">
            <table class="table-modern">
                <thead>
                    <tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['fajr', 'dhuhr', 'asr', 'maghrib', 'isha']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <th><?php echo e(ucfirst($p)); ?></th>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['fajr', 'dhuhr', 'asr', 'maghrib', 'isha']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <td><?php echo e($tomorrow[$p] ?? 'N/A'); ?></td>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && $content->article_en): ?>
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Prayer Time <?php echo e($name); ?> &mdash; Complete Guide</h2>
        </div>
        <div class="seo-content" style="margin-top:0;">
            <p><?php echo e($content->article_en); ?></p>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->article_urdu): ?>
            <hr style="margin: 20px 0; border-color: var(--border-light);">
            <p dir="rtl" style="font-family: 'Jameel Noori Nastaleeq', 'Nafees Nastaleeq', Arial, sans-serif; font-size: 1.2rem; text-align: right; line-height: 2;"><?php echo e($content->article_urdu); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && $content->famous_mosques): ?>
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Famous Mosques in <?php echo e($name); ?></h2>
        </div>
        <div class="info-box" style="display: flex; flex-direction: column; gap: 10px; margin-top:0; text-align: left;">
            <?php 
                $mosques = is_string($content->famous_mosques) ? json_decode($content->famous_mosques, true) : $content->famous_mosques;
                if (!is_array($mosques)) $mosques = [];
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $mosques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mosque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div style="font-size: 1.1rem; color: var(--primary);">🕌 <?php echo e($mosque); ?></div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && ($content->special_note || $content->jummah_note || $content->eid_prayer_note)): ?>
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Important Prayer Information &mdash; <?php echo e($name); ?></h2>
        </div>
        <div class="seo-content" style="margin-top:0; display:flex; flex-direction:column; gap: 20px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->jummah_note): ?>
            <div>
                <h3 style="color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 10px;">🕌 Jummah Prayer Time <?php echo e($name); ?></h3>
                <p><?php echo e($content->jummah_note); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->eid_prayer_note): ?>
            <div>
                <h3 style="color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 10px;">🌙 Eid Prayer Time <?php echo e($name); ?></h3>
                <p><?php echo e($content->eid_prayer_note); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content->special_note): ?>
            <div>
                <h3 style="color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 10px;">ℹ️ Note</h3>
                <p><?php echo e($content->special_note); ?></p>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">FAQ &mdash; Prayer Time <?php echo e($name); ?> Today</h2>
        </div>
        <div class="seo-content" itemscope itemtype="https://schema.org/FAQPage" style="margin-top:0; display:flex; flex-direction:column; gap: 25px;">
            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Fajr time in <?php echo e($name); ?> today?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Fajr time in <?php echo e($name); ?> today</strong> <?php echo e($prayers['date']->format('d F Y')); ?> is <strong><?php echo e($prayers['fajr']); ?></strong>. Fajr namaz consists of 2 Sunnah and 2 Farz rakats (total 4 rakats). Fajr time ends at sunrise which is <?php echo e($prayers['sunrise']); ?> today in <?php echo e($name); ?>.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What are all prayer times in <?php echo e($name); ?> today?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Prayer times <?php echo e($name); ?> today</strong> <?php echo e($prayers['date']->format('d F Y')); ?>: Fajr <strong><?php echo e($prayers['fajr']); ?></strong>, Sunrise <?php echo e($prayers['sunrise']); ?>, Dhuhr/Zuhr <strong><?php echo e($prayers['dhuhr']); ?></strong>, Asr <strong><?php echo e($prayers['asr']); ?></strong>, Maghrib <strong><?php echo e($prayers['maghrib']); ?></strong>, Isha <strong><?php echo e($prayers['isha']); ?></strong>. These timings are calculated using the <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && $content->calculation_note): ?> <?php echo e($content->calculation_note); ?> <?php else: ?> University of Islamic Sciences Karachi method. <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Asr prayer time in <?php echo e($name); ?>?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Asr time <?php echo e($name); ?> today</strong> is <strong><?php echo e($prayers['asr']); ?></strong>. Asr consists of 4 Sunnah (Ghair Muakkadah) and 4 Farz rakats. Asr time ends at Maghrib <?php echo e($prayers['maghrib']); ?>.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Maghrib prayer time in <?php echo e($name); ?> today?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Maghrib time <?php echo e($name); ?> today</strong> is <strong><?php echo e($prayers['maghrib']); ?></strong>. Maghrib prayer is 3 Farz + 2 Nafl (total 7 rakats if including optional Sunnah). Maghrib time ends at Isha <?php echo e($prayers['isha']); ?>.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Isha prayer time in <?php echo e($name); ?>?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Isha time <?php echo e($name); ?> today</strong> is <strong><?php echo e($prayers['isha']); ?></strong>. Isha is the final prayer of the day &mdash; 4 Sunnah + 4 Farz + 2 Sunnah + 2 Nafl + 3 Witr + 2 Nafl = 17 total rakats.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is the Qibla direction in <?php echo e($name); ?>?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Qibla direction from <?php echo e($name); ?></strong> is <strong><?php echo e(number_format($qibla, 2)); ?>&deg;</strong> from True North. Face this direction while performing Salah in <?php echo e($name); ?>.
                    </div>
                </div>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($content && $content->jummah_note): ?>
            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Jummah prayer time in <?php echo e($name); ?>?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <?php echo e($content->jummah_note); ?> Today's Zuhr time in <?php echo e($name); ?> is <?php echo e($prayers['dhuhr']); ?>.
                    </div>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Prayer Time <?php echo e($name); ?> &mdash; Namaz Timing Guide</h2>
        </div>
        <div class="seo-content" style="margin-top:0;">
            <p><strong>Prayer time <?php echo e($name); ?></strong> today <?php echo e($prayers['date']->format('d F Y')); ?> (<?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?> <?php echo e($hijri['year']); ?> AH): <strong>Fajr <?php echo e($prayers['fajr']); ?></strong>, Dhuhr <?php echo e($prayers['dhuhr']); ?>, <strong>Asr <?php echo e($prayers['asr']); ?></strong>, Maghrib <?php echo e($prayers['maghrib']); ?>, <strong>Isha <?php echo e($prayers['isha']); ?></strong>. <strong>Fajr prayer time <?php echo e($name); ?></strong> begins at dawn and ends at sunrise (<?php echo e($prayers['sunrise']); ?>). <strong>Asr time <?php echo e($name); ?></strong> follows the <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array($country, ['Pakistan','India (Hanafi)'])): ?> Hanafi <?php elseif($country==='UAE'): ?> UAE Shafi <?php elseif($country==='USA'): ?> ISNA <?php else: ?> standard <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> calculation. <strong>Maghrib time <?php echo e($name); ?></strong> starts exactly at sunset. <strong>Isha prayer time <?php echo e($name); ?></strong> begins approximately 90 minutes after Maghrib.</p>
            <p style="margin-top: 15px;"><strong>Tomorrow prayer time <?php echo e($name); ?></strong> (<?php echo e(\Carbon\Carbon::now($tz)->addDay()->format('d M Y')); ?>): Fajr <?php echo e($tomorrow['fajr'] ?? 'N/A'); ?>, Dhuhr <?php echo e($tomorrow['dhuhr'] ?? 'N/A'); ?>, Asr <?php echo e($tomorrow['asr'] ?? 'N/A'); ?>, Maghrib <?php echo e($tomorrow['maghrib'] ?? 'N/A'); ?>, Isha <?php echo e($tomorrow['isha'] ?? 'N/A'); ?>.</p>
        </div>


        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title"><?php echo e($name); ?> Prayer Times &mdash; Detailed Pages</h2>
        </div>
        <p style="text-align: center; margin-bottom: 20px;">View detailed information for each individual prayer in <?php echo e($name); ?>:</p>
        <div class="internal-links" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [
                ['key'=>'fajr', 'label'=>'Fajr Time', 'urdu'=>'فجر', 'icon'=>'🌙','desc'=>'Dawn prayer · Before sunrise'],
                ['key'=>'zuhr', 'label'=>'Dhuhr/Zuhr Time','urdu'=>'ظہر', 'icon'=>'☀️','desc'=>'Noon prayer · At solar midday'],
                ['key'=>'asr', 'label'=>'Asr Time', 'urdu'=>'عصر', 'icon'=>'🌤','desc'=>'Afternoon prayer · Hanafi method'],
                ['key'=>'maghrib', 'label'=>'Maghrib Time', 'urdu'=>'مغرب', 'icon'=>'🌇','desc'=>'Sunset prayer · Exact sunset'],
                ['key'=>'isha', 'label'=>'Isha Time', 'urdu'=>'عشاء', 'icon'=>'🌌','desc'=>'Night prayer · Evening worship'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(url('/prayer-times/'.$citySlug.'/'.$pl['key'])); ?>" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="<?php echo e($pl['label']); ?> in <?php echo e($name); ?>">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);"><?php echo e($pl['icon']); ?> <?php echo e($pl['label']); ?></div>
                <div style="font-size: 0.9rem; color: #666;"><?php echo e($pl['urdu']); ?> &mdash; <?php echo e($pl['desc']); ?></div>
            </a>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Prayer Times by Country</h2>
        </div>
        <div class="internal-links">
            <a href="<?php echo e(url('/prayer-times/pakistan')); ?>" class="internal-link <?php echo e($country==='Pakistan'?'active':''); ?>" title="Prayer Times Pakistan All Cities" style="<?php echo e($country==='Pakistan' ? 'background: #e8f5e9; border-color: #4caf50;' : ''); ?>">🇵🇰 Pakistan</a>
            <a href="<?php echo e(url('/prayer-times/uae')); ?>" class="internal-link <?php echo e($country==='UAE'?'active':''); ?>" title="Prayer Times UAE All Cities" style="<?php echo e($country==='UAE' ? 'background: #e3f2fd; border-color: #2196f3;' : ''); ?>">🇦🇪 UAE</a>
            <a href="<?php echo e(url('/prayer-times/saudi-arabia')); ?>" class="internal-link <?php echo e($country==='Saudi Arabia'?'active':''); ?>" title="Prayer Times Saudi Arabia" style="<?php echo e($country==='Saudi Arabia' ? 'background: #ffebee; border-color: #f44336;' : ''); ?>">🇸🇦 Saudi Arabia</a>
            <a href="<?php echo e(url('/prayer-times/india')); ?>" class="internal-link <?php echo e($country==='India'?'active':''); ?>" title="Prayer Times India" style="<?php echo e($country==='India' ? 'background: #fff8e1; border-color: #ffc107;' : ''); ?>">🇮🇳 India</a>
        </div>

        <h3 style="text-align: center; margin-top: 30px; font-family: 'Playfair Display', serif; color: var(--primary);">
            Popular Cities in 
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($country==='Pakistan'): ?>Pakistan 🇵🇰
            <?php elseif($country==='UAE'): ?>UAE 🇦🇪
            <?php elseif($country==='Saudi Arabia'): ?>Saudi Arabia 🇸🇦
            <?php elseif($country==='India'): ?>India 🇮🇳
            <?php else: ?> USA 🇺🇸 <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </h3>
        
        <?php
            $popularByCountry = [
                'Pakistan' => [['lahore','Lahore'],['karachi','Karachi'],['islamabad','Islamabad'],['rawalpindi','Rawalpindi'],['faisalabad','Faisalabad'],['peshawar','Peshawar'],['multan','Multan'],['quetta','Quetta']],
                'UAE' => [['dubai','Dubai'],['abu-dhabi','Abu Dhabi'],['sharjah','Sharjah'],['ajman','Ajman'],['al-ain','Al Ain'],['ras-al-khaimah','RAK'],['fujairah','Fujairah']],
                'Saudi Arabia' => [['makkah','Makkah'],['madinah','Madinah'],['riyadh','Riyadh'],['jeddah','Jeddah'],['dammam','Dammam'],['khobar','Khobar'],['taif','Taif']],
                'India' => [['calicut','Calicut'],['kozhikode','Kozhikode'],['malappuram','Malappuram'],['kochi','Kochi'],['kannur','Kannur'],['bangalore','Bangalore'],['mumbai','Mumbai']],
                'USA' => [['new-york','New York'],['chicago','Chicago'],['houston','Houston'],['dearborn-michigan','Dearborn'],['minneapolis','Minneapolis'],['los-angeles','LA'],['boston','Boston']],
            ];
            $links = $popularByCountry[$country] ?? $popularByCountry['Pakistan'];
        ?>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-top: 15px;">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$slug, $label]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slug !== $citySlug): ?>
                <a href="<?php echo e(url('/prayer-times/'.$slug)); ?>" style="padding: 8px 15px; border: 1px solid var(--border-light); border-radius: 20px; text-decoration: none; color: var(--primary); font-size: 0.9rem; background: white; transition: all 0.3s;" onmouseover="this.style.borderColor='var(--gold)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--border-light)'; this.style.transform='none'" title="Prayer Time <?php echo e($label); ?>"><?php echo e($label); ?></a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Islamic Tools &mdash; <?php echo e($name); ?></h2>
        </div>
        <div class="internal-links" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            <a href="<?php echo e(url('/islamic-date-today')); ?>" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="Islamic Date Today <?php echo e($name); ?>">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">📅 Islamic Date Today</div>
                <div style="font-size: 0.9rem; color: #666;">Today's Hijri date: <strong><?php echo e($hijri['day']); ?> <?php echo e($hijri['month_name']); ?> <?php echo e($hijri['year']); ?></strong></div>
            </a>
            <a href="<?php echo e(url('/islamic-calendar')); ?>" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="Islamic Calendar <?php echo e($prayers['date']->format('Y')); ?>">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">🗓️ Islamic Calendar <?php echo e($prayers['date']->format('Y')); ?></div>
                <div style="font-size: 0.9rem; color: #666;">Full Hijri calendar with all months</div>
            </a>
            <a href="<?php echo e(url('/prayer-times/'.$citySlug.'/fajr')); ?>" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="Fajr Time <?php echo e($name); ?> Today">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">🌙 Fajr Time <?php echo e($name); ?></div>
                <div style="font-size: 0.9rem; color: #666;">Today: <strong><?php echo e($prayers['fajr']); ?></strong> &mdash; Full details, monthly schedule</div>
            </a>
        </div>

</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/prayer-times/city.blade.php ENDPATH**/ ?>