<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->sequence(
                ['name' => 'Action'],
                ['name' => 'Horror'],
                ['name' => 'Thriller'],
                ['name' => 'Drama'],
                ['name' => 'Western'],
                ['name' => 'Romance'],
                ['name' => 'Comedy'],
                ['name' => 'Animation'],
                ['name' => 'Anime'],
                ['name' => 'Fantasy'],
                ['name' => 'Musical'],
                ['name' => 'Documentary'],
                ['name' => 'Sci-fi'],
                ['name' => 'Reality Show'],
                ['name' => 'Series'],
                ['name' => 'Short Film'],
                ['name' => 'Dark Fantasy'],
                ['name' => 'War'],
                ['name' => 'History'],
            )
            ->count(19)
            ->create();
    }
}
