@extends('web.layout')

@section('title', 'Elizabetha Hostal | Hotel en Salento, Quindío')
@section('meta_description', 'Elizabetha Hostal en Salento: hospedaje familiar, habitaciones cómodas y económicas cerca del Valle de Cocora. Vive la experiencia del Eje Cafetero.')

@section('content')
<section class="relative h-screen w-full overflow-hidden">
	<video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
		<source src="{{ asset('storage/home/fondo.mp4') }}" type="video/mp4">
	</video>
	<div class="absolute inset-0 bg-black/35"></div>
	<div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">

		<div class="bg-darkcoffee/70 inline-block px-6 py-4 rounded-lg mb-6">
			<h1 class="hero-title">
				Vive la experiencia en Elizabetha Hostal
			</h1>
		</div>
		<div class="bg-darkcoffee/60 inline-block px-4 py-2 rounded-md mb-8">
			<p class="hero-subtitle">
				Estamos aquí para regalarte una estadía inolvidable
			</p>
		</div>
		<div class="flex space-x-4">
			<a href="#contact" class="bg-green-800 text-darkcoffee px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-green-700 transition">
				Contáctanos
			</a>
			<a href="{{ route('services') }}" class="bg-white text-darkcoffee px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-gray-200 transition">
				Nuestros Servicios
			</a>
		</div>
	</div>
</section>y
<section class="py-14 bg-white">
	<div class="container mx-auto max-w-6xl px-4">
		<div class="text-center">
			<h2 class="font-display text-4xl md:text-5xl leading-tight tracking-tight text-slate-800">
				Ambiente de comodidad y tranquilidad
			</h2>
			<p class="mt-4 text-slate-600 max-w-3xl mx-auto">
				Sumérgete en la esencia del Quindío, un tesoro natural reconocido por la UNESCO.
				Nuestro hostal está estratégicamente ubicado para explorar Salento y el Valle de Cocora.
				Disfruta de una estadía cómoda con servicios pensados para ti.
			</p>
		</div>
		<div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
			<a href="{{ route('rooms') }}" class="group relative block rounded-2xl overflow-hidden shadow-lg focus:outline-none focus:ring-2 focus:ring-green-600">
				<img
					src="{{ asset('storage/home/habitaciones-hero.png') }}"
					alt="Habitaciones"
					class="w-full h-112 object-cover transform transition-transform duration-500 group-hover:scale-110" />
				<div class="absolute inset-0 bg-black/0 transition-colors duration-500 group-hover:bg-black/50"></div>
				<div class="absolute inset-x-0 bottom-0 text-center p-5">
					<span class="block text-white font-semibold text-2xl drop-shadow">
						HABITACIONES
					</span>
				</div>
			</a>
			<a href="{{ route('services') }}" class="group relative block rounded-2xl overflow-hidden shadow-lg focus:outline-none focus:ring-2 focus:ring-green-600">
				<img
					src="{{ asset('storage/home/habitaciones-hero.png') }}"
					alt="Servicios"
					class="w-full h-112 object-cover transform transition-transform duration-500 group-hover:scale-110" />
				<div class="absolute inset-0 bg-black/0 transition-colors duration-500 group-hover:bg-black/50"></div>
				<div class="absolute inset-x-0 bottom-0 text-center p-5">
					<span class="block text-white font-semibold text-2xl drop-shadow">
						SERVICIOS
					</span>
				</div>
			</a>
			<a href="{{ route('reviews') }}" class="group relative block rounded-2xl overflow-hidden shadow-lg focus:outline-none focus:ring-2 focus:ring-green-600">
				<img
					src="{{ asset('storage/home/habitaciones-hero.png') }}"
					alt="Reseñas"
					class="w-full h-112 object-cover transform transition-transform duration-500 group-hover:scale-110" />
				<div class="absolute inset-0 bg-black/0 transition-colors duration-500 group-hover:bg-black/50"></div>
				<div class="absolute inset-x-0 bottom-0 text-center p-5">
					<span class="block text-white font-semibold text-2xl drop-shadow">
						RESEÑAS
					</span>
				</div>
			</a>
		</div>
	</div>
</section>
@endsection