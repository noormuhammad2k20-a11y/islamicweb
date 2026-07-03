{{-- Author Box Component --}}
@props(['name' => 'Editorial Team', 'role' => 'Islamic Content Reviewer', 'avatar' => null])

<div class="author-box" itemscope itemtype="https://schema.org/Person">
    <div class="author-avatar">
        @if($avatar)
            <img src="{{ asset($avatar) }}" alt="{{ $name }}" itemprop="image">
        @else
            <div class="avatar-placeholder">
                <i class="fas fa-user-edit"></i>
            </div>
        @endif
    </div>
    <div class="author-info">
        <h4 itemprop="name">{{ $name }}</h4>
        <span class="author-role" itemprop="jobTitle">{{ $role }}</span>
        <p class="author-bio" itemprop="description">
            Content verified by authentic Islamic scholars and astronomical data sources to ensure maximum accuracy for Hijri dates and prayer times.
        </p>
    </div>
</div>

<style>
.author-box {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 25px;
    background: var(--white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid rgba(10, 58, 42, 0.05);
    margin: 30px 0;
}
.author-avatar {
    flex-shrink: 0;
}
.author-avatar img,
.avatar-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--gold);
}
.avatar-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(10, 58, 42, 0.05);
    color: var(--primary);
    font-size: 2rem;
}
.author-info h4 {
    margin: 0 0 5px 0;
    font-size: 1.2rem;
    color: var(--primary-dark);
}
.author-role {
    display: inline-block;
    font-size: 0.85rem;
    color: var(--gold);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
}
.author-bio {
    margin: 0;
    color: var(--text);
    font-size: 0.95rem;
    line-height: 1.5;
}
@media (max-width: 576px) {
    .author-box {
        flex-direction: column;
        text-align: center;
    }
}
</style>
