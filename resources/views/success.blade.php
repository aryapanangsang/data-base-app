<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <title>Form | LPK-PBI</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-center text-green-600">Terimakasih</h2>
        <p class="mt-4 text-center text-gray-700">
            Formulir Berhasil Dikirim. Silahkan Tunggu Proses Selanjutnya.
        </p>
        <div class="mt-6 text-center">
            <a href="https://lpkprimabuanaindonesia.com"
                class="bg-black text-blue px-4 py-2 rounded-lg hover:bg-blue-600">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>

</html>
