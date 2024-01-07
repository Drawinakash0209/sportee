{{-- @extends('layout')
@section('content')


<section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-40 mb-40">
    <h1 class="text-xl font-bold text-white capitalize dark:text-white">Account settings</h1>


    <form method="POST" action="/home">
        @csrf
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-white dark:text-gray-200" for="title">Title</label>
                <input id="title" type="text" name="title" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('title')
                    <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="location">Location</label>
                <input id="location" type="text" name="location" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('location')
                <p>{{$message}}</p>
            @enderror
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="tags">Tags</label>
                <input id="tags" type="text" name="tags" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('tags')
                <p>{{$message}}</p>
            @enderror
            </div>

            <div>
                <label class="text-white dark:text-gray-200" for="email">Email</label>
                <input id="email" type="email" name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('email')
                <p>{{$message}}</p>
            @enderror
            </div>

            
            {{-- <div>
                <label class="text-white dark:text-gray-200" for="contact_number">Contact Number</label>
                <input id="contact_number" type="text" name="contact_number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('contact_number')
                <p>{{$message}}</p>
            @enderror
            </div>
           
            <div>
                <label class="text-white dark:text-gray-200" for="Price">Price per Hour</label>
                <input id="price" type="text"name="price" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                @error('price')
                <p>{{$message}}</p>
            @enderror
            </div> --}}
         
            {{-- <div>
                <label class="text-white dark:text-gray-200" for="description">Description</label>
                <textarea id="description" type="textarea"  name=" description" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                @error('description')
                <p>{{$message}}</p>
            @enderror
            </div> --}}

            {{-- <div>
                <label class="block text-sm font-medium text-white">
                Image
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span class="">Upload a file</span>
                      <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1 text-white">or drag and drop</p>
                  </div>
                  <p class="text-xs text-white">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>
            </div> --}}
        {{-- </div>

        <div class="flex justify-end mt-6">
            <button a href="/" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section> --}}

 {{-- <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-20">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
    
    <form>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="username">Username</label>
                <input id="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Email Address</label>
                <input id="emailAddress" type="email" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                <input id="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="passwordConfirmation">Password Confirmation</label>
                <input id="passwordConfirmation" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section> --}}

{{-- 
@endsection --}} 





@extends('layout')

@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Create a Indoor
    </h2>
    <p class="mb-4">Post a Indoor to find customers</p>
</header>

<form  method="POST" action="/home">
    @csrf
    

    <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2"
            >Title</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="title"
            placeholder="Example: Etihad Indoor"
        />
        @error('title')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="location"
            class="inline-block text-lg mb-2"
            >Location</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="location"
            placeholder="Example: Kotahena, Colombo-12, etc"
        />
        @error('location')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Contact Email</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
        />

        @error('email')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="website"
            class="inline-block text-lg mb-2"
        >
            Website/Application URL
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="website"
        />

        @error('website')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>

    <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
            Tags (Comma Separated)
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="tags"
            placeholder="Example: Futsal, Cricket, Badminton"
        />

        @error('tags')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>

    <div class="mb-6">
        <label for="contact_number" class="inline-block text-lg mb-2">
            Contact number
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="contact_number"
            placeholder="Example: 011*******"
        />

        @error('contact_number')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>


    
    <div class="mb-6">
        <label for="contact_number" class="inline-block text-lg mb-2">
            Price per Hour
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="price"
            placeholder="Example: Laravel, Backend, Postgres, etc"
        />

        @error('price')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>
{{-- 
    <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
            Company Logo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="logo"
        />
    </div> --}}

    <div class="mb-6">
        <label
            for="description"
            class="inline-block text-lg mb-2"
        >
            Job Description
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="description"
            rows="10"
            placeholder="Include sports, indoor sepacialities, price, etc"
        ></textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
    
            
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit" 
            class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black">
            Create Indoor
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>

@endsection