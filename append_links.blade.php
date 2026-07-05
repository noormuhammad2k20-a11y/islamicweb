        {{-- ══ INTERNAL LINKS: Prayer-Specific Pages ══ --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">{{ $name }} Prayer Times &mdash; Detailed Pages</h2>
        </div>
        <p style="text-align: center; margin-bottom: 20px;">View detailed information for each individual prayer in {{ $name }}:</p>
        <div class="internal-links" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            @foreach([
                ['key'=>'fajr', 'label'=>'Fajr Time', 'urdu'=>'فجر', 'icon'=>'🌙','desc'=>'Dawn prayer · Before sunrise'],
                ['key'=>'zuhr', 'label'=>'Dhuhr/Zuhr Time','urdu'=>'ظہر', 'icon'=>'☀️','desc'=>'Noon prayer · At solar midday'],
                ['key'=>'asr', 'label'=>'Asr Time', 'urdu'=>'عصر', 'icon'=>'🌤','desc'=>'Afternoon prayer · Hanafi method'],
                ['key'=>'maghrib', 'label'=>'Maghrib Time', 'urdu'=>'مغرب', 'icon'=>'🌇','desc'=>'Sunset prayer · Exact sunset'],
                ['key'=>'isha', 'label'=>'Isha Time', 'urdu'=>'عشاء', 'icon'=>'🌌','desc'=>'Night prayer · Evening worship'],
            ] as $pl)
            <a href="{{ url('/prayer-times/'.$citySlug.'/'.$pl['key']) }}" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="{{ $pl['label'] }} in {{ $name }}">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">{{ $pl['icon'] }} {{ $pl['label'] }}</div>
                <div style="font-size: 0.9rem; color: #666;">{{ $pl['urdu'] }} &mdash; {{ $pl['desc'] }}</div>
            </a>
            @endforeach
        </div>

        {{-- ══ INTERNAL LINKS: Country Hub + Cross-Country ══ --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Prayer Times by Country</h2>
        </div>
        <div class="internal-links">
            <a href="{{ url('/prayer-times/pakistan') }}" class="internal-link {{ $country==='Pakistan'?'active':'' }}" title="Prayer Times Pakistan All Cities" style="{{ $country==='Pakistan' ? 'background: #e8f5e9; border-color: #4caf50;' : '' }}">🇵🇰 Pakistan</a>
            <a href="{{ url('/prayer-times/uae') }}" class="internal-link {{ $country==='UAE'?'active':'' }}" title="Prayer Times UAE All Cities" style="{{ $country==='UAE' ? 'background: #e3f2fd; border-color: #2196f3;' : '' }}">🇦🇪 UAE</a>
            <a href="{{ url('/prayer-times/saudi-arabia') }}" class="internal-link {{ $country==='Saudi Arabia'?'active':'' }}" title="Prayer Times Saudi Arabia" style="{{ $country==='Saudi Arabia' ? 'background: #ffebee; border-color: #f44336;' : '' }}">🇸🇦 Saudi Arabia</a>
            <a href="{{ url('/prayer-times/india') }}" class="internal-link {{ $country==='India'?'active':'' }}" title="Prayer Times India" style="{{ $country==='India' ? 'background: #fff8e1; border-color: #ffc107;' : '' }}">🇮🇳 India</a>
        </div>

        <h3 style="text-align: center; margin-top: 30px; font-family: 'Playfair Display', serif; color: var(--primary);">
            Popular Cities in 
            @if($country==='Pakistan')Pakistan 🇵🇰
            @elseif($country==='UAE')UAE 🇦🇪
            @elseif($country==='Saudi Arabia')Saudi Arabia 🇸🇦
            @elseif($country==='India')India 🇮🇳
            @else USA 🇺🇸 @endif
        </h3>
        
        @php
            $popularByCountry = [
                'Pakistan' => [['lahore','Lahore'],['karachi','Karachi'],['islamabad','Islamabad'],['rawalpindi','Rawalpindi'],['faisalabad','Faisalabad'],['peshawar','Peshawar'],['multan','Multan'],['quetta','Quetta']],
                'UAE' => [['dubai','Dubai'],['abu-dhabi','Abu Dhabi'],['sharjah','Sharjah'],['ajman','Ajman'],['al-ain','Al Ain'],['ras-al-khaimah','RAK'],['fujairah','Fujairah']],
                'Saudi Arabia' => [['makkah','Makkah'],['madinah','Madinah'],['riyadh','Riyadh'],['jeddah','Jeddah'],['dammam','Dammam'],['khobar','Khobar'],['taif','Taif']],
                'India' => [['calicut','Calicut'],['kozhikode','Kozhikode'],['malappuram','Malappuram'],['kochi','Kochi'],['kannur','Kannur'],['bangalore','Bangalore'],['mumbai','Mumbai']],
                'USA' => [['new-york','New York'],['chicago','Chicago'],['houston','Houston'],['dearborn-michigan','Dearborn'],['minneapolis','Minneapolis'],['los-angeles','LA'],['boston','Boston']],
            ];
            $links = $popularByCountry[$country] ?? $popularByCountry['Pakistan'];
        @endphp

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-top: 15px;">
            @foreach($links as [$slug, $label])
                @if($slug !== $citySlug)
                <a href="{{ url('/prayer-times/'.$slug) }}" style="padding: 8px 15px; border: 1px solid var(--border-light); border-radius: 20px; text-decoration: none; color: var(--primary); font-size: 0.9rem; background: white; transition: all 0.3s;" onmouseover="this.style.borderColor='var(--gold)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='var(--border-light)'; this.style.transform='none'" title="Prayer Time {{ $label }}">{{ $label }}</a>
                @endif
            @endforeach
        </div>

        {{-- ══ INTERNAL LINKS: Cross-Feature Navigation ══ --}}
        <div class="title-wrapper" style="margin-top: 40px;">
            <h2 class="section-title">Islamic Tools &mdash; {{ $name }}</h2>
        </div>
        <div class="internal-links" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
            <a href="{{ url('/islamic-date-today') }}" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="Islamic Date Today {{ $name }}">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">📅 Islamic Date Today</div>
                <div style="font-size: 0.9rem; color: #666;">Today's Hijri date: <strong>{{ $hijri['day'] }} {{ $hijri['month_name'] }} {{ $hijri['year'] }}</strong></div>
            </a>
            <a href="{{ url('/islamic-calendar') }}" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="Islamic Calendar {{ $prayers['date']->format('Y') }}">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">🗓️ Islamic Calendar {{ $prayers['date']->format('Y') }}</div>
                <div style="font-size: 0.9rem; color: #666;">Full Hijri calendar with all months</div>
            </a>
            <a href="{{ url('/prayer-times/'.$citySlug.'/fajr') }}" class="internal-link" style="flex-direction: column; align-items: flex-start; gap: 5px; text-decoration: none;" title="Fajr Time {{ $name }} Today">
                <div style="font-size: 1.1rem; font-weight: 700; color: var(--primary);">🌙 Fajr Time {{ $name }}</div>
                <div style="font-size: 0.9rem; color: #666;">Today: <strong>{{ $prayers['fajr'] }}</strong> &mdash; Full details, monthly schedule</div>
            </a>
        </div>
