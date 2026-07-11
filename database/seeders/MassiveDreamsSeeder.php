<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\DreamCategory;
use App\Models\DreamSymbol;

class MassiveDreamsSeeder extends Seeder
{
    public function run(): void
    {
        $categoriesData = [
            'Prophets' => ['name_urdu' => 'انبیاء کرام', 'icon' => '✨', 'slug' => 'prophets', 'dreams' => ['Prophet Adam', 'Prophet Nuh', 'Prophet Ibrahim', 'Prophet Musa', 'Prophet Isa', 'Prophet Muhammad', 'Prophet Yusuf', 'Prophet Yunus']],
            'Sahaba' => ['name_urdu' => 'صحابہ کرام', 'icon' => '👥', 'slug' => 'sahaba', 'dreams' => ['Abu Bakr', 'Umar ibn al-Khattab', 'Uthman ibn Affan', 'Ali ibn Abi Talib', 'Bilal', 'Khalid ibn al-Walid', 'Hasan', 'Husayn']],
            'Worship' => ['name_urdu' => 'عبادات', 'icon' => '🕌', 'slug' => 'worship', 'dreams' => ['Salah', 'Fajr Prayer', 'Dhuhr Prayer', 'Asr Prayer', 'Maghrib Prayer', 'Isha Prayer', 'Jumuah', 'Tahajjud', 'Wudu', 'Adhan', 'Iqamah', 'Dua', 'Dhikr', 'Tasbih', 'Quran Recitation', 'Fasting', 'Ramadan', 'Zakat', 'Hajj', 'Umrah']],
            'Animals' => ['name_urdu' => 'جانور', 'icon' => '🦁', 'slug' => 'animals', 'dreams' => ['Snake', 'Lion', 'Horse', 'Camel', 'Cow', 'Goat', 'Sheep', 'Cat', 'Dog', 'Elephant', 'Monkey', 'Deer', 'Wolf', 'Fox', 'Rabbit', 'Fish', 'Dolphin', 'Whale', 'Crocodile', 'Turtle']],
            'Birds' => ['name_urdu' => 'پرندے', 'icon' => '🦅', 'slug' => 'birds', 'dreams' => ['Eagle', 'Falcon', 'Pigeon', 'Dove', 'Crow', 'Owl', 'Peacock', 'Parrot', 'Sparrow', 'Swan', 'Duck', 'Hen', 'Rooster', 'Crane', 'Hawk']],
            'Insects' => ['name_urdu' => 'حشرات', 'icon' => '🐜', 'slug' => 'insects', 'dreams' => ['Ant', 'Spider', 'Scorpion', 'Bee', 'Mosquito', 'Fly', 'Butterfly', 'Cockroach', 'Worm']],
            'Fruits' => ['name_urdu' => 'پھل', 'icon' => '🍎', 'slug' => 'fruits', 'dreams' => ['Apple', 'Mango', 'Banana', 'Dates', 'Grapes', 'Orange', 'Lemon', 'Pomegranate', 'Watermelon', 'Melon', 'Coconut', 'Fig', 'Olive']],
            'Vegetables' => ['name_urdu' => 'سبزیاں', 'icon' => '🥬', 'slug' => 'vegetables', 'dreams' => ['Onion', 'Garlic', 'Carrot', 'Potato', 'Tomato', 'Cucumber', 'Pumpkin']],
            'Foods & Drinks' => ['name_urdu' => 'کھانا پینا', 'icon' => '🍞', 'slug' => 'foods-drinks', 'dreams' => ['Bread', 'Milk', 'Water', 'Honey', 'Meat', 'Rice', 'Sweet', 'Juice']],
            'Clothing' => ['name_urdu' => 'لباس', 'icon' => '👕', 'slug' => 'clothing', 'dreams' => ['Shirt', 'Pants', 'Shoes', 'Hat', 'Hijab', 'Turban', 'Coat', 'Socks']],
            'Jewelry' => ['name_urdu' => 'زیورات', 'icon' => '💍', 'slug' => 'jewelry', 'dreams' => ['Gold Ring', 'Silver Ring', 'Necklace', 'Bracelet', 'Earrings', 'Diamond']],
            'Body Parts' => ['name_urdu' => 'اعضائے جسمانی', 'icon' => '👁️', 'slug' => 'body-parts', 'dreams' => ['Head', 'Eyes', 'Nose', 'Mouth', 'Teeth', 'Hands', 'Legs', 'Heart', 'Hair']],
            'Family' => ['name_urdu' => 'خاندان', 'icon' => '👨‍👩‍👧‍👦', 'slug' => 'family', 'dreams' => ['Mother', 'Father', 'Brother', 'Sister', 'Son', 'Daughter', 'Grandfather', 'Grandmother']],
            'Nature' => ['name_urdu' => 'قدرتی مناظر', 'icon' => '⛰️', 'slug' => 'nature', 'dreams' => ['Mountain', 'River', 'Sea', 'Forest', 'Desert', 'Earthquake', 'Volcano']],
            'Weather' => ['name_urdu' => 'موسم', 'icon' => '🌧️', 'slug' => 'weather', 'dreams' => ['Rain', 'Snow', 'Wind', 'Storm', 'Lightning', 'Thunder', 'Cloud']],
            'Vehicles' => ['name_urdu' => 'سواری', 'icon' => '🚗', 'slug' => 'vehicles', 'dreams' => ['Car', 'Bus', 'Train', 'Airplane', 'Boat', 'Ship', 'Bicycle']],
            'Death' => ['name_urdu' => 'موت و مردے', 'icon' => '🪦', 'slug' => 'death', 'dreams' => ['Dying', 'Dead Person', 'Grave', 'Coffin', 'Funeral']],
            'Marriage' => ['name_urdu' => 'شادی', 'icon' => '👰', 'slug' => 'marriage', 'dreams' => ['Wedding', 'Bride', 'Groom', 'Divorce']],
            'Wealth' => ['name_urdu' => 'دولت اور پیسہ', 'icon' => '💰', 'slug' => 'wealth', 'dreams' => ['Money', 'Coins', 'Bank', 'Rich', 'Poor']],
            'Weapons' => ['name_urdu' => 'ہتھیار', 'icon' => '⚔️', 'slug' => 'weapons', 'dreams' => ['Sword', 'Gun', 'Knife', 'Arrow', 'Shield']],
            'Colors' => ['name_urdu' => 'رنگ', 'icon' => '🎨', 'slug' => 'colors', 'dreams' => ['White', 'Black', 'Red', 'Green', 'Blue', 'Yellow']],
            'Actions' => ['name_urdu' => 'افعال و حرکات', 'icon' => '🏃', 'slug' => 'actions', 'dreams' => ['Running', 'Flying', 'Falling', 'Crying', 'Laughing', 'Swimming']],
            'Buildings' => ['name_urdu' => 'عمارتیں', 'icon' => '🏠', 'slug' => 'buildings', 'dreams' => ['Mosque', 'Kaaba', 'House', 'Palace', 'School', 'Hospital', 'Market', 'Bridge', 'Prison', 'Graveyard', 'Garden', 'Hotel', 'Airport']],
            'Islamic Places' => ['name_urdu' => 'مقدس مقامات', 'icon' => '🕋', 'slug' => 'islamic-places', 'dreams' => ['Makkah', 'Madinah', 'Al-Aqsa', 'Mount Arafat']],
            'Quran & Hadith' => ['name_urdu' => 'قرآن و حدیث', 'icon' => '📖', 'slug' => 'quran-hadith', 'dreams' => ['Reading Quran', 'Listening to Quran', 'Holding Quran']],
            'Professions' => ['name_urdu' => 'پیشے', 'icon' => '👨‍🍳', 'slug' => 'professions', 'dreams' => ['Doctor', 'Teacher', 'King', 'Soldier', 'Farmer']],
            'Numbers' => ['name_urdu' => 'اعداد', 'icon' => '🔢', 'slug' => 'numbers', 'dreams' => ['One', 'Two', 'Three', 'Seven', 'Ten', 'Forty']],
            'Letters' => ['name_urdu' => 'حروف', 'icon' => '🔤', 'slug' => 'letters', 'dreams' => ['Alif', 'Ba', 'Ta', 'Mim', 'Noon']],
            'Health' => ['name_urdu' => 'صحت', 'icon' => '🏥', 'slug' => 'health', 'dreams' => ['Sickness', 'Healing', 'Medicine', 'Blood']],
            'Pregnancy' => ['name_urdu' => 'حمل', 'icon' => '🤰', 'slug' => 'pregnancy', 'dreams' => ['Being Pregnant', 'Giving Birth', 'Baby Boy', 'Baby Girl']],
            'Miscellaneous' => ['name_urdu' => 'متفرق', 'icon' => '✨', 'slug' => 'miscellaneous', 'dreams' => ['Fire', 'Shadow', 'Mirror', 'Clock', 'Key']],
        ];

        foreach ($categoriesData as $englishName => $data) {
            $category = DreamCategory::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name_english' => $englishName,
                    'name_urdu' => $data['name_urdu'],
                    'icon' => $data['icon'],
                    'description' => 'خواب میں ' . $data['name_urdu'] . ' دیکھنے کی اسلامی تعبیر',
                ]
            );

