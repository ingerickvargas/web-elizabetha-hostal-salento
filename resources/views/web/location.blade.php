@extends('web.layout')

@section('title', 'Ubicación | Elizabetha Hostal en Salento')
@section('meta_description', 'Estamos ubicados en el corazón de Salento, Quindío, cerca del Valle de Cocora. Encuentra cómo llegar a Elizabetha Hostal fácilmente.')

@section('content')
<section class="relative h-[400px] overflow-hidden">
	<img src="{{ asset('storage/location/header-location.jpg') }}"
		class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-500 ease-out"
		id="hero-image"
		alt="Imagen de habitaciones">
</section>
<div class="max-w-4xl mx-auto text-center px-4 py-6">
	<h1 class="text-4xl md:text-5xl font-bold mt-2 mb-4">UBICACIÓN</h1>
</div>
<div class="container mx-auto py-2">
	<div class="flex justify-center">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.7438666395424!2d-75.5720570259632!3d4.639717242185167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e388dca0951a857%3A0xc4f59116386ee3d2!2sElizabetha%20Hostal!5e0!3m2!1ses-419!2sco!4v1754061061891!5m2!1ses-419!2sco"
			width="100%"
			height="450"
			style="border:0;"
			allowfullscreen=""
			loading="lazy">
		</iframe>
	</div>
</div>
<script>
	window.addEventListener('scroll', () => {
		const heroImage = document.getElementById('hero-image');
		const offset = window.scrollY;
		if (heroImage) {
			heroImage.style.transform = `translateY(${offset * 0.5}px) scale(1.05)`;
		}
	});
</script>
@endsection