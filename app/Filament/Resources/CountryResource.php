<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Country Name'),

                Forms\Components\TextInput::make('country_code')
                    ->required()
                    ->maxLength(3)
                    ->label('Country Code'),

                Forms\Components\TextInput::make('capital')
                    ->nullable()
                    ->label('Capital'),

                Forms\Components\TextInput::make('region')
                    ->nullable()
                    ->label('Region'),

                Forms\Components\TextInput::make('phone_code')
                    ->nullable()
                    ->label('Phone Code'),

                Forms\Components\TextInput::make('currency_code')
                    ->nullable()
                    ->label('Currency Code'),

                Forms\Components\FileUpload::make('thumbnail_flag') // Menggunakan FileUpload untuk thumbnail
                ->nullable()
                    ->label('Thumbnail Flag')
                    ->disk('public') // Menentukan disk tempat file akan disimpan
                    ->directory('thumbnails') // Menentukan direktori untuk menyimpan file
                    ->preserveFilenames(), // Jika ingin menjadikannya wajib, jika tidak, bisa dihapus

                Forms\Components\Toggle::make('status') // Menggunakan Toggle untuk status
                ->label('Status')
                    ->default(true) // Default ke 'true' (aktif)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->label('Country Name'),
                Tables\Columns\TextColumn::make('country_code')->label('Country Code'),
                Tables\Columns\TextColumn::make('phone_code')->label('Phone Code'),
                Tables\Columns\TextColumn::make('name')->label('Country Name'),
                Tables\Columns\TextColumn::make('country_code')->label('Country Code'),
                Tables\Columns\TextColumn::make('capital')->label('Capital'),
                Tables\Columns\TextColumn::make('region')->label('Region'),

                Tables\Columns\BooleanColumn::make('status')->label('Status'), // Tampilkan status sebagai boolean

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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
