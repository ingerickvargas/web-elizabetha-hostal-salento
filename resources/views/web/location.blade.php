@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Ubicación</h2>
    <div class="flex justify-center">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.925055529136!2d-75.6809027!3d4.5354451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e387f62a736e2c1%3A0x1111111111111111!2sTuHotel!5e0!3m2!1ses!2sco!4v0000000000000"
            width="100%"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</div>
@endsection
