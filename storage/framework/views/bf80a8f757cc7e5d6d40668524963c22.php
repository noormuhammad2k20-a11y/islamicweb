<?php $__env->startSection('title', isset($seoMeta) ? $seoMeta->title : 'Salat ul Tasbeeh Method, Benefits & Duas | Complete Step-by-Step Guide'); ?>
<?php $__env->startSection('meta_description', isset($seoMeta) ? $seoMeta->description : 'Learn how to perform Salat ul Tasbeeh (Tasbeeh Namaz) with our complete step-by-step guide. Discover the method, benefits, hadith, and exact duas to recite.'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .hero-section {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: white;
        padding: 80px 20px 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        opacity: 0.5;
        z-index: 1;
    }
    .hero-content {
        position: relative;
        z-index: 2;
    }
    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 20px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .article-container {
        max-width: 900px;
        margin: -60px auto 60px;
        background: white;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        color: #444;
        line-height: 1.8;
        font-size: 1.1rem;
        position: relative;
        z-index: 10;
    }

    h2 {
        color: var(--primary);
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        margin-top: 50px;
        margin-bottom: 25px;
        border-bottom: 3px solid var(--gold);
        display: inline-block;
        padding-bottom: 5px;
    }
    h3 {
        color: var(--primary-dark);
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin-top: 30px;
    }

    .arabic-text {
        font-family: 'Amiri', serif;
        font-size: 2.8rem;
        line-height: 1.8;
        text-align: center;
        color: var(--primary-dark);
        margin: 40px 0 10px;
        direction: rtl;
    }
    .transliteration {
        text-align: center;
        font-style: italic;
        color: #666;
        margin-bottom: 20px;
        font-size: 1.2rem;
    }
    .translation {
        text-align: center;
        font-weight: 500;
        color: #333;
        margin-bottom: 40px;
        padding: 20px;
        background: var(--cream);
        border-left: 4px solid var(--gold);
        border-right: 4px solid var(--gold);
        border-radius: 8px;
        font-size: 1.2rem;
    }

    .step-box {
        background: #fff;
        border: 1px solid var(--border-light);
        border-left: 5px solid var(--primary);
        padding: 25px;
        margin: 25px 0;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        transition: transform 0.3s;
    }
    .step-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    }
    .step-number {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--primary);
        font-size: 1.4rem;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-box {
        background: linear-gradient(to right, #fff3cd, #fff9e6);
        border-left: 5px solid #ffc107;
        padding: 20px;
        margin: 30px 0;
        color: #856404;
        border-radius: 8px;
        font-size: 1.15rem;
    }

    .tasbeeh-cta {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        background: linear-gradient(135deg, var(--gold), #b8962c);
        color: white !important;
        text-align: center;
        padding: 20px 30px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 1.3rem;
        font-weight: bold;
        margin: 50px 0;
        box-shadow: 0 10px 20px rgba(212, 175, 55, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .tasbeeh-cta:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(212, 175, 55, 0.4);
    }

    .faq-item {
        margin-bottom: 20px;
        border: 1px solid var(--border-light);
        border-radius: 8px;
        padding: 20px;
        background: #fafafa;
    }
    .faq-question {
        font-weight: bold;
        color: var(--primary);
        font-size: 1.2rem;
        margin-bottom: 10px;
    }
    .faq-answer {
        color: #555;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title { font-size: 2.2rem; }
        .article-container { padding: 25px; margin-top: -30px; }
        .arabic-text { font-size: 2rem; }
    }
</style>

<!-- JSON-LD Article, HowTo & FAQ Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Article",
      "headline": "How to Pray Salat-ul-Tasbeeh: Method, Benefits & Duas",
      "description": "Learn the complete method of Tasbeeh Namaz (Salat-ul-Tasbeeh), including the exact 300 tasbeehs, virtues, and step-by-step guidance.",
      "author": {
        "@type": "Organization",
        "name": "Noor-e-Islam"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Noor-e-Islam",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo e(url('/logo.png')); ?>"
        }
      }
    },
    {
      "@type": "HowTo",
      "name": "How to Pray Salat-ul-Tasbeeh",
      "description": "A step-by-step guide to praying the 4 Rakat of Salat-ul-Tasbeeh, including when and how many times to recite the specific tasbeeh in each posture.",
      "step": [
        {
          "@type": "HowToStep",
          "name": "Niyyah and Takbeer",
          "text": "Make the intention (Niyyah) for 4 Rakat of Salat-ul-Tasbeeh. Say Allahu Akbar and fold your hands."
        },
        {
          "@type": "HowToStep",
          "name": "Recite Tasbeeh 15 times",
          "text": "After reciting Sana, Surah Fatiha, and another Surah, recite the third Kalima (Subhanallahi Walhamdu lillahi...) 15 times."
        },
        {
          "@type": "HowToStep",
          "name": "Recite Tasbeeh in Ruku 10 times",
          "text": "Go into Ruku, say Subhana Rabbiyal Azeem, and then recite the tasbeeh 10 times."
        },
        {
          "@type": "HowToStep",
          "name": "Recite Tasbeeh in Qiyam 10 times",
          "text": "Stand up from Ruku (Qauma), say Sami Allahu Liman Hamidah, and then recite the tasbeeh 10 times."
        },
        {
          "@type": "HowToStep",
          "name": "Recite Tasbeeh in Sajdah 10 times",
          "text": "Go into the first Sajdah, say Subhana Rabbiyal A'la, and recite the tasbeeh 10 times."
        },
        {
          "@type": "HowToStep",
          "name": "Recite Tasbeeh between Sajdahs 10 times",
          "text": "Sit up from the first Sajdah (Jalsa) and recite the tasbeeh 10 times."
        },
        {
          "@type": "HowToStep",
          "name": "Recite Tasbeeh in second Sajdah 10 times",
          "text": "Go into the second Sajdah and recite the tasbeeh 10 times. This completes 75 tasbeehs for one Rakat."
        }
      ]
    },
    {
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Can I pray Salat-ul-Tasbeeh in congregation (Jamaat)?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Salat-ul-Tasbeeh is a Nafl (voluntary) prayer, and like most Nafl prayers, it is best performed individually at home or in the mosque. There is no established Sunnah for praying it in a congregation."
          }
        },
        {
          "@type": "Question",
          "name": "What should I do if I lose count of the tasbeehs?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "If you forget how many tasbeehs you have recited, go with the lower number you are certain of. If you completely forgot a posture's tasbeeh, make it up in the next posture. Do not count aloud or on your fingers, as excessive movement (Amal-e-Kaseer) can invalidate the prayer."
          }
        }
      ]
    }
  ]
}
</script>

