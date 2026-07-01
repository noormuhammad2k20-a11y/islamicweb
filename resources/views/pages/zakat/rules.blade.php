@extends('layouts.app')

@section('title', 'Zakat Rules — Noor-e-Islam')
@section('meta_description', 'Fiqh-based explanations of Zakat calculation')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="Zakat Rules" desc="Fiqh-based explanations of Zakat calculation" icon="fa-book-open" />

        <div class="modules-grid">
            @if(isset($items) && count($items) > 0)
                @foreach($items as $item)
                    <x-module-card 
                        title="{{ $item->title ?? $item->name }}" 
                        desc="{{ Str::limit($item->description ?? $item->overview ?? $item->content, 80) }}" 
                        icon="{{ $item->icon ?? 'fa-book-open' }}" 
                        url="#" 
                        badge="{{ $item->type ?? null }}"
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