@extends('layouts.app')

@section('title', 'Hajj Checklist — Noor-e-Islam')
@section('meta_description', 'Downloadable preparation list')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Hajj Checklist</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-clipboard-check"></i> Feature</div>
            <h1 class="section-title">Hajj Checklist</h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Downloadable preparation list</p>
        </div>

        <div style="max-width: 900px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            
            <!-- Card 1 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px; display: flex; align-items: center;">
                    <i class="fas fa-passport" style="color: var(--gold); font-size: 1.5rem; margin-right: 15px;"></i>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Travel Documents</h3>
                        <span style="font-size: 0.8rem; color: #888;">Essential Paperwork</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: var(--text-color); font-size: 0.95rem; line-height: 1.8;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Passport & Visa</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Flight Tickets & Itinerary</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Hotel Booking Confirmations</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Vaccination Certificates</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Passport-sized Photographs</li>
                </ul>
            </div>

            <!-- Card 2 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px; display: flex; align-items: center;">
                    <i class="fas fa-shirt" style="color: var(--gold); font-size: 1.5rem; margin-right: 15px;"></i>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Clothing & Ihram</h3>
                        <span style="font-size: 0.8rem; color: #888;">Garments and Accessories</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: var(--text-color); font-size: 0.95rem; line-height: 1.8;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> 2-3 Sets of Ihram (Men)</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Modest Clothing / Abayas (Women)</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Comfortable Walking Sandals</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Unscented Soap & Deodorant</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Money Belt / Waist Pouch</li>
                </ul>
            </div>

            <!-- Card 3 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px; display: flex; align-items: center;">
                    <i class="fas fa-kit-medical" style="color: var(--gold); font-size: 1.5rem; margin-right: 15px;"></i>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Health & Hygiene</h3>
                        <span style="font-size: 0.8rem; color: #888;">First-aid and Medicines</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: var(--text-color); font-size: 0.95rem; line-height: 1.8;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Personal Prescription Medications</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Painkillers & Band-Aids</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Hydration Salts & Vitamins</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Pocket Tissues & Wet Wipes</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Hand Sanitizer & Masks</li>
                </ul>
            </div>

            <!-- Card 4 -->
            <div style="background: #fff; border: 1px solid #eaeaea; border-radius: 8px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
                <div style="margin-bottom: 15px; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px; display: flex; align-items: center;">
                    <i class="fas fa-book-quran" style="color: var(--gold); font-size: 1.5rem; margin-right: 15px;"></i>
                    <div>
                        <h3 style="color: var(--primary-dark); font-size: 1.2rem; margin: 0;">Spiritual Items</h3>
                        <span style="font-size: 0.8rem; color: #888;">Prayer and Ibadah</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: var(--text-color); font-size: 0.95rem; line-height: 1.8;">
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Pocket Quran or Quran App</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Duas Book & Hajj Guide</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Tasbeeh / Prayer Beads</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Travel Prayer Mat</li>
                    <li><i class="fas fa-check-circle" style="color: var(--primary); margin-right: 8px; font-size: 0.85rem;"></i> Notebook & Pen for Notes</li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection