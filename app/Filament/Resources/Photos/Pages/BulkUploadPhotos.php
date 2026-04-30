<?php

namespace App\Filament\Resources\Photos\Pages;

use App\Filament\Resources\Photos\PhotoResource;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Tag;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BulkUploadPhotos extends Page
{
    protected static string $resource = PhotoResource::class;

    protected string $view = 'filament.resources.photos.pages.bulk-upload-photos';

    protected static ?string $title = 'Upload Photos';

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    public int $uploadedCount = 0;

    public function mount(): void
    {
        $this->form->fill([
            'is_featured' => false,
            'sort_order' => 0,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('paths')
                    ->label('Photos')
                    ->image()
                    ->multiple()
                    ->maxFiles(200)
                    ->maxParallelUploads(10)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->directory('photos')
                    ->disk(config('filesystems.media_disk'))
                    ->visibility('public')
                    ->preserveFilenames()
                    ->live()
                    ->afterStateUpdated(fn (?array $state, $set) => $this->processUploads($state, $set))
                    ->columnSpanFull(),
                Select::make('category_id')
                    ->label('Category')
                    ->options(fn (): array => Category::orderBy('name')->pluck('name', 'id')->all())
                    ->searchable()
                    ->placeholder('No category'),
                Select::make('tags')
                    ->label('Tags')
                    ->multiple()
                    ->options(fn (): array => Tag::orderBy('name')->pluck('name', 'id')->all())
                    ->searchable()
                    ->placeholder('No tags')
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                    ])
                    ->createOptionUsing(fn (array $data): int => Tag::create($data)->getKey()),
                Toggle::make('is_featured'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ])
            ->columns(2)
            ->statePath('data');
    }

    protected function processUploads(?array $state, $set): void
    {
        if (empty($state)) {
            return;
        }

        $disk = config('filesystems.media_disk');
        $categoryId = $this->data['category_id'] ?? null;
        $tags = $this->data['tags'] ?? [];
        $isFeatured = $this->data['is_featured'] ?? false;
        $sortOrder = $this->data['sort_order'] ?? 0;

        $newCount = 0;

        DB::transaction(function () use ($state, $disk, $categoryId, $tags, $isFeatured, $sortOrder, &$newCount): void {
            foreach ($state as $file) {
                if (! ($file instanceof TemporaryUploadedFile)) {
                    continue;
                }

                $path = $file->store('photos', $disk);

                $record = Photo::create([
                    'path' => $path,
                    'category_id' => $categoryId,
                    'is_featured' => $isFeatured,
                    'sort_order' => $sortOrder,
                ]);

                if ($tags) {
                    $record->tags()->sync($tags);
                }

                $newCount++;
            }
        });

        if ($newCount > 0) {
            $this->uploadedCount += $newCount;
            $set('paths', []);
        }
    }
}
