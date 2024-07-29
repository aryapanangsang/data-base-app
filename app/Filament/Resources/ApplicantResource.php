<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
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

class ApplicantResource extends Resource
{
    protected static ?string $model = Applicant::class;    

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';    
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([       
                Forms\Components\Section::make('Perosnal Data')         
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
                                    ->label('Nama Perusahaan')
                                    ->required(),
                                    TextInput::make('salary')
                                    ->label('Upah / Gaji')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),  
                                    TextInput::make('position')
                                    ->label('Posisi / Bagian / Jabatan')                                    
                                    ->required(),  
                                    TextInput::make('duration')
                                    ->label('Masa Kerja')
                                    ->placeholder('Cth : 2 Bulan | 1 Tahun')                                    
                                    ->required(),                                 
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
                

                Forms\Components\Section::make('Data Processed')
                ->schema([
                    Forms\Components\Select::make('company_id')                    
                        ->relationship('company', 'company_name'),
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
                    Forms\Components\Select::make('status_id')
                    ->relationship('status', 'status_name'),
                    Forms\Components\TextInput::make('information')
                        ->maxLength(255),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->headerActions([
            //     ExportAction::make('Export')->label('Export')
            //         ->exporter(ApplicantExporter::class)
            //         ->formats([
            //             ExportFormat::Xlsx,
            //         ])
            // ])
            ->columns([                                            
                Tables\Columns\TextColumn::make('appplicant_name')->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('birth_of')->label('Tempat Lahir')
                ->formatStateUsing(function ($state, Applicant $order) {
                    $tgl_daftar = Carbon::create($order->birth_of_date);
                    return $order->birth_of . ', ' . $tgl_daftar->isoFormat('D MMMM Y');
                })
                    ->searchable(),                
                // Tables\Columns\TextColumn::make('address')->label('Alamat')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('phone_number')->label('No. Hp')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('education_level')->label('Pendidikan')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('height')->label('TB')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('weight')->label('BB')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('identity_number')->label('NIK')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('npwp')->label('NPWP')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('mother')->label('IBU')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('emergency_contact')->label('Kontak Darurat')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('vaccine')->label('Vaksin')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('reference')->label('Referensi')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('office')->label('Kantor Tujuan'),
                // Tables\Columns\TextColumn::make('company.company_name')->label('Perusahaan')
                //     ->searchable()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('pre_test')->label('Pre Test')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('test1')->label('Tes 1')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('test2')->label('Tes 2')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('post_test1')->label('Post Tes 1')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('post_test2')->label('Post Tes 2')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('mcu_date')->label('Tgl. MCU')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('mcu_result')->label('Hasil MCU')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('join_date')->label('Masuk')
                //     ->date(),            
                // Tables\Columns\TextColumn::make('finished')->label('Selesai')
                //     ->date(),                                   
                // Tables\Columns\TextColumn::make('status')->label('Status')
                //     ->searchable()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('information')->label('Keterangan')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()                    
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                            //    
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
            'index' => Pages\ListApplicants::route('/'),
            'create' => Pages\CreateApplicant::route('/create'),
            'edit' => Pages\EditApplicant::route('/{record}/edit'),
        ];
    }

    // public static function infolist(Infolist $infolist): Infolist
    // {
    // return $infolist
    //     ->schema([
    //         TextEntry::make('appplicant_name')
    //         ->label('Nama Pelamar')
    //     ]);
    // }
}
