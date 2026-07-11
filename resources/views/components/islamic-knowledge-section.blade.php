@props(['title', 'type' => 'info', 'reference' => null])

@php
    $bgColors = [
        'info' => 'bg-white border-[rgba(26,54,93,0.1)]',
        'hadith' => 'bg-[#F8FAFC] border-[rgba(26,54,93,0.05)]',
        'quran' => 'bg-gradient-to-br from-[#ffffff] to-[#f8fafc] border-[rgba(212,175,55,0.2)]',
        'calc' => 'bg-gray-50 border-gray-200'
    ];
    $icons = [
        'info' => '<svg class="text-[#1A365D]" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'hadith' => '<svg class="text-[#1A365D]" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
        'quran' => '<svg class="text-[#D4AF37]" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
        'calc' => '<svg class="text-gray-500" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>'
    ];
@endphp

<div class="{{ $bgColors[$type] ?? $bgColors['info'] }} border rounded-2xl p-6 md:p-8 mb-8 shadow-sm transition-all hover:shadow-lg relative overflow-hidden group">
    @if($type === 'quran')
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-[var(--gold)] opacity-5 rounded-full blur-3xl group-hover:opacity-10 transition-opacity"></div>
    @endif
    <div class="flex items-center gap-4 mb-5 border-b border-[rgba(26,54,93,0.1)] pb-4 relative z-10">
        <div class="p-2.5 bg-white rounded-xl shadow-[0_2px_10px_rgba(26,54,93,0.08)] flex-shrink-0 flex items-center justify-center w-12 h-12">
            {!! $icons[$type] ?? $icons['info'] !!}
        </div>
        <h3 class="font-playfair text-2xl font-bold text-[#1A365D] m-0">{{ $title }}</h3>
    </div>
    
    <div class="prose max-w-none text-gray-700 leading-relaxed text-lg relative z-10">
        {{ $slot }}
    </div>

    @if($reference)
    <div class="mt-6 pt-4 border-t border-[rgba(26,54,93,0.1)] flex items-center gap-2 text-sm text-[#1A365D] font-semibold relative z-10">
        <svg class="text-[#D4AF37] flex-shrink-0" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
        {{ $reference }}
    </div>
    @endif
</div>
