<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use App\Models\Mcu;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\McuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\McuResource\RelationManagers;

class McuResource extends Resource
{
    protected static ?string $model = Mcu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'MCU';
    protected static ?string $modelLabel = 'MCU List';
    protected static ?int $navigationSort= 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal_mcu')
                ->required()
                ->label('Tanggal MCU'),               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                ->label('No'),
                TextColumn::make('tanggal_mcu')
                ->label('Tanggal MCU')
                ->formatStateUsing(function ($state, Mcu $order) {
                    Carbon::setLocale('id');
                    $tgl_mcu = Carbon::create($order->tanggal_mcu);
                    return $tgl_mcu->isoFormat('D MMMM Y');
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('Download Pengantar')
                    ->label('Download Pengantar')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn(Mcu $record)=>route('download.pengantar',$record))
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListMcus::route('/'),
            'create' => Pages\CreateMcu::route('/create'),
            'edit' => Pages\EditMcu::route('/{record}/edit'),
        ];
    }
}
