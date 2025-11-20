<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Custom CSS untuk background blur */
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('{{ asset('images/bg-blur-default.jpg') }}'); /* Ganti dengan gambar blur Anda */
                background-size: cover;
                background-position: center;
                filter: blur(8px); /* Efek blur */
                z-index: -1; /* Pastikan di belakang konten */
            }
            body {
                background: none;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased flex items-center justify-center min-h-screen relative">
        {{-- Gambar latar belakang blur akan dibuat oleh CSS di atas --}}

        <div class="relative w-full max-w-4xl mx-auto rounded-xl shadow-2xl overflow-hidden md:flex bg-white bg-opacity-90 backdrop-blur-sm">
            
            <div class="md:w-1/2 bg-cover bg-center min-h-[300px] md:min-h-[auto]" 
                 style="background-image: url('{{ asset('images/login-bg.jpg') }}');">
                <div class="p-6">
                    <img src="{{ asset('images/logo_kost_azka.png') }}" alt="Kost Azka Logo" class="h-10"> 
                </div>
            </div>

            <div class="md:w-1/2 p-8 bg-white flex flex-col justify-center">
                <div class="text-center mb-6">
                    <a href="/">
                        <img src="{{ asset('images/logo_kost_azka.png') }}" alt="Kost Azka Logo" class="h-10 mx-auto mb-4">
                        {{-- <span class="text-2xl font-bold text-gray-800">Kost Azka</span> --}}
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>