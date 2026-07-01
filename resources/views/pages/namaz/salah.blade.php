@extends('layouts.app')

@section('title', 'How to Pray Salah — Noor-e-Islam')
@section('meta_description', 'Step-by-step visual prayer guide')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="How to Pray Salah" desc="Step-by-step visual prayer guide" icon="fa-child" />

        <div class="modules-grid">
            @if(isset($guides) && count($guides) > 0)
                @foreach($guides as $guide)
                    <x-module-card 
                        title="{{ $guide->title ?? $guide->name }}" 
                        desc="{{ Str::limit($guide->description ?? $guide->overview ?? $guide->content, 80) }}" 
                        icon="{{ $guide->icon ?? 'fa-child' }}" 
                        url="#" 
                        badge="{{ $guide->type ?? null }}"
                    />
                @endforeach
            @else
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm);">
                    <i class="fas fa-tools" style="font-size: 3rem; color: var(--gold-light); margin-bottom: 15px;"></i>
                    <h3 style="color: var(--primary-dark);">Under Construction</h3>
                    <p style="color: var(--text-medium);">The dynamic content for this section is currently being updated. Please check back later.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection