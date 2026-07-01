@extends('layouts.app')

@section('title', $seoMeta->title ?? 'وظیفہ | NoorIslam')
@section('meta_description', $seoMeta->meta_description ?? '')

@section('content')
<div style="max-width: 900px; margin: 0 auto; padding: 40px 20px;">

    {{-- Breadcrumb --}}
    <nav style="font-size: 0.85rem; color: #888; margin-bottom: 24px;">
        <a href="{{ route('home') }}" style="color: #1a6b42; text-decoration: none;">Home</a>
        <span style="margin: 0 6px;">/</span>
        <a href="{{ route('wazaif.index') }}" style="color: #1a6b42; text-decoration: none;">وظائف</a>
        <span style="margin: 0 6px;">/</span>
        <span>{{ $wazifa->title_urdu }}</span>
    </nav>

    {{-- Main Card --}}
    <article style="background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">

        {{-- Header --}}
        <div style="background: linear-gradient(135deg, #0d4a2e, #1a6b42); padding: 32px; text-align: center; color: #fff;">
            <h1 style="font-family: 'Amiri', serif; font-size: 1.8rem; margin-bottom: 8px; direction: rtl;">{{ $wazifa->title_urdu }}</h1>
            <p style="opacity: 0.85; font-size: 1rem;">{{ $wazifa->title_english }}</p>
            @if($wazifa->purpose)
            <span style="display: inline-block; background: rgba(255,255,255,0.2); padding: 4px 16px; border-radius: 20px; font-size: 0.85rem; margin-top: 10px; direction: rtl;">{{ $wazifa->purpose }}</span>
            @endif
        </div>

        <div style="padding: 32px;">
            {{-- Arabic Text --}}
            @if($wazifa->arabic_text)
            <div style="background: linear-gradient(135deg, #f0faf4, #e8f5ee); border-radius: 12px; padding: 28px; text-align: center; margin-bottom: 28px; border: 1px solid #d4edda;">
                <div style="font-family: 'Amiri', serif; font-size: 2rem; color: #0d4a2e; direction: rtl; line-height: 2.2;">
                    {{ $wazifa->arabic_text }}
                </div>
            </div>
            @endif

            {{-- Urdu Text / Explanation --}}
            @if($wazifa->urdu_text)
            <div style="direction: rtl; margin-bottom: 24px;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #1a6b42; margin-bottom: 12px;">
                    <i class="fas fa-file-alt"></i> تفصیل
                </h2>
                <p style="font-family: 'Amiri', serif; font-size: 1.1rem; line-height: 2; color: #333; background: #fafafa; padding: 20px; border-radius: 8px; border-right: 4px solid #1a6b42;">
                    {{ $wazifa->urdu_text }}
                </p>
            </div>
            @endif

            {{-- Method --}}
            @if($wazifa->method)
            <div style="direction: rtl; margin-bottom: 24px;">
                <h2 style="font-family: 'Amiri', serif; font-size: 1.3rem; color: #c9982e; margin-bottom: 12px;">
                    <i class="fas fa-clipboard-list"></i> طریقہ
                </h2>
                <div style="background: linear-gradient(135deg, #fffbf0, #fff8e8); padding: 20px; border-radius: 8px; border-right: 4px solid #c9982e; font-family: 'Amiri', serif; font-size: 1.05rem; line-height: 1.8; color: #555;">
                    {{ $wazifa->method }}
                </div>
            </div>
            @endif

            {{-- Reference --}}
            @if($wazifa->reference)
            <div style="display: flex; align-items: center; gap: 10px; padding: 16px; background: #f8f9fa; border-radius: 8px; margin-bottom: 24px;">
                <i class="fas fa-book-open" style="color: #1a6b42; font-size: 1.2rem;"></i>
                <div>
                    <span style="font-size: 0.8rem; color: #888; display: block;">حوالہ / Reference</span>
                    <span style="font-weight: 600; color: #333;">{{ $wazifa->reference }}</span>
                </div>
                @if($wazifa->scholar_verified)
                <span style="margin-left: auto; background: #1a6b42; color: #fff; padding: 4px 12px; border-radius: 16px; font-size: 0.8rem;">
                    <i class="fas fa-check-circle"></i> مستند و محقق
                </span>
                @endif
            </div>
            @endif

            {{-- Share Buttons --}}
            <div style="display: flex; gap: 10px; flex-wrap: wrap; padding-top: 20px; border-top: 1px solid #eee;">
                <span style="font-size: 0.9rem; color: #888; display: flex; align-items: center; gap: 6px;"><i class="fas fa-share-alt"></i> شیئر کریں:</span>
                <a href="https://wa.me/?text={{ urlencode($wazifa->title_urdu . ' - ' . url()->current()) }}" target="_blank" style="background: #25d366; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" style="background: #1877f2; color: #fff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 0.85rem;"><i class="fab fa-facebook-f"></i> Facebook</a>
                <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); this.textContent='✓ Copied!'; setTimeout(() => this.textContent='Copy Link', 2000);" style="background: #6c757d; color: #fff; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; font-size: 0.85rem;">Copy Link</button>
            </div>
        </div>
    </article>

    {{-- Related Wazaif --}}
    @if($related->count())
    <div style="margin-top: 48px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #333; margin-bottom: 20px; direction: rtl;">متعلقہ وظائف</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px;">
            @foreach($related as $r)
            <a href="{{ route('wazaif.show', $r->slug) }}" style="text-decoration: none; color: inherit;">
                <div style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border: 1px solid #eee; transition: all 0.3s;" onmouseover="this.style.borderColor='#1a6b42'" onmouseout="this.style.borderColor='#eee'">
                    <h3 style="font-family: 'Amiri', serif; font-size: 1.1rem; color: #1a6b42; direction: rtl; margin-bottom: 6px;">{{ $r->title_urdu }}</h3>
                    <p style="font-size: 0.85rem; color: #666;">{{ $r->title_english }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
