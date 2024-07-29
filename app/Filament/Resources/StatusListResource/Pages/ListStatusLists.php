<?php

namespace App\Filament\Resources\StatusListResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\StatusListResource;

class ListStatusLists extends ListRecords
{
    protected static string $resource = StatusListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }    
}
