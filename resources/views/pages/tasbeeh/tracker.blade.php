@extends('layouts.app')

@section('title', 'Digital Tasbeeh Tracker')

@section('content')
<style>
    .tasbeeh-widget {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: 1px solid #eaeaea;
        padding: 30px;
        max-width: 500px;
        margin: 0 auto;
    }
    .tasbeeh-header {
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }
    .tasbeeh-header h3 {
        color: var(--primary-dark);
        font-size: 1.3rem;
        margin: 0;
    }
    .tasbeeh-display {
        text-align: center;
        margin: 20px 0;
    }
    .tasbeeh-count {
        font-size: 4.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Poppins', sans-serif;
        line-height: 1;
    }
    .btn-tap {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: var(--primary);
        color: white;
        font-size: 1.6rem;
        font-weight: 600;
        border: none;
        box-shadow: 0 4px 10px rgba(5,67,62,0.2);
        cursor: pointer;
        transition: transform 0.1s;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px auto;
        user-select: none;
    }
    .btn-tap:active {
        transform: scale(0.95);
        background: var(--primary-dark);
    }
    .tasbeeh-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fcfcfc;
        padding: 15px 20px;
        border-radius: 12px;
        border: 1px solid #f0f0f0;
    }
    .target-group label {
        display: block;
        font-size: 0.85rem;
        color: #777;
        margin-bottom: 5px;
        font-weight: 500;
    }
    .settings-select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        color: #333;
        background: #fff;
        cursor: pointer;
        min-width: 120px;
    }
    .settings-select:focus {
        border-color: var(--primary);
        outline: none;
    }
    .btn-reset {
        background: #fff;
        color: #e74c3c;
        border: 1px solid #f5b7b1;
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-reset:hover {
        background: #fdf2f1;
        border-color: #e74c3c;
    }
</style>

<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-hand-holding-heart"></i> Spiritual</div>
            <h1 class="section-title">Digital <span>Tasbeeh</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Remember Allah constantly. Your dhikr progress is saved locally on your device.</p>
        </div>

        <div class="tasbeeh-widget">
            <div class="tasbeeh-header">
                <h3><i class="fas fa-circle-notch" style="color: var(--gold); margin-right: 5px;"></i> Dhikr Counter</h3>
            </div>
            
            <div class="tasbeeh-display">
                <div id="tasbeehCount" class="tasbeeh-count">0</div>
            </div>
            
            <button id="tapBtn" class="btn-tap">TAP</button>
            
            <div class="tasbeeh-controls">
                <div class="target-group">
                    <label>Target Cycle</label>
                    <select id="targetSelect" class="settings-select">
                        <option value="33">33</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="infinite">Infinite</option>
                    </select>
                </div>
                <div>
                    <button id="resetBtn" class="btn-reset"><i class="fas fa-undo"></i> Reset</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var countEl = document.getElementById('tasbeehCount');
    var tapBtn = document.getElementById('tapBtn');
    var resetBtn = document.getElementById('resetBtn');
    var targetSelect = document.getElementById('targetSelect');

    var currentCount = parseInt(localStorage.getItem('tasbeeh_count')) || 0;
    countEl.innerText = currentCount;

    tapBtn.addEventListener('click', function(e) {
        e.preventDefault();
        currentCount++;
        var target = targetSelect.value;
        if(target !== 'infinite' && currentCount > parseInt(target)) {
            currentCount = 1; // reset cycle
            showToast('Tasbeeh target reached! Starting new cycle.', 'success');
        }
        countEl.innerText = currentCount;
        localStorage.setItem('tasbeeh_count', currentCount);
        
        // Vibrate for mobile
        if(navigator.vibrate) navigator.vibrate(30);
    });

    // Support spacebar for tapping
    document.addEventListener('keydown', function(e) {
        if(e.code === 'Space' && e.target === document.body) {
            e.preventDefault();
            tapBtn.click();
            tapBtn.style.transform = 'scale(0.95)';
            setTimeout(() => tapBtn.style.transform = 'scale(1)', 100);
        }
    });

    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to reset your dhikr count?')) {
            currentCount = 0;
            countEl.innerText = currentCount;
            localStorage.setItem('tasbeeh_count', 0);
        }
    });
});
</script>
@endsection
