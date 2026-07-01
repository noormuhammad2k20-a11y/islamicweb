<?php

function replaceContent($filePath, $newHtml) {
    if (!file_exists($filePath)) return;
    $content = file_get_contents($filePath);
    $startToken = '<!-- CONTENT MOCKUP AREA -->';
    $endToken = '</div>'; // This might be tricky, let's use regex
    
    // Replace everything after CONTENT MOCKUP AREA until the closing div of contact-info
    $pattern = '/<!-- CONTENT MOCKUP AREA -->.*?<\/div>\s*<\/div>\s*<\/div>/s';
    
    $replacement = "<!-- CONTENT MOCKUP AREA -->\n" . $newHtml . "\n            </div>\n        </div>\n    </div>";
    
    $newContent = preg_replace($pattern, $replacement, $content);
    if ($newContent) {
        file_put_contents($filePath, $newContent);
        echo "Updated $filePath\n";
    }
}

$baseDir = __DIR__ . '/resources/views/pages/';

// 1. Namaz Index
$namazIndex = <<<HTML
<div style="margin-bottom: 40px;">
    <h2 style="color: var(--primary-dark); font-family: 'Amiri', serif; font-size: 2rem;">The Importance of Salah</h2>
    <p style="font-size: 1.15rem; line-height: 1.8; color: #555;">Salah is the second pillar of Islam and the most important act of worship. It is a direct link between the worshipper and Allah.</p>
</div>
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px;">
    <div style="background: var(--bg-color); padding: 20px; border-radius: 8px; border-left: 4px solid var(--primary);">
        <h3>Fajr</h3>
        <p>Dawn Prayer (2 Rakats Fard)</p>
        <a href="{{ route('namaz.show', 'fajr') }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary); margin-top:10px;">Learn How</a>
    </div>
    <div style="background: var(--bg-color); padding: 20px; border-radius: 8px; border-left: 4px solid var(--primary);">
        <h3>Dhuhr</h3>
        <p>Noon Prayer (4 Rakats Fard)</p>
        <a href="{{ route('namaz.show', 'dhuhr') }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary); margin-top:10px;">Learn How</a>
    </div>
    <div style="background: var(--bg-color); padding: 20px; border-radius: 8px; border-left: 4px solid var(--primary);">
        <h3>Asr</h3>
        <p>Afternoon Prayer (4 Rakats Fard)</p>
        <a href="{{ route('namaz.show', 'asr') }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary); margin-top:10px;">Learn How</a>
    </div>
    <div style="background: var(--bg-color); padding: 20px; border-radius: 8px; border-left: 4px solid var(--primary);">
        <h3>Maghrib</h3>
        <p>Sunset Prayer (3 Rakats Fard)</p>
        <a href="{{ route('namaz.show', 'maghrib') }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary); margin-top:10px;">Learn How</a>
    </div>
    <div style="background: var(--bg-color); padding: 20px; border-radius: 8px; border-left: 4px solid var(--primary);">
        <h3>Isha</h3>
        <p>Night Prayer (4 Rakats Fard)</p>
        <a href="{{ route('namaz.show', 'isha') }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary); margin-top:10px;">Learn How</a>
    </div>
</div>
<div style="margin-top: 40px;">
    <h2 style="color: var(--primary-dark); font-family: 'Amiri', serif;">Common Mistakes in Salah</h2>
    <ul style="line-height: 1.8; color: #555; padding-left: 20px;">
        <li>Not pausing during Ruku and Sujood (lack of Khushu)</li>
        <li>Looking around or up at the sky during prayer</li>
        <li>Reciting too fast without understanding</li>
    </ul>
</div>
HTML;
replaceContent($baseDir . 'namaz/index.blade.php', $namazIndex);

// 2. Qibla Compass
$qiblaHtml = <<<HTML
<div style="text-align: center; padding: 40px 0;">
    <div id="compass-container" style="position: relative; width: 300px; height: 300px; margin: 0 auto; border-radius: 50%; border: 10px solid var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; background: url('https://upload.wikimedia.org/wikipedia/commons/4/41/Compass_rose_brown.svg') no-repeat center center; background-size: 80%;">
        <div id="qibla-pointer" style="position: absolute; top: 10%; width: 4px; height: 40%; background: var(--gold); transform-origin: bottom center; transition: transform 0.2s ease-out;">
            <div style="position: absolute; top: -10px; left: -8px; width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 20px solid var(--gold);"></div>
        </div>
    </div>
    <div style="margin-top: 30px;">
        <button onclick="initCompass()" class="btn-primary" style="font-size: 1.2rem; padding: 15px 30px;"><i class="fas fa-location-arrow"></i> Find Qibla</button>
        <p id="compass-status" style="margin-top: 15px; color: #666;">Click the button and allow location access.</p>
    </div>
