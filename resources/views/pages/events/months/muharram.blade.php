@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Muharram: The Sacred Month of Remembrance and Renewal</h2>
<p><strong>Muharram</strong> ({{ $hijri_month->name_ar }}) is not only the inaugural month of the Islamic Hijri calendar but also one of the four sacred months (<em>Al-Ashhur Al-Hurum</em>) designated by Allah in the Quran. The name itself translates to "forbidden" or "sacred," reflecting its esteemed status where warfare is historically prohibited and the weight of deeds&mdash;both righteous and sinful&mdash;is magnified.</p>

<p>Historically, Muharram serves as a profound period of reflection for the Muslim Ummah. It marks the Hijri New Year, an opportunity to renew intentions and reflect on the fleeting nature of time. The month is anchored by the 10th day, known as <strong>Ashura</strong>, a day of immense historical gravity. It was on Ashura that Allah granted victory to Prophet Musa (AS) and the Children of Israel by splitting the Red Sea, saving them from the tyranny of Pharaoh.</p>

<p>Centuries later, the 10th of Muharram also became synonymous with the tragic events of Karbala in 61 AH, where the beloved grandson of the Prophet (peace be upon him), Hussain ibn Ali (RA), along with his family and companions, stood firmly for justice and were martyred. The juxtaposition of triumphant deliverance and profound sacrifice makes Muharram a month of complex emotions, deep spiritual fasting, and critical historical lessons regarding justice, patience, and reliance on the Divine.</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship & Sunnah Acts in Muharram</h2>
<p>The Prophet Muhammad (peace be upon him) highly encouraged specific acts of worship during this sacred month to elevate one's spiritual standing.</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting the Day of Ashura:</strong> Fasting on the 10th of Muharram expiates the minor sins of the previous year (Sahih Muslim).</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting the 9th of Muharram (Tasu'a):</strong> It is a highly recommended Sunnah to fast the 9th alongside the 10th to differentiate the Islamic practice from that of the People of the Book.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Voluntary Fasts:</strong> After Ramadan, fasting in Muharram is described as the most excellent of fasts.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>General Charity and Remembrance:</strong> Increasing Dhikr, Sadaqah, and Quranic recitation to honor the sanctity of the month.</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Common Misconceptions About Muharram</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Is Muharram a month of bad luck or mourning?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> There is no concept of "bad luck" in Islam. While the tragedy of Karbala is deeply sorrowful and a pivotal moment in Islamic history, Islam strictly forbids extended, formalized mourning rituals or suspending marriages and lawful activities during this month. It remains a sacred month of fasting and worship.
            </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseTwo">
                Does the Islamic New Year require a celebration?
            </button>
        </h2>
        <div id="mCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> The Hijri New Year was established during the caliphate of Umar (RA) for administrative purposes. Neither the Prophet (peace be upon him) nor his companions held celebrations or special prayers to mark the new year. It should be a time for quiet reflection rather than festivity.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions About Muharram</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                Why is Muharram considered one of the sacred months?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                Allah mentions the four sacred months in the Quran (Surah At-Tawbah 9:36). During Muharram, Rajab, Dhu al-Qi'dah, and Dhu al-Hijjah, fighting is historically prohibited, and the reward for good deeds, as well as the punishment for sins, is multiplied.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="faqTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                What happened on the Day of Ashura?
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                Ashura marks several historical events, most notably the day Allah parted the Red Sea to save Prophet Musa (AS) and the Israelites. Later in Islamic history, it also became the tragic day on which Hussain ibn Ali (RA) was martyred at the Battle of Karbala.
            </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                Can I fast only on the 10th of Muharram?
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                While fasting only on the 10th is permissible and highly rewarded, the Prophet (peace be upon him) intended to fast the 9th as well to differ from the Jewish practice. Therefore, scholars recommend fasting the 9th and 10th, or the 10th and 11th.
            </div>
        </div>
    </div>
</div>
@endsection
