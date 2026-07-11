@extends('pages.events.month_layout')

@section('unique_significance')
<h2>Dhu al-Hijjah: The Month of the Ultimate Journey and Sacrifice</h2>
<p><strong>Dhu al-Hijjah</strong> ({{ $hijri_month->name_ar }}) is the twelfth and final month of the Islamic Hijri calendar. It is a sacred month possessing immense spiritual weight, and its name literally translates to "The Month of the Pilgrimage." It is the culmination of the Islamic year, bringing together the physical, financial, and spiritual pillars of the faith.</p>

<p>The first ten days of Dhu al-Hijjah are declared by the Prophet Muhammad (peace be upon him) as the best days of the entire year, surpassing even the days of Ramadan in virtue. During these ten days, millions of Muslims from across the globe converge on Makkah to perform <strong>Hajj</strong>, the fifth pillar of Islam, reenacting the unwavering faith and profound submission of Prophet Ibrahim (AS) and his family.</p>

<p>Historically, Dhu al-Hijjah is marked by the monumental <strong>Farewell Pilgrimage</strong> in the 10th year of Hijrah. It was on the plains of Arafah during this month that the Prophet (peace be upon him) delivered his Farewell Sermon, outlining the universal framework of human rights, equality, economic justice, and the sanctity of life in Islam. It was also during this month that Allah revealed the verse declaring the completion and perfection of the religion: "This day I have perfected for you your religion and completed My favor upon you" (Quran 5:3).</p>
@endsection

@section('unique_worship')
<h2>Recommended Worship in Dhu al-Hijjah</h2>
<p>The first ten days of Dhu al-Hijjah are the most action-packed days of worship in the Islamic calendar.</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Performing Hajj:</strong> Obligatory once in a lifetime for those physically and financially able.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Fasting the Day of Arafah (9th):</strong> For those not performing Hajj, fasting on this day expiates the sins of the previous year and the coming year (Sahih Muslim).</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Qurbani / Udhiyah:</strong> The sacrifice of a designated animal on the 10th, 11th, or 12th of the month to honor the submission of Prophet Ibrahim (AS).</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Increasing Takbir:</strong> It is a Sunnah to loudly recite the Takbir (Allahu Akbar), Tahmid (Alhamdulillah), and Tahlil (La ilaha illallah) continuously during the first ten days, and especially after the obligatory prayers from Fajr of the 9th until Asr of the 13th.</li>
</ul>
@endsection

@section('unique_misconceptions')
<h2>Clarifications Regarding Dhu al-Hijjah</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Do I have to stop cutting my hair and nails during the first ten days?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> This ruling only applies to the person who intends to offer the Qurbani (sacrifice). The Prophet (peace be upon him) said: "When the ten days (of Dhu al-Hijjah) begin, if any of you wants to offer a sacrifice, let him not touch his hair or skin" (Sahih Muslim). It does not apply to their family members or those not offering a sacrifice.
            </div>
        </div>
    </div>
</div>
@endsection

@section('unique_faqs')
<h2>Frequently Asked Questions About Dhu al-Hijjah</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                Why are the first ten days of Dhu al-Hijjah so important?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                The Prophet (peace be upon him) explicitly stated: "There are no days on which righteous deeds are more beloved to Allah than these ten days" (Sahih Bukhari). They combine the mother of all worships: Salah, Fasting, Charity, and Hajj, which do not combine at any other time of the year.
            </div>
        </div>
    </div>
</div>
@endsection
