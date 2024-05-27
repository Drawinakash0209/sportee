@extends('user-dashboard-layout')
@section('content')



    <script src="https://cdn.tailwindcss.com"></script>
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


        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mt-10" style="margin-left: 20px; margin-right: 20px;"> <!-- Adjust margin values as needed -->
                <div id="calendar"></div>
            </div>
        </div>







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

@endsection

