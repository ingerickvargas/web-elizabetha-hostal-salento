@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold text-center mb-8">Galería</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($images as $gallery)
            <a href="{{ asset('storage/' . $gallery->image) }}" class="glightbox" data-gallery="galeria">
				<img src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-64 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform">
			</a>
        @endforeach
    </div>
</div>
@endsection
