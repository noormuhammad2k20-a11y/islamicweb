{{-- FAQ Block Component --}}
@props(['faqs' => []])

<div class="faq-container" itemscope itemtype="https://schema.org/FAQPage">
    @foreach($faqs as $index => $faq)
    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
        <button class="faq-question" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
            <h3 itemprop="name"><i class="fas fa-question-circle"></i> {{ $faq['q'] }}</h3>
            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="{{ $index === 0 ? 'display: block;' : 'display: none;' }}">
            <div class="faq-answer-inner" itemprop="text">
                {!! $faq['a'] !!}
            </div>
        </div>
    </div>
    @endforeach
</div>

<style>
.faq-container {
    max-width: 800px;
    margin: 0 auto;
}
.faq-item {
    margin-bottom: 15px;
    background: var(--white);
    border-radius: var(--radius-md);
    box-shadow: 0 2px 10px rgba(0,0,0,0.03);
    overflow: hidden;
    border: 1px solid rgba(10, 58, 42, 0.05);
}
.faq-question {
    width: 100%;
    text-align: left;
    padding: 20px 25px;
    background: none;
    border: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    transition: background 0.2s;
}
.faq-question:hover {
    background: rgba(10, 58, 42, 0.02);
}
.faq-question h3 {
    margin: 0;
    font-size: 1.1rem;
    color: var(--primary-dark);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}
.faq-question h3 i {
    color: var(--gold);
}
.faq-icon {
    color: var(--text-light);
    transition: transform 0.3s ease;
}
.faq-question[aria-expanded="true"] .faq-icon {
    transform: rotate(180deg);
    color: var(--primary);
}
.faq-answer {
    border-top: 1px solid rgba(10, 58, 42, 0.05);
}
.faq-answer-inner {
    padding: 20px 25px;
    color: var(--text);
    line-height: 1.6;
    font-size: 0.95rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var questions = document.querySelectorAll('.faq-question');
    questions.forEach(function(q) {
        q.addEventListener('click', function() {
            var expanded = this.getAttribute('aria-expanded') === 'true' || false;
            
            // Close all
            questions.forEach(function(otherQ) {
                otherQ.setAttribute('aria-expanded', 'false');
                otherQ.nextElementSibling.style.display = 'none';
            });
            
            // Toggle current
            if (!expanded) {
                this.setAttribute('aria-expanded', 'true');
                this.nextElementSibling.style.display = 'block';
            }
        });
    });
});
</script>
