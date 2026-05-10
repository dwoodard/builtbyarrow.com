<?php

namespace App\Filament\Resources\Photos\Tables;

use App\Filament\Resources\Photos\PhotoResource;
use App\Models\Album;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Tag;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\TextSize;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class PhotosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    ImageColumn::make('path')
                        ->label('')
                        ->disk(config('filesystems.media_disk'))
                        ->height(300)
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover w-full h-full rounded-xl']),
                    Stack::make([
                        Split::make([
                            TextColumn::make('category.name')
                                ->badge()
                                ->color('gray')
                                ->size(TextSize::Small)
                                ->grow(false),
                            TextColumn::make('album.name')
                                ->badge()
                                ->color('gray')
                                ->size(TextSize::Small)
                                ->grow(false),
                            IconColumn::make('is_featured')
                                ->icon(Heroicon::OutlinedStar)
                                ->color('warning')
                                ->hidden(fn (?Photo $record): bool => ! $record?->is_featured)
                                ->alignment(Alignment::End),
                        ]),
                        TextColumn::make('tags.name')
                            ->badge()
                            ->size(TextSize::ExtraSmall),
                    ])->space(1),
                ])->space(0),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 2,
            ])
            ->filters([
                Filter::make('category')
                    ->form([
                        Select::make('category_id')
                            ->label('Category')
                            ->options(function () {
                                return [
                                    '0' => 'No category',
                                    ...Category::pluck('name', 'id')->toArray(),
                                ];
                            })
                            ->placeholder('All Categories')
                            ->native(false),
                    ])
                    ->indicateUsing(function (array $data): ?string {
                        if (! isset($data['category_id']) || $data['category_id'] === null) {
                            return null;
                        }

                        if ($data['category_id'] === '0') {
                            return 'No category';
                        }

                        $category = Category::find((int) $data['category_id']);

                        return $category ? $category->name : null;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        if (! isset($data['category_id']) || $data['category_id'] === null) {
                            return $query;
                        }

                        if ($data['category_id'] === '0') {
                            return $query->whereNull('category_id');
                        }

                        return $query->where('category_id', (int) $data['category_id']);
                    }),
                Filter::make('album')
                    ->form([
                        Select::make('album_id')
                            ->label('Album')
                            ->options(function () {
                                return [
                                    '0' => 'No album',
                                    ...Album::pluck('name', 'id')->toArray(),
                                ];
                            })
                            ->placeholder('All Albums')
                            ->native(false),
                    ])
                    ->indicateUsing(function (array $data): ?string {
                        if (! isset($data['album_id']) || $data['album_id'] === null) {
                            return null;
                        }

                        if ($data['album_id'] === '0') {
                            return 'No album';
                        }

                        $album = Album::find((int) $data['album_id']);

                        return $album ? $album->name : null;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        if (! isset($data['album_id']) || $data['album_id'] === null) {
                            return $query;
                        }

                        if ($data['album_id'] === '0') {
                            return $query->whereNull('album_id');
                        }

                        return $query->where('album_id', (int) $data['album_id']);
                    }),
                Filter::make('tags')
                    ->form([
                        Select::make('tags')
                            ->label('Tags')
                            ->options(function () {
                                return [
                                    '0' => 'No tags',
                                    ...Tag::pluck('name', 'id')->toArray(),
                                ];
                            })
                            ->placeholder('All tags')
                            ->native(false),
                    ])
                    ->indicateUsing(function (array $data): ?string {
                        if (! isset($data['tags']) || $data['tags'] === null) {
                            return null;
                        }

                        if ($data['tags'] === '0') {
                            return 'No tags';
                        }

                        $tag = Tag::find((int) $data['tags']);

                        return $tag ? $tag->name : null;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        if (! isset($data['tags']) || $data['tags'] === null) {
                            return $query;
                        }

                        if ($data['tags'] === '0') {
                            return $query->doesntHave('tags');
                        }

                        return $query->whereHas('tags', fn (Builder $q) => $q->where('tags.id', (int) $data['tags']));
                    }),
                TernaryFilter::make('is_featured')
                    ->placeholder('All photos')
                    ->label('Featured')
                    ->trueLabel('Featured only')
                    ->falseLabel('Not featured')
                    ->indicateUsing(function (array $data): ?string {
                        if (! isset($data['is_featured']) || $data['is_featured'] === null) {
                            return null;
                        }

                        return $data['is_featured'] ? 'Featured' : 'Not featured';
                    }),
            ])
            ->recordUrl(fn (Photo $record): string => PhotoResource::getUrl('edit', ['record' => $record]))
            ->recordActions([])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('updateCategory')
                        ->label('Set category')
                        ->icon('heroicon-o-folder')
                        ->schema([
                            Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->label('Category name')
                                        ->required()
                                        ->maxLength(255),
                                ])
                                ->createOptionUsing(function (array $data): int {
                                    return Category::create([
                                        'name' => $data['name'],
                                        'slug' => Str::slug($data['name']),
                                    ])->id;
                                }),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each->update(['category_id' => $data['category_id']]);
                        })
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('updateAlbum')
                        ->label('Set album')
                        ->icon('heroicon-o-rectangle-group')
                        ->schema([
                            Select::make('album_id')
                                ->label('Album')
                                ->relationship('album', 'name')
                                ->searchable()
                                ->preload()
                                ->nullable()
                                ->placeholder('No album')
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->label('Album name')
                                        ->required()
                                        ->maxLength(255),
                                ])
                                ->createOptionUsing(function (array $data): int {
                                    return Album::create([
                                        'name' => $data['name'],
                                        'slug' => Str::slug($data['name']),
                                    ])->id;
                                }),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each->update(['album_id' => $data['album_id']]);
                        })
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('editTags')
                        ->label('Edit tags')
                        ->icon('heroicon-o-tag')
                        ->schema([
                            Select::make('add_tags')
                                ->label('Add tags')
                                ->options(Tag::pluck('name', 'id'))
                                ->multiple()
                                ->searchable()
                                ->createOptionForm([
                                    TextInput::make('name')
                                        ->label('Tag name')
                                        ->required()
                                        ->maxLength(255),
                                ])
                                ->createOptionUsing(function (array $data): int {
                                    return Tag::create(['name' => $data['name']])->id;
                                }),
                            Select::make('remove_tags')
                                ->label('Remove tags')
                                ->options(Tag::pluck('name', 'id'))
                                ->multiple()
                                ->searchable(),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each(function (Photo $photo) use ($data) {
                                // Add tags without removing existing ones, gracefully handling duplicates
                                if ($data['add_tags'] ?? false) {
                                    $existingTagIds = $photo->tags()->pluck('id')->toArray();
                                    $tagsToAdd = array_diff($data['add_tags'], $existingTagIds);
                                    if (! empty($tagsToAdd)) {
                                        $photo->tags()->attach($tagsToAdd);
                                    }
                                }
                                // Remove specified tags
                                if ($data['remove_tags'] ?? false) {
                                    $photo->tags()->detach($data['remove_tags']);
                                }
                            });
                        })
                        ->deselectRecordsAfterCompletion(),
                    BulkAction::make('updateIsFeatured')
                        ->label('Set featured')
                        ->icon('heroicon-o-star')
                        ->schema([
                            Toggle::make('is_featured')
                                ->label('Featured')
                                ->default(true),
                        ])
                        ->action(function (Collection $records, array $data): void {
                            $records->each->update(['is_featured' => $data['is_featured']]);
                        })
                        ->deselectRecordsAfterCompletion(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
