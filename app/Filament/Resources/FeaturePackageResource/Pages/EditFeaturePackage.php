<?php

namespace App\Filament\Resources\FeaturePackageResource\Pages;

use App\Filament\Resources\FeaturePackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeaturePackage extends EditRecord
{
    protected static string $resource = FeaturePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
