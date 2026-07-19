# 🕌 ISLAMIC NAMES — SMART FILTERING MASTER PROMPT
## Noor-e-Islam Website | Option A Implementation
### Laravel + MariaDB | 13,622 → ~2,000 Quality Names

---

> **HOW TO USE:** Is file ko Claude ya kisi bhi AI ko do aur kaho:
> *"Is prompt ko follow kar ke mera kaam karo"*
> Ye prompt self-contained hai — sab kuch iske andar hai.

---

## ════════════════════════════════════════
## SECTION 1: PROJECT CONTEXT
## ════════════════════════════════════════

Main ek Islamic website (noorislam.com) ka developer hoon. Meri website Laravel + Blade + MariaDB par bani hai.

Meri `islamic_names` database table mein **13,622 names** hain jo website par individual pages generate karte hain. Ye bahut zyada pages hain aur:
- Website slow ho rahi hai
- Google crawl budget waste ho raha hai
- Bahut se pages par thin/duplicate content hai
- 398 artificial compound names hain jaise "Aashiq-ali", "Abu-bakr" (ye real standalone Islamic names nahi hain)
- Hundreds of spelling variations hain jaise: Zulaikha / Zulaikhah / Zulaykha / Zuleika / Zuleikha (ye 5 ek hi naam ke variations hain)

**Mera Goal:** 13,622 names ko filter kar ke sirf **~1,500 to 2,000 genuine, commonly-used, SEO-worthy Islamic names** rakhna. Baaki names ko database mein `status = 'inactive'` kar dunga — delete nahi karunga.

---

## ════════════════════════════════════════
## SECTION 2: DATABASE SCHEMA
## ════════════════════════════════════════

Meri `islamic_names` table ka structure ye hai:

```sql
CREATE TABLE `islamic_names` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `arabic` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `meaning_english` text DEFAULT NULL,
  `meaning_urdu` text DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `is_quranic` tinyint(1) DEFAULT 0,
  `is_prophetic` tinyint(1) DEFAULT 0,
  `lucky_number` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `islamic_names_slug_unique` (`slug`),
  INDEX `idx_gender` (`gender`),
  INDEX `idx_status` (`status`),
  INDEX `idx_slug` (`slug`)
);
```

**Note:** Agar `status` column nahi hai toh pehle ye migration chalao:
```sql
ALTER TABLE `islamic_names`
  ADD COLUMN `status` ENUM('active','inactive') NOT NULL DEFAULT 'active' AFTER `slug`,
  ADD INDEX `idx_status` (`status`);
```

---

## ════════════════════════════════════════
## SECTION 3: FILTERING RULES — EXACTLY YE FOLLOW KARO
## ════════════════════════════════════════

### RULE 1 — REMOVE: Compound/Hyphenated Artificial Names
**Definition:** Koi bhi naam jisme `-` (hyphen) ho aur wo do alag alfaz ko jodta ho.

**EXCEPTION:** Ye hyphenated names RAKHNA hain kyunki ye genuinely famous Islamic names hain:
- `Abdul-Rahman`, `Abdul-Aziz`, `Abdul-Karim` type Abdul- compounds → RAKHNA
- `Abu-Bakr` → RAKHNA (famous Sahabi)
- `Abu-Hanifa` → RAKHNA (famous Imam)

**REMOVE karo ye pattern wale names:**
- `Aashiq-ali`, `Aashiq-muhammad` → Remove (artificial)
- `Zuka-uddin`, `Zuka-ullah` → Remove (artificial)
- `Abd-al`, `Abd-al-ala`, `Abd-khayr` → Remove (incomplete compounds)
- `Abdun-naafe`, `Abdun-nasir` → Remove (uncommon compounds)
- `Abul-alaa`, `Abul-barakat`, `Abul-farah` → Remove (very rare)

**SQL to mark these inactive:**
```sql
UPDATE islamic_names
SET status = 'inactive'
WHERE name REGEXP '-'
  AND name NOT IN (
    'Abu-Bakr','Abu-Hanifa','Abu-Darda','Abu-Hurairah',
    'Abu-Talha','Abu-Ubaidah','Abu-Yousuf','Abu-Zar',
    'Abdul-Rahman','Abdul-Aziz','Abdul-Karim','Abdul-Jabbar'
  )
  AND status = 'active';
```

---

### RULE 2 — REMOVE: Duplicate Spelling Variations (Keep Only Best One)

**Problem:** Ek hi naam ke multiple spellings hain. Google inhe alag pages samajhta hai = duplicate content.

**Rule:** Sirf **sabse common/simple spelling** rakho. Baaki inactive karo.

**Variation Groups aur Winner:**

| Group | KEEP (Winner) | REMOVE (Variations) |
|---|---|---|
| Zulaikha group | `Zulaikha` | Zulaikhah, Zulaykha, Zuleika, Zuleikha, Zulekha, Zuleyka |
| Fatima group | `Fatima` | Fatimah, Fathima, Fateema, Fatimaa |
| Aisha group | `Aisha` | Ayesha, Aysha, Aayesha, Aaisha, Aaesha |
| Muhammad group | `Muhammad` | Mohammed, Mohammad, Muhammed, Mohamad |
| Abdullah group | `Abdullah` | Abdallah, Abdulah, Abdullaah |
| Ibrahim group | `Ibrahim` | Ibraheem, Ibrahiem |
| Yusuf group | `Yusuf` | Yousef, Younus, Yousuf, Yousaf, Yusoff |
| Khadija group | `Khadija` | Khadijah, Khadeeja, Khadeejah, Khadijaa |
| Maryam group | `Maryam` | Mariam, Marium, Maryum |
| Zainab group | `Zainab` | Zaynab, Zeinab, Zaynub |
| Hafsa group | `Hafsa` | Hafsah, Hafza |
| Asma group | `Asma` | Aasma, Aasmaa, Asmaa |
| Umar group | `Umar` | Omar, Omer, Ummar |
| Ali group | `Ali` | Aali, Aalee, Aalii |
| Hasan group | `Hasan` | Hassan, Haasan, Hasaan |
| Husain group | `Husain` | Hussein, Hussain, Hussayn, Husayn |
| Aisha/Aatifa | `Aatifa` | Aatifah, Atifa, Atifah |
| Atika group | `Atika` | Aatika, Aatikah, Atikah |
| Aatiqa group | `Aatiqa` | Aatiqah, Atiqa, Atiqah |
| Aamir/Amir | `Aamir` | Aamer, Ameer, Amir |
| Aaliya/Aliya | `Aaliya` | Aliya, Aliyah, Aalia |
| Aamina/Amina | `Aamina` | Amina, Aminah, Aamena |
| Aaqib/Aqib | `Aaqib` | Aqib, Aqeeb |
| Aarif/Arif | `Aarif` | Arif, Aarif, Areef |
| Zuhair group | `Zuhair` | Zuhaira, Zuhairaa, Zuhayr, Zuhayra |
| Zulfa group | `Zulfa` | Zulfaa, Zulfah |
| Abbas group | `Abbas` | Abbaas, Abbaasah (female), Abbood, Abbud |

**SQL Pattern for Variation Removal:**
```sql
-- Example: Fatima variations
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Fatimah','Fathima','Fateema','Fatimaa')
  AND status = 'active';

-- Aisha variations
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Ayesha','Aysha','Aayesha','Aaisha','Aaesha')
  AND status = 'active';

-- Muhammad variations
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Mohammed','Mohammad','Muhammed','Mohamad')
  AND status = 'active';
```

---

### RULE 3 — REMOVE: Very Obscure/Rarely-Used Names

**Definition:** Agar koi naam:
- Single ya double letter hai (Aaf, Aas, Aaki, Aala, Aas)
- Clearly not a personal name (Abanus, Abinus, Abnus — ye tree names hain)
- No search volume expected
- Kisi bhi common Muslim community mein nahi suna gaya

**Remove List (Confirmed Obscure):**
```sql
UPDATE islamic_names SET status = 'inactive'
WHERE name IN (
  -- Single/double letter "names"
  'Aaf','Aas','Abd','Abr','Aaki','Aala',
  -- Non-personal names
  'Abanus','Abinus','Abnus',
  -- Extremely rare/artificial
  'Aahga','Aazz','Abahh','Abah','Abahat',
  'Aadheen','Aaid','Aaidun','Aamad','Aamla',
  'Aana','Aanil','Aas','Aasaal','Aasal',
  'Aati','Aatiq','Aatish','Aauf','Aaus',
  'Aaween','Aawaz','Aawf','Aabdar','Aabis',
  'Aahil','Aaraf','Aarzam','Aarib',
  -- Tree/plant/object names not used as personal names
  'Abanus','Abinus','Abla'
) AND status = 'active';
```

---

### RULE 4 — ALWAYS KEEP: Core Famous Names (Never Remove These)

Ye names hamesha `status = 'active'` rahenge:

**Prophets & Their Families:**
Muhammad, Ibrahim, Ismail, Ishaq, Yaqub, Yusuf, Musa, Isa, Idris, Nuh, Dawud, Sulaiman, Ilyas, Ayyub, Yunus, Zakariya, Yahya, Hud, Saleh, Shuaib, Lut

**Famous Sahabiyat (Female Companions):**
Khadija, Aisha, Fatima, Hafsa, Zainab, Maryam, Asma, Sumayyah, Safiya, Umm-Kulthum, Ramlah, Juwayriyah

**Famous Sahaba (Male Companions):**
Abu-Bakr, Umar, Uthman, Ali, Bilal, Salman, Ammar, Khalid, Muadh, Abdullah, Talha, Zubair, Saad, Said

**Common Pakistani/South Asian Muslim Names:**
Ahmed, Hamza, Hassan, Hussain, Omar, Zaid, Tariq, Imran, Kamran, Adnan, Faisal, Usman, Bilal, Waqar, Shahid, Rahim, Karim, Jalil, Majid

**Girls - Common Pakistani:**
Amna, Sana, Hira, Nadia, Rania, Sara, Layla, Noor, Zara, Mina, Huma, Saba, Farah, Iqra, Ayesha, Mariam, Safia, Rehana, Bushra, Uzma

---

### RULE 5 — KEEP: All Quranic Names

Agar `is_quranic = 1` ho toh **definitely rakhna** — chahe naam uncommon hi kyun na ho. Quranic names ka SEO value bahut high hai.

```sql
-- Ensure all Quranic names stay active
UPDATE islamic_names SET status = 'active'
WHERE is_quranic = 1;
```

---

### RULE 6 — KEEP: All Prophetic Names

Agar `is_prophetic = 1` ho toh **definitely rakhna**.

```sql
UPDATE islamic_names SET status = 'active'
WHERE is_prophetic = 1;
```

---

## ════════════════════════════════════════
## SECTION 4: COMPLETE SQL MIGRATION SCRIPT
## ════════════════════════════════════════

Ye script step by step chalao. Pehle backup lo!

```sql
-- ============================================================
-- STEP 0: BACKUP FIRST!
-- ============================================================
CREATE TABLE islamic_names_backup AS SELECT * FROM islamic_names;

-- ============================================================
-- STEP 1: Add status column if not exists
-- ============================================================
ALTER TABLE `islamic_names`
  ADD COLUMN IF NOT EXISTS `status` ENUM('active','inactive') NOT NULL DEFAULT 'active';

CREATE INDEX IF NOT EXISTS `idx_status` ON `islamic_names` (`status`);

-- Set all to active first (clean slate)
UPDATE islamic_names SET status = 'active';

-- ============================================================
-- STEP 2: Remove ALL hyphenated compound names EXCEPT famous ones
-- ============================================================
UPDATE islamic_names
SET status = 'inactive'
WHERE name REGEXP '^[A-Za-z]+-[A-Za-z]'
  AND name NOT IN (
    'Abu-Bakr','Abu-Hanifa','Abu-Darda','Abu-Hurairah',
    'Abu-Talha','Abu-Ubaidah','Abu-Zar','Abu-Ayyub',
    'Abdul-Rahman','Abdul-Aziz','Abdul-Karim',
    'Abul-Qasim','Zul-Kifl','Zul-Qarnain'
  );

-- ============================================================
-- STEP 3: Remove spelling variations — keep only canonical form
-- ============================================================

-- Aisha / Ayesha group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Ayesha','Aysha','Aayesha','Aaisha','Aaesha','Aysha','Aesha');

-- Fatima group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Fatimah','Fathima','Fateema','Fatimaa','Faatima','Faatimah');

-- Muhammad group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Mohammed','Mohammad','Muhammed','Mohamad','Muhamad','Mohd');

-- Khadija group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Khadijah','Khadeeja','Khadeejah','Khadijaa','Khadieja');

-- Maryam group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Mariam','Marium','Maryum','Maryaam','Mariyam');

-- Zainab group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zaynab','Zeinab','Zaynub','Zeynab','Zaenab');

-- Hafsa group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Hafsah','Hafza','Haafsa','Hafaza');

-- Asma group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aasma','Aasmaa','Asmaa','Asmah');

-- Umar group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Omar','Omer','Ummar','Umer');

-- Ali variants (keep Aali as canonical since in list)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aalee','Aalii') AND gender = 'male';

-- Hasan group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Haasan','Hasaan') AND gender = 'male';

-- Hussain group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Hussein','Hussayn','Husayn','Husaen') AND gender = 'male';

-- Aamir/Amir group (keep Aamir)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aamer','Ameer') AND gender = 'male';

-- Ibrahim group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Ibraheem','Ibrahiem','Ibraheim');

-- Yusuf group (keep Yusuf)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Yousef','Yousuf','Yousaf','Yusoff','Younus') AND gender = 'male';

-- Abdullah group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Abdallah','Abdulah','Abdullaah');

-- Aaliya/Aliya (keep Aaliya)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aliya','Aliyah','Aalia','Aliyaa') AND gender = 'female';

-- Aamina/Amina (keep Aamina)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Amina','Aminah','Aamena','Aminaa') AND gender = 'female';

-- Zulaikha group (keep Zulaikha)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN (
  'Zulaikhah','Zulaykha','Zuleika','Zuleikha',
  'Zulekha','Zuleyka','Zulaykha'
);

-- Abbas group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Abbaas','Abbood','Abbud','Abbudin') AND gender = 'male';

-- Aatifa group (keep Aatifa)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aatifah','Atifa','Atifah') AND gender = 'female';

-- Aatika group (keep Atika)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aatika','Aatikah','Atikah') AND gender = 'female';

-- Aatiqa group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aatiqah','Atiqa','Atiqah') AND gender = 'female';

-- Aaqib group (keep Aaqib)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aqib','Aqeeb') AND gender = 'male';

-- Zuhair group (keep Zuhair)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zuhaira','Zuhairaa','Zuhayr','Zuhayra','Zuhayyah');

-- Zulfa group (keep Zulfa)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zulfaa','Zulfah') AND gender = 'female';

-- Aasimah / Asima (keep Asima)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aasimah','Asimah') AND gender = 'female';

-- Aasiyah / Asiya (keep Asiya)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Aasiyah','Asiyah') AND gender = 'female';

-- Zulqarnain group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zulqarnayn','Zulqurnayn') AND gender = 'male';

-- Zulhimmah / Zulhijjah
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zuhdii','Zuhdiyyah');

-- Zunairah / Zunnoon
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zunnur') AND gender = 'male';

-- Zurafa group
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zurafaa') AND gender = 'female';

-- Zumurrud group (keep Zumurrud)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zumurruda','Zumarrad','Zumarrada','Zumard') AND gender = 'female';

-- Zuwailah group (keep Zunairah)
UPDATE islamic_names SET status = 'inactive'
WHERE name IN ('Zuwaila','Zuwailah','Zuwainah','Zuwaiten') AND gender = 'female';

-- ============================================================
-- STEP 4: Remove confirmed obscure/non-personal names
-- ============================================================
UPDATE islamic_names SET status = 'inactive'
WHERE name IN (
  -- Single/very short non-names
  'Aaf','Aas','Abd','Aas','Aaki','Aala',
  -- Clearly not personal names
  'Abanus','Abinus','Abnus',
  -- Extremely rare artificial names
  'Aahga','Aazz','Abahh','Abahat',
  'Aadheen','Aaid','Aaidun','Aamad','Aamla',
  'Aanil','Aasaal','Aasal','Aati',
  'Aaween','Aawaz','Aawf','Aabdar',
  'Aarib','Aarzam','Aaraf',
  -- Object/tree names not used as personal names
  'Zumzum','Zuhr','Zula','Zukat'
) AND status = 'active';

-- ============================================================
-- STEP 5: PROTECT — Ensure all Quranic & Prophetic names are ACTIVE
-- ============================================================
UPDATE islamic_names SET status = 'active'
WHERE is_quranic = 1 OR is_prophetic = 1;

-- ============================================================
-- STEP 6: PROTECT — Core famous names never go inactive
-- ============================================================
UPDATE islamic_names SET status = 'active'
WHERE name IN (
  -- Prophets
  'Muhammad','Ibrahim','Ismail','Ishaq','Yaqub','Yusuf',
  'Musa','Isa','Idris','Nuh','Dawud','Sulaiman',
  'Ilyas','Ayyub','Yunus','Zakariya','Yahya',
  'Hud','Saleh','Shuaib','Lut','Adam',
  -- Sahabiyat
  'Khadija','Aisha','Fatima','Hafsa','Zainab','Maryam',
  'Asma','Sumayyah','Safiya','Ramlah',
  -- Sahaba
  'Abu-Bakr','Umar','Uthman','Ali','Bilal','Salman',
  'Ammar','Khalid','Muadh','Abdullah','Talha',
  'Zubair','Saad','Said','Abbas',
  -- Common Pakistani names
  'Ahmed','Hamza','Hassan','Hussain','Omar','Zaid',
  'Tariq','Imran','Kamran','Adnan','Faisal','Usman',
  'Waqar','Shahid','Rahim','Karim','Jalil','Majid',
  'Amna','Sana','Hira','Nadia','Rania','Sara',
  'Layla','Noor','Zara','Mina','Huma','Saba',
  'Farah','Iqra','Mariam','Rehana','Bushra','Uzma'
);

-- ============================================================
-- STEP 7: VERIFY RESULTS
-- ============================================================
SELECT
  status,
  gender,
  COUNT(*) as total
FROM islamic_names
GROUP BY status, gender
ORDER BY status, gender;

-- Check final active count
SELECT COUNT(*) as active_names FROM islamic_names WHERE status = 'active';
SELECT COUNT(*) as inactive_names FROM islamic_names WHERE status = 'inactive';
```

---

## ════════════════════════════════════════
## SECTION 5: LARAVEL CODE CHANGES
## ════════════════════════════════════════

### 5.1 — Model Update

```php
// app/Models/IslamicName.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IslamicName extends Model
{
    protected $table = 'islamic_names';

    protected $fillable = [
        'name', 'arabic', 'gender', 'meaning_english',
        'meaning_urdu', 'origin', 'is_quranic',
        'is_prophetic', 'lucky_number', 'slug', 'status'
    ];

    // ✅ DEFAULT SCOPE — Sirf active names show karo
    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('status', 'active');
        });
    }

    // Scope for admin panel (all names)
    public function scopeWithInactive($query)
    {
        return $query->withoutGlobalScope('active');
    }

    // Scope for boys
    public function scopeMale($query)
    {
        return $query->where('gender', 'male');
    }

    // Scope for girls
    public function scopeFemale($query)
    {
        return $query->where('gender', 'female');
    }

    // Scope for Quranic names
    public function scopeQuranic($query)
    {
        return $query->where('is_quranic', 1);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
```

### 5.2 — Controller Update

```php
// app/Http/Controllers/IslamicNameController.php

namespace App\Http\Controllers;

use App\Models\IslamicName;
use Illuminate\Http\Request;

class IslamicNameController extends Controller
{
    // Names listing page
    public function index(Request $request)
    {
        $query = IslamicName::query();

        // Filter by gender
        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }

        // Filter by letter
        if ($request->has('letter')) {
            $query->where('name', 'LIKE', $request->letter . '%');
        }

        // Filter by Quranic
        if ($request->has('quranic')) {
            $query->where('is_quranic', 1);
        }

        $names = $query->orderBy('name')->paginate(50);

        return view('islamic-names.index', compact('names'));
    }

    // Individual name page
    public function show($slug)
    {
        // withoutGlobalScope nahi chahiye — active scope automatic apply hoga
        $name = IslamicName::where('slug', $slug)->firstOrFail();

        // Related names (same first letter, same gender)
        $related = IslamicName::where('gender', $name->gender)
            ->where('name', 'LIKE', substr($name->name, 0, 1) . '%')
            ->where('id', '!=', $name->id)
            ->limit(10)
            ->get();

        return view('islamic-names.show', compact('name', 'related'));
    }

    // Admin: See all names including inactive
    public function adminIndex()
    {
        $names = IslamicName::withoutGlobalScope('active')
            ->orderBy('name')
            ->paginate(100);

        return view('admin.islamic-names.index', compact('names'));
    }

    // Admin: Toggle status
    public function toggleStatus(IslamicName $name)
    {
        $name->withoutGlobalScope('active');
        $name->status = $name->status === 'active' ? 'inactive' : 'active';
        $name->save();

        return back()->with('success', "Status updated for {$name->name}");
    }
}
```

### 5.3 — Routes Update

```php
// routes/web.php

// Public routes — only active names accessible
Route::prefix('islamic-names')->name('islamic-names.')->group(function () {
    Route::get('/', [IslamicNameController::class, 'index'])->name('index');
    Route::get('/boys', [IslamicNameController::class, 'boys'])->name('boys');
    Route::get('/girls', [IslamicNameController::class, 'girls'])->name('girls');
    Route::get('/quranic', [IslamicNameController::class, 'quranic'])->name('quranic');
    Route::get('/{slug}', [IslamicNameController::class, 'show'])->name('show');
});

// Admin routes — all names visible
Route::prefix('admin/islamic-names')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [IslamicNameController::class, 'adminIndex']);
    Route::post('/{id}/toggle-status', [IslamicNameController::class, 'toggleStatus']);
});
```

### 5.4 — Sitemap Update

```php
// app/Console/Commands/GenerateIslamicNamesSitemap.php

public function handle()
{
    // Only generate sitemap for ACTIVE names
    $names = IslamicName::select('slug', 'updated_at')
        ->orderBy('name')
        ->get();

    // Split into chunks (max 10,000 per sitemap file)
    $chunks = $names->chunk(5000);

    foreach ($chunks as $index => $chunk) {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($chunk as $name) {
            $xml .= '<url>';
            $xml .= '<loc>https://noorislam.com/islamic-names/' . $name->slug . '</loc>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.6</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        file_put_contents(
            public_path("sitemap-islamic-names-{$index}.xml"),
            $xml
        );
    }

    $this->info('Islamic Names sitemap generated! Active names: ' . $names->count());
}
```

### 5.5 — 404 Handling for Inactive Names

```php
// app/Http/Controllers/IslamicNameController.php
// Agar koi inactive name ka URL visit kare toh proper 410 Gone response do

public function show($slug)
{
    // First check if name exists at all (including inactive)
    $nameExists = IslamicName::withoutGlobalScope('active')
        ->where('slug', $slug)
        ->first();

    if (!$nameExists) {
        abort(404); // Name hi nahi hai DB mein
    }

    if ($nameExists->status === 'inactive') {
        // Name hai lekin inactive hai
        // Option 1: 410 Gone (best for SEO — tells Google this page is permanently gone)
        abort(410, 'This Islamic name page has been removed.');

        // Option 2: Redirect to main names page
        // return redirect()->route('islamic-names.index', [], 301);
    }

    // Active name — show normally
    $related = IslamicName::where('gender', $nameExists->gender)
        ->where('name', 'LIKE', substr($nameExists->name, 0, 1) . '%')
        ->where('id', '!=', $nameExists->id)
        ->limit(10)
        ->get();

    return view('islamic-names.show', compact('name' => $nameExists, 'related'));
}
```

---

## ════════════════════════════════════════
## SECTION 6: SEO IMPACT — KYA HOGA
## ════════════════════════════════════════

### Before vs After:

| Metric | Before | After | Improvement |
|---|---|---|---|
| Total indexed pages | 13,622 | ~2,000 | -85% (good!) |
| Duplicate meta descriptions | ~8,000+ | ~0 | 100% fixed |
| Thin content pages | ~9,000+ | ~0 | 100% fixed |
| Crawl budget waste | High | Low | ~85% better |
| Average page quality | Low | High | 5x better |
| Google crawl frequency | Slow | Fast | 3x faster |

