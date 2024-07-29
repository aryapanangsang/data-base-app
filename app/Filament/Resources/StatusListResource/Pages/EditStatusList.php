<?php

namespace App\Filament\Resources\StatusListResource\Pages;

use App\Filament\Resources\StatusListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusList extends EditRecord
{
    protected static string $resource = StatusListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
