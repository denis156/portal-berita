<?php

declare(strict_types=1);

namespace App\Filament\Resources\Banners\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\CreateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Index')
                    ->label('No.')
                    ->rowIndex()
                    ->alignCenter(),
                ImageColumn::make('news.thumbnail')
                    ->label('Thumbnail')
                    ->circular()
                    ->visibility('public')
                    ->alignCenter(),
                TextColumn::make('news.tittle')
                    ->label('Judul Berita')
                    ->weight(FontWeight::Bold)
                    ->words(5, end: '...')
                    ->searchable(),
                TextColumn::make('news.author.name')
                    ->label('Penulis')
                    ->badge()
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat')
                    ->icon('phosphor-eye')
                    ->color('info')
                    ->button(),
                EditAction::make()
                    ->label('Ubah')
                    ->icon('phosphor-pencil')
                    ->color('success')
                    ->button(),
                DeleteAction::make()
                    ->label('Hapus')
                    ->icon('phosphor-trash')
                    ->color('danger')
                    ->button(),
            ])
            ->toolbarActions([
                CreateAction::make()
                    ->label('Buat')
                    ->icon('phosphor-plus-circle')
                    ->tooltip('Buat banner baru'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->striped()
            ->defaultSort('created_at', 'desc');
    }
}
