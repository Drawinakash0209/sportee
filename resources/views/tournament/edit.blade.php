




@extends('layout')

@section('content')

    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Indoor
            </h2>
            <p class="mb-4">Post a Tournament to find participants</p>
        </header>

        <form  method="POST" action="/tournament" enctype="multipart/form-data">
            @csrf


            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                >Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: RCL tournament"
                />
                @error('title')
                <p class="text-red-500 text-xs mt-1"> {{$message}}</p>


                @enderror
            </div>

            <div class="mb-6">
                <label for="date" class="inline-block text-lg mb-2">Date</label>
                <input
                    type="date"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tournamentDate"
                    placeholder="Select Date"
                />

                @error('date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label
                    for="noOFplayers"
                    class="inline-block text-lg mb-2"
                >
                    No of players
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="noOFplayers"
                />

                @error('noOFplayers')
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
                <label for="Entry fee" class="inline-block text-lg mb-2">
                    Entry fee
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="entry_fee"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                />

                @error('entry_fee')
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



            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Description
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
                    Create Tournament
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>

@endsection
