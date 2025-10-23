@extends('web.layout')

@section('title', 'Habitaciones | Elizabetha Hostal en Salento')
@section('meta_description', 'Conoce nuestras habitaciones en Elizabetha Hostal, Salento. Opciones privadas y familiares con baño, vistas al Valle de Cocora y todas las comodidades.')

@section('content')
<section class="relative h-[400px] overflow-hidden">
	<img src="{{ asset('storage/home/habitaciones-hero.png') }}"
		class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-500 ease-out"
		id="hero-image"
		loading="lazy"
		alt="Imagen de habitaciones">
</section>
<div class="max-w-4xl mx-auto text-center px-4 py-6">
	<h1 class="text-4xl md:text-5xl font-bold mb-4">HABITACIONES</h1>
	<p class="text-lg max-w-2xl mx-auto">
		Elizabetha Hostal cuenta con 5 habitaciones, un lugar con limpios espacios, comodas habitaciones, ideales para tus vacaciones, en familia o en pareja.
		Confort y tranquilidad en Salento.
	</p>
</div>
<div class="container mx-auto px-4 py-10 max-w-7xl">
	@if($featuredRoom)
	<div class="mb-16">
		<div class="grid grid-cols-1 lg:grid-cols-4 gap-2">
			<div class="lg:col-span-3 grid grid-cols-4 gap-2 relative">
				<div class="col-span-4 lg:col-span-2 row-span-2 relative">
					<img src="{{ asset('storage/' . $featuredRoom->image) }}"
						alt="{{ $featuredRoom->name }}"
						loading="lazy"
						class="w-full h-[408px] object-cover rounded-lg cursor-pointer"
						onclick="openLightbox({{ $featuredRoom->id }}, 0)">
				</div>
				@foreach($featuredRoom->images->take(4) as $index => $image)
				<div class="relative">
					<img src="{{ asset('storage/' . $image->image) }}"
						alt="Imagen de {{ $featuredRoom->name }}"
						loading="lazy"
						class="w-full h-[200px] object-cover rounded-lg cursor-pointer"
						onclick="openLightbox({{ $featuredRoom->id }}, {{ $index + 1 }})">
					@if($loop->last && $featuredRoom->images->count() > 4)
					<div class="absolute inset-0 bg-black/60 bg-opacity-30 hover:bg-opacity-50 flex items-center justify-center rounded-lg cursor-pointer transition duration-300"
						onclick="openLightboxGallery({{ $featuredRoom->id }})">
						<span class="text-white text-lg font-semibold">Ver todas las fotos</span>
					</div>
					@endif
				</div>
				@endforeach
			</div>
			<div class="lg:col-span-1 bg-green-900 text-white p-6 rounded-lg flex flex-col justify-between">
				<div>
					<h3 class="text-2xl font-bold mb-4 text-center">{{ $featuredRoom->name }}</h3>
					<p class="mb-6 text-center">{{ $featuredRoom->description }}</p>
					<p class="text-2xl font-semibold mb-6 text-center">
						${{ number_format($featuredRoom->price, 0, ',', '.') }} <span class="text-lg opacity-80">/ noche</span>
					</p>
				</div>
				<a href="javascript:void(0)" onclick="openRoomModal({{ $featuredRoom->id }})"
					class="bg-white text-green-900 font-semibold py-3 rounded-lg hover:bg-gray-100 text-center">
					Leer más
				</a>
			</div>
		</div>
	</div>
	@endif
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
		@foreach($rooms as $room)
		<div class="rounded-lg overflow-hidden shadow-lg group">
			<img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" loading="lazy" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
			<div class="p-4">
				<h3 class="text-xl font-bold mb-2">{{ $room->name }}</h3>
				<p class="text-gray-600 mb-4">{{ Str::limit($room->description, 100) }}</p>
				<div class="flex justify-between items-center">
					<span class="text-lg font-semibold mb-4">${{ number_format($room->price, 0, ',', '.') }} / noche</span>
					<a href="javascript:void(0)" onclick="openRoomModal({{ $room->id }})"
						class="bg-green-950 text-white font-semibold px-4 py-2 rounded-lg hover:bg-green-700">Leer más</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center hidden z-50">
	<button class="absolute top-4 right-8 text-white text-3xl cursor-pointer" onclick="closeLightbox()">&times;</button>
	<button class="absolute left-4 text-white text-4xl px-2" onclick="prevImage()">&#10094;</button>
	<button class="absolute right-4 text-white text-4xl px-2" onclick="nextImage()">&#10095;</button>
	<img id="lightbox-img" src="" class="max-h-[90%] max-w-[90%] rounded-lg transition-all duration-300">
	<div id="lightbox-counter" class="absolute bottom-4 text-white text-lg bg-black bg-opacity-50 px-3 py-1 rounded">
		1 / 1
	</div>
