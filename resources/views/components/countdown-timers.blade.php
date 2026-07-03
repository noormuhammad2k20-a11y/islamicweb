{{-- Countdown Timers Widget --}}
{{-- Usage: <x-countdown-timers :countdowns="$countdowns" /> --}}

@props(['countdowns' => []])

<div class="countdown-grid" id="countdownTimers">
    @foreach($countdowns as $countdown)
    <div class="countdown-card">
        <div class="countdown-icon">
            <i class="fas {{ $countdown['icon'] }}"></i>
        </div>
        <div class="countdown-info">
            <h4>{{ $countdown['name'] }}</h4>
            <p class="countdown-hijri">{{ $countdown['hijri_date'] }}</p>
        </div>
        <div class="countdown-days">
            @if($countdown['is_today'] ?? false)
                <span class="days-number today-badge">Today!</span>
            @else
                <span class="days-number">{{ $countdown['days_away'] }}</span>
                <span class="days-label">days</span>
            @endif
        </div>
    </div>
    @endforeach
</div>

<style>
.countdown-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 16px;
}
.countdown-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--white);
    padding: 20px;
    border-radius: var(--radius-lg);
    border: 1px solid rgba(10, 58, 42, 0.06);
    box-shadow: var(--shadow-sm);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.countdown-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
}
.countdown-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--gold);
    font-size: 1.3rem;
    flex-shrink: 0;
}
.countdown-info {
    flex: 1;
    min-width: 0;
}
.countdown-info h4 {
    margin: 0 0 4px 0;
    font-size: 1rem;
    font-weight: 600;
    color: var(--primary-dark);
}
.countdown-hijri {
    margin: 0;
    font-size: 0.85rem;
    color: var(--text-light);
}
.countdown-days {
    text-align: center;
    flex-shrink: 0;
}
.days-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--primary);
    line-height: 1;
}
.days-number.today-badge {
    font-size: 1rem;
    background: var(--gold);
    color: var(--primary-dark);
    padding: 6px 14px;
    border-radius: var(--radius-xl);
    font-weight: 700;
}
.days-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-light);
    font-weight: 600;
}
@media (max-width: 768px) {
    .countdown-grid {
        grid-template-columns: 1fr 1fr;
    }
}
@media (max-width: 480px) {
    .countdown-grid {
        grid-template-columns: 1fr;
    }
}
</style>
