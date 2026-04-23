<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{
    public function __invoke(): Response
    {
        $categories = Category::orderBy('name')->get(['id', 'name', 'slug']);

        $disk = Storage::disk(config('filesystems.media_disk'));

        $photos = Photo::with('category')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (Photo $photo) => [
                'id' => $photo->id,
                'title' => $photo->title,
                'description' => $photo->description,
                'url' => $disk->url($photo->path),
                'category_id' => $photo->category_id,
                'category_name' => $photo->category?->name,
                'is_featured' => $photo->is_featured,
            ]);

        return Inertia::render('Gallery', [
            'categories' => $categories,
            'photos' => $photos,
        ]);
    }
}
