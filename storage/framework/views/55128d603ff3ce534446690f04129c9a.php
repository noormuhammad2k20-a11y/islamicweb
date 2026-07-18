

<?php $__env->startSection('title', isset($seoMeta) ? $seoMeta->title : 'Digital Tasbeeh Counter Online | Free Dhikr Tracker'); ?>
<?php $__env->startSection('meta_description', isset($seoMeta) ? $seoMeta->description : ''); ?>

<?php $__env->startSection('content'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700;800&family=Scheherazade+New:wght@400;700&display=swap');

    :root {
        --bg-main: #F7F8FA;
        --bg-alt: #FFFFFF;
        --navy: #0A1F3F;
        --navy-mid: #0F2D52;
        --navy-light: #14466E;
        --navy-tint: #E4EBF3;
        --gold: #C9A84C;
        --gold-light: #E4D08C;
        --gold-dark: #8A6E2F;
        --gold-tint: #FBF8EE;
        --gold-gradient: linear-gradient(135deg, #C9A84C 0%, #E4D08C 50%, #C9A84C 100%);
        --text-dark: #0C1425;
        --text-medium: #4A5568;
        --text-light: #8E9AB0;
        --text-faint: #B8C2D4;
        --white: #ffffff;
        --border: #DFE5ED;
        --border-light: #EDF0F5;
        --shadow-xs: 0 1px 3px rgba(10, 31, 63, 0.04);
        --shadow-sm: 0 4px 12px rgba(10, 31, 63, 0.05);
        --shadow-md: 0 8px 30px rgba(10, 31, 63, 0.07);
        --shadow-lg: 0 16px 48px rgba(10, 31, 63, 0.10);
        --shadow-gold: 0 8px 32px rgba(201, 168, 76, 0.15);
        --radius-sm: 14px;
        --radius-md: 22px;
        --radius-lg: 32px;
        --radius-full: 9999px;
        --tr: all .45s cubic-bezier(.25, .46, .45, .94);
        --tr-fast: all .25s cubic-bezier(.25, .46, .45, .94);
    }

    body.dark-mode-tasbeeh {
        --bg-main: #050A14;
        --bg-alt: #0F2D52;
        --navy: #FFFFFF;
        --navy-mid: #E4D08C;
        --navy-tint: rgba(255,255,255,0.1);
        --text-dark: #FFFFFF;
        --text-medium: rgba(255,255,255,0.8);
        --text-light: rgba(255,255,255,0.6);
        --border: rgba(255,255,255,0.1);
        --border-light: rgba(255,255,255,0.1);
        --gold-tint: rgba(201, 168, 76, 0.1);
        background-color: #050A14;
    }

    .tasbeeh-section { 
        background: var(--bg-main); 
        padding: 80px 0; 
        position: relative; 
        overflow: hidden; 
    }
    .tasbeeh-section::before {
        content: ""; position: absolute; top: 10%; right: -5%;
        width: 600px; height: 600px;
        background: radial-gradient(circle, rgba(201, 168, 76, 0.05), transparent 60%);
        border-radius: 50%; pointer-events: none; z-index: 0;
    }
    .tasbeeh-section .section-inner { 
        max-width: 1140px; margin: 0 auto; padding: 0 20px; 
        position: relative; z-index: 1; 
    }

    .tasbeeh-page-header { text-align: center; margin-bottom: 50px; }
    .tasbeeh-page-header h1 { font-family: 'Cormorant Garamond', serif; font-size: 3rem; color: var(--navy); margin-bottom: 12px; font-weight: 700; line-height: 1.1; }
    .tasbeeh-page-header h1 span { color: var(--gold-dark); font-style: italic; }
    .tasbeeh-page-header p { font-size: 1.05rem; color: var(--text-medium); max-width: 600px; margin: 0 auto; line-height: 1.85; }
    .gold-divider { width: 60px; height: 3px; background: var(--gold-gradient); border-radius: 2px; margin: 0 auto 25px; box-shadow: 0 0 12px rgba(201, 168, 76, 0.25); }

    .tasbeeh-widget {
        background: var(--white); border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg); border: 1px solid var(--border-light);
        padding: 40px; max-width: 500px; margin: 0 auto;
        color: var(--text-dark); transition: all 0.3s ease;
        position: relative; overflow: hidden;
    }
    .tasbeeh-widget::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }

    .tasbeeh-header {
        display: flex; justify-content: space-between; align-items: center;
        border-bottom: 1px solid var(--border-light); padding-bottom: 20px; margin-bottom: 30px;
    }
    .tasbeeh-header h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; margin: 0; color: var(--navy); font-weight: 700; }
    .tasbeeh-header h2 i { color: var(--gold); margin-right: 8px; }
    
    .tasbeeh-tools button {
        background: var(--bg-main); border: 1px solid var(--border-light); color: var(--text-light);
        width: 40px; height: 40px; border-radius: 12px; font-size: 1rem; cursor: pointer;
        margin-left: 8px; transition: var(--tr-fast); display: inline-flex; align-items: center; justify-content: center;
    }
    .tasbeeh-tools button:hover { color: var(--gold-dark); border-color: var(--gold); background: var(--gold-tint); }

    .tasbeeh-display { text-align: center; margin: 30px 0; }
    .tasbeeh-count {
        font-family: 'Cormorant Garamond', serif; font-size: 6rem; font-weight: 700;
        color: var(--navy); line-height: 1; text-shadow: 0 4px 10px rgba(10,31,63,0.05);
    }

    .btn-tap {
        width: 180px; height: 180px; border-radius: 50%;
        background: linear-gradient(145deg, var(--navy), var(--navy-mid)); color: var(--white);
        font-family: 'Outfit', sans-serif; font-size: 1.2rem; font-weight: 700; letter-spacing: 1px;
        border: 4px solid var(--gold); box-shadow: 0 15px 30px rgba(10,31,63,0.2);
        cursor: pointer; transition: all 0.1s; display: flex; align-items: center; justify-content: center;
        margin: 0 auto 40px auto; user-select: none; -webkit-tap-highlight-color: transparent;
        position: relative; overflow: hidden;
    }
    .btn-tap::after {
        content: ""; position: absolute; top: 10px; left: 10px; right: 10px; bottom: 10px;
        border: 1px solid rgba(255,255,255,0.1); border-radius: 50%;
    }
    .btn-tap:active {
        transform: scale(0.95); box-shadow: 0 5px 15px rgba(10,31,63,0.2), inset 0 5px 15px rgba(0,0,0,0.2);
        border-color: var(--gold-dark);
    }

    .tasbeeh-controls {
        display: flex; justify-content: space-between; align-items: center;
        background: var(--bg-main); padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border-light);
    }
    .target-group { display: flex; flex-direction: column; }
    .target-group label { font-family: 'Outfit', sans-serif; font-size: .75rem; color: var(--text-light); margin-bottom: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; }
    .settings-select {
        padding: 12px 18px; border-radius: var(--radius-full); border: 1px solid var(--border);
        font-family: 'Outfit', sans-serif; font-size: .9rem; color: var(--navy); background: var(--white);
        cursor: pointer; min-width: 140px; font-weight: 600; outline: none; transition: var(--tr-fast);
    }
    .settings-select:focus { border-color: var(--gold); }

    .btn-reset {
        background: transparent; color: #E74C3C; border: 1px solid #E74C3C;
        padding: 12px 24px; border-radius: var(--radius-full); font-family: 'Outfit', sans-serif; font-size: .85rem; font-weight: 600;
        cursor: pointer; transition: var(--tr-fast); text-transform: uppercase; letter-spacing: 1px;
    }
    .btn-reset:hover { background: #E74C3C; color: var(--white); }

    /* Fullscreen Mode */
    body.fullscreen-mode header, body.fullscreen-mode footer, body.fullscreen-mode .seo-content-section, body.fullscreen-mode .tasbeeh-page-header {
        display: none !important;
    }
    body.fullscreen-mode .tasbeeh-widget {
        margin-top: 5vh; transform: scale(1.1);
    }

    /* SEO Content Styles */
    .seo-content-section { max-width: 900px; margin: 80px auto; padding: 0 20px; color: var(--text-medium); line-height: 1.8; }
    .seo-content-section h2 { 
        color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 2rem; margin-top: 40px; margin-bottom: 20px; 
        font-weight: 700; line-height: 1.2; position: relative; display: inline-block; padding-bottom: 10px; 
    }
    .seo-content-section h2::after { content: ""; position: absolute; bottom: 0; left: 0; width: 60px; height: 3px; background: var(--gold-gradient); border-radius: 2px; }
    
    .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px; margin-top: 30px; }
    .feature-card { 
        background: var(--white); padding: 30px; border-radius: var(--radius-md); 
        box-shadow: var(--shadow-sm); border: 1px solid var(--border-light); transition: var(--tr); position: relative; overflow: hidden;
    }
    .feature-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gold-gradient); transform: scaleX(0); transform-origin: left; transition: var(--tr); }
    .feature-card:hover { box-shadow: var(--shadow-md); border-color: var(--navy-tint); transform: translateY(-3px); }
    .feature-card:hover::before { transform: scaleX(1); }
    .feature-card h3 { color: var(--navy); font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; margin-top: 0; margin-bottom: 10px; font-weight: 700; }
    .feature-card p { font-size: .95rem; color: var(--text-medium); margin: 0; }

    .cta-box { 
        margin-top: 50px; text-align: center; background: var(--white); padding: 40px; 
        border-radius: var(--radius-lg); box-shadow: var(--shadow-md); border: 1px solid var(--border-light); position: relative; overflow: hidden; 
    }
    .cta-box::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: var(--gold-gradient); }
    .cta-box h3 { color: var(--navy); margin-top: 0; font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; font-weight: 700; }
    .cta-box p { color: var(--text-medium); margin-bottom: 20px; }
    .cta-btn { 
        display: inline-block; padding: 12px 30px; background: linear-gradient(145deg, var(--navy), var(--navy-mid)); 
        color: var(--white) !important; text-decoration: none; border-radius: var(--radius-full); 
        font-weight: 600; font-size: .9rem; transition: var(--tr); box-shadow: var(--shadow-sm); 
    }
    .cta-btn:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }

    .resource-btn { 
        background: var(--white); color: var(--navy); border: 1px solid var(--border);
        padding: 12px 24px; border-radius: var(--radius-full); font-family: 'Outfit', sans-serif; font-weight: 600; font-size: .85rem;
        cursor: pointer; transition: var(--tr); display: inline-flex; align-items: center; gap: 8px; box-shadow: var(--shadow-xs); text-decoration: none;
    }
    .resource-btn:hover { border-color: var(--navy); background: var(--navy-tint); }

    .faq-item { 
        margin-bottom: 20px; background: var(--white); padding: 25px; 
        border-radius: var(--radius-md); border: 1px solid var(--border-light); box-shadow: var(--shadow-xs); 
    }
    .faq-item h3 { margin-top: 0; font-size: 1.2rem; color: var(--navy); font-family: 'Cormorant Garamond', serif; font-weight: 700; }
    .faq-item div { color: var(--text-medium); font-size: .95rem; line-height: 1.7; }
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

