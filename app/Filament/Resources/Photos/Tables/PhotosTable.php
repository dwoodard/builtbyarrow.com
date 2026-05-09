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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
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
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                SelectFilter::make('album')
                    ->relationship('album', 'name'),
                TernaryFilter::make('album_assigned')
                    ->label('Album assigned')
                    ->queries(
                        true: fn ($query) => $query->whereNotNull('album_id'),
                        false: fn ($query) => $query->whereNull('album_id'),
                    ),
                SelectFilter::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple(),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
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
