<?php

function replaceContent($filePath, $newHtml) {
    if (!file_exists($filePath)) return;
    $content = file_get_contents($filePath);
    $pattern = '/<!-- CONTENT MOCKUP AREA -->.*?<\/div>\s*<\/div>\s*<\/div>/s';
    $replacement = "<!-- CONTENT MOCKUP AREA -->\n" . $newHtml . "\n            </div>\n        </div>\n    </div>";
    $newContent = preg_replace($pattern, $replacement, $content);
    if ($newContent) {
        file_put_contents($filePath, $newContent);
        echo "Updated $filePath\n";
    }
}

$baseDir = __DIR__ . '/resources/views/pages/';

// Namaz Step-by-step
$namazShow = <<<HTML
<div style="margin-bottom: 40px; display: flex; align-items: center; justify-content: space-between;">
    <h2 style="color: var(--primary-dark); font-family: 'Amiri', serif; font-size: 2rem;">Fajr Prayer Guide</h2>
    <span style="background: var(--primary); color: white; padding: 5px 15px; border-radius: 20px;">2 Rakats Fard</span>
</div>

<div style="display: flex; flex-direction: column; gap: 30px; position: relative;">
    <!-- Timeline Line -->
    <div style="position: absolute; left: 30px; top: 0; bottom: 0; width: 4px; background: #eee; z-index: 0;"></div>
    
    <!-- Step 1 -->
    <div style="position: relative; z-index: 1; display: flex; gap: 20px;">
        <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; flex-shrink: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">1</div>
        <div style="background: #f9f9f9; padding: 25px; border-radius: 12px; border: 1px solid #eee; flex-grow: 1;">
            <h3 style="color: var(--primary-dark); margin-bottom: 10px;">Takbeer (Allahu Akbar)</h3>
            <p style="color: #666; line-height: 1.6;">Raise your hands to your ears and say "Allahu Akbar" (Allah is the greatest) to begin the prayer.</p>
        </div>
    </div>
    
    <!-- Step 2 -->
    <div style="position: relative; z-index: 1; display: flex; gap: 20px;">
        <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; flex-shrink: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">2</div>
        <div style="background: #f9f9f9; padding: 25px; border-radius: 12px; border: 1px solid #eee; flex-grow: 1;">
            <h3 style="color: var(--primary-dark); margin-bottom: 10px;">Qiyam & Recitation</h3>
            <p style="color: #666; line-height: 1.6;">Fold your hands over your chest. Recite Surah Al-Fatiha, followed by another portion of the Quran.</p>
        </div>
    </div>
    
    <!-- Step 3 -->
    <div style="position: relative; z-index: 1; display: flex; gap: 20px;">
        <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; flex-shrink: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">3</div>
        <div style="background: #f9f9f9; padding: 25px; border-radius: 12px; border: 1px solid #eee; flex-grow: 1;">
            <h3 style="color: var(--primary-dark); margin-bottom: 10px;">Ruku (Bowing)</h3>
            <p style="color: #666; line-height: 1.6;">Bow down with your hands on your knees and back straight. Say "Subhana Rabbiyal Azeem" three times.</p>
        </div>
    </div>
    
    <!-- Step 4 -->
    <div style="position: relative; z-index: 1; display: flex; gap: 20px;">
        <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: bold; flex-shrink: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">4</div>
        <div style="background: #f9f9f9; padding: 25px; border-radius: 12px; border: 1px solid #eee; flex-grow: 1;">
            <h3 style="color: var(--primary-dark); margin-bottom: 10px;">Sujood (Prostration)</h3>
            <p style="color: #666; line-height: 1.6;">Prostrate on the floor, ensuring your forehead, nose, palms, knees, and toes touch the ground. Say "Subhana Rabbiyal A'la" three times.</p>
        </div>
    </div>
</div>
HTML;
replaceContent($baseDir . 'namaz/show.blade.php', $namazShow);

// Hajj Guide (Timeline)
$hajjGuide = <<<HTML
<h2 style="color: var(--primary-dark); text-align: center; margin-bottom: 40px;">The 5 Days of Hajj</h2>
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
    <!-- Day 1 -->
    <div style="background: white; border: 1px solid #eee; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <div style="background: var(--primary); color: white; padding: 15px 20px; font-weight: bold; font-size: 1.2rem;">
            Day 1: 8th Dhul-Hijjah
        </div>
        <div style="padding: 20px;">
            <h3 style="color: var(--gold); margin-bottom: 10px;">Tarwiyah (Mina)</h3>
            <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                <li>Enter Ihram from Meeqat or hotel.</li>
                <li>Proceed to Mina before Dhuhr.</li>
                <li>Perform Dhuhr, Asr, Maghrib, Isha, and Fajr in Mina.</li>
            </ul>
        </div>
    </div>
    <!-- Day 2 -->
    <div style="background: white; border: 1px solid #eee; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <div style="background: var(--primary); color: white; padding: 15px 20px; font-weight: bold; font-size: 1.2rem;">
            Day 2: 9th Dhul-Hijjah
        </div>
        <div style="padding: 20px;">
            <h3 style="color: var(--gold); margin-bottom: 10px;">Arafah (The Pinnacle)</h3>
            <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                <li>Proceed to Arafat after sunrise.</li>
                <li>Make intense Dua until sunset.</li>
                <li>Leave for Muzdalifah after sunset without praying Maghrib in Arafat.</li>
            </ul>
        </div>
    </div>
    <!-- Day 3 -->
    <div style="background: white; border: 1px solid #eee; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <div style="background: var(--primary); color: white; padding: 15px 20px; font-weight: bold; font-size: 1.2rem;">
            Day 3: 10th Dhul-Hijjah
        </div>
        <div style="padding: 20px;">
            <h3 style="color: var(--gold); margin-bottom: 10px;">Eid & Jamarat</h3>
            <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                <li>Stone Jamarat Al-Aqabah (7 pebbles).</li>
                <li>Perform sacrifice (Qurbani).</li>
                <li>Shave or trim hair, remove Ihram.</li>
                <li>Tawaf Al-Ifadah in Makkah.</li>
            </ul>
        </div>
    </div>
