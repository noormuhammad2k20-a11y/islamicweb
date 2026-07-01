@props(['title', 'desc', 'icon' => 'fa-star', 'url' => '#', 'badge' => null])

<a href="{{ $url }}" class="module-card">
    @if($badge)
        <span class="module-card-badge">{{ $badge }}</span>
    @endif
    <div class="module-card-icon">
        <i class="fas {{ $icon }}"></i>
    </div>
    <div class="module-card-content">
        <h3>{{ $title }}</h3>
        <p>{{ $desc }}</p>
    </div>
</a>

<style>
.module-card {
    display: flex;
    flex-direction: column;
    background: var(--white);
    border-radius: var(--radius-md);
    padding: 25px;
    text-decoration: none;
    color: var(--text-dark);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(17, 70, 121, 0.05);
    transition: var(--tr);
    position: relative;
    overflow: hidden;
    height: 100%;
}

.module-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: rgba(17, 70, 121, 0.2);
}

.module-card-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary-subtle);
    color: var(--primary);
    font-size: 0.7rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: var(--radius-xl);
}

.module-card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, rgba(17, 70, 121, 0.05), rgba(17, 70, 121, 0.1));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    color: var(--primary);
    font-size: 1.5rem;
    transition: var(--tr);
}

.module-card:hover .module-card-icon {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    box-shadow: 0 4px 15px var(--primary-glow);
}

.module-card-content h3 {
    font-size: 1.15rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: var(--primary-dark);
}

.module-card-content p {
    font-size: 0.85rem;
    color: var(--text-medium);
    line-height: 1.6;
    margin: 0;
}

/* Add grid container styles for parent containers */
.modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 30px;
}
</style>
