@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Contáctanos</h2>

    <div class="max-w-lg mx-auto bg-white shadow p-8 rounded">
        <form method="POST" action="#">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Correo</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Mensaje</label>
                <textarea name="message" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                Enviar
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-700">O escríbenos directamente:</p>
            <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank"
               class="bg-green-500 text-white px-6 py-2 mt-3 inline-block rounded hover:bg-green-600">
               WhatsApp
            </a>
            <p class="mt-4 text-gray-700">Correo: {{ $settings->contact_email }}</p>
        </div>
    </div>
</div>
@endsection
