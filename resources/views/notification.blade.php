
@extends('layout')
@section('content')


    <!-- This is an example component -->
    <h1 class="mt-20 text-center font-Bebas Neue text-5xl font-bold wrappermain">Notifications</h1>
    <div class="max-w-lg mx-auto mt-10 mb-10">
        @livewire('UserNotification')
    </div>






    @livewireStyles



    @livewireScripts

@endsection
