STEP 4: CONTROLLER — ADD MISSING VARIABLES

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Make sure cityPage() method passes these to view:

\- $content (from CityPrayerContent model)

\- $tomorrow (from buildTomorrow() helper)

\- $hijri (from toHijri() helper)

\- $qibla (from calcQibla() helper)

If any of these are missing in current controller, add them:

\`\`\`php

// In cityPage() method, ADD these if missing:

$content = \\App\\Models\\CityPrayerContent::where('city\_slug', $citySlug)->first();

$tomorrow = $this->buildTomorrow($lat, $lng, $tz);

$hijri = $this->toHijri(\\Carbon\\Carbon::now($tz));

$qibla = $this->calcQibla($lat, $lng);

// Pass to view:

return view('prayer-times.city', compact(

'city','name','country','citySlug','prayers',

'content','tomorrow','hijri','qibla','monthly',

'next','nearbyCities','seoData','tz'

));

\`\`\`

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

