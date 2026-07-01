@extends('layouts.app')

@section('title', 'Hajj & Umrah Hub — Noor-e-Islam')
@section('meta_description', 'Complete guides, checklists, and Duas for performing Hajj and Umrah')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="Hajj & Umrah Hub" desc="Complete guides, checklists, and Duas for the sacred journeys" icon="fa-kaaba" />

        <div class="modules-grid">
            <x-module-card 
                title="Step-by-step Hajj Guide" 
                desc="Day-wise breakdown of Hajj rituals and important milestones." 
                icon="fa-kaaba" 
                url="{{ route('hajj_umrah.hajj_guide') }}" 
                badge="Guide"
            />
            <x-module-card 
                title="Step-by-step Umrah Guide" 
                desc="Complete textual and visual guide to performing the minor pilgrimage." 
                icon="fa-kaaba" 
                url="{{ route('hajj_umrah.umrah_guide') }}" 
                badge="Guide"
            />
            <x-module-card 
                title="Hajj Duas" 
                desc="Important supplications to recite during Hajj." 
                icon="fa-hands-praying" 
                url="{{ route('hajj_umrah.hajj_duas') }}" 
            />
            <x-module-card 
                title="Umrah Duas" 
                desc="Important supplications to recite during Umrah." 
                icon="fa-hands-praying" 
                url="{{ route('hajj_umrah.umrah_duas') }}" 
            />
            <x-module-card 
                title="Hajj Checklist" 
                desc="What to pack and how to prepare for your Hajj journey." 
                icon="fa-list-check" 
                url="{{ route('hajj_umrah.hajj_checklist') }}" 
            />
            <x-module-card 
                title="Umrah Checklist" 
                desc="What to pack and how to prepare for your Umrah journey." 
                icon="fa-list-check" 
                url="{{ route('hajj_umrah.umrah_checklist') }}" 
            />
            <x-module-card 
                title="Hajj & Umrah FAQs" 
                desc="Frequently asked questions about the pilgrimage." 
                icon="fa-circle-question" 
                url="{{ route('hajj_umrah.hajj_faqs') }}" 
            />
        </div>
    </div>
</section>
@endsection
