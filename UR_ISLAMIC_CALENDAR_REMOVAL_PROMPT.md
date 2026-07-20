# 🗑️ Prompt: SIRF /ur/ Waly Islamic Calendar Pages Remove Karo

## IMPORTANT — Kya Karna Hai:
- ✅ `/ur/islamic-date` → DELETE
- ✅ `/ur/hijri-date` → DELETE
- ✅ `/ur/islamic-calendar` → DELETE
- ✅ `/ur/islamic-calendar/today` → DELETE
- ✅ `/ur/islamic-calendar/pakistan` → DELETE
- ✅ `/ur/islamic-calendar/saudi` → DELETE
- ✅ `/ur/islamic-calendar/saudi-arabia` → DELETE
- ✅ `/ur/islamic-calendar/in-urdu` → DELETE

## Kya NAHI Karna:
- ❌ `/islamic-date` (English) → SAFE RAKHNA
- ❌ `/islamic-calendar` (English) → SAFE RAKHNA
- ❌ `/hijri-date` (English) → SAFE RAKHNA

---

## STEP 1 — Routes Dhundho

```bash
grep -n "islamic-date\|hijri-date\|islamic-calendar" routes/web.php
grep -rn "islamic-date\|hijri-date\|islamic-calendar" routes/ --include="*.php"
```

---

## STEP 2 — Routes/web.php mein Se SIRF /ur/ Wali Routes Delete Karo

**Case A — Agar `/ur/` prefix group alag hai:**
```php
Route::prefix('ur')->group(function () {
    // SIRF YEH LINES DELETE KARO:
    Route::get('/islamic-date', [IslamicCalendarController::class, 'islamicDate']);
    Route::get('/hijri-date', [IslamicCalendarController::class, 'hijriDate']);
    Route::get('/islamic-calendar', [IslamicCalendarController::class, 'index']);
    Route::get('/islamic-calendar/today', [IslamicCalendarController::class, 'today']);
    Route::get('/islamic-calendar/pakistan', [IslamicCalendarController::class, 'pakistan']);
    Route::get('/islamic-calendar/saudi', [IslamicCalendarController::class, 'saudi']);
    Route::get('/islamic-calendar/saudi-arabia', [IslamicCalendarController::class, 'saudiArabia']);
    Route::get('/islamic-calendar/in-urdu', [IslamicCalendarController::class, 'inUrdu']);

    // BAAKI /ur/ routes SAFE RAKHNA
});
```

**Case B — Agar LaravelLocalization use ho rahi hai:**
```php
// lang/ur/routes.php mein se SIRF yeh entries delete karo:
'islamic-date'     => 'اسلامی-تاریخ',
'hijri-date'       => 'ہجری-تاریخ',
'islamic-calendar' => 'اسلامی-کیلنڈر',
// Sub-routes bhi agar hain:
'islamic-calendar/today'        => 'اسلامی-کیلنڈر/آج',
'islamic-calendar/pakistan'     => 'اسلامی-کیلنڈر/پاکستان',
'islamic-calendar/saudi'        => 'اسلامی-کیلنڈر/سعودی',
'islamic-calendar/saudi-arabia' => 'اسلامی-کیلنڈر/سعودی-عرب',
'islamic-calendar/in-urdu'      => 'اسلامی-کیلنڈر/اردو-میں',
```

**Case C — Agar localization middleware wala setup hai:**
```php
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    // Yahan /ur/ prefix auto handle hota hai
    // SIRF yeh calendar routes delete karo:
    Route::get(LaravelLocalization::transRoute('routes.islamic-date'), [...]);
    Route::get(LaravelLocalization::transRoute('routes.hijri-date'), [...]);
    Route::get(LaravelLocalization::transRoute('routes.islamic-calendar'), [...]);
    // ... sub-routes bhi
});
```

---

## STEP 3 — Urdu Views Delete Karo (Agar Alag Hain)

```bash
# Check karo kya urdu-specific views hain
find resources/views -iname "*islamic*calendar*ur*"
find resources/views -iname "*hijri*ur*"
find resources/views -path "*/ur/*" -iname "*calendar*"
find resources/views -path "*/ur/*" -iname "*hijri*"
find resources/views -path "*/ur/*" -iname "*islamic*date*"
```

Agar urdu-specific view files hain toh delete karo, English wali SAFE rakhna.

---

## STEP 4 — lang/ur/ Files se Entries Remove Karo

```bash
# Check karo
cat lang/ur/routes.php 2>/dev/null || cat resources/lang/ur/routes.php 2>/dev/null
```

`lang/ur/routes.php` se sirf yeh entries delete karo:
```php
'islamic-date'            => '...',  // DELETE
'hijri-date'              => '...',  // DELETE
'islamic-calendar'        => '...',  // DELETE
'islamic-calendar/today'  => '...',  // DELETE
'islamic-calendar/pakistan'     => '...',  // DELETE
'islamic-calendar/saudi'        => '...',  // DELETE
'islamic-calendar/saudi-arabia' => '...',  // DELETE
'islamic-calendar/in-urdu'      => '...',  // DELETE
```

> **lang/en/routes.php ko TOUCH MAT KARNA** — English routes safe rehni chahiyein.

---

## STEP 5 — Urdu Navigation se Links Remove Karo

```bash
grep -rn "islamic-calendar\|islamic-date\|hijri-date" \
  resources/views/ --include="*.blade.php" -l
```

Un files mein se **sirf `/ur/` wale links** remove karo:
```html
<!-- DELETE karo sirf yeh type ke links: -->
<a href="{{ localizedURL('ur', 'islamic-calendar') }}">اسلامی کیلنڈر</a>
<a href="/ur/islamic-calendar">اسلامی کیلنڈر</a>
<a href="/ur/islamic-date">اسلامی تاریخ</a>

<!-- YEH SAFE RAKHNA: -->
<a href="/islamic-calendar">Islamic Calendar</a>
<a href="{{ route('islamic-calendar') }}">Islamic Calendar</a>
```

---

## STEP 6 — Cache Clear Karo

```bash
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:clear
```

---

## STEP 7 — Verify Karo

```bash
# Sirf /ur/ wali routes gone honi chahiyein
php artisan route:list | grep -i "islamic-calendar\|islamic-date\|hijri"
```

**Expected Result:**
- `/ur/islamic-calendar` → ❌ nahi aana chahiye
- `/islamic-calendar` (English) → ✅ aana chahiye (safe hai)

---

## STEP 8 — Git Commit

```bash
git add -A
git commit -m "feat: Remove Urdu /ur/ Islamic Calendar & Date pages (8 pages)"
git push origin main
```

---

## ⚠️ KEY RULE — Sirf YEH Delete Karo:
| URL | Action |
|-----|--------|
| `/ur/islamic-date` | ✅ DELETE |
| `/ur/hijri-date` | ✅ DELETE |
| `/ur/islamic-calendar` | ✅ DELETE |
| `/ur/islamic-calendar/today` | ✅ DELETE |
| `/ur/islamic-calendar/pakistan` | ✅ DELETE |
| `/ur/islamic-calendar/saudi` | ✅ DELETE |
| `/ur/islamic-calendar/saudi-arabia` | ✅ DELETE |
| `/ur/islamic-calendar/in-urdu` | ✅ DELETE |
| `/islamic-calendar` (English) | ❌ SAFE |
| `/islamic-date` (English) | ❌ SAFE |
| `/hijri-date` (English) | ❌ SAFE |
