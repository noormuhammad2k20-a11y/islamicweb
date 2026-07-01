@extends('layouts.app')

@section('title', $seoMeta->title ?? 'اسلامی کوئز | NoorIslam')
@section('meta_description', $seoMeta->meta_description ?? '')

@section('content')
<section style="background: linear-gradient(135deg, #0d4a2e 0%, #1a6b42 50%, #0d4a2e 100%); padding: 50px 0; text-align: center; color: #fff;">
    <div style="max-width: 700px; margin: 0 auto; padding: 0 20px;">
        <h1 style="font-family: 'Amiri', serif; font-size: 2.4rem; margin-bottom: 10px; direction: rtl;">اسلامی کوئز</h1>
        <p style="font-size: 1.05rem; opacity: 0.9; direction: rtl; font-family: 'Amiri', serif;">اپنا اسلامی علم جانچیں — Islamic Knowledge Quiz</p>
    </div>
</section>

<div style="max-width: 800px; margin: 0 auto; padding: 40px 20px;">

    @if($questions->count())
    <div id="quizApp">
        {{-- Quiz Progress --}}
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 28px;">
            <div style="flex: 1; background: #e9ecef; border-radius: 10px; height: 8px; overflow: hidden;">
                <div id="progressBar" style="width: 10%; height: 100%; background: linear-gradient(90deg, #1a6b42, #2d9254); border-radius: 10px; transition: width 0.5s ease;"></div>
            </div>
            <span id="progressText" style="font-size: 0.9rem; color: #666; white-space: nowrap;">1 / {{ $questions->count() }}</span>
        </div>

        {{-- Questions --}}
        @foreach($questions as $index => $q)
        <div class="quiz-question" id="q{{ $index }}" style="{{ $index > 0 ? 'display: none;' : '' }}">
            <div style="background: #fff; border-radius: 14px; padding: 32px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); border: 1px solid #eee;">
                {{-- Category Badge --}}
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <span style="background: linear-gradient(135deg, #1a6b42, #2d9254); color: #fff; padding: 4px 14px; border-radius: 16px; font-size: 0.8rem;">{{ $q->category }}</span>
                    <span style="font-size: 0.8rem; color: #888;">
                        @if($q->difficulty === 'easy') 🟢 آسان
                        @elseif($q->difficulty === 'medium') 🟡 درمیانہ
                        @else 🔴 مشکل @endif
                    </span>
                </div>

                {{-- Question --}}
                <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #222; direction: rtl; line-height: 1.8; margin-bottom: 24px;">
                    {{ $q->question_urdu }}
                </h2>
                @if($q->question_english)
                <p style="font-size: 0.9rem; color: #888; margin-bottom: 20px;">{{ $q->question_english }}</p>
                @endif

                {{-- Options --}}
                <div style="display: grid; gap: 10px;">
                    @foreach(['a' => $q->option_a, 'b' => $q->option_b, 'c' => $q->option_c, 'd' => $q->option_d] as $key => $option)
                    <button class="quiz-option" data-question="{{ $index }}" data-answer="{{ $key }}" data-correct="{{ $q->correct_option }}" onclick="selectAnswer(this, {{ $index }}, '{{ $key }}', '{{ $q->correct_option }}')" style="display: flex; align-items: center; gap: 12px; padding: 16px 20px; background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 10px; cursor: pointer; text-align: right; direction: rtl; font-family: 'Amiri', serif; font-size: 1.05rem; transition: all 0.3s; width: 100%;">
                        <span style="min-width: 32px; height: 32px; border-radius: 50%; background: #e9ecef; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.85rem; color: #666; order: 2; margin-right: auto;">{{ strtoupper($key) }}</span>
                        <span style="order: 1;">{{ $option }}</span>
                    </button>
                    @endforeach
                </div>

                {{-- Explanation (hidden) --}}
                <div id="explanation{{ $index }}" style="display: none; margin-top: 20px; padding: 18px; border-radius: 10px; direction: rtl; font-family: 'Amiri', serif; font-size: 1rem; line-height: 1.8;">
                    {{ $q->explanation }}
                </div>

                {{-- Next Button --}}
                <div id="nextBtn{{ $index }}" style="display: none; text-align: center; margin-top: 20px;">
                    @if($index < $questions->count() - 1)
                    <button onclick="nextQuestion({{ $index }})" style="padding: 12px 36px; background: linear-gradient(135deg, #1a6b42, #2d9254); color: #fff; border: none; border-radius: 8px; cursor: pointer; font-size: 1rem; font-family: 'Amiri', serif;">
                        اگلا سوال <i class="fas fa-arrow-left"></i>
                    </button>
                    @else
                    <button onclick="showResults()" style="padding: 12px 36px; background: linear-gradient(135deg, #c9982e, #daa520); color: #fff; border: none; border-radius: 8px; cursor: pointer; font-size: 1rem; font-family: 'Amiri', serif;">
                        نتائج دیکھیں <i class="fas fa-trophy"></i>
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        {{-- Results Card --}}
        <div id="resultsCard" style="display: none;">
            <div style="background: #fff; border-radius: 14px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); text-align: center;">
                <div style="font-size: 4rem; margin-bottom: 16px;">🏆</div>
                <h2 style="font-family: 'Amiri', serif; font-size: 2rem; color: #1a6b42; margin-bottom: 8px; direction: rtl;">کوئز مکمل ہوا!</h2>
                <p id="scoreText" style="font-size: 1.3rem; color: #333; margin-bottom: 24px; direction: rtl;"></p>
                <div id="scoreBar" style="max-width: 300px; margin: 0 auto 24px; background: #e9ecef; border-radius: 10px; height: 12px; overflow: hidden;">
                    <div id="scoreProgress" style="height: 100%; border-radius: 10px; transition: width 1s ease;"></div>
                </div>
                <p id="scoreMessage" style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #555; direction: rtl; margin-bottom: 28px;"></p>
                <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('quiz.index') }}" style="padding: 12px 28px; background: linear-gradient(135deg, #1a6b42, #2d9254); color: #fff; border-radius: 8px; text-decoration: none; font-size: 1rem;">دوبارہ کھیلیں</a>
                    <a href="https://wa.me/?text={{ urlencode('اسلامی کوئز کھیلیں — ' . url()->current()) }}" target="_blank" style="padding: 12px 28px; background: #25d366; color: #fff; border-radius: 8px; text-decoration: none; font-size: 1rem;"><i class="fab fa-whatsapp"></i> شیئر کریں</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div style="text-align: center; padding: 60px 20px; color: #888;">
        <p style="font-size: 1.1rem;">سوالات جلد شامل کیے جائیں گے</p>
    </div>
    @endif
</div>

<script>
var score = 0;
var totalQuestions = {{ $questions->count() }};
var answered = new Array(totalQuestions).fill(false);

function selectAnswer(btn, qIndex, selected, correct) {
    if (answered[qIndex]) return;
    answered[qIndex] = true;

    var buttons = document.querySelectorAll('#q' + qIndex + ' .quiz-option');
    buttons.forEach(function(b) {
        b.style.cursor = 'default';
        var ans = b.getAttribute('data-answer');
        if (ans === correct) {
            b.style.background = '#d4edda';
            b.style.borderColor = '#1a6b42';
            b.style.color = '#155724';
        } else if (ans === selected && selected !== correct) {
            b.style.background = '#f8d7da';
            b.style.borderColor = '#c0392b';
            b.style.color = '#721c24';
        }
    });

    if (selected === correct) score++;

    var expl = document.getElementById('explanation' + qIndex);
    expl.style.display = 'block';
    expl.style.background = selected === correct ? '#d4edda' : '#f8d7da';
    expl.style.color = selected === correct ? '#155724' : '#721c24';

    document.getElementById('nextBtn' + qIndex).style.display = 'block';
}

function nextQuestion(current) {
    document.getElementById('q' + current).style.display = 'none';
    document.getElementById('q' + (current + 1)).style.display = 'block';
    var progress = ((current + 2) / totalQuestions) * 100;
    document.getElementById('progressBar').style.width = progress + '%';
    document.getElementById('progressText').textContent = (current + 2) + ' / ' + totalQuestions;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function showResults() {
    var questions = document.querySelectorAll('.quiz-question');
    questions.forEach(function(q) { q.style.display = 'none'; });
    document.getElementById('progressBar').style.width = '100%';
    document.getElementById('progressText').textContent = totalQuestions + ' / ' + totalQuestions;

    var pct = Math.round((score / totalQuestions) * 100);
    document.getElementById('scoreText').textContent = 'آپ نے ' + totalQuestions + ' میں سے ' + score + ' درست جوابات دیے (' + pct + '%)';

    var bar = document.getElementById('scoreProgress');
    bar.style.width = pct + '%';
    bar.style.background = pct >= 80 ? '#1a6b42' : pct >= 50 ? '#c9982e' : '#c0392b';

    var msg = '';
    if (pct >= 90) msg = 'ماشاءاللہ! بہترین نتائج! آپ کا اسلامی علم بہت اچھا ہے 🌟';
    else if (pct >= 70) msg = 'بہت اچھا! آپ نے اچھی کارکردگی دکھائی 👍';
    else if (pct >= 50) msg = 'ٹھیک ہے! مزید مطالعہ سے بہتری آئے گی 📚';
    else msg = 'مزید مطالعہ کریں — قرآن اور حدیث پڑھیں اور دوبارہ کوشش کریں 💪';
    document.getElementById('scoreMessage').textContent = msg;

    document.getElementById('resultsCard').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
@endsection
