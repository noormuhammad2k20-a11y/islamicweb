@extends('layouts.app')

@section('title', $seoMeta->title ?? 'تعبیر الرؤیا | NoorIslam')
@section('meta_description', $seoMeta->meta_description ?? '')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">

    <nav style="font-size: 0.85rem; color: #888; margin-bottom: 24px;">
        <a href="{{ route('home') }}" style="color: #1a6b42; text-decoration: none;">Home</a>
        <span style="margin: 0 6px;">/</span>
        <a href="{{ route('dreams.index') }}" style="color: #1a6b42; text-decoration: none;">خوابوں کی تعبیر</a>
        <span style="margin: 0 6px;">/</span>
        <span>{{ $symbol->symbol_urdu }}</span>
    </nav>

    <article style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
        <div style="background: linear-gradient(135deg, #1a1a3e, #2d1b69); padding: 40px; text-align: center; color: #fff;">
            <h1 style="font-family: 'Amiri', serif; font-size: 2.2rem; margin-bottom: 8px; direction: rtl;">
                خواب میں {{ $symbol->symbol_urdu }} دیکھنا
            </h1>
            <p style="opacity: 0.9; font-size: 1.1rem; margin-bottom: 4px;">{{ $symbol->symbol_english }} — Islamic Dream Interpretation</p>
            <p style="opacity: 0.7; font-size: 0.95rem; font-family: 'Amiri', serif; direction: rtl;">
                {{ $symbol->symbol_arabic ? 'عربی: ' . $symbol->symbol_arabic : '' }} 
                {{ $symbol->symbol_roman_urdu ? ' | Roman Urdu: ' . $symbol->symbol_roman_urdu : '' }}
            </p>

            @if($symbol->dream_type === 1 || $symbol->is_good_dream === 1)
            <span style="display: inline-block; background: rgba(26,107,66,0.8); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px;">
                <i class="fas fa-smile"></i> اچھا خواب — Good Dream
            </span>
            @elseif($symbol->dream_type === 2 || $symbol->is_good_dream === 0)
            <span style="display: inline-block; background: rgba(192,57,43,0.8); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px;">
                <i class="fas fa-frown"></i> خبردار — Bad Dream
            </span>
            @elseif($symbol->dream_type === 3)
            <span style="display: inline-block; background: rgba(230,126,34,0.9); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px; color: #fff;">
                <i class="fas fa-exclamation-triangle"></i> تنبیہی خواب — Warning Dream
            </span>
            @elseif($symbol->dream_type === 0)
            <span style="display: inline-block; background: rgba(127,140,141,0.8); padding: 6px 20px; border-radius: 20px; font-size: 0.9rem; margin-top: 12px; color: #fff;">
                <i class="fas fa-minus-circle"></i> عام خواب — Neutral Dream
            </span>
            @endif
        </div>

        <div style="padding: 36px;">
            {{-- Urdu Interpretation --}}
            <div style="direction: rtl; margin-bottom: 28px;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #2d1b69; margin-bottom: 14px;">
                    <i class="fas fa-moon"></i> اردو تعبیر
                </h2>
                <div style="font-family: 'Amiri', serif; font-size: 1.15rem; line-height: 2.2; color: #333; background: linear-gradient(135deg, #f8f4ff, #f0ecf8); padding: 24px; border-radius: 10px; border-right: 4px solid #2d1b69;">
                    {{ $symbol->interpretation_urdu }}
                </div>
            </div>

            {{-- English Interpretation --}}
            @if($symbol->interpretation_english)
            <div style="margin-bottom: 28px;">
                <h2 style="font-size: 1.2rem; color: #2d1b69; margin-bottom: 14px;">
                    <i class="fas fa-globe"></i> English Interpretation
                </h2>
                <div style="font-size: 1.05rem; line-height: 1.9; color: #444; background: #f8f9fa; padding: 24px; border-radius: 10px; border-left: 4px solid #c9982e;">
                    {{ $symbol->interpretation_english }}
                </div>
            </div>
            @endif

            {{-- Scholar References --}}
            @if($symbol->scholarly_opinions && is_array($symbol->scholarly_opinions) && count($symbol->scholarly_opinions) > 0)
                <div style="margin-bottom: 28px;">
                    <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #2d1b69; margin-bottom: 14px; direction: rtl;">
                        <i class="fas fa-user-graduate"></i> علمائے کرام کی آراء
                    </h2>
                    @foreach($symbol->scholarly_opinions as $opinion)
                    <div style="display: flex; align-items: flex-start; gap: 16px; padding: 20px; background: #fafafa; border-radius: 10px; margin-bottom: 12px; border-right: 3px solid #c9982e; direction: rtl;">
                        <i class="fas fa-quote-right" style="color: #e0e0e0; font-size: 1.8rem; margin-top: 4px;"></i>
                        <div>
                            <span style="display: block; font-weight: 700; color: #1a1a3e; margin-bottom: 6px; font-family: 'Amiri', serif; font-size: 1.1rem;">{{ $opinion['scholar'] ?? 'عالم' }}</span>
                            @if(isset($opinion['interpretation_urdu']))
                                <p style="font-family: 'Amiri', serif; font-size: 1.05rem; line-height: 1.8; color: #444; margin-bottom: 4px;">{{ $opinion['interpretation_urdu'] }}</p>
                            @endif
                            @if(isset($opinion['interpretation_english']))
                                <p style="font-size: 0.95rem; line-height: 1.6; color: #666; direction: ltr;">{{ $opinion['interpretation_english'] }}</p>
                            @endif
                            @if(isset($opinion['source']))
                                <span style="font-size: 0.8rem; color: #999; display: block; margin-top: 8px;"><i class="fas fa-book"></i> ماخذ: {{ $opinion['source'] }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @elseif($symbol->scholar_reference)
            <div style="display: flex; align-items: center; gap: 12px; padding: 18px; background: #fafafa; border-radius: 10px; margin-bottom: 24px;">
                <i class="fas fa-user-graduate" style="color: #2d1b69; font-size: 1.5rem;"></i>
                <div>
                    <span style="font-size: 0.8rem; color: #888;">حوالہ / Reference</span>
                    <span style="display: block; font-weight: 600; color: #333;">{{ $symbol->scholar_reference }}</span>
                </div>
            </div>
            @endif

            {{-- Quran Reference --}}
            @if($symbol->quran_reference && isset($symbol->quran_reference['verse']))
            <div style="background: linear-gradient(135deg, #f8fcf9, #e8f5ee); border-radius: 10px; padding: 20px; margin-bottom: 28px; border: 1px solid #c3e6cb;">
                <h3 style="font-size: 1.1rem; color: #1a6b42; margin-bottom: 12px; direction: rtl; font-family: 'Amiri', serif;">
                    <i class="fas fa-quran"></i> قرآنی حوالہ
                </h3>
                <p style="font-family: 'Amiri', serif; font-size: 1.25rem; color: #333; direction: rtl; line-height: 2.2; text-align: center; margin-bottom: 10px;">
                    {{ $symbol->quran_reference['arabic'] ?? '' }}
                </p>
                <p style="font-family: 'Amiri', serif; font-size: 1rem; color: #555; direction: rtl; line-height: 1.9;">
                    {{ $symbol->quran_reference['urdu_translation'] ?? $symbol->quran_reference['verse'] }}
                </p>
            </div>
            @endif

            {{-- Hadith Reference --}}
            @if($symbol->hadith_reference && isset($symbol->hadith_reference['text']))
            <div style="background: linear-gradient(135deg, #fffbf0, #fff8e8); border-radius: 10px; padding: 20px; margin-bottom: 28px; border: 1px solid #f0e6c8;">
                <h3 style="font-size: 1.1rem; color: #c9982e; margin-bottom: 12px; direction: rtl; font-family: 'Amiri', serif;">
                    <i class="fas fa-star"></i> حدیث کا حوالہ
                </h3>
                <p style="font-family: 'Amiri', serif; font-size: 1rem; color: #555; direction: rtl; line-height: 1.9;">
                    {{ $symbol->hadith_reference['text'] }}
                </p>
                <p style="font-size: 0.85rem; color: #888; direction: rtl; margin-top: 8px;">( {{ $symbol->hadith_reference['source'] ?? 'حدیث' }} )</p>
            </div>
            @else
            {{-- Default Hadith about Dreams --}}
            <div style="background: linear-gradient(135deg, #fffbf0, #fff8e8); border-radius: 10px; padding: 20px; margin-bottom: 28px; border: 1px solid #f0e6c8;">
                <h3 style="font-size: 1rem; color: #c9982e; margin-bottom: 10px; direction: rtl; font-family: 'Amiri', serif;">
                    <i class="fas fa-star"></i> خوابوں کے بارے میں حدیث
                </h3>
                <p style="font-family: 'Amiri', serif; font-size: 0.95rem; color: #555; direction: rtl; line-height: 1.9;">
                    نبی ﷺ نے فرمایا: "اچھا خواب اللہ کی طرف سے ہے اور برا خواب شیطان کی طرف سے ہے۔ جب تم میں سے کوئی اچھا خواب دیکھے تو اسے صرف اس کو بتائے جس سے محبت ہو۔" (صحیح بخاری)
                </p>
            </div>
            @endif

            {{-- FAQs --}}
            @if($symbol->faqs && is_array($symbol->faqs) && count($symbol->faqs) > 0)
            <div style="margin-bottom: 32px; padding-top: 24px; border-top: 1px solid #eee;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.4rem; color: #1a1a3e; margin-bottom: 16px; direction: rtl;">عمومی سوالات (FAQs)</h2>
                @foreach($symbol->faqs as $faq)
                <div style="margin-bottom: 16px; background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 16px;">
                    <h3 style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #2d1b69; margin-bottom: 8px; direction: rtl;"><i class="fas fa-question-circle" style="color: #c9982e; margin-left: 6px;"></i> {{ $faq['question'] ?? '' }}</h3>
                    <p style="font-family: 'Amiri', serif; font-size: 0.95rem; line-height: 1.8; color: #555; direction: rtl;">{{ $faq['answer'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
            @endif

            {{-- Share --}}
            <div style="display: flex; gap: 10px; flex-wrap: wrap; padding-top: 20px; border-top: 1px solid #eee;">
                <span style="font-size: 0.9rem; color: #888; display: flex; align-items: center; gap: 6px;"><i class="fas fa-share-alt"></i> شیئر کریں:</span>
                <a href="https://wa.me/?text={{ urlencode('خواب میں ' . $symbol->symbol_urdu . ' دیکھنے کی تعبیر - ' . url()->current()) }}" target="_blank" style="background: #25d366; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" style="background: #1877f2; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-facebook-f"></i> Facebook</a>
            </div>
        </div>
    </article>

    {{-- Related --}}
    @if($related->count())
    <div style="margin-top: 48px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #333; margin-bottom: 20px; direction: rtl;">مزید خوابوں کی تعبیر</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px;">
            @foreach($related as $r)
            <a href="{{ route('dreams.show', $r->slug) }}" style="text-decoration: none; background: #fff; border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border: 1px solid #eee; text-align: center; transition: all 0.3s;" onmouseover="this.style.borderColor='#2d1b69'" onmouseout="this.style.borderColor='#eee'">
                <span style="font-family: 'Amiri', serif; font-size: 1.2rem; color: #2d1b69; display: block; direction: rtl;">{{ $r->symbol_urdu }}</span>
                <span style="font-size: 0.8rem; color: #888;">{{ $r->symbol_english }}</span>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Opposite Dreams --}}
    @if($opposite && $opposite->count())
    <div style="margin-top: 36px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #c0392b; margin-bottom: 20px; direction: rtl;">اس کے برعکس خواب</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px;">
            @foreach($opposite as $o)
            <a href="{{ route('dreams.show', $o->slug) }}" style="text-decoration: none; background: #fff; border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px rgba(192,57,43,0.05); border: 1px solid #fde8e8; text-align: center; transition: all 0.3s;" onmouseover="this.style.borderColor='#c0392b'" onmouseout="this.style.borderColor='#fde8e8'">
                <span style="font-family: 'Amiri', serif; font-size: 1.2rem; color: #c0392b; display: block; direction: rtl;">{{ $o->symbol_urdu }}</span>
                <span style="font-size: 0.8rem; color: #888;">{{ $o->symbol_english }}</span>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Popular Symbols --}}
    @if($popular->count())
    <div style="margin-top: 36px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #333; margin-bottom: 16px; direction: rtl;">سب سے زیادہ تلاش کیے گئے</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 8px;">
            @foreach($popular as $p)
            <a href="{{ route('dreams.show', $p->slug) }}" style="padding: 6px 16px; background: #f0ecf8; color: #2d1b69; border-radius: 20px; text-decoration: none; font-size: 0.85rem; font-family: 'Amiri', serif; transition: all 0.2s;" onmouseover="this.style.background='#2d1b69'; this.style.color='#fff'" onmouseout="this.style.background='#f0ecf8'; this.style.color='#2d1b69'">
                {{ $p->symbol_urdu }}
            </a>
            @endforeach
        </div>
    </div>
    @endif
    {{-- Recent Dreams --}}
    @if(isset($recent) && $recent->count())
    <div style="margin-top: 48px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #333; margin-bottom: 20px; direction: rtl;">نئے شامل کیے گئے خواب</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 14px;">
            @foreach($recent as $rec)
            <a href="{{ route('dreams.show', $rec->slug) }}" style="text-decoration: none; background: #fff; border-radius: 10px; padding: 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border: 1px solid #eee; text-align: center; transition: all 0.3s;" onmouseover="this.style.borderColor='#1a6b42'" onmouseout="this.style.borderColor='#eee'">
                <span style="font-family: 'Amiri', serif; font-size: 1.2rem; color: #1a6b42; display: block; direction: rtl;">{{ $rec->symbol_urdu }}</span>
                <span style="font-size: 0.8rem; color: #888;">{{ $rec->symbol_english }}</span>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
