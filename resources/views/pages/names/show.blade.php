@extends('layouts.app')

@section('title', $name->name_english . ' - Islamic Name Meaning')

@section('content')
<style>
    .name-hero-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.03);
        padding: 60px 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .name-hero-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 6px;
        background: linear-gradient(90deg, var(--primary), var(--gold), var(--primary-light));
    }
    .name-hero-bg {
        position: absolute;
        top: -50px; right: -50px;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(var(--gold-rgb), 0.05) 0%, transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }
    .name-hero-content {
        position: relative;
        z-index: 1;
    }
    .name-ar-large {
        font-family: 'Amiri', serif;
        font-size: 7rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.1;
        margin-bottom: 10px;
        text-shadow: 0 10px 30px rgba(var(--primary-rgb), 0.1);
    }
    .name-en-large {
        font-size: 3.5rem;
        color: var(--primary);
        font-weight: 800;
        margin-bottom: 25px;
        letter-spacing: -1px;
    }
    .tag-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 50px;
        flex-wrap: wrap;
    }
    .tag-large {
        padding: 10px 25px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid transparent;
    }
    .tag-large.male { background: rgba(52, 152, 219, 0.08); color: #2980b9; border-color: rgba(52, 152, 219, 0.2); }
    .tag-large.female { background: rgba(233, 30, 99, 0.08); color: #c2185b; border-color: rgba(233, 30, 99, 0.2); }
    .tag-large.origin { background: rgba(var(--gold-rgb), 0.08); color: #b89730; border-color: rgba(var(--gold-rgb), 0.2); }
    
    .meaning-box {
        max-width: 700px;
        margin: 0 auto;
        background: linear-gradient(135deg, #fafafa, #ffffff);
        border: 1px solid #eee;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        position: relative;
    }
    .meaning-box::before {
        content: '\201C';
        font-family: serif;
        font-size: 8rem;
        color: rgba(var(--primary-rgb), 0.05);
        position: absolute;
        top: -30px; left: 20px;
        line-height: 1;
    }
    .meaning-label {
        color: #888;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .meaning-text {
        font-size: 2.2rem;
        color: var(--primary-dark);
        font-weight: bold;
        margin: 0;
        font-family: 'Amiri', serif;
        line-height: 1.4;
    }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 30px;">
            <a href="{{ route('names.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-arrow-left"></i> Back to Directory</a>
        </div>

        <div style="max-width: 900px; margin: 0 auto;">
            <!-- OUTPUT CARD (Detail View) -->
            <div class="name-hero-card">
                <div class="name-hero-bg"></div>
                <div class="name-hero-content">
                    <div class="name-ar-large" dir="rtl">{{ $name->name_arabic }}</div>
                    <h1 class="name-en-large">{{ $name->name_english }}</h1>
                    
                    <div class="tag-container">
                        <span class="tag-large {{ $name->gender }}">
                            <i class="fas {{ $name->gender == 'male' ? 'fa-male' : 'fa-female' }}"></i> {{ ucfirst($name->gender) }}
                        </span>
                        @if($name->origin)
                            <span class="tag-large origin">
                                <i class="fas fa-globe"></i> {{ ucfirst($name->origin) }} Origin
                            </span>
                        @endif
                        @if($name->is_quranic)
                            <span class="tag-large" style="background: rgba(46, 204, 113, 0.08); color: #27ae60; border-color: rgba(46, 204, 113, 0.2);">
                                <i class="fas fa-quran"></i> Quranic Name
                            </span>
                        @endif
                        @if($name->is_sahabi || $name->is_sahabiyah)
                            <span class="tag-large" style="background: rgba(155, 89, 182, 0.08); color: #8e44ad; border-color: rgba(155, 89, 182, 0.2);">
                                <i class="fas fa-users"></i> Sahabah / Companion
                            </span>
                        @endif
                        @if($name->is_prophet_name)
                            <span class="tag-large" style="background: rgba(243, 156, 18, 0.08); color: #f39c12; border-color: rgba(243, 156, 18, 0.2);">
                                <i class="fas fa-star"></i> Prophet Name
                            </span>
                        @endif
                    </div>

                    <div class="meaning-box">
                        <div class="meaning-label">Meaning in Urdu</div>
                        <p class="meaning-text" dir="rtl">{{ $name->translation_urdu }}</p>
                    </div>

                    @if($name->meaning_english)
                    <div class="meaning-box" style="margin-top: 30px;">
                        <div class="meaning-label">Meaning in English</div>
                        <p class="meaning-text" style="font-family: 'Playfair Display', serif;">{{ $name->meaning_english }}</p>
                    </div>
                    @endif

                    @if($name->quranic_reference)
                    <div style="background: rgba(46, 204, 113, 0.05); border-left: 4px solid #27ae60; padding: 25px; text-align: left; margin-top: 30px; border-radius: 0 12px 12px 0;">
                        <h4 style="color: #27ae60; margin-bottom: 10px; font-size: 1.2rem;"><i class="fas fa-book-open"></i> Quranic Reference</h4>
                        <p style="color: #444; line-height: 1.6; font-size: 1.05rem;">{{ $name->quranic_reference }}</p>
                    </div>
                    @endif

                    @if($name->biography)
                    <div style="background: #fdfdfd; border: 1px solid #eee; padding: 30px; text-align: left; margin-top: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <h4 style="color: var(--primary-dark); margin-bottom: 15px; font-size: 1.3rem;"><i class="fas fa-info-circle"></i> Historical Significance</h4>
                        <p style="color: #555; line-height: 1.7; font-size: 1.05rem;">{{ $name->biography }}</p>
                    </div>
                    @endif

                    @if($name->numerology_value)
                    <div style="background: rgba(var(--gold-rgb), 0.05); border: 1px solid rgba(var(--gold-rgb), 0.2); padding: 20px; text-align: center; margin-top: 30px; border-radius: 12px; display: inline-block;">
                        <span style="color: #b89730; font-weight: 600; font-size: 1.1rem;">Numerology (Abjad) Value:</span>
                        <span style="color: var(--primary-dark); font-size: 1.8rem; font-weight: bold; margin-left: 10px;">{{ $name->numerology_value }}</span>
                    </div>
                    @endif

                    @if($name->related_names)
                    @php
                        $related = is_array($name->related_names) ? $name->related_names : json_decode($name->related_names, true);
                    @endphp
                    @if(is_array($related) && count($related) > 0)
                    <div style="margin-top: 50px; text-align: left;">
                        <h4 style="color: var(--primary-dark); font-size: 1.3rem; margin-bottom: 15px;">Related Names:</h4>
                        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                            @foreach($related as $rel)
                                <span style="background: #eee; padding: 8px 16px; border-radius: 50px; color: #555; font-size: 0.95rem;">{{ $rel }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $name->name_english }} - Islamic Name Meaning",
      "description": "Meaning of the Islamic name {{ $name->name_english }} ({{ $name->name_arabic }}) is {{ $name->translation_urdu }}."
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ route('home') }}"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "Islamic Names",
        "item": "{{ route('names.index') }}"
      },{
        "@type": "ListItem",
        "position": 3,
        "name": "{{ $name->name_english }}"
      }]
    }
  ]
}
</script>
@endsection
