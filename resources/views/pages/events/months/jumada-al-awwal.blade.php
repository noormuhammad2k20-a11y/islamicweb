@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Jumada al-Awwal: The First Month of Solidification</h2>
<p><strong>Jumada al-Awwal</strong> ({{ $hijri_month->name_ar }}), sometimes referred to as Jumada al-Ula, is the fifth month in the Islamic Hijri calendar. The linguistic root of "Jumada" comes from the Arabic word for freezing or becoming solid, as this month originally coincided with the winter season when water would freeze in the Arabian Peninsula.</p>

<p>From a historical perspective, Jumada al-Awwal is heavily associated with the defense, solidification, and expansion of the early Islamic state. Following the migration to Madinah, this month saw the occurrence of several significant military expeditions and skirmishes, most notably the Battle of Mu'tah in the 8th year of Hijrah. This battle was a defining moment, demonstrating the extraordinary courage of the Sahabah (companions) against the formidable Byzantine army.</p>

<p>The events of Jumada al-Awwal teach the Muslim Ummah critical lessons about resilience, strategic patience, and the sacrifices required to uphold truth. It is a month that highlights the physical and spiritual fortitude of the early generations of Muslims.</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship in Jumada al-Awwal</h2>
<p>No specific, formalized acts of worship are uniquely assigned to Jumada al-Awwal. Believers are encouraged to focus on steadfastness (Istiqaamah):</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Studying the Battles of Islam:</strong> Reflecting on the sacrifices of the companions, such as those at Mu'tah, to derive lessons in leadership and faith.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting the White Days:</strong> Fasting on the 13th, 14th, and 15th remains a Prophetic Sunnah.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Praying Tahajjud:</strong> Utilizing the long, cold nights of the winter season (which the name historically references) for the night prayer.</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Clarifications Regarding Jumada al-Awwal</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Does Jumada al-Awwal always occur in winter?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> No. While the name originates from a time when the pre-Islamic calendar was occasionally adjusted (intercalation) to align with seasons, the Islamic calendar is strictly lunar. Therefore, Jumada al-Awwal cycles through all the seasons&mdash;summer, autumn, winter, and spring&mdash;over a roughly 33-year period.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                What major battle occurred in Jumada al-Awwal?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                The Battle of Mu'tah took place in Jumada al-Awwal in 8 AH. It was a legendary confrontation where an army of 3,000 Muslims faced a massively superior Byzantine force. Three commanding companions&mdash;Zayd ibn Harithah, Ja'far ibn Abi Talib, and Abdullah ibn Rawahah (RA)&mdash;were martyred before Khalid ibn al-Walid (RA) safely extracted the Muslim army.
            </div>
        </div>
    </div>
</div>
@endsection
