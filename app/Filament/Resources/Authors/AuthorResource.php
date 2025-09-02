<?php

declare(strict_types=1);

namespace App\Filament\Resources\Authors;

use BackedEnum;
use App\Models\Author;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\Authors\Pages\EditAuthor;
use App\Filament\Resources\Authors\Pages\ListAuthors;
use App\Filament\Resources\Authors\Pages\CreateAuthor;
use App\Filament\Resources\Authors\Schemas\AuthorForm;
use App\Filament\Resources\Authors\Tables\AuthorsTable;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?int $navigationSort = 1;
    protected static int $globalSearchResultsLimit = 5;

    protected static ?string $slug = 'penulis';
    protected static ?string $modelLabel = 'Penulis';
    protected static ?string $pluralModelLabel = 'Daftar Penulis';
    protected static ?string $navigationLabel = 'Daftar Penulis';
    // protected static string | UnitEnum | null $navigationGroup = 'Master Data';
    protected static string | BackedEnum | null $navigationIcon = 'phosphor-user-list';

    protected static ?string $recordTitleAttribute = 'username';

    public static function form(Schema $schema): Schema
    {
        return AuthorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AuthorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAuthors::route('/'),
            'create' => CreateAuthor::route('/create'),
            'edit' => EditAuthor::route('/{record}/edit'),
        ];
    }
}
