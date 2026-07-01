@extends('layouts.app')

@section('title', 'Contact Us — Noor-e-Islam')
@section('meta_description', 'Get in touch with Noor-e-Islam. Have questions about our prayer times, Surah resources, or Islamic calendar? Contact our team.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Contact Us</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-envelope"></i> Reach Out</div>
            <h1 class="section-title">Contact <span>Us</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">We'd love to hear from you</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr; max-width: 800px; margin: 0 auto;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <p style="font-size: 1.1rem; color: #555; margin-bottom: 30px; text-align: center;">
                    If you have any questions, suggestions, or spot any corrections needed on our website, please fill out the form below.
                </p>

                <form id="contactForm" onsubmit="submitContact(event)">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label for="first_name" style="font-weight: bold; color: var(--primary-dark); display: block; margin-bottom: 8px;">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;">
                        </div>
                        <div>
                            <label for="last_name" style="font-weight: bold; color: var(--primary-dark); display: block; margin-bottom: 8px;">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;">
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                        <div>
                            <label for="email" style="font-weight: bold; color: var(--primary-dark); display: block; margin-bottom: 8px;">Email Address *</label>
                            <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;">
                        </div>
                        <div>
                            <label for="phone" style="font-weight: bold; color: var(--primary-dark); display: block; margin-bottom: 8px;">Phone (Optional)</label>
                            <input type="text" id="phone" name="phone" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;">
                        </div>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="subject" style="font-weight: bold; color: var(--primary-dark); display: block; margin-bottom: 8px;">Subject *</label>
                        <input type="text" id="subject" name="subject" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;">
                    </div>

                    <div style="margin-bottom: 30px;">
                        <label for="message" style="font-weight: bold; color: var(--primary-dark); display: block; margin-bottom: 8px;">Message *</label>
                        <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; resize: vertical;"></textarea>
                    </div>

                    <div style="text-align: center;">
                        <button type="submit" class="btn-primary" style="padding: 12px 40px; font-size: 1.1rem; width: 100%; cursor: pointer; border: none;">
                            <i class="fas fa-paper-plane" style="margin-right: 8px;"></i> Send Message
                        </button>
                    </div>
                </form>
                
                <div id="contact-success" style="display: none; margin-top: 20px; text-align: center; background: #d4edda; color: #155724; padding: 20px; border-radius: 8px; border: 1px solid #c3e6cb;">
                    <i class="fas fa-check-circle fa-2x" style="margin-bottom: 10px;"></i>
                    <p style="margin-bottom: 0;">Thank you! Your message has been sent successfully. We will get back to you shortly.</p>
                </div>
                <div id="contact-error" style="display: none; margin-top: 20px; text-align: center; background: #f8d7da; color: #721c24; padding: 20px; border-radius: 8px; border: 1px solid #f5c6cb;">
                    <i class="fas fa-exclamation-circle fa-2x" style="margin-bottom: 10px;"></i>
                    <p style="margin-bottom: 0;">An error occurred while sending your message. Please try again.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function submitContact(e) {
        e.preventDefault();
        
        const data = {
            first_name: document.getElementById('first_name').value,
            last_name: document.getElementById('last_name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value,
            _token: '{{ csrf_token() }}'
        };
        
        fetch('/ajax/contact', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(response => {
            if(response.success) {
                document.getElementById('contactForm').style.display = 'none';
                document.getElementById('contact-success').style.display = 'block';
                document.getElementById('contact-error').style.display = 'none';
            } else {
                throw new Error('Validation failed');
            }
        })
        .catch(err => {
            console.error(err);
            document.getElementById('contact-error').style.display = 'block';
        });
    }
</script>
@endsection
