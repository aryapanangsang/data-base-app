<?php

namespace App\Filament\Resources\McuResource\Pages;

use App\Filament\Resources\McuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMcus extends ListRecords
{
    protected static string $resource = McuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
