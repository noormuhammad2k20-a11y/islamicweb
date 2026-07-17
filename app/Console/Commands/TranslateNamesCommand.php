<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\IslamicName;

class TranslateNamesCommand extends Command
{
    protected $signature = 'names:translate-urdu {--limit=0}';

    protected $description = 'Translates English meaning to Urdu for Islamic Names';

    public function handle()
    {
        $limit = (int) $this->option('limit');

        // Get names where meaning_urdu is null or empty
        $query = IslamicName::whereNull('meaning_urdu')
                            ->whereNotNull('translation_urdu')
                            ->where('translation_urdu', '!=', '');

        if ($limit > 0) {
            $query->limit($limit);
        }
        
        $names = $query->get();
        $total = $names->count();
        $this->info("Found {$total} names to translate.");

        if ($total === 0) {
            return;
        }

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        foreach ($names as $name) {
            try {
                // Sleep slightly to avoid Google Translate rate limits (500ms)
                usleep(500000); 

                $text = urlencode($name->translation_urdu);
                $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=ur&dt=t&q={$text}";
                
                $response = file_get_contents($url);
                $json = json_decode($response, true);
                
                if (isset($json[0][0][0])) {
                    $translated = $json[0][0][0];
                    $name->meaning_urdu = $translated;
                    $name->save();
                }

            } catch (\Exception $e) {
                $this->error("\nFailed to translate ID {$name->id}: " . $e->getMessage());
                sleep(2);
            }
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Translation completed.');
    }
}
