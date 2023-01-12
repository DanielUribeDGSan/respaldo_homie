<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'type' => 'admin',
            'name' => "Admin",
            'last_name' => "Respaldo Homie",
            'phone' => "5555555555",
            'email' => "admin@respaldohomie.com",
            'password' => bcrypt('respaldo_homie__2021_*'),

        ]);

        $user->assignRole('admin');
    }
}
