<?php

use App\Models\Applicant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('view', function(){
    $applicants = Applicant::first();
       return view('formulirPDF', [
        'date' => date('m/d/Y'),
       'applicants' => $applicants
    ]);
});

Route::get('download', [PDFController::class, 'downloadpdf'])->name('download.tes');
Route::get('download/{id}', [PDFController::class, 'applicantpdf'])->name('download.applicant');
Route::get('pengantar/{id}', [PDFController::class, 'pengantarpdf'])->name('download.pengantar');

Route::get('/external-redirect', function () {
    return redirect()->away('https://lpkprimabuanaindonesia.com');
})->name('website');
