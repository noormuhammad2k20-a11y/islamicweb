@extends('layouts.app')

@section('title', 'Hajj & Umrah FAQs — Noor-e-Islam')
@section('meta_description', 'Common mistakes and travel preparation')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Hajj & Umrah FAQs</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Feature</div>
            <h1 class="section-title">Hajj & Umrah FAQs</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Common mistakes and travel preparation</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: 1fr; gap: 20px;">
            
            <!-- FAQ 1 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: var(--primary-light); color: var(--primary-dark); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; flex-shrink: 0;">Q</div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.15rem; margin: 0 0 10px 0; line-height: 1.4;">What is the difference between Hajj and Umrah?</h3>
                        <p style="color: #555; font-size: 0.95rem; line-height: 1.7; margin: 0;">Hajj is a mandatory obligation (Fard) for those who are physically and financially able, performed only during specific days of Dhul-Hijjah. Umrah is a highly recommended (Sunnah) pilgrimage that can be performed at any time of the year and involves fewer rituals.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: var(--primary-light); color: var(--primary-dark); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; flex-shrink: 0;">Q</div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.15rem; margin: 0 0 10px 0; line-height: 1.4;">Who is exempt from performing Hajj?</h3>
                        <p style="color: #555; font-size: 0.95rem; line-height: 1.7; margin: 0;">Anyone who lacks the physical ability due to illness, or lacks the financial means to travel and provide for their family back home, is exempt. For women, historically, traveling without a Mahram was an exemption, though recent regulatory updates have provided alternative group travel provisions.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: var(--primary-light); color: var(--primary-dark); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; flex-shrink: 0;">Q</div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.15rem; margin: 0 0 10px 0; line-height: 1.4;">What breaks the state of Ihram?</h3>
                        <p style="color: #555; font-size: 0.95rem; line-height: 1.7; margin: 0;">Engaging in marital relations, cutting hair or nails, wearing scented oils or perfumes, men covering their heads or wearing stitched clothes, and hunting or cutting trees in the Haram boundaries. Committing these acts may require expiation (Fidyah).</p>
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: flex-start; gap: 15px;">
                    <div style="background: var(--primary-light); color: var(--primary-dark); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; flex-shrink: 0;">Q</div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.15rem; margin: 0 0 10px 0; line-height: 1.4;">Is it necessary to visit Madinah during Hajj?</h3>
                        <p style="color: #555; font-size: 0.95rem; line-height: 1.7; margin: 0;">Visiting Madinah and the Prophet's Mosque (Masjid an-Nabawi) is not a mandatory part of the Hajj or Umrah rituals. However, it is highly recommended and holds immense spiritual reward, so most pilgrims include it in their journey.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection