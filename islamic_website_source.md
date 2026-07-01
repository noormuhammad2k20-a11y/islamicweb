# Islamic Website Source Code

This file contains the source code for the Zakat, Namaz, Duas, and other sections.

## File: routes/web.php

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\IslamicDateController;
use App\Http\Controllers\PrayerTimesController;
use App\Http\Controllers\ConverterController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\FazilatController;
use App\Http\Controllers\HadithController;
use App\Http\Controllers\IslamicEventsController;

$appRoutes = function () {

    // Homepage
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Static Pages
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');

    // CLUSTER 1 — Islamic Date / Hijri Calendar
    Route::prefix('islamic-date-today')->group(function () {
        Route::get('/', [IslamicDateController::class, 'hub'])->name('islamic-date.hub');
        Route::get('/{country:slug}', [IslamicDateController::class, 'country'])->name('islamic-date.country');
        
        // Redirect old nested city pages to the country page
        Route::get('/{country}/{city}', function ($country, $city) {
            return redirect()->route('islamic-date.country', ['country' => $country], 301);
        });
    });

    Route::get('/hijri-gregorian-converter', [ConverterController::class, 'show'])->name('converter.show');

    // CLUSTER 2 — Prayer Times
    Route::prefix('prayer-times')->group(function () {
        Route::get('/', [PrayerTimesController::class, 'hub'])->name('prayer-times.hub');
        Route::get('/{city:slug}', [PrayerTimesController::class, 'city'])->name('prayer-times.city');
    });

    // CLUSTER 3 — Quran & Fazilat
    Route::get('/surah/{surah:slug}', [SurahController::class, 'show'])->name('surah.show');
    Route::get('/surah/{surah:slug}/fazilat', [FazilatController::class, 'show'])->name('fazilat.show');

    // CLUSTER 4 — Hadith
    Route::get('/hadith-topics', [HadithController::class, 'index'])->name('hadith.index');
    Route::get('/hadith-topics/{topic:slug}', [HadithController::class, 'show'])->name('hadith.show');

    // CLUSTER 5 — Events & Calendar
    Route::get('/islamic-calendar', [IslamicEventsController::class, 'index'])->name('events.index');
    Route::get('/islamic-calendar/{hijri_month:slug}', [IslamicEventsController::class, 'month'])->name('events.month');

    // CLUSTER 6 — Islamic Names
    Route::prefix('islamic-names')->group(function () {
        Route::get('/', [\App\Http\Controllers\IslamicNameController::class, 'index'])->name('names.index');
        Route::get('/{gender}', [\App\Http\Controllers\IslamicNameController::class, 'gender'])->where('gender', 'boys|girls')->name('names.gender');
        Route::get('/name/{slug}', [\App\Http\Controllers\IslamicNameController::class, 'show'])->name('names.show');
    });

    // CLUSTER 7 — Daily Duas & Azkar
    Route::prefix('duas')->group(function () {
        Route::get('/', [\App\Http\Controllers\DuaController::class, 'index'])->name('duas.index');
        Route::get('/{category:slug}', [\App\Http\Controllers\DuaController::class, 'category'])->name('duas.category');
        Route::get('/{category:slug}/{seo_slug}', [\App\Http\Controllers\DuaController::class, 'show'])->name('duas.show');
    });

    // CLUSTER 8 — Zakat Calculator
    Route::prefix('zakat-calculator')->group(function () {
        Route::get('/', [\App\Http\Controllers\ZakatController::class, 'index'])->name('zakat.index');
        Route::get('/{country}', [\App\Http\Controllers\ZakatController::class, 'country'])->name('zakat.country');
    });

    // CLUSTER 9 — Digital Tasbeeh Tracker
    Route::get('/tasbeeh', [\App\Http\Controllers\TasbeehController::class, 'index'])->name('tasbeeh.index');

};

Route::middleware('setlocale')->group($appRoutes);
Route::prefix('ur')->name('ur.')->middleware('setlocale')->group($appRoutes);

// AJAX Routes
Route::prefix('ajax')->group(function () {
    Route::post('/contact', [AjaxController::class, 'contact'])->middleware('throttle:contact');
    Route::post('/newsletter', [AjaxController::class, 'newsletter'])->middleware('throttle:5,1');
    Route::post('/comments/{type}/{id}', [AjaxController::class, 'comments'])->middleware('throttle:comments');
    Route::get('/hijri-convert', [AjaxController::class, 'hijriConvert']);
    Route::get('/cities/search', [AjaxController::class, 'searchCities']);
    Route::get('/prayer-times/{city:slug}/today', [AjaxController::class, 'prayerTimesToday']);
});

// SEO Routes
Route::get('/sitemap_index.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-dates.xml', [App\Http\Controllers\SitemapController::class, 'dates'])->name('sitemap.dates');
Route::get('/sitemap-prayer.xml', [App\Http\Controllers\SitemapController::class, 'prayer'])->name('sitemap.prayer');
Route::get('/sitemap-surah.xml', [App\Http\Controllers\SitemapController::class, 'surah'])->name('sitemap.surah');
Route::get('/sitemap-hadith.xml', [App\Http\Controllers\SitemapController::class, 'hadith'])->name('sitemap.hadith');
Route::get('/sitemap-pages.xml', [App\Http\Controllers\SitemapController::class, 'pages'])->name('sitemap.pages');
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');


```

## File: app/Models/Author.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/City.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/Comment.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/ContactMessage.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/ContentReview.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentReview extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/Country.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/Dua.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dua extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(DuaCategory::class, 'dua_dua_category');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($dua) {
            // Normalize Arabic text (remove excessive whitespace)
            $normalized = preg_replace('/\s+/', ' ', trim($dua->arabic_text));
            // Generate unique hash to prevent duplicates
            $dua->arabic_text_hash = md5($normalized);
        });
    }
}

```

## File: app/Models/DuaCategory.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuaCategory extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];

    public function duas()
    {
        return $this->belongsToMany(Dua::class, 'dua_dua_category');
    }
}

```

## File: app/Models/FazilatEntry.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FazilatEntry extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/HadithTopic.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HadithTopic extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/HijriDateCache.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HijriDateCache extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/HijriMonth.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HijriMonth extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/HistoricalEvent.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalEvent extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'hijri_day',
        'hijri_month',
        'hijri_year',
        'title',
        'description',
        'source_note',
    ];
}

```

## File: app/Models/IslamicEvent.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicEvent extends Model
{
    protected $guarded = [];

    public function hijriMonth()
    {
        return $this->belongsTo(HijriMonth::class);
    }
}


```

## File: app/Models/IslamicName.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicName extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = [];
}

```

## File: app/Models/PrayerTime.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrayerTime extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/RamadanTiming.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RamadanTiming extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/Scholar.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/SeoMeta.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/SiteSetting.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/Subscriber.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/Surah.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
    protected $guarded = [];

    public function ayahs()
    {
        return $this->hasMany(SurahAyah::class);
    }

    public function reviews()
    {
        return $this->morphMany(ContentReview::class, 'reviewable');
    }
}

```

## File: app/Models/SurahAyah.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurahAyah extends Model
{
    protected $guarded = [];

    //
}


```

## File: app/Models/User.php

```php
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $guarded = [];

    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}


```

## File: app/Models/ZakatConfig.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZakatConfig extends Model
{
    protected $guarded = [];
}

```

## File: app/Http/Controllers/AjaxController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactMessage;
use App\Models\Subscriber;
use App\Models\City;
use App\Models\PrayerTime;

class AjaxController extends Controller
{
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return response()->json(['success' => true, 'message' => 'Your message has been sent successfully.']);
    }

    public function newsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create(['email' => $validated['email']]);

        return response()->json(['success' => true, 'message' => 'You have been subscribed successfully.']);
    }

    public function searchCities(Request $request)
    {
        $query = $request->input('q');
        $cities = City::where('name', 'like', "%{$query}%")->with('country')->limit(10)->get();
        
        return response()->json($cities);
    }

    public function hijriConvert(Request $request)
    {
        $date = $request->query('date');
        $direction = $request->query('direction');

        if (!$date || !in_array($direction, ['g2h', 'h2g'])) {
            return response()->json(['error' => 'Invalid parameters'], 400);
        }

        // Algorithmic approximation for demo purposes.
        // In a real production system, this should use genius-ts/hijri-dates or AlAdhan API.
        if ($direction === 'g2h') {
            $gDate = new \DateTime($date);
            $y = (int)$gDate->format('Y');
            $m = (int)$gDate->format('n');
            $d = (int)$gDate->format('j');
            
            $jd = gregoriantojd($m, $d, $y);
            // Hijri epoch offset is ~1948439.5
            $l = $jd - 1948440 + 10632;
            $n = (int)(($l - 1) / 10631);
            $l = $l - 10631 * $n + 354;
            $j = ((int)((10985 - $l) / 5316)) * ((int)(50 * $l / 17719)) + ((int)($l / 5670)) * ((int)(43 * $l / 15238));
            $l = $l - ((int)((30 - $j) / 15)) * ((int)((17719 * $j) / 50)) - ((int)($j / 16)) * ((int)((15238 * $j) / 43)) + 29;
            $m = (int)(24 * $l / 709);
            $d = $l - (int)(709 * $m / 24);
            $y = 30 * $n + $j - 30;

            $hijriMonths = [
                1 => 'Muharram', 2 => 'Safar', 3 => 'Rabi Al-Awwal', 4 => 'Rabi Al-Thani',
                5 => 'Jumada Al-Awwal', 6 => 'Jumada Al-Thani', 7 => 'Rajab', 8 => 'Shaban',
                9 => 'Ramadan', 10 => 'Shawwal', 11 => 'Dhul Qadah', 12 => 'Dhul Hijjah'
            ];

            $resultText = $gDate->format('d M') . " ≈ " . $d . " " . ($hijriMonths[$m] ?? '') . " " . $y . " AH";
            $resultSubtext = "Gregorian to Hijri (Approximate)";
        } else {
            $parts = explode('-', $date);
            if (count($parts) === 3) {
                $y = (int)$parts[0];
                $m = (int)$parts[1];
                $d = (int)$parts[2];
                $jd = (int)((11 * $y + 3) / 30) + 354 * $y + 30 * $m - (int)(($m - 1) / 2) + $d + 1948440 - 385;
                $gDateArr = cal_from_jd($jd, CAL_GREGORIAN);
                
                $resultText = $d . " " . ($hijriMonths[$m] ?? "Month $m") . " ≈ " . $gDateArr['day'] . " " . $gDateArr['monthname'] . " " . $gDateArr['year'];
                $resultSubtext = "Hijri to Gregorian (Approximate)";
            } else {
                $resultText = "Invalid Date";
                $resultSubtext = "Please check inputs";
            }
        }

        return response()->json([
            'result_text' => $resultText,
            'result_subtext' => $resultSubtext
        ]);
    }

    public function prayerTimesToday(City $city)
    {
        $prayerTimes = PrayerTime::where('city_id', $city->id)
            ->where('date', date('Y-m-d'))
            ->first();

        return response()->json($prayerTimes);
    }
}

```

## File: app/Http/Controllers/Controller.php

```php
<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}

```

## File: app/Http/Controllers/ConverterController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConverterController extends Controller
{
    public function show()
    {
        return view('pages.converter.show');
    }
}

```

## File: app/Http/Controllers/DuaController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuaCategory;
use App\Models\Dua;

class DuaController extends Controller
{
    public function index(Request $request)
    {
        $categories = DuaCategory::all();
        $activeCategory = DuaCategory::with('duas')->where('slug', 'morning-azkar')->first();
        
        if (!$activeCategory) {
            $activeCategory = DuaCategory::with('duas')->first();
        }

        if ($request->has('search') && !empty($request->search)) {
            $activeCategory->setRelation('duas', $activeCategory->duas()->where(function($q) use ($request) {
                $q->where('title_english', 'like', '%' . $request->search . '%')
                  ->orWhere('translation', 'like', '%' . $request->search . '%')
                  ->orWhere('arabic_text', 'like', '%' . $request->search . '%');
            })->get());
        }

        if ($request->ajax()) {
            return view('pages.duas.partials.dua_list', compact('activeCategory'))->render();
        }

        return view('pages.duas.hub', compact('categories', 'activeCategory'));
    }

    public function category(Request $request, $slug)
    {
        $categories = DuaCategory::all();
        $activeCategory = DuaCategory::with('duas')->where('slug', $slug)->firstOrFail();

        if ($request->has('search') && !empty($request->search)) {
            $activeCategory->setRelation('duas', $activeCategory->duas()->where(function($q) use ($request) {
                $q->where('title_english', 'like', '%' . $request->search . '%')
                  ->orWhere('translation', 'like', '%' . $request->search . '%')
                  ->orWhere('arabic_text', 'like', '%' . $request->search . '%');
            })->get());
        }

        if ($request->ajax()) {
            return view('pages.duas.partials.dua_list', compact('activeCategory'))->render();
        }

        return view('pages.duas.hub', compact('categories', 'activeCategory'));
    }

    public function show($category_slug, $seo_slug)
    {
        $category = DuaCategory::where('slug', $category_slug)->firstOrFail();
        $dua = Dua::where('seo_slug', $seo_slug)->whereHas('categories', function($q) use ($category) {
            $q->where('dua_categories.id', $category->id);
        })->firstOrFail();

        // SEO Strategy: Fetch 4 to 6 related duas from the same category to build an internal linking graph
        $relatedDuas = Dua::whereHas('categories', function($q) use ($category) {
            $q->where('dua_categories.id', $category->id);
        })
        ->where('id', '!=', $dua->id)
        ->inRandomOrder()
        ->limit(6)
        ->get();

        return view('pages.duas.show', compact('category', 'dua', 'relatedDuas'));
    }
}

```

## File: app/Http/Controllers/FazilatController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surah;

class FazilatController extends Controller
{
    public function show(Surah $surah)
    {
        $surah->load(['fazilatEntries', 'reviews.scholar']);
        return view('pages.fazilat.show', compact('surah'));
    }
}

```

## File: app/Http/Controllers/HadithController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HadithTopic;

class HadithController extends Controller
{
    public function index()
    {
        $topics = HadithTopic::all();
        return view('pages.hadith.index', compact('topics'));
    }

    public function show(HadithTopic $topic)
    {
        return view('pages.hadith.show', compact('topic'));
    }
}

```

## File: app/Http/Controllers/HomeController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteSetting;
use App\Models\City;
use App\Models\HijriDateCache;
use App\Models\PrayerTime;

class HomeController extends Controller
{
    public function index()
    {
        // Get the default city from settings, or fallback to first city
        $defaultCityId = SiteSetting::where('key', 'default_city_id')->value('value');
        $city = City::find($defaultCityId) ?? City::first();

        // Get Hijri Date for today
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();

        // Get Prayer times for today for the default city
        $prayerTimes = null;
        if ($city) {
            $prayerTimes = PrayerTime::where('city_id', $city->id)
                ->where('date', date('Y-m-d'))
                ->first();
        }

        return view('home', compact('city', 'hijriDate', 'prayerTimes'));
    }
}

```

## File: app/Http/Controllers/IslamicDateController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\HijriDateCache;
use App\Models\HistoricalEvent;
use App\Models\IslamicEvent;
use App\Models\HijriMonth;

class IslamicDateController extends Controller
{
    private function getTodayEvents($hijriDate)
    {
        if (!$hijriDate) return collect();
        return HistoricalEvent::where('hijri_day', $hijriDate->hijri_day)
            ->where('hijri_month', $hijriDate->hijri_month)
            ->get();
    }

    private function getMoonPhase($hijriDay)
    {
        if (!$hijriDay) return ['name' => 'Unknown', 'icon' => 'fa-moon', 'description' => ''];
        
        $hijriDay = (int) $hijriDay;
        if ($hijriDay >= 1 && $hijriDay <= 3) return ['name' => 'Waxing Crescent', 'icon' => 'fa-moon', 'description' => 'The moon is beginning to illuminate.'];
        if ($hijriDay >= 4 && $hijriDay <= 6) return ['name' => 'First Quarter', 'icon' => 'fa-adjust', 'description' => 'Half of the moon is visible.'];
        if ($hijriDay >= 7 && $hijriDay <= 12) return ['name' => 'Waxing Gibbous', 'icon' => 'fa-moon', 'description' => 'Most of the moon is illuminated.'];
        if ($hijriDay >= 13 && $hijriDay <= 15) return ['name' => 'Full Moon', 'icon' => 'fa-circle', 'description' => 'The moon is fully illuminated. (Ayyam al-Bid)'];
        if ($hijriDay >= 16 && $hijriDay <= 21) return ['name' => 'Waning Gibbous', 'icon' => 'fa-moon', 'description' => 'Illumination is decreasing.'];
        if ($hijriDay >= 22 && $hijriDay <= 25) return ['name' => 'Last Quarter', 'icon' => 'fa-adjust', 'description' => 'Half of the moon is visible, decreasing.'];
        return ['name' => 'Waning Crescent', 'icon' => 'fa-moon', 'description' => 'Only a sliver of the moon is visible.'];
    }

    private function getUpcomingEvents($currentHijriDate)
    {
        if (!$currentHijriDate) return collect();
        
        $currentMonth = HijriMonth::where('name_en', $currentHijriDate->hijri_month)
            ->orWhere('name_ar', $currentHijriDate->hijri_month)
            ->first();
            
        if (!$currentMonth) return collect();
        
        $currentMonthId = $currentMonth->id;
        $currentDay = $currentHijriDate->hijri_day;

        $events = IslamicEvent::with('hijriMonth')->get();
        
        $events = $events->map(function ($event) use ($currentMonthId, $currentDay) {
            $monthDiff = $event->hijri_month_id - $currentMonthId;
            if ($monthDiff < 0) {
                $monthDiff += 12; // Next year
            }
            $dayDiff = $event->hijri_day - $currentDay;
            $daysAway = ($monthDiff * 29.5) + $dayDiff;
            
            if ($daysAway < 0) {
                $daysAway += 354; 
            }
            
            $event->days_away = round($daysAway);
            return $event;
        })->filter(function($event) {
            return $event->days_away >= 0;
        })->sortBy('days_away')->values();

        return $events->take(3);
    }

    private function getMonthlyCalendar($currentHijriDate)
    {
        if (!$currentHijriDate) return collect();
        
        return HijriDateCache::where('hijri_month', $currentHijriDate->hijri_month)
            ->where('hijri_year', $currentHijriDate->hijri_year)
            ->orderBy('hijri_day', 'asc')
            ->get();
    }
    
    private function isFastingDay($gregorianDate, $hijriDay)
    {
        $fastingDays = [];
        $dayOfWeek = date('l', strtotime($gregorianDate));
        
        if ($dayOfWeek === 'Monday' || $dayOfWeek === 'Thursday') {
            $fastingDays[] = 'Sunnah Fasting (' . $dayOfWeek . ')';
        }
        
        if (in_array($hijriDay, [13, 14, 15])) {
            $fastingDays[] = 'Ayyam al-Bid (White Days)';
        }
        
        return $fastingDays;
    }

    public function hub()
    {
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();
        $countries = Country::get();
        $historicalEvents = $this->getTodayEvents($hijriDate);
        
        $moonPhase = $this->getMoonPhase($hijriDate ? $hijriDate->hijri_day : null);
        $upcomingEvents = $this->getUpcomingEvents($hijriDate);
        $monthlyCalendar = $this->getMonthlyCalendar($hijriDate);
        $fastingDays = $hijriDate ? $this->isFastingDay($hijriDate->gregorian_date, $hijriDate->hijri_day) : [];

        return view('pages.islamic-date.hub', compact('hijriDate', 'countries', 'historicalEvents', 'moonPhase', 'upcomingEvents', 'monthlyCalendar', 'fastingDays'));
    }

    public function country(Country $country)
    {
        $hijriDate = HijriDateCache::where('gregorian_date', date('Y-m-d'))->first();
        $historicalEvents = $this->getTodayEvents($hijriDate);
        
        $moonPhase = $this->getMoonPhase($hijriDate ? $hijriDate->hijri_day : null);
        $upcomingEvents = $this->getUpcomingEvents($hijriDate);
        $monthlyCalendar = $this->getMonthlyCalendar($hijriDate);
        $fastingDays = $hijriDate ? $this->isFastingDay($hijriDate->gregorian_date, $hijriDate->hijri_day) : [];

        return view('pages.islamic-date.country', compact('hijriDate', 'country', 'historicalEvents', 'moonPhase', 'upcomingEvents', 'monthlyCalendar', 'fastingDays'));
    }

}

```

## File: app/Http/Controllers/IslamicEventsController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HijriMonth;

class IslamicEventsController extends Controller
{
    public function index()
    {
        $months = HijriMonth::orderBy('month_number')->get();
        return view('pages.events.index', compact('months'));
    }

    public function month(HijriMonth $hijri_month)
    {
        $hijri_month->events = \App\Models\HistoricalEvent::where('hijri_month', $hijri_month->name_en)->get();
        return view('pages.events.month', compact('hijri_month'));
    }
}

```

## File: app/Http/Controllers/IslamicNameController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IslamicName;

class IslamicNameController extends Controller
{
    public function index()
    {
        $popularNames = IslamicName::where('is_verified', true)
                                   ->orderBy('favorited_count', 'desc')
                                   ->take(12)
                                   ->get();
        return view('pages.names.hub', compact('popularNames'));
    }

    public function gender($gender)
    {
        $names = IslamicName::where('gender', $gender)
                            ->where('is_verified', true)
                            ->paginate(50);
        return view('pages.names.hub', compact('names', 'gender'));
    }

    public function show($slug)
    {
        $name = IslamicName::where('slug', $slug)->firstOrFail();
        return view('pages.names.show', compact('name'));
    }
}

```

## File: app/Http/Controllers/PageController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}

```

## File: app/Http/Controllers/PrayerTimesController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\PrayerTime;

class PrayerTimesController extends Controller
{
    public function hub()
    {
        $cities = City::get();
        return view('pages.prayer-times.hub', compact('cities'));
    }

    public function city(City $city)
    {
        $prayerTimes = PrayerTime::where('city_id', $city->id)
            ->where('date', '>=', date('Y-m-d'))
            ->orderBy('date', 'asc')
            ->limit(30)
            ->get();
            
        return view('pages.prayer-times.city', compact('city', 'prayerTimes'));
    }
}

```

