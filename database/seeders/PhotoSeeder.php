<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Remodels',
            'Additions',
            'New Builds',
        ];

        $categoryIds = [];
        foreach ($categories as $categoryName) {
            $category = Category::firstOrCreate(
                ['slug' => str()->slug($categoryName)],
                ['name' => $categoryName]
            );
            $categoryIds[$categoryName] = $category->id;
        }

        $photoData = [
            ['category' => 'Remodels', 'path' => 'https://picsum.photos/400/500?random=1'],
            ['category' => 'Remodels', 'path' => 'https://picsum.photos/500/600?random=2'],
            ['category' => 'Additions', 'path' => 'https://picsum.photos/450/550?random=3'],
            ['category' => 'Additions', 'path' => 'https://picsum.photos/380/520?random=4'],
            ['category' => 'New Builds', 'path' => 'https://picsum.photos/420/580?random=5'],
            ['category' => 'New Builds', 'path' => 'https://picsum.photos/460/540?random=6'],
        ];

        foreach ($photoData as $index => $data) {
            Photo::create([
                'category_id' => $categoryIds[$data['category']],
                'path' => $data['path'],
                'is_featured' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
