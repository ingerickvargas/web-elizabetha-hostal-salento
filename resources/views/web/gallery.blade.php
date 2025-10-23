@extends('web.layout')

@section('title', 'Galería | Elizabetha Hostal en Salento')
@section('meta_description', 'Explora la galería de Elizabetha Hostal en Salento. Descubre nuestras habitaciones, espacios comunes y el paisaje del Valle de Cocora.')

@section('content')
<div class="max-w-4xl mx-auto text-center px-4 py-6">
	<h1 class="text-4xl md:text-5xl font-bold mt-20 mb-4">GALERÍA</h1>
</div>
<div class="container mx-auto py-2">
	<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
		@foreach($images as $gallery)
		<a href="{{ asset('storage/' . $gallery->image) }}" class="glightbox" data-gallery="galeria">
			<img src="{{ asset('storage/' . $gallery->image) }}" class="w-full h-64 object-cover rounded-lg shadow-lg hover:scale-105 transition-transform">
		</a>
		@endforeach
	</div>
</div>
@endsection