<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($seoMeta) && $seoMeta->title ? $seoMeta->title : View::getSection('title', 'نورِ اسلام | Noor-e-Islam') }}</title>
    <meta name="description" content="{{ isset($seoMeta) && $seoMeta->meta_description ? $seoMeta->meta_description : View::getSection('meta_description', 'Noor-e-Islam: Accurate Islamic knowledge, prayer times, and Quran.') }}">

    <!-- SEO Canonical and Hreflang -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="canonical" href="{{ isset($seoMeta) && $seoMeta->canonical_url ? $seoMeta->canonical_url : url()->current() }}">

    @if(isset($seoMeta) && $seoMeta->schema_override_json)
    <script type="application/ld+json">
    {!! $seoMeta->schema_override_json !!}
    </script>
    @endif
    @php
        $currentRouteName = Route::currentRouteName();
        $routeParams = Route::current() ? Route::current()->parameters() : [];
    @endphp
    @if($currentRouteName)
        <link rel="alternate" hreflang="x-default" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => null])) }}" />
        <link rel="alternate" hreflang="en" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => null])) }}" />
        <link rel="alternate" hreflang="ur" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'ur'])) }}" />
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="top-bar">
        <div class="top-bar-inner">
            <div class="top-bar-left">
                <span class="hijri-date"><i class="fas fa-moon"></i> {{ isset($hijriDate) && $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year . ' AH' : date('d M Y') }}</span>
                <span><i class="fas fa-map-marker-alt"></i> {{ isset($city) && $city ? $city->name : 'Global' }}</span>
            </div>
            <div class="top-bar-right">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('favicon.svg') }}" alt="Logo" style="width: 44px; height: 44px; border-radius: 50%;">
                <div class="logo-text">
                    <span class="logo-text-ar">نورِ اسلام</span>
                    <span class="logo-text-en">Noor-e-Islam</span>
                </div>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('prayer-times.hub') }}" class="{{ request()->routeIs('prayer-times.*') ? 'active' : '' }}">Prayer Times</a></li>
                <li><a href="{{ route('duas.index') }}" class="{{ request()->routeIs('duas.*') ? 'active' : '' }}">Duas</a></li>
                <li><a href="{{ route('names.index') }}" class="{{ request()->routeIs('names.*') ? 'active' : '' }}">Names</a></li>
                <li><a href="{{ route('wazaif.index') }}" class="{{ request()->routeIs('wazaif.*') ? 'active' : '' }}">Wazaif</a></li>
                <li><a href="{{ route('dreams.index') }}" class="{{ request()->routeIs('dreams.*') ? 'active' : '' }}">Dreams</a></li>
                <li><a href="{{ route('quiz.index') }}" class="{{ request()->routeIs('quiz.*') ? 'active' : '' }}">Quiz</a></li>
                <li><a href="{{ route('zakat.index') }}" class="{{ request()->routeIs('zakat.*') ? 'active' : '' }}">Zakat</a></li>
            </ul>
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <div class="mobile-overlay" id="mobileOverlay"></div>

    <main>
        @yield('content')
    </main>

