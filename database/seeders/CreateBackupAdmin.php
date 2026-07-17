<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateBackupAdmin extends Seeder
{
    /**
     * ISSUE 10: Create a backup admin account.
     * Having only 1 admin is a risk — if compromised, there's no recovery.
     * 
     * ⚠️ CHANGE these credentials before running on production!
     */
    public function run(): void
    {
        $existingCount = User::count();
        $this->command->info("Current user count: {$existingCount}");

        // Check if backup admin already exists
        $backupEmail = 'backup-admin@noorislam.com';
        
        if (User::where('email', $backupEmail)->exists()) {
            $this->command->warn("Backup admin '{$backupEmail}' already exists. Skipping.");
            return;
        }

        User::create([
            'name'     => 'NoorIslam Backup Admin',
            'email'    => $backupEmail,
            'password' => Hash::make('NoorBackup@Secure2026!'),
            'email_verified_at' => now(),
        ]);

        $newCount = User::count();
        $this->command->info("✅ ISSUE 10 Fixed: Backup admin created. Total users: {$newCount}");
        $this->command->warn("⚠️  Change email/password before production deployment!");
    }
}
