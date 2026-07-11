@extends('layouts.app')

@section('title', $seoMeta->title ?? 'خوابوں کی تعبیر | NoorIslam')
@section('meta_description', $seoMeta->meta_description ?? '')

@section('content')
<section style="background: linear-gradient(135deg, #1a1a3e 0%, #2d1b69 50%, #1a1a3e 100%); padding: 60px 0; text-align: center; color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; opacity: 0.08; background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2220%22 fill=%22none%22 stroke=%22%23c9982e%22 stroke-width=%220.5%22/><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22%23c9982e%22 stroke-width=%220.3%22/></svg>'); background-size: 100px;"></div>
    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">
        <h1 style="font-family: 'Amiri', serif; font-size: 2.6rem; margin-bottom: 12px; direction: rtl;">خوابوں کی تعبیر</h1>
        <p style="font-size: 1.1rem; opacity: 0.9; direction: rtl; font-family: 'Amiri', serif;">ابن سیرین کے مطابق مستند اسلامی خواب نامہ</p>
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

    @if(request()->has('search') || request()->has('type'))
        {{-- SEARCH RESULTS LAYOUT --}}
        <div style="display: flex; gap: 10px; margin-bottom: 28px; flex-wrap: wrap; justify-content: center;">
            <a href="{{ route('dreams.index') }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ !request('type') ? 'background: #1a1a3e; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">سب</a>
            <a href="{{ route('dreams.index', ['type' => 'good']) }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ request('type') === 'good' ? 'background: #1a6b42; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">
                <i class="fas fa-smile"></i> اچھے خواب
            </a>
            <a href="{{ route('dreams.index', ['type' => 'bad']) }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ request('type') === 'bad' ? 'background: #c0392b; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">
                <i class="fas fa-frown"></i> برے خواب
            </a>
            <a href="{{ route('dreams.index', ['type' => 'warning']) }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ request('type') === 'warning' ? 'background: #e67e22; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">
                <i class="fas fa-exclamation-triangle"></i> تنبیہی خواب
            </a>
            <a href="{{ route('dreams.index', ['type' => 'neutral']) }}" style="padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; {{ request('type') === 'neutral' ? 'background: #7f8c8d; color: #fff;' : 'background: #f0f0f0; color: #555;' }}">
                <i class="fas fa-minus-circle"></i> عام خواب
            </a>
        </div>

        @if($symbols->count())
        <style>
            .dreams-grid { display: grid; gap: 20px; grid-template-columns: repeat(2, 1fr); }
            @media (min-width: 768px) { .dreams-grid { grid-template-columns: repeat(4, 1fr); } }
        </style>
        <div class="dreams-grid">
            @foreach($symbols as $symbol)
                @include('pages.dreams.partials.dream_card', ['symbol' => $symbol])
            @endforeach
        </div>
        <div style="margin-top: 32px; display: flex; justify-content: center;">
            {{ $symbols->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
        @else
        <div style="text-align: center; padding: 60px 20px; color: #888;">
            <span style="font-size: 3rem; display: block; margin-bottom: 16px;">🔮</span>
            <p style="font-size: 1.1rem;">کوئی نتیجہ نہیں ملا</p>
            <p>No results found. Try a different search.</p>
            <a href="{{ route('dreams.index') }}" style="display: inline-block; margin-top: 16px; padding: 10px 24px; background: #1a1a3e; color: #fff; border-radius: 8px; text-decoration: none;">سب خواب دیکھیں</a>
        </div>
        @endif

    @else
        {{-- DREAM HUB LAYOUT --}}
        
        {{-- CATEGORIES GRID --}}
        <div style="margin-bottom: 50px;">
            <h2 style="font-family: 'Amiri', serif; font-size: 2rem; color: #1a1a3e; text-align: center; direction: rtl; margin-bottom: 24px;">خوابوں کی اقسام</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 16px; direction: rtl;">
                @foreach($categories as $category)
                <a href="{{ url('/khwabon-ki-tabeer/' . $category->slug) }}" style="background: #fff; padding: 20px 10px; border-radius: 12px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05); text-decoration: none; color: #1a1a3e; transition: all 0.3s; border: 1px solid #eee;" onmouseover="this.style.borderColor='#c9982e'; this.style.transform='translateY(-3px)'" onmouseout="this.style.borderColor='#eee'; this.style.transform='none'">
                    <span style="font-size: 2rem; display: block; margin-bottom: 10px;">{{ $category->icon ?? '🔮' }}</span>
                    <span style="font-size: 1.1rem; font-weight: bold; display: block;">{{ $category->name_english }} <span style="color: #888; font-size: 0.9rem; font-weight: normal;">({{ $category->dream_symbols_count ?? 0 }})</span></span>
                </a>
                @endforeach
            </div>
        </div>

        {{-- ALPHABETICAL INDEX --}}
        <div style="background: #f8f9fa; padding: 30px; border-radius: 16px; margin-bottom: 50px; text-align: center; border: 1px solid #eee;">
            <h2 style="font-family: 'Amiri', serif; font-size: 1.8rem; color: #1a1a3e; direction: rtl; margin-bottom: 20px;">حروف تہجی کے اعتبار سے خواب تلاش کریں</h2>
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 8px; direction: rtl;">
                @php
                    $alphabets = ['ا', 'ب', 'پ', 'ت', 'ٹ', 'ث', 'ج', 'چ', 'ح', 'خ', 'د', 'ڈ', 'ذ', 'ر', 'ڑ', 'ز', 'ژ', 'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ک', 'گ', 'ل', 'م', 'ن', 'و', 'ہ', 'ی'];
                @endphp
                @foreach($alphabets as $letter)
                <a href="{{ route('dreams.index', ['search' => $letter]) }}" style="display: inline-block; width: 36px; height: 36px; line-height: 36px; text-align: center; background: #fff; border: 1px solid #ddd; border-radius: 8px; color: #333; text-decoration: none; font-weight: bold; font-family: 'Amiri', serif;" onmouseover="this.style.background='#1a1a3e'; this.style.color='#fff'; this.style.borderColor='#1a1a3e'" onmouseout="this.style.background='#fff'; this.style.color='#333'; this.style.borderColor='#ddd'">
                    {{ $letter }}
                </a>
                @endforeach
            </div>
        </div>

        <style>
            .dreams-grid { display: grid; gap: 20px; grid-template-columns: repeat(2, 1fr); }
            @media (min-width: 768px) { .dreams-grid { grid-template-columns: repeat(4, 1fr); } }
        </style>

        {{-- TRENDING DREAMS --}}
        @if($trendingDreams->count() > 0)
        <div style="margin-bottom: 50px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; direction: rtl;">
                <h2 style="font-family: 'Amiri', serif; font-size: 2rem; color: #1a1a3e; margin: 0;">🔥 مشہور خواب (Trending)</h2>
            </div>
            <div class="dreams-grid">
                @foreach($trendingDreams as $symbol)
                    @include('pages.dreams.partials.dream_card', ['symbol' => $symbol])
                @endforeach
            </div>
        </div>
        @endif

        {{-- RECENT DREAMS --}}
        @if($recentDreams->count() > 0)
        <div style="margin-bottom: 50px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; direction: rtl;">
                <h2 style="font-family: 'Amiri', serif; font-size: 2rem; color: #1a1a3e; margin: 0;">✨ نئے خواب (Recently Added)</h2>
                <a href="{{ route('dreams.index', ['type' => 'all']) }}" style="color: #c9982e; text-decoration: none; font-size: 0.9rem; font-weight: bold;">سب دیکھیں <i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="dreams-grid">
                @foreach($recentDreams as $symbol)
                    @include('pages.dreams.partials.dream_card', ['symbol' => $symbol])
                @endforeach
            </div>
        </div>
        @endif

    @endif

</div>
@endsection
