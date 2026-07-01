<?php

$baseDir = __DIR__ . '/resources/views/pages/';

$viewsToCreate = [
    'namaz/index.blade.php' => ['title' => 'Learn Salah', 'desc' => 'Importance and Pillars of Salah', 'icon' => 'fa-praying-hands'],
    'namaz/salah.blade.php' => ['title' => 'How to Pray Salah', 'desc' => 'Step-by-step visual prayer guide', 'icon' => 'fa-child'],
    'namaz/show.blade.php' => ['title' => 'Prayer Guide', 'desc' => 'Detailed guide for specific prayer', 'icon' => 'fa-book-open'],
    
    'zakat/nisab.blade.php' => ['title' => 'Zakat Nisab Thresholds', 'desc' => 'Current Gold and Silver Nisab Values', 'icon' => 'fa-balance-scale'],
    'zakat/whomustpay.blade.php' => ['title' => 'Who Must Pay Zakat?', 'desc' => 'Conditions for Zakat eligibility', 'icon' => 'fa-users'],
    'zakat/whocanreceive.blade.php' => ['title' => 'Who Can Receive Zakat?', 'desc' => 'The 8 categories of eligible recipients', 'icon' => 'fa-hand-holding-heart'],
    'zakat/rules.blade.php' => ['title' => 'Zakat Rules', 'desc' => 'Fiqh-based explanations of Zakat calculation', 'icon' => 'fa-book-open'],
    
    'quran/index.blade.php' => ['title' => 'Holy Quran', 'desc' => 'Read, Listen, and Explore the Quran', 'icon' => 'fa-book-quran'],
    'quran/reading.blade.php' => ['title' => 'Quran Reader', 'desc' => 'Full Quran reader (surah-wise + juz-wise)', 'icon' => 'fa-book-open'],
    'quran/translation.blade.php' => ['title' => 'Quran Translation', 'desc' => 'Multi-language Quran translation', 'icon' => 'fa-language'],
    'quran/tafsir.blade.php' => ['title' => 'Quran Tafsir', 'desc' => 'Verse-by-verse Tafsir section', 'icon' => 'fa-book-reader'],
    'quran/audio.blade.php' => ['title' => 'Quran Audio', 'desc' => 'Audio recitations by multiple Qaris', 'icon' => 'fa-headphones'],
    'quran/search.blade.php' => ['title' => 'Search Quran', 'desc' => 'Word / ayah search', 'icon' => 'fa-search'],
    'quran/juz.blade.php' => ['title' => 'Quran Juz', 'desc' => 'Read Quran by Juz', 'icon' => 'fa-bookmark'],

    'ramadan/calendar.blade.php' => ['title' => 'Ramadan Calendar', 'desc' => 'Local city-based schedule and countdown', 'icon' => 'fa-calendar-alt'],
    'ramadan/timetable.blade.php' => ['title' => 'Ramadan Timetable', 'desc' => 'Sehri and Iftar times', 'icon' => 'fa-clock'],
    'ramadan/duas.blade.php' => ['title' => 'Ramadan Duas', 'desc' => 'Daily Duas for Ramadan', 'icon' => 'fa-hands-praying'],
    'ramadan/rules.blade.php' => ['title' => 'Fasting Rules', 'desc' => 'Fasting conditions and tips', 'icon' => 'fa-list-ul'],
    'ramadan/faqs.blade.php' => ['title' => 'Ramadan FAQs', 'desc' => 'Commonly asked questions about fasting', 'icon' => 'fa-question-circle'],
    'ramadan/laylatul_qadr.blade.php' => ['title' => 'Laylatul Qadr Guide', 'desc' => 'How to seek the Night of Power', 'icon' => 'fa-moon'],
    
    'hajj_umrah/hajj_guide.blade.php' => ['title' => 'Step-by-step Hajj Guide', 'desc' => 'Day-wise breakdown of Hajj rituals', 'icon' => 'fa-kaaba'],
    'hajj_umrah/umrah_guide.blade.php' => ['title' => 'Step-by-step Umrah Guide', 'desc' => 'Complete guide to performing Umrah', 'icon' => 'fa-kaaba'],
    'hajj_umrah/hajj_duas.blade.php' => ['title' => 'Hajj Duas', 'desc' => 'Duas for each step of Hajj', 'icon' => 'fa-hands-praying'],
    'hajj_umrah/umrah_duas.blade.php' => ['title' => 'Umrah Duas', 'desc' => 'Duas for Tawaf and Sa\'i', 'icon' => 'fa-hands-praying'],
    'hajj_umrah/hajj_checklist.blade.php' => ['title' => 'Hajj Checklist', 'desc' => 'Downloadable preparation list', 'icon' => 'fa-clipboard-check'],
    'hajj_umrah/umrah_checklist.blade.php' => ['title' => 'Umrah Checklist', 'desc' => 'Downloadable preparation list', 'icon' => 'fa-clipboard-check'],
    'hajj_umrah/hajj_faqs.blade.php' => ['title' => 'Hajj & Umrah FAQs', 'desc' => 'Common mistakes and travel preparation', 'icon' => 'fa-question-circle'],
    
    'tools/qibla.blade.php' => ['title' => 'Qibla Direction Finder', 'desc' => 'GPS + compass UI for Qibla', 'icon' => 'fa-compass'],
    'tools/age.blade.php' => ['title' => 'Age Calculator', 'desc' => 'Islamic + Gregorian Age Calculator', 'icon' => 'fa-calculator'],
    'tools/events.blade.php' => ['title' => 'Islamic Event Finder', 'desc' => 'Find dates for upcoming Islamic events', 'icon' => 'fa-calendar-day'],
    'tools/ramadan_gen.blade.php' => ['title' => 'Ramadan Calendar Generator', 'desc' => 'Generate custom timetables', 'icon' => 'fa-print'],
    
    'knowledge/index.blade.php' => ['title' => 'Islamic Knowledge', 'desc' => 'Explore the depths of Islamic teachings', 'icon' => 'fa-brain'],
    'knowledge/pillars_islam.blade.php' => ['title' => '5 Pillars of Islam', 'desc' => 'Detailed explanation of the Five Pillars', 'icon' => 'fa-mosque'],
    'knowledge/pillars_iman.blade.php' => ['title' => 'Pillars of Iman', 'desc' => 'The Articles of Faith (Aqeedah basics)', 'icon' => 'fa-heart'],
    'knowledge/names_allah.blade.php' => ['title' => '99 Names of Allah', 'desc' => 'Asma-ul-Husna with meanings & audio', 'icon' => 'fa-list-ol'],
    'knowledge/prophets.blade.php' => ['title' => 'Prophets in Islam', 'desc' => 'Stories of the Prophets', 'icon' => 'fa-scroll'],
    'knowledge/history.blade.php' => ['title' => 'Islamic History', 'desc' => 'Timeline of major Islamic historical events', 'icon' => 'fa-landmark'],
    'knowledge/facts.blade.php' => ['title' => 'Islamic Facts', 'desc' => 'Short lessons and articles', 'icon' => 'fa-lightbulb'],
];

