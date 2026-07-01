<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZakatConfigSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('zakat_configs')->updateOrInsert(
            ['id' => 1],
            [
                'gold_price_per_gram' => 37251.00,
                'silver_price_per_gram' => 135.00,
                'currency_code' => 'PKR',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->command->info('✅ Zakat config seeded (Gold: ₨37,251/gram, Silver: ₨135/gram).');
    }
}
