<?php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
?>
<?php $__env->startSection('title', 'Islamic Date Today — Hijri Date Worldwide, ' . $titleHijri); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    :root {
        --primary-hue: 158;
        --primary: hsl(var(--primary-hue), 84%, 39%);
        --primary-light: hsl(var(--primary-hue), 84%, 90%);
        --primary-dark: hsl(var(--primary-hue), 90%, 20%);
        --accent: #F59E0B;
        --accent-light: #FEF3C7;
        
        --bg-main: #F8FAFC;
        --surface: #FFFFFF;
        --text-main: #0F172A;
        --text-muted: #64748B;
        --border-color: #E2E8F0;
        
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.05);
        --shadow-md: 0 4px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -4px rgba(0,0,0,0.02);
        --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.05), 0 8px 10px -6px rgba(0,0,0,0.01);
        --shadow-glow: 0 10px 40px -10px rgba(16, 185, 129, 0.3);
        
        --radius-lg: 24px;
        --radius-md: 16px;
        --radius-sm: 10px;
    }

    body {
        background-color: var(--bg-main);
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--text-main);
    }

    .premium-dashboard {
        padding: 40px 0 80px;
        position: relative;
    }

    /* Ambient Background Glow */
    .premium-dashboard::before {
        content: '';
        position: absolute;
        top: -100px;
        left: 50%;
        transform: translateX(-50%);
        width: 1000px;
        height: 600px;
        background: radial-gradient(ellipse at top, rgba(16, 185, 129, 0.15) 0%, rgba(248, 250, 252, 0) 70%);
        pointer-events: none;
        z-index: 0;
    }

    .container-dashboard {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 1;
    }

    h1, h2, h3, h4, h5, h6, .outfit-font {
        font-family: 'Outfit', sans-serif;
    }

    /* BREADCRUMB */
    .premium-breadcrumb {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.7);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 100px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-muted);
        border: 1px solid rgba(255,255,255,0.4);
        box-shadow: var(--shadow-sm);
        margin-bottom: 24px;
    }
    .premium-breadcrumb a {
        color: var(--primary);
        text-decoration: none;
        transition: color 0.2s;
    }
    .premium-breadcrumb a:hover { color: var(--primary-dark); }
    .premium-breadcrumb span { color: var(--text-main); }

    /* GRID SYSTEM */
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    @media (min-width: 992px) {
        .dashboard-grid {
            grid-template-columns: 8fr 4fr;
            align-items: start;
        }
    }

    /* GLASS CARD BASE */
    .glass-card {
        background: var(--surface);
        border-radius: var(--radius-lg);
        padding: 32px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(255,255,255,0.8);
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .glass-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }
    .card-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
    }
    .card-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-sm);
        background: var(--primary-light);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .card-icon.gold {
        background: var(--accent-light);
        color: var(--accent);
    }
    .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-main);
        margin: 0;
    }

    /* HERO BANNER */
    .hero-banner {
        background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
        border-radius: var(--radius-lg);
        padding: 48px 40px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: var(--shadow-glow);
    }
    .hero-banner::after {
        content: '';
        position: absolute;
        top: 0; right: 0; bottom: 0; left: 0;
        background: url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M50 0L100 50L50 100L0 50Z" fill="white" fill-opacity="0.03"/></svg>') repeat;
        background-size: 120px;
        pointer-events: none;
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-gregorian {
        font-size: 1.1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: rgba(255,255,255,0.8);
        margin-bottom: 8px;
    }
    .hero-hijri {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 12px;
        text-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    @media (min-width: 768px) {
        .hero-hijri { font-size: 5rem; }
    }
    .hero-year {
        font-size: 2rem;
        font-weight: 500;
        color: var(--accent);
    }

    /* MOON PHASE WIDGET */
    .moon-widget {
        text-align: center;
        padding: 40px 24px;
        background: linear-gradient(180deg, var(--surface) 0%, var(--bg-main) 100%);
    }
    .moon-icon-wrapper {
        font-size: 5rem;
        color: var(--accent);
        margin-bottom: 20px;
        filter: drop-shadow(0 0 20px rgba(245, 158, 11, 0.4));
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    .moon-name {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--text-main);
        margin-bottom: 8px;
    }
    .moon-desc {
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin: 0;
    }

    /* EVENTS LIST */
    .event-list { display: flex; flex-direction: column; gap: 16px; }
    .event-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        background: var(--bg-main);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        transition: all 0.2s;
    }
    .event-item:hover {
        background: var(--surface);
        border-color: var(--primary);
        box-shadow: var(--shadow-md);
    }
    .event-info h4 {
        margin: 0 0 4px 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-main);
    }
    .event-info p {
        margin: 0;
        font-size: 0.9rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .event-countdown {
        text-align: right;
    }
    .event-countdown .days {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary);
        font-family: 'Outfit', sans-serif;
        line-height: 1;
    }
    .event-countdown .label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: var(--text-muted);
        letter-spacing: 0.5px;
        margin-top: 4px;
    }

    /* CALENDAR GRID */
    .calendar-container {
        background: var(--surface);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }
    .cal-header {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: var(--primary-light);
        border-bottom: 1px solid var(--primary);
    }
    .cal-day-name {
        padding: 16px 8px;
        text-align: center;
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--primary-dark);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .cal-body {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: #F1F5F9;
        gap: 1px;
    }
    .cal-cell {
        background: var(--surface);
        padding: 16px 10px;
        min-height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: background 0.2s;
    }
    .cal-cell:hover { background: var(--bg-main); }
    .cal-cell.empty { background: transparent; }
    .cal-cell.today {
        background: var(--accent-light);
        position: relative;
    }
    .cal-cell.today::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: var(--accent);
    }
    .cal-hijri-num {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--text-main);
        font-family: 'Outfit', sans-serif;
        line-height: 1.2;
    }
    .cal-cell.today .cal-hijri-num { color: var(--accent); }
    .cal-greg-num {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
    }

    /* HISTORY LOG */
    .history-timeline {
        position: relative;
        padding-left: 24px;
    }
    .history-timeline::before {
        content: '';
        position: absolute;
        left: 0; top: 8px; bottom: 0;
        width: 2px;
        background: var(--border-color);
    }
    .history-item {
        position: relative;
        margin-bottom: 32px;
    }
    .history-item:last-child { margin-bottom: 0; }
    .history-item::before {
        content: '';
        position: absolute;
        left: -29px;
        top: 6px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--primary);
        box-shadow: 0 0 0 4px var(--primary-light);
    }
    .history-item h4 {
        margin: 0 0 8px 0;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-main);
    }
    .history-item p {
        margin: 0 0 12px 0;
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.6;
    }
    .history-source {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: var(--bg-main);
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-muted);
    }

    /* FASTING ALERT */
    .fasting-alert {
        background: linear-gradient(to right, var(--accent-light), rgba(254, 243, 199, 0.4));
        border-left: 4px solid var(--accent);
        border-radius: var(--radius-md);
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }
    .fasting-icon {
        font-size: 2rem;
        color: var(--accent);
    }
    .fasting-content h4 {
        margin: 0 0 4px 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #B45309; /* Dark Amber */
    }
    .fasting-content p {
        margin: 0;
        font-size: 0.95rem;
        color: #92400E;
    }

    /* CONVERTER */
    .modern-input {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid var(--border-color);
        border-radius: var(--radius-sm);
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 1rem;
        font-weight: 500;
        color: var(--text-main);
        background: var(--surface);
        transition: all 0.2s;
    }
    .modern-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--primary-light);
        outline: none;
    }
    .btn-convert {
        width: 100%;
        padding: 14px 24px;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius-sm);
        font-family: 'Outfit', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    .btn-convert:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* COUNTRY GRID */
    .country-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 16px;
    }
    .country-card {
        background: var(--bg-main);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        padding: 24px 20px;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }
    .country-card:hover {
        background: var(--surface);
        border-color: var(--primary);
        transform: translateY(-4px);
        box-shadow: var(--shadow-md);
    }
    .country-card i {
        font-size: 2rem;
        color: var(--primary);
    }
    .country-card span {
        font-family: 'Outfit', sans-serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-main);
    }

    /* FAQ */
    .faq-item {
        background: var(--bg-main);
        border-radius: var(--radius-md);
        padding: 24px;
        margin-bottom: 16px;
    }
    .faq-item h4 {
        margin: 0 0 12px 0;
        font-size: 1.15rem;
        color: var(--primary-dark);
    }
    .faq-item p {
        margin: 0;
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

</style>

<div class="premium-dashboard">
    <div class="container-dashboard">
        
        <!-- Breadcrumb -->
        <div class="premium-breadcrumb">
            <a href="<?php echo e(route('home')); ?>"><i class="fas fa-home"></i> Home</a> 
            <i class="fas fa-chevron-right" style="font-size: 10px; opacity: 0.5;"></i> 
            <span>Islamic Date Today</span>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($fastingDays) > 0): ?>
        <!-- Fasting Alert -->
        <div class="fasting-alert">
            <i class="fas fa-star-and-crescent fasting-icon"></i>
            <div class="fasting-content">
                <h4 class="outfit-font">Sunnah Fasting Today</h4>
                <p>Today is highly recommended for fasting: <strong><?php echo e(implode(', ', $fastingDays)); ?></strong>.</p>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <!-- HERO -->
        <div class="hero-banner">
            <div class="hero-content">
                <div class="hero-gregorian"><?php echo e(date('l, d F Y')); ?></div>
                <div class="hero-hijri outfit-font">
                    <?php echo e($hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah'); ?>

                </div>
                <div class="hero-year outfit-font"><?php echo e($hijriDate ? $hijriDate->hijri_year : '1446'); ?> AH</div>
            </div>
        </div>

        <!-- MAIN GRID -->
        <div class="dashboard-grid">
            
            <!-- LEFT COLUMN (Main Content) -->
            <div class="grid-left">
                
                <!-- CALENDAR -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0): ?>
                <div class="glass-card mb-4" style="margin-bottom: 24px;">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-calendar-alt"></i></div>
                        <h2 class="card-title">Hijri Calendar — <?php echo e($hijriDate->hijri_month ?? 'Current Month'); ?></h2>
                    </div>
                    
                    <div class="calendar-container">
                        <div class="cal-header">
                            <div class="cal-day-name">Sun</div>
                            <div class="cal-day-name">Mon</div>
                            <div class="cal-day-name">Tue</div>
                            <div class="cal-day-name">Wed</div>
                            <div class="cal-day-name">Thu</div>
                            <div class="cal-day-name">Fri</div>
                            <div class="cal-day-name">Sat</div>
                        </div>
                        <div class="cal-body">
                            <?php
                                $firstDay = $monthlyCalendar->first();
                                $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                            ?>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($i = 0; $i < $dayOfWeek; $i++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div class="cal-cell empty"></div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $monthlyCalendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <?php $isToday = $day->gregorian_date == date('Y-m-d'); ?>
                                <div class="cal-cell <?php echo e($isToday ? 'today' : ''); ?>">
                                    <div class="cal-hijri-num"><?php echo e($day->hijri_day); ?></div>
                                    <div class="cal-greg-num"><?php echo e(date('j M', strtotime($day->gregorian_date))); ?></div>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <!-- HISTORY LOG -->
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($historicalEvents) && $historicalEvents->count() > 0): ?>
                <div class="glass-card mb-4" style="margin-bottom: 24px;">
                    <div class="card-header">
                        <div class="card-icon gold"><i class="fas fa-history"></i></div>
                        <h2 class="card-title">On This Day in Islamic History</h2>
                    </div>
                    
                    <div class="history-timeline">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $historicalEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="history-item">
                                <h4 class="outfit-font"><?php echo e($event->title); ?></h4>
                                <p><?php echo e($event->description); ?></p>
                                <div class="history-source">
                                    <i class="fas fa-book-open"></i> <?php echo e($event->source_note); ?>

                                </div>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <!-- COUNTRIES -->
                <div class="glass-card mb-4" style="margin-bottom: 24px;">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-globe-asia"></i></div>
                        <div>
                            <h2 class="card-title">Localized Dates by Country</h2>
                            <p style="margin: 4px 0 0; color: var(--text-muted); font-size: 0.9rem;">View Hijri dates based on official regional moon sightings.</p>
                        </div>
                    </div>
                    
                    <div class="country-grid">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <a href="<?php echo e(route('islamic-date.country', ['country' => $country->slug])); ?>" class="country-card">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo e($country->name); ?></span>
                        </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="glass-card" itemscope itemtype="https://schema.org/FAQPage">
                    <div class="card-header">
                        <div class="card-icon gold"><i class="fas fa-question-circle"></i></div>
                        <h2 class="card-title">Frequently Asked Questions</h2>
                    </div>
                    
                    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name" class="outfit-font">Why does the Islamic day start at sunset?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text">In the Islamic calendar, a new day begins at Maghrib (sunset), following the lunar cycle. This is rooted in the Quran and Sunnah, where the night precedes the daytime.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <h4 itemprop="name" class="outfit-font">Why do Hijri dates shift each Gregorian year?</h4>
                        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <p itemprop="text">The Hijri calendar is purely lunar, consisting of 354 or 355 days. Because it is about 11 days shorter than the solar year, Islamic dates shift backward through the seasons annually.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN (Sidebar Content) -->
            <div class="grid-right">
                
                <!-- MOON PHASE -->
                <div class="glass-card moon-widget mb-4" style="margin-bottom: 24px;">
                    <div class="moon-icon-wrapper">
                        <i class="fas <?php echo e($moonPhase['icon'] ?? 'fa-moon'); ?>"></i>
                    </div>
                    <h3 class="moon-name outfit-font"><?php echo e($moonPhase['name'] ?? 'Unknown Phase'); ?></h3>
                    <p class="moon-desc"><?php echo e($moonPhase['description'] ?? ''); ?></p>
                </div>

                <!-- UPCOMING EVENTS -->
                <div class="glass-card mb-4" style="margin-bottom: 24px;">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-star"></i></div>
                        <h2 class="card-title">Upcoming Events</h2>
                    </div>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($upcomingEvents) && $upcomingEvents->count() > 0): ?>
                        <div class="event-list">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="event-item">
                                <div class="event-info">
                                    <h4 class="outfit-font"><?php echo e($event->name); ?></h4>
                                    <p><i class="fas fa-calendar-day" style="color: var(--primary);"></i> <?php echo e($event->hijri_day); ?> <?php echo e($event->hijriMonth->name_en ?? ''); ?></p>
                                </div>
                                <div class="event-countdown">
                                    <div class="days"><?php echo e($event->days_away); ?></div>
                                    <div class="label">Days</div>
                                </div>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div style="text-align: center; padding: 20px; color: var(--text-muted);">
                            No upcoming events.
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- CONVERTER -->
                <div class="glass-card mb-4">
                    <div class="card-header">
                        <div class="card-icon"><i class="fas fa-exchange-alt"></i></div>
                        <h2 class="card-title">Date Converter</h2>
                    </div>
                    
                    <form id="converterWidgetForm">
                        <div style="margin-bottom: 16px;">
                            <label style="display:block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: var(--text-muted);">Conversion Type</label>
                            <select id="convDirection" class="modern-input">
                                <option value="g2h">Gregorian to Hijri</option>
                                <option value="h2g">Hijri to Gregorian</option>
                            </select>
                        </div>
                        <div style="margin-bottom: 24px;">
                            <label style="display:block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; color: var(--text-muted);">Select Date</label>
                            <input type="date" id="convDate" required class="modern-input">
                        </div>
                        <button type="submit" class="btn-convert">
                            <i class="fas fa-sync"></i> Convert Now
                        </button>
                    </form>

                    <div id="convResult" style="display: none; margin-top: 24px; padding: 20px; background: var(--bg-main); border-radius: var(--radius-sm); text-align: center; border: 1px dashed var(--primary);">
                        <h4 id="resText" class="outfit-font" style="margin: 0 0 8px 0; color: var(--primary-dark); font-size: 1.3rem;"></h4>
                        <p id="resSub" style="margin: 0; color: var(--text-muted); font-size: 0.95rem;"></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

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
      "name": "Islamic Date Today — Hijri Date Worldwide",
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