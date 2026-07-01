<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StrategyContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🚀 Starting NoorIslam Strategy Content Seeding...');
        $this->command->newLine();

        $this->call([
            AllahNames99Seeder::class,
            PakistanCitiesSeeder::class,
            ZakatConfigSeeder::class,
            WazaifSeeder::class,
            DreamSymbolSeeder::class,
            IslamicQuizSeeder::class,
            IslamicEventsFullSeeder::class,
        ]);

        $this->command->newLine();
        $this->command->info('🎉 All strategy content seeded successfully!');
    }
}
