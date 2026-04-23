<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {

        $disk = Storage::disk(config('filesystems.media_disk'));

        $featuredPhotos = Photo::featured()
            ->with('category')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (Photo $photo) => [
                'id' => $photo->id,
                'url' => $disk->url($photo->path),
                'category_name' => $photo->category?->name,
            ]);

        return Inertia::render('Welcome', [
            'projectTypes' => Category::orderBy('name')->pluck('name')->push('Other')->toArray(),
            'featuredPhotos' => $featuredPhotos,
        ]);
    }
}
