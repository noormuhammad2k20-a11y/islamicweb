@extends('layouts.app')

@section('title', 'Hijri to Gregorian Date Converter — Accurate Islamic Calendar')
@section('meta_description', 'Convert dates between the Islamic Hijri calendar and the Gregorian calendar. Find out the Islamic date for your birthday, anniversaries, or important events.')

@section('content')
<section class="section services-section" style="padding-top: 60px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Hijri Converter</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-exchange-alt"></i> Tools</div>
            <h1 class="section-title">Date <span>Converter</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Accurate Islamic Calendar Conversion</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr; max-width: 800px; margin: 0 auto;">
            <div class="contact-info" style="padding: 40px; border-radius: 12px; background: white; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                
                <div style="display: flex; justify-content: center; margin-bottom: 30px; border-bottom: 2px solid #eee;">
                    <button id="g-to-h-tab" class="active-tab" style="padding: 10px 20px; border: none; background: transparent; font-weight: bold; font-size: 1.1rem; color: var(--primary-dark); border-bottom: 3px solid var(--gold); cursor: pointer;">Gregorian to Hijri</button>
                    <button id="h-to-g-tab" style="padding: 10px 20px; border: none; background: transparent; font-weight: bold; font-size: 1.1rem; color: #999; cursor: pointer;">Hijri to Gregorian</button>
                </div>

                <!-- Gregorian to Hijri Form -->
                <div id="g-to-h" style="display: block;">
                    <form id="form-g-to-h" onsubmit="convertDate(event, 'g2h')" style="display: flex; gap: 15px; flex-wrap: wrap; justify-content: center; align-items: center;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <select id="g-day" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; outline: none;">
                                @for($i=1; $i<=31; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <select id="g-month" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; outline: none;">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <input type="number" id="g-year" value="{{ date('Y') }}" min="1900" max="2100" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; outline: none; width: 100px;">
                        </div>
                        <button type="submit" class="btn-primary" style="padding: 12px 25px;"><i class="fas fa-sync-alt"></i> Convert</button>
                    </form>
                </div>

                <!-- Hijri to Gregorian Form -->
                <div id="h-to-g" style="display: none;">
                    <form id="form-h-to-g" onsubmit="convertDate(event, 'h2g')" style="display: flex; gap: 15px; flex-wrap: wrap; justify-content: center; align-items: center;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <select id="h-day" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; outline: none;">
                                @for($i=1; $i<=30; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <select id="h-month" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; outline: none;">
                                <option value="1">Muharram</option>
                                <option value="2">Safar</option>
                                <option value="3">Rabi Al-Awwal</option>
                                <option value="4">Rabi Al-Thani</option>
                                <option value="5">Jumada Al-Awwal</option>
                                <option value="6">Jumada Al-Thani</option>
                                <option value="7">Rajab</option>
                                <option value="8">Shaban</option>
                                <option value="9">Ramadan</option>
                                <option value="10">Shawwal</option>
                                <option value="11">Dhul Qadah</option>
                                <option value="12">Dhul Hijjah</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <input type="number" id="h-year" value="1445" min="1300" max="1500" style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; outline: none; width: 100px;">
                        </div>
                        <button type="submit" class="btn-primary" style="padding: 12px 25px;"><i class="fas fa-sync-alt"></i> Convert</button>
                    </form>
                </div>

                <div id="conversion-result" style="display: none; margin-top: 40px; text-align: center; background: #fafafa; border: 1px solid #eee; border-radius: 8px; padding: 30px;">
                    <h3 style="color: #666; font-size: 1.1rem; margin-bottom: 10px;">Converted Date:</h3>
                    <div id="result-text" style="font-size: 2.2rem; color: var(--primary-dark); font-weight: bold;"></div>
                    <div id="result-subtext" style="font-size: 1.2rem; color: #777; margin-top: 10px;"></div>
                </div>
                
                <div id="conversion-loading" style="display: none; margin-top: 40px; text-align: center; color: var(--primary);">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                    <p style="margin-top: 10px;">Calculating...</p>
                </div>
            </div>
        </div>

        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Knowledge</div>
            <h2 class="section-title">How It <span>Works</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;" itemscope itemtype="https://schema.org/FAQPage">
            <div class="contact-info">
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px;">
                    <h3 itemprop="name" style="margin-bottom: 15px; color: var(--primary-dark);">How Hijri-Gregorian Conversion Works</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" style="color: #555;">The Islamic (Hijri) calendar is purely lunar, meaning it is based entirely on the phases of the moon. A lunar year is typically 354 or 355 days long—about 11 days shorter than the solar Gregorian year. This is why Ramadan and other Islamic dates shift backward by approximately 11 days every year in the Gregorian calendar.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" style="margin-bottom: 15px; color: var(--primary-dark);">What is the difference between the Umm al-Qura calendar and local moon-sighting?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" style="color: #555;">The Umm al-Qura calendar is a pre-calculated astronomical calendar officially used in Saudi Arabia for civil purposes, whereas local moon-sighting depends on the physical observation of the new crescent moon (Hilal) in each specific country. Therefore, calculated dates may sometimes differ by a day from strictly observed local dates.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('g-to-h-tab').addEventListener('click', function() {
        this.style.borderBottom = '3px solid var(--gold)';
        this.style.color = 'var(--primary-dark)';
        document.getElementById('h-to-g-tab').style.borderBottom = 'none';
        document.getElementById('h-to-g-tab').style.color = '#999';
        
        document.getElementById('g-to-h').style.display = 'block';
        document.getElementById('h-to-g').style.display = 'none';
    });

    document.getElementById('h-to-g-tab').addEventListener('click', function() {
        this.style.borderBottom = '3px solid var(--gold)';
        this.style.color = 'var(--primary-dark)';
        document.getElementById('g-to-h-tab').style.borderBottom = 'none';
        document.getElementById('g-to-h-tab').style.color = '#999';
        
        document.getElementById('h-to-g').style.display = 'block';
        document.getElementById('g-to-h').style.display = 'none';
    });

    function convertDate(e, type) {
        e.preventDefault();
        
        document.getElementById('conversion-result').style.display = 'none';
        document.getElementById('conversion-loading').style.display = 'block';

        let dateParam = '';
        if (type === 'g2h') {
            const y = document.getElementById('g-year').value;
            const m = document.getElementById('g-month').value;
            const d = document.getElementById('g-day').value;
            dateParam = `${y}-${m}-${d}`;
        } else {
            const y = document.getElementById('h-year').value;
            const m = document.getElementById('h-month').value;
            const d = document.getElementById('h-day').value;
            dateParam = `${y}-${m}-${d}`;
        }

        fetch(`/ajax/hijri-convert?date=${dateParam}&direction=${type}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('conversion-loading').style.display = 'none';
                document.getElementById('conversion-result').style.display = 'block';
                document.getElementById('result-text').innerText = data.result_text;
                document.getElementById('result-subtext').innerText = data.result_subtext;
            })
            .catch(err => {
                console.error(err);
                document.getElementById('conversion-loading').style.display = 'none';
                alert('An error occurred during conversion.');
            });
    }
</script>
@endsection
