@extends('dashboard-layout')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Analysis</h1>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label for="">Total Indoors</label>
                    <h1> {{$totalIndoors}}</h1>
                    <a href=" "> link </a>
                 </div>

            </div>

            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for=""> Total Indoor operators</label>
                    <h1> {{$totalUsers}}</h1>
                    <a href=" "> link </a>
                </div>

            </div>

            <div class="col-md-3">
                <div class="card card-body bg-warning text-white mb-3">
                    <label for="">Total Users</label>
                    <h1> {{ $totalCustomers}} </h1>
                    <a href=" "> link </a>
                </div>

            </div>

            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for="">Total Bookings</label>
                    <h1> {{ $totalbookings }}</h1>
                    <a href=" "> link </a>
                </div>

            </div>


            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for="">Total Tournaments </label>
                    <h1> {{ $totalTournaments }}</h1>
                    <a href=" "> link </a>
                </div>

            </div>


            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for="">Today Bookings </label>
                    <h1> {{ $todayBookings }}</h1>
                    <a href=" "> link </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-success text-white mb-3">
                    <label for="">Month Bookings </label>
                    <h1> {{ $monthlyBookings }}</h1>
                    <a href=" "> link </a>
                </div>
            </div>


    </div>

@endsection
