<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elizabetha Hostal</title>
    @vite('resources/css/app.css')
</head>
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
				<a href="{{ url('/reviews') }}" class="hover:text-blue-600">Reseñas</a>
				<a href="{{ url('/location') }}" class="hover:text-blue-600">Ubicación</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white shadow mt-12 py-6 text-center">
        <p class="text-gray-600">&copy; {{ date('Y') }} Hotel. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
