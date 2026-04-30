<?php

namespace App\Filament\Resources\Photos\Pages;

use App\Filament\Resources\Photos\PhotoResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreatePhoto extends CreateRecord
{
    protected static string $resource = PhotoResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $paths = (array) $data['path'];
        $tags = $data['tags'] ?? [];
        unset($data['path'], $data['tags']);

        $firstRecord = null;

        DB::transaction(function () use ($paths, $data, $tags, &$firstRecord): void {
            foreach ($paths as $path) {
                $record = $this->getModel()::create([...$data, 'path' => $path]);

                if ($tags) {
                    $record->tags()->sync($tags);
                }

                $firstRecord ??= $record;
            }
        });

        return $firstRecord;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
