

@extends('layout')
@section('content')

    @php
        $now = now()->format('Y-m-d\TH:i');
@endphp


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
















































    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mt-10" style="margin-left: 20px; margin-right: 20px;"> <!-- Adjust margin values as needed -->
            <div id="calendar"></div>
        </div>
    </div>


    @auth

    <div class="min-h-screen p-6 flex items-center justify-center">

        <div class="container max-w-screen-lg mx-auto">
            <form  method="POST" action="/home/{{$indoors['id']}}/book" enctype="multipart/form-data">
                @csrf
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="indoor_id" value="{{$indoors->id}}">
                <h2 class="font-semibold text-xl text-gray-600">Book time slots</h2>
                <p class="text-gray-500 mb-6"></p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Personal Details</p>
                            <p>Please fill out all the fields.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" name="custName" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{auth()->user()->name}}" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{auth()->user()->email}}" placeholder="email@domain.com" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phoneNumber" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                </div>

{{--                                <div class="md:col-span-5">--}}
{{--                                    <label for="booking_date">Booking Date</label>--}}
{{--                                    <input type="date" name="booking_date" id="booking_date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" min="{{ now()->toDateString() }}" />--}}
{{--                                </div>--}}

                                <div class="md:col-span-5">
                                    <label for="start_time">Start Time</label>
                                    <input type="datetime-local" name="start_time" id="finish_time" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" min="{{ $now }}" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="finish_time">End Time</label>
                                    <input type="datetime-local" name="finish_time" id="finish_time" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" min="{{ $now }}" />
                                </div>

                                <!-- Add more fields as needed -->

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>

    @else
        <div class=" mt-20 text-center">
            <p class="text-lg font-medium text-gray-600">Please <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">login</a> to book.</p>
        </div>
    @endauth









    @include('partials._comments')

    @props(['item'])




    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script>

            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    selectable: true,
                    slotMinTime: '8:00:00',
                    slotMaxTime: '23:59:59',
                    // Uncomment and adjust the events property if you have a list of events to load
                    events: @json($events),


                });
                calendar.render();
            });
        </script>
    @endpush

    @endsection

