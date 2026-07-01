<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\IslamicDateController;
use App\Http\Controllers\PrayerTimesController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\HadithController;
use App\Http\Controllers\IslamicEventsController;
use App\Http\Controllers\NamazGuideController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\RamadanController;
use App\Http\Controllers\HajjUmrahController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\IslamicKnowledgeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WazaifController;
use App\Http\Controllers\DreamController;
use App\Http\Controllers\QuizController;

$appRoutes = function () {

    // Homepage
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Static Pages
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
    Route::get('/disclaimer', [PageController::class, 'disclaimer'])->name('disclaimer');
    Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');
    Route::get('/faq', [PageController::class, 'faq'])->name('faq');

    // CLUSTER 1 — Islamic Date / Hijri Calendar
    Route::prefix('islamic-date-today')->group(function () {
        Route::get('/', [IslamicDateController::class, 'hub'])->name('islamic-date.hub');
        Route::get('/{country:slug}', [IslamicDateController::class, 'country'])->name('islamic-date.country');
        
        // Redirect old nested city pages to the country page
        Route::get('/{country}/{city}', function ($country, $city) {
            return redirect()->route('islamic-date.country', ['country' => $country], 301);
        });
    });

    Route::get('/hijri-gregorian-converter', [ConverterController::class, 'show'])->name('converter.show');

    // CLUSTER 2 — Prayer Times
    Route::prefix('prayer-times')->group(function () {
        Route::get('/', [PrayerTimesController::class, 'hub'])->name('prayer-times.hub');
        Route::get('/{city:slug}', [PrayerTimesController::class, 'city'])->name('prayer-times.city');
    });

    // CLUSTER 2.1 — Namaz Guides
    Route::prefix('namaz-guides')->group(function () {
        Route::get('/', [NamazGuideController::class, 'index'])->name('namaz.index');
        Route::get('/how-to-pray-salah', [NamazGuideController::class, 'salah'])->name('namaz.salah');
        Route::get('/{prayer}', [NamazGuideController::class, 'show'])->name('namaz.show');
    });

    // CLUSTER 3 — Quran & Fazilat
    Route::prefix('quran')->group(function () {
        Route::get('/', [QuranController::class, 'index'])->name('quran.index');
        Route::get('/reading', [QuranController::class, 'reading'])->name('quran.reading');
        Route::get('/translation', [QuranController::class, 'translation'])->name('quran.translation');
        Route::get('/tafsir', [QuranController::class, 'tafsir'])->name('quran.tafsir');
        Route::get('/search', [QuranController::class, 'search'])->name('quran.search');
        Route::get('/audio', [QuranController::class, 'audio'])->name('quran.audio');
        Route::get('/juz/{id}', [QuranController::class, 'juz'])->name('quran.juz');
    });
    Route::get('/surahs', [SurahController::class, 'index'])->name('surah.index');
    Route::get('/surah/{surah:slug}', [SurahController::class, 'show'])->name('surah.show');

    // CLUSTER 4 — Hadith
    Route::get('/hadith-topics', [HadithController::class, 'index'])->name('hadith.index');
    Route::get('/hadith-topics/{topic:slug}', [HadithController::class, 'show'])->name('hadith.show');
    Route::get('/hadith-topics/{topic:slug}/{hadith:slug}', [HadithController::class, 'hadithShow'])->name('hadith.hadithShow');

    // CLUSTER 5 — Events & Calendar
    Route::get('/islamic-calendar', [IslamicEventsController::class, 'index'])->name('events.index');
    Route::get('/islamic-calendar/{hijri_month:slug}', [IslamicEventsController::class, 'month'])->name('events.month');

    // CLUSTER 6 — Islamic Names
    Route::prefix('islamic-names')->group(function () {
        Route::get('/', [\App\Http\Controllers\IslamicNameController::class, 'index'])->name('names.index');
        Route::get('/{gender}', [\App\Http\Controllers\IslamicNameController::class, 'gender'])->where('gender', 'boys|girls')->name('names.gender');
        Route::get('/name/{slug}', [\App\Http\Controllers\IslamicNameController::class, 'show'])->name('names.show');
    });

    // CLUSTER 7 — Daily Duas & Azkar
    Route::prefix('duas')->group(function () {
        Route::get('/', [\App\Http\Controllers\DuaController::class, 'index'])->name('duas.index');
        Route::get('/{category:slug}', [\App\Http\Controllers\DuaController::class, 'category'])->name('duas.category');
        Route::get('/{category:slug}/{seo_slug}', [\App\Http\Controllers\DuaController::class, 'show'])->name('duas.show');
    });

    // CLUSTER 8 — Zakat Calculator
    Route::prefix('zakat-calculator')->group(function () {
        Route::get('/', [\App\Http\Controllers\ZakatController::class, 'index'])->name('zakat.index');
        Route::get('/{country}', [\App\Http\Controllers\ZakatController::class, 'country'])->name('zakat.country');
    });
    Route::prefix('zakat')->group(function () {
        Route::get('/rules', [\App\Http\Controllers\ZakatController::class, 'rules'])->name('zakat.rules');
        Route::get('/nisab', [\App\Http\Controllers\ZakatController::class, 'nisab'])->name('zakat.nisab');
        Route::get('/who-must-pay', [\App\Http\Controllers\ZakatController::class, 'whoMustPay'])->name('zakat.whomustpay');
        Route::get('/who-can-receive', [\App\Http\Controllers\ZakatController::class, 'whoCanReceive'])->name('zakat.whocanreceive');
    });

    // CLUSTER 9 — Digital Tasbeeh Tracker
    Route::get('/tasbeeh', [\App\Http\Controllers\TasbeehController::class, 'index'])->name('tasbeeh.index');

    // CLUSTER 10 — Ramadan Section
    Route::prefix('ramadan')->group(function () {
        Route::get('/calendar', [RamadanController::class, 'calendar'])->name('ramadan.calendar');
        Route::get('/timetable', [RamadanController::class, 'timetable'])->name('ramadan.timetable');
        Route::get('/duas', [RamadanController::class, 'duas'])->name('ramadan.duas');
        Route::get('/rules', [RamadanController::class, 'rules'])->name('ramadan.rules');
        Route::get('/faqs', [RamadanController::class, 'faqs'])->name('ramadan.faqs');
        Route::get('/laylatul-qadr-guide', [RamadanController::class, 'laylatulQadr'])->name('ramadan.laylatul_qadr');
    });

    // CLUSTER 11 — Hajj & Umrah Section
    Route::prefix('hajj-umrah')->group(function () {
        Route::get('/', [HajjUmrahController::class, 'index'])->name('hajj_umrah.index');
        Route::get('/hajj-guide', [HajjUmrahController::class, 'hajjGuide'])->name('hajj_umrah.hajj_guide');
        Route::get('/umrah-guide', [HajjUmrahController::class, 'umrahGuide'])->name('hajj_umrah.umrah_guide');
        Route::get('/hajj-duas', [HajjUmrahController::class, 'hajjDuas'])->name('hajj_umrah.hajj_duas');
        Route::get('/umrah-duas', [HajjUmrahController::class, 'umrahDuas'])->name('hajj_umrah.umrah_duas');
        Route::get('/hajj-checklist', [HajjUmrahController::class, 'hajjChecklist'])->name('hajj_umrah.hajj_checklist');
        Route::get('/umrah-checklist', [HajjUmrahController::class, 'umrahChecklist'])->name('hajj_umrah.umrah_checklist');
        Route::get('/hajj-faqs', [HajjUmrahController::class, 'hajjFaqs'])->name('hajj_umrah.hajj_faqs');
    });

    // CLUSTER 12 — Islamic Tools
    Route::prefix('tools')->group(function () {
        Route::get('/qibla-direction', [ToolsController::class, 'qibla'])->name('tools.qibla');
        Route::get('/age-calculator', [ToolsController::class, 'age'])->name('tools.age');
        Route::get('/islamic-event-finder', [ToolsController::class, 'eventFinder'])->name('tools.events');
        Route::get('/ramadan-calendar-generator', [ToolsController::class, 'ramadanGenerator'])->name('tools.ramadan_gen');
    });

    // CLUSTER 13 — Islamic Knowledge
    Route::prefix('knowledge')->group(function () {
        Route::get('/', [IslamicKnowledgeController::class, 'index'])->name('knowledge.index');
        Route::get('/pillars-of-islam', [IslamicKnowledgeController::class, 'pillarsIslam'])->name('knowledge.pillars_islam');
        Route::get('/pillars-of-iman', [IslamicKnowledgeController::class, 'pillarsIman'])->name('knowledge.pillars_iman');
        Route::get('/prophets-in-islam', [IslamicKnowledgeController::class, 'prophets'])->name('knowledge.prophets');
        Route::get('/islamic-history', [IslamicKnowledgeController::class, 'history'])->name('knowledge.history');
        Route::get('/islamic-facts', [IslamicKnowledgeController::class, 'facts'])->name('knowledge.facts');
    });

    // CLUSTER 14 — Media Section
    Route::prefix('media')->group(function () {
        Route::get('/', [MediaController::class, 'index'])->name('media.index');
        Route::get('/wallpapers', [MediaController::class, 'wallpapers'])->name('media.wallpapers');
        Route::get('/images', [MediaController::class, 'images'])->name('media.images');
        Route::get('/quotes', [MediaController::class, 'quotes'])->name('media.quotes');
    });

    // CLUSTER 15 — Blog Section
    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
        Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
    });

    // CLUSTER 17 — 99 Names of Allah
    Route::prefix('99-names-of-allah')->group(function () {
        Route::get('/', [\App\Http\Controllers\AllahNameController::class, 'index'])->name('names_allah.index');
        Route::get('/{slug}', [\App\Http\Controllers\AllahNameController::class, 'show'])->name('names_allah.show');
    });

    // CLUSTER 18 - Calculators
    Route::prefix('calculators')->group(function () {
        Route::get('/', [\App\Http\Controllers\CalculatorController::class, 'index'])->name('calculators.index');
        Route::get('/zakat', [\App\Http\Controllers\CalculatorController::class, 'zakat'])->name('calculators.zakat');
        Route::get('/zakat-on-gold', [\App\Http\Controllers\CalculatorController::class, 'zakatGold'])->name('calculators.zakat_gold');
        Route::get('/zakat-on-silver', [\App\Http\Controllers\CalculatorController::class, 'zakatSilver'])->name('calculators.zakat_silver');
        Route::get('/fidya', [\App\Http\Controllers\CalculatorController::class, 'fidya'])->name('calculators.fidya');
        Route::get('/kaffarah', [\App\Http\Controllers\CalculatorController::class, 'kaffarah'])->name('calculators.kaffarah');
        Route::get('/inheritance', [\App\Http\Controllers\CalculatorController::class, 'inheritance'])->name('calculators.inheritance');
    });

    // CLUSTER 19 - Search
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


    // CLUSTER 16 — Programmatic SEO Pages
    Route::get('/prayer-times-today', [PrayerTimesController::class, 'today'])->name('seo.prayer_today');
    Route::get('/sehri-time-today', [RamadanController::class, 'sehriToday'])->name('seo.sehri_today');
    Route::get('/iftar-time-today', [RamadanController::class, 'iftarToday'])->name('seo.iftar_today');
    Route::get('/zakat-calculator-online', [\App\Http\Controllers\ZakatController::class, 'online'])->name('seo.zakat_online');
    Route::get('/qibla-finder-online', [ToolsController::class, 'qiblaOnline'])->name('seo.qibla_online');

    // CLUSTER 20 — Wazaif Section
    Route::prefix('wazaif')->group(function () {
        Route::get('/', [WazaifController::class, 'index'])->name('wazaif.index');
        Route::get('/{slug}', [WazaifController::class, 'show'])->name('wazaif.show');
    });

    // CLUSTER 21 — Dream Interpretation (Khwabon Ki Tabeer)
    Route::prefix('khwabon-ki-tabeer')->group(function () {
        Route::get('/', [DreamController::class, 'index'])->name('dreams.index');
        Route::get('/{slug}', [DreamController::class, 'show'])->name('dreams.show');
    });

    // CLUSTER 22 — Islamic Quiz
    Route::get('/islamic-quiz', [QuizController::class, 'index'])->name('quiz.index');

};

