@extends('web.layout')

@section('content')
<div class="container mx-auto py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Ubicación</h2>
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
@endsection
