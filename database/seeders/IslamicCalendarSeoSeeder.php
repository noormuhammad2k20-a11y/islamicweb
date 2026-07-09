<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IslamicYearEvent;
use App\Models\CityIslamicContent;
use App\Models\IslamicMonthContent;
use App\Models\City;

class IslamicCalendarSeoSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedYearEvents();
        $this->seedCityContent();
        $this->seedMonthContent();
    }

    private function seedYearEvents(): void
    {
        IslamicYearEvent::truncate();

        $events = [
            // 2026 Events
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Islamic New Year (1 Muharram)', 'event_name_urdu' => 'اسلامی نیا سال', 'hijri_date' => '1 Muharram 1448', 'gregorian_date' => '2026-06-27', 'event_type' => 'muharram', 'description' => 'The Islamic New Year marks the beginning of the new Hijri year 1448.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Day of Ashura', 'event_name_urdu' => 'یوم عاشورہ', 'hijri_date' => '10 Muharram 1448', 'gregorian_date' => '2026-07-06', 'event_type' => 'muharram', 'description' => 'Ashura commemorates the martyrdom of Imam Hussain (RA) at Karbala. Fasting on this day is highly recommended.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Start of Ramadan', 'event_name_urdu' => 'رمضان المبارک شروع', 'hijri_date' => '1 Ramadan 1447', 'gregorian_date' => '2026-02-28', 'event_type' => 'ramadan', 'description' => 'The blessed month of Ramadan begins. Muslims fast from dawn to sunset for 29-30 days.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Laylatul Qadr (Night of Power)', 'event_name_urdu' => 'شب قدر', 'hijri_date' => '27 Ramadan 1447', 'gregorian_date' => '2026-03-25', 'event_type' => 'ramadan', 'description' => 'The Night of Power is better than a thousand months. It falls in the last 10 nights of Ramadan.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Eid ul-Fitr', 'event_name_urdu' => 'عید الفطر', 'hijri_date' => '1 Shawwal 1447', 'gregorian_date' => '2026-03-30', 'event_type' => 'eid', 'description' => 'Eid ul-Fitr marks the end of Ramadan fasting. Muslims celebrate with prayers, charity, and family gatherings.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Eid ul-Adha', 'event_name_urdu' => 'عید الاضحٰی', 'hijri_date' => '10 Dhu al-Hijjah 1447', 'gregorian_date' => '2026-06-06', 'event_type' => 'eid', 'description' => 'Eid ul-Adha commemorates Prophet Ibrahim (AS) sacrifice. Muslims sacrifice animals and distribute meat.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Hajj Season', 'event_name_urdu' => 'حج کا موسم', 'hijri_date' => '8-13 Dhu al-Hijjah 1447', 'gregorian_date' => '2026-06-04', 'event_type' => 'hajj', 'description' => 'Annual Hajj pilgrimage to Makkah. The fifth pillar of Islam.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Eid Milad-un-Nabi', 'event_name_urdu' => 'عید میلاد النبی ﷺ', 'hijri_date' => '12 Rabi al-Awwal 1447', 'gregorian_date' => '2026-09-06', 'event_type' => 'other', 'description' => 'Birth anniversary of Prophet Muhammad (PBUH). Celebrated with prayers and gatherings.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Shab-e-Meraj', 'event_name_urdu' => 'شب معراج', 'hijri_date' => '27 Rajab 1447', 'gregorian_date' => '2026-01-26', 'event_type' => 'other', 'description' => 'Night of Ascension — Prophet Muhammad (PBUH) ascended to the heavens.'],
            ['hijri_year' => 1447, 'gregorian_year' => 2026, 'event_name' => 'Shab-e-Barat', 'event_name_urdu' => 'شب برات', 'hijri_date' => '15 Shaban 1447', 'gregorian_date' => '2026-02-12', 'event_type' => 'other', 'description' => 'Night of Forgiveness — Muslims pray for forgiveness and blessings.'],

            // 2025 Events
            ['hijri_year' => 1446, 'gregorian_year' => 2025, 'event_name' => 'Start of Ramadan 2025', 'event_name_urdu' => 'رمضان المبارک ۲۰۲۵', 'hijri_date' => '1 Ramadan 1446', 'gregorian_date' => '2025-03-01', 'event_type' => 'ramadan', 'description' => 'Ramadan 2025 began around March 1, 2025.'],
            ['hijri_year' => 1446, 'gregorian_year' => 2025, 'event_name' => 'Eid ul-Fitr 2025', 'event_name_urdu' => 'عید الفطر ۲۰۲۵', 'hijri_date' => '1 Shawwal 1446', 'gregorian_date' => '2025-03-30', 'event_type' => 'eid', 'description' => 'Eid ul-Fitr 2025 was celebrated on March 30, 2025.'],
            ['hijri_year' => 1446, 'gregorian_year' => 2025, 'event_name' => 'Eid ul-Adha 2025', 'event_name_urdu' => 'عید الاضحٰی ۲۰۲۵', 'hijri_date' => '10 Dhu al-Hijjah 1446', 'gregorian_date' => '2025-06-07', 'event_type' => 'eid', 'description' => 'Eid ul-Adha 2025 was on June 7, 2025.'],

            // 2024 Events
            ['hijri_year' => 1445, 'gregorian_year' => 2024, 'event_name' => 'Start of Ramadan 2024', 'event_name_urdu' => 'رمضان المبارک ۲۰۲۴', 'hijri_date' => '1 Ramadan 1445', 'gregorian_date' => '2024-03-12', 'event_type' => 'ramadan', 'description' => 'Ramadan 2024 began on March 12, 2024.'],
            ['hijri_year' => 1445, 'gregorian_year' => 2024, 'event_name' => 'Eid ul-Fitr 2024', 'event_name_urdu' => 'عید الفطر ۲۰۲۴', 'hijri_date' => '1 Shawwal 1445', 'gregorian_date' => '2024-04-10', 'event_type' => 'eid', 'description' => 'Eid ul-Fitr 2024 was celebrated on April 10, 2024.'],
            ['hijri_year' => 1445, 'gregorian_year' => 2024, 'event_name' => 'Eid ul-Adha 2024', 'event_name_urdu' => 'عید الاضحٰی ۲۰۲۴', 'hijri_date' => '10 Dhu al-Hijjah 1445', 'gregorian_date' => '2024-06-17', 'event_type' => 'eid', 'description' => 'Eid ul-Adha 2024 was on June 17, 2024.'],

            // 2023 Events
            ['hijri_year' => 1444, 'gregorian_year' => 2023, 'event_name' => 'Start of Ramadan 2023', 'event_name_urdu' => 'رمضان المبارک ۲۰۲۳', 'hijri_date' => '1 Ramadan 1444', 'gregorian_date' => '2023-03-23', 'event_type' => 'ramadan', 'description' => 'Ramadan 2023 began on March 23, 2023.'],
            ['hijri_year' => 1444, 'gregorian_year' => 2023, 'event_name' => 'Eid ul-Fitr 2023', 'event_name_urdu' => 'عید الفطر ۲۰۲۳', 'hijri_date' => '1 Shawwal 1444', 'gregorian_date' => '2023-04-22', 'event_type' => 'eid', 'description' => 'Eid ul-Fitr 2023 was celebrated on April 22, 2023.'],
            ['hijri_year' => 1444, 'gregorian_year' => 2023, 'event_name' => 'Eid ul-Adha 2023', 'event_name_urdu' => 'عید الاضحٰی ۲۰۲۳', 'hijri_date' => '10 Dhu al-Hijjah 1444', 'gregorian_date' => '2023-06-29', 'event_type' => 'eid', 'description' => 'Eid ul-Adha 2023 was on June 29, 2023.'],

            // 2019 Events
            ['hijri_year' => 1440, 'gregorian_year' => 2019, 'event_name' => 'Start of Ramadan 2019', 'event_name_urdu' => 'رمضان المبارک ۲۰۱۹', 'hijri_date' => '1 Ramadan 1440', 'gregorian_date' => '2019-05-06', 'event_type' => 'ramadan', 'description' => 'Ramadan 2019 began on May 6, 2019.'],
            ['hijri_year' => 1440, 'gregorian_year' => 2019, 'event_name' => 'Eid ul-Fitr 2019', 'event_name_urdu' => 'عید الفطر ۲۰۱۹', 'hijri_date' => '1 Shawwal 1440', 'gregorian_date' => '2019-06-05', 'event_type' => 'eid', 'description' => 'Eid ul-Fitr 2019 was celebrated on June 5, 2019.'],
            ['hijri_year' => 1440, 'gregorian_year' => 2019, 'event_name' => 'Eid ul-Adha 2019', 'event_name_urdu' => 'عید الاضحٰی ۲۰۱۹', 'hijri_date' => '10 Dhu al-Hijjah 1440', 'gregorian_date' => '2019-08-12', 'event_type' => 'eid', 'description' => 'Eid ul-Adha 2019 was on August 12, 2019.'],

            // 2018 Events
            ['hijri_year' => 1439, 'gregorian_year' => 2018, 'event_name' => 'Start of Ramadan 2018', 'event_name_urdu' => 'رمضان المبارک ۲۰۱۸', 'hijri_date' => '1 Ramadan 1439', 'gregorian_date' => '2018-05-16', 'event_type' => 'ramadan', 'description' => 'Ramadan 2018 began on May 16, 2018.'],
            ['hijri_year' => 1439, 'gregorian_year' => 2018, 'event_name' => 'Eid ul-Fitr 2018', 'event_name_urdu' => 'عید الفطر ۲۰۱۸', 'hijri_date' => '1 Shawwal 1439', 'gregorian_date' => '2018-06-15', 'event_type' => 'eid', 'description' => 'Eid ul-Fitr 2018 was celebrated on June 15, 2018.'],
            ['hijri_year' => 1439, 'gregorian_year' => 2018, 'event_name' => 'Eid ul-Adha 2018', 'event_name_urdu' => 'عید الاضحٰی ۲۰۱۸', 'hijri_date' => '10 Dhu al-Hijjah 1439', 'gregorian_date' => '2018-08-22', 'event_type' => 'eid', 'description' => 'Eid ul-Adha 2018 was on August 22, 2018.'],
        ];

        foreach ($events as $event) {
            IslamicYearEvent::create($event);
        }

        // Generate events for 2027 - 2036 dynamically
        for ($hy = 1448; $hy <= 1459; $hy++) {
            $this->createDynamicEventsForYear($hy);
        }
    }

    private function createDynamicEventsForYear(int $hy): void
    {
        $eventsData = [];

        // 1 Muharram - Islamic New Year
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(1, 1, $hy);
        $gy = $greg->format('Y');
        if ($gy > 2036) return;

        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Islamic New Year', 'event_name_urdu' => 'اسلامی نیا سال',
            'hijri_date' => "1 Muharram $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'muharram',
            'description' => "The Islamic New Year marks the beginning of the new Hijri year $hy."
        ];

        // 10 Muharram - Ashura
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(10, 1, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Day of Ashura', 'event_name_urdu' => 'یوم عاشورہ',
            'hijri_date' => "10 Muharram $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'muharram',
            'description' => 'Ashura commemorates the martyrdom of Imam Hussain (RA) at Karbala.'
        ];

        // 12 Rabi al-Awwal - Eid Milad-un-Nabi
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(12, 3, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Eid Milad-un-Nabi', 'event_name_urdu' => 'عید میلاد النبی ﷺ',
            'hijri_date' => "12 Rabi al-Awwal $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'other',
            'description' => 'Birth anniversary of Prophet Muhammad (PBUH).'
        ];

        // 27 Rajab - Shab-e-Meraj
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(27, 7, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Shab-e-Meraj', 'event_name_urdu' => 'شب معراج',
            'hijri_date' => "27 Rajab $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'other',
            'description' => 'Night of Ascension — Prophet Muhammad (PBUH) ascended to the heavens.'
        ];

        // 15 Shaban - Shab-e-Barat
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(15, 8, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Shab-e-Barat', 'event_name_urdu' => 'شب برات',
            'hijri_date' => "15 Shaban $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'other',
            'description' => 'Night of Forgiveness — Muslims pray for forgiveness and blessings.'
        ];

        // 1 Ramadan - Start of Ramadan
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(1, 9, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => "Start of Ramadan $gy", 'event_name_urdu' => "رمضان المبارک شروع",
            'hijri_date' => "1 Ramadan $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'ramadan',
            'description' => "The blessed month of Ramadan begins."
        ];

        // 27 Ramadan - Laylatul Qadr
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(27, 9, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Laylatul Qadr (Night of Power)', 'event_name_urdu' => 'شب قدر',
            'hijri_date' => "27 Ramadan $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'ramadan',
            'description' => 'The Night of Power is better than a thousand months.'
        ];

        // 1 Shawwal - Eid ul-Fitr
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(1, 10, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => "Eid ul-Fitr $gy", 'event_name_urdu' => "عید الفطر $gy",
            'hijri_date' => "1 Shawwal $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'eid',
            'description' => "Eid ul-Fitr marks the end of Ramadan fasting."
        ];

        // 8 Dhu al-Hijjah - Hajj Season
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(8, 12, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => 'Hajj Season', 'event_name_urdu' => 'حج کا موسم',
            'hijri_date' => "8-13 Dhu al-Hijjah $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'hajj',
            'description' => 'Annual Hajj pilgrimage to Makkah. The fifth pillar of Islam.'
        ];

        // 10 Dhu al-Hijjah - Eid ul-Adha
        $greg = \GeniusTS\HijriDate\Hijri::convertToGregorian(10, 12, $hy);
        $eventsData[] = [
            'hijri_year' => $hy, 'gregorian_year' => $gy, 'event_name' => "Eid ul-Adha $gy", 'event_name_urdu' => "عید الاضحٰی $gy",
            'hijri_date' => "10 Dhu al-Hijjah $hy", 'gregorian_date' => $greg->format('Y-m-d'), 'event_type' => 'eid',
            'description' => "Eid ul-Adha commemorates Prophet Ibrahim (AS) sacrifice."
        ];

        foreach ($eventsData as $event) {
            IslamicYearEvent::create($event);
        }
    }

    private function seedCityContent(): void
    {
        CityIslamicContent::truncate();

        $cities = [
            ['city_name' => 'Karachi', 'city_slug' => 'karachi',
             'islamic_history' => 'Karachi, Pakistan\'s largest city and economic hub, has a rich Islamic heritage dating back centuries. The city is home to numerous historical mosques including the iconic Masjid-e-Tooba, one of the largest single-dome mosques in the world. Karachi\'s Islamic history intertwines with the spread of Islam through Sindh, beginning with Muhammad bin Qasim\'s arrival in 712 CE. The city hosts major Islamic educational institutions including Darul Uloom Karachi and Jamia Binoria. During Ramadan, Karachi transforms with illuminated streets and bustling iftar markets. The Memon, Bohra, and Ismaili communities contribute to Karachi\'s diverse Islamic culture. The city\'s Clifton beach area features the famous Abdullah Shah Ghazi shrine, one of Pakistan\'s most visited Sufi shrines.',
             'famous_mosques' => json_encode(['Masjid-e-Tooba', 'Memon Masjid', 'Faisal Mosque Clifton', 'Jamia Masjid Baitul Mukarram', 'Defence Mosque', 'Bhains Colony Grand Mosque']),
             'local_events' => 'Karachi hosts grand Milad processions on 12 Rabi ul-Awwal, massive Muharram processions through MA Jinnah Road, and city-wide Ramadan charity drives. The Sindh government organizes annual Shan-e-Rehmatul-lil-Aalameen conferences.',
             'meta_title' => 'Islamic Date Today in Karachi | Hijri Date Karachi Pakistan',
             'meta_description' => 'Today Islamic date in Karachi Pakistan. Exact Hijri date, famous mosques, Islamic history of Karachi.'],

            ['city_name' => 'Lahore', 'city_slug' => 'lahore',
             'islamic_history' => 'Lahore, the cultural heart of Pakistan, is steeped in Islamic civilization spanning over a millennium. The Mughal Empire transformed Lahore into one of the most magnificent Islamic cities in the world. Emperor Akbar, Jahangir, Shah Jahan, and Aurangzeb all contributed to Lahore\'s Islamic architectural splendor. The Badshahi Mosque, built by Aurangzeb in 1673, was the world\'s largest mosque for nearly 300 years. The Shalimar Gardens, a UNESCO World Heritage Site, reflect Islamic garden design principles. Lahore\'s Walled City (Androon Lahore) contains dozens of historic mosques, havelis, and Sufi shrines. The Data Darbar shrine of Hazrat Ali Hujwiri (Data Ganj Bakhsh) is one of the most revered Sufi shrines in South Asia, attracting millions of visitors annually.',
             'famous_mosques' => json_encode(['Badshahi Mosque', 'Masjid Wazir Khan', 'Sunehri Masjid', 'Moti Masjid (Lahore Fort)', 'Grand Jamia Masjid Bahria Town', 'Masjid Shuhada']),
             'local_events' => 'Lahore hosts Pakistan\'s largest Eid Milad-un-Nabi celebrations, grand Muharram processions through the Walled City, and massive Data Darbar annual Urs gatherings. The Punjab government organizes Seerat conferences and Quran exhibitions.',
             'meta_title' => 'Islamic Date Today in Lahore | Hijri Date Lahore Pakistan',
             'meta_description' => 'Today Islamic date in Lahore Pakistan. Hijri date, Badshahi Mosque, Islamic history of Lahore.'],

            ['city_name' => 'Islamabad', 'city_slug' => 'islamabad',
             'islamic_history' => 'Islamabad, Pakistan\'s capital since 1967, is a modern city built with Islamic principles in mind. The Faisal Mosque, designed by Turkish architect Vedat Dalokay, is an iconic symbol of Pakistan and one of the largest mosques in the world with a capacity of 300,000 worshippers. The mosque\'s tent-like design, inspired by a Bedouin tent in the desert, was funded by King Faisal of Saudi Arabia. Islamabad is home to the International Islamic University (IIU), one of the premier Islamic educational institutions in the Muslim world. The city hosts the headquarters of the Central Ruet-e-Hilal Committee, which officially determines Islamic dates for all of Pakistan. The Margalla Hills surrounding Islamabad contain several historic Islamic sites and trails.',
             'famous_mosques' => json_encode(['Faisal Mosque', 'Lal Masjid', 'Centaurus Mall Mosque', 'Shah Faisal Mosque', 'Abu Bakar Mosque F-8', 'Masjid-e-Nabawi Replica']),
             'local_events' => 'Islamabad hosts the Central Ruet-e-Hilal Committee meetings for moon sighting, national Seerat-un-Nabi conferences at Convention Center, and Faisal Mosque Taraweeh prayers attended by thousands during Ramadan.',
             'meta_title' => 'Islamic Date Today in Islamabad | Hijri Date Islamabad Pakistan',
             'meta_description' => 'Today Islamic date in Islamabad. Faisal Mosque, Islamic University, official moon sighting committee.'],

            ['city_name' => 'Rawalpindi', 'city_slug' => 'rawalpindi',
             'islamic_history' => 'Rawalpindi, the twin city of Islamabad, has deep Islamic roots dating back to the early spread of Islam in the Punjab region. The city is home to historic mosques from the Mughal and Sikh periods, many of which have been restored. Rawalpindi Cantt area contains several colonial-era mosques built during the British Raj. The city\'s Raja Bazaar is one of the oldest marketplaces in Pakistan, featuring traditional Islamic architecture and old mosques. Rawalpindi has historically been a center of Islamic learning in northern Punjab, with numerous madrasas and Islamic schools. The Pir Meher Ali Shah University and Arid Agriculture University have departments dedicated to Islamic studies.',
             'famous_mosques' => json_encode(['Jamia Masjid Rawalpindi', 'Markazi Jamia Masjid', 'Fawara Chowk Mosque', 'Liaquat Bagh Mosque', 'Satellite Town Grand Mosque', 'Rawalpindi Cantt Mosque']),
             'local_events' => 'Rawalpindi hosts joint Muharram processions with Islamabad, Eid prayers at Liaquat Bagh grounds, and Milad rallies through Raja Bazaar and Committee Chowk.',
             'meta_title' => 'Islamic Date Today in Rawalpindi | Hijri Date Rawalpindi',
             'meta_description' => 'Today Islamic date in Rawalpindi. Historic mosques, Islamic heritage of Rawalpindi Pakistan.'],

            ['city_name' => 'Faisalabad', 'city_slug' => 'faisalabad',
             'islamic_history' => 'Faisalabad, formerly Lyallpur, is Pakistan\'s third-largest city and a major industrial center with a vibrant Islamic culture. The city was planned in the early 20th century with a distinctive clock tower (Ghanta Ghar) at its center, around which eight bazaars radiate — reflecting the Union Jack design adapted with Islamic marketplace principles. Faisalabad is home to the University of Agriculture, which has been recognized for Islamic agricultural research. The city\'s textile industry, the backbone of Pakistan\'s economy, operates with Islamic business ethics observed by most traders. Faisalabad hosts numerous Islamic educational institutions and is known for producing Islamic scholars from its many madrasas throughout the Punjab region.',
             'famous_mosques' => json_encode(['Grand Jamia Mosque Faisalabad', 'Masjid-e-Shuhada', 'Ghanta Ghar Area Mosque', 'Peoples Colony Mosque', 'D-Ground Grand Mosque', 'Madina Town Central Mosque']),
             'local_events' => 'Faisalabad hosts massive Eid bazaars around Ghanta Ghar, Ramadan food distribution drives by the textile industry, and annual Islamic book fairs at local universities.',
             'meta_title' => 'Islamic Date Today in Faisalabad | Hijri Date Faisalabad',
             'meta_description' => 'Today Islamic date in Faisalabad. Islamic culture, mosques, and Hijri date in Faisalabad Pakistan.'],

            ['city_name' => 'Peshawar', 'city_slug' => 'peshawar',
             'islamic_history' => 'Peshawar, the capital of Khyber Pakhtunkhwa, is one of the oldest cities in South Asia with Islamic history dating to the earliest Muslim conquests. The city served as a gateway for Islam into the Indian subcontinent, with Mahmud of Ghazni passing through in the 11th century. Peshawar\'s historic Qissa Khwani Bazaar (Storytellers\' Market) has been a meeting point for Islamic scholars and traders for centuries. The Mahabat Khan Mosque, built in 1630 during the Mughal era, is one of the most beautiful mosques in Pakistan with its intricate frescoes and marble inlay work. Peshawar is also known for its strong Pashtun Islamic traditions, tribal customs rooted in Islamic values, and as a center for Deobandi and other Islamic scholarly movements.',
             'famous_mosques' => json_encode(['Mahabat Khan Mosque', 'Sunehri Mosque Peshawar', 'Shahi Mosque', 'Mohabat Khan Masjid', 'Peshawar Cantt Mosque', 'Hayatabad Grand Mosque']),
             'local_events' => 'Peshawar celebrates Eid with grand communal prayers at historic grounds, hosts Pashtun cultural-Islamic festivals, and organizes massive charity drives during Ramadan through the tribal areas.',
             'meta_title' => 'Islamic Date Today in Peshawar | Hijri Date Peshawar',
             'meta_description' => 'Today Islamic date in Peshawar KPK. Mahabat Khan Mosque, Islamic history of Peshawar Pakistan.'],

            ['city_name' => 'Quetta', 'city_slug' => 'quetta',
             'islamic_history' => 'Quetta, the capital of Balochistan, holds a unique place in Islamic history as a gateway between Central Asia and the Indian subcontinent. The region surrounding Quetta was part of ancient trade routes that facilitated the spread of Islam. Quetta is home to diverse Muslim communities including Pashtuns, Baloch, Hazara, and Brahui peoples, each contributing their own Islamic cultural traditions. The city\'s Hazara Town area contains beautiful mosques reflecting Central Asian Islamic architecture. Quetta\'s proximity to Afghanistan and Iran means it has been influenced by multiple Islamic traditions. The Balochistan province has numerous ancient Islamic sites and shrines that attract pilgrims. Islamic education in Quetta includes both modern universities with Islamic studies departments and traditional madrasas.',
             'famous_mosques' => json_encode(['Jamia Masjid Quetta', 'Hazara Town Grand Mosque', 'Jinnah Road Central Mosque', 'Quetta Cantt Mosque', 'Satellite Town Mosque', 'Brewery Road Mosque']),
             'local_events' => 'Quetta hosts multi-ethnic Eid celebrations reflecting Baloch, Pashtun, and Hazara traditions, Muharram commemorations, and interfaith Islamic gatherings during Shab-e-Barat.',
             'meta_title' => 'Islamic Date Today in Quetta | Hijri Date Quetta Balochistan',
             'meta_description' => 'Today Islamic date in Quetta Balochistan. Islamic heritage, mosques, and Hijri date Quetta Pakistan.'],

            ['city_name' => 'Multan', 'city_slug' => 'multan',
             'islamic_history' => 'Multan, known as the "City of Saints" (Madinatul Auliya), is one of the most significant Islamic cities in South Asia. The city has been a center of Sufi Islam for over a millennium, with famous saints like Shah Rukn-e-Alam, Bahauddin Zakariya, and Shah Shams Tabriz buried here. The shrine of Shah Rukn-e-Alam is an architectural masterpiece of pre-Mughal Islamic design. Multan was one of the first cities in the subcontinent to embrace Islam, with Arab armies reaching it as early as 712 CE. The city\'s Islamic heritage includes hundreds of historic mosques, shrines, and madrasas. The Multan Fort contains ancient Islamic inscriptions and architectural elements. Multan\'s annual Urs festivals at Sufi shrines attract millions of devotees from across Pakistan and beyond.',
             'famous_mosques' => json_encode(['Shah Rukn-e-Alam Shrine & Mosque', 'Bahauddin Zakariya Mosque', 'Eidgah Mosque Multan', 'Hussain Agahi Grand Mosque', 'Cantt Area Mosque', 'Bosan Road Central Mosque']),
             'local_events' => 'Multan is famous for annual Urs celebrations at Sufi shrines attracting millions, grand Eid Milad-un-Nabi processions through the Walled City, and Ramadan charity by the local Sufi orders.',
             'meta_title' => 'Islamic Date Today in Multan | Hijri Date Multan Pakistan',
             'meta_description' => 'Today Islamic date in Multan — City of Saints. Sufi shrines, Islamic history, Hijri date Multan Pakistan.'],
        ];

        foreach ($cities as $cityData) {
            $city = City::where('slug', $cityData['city_slug'])->first();
            if ($city) {
                $cityData['city_id'] = $city->id;
            } else {
                $cityData['city_id'] = 0;
            }
            CityIslamicContent::create($cityData);
        }
    }

    private function seedMonthContent(): void
    {
        IslamicMonthContent::truncate();

        $months = [
            [
                'month_number' => 1, 'month_name_en' => 'Muharram', 'month_name_urdu' => 'محرم', 'month_name_arabic' => 'مُحَرَّم', 'slug' => 'muharram',
                'significance_en' => 'Muharram is the first month of the Islamic Hijri calendar and one of the four sacred months in Islam. The word "Muharram" means "forbidden" or "sacred" in Arabic. Fighting and warfare are prohibited during this month according to Islamic tradition. The most significant event in Muharram is Ashura, observed on the 10th day. Ashura commemorates multiple historical events: the day Allah saved Prophet Musa (Moses) and the Israelites from Pharaoh by parting the Red Sea, and most notably, the martyrdom of Imam Hussain (RA), the grandson of Prophet Muhammad (PBUH), at the Battle of Karbala in 680 CE (61 AH). Muslims observe Ashura through fasting, prayer, and reflection. Sunni Muslims fast on the 9th and 10th (or 10th and 11th) of Muharram following the Sunnah of Prophet Muhammad (PBUH). Shia Muslims commemorate the tragedy of Karbala with mourning processions and gatherings (Majalis). The Islamic New Year begins on 1st Muharram, marking the start of a new Hijri year.',
                'significance_urdu' => 'محرم اسلامی ہجری کیلنڈر کا پہلا مہینہ ہے اور چار حرمت والے مہینوں میں سے ایک ہے۔ اس مہینے میں جنگ اور لڑائی حرام ہے۔ دسویں محرم (یوم عاشورہ) اسلام میں بہت اہم دن ہے جب امام حسین رضی اللہ عنہ نے کربلا میں شہادت پائی۔',
                'important_dates' => json_encode([['date' => '1', 'event' => 'Islamic New Year'], ['date' => '10', 'event' => 'Day of Ashura'], ['date' => '9', 'event' => 'Tasu\'a (Day before Ashura)']]),
                'recommended_ibadah' => 'Fasting on the 9th and 10th of Muharram (or 10th and 11th) is highly recommended (Sunnah). Increase voluntary prayers, recite Quran, and give charity. Reflect on the sacrifice of Imam Hussain (RA). Avoid sinful activities as this is a sacred month.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said: "The best fasting after Ramadan is in the month of Allah — Muharram." (Sahih Muslim). He also said: "Fasting on Ashura expiates the sins of the previous year." (Sahih Muslim)',
                'meta_title' => 'Muharram — First Islamic Month | Ashura | محرم', 'meta_description' => 'Muharram is the first month of Islamic calendar. Learn about Ashura, significance of Muharram, fasting, and important dates.'
            ],
            [
                'month_number' => 2, 'month_name_en' => 'Safar', 'month_name_urdu' => 'صفر', 'month_name_arabic' => 'صَفَر', 'slug' => 'safar',
                'significance_en' => 'Safar is the second month of the Islamic Hijri calendar. The name "Safar" comes from the Arabic word meaning "empty" or "whistling of wind," as the Arabs would leave their homes empty to travel and trade during this month in pre-Islamic times. There is a common misconception that Safar is an unlucky month — this is categorically rejected in Islam. Prophet Muhammad (PBUH) explicitly said there is no bad omen in Safar. Every day and month belongs to Allah, and no month is inherently unlucky. Historically, several important events occurred in Safar: the Battle of Abwa (the first ghazwa led by the Prophet PBUH) took place in Safar 2 AH. The migration (Hijra) of Prophet Muhammad (PBUH) from Makkah to Madinah began in Safar. The last Wednesday of Safar is observed by some as a day of thanksgiving. Muslims should use this month for increased worship, dua, and seeking Allah\'s protection from all harm.',
                'significance_urdu' => 'صفر اسلامی کیلنڈر کا دوسرا مہینہ ہے۔ بعض لوگ اسے منحوس مہینہ سمجھتے ہیں لیکن یہ عقیدہ اسلام میں بالکل غلط ہے۔ نبی کریم ﷺ نے فرمایا کہ صفر میں کوئی نحوست نہیں ہے۔',
                'important_dates' => json_encode([['date' => '1', 'event' => 'Start of Safar'], ['date' => '27', 'event' => 'Migration to Madinah began (some narrations)']]),
                'recommended_ibadah' => 'Read Surah Ikhlas, Surah Falaq, and Surah Nas for protection. Make dua for safety and well-being. Increase Sadaqah (charity). Recite: "La hawla wa la quwwata illa billah" frequently.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said: "There is no contagion, no bad omen (in Safar), and no hama (referring to pre-Islamic superstitions)." (Sahih Bukhari)',
                'meta_title' => 'Safar — Second Islamic Month | صفر', 'meta_description' => 'Safar is the 2nd month of Islamic calendar. No bad omen in Safar. Learn significance, events, and recommended prayers.'
            ],
            [
                'month_number' => 3, 'month_name_en' => 'Rabi al-Awwal', 'month_name_urdu' => 'ربیع الاول', 'month_name_arabic' => 'رَبِيع ٱلْأَوَّل', 'slug' => 'rabi-ul-awwal',
                'significance_en' => 'Rabi al-Awwal is the third month of the Islamic calendar and one of the most beloved months for Muslims worldwide. The name means "the first spring" in Arabic. This month holds extraordinary significance as it is the birth month of Prophet Muhammad (PBUH), born on 12th Rabi al-Awwal (corresponding to 570 CE in Makkah). Eid Milad-un-Nabi (the birthday of the Prophet PBUH) is celebrated with great enthusiasm across the Muslim world on this date, with processions, gatherings (mahfils), nasheeds, and lectures about the Prophet\'s life and teachings. Pakistan officially observes 12 Rabi al-Awwal as a public holiday. Rabi al-Awwal is also significant because Prophet Muhammad (PBUH) migrated to Madinah and arrived there on 12 Rabi al-Awwal 1 AH, establishing the first Islamic community. Sadly, the Prophet (PBUH) also passed away on 12 Rabi al-Awwal 11 AH. This month is a time to study the Seerah (biography) of Prophet Muhammad (PBUH) and follow his Sunnah.',
                'significance_urdu' => 'ربیع الاول اسلامی کیلنڈر کا تیسرا مہینہ ہے اور نبی کریم ﷺ کی ولادت مبارکہ کا مہینہ ہے۔ ۱۲ ربیع الاول کو عید میلاد النبی ﷺ منائی جاتی ہے۔ پاکستان میں یہ سرکاری تعطیل ہے۔',
                'important_dates' => json_encode([['date' => '12', 'event' => 'Eid Milad-un-Nabi (Birth of Prophet PBUH)'], ['date' => '12', 'event' => 'Hijra arrival in Madinah']]),
                'recommended_ibadah' => 'Study the Seerah (life of Prophet PBUH). Increase Durood Shareef (Salawat). Attend Milad gatherings and nasheeds. Follow the Sunnah in daily life. Give charity in honor of the Prophet PBUH.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said about fasting on Monday: "That is the day on which I was born and the day on which I received revelation." (Sahih Muslim)',
                'meta_title' => 'Rabi al-Awwal — Birth Month of Prophet PBUH | ربیع الاول', 'meta_description' => 'Rabi al-Awwal: birth month of Prophet Muhammad PBUH. 12 Rabi ul Awwal, Eid Milad-un-Nabi, significance and events.'
            ],
            [
                'month_number' => 4, 'month_name_en' => 'Rabi al-Thani', 'month_name_urdu' => 'ربیع الثانی', 'month_name_arabic' => 'رَبِيع ٱلثَّانِي', 'slug' => 'rabi-ul-thani',
                'significance_en' => 'Rabi al-Thani (also known as Rabi ul-Akhir) is the fourth month of the Islamic Hijri calendar. The name means "the second spring" in Arabic. While this month does not have as many well-known Islamic events as other months, it remains a time for continued worship and reflection. The death anniversary of Sheikh Abdul Qadir Gilani (RA), the founder of the Qadiriyya Sufi order, falls on 11 Rabi al-Thani. He is one of the most revered saints in Islam, and his Urs (death anniversary) is commemorated worldwide with gatherings, Quran recitations, and charitable activities. Muslims are encouraged to maintain their spiritual momentum from Rabi al-Awwal and continue studying the teachings of Islam. This month serves as a period of spiritual preparation leading toward the sacred months of Rajab and Shaban ahead.',
                'significance_urdu' => 'ربیع الثانی اسلامی کیلنڈر کا چوتھا مہینہ ہے۔ ۱۱ ربیع الثانی کو حضرت شیخ عبدالقادر جیلانی رحمۃ اللہ علیہ کا عرس منایا جاتا ہے جو قادریہ سلسلے کے بانی تھے۔',
                'important_dates' => json_encode([['date' => '11', 'event' => 'Urs of Sheikh Abdul Qadir Gilani (RA)']]),
                'recommended_ibadah' => 'Continue studying Islamic knowledge. Maintain regular prayers. Read about the life of Sheikh Abdul Qadir Gilani (RA). Give charity. Prepare spiritually for Rajab and Shaban.',
                'hadith_about_month' => 'General hadith about consistent worship: "The most beloved deed to Allah is the most regular and consistent one even if it were little." (Sahih Bukhari)',
                'meta_title' => 'Rabi al-Thani — Fourth Islamic Month | ربیع الثانی', 'meta_description' => 'Rabi al-Thani (Rabi ul-Akhir) is the 4th Islamic month. Urs of Sheikh Abdul Qadir Gilani, significance and events.'
            ],
            [
                'month_number' => 5, 'month_name_en' => 'Jumada al-Awwal', 'month_name_urdu' => 'جمادی الاول', 'month_name_arabic' => 'جُمَادَى ٱلْأُولَى', 'slug' => 'jumada-al-awwal',
                'significance_en' => 'Jumada al-Awwal is the fifth month of the Islamic calendar. The name "Jumada" comes from the Arabic word for "freeze" or "dry," as this month originally fell during winter in pre-Islamic Arabia when water would freeze. While there are no major Islamic holidays in this month, it holds historical significance. The Battle of Mu\'tah (8 AH), the first military engagement between Muslim and Roman Byzantine forces, took place in Jumada al-Awwal. Three great companions — Zaid ibn Haritha, Jafar ibn Abi Talib, and Abdullah ibn Rawaha — were martyred in this battle before Khalid ibn al-Walid took command and saved the Muslim army. Muslims are encouraged to use this month for consistent worship, self-improvement, and preparing for the spiritually significant months ahead.',
                'significance_urdu' => 'جمادی الاول اسلامی کیلنڈر کا پانچواں مہینہ ہے۔ غزوہ موتہ اس مہینے میں ہوا جہاں تین عظیم صحابی — زید بن حارثہ، جعفر بن ابی طالب اور عبداللہ بن رواحہ رضی اللہ عنہم — شہید ہوئے۔',
                'important_dates' => json_encode([['date' => '—', 'event' => 'Battle of Mu\'tah (8 AH)']]),
                'recommended_ibadah' => 'Study the stories of the Sahaba (companions). Increase voluntary prayers. Maintain consistency in daily worship. Reflect on sacrifices of early Muslims.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) conferred the title "Saifullah" (Sword of Allah) upon Khalid ibn al-Walid for his bravery at the Battle of Mu\'tah.',
                'meta_title' => 'Jumada al-Awwal — Fifth Islamic Month | جمادی الاول', 'meta_description' => 'Jumada al-Awwal: 5th month of Islamic calendar. Battle of Mu\'tah, significance, and historical events.'
            ],
            [
                'month_number' => 6, 'month_name_en' => 'Jumada al-Thani', 'month_name_urdu' => 'جمادی الثانی', 'month_name_arabic' => 'جُمَادَى ٱلثَّانِيَة', 'slug' => 'jumada-al-thani',
                'significance_en' => 'Jumada al-Thani (also called Jumada al-Akhirah) is the sixth month of the Islamic calendar, marking the end of the first half of the Hijri year. The name means "the last of the parched land." This month serves as a transitional period before the sacred month of Rajab begins. The death of Hazrat Abu Bakr Siddiq (RA), the first Caliph of Islam and closest companion of Prophet Muhammad (PBUH), occurred on 22 Jumada al-Thani 13 AH (634 CE). Abu Bakr (RA) is considered the greatest companion of the Prophet and played a crucial role in preserving Islam after the Prophet\'s passing. His caliphate, though only two years long, consolidated the Muslim community and initiated the compilation of the Quran. Muslims are encouraged to study his life and follow his example of steadfast faith and dedication.',
                'significance_urdu' => 'جمادی الثانی اسلامی کیلنڈر کا چھٹا مہینہ ہے۔ ۲۲ جمادی الثانی کو خلیفہ اول حضرت ابوبکر صدیق رضی اللہ عنہ کا وصال ہوا۔ آپ نبی کریم ﷺ کے سب سے قریبی ساتھی تھے۔',
                'important_dates' => json_encode([['date' => '22', 'event' => 'Wafat of Hazrat Abu Bakr Siddiq (RA)'], ['date' => '20', 'event' => 'Birth of Fatimah Zahra (RA) - some narrations']]),
                'recommended_ibadah' => 'Study the life of Abu Bakr Siddiq (RA). Prepare for the sacred month of Rajab. Increase voluntary fasting. Strengthen family ties.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said about Abu Bakr: "If I were to take a khalil (close friend), I would have taken Abu Bakr, but he is my brother and companion." (Sahih Bukhari)',
                'meta_title' => 'Jumada al-Thani — Sixth Islamic Month | جمادی الثانی', 'meta_description' => 'Jumada al-Thani: 6th Islamic month. Death of Abu Bakr Siddiq (RA), significance, events, and preparation for Rajab.'
            ],
            [
                'month_number' => 7, 'month_name_en' => 'Rajab', 'month_name_urdu' => 'رجب', 'month_name_arabic' => 'رَجَب', 'slug' => 'rajab',
                'significance_en' => 'Rajab is the seventh month of the Islamic calendar and one of the four sacred months (Ashhur al-Hurum) in which fighting is prohibited. The name comes from the Arabic word "rajaba" meaning "to respect." Rajab is also called "Rajab al-Murajjab" (the respected Rajab) and "Rajab al-Fard" (the solitary Rajab, as it stands alone among sacred months while the other three — Dhu al-Qadah, Dhu al-Hijjah, and Muharram — are consecutive). The most significant event in Rajab is Isra and Miraj (the Night Journey and Ascension), commemorated on 27th Rajab. On this night, Prophet Muhammad (PBUH) was taken from Masjid al-Haram in Makkah to Masjid al-Aqsa in Jerusalem (Isra), and then ascended through the seven heavens to the presence of Allah (Miraj). During this journey, the five daily prayers were made obligatory for Muslims. Rajab is called the "Month of Allah" and marks the beginning of spiritual preparation for Ramadan.',
                'significance_urdu' => 'رجب اسلامی کیلنڈر کا ساتواں مہینہ اور چار حرمت والے مہینوں میں سے ایک ہے۔ ۲۷ رجب کو شب معراج منائی جاتی ہے جب نبی کریم ﷺ کو آسمانوں کی سیر کرائی گئی اور پانچ نمازیں فرض ہوئیں۔',
                'important_dates' => json_encode([['date' => '27', 'event' => 'Shab-e-Meraj (Isra and Miraj)'], ['date' => '1', 'event' => 'Beginning of sacred month']]),
                'recommended_ibadah' => 'Observe Shab-e-Meraj with night prayers. Increase voluntary fasting. Begin preparing for Ramadan. Dua of Rajab: "Allahumma barik lana fi Rajab wa Sha\'ban wa ballighna Ramadan." Increase Quran recitation.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) used to say: "O Allah, bless us in Rajab and Sha\'ban, and let us reach Ramadan." (Ahmad, Nasa\'i)',
                'meta_title' => 'Rajab — Sacred Month | Shab-e-Meraj | رجب', 'meta_description' => 'Rajab: 7th Islamic month, one of four sacred months. Shab-e-Meraj (27 Rajab), significance, fasting, and prayers.'
            ],
            [
                'month_number' => 8, 'month_name_en' => 'Shaban', 'month_name_urdu' => 'شعبان', 'month_name_arabic' => 'شَعْبَان', 'slug' => 'shaban',
                'significance_en' => 'Shaban is the eighth month of the Islamic calendar, serving as a crucial month of preparation for Ramadan. The name "Shaban" comes from "tasha\'aba" meaning "to scatter" or "to separate." Prophet Muhammad (PBUH) used to fast extensively during Shaban, more than any other month besides Ramadan. He (PBUH) said this is a month that people neglect between Rajab and Ramadan, and it is a month in which deeds are raised to the Lord of the Worlds. The most notable event in Shaban is Shab-e-Barat (Laylatul Bara\'ah / Night of Forgiveness), observed on the 15th night of Shaban. Muslims believe that on this night, Allah descends to the lowest heaven and forgives those who seek forgiveness. The Qiblah (direction of prayer) was also changed from Jerusalem to Makkah during Shaban in the 2nd year of Hijra. Muslims should use this month to increase fasting, charity, and Quran recitation in preparation for Ramadan.',
                'significance_urdu' => 'شعبان اسلامی کیلنڈر کا آٹھواں مہینہ اور رمضان کی تیاری کا مہینہ ہے۔ ۱۵ شعبان کو شب برات منائی جاتی ہے جسے مغفرت کی رات بھی کہتے ہیں۔ نبی کریم ﷺ اس مہینے میں بکثرت روزے رکھتے تھے۔',
                'important_dates' => json_encode([['date' => '15', 'event' => 'Shab-e-Barat (Night of Forgiveness)'], ['date' => '—', 'event' => 'Change of Qiblah from Jerusalem to Makkah (2 AH)']]),
                'recommended_ibadah' => 'Fast as much as possible, especially in the first 15 days. Observe Shab-e-Barat with prayers and seeking forgiveness. Begin Ramadan preparations. Visit graveyards and pray for the deceased. Increase Quran recitation. Make a Ramadan plan.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said: "That (Shaban) is a month about which people are negligent, between Rajab and Ramadan. It is a month in which deeds are raised to the Lord of the Worlds, and I like my deeds to be raised while I am fasting." (Nasa\'i)',
                'meta_title' => 'Shaban — Month Before Ramadan | Shab-e-Barat | شعبان', 'meta_description' => 'Shaban: 8th Islamic month, preparation for Ramadan. Shab-e-Barat (15 Shaban), fasting, significance, events.'
            ],
            [
                'month_number' => 9, 'month_name_en' => 'Ramadan', 'month_name_urdu' => 'رمضان', 'month_name_arabic' => 'رَمَضَان', 'slug' => 'ramadan',
                'significance_en' => 'Ramadan is the ninth month of the Islamic calendar and the holiest month for Muslims worldwide. The name comes from the Arabic root "ramida" meaning "scorching heat." During Ramadan, all adult Muslims who are physically able must fast (sawm) from dawn (Fajr) to sunset (Maghrib), abstaining from food, drink, smoking, and intimate relations. Fasting in Ramadan is the fourth pillar of Islam. The Quran was first revealed to Prophet Muhammad (PBUH) during Ramadan: "The month of Ramadan in which the Quran was revealed, a guidance for mankind" (Quran 2:185). Muslims perform extra night prayers called Taraweeh, reading the entire Quran over the course of the month. The last 10 nights of Ramadan contain Laylatul Qadr (Night of Power), which is better than a thousand months. Many Muslims observe I\'tikaf (spiritual retreat in the mosque) during the last 10 days. Zakat al-Fitr (Fitrana) is given before Eid prayers. Ramadan ends with the celebration of Eid ul-Fitr on 1st Shawwal.',
                'significance_urdu' => 'رمضان المبارک اسلامی کیلنڈر کا نواں اور سب سے مقدس مہینہ ہے۔ اس مہینے میں روزے فرض ہیں، تراویح کی نماز پڑھی جاتی ہے، اور آخری دس راتوں میں شب قدر ہوتی ہے جو ہزار مہینوں سے بہتر ہے۔',
                'important_dates' => json_encode([['date' => '1', 'event' => 'Start of Ramadan fasting'], ['date' => '17', 'event' => 'Battle of Badr (2 AH)'], ['date' => '21', 'event' => 'Possible Laylatul Qadr'], ['date' => '23', 'event' => 'Possible Laylatul Qadr'], ['date' => '25', 'event' => 'Possible Laylatul Qadr'], ['date' => '27', 'event' => 'Most likely Laylatul Qadr'], ['date' => '29/30', 'event' => 'Last day of Ramadan']]),
                'recommended_ibadah' => 'Fast every day. Pray Taraweeh nightly. Complete Quran recitation. Give Zakat. Seek Laylatul Qadr in last 10 nights. Observe I\'tikaf if possible. Give Sadaqah generously. Make abundant dua. Pay Fitrana before Eid.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said: "When Ramadan begins, the gates of Paradise are opened, the gates of Hellfire are closed, and the devils are chained." (Sahih Bukhari)',
                'meta_title' => 'Ramadan — Holiest Month | Fasting | Laylatul Qadr | رمضان', 'meta_description' => 'Ramadan: 9th and holiest Islamic month. Fasting, Taraweeh, Laylatul Qadr, I\'tikaf. Complete guide.'
            ],
            [
                'month_number' => 10, 'month_name_en' => 'Shawwal', 'month_name_urdu' => 'شوال', 'month_name_arabic' => 'شَوَّال', 'slug' => 'shawwal',
                'significance_en' => 'Shawwal is the tenth month of the Islamic calendar. The name comes from the Arabic word "shala" meaning "to raise" or "carry." The first day of Shawwal is Eid ul-Fitr, one of the two major Islamic festivals, celebrating the completion of Ramadan fasting. Eid ul-Fitr is a day of joy, gratitude, and community. Muslims perform special Eid prayers in congregation, give Zakat al-Fitr (Fitrana), wear new clothes, and visit family and friends. The celebration typically lasts three days. After Eid, fasting six days of Shawwal is highly recommended (Sunnah). Prophet Muhammad (PBUH) said that fasting Ramadan followed by six days of Shawwal is equivalent to fasting the entire year. The six fasts can be observed consecutively or spread throughout the month. Shawwal is also when the Battle of Uhud took place in 3 AH.',
                'significance_urdu' => 'شوال اسلامی کیلنڈر کا دسواں مہینہ ہے۔ یکم شوال کو عید الفطر منائی جاتی ہے جو رمضان کے روزوں کی تکمیل کا جشن ہے۔ شوال کے چھ روزے رکھنا سنت ہے جو پورے سال کے روزوں کے برابر ہے۔',
                'important_dates' => json_encode([['date' => '1', 'event' => 'Eid ul-Fitr'], ['date' => '1-3', 'event' => 'Eid holidays'], ['date' => '7', 'event' => 'Battle of Uhud (3 AH)']]),
                'recommended_ibadah' => 'Celebrate Eid with family and community. Fast six days of Shawwal. Maintain the spiritual gains of Ramadan. Continue Quran recitation. Give charity to the needy.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said: "Whoever fasts Ramadan and follows it with six days of Shawwal, it is as if he fasted the entire year." (Sahih Muslim)',
                'meta_title' => 'Shawwal — Month of Eid ul-Fitr | شوال', 'meta_description' => 'Shawwal: 10th Islamic month. Eid ul-Fitr, six fasts of Shawwal, significance, events, and recommended worship.'
            ],
            [
                'month_number' => 11, 'month_name_en' => 'Dhu al-Qadah', 'month_name_urdu' => 'ذوالقعدہ', 'month_name_arabic' => 'ذُو ٱلْقَعْدَة', 'slug' => 'dhu-al-qadah',
                'significance_en' => 'Dhu al-Qadah is the eleventh month of the Islamic calendar and one of the four sacred months (Ashhur al-Hurum). The name means "the one of truce" or "the one of sitting," as Arabs would refrain from fighting and traveling during this month. It is the first of the three consecutive sacred months (Dhu al-Qadah, Dhu al-Hijjah, and Muharram). During this month, Muslims begin preparations for Hajj pilgrimage to Makkah, which takes place in the following month of Dhu al-Hijjah. Pilgrims start making travel arrangements, purchasing ihram garments, studying Hajj rituals, and seeking forgiveness from people they may have wronged. The Treaty of Hudaybiyyah, a crucial peace agreement between Prophet Muhammad (PBUH) and the Quraysh of Makkah, was signed in Dhu al-Qadah 6 AH. This treaty ultimately led to the peaceful conquest of Makkah two years later.',
                'significance_urdu' => 'ذوالقعدہ اسلامی کیلنڈر کا گیارہواں مہینہ اور چار حرمت والے مہینوں میں سے ایک ہے۔ اس مہینے میں حج کی تیاریاں شروع ہوتی ہیں۔ صلح حدیبیہ بھی اسی مہینے میں ہوئی تھی۔',
                'important_dates' => json_encode([['date' => '—', 'event' => 'Treaty of Hudaybiyyah (6 AH)'], ['date' => '25', 'event' => 'Earth was spread (Dahw al-Ard) - some narrations']]),
                'recommended_ibadah' => 'Begin Hajj preparations if intending to perform Hajj. Increase istighfar (seeking forgiveness). Study Hajj and Umrah rituals. Avoid conflicts as this is a sacred month. Give charity.',
                'hadith_about_month' => 'Allah says in the Quran: "Indeed, the number of months with Allah is twelve months in the register of Allah, of which four are sacred." (Quran 9:36)',
                'meta_title' => 'Dhu al-Qadah — Sacred Month | Hajj Preparation | ذوالقعدہ', 'meta_description' => 'Dhu al-Qadah: 11th Islamic month, one of four sacred months. Hajj preparation, Treaty of Hudaybiyyah, significance.'
            ],
            [
                'month_number' => 12, 'month_name_en' => 'Dhu al-Hijjah', 'month_name_urdu' => 'ذوالحجہ', 'month_name_arabic' => 'ذُو ٱلْحِجَّة', 'slug' => 'dhu-al-hijjah',
                'significance_en' => 'Dhu al-Hijjah is the twelfth and final month of the Islamic calendar, one of the four sacred months, and the month of Hajj pilgrimage. The name means "the one of pilgrimage." The first ten days of Dhu al-Hijjah are the most blessed days of the entire year. Prophet Muhammad (PBUH) said: "There are no days in which righteous deeds are more beloved to Allah than these ten days." Muslims are encouraged to fast, especially on the 9th (Day of Arafah) which expiates the sins of the previous and coming year. Hajj, the fifth pillar of Islam, takes place from the 8th to the 13th of Dhu al-Hijjah. Over 2 million Muslims gather in Makkah annually for this sacred pilgrimage. The Day of Arafah (9th) is the most important day of Hajj when pilgrims stand in supplication at Mount Arafah. Eid ul-Adha (Festival of Sacrifice) is celebrated on the 10th, commemorating Prophet Ibrahim\'s (AS) willingness to sacrifice his son Ismail (AS) in obedience to Allah. Muslims sacrifice animals (Qurbani) and distribute the meat among family, friends, and the poor.',
                'significance_urdu' => 'ذوالحجہ اسلامی کیلنڈر کا بارہواں اور آخری مہینہ ہے۔ اس کے پہلے دس دن سال کے سب سے افضل دن ہیں۔ ۹ ذوالحجہ کو یوم عرفہ اور ۱۰ ذوالحجہ کو عید الاضحٰی منائی جاتی ہے۔ حج اسلام کا پانچواں رکن ہے جو اسی مہینے میں ادا ہوتا ہے۔',
                'important_dates' => json_encode([['date' => '1-10', 'event' => 'Most blessed days of the year'], ['date' => '8', 'event' => 'Day of Tarwiyah (Hajj begins)'], ['date' => '9', 'event' => 'Day of Arafah'], ['date' => '10', 'event' => 'Eid ul-Adha'], ['date' => '11-13', 'event' => 'Days of Tashreeq']]),
                'recommended_ibadah' => 'Fast the first 9 days, especially 9th (Arafah). Increase takbeer, tahleel, tahmeed. Perform Qurbani (sacrifice). Give generously in charity. Recite Quran. Make abundant dua, especially on Day of Arafah.',
                'hadith_about_month' => 'Prophet Muhammad (PBUH) said: "There are no days on which righteous deeds are more beloved to Allah than these ten days (of Dhu al-Hijjah)." (Sahih Bukhari). About fasting on Arafah: "It expiates the sins of the previous year and the coming year." (Sahih Muslim)',
                'meta_title' => 'Dhu al-Hijjah — Month of Hajj | Eid ul-Adha | ذوالحجہ', 'meta_description' => 'Dhu al-Hijjah: 12th Islamic month, month of Hajj & Eid ul-Adha. First 10 days are most blessed. Day of Arafah, Qurbani.'
            ],
        ];

        foreach ($months as $month) {
            IslamicMonthContent::create($month);
        }
    }
}
