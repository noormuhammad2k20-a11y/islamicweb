@extends('layouts.app')

@section('seo')
<title>Step-by-step Hajj Guide — Complete Rituals | IslamicWeb</title>
<meta name="description" content="Day-wise breakdown of Hajj rituals, from Ihram to Tawaf al-Wida.">
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
</style>

<section class="page-hero">
    <h1 class="page-title">Step-by-step Hajj Guide</h1>
    <p class="page-subtitle">A comprehensive, day-by-day walkthrough of Hajj rituals, ensuring you perform every step correctly.</p>
</section>

<section class="section" style="padding-bottom: 60px;">
    <div class="section-inner">
        <div style="max-width: 800px; margin: 0 auto;">
            @if(isset($guides) && count($guides) > 0)
                @foreach($guides as $guide)
                    <div style="background: white; border-radius: 20px; padding: 40px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); margin-bottom: 40px;">
                        <h2 style="color: var(--primary); font-family: 'Playfair Display', serif; border-bottom: 2px solid var(--gold); padding-bottom: 15px; margin-bottom: 25px;"><i class="fas {{ $guide->icon ?? 'fa-kaaba' }}" style="color: var(--gold); margin-right: 10px;"></i>{{ $guide->title }}</h2>
                        <p style="color: #666; font-size: 1.1rem; margin-bottom: 30px;">{{ $guide->description }}</p>

                        @php
                            $guideSteps = isset($guide->steps) ? $guide->steps : [];
                        @endphp

                        @if(count($guideSteps) > 0)
                            <div style="position: relative; padding-left: 20px; border-left: 2px solid rgba(212,175,55,0.3);">
                                <div style="margin-bottom: 30px;">
                                    @foreach($guideSteps as $step)
                                        <div style="background: #faf9f6; border-radius: 12px; padding: 25px; margin-bottom: 20px; border-left: 4px solid var(--gold); position: relative; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                                            <div style="position: absolute; left: -31px; top: 25px; width: 16px; height: 16px; background: var(--gold); border-radius: 50%; border: 4px solid white;"></div>
                                            <h4 style="margin-bottom: 12px; color: var(--primary-dark); display: flex; align-items: center; justify-content: space-between; font-weight: bold; font-size: 1.1rem;">
                                                <span><span style="display: inline-block; width: 28px; height: 28px; background: rgba(212,175,55,0.2); color: var(--primary-dark); text-align: center; border-radius: 50%; font-size: 0.9rem; line-height: 28px; margin-right: 12px;">{{ $step->step_number }}</span>{{ $step->title }}</span>
                                                @if(isset($step->location))
                                                    <span style="font-size: 0.85rem; font-weight: normal; color: var(--primary); background: rgba(10,58,42,0.05); padding: 5px 12px; border-radius: 20px;"><i class="fas fa-map-marker-alt" style="color: var(--gold); margin-right: 5px;"></i>{{ $step->location }}</span>
                                                @endif
                                            </h4>
                                            <p style="color: #555; font-size: 1rem; line-height: 1.6; margin: 0; padding-left: 40px;">{{ $step->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <div style="text-align: center; padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm);">
                    <i class="fas fa-tools" style="font-size: 3rem; color: var(--gold-light); margin-bottom: 15px;"></i>
                    <h3 style="color: var(--primary-dark);">Under Construction</h3>
                    <p style="color: var(--text-medium);">The dynamic content for this section is currently being updated. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