## File: app/Http/Controllers/SitemapController.php

```php
<?php

namespace App\Http\Controllers;

use App\Models\Surah;
use App\Models\City;
use App\Models\HadithTopic;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function dates()
    {
        $countries = \App\Models\Country::all();
        return response()->view('sitemap.dates', ['countries' => $countries])->header('Content-Type', 'text/xml');
    }

    public function prayer()
    {
        $cities = City::limit(200)->get();
        return response()->view('sitemap.prayer', ['cities' => $cities])->header('Content-Type', 'text/xml');
    }

    public function surah()
    {
        $surahs = Surah::all();
        return response()->view('sitemap.surah', ['surahs' => $surahs])->header('Content-Type', 'text/xml');
    }

    public function hadith()
    {
        $topics = HadithTopic::all();
        return response()->view('sitemap.hadith', ['topics' => $topics])->header('Content-Type', 'text/xml');
    }

    public function pages()
    {
        return response()->view('sitemap.pages')->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /ajax/\n";
        $content .= "Disallow: /*?page=\n";
        $content .= "Disallow: /*?sort=\n";
        $content .= "Sitemap: " . url('sitemap_index.xml') . "\n";

        return response($content)->header('Content-Type', 'text/plain');
    }
}

```

## File: app/Http/Controllers/SurahController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surah;

class SurahController extends Controller
{
    public function show(Surah $surah)
    {
        $surah->load(['ayahs', 'reviews.scholar']);
        return view('pages.surah.show', compact('surah'));
    }
}

```

## File: app/Http/Controllers/TasbeehController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasbeehController extends Controller
{
    public function index()
    {
        return view('pages.tasbeeh.tracker');
    }
}

```

## File: app/Http/Controllers/ZakatController.php

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ZakatConfig;

class ZakatController extends Controller
{
    public function index()
    {
        $config = ZakatConfig::first() ?? new ZakatConfig(['gold_price_per_gram' => 20000, 'silver_price_per_gram' => 250, 'currency_code' => 'PKR']);
        return view('pages.zakat.calculator', compact('config'));
    }

    public function country($country)
    {
        // Simple mock for specific country
        $config = ZakatConfig::first() ?? new ZakatConfig(['gold_price_per_gram' => 20000, 'silver_price_per_gram' => 250, 'currency_code' => strtoupper($country) == 'PAKISTAN' ? 'PKR' : 'USD']);
        return view('pages.zakat.calculator', compact('config', 'country'));
    }
}

```

## File: resources/views/layouts/app.blade.php

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ur' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'نورِ اسلام | Noor-e-Islam')</title>
    <meta name="description" content="@yield('meta_description', 'Noor-e-Islam: Accurate Islamic knowledge, prayer times, and Quran.')">

    <!-- SEO Canonical and Hreflang -->
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="canonical" href="{{ url()->current() }}">
    @php
        $currentRouteName = Route::currentRouteName();
        $routeParams = Route::current() ? Route::current()->parameters() : [];
    @endphp
    @if($currentRouteName)
        <link rel="alternate" hreflang="x-default" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => null])) }}" />
        <link rel="alternate" hreflang="en" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => null])) }}" />
        <link rel="alternate" hreflang="ur" href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'ur'])) }}" />
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div class="top-bar">
        <div class="top-bar-inner">
            <div class="top-bar-left">
                <span class="hijri-date"><i class="fas fa-moon"></i> {{ isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '١٥ جمادی الثانی ۱۴۴۶' }}</span>
                <span><i class="fas fa-map-marker-alt"></i> {{ isset($city) ? $city->name : 'مکہ مکرمہ' }}</span>
            </div>
            <div class="top-bar-right">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon"><i class="fas fa-mosque"></i></div>
                <div class="logo-text">
                    <span class="logo-text-ar">نورِ اسلام</span>
                    <span class="logo-text-en">Noor-e-Islam</span>
                </div>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('islamic-date.hub') }}" class="{{ request()->routeIs('islamic-date.*') ? 'active' : '' }}">Islamic Date</a></li>
                <li><a href="{{ route('prayer-times.hub') }}" class="{{ request()->routeIs('prayer-times.*') ? 'active' : '' }}">Prayer Times</a></li>
                <li><a href="{{ route('names.index') }}" class="{{ request()->routeIs('names.*') ? 'active' : '' }}">Islamic Names</a></li>
                <li><a href="{{ route('duas.index') }}" class="{{ request()->routeIs('duas.*') ? 'active' : '' }}">Daily Duas</a></li>
                <li><a href="{{ route('zakat.index') }}" class="{{ request()->routeIs('zakat.*') ? 'active' : '' }}">Zakat</a></li>
                <li><a href="{{ route('tasbeeh.index') }}" class="{{ request()->routeIs('tasbeeh.*') ? 'active' : '' }}">Tasbeeh</a></li>
            </ul>
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <div class="mobile-overlay" id="mobileOverlay"></div>

    <main>
        @yield('content')
    </main>

<footer class="footer">
        <div class="footer-pattern"></div>
        <div class="footer-top">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="{{ route('home') }}" class="logo">
                        <div class="logo-icon"
                            style="background:linear-gradient(135deg,var(--primary),var(--primary-light))"><i
                                class="fas fa-mosque"></i></div>
                        <div class="logo-text"><span class="logo-text-ar">نورِ اسلام</span><span
                                class="logo-text-en">Noor-e-Islam</span></div>
                    </a>
                    <p>Enlightening hearts and minds through authentic Islamic knowledge. Join us on the path of faith,
                        wisdom, and community.</p>
                    <div class="footer-newsletter">
                        <input type="email" placeholder="Your email address" id="newsletterEmail">
                        <button id="newsletterBtn" aria-label="Subscribe"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('islamic-date.hub') }}"><i class="fas fa-chevron-right"></i> Islamic Date</a></li>
                        <li><a href="{{ route('names.index') }}"><i class="fas fa-chevron-right"></i> Islamic Names</a></li>
                        <li><a href="{{ route('zakat.index') }}"><i class="fas fa-chevron-right"></i> Zakat Calculator</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="{{ route('prayer-times.hub') }}"><i class="fas fa-chevron-right"></i> Prayer Times</a></li>
                        <li><a href="{{ route('duas.index') }}"><i class="fas fa-chevron-right"></i> Daily Duas</a></li>
                        <li><a href="{{ route('tasbeeh.index') }}"><i class="fas fa-chevron-right"></i> Tasbeeh Tracker</a></li>
                        <li><a href="{{ route('events.index') }}"><i class="fas fa-chevron-right"></i> Islamic Calendar</a></li>
                        <li><a href="{{ route('hadith.index') }}"><i class="fas fa-chevron-right"></i> Hadith Collection</a></li>
                        <li><a href="{{ route('converter.show') }}"><i class="fas fa-chevron-right"></i> Date Converter</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Prayer Times</h4>
                    <div class="footer-prayer-times">
                        @if(isset($prayerTimes))
                            <div class="footer-prayer-item"><span class="fp-name">Fajr</span><span class="fp-time">{{ \Carbon\Carbon::parse($prayerTimes->fajr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Sunrise</span><span class="fp-time">{{ \Carbon\Carbon::parse($prayerTimes->sunrise)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Dhuhr</span><span class="fp-time">{{ \Carbon\Carbon::parse($prayerTimes->dhuhr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Asr</span><span class="fp-time">{{ \Carbon\Carbon::parse($prayerTimes->asr)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Maghrib</span><span class="fp-time">{{ \Carbon\Carbon::parse($prayerTimes->maghrib)->format('h:i A') }}</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Isha</span><span class="fp-time">{{ \Carbon\Carbon::parse($prayerTimes->isha)->format('h:i A') }}</span></div>
                        @else
                            <div class="footer-prayer-item"><span class="fp-name">Fajr</span><span class="fp-time">05:12 AM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Sunrise</span><span class="fp-time">06:28 AM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Dhuhr</span><span class="fp-time">12:35 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Asr</span><span class="fp-time">04:02 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Maghrib</span><span class="fp-time">06:48 PM</span></div>
                            <div class="footer-prayer-item"><span class="fp-name">Isha</span><span class="fp-time">08:15 PM</span></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-inner">
                <p>&copy; 2025 <a href="{{ route('home') }}">Noor-e-Islam</a>. All rights reserved. Made with love for the Ummah.</p>
                <div class="footer-bottom-links">
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="#">Terms of Use</a>
                    <a href="{{ route('sitemap.index') }}">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <button class="back-to-top" id="backToTop" aria-label="Back to top"><i class="fas fa-chevron-up"></i></button>

    <div class="toast-container" id="toastContainer"></div>

    <script>
        // Mobile Menu
        var mobileToggle = document.getElementById('mobileToggle');
        var navLinks = document.getElementById('navLinks');
        var mobileOverlay = document.getElementById('mobileOverlay');

        function toggleMenu() {
            mobileToggle.classList.toggle('active');
            navLinks.classList.toggle('open');
            mobileOverlay.classList.toggle('show');
            document.body.style.overflow = navLinks.classList.contains('open') ? 'hidden' : '';
        }
        mobileToggle.addEventListener('click', toggleMenu);
        mobileOverlay.addEventListener('click', toggleMenu);

        document.querySelectorAll('.nav-links a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (navLinks.classList.contains('open')) toggleMenu();
            });
        });

        // Navbar scroll effect
        var navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Active nav link on scroll
        var sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', function () {
            var scrollPos = window.scrollY + 140;
            sections.forEach(function (section) {
                var top = section.offsetTop;
                var height = section.offsetHeight;
                var id = section.getAttribute('id');
                var link = document.querySelector('.nav-links a[href="#' + id + '"]');
                if (link) {
                    if (scrollPos >= top && scrollPos < top + height) {
                        document.querySelectorAll('.nav-links a').forEach(function (a) { a.classList.remove('active'); });
                        link.classList.add('active');
                    }
                }
            });
        });

        // Quran Carousel
        var slides = document.querySelectorAll('.quran-verse-slide');
        var currentSlide = 0;
        var dotsContainer = document.getElementById('quranDots');
        var autoPlay;

        slides.forEach(function (_, i) {
            var dot = document.createElement('button');
            dot.className = 'quran-carousel-dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Verse ' + (i + 1));
            dot.addEventListener('click', function () { goToSlide(i); });
            dotsContainer.appendChild(dot);
        });

        function goToSlide(index) {
            slides[currentSlide].classList.remove('active');
            dotsContainer.children[currentSlide].classList.remove('active');
            currentSlide = (index + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dotsContainer.children[currentSlide].classList.add('active');
            clearInterval(autoPlay);
            autoPlay = setInterval(function () { goToSlide(currentSlide + 1); }, 6000);
        }

        document.getElementById('quranPrev').addEventListener('click', function () { goToSlide(currentSlide - 1); });
        document.getElementById('quranNext').addEventListener('click', function () { goToSlide(currentSlide + 1); });
        autoPlay = setInterval(function () { goToSlide(currentSlide + 1); }, 6000);

        // Learn Tabs
        var learnTabs = document.querySelectorAll('.learn-tab');
        var learnImage = document.getElementById('learnImage');
        var learnImages = [
            'https://picsum.photos/seed/quran-study-room/700/600.jpg',
            'https://picsum.photos/seed/hadith-books-old/700/600.jpg',
            'https://picsum.photos/seed/islamic-law-study/700/600.jpg',
            'https://picsum.photos/seed/spiritual-mosque-light/700/600.jpg'
        ];
        learnTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                learnTabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                learnImage.style.opacity = '0';
                setTimeout(function () {
                    learnImage.src = learnImages[parseInt(tab.dataset.tab)];
                    learnImage.style.opacity = '1';
                }, 200);
            });
        });

        // Prayer Times - highlight current
        (function () {
            var now = new Date();
            var mins = now.getHours() * 60 + now.getMinutes();
            var times = [312, 388, 755, 962, 1008, 1215];
            var active = 0;
            for (var i = times.length - 1; i >= 0; i--) {
                if (mins >= times[i]) { active = i; break; }
            }
            var chips = document.querySelectorAll('.prayer-time-chip');
            chips.forEach(function (c, idx) {
                c.classList.toggle('active', idx === active);
            });
        })();

        // Toast
        function showToast(msg, type) {
            var container = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast ' + (type || '');
            var icon = type === 'success' ? 'fa-check-circle' : 'fa-info-circle';
            toast.innerHTML = '<i class="fas ' + icon + '"></i><span>' + msg + '</span>';
            container.appendChild(toast);
            setTimeout(function () { toast.classList.add('show'); }, 30);
            setTimeout(function () {
                toast.classList.remove('show');
                setTimeout(function () { toast.remove(); }, 300);
            }, 3500);
        }

        // Contact Form
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var fname = document.getElementById('fname').value.trim();
            var email = document.getElementById('email').value.trim();
            var message = document.getElementById('message').value.trim();
            if (!fname || !email || !message) { showToast('Please fill in all required fields.'); return; }
            var btn = this.querySelector('.form-submit');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            btn.disabled = true;
            var self = this;
            setTimeout(function () {
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
                btn.disabled = false;
                self.reset();
                showToast('JazakAllah Khair! Your message has been sent successfully.', 'success');
            }, 1500);
        });

        // Newsletter
        document.getElementById('newsletterBtn').addEventListener('click', function () {
            var email = document.getElementById('newsletterEmail').value.trim();
            if (!email || !email.includes('@')) { showToast('Please enter a valid email address.'); return; }
            document.getElementById('newsletterEmail').value = '';
            showToast('BarakAllahu Feekum! You have been subscribed.', 'success');
        });

        // Back to Top
        var backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', function () {
            backToTop.classList.toggle('visible', window.scrollY > 500);
        });
        backToTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({ top: target.offsetTop - navbar.offsetHeight - 8, behavior: 'smooth' });
                }
            });
        });

        // Service links & event cards
        document.querySelectorAll('.service-link').forEach(function (l) {
            l.addEventListener('click', function (e) { e.preventDefault(); showToast('Course details page coming soon.'); });
        });
        document.querySelectorAll('.event-card').forEach(function (c) {
            c.style.cursor = 'pointer';
            c.addEventListener('click', function () { showToast('Event registration page coming soon.'); });
        });
        document.querySelector('.play-btn').addEventListener('click', function () {
            showToast('Video feature will be available soon, InshaAllah.');
        });
    </script>
</body>
</html>

```

## File: resources/views/pages/about.blade.php

```html
@extends('layouts.app')

@section('title', 'About Us — Noor-e-Islam')
@section('meta_description', 'Learn about Noor-e-Islam, our mission to provide accurate Islamic timings, authentic Quranic resources, and reliable Hijri dates for Muslims worldwide.')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">About Us</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-info-circle"></i> Info</div>
            <h1 class="section-title">About <span>Noor-e-Islam</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Our Mission and Vision</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-family: 'Amiri', serif;">Our Purpose</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px;">
                    Noor-e-Islam is dedicated to serving the global Muslim ummah by providing accurate, accessible, and authentic Islamic resources. In an increasingly digital world, having a reliable source for daily prayers, authentic Quranic translations, and precise Hijri calendar dates is essential.
                </p>

                <h3 style="color: var(--gold); margin-bottom: 20px;"><i class="fas fa-gift" style="margin-right: 10px;"></i> What We Provide</h3>
                <ul style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 20px; list-style-type: square;">
                    <li style="margin-bottom: 10px;"><strong>Accurate Prayer Times:</strong> Calculated using recognized astronomical methods tailored to your exact city.</li>
                    <li style="margin-bottom: 10px;"><strong>Hijri Calendar & Events:</strong> Stay updated with important Islamic dates and observances.</li>
                    <li style="margin-bottom: 10px;"><strong>Quranic Resources:</strong> Read and listen to the Holy Quran with translations in Urdu and English.</li>
                    <li style="margin-bottom: 10px;"><strong>Authentic Hadith:</strong> Explore carefully categorized traditions of the Prophet Muhammad (PBUH).</li>
                </ul>

                <h3 style="color: var(--primary); margin-bottom: 20px;"><i class="fas fa-shield-alt" style="margin-right: 10px;"></i> Our Commitment to Authenticity</h3>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555;">
                    We take the responsibility of sharing Islamic knowledge very seriously. All our Surah virtues (Fazilat) and Hadith references are reviewed against major, authentic collections. Where an established popular virtue is cited, we clearly label its scholarly consensus status.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/contact.blade.php

```html
@extends('layouts.app')

@section('title', 'Contact Us — Noor-e-Islam')
@section('meta_description', 'Get in touch with Noor-e-Islam. Have questions about our prayer times, Surah resources, or Islamic calendar? Contact our team.')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
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

```

## File: resources/views/pages/converter/show.blade.php

```html
@extends('layouts.app')

@section('title', 'Hijri to Gregorian Date Converter — Accurate Islamic Calendar')
@section('meta_description', 'Convert dates between the Islamic Hijri calendar and the Gregorian calendar. Find out the Islamic date for your birthday, anniversaries, or important events.')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
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

```

## File: resources/views/pages/duas/category.blade.php

```html
@extends('layouts.app')

@section('title', $category->name_english . ' - Duas')

@section('content')
<style>
    .dua-detail-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    .dua-detail-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; bottom: 0; width: 4px;
        background: linear-gradient(180deg, var(--primary), var(--primary-light));
    }
    .dua-title-box {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .dua-number {
        width: 40px; height: 40px;
        background: rgba(var(--primary-rgb), 0.1);
        color: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.1rem;
    }
    .dua-detail-title {
        color: var(--primary-dark);
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        flex: 1;
    }
    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2.8rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.8;
        margin-bottom: 30px;
        text-align: right;
        background: linear-gradient(135deg, var(--primary-dark), #111);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .transliteration-box {
        background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.08), rgba(var(--gold-rgb), 0.02));
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 25px;
        border-left: 4px solid var(--gold);
        position: relative;
    }
    .box-label {
        color: var(--gold);
        margin-bottom: 8px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .transliteration-text {
        color: #444;
        font-size: 1.2rem;
        line-height: 1.6;
        margin: 0;
        font-style: italic;
    }
    .translation-box {
        margin-bottom: 25px;
    }
    .translation-label {
        color: var(--primary);
        margin-bottom: 8px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .translation-text {
        color: #555;
        font-size: 1.2rem;
        line-height: 1.7;
        margin: 0;
    }
    .reference-tag {
        font-size: 0.9rem;
        color: #888;
        background: #f9f9f9;
        padding: 8px 15px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 1px solid #eee;
    }
</style>

<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 30px;">
            <a href="{{ route('duas.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-arrow-left"></i> Back to Categories</a>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas {{ $category->icon_class ?? 'fa-praying-hands' }}"></i> Category</div>
            <h1 class="section-title"><span>{{ $category->name_english }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle" style="font-family: 'Amiri', serif; font-size: 2rem; color: var(--gold); margin-top: 10px;">{{ $category->name_urdu }}</p>
        </div>

        <!-- OUTPUT CARD: Duas List -->
        <div style="display: grid; grid-template-columns: 1fr; gap: 35px; max-width: 900px; margin: 0 auto;">
            @forelse($category->duas as $index => $dua)
            <div class="dua-detail-card">
                <div class="dua-title-box">
                    <div class="dua-number">{{ $index + 1 }}</div>
                    <h3 class="dua-detail-title">{{ $dua->title_english }}</h3>
                </div>
                
                <div class="dua-arabic" dir="rtl">
                    {{ $dua->arabic_text }}
                </div>
                
                <div class="transliteration-box">
                    <div class="box-label"><i class="fas fa-language"></i> Transliteration</div>
                    <p class="transliteration-text">{{ $dua->transliteration }}</p>
                </div>

                <div class="translation-box">
                    <div class="translation-label"><i class="fas fa-book-reader"></i> Translation</div>
                    <p class="translation-text">{{ $dua->translation }}</p>
                </div>
                
                @if($dua->reference_source)
                <div style="margin-top: 25px; padding-top: 20px; border-top: 1px dashed #eee;">
                    <span class="reference-tag"><i class="fas fa-bookmark" style="color: var(--gold);"></i> {{ $dua->reference_source }}</span>
                </div>
                @endif
            </div>
            @empty
            <div style="text-align: center; padding: 60px; background: white; border-radius: 20px; border: 1px dashed #ddd;">
                <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 20px; color: #ccc;"></i>
                <h4 style="color: #777; font-size: 1.2rem;">No duas found in this category yet.</h4>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $category->name_english }} Duas",
      "description": "Authentic daily duas for {{ $category->name_english }}."
    }
  ]
}
</script>
@endsection

```

## File: resources/views/pages/duas/hub.blade.php

```html
@extends('layouts.app')

@section('title', 'Daily Duas & Azkar')

@section('content')
<style>
    .category-pills {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        padding-bottom: 10px;
        margin-bottom: 25px;
        scrollbar-width: none; /* Hide scrollbar for cleaner look */
    }
    .category-pills::-webkit-scrollbar {
        display: none;
    }
    .cat-pill {
        white-space: nowrap;
        padding: 8px 16px;
        border-radius: 8px;
        background: transparent;
        color: #666;
        font-weight: 500;
        font-size: 0.95rem;
        text-decoration: none;
        border: 1px solid #e0e0e0;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .cat-pill:hover {
        background: #f8f9fa;
        border-color: #ccc;
        color: var(--primary-dark);
    }
    .cat-pill.active {
        background: rgba(var(--primary-rgb), 0.05);
        color: var(--primary);
        border-color: var(--primary);
        font-weight: 600;
    }
    .dua-loader {
        display: none;
        text-align: center;
        padding: 40px;
        color: var(--gold);
        font-size: 2rem;
    }
</style>

