{{-- @include('sweetalert::alert') --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <title>Form | LPK-PBI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    {{-- @vite('resources/css/app.css', 'resources/js/app.js') --}}



</head>

<body class="register">
    <div class="banner h-dvh w-full flex justify-center bg-cover  bg-opacity-20"
        style="background-image: url('https://images.unsplash.com/photo-1554435493-93422e8220c8?q=80&w=1336&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); width:100%">
        <div
            class="absolute inset-0 w-full h-full flex flex-col items-center justify-center  bg-gray-900 bg-opacity-80">
            <img src="img/pbi.png" alt="logo" width="75px">
            <h2 class="text-white font-semibold xl:text-5xl mt-2 text-center sm:text-lg">LEMBAGA PELATIHAN KERJA</h2>
            <h2 class="text-white font-semibold text-5xl mt-2 text-center">PRIMA BUANA INDONESIA</h2>

            <a href="#form">
                <x-eva-arrow-downward-outline class="w-12 h-12 mt-14 fill-white animate-bounce" />
            </a>

        </div>
    </div>
    <div id="form" class="form flex justify-center w-dvh bg-slate-100 p-5">
        @livewire('home')
    </div>
</body>

</html>
