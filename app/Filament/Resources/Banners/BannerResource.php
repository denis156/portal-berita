<?php

declare(strict_types=1);

namespace App\Filament\Resources\Banners;

use BackedEnum;
use App\Models\Banner;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Filament\Resources\Banners\Pages\EditBanner;
use App\Filament\Resources\Banners\Pages\ListBanners;
use App\Filament\Resources\Banners\Pages\CreateBanner;
use App\Filament\Resources\Banners\Schemas\BannerForm;
use App\Filament\Resources\Banners\Tables\BannersTable;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $slug = 'banner';
    protected static ?string $modelLabel = 'Banner';
    protected static ?string $pluralModelLabel = 'Daftar Banner';
    protected static ?string $navigationLabel = 'Daftar Banner';
    // protected static string | UnitEnum | null $navigationGroup = 'Master Data';
    protected static string | BackedEnum | null $navigationIcon = 'phosphor-cards-three';

    public static function form(Schema $schema): Schema
    {
        return BannerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BannersTable::configure($table);
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
            'index' => ListBanners::route('/'),
            'create' => CreateBanner::route('/create'),
            'edit' => EditBanner::route('/{record}/edit'),
        ];
    }
}