</div>
<div id="room-modal" class="fixed inset-0 bg-black/70 hidden z-[60]">
	<div class="absolute inset-0 flex items-center justify-center p-4">
		<div class="bg-white w-full max-w-5xl rounded-xl shadow-xl overflow-hidden relative">
			<button onclick="closeRoomModal()"
				class="absolute top-3 right-3 text-2xl leading-none text-gray-600 hover:text-black">
				&times;
			</button>
			<div class="grid grid-cols-1 lg:grid-cols-2 gap-0 max-h-[85vh] overflow-y-auto">
				<div class="bg-gray-50 p-4">
					<div class="relative">
						<img id="room-modal-main" src="" alt="Imagen habitación" loading="lazy"
							class="w-full h-[320px] lg:h-[420px] object-cover rounded-lg">

						<button onclick="roomPrevImg()"
							class="hidden lg:flex absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 text-white text-2xl px-2 rounded">
							&#10094;
						</button>
						<button onclick="roomNextImg()"
							class="hidden lg:flex absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 text-white text-2xl px-2 rounded">
							&#10095;
						</button>
					</div>

					<div id="room-modal-thumbs"
						class="mt-3 grid grid-cols-6 gap-2">
					</div>
				</div>
				<div class="p-6 space-y-5">
					<div>
						<h3 id="room-modal-name" class="text-2xl font-bold text-gray-900">Habitación</h3>
						<p id="room-modal-price" class="text-lg text-green-700 font-semibold mt-1"></p>
					</div>

					<p id="room-modal-desc" class="text-gray-700"></p>

					<div id="room-modal-size" class="text-gray-700"></div>
					<div id="room-modal-bed" class="text-gray-700"></div>
					<div id="room-modal-bathroom" class="text-gray-700"></div>

					<div id="room-modal-views" class="text-gray-700"></div>

					<div id="room-modal-bath-items" class="text-gray-700"></div>

					<div id="room-modal-services" class="text-gray-700"></div>

					<div id="room-modal-smoke" class="text-gray-700"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	let currentImages = [];
	let currentIndex = 0;
	let roomData = null;
	let roomImages = [];
	let roomImgIndex = 0;

	function openLightbox(roomId, index) {
		fetch(`/rooms/${roomId}/images`)
			.then(response => response.json())
			.then(images => {
				currentImages = images;
				currentIndex = index;
				showImage();
				document.getElementById('lightbox').classList.remove('hidden');
			});
	}

	function openLightboxGallery(roomId) {
		openLightbox(roomId, 0);
	}

	function showImage() {
		document.getElementById('lightbox-img').src = currentImages[currentIndex];
		document.getElementById('lightbox-counter').innerText = (currentIndex + 1) + ' / ' + currentImages.length;
	}

	function prevImage() {
		currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
		showImage();
	}

	function nextImage() {
		currentIndex = (currentIndex + 1) % currentImages.length;
		showImage();
	}

	function closeLightbox() {
		document.getElementById('lightbox').classList.add('hidden');
	}

	document.addEventListener('keydown', function(event) {
		const lightbox = document.getElementById('lightbox');
		if (!lightbox.classList.contains('hidden')) {
			if (event.key === 'ArrowLeft') {
				prevImage();
			} else if (event.key === 'ArrowRight') {
				nextImage();
			} else if (event.key === 'Escape') {
				closeLightbox();
			}
		}
	});

	window.addEventListener('scroll', () => {
		const heroImage = document.getElementById('hero-image');
		const offset = window.scrollY;
		if (heroImage) {
			heroImage.style.transform = `translateY(${offset * 0.5}px) scale(1.05)`;
		}
	});

	function openRoomModal(roomId) {
		document.getElementById('room-modal').classList.remove('hidden');

		fetch(`/rooms/${roomId}/details`)
			.then(r => {
				if (!r.ok) throw new Error('No se pudieron cargar los datos de la habitación');
				return r.json();
			})
			.then(data => {
				roomData = data;
				roomImages = data.images || [];
				roomImgIndex = 0;
				renderRoomModal();
			})
			.catch(err => {
				console.error(err);
				closeRoomModal();
				alert('No se pudo cargar la información de la habitación.');
			});
	}

	function closeRoomModal() {
		document.getElementById('room-modal').classList.add('hidden');
		roomData = null;
		roomImages = [];
		roomImgIndex = 0;
	}

	function renderRoomModal() {
		if (!roomData) return;
		byId('room-modal-name').innerText = roomData.name || 'Habitación';
		byId('room-modal-price').innerText = roomData.price ?
			`$${Number(roomData.price).toLocaleString('es-CO')} / noche` :
			'';
		byId('room-modal-desc').innerText = roomData.description || '';
		byId('room-modal-size').innerHTML = roomData.size_m2 ?
			`<span class="font-semibold">Tamaño:</span> ${roomData.size_m2} m²` :
			'';
		byId('room-modal-bed').innerHTML = roomData.bed_type ?
			`<span class="font-semibold">Camas:</span> ${roomData.bed_type}` :
			'';
		let bathTypeText = '';
		if (roomData.bathroom_type === 'privado') bathTypeText = 'Baño privado';
		else if (roomData.bathroom_type === 'compartido') bathTypeText = 'Baño compartido';
		byId('room-modal-bathroom').innerHTML = bathTypeText ?
			`<span class="font-semibold">Baño:</span> ${bathTypeText}` :
			'';
		const views = Array.isArray(roomData.views) ? roomData.views : [];
		byId('room-modal-views').innerHTML = views.length ?
			`<div><span class="font-semibold">Vista:</span>
			<ul class="list-disc ml-5 mt-1">${views.map(v => `<li>${escapeHtml(v)}</li>`).join('')}</ul>
			</div>` :
			'';
		const priv = Array.isArray(roomData.bathroom_items_private) ? roomData.bathroom_items_private : [];
		const shared = Array.isArray(roomData.bathroom_items_shared) ? roomData.bathroom_items_shared : [];
		let bathItemsHtml = '';
		if (priv.length) {
			bathItemsHtml += `<div class="mt-3">
			<span class="font-semibold">En el baño privado:</span>
			<ul class="list-disc ml-5 mt-1">${priv.map(i => `<li>${escapeHtml(labelize(i))}</li>`).join('')}</ul>
		</div>`;
		}
		if (shared.length) {
			bathItemsHtml += `<div class="mt-3">
			<span class="font-semibold">En el baño compartido:</span>
			<ul class="list-disc ml-5 mt-1">${shared.map(i => `<li>${escapeHtml(labelize(i))}</li>`).join('')}</ul>
		</div>`;
		}
		byId('room-modal-bath-items').innerHTML = bathItemsHtml;

		const services = Array.isArray(roomData.services) ? roomData.services : [];
		byId('room-modal-services').innerHTML = services.length ?
			`<div>
				<span class="font-semibold">Servicios:</span>
				<ul class="list-disc ml-5 mt-1">${services.map(s => `<li>${escapeHtml(labelize(s))}</li>`).join('')}</ul>
			</div>` :
			'';
		byId('room-modal-smoke').innerHTML = roomData.smoke_policy ?
			`<span class="font-semibold">Política de humo:</span> ${escapeHtml(roomData.smoke_policy)}` :
			'';
		const main = byId('room-modal-main');
		main.src = (roomImages[0] || '');

		renderRoomThumbs();
	}

	function renderRoomThumbs() {
		const cont = byId('room-modal-thumbs');
		cont.innerHTML = '';
		if (!roomImages.length) return;

		roomImages.forEach((src, idx) => {
			const btn = document.createElement('button');
			btn.className = `border-2 rounded overflow-hidden focus:outline-none
						${idx === roomImgIndex ? 'border-green-600' : 'border-transparent'}`;
			btn.onclick = () => {
				roomImgIndex = idx;
				updateRoomMain();
			};
			btn.innerHTML = `<img src="${src}" class="w-full h-[64px] object-cover">`;
			cont.appendChild(btn);
		});
	}

	function updateRoomMain() {
		byId('room-modal-main').src = roomImages[roomImgIndex] || '';
		renderRoomThumbs();
	}

	function roomPrevImg() {
		if (!roomImages.length) return;
		roomImgIndex = (roomImgIndex - 1 + roomImages.length) % roomImages.length;
		updateRoomMain();
	}

	function roomNextImg() {
		if (!roomImages.length) return;
		roomImgIndex = (roomImgIndex + 1) % roomImages.length;
		updateRoomMain();
	}

	function byId(id) {
		return document.getElementById(id);
	}

	function escapeHtml(s = '') {
		return String(s).replace(/[&<>"']/g, m => ({
			'&': '&amp;',
			'<': '&lt;',
			'>': '&gt;',
			'"': '&quot;',
			"'": '&#039;'
		} [m]));
	}

	function labelize(key = '') {
		return String(key).replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
	}

	document.addEventListener('keydown', (e) => {
		const modal = document.getElementById('room-modal');
		if (!modal.classList.contains('hidden') && e.key === 'Escape') closeRoomModal();
	});
	document.getElementById('room-modal').addEventListener('click', (e) => {
		if (e.target.id === 'room-modal') closeRoomModal();
	});
</script>
@endsection