<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-praying-hands"></i> Hisnul Muslim</div>
            <h1 class="section-title">Daily <span>Duas & Azkar</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Authentic supplications from the Quran and Sunnah. Filter by category or search below.</p>
            
            <div style="max-width: 600px; margin: 30px auto 0; position: relative;">
                <input type="text" id="dua-search" placeholder="Search duas by title, arabic, or translation..." 
                       style="width: 100%; padding: 15px 25px 15px 50px; border-radius: 50px; border: 1px solid #ddd; font-size: 1rem; outline: none; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
                <i class="fas fa-search" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #aaa; font-size: 1.1rem;"></i>
            </div>
        </div>

        <!-- CATEGORY NAVIGATION -->
        <div class="category-pills">
            @foreach($categories as $cat)
                <a href="{{ route('duas.category', $cat->slug) }}" 
                   class="cat-pill {{ ($activeCategory && $activeCategory->id === $cat->id) ? 'active' : '' }}"
                   data-slug="{{ $cat->slug }}">
                    <i class="fas {{ $cat->icon_class ?? 'fa-book-open' }}"></i> {{ $cat->name_english }}
                </a>
            @endforeach
        </div>

        <!-- AJAX CONTAINER -->
        <div id="dua-loader" class="dua-loader">
            <i class="fas fa-circle-notch fa-spin"></i>
        </div>
        
        <div id="dua-container">
            @if($activeCategory)
                @include('pages.duas.partials.dua_list', ['activeCategory' => $activeCategory])
            @endif
        </div>

    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Daily Duas & Azkar",
      "description": "Authentic daily duas and azkar from Hisnul Muslim."
    }
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pills = document.querySelectorAll('.cat-pill');
    const container = document.getElementById('dua-container');
    const loader = document.getElementById('dua-loader');
    const searchInput = document.getElementById('dua-search');
    let searchTimeout;
    
    // Function to fetch data
    const fetchDuas = (url, query = '') => {
        container.style.display = 'none';
        loader.style.display = 'block';

        const fetchUrl = query ? `${url}?search=${encodeURIComponent(query)}` : url;

        fetch(fetchUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            container.innerHTML = html;
            loader.style.display = 'none';
            container.style.display = 'block';
        })
        .catch(err => {
            console.error(err);
            loader.style.display = 'none';
            container.style.display = 'block';
        });
    };

    // Category click
    pills.forEach(pill => {
        pill.addEventListener('click', function(e) {
            e.preventDefault();
            const url = this.getAttribute('href');
            
            pills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');

            window.history.pushState({}, '', url);
            
            // Clear search when switching categories
            searchInput.value = '';
            fetchDuas(url);
        });
    });

    // Search input
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        searchTimeout = setTimeout(() => {
            // Get active category URL, or default to current URL
            let activePill = document.querySelector('.cat-pill.active');
            let url = activePill ? activePill.getAttribute('href') : window.location.href.split('?')[0];
            
            fetchDuas(url, query);
        }, 300); // 300ms debounce
    });
});
</script>
@endsection

```

## File: resources/views/pages/duas/partials/dua_list.blade.php

```html
<style>
    .dua-list-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
        border: 1px solid #eaeaea;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
        display: block;
        text-decoration: none;
        color: inherit;
    }
    .dua-list-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-color: #d0d0d0;
    }
    .dua-list-title {
        color: var(--primary-dark);
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .dua-list-arabic {
        font-family: 'Amiri', serif;
        font-size: 1.5rem;
        color: var(--primary-dark);
        text-align: right;
        line-height: 1.5;
        margin-bottom: 12px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    .dua-list-translation {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
    <h2 style="color: var(--primary-dark); margin: 0; font-size: 1.25rem; font-weight: 600;">
        <i class="fas {{ $activeCategory->icon_class ?? 'fa-list' }}" style="color: var(--primary); margin-right: 8px;"></i>
        {{ $activeCategory->name_english }}
    </h2>
    <span style="color: #888; font-size: 0.85rem; font-weight: 500;">
        {{ $activeCategory->duas->count() }} Duas
    </span>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 15px;">
    @forelse($activeCategory->duas as $index => $dua)
        <a href="{{ route('duas.show', ['category' => $activeCategory->slug, 'seo_slug' => $dua->seo_slug ?? $dua->id]) }}" class="dua-list-card">
            <div class="dua-list-title">
                <span style="background: rgba(var(--primary-rgb), 0.1); color: var(--primary); width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.85rem;">{{ $index + 1 }}</span>
                {{ $dua->title_english }}
            </div>
            <div class="dua-list-arabic" dir="rtl">
                {{ $dua->arabic_text }}
            </div>
            <p class="dua-list-translation">{{ $dua->translation }}</p>
        </a>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: #fff; border-radius: 16px; border: 1px dashed #ddd;">
            <i class="fas fa-search" style="font-size: 3rem; color: #ccc; margin-bottom: 15px;"></i>
            <p style="color: #888;">No duas found in this category.</p>
        </div>
    @endforelse
</div>

```

## File: resources/views/pages/duas/show.blade.php

```html
@extends('layouts.app')

@section('title', $dua->title_english . ' - ' . $category->name_english)

@section('content')
<style>
    .dua-detail-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 25px;
        position: relative;
        overflow: hidden;
    }
    .dua-detail-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--gold), var(--primary-light));
    }
    .dua-arabic {
        font-family: 'Amiri', serif;
        font-size: 2rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.6;
        margin-bottom: 25px;
        text-align: right;
        background: linear-gradient(135deg, var(--primary-dark), #111);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .transliteration-box {
        background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.05), rgba(var(--gold-rgb), 0.01));
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 3px solid var(--gold);
        position: relative;
    }
    .box-label {
        color: var(--gold);
        margin-bottom: 8px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .transliteration-text {
        color: #444;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0;
        font-style: italic;
    }
    .translation-box {
        margin-bottom: 20px;
    }
    .translation-label {
        color: var(--primary);
        margin-bottom: 8px;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .translation-text {
        color: #555;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }
    .reference-tag {
        font-size: 0.75rem;
        color: #888;
        background: #f9f9f9;
        padding: 6px 12px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid #eee;
        font-weight: 500;
    }
    .breadcrumb-wrapper {
        display: flex;
        justify-content: center;
        margin-bottom: 25px;
    }
    .breadcrumb-nav {
        display: inline-flex;
        align-items: center;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 50px;
        padding: 8px 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }
    .breadcrumb-nav a {
        color: #666;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: color 0.2s;
    }
    .breadcrumb-nav a:hover {
        color: var(--primary);
    }
    .breadcrumb-nav .separator {
        color: #ccc;
        margin: 0 10px;
        font-size: 0.7rem;
    }
    .breadcrumb-nav .current-page {
        color: var(--primary);
        font-weight: 600;
    }
</style>

<section class="section services-section" style="padding-top: 100px;">
    <div class="section-inner">
        <div class="breadcrumb-wrapper">
            <div class="breadcrumb-nav">
                <a href="{{ route('duas.index') }}" class="parent-link"><i class="fas fa-book-open" style="margin-right: 5px;"></i> Duas Library</a>
                <i class="fas fa-chevron-right separator"></i>
                <a href="{{ route('duas.category', $category->slug) }}" class="current-page">{{ $category->name_english }}</a>
            </div>
        </div>

        <div style="max-width: 750px; margin: 0 auto;">
            <h1 style="color: var(--primary-dark); font-size: 1.8rem; margin-bottom: 30px; text-align: center;">{{ $dua->title_english }}</h1>

            <div class="dua-detail-card">
                <div class="dua-arabic" dir="rtl">
                    {{ $dua->arabic_text }}
                </div>
                
                <div class="transliteration-box">
                    <div class="box-label"><i class="fas fa-language"></i> Transliteration</div>
                    <p class="transliteration-text">{{ $dua->transliteration }}</p>
                </div>

                <div class="translation-box">
                    <div class="translation-label"><i class="fas fa-book-reader"></i> Translation</div>
                    <p class="translation-text">{{ $dua->translation }}</p>
                </div>
                
                @if($dua->reference_source)
                <div style="margin-top: 30px; padding-top: 25px; border-top: 1px dashed #eee;">
                    <span class="reference-tag"><i class="fas fa-bookmark" style="color: var(--gold);"></i> {{ $dua->reference_source }}</span>
                </div>
                @endif
            </div>

            <!-- SEO INTERNAL LINKING: RELATED DUAS -->
            @if($relatedDuas->isNotEmpty())
            <div style="margin-top: 60px;">
                <h3 style="font-size: 1.2rem; color: var(--primary-dark); margin-bottom: 20px; text-align: center; font-weight: 600;">
                    Explore More in {{ $category->name_english }}
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                    @foreach($relatedDuas as $related)
                    <a href="{{ route('duas.show', ['category' => $category->slug, 'seo_slug' => $related->seo_slug]) }}" style="background: #fff; border: 1px solid #eee; border-radius: 12px; padding: 20px; text-decoration: none; display: flex; align-items: center; gap: 15px; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0,0,0,0.02);" onmouseover="this.style.borderColor='var(--primary)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.05)';" onmouseout="this.style.borderColor='#eee'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.02)';">
                        <div style="background: rgba(var(--primary-rgb), 0.05); color: var(--primary); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0;">
                            <i class="fas fa-praying-hands"></i>
                        </div>
                        <div>
                            <div style="color: #333; font-weight: 600; font-size: 0.95rem; line-height: 1.3; margin-bottom: 4px;">{{ Str::limit($related->title_english, 45) }}</div>
                            <div style="color: #999; font-size: 0.75rem;">Read Supplication &rarr;</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

@section('meta')
<link rel="canonical" href="{{ url()->current() }}" />
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $dua->title_english }} | {{ $category->name_english }}",
      "description": "Read the authentic {{ $dua->title_english }} including Arabic, Transliteration, and English Translation. Sourced from {{ $dua->reference_source ?? 'authentic hadith' }}.",
      "breadcrumb": {
        "@@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@@type": "ListItem",
            "position": 1,
            "name": "Duas Library",
            "item": "{{ route('duas.index') }}"
          },
          {
            "@@type": "ListItem",
            "position": 2,
            "name": "{{ $category->name_english }}",
            "item": "{{ route('duas.category', $category->slug) }}"
          },
          {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $dua->title_english }}",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    },
    {
      "@@type": "Article",
      "headline": "{{ $dua->title_english }}",
      "articleSection": "{{ $category->name_english }}",
      "articleBody": "{{ strip_tags($dua->translation) }}",
      "author": {
         "@@type": "Organization",
         "name": "Islamic Web Platform"
      }
    }
  ]
}
</script>
@endsection
@endsection

```

## File: resources/views/pages/events/index.blade.php

```html
@extends('layouts.app')

@section('title', 'Islamic Calendar & Events — Hijri Dates')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Islamic Calendar</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h1 class="section-title">Islamic <span>Events</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Months and Significant Dates</p>
        </div>

        <div class="services-grid">
            @foreach($months as $month)
            <div class="service-card" style="text-align: center;">
                <div class="service-icon" style="font-size: 1.5rem; font-weight: bold; background: var(--primary-light); color: var(--primary-dark); width: 60px; height: 60px; border-radius: 50%; line-height: 60px; margin: 0 auto 20px auto;">{{ $month->month_number }}</div>
                <h3 style="font-family: 'Amiri', serif; font-size: 1.8rem; margin-bottom: 5px;">{{ $month->name_ar }}</h3>
                <h4 style="color: #666; font-size: 1.1rem; margin-bottom: 20px;">{{ $month->name_en }} ({{ $month->name_ur }})</h4>
                <a href="{{ route('events.month', $month->slug) }}" class="service-link">View Month <i class="fas fa-arrow-right"></i></a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/events/month.blade.php

```html
@extends('layouts.app')

@section('title', $hijri_month->name_en . ' — Islamic Events & Significance')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="{{ route('events.index') }}" style="color: #999; text-decoration: none;">Islamic Calendar</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{{ $hijri_month->name_en }}</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-moon"></i> {{ $hijri_month->name_en }}</div>
            <h1 class="section-title" style="font-family: 'Amiri', serif; font-size: 3rem; margin-bottom: 5px;">{{ $hijri_month->name_ar }}</h1>
            <p class="section-subtitle">{{ $hijri_month->name_en }} ({{ $hijri_month->name_ur }})</p>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="margin-bottom: 40px; grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--gold);">
                <h3 style="font-size: 1.8rem; color: var(--primary-dark); margin-bottom: 15px;">Significance of {{ $hijri_month->name_en }}</h3>
                <p style="color: #555; font-size: 1.1rem; line-height: 1.8;">
                    {!! nl2br(e($hijri_month->significance)) ?? 'Information about the significance of this month will be updated soon.' !!}
                </p>
            </div>
        </div>

        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-history"></i> History</div>
            <h2 class="section-title">Key <span>Events</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        @if($hijri_month->events && $hijri_month->events->count() > 0)
        <div class="contact-grid" style="grid-template-columns: 1fr;">
            @foreach($hijri_month->events as $event)
            <div class="contact-info" style="margin-bottom: 20px; display: flex; align-items: flex-start; gap: 20px; border-left: 4px solid var(--primary);">
                <div style="background: var(--primary-light); color: var(--primary-dark); padding: 15px; border-radius: 8px; text-align: center; min-width: 80px;">
                    <span style="font-size: 1.8rem; font-weight: bold; display: block;">{{ $event->day }}</span>
                    <span style="font-size: 0.9rem; text-transform: uppercase;">{{ substr($hijri_month->name_en, 0, 3) }}</span>
                </div>
                <div>
                    <h4 style="color: var(--primary-dark); font-size: 1.3rem; margin-bottom: 10px; margin-top: 5px;">{{ $event->title }}</h4>
                    <p style="color: #666; margin-bottom: 0; line-height: 1.6;">{{ $event->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="text-align: center; padding: 40px;">
                <i class="fas fa-info-circle fa-2x" style="color: var(--gold); margin-bottom: 15px;"></i>
                <p style="color: #666; font-size: 1.1rem;">No major historical events recorded for this month.</p>
            </div>
        </div>
        @endif

    </div>
</section>
@endsection

```

## File: resources/views/pages/fazilat/show.blade.php

```html
@extends('layouts.app')

@section('title', 'Surah ' . $surah->name_en . ' Ki Fazilat — Benefits & Virtues (With Hadith References)')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="{{ route('surah.show', $surah->slug) }}" style="color: #999; text-decoration: none;">Surah {{ $surah->name_en }}</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Fazilat</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-star"></i> Virtues</div>
            <h1 class="section-title">Fazilat of Surah <span>{{ $surah->name_en }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Benefits, Virtues & Hadith References</p>
        </div>

        @if($surah->reviews->count() > 0)
            @php $review = $surah->reviews->first(); @endphp
            <div class="contact-grid" style="grid-template-columns: 1fr; margin-bottom: 40px;">
                <div class="contact-info" style="text-align: center; background: #f8f9fa; border-left: 4px solid var(--gold); padding: 25px;">
                    <i class="fas fa-check-circle" style="color: var(--gold); font-size: 2rem; margin-bottom: 15px;"></i>
                    <strong style="display: block; color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 5px;">Scholarly Verified by {{ $review->scholar->name }} ({{ $review->scholar->credential }})</strong>
                    <span style="font-size: 1rem; color: #666;">{{ $review->notes }}</span>
                </div>
            </div>
        @endif

        @if($surah->fazilatEntries && $surah->fazilatEntries->count() > 0)
            <div class="contact-grid" style="grid-template-columns: 1fr;">
                <div class="contact-info">
                    @foreach($surah->fazilatEntries as $fazilat)
                        <div style="margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 25px;">
                            <h3 style="color: var(--primary-dark); margin-bottom: 15px; font-size: 1.4rem;">
                                <i class="fas fa-question-circle" style="color: var(--gold); margin-right: 10px;"></i> 
                                {{ $fazilat->question }}
                            </h3>
                            <div style="font-size: 1.15rem; line-height: 1.8; color: #444; margin-bottom: 20px; padding-left: 40px;">
                                {{ $fazilat->answer }}
                            </div>
                            <div style="background: #fafafa; padding: 15px 20px; border-radius: 8px; font-size: 0.95rem; color: #666; margin-left: 40px; border-left: 4px solid var(--primary-light);">
                                <strong><i class="fas fa-book"></i> Reference:</strong> {{ $fazilat->hadith_reference }}
                                @if($fazilat->verification_status === 'commonly_cited')
                                    <span style="display: inline-block; margin-left: 15px; padding: 4px 10px; background: #fff3cd; color: #856404; border-radius: 4px; font-size: 0.85rem; font-weight: bold;"><i class="fas fa-exclamation-circle"></i> Commonly Cited</span>
                                @else
                                    <span style="display: inline-block; margin-left: 15px; padding: 4px 10px; background: #d4edda; color: #155724; border-radius: 4px; font-size: 0.85rem; font-weight: bold;"><i class="fas fa-check"></i> Verified</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="contact-grid" style="grid-template-columns: 1fr;">
                <div class="contact-info" style="text-align: center; padding: 60px;">
                    <i class="fas fa-book-open fa-3x" style="margin-bottom: 20px; color: var(--gold);"></i>
                    <p style="font-size: 1.2rem; color: #666;">Fazilat entries for this Surah will be added soon.</p>
                </div>
            </div>
        @endif

        <div style="margin-top: 50px; text-align: center;">
            <a href="{{ route('surah.show', $surah->slug) }}" class="btn-primary"><i class="fas fa-arrow-left"></i> Return to Surah {{ $surah->name_en }}</a>
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/hadith/index.blade.php

```html
@extends('layouts.app')

@section('title', 'Hadith Topics — Authentic Islamic Traditions')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Hadith Topics</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-open"></i> Authentic</div>
            <h1 class="section-title">Hadith by <span>Topic</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Explore collections of authentic Ahadeeth categorized by subject.</p>
        </div>

        <div class="services-grid">
            @foreach($topics as $topic)
            <div class="service-card" style="text-align: center;">
                <div class="service-icon"><i class="fas fa-book-reader"></i></div>
                <h3 style="margin-bottom: 15px;">{{ $topic->topic_name }}</h3>
                <p style="margin-bottom: 20px; font-size: 0.95rem; color: #666;">Read authentic narrations related to {{ strtolower($topic->topic_name) }}.</p>
                <a href="{{ route('hadith.show', $topic->slug) }}" class="service-link">View Hadith <i class="fas fa-arrow-right"></i></a>
            </div>
            @endforeach
        </div>
        
        @if($topics->count() == 0)
        <div class="contact-grid" style="grid-template-columns: 1fr; margin-top: 40px;">
            <div class="contact-info" style="text-align: center;">
                <i class="fas fa-info-circle fa-2x" style="margin-bottom: 15px; color: var(--gold);"></i>
                <p>Hadith topics are currently being updated.</p>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

```

## File: resources/views/pages/hadith/show.blade.php

```html
@extends('layouts.app')

@section('title', 'Hadith about ' . $topic->topic_name . ' — Authentic Islamic Traditions')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="{{ route('hadith.index') }}" style="color: #999; text-decoration: none;">Hadith Topics</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{{ $topic->topic_name }}</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-reader"></i> Topic</div>
            <h1 class="section-title">Hadith: <span>{{ $topic->topic_name }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <div style="display: inline-block; background: var(--primary-light); color: var(--primary-dark); padding: 8px 20px; border-radius: 50px; font-weight: bold; margin-bottom: 25px; font-size: 0.9rem;">
                    <i class="fas fa-book"></i> {{ $topic->hadith_book }} (Hadith {{ $topic->hadith_number }})
                </div>
                
                <p style="font-size: 1.25rem; line-height: 2; color: #444; margin-bottom: 0;">
                    {{ $topic->content }}
                </p>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('hadith.index') }}" class="btn-primary">Browse All Topics</a>
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/islamic-date/country.blade.php

