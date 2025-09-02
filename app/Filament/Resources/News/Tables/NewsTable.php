<?php

declare(strict_types=1);

namespace App\Filament\Resources\News\Tables;

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
use Filament\Tables\Columns\IconColumn;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Index')
                    ->label('No.')
                    ->rowIndex()
                    ->alignCenter(),
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->circular()
                    ->visibility('public')
                    ->alignCenter(),
                TextColumn::make('tittle')
                    ->label('Judul Berita')
                    ->weight(FontWeight::Bold)
                    ->words(5, end: '...')
                    ->searchable(),
                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->badge()
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('category.tittle')
                    ->label('Kategori')
                    ->badge()
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'warning',
                        'publish' => 'success',
                        'archived' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                        'archived' => 'Archived',
                    })
                    ->alignCenter(),
                IconColumn::make('is_feature')
                    ->label('Unggulan')
                    ->boolean()
                    ->alignCenter(),
                TextColumn::make('slug')
                    ->label('Slug URL')
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->tooltip('Buat berita baru'),
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->striped()
            ->defaultSort('created_at', 'desc');
    }
}
