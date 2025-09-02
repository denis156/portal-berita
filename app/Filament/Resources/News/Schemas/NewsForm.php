<?php

declare(strict_types=1);

namespace App\Filament\Resources\News\Schemas;

use App\Models\Author;
use Illuminate\Support\Str;
use App\Models\NewsCategory;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section 1: Informasi Dasar
                Section::make('Informasi Berita')
                    ->description('Data dasar berita termasuk judul, kategori, dan penulis')
                    ->icon('phosphor-newspaper')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2,
                        ])
                            ->schema([
                                TextInput::make('tittle')
                                    ->label('Judul Berita')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->required(),
                                TextInput::make('slug')
                                    ->label('Slug URL')
                                    ->placeholder('Slug otomatis dihasilkan dari judul')
                                    ->readOnly(),
                                Select::make('author_id')
                                    ->label('Penulis')
                                    ->options(Author::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                                Select::make('news_category_id')
                                    ->label('Kategori Berita')
                                    ->options(NewsCategory::all()->pluck('tittle', 'id'))
                                    ->searchable()
                                    ->required(),
                                Select::make('status')
                                    ->label('Status Publikasi')
                                    ->options([
                                        'draft' => 'Draft',
                                        'publish' => 'Publish',
                                        'archived' => 'Archived',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                Toggle::make('is_feature')
                                    ->label('Berita Unggulan')
                                    ->helperText('Tandai sebagai berita unggulan untuk ditampilkan di halaman utama')
                                    ->default(false),
                                FileUpload::make('thumbnail')
                                    ->label('Gambar Thumbnail')
                                    ->directory('thumbnails')
                                    ->visibility('public')
                                    ->maxSize(5120)
                                    ->image()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                                    ->validationMessages([
                                        'required' => 'Gambar thumbnail harus diunggah.',
                                        'image' => 'File harus berupa gambar.',
                                        'max' => 'Ukuran gambar tidak boleh lebih dari 5MB.',
                                        'mimes' => 'Gambar harus berformat JPEG, PNG, GIF, atau WebP.',
                                    ])
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                    ])
                    ->aside()
                    ->columnSpanFull(),

                // Section 2: Konten
                Section::make('Konten Berita')
                    ->description('Isi lengkap dari artikel berita')
                    ->icon('phosphor-article')
                    ->collapsible()
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'link'],
                                ['h1', 'h2', 'h3'],
                                ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'],
                                ['bulletList', 'orderedList', 'blockquote'],
                                ['attachFiles', 'table'],
                                ['undo', 'redo'],
                            ])
                            ->floatingToolbars([
                                'paragraph' => [
                                    'bold',
                                    'italic',
                                    'underline',
                                    'link',
                                ],
                                'heading' => [
                                    'h2',
                                    'h3',
                                ],
                                'list' => [
                                    'bulletList',
                                    'orderedList',
                                ],
                                'table' => [
                                    'tableAddColumnBefore',
                                    'tableAddColumnAfter',
                                    'tableDeleteColumn',
                                    'tableAddRowBefore',
                                    'tableAddRowAfter',
                                    'tableDeleteRow',
                                    'tableToggleHeaderRow',
                                    'tableDelete',
                                ],
                            ])
                            ->columnSpanFull(),
                    ])
                    ->aside()
                    ->columnSpanFull(),
            ]);
    }
}
