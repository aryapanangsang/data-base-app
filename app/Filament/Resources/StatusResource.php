<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Status;
use Filament\Forms\Form;
use App\Models\Applicant;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StatusResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StatusResource\RelationManagers;

class StatusResource extends Resource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $navigationLabel = 'Proceed';
    protected static ?string $modelLabel = 'Proceed List';
    protected static ?int $navigationSort= -1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([       
            Forms\Components\Section::make('Applicant identity')         
            ->description('Put the user details in.')
            ->schema([
                    Forms\Components\TextInput::make('appplicant_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('gender')
                        ->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan'
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('birth_of')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('birth_of_date')
                        ->required(),
                    Forms\Components\TextInput::make('address')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone_number')
                        ->tel()
                        ->required()
                        ->numeric()
                        ->maxLength(255),
                    ])->columns(3),
                
                
            Forms\Components\Section::make('Additional Data')
            ->schema([
                    Forms\Components\Select::make('education_level')
                    ->options([
                        'SMK' => 'SMK',
                        'SMA' => 'SMA',
                        'MA' => 'MA'
                    ])
                    ->required(),                    
                    Forms\Components\TextInput::make('height')
                        ->required()
                        ->maxLength(3),
                    Forms\Components\TextInput::make('weight')
                        ->required()
                        ->maxLength(2),
                    Forms\Components\TextInput::make('identity_number')
                        ->required()
                        ->maxLength(16)
                        ->unique(ignoreRecord: True),
                    Forms\Components\TextInput::make('npwp')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('mother')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('emergency_contact')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('vaccine')
                        ->required()
                        ->maxLength(1),
                    Forms\Components\TextInput::make('reference')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('office')
                        ->options([
                            'Cikarang' => 'Cikarang',
                            'Perempuan' => 'Perempuan'
                        ])
                        ->required(),
            ])->columns(3),
            

            Forms\Components\Section::make('Data Processed')
            ->schema([
                Forms\Components\Select::make('company')                    
                    ->options([
                        'PT. IMC' => 'PT. IMC',
                        'PT. SSI' => 'PT. SSI',
                        'PT. CPM' => 'PT. CPM',
                        'PT. Liwayway' => 'PT. Liwayway',
                        'PT. Nippisun' => 'PT. Nippisun',
                        'PT. Webus' => 'PT. Webus',
                        'PT. Taeyong' => 'PT. Taeyong',
                        'PT. AKM' => 'PT. AKM'                            
                    ]),
                Forms\Components\TextInput::make('pre_test')                    
                    ->maxLength(255)
                    ->numeric(),
                Forms\Components\TextInput::make('test1')
                    ->maxLength(255)
                    ->numeric(),
                Forms\Components\TextInput::make('test2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('post_test1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('post_test2')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('mcu_date'),
                Forms\Components\TextInput::make('mcu_result')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('join_date'),
                Forms\Components\DatePicker::make('finished'),
                Forms\Components\Select::make('status')
                        ->relationship('status', 'status_name'),
                Forms\Components\TextInput::make('information')
                    ->maxLength(255),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('appplicant_name')->label('Nama')
                    ->searchable(),
                TextColumn::make('gender')->label('Jenis Kelamin'),
                TextColumn::make('birth_of')->label('Tempat Lahir')
                ->formatStateUsing(function ($state, Applicant $order) {
                    $tgl_daftar = Carbon::create($order->birth_of_date);
                    return $order->birth_of . ', ' . $tgl_daftar->isoFormat('D MMMM Y');
                }),
                TextColumn::make('company.company_name')->label('Perusahaan'),
                TextColumn::make('status.status_name')->label('Status')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // SelectFilter::make('company_id')
                // ->label('Perusahaan')                                       
                // ->relationship('company', 'company_name')
                // ->default(1),
                SelectFilter::make('status_id')
                ->label('Status Progres')                                       
                ->relationship('status', 'status_name')
                ->default(1)    
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('Download')
                    ->url(fn(Applicant $record)=>route('download.applicant',$record))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),                    
                ])
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
            'index' => Pages\ListStatuses::route('/'),
            'create' => Pages\CreateStatus::route('/create'),
            'edit' => Pages\EditStatus::route('/{record}/edit'),
        ];
    }
}