<footer class="footer">
        <div class="footer-pattern"></div>
        <div class="footer-top">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('favicon.svg') }}" alt="Logo" style="width: 44px; height: 44px; border-radius: 50%;">
                        <div class="logo-text"><span class="logo-text-ar">نورِ اسلام</span><span
                                class="logo-text-en">Noor-e-Islam</span></div>
                    </a>
                    <p>Enlightening hearts and minds through authentic Islamic knowledge. Join us on the path of faith,
                        wisdom, and community.</p>
                    <div class="footer-newsletter">
                        <input type="email" placeholder="Your email address" id="newsletterEmail">
                        <button id="newsletterBtn" aria-label="Subscribe"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('islamic-date.hub') }}"><i class="fas fa-chevron-right"></i> Islamic Date</a></li>
                        <li><a href="{{ route('names.index') }}"><i class="fas fa-chevron-right"></i> Islamic Names</a></li>
                        <li><a href="{{ route('zakat.index') }}"><i class="fas fa-chevron-right"></i> Zakat Calculator</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="{{ route('prayer-times.hub') }}"><i class="fas fa-chevron-right"></i> Prayer Times</a></li>
                        <li><a href="{{ route('duas.index') }}"><i class="fas fa-chevron-right"></i> Daily Duas</a></li>
                        <li><a href="{{ route('wazaif.index') }}"><i class="fas fa-chevron-right"></i> Wazaif</a></li>
                        <li><a href="{{ route('dreams.index') }}"><i class="fas fa-chevron-right"></i> Khwabon Ki Tabeer</a></li>
                        <li><a href="{{ route('quiz.index') }}"><i class="fas fa-chevron-right"></i> Islamic Quiz</a></li>
                        <li><a href="{{ route('tasbeeh.index') }}"><i class="fas fa-chevron-right"></i> Tasbeeh Tracker</a></li>
                        <li><a href="{{ route('events.index') }}"><i class="fas fa-chevron-right"></i> Islamic Calendar</a></li>
                        <li><a href="{{ route('hadith.index') }}"><i class="fas fa-chevron-right"></i> Hadith Collection</a></li>
                        <li><a href="{{ route('converter.show') }}"><i class="fas fa-chevron-right"></i> Date Converter</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Prayer Times</h4>
                    <div class="footer-prayer-times">
                        @php
                            $footerPrayerTime = null;
                            if (isset($prayerTimes)) {
                                $footerPrayerTime = $prayerTimes instanceof \Illuminate\Support\Collection ? $prayerTimes->first() : $prayerTimes;
                            }
                        @endphp
                        @if($footerPrayerTime)
                            <div class="footer-prayer-item"><span class="fp-name">Fajr</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->fajr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Sunrise</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->sunrise)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Dhuhr</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->dhuhr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Asr</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->asr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Maghrib</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->maghrib)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Isha</span><span class="fp-time">{{ \Carbon\Carbon::parse($footerPrayerTime->isha)->format('h:i A') }}</span></div>
                        @else
                            <div class="footer-prayer-item"><span class="fp-name">Fajr</span><span class="fp-time">05:12 AM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Sunrise</span><span class="fp-time">06:28 AM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Dhuhr</span><span class="fp-time">12:35 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Asr</span><span class="fp-time">04:02 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Maghrib</span><span class="fp-time">06:48 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Isha</span><span class="fp-time">08:15 PM</span></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <p>&copy; 2025 <a href="{{ route('home') }}">Noor-e-Islam</a>. All rights reserved. Made with love for the Ummah.</p>
                <div class="footer-bottom-links">
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="#">Terms of Use</a>
                    <a href="{{ route('sitemap.index') }}">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <button class="back-to-top" id="backToTop" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>

    <div class="toast-container" id="toastContainer"></div>

    <script>
        // Mobile Menu
        var mobileToggle = document.getElementById('mobileToggle');
        var navLinks = document.getElementById('navLinks');
        var mobileOverlay = document.getElementById('mobileOverlay');

        function toggleMenu() {
            mobileToggle.classList.toggle('active');
            navLinks.classList.toggle('open');
            mobileOverlay.classList.toggle('show');
            document.body.style.overflow = navLinks.classList.contains('open') ? 'hidden' : '';
        }
        mobileToggle.addEventListener('click', toggleMenu);
        mobileOverlay.addEventListener('click', toggleMenu);

        document.querySelectorAll('.nav-links a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (navLinks.classList.contains('open')) toggleMenu();
            });
        });

        // Navbar scroll effect
        var navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Active nav link on scroll
        var sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', function () {
            var scrollPos = window.scrollY + 140;
            sections.forEach(function (section) {
                var top = section.offsetTop;
                var height = section.offsetHeight;
                var id = section.getAttribute('id');
                var link = document.querySelector('.nav-links a[href="#' + id + '"]');
                if (link) {
                    if (scrollPos >= top && scrollPos < top + height) {
                        document.querySelectorAll('.nav-links a').forEach(function (a) { a.classList.remove('active'); });
                        link.classList.add('active');
                    }
                }
            });
        });

        // Quran Carousel
        var slides = document.querySelectorAll('.quran-verse-slide');
        var currentSlide = 0;
        var dotsContainer = document.getElementById('quranDots');
        var autoPlay;

        slides.forEach(function (_, i) {
            var dot = document.createElement('button');
            dot.className = 'quran-carousel-dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Verse ' + (i + 1));
            dot.addEventListener('click', function () { goToSlide(i); });
            dotsContainer.appendChild(dot);
        });

        function goToSlide(index) {
            slides[currentSlide].classList.remove('active');
            dotsContainer.children[currentSlide].classList.remove('active');
            currentSlide = (index + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dotsContainer.children[currentSlide].classList.add('active');
            clearInterval(autoPlay);
            autoPlay = setInterval(function () { goToSlide(currentSlide + 1); }, 6000);
        }

        document.getElementById('quranPrev').addEventListener('click', function () { goToSlide(currentSlide - 1); });
        document.getElementById('quranNext').addEventListener('click', function () { goToSlide(currentSlide + 1); });
        autoPlay = setInterval(function () { goToSlide(currentSlide + 1); }, 6000);

        // Learn Tabs
        var learnTabs = document.querySelectorAll('.learn-tab');
        var learnImage = document.getElementById('learnImage');
        var learnImages = [
            'https://picsum.photos/seed/quran-study-room/700/600.jpg',
            'https://picsum.photos/seed/hadith-books-old/700/600.jpg',
            'https://picsum.photos/seed/islamic-law-study/700/600.jpg',
            'https://picsum.photos/seed/spiritual-mosque-light/700/600.jpg'
        ];
        learnTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                learnTabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                learnImage.style.opacity = '0';
                setTimeout(function () {
                    learnImage.src = learnImages[parseInt(tab.dataset.tab)];
                    learnImage.style.opacity = '1';
                }, 200);
            });
        });

        // Prayer Times - highlight current
        (function () {
            var now = new Date();
            var mins = now.getHours() * 60 + now.getMinutes();
            var times = [312, 388, 755, 962, 1008, 1215];
            var active = 0;
            for (var i = times.length - 1; i >= 0; i--) {
                if (mins >= times[i]) { active = i; break; }
            }
            var chips = document.querySelectorAll('.prayer-time-chip');
            chips.forEach(function (c, idx) {
                c.classList.toggle('active', idx === active);
            });
        })();

        // Toast
        function showToast(msg, type) {
            var container = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast ' + (type || '');
            var icon = type === 'success' ? 'fa-check-circle' : 'fa-info-circle';
            toast.innerHTML = '<i class="fas ' + icon + '"></i><span>' + msg + '</span>';
            container.appendChild(toast);
            setTimeout(function () { toast.classList.add('show'); }, 30);
            setTimeout(function () {
                toast.classList.remove('show');
                setTimeout(function () { toast.remove(); }, 300);
            }, 3500);
        }

        // Contact Form
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var fname = document.getElementById('fname').value.trim();
            var email = document.getElementById('email').value.trim();
            var message = document.getElementById('message').value.trim();
            if (!fname || !email || !message) { showToast('Please fill in all required fields.'); return; }
            var btn = this.querySelector('.form-submit');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            btn.disabled = true;
            var self = this;
            setTimeout(function () {
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
                btn.disabled = false;
                self.reset();
                showToast('JazakAllah Khair! Your message has been sent successfully.', 'success');
            }, 1500);
        });

        // Newsletter
        document.getElementById('newsletterBtn').addEventListener('click', function () {
            var email = document.getElementById('newsletterEmail').value.trim();
            if (!email || !email.includes('@')) { showToast('Please enter a valid email address.'); return; }
            document.getElementById('newsletterEmail').value = '';
            showToast('BarakAllahu Feekum! You have been subscribed.', 'success');
        });

        // Back to Top
        var backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function () {
            backToTop.classList.toggle('visible', window.scrollY > 500);
        });
        backToTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({ top: target.offsetTop - navbar.offsetHeight - 8, behavior: 'smooth' });
                }
            });
        });

        // Service links & event cards
        document.querySelectorAll('.service-link').forEach(function (l) {
            l.addEventListener('click', function (e) { e.preventDefault(); showToast('Course details page coming soon.'); });
        });
        document.querySelectorAll('.event-card').forEach(function (c) {
            c.style.cursor = 'pointer';
            c.addEventListener('click', function () { showToast('Event registration page coming soon.'); });
        });
        document.querySelector('.play-btn').addEventListener('click', function () {
            showToast('Video feature will be available soon, InshaAllah.');
        });
    </script>
</body>
</html>
