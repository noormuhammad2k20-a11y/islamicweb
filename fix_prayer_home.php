<?php
$content = file_get_contents('resources/views/home.blade.php');

$search = <<<HTML
            <div class="prayer-times-list" id="prayerTimesList">
                <div class="prayer-time-chip"><span class="prayer-name">Fajr</span><span class="prayer-time-val">05:12
                        AM</span></div>
                <div class="prayer-time-chip active"><span class="prayer-name">Sunrise</span><span
                        class="prayer-time-val">06:28 AM</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Dhuhr</span><span class="prayer-time-val">12:35
                        PM</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Asr</span><span class="prayer-time-val">04:02
                        PM</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Maghrib</span><span
                        class="prayer-time-val">06:48 PM</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Isha</span><span class="prayer-time-val">08:15
                        PM</span></div>
            </div>
HTML;

$replace = <<<HTML
            <div class="prayer-times-list" id="prayerTimesList">
                <div class="prayer-time-chip"><span class="prayer-name">Fajr</span><span class="prayer-time-val">{{ isset(\$prayerTimes) ? \$prayerTimes->fajr : '05:12 AM' }}</span></div>
                <div class="prayer-time-chip active"><span class="prayer-name">Sunrise</span><span class="prayer-time-val">{{ isset(\$prayerTimes) ? \$prayerTimes->sunrise : '06:28 AM' }}</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Dhuhr</span><span class="prayer-time-val">{{ isset(\$prayerTimes) ? \$prayerTimes->dhuhr : '12:35 PM' }}</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Asr</span><span class="prayer-time-val">{{ isset(\$prayerTimes) ? \$prayerTimes->asr : '04:02 PM' }}</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Maghrib</span><span class="prayer-time-val">{{ isset(\$prayerTimes) ? \$prayerTimes->maghrib : '06:48 PM' }}</span></div>
                <div class="prayer-time-chip"><span class="prayer-name">Isha</span><span class="prayer-time-val">{{ isset(\$prayerTimes) ? \$prayerTimes->isha : '08:15 PM' }}</span></div>
            </div>
HTML;

$content = str_replace($search, $replace, $content);
file_put_contents('resources/views/home.blade.php', $content);
echo "home.blade.php updated.\n";
