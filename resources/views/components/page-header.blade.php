@props(['title', 'desc', 'icon' => 'fa-star'])

<div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
    <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
        <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
        <span style="color: #ccc; margin: 0 10px;">/</span> 
        <span style="color: #666; font-weight: 600;">{{ $title }}</span>
    </div>
</div>

<div class="section-header">
    <div class="section-badge"><i class="fas {{ $icon }}"></i> Feature</div>
    <h1 class="section-title">{{ $title }}</h1>
    <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
    <p class="section-subtitle">{{ $desc }}</p>
</div>
