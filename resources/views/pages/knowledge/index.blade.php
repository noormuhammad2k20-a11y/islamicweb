@extends('layouts.app')

@section('title', 'Islamic Knowledge — Noor-e-Islam')
@section('meta_description', 'Explore the depths of Islamic teachings')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="Islamic Knowledge" desc="Explore the depths of Islamic teachings" icon="fa-brain" />

        <div class="modules-grid">
            @if(isset($categories) && count($categories) > 0)
                @foreach($categories as $category)
                    <x-module-card 
                        title="{{ $category->title ?? $category->name }}" 
                        desc="{{ Str::limit($category->description ?? $category->overview ?? $category->content, 80) }}" 
                        icon="{{ $category->icon ?? 'fa-brain' }}" 
                        url="#" 
                        badge="{{ $category->type ?? null }}"
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