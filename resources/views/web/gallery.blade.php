@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Galería</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($images as $image)
            <div class="overflow-hidden rounded-lg shadow-lg">
                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->title }}" class="w-full h-64 object-cover transform hover:scale-105 transition">
            </div>
        @endforeach
    </div>
</div>
@endsection
