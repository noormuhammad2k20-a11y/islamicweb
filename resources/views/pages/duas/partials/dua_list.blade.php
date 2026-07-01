<style>
    .dua-list-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        border: 1px solid #eaeaea;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        display: block;
        text-decoration: none;
        color: inherit;
    }
    .dua-list-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-color: #d0d0d0;
    }
    .dua-list-title {
        color: var(--primary-dark);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .dua-list-arabic {
        font-family: 'Amiri', serif;
        font-size: 1.5rem;
        color: var(--primary-dark);
        text-align: right;
        line-height: 1.5;
        margin-bottom: 12px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    .dua-list-translation {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
    <h2 style="color: var(--primary-dark); margin: 0; font-size: 1.25rem; font-weight: 600;">
        <i class="fas {{ $activeCategory->icon_class ?? 'fa-list' }}" style="color: var(--primary); margin-right: 8px;"></i>
        {{ $activeCategory->name_english }}
    </h2>
    <span style="color: #888; font-size: 0.85rem; font-weight: 500;">
        {{ $activeCategory->duas->count() }} Duas
    </span>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 15px;">
    @forelse($activeCategory->duas as $index => $dua)
        <a href="{{ route('duas.show', ['category' => $activeCategory->slug, 'seo_slug' => $dua->seo_slug ?? $dua->id]) }}" class="dua-list-card">
            <div class="dua-list-title">
                <span style="background: rgba(var(--primary-rgb), 0.1); color: var(--primary); width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">{{ $index + 1 }}</span>
                {{ $dua->title_english }}
            </div>
            <div class="dua-list-arabic" dir="rtl">
                {{ $dua->arabic_text }}
            </div>
            <p class="dua-list-translation">{{ $dua->translation }}</p>
        </a>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #fff; border-radius: 16px; border: 1px dashed #ddd;">
            <i class="fas fa-search" style="font-size: 3rem; color: #ccc; margin-bottom: 15px;"></i>
            <p style="color: #888;">No duas found in this category.</p>
        </div>
    @endforelse
</div>
