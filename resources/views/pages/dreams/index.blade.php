@extends('layouts.app')

@section('title', $seoMeta->title ?? 'خوابوں کی تعبیر | NoorIslam')
@section('meta_description', $seoMeta->meta_description ?? '')

@section('content')
<section style="background: linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #1a1a3e 100%); padding: 60px 0; text-align: center; color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; opacity: 0.08; background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2220%22 fill=%22none%22 stroke=%22%23c9982e%22 stroke-width=%220.5%22/><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22%23c9982e%22 stroke-width=%220.3%22/></svg>'); background-size: 100px;"></div>
    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">
        <h1 style="font-family: 'Amiri', serif; font-size: 2.6rem; margin-bottom: 12px; direction: rtl;">خوابوں کی تعبیر</h1>
        <p style="font-size: 1.1rem; opacity: 0.9; direction: rtl; font-family: 'Amiri', serif;">ابن سیرین کے مطابق اسلامی خواب نامہ</p>
        <p style="font-size: 0.95rem; opacity: 0.7; margin-top: 6px;">Islamic Dream Interpretation — Khwabon Ki Tabeer</p>

        {{-- Search Bar --}}
        <form action="{{ route('dreams.index') }}" method="GET" style="margin-top: 24px; display: flex; max-width: 500px; margin-left: auto; margin-right: auto;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="خواب تلاش کریں... (پانی، سانپ، مسجد)" style="flex: 1; padding: 14px 20px; border: none; border-radius: 10px 0 0 10px; font-size: 1rem; direction: rtl; font-family: 'Amiri', serif;">
            <button type="submit" style="padding: 14px 24px; background: #c9982e; color: #fff; border: none; border-radius: 0 10px 10px 0; cursor: pointer; font-size: 1rem;">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
</section>

<div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    {{-- Filter Tabs --}}
    <div style="display: flex; gap: 10px; margin-bottom: 28px; flex-wrap: wrap; justify-content: center;">
        <a href="{{ route('dreams.index') }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ !request('type') ? 'background: #1a1a3e; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">سب</a>
        <a href="{{ route('dreams.index', ['type' => 'good']) }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ request('type') === 'good' ? 'background: #1a6b42; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">
            <i class="fas fa-smile"></i> اچھے خواب
        </a>
        <a href="{{ route('dreams.index', ['type' => 'bad']) }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ request('type') === 'bad' ? 'background: #c0392b; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">
            <i class="fas fa-frown"></i> برے خواب
        </a>
    </div>

    @if($symbols->count())
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px;">
        @foreach($symbols as $symbol)
        <a href="{{ route('dreams.show', $symbol->slug) }}" style="text-decoration: none; color: inherit;">
            <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #eee; transition: all 0.3s; cursor: pointer; position: relative; overflow: hidden;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 24px rgba(26,27,62,0.12)'; this.style.borderColor='#2d1b69';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'; this.style.borderColor='#eee';">

                @if($symbol->is_good_dream === 1)
                <span style="position: absolute; top: 12px; right: 12px; background: #e8f5ee; color: #1a6b42; padding: 3px 10px; border-radius: 12px; font-size: 0.75rem;"><i class="fas fa-smile"></i> اچھا</span>
                @elseif($symbol->is_good_dream === 0)
                <span style="position: absolute; top: 12px; right: 12px; background: #fde8e8; color: #c0392b; padding: 3px 10px; border-radius: 12px; font-size: 0.75rem;"><i class="fas fa-frown"></i> خبردار</span>
                @endif

                <div style="text-align: center; margin-bottom: 16px;">
                    <span style="font-size: 2.5rem; display: block; margin-bottom: 8px;">
                        @php
                            $icons = ['water-pani' => '💧', 'snake-saanp' => '🐍', 'flying-urna' => '🕊️', 'teeth-falling-dant' => '🦷', 'milk-doodh' => '🥛', 'mosque-masjid' => '🕌', 'quran-pak' => '📖', 'fire-aag' => '🔥', 'rain-barish' => '🌧️', 'lion-sher' => '🦁', 'honey-shehad' => '🍯', 'kaaba-sharif' => '🕋', 'moon-chand' => '🌙', 'sun-suraj' => '☀️', 'dead-person-murda' => '👤', 'horse-ghora' => '🐴', 'sea-samandar' => '🌊', 'seeing-prophet-muhammad' => '✨', 'tree-darakht' => '🌳', 'ring-anguthi' => '💍', 'blood-khoon' => '🩸', 'mountain-pahar' => '⛰️', 'sword-talwar' => '⚔️', 'white-clothes-safed' => '👕', 'cat-billi' => '🐱', 'bird-parinda' => '🐦', 'well-kunwan' => '🪣', 'key-chabi' => '🔑', 'bread-roti' => '🍞'];
                        @endphp
                        {{ $icons[$symbol->slug] ?? '🔮' }}
                    </span>
                </div>

                <h3 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #1a1a3e; text-align: center; direction: rtl; margin-bottom: 4px;">{{ $symbol->symbol_urdu }}</h3>
                <p style="text-align: center; font-size: 0.85rem; color: #888; margin-bottom: 12px;">{{ $symbol->symbol_english }}</p>

                <p style="font-size: 0.9rem; color: #555; direction: rtl; font-family: 'Amiri', serif; line-height: 1.8;">
                    {{ \Illuminate\Support\Str::limit($symbol->interpretation_urdu, 100) }}
                </p>

                @if($symbol->scholar_reference)
                <div style="font-size: 0.8rem; color: #999; margin-top: 10px;">
                    <i class="fas fa-user-tie"></i> {{ $symbol->scholar_reference }}
                </div>
                @endif
            </div>
        </a>
        @endforeach
    </div>

    <div style="margin-top: 32px; display: flex; justify-content: center;">
        {{ $symbols->appends(request()->query())->links() }}
    </div>
    @else
    <div style="text-align: center; padding: 60px 20px; color: #888;">
        <span style="font-size: 3rem; display: block; margin-bottom: 16px;">🔮</span>
        <p style="font-size: 1.1rem;">کوئی نتیجہ نہیں ملا</p>
        <p>No results found. Try a different search.</p>
        <a href="{{ route('dreams.index') }}" style="display: inline-block; margin-top: 16px; padding: 10px 24px; background: #1a1a3e; color: #fff; border-radius: 8px; text-decoration: none;">سب خواب دیکھیں</a>
    </div>
    @endif
</div>
@endsection