            foreach ($data['dreams'] as $dreamNameEn) {
                // Determine Roman Urdu Name by converting English closely (simple fallback for massive seed)
                $romanUrdu = $dreamNameEn;
                
                // Create a clean slug
                $slug = Str::slug('khwab-mein-' . $romanUrdu . '-dekhna');
                
                // Try to find if this dream already exists
                $existing = DreamSymbol::where('slug', $slug)->orWhere('symbol_english', $dreamNameEn)->first();
                
                if (!$existing) {
                    $urduTitle = "خواب میں $romanUrdu دیکھنے کی اسلامی تعبیر";
                    DreamSymbol::create([
                        'category_id' => $category->id,
                        'symbol_english' => $dreamNameEn,
                        'symbol_roman_urdu' => "Khwab Mein $romanUrdu Dekhna",
                        'symbol_urdu' => $romanUrdu, // Fallback since we can't reliably translate 300 words without API
                        'slug' => $slug,
                        'interpretation_urdu' => "ابن سیرین کے مطابق $urduTitle بہت اہمیت کی حامل ہے۔ مزید تفصیلات جلد شامل کی جائیں گی۔",
                        'published_status' => 1,
                        'seo_title' => "$romanUrdu | Khwab Mein $romanUrdu Dekhna",
                        'meta_description' => "{$urduTitle}، معنی اور مختلف علماء کی آراء جانیں۔ Read the Islamic interpretation of seeing $dreamNameEn in a dream.",
                        'canonical_url' => url('/khwabon-ki-tabeer/' . $slug),
                        'dream_type' => 0,
                    ]);
                } else {
                    // Just update category if it's an existing dream
                    $existing->category_id = $category->id;
                    $existing->save();
                }
            }
        }
    }
}
