<?php

namespace App\Filament\Resources\ApplicantResource\Pages;

use Filament\Actions;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Exports\ApplicantExporter;
use App\Filament\Resources\ApplicantResource;
use Filament\Actions\Exports\Enums\ExportFormat;

class EditApplicant extends EditRecord
{
    protected static string $resource = ApplicantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            ExportAction::make('Export')->label('Export')
                    ->exporter(ApplicantExporter::class)
                    
        ];
    }
}
