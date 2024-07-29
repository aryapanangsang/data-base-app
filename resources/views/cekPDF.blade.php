<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="">
        <div class="kop">
            <img src="img/kop.jpg" alt="Kop Surat">
        </div>
        <h1 class="text-center font-bold text-xl">FORMULIR PENDAFTARAN</h1>
        <div class="formilir-identitiy flex justify-center mt-3">
            <div class="text-no mt-4 font-bold mr-2 text-xl">No.</div>
            <div class="kotak w-10 h-10 border-2 border-slate-800 mx-1"></div>
            <div class="kotak w-10 h-10 border-2 border-slate-800 mr-1"></div>
            <div class="kotak w-10 h-10 border-2 border-slate-800 mr-1"></div>
            <div class="text-no mt-4 font-bold mr-2 text-xl">/FP/LPK/</div>
            <div class="kotak w-10 h-10 border-2 border-slate-800 mr-1"></div>
            <div class="kotak w-10 h-10 border-2 border-slate-800 mr-1"></div>
            <div class="kotak w-20 h-10 border-2 border-slate-800 mr-1"></div>
        </div>
    </header>

    <h3>Formulir Pendaftaran</h3>
    <br>
    <h3>Data Persoanal</h3>
    <p>Nama Lengkap : {{ $applicants->appplicant_name }}</p>
    <p>Alamat : {{ $applicants->address }}</p>
</body>

</html>