```html
@extends('layouts.app')

@php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
@endphp
@section('title', 'Islamic Date Today in ' . $country->name . ' — ' . $titleHijri . ' AH')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="{{ route('islamic-date.hub') }}" style="color: #999; text-decoration: none;">Islamic Date Today</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{{ $country->name }}</span>
            </div>
        </div>
        
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-map-marker-alt"></i> {{ $country->name }}</div>
            <h1 class="section-title">Islamic Date in <span>{{ $country->name }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">{{ $country->local_context_note ?? 'Today\'s Hijri Date and Islamic Calendar for ' . $country->name }}</p>
        </div>

        <!-- HERO HIJRI DATE & MOON PHASE -->
        <div class="contact-grid" style="grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 50px;">
            <div class="contact-info" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; border: none; text-align: center; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; box-shadow: 0 15px 35px rgba(5,67,62,0.2);">
                <div style="position: absolute; top: -50px; left: -50px; opacity: 0.05; font-size: 250px;"><i class="fas fa-map"></i></div>
                <h3 style="color: var(--gold); font-size: 1.5rem; margin-bottom: 10px; z-index: 1;">{{ date('l, d F Y') }}</h3>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 10px; line-height: 1.2; z-index: 1;">
                    {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah' }}
                </div>
                <div style="font-size: 1.8rem; color: rgba(255,255,255,0.8); z-index: 1;">{{ $hijriDate ? $hijriDate->hijri_year : '1446' }} AH</div>
            </div>

            <div class="contact-info" style="text-align: center; border-left: 4px solid var(--gold); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h4 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 15px;">Current Moon Phase</h4>
                <div style="font-size: 4rem; color: var(--gold); margin-bottom: 15px;">
                    <i class="fas {{ $moonPhase['icon'] ?? 'fa-moon' }}"></i>
                </div>
                <h3 style="color: var(--primary); margin-bottom: 5px;">{{ $moonPhase['name'] ?? 'Unknown' }}</h3>
                <p style="color: #666; font-size: 0.9rem;">{{ $moonPhase['description'] ?? '' }}</p>
            </div>
        </div>

        @if(count($fastingDays) > 0)
        <!-- FASTING ALERTS -->
        <div style="background: rgba(var(--gold-rgb), 0.1); border-left: 4px solid var(--gold); padding: 20px; border-radius: 8px; margin-bottom: 50px;">
            <h4 style="color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-star-and-crescent" style="color: var(--gold);"></i> Sunnah Fasting Today</h4>
            <p style="color: #555; margin: 0;">Today is a recommended day for fasting: <strong>{{ implode(', ', $fastingDays) }}</strong>.</p>
        </div>
        @endif

        <div class="contact-grid" style="grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 50px;">
            <!-- UPCOMING EVENTS -->
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-calendar-star" style="color: var(--gold);"></i> Upcoming Events</h3>
                @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                    @foreach($upcomingEvents as $index => $event)
                    <div style="padding: 15px; background: {{ $index == 0 ? 'rgba(5,67,62,0.05)' : '#fff' }}; border-radius: 8px; margin-bottom: 15px; border: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="color: var(--primary-dark); margin: 0 0 5px 0;">{{ $event->name }}</h4>
                                <span style="font-size: 0.85rem; color: #666;">{{ $event->hijri_day }} {{ $event->hijriMonth->name_en ?? '' }}</span>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary);">{{ $event->days_away }}</div>
                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase;">Days Away</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>No upcoming events found.</p>
                @endif
            </div>

            <!-- HIJRI TO GREGORIAN CONVERTER -->
            <div class="contact-info" style="border-left: 4px solid var(--gold);">
                <h3><i class="fas fa-exchange-alt" style="color: var(--gold);"></i> Date Converter</h3>
                <p style="margin-bottom: 20px;">Instantly convert dates between Hijri and Gregorian.</p>
                <form id="converterWidgetForm">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Conversion Type</label>
                        <select id="convDirection" style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                            <option value="g2h">Gregorian to Hijri</option>
                            <option value="h2g">Hijri to Gregorian</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Date</label>
                        <input type="date" id="convDate" required style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 12px;"><i class="fas fa-sync"></i> Convert</button>
                </form>
                <div id="convResult" style="margin-top: 20px; text-align: center; display: none; padding: 15px; background: rgba(var(--gold-rgb), 0.05); border-radius: 8px; border: 1px solid rgba(var(--gold-rgb), 0.2);">
                    <h4 style="color: var(--primary-dark); margin-bottom: 5px; font-size: 1.2rem;" id="resText"></h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;" id="resSub"></p>
                </div>
            </div>
        </div>

        @if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0)
        <!-- MONTHLY CALENDAR GRID -->
        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h2 class="section-title">Islamic Month <span>Calendar</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Calendar for {{ $hijriDate->hijri_month }} {{ $hijriDate->hijri_year }} AH in {{ $country->name }}</p>
        </div>
        
        <div style="background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 50px;">
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); background: var(--primary); color: white; text-align: center; font-weight: bold;">
                <div style="padding: 15px 5px;">Sun</div>
                <div style="padding: 15px 5px;">Mon</div>
                <div style="padding: 15px 5px;">Tue</div>
                <div style="padding: 15px 5px;">Wed</div>
                <div style="padding: 15px 5px;">Thu</div>
                <div style="padding: 15px 5px;">Fri</div>
                <div style="padding: 15px 5px;">Sat</div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); text-align: center;">
                @php
                    $firstDay = $monthlyCalendar->first();
                    $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                @endphp
                
                @for($i = 0; $i < $dayOfWeek; $i++)
                    <div style="padding: 20px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background: #fafafa;"></div>
                @endfor
                
                @foreach($monthlyCalendar as $day)
                    @php
                        $isToday = $day->gregorian_date == date('Y-m-d');
                    @endphp
                    <div style="padding: 15px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; position: relative; {{ $isToday ? 'background: rgba(var(--gold-rgb), 0.1); border-bottom: 3px solid var(--gold);' : '' }}">
                        <div style="font-size: 1.2rem; font-weight: bold; color: {{ $isToday ? 'var(--primary-dark)' : 'var(--primary)' }};">{{ $day->hijri_day }}</div>
                        <div style="font-size: 0.8rem; color: #999;">{{ date('j M', strtotime($day->gregorian_date)) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        @if(isset($historicalEvents) && $historicalEvents->count() > 0)
        <div class="contact-grid" style="margin-bottom: 50px; grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-history" style="color: var(--gold);"></i> On This Day in Islamic History</h3>
                <p style="margin-bottom: 20px;">Events that occurred on {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'this day' }}</p>
                @foreach($historicalEvents as $event)
                    <div style="margin-bottom: 15px;">
                        <h4 style="margin-bottom: 5px; color: var(--primary-dark);">{{ $event->title }}</h4>
                        <p style="color: #666; margin-bottom: 5px;">{{ $event->description }}</p>
                        <p style="font-size: 0.85rem; color: #999; font-style: italic;">Source: {{ $event->source_note }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Knowledge</div>
            <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>
        
        <div class="contact-grid" style="grid-template-columns: 1fr;" itemscope itemtype="https://schema.org/FAQPage">
            <div class="contact-info">
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px;">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-moon" style="color: var(--gold); margin-right: 10px;"></i>Why does today's Islamic date differ between {{ $country->name }} and Saudi Arabia?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">Differences occur because Saudi Arabia predominantly uses a pre-calculated calendar (Umm al-Qura) or relies on local sightings within the Kingdom. Meanwhile, {{ $country->name }} has its own criteria and local moon-sighting committees, meaning the crescent moon may be visible on different days depending on geographical location.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-binoculars" style="color: var(--gold); margin-right: 10px;"></i>Which moon-sighting authority does {{ $country->name }} follow?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">Generally, each country relies on its national religious authorities or appointed Hilal (crescent) sighting committees. Local scholars and observatories work together to confirm the new moon and officially announce the start of Islamic months.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Islamic Date Today in {{ $country->name }}",
      "description": "Find today's Islamic date (Hijri date), moon phase, and upcoming Islamic events in {{ $country->name }}.",
      "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Islamic Date Today",
            "item": "{{ route('islamic-date.hub') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "{{ $country->name }}",
            "item": "{{ url()->current() }}"
          }
        ]
      }
    }
    @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
    ,@foreach($upcomingEvents as $index => $event)
    {
      "@type": "Event",
      "name": "{{ $event->name }}",
      "description": "{{ $event->description }}",
      "startDate": "{{ date('Y-m-d', strtotime('+' . $event->days_away . ' days')) }}",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "{{ $country->name }}"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
    @endif
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('converterWidgetForm');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var date = document.getElementById('convDate').value;
            var dir = document.getElementById('convDirection').value;
            var btn = this.querySelector('button');
            var originalBtnText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Converting...';
            btn.disabled = true;

            fetch('/ajax/hijri-convert?date=' + date + '&direction=' + dir)
            .then(res => res.json())
            .then(data => {
                document.getElementById('convResult').style.display = 'block';
                document.getElementById('resText').innerText = data.result_text;
                document.getElementById('resSub').innerText = data.result_subtext;
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            }).catch(err => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
                alert('Conversion failed. Please try again.');
            });
        });
    }
});
</script>
@endsection


```

## File: resources/views/pages/islamic-date/hub.blade.php

```html
@extends('layouts.app')

@php
$titleHijri = isset($hijriDate) ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month . ' ' . $hijriDate->hijri_year : '';
@endphp
@section('title', 'Islamic Date Today — Hijri Date Worldwide, ' . $titleHijri)

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Islamic Date Today</span>
            </div>
        </div>
        
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-globe"></i> Worldwide</div>
            <h1 class="section-title">Islamic <span>Date Today</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <!-- HERO HIJRI DATE & MOON PHASE -->
        <div class="contact-grid" style="grid-template-columns: 2fr 1fr; gap: 30px; margin-bottom: 50px;">
            <div class="contact-info" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; border: none; text-align: center; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; box-shadow: 0 15px 35px rgba(5,67,62,0.2);">
                <div style="position: absolute; top: -50px; right: -50px; opacity: 0.05; font-size: 250px;"><i class="fas fa-moon"></i></div>
                <h3 style="color: var(--gold); font-size: 1.5rem; margin-bottom: 10px; z-index: 1;">{{ date('l, d F Y') }}</h3>
                <div style="font-size: 3.5rem; font-weight: bold; margin-bottom: 10px; line-height: 1.2; z-index: 1;">
                    {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : '15 Jumada Al-Akhirah' }}
                </div>
                <div style="font-size: 1.8rem; color: rgba(255,255,255,0.8); z-index: 1;">{{ $hijriDate ? $hijriDate->hijri_year : '1446' }} AH</div>
            </div>

            <div class="contact-info" style="text-align: center; border-left: 4px solid var(--gold); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h4 style="color: var(--primary-dark); font-size: 1.2rem; margin-bottom: 15px;">Current Moon Phase</h4>
                <div style="font-size: 4rem; color: var(--gold); margin-bottom: 15px;">
                    <i class="fas {{ $moonPhase['icon'] ?? 'fa-moon' }}"></i>
                </div>
                <h3 style="color: var(--primary); margin-bottom: 5px;">{{ $moonPhase['name'] ?? 'Unknown' }}</h3>
                <p style="color: #666; font-size: 0.9rem;">{{ $moonPhase['description'] ?? '' }}</p>
            </div>
        </div>

        @if(count($fastingDays) > 0)
        <!-- FASTING ALERTS -->
        <div style="background: rgba(var(--gold-rgb), 0.1); border-left: 4px solid var(--gold); padding: 20px; border-radius: 8px; margin-bottom: 50px;">
            <h4 style="color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-star-and-crescent" style="color: var(--gold);"></i> Sunnah Fasting Today</h4>
            <p style="color: #555; margin: 0;">Today is a recommended day for fasting: <strong>{{ implode(', ', $fastingDays) }}</strong>.</p>
        </div>
        @endif

        <div class="contact-grid" style="grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 50px;">
            <!-- UPCOMING EVENTS -->
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-calendar-star" style="color: var(--gold);"></i> Upcoming Events</h3>
                @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
                    @foreach($upcomingEvents as $index => $event)
                    <div style="padding: 15px; background: {{ $index == 0 ? 'rgba(5,67,62,0.05)' : '#fff' }}; border-radius: 8px; margin-bottom: 15px; border: 1px solid #eee;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h4 style="color: var(--primary-dark); margin: 0 0 5px 0;">{{ $event->name }}</h4>
                                <span style="font-size: 0.85rem; color: #666;">{{ $event->hijri_day }} {{ $event->hijriMonth->name_en ?? '' }}</span>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary);">{{ $event->days_away }}</div>
                                <div style="font-size: 0.75rem; color: #999; text-transform: uppercase;">Days Away</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>No upcoming events found.</p>
                @endif
            </div>

            <!-- HIJRI TO GREGORIAN CONVERTER -->
            <div class="contact-info" style="border-left: 4px solid var(--gold);">
                <h3><i class="fas fa-exchange-alt" style="color: var(--gold);"></i> Date Converter</h3>
                <p style="margin-bottom: 20px;">Instantly convert dates between Hijri and Gregorian.</p>
                <form id="converterWidgetForm">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Conversion Type</label>
                        <select id="convDirection" style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                            <option value="g2h">Gregorian to Hijri</option>
                            <option value="h2g">Hijri to Gregorian</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-weight: bold; margin-bottom: 8px; display: block; color: var(--primary-dark); font-size: 0.9rem;">Date</label>
                        <input type="date" id="convDate" required style="width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <button type="submit" class="btn-primary" style="width: 100%; justify-content: center; padding: 12px;"><i class="fas fa-sync"></i> Convert</button>
                </form>
                <div id="convResult" style="margin-top: 20px; text-align: center; display: none; padding: 15px; background: rgba(var(--gold-rgb), 0.05); border-radius: 8px; border: 1px solid rgba(var(--gold-rgb), 0.2);">
                    <h4 style="color: var(--primary-dark); margin-bottom: 5px; font-size: 1.2rem;" id="resText"></h4>
                    <p style="color: #666; font-size: 0.9rem; margin: 0;" id="resSub"></p>
                </div>
            </div>
        </div>

        @if(isset($monthlyCalendar) && $monthlyCalendar->count() > 0)
        <!-- MONTHLY CALENDAR GRID -->
        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-calendar-alt"></i> Calendar</div>
            <h2 class="section-title">Islamic Month <span>Calendar</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Hijri Calendar for {{ $hijriDate->hijri_month }} {{ $hijriDate->hijri_year }} AH</p>
        </div>
        
        <div style="background: white; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; margin-bottom: 50px;">
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); background: var(--primary); color: white; text-align: center; font-weight: bold;">
                <div style="padding: 15px 5px;">Sun</div>
                <div style="padding: 15px 5px;">Mon</div>
                <div style="padding: 15px 5px;">Tue</div>
                <div style="padding: 15px 5px;">Wed</div>
                <div style="padding: 15px 5px;">Thu</div>
                <div style="padding: 15px 5px;">Fri</div>
                <div style="padding: 15px 5px;">Sat</div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); text-align: center;">
                @php
                    $firstDay = $monthlyCalendar->first();
                    $dayOfWeek = date('w', strtotime($firstDay->gregorian_date));
                @endphp
                
                @for($i = 0; $i < $dayOfWeek; $i++)
                    <div style="padding: 20px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; background: #fafafa;"></div>
                @endfor
                
                @foreach($monthlyCalendar as $day)
                    @php
                        $isToday = $day->gregorian_date == date('Y-m-d');
                    @endphp
                    <div style="padding: 15px 5px; border-bottom: 1px solid #eee; border-right: 1px solid #eee; position: relative; {{ $isToday ? 'background: rgba(var(--gold-rgb), 0.1); border-bottom: 3px solid var(--gold);' : '' }}">
                        <div style="font-size: 1.2rem; font-weight: bold; color: {{ $isToday ? 'var(--primary-dark)' : 'var(--primary)' }};">{{ $day->hijri_day }}</div>
                        <div style="font-size: 0.8rem; color: #999;">{{ date('j M', strtotime($day->gregorian_date)) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        @if(isset($historicalEvents) && $historicalEvents->count() > 0)
        <div class="contact-grid" style="margin-bottom: 50px; grid-template-columns: 1fr;">
            <div class="contact-info" style="border-left: 4px solid var(--primary);">
                <h3><i class="fas fa-history" style="color: var(--gold);"></i> On This Day in Islamic History</h3>
                <p style="margin-bottom: 20px;">Events that occurred on {{ $hijriDate ? $hijriDate->hijri_day . ' ' . $hijriDate->hijri_month : 'this day' }}</p>
                @foreach($historicalEvents as $event)
                    <div style="margin-bottom: 15px;">
                        <h4 style="margin-bottom: 5px; color: var(--primary-dark);">{{ $event->title }}</h4>
                        <p style="color: #666; margin-bottom: 5px;">{{ $event->description }}</p>
                        <p style="font-size: 0.85rem; color: #999; font-style: italic;">Source: {{ $event->source_note }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="section-header" style="margin-top: 60px;">
            <div class="section-badge"><i class="fas fa-flag"></i> Localized</div>
            <h2 class="section-title">Select <span>Country</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">View local Hijri dates and specific prayer times based on country sightings.</p>
        </div>

        <div class="services-grid">
            @foreach($countries as $country)
            <div class="service-card" style="text-align: center;">
                <div class="service-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3>{{ $country->name }}</h3>
                <a href="{{ route('islamic-date.country', ['country' => $country->slug]) }}" class="service-link">View Dates <i class="fas fa-arrow-right"></i></a>
            </div>
            @endforeach
        </div>

        <div class="section-header" style="margin-top: 80px;">
            <div class="section-badge"><i class="fas fa-question-circle"></i> Knowledge</div>
            <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>
        
        <div class="contact-grid" style="grid-template-columns: 1fr;" itemscope itemtype="https://schema.org/FAQPage">
            <div class="contact-info">
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px;">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-moon" style="color: var(--gold); margin-right: 10px;"></i>Why does the Islamic day start at sunset, not midnight?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">In the Islamic calendar, a new day begins at Maghrib (sunset), following the lunar cycle. This is rooted in the Quran and Sunnah, where the night precedes the daytime, unlike the Gregorian calendar which starts at midnight.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" style="margin-bottom: 15px;"><i class="fas fa-calendar-alt" style="color: var(--gold); margin-right: 10px;"></i>Why do Hijri dates shift earlier each Gregorian year?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">The Hijri calendar is strictly lunar, consisting of 354 or 355 days. Because it is approximately 10 to 12 days shorter than the 365-day solar Gregorian year, Islamic dates and months (like Ramadan) shift backward through the seasons each year.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "Islamic Date Today — Hijri Date Worldwide",
      "description": "Find today's Islamic date (Hijri date), moon phase, and upcoming Islamic events worldwide.",
      "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Islamic Date Today",
            "item": "{{ route('islamic-date.hub') }}"
          }
        ]
      }
    }
    @if(isset($upcomingEvents) && $upcomingEvents->count() > 0)
    ,@foreach($upcomingEvents as $index => $event)
    {
      "@type": "Event",
      "name": "{{ $event->name }}",
      "description": "{{ $event->description }}",
      "startDate": "{{ date('Y-m-d', strtotime('+' . $event->days_away . ' days')) }}",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "Worldwide"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
    @endif
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('converterWidgetForm');
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var date = document.getElementById('convDate').value;
            var dir = document.getElementById('convDirection').value;
            var btn = this.querySelector('button');
            var originalBtnText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Converting...';
            btn.disabled = true;

            fetch('/ajax/hijri-convert?date=' + date + '&direction=' + dir)
            .then(res => res.json())
            .then(data => {
                document.getElementById('convResult').style.display = 'block';
                document.getElementById('resText').innerText = data.result_text;
                document.getElementById('resSub').innerText = data.result_subtext;
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
            }).catch(err => {
                btn.innerHTML = originalBtnText;
                btn.disabled = false;
                alert('Conversion failed. Please try again.');
            });
        });
    }
});
</script>
@endsection


```

## File: resources/views/pages/names/hub.blade.php

```html
@extends('layouts.app')

@section('title', 'Islamic Names Directory')

@section('content')
<style>
    .search-card {
        background: linear-gradient(135deg, #ffffff, #fdfdfd);
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.04);
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    .search-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 4px; height: 100%;
        background: linear-gradient(180deg, var(--primary), var(--gold));
    }
    .search-input {
        flex: 1;
        padding: 16px 20px;
        border: 2px solid #eee;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s;
        background: #fafafa;
        min-width: 250px;
    }
    .search-input:focus {
        border-color: var(--primary);
        outline: none;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
    }
    .gender-select {
        padding: 16px 20px;
        border: 2px solid #eee;
        border-radius: 12px;
        font-size: 1.1rem;
        background: #fafafa;
        min-width: 160px;
        transition: border-color 0.3s;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }
    .gender-select:focus {
        border-color: var(--primary);
        outline: none;
    }
    .btn-search {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 16px 35px;
        border-radius: 12px;
        border: none;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 8px 20px rgba(5,67,62,0.2);
    }
    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(5,67,62,0.3);
    }
    .name-card {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        text-decoration: none;
        border: 1px solid rgba(0,0,0,0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }
    .name-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: rgba(var(--primary-rgb), 0.2);
    }
    .name-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, transparent, rgba(var(--gold-rgb), 0.5), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }
    .name-card:hover::after {
        opacity: 1;
    }
    .name-en {
        color: var(--primary-dark);
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }
    .name-ar {
        font-family: 'Amiri', serif;
        font-size: 2.2rem;
        color: var(--gold);
        font-weight: bold;
        line-height: 1;
    }
    .name-meaning {
        color: #666;
        margin: 15px 0;
        font-size: 1rem;
        line-height: 1.5;
    }
    .tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    .tag-gender.male { background: rgba(52, 152, 219, 0.1); color: #2980b9; }
    .tag-gender.female { background: rgba(233, 30, 99, 0.1); color: #c2185b; }
    .tag-origin { background: rgba(var(--gold-rgb), 0.1); color: #b89730; }
</style>

<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-book-open"></i> Dictionary</div>
            <h1 class="section-title">Islamic <span>Names</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Discover beautiful and meaningful names from Islamic history with their Arabic text, origin, and translations.</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr; margin-bottom: 50px;">
            <!-- INPUT CARD: Search & Filters -->
            <div class="search-card">
                <h3 style="color: var(--primary-dark); margin-bottom: 25px; font-size: 1.4rem;">
                    <i class="fas fa-search" style="color: var(--gold); margin-right: 8px;"></i> Find the Perfect Name
                </h3>
                <form action="{{ route('names.index') }}" method="GET" style="display: flex; gap: 15px; flex-wrap: wrap;">
                    <input type="text" name="search" class="search-input" placeholder="Search by English or Urdu meaning..." value="{{ request('search') }}">
                    <select name="gender" class="gender-select">
                        <option value="">Any Gender</option>
                        <option value="male" {{ (isset($gender) && $gender == 'male') || request('gender') == 'male' ? 'selected' : '' }}>Boys</option>
                        <option value="female" {{ (isset($gender) && $gender == 'female') || request('gender') == 'female' ? 'selected' : '' }}>Girls</option>
                    </select>
                    <button type="submit" class="btn-search"><i class="fas fa-filter"></i> Search</button>
                </form>
                
                <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 25px;">
                    <a href="{{ route('names.gender', 'boys') }}" style="padding: 10px 20px; background: rgba(52, 152, 219, 0.05); color: #2980b9; border-radius: 50px; text-decoration: none; font-size: 0.95rem; font-weight: 500; border: 1px solid rgba(52, 152, 219, 0.2); transition: all 0.2s;"><i class="fas fa-male"></i> Popular Boys Names</a>
                    <a href="{{ route('names.gender', 'girls') }}" style="padding: 10px 20px; background: rgba(233, 30, 99, 0.05); color: #c2185b; border-radius: 50px; text-decoration: none; font-size: 0.95rem; font-weight: 500; border: 1px solid rgba(233, 30, 99, 0.2); transition: all 0.2s;"><i class="fas fa-female"></i> Popular Girls Names</a>
                </div>
            </div>
        </div>

        <!-- OUTPUT CARD: Results -->
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h3 style="color: var(--primary-dark); margin: 0; font-size: 1.6rem;">
                    <i class="fas fa-list" style="color: var(--primary); margin-right: 10px;"></i> 
                    {{ isset($gender) ? ucfirst($gender) . ' Names' : (request('search') ? 'Search Results' : 'Trending Names') }}
                </h3>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 25px;">
                @php $collection = isset($names) ? $names : $popularNames; @endphp
                
                @forelse($collection as $name)
                <a href="{{ route('names.show', $name->slug) }}" class="name-card">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <h4 class="name-en">{{ $name->name_english }}</h4>
                        <span class="name-ar" dir="rtl">{{ $name->name_arabic }}</span>
                    </div>
                    <p class="name-meaning">Meaning: <strong>{{ $name->translation_urdu }}</strong></p>
                    <div style="display: flex; gap: 10px;">
                        <span class="tag tag-gender {{ $name->gender }}">
                            <i class="fas {{ $name->gender == 'male' ? 'fa-male' : 'fa-female' }}"></i> {{ ucfirst($name->gender) }}
                        </span>
                        @if($name->origin)
                            <span class="tag tag-origin"><i class="fas fa-globe"></i> {{ ucfirst($name->origin) }}</span>
                        @endif
                    </div>
                </a>
                @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px; background: white; border-radius: 20px; border: 1px dashed #ddd;">
                    <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 20px; color: #ccc;"></i>
                    <h4 style="color: #777; font-size: 1.2rem;">No names found matching your criteria.</h4>
                    <p style="color: #999;">Try adjusting your search filters.</p>
                </div>
                @endforelse
            </div>

            @if(isset($names) && method_exists($names, 'links'))
                <div style="margin-top: 50px;">
                    {{ $names->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/names/show.blade.php

```html
@extends('layouts.app')

