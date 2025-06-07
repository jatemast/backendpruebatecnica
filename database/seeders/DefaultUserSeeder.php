<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'javierteheran20@gmail.com'],
            [
                'name' => 'javier teheran magallanez',
                'password' => Hash::make('123456789'),
            ]
        );
    }
}
