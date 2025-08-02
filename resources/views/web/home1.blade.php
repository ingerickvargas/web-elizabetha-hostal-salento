@extends('web.layout')

@section('content')
<div class="bg-cover bg-center h-[500px]" style="background-image: url('/images/hotel.jpg');">
    <div class="bg-black bg-opacity-50 h-full flex items-center justify-center">
        <h1 class="text-white text-5xl font-bold">Bienvenido a Nuestro Hotel</h1>
    </div>
</div>

<div class="container mx-auto py-12 text-center">
    <h2 class="text-3xl font-bold mb-4">Disfruta tu estadía con nosotros</h2>
    <p class="text-lg text-gray-600 mb-6">Te ofrecemos comodidad, tranquilidad y una experiencia inolvidable.</p>
    <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
       class="bg-green-500 text-white px-6 py-3 rounded-lg text-lg shadow hover:bg-green-600">
       Escríbenos por WhatsApp
    </a>
</div>
@endsection
