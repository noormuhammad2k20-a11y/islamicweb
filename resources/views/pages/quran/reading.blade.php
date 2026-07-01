@extends('layouts.app')

@section('title', 'Quran Reader — Noor-e-Islam')
@section('meta_description', 'Full Quran reader (surah-wise + juz-wise)')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Quran Reader</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-open"></i> Feature</div>
            <h1 class="section-title">Quran Reader</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Full Quran reader (surah-wise + juz-wise)</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary); background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                
                <!-- CONTENT MOCKUP AREA -->
<div style="display: flex; justify-content: space-between; align-items: center; background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #eee;">
    <div>
        <h3 style="margin: 0; color: var(--primary);">Surah Al-Fatiha</h3>
        <span style="font-size: 0.9rem; color: #777;">The Opener (7 Verses)</span>
    </div>
    <div style="display: flex; gap: 15px; align-items: center;">
        <label style="display: flex; align-items: center; cursor: pointer; font-weight: bold; color: #555;">
            <input type="checkbox" id="translationToggle" checked onchange="toggleTranslation()" style="margin-right: 10px; width: 20px; height: 20px;">
            Show Translation
        </label>
        <button class="btn-primary" style="padding: 8px 15px; font-size: 0.9rem;"><i class="fas fa-play"></i> Play Audio</button>
    </div>
</div>

<div class="quran-verses">
    <!-- Bismillah -->
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="font-family: 'Amiri', serif; font-size: 2.5rem; color: var(--primary-dark);">بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ</h2>
    </div>

    <!-- Verse 1 -->
    <div style="padding: 30px; border-bottom: 1px solid #eee; text-align: right;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="font-size: 0.9rem; color: #999; background: #eee; padding: 5px 15px; border-radius: 20px;">1:1</div>
            <div style="font-family: 'Amiri', serif; font-size: 2.5rem; line-height: 1.8; color: #333; margin-left: 20px;">
                ٱلْحَمْدُ لِلَّهِ رَبِّ ٱلْعَٰلَمِينَ
            </div>
        </div>
        <div class="translation-text" style="text-align: left; margin-top: 20px; font-size: 1.2rem; color: #666; font-style: italic;">
            [All] praise is [due] to Allah, Lord of the worlds -
        </div>
    </div>
    
    <!-- Verse 2 -->
    <div style="padding: 30px; border-bottom: 1px solid #eee; text-align: right;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="font-size: 0.9rem; color: #999; background: #eee; padding: 5px 15px; border-radius: 20px;">1:2</div>
            <div style="font-family: 'Amiri', serif; font-size: 2.5rem; line-height: 1.8; color: #333; margin-left: 20px;">
                ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
            </div>
        </div>
        <div class="translation-text" style="text-align: left; margin-top: 20px; font-size: 1.2rem; color: #666; font-style: italic;">
            The Entirely Merciful, the Especially Merciful,
        </div>
    </div>
</div>

<script>
function toggleTranslation() {
    const isChecked = document.getElementById('translationToggle').checked;
    const translations = document.querySelectorAll('.translation-text');
    translations.forEach(el => {
        el.style.display = isChecked ? 'block' : 'none';
    });
}
</script>
            </div>
        </div>
    </div>
                
            </div>
        </div>
    </div>
</section>
@endsection