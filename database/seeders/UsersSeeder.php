<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@powerglobal.com.mm',
        ]);

        $user1->assignRole('Super Admin');

        $user2 = User::factory()->create([
            'name' => 'test',
            'email' => 'test@mail.com',
        ]);

        $user1->assignRole('Admin');
    }
}
