@extends('layouts.app')

@section('title', 'Age Calculator — Noor-e-Islam')
@section('meta_description', 'Islamic + Gregorian Age Calculator')

@section('content')
<section class="section" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="section-inner">
        <x-page-header title="Age Calculator" desc="Islamic + Gregorian Age Calculator" icon="fa-calculator" />

                <div style="padding: 40px; background: #fff; border-radius: 12px; box-shadow: var(--shadow-sm); max-width: 600px; margin: 0 auto;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Date of Birth</label>
                <input type="date" id="dob" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>
            <button onclick="calculateAge()" class="btn-primary" style="width: 100%; margin-bottom: 20px;">Calculate Age</button>
            <div id="age-result" style="display: none; background: var(--secondary); padding: 20px; border-radius: 8px; text-align: center;">
                <h3 style="color: var(--primary); margin-bottom: 10px;">Your Gregorian Age</h3>
                <p id="g-age" style="font-size: 1.2rem; font-weight: 700; color: var(--text-dark); margin-bottom: 15px;"></p>
                <h3 style="color: var(--gold-dark); margin-bottom: 10px;">Your Islamic (Hijri) Age</h3>
                <p id="h-age" style="font-size: 1.2rem; font-weight: 700; color: var(--text-dark);"></p>
                <p style="font-size: 0.85rem; color: var(--text-light); margin-top: 10px;">*Hijri age is approximately 3% greater due to shorter lunar years.</p>
            </div>
        </div>
        <script>
            function calculateAge() {
                const dob = new Date(document.getElementById('dob').value);
                if (!dob || isNaN(dob)) return;
                const today = new Date();
                
                // Gregorian Age
                let age = today.getFullYear() - dob.getFullYear();
                const m = today.getMonth() - dob.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                    age--;
                }
                
                // Approximate Hijri Age (33 Gregorian years = 34 Hijri years)
                const diffTime = Math.abs(today - dob);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                const hijriYears = Math.floor(diffDays / 354.367);
                
                document.getElementById('g-age').innerText = `${age} Years`;
                document.getElementById('h-age').innerText = `${hijriYears} Lunar Years`;
                document.getElementById('age-result').style.display = 'block';
            }
        </script>
    </div>
</section>
@endsection