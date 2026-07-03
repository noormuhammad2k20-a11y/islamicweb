<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrayerCalcMethod;

class PrayerCalcMethodsSeeder extends Seeder
{
    public function run(): void
    {
        $methods = [
            [
                'aladhan_id' => 1,
                'name' => 'University of Islamic Sciences, Karachi',
                'short_name' => 'Karachi',
                'params' => json_encode(['Fajr' => 18, 'Isha' => 18]),
                'description' => 'Used primarily in Pakistan, Bangladesh, India, Afghanistan, and parts of Europe.',
                'is_default_for_region' => true,
            ],
            [
                'aladhan_id' => 2,
                'name' => 'Islamic Society of North America (ISNA)',
                'short_name' => 'ISNA',
                'params' => json_encode(['Fajr' => 15, 'Isha' => 15]),
                'description' => 'Used in parts of the USA, Canada, and parts of the UK.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 3,
                'name' => 'Muslim World League',
                'short_name' => 'MWL',
                'params' => json_encode(['Fajr' => 18, 'Isha' => 17]),
                'description' => 'Standard method used by the Muslim World League. Widely used in Europe, Far East, and parts of the US.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 4,
                'name' => 'Umm Al-Qura University, Makkah',
                'short_name' => 'Umm al-Qura',
                'params' => json_encode(['Fajr' => 18.5, 'Isha' => '90 min']),
                'description' => 'Used in Saudi Arabia and the Arabian Peninsula.',
                'is_default_for_region' => true,
            ],
            [
                'aladhan_id' => 5,
                'name' => 'Egyptian General Authority of Survey',
                'short_name' => 'Egypt',
                'params' => json_encode(['Fajr' => 19.5, 'Isha' => 17.5]),
                'description' => 'Used in Egypt, Sudan, and parts of Africa.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 7,
                'name' => 'Institute of Geophysics, University of Tehran',
                'short_name' => 'Tehran',
                'params' => json_encode(['Fajr' => 17.7, 'Isha' => 14, 'Maghrib' => 4.5]),
                'description' => 'Used in Iran and some Shia communities.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 8,
                'name' => 'Gulf Region',
                'short_name' => 'Gulf',
                'params' => json_encode(['Fajr' => 19.5, 'Isha' => '90 min']),
                'description' => 'Used in the Gulf region (UAE, etc.).',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 9,
                'name' => 'Kuwait',
                'short_name' => 'Kuwait',
                'params' => json_encode(['Fajr' => 18, 'Isha' => 17.5]),
                'description' => 'Used in Kuwait.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 10,
                'name' => 'Qatar',
                'short_name' => 'Qatar',
                'params' => json_encode(['Fajr' => 18, 'Isha' => '90 min']),
                'description' => 'Used in Qatar.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 11,
                'name' => 'Majlis Ugama Islam Singapura, Singapore',
                'short_name' => 'MUIS',
                'params' => json_encode(['Fajr' => 20, 'Isha' => 18]),
                'description' => 'Used in Singapore.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 12,
                'name' => 'Union Organization Islamic de France',
                'short_name' => 'UOIF',
                'params' => json_encode(['Fajr' => 12, 'Isha' => 12]),
                'description' => 'Used in France.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 13,
                'name' => 'Diyanet İşleri Başkanlığı, Turkey',
                'short_name' => 'Diyanet',
                'params' => json_encode(['Fajr' => 18, 'Isha' => 17]),
                'description' => 'Used in Turkey and Turkish diaspora.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 14,
                'name' => 'Spiritual Administration of Muslims of Russia',
                'short_name' => 'Russia',
                'params' => json_encode(['Fajr' => 16, 'Isha' => 15]),
                'description' => 'Used in Russia.',
                'is_default_for_region' => false,
            ],
            [
                'aladhan_id' => 15,
                'name' => 'Moonsighting Committee Worldwide',
                'short_name' => 'Moonsighting',
                'params' => json_encode(['Fajr' => 18, 'Isha' => 18]),
                'description' => 'Used worldwide based on moonsighting.',
                'is_default_for_region' => false,
            ],
        ];

        foreach ($methods as $method) {
            PrayerCalcMethod::updateOrCreate(
                ['aladhan_id' => $method['aladhan_id']],
                $method
            );
        }
    }
}