</div>
<script>
function initCompass() {
    const status = document.getElementById('compass-status');
    const pointer = document.getElementById('qibla-pointer');
    
    if (!navigator.geolocation) {
        status.innerText = "Geolocation is not supported by your browser.";
        return;
    }
    
    status.innerText = "Locating...";
    navigator.geolocation.getCurrentPosition((position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        // Mock calculation for Qibla (Kaaba is 21.4225° N, 39.8262° E)
        status.innerText = "Calculating Qibla direction based on your location...";
        
        // Request device orientation
        if (window.DeviceOrientationEvent) {
            window.addEventListener('deviceorientation', function(event) {
                if (event.alpha !== null) {
                    // Mock offset for Qibla based on heading
                    let heading = event.webkitCompassHeading || Math.abs(event.alpha - 360);
                    let qiblaAngle = (255 - heading); // Mock logic for demo
                    pointer.style.transform = `rotate(\${qiblaAngle}deg)`;
                    status.innerText = `Qibla found. Please follow the golden pointer.`;
                }
            }, true);
        } else {
            status.innerText = "Device orientation not supported on this device. Please use a mobile phone.";
        }
    }, () => {
        status.innerText = "Unable to retrieve your location. Please ensure location services are enabled.";
    });
}
</script>
HTML;
replaceContent($baseDir . 'tools/qibla.blade.php', $qiblaHtml);

// 3. Ramadan Countdown
$ramadanCalendar = <<<HTML
<div style="text-align: center; margin-bottom: 50px; padding: 40px; background: linear-gradient(135deg, var(--primary-dark), var(--primary)); border-radius: 15px; color: white; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
    <i class="fas fa-moon" style="font-size: 4rem; color: var(--gold); margin-bottom: 20px;"></i>
    <h2 style="color: white; font-size: 2.5rem; margin-bottom: 10px; font-family: 'Amiri', serif;">Countdown to Ramadan</h2>
    <div id="countdown" style="display: flex; justify-content: center; gap: 20px; font-size: 2rem; font-weight: bold; margin-top: 20px;">
        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; min-width: 100px;">
            <span id="days">00</span>
            <div style="font-size: 1rem; font-weight: normal; opacity: 0.8;">Days</div>
        </div>
        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; min-width: 100px;">
            <span id="hours">00</span>
            <div style="font-size: 1rem; font-weight: normal; opacity: 0.8;">Hours</div>
        </div>
        <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; min-width: 100px;">
            <span id="mins">00</span>
            <div style="font-size: 1rem; font-weight: normal; opacity: 0.8;">Mins</div>
        </div>
    </div>
</div>
<script>
    // Set mock date for next Ramadan
    const ramadanDate = new Date();
    ramadanDate.setMonth(ramadanDate.getMonth() + 3); // Approx 3 months from now
    
    setInterval(function() {
        const now = new Date().getTime();
        const distance = ramadanDate.getTime() - now;
        
        document.getElementById("days").innerHTML = Math.floor(distance / (1000 * 60 * 60 * 24));
        document.getElementById("hours").innerHTML = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        document.getElementById("mins").innerHTML = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    }, 1000);
</script>
<h3 style="color: var(--primary); margin-bottom: 20px;"><i class="fas fa-calendar-alt"></i> Local Timetable</h3>
<p style="color: #666; margin-bottom: 20px;">Your full 30-day Ramadan timetable will appear here based on your detected city.</p>
<table style="width: 100%; border-collapse: collapse; margin-top: 20px; text-align: center;">
    <tr style="background: var(--primary); color: white;">
        <th style="padding: 15px; border: 1px solid #ddd;">Ramadan</th>
        <th style="padding: 15px; border: 1px solid #ddd;">Date</th>
        <th style="padding: 15px; border: 1px solid #ddd;">Sehri Ends</th>
        <th style="padding: 15px; border: 1px solid #ddd;">Iftar Starts</th>
    </tr>
    <tr style="background: #f9f9f9;">
        <td style="padding: 15px; border: 1px solid #ddd;">1</td>
        <td style="padding: 15px; border: 1px solid #ddd;">1st Mar 2026</td>
        <td style="padding: 15px; border: 1px solid #ddd;">05:12 AM</td>
        <td style="padding: 15px; border: 1px solid #ddd;">06:45 PM</td>
    </tr>
    <tr>
        <td style="padding: 15px; border: 1px solid #ddd;">2</td>
        <td style="padding: 15px; border: 1px solid #ddd;">2nd Mar 2026</td>
        <td style="padding: 15px; border: 1px solid #ddd;">05:11 AM</td>
        <td style="padding: 15px; border: 1px solid #ddd;">06:46 PM</td>
    </tr>
