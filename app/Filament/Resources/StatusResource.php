<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Pages\EditStatus;
use Pages\CreateStatus;
use Pages\ListStatuses;
use Filament\Forms\Form;
use App\Models\Applicant;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\ApplicantExporter;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\ExportAction;   
use Filament\Actions\Exports\Enums\ExportFormat;
use App\Filament\Resources\ApplicantResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ApplicantResource\RelationManagers;

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
                TextInput::make('appplicant_name')
                ->label('Nama Pelamar')
                ->required()
                ->maxLength(255),
                TextInput::make('identity_number')
                    ->label('NIK')
                    ->required()
                    ->maxLength(16)
                    ->unique(ignoreRecord: True),
                TextInput::make('npwp')
                    ->label('NPWP')
                    ->required()
                    ->maxLength(16),
                TextInput::make('bpjs_kesehatan')
                    ->label('No. BPJS Kesehatan')
                    ->required()
                    ->maxLength(12),
                TextInput::make('birth_of')
                    ->label('tempat_lahir')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('birth_of_date')
                    ->label('Tanggal Lahir')
                    ->required(),
                TextInput::make('address')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('domisili')
                    ->placeholder('Diisi jika tidak sesuai dengan alamat KTP')
                    ->label('Alamat Domisili')                            
                    ->maxLength(255),
                TextInput::make('phone_number')                            
                    ->label('No. HP')
                    ->required()
                    ->numeric()
                    ->maxLength(15),
                TextInput::make('wa_number')                            
                    ->label('No. WhatsApp')
                    ->required()
                    ->numeric()
                    ->maxLength(15),
                TextInput::make('email')
                    ->label('Email')                            
                    ->email()
                    ->required(),
                TextInput::make('emergency_number')
                    ->label('Telp. Darurat')
                    ->numeric()
                    ->required(),
                TextInput::make('emergency_number_name')
                    ->label('Nama Telp. Darurat')                            
                    ->required(),
                Select::make('maried_status')
                    ->options([
                        'Belum Menikah' => 'Belum Menikah',
                        'Menikah' => 'Menikah',
                    ])
                    ->label('Status Pernikahan')
                    ->required(),
                Select::make('gender')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan'
                    ])
                    ->required(),
                TextInput::make('religion')
                    ->label('Agama')
                    ->required(),
                TextInput::make('height')
                    ->required()
                    ->maxLength(3),
                TextInput::make('weight')
                    ->required()
                    ->maxLength(2),
                TextInput::make('uniform_size')
                    ->label('Ukuran Seragam')
                    ->default('-'),
                TextInput::make('shoes_size')
                    ->label('Ukuran Sepatu')
                    ->default('-'),
                TextInput::make('mother')
                    ->label('Nama Ibu')
                    ->required(),
                TextInput::make('father')
                    ->label('Nama Ayah')
                    ->required(),
                TextInput::make('vaccine')
                    ->label('Vaksin')
                    ->required()
                    ->maxLength(1),
                
                ])->columns(3),
                                
        Section::make('Additional Data')
        ->schema([
                Section::make('Educational Background')                            
                    ->schema([
                        TextInput::make('education_level')
                        ->label('Nama Sekolah')
                        ->required(),         
                        TextInput::make('graduated')
                        ->label('Tahun Lulus')
                        ->required(),
                        TextInput::make('major')
                        ->label('Jurusan / Program Keahlian')
                        ->required(),
                        TextInput::make('math_value')
                        ->label('Nilai Matematika')
                        ->placeholder('Nilai Ijazah')
                        ->numeric()
                        ->required(),   
                    ])
                    ->columns(2),

                    Section::make('Work Experience')
                        ->description('')
                        ->schema([
                            TextInput::make('company_name')
                            ->label('Nama Perusahaan'),
                            TextInput::make('salary')
                            ->label('Upah / Gaji')
                            ->numeric()
                            ->default(0),  
                            TextInput::make('position')
                            ->label('Posisi / Bagian / Jabatan'),  
                            TextInput::make('duration')
                            ->label('Masa Kerja')
                            ->placeholder('Cth : 2 Bulan | 1 Tahun'),                                 
                        ])
                        ->columns(2),                                
                TextInput::make('skills')
                ->label('Skill / Keahlian'),                                                                                                   
                Select::make('office')
                    ->label('Kantor Tujuan')
                    ->options([
                        'Cikarang' => 'Cikarang',
                        'Purwakarta' => 'Purwakarta'
                    ])
                    ->required(),
                TextInput::make('reference')
                ->label('Referensi'),
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
            'index' => ListStatuses::route('/'),
            'create' => CreateStatus::route('/create'),
            'edit' => EditStatus::route('/{record}/edit'),
        ];
    }
}
