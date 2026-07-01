<?php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
?>
<?php $__env->startSection('title', 'Islamic Date Today ΓÇö Hijri Date Worldwide, ' . $titleHijri); ?>

<?php $__env->startSection('content'); ?>
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="<?php echo e(route('home')); ?>" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Islamic Date Today</span>
            </div>
        </div>
        
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-globe"></i> Worldwide</div>
            <h1 class="section-title">Islamic <span>Date Today</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">∩╖╜</span><span class="line"></span></div>
        </div>

        <!-- HERO HIJRI DATE & MOON PHASE -->
        <div class="contact-grid" style="grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 50px;">
            <div class="contact-info" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; border: none; text-align: center; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; box-shadow: 0 15px 35px rgba(5,67,62,0.2);">
                <div style="position: absolute; top: -50px; right: -50px; opacity: 0.05; font-size: 250px;"><i class="fas fa-moon"></i></div>
                <h3 style="color: var(--gold); font-size: 1.5rem; margin-bottom: 10px; z-index: 1;"><?php echo e(date('l, d F Y')); ?></h3>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 10px; line-height: 1.2; z-index: 1;">
                    <?php echo e($hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah'); ?>

                </div>
                <div style="font-size: 1.8rem; color: rgba(255,255,255,0.8); z-index: 1;"><?php echo e($hijriDate ? $hijriDate->hijri_year : '1446'); ?> AH</div>
            </div>

            <div class="contact-info" style="text-align: center; border-left: 4px solid var(--gold); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h4 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 15px;">Current Moon Phase</h4>
                <div style="font-size: 4rem; color: var(--gold); margin-bottom: 15px;">
                    <i class="fas <?php echo e($moonPhase['icon'] ?? 'fa-moon'); ?>"></i>
                </div>
                <h3 style="color: var(--primary); margin-bottom: 5px;"><?php echo e($moonPhase['name'] ?? 'Unknown'); ?></h3>
                <p style="color: #666; font-size: 0.9rem;"><?php echo e($moonPhase['description'] ?? ''); ?></p>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($fastingDays) > 0): ?>
        <!-- FASTING ALERTS -->
        <div style="background: rgba(var(--gold-rgb), 0.1); border-left: 4px solid var(--gold); padding: 20px; border-radius: 8px; margin-bottom: 50px;">
            <h4 style="color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-star-and-crescent" style="color: var(--gold);"></i> Sunnah Fasting Today</h4>
            <p style="color: #555; margin: 0;">Today is a recommended day for fasting: <strong><?php echo e(implode(', ', $fastingDays)); ?></strong>.</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="contact-grid" style="grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 50px;">
            <!-- UPCOMING EVENTS -->
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-calendar-star" style="color: var(--gold);"></i> Upcoming Events</h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($upcomingEvents) && $upcomingEvents->count() > 0): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div style="padding: 15px; background: <?php echo e($index == 0 ? 'rgba(5,67,62,0.05)' : '#fff'); ?>; border-radius: 8px; margin-bottom: 15px; border: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="color: var(--primary-dark); margin: 0 0 5px 0;"><?php echo e($event->name); ?></h4>
                                <span style="font-size: 0.85rem; color: #666;"><?php echo e($event->hijri_day); ?> <?php echo e($event->hijriMonth->name_en ?? ''); ?></span>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary);"><?php echo e($event->days_away); ?></div>
                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase;">Days Away</div>
                            </div>
                        </div>
                    </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php else: ?>
                    <p>No upcoming events found.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- HIJRI TO GREGORIAN CONVERTER -->
            <div class="contact-info" style="border-left: 4px solid var(--gold);">
                <h3><i class="fas fa-exchange-alt" style="color: var(--gold);"></i> Date Converter</h3>
                <p style="margin-bottom: 20px;">Instantly convert dates between Hijri and Gregorian.</p>
                <form id="converterWidgetForm">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Conversion Type</label>
                        <select id="convDirection" style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                            <option value="g2h">Gregorian to Hijri</option>
                            <option value="h2g">Hijri to Gregorian</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Date</label>
                        <input type="date" id="convDate" required style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 12px;"><i class="fas fa-sync"></i> Convert</button>
                </form>
                <div id="convResult" style="margin-top: 20px; text-align: center; display: none; padding: 15px; background: rgba(var(--gold-rgb), 0.05); border-radius: 8px; border: 1px solid rgba(var(--gold-rgb), 0.2);">
                    <h4 style="color: var(--primary-dark); margin-bottom: 5px; font-size: 1.2rem;" id="resText"></h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;" id="resSub"></p>
                </div>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0): ?>
        <!-- MONTHLY CALENDAR GRID -->
        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h2 class="section-title">Islamic Month <span>Calendar</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">∩╖╜</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Calendar for <?php echo e($hijriDate->hijri_month); ?> <?php echo e($hijriDate->hijri_year); ?> AH</p>
        </div>
        
        <div style="background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 50px;">
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); background: var(--primary); color: white; text-align: center; font-weight: bold;">
                <div style="padding: 15px 5px;">Sun</div>
                <div style="padding: 15px 5px;">Mon</div>
                <div style="padding: 15px 5px;">Tue</div>
                <div style="padding: 15px 5px;">Wed</div>
                <div style="padding: 15px 5px;">Thu</div>
                <div style="padding: 15px 5px;">Fri</div>
                <div style="padding: 15px 5px;">Sat</div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); text-align: center;">
                <?php
                    $firstDay = $monthlyCalendar->first();
                    $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 0; $i < $dayOfWeek; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div style="padding: 20px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background: #fafafa;"></div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $monthlyCalendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php
                        $isToday = $day->gregorian_date == date('Y-m-d');
                    ?>
                    <div style="padding: 15px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; position: relative; <?php echo e($isToday ? 'background: rgba(var(--gold-rgb), 0.1); border-bottom: 3px solid var(--gold);' : ''); ?>">
                        <div style="font-size: 1.2rem; font-weight: bold; color: <?php echo e($isToday ? 'var(--primary-dark)' : 'var(--primary)'); ?>;"><?php echo e($day->hijri_day); ?></div>
                        <div style="font-size: 0.8rem; color: #999;"><?php echo e(date('j M', strtotime($day->gregorian_date))); ?></div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($historicalEvents) && $historicalEvents->count() > 0): ?>
        <div class="contact-grid" style="margin-bottom: 50px; grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-history" style="color: var(--gold);"></i> On This Day in Islamic History</h3>
                <p style="margin-bottom: 20px;">Events that occurred on <?php echo e($hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'this day'); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $historicalEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div style="margin-bottom: 15px;">
                        <h4 style="margin-bottom: 5px; color: var(--primary-dark);"><?php echo e($event->title); ?></h4>
                        <p style="color: #666; margin-bottom: 5px;"><?php echo e($event->description); ?></p>
                        <p style="font-size: 0.85rem; color: #999; font-style: italic;">Source: <?php echo e($event->source_note); ?></p>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-flag"></i> Localized</div>
            <h2 class="section-title">Select <span>Country</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">∩╖╜</span><span class="line"></span></div>
            <p class="section-subtitle">View local Hijri dates and specific prayer times based on country sightings.</p>
        </div>

        <div class="services-grid">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="service-card" style="text-align: center;">
                <div class="service-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3><?php echo e($country->name); ?></h3>
                <a href="<?php echo e(route('islamic-date.country', ['country' => $country->slug])); ?>" class="service-link">View Dates <i class="fas fa-arrow-right"></i></a>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>

        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Knowledge</div>
            <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">∩╖╜</span><span class="line"></span></div>
        </div>
        
        <div class="contact-grid" style="grid-template-columns: 1fr;" itemscope itemtype="https://schema.org/FAQPage">
            <div class="contact-info">
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px;">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-moon" style="color: var(--gold); margin-right: 10px;"></i>Why does the Islamic day start at sunset, not midnight?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">In the Islamic calendar, a new day begins at Maghrib (sunset), following the lunar cycle. This is rooted in the Quran and Sunnah, where the night precedes the daytime, unlike the Gregorian calendar which starts at midnight.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-calendar-alt" style="color: var(--gold); margin-right: 10px;"></i>Why do Hijri dates shift earlier each Gregorian year?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">The Hijri calendar is strictly lunar, consisting of 354 or 355 days. Because it is approximately 10 to 12 days shorter than the 365-day solar Gregorian year, Islamic dates and months (like Ramadan) shift backward through the seasons each year.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "<?php echo e(url()->current()); ?>",
      "url": "<?php echo e(url()->current()); ?>",
      "name": "Islamic Date Today ΓÇö Hijri Date Worldwide",
      "description": "Find today's Islamic date (Hijri date), moon phase, and upcoming Islamic events worldwide.",
      "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "<?php echo e(route('home')); ?>"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Islamic Date Today",
            "item": "<?php echo e(route('islamic-date.hub')); ?>"
          }
        ]
      }
    }
    <?php if(isset($upcomingEvents) && $upcomingEvents->count() > 0): ?>
    ,<?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    {
      "@type": "Event",
      "name": "<?php echo e($event->name); ?>",
      "description": "<?php echo e($event->description); ?>",
      "startDate": "<?php echo e(date('Y-m-d', strtotime('+' . $event->days_away . ' days'))); ?>",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "Worldwide"
      }
    }<?php echo e($loop->last ? '' : ','); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('converterWidgetForm');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var date = document.getElementById('convDate').value;
            var dir = document.getElementById('convDirection').value;
            var btn = this.querySelector('button');
            var originalBtnText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Converting...';
            btn.disabled = true;

            fetch('/ajax/hijri-convert?date=' + date + '&direction=' + dir)
            .then(res => res.json())
            .then(data => {
                document.getElementById('convResult').style.display = 'block';
                document.getElementById('resText').innerText = data.result_text;
                document.getElementById('resSub').innerText = data.result_subtext;
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            }).catch(err => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
                alert('Conversion failed. Please try again.');
            });
        });
    }
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
