<?php

$file = 'resources/views/pages/prayer-times/city.blade.php';
$content = file_get_contents($file);

// 1. Add CSS for Responsive Table and Grid Layouts to the style block
$cssToAdd = <<<CSS
    
    @media (max-width: 768px) {
        .timetable-table, .timetable-table tbody, .timetable-table tr, .timetable-table td {
            display: block;
            width: 100%;
        }
        .timetable-table thead {
            display: none;
        }
        .timetable-table tr {
            margin-bottom: 15px;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
        }
        .timetable-table td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px !important;
            text-align: right !important;
            border-bottom: 1px solid #f9f9f9;
        }
        .timetable-table td:last-child {
            border-bottom: none;
        }
        .timetable-table td::before {
            content: attr(data-label);
            font-weight: 600;
            color: var(--text-medium);
            text-align: left;
        }
        .timetable-table td.date-cell {
            background: #fdfbf7;
            border-bottom: 2px solid #f0f0f0;
            justify-content: center;
            text-align: center !important;
        }
        .timetable-table td.date-cell::before {
            display: none;
        }
        .timetable-table td.date-cell span.today-badge {
            margin-left: 10px;
        }
    }

    /* Grid Layouts for Sections */
    .nawafil-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
    }
    .rules-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    .faq-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        align-items: stretch;
    }
    
    @media (max-width: 991px) {
        .nawafil-grid { grid-template-columns: repeat(2, 1fr); }
        .rules-grid { grid-template-columns: 1fr; }
        .faq-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .nawafil-grid { grid-template-columns: 1fr; }
        .faq-grid { grid-template-columns: 1fr; }
    }
</style>
CSS;
$content = str_replace("</style>", $cssToAdd, $content);

