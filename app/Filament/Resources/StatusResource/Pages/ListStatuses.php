<?php

namespace App\Filament\Resources\StatusResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Pages\Actions\ButtonAction;
use Filament\Pages\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StatusResource;

class ListStatuses extends ListRecords
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
            // ButtonAction::make('Laporan Pdf')->url(fn()=>route('download.tes'))
            //     ->openUrlInNewTab(),
            // Actions\CreateAction::make()

        ];
    }

    public function getTabs() : array
    {
        return [ 
            'IMC' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 1)),
            'CPM' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 2)),
            'SSI' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 3)),
            'NIP' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 4)),
            'LWWY' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 5)),
            'WPI' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 6)),
            'TGP' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 7)),
            'AKM' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 8)),
            'A&P' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('company_id', 9)),
        ];
    }
}
