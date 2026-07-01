@extends('layouts.app')

@section('title', $name->transliteration . ' (' . $name->arabic . ') - 99 Names of Allah')
@section('meta_description', 'Learn the meaning, benefits, and explanation of ' . $name->transliteration . ' (' . $name->arabic . '), one of the 99 Names of Allah.')

@section('content')
<style>
@media print {
    body * { visibility: hidden; }
    .print-area, .print-area * { visibility: visible; }
    .print-area { position: absolute; left: 0; top: 0; width: 100%; padding: 0 !important; }
    .no-print { display: none !important; }
}
</style>

<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "DefinedTerm",
  "name": "{{ $name->transliteration }}",
  "alternateName": ["{{ $name->arabic }}"],
  "description": "{{ $name->meaning_english }}",
  "inDefinedTermSet": {
    "@@type": "DefinedTermSet",
    "name": "Asma' al-Husna (99 Names of Allah)",
    "url": "{{ route('names_allah.index') }}"
  },
  "about": { "@@type": "Deity", "name": "Allah" },
  "url": "{{ url()->current() }}"
}
</script>

<div class="page-header print-area" style="background: var(--primary); color: white; padding: 60px 0; text-align: center;">
    <div class="container">
        <nav aria-label="Breadcrumb" class="no-print" style="margin-bottom: 20px;">
            <ol typeof="BreadcrumbList" vocab="https://schema.org/" style="list-style: none; padding: 0; display: inline-flex; gap: 10px; font-size: 0.9rem; opacity: 0.8;">
                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{ route('names_allah.index') }}" style="color: white; text-decoration: none;"><span property="name">99 Names of Allah</span></a>
                    <meta property="position" content="1"/>
                </li>
                <li>></li>
                <li property="itemListElement" typeof="ListItem">
                    <span property="name">{{ $name->transliteration }}</span>
                    <meta property="position" content="2"/>
                </li>
            </ol>
        </nav>

        <div style="font-size: 1.2rem; margin-bottom: 15px; opacity: 0.8;">Name #{{ $name->number }}</div>
        <h1 lang="ar" dir="rtl" style="color: var(--gold); font-size: 4.5rem; font-family: 'Amiri', serif; margin-bottom: 10px; line-height: 1.2;">
            {{ $name->arabic }}
        </h1>
        <h2 style="color: white; margin-bottom: 10px;">{{ $name->transliteration }}</h2>
        <p style="opacity: 0.9; margin-bottom: 20px; font-size: 1.2rem;">{{ $name->meaning_english }}</p>
        
        <div class="no-print" style="display: flex; gap: 15px; justify-content: center;">
            <button onclick="window.print()" class="btn-outline-primary" style="background: white; border-color: white; color: var(--primary); border-radius: 20px; padding: 5px 15px;">
                <i class="fas fa-print"></i> Print
            </button>
            <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Link copied!');" style="background: rgba(255,255,255,0.2); border: none; color: white; border-radius: 20px; padding: 5px 15px; cursor: pointer;">
                <i class="fas fa-share-alt"></i> Share
            </button>
        </div>
    </div>
</div>

<div class="container print-area" style="padding: 60px 20px;">
    <div class="row" style="display: flex; flex-wrap: wrap; gap: 30px;">
        <div class="col-md-8" style="flex: 2; min-width: 300px;">
            
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 40px; margin-bottom: 30px;" class="no-print">
                <h3 style="color: var(--primary); margin-bottom: 15px; font-size: 1.5rem;"><i class="fas fa-volume-up" style="color: var(--gold); margin-right: 10px;"></i> Pronunciation</h3>
                <div style="display: flex; align-items: center; gap: 15px;">
                    <button onclick="playPronunciation()" title="Play Pronunciation" style="background: var(--primary); color: white; border: none; border-radius: 50%; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 15px rgba(17,70,121,0.2); font-size: 1.2rem; transition: transform 0.2s;">
                        <i class="fas fa-play" style="margin-left: 4px;"></i>
                    </button>
                    <span style="color: var(--text-dark); font-size: 1.1rem; font-weight: 500;">Listen to Arabic Pronunciation</span>
                </div>

                <script>
                function playPronunciation() {
                    if ('speechSynthesis' in window) {
                        window.speechSynthesis.cancel(); // Stop any ongoing speech
                        let utterance = new SpeechSynthesisUtterance("{{ $name->arabic }}");
                        utterance.lang = 'ar-SA'; // Arabic Saudi Arabia
                        utterance.rate = 0.7; // Slightly slower for better clarity
                        window.speechSynthesis.speak(utterance);
                    } else {
                        alert("Sorry, your browser doesn't support text-to-speech!");
                    }
                }
                </script>
            </div>

            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 40px; margin-bottom: 30px;">
                <h3 style="color: var(--primary); margin-bottom: 20px; font-size: 1.8rem; border-bottom: 2px solid var(--secondary-light); padding-bottom: 10px;">Meaning in Urdu</h3>
                <p lang="ur" dir="rtl" style="font-size: 1.8rem; font-family: 'Jameel Noori Nastaleeq', 'Noto Naskh Arabic', serif; color: var(--text-dark); line-height: 2;">
                    {{ $name->meaning_urdu }}
                </p>
            </div>

            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); padding: 40px; margin-bottom: 30px;">
                <h3 style="color: var(--primary); margin-bottom: 20px; font-size: 1.8rem; border-bottom: 2px solid var(--secondary-light); padding-bottom: 10px;">Explanation & Virtues</h3>
                <div style="font-size: 1.15rem; color: var(--text-dark); line-height: 1.8;">
                    {!! nl2br(e($name->benefits)) !!}
                </div>
            </div>
            
            <a href="{{ route('names_allah.index') }}" class="btn-outline-primary no-print" style="display: inline-flex; align-items: center; gap: 10px;">
                <i class="fas fa-arrow-left"></i> Back to All Names
            </a>
        </div>

        <div class="col-md-4" style="flex: 1; min-width: 300px;">
            <div style="background: var(--secondary-light); border-radius: 12px; padding: 30px; margin-bottom: 30px;">
                <h4 style="color: var(--primary); margin-bottom: 15px;">Quick Details</h4>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 15px; border-bottom: 1px solid rgba(17,70,121,0.1); padding-bottom: 10px;">
                        <span style="font-weight: 600; color: var(--text-dark); display: block;">Arabic:</span>
                        <span lang="ar" dir="rtl" style="color: var(--gold); font-size: 1.8rem; font-family: 'Amiri', serif;">{{ $name->arabic }}</span>
                    </li>
                    <li style="margin-bottom: 15px; border-bottom: 1px solid rgba(17,70,121,0.1); padding-bottom: 10px;">
                        <span style="font-weight: 600; color: var(--text-dark); display: block;">English:</span>
                        <span style="color: var(--text-light);">{{ $name->meaning_english }}</span>
                    </li>
                    <li style="margin-bottom: 15px;">
                        <span style="font-weight: 600; color: var(--text-dark); display: block;">Urdu:</span>
                        <span lang="ur" dir="rtl" style="color: var(--text-light); font-family: 'Jameel Noori Nastaleeq', 'Noto Naskh Arabic', serif; font-size: 1.4rem;">{{ $name->meaning_urdu }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection