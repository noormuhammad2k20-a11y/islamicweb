# 🗑️ Complete Prompt: Hajj & Umrah Section Permanently Remove Karo

---

## CONTEXT (Tum kaun ho / Kya karna hai)

Yeh ek **Laravel** Islamic website hai hosted at:
**GitHub: https://github.com/noormuhammad2k20-a11y/islamicweb**

Mujhe website se **Hajj & Umrah ka poora section permanently delete** karna hai.

---

## YEH SARI URLs DELETE KARNI HAIN (32 pages total):

### English URLs:
- `/hajj-and-umrah`
- `/hajj-guide`
- `/umrah-guide`
- `/hajj-checklist`
- `/umrah-checklist`
- `/hajj-faqs`
- `/hajj-duas`
- `/umrah-duas`
- `/hajj-umrah`
- `/hajj-umrah/hajj-guide`
- `/hajj-umrah/umrah-guide`
- `/hajj-umrah/hajj-duas`
- `/hajj-umrah/umrah-duas`
- `/hajj-umrah/hajj-checklist`
- `/hajj-umrah/umrah-checklist`
- `/hajj-umrah/hajj-faqs`

### Urdu URLs (same but with `/ur/` prefix):
- `/ur/hajj-and-umrah`
- `/ur/hajj-guide`
- `/ur/umrah-guide`
- `/ur/hajj-checklist`
- `/ur/umrah-checklist`
- `/ur/hajj-faqs`
- `/ur/hajj-duas`
- `/ur/umrah-duas`
- `/ur/hajj-umrah`
- `/ur/hajj-umrah/hajj-guide`
- `/ur/hajj-umrah/umrah-guide`
- `/ur/hajj-umrah/hajj-duas`
- `/ur/hajj-umrah/umrah-duas`
- `/ur/hajj-umrah/hajj-checklist`
- `/ur/hajj-umrah/umrah-checklist`
- `/ur/hajj-umrah/hajj-faqs`

---

## TASK: YEH SARI CHEEZEIN PERMANENTLY DELETE KARO

### STEP 1 — Repository Clone & Check Karo

```bash
git clone https://github.com/noormuhammad2k20-a11y/islamicweb.git
cd islamicweb
```

Pehle yeh files dhundho:

```bash
# Routes dhundho
grep -r "hajj\|umrah" routes/ --include="*.php" -l

# Controllers dhundho
grep -r "hajj\|umrah\|Hajj\|Umrah" app/Http/Controllers/ --include="*.php" -l

# Views dhundho
find resources/views -name "*hajj*" -o -name "*umrah*" | head -50

# Models dhundho
grep -r "hajj\|umrah\|Hajj\|Umrah" app/Models/ --include="*.php" -l

# Migrations dhundho
find database/migrations -name "*hajj*" -o -name "*umrah*"

# Seeders dhundho
find database/seeders -name "*hajj*" -o -name "*umrah*"
```

---

### STEP 2 — Routes/web.php se Hajj & Umrah Routes Delete Karo

`routes/web.php` ya `routes/` folder mein koi bhi file open karo aur yeh sari routes remove karo:

**Yeh patterns dhundh kar delete karo:**

```php
// Koi bhi line jisme yeh ho:
hajj-and-umrah
hajj-guide
umrah-guide
hajj-checklist
umrah-checklist
hajj-faqs
hajj-duas
umrah-duas
hajj-umrah
HajjController
UmrahController
```

**Example — agar routes kuch aise hain:**
```php
// DELETE yeh sari lines:
Route::get('/hajj-and-umrah', [HajjController::class, 'index']);
Route::get('/hajj-guide', [HajjController::class, 'guide']);
Route::get('/umrah-guide', [UmrahController::class, 'guide']);
Route::get('/hajj-checklist', [HajjController::class, 'checklist']);
Route::get('/umrah-checklist', [UmrahController::class, 'checklist']);
Route::get('/hajj-faqs', [HajjController::class, 'faqs']);
Route::get('/hajj-duas', [HajjController::class, 'duas']);
Route::get('/umrah-duas', [UmrahController::class, 'duas']);

Route::prefix('hajj-umrah')->group(function() {
    // Yeh poora group delete karo
});

// Urdu prefix wali bhi:
Route::prefix('ur')->group(function() {
    Route::get('/hajj-and-umrah', ...); // DELETE
    Route::get('/hajj-guide', ...);     // DELETE
    // etc.
});
```

**Agar localization ke saath hai:**
```php
// Yeh pattern bhi dhundho aur delete karo:
Route::get(LaravelLocalization::transRoute('routes.hajj-and-umrah'), ...);
Route::get(LaravelLocalization::transRoute('routes.hajj-guide'), ...);
```

---

### STEP 3 — Controllers Delete Karo

Yeh files dhundh kar **completely delete** karo:

```bash
# Find karo
find app/Http/Controllers -name "*ajj*" -o -name "*mrah*"
find app/Http/Controllers -name "*Hajj*" -o -name "*Umrah*"
```

**Delete karo:**
```bash
rm -f app/Http/Controllers/HajjController.php
rm -f app/Http/Controllers/UmrahController.php
rm -f app/Http/Controllers/HajjAndUmrahController.php
rm -f app/Http/Controllers/HajjUmrahController.php
# Koi bhi controller jisme Hajj ya Umrah ka naam ho
```

**Agar ek hi controller mein methods hain:**
- `HajjController.php` ya similar file open karo
- Sirf hajj/umrah wale methods delete karo
- Baaki code safe rakhna

---

### STEP 4 — Views/Blade Files Delete Karo

```bash
# Dhundho
find resources/views -iname "*hajj*"
find resources/views -iname "*umrah*"
find resources/views -iname "*hajj-umrah*"
```

**Delete karo (sari matching files):**
```bash
rm -rf resources/views/hajj/
rm -rf resources/views/umrah/
rm -rf resources/views/hajj-umrah/
rm -f resources/views/hajj-and-umrah.blade.php
rm -f resources/views/hajj-guide.blade.php
rm -f resources/views/umrah-guide.blade.php
rm -f resources/views/hajj-checklist.blade.php
rm -f resources/views/umrah-checklist.blade.php
rm -f resources/views/hajj-faqs.blade.php
rm -f resources/views/hajj-duas.blade.php
rm -f resources/views/umrah-duas.blade.php
# Jo bhi matching files hon
```

---

### STEP 5 — Navigation/Sidebar/Menu se Links Hatao

Yeh files check karo aur Hajj & Umrah ke links remove karo:

```bash
# Navigation files dhundho
grep -r "hajj\|umrah\|Hajj\|Umrah" resources/views/layouts/ --include="*.blade.php" -l
grep -r "hajj\|umrah\|Hajj\|Umrah" resources/views/components/ --include="*.blade.php" -l
grep -r "hajj\|umrah\|Hajj\|Umrah" resources/views/partials/ --include="*.blade.php" -l
```

**Common files jisme links hoti hain:**
- `resources/views/layouts/app.blade.php`
- `resources/views/layouts/navigation.blade.php`
- `resources/views/components/navbar.blade.php`
- `resources/views/partials/sidebar.blade.php`
- `resources/views/partials/footer.blade.php`
- `resources/views/home.blade.php`

**Yeh links delete karo:**
```html
<!-- DELETE karo aise links -->
<a href="{{ route('hajj-and-umrah') }}">Hajj & Umrah</a>
<a href="/hajj-and-umrah">Hajj & Umrah</a>
<li><a href="{{ url('hajj-guide') }}">Hajj Guide</a></li>
<!-- Koi bhi link jisme hajj ya umrah ho -->
```

---

### STEP 6 — Models Delete Karo (Agar Hain)

```bash
# Dhundho
find app/Models -iname "*Hajj*" -o -iname "*Umrah*"
grep -r "hajj\|umrah\|Hajj\|Umrah" app/Models/ --include="*.php" -l
```

**Delete karo:**
```bash
rm -f app/Models/Hajj.php
rm -f app/Models/Umrah.php
rm -f app/Models/HajjGuide.php
rm -f app/Models/HajjDua.php
rm -f app/Models/UmrahDua.php
# Jo bhi matching models hon
```

---

### STEP 7 — Database Migrations Delete/Rollback Karo

```bash
# Find karo
find database/migrations -iname "*hajj*" -o -iname "*umrah*"
```

**Agar migrations hain:**
```bash
# Pehle rollback karo (agar tables exist hain)
php artisan migrate:rollback --path=database/migrations/YYYY_MM_DD_xxxxxx_create_hajj_table.php

# Phir file delete karo
rm -f database/migrations/YYYY_MM_DD_xxxxxx_create_hajj_table.php
rm -f database/migrations/YYYY_MM_DD_xxxxxx_create_umrah_table.php
```

**Database tables direct delete karo (agar manually banay hain):**
```sql
DROP TABLE IF EXISTS hajj_guides;
DROP TABLE IF EXISTS umrah_guides;
DROP TABLE IF EXISTS hajj_duas;
DROP TABLE IF EXISTS umrah_duas;
DROP TABLE IF EXISTS hajj_checklists;
DROP TABLE IF EXISTS umrah_checklists;
DROP TABLE IF EXISTS hajj_faqs;
-- Koi bhi table jiska naam hajj ya umrah se related ho
```

---

### STEP 8 — Seeders Delete Karo

```bash
# Find karo
find database/seeders -iname "*Hajj*" -o -iname "*Umrah*"
grep -r "Hajj\|Umrah\|hajj\|umrah" database/seeders/ --include="*.php" -l
```

**Delete karo:**
```bash
rm -f database/seeders/HajjSeeder.php
rm -f database/seeders/UmrahSeeder.php
rm -f database/seeders/HajjGuideSeeder.php
# Jo bhi matching seeders hon
```

**DatabaseSeeder.php se bhi remove karo:**
```php
// database/seeders/DatabaseSeeder.php mein se yeh lines delete karo:
$this->call(HajjSeeder::class);
$this->call(UmrahSeeder::class);
```

---

### STEP 9 — Lang/Translation Files se Remove Karo

```bash
# Language files dhundho
grep -r "hajj\|umrah\|Hajj\|Umrah" lang/ --include="*.php" -l
grep -r "hajj\|umrah\|Hajj\|Umrah" resources/lang/ --include="*.php" -l
```

**Remove karo:**
```php
// lang/en/routes.php ya similar file se:
'hajj-and-umrah' => 'hajj-and-umrah',   // DELETE
'hajj-guide' => 'hajj-guide',           // DELETE
'umrah-guide' => 'umrah-guide',         // DELETE
'hajj-checklist' => 'hajj-checklist',   // DELETE
// etc.
```

```php
// lang/ur/routes.php se bhi:
'hajj-and-umrah' => 'حج-اور-عمرہ',     // DELETE
// etc.
```

**Menu translations se bhi hatao:**
```php
// lang/en/menu.php ya similar:
'hajj_umrah' => 'Hajj & Umrah',        // DELETE
'hajj_guide' => 'Hajj Guide',          // DELETE
// etc.
```

---

### STEP 10 — Config Files Check Karo

```bash
grep -r "hajj\|umrah\|Hajj\|Umrah" config/ --include="*.php" -l
```

Agar koi config entry ho toh delete karo.

---

### STEP 11 — Sitemap se Remove Karo

```bash
# Sitemap files dhundho
find . -name "sitemap*" -not -path "*/vendor/*" -not -path "*/node_modules/*"
grep -r "hajj\|umrah" app/ --include="*.php" -l | grep -i sitemap
```

Agar sitemap generate hoti hai code se, toh us controller/service se bhi Hajj & Umrah URLs hataao.

---

### STEP 12 — Cache Clear Karo

```bash
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan optimize:clear
```

---

### STEP 13 — Verification (Confirm Karen Ke Delete Ho Gaya)

```bash
# Confirm routes gone
php artisan route:list | grep -i "hajj\|umrah"
# Should return NOTHING

# Confirm no files remain
grep -r "hajj\|umrah" app/ resources/ routes/ lang/ --include="*.php" --include="*.blade.php" | grep -v ".git" | grep -v "vendor"
# Review results — sirf unrelated mentions honi chahiyein (like hadiths mein text)
```

---

### STEP 14 — Git Commit Karo

```bash
git add -A
git commit -m "feat: Remove Hajj & Umrah section completely - 32 pages removed"
git push origin main
```

---

## ⚠️ IMPORTANT NOTES

1. **Baaki cheezein mat chhona** — Sirf hajj/umrah related code hatao. Quran, Hadith, Prayer Times, 99 Names, Duas (baaki sari), sab safe rehna chahiye.

2. **Hadiths mein "Hajj" ka zikar** — Database mein Bukhari hadith wagera hain jisme "Hajj" ka lafz aata hai — yeh DELETE NAHI KARNA. Sirf dedicated Hajj & Umrah pages/routes/controllers delete karne hain.

3. **Makkah/Madinah Prayer Times** — Yeh bhi safe rehna chahiye. Sirf Hajj Guide, Umrah Guide, Hajj Checklist, Umrah Checklist, Hajj FAQs, Hajj Duas, Umrah Duas pages delete karne hain.

4. **Homepage par agar Hajj & Umrah ka section/card hai** — woh bhi remove karo.

5. **Test karo** — Delete ke baad `php artisan serve` se local mein test karo ke koi 404 error properly aata hai in URLs par.

---

## FILES CHECKLIST (Jo Delete Honi Hain):

- [ ] `routes/web.php` — hajj/umrah routes remove
- [ ] `app/Http/Controllers/HajjController.php` — delete
- [ ] `app/Http/Controllers/UmrahController.php` — delete
- [ ] `resources/views/hajj/` folder — delete entire folder
- [ ] `resources/views/umrah/` folder — delete entire folder
- [ ] `resources/views/hajj-umrah/` folder — delete entire folder
- [ ] Navigation blade files — links remove
- [ ] `app/Models/Hajj*.php` — delete
- [ ] `database/migrations/*hajj*.php` — delete
- [ ] `database/migrations/*umrah*.php` — delete
- [ ] `database/seeders/Hajj*.php` — delete
- [ ] `lang/en/*.php` — hajj/umrah entries remove
- [ ] `lang/ur/*.php` — hajj/umrah entries remove
- [ ] Cache clear
- [ ] Git commit & push

---

**Agar kuch samajh na aaye ya file structure different ho, toh pehle `php artisan route:list | grep -i hajj` run karo aur output share karo.**