<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">How to Pray Salat-ul-Tasbeeh</h1>
        <p class="hero-subtitle">The Complete Step-by-Step Method, Virtues, and the 300 Tasbeehs for Ultimate Forgiveness</p>
    </div>
</div>

<div class="article-container" itemscope itemtype="https://schema.org/Article">
    <div itemprop="articleBody">
        <p><strong>Salat-ul-Tasbeeh</strong> (also known as <em>Salah tul Tasbeeh</em> or <em>Tasbeeh Namaz</em>) is one of the most highly recommended optional (Nafl) prayers in Islam. It is a beautiful prayer that carries immense rewards. The Prophet Muhammad (PBUH) taught this specific prayer to his uncle, Abbas (RA), stating that performing it guarantees the forgiveness of all sins—whether they are future or past, new or old, intentional or unintentional.</p>

        <p>Because it requires reciting a specific tasbeeh <strong>300 times</strong> across 4 Rakat, the method differs slightly from your normal daily Salah. Many Muslims look for the exact <strong>Salat Tasbeeh method</strong> to ensure they do not make mistakes in counting or posture. Below is the complete, easy-to-follow guide.</p>

        <h2>The Exact Tasbeeh to Recite</h2>
        <p>The core of this prayer is the recitation of the 3rd Kalima (or a slightly varied tasbeeh). You must memorize this phrase, as it will be recited 75 times in every Rakat.</p>
        
        <div class="arabic-text">
            سُبْحَانَ اللَّهِ وَالْحَمْدُ لِلَّهِ وَلاَ إِلَهَ إِلاَّ اللَّهُ وَاللَّهُ أَكْبَرُ
        </div>
        <div class="transliteration">
            "Subhanallahi Walhamdu lillahi wa la ilaha illallahu wallahu Akbar"
        </div>
        <div class="translation">
            "Glory be to Allah, All Praise is for Allah, There is no God but Allah, and Allah is the Greatest."
        </div>

        <a href="<?php echo e(route('tasbeeh.counter')); ?>" class="tasbeeh-cta">
            <i class="fas fa-fingerprint"></i> Track your daily Dhikr using our Free Digital Tasbeeh Counter
        </a>

        <h2>Tasbeeh Namaz Method (Step-by-Step)</h2>
        <p>You will pray 4 Rakat together. In every single Rakat, you must recite the tasbeeh <strong>75 times</strong>. (75 x 4 = 300 times). Here is exactly how to distribute the 75 recitations across the postures of a single Rakat:</p>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-pray"></i> Step 1: The Intention (Niyyah)</div>
            <p>Make your intention for 4 Rakat Nafl for Salat-ul-Tasbeeh. Say <em>Allahu Akbar</em> and fold your hands. Read Sana, Surah Fatiha, and any other Surah from the Quran as you normally would.</p>
        </div>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-male"></i> Step 2: While Standing (Qiyam)</div>
            <p><strong>After</strong> finishing the Surah, while still standing, recite the tasbeeh <strong>15 times</strong>.</p>
        </div>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-child"></i> Step 3: In Ruku</div>
            <p>Go down into Ruku. Say <em>Subhana Rabbiyal Azeem</em> 3 times, and then recite the tasbeeh <strong>10 times</strong>.</p>
        </div>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-male"></i> Step 4: Standing up from Ruku (Qauma)</div>
            <p>Stand back up. Say <em>Sami Allahu Liman Hamidah</em> and <em>Rabbana Lakal Hamd</em>, then recite the tasbeeh <strong>10 times</strong> while standing straight.</p>
        </div>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-praying-hands"></i> Step 5: First Sajdah</div>
            <p>Go down into Sajdah. Say <em>Subhana Rabbiyal A'la</em> 3 times, then recite the tasbeeh <strong>10 times</strong>.</p>
        </div>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-user"></i> Step 6: Sitting between Sajdahs (Jalsa)</div>
            <p>Sit up from the first Sajdah. While sitting, recite the tasbeeh <strong>10 times</strong>.</p>
        </div>

        <div class="step-box">
            <div class="step-number"><i class="fas fa-praying-hands"></i> Step 7: Second Sajdah</div>
            <p>Go into the second Sajdah. Say <em>Subhana Rabbiyal A'la</em> 3 times, then recite the tasbeeh <strong>10 times</strong>.</p>
        </div>

        <div class="alert-box">
            <strong><i class="fas fa-calculator"></i> Total for 1 Rakat:</strong> 15 + 10 + 10 + 10 + 10 + 10 + 10 = <strong>75 Tasbeehs</strong>.
        </div>

        <p>Stand up for the second Rakat and repeat this exact process until you have completed all 4 Rakats. By the end of the fourth Rakat, before doing the final Salaam, you will have recited the tasbeeh a total of 300 times.</p>

        <h2>Important Rules and Common Mistakes</h2>
        <ul>
            <li><strong>Do not count on your fingers:</strong> Moving your fingers to count during Salah can invalidate the prayer (Amal-e-Kaseer). Instead, press your fingers down gently, or use a mental count. If you need a physical counter outside of prayer, use our <a href="<?php echo e(route('tasbeeh.counter')); ?>" style="color: var(--primary); font-weight: bold;">Digital Tasbeeh Counter</a>.</li>
            <li><strong>If you forget a tasbeeh:</strong> Do not return to a previous posture. Simply make up for the missed count in the next posture. (For example, if you forgot the 10 recitations in Ruku, recite 20 in the Qauma).</li>
            <li><strong>When to pray:</strong> You can pray it at any time of day or night, except during the forbidden Makrooh times (sunrise, exactly at noon/Zawaal, and sunset).</li>
        </ul>

        <h2>The Hadith & Virtues of Salah tul Tasbeeh</h2>
        <p>The significance of <strong>Salat Tasbeeh</strong> is profound. In a Hadith recorded in Sunan Abu Dawud and Ibn Majah, the Prophet Muhammad (PBUH) told his uncle Al-Abbas:</p>
        <blockquote style="font-style: italic; background: #f9f9f9; border-left: 5px solid var(--gold); padding: 20px; color: #555; border-radius: 4px; font-size: 1.15rem; margin: 30px 0;">
            "O uncle, shall I not give you, shall I not grant you, shall I not award you, shall I not do mercy on you... If you perform this, Allah will forgive your sins, of the future and of the past, new and old, those you have forgotten and those you did knowingly, big and small, hidden and revealed..."
        </blockquote>
        <p>The Prophet (PBUH) advised to pray it once a day. If not possible, then once a Friday. If not possible, then once a month. If not possible, then once a year. And if that is not possible, then at least once in a lifetime.</p>

        <h2>Frequently Asked Questions</h2>
        
        <div class="faq-item">
            <div class="faq-question">Can I pray Salat-ul-Tasbeeh in congregation (Jamaat)?</div>
            <div class="faq-answer">Salat-ul-Tasbeeh is a Nafl (voluntary) prayer, and like most Nafl prayers, it is best performed individually at home or in the mosque. There is no established Sunnah for praying it in a congregation.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What should I do if I lose count of the tasbeehs?</div>
            <div class="faq-answer">If you forget how many tasbeehs you have recited, go with the lower number you are certain of. If you completely forgot a posture's tasbeeh, make it up in the next posture. Do not count aloud or on your fingers, as excessive movement can invalidate the prayer.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Which Surahs should I recite in this Namaz?</div>
            <div class="faq-answer">You can recite any Surah from the Quran after Surah Fatiha. However, some scholars recommend reciting Surah At-Takathur, Surah Al-Asr, Surah Al-Kafirun, and Surah Al-Ikhlas in the four rakats respectively.</div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views/pages/namaz/salat_tasbeeh.blade.php ENDPATH**/ ?>