<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FixAdminSecuritySeeder extends Seeder
{
    /**
     * ISSUE 1: Fix admin email from example.com to real email.
     * 
     * ⚠️ IMPORTANT: Change these values before running on production!
     */
    public function run(): void
    {
        $admin = User::find(1);

        if (!$admin) {
            $this->command->error('Admin user (ID 1) not found!');
            return;
        }

        $oldEmail = $admin->email;

        // ⚠️ CHANGE THESE VALUES before deploying to production
        $newEmail    = 'admin@noorislam.com';
        $newPassword = 'NoorIslam@Secure2026!';

        $admin->update([
            'name'     => 'NoorIslam Admin',
            'email'    => $newEmail,
            'password' => Hash::make($newPassword),
        ]);

        $this->command->info("✅ ISSUE 1 Fixed: Admin email changed from '{$oldEmail}' to '{$newEmail}'");
        $this->command->warn("⚠️  Remember to change the password after first login!");
    }
}
