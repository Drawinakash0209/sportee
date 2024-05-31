@extends('user-dashboard-layout')
@section('content')



    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <section class="container mx-auto p-6 font-mono">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-3xl text-center font-bold uppercase">
               {{$place  -> title}}
            </h1>

        </header>



        <div class="container-fluid px-4">
            <h1 class="mt-4">Analysis</h1>

            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total Booking</label>
                        <h1> {{$totalBooking}}</h1>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total Booking this week</label>
                        <h1> {{$totalBookingThisWeek}}</h1>
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total Booking this month</label>
                        <h1> {{$totalBookingThisMonth}}</h1>
                    </div>

                </div>





                <div class="col-md-3">


                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total Today</label>
                        <h1> {{$totalBookingToday}}</h1>
                    </div>
                </div>

            </div>


            </div>

















        <div class="card mb-4">

        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>

        </div>




















        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mt-10" style="margin-left: 20px; margin-right: 20px;"> <!-- Adjust margin values as needed -->
                <div id="calendar"></div>
            </div>
        </div>


        <div class="min-h-screen p-6 flex items-center justify-center mt-20">

            <div class="container max-w-screen-lg mx-auto">
                <form  method="POST" action="/client/{{$place['id']}}/book" enctype="multipart/form-data">
                    @csrf
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input type="hidden" name="indoor_id" value="{{$place->id}}">
                        <h2 class="font-semibold text-xl text-gray-600">Book time slots</h2>
                        <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p>

                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                <div class="text-gray-600">
                                    <p class="font-medium text-lg">Details of the Customer</p>
                                    <p>Please fill out all the fields.</p>
                                </div>

                                <div class="lg:col-span-2">
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-5">
                                            <label for="full_name">Full Name</label>
                                            <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="email@domain.com" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="booking_date">Booking Date</label>
                                            <input type="date" name="booking_date" id="booking_date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="start_time">Start Time</label>
                                            <input type="datetime-local" name="start_time" id="start_time" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="finish_time">End Time</label>
                                            <input type="datetime-local" name="finish_time" id="finish_time" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
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








            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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

                    // Example of adding a single event
                    // calendar.addEvent({
                    //     title: 'New Event',
                    //     start: '2024-05-06T09:00:00',
                    //     end: '2024-05-06T10:00:00'
                    // });

                    calendar.render();
                });
            </script>
        @endpush


    </section>

    <script type="text/javascript">
        var _ydata = JSON.parse('{!! json_encode($months) !!}');
        var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');
    </script>

    <script src="{{asset('assets/js/chart-bar-demo.js')}}" ></script>
    <script src="{{asset('assets/js/chart-area-demo.js')}}" ></script>







@endsection

