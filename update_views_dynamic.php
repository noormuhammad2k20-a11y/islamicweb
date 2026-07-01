<?php

$baseDir = __DIR__ . '/resources/views/pages/';

function replaceContent($file, $title, $desc, $icon, $loopData, $loopVar) {
    $content = <<<EOD
@extends('layouts.app')

@section('title', '{$title} — Noor-e-Islam')
@section('meta_description', '{$desc}')

@section('content')
<section class="section" style="padding-top: 120px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="{$title}" desc="{$desc}" icon="{$icon}" />

        <div class="modules-grid">
            @if(isset(\${$loopData}) && count(\${$loopData}) > 0)
                @foreach(\${$loopData} as \${$loopVar})
                    <x-module-card 
                        title="{{ \${$loopVar}->title ?? \${$loopVar}->name }}" 
                        desc="{{ Str::limit(\${$loopVar}->description ?? \${$loopVar}->overview ?? \${$loopVar}->content, 80) }}" 
                        icon="{{ \${$loopVar}->icon ?? '{$icon}' }}" 
                        url="#" 
                        badge="{{ \${$loopVar}->type ?? null }}"
                    />
                @endforeach
            @else
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm);">
                    <i class="fas fa-tools" style="font-size: 3rem; color: var(--gold-light); margin-bottom: 15px;"></i>
                    <h3 style="color: var(--primary-dark);">Under Construction</h3>
                    <p style="color: var(--text-medium);">The dynamic content for this section is currently being updated. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
EOD;
    return $content;
}

function replaceToolContent($file, $title, $desc, $icon, $toolType) {
    $script = '';
    if ($toolType === 'qibla') {
        $script = <<<HTML
        <div style="text-align: center; padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm);">
            <div id="qibla-compass" style="width: 250px; height: 250px; border-radius: 50%; border: 4px solid var(--primary); margin: 0 auto 30px; position: relative; display: flex; align-items: center; justify-content: center; background: url('https://upload.wikimedia.org/wikipedia/commons/4/4e/Compass_rose_brown.svg') no-repeat center center; background-size: cover;">
                <div id="qibla-needle" style="width: 4px; height: 120px; background: var(--gold); position: absolute; bottom: 50%; left: calc(50% - 2px); transform-origin: bottom center; transition: transform 0.5s ease; border-radius: 4px 4px 0 0;"></div>
                <div style="width: 16px; height: 16px; background: var(--primary-dark); border-radius: 50%; position: absolute; z-index: 2;"></div>
            </div>
            <button onclick="findQibla()" class="btn-primary" style="margin-bottom: 20px;"><i class="fas fa-location-arrow"></i> Find Qibla Direction</button>
            <p id="qibla-status" style="color: var(--text-medium);">Allow location access to find your Qibla direction.</p>
        </div>
        <script>
            function findQibla() {
                const status = document.getElementById('qibla-status');
                const needle = document.getElementById('qibla-needle');
                status.innerText = "Locating...";
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;
                        // Rough calculation for Mecca (21.4225° N, 39.8262° E)
                        const meccaLat = 21.4225 * Math.PI / 180;
                        const meccaLon = 39.8262 * Math.PI / 180;
                        const userLat = lat * Math.PI / 180;
                        const userLon = lon * Math.PI / 180;
                        const dLon = meccaLon - userLon;
                        const y = Math.sin(dLon) * Math.cos(meccaLat);
                        const x = Math.cos(userLat) * Math.sin(meccaLat) - Math.sin(userLat) * Math.cos(meccaLat) * Math.cos(dLon);
                        let brng = Math.atan2(y, x);
                        brng = brng * 180 / Math.PI;
                        brng = (brng + 360) % 360;
                        
                        needle.style.transform = `rotate(\${brng}deg)`;
                        status.innerHTML = `Qibla Direction: <strong>\${brng.toFixed(2)}°</strong> from True North.`;
                    }, (error) => {
                        status.innerText = "Unable to retrieve your location.";
                    });
                } else {
                    status.innerText = "Geolocation is not supported by this browser.";
                }
            }
        </script>
