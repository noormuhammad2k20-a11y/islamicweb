<?php

$controllers = [
    'NamazGuideController' => ['index', 'salah', 'show($prayer)'],
    'QuranController' => ['index', 'reading', 'translation', 'tafsir', 'search', 'audio', 'juz($id)'],
    'RamadanController' => ['calendar', 'timetable', 'duas', 'rules', 'faqs', 'laylatulQadr', 'sehriToday', 'iftarToday'],
    'HajjUmrahController' => ['hajjGuide', 'umrahGuide', 'hajjDuas', 'umrahDuas', 'hajjChecklist', 'umrahChecklist', 'hajjFaqs'],
    'ToolsController' => ['qibla', 'age', 'eventFinder', 'ramadanGenerator', 'qiblaOnline'],
    'IslamicKnowledgeController' => ['index', 'pillarsIslam', 'pillarsIman', 'namesOfAllah', 'prophets', 'history', 'facts'],
    'MediaController' => ['index', 'wallpapers', 'images', 'quotes'],
    'BlogController' => ['index', 'category($slug)', 'show($slug)'],
];

foreach ($controllers as $controller => $methods) {
    $path = __DIR__ . '/app/Http/Controllers/' . $controller . '.php';
    if (file_exists($path)) {
        $content = "<?php\n\nnamespace App\Http\Controllers;\n\nuse Illuminate\Http\Request;\n\nclass {$controller} extends Controller\n{\n";
        foreach ($methods as $methodDef) {
            $methodName = explode('(', $methodDef)[0];
            $args = strpos($methodDef, '(') !== false ? substr($methodDef, strpos($methodDef, '(')) : '()';
            $content .= "    public function {$methodName}{$args}\n    {\n        return view('pages.placeholder', ['title' => '{$methodName}']);\n    }\n\n";
        }
        $content .= "}\n";
        file_put_contents($path, $content);
        echo "Updated $controller\n";
    }
}

// Update ZakatController with new methods
$zakatPath = __DIR__ . '/app/Http/Controllers/ZakatController.php';
if (file_exists($zakatPath)) {
    $zakatContent = file_get_contents($zakatPath);
    // Add new methods if they don't exist
    $newMethods = ['rules', 'nisab', 'whoMustPay', 'whoCanReceive', 'online'];
    $toAppend = "";
    foreach ($newMethods as $method) {
        if (strpos($zakatContent, "function $method") === false) {
            $toAppend .= "\n    public function {$method}()\n    {\n        return view('pages.placeholder', ['title' => '{$method}']);\n    }\n";
        }
    }
    if ($toAppend !== "") {
        $zakatContent = str_replace("}\n", $toAppend . "}\n", $zakatContent);
        file_put_contents($zakatPath, $zakatContent);
        echo "Updated ZakatController\n";
    }
}

// Create placeholder view
$placeholderPath = __DIR__ . '/resources/views/pages/placeholder.blade.php';
$placeholderContent = <<<'EOD'
@extends('layouts.app')

@section('title', ucfirst($title ?? 'Page') . ' — Noor-e-Islam')
@section('meta_description', 'Learn more about ' . ($title ?? 'this topic') . ' on Noor-e-Islam.')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{{ ucfirst($title ?? 'Page') }}</span>
            </div>
        </div>

        <div class="section-header">
            <h1 class="section-title">Coming <span>Soon</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">This page ({{ ucfirst($title ?? 'Page') }}) is currently under construction and will be available soon.</p>
        </div>
    </div>
</section>
@endsection
EOD;

if (!file_exists($placeholderPath)) {
    file_put_contents($placeholderPath, $placeholderContent);
    echo "Created placeholder view\n";
}

echo "Scaffolding complete.\n";
