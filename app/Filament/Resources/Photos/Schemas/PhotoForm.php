<?php

namespace App\Filament\Resources\Photos\Schemas;

use App\Models\Album;
use App\Models\Category;
use App\Models\Tag;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PhotoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('path')
                    ->label('Photo')
                    ->image()
                    ->multiple(fn (string $operation): bool => $operation === 'create')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->directory('photos')
                    ->disk(config('filesystems.media_disk'))
                    ->visibility('public')
                    ->preserveFilenames()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn ($state): bool => filled($state))
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return Category::create([
                            'name' => $data['name'],
                            'slug' => Str::slug($data['name']),
                        ])->id;
                    }),
                Select::make('album_id')
                    ->relationship('album', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->placeholder('No album')
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return Album::create([
                            'name' => $data['name'],
                            'slug' => Str::slug($data['name']),
                        ])->id;
                    }),
                Select::make('tags')
                    ->multiple()
                    ->relationship(titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return Tag::create([
                            'name' => $data['name'],
                            'slug' => Str::slug($data['name']),
                        ])->id;
                    }),
                Toggle::make('is_featured'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
