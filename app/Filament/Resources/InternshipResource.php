<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Applicant;
use App\Models\Internship;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InternshipResource\Pages;
use App\Filament\Resources\InternshipResource\RelationManagers;

class InternshipResource extends Resource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Internship';
    protected static ?string $modelLabel = 'Internship List';
    protected static ?int $navigationSort= 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('appplicant_name')
                ->label('Applicant Name')
                ->disabled(),
                TextInput::make('insurance_number')                    
                    ->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('appplicant_name')
                ->searchable(),
                TextColumn::make('join_date')
                ->formatStateUsing(function ($state, Applicant $order) {
                    $tgl_daftar = Carbon::create($order->birth_of_date);
                    return $tgl_daftar->isoFormat('D MMMM Y');
                }),
                TextColumn::make('finished')
                ->formatStateUsing(function ($state, Applicant $order) {
                    $tgl_daftar = Carbon::create($order->birth_of_date);
                    return $tgl_daftar->isoFormat('D MMMM Y');
                }),
                TextColumn::make('insurance_number')

            ])
            ->filters([
            SelectFilter::make('status_id')
                ->label('Status Progres')                                       
                ->relationship('status', 'status_name')
                ->default(8)                 
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),  
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
            'index' => Pages\ListInternships::route('/'),
            'create' => Pages\CreateInternship::route('/create'),
            'edit' => Pages\EditInternship::route('/{record}/edit'),
        ];
    }
}