@section('title', $name->name_english . ' - Islamic Name Meaning')

@section('content')
<style>
    .name-hero-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.03);
        padding: 60px 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .name-hero-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 6px;
        background: linear-gradient(90deg, var(--primary), var(--gold), var(--primary-light));
    }
    .name-hero-bg {
        position: absolute;
        top: -50px; right: -50px;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(var(--gold-rgb), 0.05) 0%, transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }
    .name-hero-content {
        position: relative;
        z-index: 1;
    }
    .name-ar-large {
        font-family: 'Amiri', serif;
        font-size: 7rem;
        color: var(--primary-dark);
        font-weight: bold;
        line-height: 1.1;
        margin-bottom: 10px;
        text-shadow: 0 10px 30px rgba(var(--primary-rgb), 0.1);
    }
    .name-en-large {
        font-size: 3.5rem;
        color: var(--primary);
        font-weight: 800;
        margin-bottom: 25px;
        letter-spacing: -1px;
    }
    .tag-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 50px;
        flex-wrap: wrap;
    }
    .tag-large {
        padding: 10px 25px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid transparent;
    }
    .tag-large.male { background: rgba(52, 152, 219, 0.08); color: #2980b9; border-color: rgba(52, 152, 219, 0.2); }
    .tag-large.female { background: rgba(233, 30, 99, 0.08); color: #c2185b; border-color: rgba(233, 30, 99, 0.2); }
    .tag-large.origin { background: rgba(var(--gold-rgb), 0.08); color: #b89730; border-color: rgba(var(--gold-rgb), 0.2); }
    
    .meaning-box {
        max-width: 700px;
        margin: 0 auto;
        background: linear-gradient(135deg, #fafafa, #ffffff);
        border: 1px solid #eee;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        position: relative;
    }
    .meaning-box::before {
        content: '\201C';
        font-family: serif;
        font-size: 8rem;
        color: rgba(var(--primary-rgb), 0.05);
        position: absolute;
        top: -30px; left: 20px;
        line-height: 1;
    }
    .meaning-label {
        color: #888;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    .meaning-text {
        font-size: 2.2rem;
        color: var(--primary-dark);
        font-weight: bold;
        margin: 0;
        font-family: 'Amiri', serif;
        line-height: 1.4;
    }
</style>

<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="margin-bottom: 30px;">
            <a href="{{ route('names.index') }}" style="color: var(--primary); text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;"><i class="fas fa-arrow-left"></i> Back to Directory</a>
        </div>

        <div style="max-width: 900px; margin: 0 auto;">
            <!-- OUTPUT CARD (Detail View) -->
            <div class="name-hero-card">
                <div class="name-hero-bg"></div>
                <div class="name-hero-content">
                    <div class="name-ar-large" dir="rtl">{{ $name->name_arabic }}</div>
                    <h1 class="name-en-large">{{ $name->name_english }}</h1>
                    
                    <div class="tag-container">
                        <span class="tag-large {{ $name->gender }}">
                            <i class="fas {{ $name->gender == 'male' ? 'fa-male' : 'fa-female' }}"></i> {{ ucfirst($name->gender) }}
                        </span>
                        @if($name->origin)
                            <span class="tag-large origin">
                                <i class="fas fa-globe"></i> {{ ucfirst($name->origin) }} Origin
                            </span>
                        @endif
                    </div>

                    <div class="meaning-box">
                        <div class="meaning-label">Meaning in Urdu</div>
                        <p class="meaning-text" dir="rtl">{{ $name->translation_urdu }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JSON-LD SCHEMAS -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebPage",
      "@id": "{{ url()->current() }}",
      "url": "{{ url()->current() }}",
      "name": "{{ $name->name_english }} - Islamic Name Meaning",
      "description": "Meaning of the Islamic name {{ $name->name_english }} ({{ $name->name_arabic }}) is {{ $name->translation_urdu }}."
    }
  ]
}
</script>
@endsection

```

## File: resources/views/pages/prayer-times/city.blade.php

```html
@extends('layouts.app')

@section('title', 'Prayer Times in ' . $city->name . ' — Accurate Monthly Salat Schedule')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <a href="{{ route('prayer-times.hub') }}" style="color: #999; text-decoration: none;">Prayer Times</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">{{ $city->name }}</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-map-marker-alt"></i> {{ $city->name }}</div>
            <h1 class="section-title">Prayer Times in <span>{{ $city->name }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Accurate 30-day Salat and Namaz schedule for {{ $city->name }}.</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="padding: 30px; overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                    <thead>
                        <tr style="background: var(--primary-light); color: var(--primary-dark); border-bottom: 2px solid var(--primary);">
                            <th style="padding: 15px; text-align: left;">Date</th>
                            <th style="padding: 15px; text-align: center;">Fajr</th>
                            <th style="padding: 15px; text-align: center;">Sunrise</th>
                            <th style="padding: 15px; text-align: center;">Dhuhr</th>
                            <th style="padding: 15px; text-align: center;">Asr</th>
                            <th style="padding: 15px; text-align: center;">Maghrib</th>
                            <th style="padding: 15px; text-align: center;">Isha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prayerTimes as $pt)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; font-weight: bold; color: var(--text-color);">{{ \Carbon\Carbon::parse($pt->date)->format('M d, Y') }}</td>
                            <td style="padding: 15px; text-align: center;">{{ \Carbon\Carbon::parse($pt->fajr)->format('h:i A') }}</td>
                            <td style="padding: 15px; text-align: center;">{{ \Carbon\Carbon::parse($pt->sunrise)->format('h:i A') }}</td>
                            <td style="padding: 15px; text-align: center;">{{ \Carbon\Carbon::parse($pt->dhuhr)->format('h:i A') }}</td>
                            <td style="padding: 15px; text-align: center;">{{ \Carbon\Carbon::parse($pt->asr)->format('h:i A') }}</td>
                            <td style="padding: 15px; text-align: center; font-weight: bold; color: var(--primary-dark);">{{ \Carbon\Carbon::parse($pt->maghrib)->format('h:i A') }}</td>
                            <td style="padding: 15px; text-align: center;">{{ \Carbon\Carbon::parse($pt->isha)->format('h:i A') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($prayerTimes->count() == 0)
                <div style="text-align: center; padding: 40px; color: #666;">
                    <i class="fas fa-info-circle fa-2x" style="color: var(--gold); margin-bottom: 15px; display: block;"></i>
                    Prayer times schedule is currently being updated for {{ $city->name }}.
                </div>
                @endif
            </div>
        </div>
        
    </div>
</section>
@endsection

```

## File: resources/views/pages/prayer-times/hub.blade.php

```html
@extends('layouts.app')

@section('title', 'Accurate Islamic Prayer Times — Salat & Namaz Timings Worldwide')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Prayer Times</span>
            </div>
        </div>
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-clock"></i> Timings</div>
            <h1 class="section-title">Prayer <span>Times</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Accurate daily Salat timings for major cities around the world.</p>
        </div>

        <div class="services-grid">
            @foreach($cities as $city)
            <div class="service-card" style="text-align: center;">
                <div class="service-icon"><i class="fas fa-mosque"></i></div>
                <h3 style="margin-bottom: 15px;">{{ $city->name }}</h3>
                <p style="margin-bottom: 20px; font-size: 0.95rem; color: #666;">View daily Namaz timings and the monthly calendar for {{ $city->name }}.</p>
                <a href="{{ route('prayer-times.city', $city->slug) }}" class="service-link">View Timings <i class="fas fa-arrow-right"></i></a>
            </div>
            @endforeach
            @if($cities->count() == 0)
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                <p style="color: #666;">No cities found.</p>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/privacy.blade.php

```html
@extends('layouts.app')

@section('title', 'Privacy Policy — Noor-e-Islam')
@section('meta_description', 'Privacy Policy for Noor-e-Islam. Read about how we handle and protect your personal information.')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Privacy Policy</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-shield-alt"></i> Policy</div>
            <h1 class="section-title">Privacy <span>Policy</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Last Updated: {{ date('F d, Y') }}</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" style="border-top: 4px solid var(--primary);">
                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-database" style="color: var(--gold); margin-right: 10px;"></i> 1. Information We Collect</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    We collect minimal personal information. When you subscribe to our newsletter or fill out a contact form, we collect your name and email address. We do not sell or share this information with third parties.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-cookie-bite" style="color: var(--gold); margin-right: 10px;"></i> 2. Use of Cookies</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    Our website may use "cookies" to enhance user experience. You may choose to set your web browser to refuse cookies, or to alert you when cookies are being sent. If you do so, note that some parts of the Site may not function properly.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-map-marker-alt" style="color: var(--gold); margin-right: 10px;"></i> 3. Location Data</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 40px; padding-left: 35px;">
                    To provide accurate prayer times, we may ask for your location. This data is only used locally on your device or to query our database for city-specific times. We do not store or track your exact GPS location.
                </p>

                <h2 style="color: var(--primary-dark); margin-bottom: 20px; font-size: 1.6rem;"><i class="fas fa-envelope" style="color: var(--gold); margin-right: 10px;"></i> 4. Contacting Us</h2>
                <p style="font-size: 1.15rem; line-height: 1.8; color: #555; margin-bottom: 20px; padding-left: 35px;">
                    If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at <a href="{{ route('contact') }}" style="color: var(--primary); font-weight: bold; text-decoration: none;">our contact page</a>.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/surah/show.blade.php

```html
@extends('layouts.app')

@section('title', 'Surah ' . $surah->name_en . ' — Arabic Text, Urdu & English Translation, Audio')

@section('content')
<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="breadcrumb" style="text-align: center; margin-bottom: 40px;">
            <div style="background: rgba(255,255,255,0.9); padding: 10px 25px; border-radius: 50px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.05); font-size: 0.95rem;">
                <a href="{{ route('home') }}" style="color: var(--primary); text-decoration: none;"><i class="fas fa-home"></i> Home</a> 
                <span style="color: #ccc; margin: 0 10px;">/</span> 
                <span style="color: #666; font-weight: 600;">Surah {{ $surah->name_en }}</span>
            </div>
        </div>

        <div class="section-header">
            <div class="section-badge"><i class="fas fa-quran"></i> Quran</div>
            <h1 class="section-title">سورة <span>{{ $surah->name_ar }}</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Surah {{ $surah->name_en }} ({{ $surah->name_ur }})</p>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr; margin-bottom: 40px;">
            <div class="contact-info" style="text-align: center; display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; background: #fafafa;">
                <div style="background: white; padding: 10px 20px; border-radius: 50px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <i class="fas fa-list-ol" style="color: var(--gold); margin-right: 5px;"></i> Ayahs: <strong>{{ $surah->ayah_count }}</strong>
                </div>
                <div style="background: white; padding: 10px 20px; border-radius: 50px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <i class="fas fa-map-marker-alt" style="color: var(--gold); margin-right: 5px;"></i> Revealed: <strong>{{ $surah->revelation_place }}</strong>
                </div>
                <div style="background: white; padding: 10px 20px; border-radius: 50px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <i class="fas fa-book-open" style="color: var(--gold); margin-right: 5px;"></i> Para/Juz: <strong>{{ $surah->para_juz }}</strong>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-bottom: 50px;">
            <a href="{{ route('fazilat.show', $surah->slug) }}" class="btn-primary"><i class="fas fa-star"></i> Read Fazilat (Virtues)</a>
            @if($surah->audio_url)
                <a href="{{ $surah->audio_url }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary);"><i class="fas fa-play-circle"></i> Play Audio</a>
            @endif
            @if($surah->pdf_url)
                <a href="{{ $surah->pdf_url }}" class="btn-outline-hero" style="color: var(--primary); border-color: var(--primary);"><i class="fas fa-file-pdf"></i> Download PDF</a>
            @endif
        </div>

        @if($surah->reviews->count() > 0)
            @php $review = $surah->reviews->first(); @endphp
            <div style="text-align: center; margin-bottom: 40px;">
                <div style="display: inline-flex; align-items: center; background: #e8f5e9; color: #2e7d32; padding: 8px 20px; border-radius: 50px; font-size: 0.95rem; border: 1px solid #c8e6c9;">
                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                    <span>Verified by <strong>{{ $review->scholar->name }}</strong> ({{ $review->scholar->credential }})</span>
                </div>
            </div>
        @endif

        <div style="text-align: center; font-size: 3rem; font-family: 'Amiri', serif; margin-bottom: 50px; color: var(--primary-dark);">
            بِسْمِ ٱللَّٰهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ
        </div>

        @if($surah->arabic_text)
            <div class="contact-grid" style="grid-template-columns: 1fr; margin-bottom: 40px;">
                <div class="contact-info" style="text-align: right;">
                    <h3 style="color: var(--primary); margin-bottom: 20px;">Full Arabic Text</h3>
                    <p style="font-family: 'Amiri', serif; font-size: 2.2rem; line-height: 2.5; color: #333;">
                        {{ $surah->arabic_text }}
                    </p>
                </div>
            </div>
        @endif

        @if($surah->ayahs->count() > 0)
            <div class="services-grid" style="grid-template-columns: 1fr;">
                @foreach($surah->ayahs as $ayah)
                    <div class="service-card" style="margin-bottom: 20px; text-align: right;">
                        <div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
                            <div style="font-family: 'Amiri', serif; font-size: 2.4rem; line-height: 2; margin-right: 20px; color: #111;">
                                {{ $ayah->arabic_text }}
                            </div>
                            <div style="display: inline-block; width: 45px; height: 45px; background: var(--gold-light); color: var(--primary-dark); border-radius: 50%; text-align: center; line-height: 45px; font-weight: bold; flex-shrink: 0; font-size: 1.2rem;">{{ $ayah->ayah_number }}</div>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; background: #fafafa; padding: 25px; border-radius: 8px; text-align: left; border-top: 1px solid #eee;">
                            <div style="text-align: right; border-right: 1px solid #ddd; padding-right: 20px;">
                                <h4 style="color: var(--primary); font-size: 1rem; margin-bottom: 10px; text-transform: uppercase;">Urdu Translation</h4>
                                <div style="font-family: 'Amiri', serif; font-size: 1.5rem; line-height: 1.8; color: #444;">
                                    {{ $ayah->urdu_translation }}
                                </div>
                            </div>
                            <div>
                                <h4 style="color: var(--primary); font-size: 1rem; margin-bottom: 10px; text-transform: uppercase;">English Translation</h4>
                                <div style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; line-height: 1.6; color: #555;">
                                    {{ $ayah->english_translation }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        
        @if(!$surah->arabic_text && $surah->ayahs->count() == 0)
            <div class="contact-grid" style="grid-template-columns: 1fr;">
                <div class="contact-info" style="text-align: center; padding: 50px;">
                    <i class="fas fa-info-circle fa-3x" style="margin-bottom: 15px; color: var(--gold);"></i>
                    <p style="font-size: 1.2rem; color: #666;">Content for this Surah is currently being updated. Please check back later.</p>
                </div>
            </div>
        @endif
    
        <div class="section-header" style="margin-top: 80px;">
            <h2 class="section-title">Frequently Asked <span>Questions</span></h2>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
        </div>

        <div class="contact-grid" style="grid-template-columns: 1fr;">
            <div class="contact-info" itemscope itemtype="https://schema.org/FAQPage">
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                    <h3 itemprop="name" style="font-size: 1.3rem; color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-question-circle" style="color: var(--gold); margin-right: 10px;"></i> Where was Surah {{ $surah->name_en }} revealed?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" style="color: #666; font-size: 1.1rem; padding-left: 30px;">Surah {{ $surah->name_en }} is a <strong>{{ $surah->revelation_place }}</strong> Surah.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                    <h3 itemprop="name" style="font-size: 1.3rem; color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-question-circle" style="color: var(--gold); margin-right: 10px;"></i> How many Ayahs are in Surah {{ $surah->name_en }}?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" style="color: #666; font-size: 1.1rem; padding-left: 30px;">There are <strong>{{ $surah->ayah_count }}</strong> Ayahs in Surah {{ $surah->name_en }}.</p>
                    </div>
                </div>
                <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 itemprop="name" style="font-size: 1.3rem; color: var(--primary-dark); margin-bottom: 10px;"><i class="fas fa-question-circle" style="color: var(--gold); margin-right: 10px;"></i> Which Juz (Para) contains Surah {{ $surah->name_en }}?</h3>
                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text" style="color: #666; font-size: 1.1rem; padding-left: 30px;">Surah {{ $surah->name_en }} is located in Juz <strong>{{ $surah->para_juz }}</strong>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

```

## File: resources/views/pages/tasbeeh/tracker.blade.php

```html
@extends('layouts.app')

@section('title', 'Digital Tasbeeh Tracker')

@section('content')
<style>
    .tasbeeh-widget {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: 1px solid #eaeaea;
        padding: 30px;
        max-width: 500px;
        margin: 0 auto;
    }
    .tasbeeh-header {
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }
    .tasbeeh-header h3 {
        color: var(--primary-dark);
        font-size: 1.3rem;
        margin: 0;
    }
    .tasbeeh-display {
        text-align: center;
        margin: 20px 0;
    }
    .tasbeeh-count {
        font-size: 4.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        font-family: 'Poppins', sans-serif;
        line-height: 1;
    }
    .btn-tap {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: var(--primary);
        color: white;
        font-size: 1.6rem;
        font-weight: 600;
        border: none;
        box-shadow: 0 4px 10px rgba(5,67,62,0.2);
        cursor: pointer;
        transition: transform 0.1s;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px auto;
        user-select: none;
    }
    .btn-tap:active {
        transform: scale(0.95);
        background: var(--primary-dark);
    }
    .tasbeeh-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fcfcfc;
        padding: 15px 20px;
        border-radius: 12px;
        border: 1px solid #f0f0f0;
    }
    .target-group label {
        display: block;
        font-size: 0.85rem;
        color: #777;
        margin-bottom: 5px;
        font-weight: 500;
    }
    .settings-select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        color: #333;
        background: #fff;
        cursor: pointer;
        min-width: 120px;
    }
    .settings-select:focus {
        border-color: var(--primary);
        outline: none;
    }
    .btn-reset {
        background: #fff;
        color: #e74c3c;
        border: 1px solid #f5b7b1;
        padding: 8px 15px;
        border-radius: 8px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-reset:hover {
        background: #fdf2f1;
        border-color: #e74c3c;
    }
</style>

<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-hand-holding-heart"></i> Spiritual</div>
            <h1 class="section-title">Digital <span>Tasbeeh</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Remember Allah constantly. Your dhikr progress is saved locally on your device.</p>
        </div>

        <div class="tasbeeh-widget">
            <div class="tasbeeh-header">
                <h3><i class="fas fa-circle-notch" style="color: var(--gold); margin-right: 5px;"></i> Dhikr Counter</h3>
            </div>
            
            <div class="tasbeeh-display">
                <div id="tasbeehCount" class="tasbeeh-count">0</div>
            </div>
            
            <button id="tapBtn" class="btn-tap">TAP</button>
            
            <div class="tasbeeh-controls">
                <div class="target-group">
                    <label>Target Cycle</label>
                    <select id="targetSelect" class="settings-select">
                        <option value="33">33</option>
                        <option value="100">100</option>
                        <option value="1000">1000</option>
                        <option value="infinite">Infinite</option>
                    </select>
                </div>
                <div>
                    <button id="resetBtn" class="btn-reset"><i class="fas fa-undo"></i> Reset</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var countEl = document.getElementById('tasbeehCount');
    var tapBtn = document.getElementById('tapBtn');
    var resetBtn = document.getElementById('resetBtn');
    var targetSelect = document.getElementById('targetSelect');

    var currentCount = parseInt(localStorage.getItem('tasbeeh_count')) || 0;
    countEl.innerText = currentCount;

    tapBtn.addEventListener('click', function(e) {
        e.preventDefault();
        currentCount++;
        var target = targetSelect.value;
        if(target !== 'infinite' && currentCount > parseInt(target)) {
            currentCount = 1; // reset cycle
            showToast('Tasbeeh target reached! Starting new cycle.', 'success');
        }
        countEl.innerText = currentCount;
        localStorage.setItem('tasbeeh_count', currentCount);
        
        // Vibrate for mobile
        if(navigator.vibrate) navigator.vibrate(30);
    });

    // Support spacebar for tapping
    document.addEventListener('keydown', function(e) {
        if(e.code === 'Space' && e.target === document.body) {
            e.preventDefault();
            tapBtn.click();
            tapBtn.style.transform = 'scale(0.95)';
            setTimeout(() => tapBtn.style.transform = 'scale(1)', 100);
        }
    });

    resetBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to reset your dhikr count?')) {
            currentCount = 0;
            countEl.innerText = currentCount;
            localStorage.setItem('tasbeeh_count', 0);
        }
    });
});
</script>
@endsection

```

## File: resources/views/pages/zakat/calculator.blade.php

```html
@extends('layouts.app')

@section('title', 'Zakat Calculator')

