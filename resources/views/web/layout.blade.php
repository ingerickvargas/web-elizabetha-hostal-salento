<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elizabetha Hostal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-white shadow py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">Elizabetha Hostal</a>
            <div class="space-x-4">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Inicio</a>
                <a href="{{ route('services') }}" class="hover:text-blue-600">Servicios</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-600">Contacto</a>
				<a href="{{ route('gallery') }}" class="hover:text-blue-600">Galería</a>
				<a href="{{ route('reviews') }}" class="hover:text-blue-600">Reseñas</a>
				<a href="{{ route('location') }}" class="hover:text-blue-600">Ubicación</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
	<!-- BOTÓN FLOTANTE DE WHATSAPP -->
	@php
		$whatsapp = site_setting('whatsapp', '573000000000');
		$message = urlencode(site_setting('default_message', 'Hola, estoy interesado.'));
	@endphp
	<a href="https://wa.me/{{ $whatsapp }}?text={{ $message }}" 
		class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full p-4 shadow-lg animate-bounce transition-transform duration-300"
		target="_blank" style="z-index: 9999;"
		aria-label="WhatsApp">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-8 h-8 fill-current">
			<path d="M16 .8C7.2.8.1 7.9.1 16.6c0 2.9.8 5.8 2.3 8.2L.1 31.8l7.3-2.3c2.3 1.3 5 2 7.7 2 8.8 0 15.9-7.1 15.9-15.8S24.8.8 16 .8zm0 28.7c-2.5 0-5-0.7-7.2-2l-0.5-0.3-4.3 1.3 1.3-4.2-0.3-0.5c-1.4-2.2-2.1-4.7-2.1-7.3C3 8.5 8.9 2.6 16 2.6S29 8.5 29 16.6 23.1 29.5 16 29.5zm8.4-9.6c-0.5-0.2-3-1.5-3.5-1.7-0.5-0.2-0.8-0.2-1.1.3s-1.3 1.7-1.6 2.1c-0.3 0.3-0.6 0.3-1.1 0.1s-2.1-0.8-4-2.5c-1.5-1.3-2.5-3-2.8-3.5s0-0.8.2-1c0.2-0.2 0.5-0.6 0.7-0.8s0.3-0.5 0.5-0.8c0.2-0.3 0.1-0.6 0-0.8s-1.1-2.6-1.5-3.5c-0.4-0.9-0.8-0.8-1.1-0.8H8.7c-0.3 0-0.8.1-1.1.4s-1.4 1.3-1.4 3.1c0 1.8 1.4 3.6 1.6 3.9s2.7 4.4 6.6 6.2c0.9 0.4 1.5 0.7 2 0.9.8 0.3 1.5 0.3 2.1 0.2.7-0.1 2.1-0.8 2.4-1.6.3-0.8.3-1.5.2-1.6s-0.4-0.2-0.9-0.4z"/>
		</svg>
	</a>

    <!-- FOOTER -->
<footer class="bg-gray-900 text-white mt-12">
    <div class="container mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo -->
        <div>
			<i class="fa-solid fa-hotel" alt="Elizabetha Hostal" class="w-32 mb-4"></i>
            <p class="text-gray-400">Tu mejor opción para hospedarte en Salento. Confort, calidez y el mejor servicio.</p>
        </div>

        <!-- Información de contacto -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Información de Contacto</h3>
            <ul class="space-y-2 text-gray-300">
                <li><i class="fas fa-phone-alt"></i> {{ site_setting('whatsapp', '+573104639764') }}</li>
                <li><i class="fas fa-envelope"></i> {{ site_setting('contact_email', 'hostalelzorzal@gmail.com') }}</li>
                <li><i class="fas fa-map-marker-alt"></i> Cl 5 #0-1 Salento, Quindío</li>
            </ul>
        </div>
		<!-- Redes sociales -->
		<div>
			<h3 class="text-lg font-semibold mb-4">Nuestras Redes Sociales</h3>
			<div class="flex space-x-4">
				<a href="{{ site_setting('facebook') }}" target="_blank" rel="noopener noreferrer" class="bg-orange-500 p-2 rounded-full hover:bg-orange-600">
					<i class="fab fa-facebook-f text-white"></i>
				</a>
				<a href="{{ site_setting('instagram') }}" target="_blank" rel="noopener noreferrer" class="bg-orange-500 p-2 rounded-full hover:bg-orange-600">
					<i class="fab fa-instagram text-white"></i>
				</a>
			</div>
		</div>

        <!-- Suscripción -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Vive Salento con Nosotros</h3>
            <p class="text-gray-400 mb-4">Entérate de nuestras promociones y novedades</p>
            <form action="#" method="POST" class="flex">
                <input type="email" name="email" placeholder="Email" class="p-2 rounded-l bg-gray-800 text-white focus:outline-none w-full">
                <button type="submit" class="bg-orange-500 px-4 py-2 rounded-r hover:bg-orange-600">Suscribirse</button>
            </form>
        </div>
    </div>

    <div class="bg-gray-800 text-center py-4">
        <p class="text-gray-500">&copy; {{ date('Y') }} Elizabetha Hostal. Todos los derechos reservados.</p>
    </div>
</footer>


</body>
</html>
