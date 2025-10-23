@extends('web.layout')

@section('content')
<div class="max-w-4xl mx-auto text-center px-4 py-6">
	<h1 class="text-4xl md:text-5xl font-bold mt-18 mb-4">RESEÑAS DE NUESTROS CLIENTES</h1>
</div>
<div class="container mx-auto py-2">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($reviews as $review)
            <div class="bg-white shadow p-6 rounded-lg">
                <p class="text-gray-700 italic">"{{ $review->comment }}"</p>
                <p class="mt-4 font-bold">- {{ $review->name }}</p>
                <p class="text-yellow-500">{{ str_repeat('★', $review->rating) }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
