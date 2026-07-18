<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SeoMeta;
use Illuminate\Support\Str;

class FixTruncatedMetaDescriptions extends Command
{
    protected $signature = 'seo:fix-truncated-metas';
    protected $description = 'Fix meta descriptions that are abruptly truncated with "Auth..." or similar.';

    public function handle()
    {
        $this->info("Finding truncated meta descriptions...");
        
        $seoMetas = SeoMeta::where('meta_description', 'like', '%Auth...%')
                           ->orWhere('meta_description', 'like', '%...%')
                           ->get();
                           
        $count = 0;
        foreach ($seoMetas as $meta) {
            $desc = $meta->meta_description;
            
            // Clean up trailing "Auth..." or "..."
            $desc = preg_replace('/(Auth\.\.\.|\.\.\.)$/', '', trim($desc));
            
            // Apply strict limit
            if (mb_strlen($desc) > 155) {
                $desc = mb_substr(strip_tags($desc), 0, 155);
            }
            
            if ($desc !== $meta->meta_description) {
                $meta->meta_description = trim($desc);
                $meta->save();
                $count++;
            }
        }
        
        $this->info("Fixed $count truncated meta descriptions.");
    }
}
