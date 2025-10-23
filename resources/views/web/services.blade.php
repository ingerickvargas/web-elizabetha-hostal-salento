@extends('web.layout')

@section('title', 'Servicios | Elizabetha Hostal en Salento')
@section('meta_description', 'Elizabetha Hostal ofrece servicios de calidad en Salento: WiFi, desayunos, tours, espacios cómodos y atención personalizada.')

@section('content')
<section class="relative h-[400px] overflow-hidden">
	<img src="{{ asset('storage/home/servicios-hero.png') }}"
		class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-500 ease-out"
		id="hero-image-services"
		alt="Servicios del hostal Elizabetha"
		loading="lazy">
</section>
<div class="max-w-4xl mx-auto text-center px-4 py-6">
	<h1 class="text-4xl md:text-5xl font-bold mb-4">NUESTROS SERVICIOS</h1>
	<p class="text-lg max-w-2xl mx-auto">
		Elizabetha Hostal cuenta con 5 habitaciones, un lugar con limpios espacios, comodas habitaciones, ideales para tus vacaciones, en familia o en pareja.
		Confort y tranquilidad en Salento.
	</p>
</div>
<div class="container mx-auto px-4 py-12">
	<div class="swiper services-swiper">
		<div class="swiper-wrapper">
			@foreach($services as $service)
			<div class="swiper-slide">
				<div class="group relative rounded-lg overflow-hidden shadow-lg cursor-pointer">
					<img src="{{ asset('storage/' . $service->image) }}"
						alt="{{ $service->title }}"
						loading="lazy"
						class="w-full h-112 object-cover transform transition-transform duration-500 group-hover:scale-110">
					<div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-700"></div>
					<div class="absolute bottom-0 left-0 right-0 bg-black/0 bg-opacity-40 p-3 flex justify-center transition-all duration-500 group-hover:translate-y-[-10px]">
						<h2 class="text-white text-lg font-bold text-center transition-all duration-500 group-hover:text-xl">
							{{ $service->title }}
						</h2>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="swiper-button-next !text-black-500"></div>
		<div class="swiper-button-prev !text-black-500"></div>
		<div class="swiper-pagination mt-4"></div>
	</div>
</div>
<script>
	window.addEventListener('scroll', () => {
		const heroImage = document.getElementById('hero-image-services');
		const offset = window.scrollY;
		if (heroImage) {
			heroImage.style.transform = `translateY(${offset * 0.5}px) scale(1.05)`;
		}
	});
</script>
@endsection