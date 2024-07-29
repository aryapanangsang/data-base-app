<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mcu;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PDFController extends Controller
{
    public function downloadpdf()
    {
        $applicants = Applicant::all();


        $data = [
            'date' => date('m/d/Y'),
            'applicants' => $applicants
        ];

        $pdf = PDF::loadView('applicantPDF', $data);

        return $pdf->download('laporan.pdf');
    }

    public function applicantpdf($id)
    {    
        Carbon::setLocale('id');
         $applicants = Applicant::find($id);         
         $tgl_daftar = Carbon::create($applicants->birth_of_date)->isoFormat('D MMMM Y');          
         $tgl_lahir = Carbon::create($applicants->created_at)->isoFormat('D MMMM Y');          
         $data = [
            'birth_of_date' => $tgl_lahir,        
            'applicants' => $applicants,
            'tgl_daftar' => $tgl_daftar
        ];
        $pdf = PDF::loadView('formulirPDF', $data)->setPaper('a4', 'potret');          
        $named = 'Formulir' . ' ' . $applicants->appplicant_name;
        $format = $named . '.pdf';
        return $pdf->stream($format);
        // return $pdf->download($format);
    }

    public function pengantarpdf($id)
    {
        Carbon::setLocale('id');

         $mcuses = Mcu::find($id);         
         $tgl_mcu = $mcuses->tanggal_mcu;        
         $applicants = Applicant::whereDate('mcu_date',$tgl_mcu)->get();
        //  return view('pengantarPDF', );
        //  $tgl_lahir = Carbon::create($applicants->birth_of_date)->isoFormat('D MMMM Y');          
        //  $tgl_mcu = Carbon::create($applicants->mcu_date)->isoFormat('D MMMM Y');          
        //  $data = [                   
        //     'applicants' => $applicants,            
        // ];
        $pdf = PDF::loadView('pengantarPDF', compact('applicants'))->setPaper('a4', 'potret');          
        // $named = 'Formulir' . ' ' . $applicants->appplicant_name;
        // $format = $named . '.pdf';
        return $pdf->stream('pengantar');
    }
}