HTML;
    } else if ($toolType === 'age') {
        $script = <<<HTML
        <div style="padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm); max-width: 600px; margin: 0 auto;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Date of Birth</label>
                <input type="date" id="dob" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>
            <button onclick="calculateAge()" class="btn-primary" style="width: 100%; margin-bottom: 20px;">Calculate Age</button>
            <div id="age-result" style="display: none; background: var(--secondary); padding: 20px; border-radius: 8px; text-align: center;">
                <h3 style="color: var(--primary); margin-bottom: 10px;">Your Gregorian Age</h3>
                <p id="g-age" style="font-size: 1.2rem; font-weight: 700; color: var(--text-dark); margin-bottom: 15px;"></p>
                <h3 style="color: var(--gold-dark); margin-bottom: 10px;">Your Islamic (Hijri) Age</h3>
                <p id="h-age" style="font-size: 1.2rem; font-weight: 700; color: var(--text-dark);"></p>
                <p style="font-size: 0.85rem; color: var(--text-light); margin-top: 10px;">*Hijri age is approximately 3% greater due to shorter lunar years.</p>
            </div>
        </div>
        <script>
            function calculateAge() {
                const dob = new Date(document.getElementById('dob').value);
                if (!dob || isNaN(dob)) return;
                const today = new Date();
                
                // Gregorian Age
                let age = today.getFullYear() - dob.getFullYear();
                const m = today.getMonth() - dob.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                
                // Approximate Hijri Age (33 Gregorian years = 34 Hijri years)
                const diffTime = Math.abs(today - dob);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                const hijriYears = Math.floor(diffDays / 354.367);
                
                document.getElementById('g-age').innerText = `\${age} Years`;
                document.getElementById('h-age').innerText = `\${hijriYears} Lunar Years`;
                document.getElementById('age-result').style.display = 'block';
            }
        </script>
HTML;
    }

    $content = <<<EOD
@extends('layouts.app')

@section('title', '{$title} — Noor-e-Islam')
@section('meta_description', '{$desc}')

@section('content')
<section class="section" style="padding-top: 120px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="{$title}" desc="{$desc}" icon="{$icon}" />

        {$script}
    </div>
</section>
@endsection
EOD;
    return $content;
}


$updates = [
    // Namaz
    'namaz/index.blade.php' => replaceContent('namaz/index.blade.php', 'Learn Salah', 'Importance and Pillars of Salah', 'fa-praying-hands', 'guides', 'guide'),
    'namaz/salah.blade.php' => replaceContent('namaz/salah.blade.php', 'How to Pray Salah', 'Step-by-step visual prayer guide', 'fa-child', 'guides', 'guide'),
    'namaz/show.blade.php' => replaceContent('namaz/show.blade.php', 'Prayer Guide', 'Detailed guide for specific prayer', 'fa-book-open', 'guides', 'guide'),
    
    // Hajj & Umrah
    'hajj_umrah/hajj_guide.blade.php' => replaceContent('hajj_umrah/hajj_guide.blade.php', 'Step-by-step Hajj Guide', 'Day-wise breakdown of Hajj rituals', 'fa-kaaba', 'guides', 'guide'),
    'hajj_umrah/umrah_guide.blade.php' => replaceContent('hajj_umrah/umrah_guide.blade.php', 'Step-by-step Umrah Guide', 'Complete guide to performing Umrah', 'fa-kaaba', 'guides', 'guide'),
    
    // Knowledge
    'knowledge/index.blade.php' => replaceContent('knowledge/index.blade.php', 'Islamic Knowledge', 'Explore the depths of Islamic teachings', 'fa-brain', 'categories', 'category'),
    
    // Tools
    'tools/qibla.blade.php' => replaceToolContent('tools/qibla.blade.php', 'Qibla Direction Finder', 'GPS + compass UI for Qibla', 'fa-compass', 'qibla'),
    'tools/age.blade.php' => replaceToolContent('tools/age.blade.php', 'Age Calculator', 'Islamic + Gregorian Age Calculator', 'fa-calculator', 'age'),
];

// Fallback for others that don't have explicit DB loops yet (Quran, Ramadan, Zakat rules, etc)
$genericUpdates = [
    'zakat/rules.blade.php' => ['title' => 'Zakat Rules', 'desc' => 'Fiqh-based explanations of Zakat calculation', 'icon' => 'fa-book-open'],
    'quran/index.blade.php' => ['title' => 'Holy Quran', 'desc' => 'Read, Listen, and Explore the Quran', 'icon' => 'fa-book-quran'],
    'ramadan/calendar.blade.php' => ['title' => 'Ramadan Calendar', 'desc' => 'Local city-based schedule and countdown', 'icon' => 'fa-calendar-alt'],
];

foreach ($genericUpdates as $file => $meta) {
    $updates[$file] = replaceContent($file, $meta['title'], $meta['desc'], $meta['icon'], 'items', 'item');
}

foreach ($updates as $file => $content) {
    $path = $baseDir . $file;
    if (file_exists($path)) {
        file_put_contents($path, $content);
        echo "Updated $file\n";
    }
}
echo "Done.\n";
