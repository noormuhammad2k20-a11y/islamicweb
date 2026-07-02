import json
import uuid

dreams = [
    {
        "symbol_urdu": "سانپ",
        "symbol_arabic": "ثعبان",
        "symbol_english": "Snake",
        "short_interpretation": "سانپ خواب میں عموماً چھپے ہوئے دشمن کی علامت ہے۔",
        "detailed_interpretation_urdu": "ابن سیرین کے مطابق، خواب میں سانپ دیکھنا ایک ایسے دشمن کی طرف اشارہ ہے جو اپنی دشمنی چھپاتا ہے۔ اگر سانپ بڑا ہے تو دشمن بھی طاقتور ہوگا۔ اگر سانپ کو مار دیا تو اس کا مطلب ہے کہ دشمن پر فتح حاصل ہوگی۔",
        "detailed_interpretation_english": "According to Ibn Sirin, seeing a snake in a dream represents a hidden enemy. A large snake indicates a powerful enemy. Killing the snake means overcoming the enemy.",
        "scholar_reference": "Imam Ibn Sirin",
        "source_book": "Ta'beer al-Ru'ya",
        "dream_type": 3,
        "keywords": ["snake", "enemy", "danger", "saanp"],
        "search_keywords": "saanp, snake, saap, dushman",
        "seo_title": "خواب میں سانپ دیکھنا - تعبیر الرؤیا",
        "meta_description": "خواب میں سانپ دیکھنے کی مستند اسلامی تعبیر، ابن سیرین کے حوالے سے۔"
    },
    {
        "symbol_urdu": "پانی",
        "symbol_arabic": "ماء",
        "symbol_english": "Water",
        "short_interpretation": "صاف پانی دیکھنا خوشحالی اور نیک زندگی کی علامت ہے۔",
        "detailed_interpretation_urdu": "خواب میں صاف اور شفاف پانی پینا یا دیکھنا حلال رزق، صحت، اور خوشگوار زندگی کی علامت ہے۔ گدلا پانی بیماری یا پریشانی کی طرف اشارہ کرتا ہے۔",
        "detailed_interpretation_english": "Seeing or drinking clear water in a dream symbolizes lawful wealth, health, and a happy life. Muddy water indicates sickness or distress.",
        "scholar_reference": "Imam Ibn Sirin",
        "source_book": "Ta'beer al-Ru'ya",
        "dream_type": 1,
        "keywords": ["water", "life", "wealth", "pani"],
        "search_keywords": "pani, water, saaf pani, zindagi",
        "seo_title": "خواب میں پانی دیکھنا - تعبیر",
        "meta_description": "خواب میں صاف یا گدلا پانی دیکھنے کی اسلامی تعبیر۔"
    },
    {
        "symbol_urdu": "اڑنا",
        "symbol_arabic": "طيران",
        "symbol_english": "Flying",
        "short_interpretation": "خواب میں اڑنا سفر یا بلند مرتبہ پانے کی علامت ہے۔",
        "detailed_interpretation_urdu": "جو شخص خواب میں دیکھے کہ وہ اڑ رہا ہے، تو یہ سفر، حج، یا معاشرے میں بلند مقام حاصل کرنے کی نشانی ہے۔ پروں کے ساتھ اڑنا زیادہ بہتر تصور کیا جاتا ہے۔",
        "detailed_interpretation_english": "Flying in a dream signifies travel, Hajj, or attaining a high status in society. Flying with wings is considered even more auspicious.",
        "scholar_reference": "Ibn Shaheen",
        "source_book": "Al-Isharat",
        "dream_type": 1,
        "keywords": ["flying", "travel", "status", "urna"],
        "search_keywords": "urna, udna, flying, hawa mein, safar",
        "seo_title": "خواب میں ہوا میں اڑنا",
        "meta_description": "ہوا میں اڑنے کی اسلامی تعبیر ابن شاہین کی روشنی میں۔"
    },
    {
        "symbol_urdu": "دانت ٹوٹنا",
        "symbol_arabic": "سقوط الأسنان",
        "symbol_english": "Teeth Falling",
        "short_interpretation": "دانت گرنا عموماً خاندان کے کسی فرد کی بیماری یا عمر کی طوالت سے تعبیر کیا جاتا ہے۔",
        "detailed_interpretation_urdu": "ابن سیرین کا ماننا ہے کہ اوپر کے دانت مرد رشتہ دار اور نیچے کے دانت عورت رشتہ دار ہوتے ہیں۔ اگر خواب میں دانت بغیر درد کے گریں تو عمر لمبی ہونے کی علامت ہے، درد کے ساتھ گریں تو کسی نقصان کا اندیشہ ہے۔",
        "detailed_interpretation_english": "Ibn Sirin considers upper teeth as male relatives and lower teeth as female relatives. Painless falling teeth may signify long life, while painful ones suggest a loss.",
        "scholar_reference": "Imam Ibn Sirin",
        "source_book": "Ta'beer al-Ru'ya",
        "dream_type": 2,
        "keywords": ["teeth", "falling", "family", "daant"],
        "search_keywords": "daant, teeth, girna, tootna, family",
        "seo_title": "خواب میں دانت ٹوٹنا یا گرنا",
        "meta_description": "دانت ٹوٹنے کے خواب کی مستند اور مفصل اسلامی تعبیر۔"
    },
    {
        "symbol_urdu": "شیر",
        "symbol_arabic": "أسد",
        "symbol_english": "Lion",
        "short_interpretation": "شیر ظالم حکمران یا طاقتور دشمن کی نمائندگی کرتا ہے۔",
        "detailed_interpretation_urdu": "شیر کا نظر آنا عموماً کسی جابر بادشاہ یا طاقتور دشمن کی طرف اشارہ ہے۔ شیر سے لڑنا دشمن سے لڑنے کے مترادف ہے۔",
        "detailed_interpretation_english": "A lion typically represents an oppressive ruler or a powerful enemy. Fighting a lion is akin to battling such an enemy.",
        "scholar_reference": "Abdul Ghani al-Nabulsi",
        "source_book": "Ta'tir al-Anam",
        "dream_type": 3,
        "keywords": ["lion", "power", "ruler", "sher"],
        "search_keywords": "sher, lion, babbar sher, badshah",
        "seo_title": "خواب میں شیر دیکھنا",
        "meta_description": "شیر کو خواب میں دیکھنے کی مکمل اور مستند تعبیر۔"
    },
    {
        "symbol_urdu": "آگ",
        "symbol_arabic": "نار",
        "symbol_english": "Fire",
        "short_interpretation": "آگ فتنے، عذاب یا بعض اوقات رہنمائی کی علامت ہے۔",
        "detailed_interpretation_urdu": "اگر آگ سے نقصان ہو رہا ہو تو یہ فتنے اور جنگ کی علامت ہے۔ اگر آگ روشنی دے رہی ہو تو یہ علم اور رہنمائی کی علامت ہے۔",
        "detailed_interpretation_english": "Destructive fire signifies fitnah (strife) and war. Illuminating fire, however, symbolizes knowledge and guidance.",
        "scholar_reference": "Imam Ibn Sirin",
        "source_book": "Ta'beer al-Ru'ya",
        "dream_type": 3,
        "keywords": ["fire", "strife", "guidance", "aag"],
        "search_keywords": "aag, fire, fassad, roshni",
        "seo_title": "خواب میں آگ دیکھنا",
        "meta_description": "خواب میں آگ دیکھنے کی مختلف حالتوں میں تعبیر۔"
    },
    {
        "symbol_urdu": "سونا (دھات)",
        "symbol_arabic": "ذهب",
        "symbol_english": "Gold",
        "short_interpretation": "سونا مردوں کے لیے عموماً پریشانی اور عورتوں کے لیے زینت ہے۔",
        "detailed_interpretation_urdu": "ابن سیرین کے نزدیک سونا (دھات) خواب میں مردوں کے لیے غم اور پریشانی کی علامت ہے، جب کہ عورتوں کے لیے یہ خوشی اور زینت کی نشانی ہے۔",
        "detailed_interpretation_english": "According to Ibn Sirin, gold in a dream for men signifies sorrow and distress, while for women it denotes joy and adornment.",
        "scholar_reference": "Imam Ibn Sirin",
        "source_book": "Ta'beer al-Ru'ya",
        "dream_type": 2,
        "keywords": ["gold", "wealth", "sorrow", "sona"],
        "search_keywords": "sona, gold, daulat, zewar",
        "seo_title": "خواب میں سونا (Gold) دیکھنا",
        "meta_description": "مردوں اور عورتوں کے لیے خواب میں سونا دیکھنے کی الگ الگ تعبیرات۔"
    },
    {
        "symbol_urdu": "کتا",
        "symbol_arabic": "كلب",
        "symbol_english": "Dog",
        "short_interpretation": "کتا عموماً ایک بیوقوف لیکن وفادار دشمن کی علامت ہے۔",
        "detailed_interpretation_urdu": "خواب میں کتا دیکھنا ایک ایسے دشمن کو ظاہر کرتا ہے جو کمزور ہے، مگر نقصان پہنچانے کی کوشش کر سکتا ہے۔ کتے کا بھونکنا دشمن کی طرف سے بری باتیں سننے کی علامت ہے۔",
        "detailed_interpretation_english": "A dog in a dream generally represents a foolish but potentially harmful enemy. A barking dog means hearing bad words from an enemy.",
        "scholar_reference": "Ibn Shaheen",
        "source_book": "Al-Isharat",
        "dream_type": 3,
        "keywords": ["dog", "enemy", "foolish", "kutta"],
        "search_keywords": "kutta, dog, dushman",
        "seo_title": "خواب میں کتا دیکھنا",
        "meta_description": "خواب میں کتے کے بھونکنے اور کاٹنے کی مستند اسلامی تعبیر۔"
    },
    {
        "symbol_urdu": "بارش",
        "symbol_arabic": "مطر",
        "symbol_english": "Rain",
        "short_interpretation": "بارش رحمت اور برکت کی علامت ہے، بشرطیکہ وہ نقصان دہ نہ ہو۔",
        "detailed_interpretation_urdu": "اگر خواب میں عام بارش ہو جس سے لوگوں کو فائدہ ہو، تو یہ اللہ کی رحمت، رزق اور سلامتی کی نشانی ہے۔ اگر بارش سے سیلاب آئے یا نقصان ہو، تو یہ عذاب کی علامت ہو سکتی ہے۔",
        "detailed_interpretation_english": "General, beneficial rain in a dream represents Allah's mercy, provision, and peace. Destructive rain or floods may signify divine punishment or hardship.",
        "scholar_reference": "Imam Ibn Sirin",
        "source_book": "Ta'beer al-Ru'ya",
        "dream_type": 1,
        "keywords": ["rain", "mercy", "blessing", "barish"],
        "search_keywords": "barish, rain, rehmat, badal",
        "seo_title": "خواب میں بارش کا دیکھنا",
        "meta_description": "رحمت یا زحمت؟ خواب میں بارش دیکھنے کی مفصل اسلامی تعبیر۔"
    },
    {
        "symbol_urdu": "گھر بنانا",
        "symbol_arabic": "بناء بيت",
        "symbol_english": "Building a House",
        "short_interpretation": "نیا گھر بنانا دنیاوی اور اخروی کامیابیوں کی طرف اشارہ ہے۔",
        "detailed_interpretation_urdu": "جو شخص خواب میں نیا گھر بنائے، اگر وہ بیمار ہے تو شفاء پائے گا، اور اگر غیر شادی شدہ ہے تو شادی کرے گا۔ یہ اعمالِ صالحہ کی بھی علامت ہے۔",
        "detailed_interpretation_english": "Building a new house indicates worldly and spiritual success. For the sick, it means healing; for the unmarried, marriage. It also signifies righteous deeds.",
        "scholar_reference": "Abdul Ghani al-Nabulsi",
        "source_book": "Ta'tir al-Anam",
        "dream_type": 1,
        "keywords": ["house", "building", "success", "ghar"],
        "search_keywords": "ghar, makaan, house, banana, tameer",
        "seo_title": "خواب میں گھر بنانا",
        "meta_description": "خواب میں نئے گھر کی تعمیر کی حیرت انگیز اور مستند تعبیر۔"
    }
]

# Generate more varied entries programmatically to reach ~15000 records for testing
import copy

base_dreams = dreams.copy()
all_dreams = []
for i in range(1500): # Duplicate and modify slightly to create 15000 entries
    for d in base_dreams:
        new_d = copy.deepcopy(d)
        if i > 0:
            new_d['symbol_urdu'] = f"{d['symbol_urdu']} (قسم {i+1})"
            new_d['symbol_english'] = f"{d['symbol_english']} (Type {i+1})"
            new_d['seo_title'] = f"{d['seo_title']} {i+1}"
            
        all_dreams.append(new_d)

with open('bulk_dreams.json', 'w', encoding='utf-8') as f:
    json.dump(all_dreams, f, ensure_ascii=False, indent=4)

print(f"Generated {len(all_dreams)} dreams in bulk_dreams.json")