foreach ($viewsToCreate as $file => $meta) {
    $dir = dirname($baseDir . $file);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    $title = $meta['title'];
    $desc = $meta['desc'];
    $icon = $meta['icon'];
    
    $content = <<<EOD
@extends('layouts.app')

@section('title', '{$title} — Noor-e-Islam')
@section('meta_description', '{$desc}')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{$title}</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas {$icon}"></i> Feature</div>
            <h1 class="section-title">{$title}</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">{$desc}</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary); background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                
                <!-- CONTENT MOCKUP AREA -->
                <div style="text-align:center; padding: 50px 0;">
                    <i class="fas {$icon}" style="font-size: 4rem; color: var(--gold); opacity: 0.5; margin-bottom: 20px;"></i>
                    <h2 style="color: var(--primary-dark); margin-bottom: 15px;">Detailed UI Under Construction</h2>
                    <p style="color: #666; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
                        This section has been scaffolded and integrated with the Laravel routing system. The dynamic content for <strong>{$title}</strong> will be populated here.
                    </p>
                    
                    <div style="margin-top: 40px; display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #eee; width: 250px;">
                            <i class="fas fa-database" style="color: var(--primary); margin-bottom: 10px; font-size: 1.5rem;"></i>
                            <h4 style="margin-bottom: 5px;">Database Ready</h4>
                            <p style="font-size: 0.9rem; color: #777;">Ready to connect to your models.</p>
                        </div>
                        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #eee; width: 250px;">
                            <i class="fas fa-paint-brush" style="color: var(--primary); margin-bottom: 10px; font-size: 1.5rem;"></i>
                            <h4 style="margin-bottom: 5px;">Theme Aligned</h4>
                            <p style="font-size: 0.9rem; color: #777;">Uses global CSS variables and fonts.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection
EOD;

    file_put_contents($baseDir . $file, $content);
}

echo "Created " . count($viewsToCreate) . " blade views successfully.\n";

// Update controllers to point to new views
function updateController($name, $replacements) {
    $path = __DIR__ . '/app/Http/Controllers/' . $name . '.php';
    if (!file_exists($path)) return;
    $content = file_get_contents($path);
    foreach ($replacements as $search => $replace) {
        $content = str_replace($search, $replace, $content);
    }
    file_put_contents($path, $content);
}

