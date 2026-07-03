{{-- Moon Phase Widget --}}
{{-- Usage: <x-moon-phase-widget :moonPhase="$moonPhase" /> --}}

@props(['moonPhase' => []])

<div class="moon-widget">
    <div class="moon-visual">
        <div class="moon-glow"></div>
        <div class="moon-icon-display">
            <i class="fas {{ $moonPhase['icon'] ?? 'fa-moon' }}"></i>
        </div>
        @if(isset($moonPhase['illumination']))
        <div class="moon-illumination-ring">
            <svg viewBox="0 0 36 36" class="moon-progress">
                <path class="moon-progress-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
                <path class="moon-progress-fill" stroke-dasharray="{{ $moonPhase['illumination'] }}, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"/>
            </svg>
        </div>
        @endif
    </div>
    <div class="moon-details">
        <h4 class="moon-phase-name">{{ $moonPhase['name'] ?? 'Unknown' }}</h4>
        @if(isset($moonPhase['ar']))
        <p class="moon-phase-ar" style="font-family: 'Amiri', serif;">{{ $moonPhase['ar'] }}</p>
        @endif
        <p class="moon-phase-desc">{{ $moonPhase['description'] ?? '' }}</p>
        <div class="moon-stats">
            @if(isset($moonPhase['illumination']))
            <div class="moon-stat">
                <span class="stat-value">{{ $moonPhase['illumination'] }}%</span>
                <span class="stat-label">Illumination</span>
            </div>
            @endif
            @if(isset($moonPhase['days_to_new_moon']))
            <div class="moon-stat">
                <span class="stat-value">{{ $moonPhase['days_to_new_moon'] }}</span>
                <span class="stat-label">Days to New Moon</span>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.moon-widget {
    text-align: center;
    position: relative;
    z-index: 1;
}
.moon-visual {
    position: relative;
    display: inline-block;
    margin-bottom: 20px;
}
.moon-glow {
    position: absolute;
    inset: -20px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(212, 175, 55, 0.2) 0%, transparent 70%);
    animation: pulseGlow 3s ease-in-out infinite;
}
@keyframes pulseGlow {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.1); opacity: 1; }
}
.moon-icon-display {
    font-size: 4.5rem;
    color: var(--gold);
    filter: drop-shadow(0 0 25px rgba(212, 175, 55, 0.5));
    animation: floatMoon 4s ease-in-out infinite;
    position: relative;
    z-index: 2;
}
@keyframes floatMoon {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.moon-illumination-ring {
    position: absolute;
    inset: -15px;
    z-index: 1;
}
.moon-progress {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}
.moon-progress-bg {
    fill: none;
    stroke: rgba(255,255,255,0.1);
    stroke-width: 2;
}
.moon-progress-fill {
    fill: none;
    stroke: var(--gold);
    stroke-width: 2;
    stroke-linecap: round;
    transition: stroke-dasharray 1s ease;
}
.moon-phase-name {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 700;
    margin: 0 0 5px 0;
    color: var(--white);
}
.moon-phase-ar {
    font-size: 1.2rem;
    color: var(--gold-light);
    margin: 0 0 10px 0;
}
.moon-phase-desc {
    color: rgba(255,255,255,0.8);
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 20px;
}
.moon-stats {
    display: flex;
    justify-content: center;
    gap: 30px;
}
.moon-stat {
    text-align: center;
}
.stat-value {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--gold);
}
.stat-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255,255,255,0.6);
}
</style>
