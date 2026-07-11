@extends('layouts.app')

@section('title', $narrator->name_en . ' - Hadith Narrator')
@section('meta_description', 'Learn about the biography, life, and hadith narrations of ' . $narrator->name_en . ' (' . $narrator->name_ar . ').')

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "{{ $narrator->name_en }}",
  "alternateName": "{{ $narrator->name_ar }}",
  "description": "Hadith Narrator and Companion",
  @if($narrator->birth)
  "birthDate": "{{ $narrator->birth }}",
  @endif
  @if($narrator->death)
  "deathDate": "{{ $narrator->death }}",
  @endif
  "url": "{{ route('hadith.narratorShow', $narrator->slug) }}"
}
</script>
@endpush

@section('content')
<div class="page-header" style="background: var(--primary); color: white; padding: 40px 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 10px;">{{ $narrator->name_en }} <span style="font-family: 'Amiri', serif;">{{ $narrator->name_ar }}</span></h1>
        <p style="opacity: 0.8; margin-bottom: 0;">{{ $narrator->status ?? 'Companion of the Prophet ﷺ' }}</p>
    </div>
</div>

<div class="container" style="padding: 40px 20px;">
    <div class="row">
        <div class="col-md-4">
            <div style="background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px;">
                <h3 style="border-bottom: 2px solid var(--accent); padding-bottom: 10px; margin-bottom: 20px; font-size: 1.2rem; color: var(--primary);">Narrator Profile</h3>
                
                @if($narrator->birth)
                <p><strong>Birth:</strong> {{ $narrator->birth }}</p>
                @endif
                
                @if($narrator->death)
                <p><strong>Death:</strong> {{ $narrator->death }}</p>
                @endif
                
                <p><strong>Total Narrations:</strong> {{ $hadiths->total() }}</p>
                <p><strong>Companion:</strong> {{ $narrator->companion ? 'Yes' : 'No' }}</p>
            </div>
        </div>
        
        <div class="col-md-8">
            <div style="background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 30px;">
                <h3 style="border-bottom: 2px solid var(--accent); padding-bottom: 10px; margin-bottom: 20px; font-size: 1.2rem; color: var(--primary);">Biography</h3>
                <div style="line-height: 1.8; color: #444;">
                    {!! nl2br(e($narrator->biography ?? 'Biography coming soon.')) !!}
                </div>
            </div>
            
            <h3 style="margin-top: 40px; margin-bottom: 20px; color: var(--primary);">Narrations by {{ $narrator->name_en }}</h3>
            
            @foreach($hadiths as $hadith)
                <div class="hadith-card" style="background: white; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px; overflow: hidden; border: 1px solid #eee;">
                    <div class="hadith-header" style="background: #f8f9fa; padding: 15px 25px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
                        <div class="hadith-meta">
                            <span class="badge" style="background: var(--primary); color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">{{ $hadith->book_name }}</span>
                            @if($hadith->hadith_number)
                            <span style="color: #666; font-size: 0.9rem; margin-left: 10px;">Hadith {{ $hadith->hadith_number }}</span>
                            @endif
                        </div>
                        <div class="hadith-grade">
                            <span class="badge" style="background: #28a745; color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.85rem;"><i class="fas fa-check-circle mr-1"></i> {{ $hadith->grade ?? 'Authentic' }}</span>
                        </div>
                    </div>
                    <div class="hadith-body" style="padding: 25px;">
                        <div class="arabic-text" style="font-family: 'Amiri', serif; font-size: 1.8rem; line-height: 2.2; text-align: right; color: #222; margin-bottom: 25px;" dir="rtl">
                            {{ $hadith->arabic_text }}
                        </div>
                        <div class="translation-text" style="font-size: 1.1rem; line-height: 1.8; color: #444;">
                            <p><strong>Narrated {{ $narrator->name_en }}:</strong></p>
                            <p>{{ $hadith->english_translation }}</p>
                        </div>
                        @if($hadith->reference)
                        <div class="hadith-reference" style="margin-top: 20px; padding-top: 15px; border-top: 1px dashed #ddd; font-size: 0.9rem; color: #777;">
                            Reference: {{ $hadith->reference }}
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
            
            <div class="d-flex justify-content-center mt-4">
                {{ $hadiths->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
