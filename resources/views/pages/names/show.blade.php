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
                    </div>

                    <div class="meaning-box">
                        <div class="meaning-label">Meaning in Urdu</div>
                        <p class="meaning-text" dir="rtl">{{ $name->translation_urdu }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $name->name_english }} - Islamic Name Meaning",
      "description": "Meaning of the Islamic name {{ $name->name_english }} ({{ $name->name_arabic }}) is {{ $name->translation_urdu }}."
    }
  ]
}
</script>
@endsection
