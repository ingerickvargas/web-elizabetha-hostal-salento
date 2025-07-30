@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Reseñas de Nuestros Clientes</h2>
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
