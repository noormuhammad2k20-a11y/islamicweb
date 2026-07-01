$models = @("Country", "City", "Surah", "SurahAyah", "FazilatEntry", "HadithTopic", "HijriMonth", "IslamicEvent", "RamadanTiming", "PrayerTime", "Author", "Scholar", "ContentReview", "Subscriber", "ContactMessage", "SiteSetting")

foreach ($model in $models) {
    php artisan make:filament-resource $model --generate
}
