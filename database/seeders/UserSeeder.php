<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(500)->create();

        User::factory(1)
            ->state(["name" => "matin"])
            ->state(["email" => "matin12@example.com"])
            ->state(["password" => Hash::make(123456)])
            ->state(["is_admin" => true])
            ->create();
    }
}
