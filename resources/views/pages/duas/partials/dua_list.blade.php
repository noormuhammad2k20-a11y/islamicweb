<style>
    .dua-list-container {
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
    }
    @media (min-width: 640px) {
        .dua-list-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (min-width: 1024px) {
        .dua-list-container {
            grid-template-columns: repeat(4, 1fr);
        }
    }
    .dua-list-item {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid #f0f0f0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .dua-list-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        border-color: #e2e8f0;
    }
    .dua-header-wrapper {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 15px;
        border-bottom: 1px solid #f5f5f5;
        padding-bottom: 12px;
    }
    .dua-number-circle {
        background: linear-gradient(135deg, rgba(var(--primary-rgb), 0.1), rgba(var(--primary-rgb), 0.2));
        color: var(--primary);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        font-weight: 700;
        flex-shrink: 0;
    }
    .dua-item-title {
        color: var(--primary-dark);
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
        line-height: 1.3;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    .dua-item-arabic {
        font-family: 'Amiri', 'Scheherazade New', serif;
        font-size: 1.6rem;
        color: #2d3748;
        text-align: right;
        line-height: 1.8;
        margin-bottom: 15px;
        direction: rtl;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
    .dua-item-translation {
        color: #4a5568;
        font-size: 0.95rem;
        line-height: 1.6;
        font-weight: 400;
        margin-top: auto;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px;">
    <h2 style="color: var(--primary-dark); margin: 0; font-size: 1.5rem; font-weight: 700; display: flex; align-items: center;">
        <i class="fas {{ $activeCategory->icon_class ?? 'fa-list-ul' }}" style="color: var(--primary); margin-right: 12px; font-size: 1.3rem;"></i>
        {{ $activeCategory->name_english }}
    </h2>
    <span style="background: rgba(var(--primary-rgb), 0.1); color: var(--primary); padding: 5px 15px; border-radius: 20px; font-size: 0.95rem; font-weight: 600;">
        {{ isset($duas) ? $duas->total() : $activeCategory->duas->count() }} Duas
    </span>
</div>

<div class="dua-list-container">
    @php
        $iterableDuas = isset($duas) ? $duas : $activeCategory->duas;
    @endphp
    @forelse($iterableDuas as $index => $dua)
        <a href="{{ route('duas.show', ['category' => $activeCategory->slug, 'seo_slug' => $dua->seo_slug ?? $dua->id]) }}" class="dua-list-item">
            <div class="dua-header-wrapper">
                <div class="dua-number-circle">
                    {{ (isset($duas) ? ($duas->currentPage() - 1) * $duas->perPage() : 0) + $index + 1 }}
                </div>
                <h3 class="dua-item-title">
                    {{ $dua->title_english ?? $dua->title_urdu }}
                </h3>
            </div>
            
            <div class="dua-item-arabic">
                {{ $dua->arabic_text }}
            </div>
            
            <div class="dua-item-translation">
                {{ $dua->translation ?? $dua->short_meaning }}
            </div>
        </a>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #fafafa; border-radius: 16px; border: 2px dashed #eaeaea;">
            <i class="fas fa-search" style="font-size: 3.5rem; color: #cbd5e1; margin-bottom: 20px;"></i>
            <p style="color: #64748b; font-size: 1.2rem; font-weight: 500;">No duas found in this category.</p>
        </div>
    @endforelse
</div>

@if(isset($duas) && $duas->hasPages())
<div style="margin-top: 40px; display: flex; justify-content: center;">
    {{ $duas->links() }}
</div>
@endif
