<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kitchen', 'slug' => 'kitchen'],
            ['name' => 'Bathroom', 'slug' => 'bathroom'],
            ['name' => 'Basement', 'slug' => 'basement'],
            ['name' => 'Home Addition', 'slug' => 'home-addition'],
            ['name' => 'Painting & Trim', 'slug' => 'painting-trim'],
            ['name' => 'Flooring', 'slug' => 'flooring'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
