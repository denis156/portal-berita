<?php

declare(strict_types=1);

namespace App\Filament\Resources\News;

use BackedEnum;
use App\Models\News;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Filament\Resources\News\Pages\EditNews;
use App\Filament\Resources\News\Pages\ListNews;
use App\Filament\Resources\News\Pages\CreateNews;
use App\Filament\Resources\News\Schemas\NewsForm;
use App\Filament\Resources\News\Tables\NewsTable;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?int $navigationSort = 1;
    protected static int $globalSearchResultsLimit = 5;

    protected static ?string $slug = 'berita';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Daftar Berita';
    protected static ?string $navigationLabel = 'Daftar Berita';
    // protected static string | UnitEnum | null $navigationGroup = 'Master Data';
    protected static string | BackedEnum | null $navigationIcon = 'phosphor-newspaper';

    protected static ?string $recordTitleAttribute = 'tittle';

    public static function form(Schema $schema): Schema
    {
        return NewsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsTable::configure($table);
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
            'index' => ListNews::route('/'),
            'create' => CreateNews::route('/create'),
            'edit' => EditNews::route('/{record}/edit'),
        ];
    }
}
