

<?php $__env->startSection('unique_significance'); ?>
<h2>Shawwal: The Month of Gratitude and Continuity</h2>
<p><strong>Shawwal</strong> (<?php echo e($hijri_month->name_ar); ?>) is the tenth month of the Islamic lunar calendar, immediately following the intense spiritual season of Ramadan. The word "Shawwal" originates from the Arabic word meaning "to carry" or "to lift," historically referencing the time of year when female camels would lift their tails, signaling they were in calf.</p>

<p>The arrival of Shawwal is marked by <strong>Eid al-Fitr</strong>, the Festival of Breaking the Fast, which takes place on the 1st of the month. This joyous celebration is a day of profound gratitude to Allah for providing the strength to complete the mandatory fasts of Ramadan. It is a time characterized by the distribution of Zakat al-Fitr (charity given before the Eid prayer), communal prayers, family gatherings, and the reinforcement of social bonds.</p>

<p>Historically, Shawwal also carries the weight of serious military engagement. The <strong>Battle of Uhud</strong> occurred in Shawwal of 3 AH, providing the early Muslims with critical, enduring lessons on the consequences of disobeying prophetic command and the reality of facing setbacks with resilience and unwavering faith.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('unique_worship'); ?>
<h2>Recommended Worship in Shawwal</h2>
<p>Shawwal serves as the immediate litmus test for the spiritual habits built during Ramadan.</p>
<ul style="list-style-type: none; padding-left: 0;">
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>The Six Fasts of Shawwal:</strong> The most significant act of worship is fasting six voluntary days. The Prophet (peace be upon him) said: "Whoever fasts Ramadan, then follows it with six days of Shawwal, it is as if he fasted for a lifetime" (Sahih Muslim).</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Eid Prayer & Takbir:</strong> Starting from the sighting of the moon until the Eid prayer, constantly reciting the Takbir (Allahu Akbar) is a highly recommended sunnah.</li>
    <li style="margin-bottom: 12px;"><i class="fas fa-check-circle" style="color:var(--primary); margin-right:8px;"></i> <strong>Maintaining Ramadan Habits:</strong> Continuing to read the Quran and praying Tahajjud is the greatest sign that one's Ramadan was accepted.</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('unique_misconceptions'); ?>
<h2>Clarifications Regarding Shawwal</h2>
<div class="accordion modern-faq mt-4" id="misconceptionsFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseOne">
                Do the six fasts of Shawwal have to be consecutive?
            </button>
        </h2>
        <div id="mCollapseOne" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> No, they do not need to be consecutive. You can fast them back-to-back immediately after Eid, or spread them out over the entire month of Shawwal. The reward is attained as long as six days are completed within the month.
            </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="mFaqTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mCollapseTwo">
                Can I combine the intention of making up missed Ramadan fasts with the six Shawwal fasts?
            </button>
        </h2>
        <div id="mCollapseTwo" class="accordion-collapse collapse" data-bs-parent="#misconceptionsFaq">
            <div class="accordion-body">
                <strong>Reality:</strong> The majority of classical scholars (including the Hanbali and Shafi'i schools) state that you cannot combine intentions for an obligatory makeup fast (Qada) and a voluntary fast (Nafl) on the same day. One should ideally make up missed Ramadan fasts first, and then fast the six days of Shawwal.
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('unique_faqs'); ?>
<h2>Frequently Asked Questions About Shawwal</h2>
<div class="accordion modern-faq mt-4" id="monthFaq">
    <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                Can I fast on the 1st of Shawwal?
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#monthFaq">
            <div class="accordion-body">
                No. The 1st of Shawwal is Eid al-Fitr, and the Prophet Muhammad (peace be upon him) strictly forbade fasting on the two days of Eid (Eid al-Fitr and Eid al-Adha).
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.events.month_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Xamp\htdocs\Islamicwebsite\resources\views\pages\events\months\shawwal.blade.php ENDPATH**/ ?>