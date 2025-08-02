@extends('web.layout')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-center mb-10">Nuestros Servicios</h1>

     <div class="swiper services-swiper">
        <div class="swiper-wrapper">
        	@foreach($services as $service)
				<div class="swiper-slide">
					<div class="group relative rounded-lg overflow-hidden shadow-lg cursor-pointer">
						<!-- Imagen con efecto de zoom -->
						<img src="{{ asset('storage/' . $service->image) }}"
							alt="{{ $service->title }}"
							class="w-full h-112 object-cover transform transition-transform duration-500 group-hover:scale-110">

					<!-- Overlay oscuro animado -->
						<div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-700"></div>

					<!-- Texto siempre visible abajo -->
						<div class="absolute bottom-0 left-0 right-0 bg-black/0 bg-opacity-40 p-3 flex justify-center transition-all duration-500 group-hover:translate-y-[-10px]">
							<h2 class="text-white text-lg font-bold text-center transition-all duration-500 group-hover:text-xl">
								{{ $service->title }}
							</h2>
						</div>
					</div>
				</div>
        	@endforeach
    	</div>
		 <!-- Botones de navegación -->
			<div class="swiper-button-next !text-black-500"></div>
			<div class="swiper-button-prev !text-black-500"></div>
			<div class="swiper-pagination mt-4"></div>
	 </div>
</div>
@endsection