@section('content')
<style>
    .premium-form-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 40px;
        position: relative;
    }
    .premium-form-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--primary-light));
        border-radius: 20px 20px 0 0;
    }
    .premium-result-card {
        background: linear-gradient(135deg, rgba(var(--gold-rgb), 0.1), rgba(var(--gold-rgb), 0.02));
        border-radius: 20px;
        border: 1px solid rgba(var(--gold-rgb), 0.2);
        padding: 40px;
        text-align: center;
        box-shadow: inset 0 0 20px rgba(255,255,255,0.5);
    }
    .zakat-input-group {
        position: relative;
        margin-bottom: 25px;
    }
    .zakat-input-group label {
        font-weight: 600;
        color: var(--primary-dark);
        display: block;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }
    .zakat-input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }
    .zakat-currency {
        position: absolute;
        left: 15px;
        color: #888;
        font-weight: 500;
    }
    .zakat-input {
        width: 100%;
        padding: 15px 15px 15px 55px;
        border: 2px solid #eee;
        border-radius: 12px;
        font-size: 1.1rem;
        transition: all 0.3s;
        background: #fdfdfd;
        color: var(--primary-dark);
        font-weight: 500;
    }
    .zakat-input:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
        background: #fff;
    }
    .zakat-rate-hint {
        font-size: 0.8rem;
        color: #777;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .btn-calculate {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        width: 100%;
        padding: 16px;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 10px 20px rgba(5,67,62,0.2);
    }
    .btn-calculate:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(5,67,62,0.3);
    }
    .summary-value {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-dark);
        font-family: 'Poppins', sans-serif;
        margin: 10px 0;
        line-height: 1.2;
    }
    .summary-label {
        color: #666;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }
    .payable-value {
        font-size: 3.5rem;
        color: var(--gold);
        background: linear-gradient(135deg, var(--gold), #d4af37);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .status-alert {
        padding: 15px 20px;
        border-radius: 10px;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-top: 30px;
        font-weight: 500;
    }
</style>

<section class="section services-section" style="padding-top: 120px;">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-badge"><i class="fas fa-calculator"></i> Obligation</div>
            <h1 class="section-title">Zakat <span>Calculator</span></h1>
            <div class="arabic-divider"><span class="line"></span><span class="symbol">﷽</span><span class="line"></span></div>
            <p class="section-subtitle">Calculate your Zakat effortlessly. The Nisab threshold is updated automatically based on current rates.</p>
        </div>

        <div class="contact-grid">
            <!-- INPUT CARD -->
            <div class="premium-form-card">
                <h3 style="color: var(--primary-dark); margin-bottom: 25px; font-size: 1.4rem; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                    <i class="fas fa-coins" style="color: var(--gold); margin-right: 8px;"></i> Assets & Wealth
                </h3>
                <form id="zakatForm">
                    <div class="zakat-input-group">
                        <label>Cash in Hand / Bank</label>
                        <div class="zakat-input-wrapper">
                            <span class="zakat-currency">{{ $config->currency_code }}</span>
                            <input type="number" id="cashAmount" class="zakat-input" value="0" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="zakat-input-group">
                        <label>Gold Value</label>
                        <div class="zakat-input-wrapper">
                            <span class="zakat-currency">{{ $config->currency_code }}</span>
                            <input type="number" id="goldAmount" class="zakat-input" value="0" min="0" step="0.01">
                        </div>
                        <div class="zakat-rate-hint"><i class="fas fa-info-circle"></i> Current Rate: {{ $config->currency_code }} {{ number_format($config->gold_price_per_gram, 2) }} / gram</div>
                    </div>

                    <div class="zakat-input-group">
                        <label>Silver Value</label>
                        <div class="zakat-input-wrapper">
                            <span class="zakat-currency">{{ $config->currency_code }}</span>
                            <input type="number" id="silverAmount" class="zakat-input" value="0" min="0" step="0.01">
                        </div>
                        <div class="zakat-rate-hint"><i class="fas fa-info-circle"></i> Current Rate: {{ $config->currency_code }} {{ number_format($config->silver_price_per_gram, 2) }} / gram</div>
                    </div>

                    <div class="zakat-input-group" style="margin-bottom: 35px;">
                        <label>Debts / Liabilities</label>
                        <div class="zakat-input-wrapper">
                            <span class="zakat-currency" style="color: #e74c3c;">- {{ $config->currency_code }}</span>
                            <input type="number" id="liabilities" class="zakat-input" value="0" min="0" step="0.01" style="padding-left: 65px; border-color: #fceceb;">
                        </div>
                    </div>

                    <button type="button" id="calculateBtn" class="btn-calculate">
                        <i class="fas fa-calculator"></i> Calculate My Zakat
                    </button>
                </form>
            </div>
            
            <!-- OUTPUT CARD -->
            <div class="premium-result-card">
                <h3 style="color: var(--primary-dark); margin-bottom: 30px; font-size: 1.4rem;">
                    <i class="fas fa-receipt" style="color: var(--primary);"></i> Summary
                </h3>
                
                <div style="margin-bottom: 40px;">
                    <div class="summary-label">Total Eligible Wealth</div>
                    <div id="totalWealth" class="summary-value">{{ $config->currency_code }} 0.00</div>
                </div>

                <div style="margin-bottom: 20px; padding-top: 30px; border-top: 1px dashed rgba(var(--gold-rgb), 0.3);">
                    <div class="summary-label" style="color: var(--primary-dark);">Total Zakat Payable (2.5%)</div>
                    <div id="zakatPayable" class="summary-value payable-value">{{ $config->currency_code }} 0.00</div>
                </div>

                <div id="zakatStatus" class="status-alert" style="background: rgba(var(--primary-rgb), 0.05); color: var(--primary-dark); border: 1px solid rgba(var(--primary-rgb), 0.1);"></div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var goldRate = {{ $config->gold_price_per_gram }};
    var silverRate = {{ $config->silver_price_per_gram }};
    var nisabThreshold = silverRate * 595; // Nisab is typically 595 grams of silver
    
    document.getElementById('zakatStatus').innerHTML = 'The current Nisab threshold is <strong>{{ $config->currency_code }} ' + nisabThreshold.toFixed(2) + '</strong> (based on 595g of silver).';

    document.getElementById('calculateBtn').addEventListener('click', function(e) {
        e.preventDefault();
        
        var cash = parseFloat(document.getElementById('cashAmount').value) || 0;
        var gold = parseFloat(document.getElementById('goldAmount').value) || 0;
        var silver = parseFloat(document.getElementById('silverAmount').value) || 0;
        var liabilities = parseFloat(document.getElementById('liabilities').value) || 0;

        var totalAssets = cash + gold + silver;
        var netWealth = totalAssets - liabilities;

        var currency = '{{ $config->currency_code }}';

        document.getElementById('totalWealth').innerText = currency + ' ' + Math.max(0, netWealth).toFixed(2);

        if(netWealth >= nisabThreshold) {
            var zakat = netWealth * 0.025;
            document.getElementById('zakatPayable').innerText = currency + ' ' + zakat.toFixed(2);
            document.getElementById('zakatStatus').innerHTML = '<span style="color: var(--primary);"><i class="fas fa-check-circle"></i> Your wealth meets the Nisab threshold. Zakat is obligatory.</span>';
        } else {
            document.getElementById('zakatPayable').innerText = currency + ' 0.00';
            document.getElementById('zakatStatus').innerHTML = '<span style="color: #e74c3c;"><i class="fas fa-info-circle"></i> Your wealth is below the Nisab threshold (' + currency + ' ' + nisabThreshold.toFixed(2) + '). Zakat is not obligatory upon you at this time.</span>';
        }
    });
});
</script>
@endsection

