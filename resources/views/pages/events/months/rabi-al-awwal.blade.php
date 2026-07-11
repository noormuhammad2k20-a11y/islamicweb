@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Rabi' al-Awwal: The Spring of Prophethood and Light</h2>
<p><strong>Rabi' al-Awwal</strong> ({{ $hijri_month->name_ar }}) is the third month of the Islamic calendar. Linguistically, the word "Rabi" translates to "spring," reflecting the season during which this month was originally named in pre-Islamic Arabia. However, for the Muslim Ummah, this month represents a profound spiritual spring&mdash;the birth of the final Messenger, Prophet Muhammad (peace be upon him).</p>

<p>The historical gravity of Rabi' al-Awwal is unparalleled in Islamic history. It was during this month that the Prophet (peace be upon him) was born, illuminating a world entrenched in darkness. It was also during this month that the Prophet (peace be upon him) completed the perilous Hijrah (migration) from Makkah and safely arrived in Quba, near Madinah, marking the official establishment of the Islamic state and the beginning of the Hijri calendar system.</p>

<p>Furthermore, in a profound juxtaposition of joy and sorrow, Rabi' al-Awwal is also the month in which the Prophet Muhammad (peace be upon him) passed away. This profound reality makes the month a time for intense reflection on the Seerah (prophetic biography), an opportunity to revive his Sunnah, and a reminder of the ultimate transient nature of this worldly life.</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship & Reviving the Sunnah</h2>
<p>While there are no specific formal acts of worship (like a mandatory fast) exclusively dedicated to Rabi' al-Awwal, the profound connection to the Prophet's (peace be upon him) life demands a spiritual response.</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Sending Salawat:</strong> Increasing the recitation of Durood and Salawat upon the Prophet (peace be upon him) as commanded in the Quran (Surah Al-Ahzab).</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Studying the Seerah:</strong> Dedicating time to read and understand the biography of the Prophet (peace be upon him) to emulate his character.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting on Mondays:</strong> The Prophet (peace be upon him) was asked about fasting on Mondays, and he replied, "That is the day on which I was born and the day on which revelation came to me" (Sahih Muslim).</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Clarifications Regarding Rabi' al-Awwal</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Is the 12th of Rabi' al-Awwal definitively the Prophet's birthday?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> While the 12th of Rabi' al-Awwal is the most famous date associated with his birth among the masses, historians and classical scholars (such as Ibn Ishaq) differed. Many prominent scholars, including Safiur Rahman Mubarakpuri (author of The Sealed Nectar), calculated that the birth actually fell on the 9th of Rabi' al-Awwal. However, there is unanimous consensus that his death occurred on the 12th of Rabi' al-Awwal.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions About Rabi' al-Awwal</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                Why is the Hijrah celebrated in Muharram if it happened in Rabi' al-Awwal?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                The decision to migrate was finalized after the pledges of Aqabah, and the physical journey began in late Safar, culminating with the arrival in Madinah in Rabi' al-Awwal. However, when Caliph Umar (RA) established the calendar, he started the year with Muharram because it is the month immediately following the Hajj, when the pilgrims return home.
            </div>
        </div>
    </div>
</div>
@endsection