// 2. Timetable: Remove overflow and set proper headers and body logic
$timetableOld = <<<HTML
                <div class="pro-card" style="padding: 0; margin-bottom: 40px; overflow: hidden;">
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; min-width: 650px;">
                            <thead>
                                <tr style="background: var(--primary); color: white;">
                                    <th style="padding: 16px; text-align: left; font-weight: 600; font-size: 0.9rem;">Date</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Fajr</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 500; font-size: 0.9rem; color: rgba(255,255,255,0.7);">Sunrise</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Dhuhr</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Asr</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Maghrib</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Isha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\$prayerTimes->take(10) as \$pt)
                                @php \$isToday = \$pt->date == date('Y-m-d'); @endphp
                                <tr class="timetable-row" style="background: {{ \$isToday ? '#f4f8f6' : 'transparent' }};">
                                    <td style="padding: 14px 16px; font-weight: {{ \$isToday ? '700' : '500' }}; color: var(--text-dark); font-size: 0.9rem;">
                                        {{ \Carbon\Carbon::parse(\$pt->date)->format('d M, Y') }}
                                        @if(\$isToday) <span style="background: var(--gold); color: #fff; font-size: 0.7rem; padding: 2px 6px; border-radius: 4px; margin-left: 6px; font-weight: 600;">Today</span> @endif
                                    </td>
                                    <td style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->fajr)->format('h:i A') }}</td>
                                    <td style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-light);">{{ \Carbon\Carbon::parse(\$pt->sunrise)->format('h:i A') }}</td>
                                    <td style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->dhuhr)->format('h:i A') }}</td>
                                    <td style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->asr)->format('h:i A') }}</td>
                                    <td style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--primary); font-weight: {{ \$isToday ? '700' : '600' }};">{{ \Carbon\Carbon::parse(\$pt->maghrib)->format('h:i A') }}</td>
                                    <td style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->isha)->format('h:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 15px; text-align: center; background: #fafafa; border-top: 1px solid #eee;">
                        <a href="{{ route('prayer-times.monthly', \$city->slug) }}" style="color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.9rem;">View Full Monthly Timetable <i class="fas fa-arrow-right" style="margin-left: 4px; font-size: 0.8rem;"></i></a>
                    </div>
                </div>
HTML;
$timetableNew = <<<HTML
                <div class="pro-card" style="padding: 0; margin-bottom: 40px; overflow: hidden;">
                    <div>
                        <table class="timetable-table" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: var(--primary); color: white;">
                                    <th style="padding: 16px; text-align: left; font-weight: 600; font-size: 0.9rem;">Date</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Fajr</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 500; font-size: 0.9rem; color: rgba(255,255,255,0.7);">Sunrise</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Dhuhr</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Asr</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Maghrib</th>
                                    <th style="padding: 16px 10px; text-align: center; font-weight: 600; font-size: 0.9rem;">Isha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(\$prayerTimes as \$pt)
                                @php \$isToday = \$pt->date == date('Y-m-d'); @endphp
                                <tr class="timetable-row" style="background: {{ \$isToday ? '#f4f8f6' : 'transparent' }};">
                                    <td class="date-cell" data-label="Date" style="padding: 14px 16px; font-weight: {{ \$isToday ? '700' : '500' }}; color: var(--text-dark); font-size: 0.9rem;">
                                        {{ \Carbon\Carbon::parse(\$pt->date)->format('d M, Y') }}
                                        @if(\$isToday) <span class="today-badge" style="background: var(--gold); color: #fff; font-size: 0.7rem; padding: 2px 6px; border-radius: 4px; font-weight: 600;">Today</span> @endif
                                    </td>
                                    <td data-label="Fajr" style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->fajr)->format('h:i A') }}</td>
                                    <td data-label="Sunrise" style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-light);">{{ \Carbon\Carbon::parse(\$pt->sunrise)->format('h:i A') }}</td>
                                    <td data-label="Dhuhr" style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->dhuhr)->format('h:i A') }}</td>
                                    <td data-label="Asr" style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->asr)->format('h:i A') }}</td>
                                    <td data-label="Maghrib" style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--primary); font-weight: {{ \$isToday ? '700' : '600' }};">{{ \Carbon\Carbon::parse(\$pt->maghrib)->format('h:i A') }}</td>
                                    <td data-label="Isha" style="padding: 14px 10px; text-align: center; font-size: 0.9rem; color: var(--text-dark); font-weight: {{ \$isToday ? '600' : '400' }};">{{ \Carbon\Carbon::parse(\$pt->isha)->format('h:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
HTML;
$content = str_replace($timetableOld, $timetableNew, $content);

// 3. Nawafil Section
$nawafilOld = <<<HTML
                <div class="pro-card" style="padding: 25px; margin-bottom: 40px;">
                    <p style="color: var(--text-medium); margin-bottom: 25px; font-size: 0.95rem;">Calculated voluntary prayer times for {{ \$city->name }} today.</p>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px;">
                        <div class="nawafil-card">
                            <div class="icon-wrapper"><i class="fas fa-sun"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1.05rem; margin-bottom: 5px;">Ishraq</h4>
                            <p style="font-weight: 700; font-size: 1.2rem; color: var(--text-dark); margin-bottom: 4px;">{{ \$nawafil->ishraq }}</p>
                        </div>
                        <div class="nawafil-card">
                            <div class="icon-wrapper"><i class="fas fa-cloud-sun"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1.05rem; margin-bottom: 5px;">Chasht</h4>
                            <p style="font-weight: 700; font-size: 1.2rem; color: var(--text-dark); margin-bottom: 4px;">{{ \$nawafil->chasht }}</p>
                        </div>
                        <div class="nawafil-card">
                            <div class="icon-wrapper"><i class="fas fa-moon"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1.05rem; margin-bottom: 5px;">Awwabeen</h4>
                            <p style="font-weight: 700; font-size: 1.2rem; color: var(--text-dark); margin-bottom: 4px;">{{ \$nawafil->awwabeen }}</p>
                        </div>
                        <div class="nawafil-card">
                            <div class="icon-wrapper"><i class="fas fa-star-and-crescent"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1.05rem; margin-bottom: 5px;">Tahajjud</h4>
                            <p style="font-weight: 700; font-size: 1.2rem; color: var(--text-dark); margin-bottom: 4px;">{{ \$nawafil->tahajjud }}</p>
                        </div>
                    </div>
                </div>
HTML;
$nawafilNew = <<<HTML
                <div class="pro-card" style="padding: 25px; margin-bottom: 40px;">
                    <p style="color: var(--text-medium); margin-bottom: 20px; font-size: 0.95rem;">Calculated voluntary prayer times for {{ \$city->name }} today.</p>
                    <div class="nawafil-grid">
                        <div class="nawafil-card" style="padding: 20px;">
                            <div class="icon-wrapper" style="margin-bottom: 10px;"><i class="fas fa-sun"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1rem; margin-bottom: 4px;">Ishraq</h4>
                            <p style="font-weight: 700; font-size: 1.15rem; color: var(--text-dark); margin: 0;">{{ \$nawafil->ishraq }}</p>
                        </div>
                        <div class="nawafil-card" style="padding: 20px;">
                            <div class="icon-wrapper" style="margin-bottom: 10px;"><i class="fas fa-cloud-sun"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1rem; margin-bottom: 4px;">Chasht</h4>
                            <p style="font-weight: 700; font-size: 1.15rem; color: var(--text-dark); margin: 0;">{{ \$nawafil->chasht }}</p>
                        </div>
                        <div class="nawafil-card" style="padding: 20px;">
                            <div class="icon-wrapper" style="margin-bottom: 10px;"><i class="fas fa-moon"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1rem; margin-bottom: 4px;">Awwabeen</h4>
                            <p style="font-weight: 700; font-size: 1.15rem; color: var(--text-dark); margin: 0;">{{ \$nawafil->awwabeen }}</p>
                        </div>
                        <div class="nawafil-card" style="padding: 20px;">
                            <div class="icon-wrapper" style="margin-bottom: 10px;"><i class="fas fa-star-and-crescent"></i></div>
                            <h4 style="color: var(--primary-dark); font-size: 1rem; margin-bottom: 4px;">Tahajjud</h4>
                            <p style="font-weight: 700; font-size: 1.15rem; color: var(--text-dark); margin: 0;">{{ \$nawafil->tahajjud }}</p>
                        </div>
                    </div>
                </div>
HTML;
$content = str_replace($nawafilOld, $nawafilNew, $content);

// 4. Prayer Guide Section
$guideOld = <<<HTML
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="display: flex; gap: 12px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 3px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem;">Fajr:</strong>
                                <span style="color: var(--text-medium); font-size: 0.95rem;">Must be prayed before Sunrise.</span>
                            </div>
                        </li>
                        <li style="display: flex; gap: 12px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 3px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem;">Dhuhr:</strong>
                                <span style="color: var(--text-medium); font-size: 0.95rem;">Begins once the sun passes its zenith.</span>
                            </div>
                        </li>
                        <li style="display: flex; gap: 12px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 3px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem;">Asr:</strong>
                                <span style="color: var(--text-medium); font-size: 0.95rem;">Best prayed before the sun begins to turn pale.</span>
                            </div>
                        </li>
                        <li style="display: flex; gap: 12px; margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 3px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem;">Maghrib:</strong>
                                <span style="color: var(--text-medium); font-size: 0.95rem;">Should be prayed immediately after sunset.</span>
                            </div>
                        </li>
                        <li style="display: flex; gap: 12px;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 3px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem;">Isha:</strong>
                                <span style="color: var(--text-medium); font-size: 0.95rem;">Can be prayed until Islamic midnight.</span>
                            </div>
                        </li>
                    </ul>
HTML;
$guideNew = <<<HTML
                    <div class="rules-grid">
                        <div style="background: #fdfbf7; border: 1px solid #f2eedf; padding: 15px; border-radius: 8px; display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 2px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem; display: block; margin-bottom: 3px;">Fajr</strong>
                                <span style="color: var(--text-medium); font-size: 0.85rem; line-height: 1.4;">Must be prayed before Sunrise.</span>
                            </div>
                        </div>
                        <div style="background: #fdfbf7; border: 1px solid #f2eedf; padding: 15px; border-radius: 8px; display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 2px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem; display: block; margin-bottom: 3px;">Dhuhr</strong>
                                <span style="color: var(--text-medium); font-size: 0.85rem; line-height: 1.4;">Begins once the sun passes its zenith.</span>
                            </div>
                        </div>
                        <div style="background: #fdfbf7; border: 1px solid #f2eedf; padding: 15px; border-radius: 8px; display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 2px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem; display: block; margin-bottom: 3px;">Asr</strong>
                                <span style="color: var(--text-medium); font-size: 0.85rem; line-height: 1.4;">Best prayed before the sun begins to turn pale.</span>
                            </div>
                        </div>
                        <div style="background: #fdfbf7; border: 1px solid #f2eedf; padding: 15px; border-radius: 8px; display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 2px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem; display: block; margin-bottom: 3px;">Maghrib</strong>
                                <span style="color: var(--text-medium); font-size: 0.85rem; line-height: 1.4;">Should be prayed immediately after sunset.</span>
                            </div>
                        </div>
                        <div style="background: #fdfbf7; border: 1px solid #f2eedf; padding: 15px; border-radius: 8px; display: flex; gap: 12px; align-items: flex-start;">
                            <i class="fas fa-check-circle" style="color: var(--gold); margin-top: 2px;"></i>
                            <div>
                                <strong style="color: var(--text-dark); font-size: 0.95rem; display: block; margin-bottom: 3px;">Isha</strong>
                                <span style="color: var(--text-medium); font-size: 0.85rem; line-height: 1.4;">Can be prayed until Islamic midnight.</span>
                            </div>
                        </div>
                    </div>
HTML;
$content = str_replace($guideOld, $guideNew, $content);

// 5. FAQ Section
$faqOld = <<<HTML
                <div>
                    <div class="pro-card" style="padding: 20px; margin-bottom: 15px;">
                        <h3 style="font-size: 1.05rem; color: var(--primary-dark); margin: 0 0 8px; font-weight: 600;">What is Fajr time in {{ \$city->name }} today?</h3>
                        <p style="color: var(--text-medium); margin: 0; line-height: 1.5; font-size: 0.95rem;">
                            Fajr time in {{ \$city->name }} today begins at <strong>{{ \$todayPrayer ? \Carbon\Carbon::parse(\$todayPrayer->fajr)->format('h:i A') : 'N/A' }}</strong>.
                        </p>
                    </div>
                    <div class="pro-card" style="padding: 20px; margin-bottom: 15px;">
                        <h3 style="font-size: 1.05rem; color: var(--primary-dark); margin: 0 0 8px; font-weight: 600;">What is Maghrib time in {{ \$city->name }} today?</h3>
                        <p style="color: var(--text-medium); margin: 0; line-height: 1.5; font-size: 0.95rem;">
                            Maghrib time in {{ \$city->name }} today is at <strong>{{ \$todayPrayer ? \Carbon\Carbon::parse(\$todayPrayer->maghrib)->format('h:i A') : 'N/A' }}</strong>.
                        </p>
                    </div>
                    <div class="pro-card" style="padding: 20px;">
                        <h3 style="font-size: 1.05rem; color: var(--primary-dark); margin: 0 0 8px; font-weight: 600;">How is the Qibla direction determined for {{ \$city->name }}?</h3>
                        <p style="color: var(--text-medium); margin: 0; line-height: 1.5; font-size: 0.95rem;">
                            The exact direction is calculated mathematically as <strong>{{ \$qiblaDegree ?? 'N/A' }}°</strong> clockwise from North.
                        </p>
                    </div>
                </div>
HTML;
$faqNew = <<<HTML
                <div class="faq-grid">
                    <div class="pro-card" style="padding: 20px; display: flex; flex-direction: column; height: 100%;">
                        <h3 style="font-size: 1rem; color: var(--primary-dark); margin: 0 0 8px; font-weight: 600;">Fajr time today?</h3>
                        <p style="color: var(--text-medium); margin: 0; line-height: 1.5; font-size: 0.9rem;">
                            Begins at <strong>{{ \$todayPrayer ? \Carbon\Carbon::parse(\$todayPrayer->fajr)->format('h:i A') : 'N/A' }}</strong>.
                        </p>
                    </div>
                    <div class="pro-card" style="padding: 20px; display: flex; flex-direction: column; height: 100%;">
                        <h3 style="font-size: 1rem; color: var(--primary-dark); margin: 0 0 8px; font-weight: 600;">Maghrib time today?</h3>
                        <p style="color: var(--text-medium); margin: 0; line-height: 1.5; font-size: 0.9rem;">
                            Starts at <strong>{{ \$todayPrayer ? \Carbon\Carbon::parse(\$todayPrayer->maghrib)->format('h:i A') : 'N/A' }}</strong>.
                        </p>
                    </div>
                    <div class="pro-card" style="padding: 20px; display: flex; flex-direction: column; height: 100%;">
                        <h3 style="font-size: 1rem; color: var(--primary-dark); margin: 0 0 8px; font-weight: 600;">Qibla Direction?</h3>
                        <p style="color: var(--text-medium); margin: 0; line-height: 1.5; font-size: 0.9rem;">
                            Calculated mathematically as <strong>{{ \$qiblaDegree ?? 'N/A' }}°</strong> clockwise from North.
                        </p>
                    </div>
                </div>
HTML;
$content = str_replace($faqOld, $faqNew, $content);

file_put_contents($file, $content);
echo "SUCCESS";
