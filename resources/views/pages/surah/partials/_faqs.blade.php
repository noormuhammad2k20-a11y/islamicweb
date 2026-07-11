@if($surah->faqs && $surah->faqs->count() > 0)
<div class="section-header" id="faq" style="margin-top: 70px;">
    <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
    <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
</div>
<div class="surah-content-card">
    <div style="padding: 30px;">
        @foreach($surah->faqs as $faq)
        <div class="surah-faq-item">
            <h3 class="surah-faq-question"><i class="fas fa-question-circle"></i> {{ $faq->question_en }}</h3>
            <p class="surah-faq-answer">{!! $faq->answer_en !!}</p>
        </div>
        @endforeach
    </div>
</div>
@endif
