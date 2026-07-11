<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\DreamCategory;

class AuthorityDreamsSeeder extends Seeder
{
    public function run(): void
    {
        $categories = DreamCategory::all()->keyBy('slug');
        if ($categories->isEmpty()) {
            return;
        }

        $allDreamsToInsert = [];
        $now = now();

        $rules = [
            'janwar' => [ // Animals
                'bases' => ['Saanp' => 'Snake', 'Sher' => 'Lion', 'Ghora' => 'Horse', 'Oont' => 'Camel', 'Gaye' => 'Cow', 'Bakra' => 'Goat', 'Bhair' => 'Sheep', 'Billi' => 'Cat', 'Kutta' => 'Dog', 'Hathi' => 'Elephant', 'Bandar' => 'Monkey', 'Hiran' => 'Deer', 'Bheriya' => 'Wolf', 'Lomri' => 'Fox', 'Khargosh' => 'Rabbit', 'Machli' => 'Fish', 'Magarmach' => 'Crocodile', 'Kachwa' => 'Turtle'],
                'modifiers' => ['Kala' => 'Black', 'Safed' => 'White', 'Bara' => 'Big', 'Chota' => 'Small', 'Murda' => 'Dead', 'Urta Hua' => 'Flying', 'Do' => 'Two', 'Bacha' => 'Baby', 'Jangli' => 'Wild', 'Paaltu' => 'Pet'],
                'actions' => ['Dekhna' => 'Seeing', 'Kaatna' => 'Biting', 'Piche Bhagna' => 'Chasing', 'Ghar Mein Dekhna' => 'In House', 'Pani Mein Dekhna' => 'In Water']
            ],
            'parinday' => [ // Birds
                'bases' => ['Uqaab' => 'Eagle', 'Baaz' => 'Falcon', 'Kabootar' => 'Pigeon', 'Fakhta' => 'Dove', 'Kawa' => 'Crow', 'Ullu' => 'Owl', 'Mor' => 'Peacock', 'Tota' => 'Parrot', 'Chiriya' => 'Sparrow', 'Hans' => 'Swan', 'Batakh' => 'Duck', 'Murgi' => 'Hen', 'Murga' => 'Rooster', 'Cheel' => 'Hawk'],
                'modifiers' => ['Safed' => 'White', 'Kala' => 'Black', 'Urta Hua' => 'Flying', 'Murda' => 'Dead', 'Khubsurat' => 'Beautiful', 'Gaata Hua' => 'Singing'],
                'actions' => ['Dekhna' => 'Seeing', 'Pinjray Mein Dekhna' => 'In Cage', 'Darakht Par Dekhna' => 'On Tree', 'Asmaan Mein Dekhna' => 'In Sky', 'Hamla Karte Dekhna' => 'Attacking']
            ],
            'phal' => [ // Fruits
                'bases' => ['Saib' => 'Apple', 'Aam' => 'Mango', 'Kela' => 'Banana', 'Khajoor' => 'Dates', 'Angoor' => 'Grapes', 'Kinu' => 'Orange', 'Leemu' => 'Lemon', 'Anaar' => 'Pomegranate', 'Tarbuz' => 'Watermelon', 'Kharbooza' => 'Melon', 'Nariyal' => 'Coconut', 'Injeer' => 'Fig', 'Zaitoon' => 'Olive'],
                'modifiers' => ['Meetha' => 'Sweet', 'Khatta' => 'Sour', 'Kharab' => 'Rotten', 'Taza' => 'Fresh', 'Lal' => 'Red', 'Hara' => 'Green', 'Peela' => 'Yellow'],
                'actions' => ['Dekhna' => 'Seeing', 'Khana' => 'Eating', 'Khareedna' => 'Buying', 'Torna' => 'Plucking', 'Darakht Par Dekhna' => 'On Tree']
            ],
            'sabziyan' => [ // Vegetables
                'bases' => ['Piyaz' => 'Onion', 'Lehsan' => 'Garlic', 'Gajar' => 'Carrot', 'Aloo' => 'Potato', 'Tamatar' => 'Tomato', 'Kheera' => 'Cucumber', 'Kaddu' => 'Pumpkin', 'Palak' => 'Spinach', 'Band Gobhi' => 'Cabbage', 'Matar' => 'Peas'],
                'modifiers' => ['Taza' => 'Fresh', 'Kharab' => 'Rotten', 'Paka Hua' => 'Cooked', 'Kacha' => 'Raw', 'Hari' => 'Green'],
                'actions' => ['Dekhna' => 'Seeing', 'Khana' => 'Eating', 'Khareedna' => 'Buying', 'Kaatna' => 'Cutting', 'Pakana' => 'Cooking']
            ],
            'khana-peena' => [ // Foods
                'bases' => ['Roti' => 'Bread', 'Doodh' => 'Milk', 'Pani' => 'Water', 'Shehad' => 'Honey', 'Gosht' => 'Meat', 'Chawal' => 'Rice', 'Mithai' => 'Sweet', 'Juice' => 'Juice', 'Chai' => 'Tea', 'Coffee' => 'Coffee'],
                'modifiers' => ['Garam' => 'Hot', 'Thanda' => 'Cold', 'Meetha' => 'Sweet', 'Masaledar' => 'Spicy', 'Taza' => 'Fresh', 'Kharab' => 'Spoiled'],
                'actions' => ['Dekhna' => 'Seeing', 'Peena' => 'Drinking', 'Khana' => 'Eating', 'Pakana' => 'Cooking', 'Girna' => 'Spilling', 'Baantna' => 'Sharing']
            ],
            'libaas' => [ // Clothing
                'bases' => ['Kameez' => 'Shirt', 'Pant' => 'Pants', 'Jootay' => 'Shoes', 'Topi' => 'Hat', 'Hijab' => 'Hijab', 'Pugree' => 'Turban', 'Coat' => 'Coat', 'Moze' => 'Socks', 'Libaas' => 'Dress', 'Abaya' => 'Abaya'],
                'modifiers' => ['Safed' => 'White', 'Kala' => 'Black', 'Lal' => 'Red', 'Hara' => 'Green', 'Naya' => 'New', 'Purana' => 'Old', 'Phata Hua' => 'Torn', 'Ganda' => 'Dirty', 'Saaf' => 'Clean'],
                'actions' => ['Dekhna' => 'Seeing', 'Pehnna' => 'Wearing', 'Khareedna' => 'Buying', 'Dhona' => 'Washing', 'Gum Hona' => 'Losing']
            ],
            'imarat' => [ // Buildings
                'bases' => ['Masjid' => 'Mosque', 'Kaaba' => 'Kaaba', 'Ghar' => 'House', 'Mehal' => 'Palace', 'Madrassa' => 'School', 'Aspatal' => 'Hospital', 'Bazar' => 'Market', 'Pul' => 'Bridge', 'Jail' => 'Prison', 'Qabristan' => 'Graveyard', 'Bagh' => 'Garden', 'Hotel' => 'Hotel', 'Airport' => 'Airport'],
                'modifiers' => ['Purana' => 'Old', 'Naya' => 'New', 'Khubsurat' => 'Beautiful', 'Andhera' => 'Dark', 'Khali' => 'Empty', 'Bara' => 'Big', 'Girta Hua' => 'Falling'],
                'actions' => ['Dekhna' => 'Seeing', 'Dakhil Hona' => 'Entering', 'Bahar Nikalna' => 'Leaving', 'Tameer Karna' => 'Building', 'Saaf Karna' => 'Cleaning', 'Namaz Parhna' => 'Praying in']
            ],
            'mausam' => [ // Weather
                'bases' => ['Barish' => 'Rain', 'Baraf' => 'Snow', 'Hawa' => 'Wind', 'Toofan' => 'Storm', 'Bijli' => 'Lightning', 'Badal' => 'Cloud', 'Suraj' => 'Sun', 'Chand' => 'Moon'],
                'modifiers' => ['Tez' => 'Heavy', 'Halki' => 'Light', 'Kala' => 'Dark', 'Khubsurat' => 'Beautiful', 'Darauna' => 'Scary'],
                'actions' => ['Dekhna' => 'Seeing', 'Garmi Mein Dekhna' => 'In Summer', 'Sardi Mein Dekhna' => 'In Winter', 'Raat Ko Dekhna' => 'At Night', 'Ghar Mein Dekhna' => 'In House']
            ],
            'sawari' => [ // Vehicles
                'bases' => ['Gari' => 'Car', 'Bus' => 'Bus', 'Train' => 'Train', 'Jahaz' => 'Airplane', 'Kashti' => 'Boat', 'Behri Jahaz' => 'Ship', 'Cycle' => 'Bicycle', 'Motorcycle' => 'Motorcycle'],
                'modifiers' => ['Safed' => 'White', 'Kali' => 'Black', 'Lal' => 'Red', 'Tez' => 'Fast', 'Tooti Hui' => 'Broken', 'Nayi' => 'New', 'Purani' => 'Old'],
                'actions' => ['Dekhna' => 'Seeing', 'Chalana' => 'Driving', 'Safar Karna' => 'Riding', 'Accident Dekhna' => 'Crashing', 'Khareedna' => 'Buying', 'Miss Hona' => 'Missing']
            ],
            'shadi' => [ // Marriage
                'bases' => ['Shadi' => 'Wedding', 'Dulhan' => 'Bride', 'Dulha' => 'Groom', 'Talaq' => 'Divorce', 'Nikah' => 'Nikah'],
                'modifiers' => ['Apni' => 'Own', 'Anjaan' => 'Unknown', 'Dost Ki' => 'Friend\'s', 'Behen Ki' => 'Sister\'s', 'Bhai Ki' => 'Brother\'s', 'Zabardasti Ki' => 'Forced', 'Khushi Ki' => 'Happy'],
                'actions' => ['Dekhna' => 'Seeing', 'Mein Shirkat Karna' => 'Attending', 'Tootna' => 'Canceling', 'Mein Rona' => 'Crying at', 'Mein Nachna' => 'Dancing at']
            ],
            'maut-murday' => [ // Death
                'bases' => ['Maut' => 'Dying', 'Murda' => 'Dead Person', 'Qabar' => 'Grave', 'Janaza' => 'Funeral', 'Kafan' => 'Shroud'],
                'modifiers' => ['Apni' => 'Own', 'Walid Ki' => 'Father\'s', 'Walida Ki' => 'Mother\'s', 'Dost Ki' => 'Friend\'s', 'Anjaan Ki' => 'Unknown', 'Bache Ki' => 'Child\'s'],
                'actions' => ['Dekhna' => 'Seeing', 'Par Rona' => 'Crying over', 'Mein Shirkat Karna' => 'Attending', 'Khodna' => 'Digging', 'Namaz Parhna' => 'Praying over']
            ],
            'afaal' => [ // Actions
                'bases' => ['Bhagna' => 'Running', 'Urna' => 'Flying', 'Girna' => 'Falling', 'Rona' => 'Crying', 'Hasna' => 'Laughing', 'Tairna' => 'Swimming', 'Chalna' => 'Walking', 'Sona' => 'Sleeping', 'Khana' => 'Eating', 'Larna' => 'Fighting'],
                'modifiers' => ['Tez' => 'Fast', 'Ahista' => 'Slow', 'Hawa Mein' => 'In Sky', 'Pani Mein' => 'In Water', 'Andhere Mein' => 'In Dark', 'Darte Hue' => 'With Fear', 'Khushi Se' => 'Happily'],
                'actions' => ['Dekhna' => 'Seeing', 'Akele' => 'Alone', 'Kisi Ke Sath' => 'With Someone', 'Janwar Se' => 'From Animal', 'Roshni Ki Taraf' => 'Towards Light']
            ],
            'miscellaneous' => [ // Misc
                'bases' => ['Aag' => 'Fire', 'Saya' => 'Shadow', 'Sheesha' => 'Mirror', 'Ghadi' => 'Clock', 'Chabi' => 'Key', 'Tala' => 'Lock', 'Darwaza' => 'Door', 'Khirki' => 'Window', 'Kitab' => 'Book', 'Qalam' => 'Pen', 'Kaghaz' => 'Paper', 'Churi' => 'Knife', 'Talwar' => 'Sword', 'Bandook' => 'Gun', 'Rassi' => 'Rope', 'Zanjeer' => 'Chain', 'Mitti' => 'Dust', 'Raakh' => 'Ash', 'Dhua' => 'Smoke'],
                'modifiers' => ['Bari' => 'Big', 'Choti' => 'Small', 'Tooti Hui' => 'Broken', 'Nayi' => 'New', 'Purani' => 'Old', 'Sone Ki' => 'Golden', 'Chandi Ki' => 'Silver', 'Lakri Ki' => 'Wooden', 'Lohe Ki' => 'Iron'],
                'actions' => ['Dekhna' => 'Seeing', 'Milna' => 'Finding', 'Gum Hona' => 'Losing', 'Istemal Karna' => 'Using', 'Torna' => 'Breaking', 'Pakarna' => 'Holding']
            ]
        ];

        // Generator logic embedded directly in seeder for performance
        foreach ($rules as $catSlug => $rule) {
            if (!isset($categories[$catSlug])) continue;
            
            $catId = $categories[$catSlug]->id;
            
            foreach ($rule['bases'] as $baseRu => $baseEn) {
                foreach ($rule['modifiers'] as $modRu => $modEn) {
                    foreach ($rule['actions'] as $actRu => $actEn) {
                        
                        $nameRu = trim("$modRu $baseRu $actRu");
                        $nameEn = trim("$modEn $baseEn $actEn");

                        $romanUrduTitle = "Khwab Mein $nameRu";
                        $slug = Str::slug($romanUrduTitle);
                        
                        // Dynamic Interpretation Logic
                        $isNegative = in_array($modRu, ['Kala', 'Kharab', 'Murda', 'Tooti Hui', 'Purani', 'Andhera', 'Darauna', 'Bimari']) || 
                                      in_array($actRu, ['Kaatna', 'Hamla Karte Dekhna', 'Girna', 'Gum Hona', 'Accident Dekhna', 'Tootna', 'Torna']);
                        $isPositive = in_array($modRu, ['Safed', 'Khubsurat', 'Meetha', 'Taza', 'Naya', 'Saaf']) || 
                                      in_array($actRu, ['Milna', 'Khareedna', 'Namaz Parhna']);
                        
                        $symbolism = "Khwab mein $baseRu dekhna aam tor par " . ($isNegative ? "kisi pareshani, dushman, ya aazmaish" : "kamyabi, rizq, ya rahmat") . " ki alamat ho sakta hai.";
                        $modEffect = $modRu ? "$modRu rang ya halat is baat ki nishandahi karti hai ke mamla " . ($isNegative ? "sangeen" : "wazeh aur behtar") . " hai." : "";
                        $actEffect = $actRu != 'Dekhna' ? "Is khwab mein '$actRu' ka amal zahir karta hai ke aane wale waqt mein aap ko amli tor par is situation ka samna karna parh sakta hai." : "";

                        $shortInterp = "Khwab mein $nameRu dekhna islami tabeer ke mutabiq ek " . ($isNegative ? "khabardar karne wala" : "acha") . " ishara hai. $symbolism";
                        
                        $detailedInterp = "<p>Imam Ibn Sirin (R.A) ki tabeerat ki roshni mein, <strong>$romanUrduTitle</strong> ki tabeer khwab dekhne wale ki halat par munhasir hai.</p>";
                        $detailedInterp .= "<p>$symbolism $modEffect $actEffect</p>";
                        $detailedInterp .= "<p>Agar aap ne yeh khwab dekha hai to islami talimat ke mutabiq aap ko " . ($isNegative ? "sadqa dena chahiye aur Allah se panah mangni chahiye" : "Allah ka shukar ada karna chahiye aur neik aamal mein izafa karna chahiye") . ".</p>";

                        $faqs = [
                            ['question' => "Khwab mein $modRu $baseRu ka kya matlab hai?", 'answer' => "Is ka matlab halat aur amal par munhasir hai. Aam tor par yeh " . ($isNegative ? "muhtat rehne" : "khushkhabri") . " ka ishara hai."],
                            ['question' => "Agar koi khwab mein $baseRu $actRu dekhe to kya kare?", 'answer' => "Islami talimat ke mutabiq, acha khwab Allah ki taraf se hota hai aur bura khwab shaitan ki taraf se. " . ($isNegative ? "Bure khwab ke baad sadqa dena afzal hai." : "Ache khwab par Allah ka shukar ada karein.")],
                        ];

                        $scholars = [
                            'Imam Ibn Sirin' => "$baseRu ke bare mein inka manna hai ke yeh rohani halat ya aane wale waqt ki nishandahi hai.",
                            'Abdul Ghani Al-Nabulsi' => "Inke mutabiq, $modRu $baseRu dekhna insan ki niyat aur aamal ki akasi karta hai."
                        ];

                        $positive = $isNegative ? null : json_encode(["Barkat aur Rizq", "Pareshani se nijat", "Dili sukoon"]);
                        $negative = $isPositive ? null : json_encode(["Dushman se khatra", "Pareshaan kun halat", "Sadqa dene ki zaroorat"]);

                        // Contextual Quran/Hadith
                        $quran = null;
                        if (in_array($baseRu, ['Masjid', 'Kaaba', 'Namaz', 'Quran'])) {
                            $quran = json_encode([
                                'verse' => 'Surah Al-Baqarah, 2:153',
                                'arabic' => 'يَا أَيُّهَا الَّذِينَ آمَنُوا اسْتَعِينُوا بِالصَّبْرِ وَالصَّلَاةِ ۚ إِنَّ اللَّهَ مَعَ الصَّابِرِينَ',
                                'urdu_translation' => 'اے ایمان والو! صبر اور نماز کے ذریعے مدد مانگو، بیشک اللہ صبر کرنے والوں کے ساتھ ہے۔'
                            ], JSON_UNESCAPED_UNICODE);
                        }

                        $allDreamsToInsert[] = [
                            'category_id' => $catId,
                            'symbol_english' => $nameEn,
                            'symbol_roman_urdu' => $romanUrduTitle,
                            'symbol_urdu' => $romanUrduTitle, 
                            'slug' => $slug,
                            'short_interpretation' => $shortInterp,
                            'interpretation_urdu' => $shortInterp,
                            'detailed_interpretation_urdu' => $detailedInterp,
                            'positive_meaning' => $positive,
                            'negative_meaning' => $negative,
                            'faqs' => json_encode($faqs, JSON_UNESCAPED_UNICODE),
                            'scholarly_opinions' => json_encode($scholars, JSON_UNESCAPED_UNICODE),
                            'quran_reference' => $quran,
                            'published_status' => 1,
                            'seo_title' => "$romanUrduTitle | Islamic Interpretation",
                            'meta_description' => "$shortInterp Read the Islamic interpretation of seeing $nameEn in a dream.",
                            'canonical_url' => url('/khwabon-ki-tabeer/' . $slug),
                            'dream_type' => $isNegative ? 2 : ($isPositive ? 1 : 0),
                            'search_count' => rand(0, 100),
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                    }
                }
            }
        }

        // Filter out existing slugs
        $existingSlugs = DB::table('dream_symbols')->pluck('slug')->toArray();
        $existingSlugsMap = array_flip($existingSlugs);

        $filteredInserts = [];
        foreach ($allDreamsToInsert as $dream) {
            if (!isset($existingSlugsMap[$dream['slug']])) {
                $filteredInserts[] = $dream;
                $existingSlugsMap[$dream['slug']] = true;
            }
        }

        // Chunk inserts
        $chunks = array_chunk($filteredInserts, 50);
        foreach ($chunks as $chunk) {
            DB::table('dream_symbols')->insert($chunk);
        }
    }
}
