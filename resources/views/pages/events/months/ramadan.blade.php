@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Ramadan: The Crown Jewel of the Islamic Year</h2>
<p><strong>Ramadan</strong> ({{ $hijri_month->name_ar }}) is the ninth and holiest month of the Islamic Hijri calendar. The name is derived from the Arabic root "Ramad," which means scorching heat or intense dryness, metaphorically symbolizing how fasting in this month burns away the sins of the believers.</p>

<p>Ramadan stands unparalleled in its religious and historical significance. It is the month in which the Quran was revealed as a guidance for humanity. The entire month is a globally synchronized period of intense spiritual purification, communal solidarity, and rigorous self-discipline through mandatory fasting from dawn until sunset. Beyond fasting, it hosts <strong>Laylat al-Qadr</strong> (The Night of Decree), a single night whose worship is mathematically described in the Quran as being better than a thousand months (over 83 years) of continuous worship.</p>

<p>Historically, Ramadan was not just a month of retreat; it was a month of monumental victories and resilience. It was during Ramadan in the 2nd year of Hijrah that the <strong>Battle of Badr</strong> took place, altering the trajectory of history when a small, ill-equipped Muslim army secured a miraculous victory. Six years later, the peaceful <strong>Conquest of Makkah</strong> also occurred in Ramadan, effectively ending idolatry in the Arabian Peninsula. Thus, Ramadan is both a crucible for the soul and a testament to the undeniable triumphs of the Islamic faith.</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship & Obligations in Ramadan</h2>
<p>Ramadan requires the highest level of spiritual engagement from every able-bodied adult Muslim.</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Mandatory Fasting (Sawm):</strong> The absolute core of Ramadan, requiring abstinence from food, drink, and intimate relations from Fajr to Maghrib.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Tarawih Prayers:</strong> Engaging in the special nightly congregational prayers to hear the recitation of the entire Quran over the course of the month.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Seeking Laylat al-Qadr:</strong> Intensifying worship, especially in the last ten odd nights, to catch the Night of Decree.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Zakat and Sadaqah:</strong> Because rewards are multiplied immensely in Ramadan, it is the preferred month for Muslims to calculate and distribute their annual Zakat.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>I'tikaf:</strong> Retreating to the mosque during the last ten days to disconnect from the world and focus entirely on the Divine.</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Clarifying Misconceptions About Ramadan</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Does brushing your teeth break the fast?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> No. Using a miswak or toothbrush with toothpaste does not break the fast, provided that you are careful not to swallow any paste or water. The Prophet (peace be upon him) frequently used the miswak while fasting.
            </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseTwo">
                Is Laylat al-Qadr definitively on the 27th night?
            </button>
        </h2>
        <div id="mCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> While the 27th night is highly emphasized based on authentic narrations, Laylat al-Qadr shifts every year and can fall on any of the odd nights of the last ten days (21st, 23rd, 25th, 27th, 29th). Limiting intensive worship to only the 27th risks missing the night entirely.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions About Ramadan</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                What historical battle took place in Ramadan?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                The Battle of Badr, the most decisive battle in early Islamic history, took place on the 17th of Ramadan in 2 AH. Despite fasting and being heavily outnumbered, the Muslims secured a miraculous victory.
            </div>
        </div>
    </div>
</div>
@endsection
