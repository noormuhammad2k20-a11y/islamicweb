<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Master seeder that runs ALL audit fix seeders in the correct order.
 * 
 * Usage: php artisan db:seed --class=AuditFixSeeder
 */
class AuditFixSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('');
        $this->command->info('╔══════════════════════════════════════════════════════════╗');
        $this->command->info('║    NoorIslam.com — Audit Fix Runner                     ║');
        $this->command->info('║    Running all fixes from the audit report...            ║');
        $this->command->info('╚══════════════════════════════════════════════════════════╝');
        $this->command->info('');

        // Phase 1: Critical Fixes
        $this->command->info('━━━ PHASE 1: CRITICAL FIXES ━━━');
        
        $this->command->info('🔴 ISSUE 1: Fixing admin email security...');
        $this->call(FixAdminSecuritySeeder::class);
        
        $this->command->info('🔴 ISSUE 3: Removing title ID suffixes...');
        $this->call(FixSeoTitleSuffix::class);
        
        $this->command->info('🔴 ISSUE 4: Fixing leading hyphen titles...');
        $this->call(FixLeadingHyphenTitles::class);
        
        $this->command->info('🔴 ISSUE 2: Filling NULL meta descriptions...');
        $this->call(FixNullMetaDescriptions::class);
        
        $this->command->info('🔴 ISSUE 5: Fixing Allah names generic benefits...');
        $this->call(FixAllahNamesBenefits::class);
        
        $this->command->info('🔴 ISSUE 6: Flagging hadith content in duas table...');
        $this->call(FlagHadithInDuas::class);

        $this->command->info('');
        $this->command->info('━━━ PHASE 2: IMPORTANT FIXES ━━━');
        
        $this->command->info('🟡 ISSUE 10: Creating backup admin...');
        $this->call(CreateBackupAdmin::class);

        $this->command->info('');
        $this->command->info('╔══════════════════════════════════════════════════════════╗');
        $this->command->info('║  ✅ ALL DATABASE FIXES COMPLETED!                       ║');
        $this->command->info('║                                                          ║');
        $this->command->info('║  Code-level fixes (Issues 7, 8, 11, SEO A-I) are        ║');
        $this->command->info('║  already applied to the codebase.                       ║');
        $this->command->info('║                                                          ║');
        $this->command->info('║  Next steps:                                             ║');
        $this->command->info('║  1. php artisan config:cache                             ║');
        $this->command->info('║  2. php artisan route:cache                              ║');
        $this->command->info('║  3. php artisan view:cache                               ║');
        $this->command->info('║  4. Submit sitemap to Google Search Console              ║');
        $this->command->info('╚══════════════════════════════════════════════════════════╝');
    }
}
