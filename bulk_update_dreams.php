<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\DreamSymbol;
use Illuminate\Support\Str;

$map = [
    'seeing-water' => 'Pani',
    'snake-saanp' => 'Saanp',
    'flying-urna' => 'Hawa Mein Urna',
    'teeth-falling-dant' => 'Dant Girna',
    'milk-doodh' => 'Doodh Peena',
    'quran-pak' => 'Quran Pak',
    'fire-aag' => 'Aag',
    'rain-barish' => 'Barish',
    'lion-sher' => 'Sher',
    'honey-shehad' => 'Shehad',
    'kaaba-sharif' => 'Kaaba',
    'moon-chand' => 'Chand',
    'sun-suraj' => 'Suraj',
    'dead-person-murda' => 'Murda',
    'horse-ghora' => 'Ghora',
    'sea-samandar' => 'Samandar',
    'seeing-prophet-muhammad' => 'Nabi SAW Ko Dekhna',
    'tree-darakht' => 'Darakht',
    'ring-anguthi' => 'Anguthi',
    'blood-khoon' => 'Khoon',
    'mountain-pahar' => 'Pahar',
    'sword-talwar' => 'Talwar',
    'white-clothes-safed' => 'Safed Kapde',
    'cat-billi' => 'Billi',
    'bird-parinda' => 'Parinda',
    'well-kunwan' => 'Kunwan',
    'key-chabi' => 'Chabi',
    'bread-roti' => 'Roti',
    'gold' => 'Sona',
    'dog' => 'Kutta',
    'building-a-house' => 'Ghar Banana',
];

$updated = 0;

foreach ($map as $oldSlug => $romanNoun) {
    $dream = DreamSymbol::where('slug', $oldSlug)->orWhere('old_english_slug', $oldSlug)->first();
    
    if ($dream) {
        // Only set old_english_slug if not already set, otherwise keep it
        if (empty($dream->old_english_slug)) {
            $dream->old_english_slug = $dream->slug;
        }

        // Generate full roman urdu title based on noun
        if (str_contains(strtolower($romanNoun), 'dekhna') || str_contains(strtolower($romanNoun), 'girna') || str_contains(strtolower($romanNoun), 'peena') || str_contains(strtolower($romanNoun), 'banana') || str_contains(strtolower($romanNoun), 'urna')) {
            $fullRomanTitle = "Khwab Mein $romanNoun";
        } else {
            $fullRomanTitle = "Khwab Mein $romanNoun Dekhna";
        }
        
        $newSlug = Str::slug($fullRomanTitle);
        
        $dream->slug = $newSlug;
        $dream->symbol_roman_urdu = $fullRomanTitle;
        $dream->seo_title = $dream->symbol_urdu . ' | ' . $fullRomanTitle;
        $dream->meta_description = 'خواب میں ' . $dream->symbol_urdu . ' دیکھنے کی اسلامی تعبیر، معنی اور مختلف علماء کی آراء جانیں۔ Read the Islamic interpretation of seeing ' . $dream->symbol_english . ' in a dream (' . $fullRomanTitle . '), authentic meanings, references, and explanations.';
        $dream->canonical_url = url('/khwabon-ki-tabeer/' . $newSlug);
        
        $dream->save();
        $updated++;
        echo "Updated: $oldSlug -> $newSlug\n";
    }
}

echo "\nTotal updated: $updated\n";
