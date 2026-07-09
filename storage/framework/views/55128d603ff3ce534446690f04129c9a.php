

<?php $__env->startSection('title', isset($seoMeta) ? $seoMeta->title : 'Digital Tasbeeh Counter Online | Free Dhikr Tracker'); ?>
<?php $__env->startSection('meta_description', isset($seoMeta) ? $seoMeta->description : ''); ?>

<?php $__env->startSection('content'); ?>
<style>
    :root {
        --tasbeeh-bg: #ffffff;
        --tasbeeh-text: #333333;
        --tasbeeh-border: #eaeaea;
        --tasbeeh-circle: var(--primary);
    }
    body.dark-mode-tasbeeh {
        --tasbeeh-bg: #1a1a1a;
        --tasbeeh-text: #f0f0f0;
        --tasbeeh-border: #333333;
        --tasbeeh-circle: #125740;
        background-color: #121212;
    }
    .tasbeeh-widget {
        background: var(--tasbeeh-bg);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--tasbeeh-border);
        padding: 40px;
        max-width: 500px;
        margin: 0 auto;
        color: var(--tasbeeh-text);
        transition: all 0.3s ease;
    }
    .tasbeeh-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid var(--tasbeeh-border);
        padding-bottom: 15px;
        margin-bottom: 25px;
    }
    .tasbeeh-header h2 {
        font-size: 1.4rem;
        margin: 0;
        color: var(--primary);
    }
    .tasbeeh-tools button {
        background: none;
        border: none;
        color: #888;
        font-size: 1.2rem;
        cursor: pointer;
        margin-left: 10px;
        transition: color 0.2s;
    }
    .tasbeeh-tools button:hover {
        color: var(--primary);
    }
    .tasbeeh-display {
        text-align: center;
        margin: 30px 0;
    }
    .tasbeeh-count {
        font-size: 6rem;
        font-weight: 800;
        color: var(--tasbeeh-text);
        font-family: 'Poppins', sans-serif;
        line-height: 1;
        text-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .btn-tap {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: linear-gradient(145deg, var(--primary), var(--primary-dark));
        color: white;
        font-size: 2rem;
        font-weight: 700;
        border: 4px solid var(--gold-light);
        box-shadow: 0 10px 20px rgba(5,67,62,0.3), inset 0 -5px 15px rgba(0,0,0,0.2);
        cursor: pointer;
        transition: all 0.1s;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 40px auto;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
    }
    .btn-tap:active {
        transform: scale(0.92);
        box-shadow: 0 5px 10px rgba(5,67,62,0.3), inset 0 5px 15px rgba(0,0,0,0.3);
    }
    .tasbeeh-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(0,0,0,0.02);
        padding: 20px;
        border-radius: 12px;
        border: 1px solid var(--tasbeeh-border);
    }
    .target-group {
        display: flex;
        flex-direction: column;
    }
    .target-group label {
        font-size: 0.85rem;
        color: #777;
        margin-bottom: 5px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .settings-select {
        padding: 10px 15px;
        border-radius: 8px;
        border: 1px solid var(--tasbeeh-border);
        font-size: 1rem;
        color: var(--tasbeeh-text);
        background: var(--tasbeeh-bg);
        cursor: pointer;
        min-width: 120px;
        font-weight: 600;
    }
    .btn-reset {
        background: transparent;
        color: #e74c3c;
        border: 2px solid #e74c3c;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-reset:hover {
        background: #e74c3c;
        color: white;
    }
    
    /* Fullscreen Mode */
    body.fullscreen-mode header, body.fullscreen-mode footer, body.fullscreen-mode .seo-content-section {
        display: none !important;
    }
    body.fullscreen-mode .tasbeeh-widget {
        margin-top: 10vh;
        transform: scale(1.1);
    }

    /* SEO Content Styles */
    .seo-content-section {
        max-width: 900px;
        margin: 60px auto;
        padding: 0 20px;
        color: #444;
        line-height: 1.8;
    }
    .seo-content-section h2 {
        color: var(--primary);
        font-family: 'Playfair Display', serif;
        margin-top: 40px;
        border-bottom: 2px solid var(--gold);
        display: inline-block;
        padding-bottom: 5px;
    }
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .feature-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        border: 1px solid var(--border-light);
    }
    .feature-card h3 {
        color: var(--primary);
        margin-top: 0;
    }
</style>

<!-- JSON-LD Software Application Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Digital Tasbeeh Counter Online",
  "url": "<?php echo e(url()->current()); ?>",
  "applicationCategory": "UtilitiesApplication",
  "operatingSystem": "All",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "description": "A free, web-based digital tasbeeh counter featuring local save, haptic feedback, sound toggle, and target presets for daily dhikr.",
  "featureList": ["Save Progress", "Haptic Vibration", "Audio Feedback", "Presets (33, 99, 100)"]
}
</script>

