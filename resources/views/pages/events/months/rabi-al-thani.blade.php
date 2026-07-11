@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Rabi' al-Thani: The Second Spring of Islamic History</h2>
<p><strong>Rabi' al-Thani</strong> ({{ $hijri_month->name_ar }}), also known as Rabi' al-Akhir, is the fourth month of the Islamic Hijri calendar. Continuing the linguistic tradition of its predecessor, "Rabi" translates to spring, while "Thani" means second. This period historically marked the later part of the spring season in pre-Islamic Arabia.</p>

<p>While Rabi' al-Thani does not carry the innate sacred status of Muharram or the profound prophetic milestones of Rabi' al-Awwal, it serves as a critical historical bridge. Throughout centuries of Islamic civilization, this month has witnessed immense scholarly contributions, the expansion of the Islamic empire under various caliphates, and significant geopolitical shifts.</p>

<p>Historically, this month is noted for the passing of several towering figures in Islamic scholarship and spirituality. It reminds the Muslim Ummah that the legacy of the Prophet (peace be upon him) was carried forward faithfully by the scholars, who are described in authentic narrations as the "inheritors of the Prophets." Rabi' al-Thani is a time to reflect on this continuous chain of knowledge and the endurance of the Islamic intellectual tradition.</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship in Rabi' al-Thani</h2>
<p>As with most standard lunar months, there are no mandatory or highly specific acts of worship dedicated solely to Rabi' al-Thani. Instead, Muslims are encouraged to maintain consistency in their spiritual habits:</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Consistency in Salah:</strong> Maintaining the five daily prayers with congregation.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting Ayyam al-Bidh:</strong> The White Days (13th, 14th, and 15th) remain highly recommended.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Seeking Knowledge:</strong> Given the month's association with the lives of many scholars, dedicating time to study Islamic jurisprudence (Fiqh) or Quranic exegesis (Tafsir) is deeply beneficial.</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Clarifications Regarding Rabi' al-Thani</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Are there specific prayers for the 11th of Rabi' al-Thani?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> Some cultural traditions assign special significance to the 11th of this month in honor of certain saints or scholars. However, according to classical Islamic jurisprudence and the Sunnah of the Prophet (peace be upon him), there are no specific prescribed prayers, fasts, or festivals for this day. Worship should remain aligned with the established authentic traditions.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions About Rabi' al-Thani</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                What is the difference between Rabi' al-Thani and Rabi' al-Akhir?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                There is no difference; they are two names for the same month. "Thani" translates to "second," and "Akhir" translates to "last" or "latter," referring to the latter part of the spring season.
            </div>
        </div>
    </div>
</div>
@endsection
