<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NamazGuide;
use App\Models\NamazStep;
use App\Models\HajjGuide;
use App\Models\KnowledgeCategory;
use App\Models\KnowledgeArticle;

class DynamicModulesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Namaz Guides
        $fajr = NamazGuide::updateOrCreate(['title' => 'Fajr Prayer'], [
            'type' => 'fard',
            'description' => 'The dawn prayer, consisting of 2 Sunnah and 2 Fard rak\'ahs.',
            'icon' => 'fa-cloud-sun'
        ]);
        NamazGuide::updateOrCreate(['title' => 'Dhuhr Prayer'], [
            'type' => 'fard',
            'description' => 'The noon prayer, consisting of 4 Sunnah, 4 Fard, 2 Sunnah, and 2 Nafl rak\'ahs.',
            'icon' => 'fa-sun'
        ]);
        NamazGuide::updateOrCreate(['title' => 'Asr Prayer'], [
            'type' => 'fard',
            'description' => 'The afternoon prayer, consisting of 4 Sunnah (optional) and 4 Fard rak\'ahs.',
            'icon' => 'fa-cloud-meatball' // Approximating icon
        ]);
        NamazGuide::updateOrCreate(['title' => 'Maghrib Prayer'], [
            'type' => 'fard',
            'description' => 'The evening prayer, consisting of 3 Fard, 2 Sunnah, and 2 Nafl rak\'ahs.',
            'icon' => 'fa-moon'
        ]);
        NamazGuide::updateOrCreate(['title' => 'Isha Prayer'], [
            'type' => 'fard',
            'description' => 'The night prayer, consisting of 4 Sunnah, 4 Fard, 2 Sunnah, 2 Nafl, 3 Witr, and 2 Nafl rak\'ahs.',
            'icon' => 'fa-star-and-crescent'
        ]);

        // Add a step for Fajr just as an example
        NamazStep::updateOrCreate([
            'namaz_guide_id' => $fajr->id,
            'step_number' => 1
        ], [
            'title' => 'Takbeeratul Ihram',
            'instruction' => 'Raise your hands to your earlobes and say Allahu Akbar.',
            'arabic' => 'اللَّهُ أَكْبَرُ',
            'translation' => 'Allah is the Greatest'
        ]);

        // 2. Hajj Guides
        HajjGuide::updateOrCreate(['title' => 'Complete Hajj Guide (Tamattu)'], [
            'type' => 'hajj',
            'overview' => 'Hajj al-Tamattu is the most common type of Hajj. It involves performing Umrah first, and then Hajj.'
        ]);
        HajjGuide::updateOrCreate(['title' => 'Step-by-step Umrah'], [
            'type' => 'umrah',
            'overview' => 'A complete visual and textual guide to performing the minor pilgrimage (Umrah).'
        ]);

        // 3. Knowledge Categories
        $aqeedah = KnowledgeCategory::updateOrCreate(['slug' => 'aqeedah'], [
            'name' => 'Aqeedah (Beliefs)',
            'description' => 'The core tenets of Islamic faith, including the Oneness of Allah and the prophethood.',
            'icon' => 'fa-heart'
        ]);
        $fiqh = KnowledgeCategory::updateOrCreate(['slug' => 'fiqh'], [
            'name' => 'Fiqh (Jurisprudence)',
            'description' => 'Islamic law and its application in daily life.',
            'icon' => 'fa-balance-scale'
        ]);
        $history = KnowledgeCategory::updateOrCreate(['slug' => 'history'], [
            'name' => 'Islamic History',
            'description' => 'The life of the Prophet ﷺ and the history of the Islamic civilization.',
            'icon' => 'fa-landmark'
        ]);

        // Knowledge Articles
        KnowledgeArticle::updateOrCreate(['slug' => 'the-concept-of-tawheed'], [
            'knowledge_category_id' => $aqeedah->id,
            'title' => 'The Concept of Tawheed',
            'content' => 'Tawheed is the indivisible oneness concept of monotheism in Islam...',
            'author' => 'Admin'
        ]);
        KnowledgeArticle::updateOrCreate(['slug' => 'importance-of-salah-in-fiqh'], [
            'knowledge_category_id' => $fiqh->id,
            'title' => 'The Pillars of Salah',
            'content' => 'There are 14 pillars of Salah which must be fulfilled...',
            'author' => 'Admin'
        ]);
        KnowledgeArticle::updateOrCreate(['slug' => 'the-treaty-of-hudaybiyyah'], [
            'knowledge_category_id' => $history->id,
            'title' => 'The Treaty of Hudaybiyyah',
            'content' => 'An important event that took place during the time of the Prophet ﷺ...',
            'author' => 'Admin'
        ]);
    }
}
