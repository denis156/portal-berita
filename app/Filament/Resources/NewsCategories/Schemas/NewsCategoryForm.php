<?php

declare(strict_types=1);

namespace App\Filament\Resources\NewsCategories\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;

class NewsCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->description('Data kategori berita termasuk nama dan slug untuk URL')
                    ->icon('phosphor-tag')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2,
                        ])
                            ->schema([
                                TextInput::make('tittle')
                                    ->label('Nama Kategori')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->required(),
                                TextInput::make('slug')
                                    ->label('Slug URL')
                                    ->placeholder('Slug otomatis dihasilkan dari nama kategori')
                                    ->readOnly(),
                            ])
                    ])
                    ->aside()
                    ->columnSpanFull(),
            ]);
    }
}
