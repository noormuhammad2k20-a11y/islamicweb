<?php
use App\Models\DreamSymbol;

$dream = DreamSymbol::where('slug', 'mosque-masjid')->first();

if ($dream) {
    $dream->old_english_slug = 'mosque-masjid';
    $dream->slug = 'khwab-mein-masjid-dekhna';
    $dream->symbol_roman_urdu = 'Khwab Mein Masjid Dekhna';
    $dream->seo_title = 'خواب میں مسجد دیکھنا | Khwab Mein Masjid Dekhna';
    $dream->meta_description = 'خواب میں مسجد دیکھنے کی اسلامی تعبیر، معنی اور مختلف علماء کی آراء جانیں۔ Read the Islamic interpretation of seeing a mosque in a dream (Khwab Mein Masjid Dekhna), authentic meanings, references, and explanations.';
    $dream->canonical_url = url('/khwabon-ki-tabeer/khwab-mein-masjid-dekhna');
    $dream->save();
    echo "Dream updated successfully!\n";
} else {
    echo "Dream not found. It might have already been updated.\n";
}
