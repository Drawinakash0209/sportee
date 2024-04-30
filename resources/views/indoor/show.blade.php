

@extends('layout')
@section('content')


    <style>
        [x-cloak] {
            display: none;
        }
    </style>



        <!-- Jumbotron -->
        <div class="relative overflow-hidden bg-cover bg-no-repeat" style="
        background-position: 50%;
        background-image: url('{{ $indoors->photo ? asset('storage/' . $indoors->photo) : asset('/images/CR7.png') }}');
        height: 500px;
      ">

        <div
                class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-[hsla(0,0%,0%,0.50)] bg-fixed">
                <div class="flex h-full items-center justify-center">
                    <div class="px-6 text-center text-white md:px-12">
                        <h1 class="mt-2 mb-16 text-5xl font-bold tracking-tight md:text-6xl xl:text-7xl">
                            {{$indoors->title}} <br /><span >{{$indoors['location']}}</span>
                        </h1>

                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->




{{--        Tabs       --}}
        <div class="flex w-full md:max-w-xl mx-4 rounded shadow">
            <a href="#" aria-current="false"
               class="w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                Bookings
            </a>

            <a href="#" aria-current="page"
               class="w-full flex justify-center font-medium px-5 py-2 border-t border-b bg-gray-900 text-white  border-gray-900 hover:bg-gray-800">
                Location
            </a>

            <a href="#" aria-current="false"
               class="w-full flex items-center gap-x-2 justify-center font-medium rounded-r px-5 py-2 border bg-white text-gray-800 border-gray-200 hover:bg-gray-100">
                About
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z">
                    </path>
                </svg>
            </a>
        </div>





    <div class="bg-white ">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto mt-10 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                <div class="p-8 sm:p-10 lg:flex-auto">
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900">Location and Opening Times</h3>
                    <p class="mt-6 text-base leading-7 text-gray-600">{{$indoors['location']}}</p>
                    <div class="flex flex-wrap justify-left">
                        <div class="w-full md:max-w-md mx-4 mt-8">
                            <div class="antialiased sans-serif ">
                                <ul class="divide-y divide-gray-200">
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Sun</div>
                                        <div class="w-2/3 text-gray-800">9:00am - 8:00pm</div>
                                    </li>
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Mon</div>
                                        <div class="w-2/3 text-gray-800">5:00pm - 10:00pm</div>
                                    </li>
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Tue</div>
                                        <div class="w-2/3 text-gray-800">5:00pm - 10:00pm</div>
                                    </li>
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Wed</div>
                                        <div class="w-2/3 text-gray-800">4:30pm - 10:00pm</div>
                                    </li>
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Thu</div>
                                        <div class="w-2/3 text-gray-800">4:30pm - 10:00pm</div>
                                    </li>
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Fri</div>
                                        <div class="w-2/3 text-gray-800">5:00pm - 10:00pm</div>
                                    </li>
                                    <li class="py-2 flex">
                                        <div class="w-1/3 text-gray-600">Sat</div>
                                        <div class="w-2/3 text-gray-800">9:00am - 7:00pm</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                    <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                        <div class="mx-auto max-w-">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.73325733986!2d79.85863481076612!3d6.9224568183693425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25912f6322a05%3A0x1ff3379353128405!2sExcel%20World%20Entertainment%20Park!5e0!3m2!1sen!2slk!4v1710947863099!5m2!1sen!2slk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h3 class="mt-16 mx-auto max-w-7xl px-6 lg:px-8 text-2xl font-bold tracking-tight text-gray-900">About</h3>

    <p class="mt-10 mx-auto max-w-7xl px-6 lg:px-8">

        {{$indoors->description}}

    </p>

    <h3 class="mt-16 mb-12 mx-auto max-w-7xl px-6 lg:px-8 text-2xl font-bold tracking-tight text-gray-900">Facility Overview</h3>



    <div class="mb- 12 mx-auto max-w-[1200px]">
        <div class="flex flex-col md:grid md:grid-cols-3 gap-3">
            @foreach($gallery as $image)
                <div class="relative rounded overflow-hidden">
                    <img src="{{ asset($image) }}" alt="Hanging Planters" class="w-full">
                </div>
            @endforeach
        </div>
    </div>















    @include('partials._comments')



























    {{--    <section class="w-screen my-40 ">--}}

{{--    <div class="m-4 mx-auto max-w-screen-lg rounded-md border border-gray-100 text-gray-600 shadow-md">--}}
{{--      <div class="relative flex h-full flex-col text-gray-600 md:flex-row">--}}
{{--        <div class="relative p-8 md:w-4/6">--}}
{{--            <p class="text-md font-medium text-indigo-500"><i class="fa-solid fa-location-dot"></i> {{$indoors['location']}}</p>--}}
{{--          <div class="flex flex-col md:flex-row">--}}

{{--            <h2 class="mb-2 text-2xl font-black">{{$indoors->title}}</h2>--}}
{{--          </div>--}}
{{--          <p class="mt-3 font-sans text-base tracking-normal">{{$indoors->description}}</p>--}}
{{--          <div class="flex flex-col md:flex-row md:items-end">--}}
{{--            <p class="mt-6 text-2xl font-black">Rs.{{$indoors->price}}<sup class="align-super text-sm">Per hour</sup></p>--}}

{{--          </div>--}}
{{--          <p class="text-md mt-3 font-medium text-indigo-400"><i class="fa-solid fa-phone"></i> {{$indoors['contact_number']}}</p>--}}

{{--          <div class="mt-4 flex flex-col sm:flex-row">--}}
{{--            <button class="mr-2 mb-4 flex cursor-pointer items-center justify-center rounded-md bg-emerald-400 py-2 px-8 text-center text-white transition duration-150 ease-in-out hover:translate-y-1 hover:bg-emerald-500">--}}
{{--              <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />--}}
{{--              </svg>--}}
{{--              Book a slot--}}
{{--            </button>--}}

{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="mx-auto flex items-center px-5 pt-1 md:p-8">--}}
{{--          <img class="block h-auto max-w-full rounded-md shadow-lg" src="{{$indoors->photo ? asset('storage/' . $indoors->photo): asset('/images/CR7.png')}}" alt="Shop image" />--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
    @props(['item'])





    @endsection

