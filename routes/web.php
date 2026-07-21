<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\IslamicDateController;
use App\Http\Controllers\IslamicCalendarController;
use App\Http\Controllers\PrayerTimesController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\HadithController;
use App\Http\Controllers\IslamicEventsController;

use App\Http\Controllers\RamadanController;
use App\Http\Controllers\ToolsController;

use App\Http\Controllers\IslamicKnowledgeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WazaifController;
use App\Http\Controllers\DreamController;
use App\Http\Controllers\QuizController;

// Explicit English-only Islamic Calendar Routes (Removed from /ur/)
    Route::redirect('/islamic-date', '/islamic-calendar', 301);
    Route::redirect('/hijri-date', '/islamic-calendar', 301);
    Route::redirect('/islamic-calendar/today', '/islamic-date-today', 301);
    Route::get('/islamic-calendar', [\App\Http\Controllers\IslamicCalendarController::class, 'mainCalendar'])->name('islamic-calendar');
    Route::get('/islamic-date-today', [\App\Http\Controllers\IslamicCalendarController::class, 'islamicDateToday'])->name('islamic-date-today');
    Route::get('/islamic-calendar/pakistan', [\App\Http\Controllers\IslamicCalendarController::class, 'pakistanDate'])->name('islamic-date-pakistan');
    Route::get('/islamic-calendar/saudi', [\App\Http\Controllers\IslamicCalendarController::class, 'saudiDate'])->name('islamic-date-saudi');
    Route::get('/islamic-calendar/saudi-arabia', [\App\Http\Controllers\IslamicCalendarController::class, 'saudiDate'])->name('islamic-date-saudi-arabia');
    


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

    // Knowledge (Allah Names)
    Route::get('/knowledge/names-of-allah', [\App\Http\Controllers\AllahNameController::class, 'index'])->name('knowledge.names-of-allah');

    // Dreams (Khwabon ki tabeer)
    Route::get('/khwabon-ki-tabeer', [\App\Http\Controllers\DreamController::class, 'index'])->name('dreams.index');
    Route::get('/khwabon-ki-tabeer/{slug}', [\App\Http\Controllers\DreamController::class, 'show'])->name('dreams.show');

    // CLUSTER 1 — Islamic Calendar + Programmatic SEO Pages
    // Redirect old /islamic-date to new hub (Moved outside to be English-only)
    
    // Main pages
    Route::get('/islamic-calendar/pakistan/{city}', [IslamicCalendarController::class, 'cityPage'])->name('islamic-date-pakistan-city');

    // Programmatic: Country pages
    Route::get('/islamic-calendar/{country}', [IslamicCalendarController::class, 'countryPage'])
        ->name('islamic-date-country')
        ->where('country', 'uae|kuwait|qatar|bahrain|jordan|egypt|turkey');

    // Programmatic: City pages
    Route::redirect('/islamic-date/{city}', '/islamic-date-today-in/{city}', 301);
    Route::get('/islamic-date-today-in/{city}', [IslamicCalendarController::class, 'cityPage'])
        ->name('islamic-date-city')
        ->where('city', '[a-z\-]+');

    // Programmatic: Year archive
    Route::get('/islamic-calendar/{year}', [IslamicCalendarController::class, 'yearArchive'])
        ->name('islamic-calendar-year')
        ->where('year', '[0-9]{4}');

    // Programmatic: Year-Month archive
    Route::get('/islamic-calendar/{year}/{month}', [IslamicCalendarController::class, 'yearMonthArchive'])
        ->name('islamic-calendar-year-month')
        ->where(['year' => '[0-9]{4}', 'month' => '[a-z0-9\-]+']);

    // Programmatic: Month pages
    Route::redirect('/islamic-month/rabi-us-sani', '/islamic-month/rabi-ul-thani', 301);
    Route::redirect('/islamic-month/jumada-as-sani', '/islamic-month/jumada-al-thani', 301);
    Route::get('/islamic-month/{month}', [IslamicCalendarController::class, 'monthPage'])
        ->name('islamic-month')
        ->where('month', '[a-z\-]+');

    Route::get('/hijri-gregorian-converter', [ConverterController::class, 'show'])->name('converter.show');

    // CLUSTER 2 — Prayer Times
    Route::get('/prayer-times/{country}', [PrayerTimesController::class, 'countryHub'])
        ->where('country','pakistan|uae|saudi-arabia|india|usa')
        ->name('prayer-times.country');

    Route::get('/prayer-times/{city}/{prayer}', [PrayerTimesController::class, 'prayerPage'])
        ->where(['city'=>'[a-z0-9\-]+','prayer'=>'fajr|zuhr|asr|maghrib|isha|nawafil'])
        ->name('prayer-times.prayer');

    Route::get('/prayer-times/{city}', [PrayerTimesController::class, 'cityPage'])
        ->where('city','[a-z0-9\-]+')
        ->name('prayer-times.city');

    Route::get('/prayer-times', fn() => redirect('/prayer-times/pakistan'))
        ->name('prayer-times.hub');



    // CLUSTER 6 — Surah Details
    Route::get('/surahs', [SurahController::class, 'index'])->name('surah.index');
    Route::get('/surah/{surah:slug}', [SurahController::class, 'show'])->name('surah.show');
    Route::get('/surahs/collections/{slug}', [SurahController::class, 'collection'])->name('surah.collection');

    // CLUSTER 4 — Hadith
    // Redirects for old hadith routes
    Route::redirect('/hadith-topics', '/hadith', 301);
    Route::get('/hadith-topics/{topic}', function($topic) { return redirect('/hadith/' . $topic, 301); });
    Route::get('/hadith-topics/{topic}/{hadith}', function($topic, $hadith) { return redirect('/hadith/' . $topic . '/' . $hadith, 301); });

    Route::get('/hadith/{collection}', [HadithController::class, 'collectionShow'])
        ->where('collection', 'sahih-bukhari|sahih-muslim|sunan-abu-dawud|jami-at-tirmidhi|sunan-an-nasai|sunan-ibn-majah')
        ->name('hadith.collection');
    Route::get('/hadith/{collection}/{chapter}/{number}', [HadithController::class, 'collectionHadithShow'])
        ->where('collection', 'sahih-bukhari|sahih-muslim|sunan-abu-dawud|jami-at-tirmidhi|sunan-an-nasai|sunan-ibn-majah')
        ->name('hadith.collection.hadithShow');
    Route::get('/hadith/narrators/{narrator:slug}', [HadithController::class, 'narratorShow'])->name('hadith.narratorShow');

    Route::get('/hadith', [HadithController::class, 'index'])->name('hadith.index');
    Route::get('/hadith/{topic:slug}', [HadithController::class, 'show'])->name('hadith.show');
    Route::get('/hadith/{topic:slug}/{hadith:slug}', [HadithController::class, 'hadithShow'])->name('hadith.hadithShow');

    // CLUSTER 5 — Events & Calendar (legacy — kept for month detail pages)
    // Main /islamic-calendar now handled by IslamicCalendarController above
    Route::get('/islamic-events', [IslamicEventsController::class, 'index'])->name('events.index');
    Route::get('/islamic-events/{hijri_month:slug}', [IslamicEventsController::class, 'month'])->name('events.month');

    // CLUSTER 6 — Islamic Names
    Route::prefix('islamic-names')->group(function () {
        Route::get('/', [\App\Http\Controllers\IslamicNameController::class, 'index'])->name('names.index');
        Route::get('/{gender}', [\App\Http\Controllers\IslamicNameController::class, 'gender'])->where('gender', 'boys|girls')->name('names.gender');
        Route::get('/name/{slug}', function($slug) { return redirect('/islamic-names/' . $slug, 301); });
        Route::get('/{slug}', [\App\Http\Controllers\IslamicNameController::class, 'show'])->name('names.show');
    });

    // CLUSTER 7 — Daily Duas & Azkar
    Route::get('/duas', [\App\Http\Controllers\DuaController::class, 'index'])->name('duas.index');
    Route::get('/dua/{slug}', [\App\Http\Controllers\DuaController::class, 'legacyShow']);
    Route::get('/duas/category/{slug}', function($slug) { return redirect('/duas/' . $slug, 301); });
    Route::get('/duas/{category}', [\App\Http\Controllers\DuaController::class, 'category'])->name('duas.category');
    Route::get('/duas/{category}/{slug}', [\App\Http\Controllers\DuaController::class, 'show'])->name('duas.show');

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
    Route::redirect('/tasbeeh', '/digital-tasbeeh-counter', 301);
    Route::get('/digital-tasbeeh-counter', [\App\Http\Controllers\TasbeehController::class, 'digitalCounter'])->name('tasbeeh.counter');

    // CLUSTER 10 — Ramadan Section
    Route::get('/ramadan/{year}', [RamadanController::class, 'hub'])->name('ramadan.hub');
    Route::get('/ramadan/{year}/{city:slug}', [RamadanController::class, 'city'])->name('ramadan.city');
    Route::get('/sehri-iftar-timings/{city:slug}', [RamadanController::class, 'city']);
    Route::get('/sehr-o-iftar/{city:slug}', [RamadanController::class, 'city']);
    Route::prefix('ramadan-guide')->group(function () {
        Route::get('/calendar', [RamadanController::class, 'calendar'])->name('ramadan.calendar');
        Route::get('/timetable', [RamadanController::class, 'timetable'])->name('ramadan.timetable');
        Route::get('/duas', [RamadanController::class, 'duas'])->name('ramadan.duas');
        Route::get('/rules', [RamadanController::class, 'rules'])->name('ramadan.rules');
        Route::get('/faqs', [RamadanController::class, 'faqs'])->name('ramadan.faqs');
        Route::get('/laylatul-qadr-guide', [RamadanController::class, 'laylatulQadr'])->name('ramadan.laylatul_qadr');
    });

    // CLUSTER 12 — Islamic Tools
    Route::prefix('tools')->group(function () {
        Route::get('/qibla-direction', [ToolsController::class, 'qibla'])->name('tools.qibla');
        Route::get('/qibla-direction/{country}', [ToolsController::class, 'qiblaByLocation'])->name('tools.qibla.country');
        Route::get('/qibla-direction/{country}/{state}', [ToolsController::class, 'qiblaByLocation'])->name('tools.qibla.state');
        Route::get('/qibla-direction/{country}/{state}/{city}', [ToolsController::class, 'qiblaByLocation'])->name('tools.qibla.city');
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
        Route::redirect('/islamic-facts', '/knowledge', 301)->name('knowledge.facts');
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


    // CLUSTER 16 — Dedicated SEO Landing Pages
    Route::get('/prayer-times-today', [\App\Http\Controllers\SeoLandingPageController::class, 'prayerTimesToday'])->name('seo.prayer-times-today');
    Route::get('/sehri-time-today', [\App\Http\Controllers\SeoLandingPageController::class, 'sehriTimeToday'])->name('seo.sehri-time-today');
    Route::get('/iftar-time-today', [\App\Http\Controllers\SeoLandingPageController::class, 'iftarTimeToday'])->name('seo.iftar-time-today');
    Route::get('/zakat-calculator-online', [\App\Http\Controllers\SeoLandingPageController::class, 'zakatCalculatorOnline'])->name('seo.zakat-calculator-online');
    Route::get('/qibla-finder-online', [\App\Http\Controllers\SeoLandingPageController::class, 'qiblaFinderOnline'])->name('seo.qibla-finder-online');


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



// ── AWS BEDROCK TEST ROUTES ──────────────────────────────────────────
use App\Services\BedrockService;

// Test 1: Simple connection test
Route::get('/test-bedrock', function (BedrockService $bedrock) {
    try {
        $response = $bedrock->chat('Say hello in one sentence.');
        return response()->json([
            'status'   => 'success',
            'response' => $response,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'error'  => $e->getMessage(),
        ], 500);
    }
});

// Test 2: Islamic names ke liye test
Route::get('/test-bedrock-islamic', function (BedrockService $bedrock) {
    try {
        $response = $bedrock->chat(
            'Give me 3 beautiful Islamic names for a baby boy with their meanings in Urdu. Format as JSON.'
        );
        return response()->json([
            'status'   => 'success',
            'response' => $response,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'error'  => $e->getMessage(),
        ], 500);
    }
});

// Test 3: Available models dekho
Route::get('/test-bedrock-models', function (BedrockService $bedrock) {
    try {
        $models = $bedrock->listModels();
        return response()->json([
            'status' => 'success',
            'models' => $models,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'error'  => $e->getMessage(),
        ], 500);
    }
});

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
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.xml');
Route::get('/sitemap-calendar.xml', [App\Http\Controllers\SitemapController::class, 'calendar'])->name('sitemap.calendar');
Route::get('/sitemap-dates.xml', [App\Http\Controllers\SitemapController::class, 'dates'])->name('sitemap.dates');
Route::get('/sitemap-prayer.xml', [App\Http\Controllers\SitemapController::class, 'prayer'])->name('sitemap.prayer');
Route::get('/sitemap-surah.xml', [App\Http\Controllers\SitemapController::class, 'surah'])->name('sitemap.surah');
Route::get('/sitemap-surahs.xml', [App\Http\Controllers\SitemapController::class, 'surahs'])->name('sitemap.surahs');

Route::get('/sitemap-collections.xml', [App\Http\Controllers\SitemapController::class, 'collections'])->name('sitemap.collections');
Route::get('/sitemap-hadith.xml', [App\Http\Controllers\SitemapController::class, 'hadith'])->name('sitemap.hadith');
Route::get('/sitemap-pages.xml', [App\Http\Controllers\SitemapController::class, 'pages'])->name('sitemap.pages');
Route::get('/sitemap-duas.xml', [App\Http\Controllers\SitemapController::class, 'duas'])->name('sitemap.duas');
Route::get('/sitemap-names.xml', [App\Http\Controllers\SitemapController::class, 'names'])->name('sitemap.names');
Route::get('/sitemap-wazaif.xml', [App\Http\Controllers\SitemapController::class, 'wazaif'])->name('sitemap.wazaif');
Route::get('/sitemap-dreams.xml', [App\Http\Controllers\SitemapController::class, 'dreams'])->name('sitemap.dreams');
Route::get('/sitemap-allah-names.xml', [App\Http\Controllers\SitemapController::class, 'allahNames'])->name('sitemap.allah_names');
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');
