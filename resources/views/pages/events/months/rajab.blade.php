@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Rajab: The Sacred Prelude to Ramadan</h2>
<p><strong>Rajab</strong> ({{ $hijri_month->name_ar }}) is the seventh month of the Islamic calendar and holds a profound, elevated status as one of the four sacred months (<em>Al-Ashhur Al-Hurum</em>) alongside Dhu al-Qi'dah, Dhu al-Hijjah, and Muharram. The name "Rajab" derives from the Arabic word "Rajaba," meaning to respect or revere. In pre-Islamic Arabia, fighting was strictly prohibited during this month, allowing people to travel safely to Makkah for Umrah.</p>

<p>Historically, Rajab is most famously associated with the miraculous Night Journey and Ascension&mdash;<strong>Al-Isra wal-Mi'raj</strong>. During this extraordinary event, the Prophet Muhammad (peace be upon him) traveled from Makkah to Jerusalem and ascended through the heavens, where the five daily prayers were established. This miracle served as a massive spiritual reinforcement for the Prophet (peace be upon him) after the "Year of Sorrow."</p>

<p>Spiritually, Rajab serves as the crucial gateway to Ramadan. It is often described as the month of planting seeds. Renowned scholar Abu Bakr al-Balkhi famously stated: "The month of Rajab is the month for planting, the month of Sha'ban is the month of irrigating the crops, and the month of Ramadan is the month of harvesting the crops." Therefore, it is a period of heightened reverence, increased worship, and critical spiritual preparation.</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship in Rajab</h2>
<p>Because of its sacred status, good deeds are magnified in Rajab. While there are no unique mandatory fasts, general worship is highly encouraged:</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Avoiding Sins:</strong> Allah explicitly commands regarding the sacred months: "So do not wrong yourselves therein" (Quran 9:36). The gravity of sins is heavier in Rajab.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Voluntary Fasting:</strong> Fasting generally during the sacred months is encouraged, though dedicating specific days in Rajab (like the 27th) specifically for fasting is debated among scholars.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Seeking Forgiveness (Istighfar):</strong> It is highly recommended to increase repentance as a spiritual cleanse before Ramadan.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Making the Rajab Dua:</strong> The Prophet (peace be upon him) used to supplicate: "O Allah, bless us in Rajab and Sha'ban, and allow us to reach Ramadan."</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Clarifying Superstitions About Rajab</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Is the 27th of Rajab definitively the date of Al-Isra wal-Mi'raj?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> While it is popular in many cultures to celebrate the 27th of Rajab as the Night of Ascension, classical scholars and historians differ significantly on the exact date. Some argued it happened in Rabi' al-Awwal, others in Ramadan. Due to this uncertainty, and because the Sahabah did not establish a festival for it, specialized prayers or fasting specifically on the 27th is considered an innovation (Bid'ah) by many orthodox scholars.
            </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseTwo">
                Is there a specific prayer (Salat al-Raghaib) for the first Friday of Rajab?
            </button>
        </h2>
        <div id="mCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> Salat al-Raghaib is an innovation. Prominent scholars such as Imam An-Nawawi and Ibn Taymiyyah have explicitly stated that the Hadith promoting this specific prayer on the first Friday night of Rajab is fabricated. Worship should be restricted to what is authentically reported.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions About Rajab</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                What does it mean that Rajab is a "Sacred Month"?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                Being a sacred month means that Allah has placed a special sanctity upon it. Both the reward for righteous deeds and the punishment for committing sins and oppression are magnified compared to regular months.
            </div>
        </div>
    </div>
</div>
@endsection