</table>
HTML;
replaceContent($baseDir . 'ramadan/calendar.blade.php', $ramadanCalendar);

// 4. Holy Quran Reader with Toggle
$quranReader = <<<HTML
<div style="display: flex; justify-content: space-between; align-items: center; background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #eee;">
    <div>
        <h3 style="margin: 0; color: var(--primary);">Surah Al-Fatiha</h3>
        <span style="font-size: 0.9rem; color: #777;">The Opener (7 Verses)</span>
    </div>
    <div style="display: flex; gap: 15px; align-items: center;">
        <label style="display: flex; align-items: center; cursor: pointer; font-weight: bold; color: #555;">
            <input type="checkbox" id="translationToggle" checked onchange="toggleTranslation()" style="margin-right: 10px; width: 20px; height: 20px;">
            Show Translation
        </label>
        <button class="btn-primary" style="padding: 8px 15px; font-size: 0.9rem;"><i class="fas fa-play"></i> Play Audio</button>
    </div>
</div>

<div class="quran-verses">
    <!-- Bismillah -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 2.5rem; color: var(--primary-dark);">بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</h2>
    </div>

    <!-- Verse 1 -->
    <div style="padding: 30px; border-bottom: 1px solid #eee; text-align: right;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="font-size: 0.9rem; color: #999; background: #eee; padding: 5px 15px; border-radius: 20px;">1:1</div>
            <div style="font-family: 'Amiri', serif; font-size: 2.5rem; line-height: 1.8; color: #333; margin-left: 20px;">
                ٱلْحَمْدُ لِلَّهِ رَبِّ ٱلْعَٰلَمِينَ
            </div>
        </div>
        <div class="translation-text" style="text-align: left; margin-top: 20px; font-size: 1.2rem; color: #666; font-style: italic;">
            [All] praise is [due] to Allah, Lord of the worlds -
        </div>
    </div>
    
    <!-- Verse 2 -->
    <div style="padding: 30px; border-bottom: 1px solid #eee; text-align: right;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="font-size: 0.9rem; color: #999; background: #eee; padding: 5px 15px; border-radius: 20px;">1:2</div>
            <div style="font-family: 'Amiri', serif; font-size: 2.5rem; line-height: 1.8; color: #333; margin-left: 20px;">
                ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
            </div>
        </div>
        <div class="translation-text" style="text-align: left; margin-top: 20px; font-size: 1.2rem; color: #666; font-style: italic;">
            The Entirely Merciful, the Especially Merciful,
        </div>
    </div>
</div>

<script>
function toggleTranslation() {
    const isChecked = document.getElementById('translationToggle').checked;
    const translations = document.querySelectorAll('.translation-text');
    translations.forEach(el => {
        el.style.display = isChecked ? 'block' : 'none';
    });
}
</script>
HTML;
replaceContent($baseDir . 'quran/reading.blade.php', $quranReader);

// 5. 99 Names of Allah
$namesAllah = <<<HTML
<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
    <!-- Name 1 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلرَّحْمَٰنُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Ar-Rahman</h3>
        <p style="color: #666; font-size: 0.9rem;">The Most or Entirely Merciful</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
    <!-- Name 2 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلرَّحِيمُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Ar-Raheem</h3>
        <p style="color: #666; font-size: 0.9rem;">The Bestower of Mercy</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
    <!-- Name 3 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلْمَلِكُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Al-Malik</h3>
        <p style="color: #666; font-size: 0.9rem;">The King and Owner of Dominion</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
    <!-- Name 4 -->
    <div style="text-align: center; background: #f9f9f9; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; transition: transform 0.3s; cursor: pointer;">
        <h2 style="font-family: 'Amiri', serif; font-size: 3rem; color: var(--gold); margin-bottom: 10px;">ٱلْقُدُّوسُ</h2>
        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Al-Quddus</h3>
        <p style="color: #666; font-size: 0.9rem;">The Absolutely Pure</p>
        <button class="btn-outline-hero" style="border: none; color: var(--primary); margin-top: 15px;"><i class="fas fa-volume-up"></i> Listen</button>
    </div>
</div>
HTML;
replaceContent($baseDir . 'knowledge/names_allah.blade.php', $namesAllah);

echo "Content injection complete.\n";
