@extends('layouts.app')

@section('title', $seoMeta->title ?? 'وظائف | NoorIslam')
@section('meta_description', $seoMeta->meta_description ?? '')

@section('content')
<section class="wazaif-hero" style="background: linear-gradient(135deg, #0d4a2e 0%, #1a6b42 50%, #0d4a2e 100%); padding: 60px 0; text-align: center; color: #fff; position: relative; overflow: hidden;">
    <div style="position: absolute; inset: 0; opacity: 0.06; background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 80 80%22><circle cx=%2240%22 cy=%2240%22 r=%2235%22 fill=%22none%22 stroke=%22white%22 stroke-width=%220.5%22/></svg>'); background-size: 80px;"></div>
    <div style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">
        <h1 style="font-family: 'Amiri', serif; font-size: 2.6rem; margin-bottom: 12px; direction: rtl;">مسنون وظائف</h1>
        <p style="font-size: 1.1rem; opacity: 0.9; direction: rtl; font-family: 'Amiri', serif;">قرآن و حدیث سے ثابت مستند وظائف — ہر مشکل کا حل</p>
        <p style="font-size: 0.95rem; opacity: 0.75; margin-top: 8px;">Authentic Wazaif from Quran & Hadith</p>
    </div>
</section>

<div style="max-width: 1200px; margin: 0 auto; padding: 40px 20px;">

    <!-- Filters Section -->
    <div style="background: white; border: 1px solid #e5e7eb; border-radius: 12px; padding: 24px; margin-bottom: 40px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form action="{{ route('wazaif.index') }}" method="GET" style="display: flex; gap: 16px; flex-wrap: wrap;">
            
            <input type="text" name="q" placeholder="Search wazaif..." value="{{ request('q') }}" style="flex: 1; min-width: 200px; padding: 14px 20px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem; color: #1f2937; background: #f9fafb;">
            
            <select name="category" style="flex: 0 1 200px; padding: 14px 20px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem; color: #1f2937; background: #f9fafb; direction: rtl; font-family: 'Amiri', serif;">
                <option value="">سب کیٹیگریز (All)</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name_urdu ?? $cat->name_english }}</option>
                @endforeach
            </select>
            
            <select name="type" style="flex: 0 1 180px; padding: 14px 20px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 1rem; color: #1f2937; background: #f9fafb;">
                <option value="">All Sources</option>
                <option value="quranic" {{ request('type') == 'quranic' ? 'selected' : '' }}>Quranic</option>
                <option value="hadith" {{ request('type') == 'hadith' ? 'selected' : '' }}>Hadith</option>
            </select>

            <button type="submit" style="background: #1a6b42; color: white; padding: 14px 32px; border-radius: 8px; border: none; font-size: 1rem; font-weight: 500; cursor: pointer;">
                <i class="fas fa-search"></i> Search
            </button>
        </form>
    </div>

    @if($wazaif->count())
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 20px;">
        @foreach($wazaif as $wazifa)
        <a href="{{ route('wazaif.show', $wazifa->slug) }}" style="text-decoration: none; color: inherit;">
            <div style="background: #fff; border-radius: 12px; padding: 24px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); border: 1px solid #eee; transition: all 0.3s ease; cursor: pointer; height: 100%; display: flex; flex-direction: column;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 8px 24px rgba(26,107,66,0.12)'; this.style.borderColor='#1a6b42';" onmouseout="this.style.transform='none'; this.style.boxShadow='0 2px 12px rgba(0,0,0,0.06)'; this.style.borderColor='#eee';">

                <div style="font-family: 'Amiri', serif; font-size: 1.5rem; color: #1a6b42; text-align: center; direction: rtl; line-height: 2; margin-bottom: 12px; padding: 12px; background: linear-gradient(135deg, #f0faf4, #e8f5ee); border-radius: 8px;">
                    {{ \Illuminate\Support\Str::limit($wazifa->arabic_text, 80) }}
                </div>

                <h3 style="font-family: 'Amiri', serif; font-size: 1.15rem; color: #333; direction: rtl; margin-bottom: 6px;">{{ $wazifa->title_urdu }}</h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 8px;">{{ $wazifa->title_english }}</p>

                <div style="margin-top: auto; padding-top: 12px;">
                    @if($wazifa->reference_details || $wazifa->book_name)
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 0.8rem; color: #1a6b42; margin-top: 8px;">
                        <i class="fas fa-book-open"></i>
                        <span>{{ $wazifa->book_name ?? 'Reference Available' }}</span>
                    </div>
                    @endif

                    <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-top: 12px;">
                        @foreach($wazifa->categories->take(2) as $cat)
                            <span style="font-size: 0.75rem; background: #f3f4f6; color: #4b5563; padding: 4px 8px; border-radius: 4px;">{{ $cat->name_english }}</span>
                        @endforeach
                        
                        @if($wazifa->authenticity_grade)
                        <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 0.75rem; color: #fff; background: #1a6b42; padding: 4px 8px; border-radius: 4px;">
                            <i class="fas fa-check-circle"></i> {{ $wazifa->authenticity_grade }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    
    <div style="margin-top: 40px;">
        {{ $wazaif->links('vendor.pagination.custom') }}
    </div>
    
    @else
    <div style="text-align: center; padding: 60px 20px; color: #888; background: white; border-radius: 12px; border: 1px solid #eee;">
        <i class="fas fa-book" style="font-size: 3rem; opacity: 0.3; margin-bottom: 16px;"></i>
        <h3 style="font-size: 1.2rem; color: #666;">No Wazaif found</h3>
        <p style="font-size: 0.95rem; margin-top: 8px;">Try adjusting your search criteria.</p>
    </div>
    @endif
</div>
@endsection
