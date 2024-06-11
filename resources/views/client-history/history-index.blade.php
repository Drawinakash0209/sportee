


@extends('layout')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>



        <div class="mt-40  ml-10 mr-10 mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="px-4 py-3">Indoor</th>
                        <th class="px-4 py-3">Start Time</th>
                        <th class="px-4 py-3">Finish Time</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3"> Cancel </th>

                        <!-- Add more columns as needed -->
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @forelse ($bookings as $booking)

                        @php
                            $currentTime = now();
                            $startTime = \Carbon\Carbon::parse($booking->start_time);
                            $canCancel = $currentTime->diffInHours($startTime, false) >= 5;
                        @endphp

                        <tr class="text-gray-700">
                            <td class="px-4 py-3 border">{{$booking->indoor->title}}</td>
                            <td class="px-4 py-3 border">{{$booking->start_time}}</td>
                            <td class="px-4 py-3 border">{{ $booking->finish_time }}</td>
                            <td class="px-4 py-3 border text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $booking->comments }} </span>
                            </td>
                            <td class="px-4 py-3 border">
                                @if ($canCancel)
                                    <form action="{{ route('cancel-booking', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 font-semibold text-white bg-red-500 rounded hover:bg-red-700">Cancel</button>
                                    </form>
                                @else
                                    <span class="px-2 py-1  leading-tight text-red-700 bg-red-100 rounded-sm">Cannot cancel</span>
                                @endif
                            </td>



                            <!-- Add more columns as needed -->
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-3 border text-center">No bookings found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>


@endsection