<section class="section" style="padding-top: 60px; background: var(--cream);">
    <div class="section-inner">
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--primary); margin-bottom: 10px;">Online Digital Tasbeeh Counter</h1>
            <p style="color: #666; font-size: 1.1rem;">Your free, local-saving dhikr tracker. Tap anywhere or press Spacebar.</p>
        </div>

        <div class="tasbeeh-widget" id="tasbeehApp">
            <div class="tasbeeh-header">
                <h2><i class="fas fa-fingerprint" style="color: var(--gold);"></i> Dhikr Tracker</h2>
                <div class="tasbeeh-tools">
                    <button id="soundToggle" title="Toggle Sound"><i class="fas fa-volume-up"></i></button>
                    <button id="darkModeToggle" title="Toggle Dark Mode"><i class="fas fa-moon"></i></button>
                    <button id="fullscreenToggle" title="Fullscreen Mode"><i class="fas fa-expand"></i></button>
                </div>
            </div>
            
            <div class="tasbeeh-display">
                <div id="tasbeehCount" class="tasbeeh-count">0</div>
            </div>
            
            <button id="tapBtn" class="btn-tap">TAP</button>
            
            <div class="tasbeeh-controls">
                <div class="target-group">
                    <label>Target Cycle</label>
                    <select id="targetSelect" class="settings-select">
                        <option value="33">33 (Subhanallah)</option>
                        <option value="99">99 (Names of Allah)</option>
                        <option value="100">100 (Istighfar)</option>
                        <option value="1000">1000</option>
                        <option value="infinite" selected>Infinite</option>
                    </select>
                </div>
                <div>
                    <button id="resetBtn" class="btn-reset">Reset</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SEO & Informational Content Section -->
<section class="seo-content-section" itemscope itemtype="https://schema.org/Article">
    <div itemprop="articleBody">
        <h2>What is an Online Tasbeeh Counter?</h2>
        <p>An online digital tasbeeh counter is a web-based utility designed to help Muslims track their daily dhikr (remembrance of Allah) without needing a physical misbaha (prayer beads). Whether you are reciting Subhanallah, Alhamdulillah, or performing daily Istighfar, our counter ensures you never lose track of your count.</p>

        <h2>Benefits of Our Digital Dhikr Tracker</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <h3>💾 Auto-Save Progress</h3>
                <p>If you accidentally close the tab or your phone dies, your count is saved locally on your device. You can pick up exactly where you left off.</p>
            </div>
            <div class="feature-card">
                <h3>📳 Haptic Feedback</h3>
                <p>Feel a subtle vibration on your mobile device with every tap, simulating the tactile feel of physical tasbeeh beads so you don't have to look at the screen.</p>
            </div>
            <div class="feature-card">
                <h3>🎯 Target Presets</h3>
                <p>Easily set goals for 33 (post-salah dhikr), 99 (Asma ul Husna), or 100. The counter will alert you when your cycle is complete.</p>
            </div>
            <div class="feature-card">
                <h3>🌙 Dark Mode & Fullscreen</h3>
                <p>Switch to dark mode to reduce eye strain at night, and enter fullscreen mode to prevent accidental clicks on other links while doing dhikr.</p>
            </div>
        </div>

        <h2>Popular Dhikr to Recite Daily</h2>
        <ul>
            <li><strong>Subhanallah (33 times):</strong> Glory be to Allah. (Often recited after obligatory prayers).</li>
            <li><strong>Alhamdulillah (33 times):</strong> Praise be to Allah.</li>
            <li><strong>Allahu Akbar (34 times):</strong> Allah is the Greatest.</li>
            <li><strong>Astaghfirullah (100 times):</strong> I seek forgiveness from Allah.</li>
            <li><strong>Durood Shareef:</strong> Sending blessings upon Prophet Muhammad (PBUH).</li>
        </ul>

        <div style="margin-top: 50px; text-align: center; background: #fff; padding: 30px; border-radius: 12px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light);">
            <h3 style="color: var(--primary); margin-top: 0;">Explore More</h3>
            <p>Looking for the specific method to pray <strong>Salat-ul-Tasbeeh</strong>? We have a complete step-by-step guide explaining the virtues, the exact tasbeeh, and how to perform the 4 Rakat prayer.</p>
            <a href="<?php echo e(route('namaz.salat_tasbeeh')); ?>" style="display: inline-block; margin-top: 10px; padding: 10px 25px; background: var(--gold); color: #fff; text-decoration: none; border-radius: 8px; font-weight: bold;">Read Salat-ul-Tasbeeh Guide</a>
        </div>
    </div>
</section>

