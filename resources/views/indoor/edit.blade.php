

@extends('layout')

@section('content')

<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Edit your Indoor details
    </h2>
    <p class="mb-4">{{$indoors->title}}</p>
</header>

<form  method="POST" action="/home/{{$indoors->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2"
            >Title</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="title"
            placeholder="Example: Etihad Indoor"
            value="{{$indoors->title}}"
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
            value="{{$indoors->location}}"
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
            value="{{$indoors->email}}"
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
            value="{{$indoors->website}}"
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
            value="{{$indoors->tags}}"
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
            value="{{$indoors->contact_number}}"
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
            value="{{$indoors->price}}"
        />

        @error('price')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>


        @enderror
    </div>

    <div class="mb-6">
        <label for="photo" class="inline-block text-lg mb-2">
            Image
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="photo"
        />

        @error('photo')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>


        @enderror
    </div>

    <div>
        <label for="photo" class="inline-block text-lg mb-2">
            Gallery
        </label>

        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="gallery[]"
            multiple
            id="multgaller"
        />

        @error('gallery[]')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>


        @enderror

    </div>

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
                placeholder="Include sports, indoor specialties, price, etc">
            {{$indoors->description}}
         </textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1"> {{$message}}</p>


        @enderror
    </div>

    <div class="mb-6">
        <button type="submit"
            class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black">
            Edit Indoor
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>

@endsection