```

## File: resources/css/app.css

```css

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #145DA0;
            --primary-dark: #0C3D6E;
            --primary-light: #3D8FD1;
            --primary-glow: rgba(20, 93, 160, 0.25);
            --primary-subtle: rgba(20, 93, 160, 0.07);
            --secondary: #F5F8F7;
            --secondary-dark: #E8F1ED;
            --secondary-light: #FBFDFC;
            --gold: #B8863B;
            --gold-light: #D9AE6C;
            --gold-dark: #8C631F;
            --text-dark: #15211D;
            --text-medium: #44544E;
            --text-light: #76867F;
            --white: #ffffff;
            --shadow-sm: 0 1px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.10);
            --shadow-xl: 0 12px 48px rgba(0, 0, 0, 0.12);
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 16px;
            --radius-xl: 28px;
            --tr: all 0.25s ease;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            width: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--secondary-light);
            color: var(--text-dark);
            line-height: 1.7;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            width: 100%;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* ====== ISLAMIC PATTERN ====== */
        .islamic-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.03;
            pointer-events: none;
            background-image:
                linear-gradient(30deg, var(--primary) 12%, transparent 12.5%, transparent 87%, var(--primary) 87.5%, var(--primary)),
                linear-gradient(150deg, var(--primary) 12%, transparent 12.5%, transparent 87%, var(--primary) 87.5%, var(--primary)),
                linear-gradient(30deg, var(--primary) 12%, transparent 12.5%, transparent 87%, var(--primary) 87.5%, var(--primary)),
                linear-gradient(150deg, var(--primary) 12%, transparent 12.5%, transparent 87%, var(--primary) 87.5%, var(--primary)),
                linear-gradient(60deg, var(--gold) 25%, transparent 25.5%, transparent 75%, var(--gold) 75%, var(--gold)),
                linear-gradient(60deg, var(--gold) 25%, transparent 25.5%, transparent 75%, var(--gold) 75%, var(--gold));
            background-size: 80px 140px;
            background-position: 0 0, 0 0, 40px 70px, 40px 70px, 0 0, 40px 70px;
        }

        /* ====== ARABIC DIVIDER ====== */
        .arabic-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            margin: 14px 0;
        }

        .arabic-divider .line {
            height: 1px;
            width: 70px;
            background: linear-gradient(to right, transparent, var(--gold), transparent);
        }

        .arabic-divider .symbol {
            color: var(--gold);
            font-family: 'Amiri', serif;
            font-size: 1.4rem;
        }

        /* ====== TOP BAR ====== */
        .top-bar {
            background: var(--primary-dark);
            padding: 7px 0;
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.85);
        }

        .top-bar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-left {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .top-bar-left span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top-bar-left i {
            color: var(--gold-light);
            font-size: 0.72rem;
        }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .top-bar-right a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.68rem;
            transition: var(--tr);
        }

        .top-bar-right a:hover {
            background: var(--gold);
            color: var(--primary-dark);
            border-color: var(--gold);
        }

        .hijri-date {
            font-family: 'Amiri', serif;
            color: var(--gold-light);
            font-size: 0.88rem;
        }

        /* ====== NAVBAR ====== */
        .navbar {
            background: var(--white);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(20, 93, 160, 0.06);
            transition: var(--tr);
        }

        .navbar.scrolled {
            box-shadow: var(--shadow-md);
            border-bottom-color: transparent;
        }

        .navbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .logo-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: 0 3px 12px var(--primary-glow);
        }

        .logo-icon i {
            color: var(--white);
            font-size: 1.1rem;
        }

        .logo-icon::after {
            content: '';
            position: absolute;
            inset: -2.5px;
            border-radius: 50%;
            border: 1.5px solid var(--gold);
            opacity: 0.4;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text-ar {
            font-family: 'Amiri', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-dark);
            line-height: 1.15;
        }

        .logo-text-en {
            font-size: 0.6rem;
            color: var(--text-light);
            letter-spacing: 2.5px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 2px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-medium);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            transition: var(--tr);
            position: relative;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--primary);
            background: var(--primary-subtle);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: 3px;
            left: 50%;
            transform: translateX(-50%);
            width: 18px;
            height: 2px;
            background: var(--primary);
            border-radius: 2px;
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            color: var(--white) !important;
            padding: 9px 22px !important;
            border-radius: var(--radius-xl) !important;
            font-weight: 600 !important;
            box-shadow: 0 3px 12px var(--primary-glow);
            margin-left: 6px;
        }

        .nav-cta:hover {
            box-shadow: 0 5px 20px var(--primary-glow) !important;
        }

        .nav-cta::after {
            display: none !important;
        }

        .mobile-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 8px;
            border: none;
            background: none;
            z-index: 1002;
        }

        .mobile-toggle span {
            width: 22px;
            height: 2px;
            background: var(--text-dark);
            border-radius: 2px;
            transition: var(--tr);
        }

        .mobile-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .mobile-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        /* ====== HERO ====== */
        .hero {
            position: relative;
            min-height: 92vh;
            display: flex;
            align-items: center;
            background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 45%, #1C7BC4 75%, var(--primary-dark) 100%);
        }

        .hero-bg-dots {
            position: absolute;
            inset: 0;
            opacity: 0.04;
            background-image:
                radial-gradient(circle at 25% 25%, var(--gold) 1px, transparent 1px),
                radial-gradient(circle at 75% 75%, var(--white) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .hero-glow {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-glow-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(184, 134, 59, 0.12), transparent 70%);
            top: -180px;
            right: -80px;
        }

        .hero-glow-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(20, 93, 160, 0.15), transparent 70%);
            bottom: -120px;
            left: -80px;
        }

        .hero-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 100px 28px 70px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .hero-content {
            color: var(--white);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.09);
            backdrop-filter: blur(8px);
            padding: 7px 18px;
            border-radius: var(--radius-xl);
            font-size: 0.78rem;
            font-weight: 500;
            margin-bottom: 22px;
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .hero-badge i {
            color: var(--gold-light);
        }

        .hero-bismillah {
            font-family: 'Amiri', serif;
            font-size: 1.85rem;
            color: var(--gold-light);
            margin-bottom: 8px;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 18px;
        }

        .hero-title span {
            color: var(--gold-light);
        }

        .hero-desc {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.78);
            margin-bottom: 32px;
            max-width: 480px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: var(--primary-dark);
            padding: 13px 28px;
            border-radius: var(--radius-xl);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.92rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 3px 16px rgba(184, 134, 59, 0.25);
            transition: var(--tr);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 24px rgba(184, 134, 59, 0.35);
        }

        .btn-outline-hero {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            color: var(--white);
            padding: 13px 28px;
            border-radius: var(--radius-xl);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.92rem;
            border: 1px solid rgba(255, 255, 255, 0.18);
            cursor: pointer;
            transition: var(--tr);
        }

        .btn-outline-hero:hover {
            background: rgba(255, 255, 255, 0.16);
        }

        .hero-stats {
            display: flex;
            gap: 36px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
        }

        .hero-stat h3 {
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--gold-light);
        }

        .hero-stat p {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.55);
            margin-top: 1px;
        }

        .hero-visual {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-mosque-container {
            position: relative;
            width: 100%;
            max-width: 440px;
        }

        .hero-mosque-bg {
            width: 100%;
            aspect-ratio: 1;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.06), rgba(184, 134, 59, 0.08));
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-mosque-icon {
            font-size: 7rem;
            color: rgba(255, 255, 255, 0.85);
            filter: drop-shadow(0 8px 24px rgba(0, 0, 0, 0.18));
        }

        .hero-floating-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: var(--radius-md);
            padding: 12px 18px;
            color: var(--white);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }

        .hero-floating-card i {
            color: var(--gold-light);
            font-size: 1rem;
        }

        .float-card-1 {
            top: 12%;
            right: -10px;
        }

        .float-card-2 {
            bottom: 18%;
            left: -20px;
        }

        .float-card-3 {
            top: 52%;
            right: -30px;
        }

        /* ====== PRAYER TIMES ====== */
        .prayer-ticker {
            background: var(--secondary);
            border-bottom: 1px solid rgba(20, 93, 160, 0.06);
            padding: 16px 0;
        }

        .prayer-ticker-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .prayer-ticker-label {
            display: flex;
            align-items: center;
            gap: 9px;
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 0.9rem;
        }

        .prayer-ticker-label i {
            color: var(--gold);
            font-size: 1.1rem;
        }

        .prayer-times-list {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .prayer-time-chip {
            display: flex;
            align-items: center;
            gap: 7px;
            background: var(--white);
            padding: 7px 16px;
            border-radius: var(--radius-xl);
            font-size: 0.8rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(20, 93, 160, 0.05);
            transition: var(--tr);
        }

        .prayer-time-chip:hover {
            border-color: var(--primary);
        }

        .prayer-time-chip.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 3px 12px var(--primary-glow);
        }

        .prayer-time-chip .prayer-name {
            font-weight: 600;
        }

        .prayer-time-chip .prayer-time-val {
            color: var(--text-light);
            font-weight: 500;
        }

        .prayer-time-chip.active .prayer-time-val {
            color: rgba(255, 255, 255, 0.8);
        }

        /* ====== SECTIONS ====== */
        .section {
            padding: 90px 0;
            position: relative;
        }

        .section-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 28px;
            position: relative;
            z-index: 2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 55px;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--primary-subtle);
            color: var(--primary);
            padding: 5px 16px;
            border-radius: var(--radius-xl);
            font-size: 0.74rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 14px;
            border: 1px solid rgba(20, 93, 160, 0.10);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.6rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .section-title span {
            color: var(--primary);
        }

        .section-subtitle {
            font-size: 0.95rem;
            color: var(--text-light);
            max-width: 560px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* ====== ABOUT ====== */
        .about-section {
            background: var(--secondary);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image-wrapper {
            position: relative;
        }

        .about-image-main {
            width: 100%;
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .about-image-main img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            display: block;
        }

        .about-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(20, 93, 160, 0.25), transparent 55%);
            border-radius: var(--radius-lg);
        }

        .about-image-frame {
            position: absolute;
            bottom: -16px;
            right: -16px;
            width: 180px;
            height: 180px;
            border: 2.5px solid var(--gold);
            border-radius: var(--radius-lg);
            z-index: -1;
        }

        .about-experience-badge {
            position: absolute;
            bottom: 22px;
            left: 22px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: var(--primary-dark);
            padding: 14px 22px;
            border-radius: var(--radius-md);
            text-align: center;
            box-shadow: var(--shadow-md);
        }

        .about-experience-badge h3 {
            font-size: 1.8rem;
            font-weight: 800;
            line-height: 1;
        }

        .about-experience-badge p {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.25;
        }

        .about-content h2 span {
            color: var(--primary);
        }

        .about-content .about-arabic-line {
            font-family: 'Amiri', serif;
            font-size: 1.15rem;
            color: var(--gold-dark);
            margin-bottom: 18px;
        }

        .about-content p {
            color: var(--text-medium);
            margin-bottom: 14px;
            line-height: 1.8;
            font-size: 0.92rem;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin: 28px 0;
        }

        .about-feature {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 14px;
            background: var(--white);
            border-radius: var(--radius-sm);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(20, 93, 160, 0.04);
            transition: var(--tr);
        }

        .about-feature:hover {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--primary-subtle);
        }

        .about-feature i {
            color: var(--primary);
            font-size: 0.9rem;
            width: 30px;
            height: 30px;
            background: var(--primary-subtle);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .about-feature span {
            font-size: 0.83rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        /* ====== PILLARS ====== */
        .pillars-section {
            background: var(--white);
        }

        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
        }

        .pillar-card {
            text-align: center;
            padding: 30px 18px;
            border-radius: var(--radius-lg);
            background: var(--secondary-light);
            border: 1px solid rgba(20, 93, 160, 0.05);
            transition: var(--tr);
            position: relative;
            overflow: hidden;
        }

        .pillar-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--primary), var(--gold));
            transform: scaleX(0);
            transition: var(--tr);
            transform-origin: left;
        }

        .pillar-card:hover::before {
            transform: scaleX(1);
        }

        .pillar-card:hover {
            box-shadow: var(--shadow-md);
            border-color: rgba(20, 93, 160, 0.12);
        }

        .pillar-number {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            font-size: 1.1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 3px 10px var(--primary-glow);
        }

        .pillar-icon {
            font-size: 2rem;
            margin-bottom: 12px;
            display: block;
        }

        .pillar-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .pillar-card h4 {
            font-family: 'Amiri', serif;
            font-size: 0.95rem;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .pillar-card p {
            font-size: 0.78rem;
            color: var(--text-light);
            line-height: 1.6;
        }

        /* ====== QURAN VERSES ====== */
        .quran-section {
            background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #1C7BC4 100%);
            position: relative;
        }

        .quran-section .section-badge {
            background: rgba(255, 255, 255, 0.08);
            color: var(--gold-light);
            border-color: rgba(255, 255, 255, 0.12);
        }

        .quran-section .section-title {
            color: var(--white);
        }

        .quran-section .section-title span {
            color: var(--gold-light);
        }

        .quran-section .section-subtitle {
            color: rgba(255, 255, 255, 0.55);
        }

        .quran-verse-carousel {
            position: relative;
            max-width: 780px;
            margin: 0 auto;
        }

        .quran-verse-slide {
            display: none;
            text-align: center;
        }

        .quran-verse-slide.active {
            display: block;
        }

        .quran-verse-arabic {
            font-family: 'Amiri', serif;
            font-size: 2rem;
            color: var(--white);
            line-height: 2;
            margin-bottom: 22px;
        }

        .quran-verse-translation {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.78);
            font-style: italic;
            margin-bottom: 14px;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        .quran-verse-ref {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(184, 134, 59, 0.12);
            color: var(--gold-light);
            padding: 5px 18px;
            border-radius: var(--radius-xl);
            font-size: 0.82rem;
            font-weight: 500;
            border: 1px solid rgba(184, 134, 59, 0.18);
        }

        .quran-carousel-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            margin-top: 36px;
        }

        .quran-carousel-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.18);
            background: rgba(255, 255, 255, 0.04);
            color: var(--white);
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--tr);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quran-carousel-btn:hover {
            background: var(--gold);
            color: var(--primary-dark);
            border-color: var(--gold);
        }

        .quran-carousel-dots {
            display: flex;
            gap: 7px;
        }

        .quran-carousel-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.18);
            cursor: pointer;
            transition: var(--tr);
            border: none;
        }

        .quran-carousel-dot.active {
            background: var(--gold);
            width: 26px;
            border-radius: 5px;
        }

        /* ====== SERVICES ====== */
        .services-section {
            background: var(--secondary);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .service-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 36px 28px;
            border: 1px solid rgba(20, 93, 160, 0.05);
            transition: var(--tr);
            position: relative;
            overflow: hidden;
        }

        .service-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: linear-gradient(to top, var(--primary-subtle), transparent);
            transition: var(--tr);
        }

        .service-card:hover::after {
            height: 100%;
        }

        .service-card:hover {
            box-shadow: var(--shadow-md);
            border-color: rgba(20, 93, 160, 0.12);
        }

        .service-icon {
            width: 58px;
            height: 58px;
            border-radius: var(--radius-md);
            background: linear-gradient(135deg, var(--primary-subtle), rgba(20, 93, 160, 0.12));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            color: var(--primary);
            margin-bottom: 20px;
            transition: var(--tr);
            position: relative;
            z-index: 1;
        }

        .service-card:hover .service-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 3px 12px var(--primary-glow);
        }

        .service-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.12rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .service-card p {
            font-size: 0.85rem;
            color: var(--text-light);
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        .service-card .service-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 16px;
            color: var(--primary);
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--tr);
            position: relative;
            z-index: 1;
        }

        .service-card .service-link:hover {
            gap: 11px;
            color: var(--primary-dark);
        }

        /* ====== LEARN ====== */
        .learn-section {
            background: var(--white);
        }

        .learn-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .learn-tabs {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .learn-tab {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px 22px;
            background: var(--secondary-light);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: var(--tr);
            border: 2px solid transparent;
        }

        .learn-tab:hover {
            background: var(--secondary);
        }

        .learn-tab.active {
            background: var(--white);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-subtle);
        }

        .learn-tab-icon {
            width: 46px;
            height: 46px;
            border-radius: var(--radius-sm);
            background: var(--primary-subtle);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: var(--primary);
            flex-shrink: 0;
            transition: var(--tr);
        }

        .learn-tab.active .learn-tab-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 3px 10px var(--primary-glow);
        }

        .learn-tab-content h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .learn-tab-content p {
            font-size: 0.82rem;
            color: var(--text-light);
            line-height: 1.6;
        }

        .learn-visual {
            position: relative;
        }

        .learn-image-container {
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .learn-image-container img {
            width: 100%;
            height: 460px;
            object-fit: cover;
            display: block;
            transition: opacity 0.3s ease;
        }

        .learn-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(20, 93, 160, 0.18), rgba(20, 93, 160, 0.45));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--tr);
            border-radius: var(--radius-lg);
        }

        .learn-image-container:hover .learn-image-overlay {
            opacity: 1;
        }

        .play-btn {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            cursor: pointer;
            box-shadow: var(--shadow-lg);
            border: none;
            padding-left: 4px;
            transition: var(--tr);
        }

        .play-btn:hover {
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.18);
        }

        /* ====== EVENTS ====== */
        .events-section {
            background: var(--secondary);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .event-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid rgba(20, 93, 160, 0.05);
            transition: var(--tr);
        }

        .event-card:hover {
            box-shadow: var(--shadow-md);
        }

        .event-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .event-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--tr);
        }

        .event-card:hover .event-image img {
            transform: scale(1.04);
        }

        .event-date-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 9px 14px;
            border-radius: var(--radius-sm);
            text-align: center;
            line-height: 1.1;
            box-shadow: 0 3px 10px var(--primary-glow);
        }

        .event-date-badge .day {
            font-size: 1.3rem;
            font-weight: 700;
        }

        .event-date-badge .month {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .event-content {
            padding: 22px;
        }

        .event-category {
            display: inline-block;
            background: var(--primary-subtle);
            color: var(--primary);
            padding: 3px 11px;
            border-radius: var(--radius-xl);
            font-size: 0.7rem;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .event-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.08rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .event-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 0.78rem;
            color: var(--text-light);
        }

        .event-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .event-meta i {
            color: var(--primary);
            font-size: 0.72rem;
        }

        /* ====== TESTIMONIALS ====== */
        .testimonials-section {
            background: var(--white);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .testimonial-card {
            background: var(--secondary-light);
            border-radius: var(--radius-lg);
            padding: 32px 28px;
            border: 1px solid rgba(20, 93, 160, 0.05);
            transition: var(--tr);
            position: relative;
        }

        .testimonial-card:hover {
            box-shadow: var(--shadow-sm);
            border-color: rgba(20, 93, 160, 0.10);
        }

        .testimonial-quote-icon {
            position: absolute;
            top: 18px;
            right: 22px;
            font-size: 2.2rem;
            color: var(--primary);
            opacity: 0.07;
            font-family: 'Playfair Display', serif;
            line-height: 1;
        }

        .testimonial-stars {
            color: var(--gold);
            font-size: 0.82rem;
            margin-bottom: 14px;
            display: flex;
            gap: 3px;
        }

        .testimonial-card p {
            font-size: 0.88rem;
            color: var(--text-medium);
            line-height: 1.8;
            margin-bottom: 18px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .testimonial-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-subtle);
        }

        .testimonial-author-info h4 {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .testimonial-author-info span {
            font-size: 0.75rem;
            color: var(--text-light);
        }

        /* ====== CTA ====== */
        .cta-section {
            background: linear-gradient(160deg, var(--primary-dark), var(--primary), #1C7BC4);
            position: relative;
            padding: 90px 0;
        }

        .cta-inner {
            max-width: 760px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .cta-inner h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 14px;
            line-height: 1.2;
        }

        .cta-inner h2 span {
            color: var(--gold-light);
        }

        .cta-inner p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            margin-bottom: 32px;
            line-height: 1.7;
        }

        .cta-buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-gold {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            color: var(--primary-dark);
            padding: 14px 32px;
            border-radius: var(--radius-xl);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 3px 16px rgba(184, 134, 59, 0.25);
            transition: var(--tr);
        }

        .btn-gold:hover {
            box-shadow: 0 6px 24px rgba(184, 134, 59, 0.4);
        }

        .btn-white-outline {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: transparent;
            color: var(--white);
            padding: 14px 32px;
            border-radius: var(--radius-xl);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            cursor: pointer;
            transition: var(--tr);
        }

        .btn-white-outline:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.4);
        }

        /* ====== CONTACT ====== */
        .contact-section {
            background: var(--secondary);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 45px;
        }

        .contact-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .contact-info>p {
            color: var(--text-light);
            margin-bottom: 28px;
            line-height: 1.7;
            font-size: 0.92rem;
        }

        .contact-info-items {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 28px;
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .contact-info-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-sm);
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 0.92rem;
            flex-shrink: 0;
            box-shadow: 0 3px 10px var(--primary-glow);
        }

        .contact-info-item h4 {
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 2px;
        }

        .contact-info-item p {
            font-size: 0.83rem;
            color: var(--text-light);
        }

        .contact-social {
            display: flex;
            gap: 9px;
        }

        .contact-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--tr);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(20, 93, 160, 0.06);
        }

        .contact-social a:hover {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
        }

        .contact-form-wrapper {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 36px;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(20, 93, 160, 0.05);
        }

        .contact-form-wrapper h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 22px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid rgba(20, 93, 160, 0.10);
            border-radius: var(--radius-sm);
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            color: var(--text-dark);
            background: var(--secondary-light);
            outline: none;
            transition: var(--tr);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--primary-subtle);
            background: var(--white);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 110px;
        }

        .form-submit {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            font-family: 'Poppins', sans-serif;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--tr);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            box-shadow: 0 3px 12px var(--primary-glow);
        }

        .form-submit:hover {
            box-shadow: 0 5px 20px var(--primary-glow);
        }

        /* ====== FOOTER ====== */
        .footer {
            background: linear-gradient(180deg, #0A1A2E, #050D18);
            color: rgba(255, 255, 255, 0.65);
            position: relative;
        }

        .footer-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.025;
            pointer-events: none;
            background-image:
                linear-gradient(30deg, var(--white) 12%, transparent 12.5%, transparent 87%, var(--white) 87.5%, var(--white)),
                linear-gradient(150deg, var(--white) 12%, transparent 12.5%, transparent 87%, var(--white) 87.5%, var(--white)),
                linear-gradient(30deg, var(--white) 12%, transparent 12.5%, transparent 87%, var(--white) 87.5%, var(--white)),
                linear-gradient(150deg, var(--white) 12%, transparent 12.5%, transparent 87%, var(--white) 87.5%, var(--white)),
                linear-gradient(60deg, var(--gold) 25%, transparent 25.5%, transparent 75%, var(--gold) 75%, var(--gold)),
                linear-gradient(60deg, var(--gold) 25%, transparent 25.5%, transparent 75%, var(--gold) 75%, var(--gold));
            background-size: 60px 105px;
            background-position: 0 0, 0 0, 30px 52px, 30px 52px, 0 0, 30px 52px;
        }

        .footer-top {
            padding: 60px 0 45px;
            position: relative;
            z-index: 2;
        }

        .footer-grid {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 28px;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.2fr;
            gap: 45px;
        }

        .footer-brand .logo {
            margin-bottom: 18px;
        }

        .footer-brand .logo-text-ar {
            color: var(--white);
        }

        .footer-brand .logo-text-en {
            color: rgba(255, 255, 255, 0.35);
        }

        .footer-brand p {
            font-size: 0.85rem;
            line-height: 1.8;
            margin-bottom: 18px;
            color: rgba(255, 255, 255, 0.45);
        }

        .footer-newsletter {
            display: flex;
            gap: 7px;
        }

        .footer-newsletter input {
            flex: 1;
            padding: 10px 14px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius-sm);
            background: rgba(255, 255, 255, 0.04);
            color: var(--white);
            font-family: 'Poppins', sans-serif;
            font-size: 0.82rem;
            outline: none;
            transition: var(--tr);
        }

        .footer-newsletter input::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }

        .footer-newsletter input:focus {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.06);
        }

        .footer-newsletter button {
            padding: 10px 18px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: var(--tr);
            font-size: 0.85rem;
        }

        .footer-newsletter button:hover {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
        }

        .footer-col h4 {
            color: var(--white);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 18px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 26px;
            height: 2px;
            background: var(--gold);
            border-radius: 2px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 9px;
        }

        .footer-col ul li a {
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            font-size: 0.83rem;
            transition: var(--tr);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .footer-col ul li a:hover {
            color: var(--gold-light);
        }

        .footer-col ul li a i {
            font-size: 0.6rem;
            color: var(--gold);
            opacity: 0.4;
        }

        .footer-prayer-times {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .footer-prayer-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 7px 12px;
            background: rgba(255, 255, 255, 0.025);
            border-radius: var(--radius-sm);
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        .footer-prayer-item .fp-name {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-prayer-item .fp-time {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--gold-light);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 18px 0;
            position: relative;
            z-index: 2;
        }

        .footer-bottom-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .footer-bottom p {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.3);
        }

        .footer-bottom p a {
            color: var(--gold-light);
            text-decoration: none;
        }

        .footer-bottom-links {
            display: flex;
            gap: 18px;
        }

        .footer-bottom-links a {
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
            font-size: 0.78rem;
            transition: var(--tr);
        }

        .footer-bottom-links a:hover {
            color: var(--gold-light);
        }

        /* ====== BACK TO TOP ====== */
        .back-to-top {
            position: fixed;
            bottom: 28px;
            right: 28px;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            box-shadow: 0 3px 14px var(--primary-glow);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: var(--tr);
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            box-shadow: 0 5px 22px var(--primary-glow);
        }

        /* ====== TOAST ====== */
        .toast-container {
            position: fixed;
            top: 90px;
            right: 28px;
            z-index: 99999;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .toast {
            background: var(--white);
            padding: 14px 22px;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 280px;
            transform: translateX(120%);
            transition: var(--tr);
            border-left: 4px solid var(--primary);
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            border-left-color: #22c55e;
        }

        .toast.success i {
            color: #22c55e;
        }

        .toast i {
            font-size: 1.1rem;
            color: var(--primary);
        }

        .toast span {
            font-size: 0.85rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 1024px) {
            .hero-inner {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 36px;
                padding-top: 110px;
            }

            .hero-desc {
                margin: 0 auto 32px;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .hero-visual {
                order: -1;
            }

            .hero-mosque-container {
                max-width: 320px;
            }

            .hero-mosque-icon {
                font-size: 4.5rem;
            }

            .hero-title {
                font-size: 2.6rem;
            }

            .hero-floating-card {
                display: none;
            }

            .pillars-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .about-grid,
            .learn-grid {
                grid-template-columns: 1fr;
                gap: 36px;
            }

            .services-grid,
            .events-grid,
            .testimonials-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 36px;
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 30px;
            }

            .hero-glow-1 {
                width: 360px;
                height: 360px;
            }

            .hero-glow-2 {
                width: 300px;
                height: 300px;
            }
        }

        @media (max-width: 768px) {
            .top-bar {
                display: none;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 270px;
                height: 100vh;
                background: var(--white);
                flex-direction: column;
                padding: 90px 28px 28px;
                box-shadow: var(--shadow-xl);
                transition: var(--tr);
                gap: 4px;
                align-items: flex-start;
                z-index: 1001;
            }

            .nav-links.open {
                right: 0;
            }

            .nav-links a {
                width: 100%;
                padding: 11px 14px;
                font-size: 0.92rem;
            }

            .mobile-toggle {
                display: flex;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-bismillah {
                font-size: 1.4rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .pillars-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .services-grid,
            .events-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .footer-bottom-inner {
                flex-direction: column;
                text-align: center;
            }

            .prayer-ticker-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .quran-verse-arabic {
                font-size: 1.5rem;
            }

            .about-features {
                grid-template-columns: 1fr;
            }

            .hero-stats {
                gap: 22px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .cta-inner h2 {
                font-size: 1.9rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 1.7rem;
            }

            .hero-inner {
                padding: 100px 18px 50px;
            }

            .section {
                padding: 65px 0;
            }

            .section-inner {
                padding: 0 18px;
            }

            .pillars-grid {
                grid-template-columns: 1fr;
            }

            .services-grid,
            .events-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .hero-stats {
                flex-direction: column;
                gap: 14px;
                align-items: center;
            }

            .prayer-times-list {
                justify-content: center;
            }

            .contact-form-wrapper {
                padding: 22px;
            }

            .footer-newsletter {
                flex-direction: column;
            }

            .about-image-main img {
                height: 280px;
            }

            .learn-image-container img {
                height: 260px;
            }

            .hero-glow-1 {
                width: 240px;
                height: 240px;
            }

            .hero-glow-2 {
                width: 200px;
                height: 200px;
            }
        }

        @media (max-width: 380px) {
            .navbar-inner {
                padding: 0 16px;
                height: 64px;
            }

            .logo-text-en {
                font-size: 0.68rem;
            }

            .hero-title {
                font-size: 1.45rem;
            }

            .hero-bismillah {
                font-size: 1.15rem;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .hero-buttons {
                flex-direction: column;
                width: 100%;
            }

            .hero-buttons a {
                width: 100%;
                justify-content: center;
            }

            .prayer-time-chip {
                font-size: 0.78rem;
                padding: 8px 12px;
            }

            .cta-inner h2 {
                font-size: 1.5rem;
            }
        }

        /* ====== MOBILE OVERLAY ====== */
        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: var(--tr);
        }

        .mobile-overlay.show {
            opacity: 1;
            visibility: visible;
        }
    

```

## File: database/migrations/0001_01_01_000000_create_users_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

```

## File: database/migrations/0001_01_01_000001_create_cache_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration')->index();
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};

```

## File: database/migrations/0001_01_01_000002_create_jobs_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};

```

## File: database/migrations/2026_06_21_113528_create_countries_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('flag_code')->nullable();
            $table->string('moon_sighting_authority')->nullable();
            $table->string('default_timezone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

```

## File: database/migrations/2026_06_21_113529_create_cities_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('timezone')->nullable();
            $table->string('prayer_calc_method')->nullable();
            $table->text('local_context_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};

```

## File: database/migrations/2026_06_21_113530_create_hijri_date_caches_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hijri_date_caches', function (Blueprint $table) {
            $table->id();
            $table->date('gregorian_date')->unique();
            $table->integer('hijri_day');
            $table->string('hijri_month');
            $table->integer('hijri_year');
            $table->string('source')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hijri_date_caches');
    }
};

```

## File: database/migrations/2026_06_21_113532_create_prayer_times_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prayer_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->string('fajr');
            $table->string('sunrise');
            $table->string('dhuhr');
            $table->string('asr');
            $table->string('maghrib');
            $table->string('isha');
            $table->string('calc_method')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->unique(['city_id', 'date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_times');
    }
};

```

## File: database/migrations/2026_06_21_113533_create_ramadan_timings_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ramadan_timings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->integer('ramadan_year');
            $table->date('date');
            $table->string('sehri_time');
            $table->string('iftar_time');
            $table->unique(['city_id', 'date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramadan_timings');
    }
};

```

## File: database/migrations/2026_06_21_113535_create_hijri_months_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hijri_months', function (Blueprint $table) {
            $table->id();
            $table->integer('month_number')->unique();
            $table->string('name_ar');
            $table->string('name_ur');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->longText('significance_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hijri_months');
    }
};

```

## File: database/migrations/2026_06_21_113536_create_islamic_events_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('islamic_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('hijri_month_id')->constrained()->cascadeOnDelete();
            $table->integer('hijri_day');
            $table->text('description')->nullable();
            $table->string('event_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islamic_events');
    }
};

```

## File: database/migrations/2026_06_21_113538_create_surahs_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surahs', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->string('name_ar');
            $table->string('name_ur');
            $table->string('name_en');
            $table->string('slug')->unique();
            $table->integer('ayah_count');
            $table->string('para_juz')->nullable();
            $table->string('revelation_place')->nullable();
            $table->longText('arabic_text')->nullable();
            $table->longText('urdu_translation')->nullable();
            $table->longText('english_translation')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('pdf_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surahs');
    }
};

```

## File: database/migrations/2026_06_21_113539_create_surah_ayahs_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surah_ayahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained()->cascadeOnDelete();
            $table->integer('ayah_number');
            $table->longText('arabic_text')->nullable();
            $table->longText('urdu_translation')->nullable();
            $table->longText('english_translation')->nullable();
            $table->unique(['surah_id', 'ayah_number']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surah_ayahs');
    }
};

```

## File: database/migrations/2026_06_21_113540_create_fazilat_entries_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fazilat_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surah_id')->constrained()->cascadeOnDelete();
            $table->string('question');
            $table->text('answer');
            $table->string('hadith_reference')->nullable();
            $table->enum('verification_status', ['verified', 'commonly_cited'])->default('commonly_cited');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fazilat_entries');
    }
};

```

## File: database/migrations/2026_06_21_113542_create_hadith_topics_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hadith_topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic_name');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('hadith_book')->nullable();
            $table->string('hadith_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadith_topics');
    }
};

```

## File: database/migrations/2026_06_21_113543_create_authors_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('credential')->nullable();
            $table->text('bio')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};

```

## File: database/migrations/2026_06_21_113544_create_scholars_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('institution')->nullable();
            $table->string('credential')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholars');
    }
};

```

## File: database/migrations/2026_06_21_113545_create_content_reviews_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('content_reviews', function (Blueprint $table) {
            $table->id();
            $table->morphs('reviewable');
            $table->foreignId('author_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('scholar_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_reviews');
    }
};

```

## File: database/migrations/2026_06_21_113547_create_comments_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->morphs('commentable');
            $table->string('name');
            $table->string('city')->nullable();
            $table->text('body');
            $table->enum('status', ['pending', 'approved', 'spam'])->default('pending');
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

```

## File: database/migrations/2026_06_21_113548_create_seo_metas_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();
            $table->morphs('metaable');
            $table->string('title')->unique()->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('og_image')->nullable();
            $table->json('schema_override_json')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_metas');
    }
};

```

## File: database/migrations/2026_06_21_113548_create_subscribers_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('status')->default('active');
            $table->timestamp('subscribed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};

```

## File: database/migrations/2026_06_21_113550_create_contact_messages_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};

```

## File: database/migrations/2026_06_21_113552_create_site_settings_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

```

## File: database/migrations/2026_06_21_133030_create_historical_events_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historical_events', function (Blueprint $table) {
            $table->id();
            $table->integer('hijri_day');
            $table->string('hijri_month');
            $table->integer('hijri_year')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('source_note');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historical_events');
    }
};

```

## File: database/migrations/2026_06_21_133437_add_local_context_note_to_countries_and_cities.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('countries', 'local_context_note')) {
            Schema::table('countries', function (Blueprint $table) {
                $table->text('local_context_note')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('countries', 'local_context_note')) {
            Schema::table('countries', function (Blueprint $table) {
                $table->dropColumn('local_context_note');
            });
        }
    }
};

```

## File: database/migrations/2026_06_21_162120_create_islamic_names_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('islamic_names', function (Blueprint $table) {
            $table->id();
            $table->string('name_arabic');
            $table->string('name_english');
            $table->string('translation_urdu');
            $table->enum('gender', ['male', 'female', 'unisex'])->index();
            $table->string('origin')->nullable()->index();
            $table->integer('favorited_count')->default(0);
            $table->string('slug')->unique();
            $table->boolean('is_verified')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islamic_names');
    }
};

```

## File: database/migrations/2026_06_21_162122_create_dua_categories_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dua_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_english');
            $table->string('name_urdu');
            $table->string('slug')->unique();
            $table->string('icon_class')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dua_categories');
    }
};

```

## File: database/migrations/2026_06_21_162123_create_duas_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('duas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dua_category_id')->constrained('dua_categories')->onDelete('cascade');
            $table->string('title_english');
            $table->string('title_urdu');
            $table->text('arabic_text');
            $table->text('transliteration');
            $table->text('translation');
            $table->string('reference_source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duas');
    }
};

```

## File: database/migrations/2026_06_21_162125_create_zakat_configs_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zakat_configs', function (Blueprint $table) {
            $table->id();
            $table->decimal('gold_price_per_gram', 10, 2)->default(0);
            $table->decimal('silver_price_per_gram', 10, 2)->default(0);
            $table->string('currency_code', 10)->default('PKR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zakat_configs');
    }
};