<!-- SEO FAQ Section -->
<section class="seo-content-section" style="margin-top: 0;">
    <h2>Frequently Asked Questions</h2>
    <div itemscope itemtype="https://schema.org/FAQPage">
        
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 20px; background: #fff; padding: 20px; border-radius: 8px; border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="margin-top: 0; font-size: 1.1rem; color: var(--primary);">Does the online tasbeeh counter work offline?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text">Once the page is loaded, the digital tasbeeh counter relies entirely on your browser's local storage and Javascript. It will continue to work and save your count even if your internet connection drops.</div>
            </div>
        </div>

        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 20px; background: #fff; padding: 20px; border-radius: 8px; border: 1px solid var(--border-light);">
            <h3 itemprop="name" style="margin-top: 0; font-size: 1.1rem; color: var(--primary);">Is it permissible to use a digital counter for dhikr?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text">Yes, the majority of Islamic scholars agree that using physical beads (misbaha), digital clickers, or online counter apps is completely permissible (Mubah). They are simply tools to help you keep track of numbers, allowing you to focus on the meaning of your dhikr rather than the math. However, counting on the fingers of the right hand remains a highly recommended Sunnah.</div>
            </div>
        </div>
        
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const countEl = document.getElementById('tasbeehCount');
    const tapBtn = document.getElementById('tapBtn');
    const resetBtn = document.getElementById('resetBtn');
    const targetSelect = document.getElementById('targetSelect');
    
    const soundToggle = document.getElementById('soundToggle');
    const darkModeToggle = document.getElementById('darkModeToggle');
    const fullscreenToggle = document.getElementById('fullscreenToggle');

    let currentCount = parseInt(localStorage.getItem('tasbeeh_count')) || 0;
    let isSoundEnabled = localStorage.getItem('tasbeeh_sound') !== 'false';
    let isDarkMode = localStorage.getItem('tasbeeh_dark') === 'true';

    // Init state
    countEl.innerText = currentCount;
    if(isDarkMode) document.body.classList.add('dark-mode-tasbeeh');
    if(!isSoundEnabled) soundToggle.innerHTML = '<i class="fas fa-volume-mute"></i>';

    // Audio context (soft click)
    const playClickSound = () => {
        if (!isSoundEnabled) return;
        try {
            const AudioContext = window.AudioContext || window.webkitAudioContext;
            const ctx = new AudioContext();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(800, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(300, ctx.currentTime + 0.05);
            gain.gain.setValueAtTime(0.1, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.05);
            osc.start(ctx.currentTime);
            osc.stop(ctx.currentTime + 0.05);
        } catch (e) { console.log('Audio not supported'); }
    };

    // Tap logic
    tapBtn.addEventListener('click', function(e) {
        e.preventDefault();
        currentCount++;
        let target = targetSelect.value;
        
        if(target !== 'infinite' && currentCount > parseInt(target)) {
            currentCount = 1; // reset cycle
            if(navigator.vibrate) navigator.vibrate([100, 50, 100]); // double vibrate
        } else {
            if(navigator.vibrate) navigator.vibrate(30);
        }

        playClickSound();
        countEl.innerText = currentCount;
        localStorage.setItem('tasbeeh_count', currentCount);
    });

    // Spacebar support
    document.addEventListener('keydown', function(e) {
        if(e.code === 'Space' && e.target === document.body) {
            e.preventDefault();
            tapBtn.click();
            tapBtn.style.transform = 'scale(0.92)';
            setTimeout(() => tapBtn.style.transform = 'none', 100);
        }
    });

    // Controls
    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to reset your dhikr count to 0?')) {
            currentCount = 0;
            countEl.innerText = currentCount;
            localStorage.setItem('tasbeeh_count', 0);
        }
    });

    soundToggle.addEventListener('click', () => {
        isSoundEnabled = !isSoundEnabled;
        localStorage.setItem('tasbeeh_sound', isSoundEnabled);
        soundToggle.innerHTML = isSoundEnabled ? '<i class="fas fa-volume-up"></i>' : '<i class="fas fa-volume-mute"></i>';
    });

    darkModeToggle.addEventListener('click', () => {
        isDarkMode = !isDarkMode;
        localStorage.setItem('tasbeeh_dark', isDarkMode);
        document.body.classList.toggle('dark-mode-tasbeeh');
    });

    fullscreenToggle.addEventListener('click', () => {
        document.body.classList.toggle('fullscreen-mode');
        if (document.body.classList.contains('fullscreen-mode')) {
            fullscreenToggle.innerHTML = '<i class="fas fa-compress"></i>';
            window.scrollTo(0,0);
        } else {
            fullscreenToggle.innerHTML = '<i class="fas fa-expand"></i>';
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/tasbeeh/tracker.blade.php ENDPATH**/ ?>