

@extends('layout')
@section('content')



<section class="w-screen my-40">
  
    <div class="m-4 mx-auto max-w-screen-lg rounded-md border border-gray-100 text-gray-600 shadow-md">
      <div class="relative flex h-full flex-col text-gray-600 md:flex-row">
        <div class="relative p-8 md:w-4/6"> 
            <p class="text-md font-medium text-indigo-500"><i class="fa-solid fa-location-dot"></i> {{$indoors['location']}}</p>
          <div class="flex flex-col md:flex-row">
            
            <h2 class="mb-2 text-2xl font-black">{{$indoors->title}}</h2>
          </div>
          <p class="mt-3 font-sans text-base tracking-normal">{{$indoors->description}}</p>
          <div class="flex flex-col md:flex-row md:items-end">
            <p class="mt-6 text-4xl font-black">$70<sup class="align-super text-sm">00</sup></p>
            <span class="ml-2 text-xs uppercase">258 Sales</span>
          </div>
          <div class="mt-8 flex flex-col sm:flex-row">
            <button class="mr-2 mb-4 flex cursor-pointer items-center justify-center rounded-md bg-emerald-400 py-2 px-8 text-center text-white transition duration-150 ease-in-out hover:translate-y-1 hover:bg-emerald-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              Buy now
            </button>
            <button class="mr-2 mb-4 flex cursor-pointer items-center justify-center rounded-md border py-2 px-8 text-center text-gray-500 transition duration-150 ease-in-out hover:translate-y-1 hover:bg-rose-500 hover:text-white">Preview</button>
          </div>
        </div>
        <div class="mx-auto flex items-center px-5 pt-1 md:p-8">
          <img class="block h-auto max-w-full rounded-md shadow-lg" src="/images/CR7.png" alt="Shop image" />
        </div>
      </div>
    </div>

    {{-- <a href="/home/{{$indoors->id}}/edit" class="text-blue-500">Edit</a> --}}


    {{-- <form action="/home/{{$indoors->id}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="text-red-500">Delete</button>
    
    </section> --}}
    @endsection
    
