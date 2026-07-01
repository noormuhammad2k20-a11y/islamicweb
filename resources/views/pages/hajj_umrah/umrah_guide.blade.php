@extends('layouts.app')

@section('title', 'Step-by-step Umrah Guide — Noor-e-Islam')
@section('meta_description', 'Complete rituals for performing Umrah')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="Step-by-step Umrah Guide" desc="Complete rituals for performing Umrah" icon="fa-kaaba" />

        <div style="max-width: 800px; margin: 0 auto;">
            @if(isset($guides) && count($guides) > 0)
                @foreach($guides as $guide)
                    <div style="background: white; border-radius: 12px; padding: 30px; box-shadow: var(--shadow-sm); margin-bottom: 40px;">
                        <h2 style="color: var(--primary-dark); border-bottom: 2px solid var(--primary-light); padding-bottom: 15px; margin-bottom: 25px;"><i class="fas {{ $guide->icon ?? 'fa-kaaba' }}" style="color: var(--gold); margin-right: 10px;"></i>{{ $guide->title ?? $guide->name }}</h2>
                        <p style="color: var(--text-medium); margin-bottom: 30px;">{{ $guide->description ?? $guide->overview ?? $guide->content }}</p>

                        @php
                            $guideSteps = isset($steps) ? $steps->where('hajj_guide_id', $guide->id)->sortBy('step_number') : [];
                        @endphp

                        @if($guideSteps->count() > 0)
                            <div style="position: relative; padding-left: 20px; border-left: 2px solid var(--primary-light);">
                                <div style="margin-bottom: 30px;">
                                    @foreach($guideSteps as $step)
                                        <div style="background: var(--bg-color); border-radius: 8px; padding: 20px; margin-bottom: 15px; border-left: 4px solid var(--gold); position: relative;">
                                            <div style="position: absolute; left: -31px; top: 20px; width: 16px; height: 16px; background: var(--gold); border-radius: 50%; border: 4px solid white;"></div>
                                            <h4 style="margin-bottom: 10px; color: var(--primary-dark); display: flex; align-items: center; justify-content: space-between;">
                                                <span><span style="display: inline-block; width: 24px; height: 24px; background: rgba(184, 134, 59, 0.1); color: var(--gold); text-align: center; border-radius: 50%; font-size: 0.8rem; line-height: 24px; margin-right: 10px;">{{ $step->step_number }}</span>{{ $step->title }}</span>
                                                @if($step->location)
                                                    <span style="font-size: 0.8rem; font-weight: normal; color: #666; background: #eee; padding: 3px 8px; border-radius: 4px;"><i class="fas fa-map-marker-alt" style="color: var(--primary); margin-right: 4px;"></i>{{ $step->location }}</span>
                                                @endif
                                            </h4>
                                            <p style="color: var(--text-color); font-size: 0.95rem; line-height: 1.6; margin: 0;">{{ $step->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div style="text-align: center; padding: 30px; background: #f9f9f9; border-radius: 8px;">
                                <i class="fas fa-tools" style="font-size: 2rem; color: #ccc; margin-bottom: 10px;"></i>
                                <p style="color: #888;">Detailed steps are being updated.</p>
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