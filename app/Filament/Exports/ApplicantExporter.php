<?php

namespace App\Filament\Exports;

use App\Models\Applicant;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ApplicantExporter extends Exporter
{
    protected static ?string $model = Applicant::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('appplicant_name'),
            ExportColumn::make('identity_number'),
            ExportColumn::make('npwp'),
            ExportColumn::make('bpjs_kesehatan'),
            ExportColumn::make('birth_of'),
            ExportColumn::make('birth_of_date'),
            ExportColumn::make('address'),
            // Secondary
            ExportColumn::make('domisili'),
            ExportColumn::make('phone_number'),
            ExportColumn::make('wa_number'),
            ExportColumn::make('email'),
            ExportColumn::make('emergency_number'),
            ExportColumn::make('emergency_number_name'),
            ExportColumn::make('maried_status'),
            ExportColumn::make('gender'),
            ExportColumn::make('religion'),
            ExportColumn::make('height'),
            ExportColumn::make('weight'),
            ExportColumn::make('uniform_size'),
            ExportColumn::make('shoes_size'),
            // Additional Data
            ExportColumn::make('mother'),
            ExportColumn::make('father'),
            ExportColumn::make('vaccine'),
            // Education
            ExportColumn::make('education_level'),
            ExportColumn::make('graduated'),
            ExportColumn::make('major'),
            ExportColumn::make('math_value'),
            // Experience 
            ExportColumn::make('company_name'),
            ExportColumn::make('salary'),
            ExportColumn::make('position'),
            ExportColumn::make('duration'),
            ExportColumn::make('skills'),
            // Office
            ExportColumn::make('office'),
            ExportColumn::make('reference'),
            // Data Tes
            ExportColumn::make('company_id'),
            ExportColumn::make('pre_test'),
            ExportColumn::make('test1'),
            ExportColumn::make('test2'),
            ExportColumn::make('post_test1'),
            ExportColumn::make('post_test2'),
            ExportColumn::make('mcu_date'),
            ExportColumn::make('mcu_result'),
            ExportColumn::make('join_date'),
            ExportColumn::make('finished'),
            ExportColumn::make('insurance_number'),
            ExportColumn::make('status_id'),
            ExportColumn::make('information'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your applicant export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
