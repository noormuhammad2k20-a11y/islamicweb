{{-- Reusable FAQ Accordion with Schema.org Markup --}}
{{-- Usage: @include('islamic-calendar.partials._faq', ['faqs' => [['q' => '...', 'a' => '...']]]) --}}

@if(!empty($faqs))
<div class="faq-container" id="faq-section">
    @foreach($faqs as $idx => $faq)
        <div class="faq-item" id="faq-{{ $idx }}" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <div class="faq-question" onclick="toggleFaq('faq-{{ $idx }}')" itemprop="name">
                <span>{{ $faq['q'] }}</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <div itemprop="text">{!! $faq['a'] !!}</div>
            </div>
        </div>
    @endforeach
</div>

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        @foreach($faqs as $idx => $faq)
        {
            "@@type": "Question",
            "name": @json($faq['q']),
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": @json(strip_tags($faq['a']))
            }
        }@if(!$loop->last),@endif
        @endforeach
    ]
}
</script>
@endif
