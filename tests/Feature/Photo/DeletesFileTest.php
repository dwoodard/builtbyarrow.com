<?php

use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

test('deleting photo deletes file from storage', function () {
    Storage::fake(config('filesystems.media_disk'));

    $photo = Photo::factory()->create(['path' => 'photos/test-image.jpg']);
    Storage::disk(config('filesystems.media_disk'))->put($photo->path, 'fake image content');

    expect(Storage::disk(config('filesystems.media_disk'))->exists($photo->path))->toBeTrue();

    $photo->delete();
 
    expect(Storage::disk(config('filesystems.media_disk'))->exists($photo->path))->toBeFalse();
});
