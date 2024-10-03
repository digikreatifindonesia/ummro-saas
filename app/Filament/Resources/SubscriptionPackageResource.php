<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionPackageResource\Pages;
use App\Filament\Resources\SubscriptionPackageResource\RelationManagers;
use App\Models\FeaturePackage;
use App\Models\SubscriptionPackage;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubscriptionPackageResource extends Resource
{
    protected static ?string $model = SubscriptionPackage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Fieldset::make('Label')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Nama Paket'),


                        Forms\Components\TextInput::make('duration')
                            ->required()
                            ->numeric()
                            ->label('Durasi (Hari)'),
                    ]),

                Fieldset::make('Label')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->nullable()
                            ->label('Deskripsi Paket'),
                    ])->columns(1),

                CheckboxList::make('features')
                    ->relationship(titleAttribute: 'name'),


                Fieldset::make('Label')
                    ->schema([
                        Forms\Components\Repeater::make('prices')
                            ->relationship('prices')
                            ->schema([
                                Forms\Components\Select::make('country_id')
                                    ->relationship('country', 'name')
                                    ->required()
                                    ->label('Negara'),

                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->label('Harga'),

                                Forms\Components\TextInput::make('discount')
                                    ->nullable()
                                    ->numeric()
                                    ->label('Diskon'),

                                Forms\Components\Select::make('discount_type')
                                    ->options([
                                        'percentage' => 'Persentase',
                                        'fixed' => 'Tetap',
                                    ])
                                    ->nullable()
                                    ->label('Tipe Diskon'),
                            ])
                            ->label('Harga berdasarkan Negara'),
                    ])->columns(1),







            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->label('Nama Paket'),
                Tables\Columns\TextColumn::make('duration')->label('Durasi (Hari)'),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat Pada')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui Pada')->dateTime(),
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
            'index' => Pages\ListSubscriptionPackages::route('/'),
            'create' => Pages\CreateSubscriptionPackage::route('/create'),
            'edit' => Pages\EditSubscriptionPackage::route('/{record}/edit'),
        ];
    }
}
