<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Country;
use App\Models\City;
use App\Models\Surah;
use App\Models\HadithTopic;
use App\Models\IslamicEvent;
use App\Models\RamadanTiming;

class AuditContent extends Command
{
    protected $signature = 'seo:audit-content';
    protected $description = 'Audit database content against SEO requirements to find empty clusters or missing data';

    public function handle()
    {
        $this->info("Starting Content Audit...");

        $counts = [
            'Countries' => Country::count(),
            'Cities' => City::count(),
            'Surahs' => Surah::count(),
            'Hadith Topics' => HadithTopic::count(),
            'Islamic Events' => IslamicEvent::count(),
            'Ramadan Timings' => RamadanTiming::count(),
        ];

        $this->table(['Model', 'Rows'], array_map(function ($k, $v) {
            return [$k, $v];
        }, array_keys($counts), $counts));

        $warnings = 0;
        foreach ($counts as $model => $count) {
            if ($count === 0) {
                $this->warn("WARNING: {$model} table is empty. Associated cluster pages will 404 or be blank.");
                $warnings++;
            }
        }

        // Check for missing local_context_notes
        $citiesWithoutNotes = City::whereNull('local_context_note')->count();
        if ($citiesWithoutNotes > 0) {
            $this->warn("WARNING: {$citiesWithoutNotes} cities are missing a local_context_note. This breaks the unique content requirement.");
            $warnings++;
        }

        if ($warnings === 0) {
            $this->info("Audit passed. All core tables have data.");
        } else {
            $this->error("Audit completed with {$warnings} warnings.");
        }
    }
}
