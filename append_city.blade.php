        {{-- ══ NEW CONTENT SECTIONS ══ --}}

        {{-- SECTION 1: RAKAT INFO TABLE --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Namaz Rakat Information &mdash; {{ $name }}</h2>
        </div>
        <div class="calendar-grid-wrapper">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Prayer / نماز</th>
                        <th>Sunnah (Muakkadah)</th>
                        <th>Farz</th>
                        <th>Sunnah (Ghair Muakkadah)</th>
                        <th>Nafl</th>
                        <th>Witr</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Fajr / فجر</strong></td><td>2</td><td>2</td><td>&mdash;</td><td>&mdash;</td><td>&mdash;</td><td>4</td>
                    </tr>
                    <tr>
                        <td><strong>Dhuhr / ظہر</strong></td><td>4 (before)</td><td>4</td><td>2</td><td>2</td><td>&mdash;</td><td>12</td>
                    </tr>
                    <tr>
                        <td><strong>Asr / عصر</strong></td><td>&mdash;</td><td>4</td><td>4</td><td>&mdash;</td><td>&mdash;</td><td>8</td>
                    </tr>
                    <tr>
                        <td><strong>Maghrib / مغرب</strong></td><td>&mdash;</td><td>3</td><td>&mdash;</td><td>2</td><td>&mdash;</td><td>7</td>
                    </tr>
                    <tr>
                        <td><strong>Isha / عشاء</strong></td><td>4 (before)</td><td>4</td><td>2</td><td>2</td><td>3</td><td>17</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- SECTION 2: TOMORROW'S TIMES --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Tomorrow Prayer Time {{ $name }} &mdash; {{ \Carbon\Carbon::now($tz)->addDay()->format('d M Y') }}</h2>
        </div>
        <div class="calendar-grid-wrapper">
            <table class="table-modern">
                <thead>
                    <tr>
                        @foreach(['fajr', 'dhuhr', 'asr', 'maghrib', 'isha'] as $p)
                        <th>{{ ucfirst($p) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach(['fajr', 'dhuhr', 'asr', 'maghrib', 'isha'] as $p)
                        <td>{{ $tomorrow[$p] ?? 'N/A' }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- SECTION 3: CITY ARTICLE --}}
        @if($content && $content->article_en)
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Prayer Time {{ $name }} &mdash; Complete Guide</h2>
        </div>
        <div class="seo-content" style="margin-top:0;">
            <p>{{ $content->article_en }}</p>
            @if($content->article_urdu)
            <hr style="margin: 20px 0; border-color: var(--border-light);">
            <p dir="rtl" style="font-family: 'Jameel Noori Nastaleeq', 'Nafees Nastaleeq', Arial, sans-serif; font-size: 1.2rem; text-align: right; line-height: 2;">{{ $content->article_urdu }}</p>
            @endif
        </div>
        @endif

        {{-- SECTION 4: FAMOUS MOSQUES --}}
        @if($content && $content->famous_mosques)
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Famous Mosques in {{ $name }}</h2>
        </div>
        <div class="info-box" style="display: flex; flex-direction: column; gap: 10px; margin-top:0; text-align: left;">
            @foreach(json_decode($content->famous_mosques) as $mosque)
            <div style="font-size: 1.1rem; color: var(--primary);">🕌 {{ $mosque }}</div>
            @endforeach
        </div>
        @endif

        {{-- SECTION 5: SPECIAL NOTES --}}
        @if($content && ($content->special_note || $content->jummah_note || $content->eid_prayer_note))
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Important Prayer Information &mdash; {{ $name }}</h2>
        </div>
        <div class="seo-content" style="margin-top:0; display:flex; flex-direction:column; gap: 20px;">
            @if($content->jummah_note)
            <div>
                <h3 style="color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 10px;">🕌 Jummah Prayer Time {{ $name }}</h3>
                <p>{{ $content->jummah_note }}</p>
            </div>
            @endif
            @if($content->eid_prayer_note)
            <div>
                <h3 style="color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 10px;">🌙 Eid Prayer Time {{ $name }}</h3>
                <p>{{ $content->eid_prayer_note }}</p>
            </div>
            @endif
            @if($content->special_note)
            <div>
                <h3 style="color: var(--primary); font-family: 'Playfair Display', serif; margin-bottom: 10px;">ℹ️ Note</h3>
                <p>{{ $content->special_note }}</p>
            </div>
            @endif
        </div>
        @endif

        {{-- SECTION 6: FAQ WITH SCHEMA --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">FAQ &mdash; Prayer Time {{ $name }} Today</h2>
        </div>
        <div class="seo-content" itemscope itemtype="https://schema.org/FAQPage" style="margin-top:0; display:flex; flex-direction:column; gap: 25px;">
            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Fajr time in {{ $name }} today?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Fajr time in {{ $name }} today</strong> {{ $prayers['date']->format('d F Y') }} is <strong>{{ $prayers['fajr'] }}</strong>. Fajr namaz consists of 2 Sunnah and 2 Farz rakats (total 4 rakats). Fajr time ends at sunrise which is {{ $prayers['sunrise'] }} today in {{ $name }}.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What are all prayer times in {{ $name }} today?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Prayer times {{ $name }} today</strong> {{ $prayers['date']->format('d F Y') }}: Fajr <strong>{{ $prayers['fajr'] }}</strong>, Sunrise {{ $prayers['sunrise'] }}, Dhuhr/Zuhr <strong>{{ $prayers['dhuhr'] }}</strong>, Asr <strong>{{ $prayers['asr'] }}</strong>, Maghrib <strong>{{ $prayers['maghrib'] }}</strong>, Isha <strong>{{ $prayers['isha'] }}</strong>. These timings are calculated using the @if($content && $content->calculation_note) {{ $content->calculation_note }} @else University of Islamic Sciences Karachi method. @endif
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Asr prayer time in {{ $name }}?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Asr time {{ $name }} today</strong> is <strong>{{ $prayers['asr'] }}</strong>. Asr consists of 4 Sunnah (Ghair Muakkadah) and 4 Farz rakats. Asr time ends at Maghrib {{ $prayers['maghrib'] }}.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Maghrib prayer time in {{ $name }} today?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Maghrib time {{ $name }} today</strong> is <strong>{{ $prayers['maghrib'] }}</strong>. Maghrib prayer is 3 Farz + 2 Nafl (total 7 rakats if including optional Sunnah). Maghrib time ends at Isha {{ $prayers['isha'] }}.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Isha prayer time in {{ $name }}?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Isha time {{ $name }} today</strong> is <strong>{{ $prayers['isha'] }}</strong>. Isha is the final prayer of the day &mdash; 4 Sunnah + 4 Farz + 2 Sunnah + 2 Nafl + 3 Witr + 2 Nafl = 17 total rakats.
                    </div>
                </div>
            </div>

            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is the Qibla direction in {{ $name }}?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <strong>Qibla direction from {{ $name }}</strong> is <strong>{{ number_format($qibla, 2) }}&deg;</strong> from True North. Face this direction while performing Salah in {{ $name }}.
                    </div>
                </div>
            </div>

            @if($content && $content->jummah_note)
            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <h3 itemprop="name" style="color: var(--primary); font-weight: 600; font-size: 1.2rem; margin-bottom: 5px;">What is Jummah prayer time in {{ $name }}?</h3>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        {{ $content->jummah_note }} Today's Zuhr time in {{ $name }} is {{ $prayers['dhuhr'] }}.
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- SECTION 7: SEO TEXT BLOCK --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Prayer Time {{ $name }} &mdash; Namaz Timing Guide</h2>
        </div>
        <div class="seo-content" style="margin-top:0;">
            <p><strong>Prayer time {{ $name }}</strong> today {{ $prayers['date']->format('d F Y') }} ({{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }} AH): <strong>Fajr {{ $prayers['fajr'] }}</strong>, Dhuhr {{ $prayers['dhuhr'] }}, <strong>Asr {{ $prayers['asr'] }}</strong>, Maghrib {{ $prayers['maghrib'] }}, <strong>Isha {{ $prayers['isha'] }}</strong>. <strong>Fajr prayer time {{ $name }}</strong> begins at dawn and ends at sunrise ({{ $prayers['sunrise'] }}). <strong>Asr time {{ $name }}</strong> follows the @if(in_array($country, ['Pakistan','India (Hanafi)']))Hanafi@elseif($country==='UAE')UAE Shafi@elseif($country==='USA')ISNA@else standard @endif calculation. <strong>Maghrib time {{ $name }}</strong> starts exactly at sunset. <strong>Isha prayer time {{ $name }}</strong> begins approximately 90 minutes after Maghrib.</p>
            <p style="margin-top: 15px;"><strong>Tomorrow prayer time {{ $name }}</strong> ({{ \Carbon\Carbon::now($tz)->addDay()->format('d M Y') }}): Fajr {{ $tomorrow['fajr'] ?? 'N/A' }}, Dhuhr {{ $tomorrow['dhuhr'] ?? 'N/A' }}, Asr {{ $tomorrow['asr'] ?? 'N/A' }}, Maghrib {{ $tomorrow['maghrib'] ?? 'N/A' }}, Isha {{ $tomorrow['isha'] ?? 'N/A' }}.</p>
        </div>
