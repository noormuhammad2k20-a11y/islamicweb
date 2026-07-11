@extends('layouts.app')

@section('seo')
<title>Hajj Checklist — Essential Packing & Prep | IslamicWeb</title>
<meta name="description" content="A comprehensive checklist for Hajj preparation, including travel documents, Ihram clothing, health essentials, and spiritual items.">
@endsection

@section('content')
<style>
    :root { --primary: #0A3A2A; --primary-dark: #052116; --gold: #D4AF37; --gold-light: #F3E5AB; --border-light: rgba(10,58,42,0.1); --cream: #faf9f6; --card-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    .page-hero { background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #125740 100%); padding: 60px 20px 80px 20px; text-align: center; color: white; position: relative; overflow: hidden; border-radius: 0 0 40px 40px; margin-bottom: 50px;}
    .page-hero::before { content: ''; position: absolute; inset: 0; opacity: 0.05; background-image: radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px); background-size: 40px 40px; }
    .page-title { font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 800; margin-bottom: 15px; position: relative; z-index: 2; color: var(--gold-light); }
    .page-subtitle { font-size: 1.1rem; color: rgba(255,255,255,0.9); position: relative; z-index: 2; max-width: 600px; margin: 0 auto; }
</style>

<section class="page-hero">
    <h1 class="page-title">Hajj Checklist</h1>
    <p class="page-subtitle">Your comprehensive guide to packing and preparing for the journey of a lifetime.</p>
</section>

<section class="section" style="padding-bottom: 60px;">
    <div class="section-inner">
        <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
            
            <!-- Card 1 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; display: flex; align-items: center;">
                    <div style="width: 50px; height: 50px; background: rgba(212,175,55,0.1); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fas fa-passport" style="color: var(--gold); font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.4rem; margin: 0;">Travel Documents</h3>
                        <span style="font-size: 0.85rem; color: #888;">Essential Paperwork</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: #555; font-size: 1rem; line-height: 2;">
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Passport & Hajj Visa</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Flight Tickets & Itinerary</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Hotel & Camp Booking Confirmations</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Vaccination Certificates (Meningitis, etc.)</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Passport-sized Photographs</li>
                </ul>
            </div>

            <!-- Card 2 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; display: flex; align-items: center;">
                    <div style="width: 50px; height: 50px; background: rgba(212,175,55,0.1); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fas fa-shirt" style="color: var(--gold); font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.4rem; margin: 0;">Clothing & Ihram</h3>
                        <span style="font-size: 0.85rem; color: #888;">Garments and Accessories</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: #555; font-size: 1rem; line-height: 2;">
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> 2-3 Sets of Ihram (Men)</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Modest Clothing / Abayas (Women)</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Comfortable Walking Sandals (No stitching over instep for men)</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Unscented Soap & Deodorant</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Money Belt / Waist Pouch</li>
                </ul>
            </div>

            <!-- Card 3 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; display: flex; align-items: center;">
                    <div style="width: 50px; height: 50px; background: rgba(212,175,55,0.1); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fas fa-kit-medical" style="color: var(--gold); font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.4rem; margin: 0;">Health & Hygiene</h3>
                        <span style="font-size: 0.85rem; color: #888;">First-aid and Medicines</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: #555; font-size: 1rem; line-height: 2;">
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Personal Prescription Medications</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Painkillers & Band-Aids</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Hydration Salts & Vitamins</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Pocket Tissues & Wet Wipes (Unscented)</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Hand Sanitizer & Masks</li>
                </ul>
            </div>

            <!-- Card 4 -->
            <div style="background: white; border-radius: 16px; padding: 30px; box-shadow: var(--card-shadow); border: 1px solid var(--border-light); position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: var(--gold);"></div>
                <div style="margin-bottom: 20px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px; display: flex; align-items: center;">
                    <div style="width: 50px; height: 50px; background: rgba(212,175,55,0.1); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fas fa-book-quran" style="color: var(--gold); font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: var(--primary-dark); font-family: 'Playfair Display', serif; font-size: 1.4rem; margin: 0;">Spiritual Items</h3>
                        <span style="font-size: 0.85rem; color: #888;">Prayer and Ibadah</span>
                    </div>
                </div>
                <ul style="list-style-type: none; padding: 0; margin: 0; color: #555; font-size: 1rem; line-height: 2;">
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Pocket Quran or Quran App</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Duas Book & Hajj Guide</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Tasbeeh / Prayer Beads</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Travel Prayer Mat</li>
                    <li><i class="fas fa-check" style="color: var(--primary); margin-right: 10px; font-size: 0.9rem;"></i> Notebook & Pen for Notes</li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection
