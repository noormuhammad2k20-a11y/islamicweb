@extends('layouts.app')

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); }
    .date-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px; text-align: center; color: white; position: relative; overflow: hidden; direction: rtl; }
    .date-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .date-hero-title { font-family: 'Amiri', serif; font-size: 2.8rem; font-weight: 800; margin-bottom: 10px; position: relative; z-index: 2; }
    .date-hero-subtitle { font-size: 1.2rem; color: var(--gold-light); margin-bottom: 30px; position: relative; z-index: 2; font-family: 'Amiri', serif; }
    .section-container { max-width: 1100px; margin: 50px auto; padding: 0 20px; direction: rtl; }
    .section-title { font-family: 'Amiri', serif; font-size: 2rem; color: var(--primary); text-align: center; margin-bottom: 30px; border-bottom: 2px solid var(--gold); display: inline-block; padding-bottom: 10px; }
    .title-wrapper { text-align: center; margin-bottom: 40px; }

    /* Giant Urdu Date */
    .urdu-giant-date {
        text-align: center;
        padding: 40px 20px;
        position: relative;
        z-index: 2;
    }
    .urdu-giant-day {
        font-size: 8rem;
        font-weight: 900;
        font-family: 'Amiri', serif;
        line-height: 1;
        color: white;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }
    .urdu-giant-month {
        font-size: 3rem;
        font-weight: 700;
        color: var(--gold-light);
        margin-top: 15px;
        font-family: 'Amiri', serif;
    }
    .urdu-giant-year {
        font-size: 1.8rem;
        color: rgba(255,255,255,0.7);
        margin-top: 10px;
        font-family: 'Amiri', serif;
    }

    /* Urdu Cards */
    .urdu-info-card {
        background: white; border: 1px solid var(--border-light); border-radius: 20px; padding: 35px; margin-bottom: 25px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05); direction: rtl; font-family: 'Amiri', serif;
    }
    .urdu-info-card h3 { color: var(--primary); font-family: 'Amiri', serif; margin-bottom: 15px; font-size: 1.5rem; }
    .urdu-info-card p { color: #555; line-height: 2.2; font-size: 1.1rem; }

    /* Months Grid */
    .urdu-months-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
    }
    .urdu-month-card {
        background: white; border: 1px solid var(--border-light); border-radius: 16px;
        padding: 20px; text-align: center; transition: all 0.3s; direction: rtl;
    }
    .urdu-month-card:hover { border-color: var(--gold); transform: translateY(-3px); }
    .urdu-month-num { background: var(--primary); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 10px; }
    .urdu-month-name-ar { font-family: 'Amiri', serif; font-size: 1.6rem; color: var(--primary); font-weight: 700; }
    .urdu-month-name-en { font-size: 0.9rem; color: #888; margin-top: 5px; }

    /* Day Names */
    .urdu-days-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 10px;
    }
    .urdu-day-card {
        background: white; border: 1px solid var(--border-light); border-radius: 12px;
        padding: 15px; text-align: center; font-family: 'Amiri', serif;
    }
    .urdu-day-name { font-size: 1.3rem; color: var(--primary); font-weight: 700; }
    .urdu-day-en { font-size: 0.8rem; color: #888; }

    .faq-container { margin-top: 30px; direction: rtl; }
    .faq-item { background: white; border: 1px solid var(--border-light); border-radius: 12px; margin-bottom: 12px; overflow: hidden; }
    .faq-question { padding: 18px 20px; cursor: pointer; display: flex; justify-content: space-between; align-items: center; font-weight: 600; color: var(--primary); font-family: 'Amiri', serif; font-size: 1.1rem; }
    .faq-question i { color: var(--gold); transition: transform 0.3s; }
    .faq-answer { padding: 0 20px 18px; display: none; color: #555; line-height: 2; font-family: 'Amiri', serif; font-size: 1.05rem; }
    .faq-open .faq-answer { display: block; }
    .faq-open .faq-question i { transform: rotate(180deg); }
    .seo-content { background: white; padding: 35px; border-radius: 20px; border: 1px solid var(--border-light); margin-top: 40px; line-height: 2.2; color: #444; direction: rtl; font-family: 'Amiri', serif; font-size: 1.05rem; }
    .seo-content h2, .seo-content h3 { color: var(--primary); margin-top: 25px; margin-bottom: 12px; font-family: 'Amiri', serif; }
    .internal-links { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; margin-top: 30px; }
    .internal-link { display: flex; align-items: center; gap: 8px; padding: 12px 18px; background: white; border: 1px solid var(--border-light); border-radius: 12px; text-decoration: none; color: var(--primary); font-weight: 600; transition: all 0.3s; font-size: 0.9rem; }
    .internal-link:hover { border-color: var(--gold); background: #fdfcee; transform: translateY(-2px); }
    
    /* Calendar Grid CSS */
    .controls-bar { background: white; padding: 20px; border-radius: 16px; margin-top: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); direction: rtl; }
    .control-select { padding: 10px 15px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 1.1rem; color: #333; outline: none; font-family: 'Amiri', serif; }
    .print-btn { padding: 10px 25px; background: transparent; border: 2px solid var(--primary); color: var(--primary); border-radius: 12px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 1.1rem; font-family: 'Amiri', serif; }
    .print-btn:hover { background: var(--primary); color: white; }

    .calendar-grid-wrapper { background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); overflow: hidden; border: 1px solid var(--border-light); margin-bottom: 25px; direction: ltr; }
    .calendar-grid-header { background: var(--primary); color: white; padding: 15px 20px; text-align: center; }
    .calendar-grid-title { margin: 0; font-family: 'Amiri', serif; font-size: 1.6rem; }
    .calendar-grid { padding: 10px; }
    .calendar-grid-row { display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; }
    .calendar-grid-header-row { margin-bottom: 8px; }
    .cal-cell { aspect-ratio: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; border-radius: 10px; padding: 6px; position: relative; min-height: 60px; transition: all 0.2s; cursor: default; }
    .cal-cell:hover:not(.cal-empty):not(.cal-header) { background: rgba(10,58,42,0.05); transform: scale(1.05); }
    .cal-header { font-weight: 700; color: var(--primary); font-size: 0.85rem; min-height: auto; aspect-ratio: auto; }
    .cal-greg { font-weight: 700; font-size: 1rem; color: #333; }
    .cal-hijri { font-size: 0.85rem; color: var(--gold); font-weight: 700; font-family: 'Amiri', serif; }
    .cal-hijri-month { font-size: 0.55rem; color: var(--primary); font-weight: 500; position: absolute; bottom: 2px; }
    .cal-today { background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(10,58,42,0.1)); border: 2px solid var(--gold); border-radius: 12px; }
    .cal-friday { background: rgba(10,58,42,0.04); }
    .cal-empty { opacity: 0.3; }
    
    /* Resources Grid */
    .resources-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-top: 20px; direction: rtl; }
    .resource-card { background: white; border: 1px solid var(--border-light); border-radius: 14px; padding: 20px; display: flex; align-items: center; gap: 15px; text-decoration: none; color: inherit; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.02); }
    .resource-card:hover { border-color: var(--gold); transform: translateY(-3px); box-shadow: 0 10px 25px rgba(212, 175, 55, 0.15); background: #fdfcee; }
    .resource-icon { font-size: 2rem; color: var(--gold); background: rgba(10,58,42,0.04); width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; }
    .resource-title { font-family: 'Amiri', serif; font-size: 1.3rem; font-weight: 700; color: var(--primary); margin-bottom: 2px; }
    .resource-subtitle { font-size: 0.85rem; color: #777; }

    @media (max-width: 768px) { 
        .urdu-giant-day { font-size: 5rem; } 
        .urdu-giant-month { font-size: 2rem; } 
        .date-hero-title { font-size: 2rem; } 
        .cal-cell { min-height: 45px; padding: 3px; }
        .cal-greg { font-size: 0.8rem; }
        .cal-hijri { font-size: 0.7rem; }
    }
</style>

{{-- HERO --}}
<section class="date-hero">
    <h1 class="date-hero-title">آج کی اسلامی تاریخ | اسلامی کیلنڈر</h1>
    <p class="date-hero-subtitle">پاکستان میں آج کی ہجری تاریخ — {{ $nowPK->format('d F Y') }}</p>

    <div class="urdu-giant-date">
        <div class="urdu-giant-day">{{ $hijri['day'] }}</div>
        <div class="urdu-giant-month">{{ $hijri['month_urdu'] }}</div>
        <div class="urdu-giant-year">{{ $hijri['year'] }} ھجری</div>
    </div>
</section>

{{-- DATE DETAILS --}}
<section class="section-container">
    <div class="urdu-info-card">
        <h3>📅 آج کی مکمل اسلامی تاریخ</h3>
        <p>آج <strong>{{ $hijri['day_urdu'] }}</strong> کا دن ہے۔ اسلامی تاریخ <strong>{{ $hijri['day'] }} {{ $hijri['month_urdu'] }} {{ $hijri['year'] }} ھجری</strong> ہے۔ یہ اسلامی سال کا <strong>{{ $hijri['month'] }}واں</strong> مہینہ ہے۔ عیسوی تاریخ {{ $nowPK->format('d F Y') }} ہے۔</p>
        <p>پاکستان کے تمام شہروں میں آج کی اسلامی تاریخ یکساں ہے — کراچی، لاہور، اسلام آباد، راولپنڈی، فیصل آباد، پشاور، کوئٹہ اور ملتان سب میں {{ $hijri['day'] }} {{ $hijri['month_urdu'] }} {{ $hijri['year'] }} ھجری ہے۔</p>
    </div>
</section>

{{-- URDU MONTH NAMES --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">اسلامی مہینوں کے نام — ۱۲ مہینے</h2>
    </div>
    @php
    $urduMonths = [
        1 => ['ur' => 'محرم', 'en' => 'Muharram'],
        2 => ['ur' => 'صفر', 'en' => 'Safar'],
        3 => ['ur' => 'ربیع الاول', 'en' => 'Rabi al-Awwal'],
        4 => ['ur' => 'ربیع الثانی', 'en' => 'Rabi al-Thani'],
        5 => ['ur' => 'جمادی الاول', 'en' => 'Jumada al-Awwal'],
        6 => ['ur' => 'جمادی الثانی', 'en' => 'Jumada al-Thani'],
        7 => ['ur' => 'رجب', 'en' => 'Rajab'],
        8 => ['ur' => 'شعبان', 'en' => 'Shaban'],
        9 => ['ur' => 'رمضان', 'en' => 'Ramadan'],
        10 => ['ur' => 'شوال', 'en' => 'Shawwal'],
        11 => ['ur' => 'ذوالقعدہ', 'en' => 'Dhu al-Qadah'],
        12 => ['ur' => 'ذوالحجہ', 'en' => 'Dhu al-Hijjah'],
    ];
    @endphp
    <div class="urdu-months-grid">
        @foreach($urduMonths as $num => $m)
            <div class="urdu-month-card" @if($num === $hijri['month']) style="border-color: var(--gold); background: #fdfcee;" @endif>
                <div class="urdu-month-num">{{ $num }}</div>
                <div class="urdu-month-name-ar">{{ $m['ur'] }}</div>
                <div class="urdu-month-name-en">{{ $m['en'] }}</div>
                @if($num === $hijri['month'])
                    <div style="margin-top: 8px; background: var(--gold); color: white; padding: 3px 12px; border-radius: 10px; font-size: 0.8rem; display: inline-block;">موجودہ مہینہ</div>
                @endif
            </div>
        @endforeach
    </div>
</section>

{{-- URDU DAY NAMES --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">ہفتے کے دنوں کے نام</h2>
    </div>
    @php
    $urduDays = [
        ['ur' => 'اتوار', 'en' => 'Sunday'],
        ['ur' => 'پیر', 'en' => 'Monday'],
        ['ur' => 'منگل', 'en' => 'Tuesday'],
        ['ur' => 'بدھ', 'en' => 'Wednesday'],
        ['ur' => 'جمعرات', 'en' => 'Thursday'],
        ['ur' => 'جمعہ', 'en' => 'Friday'],
        ['ur' => 'ہفتہ', 'en' => 'Saturday'],
    ];
    @endphp
    <div class="urdu-days-grid">
        @foreach($urduDays as $day)
            <div class="urdu-day-card">
                <div class="urdu-day-name">{{ $day['ur'] }}</div>
                <div class="urdu-day-en">{{ $day['en'] }}</div>
            </div>
        @endforeach
    </div>
</section>

{{-- CONTROLS --}}
<section class="section-container">
    <div class="controls-bar">
        <form method="GET" action="{{ route('islamic-date-urdu') }}" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: center;">
            <select name="year" class="control-select" onchange="this.form.submit()">
                @for($y = 2018; $y <= 2036; $y++)
                    <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>{{ $y }}</option>
                @endfor
            </select>
            <select name="month" class="control-select" onchange="this.form.submit()">
                @php
                    $urMonthsList = [1=>'محرم', 2=>'صفر', 3=>'ربیع الاول', 4=>'ربیع الثانی', 5=>'جمادی الاول', 6=>'جمادی الثانی', 7=>'رجب', 8=>'شعبان', 9=>'رمضان', 10=>'شوال', 11=>'ذوالقعدہ', 12=>'ذوالحجہ'];
                @endphp
                @for($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>{{ $urMonthsList[$m] }}</option>
                @endfor
            </select>
            <button type="button" class="print-btn" onclick="window.print()"><i class="fas fa-print"></i> کیلنڈر پرنٹ کریں</button>
        </form>
    </div>
</section>

{{-- FULL YEAR CALENDAR --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">مکمل اسلامی کیلنڈر {{ $year }}</h2>
        <p style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #555;">سال {{ $year }} کا مکمل ۱۲ ماہ کا ہجری کیلنڈر۔ ہر دن عیسوی اور ہجری دونوں تاریخیں دکھاتا ہے۔</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 20px;">
        @foreach($fullYearCalendar as $mKey => $monthData)
            @php
                $urMonthName = $urMonthsList[$mKey] ?? $monthData['month_name'];
            @endphp
            @include('islamic-calendar.partials._month-grid', [
                'monthData' => $monthData,
                'monthName' => $urMonthName,
                'year' => $year,
                'yearEvents' => collect()
            ])
        @endforeach
    </div>
</section>

{{-- ISLAMIC RESOURCES (INTERNAL LINKS) --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">اہم اسلامی وسائل</h2>
        <p style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #555;">آپ کی روزمرہ اسلامی ضروریات کے لیے مفید ٹولز اور معلومات۔</p>
    </div>
    
    <div class="resources-grid">
        <a href="{{ route('ur.prayer-times.hub') }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-mosque"></i></div>
            <div>
                <div class="resource-title">نماز کے اوقات</div>
                <div class="resource-subtitle">آج کی نماز کا ٹائم ٹیبل</div>
            </div>
        </a>
        <a href="{{ route('ur.quran.index') }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-book-open"></i></div>
            <div>
                <div class="resource-title">قرآن پاک</div>
                <div class="resource-subtitle">ترجمہ اور تفسیر کے ساتھ</div>
            </div>
        </a>
        <a href="{{ route('ur.ramadan.hub', ['year' => date('Y')]) }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-moon"></i></div>
            <div>
                <div class="resource-title">رمضان کیلنڈر</div>
                <div class="resource-subtitle">سحر و افطار کے اوقات</div>
            </div>
        </a>
        <a href="{{ route('ur.zakat.index') }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-calculator"></i></div>
            <div>
                <div class="resource-title">زکوٰۃ کیلکولیٹر</div>
                <div class="resource-subtitle">آسان زکوٰۃ کا حساب</div>
            </div>
        </a>
        <a href="{{ route('ur.tools.qibla') }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-compass"></i></div>
            <div>
                <div class="resource-title">قبلہ کی سمت</div>
                <div class="resource-subtitle">آن لائن قبلہ فائنڈر</div>
            </div>
        </a>
        <a href="{{ route('ur.tasbeeh.index') }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-hand-holding-heart"></i></div>
            <div>
                <div class="resource-title">تسبیح کاؤنٹر</div>
                <div class="resource-subtitle">ڈیجیٹل تسبیح آن لائن</div>
            </div>
        </a>
        <a href="{{ route('ur.surah.index') }}" class="resource-card">
            <div class="resource-icon"><i class="fas fa-quran"></i></div>
            <div>
                <div class="resource-title">قرآنی سورتیں</div>
                <div class="resource-subtitle">فضائل اور تلاوت</div>
            </div>
        </a>
        <a href="{{ route('islamic-calendar') }}" class="resource-card">
            <div class="resource-icon"><i class="far fa-calendar-alt"></i></div>
            <div>
                <div class="resource-title">انگریزی کیلنڈر</div>
                <div class="resource-subtitle">Global Islamic Calendar</div>
            </div>
        </a>
    </div>
</section>

{{-- URDU FAQ --}}
<section class="section-container">
    <div class="title-wrapper">
        <h2 class="section-title">اکثر پوچھے جانے والے سوالات</h2>
    </div>
    @php
    $faqs = [
        ['q' => 'آج کی اسلامی تاریخ کیا ہے؟', 'a' => "آج کی اسلامی تاریخ <strong>{$hijri['day']} {$hijri['month_urdu']} {$hijri['year']} ھجری</strong> ہے۔ یہ پاکستان کے تمام شہروں میں یکساں ہے۔"],
        ['q' => 'اردو میں آج کی اسلامی تاریخ؟', 'a' => "اردو میں آج کی تاریخ <strong>{$hijri['day']} {$hijri['month_urdu']} {$hijri['year']}</strong> ھجری ہے۔ آج <strong>{$hijri['day_urdu']}</strong> کا دن ہے۔"],
        ['q' => 'اسلامی کیلنڈر میں کتنے مہینے ہوتے ہیں؟', 'a' => 'اسلامی ہجری کیلنڈر میں <strong>۱۲ مہینے</strong> ہوتے ہیں: محرم، صفر، ربیع الاول، ربیع الثانی، جمادی الاول، جمادی الثانی، رجب، شعبان، رمضان، شوال، ذوالقعدہ، اور ذوالحجہ۔'],
        ['q' => 'پاکستان میں اسلامی تاریخ کیسے طے ہوتی ہے؟', 'a' => 'پاکستان میں اسلامی تاریخ <strong>مرکزی رویت ہلال کمیٹی</strong> کے ذریعے طے ہوتی ہے جو چاند دیکھ کر نئے مہینے کا اعلان کرتی ہے۔ پاکستان کے تمام صوبوں میں ایک ہی تاریخ ہوتی ہے۔'],
        ['q' => 'سعودی عرب اور پاکستان کی اسلامی تاریخ مختلف کیوں ہوتی ہے؟', 'a' => 'سعودی عرب <strong>ام القرٰی کیلنڈر</strong> (حسابی طریقہ) استعمال کرتا ہے جبکہ پاکستان چاند دیکھ کر تاریخ طے کرتا ہے۔ اس لیے اکثر ایک دن کا فرق ہوتا ہے۔'],
    ];
    @endphp
    @include('islamic-calendar.partials._faq', ['faqs' => $faqs])
</section>

{{-- URDU SEO CONTENT --}}
<section class="section-container">
    <div class="seo-content">
        <h2>آج کی اسلامی تاریخ — مکمل ہجری تاریخ گائیڈ</h2>
        <p><strong>آج کی اسلامی تاریخ</strong> {{ $hijri['day'] }} {{ $hijri['month_urdu'] }} {{ $hijri['year'] }} ھجری ہے ({{ $nowPK->format('d F Y') }})۔ اسلامی کیلنڈر ایک قمری کیلنڈر ہے جو ۶۲۲ عیسوی میں نبی کریم ﷺ کی مکہ سے مدینہ ہجرت سے شروع ہوا۔ اسلامی سال میں ۱۲ قمری مہینے ہوتے ہیں اور ہر مہینہ ۲۹ یا ۳۰ دن کا ہوتا ہے۔</p>

        <h3>پاکستان میں آج کی اسلامی تاریخ</h3>
        <p>پاکستان میں آج کی اسلامی تاریخ {{ $hijri['day'] }} {{ $hijri['month_urdu'] }} {{ $hijri['year'] }} ھجری ہے۔ یہ تاریخ مرکزی رویت ہلال کمیٹی کے فیصلے کے مطابق ہے اور پاکستان کے تمام شہروں — کراچی، لاہور، اسلام آباد، راولپنڈی، فیصل آباد، پشاور، کوئٹہ اور ملتان — میں یکساں ہے۔</p>

        <h3>اسلامی مہینوں کی اہمیت</h3>
        <p>اسلامی کیلنڈر کے اہم مہینوں میں محرم (عاشورہ)، ربیع الاول (ولادت نبوی ﷺ)، رجب (شب معراج)، شعبان (شب برات)، رمضان (روزے)، شوال (عید الفطر)، اور ذوالحجہ (حج اور عید الاضحٰی) شامل ہیں۔ ہر مہینے کی اپنی فضیلت اور اہمیت ہے۔</p>
    </div>
</section>

<script>
function toggleFaq(id) { var el = document.getElementById(id); if (el) { el.classList.toggle('faq-open'); } }
</script>
@endsection
