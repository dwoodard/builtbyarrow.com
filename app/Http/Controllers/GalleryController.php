<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class GalleryController extends Controller
{
    public function __invoke(): Response
    {
        $categories = Category::orderBy('name')->get(['id', 'name', 'slug']);
        $albums = Album::orderBy('name')->get(['id', 'name', 'slug']);
        $tags = Tag::orderBy('name')->get(['id', 'name']);

        $disk = Storage::disk(config('filesystems.media_disk'));

        $photos = Photo::with('category', 'album', 'tags')
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
                'album_id' => $photo->album_id,
                'album_name' => $photo->album?->name,
                'tag_ids' => $photo->tags->pluck('id')->toArray(),
                'tag_names' => $photo->tags->pluck('name')->toArray(),
                'is_featured' => $photo->is_featured,
            ]);

        return Inertia::render('Gallery', [
            'categories' => $categories,
            'albums' => $albums,
            'tags' => $tags,
            'photos' => $photos,
        ]);
    }
}