</div>
HTML;
replaceContent($baseDir . 'hajj_umrah/hajj_guide.blade.php', $hajjGuide);

// Age Calculator
$ageCalc = <<<HTML
<div style="text-align: center; max-width: 500px; margin: 0 auto; background: #f9f9f9; padding: 40px; border-radius: 12px; border: 1px solid #eee; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
    <i class="fas fa-birthday-cake" style="font-size: 4rem; color: var(--gold); margin-bottom: 20px;"></i>
    <h2 style="color: var(--primary-dark); margin-bottom: 20px;">Find Your Islamic Age</h2>
    <p style="color: #666; margin-bottom: 30px;">The Hijri calendar is lunar, meaning years are shorter. You are statistically older in Hijri years!</p>
    
    <div style="margin-bottom: 20px; text-align: left;">
        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #555;">Enter Gregorian Date of Birth</label>
        <input type="date" id="dob" style="width: 100%; padding: 12px; border-radius: 6px; border: 1px solid #ddd; font-size: 1rem;">
    </div>
    
    <button onclick="calculateAge()" class="btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;"><i class="fas fa-calculator"></i> Calculate Age</button>
    
    <div id="resultBox" style="display: none; margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd;">
        <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
            <div style="text-align: center; width: 48%; background: white; padding: 15px; border-radius: 8px; border: 1px solid var(--primary);">
                <div style="font-size: 0.9rem; color: #777;">Gregorian Age</div>
                <div id="gregAge" style="font-size: 1.8rem; font-weight: bold; color: var(--primary-dark);">0</div>
                <div style="font-size: 0.8rem; color: #999;">Years</div>
            </div>
            <div style="text-align: center; width: 48%; background: var(--primary); padding: 15px; border-radius: 8px; color: white;">
                <div style="font-size: 0.9rem; opacity: 0.9;">Hijri Age</div>
                <div id="hijriAge" style="font-size: 1.8rem; font-weight: bold;">0</div>
                <div style="font-size: 0.8rem; opacity: 0.8;">Years</div>
            </div>
        </div>
    </div>
</div>
<script>
function calculateAge() {
    const dob = document.getElementById('dob').value;
    if(!dob) return alert('Please enter a date of birth');
    
    const birthDate = new Date(dob);
    const today = new Date();
    
    // Gregorian
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    
    // Hijri (Approximate: Hijri year is ~11 days shorter)
    // 365.25 / 354.36 = 1.0307
    const hijriFactor = 1.0307;
    const hAge = Math.floor(age * hijriFactor);
    
    document.getElementById('gregAge').innerText = age;
    document.getElementById('hijriAge').innerText = hAge;
    document.getElementById('resultBox').style.display = 'block';
}
</script>
HTML;
replaceContent($baseDir . 'tools/age.blade.php', $ageCalc);

// Pillars of Islam
$pillarsIslam = <<<HTML
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-hand-holding-heart" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">1. Shahada</h3>
        <p style="color: #666; font-size: 0.95rem;">Declaration of Faith. Bearing witness that there is no god but Allah and Muhammad (PBUH) is His messenger.</p>
    </div>
    
    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-praying-hands" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">2. Salah</h3>
        <p style="color: #666; font-size: 0.95rem;">Establishing the five daily prayers. It is the direct connection between the servant and the Creator.</p>
    </div>

    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-hand-holding-usd" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">3. Zakat</h3>
        <p style="color: #666; font-size: 0.95rem;">Almsgiving. Purifying one's wealth by giving a specific portion to those in need.</p>
    </div>

    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-moon" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">4. Sawm</h3>
        <p style="color: #666; font-size: 0.95rem;">Fasting during the month of Ramadan. Abstaining from food, drink, and worldly desires from dawn to dusk.</p>
    </div>

    <div style="text-align: center; background: #fff; border: 1px solid #eee; padding: 30px 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-top: 4px solid var(--primary);">
        <i class="fas fa-kaaba" style="font-size: 3rem; color: var(--gold); margin-bottom: 15px;"></i>
        <h3 style="color: var(--primary-dark); font-size: 1.5rem; margin-bottom: 10px;">5. Hajj</h3>
        <p style="color: #666; font-size: 0.95rem;">The pilgrimage to Makkah. Mandatory at least once in a lifetime for those physically and financially able.</p>
    </div>
</div>
HTML;
replaceContent($baseDir . 'knowledge/pillars_islam.blade.php', $pillarsIslam);

echo "Additional content injection complete.\n";
