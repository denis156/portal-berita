<?php

declare(strict_types=1);

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Fieldset;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Section 1: Data Profil
                Section::make('Informasi Penulis')
                    ->description('Data identitas lengkap penulis termasuk foto profil, nama, dan bio')
                    ->icon('phosphor-identification-card')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2,
                            'lg' => 3,
                        ])
                            ->schema([
                                FileUpload::make('avatar')
                                    ->label('Foto Profil')
                                    ->directory('avatars')
                                    ->visibility('public')
                                    ->maxSize(2048)
                                    ->avatar()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                                    ->validationAttribute('foto profil')
                                    ->validationMessages([
                                        'required' => 'Foto profil harus diunggah.',
                                        'image' => 'File harus berupa gambar.',
                                        'max' => 'Ukuran foto profil tidak boleh lebih dari 2MB.',
                                        'mimes' => 'Foto profil harus berformat JPEG, PNG, GIF, atau WebP.',
                                    ])
                                    ->required(),
                                Fieldset::make('Detail')
                                    ->columns(['default' => 1, 'sm' => 2])
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Nama Lengkap')
                                            ->required(),
                                        TextInput::make('username')
                                            ->label('Nama Pengguna')
                                            ->required(),
                                        Textarea::make('bio')
                                            ->label('Bio')
                                            ->required()
                                            ->columnSpanFull(),
                                    ])
                                    ->columnSpan(['default' => 1, 'sm' => 2]),
                            ])
                    ])
                    ->aside()
                    ->columnSpanFull(),
            ]);
    }
}
