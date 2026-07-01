<?php $__env->startSection('title', 'نورِ اسلام | Noor-e-Islam'); ?>

<?php $__env->startSection('content'); ?>
<section class="hero" id="home">
        <div class="hero-bg-dots"></div>
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>
        <div class="islamic-pattern"></div>
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-star-and-crescent"></i>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($hijriDate)): ?>
                        <?php echo e($hijriDate->hijri_day); ?> <?php echo e($hijriDate->hijri_month); ?> <?php echo e($hijriDate->hijri_year); ?> AH - Welcome to the Path of Peace
                    <?php else: ?>
                        Welcome to the Path of Peace
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="hero-bismillah">بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</div>
                <h1 class="hero-title">Discover the <span>Beauty</span> of Islam</h1>
                <p class="hero-desc">Your gateway to authentic Islamic knowledge, spiritual growth, and community
                    connection. Learn, pray, and grow together on the straight path.</p>
                <div class="hero-buttons">
                    <a href="<?php echo e(route('islamic-date.hub')); ?>" class="btn-primary"><i class="fas fa-calendar-day"></i> Today's Date</a>
                    <a href="#explore" class="btn-outline-hero"><i class="fas fa-compass"></i> Explore More</a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <h3><i class="fas fa-calendar-alt"></i></h3>
                        <p>Hijri Calendar</p>
                    </div>
                    <div class="hero-stat">
                        <h3><i class="fas fa-clock"></i></h3>
                        <p>Prayer Times</p>
                    </div>
                    <div class="hero-stat">
                        <h3><i class="fas fa-book-quran"></i></h3>
                        <p>Quran & Hadith</p>
                    </div>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-mosque-container">
                    <div class="hero-mosque-bg">
                        <img src="<?php echo e(asset('favicon.svg')); ?>" alt="Hero Icon" style="width: 85%; height: auto; border-radius: 50%; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                    </div>
                    <div class="hero-floating-card float-card-1">
                        <i class="fas fa-book-open"></i>
                        <div>
                            <div style="font-weight:600;">Daily Quran</div>
                            <div style="font-size:0.7rem;opacity:0.7;">Read & Reflect</div>
                        </div>
                    </div>
                    <div class="hero-floating-card float-card-2">
                        <i class="fas fa-hands-praying"></i>
                        <div>
                            <div style="font-weight:600;">Prayer Times</div>
                            <div style="font-size:0.7rem;opacity:0.7;">Never Miss Salah</div>
                        </div>
                    </div>
                    <div class="hero-floating-card float-card-3">
                        <i class="fas fa-graduation-cap"></i>
                        <div>
                            <div style="font-weight:600;">Islamic Courses</div>
                            <div style="font-size:0.7rem;opacity:0.7;">Learn Online</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prayer Times -->
    <div class="prayer-ticker">
        <div class="prayer-ticker-inner">
            <div class="prayer-ticker-label"><i class="fas fa-clock"></i> Today's Prayer Times</div>
            <div class="prayer-times-list" id="prayerTimesList">
                <?php
                    $currentPrayerTime = null;
                    if (isset($prayerTimes)) {
                        $currentPrayerTime = $prayerTimes instanceof \Illuminate\Support\Collection ? $prayerTimes->first() : $prayerTimes;
                    }
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($currentPrayerTime): ?>
                    <div class="prayer-time-chip"><span class="prayer-name">Fajr</span><span class="prayer-time-val"><?php echo e(\Carbon\Carbon::parse($currentPrayerTime->fajr)->format('h:i A')); ?></span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Sunrise</span><span class="prayer-time-val"><?php echo e(\Carbon\Carbon::parse($currentPrayerTime->sunrise)->format('h:i A')); ?></span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Dhuhr</span><span class="prayer-time-val"><?php echo e(\Carbon\Carbon::parse($currentPrayerTime->dhuhr)->format('h:i A')); ?></span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Asr</span><span class="prayer-time-val"><?php echo e(\Carbon\Carbon::parse($currentPrayerTime->asr)->format('h:i A')); ?></span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Maghrib</span><span class="prayer-time-val"><?php echo e(\Carbon\Carbon::parse($currentPrayerTime->maghrib)->format('h:i A')); ?></span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Isha</span><span class="prayer-time-val"><?php echo e(\Carbon\Carbon::parse($currentPrayerTime->isha)->format('h:i A')); ?></span></div>
                <?php else: ?>
                    <div class="prayer-time-chip"><span class="prayer-name">Fajr</span><span class="prayer-time-val">05:12 AM</span></div>
                    <div class="prayer-time-chip active"><span class="prayer-name">Sunrise</span><span class="prayer-time-val">06:28 AM</span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Dhuhr</span><span class="prayer-time-val">12:35 PM</span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Asr</span><span class="prayer-time-val">04:02 PM</span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Maghrib</span><span class="prayer-time-val">06:48 PM</span></div>
                    <div class="prayer-time-chip"><span class="prayer-name">Isha</span><span class="prayer-time-val">08:15 PM</span></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>

    <!-- About -->
    <section class="section about-section" id="about">
        <div class="islamic-pattern"></div>
        <div class="section-inner">
            <div class="about-grid">
                <div class="about-image-wrapper">
                    <div class="about-image-main">
                        <div style="background: var(--primary); width: 100%; height: 100%; min-height: 400px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                            <img src="<?php echo e(asset('favicon.svg')); ?>" alt="About Icon" style="width: 250px; height: auto; border-radius: 50%; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
                        </div>
                        <div class="about-image-overlay"></div>
                    </div>
                    <div class="about-image-frame"></div>
                    <div class="about-experience-badge">
                        <h3><i class="fas fa-globe"></i></h3>
                        <p>Worldwide</p>
                    </div>
                </div>
                <div class="about-content">
                    <div class="section-badge"><i class="fas fa-info-circle"></i> Discover</div>
                    <h2>Your Gateway to <span>Islamic</span> Knowledge</h2>
                    <div class="about-arabic-line">إِنَّ مَعَ الْعُسْرِ يُسْرًا</div>
                    <p>Noor-e-Islam provides accurate and reliable Islamic resources for Muslims worldwide. From looking up today's Hijri date and finding local prayer times, to reading the Holy Quran and authentic Hadith collections.</p>
                    <p>Our goal is to make essential daily Islamic information accessible and easy to use on any device.</p>
                    <div class="about-features">
                        <div class="about-feature"><i class="fas fa-calendar-day"></i><span>Live Hijri Date</span></div>
                        <div class="about-feature"><i class="fas fa-clock"></i><span>Prayer Times by City</span></div>
                        <div class="about-feature"><i class="fas fa-book-open"></i><span>Surah & Fazilat</span></div>
                        <div class="about-feature"><i class="fas fa-scroll"></i><span>Authentic Hadith</span></div>
                        <div class="about-feature"><i class="fas fa-exchange-alt"></i><span>Hijri Converter</span></div>
                        <div class="about-feature"><i class="fas fa-language"></i><span>Bilingual Urdu/English</span></div>
                    </div>
                    <a href="#explore" class="btn-primary" style="margin-top:8px;"><i class="fas fa-arrow-right"></i>
                        Explore Features</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pillars -->
    <section class="section pillars-section" id="pillars">
        <div class="section-inner">
            <div class="section-header">
                <div class="section-badge"><i class="fas fa-star-and-crescent"></i> Foundation</div>
                <h2 class="section-title">Five Pillars of <span>Islam</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span
                        class="line"></span></div>
                <p class="section-subtitle">The five fundamental acts of worship that form the foundation of a Muslim's
                    life and faith.</p>
            </div>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="pillar-number">1</div>
                    <span class="pillar-icon">🤲</span>
                    <h3>Shahada</h3>
                    <h4>الشهادة</h4>
                    <p>Declaration of faith bearing witness that there is no god but Allah and Muhammad is His
                        messenger.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-number">2</div>
                    <span class="pillar-icon">🕌</span>
                    <h3>Salah</h3>
                    <h4>الصلاة</h4>
                    <p>Performing the five daily prayers as a direct link between the worshipper and Allah.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-number">3</div>
                    <span class="pillar-icon">💰</span>
                    <h3>Zakat</h3>
                    <h4>الزكاة</h4>
                    <p>Giving a fixed proportion of one's wealth to charity for the benefit of the less fortunate.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-number">4</div>
                    <span class="pillar-icon">🌙</span>
                    <h3>Sawm</h3>
                    <h4>الصوم</h4>
                    <p>Fasting during the holy month of Ramadan from dawn until sunset for spiritual purification.</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-number">5</div>
                    <span class="pillar-icon">🕋</span>
                    <h3>Hajj</h3>
                    <h4>الحج</h4>
                    <p>The pilgrimage to Makkah at least once in a lifetime for those who are physically and financially
                        able.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quran Verses -->
    <section class="section quran-section" id="quran">
        <div class="islamic-pattern"></div>
        <div class="section-inner">
            <div class="section-header">
                <div class="section-badge"><i class="fas fa-book-quran"></i> Divine Words</div>
                <h2 class="section-title">Verses from the <span>Holy Quran</span></h2>
                <div class="arabic-divider"><span class="line"
                        style="background:linear-gradient(to right,transparent,rgba(184,134,59,0.5),transparent)"></span><span
                        class="symbol" style="color:var(--gold-light)">﷽</span><span class="line"
                        style="background:linear-gradient(to right,transparent,rgba(184,134,59,0.5),transparent)"></span>
                </div>
                <p class="section-subtitle">Reflect upon the timeless wisdom and guidance from the Noble Quran.</p>
            </div>
            <div class="quran-verse-carousel">
                <div class="quran-verse-slide active">
                    <div class="quran-verse-arabic">بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ ٱلْحَمْدُ لِلَّهِ رَبِّ
                        ٱلْعَٰلَمِينَ</div>
                    <div class="quran-verse-translation">"In the name of Allah, the Most Gracious, the Most Merciful.
                        All praise is due to Allah, Lord of all the worlds."</div>
                    <div class="quran-verse-ref"><i class="fas fa-book-open"></i> Surah Al-Fatiha — 1:1-2</div>
                </div>
                <div class="quran-verse-slide">
                    <div class="quran-verse-arabic">وَمَن يَتَوَكَّلْ عَلَى ٱللَّهِ فَهُوَ حَسْبُهُ</div>
                    <div class="quran-verse-translation">"And whoever puts their trust in Allah, then He alone is
                        sufficient for them."</div>
                    <div class="quran-verse-ref"><i class="fas fa-book-open"></i> Surah At-Talaq — 65:3</div>
                </div>
                <div class="quran-verse-slide">
                    <div class="quran-verse-arabic">إِنَّ مَعَ ٱلْعُسْرِ يُسْرًا</div>
                    <div class="quran-verse-translation">"Indeed, with hardship comes ease."</div>
                    <div class="quran-verse-ref"><i class="fas fa-book-open"></i> Surah Ash-Sharh — 94:6</div>
                </div>
                <div class="quran-verse-slide">
                    <div class="quran-verse-arabic">وَلَذِكْرُ ٱللَّهِ أَكْبَرُ</div>
                    <div class="quran-verse-translation">"And the remembrance of Allah is the greatest."</div>
                    <div class="quran-verse-ref"><i class="fas fa-book-open"></i> Surah Al-Ankabut — 29:45</div>
                </div>
                <div class="quran-verse-slide">
                    <div class="quran-verse-arabic">رَبَّنَا آتِنَا فِى ٱلدُّنْيَا حَسَنَةً وَفِى ٱلْآخِرَةِ حَسَنَةً
                        وَقِنَا عَذَابَ ٱلنَّارِ</div>
                    <div class="quran-verse-translation">"Our Lord, give us good in this world and good in the
                        Hereafter, and protect us from the punishment of the Fire."</div>
                    <div class="quran-verse-ref"><i class="fas fa-book-open"></i> Surah Al-Baqarah — 2:201</div>
                </div>
                <div class="quran-carousel-controls">
                    <button class="quran-carousel-btn" id="quranPrev" aria-label="Previous"><i
                            class="fas fa-chevron-left"></i></button>
                    <div class="quran-carousel-dots" id="quranDots"></div>
                    <button class="quran-carousel-btn" id="quranNext" aria-label="Next"><i
                            class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Surahs -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($popularSurahs) && $popularSurahs->count() > 0): ?>
    <section class="section compact-features-section" id="popular-surahs" style="background: var(--secondary-light); padding-top: 60px; padding-bottom: 60px;">
        <div class="section-inner">
            <div class="section-header" style="margin-bottom: 40px; position: relative;">
                <div class="section-badge"><i class="fas fa-book-open"></i> Read Quran</div>
                <h2 class="section-title">Popular <span>Surahs</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
                <p class="section-subtitle">Frequently recited chapters of the Holy Quran for daily spiritual benefit.</p>
                <div style="margin-top: 20px;">
                    <a href="<?php echo e(route('surah.index')); ?>" class="btn-primary" style="padding: 8px 25px; border-radius: 25px; font-size: 0.95rem; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fas fa-list-ul"></i> View All 114 Surahs
                    </a>
                </div>
            </div>
            
            <style>
                .surah-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                    gap: 20px;
                }
                .surah-card {
                    background: var(--white);
                    border: 1px solid rgba(17, 70, 121, 0.08);
                    border-radius: var(--radius-md);
                    padding: 25px 20px;
                    text-align: center;
                    transition: var(--tr);
                    text-decoration: none;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    position: relative;
                    overflow: hidden;
                }
                .surah-card::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 4px;
                    background: var(--primary);
                    opacity: 0;
                    transition: var(--tr);
                }
                .surah-card:hover {
                    transform: translateY(-5px);
                    box-shadow: var(--shadow-md);
                    border-color: transparent;
                }
                .surah-card:hover::before {
                    opacity: 1;
                }
                .surah-number {
                    width: 40px;
                    height: 40px;
                    background: var(--primary-light);
                    color: var(--primary);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-weight: 700;
                    margin-bottom: 15px;
                    font-size: 0.9rem;
                }
                .surah-card:hover .surah-number {
                    background: var(--primary);
                    color: var(--white);
                }
                .surah-name-en {
                    font-size: 1.25rem;
                    font-weight: 700;
                    color: var(--text-dark);
                    margin-bottom: 5px;
                }
                .surah-name-ur {
                    font-family: 'Jameel Noori Nastaleeq', 'Noto Naskh Arabic', serif;
                    font-size: 1.5rem;
                    color: var(--gold);
                    margin-bottom: 10px;
                }
                .surah-meta {
                    font-size: 0.85rem;
                    color: var(--text-light);
                    margin-bottom: 20px;
                }
                .surah-meta i {
                    margin-right: 5px;
                    color: var(--primary);
                }
                .btn-surah {
                    display: inline-block;
                    padding: 8px 20px;
                    background: var(--secondary-light);
                    color: var(--primary);
                    border-radius: 20px;
                    font-size: 0.85rem;
                    font-weight: 600;
                    transition: var(--tr);
                    border: 1px solid rgba(17, 70, 121, 0.1);
                }
                .surah-card:hover .btn-surah {
                    background: var(--primary);
                    color: var(--white);
                }
            </style>

            <div class="surah-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $popularSurahs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <a href="<?php echo e(route('surah.show', $surah->slug)); ?>" class="surah-card">
                    <div class="surah-number"><?php echo e($surah->number); ?></div>
                    <div class="surah-name-ur"><?php echo e($surah->name_ur); ?></div>
                    <div class="surah-name-en">Surah <?php echo e($surah->name_en); ?></div>
                    <div class="surah-meta">
                        <span><i class="fas fa-layer-group"></i> <?php echo e($surah->ayah_count); ?> Ayahs</span>
                    </div>
                    <div class="btn-surah">Read Surah</div>
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Explore -->
    <section class="section services-section" id="explore">
        <div class="section-inner">
            <div class="section-header">
                <div class="section-badge"><i class="fas fa-compass"></i> Discover</div>
                <h2 class="section-title">Explore <span>Features</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span
                        class="line"></span></div>
                <p class="section-subtitle">Everything you need for your daily Islamic life, completely free.</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-calendar-day"></i></div>
                    <h3>Islamic Date Today</h3>
                    <p>Check the accurate Hijri date for your country according to local moon sighting authorities.</p>
                    <a href="<?php echo e(route('islamic-date.hub')); ?>" class="service-link">View Date <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-clock"></i></div>
                    <h3>Prayer Times</h3>
                    <p>Get accurate daily prayer times (Salah) and monthly timetables for major cities worldwide.</p>
                    <a href="<?php echo e(route('prayer-times.hub')); ?>" class="service-link">View Prayer Times <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-scroll"></i></div>
                    <h3>Authentic Hadith</h3>
                    <p>Read collections of authentic Ahadith categorized by topic for easy understanding and guidance.</p>
                    <a href="<?php echo e(route('hadith.index')); ?>" class="service-link">Read Hadith <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-exchange-alt"></i></div>
                    <h3>Hijri Converter</h3>
                    <p>Easily convert dates between the Gregorian calendar and the Islamic Hijri calendar.</p>
                    <a href="<?php echo e(route('converter.show')); ?>" class="service-link">Use Converter <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h3>Islamic Calendar</h3>
                    <p>Explore the full Islamic year, significant dates, and major events like Ramadan and Eid.</p>
                    <a href="<?php echo e(route('events.index')); ?>" class="service-link">View Calendar <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ayah of the Day -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($ayahOfDay)): ?>
    <section class="section" id="ayah-of-day" style="background: var(--white); padding: 40px 0;">
        <div class="section-inner" style="text-align: center;">
            <h2 class="section-title" style="font-size: 2rem;">Ayah of the <span>Day</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <div style="font-size: 2.5rem; color: var(--gold); margin: 20px 0; font-family: 'Jameel Noori Nastaleeq', 'Amiri', serif; line-height: 1.5;"><?php echo e($ayahOfDay->text_ar); ?></div>
            <p style="font-size: 1.2rem; color: var(--text-dark); max-width: 800px; margin: 0 auto; line-height: 1.6;">"<?php echo e($ayahOfDay->translation_en); ?>"</p>
            <p style="color: var(--text-light); margin-top: 10px;"><?php echo e($ayahOfDay->translation_ur); ?></p>
            <p style="font-weight: 600; color: var(--primary); margin-top: 15px;">Surah <?php echo e($ayahOfDay->surah->name_en ?? 'Unknown'); ?>, Ayah <?php echo e($ayahOfDay->ayah_number); ?></p>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- 99 Names of Allah -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($allahNames) && $allahNames->count() > 0): ?>
    <section class="section" id="99-names" style="background: var(--secondary-light); padding: 60px 0;">
        <div class="section-inner">
            <div class="section-header" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 30px;">
                <div>
                    <h2 class="section-title" style="font-size: 2rem; margin-bottom: 0;">99 Names of <span>Allah</span></h2>
                </div>
                <a href="<?php echo e(route('names_allah.index')); ?>" class="btn-primary" style="padding: 8px 20px; border-radius: 20px; font-size: 0.9rem;">View All Names</a>
            </div>
            <div style="display: flex; gap: 15px; overflow-x: auto; padding-bottom: 20px; scrollbar-width: none;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allahNames->take(12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div style="min-width: 140px; background: var(--white); padding: 25px 15px; border-radius: 12px; text-align: center; border: 1px solid rgba(17, 70, 121, 0.08); box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                    <div style="font-size: 1.8rem; color: var(--gold); font-family: 'Amiri', serif; margin-bottom: 10px;"><?php echo e($name->arabic); ?></div>
                    <div style="font-weight: 700; color: var(--primary); font-size: 1.1rem;"><?php echo e($name->transliteration); ?></div>
                    <div style="font-size: 0.8rem; color: var(--text-light); margin-top: 5px;"><?php echo e(Str::limit($name->meaning_english, 20)); ?></div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Latest Articles -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($latestArticles) && $latestArticles->count() > 0): ?>
    <section class="section" id="latest-articles" style="background: var(--white); padding: 60px 0;">
        <div class="section-inner">
            <div class="section-header" style="margin-bottom: 30px;">
                <h2 class="section-title" style="font-size: 2rem;">Latest <span>Articles</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 25px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $latestArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div style="background: var(--white); border: 1px solid rgba(17, 70, 121, 0.1); border-radius: 12px; overflow: hidden; transition: var(--tr); box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                    <div style="padding: 25px;">
                        <span style="font-size: 0.8rem; color: var(--gold); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;"><?php echo e($article->category->name ?? 'Knowledge'); ?></span>
                        <h3 style="font-size: 1.3rem; margin: 10px 0; color: var(--text-dark); line-height: 1.4;"><?php echo e($article->title); ?></h3>
                        <p style="color: var(--text-light); font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;"><?php echo e(Str::limit($article->excerpt, 120)); ?></p>
                        <a href="<?php echo e(route('blog.show', $article->slug)); ?>" style="color: var(--primary); font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">Read Article <i class="fas fa-arrow-right" style="font-size: 0.8rem;"></i></a>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Islamic Events -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($upcomingEvents) && $upcomingEvents->count() > 0): ?>
    <section class="section" id="upcoming-events" style="background: var(--secondary-light); padding: 60px 0;">
        <div class="section-inner">
            <div class="section-header" style="margin-bottom: 30px;">
                <h2 class="section-title" style="font-size: 2rem;">Upcoming <span>Events</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <div style="background: var(--white); padding: 20px; border-radius: 10px; display: flex; align-items: center; gap: 20px; border-left: 4px solid var(--primary); box-shadow: 0 4px 10px rgba(0,0,0,0.03);">
                    <div style="background: var(--primary-light); color: var(--primary); padding: 10px; border-radius: 8px; text-align: center; min-width: 60px;">
                        <div style="font-size: 1.2rem; font-weight: 700;"><?php echo e($event->hijri_day); ?></div>
                        <div style="font-size: 0.8rem; font-weight: 600; text-transform: uppercase;"><?php echo e(substr($event->hijri_month, 0, 3)); ?></div>
                    </div>
                    <div>
                        <h3 style="font-size: 1.1rem; color: var(--text-dark); margin-bottom: 5px;"><?php echo e($event->name); ?></h3>
                        <p style="font-size: 0.85rem; color: var(--text-light); margin: 0;"><i class="far fa-calendar-alt" style="margin-right: 5px; color: var(--gold);"></i> Expected: <?php echo e(\Carbon\Carbon::parse($event->estimated_gregorian_date)->format('M d, Y')); ?></p>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- More Resources -->
    <section class="section compact-features-section" id="more-features" style="background: var(--white); padding-top: 40px; padding-bottom: 90px;">
        <div class="section-inner">
            <div class="section-header" style="margin-bottom: 30px;">
                <h2 class="section-title" style="font-size: 2rem;">More <span>Resources</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>
            
            <style>
                .compact-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
                    gap: 15px;
                }
                .compact-card {
                    background: var(--secondary-light);
                    border: 1px solid rgba(17, 70, 121, 0.06);
                    border-radius: var(--radius-md);
                    padding: 25px 15px;
                    text-align: center;
                    transition: var(--tr);
                    text-decoration: none;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    gap: 12px;
                }
                .compact-card:hover {
                    background: var(--white);
                    border-color: var(--primary);
                    box-shadow: var(--shadow-sm);
                    transform: translateY(-3px);
                }
                .compact-icon {
                    font-size: 1.8rem;
                    color: var(--primary);
                    transition: var(--tr);
                    margin-bottom: 5px;
                }
                .compact-card:hover .compact-icon {
                    color: var(--gold);
                }
                .compact-title {
                    font-size: 0.85rem;
                    font-weight: 600;
                    color: var(--text-dark);
                    line-height: 1.2;
                }
                @media (max-width: 480px) {
                    .compact-grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
            </style>

            <div class="compact-grid">
                <a href="<?php echo e(route('namaz.index')); ?>" class="compact-card">
                    <i class="fas fa-praying-hands compact-icon"></i>
                    <span class="compact-title">Learn Salah</span>
                </a>
                <a href="<?php echo e(route('zakat.index')); ?>" class="compact-card">
                    <i class="fas fa-hand-holding-usd compact-icon"></i>
                    <span class="compact-title">Zakat Portal</span>
                </a>
                <a href="<?php echo e(route('quran.index')); ?>" class="compact-card">
                    <i class="fas fa-book-open compact-icon"></i>
                    <span class="compact-title">Holy Quran</span>
                </a>
                <a href="<?php echo e(route('ramadan.calendar')); ?>" class="compact-card">
                    <i class="fas fa-moon compact-icon"></i>
                    <span class="compact-title">Ramadan Hub</span>
                </a>
                <a href="<?php echo e(route('hajj_umrah.index')); ?>" class="compact-card">
                    <i class="fas fa-kaaba compact-icon"></i>
                    <span class="compact-title">Hajj & Umrah</span>
                </a>
                <a href="<?php echo e(route('tools.qibla')); ?>" class="compact-card">
                    <i class="fas fa-compass compact-icon"></i>
                    <span class="compact-title">Qibla Finder</span>
                </a>
                <a href="<?php echo e(route('tools.age')); ?>" class="compact-card">
                    <i class="fas fa-calculator compact-icon"></i>
                    <span class="compact-title">Age Calc</span>
                </a>
                <a href="<?php echo e(route('knowledge.index')); ?>" class="compact-card">
                    <i class="fas fa-brain compact-icon"></i>
                    <span class="compact-title">Knowledge</span>
                </a>

            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="section contact-section" id="contact">
        <div class="section-inner">
            <div class="section-header">
                <div class="section-badge"><i class="fas fa-envelope"></i> Get In Touch</div>
                <h2 class="section-title">Contact <span>Us</span></h2>
                <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            </div>
            <div style="text-align: center; max-width: 600px; margin: 0 auto; padding: 40px; background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                <i class="fas fa-paper-plane" style="font-size: 3rem; color: var(--gold); margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 15px;">We're Here to Help</h3>
                <p style="margin-bottom: 30px; color: #666;">Whether you have a question about our Islamic tools, found a bug, or simply want to say salam, our doors and hearts are always open.</p>
                <a href="<?php echo e(route('contact')); ?>" class="btn-primary" style="display: inline-block;"><i class="fas fa-envelope"></i> Send a Message</a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<!-- generated_at: <?php echo e(now()->toDateTimeString()); ?> -->


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/home.blade.php ENDPATH**/ ?>