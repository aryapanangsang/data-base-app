<?php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;
use Filament\Forms\Form;
use App\Models\Applicant;
use App\Mail\FormSubmitted;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use RealRashid\SweetAlert\Facades\Alert;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;

class Home extends Component implements HasForms
{

    use InteractsWithForms;
    // Primary Data
    public $appplicant_name ='';
    public $identity_number ='';
    public $npwp ='';    
    public $bpjs_kesehatan ='';    
    public $birth_of ='';
    public $birth_of_date ='';
    public $address ='';
    // Secondary Data
    public $domisili ='';
    public $phone_number ='';
    public $wa_number ='';
    public $email ='';
    public $emergency_number ='';
    public $emergency_number_name ='';
    public $maried_status ='';
    public $gender ='';
    public $religion ='';
    public $height ='';
    public $weight ='';    
    public $uniform_size ='';    
    public $shoes_size ='';    
    // Additional Data
    public $mother ='';
    public $father ='';
    public $vaccine ='';
    // Education
    public $education_level ='';
    public $graduated ='';
    public $major ='';
    public $math_value ='';
    // Experience
    public $company_name ='';    
    public $salary ='';    
    public $position ='';    
    public $duration ='';    
    public $skills ='';
    public $office ='';
    public $reference ='';    
   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([       
                Forms\Components\Section::make('Personal Data')         
                ->description('Isi Data diri anda di sini.')
                ->schema([                        
                        TextInput::make('appplicant_name')
                        ->label('Nama Pelamar')
                        ->required()
                        ->maxLength(255),
                        TextInput::make('identity_number')
                            ->label('NIK')                                                        
                            ->required()
                            ->maxLength(16)
                            ->unique(table: Applicant::class),
                        TextInput::make('npwp')
                            ->label('NPWP')
                            ->required()
                            ->maxLength(16),
                        TextInput::make('bpjs_kesehatan')
                        // Masalahnya ada di penulisan variabel di atas. data form terbaru belum di update/dimasukan
                            ->label('No. BPJS Kesehatan') 
                            ->required()
                            ->maxLength(12),
                        TextInput::make('birth_of')
                            ->label('Tempat Lahir')
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
                            ->description('Fresh Graduated? Silahkan kosongkan saja')
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
                        ->label('Skill / Keahlian')
                        ->placeholder('Cth : Welding,Injection'),                                                                                                   
                        Select::make('office')
                            ->label('Kantor Tujuan')
                            ->options([
                                'Cikarang' => 'Cikarang',
                                'Purwakarta' => 'Purwakarta'
                            ])
                            ->required(),                        
                ])->columns(2),                
            ]);
        
    }
    

    public function render()
    {
        return view('livewire.home');
    }

    public function save(): void
    {      
        $data = $this->form->getState();                  
        Applicant::insert($data);
        // Alert::success('Frmulir Berhasil Disimpan', 'Silahkan ');
        Mail::to($this->email)->send(new FormSubmitted($data));
        session()->flash('message', 'Formulir Berhasil Dikirim');
        $this->redirectRoute('website');
    }
}