Route::middleware('setlocale')->group($appRoutes);
Route::prefix('ur')->name('ur.')->middleware('setlocale')->group($appRoutes);

// Phase 5 SEO Redirects
Route::redirect('/namaz-time', '/prayer-times/karachi', 301);
Route::redirect('/surah-yaseen', '/surah/ya-sin', 301);
Route::redirect('/surah-waqiah', '/surah/al-waqiah', 301);
Route::redirect('/surah-e-mulk', '/surah/al-mulk', 301);
Route::redirect('/surah-muzammil', '/surah/al-muzzammil', 301);

// AJAX Routes
Route::prefix('ajax')->group(function () {
    Route::post('/contact', [AjaxController::class, 'contact'])->middleware('throttle:contact');
    Route::post('/newsletter', [AjaxController::class, 'newsletter'])->middleware('throttle:5,1');
    Route::post('/comments/{type}/{id}', [AjaxController::class, 'comments'])->middleware('throttle:comments');
    Route::get('/hijri-convert', [AjaxController::class, 'hijriConvert']);
    Route::get('/cities/search', [AjaxController::class, 'searchCities']);
    Route::get('/prayer-times/{city:slug}/today', [AjaxController::class, 'prayerTimesToday']);
});

// SEO Routes
Route::get('/sitemap_index.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-dates.xml', [App\Http\Controllers\SitemapController::class, 'dates'])->name('sitemap.dates');
Route::get('/sitemap-prayer.xml', [App\Http\Controllers\SitemapController::class, 'prayer'])->name('sitemap.prayer');
Route::get('/sitemap-surah.xml', [App\Http\Controllers\SitemapController::class, 'surah'])->name('sitemap.surah');
Route::get('/sitemap-hadith.xml', [App\Http\Controllers\SitemapController::class, 'hadith'])->name('sitemap.hadith');
Route::get('/sitemap-pages.xml', [App\Http\Controllers\SitemapController::class, 'pages'])->name('sitemap.pages');
Route::get('/sitemap-duas.xml', [App\Http\Controllers\SitemapController::class, 'duas'])->name('sitemap.duas');
Route::get('/sitemap-names.xml', [App\Http\Controllers\SitemapController::class, 'names'])->name('sitemap.names');
Route::get('/sitemap-wazaif.xml', [App\Http\Controllers\SitemapController::class, 'wazaif'])->name('sitemap.wazaif');
Route::get('/sitemap-dreams.xml', [App\Http\Controllers\SitemapController::class, 'dreams'])->name('sitemap.dreams');
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');
