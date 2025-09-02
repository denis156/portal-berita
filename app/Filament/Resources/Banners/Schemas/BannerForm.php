<?php

declare(strict_types=1);

namespace App\Filament\Resources\Banners\Schemas;

use App\Models\News;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Banner')
                    ->description('Pilih berita yang akan ditampilkan sebagai banner utama')
                    ->icon('phosphor-bookmark')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                        ])
                            ->schema([
                                Select::make('news_id')
                                    ->label('Pilih Berita')
                                    ->options(News::with(['author', 'category'])->get()->mapWithKeys(function ($news) {
                                        $categoryName = $news->category ? $news->category->tittle : 'Tanpa Kategori';
                                        $authorName = $news->author ? $news->author->name : 'Penulis Tidak Diketahui';
                                        return [$news->id => $news->tittle . ' - ' . $authorName . ' (' . $categoryName . ')'];
                                    }))
                                    ->searchable()
                                    ->placeholder('Cari dan pilih berita untuk banner...')
                                    ->helperText('Banner akan menampilkan berita yang dipilih di halaman utama')
                                    ->required(),
                            ])
                    ])
                    ->aside()
                    ->columnSpanFull(),
            ]);
    }
}
