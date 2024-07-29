<?php

namespace App\Filament\Resources\InternshipResource\Pages;

use App\Filament\Resources\InternshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListInternships extends ListRecords
{
    protected static string $resource = InternshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
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