updateController('NamazGuideController', [
    "view('pages.placeholder', ['title' => 'index'])" => "view('pages.namaz.index')",
    "view('pages.placeholder', ['title' => 'salah'])" => "view('pages.namaz.salah')",
    "view('pages.placeholder', ['title' => 'show'])" => "view('pages.namaz.show')",
]);

updateController('ZakatController', [
    "view('pages.placeholder', ['title' => 'rules'])" => "view('pages.zakat.rules')",
    "view('pages.placeholder', ['title' => 'nisab'])" => "view('pages.zakat.nisab')",
    "view('pages.placeholder', ['title' => 'whoMustPay'])" => "view('pages.zakat.whomustpay')",
    "view('pages.placeholder', ['title' => 'whoCanReceive'])" => "view('pages.zakat.whocanreceive')",
]);

updateController('QuranController', [
    "view('pages.placeholder', ['title' => 'index'])" => "view('pages.quran.index')",
    "view('pages.placeholder', ['title' => 'reading'])" => "view('pages.quran.reading')",
    "view('pages.placeholder', ['title' => 'translation'])" => "view('pages.quran.translation')",
    "view('pages.placeholder', ['title' => 'tafsir'])" => "view('pages.quran.tafsir')",
    "view('pages.placeholder', ['title' => 'search'])" => "view('pages.quran.search')",
    "view('pages.placeholder', ['title' => 'audio'])" => "view('pages.quran.audio')",
    "view('pages.placeholder', ['title' => 'juz'])" => "view('pages.quran.juz')",
]);

updateController('RamadanController', [
    "view('pages.placeholder', ['title' => 'calendar'])" => "view('pages.ramadan.calendar')",
    "view('pages.placeholder', ['title' => 'timetable'])" => "view('pages.ramadan.timetable')",
    "view('pages.placeholder', ['title' => 'duas'])" => "view('pages.ramadan.duas')",
    "view('pages.placeholder', ['title' => 'rules'])" => "view('pages.ramadan.rules')",
    "view('pages.placeholder', ['title' => 'faqs'])" => "view('pages.ramadan.faqs')",
    "view('pages.placeholder', ['title' => 'laylatulQadr'])" => "view('pages.ramadan.laylatul_qadr')",
]);

updateController('HajjUmrahController', [
    "view('pages.placeholder', ['title' => 'hajjGuide'])" => "view('pages.hajj_umrah.hajj_guide')",
    "view('pages.placeholder', ['title' => 'umrahGuide'])" => "view('pages.hajj_umrah.umrah_guide')",
    "view('pages.placeholder', ['title' => 'hajjDuas'])" => "view('pages.hajj_umrah.hajj_duas')",
    "view('pages.placeholder', ['title' => 'umrahDuas'])" => "view('pages.hajj_umrah.umrah_duas')",
    "view('pages.placeholder', ['title' => 'hajjChecklist'])" => "view('pages.hajj_umrah.hajj_checklist')",
    "view('pages.placeholder', ['title' => 'umrahChecklist'])" => "view('pages.hajj_umrah.umrah_checklist')",
    "view('pages.placeholder', ['title' => 'hajjFaqs'])" => "view('pages.hajj_umrah.hajj_faqs')",
]);

updateController('ToolsController', [
    "view('pages.placeholder', ['title' => 'qibla'])" => "view('pages.tools.qibla')",
    "view('pages.placeholder', ['title' => 'age'])" => "view('pages.tools.age')",
    "view('pages.placeholder', ['title' => 'eventFinder'])" => "view('pages.tools.events')",
    "view('pages.placeholder', ['title' => 'ramadanGenerator'])" => "view('pages.tools.ramadan_gen')",
]);

updateController('IslamicKnowledgeController', [
    "view('pages.placeholder', ['title' => 'index'])" => "view('pages.knowledge.index')",
    "view('pages.placeholder', ['title' => 'pillarsIslam'])" => "view('pages.knowledge.pillars_islam')",
    "view('pages.placeholder', ['title' => 'pillarsIman'])" => "view('pages.knowledge.pillars_iman')",
    "view('pages.placeholder', ['title' => 'namesOfAllah'])" => "view('pages.knowledge.names_allah')",
    "view('pages.placeholder', ['title' => 'prophets'])" => "view('pages.knowledge.prophets')",
    "view('pages.placeholder', ['title' => 'history'])" => "view('pages.knowledge.history')",
    "view('pages.placeholder', ['title' => 'facts'])" => "view('pages.knowledge.facts')",
]);

echo "Controllers updated to point to new views.\n";