```

## File: database/migrations/2026_06_21_164744_add_seo_slug_to_duas_table.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('duas', function (Blueprint $table) {
            $table->string('seo_slug')->unique()->after('translation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('duas', function (Blueprint $table) {
            $table->dropColumn('seo_slug');
        });
    }
};

```

## File: database/migrations/2026_06_21_170627_implement_many_to_many_duas.php

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('duas', function (Blueprint $table) {
            $table->dropForeign(['dua_category_id']);
            $table->dropColumn('dua_category_id');
            $table->string('arabic_text_hash')->unique()->after('id');
        });

        Schema::create('dua_dua_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dua_id')->constrained('duas')->onDelete('cascade');
            $table->foreignId('dua_category_id')->constrained('dua_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('many_duas', function (Blueprint $table) {
            //
        });
    }
};

```

## File: database/seeders/DatabaseSeeder.php

```php
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $country = \App\Models\Country::create([
            'name' => 'Pakistan',
            'slug' => 'pakistan',
            'flag_code' => 'pk',
            'moon_sighting_authority' => 'Ruet-e-Hilal Committee',
            'default_timezone' => 'Asia/Karachi',
        ]);

        $city = \App\Models\City::create([
            'country_id' => $country->id,
            'name' => 'Karachi',
            'slug' => 'karachi',
            'latitude' => 24.8607,
            'longitude' => 67.0011,
            'timezone' => 'Asia/Karachi',
            'prayer_calc_method' => 'University of Islamic Sciences, Karachi',
            'local_context_note' => 'Karachi follows the standard University of Islamic Sciences calculation method for prayer times.',
        ]);

        \App\Models\HijriDateCache::create([
            'gregorian_date' => date('Y-m-d'),
            'hijri_day' => 15,
            'hijri_month' => 'جمادی الثانی',
            'hijri_year' => 1446,
            'source' => 'Umm al-Qura',
            'fetched_at' => now(),
        ]);

        \App\Models\PrayerTime::create([
            'city_id' => $city->id,
            'date' => date('Y-m-d'),
            'fajr' => '05:12 AM',
            'sunrise' => '06:28 AM',
            'dhuhr' => '12:35 PM',
            'asr' => '04:02 PM',
            'maghrib' => '06:48 PM',
            'isha' => '08:15 PM',
            'calc_method' => 'Karachi',
            'fetched_at' => now(),
        ]);
        
        \App\Models\SiteSetting::create(['key' => 'default_city_id', 'value' => $city->id]);
    }
}

```

## File: database/seeders/DuaSeeder.php

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DuaCategory;
use App\Models\Dua;

class DuaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name_english' => 'Morning Azkar', 'name_urdu' => 'صبح کے اذکار', 'slug' => 'morning-azkar', 'icon_class' => 'fa-sun'],
            ['name_english' => 'Evening Azkar', 'name_urdu' => 'شام کے اذکار', 'slug' => 'evening-azkar', 'icon_class' => 'fa-moon'],
            ['name_english' => 'After Salah', 'name_urdu' => 'نماز کے بعد کے اذکار', 'slug' => 'after-salah', 'icon_class' => 'fa-pray'],
            ['name_english' => 'Sleep Duas', 'name_urdu' => 'سونے کی دعائیں', 'slug' => 'sleep-duas', 'icon_class' => 'fa-bed'],
            ['name_english' => 'Food & Drink', 'name_urdu' => 'کھانے پینے کی دعائیں', 'slug' => 'food-drink', 'icon_class' => 'fa-utensils'],
            ['name_english' => 'Travel Duas', 'name_urdu' => 'سفر کی دعائیں', 'slug' => 'travel-duas', 'icon_class' => 'fa-plane'],
            ['name_english' => 'Protection Duas', 'name_urdu' => 'حفاظت کی دعائیں', 'slug' => 'protection-duas', 'icon_class' => 'fa-shield-alt'],
            ['name_english' => 'Forgiveness Duas', 'name_urdu' => 'استغفار', 'slug' => 'forgiveness-duas', 'icon_class' => 'fa-hands'],
        ];

        $categoryMap = [];
        foreach ($categories as $catData) {
            $cat = DuaCategory::updateOrCreate(['slug' => $catData['slug']], $catData);
            $categoryMap[$catData['slug']] = $cat->id;
        }

        $duas = [
            // MORNING AZKAR
            [
                'category' => 'morning-azkar',
                'title_english' => 'Sayyidul Istighfar',
                'title_urdu' => 'سید الاستغفار',
                'seo_slug' => 'sayyidul-istighfar-morning',
                'arabic_text' => 'اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ ، خَلَقْتَنِي وَأَنَا عَبْدُكَ ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ ، أَعُوذُ بِكَ مِنْ شَرِّ مَا صَنَعْتُ ، أَبُوءُ لَكَ بِنِعْمَتِكَ عَلَيَّ ، وَأَبُوءُ لَكَ بِذَنْبِي فَاغْفِرْ لِي ، فَإِنَّهُ لا يَغْفِرُ الذُّنُوبَ إِلا أَنْتَ',
                'transliteration' => 'Allahumma anta Rabbi la ilaha illa anta, Khalaqtani wa ana abduka, wa ana ala ahdika wa wa\'dika mastata\'tu, A\'udhu bika min sharri ma sana\'tu, abu\'u Laka bini\'matika \'alaiya, wa Abu\'u Laka bidhanbi faghfirli fainnahu la yaghfiruz-zunuba illa anta.',
                'translation' => 'O Allah, You are my Lord, there is none worthy of worship but You. You created me and I am Your slave. I keep Your covenant, and my pledge to You so far as I am able. I seek refuge in You from the evil of what I have done. I admit to Your blessings upon me, and I admit to my misdeeds. Forgive me, for there is none who may forgive sins but You.',
                'reference_source' => 'Sahih al-Bukhari 6306'
            ],
            [
                'category' => 'morning-azkar',
                'title_english' => 'Entering the Morning',
                'title_urdu' => 'صبح کے وقت کی دعا',
                'seo_slug' => 'entering-the-morning',
                'arabic_text' => 'اللَّهُمَّ بِكَ أَصْبَحْنَا، وَبِكَ أَمْسَيْنَا، وَبِكَ نَحْيَا، وَبِكَ نَمُوتُ وَإِلَيْكَ النُّشُورُ',
                'transliteration' => 'Allahumma bika asbahna, wa bika amsayna, wa bika nahya, wa bika namutu wa ilaykan-nushoor.',
                'translation' => 'O Allah, by You we enter the morning and by You we enter the evening, by You we live and by You we die, and to You is the Final Return.',
                'reference_source' => 'Sunan At-Tirmidhi 3391'
            ],
            [
                'category' => 'morning-azkar',
                'title_english' => 'For Well-Being in this World and the Hereafter',
                'title_urdu' => 'دنیا اور آخرت کی عافیت کے لیے دعا',
                'seo_slug' => 'well-being-morning',
                'arabic_text' => 'اللَّهُمَّ إِنِّي أَسْأَلُكَ الْعَافِيَةَ فِي الدُّنْيَا وَالآخِرَةِ',
                'transliteration' => 'Allahumma inni as\'alukal-\'afiyata fid-dunya wal-akhirah.',
                'translation' => 'O Allah, I ask You for well-being in this world and the Hereafter.',
                'reference_source' => 'Sunan Ibn Majah 3871'
            ],

            // EVENING AZKAR
            [
                'category' => 'evening-azkar',
                'title_english' => 'Entering the Evening',
                'title_urdu' => 'شام کے وقت کی دعا',
                'seo_slug' => 'entering-the-evening',
                'arabic_text' => 'اللَّهُمَّ بِكَ أَمْسَيْنَا، وَبِكَ أَصْبَحْنَا، وَبِكَ نَحْيَا، وَبِكَ نَمُوتُ وَإِلَيْكَ الْمَصِيرُ',
                'transliteration' => 'Allahumma bika amsayna, wa bika asbahna, wa bika nahya, wa bika namutu wa ilaykal-maseer.',
                'translation' => 'O Allah, by You we enter the evening and by You we enter the morning, by You we live and by You we die, and to You is the final return.',
                'reference_source' => 'Sunan At-Tirmidhi 3391'
            ],
            [
                'category' => 'evening-azkar',
                'title_english' => 'Protection from Harm',
                'title_urdu' => 'نقصان سے بچنے کی دعا',
                'seo_slug' => 'protection-from-harm-evening',
                'arabic_text' => 'بِسْمِ اللَّهِ الَّذِي لاَ يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الأَرْضِ وَلاَ فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ',
                'transliteration' => 'Bismillahil-ladhi la yadurru ma\'as-mihi shai\'un fil-ardi wa la fis-sama\'i, wa Huwas-Sami\'ul-\'Alim.',
                'translation' => 'In the Name of Allah with Whose Name there is protection against every kind of harm in the earth or in the heaven, and He is the All-Hearing and All-Knowing. (Recite 3 times)',
                'reference_source' => 'Sunan At-Tirmidhi 3388'
            ],

            // AFTER SALAH
            [
                'category' => 'after-salah',
                'title_english' => 'Dhikr after Obligatory Prayer',
                'title_urdu' => 'فرض نماز کے بعد کا ذکر',
                'seo_slug' => 'dhikr-after-obligatory-prayer',
                'arabic_text' => 'أَسْتَغْفِرُ اللَّهَ، أَسْتَغْفِرُ اللَّهَ، أَسْتَغْفِرُ اللَّهَ. اللَّهُمَّ أَنْتَ السَّلَامُ وَمِنْكَ السَّلَامُ، تَبَارَكْتَ يَا ذَا الْجَلَالِ وَالْإِكْرَامِ',
                'transliteration' => 'Astaghfirullah (3x). Allahumma antas-salam wa minkas-salam, tabarakta ya dhal-jalali wal-ikram.',
                'translation' => 'I seek the forgiveness of Allah (three times). O Allah, You are Peace and from You comes peace. Blessed are You, O Owner of majesty and honor.',
                'reference_source' => 'Sahih Muslim 591'
            ],
            [
                'category' => 'after-salah',
                'title_english' => 'Tasbeeh, Tahmeed, Takbeer',
                'title_urdu' => 'تسبیح، تحمید، تکبیر',
                'seo_slug' => 'tasbeeh-tahmeed-takbeer',
                'arabic_text' => 'سُبْحَانَ اللَّهِ (٣٣)، الْحَمْدُ لِلَّهِ (٣٣)، اللَّهُ أَكْبَرُ (٣٣/٣٤)',
                'transliteration' => 'SubhanAllah (33x), Alhamdulillah (33x), Allahu Akbar (33x/34x)',
                'translation' => 'Glory be to Allah (33 times), Praise be to Allah (33 times), Allah is the Greatest (33 or 34 times).',
                'reference_source' => 'Sahih Muslim 597'
            ],

            // SLEEP DUAS
            [
                'category' => 'sleep-duas',
                'title_english' => 'Dua Before Sleeping',
                'title_urdu' => 'سونے سے پہلے کی دعا',
                'seo_slug' => 'dua-before-sleeping',
                'arabic_text' => 'بِاسْمِكَ رَبِّي وَضَعْتُ جَنْبِي وَبِكَ أَرْفَعُهُ',
                'transliteration' => 'Bismika Rabbi wada\'tu janbi, wa bika arfa\'uhu.',
                'translation' => 'In Your Name, my Lord, I lay my side down, and in Your Name I raise it.',
                'reference_source' => 'Sahih al-Bukhari 6320'
            ],
            [
                'category' => 'sleep-duas',
                'title_english' => 'Short Bedtime Dua',
                'title_urdu' => 'مختصر سوتے وقت کی دعا',
                'seo_slug' => 'short-bedtime-dua',
                'arabic_text' => 'اللَّهُمَّ بِاسْمِكَ أَمُوتُ وَأَحْيَا',
                'transliteration' => 'Allahumma bismika amutu wa ahya.',
                'translation' => 'O Allah, in Your Name I die and I live.',
                'reference_source' => 'Sahih al-Bukhari 6312'
            ],
            [
                'category' => 'sleep-duas',
                'title_english' => 'Dua Upon Waking Up',
                'title_urdu' => 'سو کر اٹھنے کی دعا',
                'seo_slug' => 'waking-up-dua',
                'arabic_text' => 'الْحَمْدُ لِلَّهِ الَّذِي أَحْيَانَا بَعْدَ مَا أَمَاتَنَا وَإِلَيْهِ النُّشُورُ',
                'transliteration' => 'Alhamdu lillahil-ladhi ahyana ba\'da ma amatana wa ilayhin-nushoor.',
                'translation' => 'All praise is to Allah Who gave us life after having taken it from us and unto Him is the resurrection.',
                'reference_source' => 'Sahih al-Bukhari 6312'
            ],

            // FOOD & DRINK
            [
                'category' => 'food-drink',
                'title_english' => 'Before Eating',
                'title_urdu' => 'کھانا شروع کرنے سے پہلے',
                'seo_slug' => 'before-eating',
                'arabic_text' => 'بِسْمِ اللَّهِ',
                'transliteration' => 'Bismillah',
                'translation' => 'In the name of Allah.',
                'reference_source' => 'Sunan At-Tirmidhi 1858'
            ],
            [
                'category' => 'food-drink',
                'title_english' => 'If Forgetting to Say Bismillah',
                'title_urdu' => 'اگر بسم اللہ بھول جائیں',
                'seo_slug' => 'forgetting-bismillah',
                'arabic_text' => 'بِسْمِ اللَّهِ أَوَّلَهُ وَآخِرَهُ',
                'transliteration' => 'Bismillahi awwalahu wa akhirahu.',
                'translation' => 'In the name of Allah at the beginning and at the end of it.',
                'reference_source' => 'Sunan At-Tirmidhi 1858'
            ],
            [
                'category' => 'food-drink',
                'title_english' => 'After Eating',
                'title_urdu' => 'کھانے کے بعد کی دعا',
                'seo_slug' => 'after-eating',
                'arabic_text' => 'الْحَمْدُ لِلَّهِ الَّذِي أَطْعَمَنِي هَذَا وَرَزَقَنِيهِ مِنْ غَيْرِ حَوْلٍ مِنِّي وَلاَ قُوَّةٍ',
                'transliteration' => 'Alhamdu lillahil-ladhi at\'amani hadha, wa razaqanihi min ghayri hawlin minni wa la quwwah.',
                'translation' => 'All praise is to Allah Who has fed me this and provided it for me without any might or power on my part.',
                'reference_source' => 'Sunan At-Tirmidhi 3458'
            ],

            // TRAVEL DUAS
            [
                'category' => 'travel-duas',
                'title_english' => 'When Mounting Transport',
                'title_urdu' => 'سواری پر بیٹھنے کی دعا',
                'seo_slug' => 'mounting-transport',
                'arabic_text' => 'سُبْحَانَ الَّذِي سَخَّرَ لَنَا هَذَا وَمَا كُنَّا لَهُ مُقْرِنِينَ * وَإِنَّا إِلَى رَبِّنَا لَمُنْقَلِبُونَ',
                'transliteration' => 'Subhanal-ladhi sakh-khara lana hadha wa ma kunna lahu muqrinin. Wa inna ila Rabbina lamunqaliboon.',
                'translation' => 'Glory to Him Who has subjected this to us, and we could never have it by our efforts. And verily, to our Lord we indeed are to return.',
                'reference_source' => 'Surah Az-Zukhruf 43:13-14'
            ],
            [
                'category' => 'travel-duas',
                'title_english' => 'Upon Returning Home',
                'title_urdu' => 'سفر سے واپسی پر',
                'seo_slug' => 'returning-home-travel',
                'arabic_text' => 'آيِبُونَ تَائِبُونَ عَابِدُونَ لِرَبِّنَا حَامِدُونَ',
                'transliteration' => 'Aayiboona, taa\'iboona, \'abidoona, li-Rabbina hamidoon.',
                'translation' => 'We return, repent, worship and praise our Lord.',
                'reference_source' => 'Sahih Muslim 1342'
            ],

            // PROTECTION DUAS
            [
                'category' => 'protection-duas',
                'title_english' => 'Protection from the Evil Eye for Children',
                'title_urdu' => 'بچوں کو نظرِ بد سے بچانے کی دعا',
                'seo_slug' => 'protection-evil-eye-children',
                'arabic_text' => 'أُعِيذُكُمَا بِكَلِمَاتِ اللَّهِ التَّامَّةِ، مِنْ كُلِّ شَيْطَانٍ وَهَامَّةٍ، وَمِنْ كُلِّ عَيْنٍ لاَمَّةٍ',
                'transliteration' => 'U\'eedhukuma bikalimatillahit-tammah, min kulli shaytanin wa hammah, wa min kulli \'aynin lammah.',
                'translation' => 'I seek protection for you in the Perfect Words of Allah from every devil and every beast, and from every envious blameworthy eye.',
                'reference_source' => 'Sahih al-Bukhari 3371'
            ],
            [
                'category' => 'protection-duas',
                'title_english' => 'During Times of Fear or Anxiety',
                'title_urdu' => 'خوف اور پریشانی کی دعا',
                'seo_slug' => 'during-times-of-fear',
                'arabic_text' => 'حَسْبُنَا اللَّهُ وَنِعْمَ الْوَكِيلُ',
                'transliteration' => 'Hasbunallahu wa ni\'mal-wakeel.',
                'translation' => 'Allah is sufficient for us and He is the Best Disposer of affairs.',
                'reference_source' => 'Surah Ali \'Imran 3:173'
            ],

            // FORGIVENESS DUAS
            [
                'category' => 'forgiveness-duas',
                'title_english' => 'Seeking Forgiveness (Istighfar)',
                'title_urdu' => 'استغفار',
                'seo_slug' => 'seeking-forgiveness-istighfar',
                'arabic_text' => 'أَسْتَغْفِرُ اللَّهَ وَأَتُوبُ إِلَيْهِ',
                'transliteration' => 'Astaghfirullaha wa atoobu ilayh.',
                'translation' => 'I seek the forgiveness of Allah and repent to Him. (Say 100 times daily)',
                'reference_source' => 'Sahih Muslim 2702'
            ],
            [
                'category' => 'forgiveness-duas',
                'title_english' => 'Dua for Total Forgiveness',
                'title_urdu' => 'مکمل معافی کی دعا',
                'seo_slug' => 'dua-total-forgiveness',
                'arabic_text' => 'رَبِّ اغْفِرْ لِي خَطِيئَتِي وَجَهْلِي وَإِسْرَافِي فِي أَمْرِي كُلِّهِ',
                'transliteration' => 'Rabbighfir li khati\'ati wa jahli wa israfi fi amri kullih.',
                'translation' => 'O Lord, forgive me my sins, my ignorance, my transgression in my affairs.',
                'reference_source' => 'Sahih al-Bukhari 6398'
            ],
            [
                'category' => 'forgiveness-duas',
                'title_english' => 'Sayyidul Istighfar (Master of Forgiveness)',
                'title_urdu' => 'سید الاستغفار',
                'seo_slug' => 'sayyidul-istighfar-morning', // USING SAME SLUG to test Many-To-Many relationship
                'arabic_text' => 'اللَّهُمَّ أَنْتَ رَبِّي لا إِلَهَ إِلا أَنْتَ ، خَلَقْتَنِي وَأَنَا عَبْدُكَ ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ ، أَعُوذُ بِكَ مِنْ شَرِّ مَا صَنَعْتُ ، أَبُوءُ لَكَ بِنِعْمَتِكَ عَلَيَّ ، وَأَبُوءُ لَكَ بِذَنْبِي فَاغْفِرْ لِي ، فَإِنَّهُ لا يَغْفِرُ الذُّنُوبَ إِلا أَنْتَ',
                'transliteration' => 'Allahumma anta Rabbi la ilaha illa anta, Khalaqtani wa ana abduka, wa ana ala ahdika wa wa\'dika mastata\'tu, A\'udhu bika min sharri ma sana\'tu, abu\'u Laka bini\'matika \'alaiya, wa Abu\'u Laka bidhanbi faghfirli fainnahu la yaghfiruz-zunuba illa anta.',
                'translation' => 'O Allah, You are my Lord, there is none worthy of worship but You. You created me and I am Your slave. I keep Your covenant, and my pledge to You so far as I am able. I seek refuge in You from the evil of what I have done. I admit to Your blessings upon me, and I admit to my misdeeds. Forgive me, for there is none who may forgive sins but You.',
                'reference_source' => 'Sahih al-Bukhari 6306'
            ]
        ];

        foreach ($duas as $duaData) {
            $dua = Dua::updateOrCreate(
                ['seo_slug' => $duaData['seo_slug']],
                [
                    'title_english' => $duaData['title_english'],
                    'title_urdu' => $duaData['title_urdu'],
                    'seo_slug' => $duaData['seo_slug'],
                    'arabic_text' => $duaData['arabic_text'],
                    'transliteration' => $duaData['transliteration'],
                    'translation' => $duaData['translation'],
                    'reference_source' => $duaData['reference_source'],
                ]
            );

            // Sync categories to avoid duplicates
            $dua->categories()->syncWithoutDetaching([$categoryMap[$duaData['category']]]);
        }
    }
}

```

## File: database/seeders/EEATSeeder.php

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Scholar;
use App\Models\Surah;
use App\Models\ContentReview;

class EEATSeeder extends Seeder
{
    public function run()
    {
        $author = Author::firstOrCreate(['name' => 'Imam Noor'], [
            'credential' => 'Senior Editor',
            'bio' => 'Senior Islamic Content Editor at Noor-e-Islam',
            'photo_path' => '/assets/authors/imam-noor.jpg',
        ]);

        $scholar = Scholar::firstOrCreate(['name' => 'Mufti Abdullah'], [
            'institution' => 'Al-Azhar University',
            'credential' => 'Ph.D in Islamic Studies',
        ]);

        $surah = Surah::first();
        if ($surah) {
            ContentReview::firstOrCreate([
                'reviewable_type' => Surah::class,
                'reviewable_id' => $surah->id,
                'scholar_id' => $scholar->id,
            ], [
                'reviewed_at' => now(),
                'status' => 'verified',
                'notes' => 'Translation and Fazilat content verified against authentic sources.',
            ]);
        }
    }
}

```

