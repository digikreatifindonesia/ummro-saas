<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturePackageResource\Pages;
use App\Filament\Resources\FeaturePackageResource\RelationManagers;
use App\Models\FeaturePackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeaturePackageResource extends Resource
{
    protected static ?string $model = FeaturePackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Feature Name'),
                Forms\Components\Textarea::make('description')
                    ->label('Feature Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->label('Feature Name'),
                Tables\Columns\TextColumn::make('description')->label('Description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListFeaturePackages::route('/'),
            'create' => Pages\CreateFeaturePackage::route('/create'),
            'edit' => Pages\EditFeaturePackage::route('/{record}/edit'),
        ];
    }
}
