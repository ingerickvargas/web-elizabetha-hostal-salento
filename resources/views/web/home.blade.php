@extends('web.layout')

@section('content')
    <div class="relative w-full h-screen overflow-hidden">
        {{-- Fondo: Imagen o video --}}
        {{-- Si quieres usar imagen: --}}
        <img src="{{ asset('storage/home/fondo.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="Fondo">
        
        {{-- Si quieres usar video desde ya: --}}
        {{-- 
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('storage/home/fondo.mp4') }}" type="video/mp4">
        </video>
        --}}

        {{-- Overlay oscuro para mejorar el contraste --}}
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>

        {{-- Contenido centrado --}}
        <div class="relative z-10 flex flex-col items-center justify-center text-center text-white h-full px-6">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Vive la experiencia en El Río</h1>
            <p class="text-lg md:text-2xl mb-8">Estamos aquí para regalarte una aventura inolvidable</p>
            <div class="flex flex-col md:flex-row gap-4">
                <a href="#reservar" class="px-6 py-3 bg-transparent border-2 border-yellow-500 text-yellow-500 rounded-lg hover:bg-yellow-500 hover:text-black transition duration-300">
                    RESERVAR AHORA
                </a>
                <a href="#suites" class="px-6 py-3 bg-yellow-500 text-black rounded-lg hover:bg-yellow-600 transition duration-300">
                    NUESTRAS SUITES
                </a>
            </div>
        </div>
    </div>
@endsection