### Google Search Console mein kya karein:

1. SQL migration run karne ke **baad** — sitemap regenerate karo
2. Google Search Console mein naya sitemap submit karo
3. **URL Removal Tool** use karo inactive names ke liye — manually request karo ke Google inhe crawl na kare (optional, 410 status bhi kafi hai)
4. `Coverage` report monitor karo — 2-4 weeks mein indexed pages kam hoti dikhegi

---

## ════════════════════════════════════════
## SECTION 7: FILAMENT ADMIN PANEL (Optional)
## ════════════════════════════════════════

Agar Filament use kar rahe ho toh:

```php
// app/Filament/Resources/IslamicNameResource.php

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('gender')->badge(),
            TextColumn::make('status')
                ->badge()
                ->color(fn ($state) => $state === 'active' ? 'success' : 'danger'),
            IconColumn::make('is_quranic')->boolean(),
        ])
        ->filters([
            SelectFilter::make('status')
                ->options(['active' => 'Active', 'inactive' => 'Inactive']),
            SelectFilter::make('gender')
                ->options(['male' => 'Male', 'female' => 'Female']),
            TernaryFilter::make('is_quranic')->label('Quranic Names'),
        ])
        ->actions([
            Tables\Actions\Action::make('toggle_status')
                ->label(fn ($record) => $record->status === 'active' ? 'Deactivate' : 'Activate')
                ->action(fn ($record) => $record->update([
                    'status' => $record->status === 'active' ? 'inactive' : 'active'
                ]))
                ->requiresConfirmation(),
        ]);
}
```

---

## ════════════════════════════════════════
## SECTION 8: VERIFICATION QUERIES
## ════════════════════════════════════════

Migration ke baad ye queries run karo result verify karne ke liye:

```sql
-- 1. Total active vs inactive
SELECT status, COUNT(*) FROM islamic_names GROUP BY status;

-- 2. Active names by gender
SELECT gender, COUNT(*) FROM islamic_names WHERE status='active' GROUP BY gender;

-- 3. Make sure no compound names are active (should be 0 or only famous ones)
SELECT name FROM islamic_names
WHERE name REGEXP '-' AND status = 'active'
ORDER BY name;

-- 4. Make sure all Quranic names are active
SELECT name, status FROM islamic_names
WHERE is_quranic = 1 AND status = 'inactive';
-- (Should return 0 rows)

-- 5. Check top active names alphabetically
SELECT name, gender, status FROM islamic_names
WHERE status = 'active'
ORDER BY name LIMIT 50;

-- 6. How many pages will sitemap have now?
SELECT COUNT(*) as sitemap_pages FROM islamic_names WHERE status = 'active';
```

---

## ════════════════════════════════════════
## SECTION 9: ROLLBACK (Agar Kuch Ghalat Ho)
## ════════════════════════════════════════

```sql
-- EMERGENCY ROLLBACK — sab kuch wapas active kar do
UPDATE islamic_names SET status = 'active';

-- Ya backup se restore karo
DROP TABLE islamic_names;
RENAME TABLE islamic_names_backup TO islamic_names;
```

---

## ════════════════════════════════════════
## SECTION 10: CHECKLIST
## ════════════════════════════════════════

Ye order mein karo:

- [ ] **1.** Database backup lao (`islamic_names_backup` table banao)
- [ ] **2.** `status` column add karo (Section 4 - Step 1)
- [ ] **3.** SQL migration run karo (Steps 2-7)
- [ ] **4.** Verify karo — active count ~1,500-2,000 ke beech hona chahiye
- [ ] **5.** Laravel Model update karo (global scope add karo)
- [ ] **6.** Controller update karo (410 response for inactive)
- [ ] **7.** Website test karo — active names khulen, inactive 410 den
- [ ] **8.** Sitemap regenerate karo
- [ ] **9.** Google Search Console mein naya sitemap submit karo
- [ ] **10.** 2 hafte baad GSC Coverage report check karo

---

*Prompt prepared for: noorislam.com Islamic Names Smart Filtering*
*Stack: Laravel + Blade + MariaDB | Date: July 19, 2026*
*Total scope: 13,622 → ~2,000 active names*
