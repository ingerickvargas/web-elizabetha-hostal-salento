@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Nuestros Servicios</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($services as $service)
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-bold mb-2">{{ $service->name }}</h3>
                <p class="text-gray-600">{{ $service->description }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