<section class="tasbeeh-section">
    <div class="section-inner">
        <div class="tasbeeh-page-header">
            <h1>Online Digital <span>Tasbeeh Counter</span></h1>
            <div class="gold-divider"></div>
            <p>Your free, local-saving dhikr tracker. Tap anywhere or press Spacebar.</p>
        </div>

        <div class="tasbeeh-widget" id="tasbeehApp">
            <div class="tasbeeh-header">
                <h2><i class="fas fa-fingerprint"></i> Dhikr Tracker</h2>
                <div class="tasbeeh-tools">
                    <button id="soundToggle" title="Toggle Sound"><i class="fas fa-volume-up"></i></button>
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
        </div>

        <h2>Popular Dhikr to Recite Daily</h2>
        <ul>
            <li><strong>Subhanallah (33 times):</strong> Glory be to Allah. (Often recited after obligatory prayers).</li>
            <li><strong>Alhamdulillah (33 times):</strong> Praise be to Allah.</li>
            <li><strong>Allahu Akbar (34 times):</strong> Allah is the Greatest.</li>
            <li><strong>Astaghfirullah (100 times):</strong> I seek forgiveness from Allah.</li>
            <li><strong>Durood Shareef:</strong> Sending blessings upon Prophet Muhammad (PBUH).</li>
        </ul>

        <div class="cta-box">
            <h3>Explore More</h3>
            <p>Looking for the specific method to pray <strong>Salat-ul-Tasbeeh</strong>? We have a complete step-by-step guide explaining the virtues, the exact tasbeeh, and how to perform the 4 Rakat prayer.</p>
            <a href="<?php echo e(route('namaz.salat_tasbeeh')); ?>" class="cta-btn">Read Salat-ul-Tasbeeh Guide</a>
        </div>

        <h2 style="margin-top: 50px;">Related Tools & Resources</h2>
        <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 20px;">
            <a href="<?php echo e(url('/prayer-times')); ?>" class="resource-btn"><i class="fas fa-clock"></i> Prayer Times</a>
            <a href="<?php echo e(url('/tools/qibla-direction')); ?>" class="resource-btn"><i class="fas fa-kaaba"></i> Qibla Direction</a>
            <a href="<?php echo e(url('/99-names-of-allah')); ?>" class="resource-btn"><i class="fas fa-hand-holding-heart"></i> 99 Names of Allah</a>
            <a href="<?php echo e(url('/wazaif')); ?>" class="resource-btn"><i class="fas fa-book-open"></i> Quran & Wazaif</a>
            <a href="<?php echo e(url('/duas')); ?>" class="resource-btn"><i class="fas fa-praying-hands"></i> Daily Duas</a>
            <a href="<?php echo e(url('/islamic-events')); ?>" class="resource-btn"><i class="fas fa-star-and-crescent"></i> Islamic Events</a>
        </div>
    </div>
</section>

<!-- SEO FAQ Section -->
<section class="seo-content-section" style="margin-top: 0;">
    <h2>Frequently Asked Questions</h2>
    <div itemscope itemtype="https://schema.org/FAQPage">
        
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="faq-item">
            <h3 itemprop="name">Does the online tasbeeh counter work offline?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text">Once the page is loaded, the digital tasbeeh counter relies entirely on your browser's local storage and Javascript. It will continue to work and save your count even if your internet connection drops.</div>
            </div>
        </div>

        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="faq-item">
            <h3 itemprop="name">Is it permissible to use a digital counter for dhikr?</h3>
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
    const fullscreenToggle = document.getElementById('fullscreenToggle');

    let currentCount = parseInt(localStorage.getItem('tasbeeh_count')) || 0;
    let isSoundEnabled = localStorage.getItem('tasbeeh_sound') !== 'false';

    // Init state
    countEl.innerText = currentCount;
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