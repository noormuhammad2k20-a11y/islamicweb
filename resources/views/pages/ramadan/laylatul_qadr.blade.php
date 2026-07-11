@extends('layouts.app')

@section('seo')
<title>Lailatul Qadr (The Night of Power) — Signs, Virtues & Duas | IslamicWeb</title>
<meta name="description" content="A comprehensive guide to Lailatul Qadr, the Night of Decree. Learn its signs, virtues, recommended prayers, and authentic Duas.">
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
    
    .guide-container { max-width: 1000px; margin: 0 auto 60px auto; padding: 0 20px; }
    .guide-card { background: white; border-radius: 20px; padding: 40px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); margin-bottom: 30px; position: relative; overflow: hidden; }
    .guide-card::before { content: ''; position: absolute; left: 0; top: 0; height: 100%; width: 5px; background: var(--gold); }
    .guide-title { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--primary); margin-bottom: 20px; font-weight: bold; border-bottom: 1px solid #eee; padding-bottom: 10px;}
    .guide-list { list-style: none; padding: 0; margin: 0; }
    .guide-list li { padding: 15px 0; border-bottom: 1px dashed #eee; font-size: 1.1rem; color: #444; display: flex; align-items: flex-start; gap: 15px; }
    .guide-list li:last-child { border-bottom: none; }
    .guide-list li i { color: var(--primary); margin-top: 5px; font-size: 1.2rem; }
    .guide-text { font-size: 1.15rem; line-height: 1.7; color: #444; }
    
    .dua-arabic { font-family: 'Amiri', serif; font-size: 2.2rem; color: var(--primary-dark); margin: 20px 0; line-height: 1.6; direction: rtl; text-align: center;}
    .dua-transliteration { font-style: italic; color: #666; margin-bottom: 15px; font-size: 1.05rem; text-align: center;}
    .dua-translation { color: #444; font-weight: 500; font-size: 1.1rem; line-height: 1.5; border-top: 1px dashed #eee; padding-top: 15px; text-align: center;}
</style>

<section class="page-hero">
    <h1 class="page-title">Lailatul Qadr (Night of Decree)</h1>
    <p class="page-subtitle">A night better than a thousand months. Learn its virtues, signs, and the best ways to observe it.</p>
</section>

<div class="guide-container">
    @if(isset($guide) && is_array($guide))
        @foreach($guide as $title => $content)
        <div class="guide-card">
            <h2 class="guide-title">{{ $title }}</h2>
            
            @if(is_array($content))
                @if(isset($content['arabic']))
                    <div class="dua-arabic">{{ $content['arabic'] }}</div>
                    <div class="dua-transliteration">"{{ $content['transliteration'] }}"</div>
                    <div class="dua-translation">{{ $content['translation'] }}</div>
                @else
                    <ul class="guide-list">
                        @foreach($content as $item)
                            <li><i class="fas fa-star"></i> <span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                @endif
            @else
                <p class="guide-text">{{ $content }}</p>
            @endif
        </div>
        @endforeach
    @else
        <p style="text-align:center;">Guide is currently being updated.</p>
    @endif
</div>
@endsection
