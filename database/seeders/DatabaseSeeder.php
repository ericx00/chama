<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        $admin = User::create([
            'name' => 'System Administrator',
            'email' => 'admin@chama.local',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '0700000001',
        ]);

        // Create Sample Members
        $members = [
            ['name' => 'John Kiprotich', 'phone' => '0712345678', 'id_number' => '25498634', 'email' => 'john@example.com'],
            ['name' => 'Mary Wanjiru', 'phone' => '0723456789', 'id_number' => '25498635', 'email' => 'mary@example.com'],
            ['name' => 'David Kipchoge', 'phone' => '0734567890', 'id_number' => '25498636', 'email' => 'david@example.com'],
            ['name' => 'Grace Kariuki', 'phone' => '0745678901', 'id_number' => '25498637', 'email' => 'grace@example.com'],
        ];

        foreach ($members as $memberData) {
            $member = Member::create([
                ...$memberData,
                'address' => 'Nairobi, Kenya',
                'date_joined' => now()->subMonths(6),
                'status' => 'active',
            ]);

            // Create member user account
            User::create([
                'name' => $memberData['name'],
                'email' => $memberData['email'],
                'password' => Hash::make('password'),
                'role' => 'member',
                'phone' => $memberData['phone'],
                'member_id' => $member->id,
            ]);
        }
    }
}
