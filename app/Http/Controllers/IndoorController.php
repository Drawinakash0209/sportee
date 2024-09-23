<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Indoor;
use App\Models\Tournament;
use App\Models\User;
use App\SystemMessageNotification;
use Illuminate\Http\Request;
use function Livewire\Volt\on;
use Carbon\Carbon;


class IndoorController extends Controller
{

    public function index(){
        return view('indoor.index', [
            'indoors'=>Indoor::latest()->filters(request(['tag','search']))->get(),
            'tournaments'=> Tournament::all()

        ]);
    }


    public function book(Request $request){
        // Validate form fields
        $formFields = $request->validate([
            'start_time' => [
                'required',
                'date_format:Y-m-d\TH:i',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isPast()) {
                        $fail('The ' . $attribute . ' must be a future date and time.');
                    }
                },
            ],
            'finish_time' => [
                'required',
                'date_format:Y-m-d\TH:i',
                function ($attribute, $value, $fail) {
                    if (Carbon::parse($value)->isPast()) {
                        $fail('The ' . $attribute . ' must be a future date and time.');
                    }
                },
            ],
            'phoneNumber' => 'required|numeric|digits:10',
            'custName' => 'required|string|max:255',
        ]);

        // Check for overlapping bookings
        $indoorId = $request->input('indoor_id');
        $startTime = $request->input('start_time');
        $finishTime = $request->input('finish_time');

        $overlappingBooking = Booking::where('indoor_id', $indoorId)
            ->where(function($query) use ($startTime, $finishTime) {
                $query->where(function($query) use ($startTime, $finishTime) {
                    $query->where('start_time', '<', $finishTime)
                        ->where('finish_time', '>', $startTime);
                });
            })
            ->exists();

        if ($overlappingBooking) {
            return redirect()->back()->withErrors(['message' => 'The selected time slot is already booked. Please choose a different time.']);
        }

        // Prepare the data for booking
        $formFields['indoor_id'] = $indoorId;
        $formFields['comments'] = "Booked";
        $formFields['user_id'] = auth()->id();

        // Create the booking
        Booking::create($formFields);



        // Notify the indoor owner
        $indoorowner = Indoor::find($formFields['indoor_id'])->user;
        $startDateTime = Carbon::parse($formFields['start_time'])->format('Y-m-d H:i');
        $finishDateTime = Carbon::parse($formFields['finish_time'])->format('Y-m-d H:i');
        $bookingDateTime = Carbon::now()->format('Y-m-d H:i:s');

        $indoorowner->notify(new SystemMessageNotification(
            'Someone has booked your indoor from '. Indoor::find($formFields['indoor_id'])->title .$startDateTime.' to '.$finishDateTime.' on '.$bookingDateTime,
            'success',
            'Success',
            'success'
        ));

        // Notify the user
        (new User())->find(auth()->id())->notify(new SystemMessageNotification(
            'Your booking has been created successfully from '.$startDateTime.' to '.$finishDateTime.' at '. Indoor::find($formFields['indoor_id'])->title,
            'success',
            'Success',
            'success'
        ));

        // Redirect with a success message
        return redirect('/')->with('message', 'Booking created successfully!');
    }


    //client booking
    public function clientBook(Request $request){
        // Validate form fields
        $formFields = $request->validate([
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'finish_time' => 'required|date_format:Y-m-d\TH:i',
            'phoneNumber' => 'required|numeric|digits:10',
            'custName' => 'required|string|max:255',
        ]);

        // Check for overlapping bookings
        $indoorId = $request->input('indoor_id');
        $startTime = $request->input('start_time');
        $finishTime = $request->input('finish_time');

        $overlappingBooking = Booking::where('indoor_id', $indoorId)
            ->where(function($query) use ($startTime, $finishTime) {
                $query->where(function($query) use ($startTime, $finishTime) {
                    $query->where('start_time', '<', $finishTime)
                        ->where('finish_time', '>', $startTime);
                });
            })
            ->exists();

        if ($overlappingBooking) {
            return redirect()->back()->withErrors(['message' => 'The selected time slot is already booked. Please choose a different time.']);
        }

        // Prepare the data for booking
        $formFields['indoor_id'] = $indoorId;
        $formFields['comments'] = "Booked";
        $formFields['user_id'] = auth()->id();

        // Create the booking
        Booking::create($formFields);

        // Notify the indoor owner
        $indoorowner = Indoor::find($formFields['indoor_id'])->user;
        $indoorowner->notify(new SystemMessageNotification(
            'Someone has booked your indoor! from '.$formFields['start_time'].' to '.$formFields['finish_time'] . ' on '.date('Y-m-d H:i:s'),
            'success',
            'Success',
            'success'
        ));

        // Notify the user
        (new User())->find(auth()->id())->notify(new SystemMessageNotification(
            'Your booking has been created successfully! from '.$formFields['start_time'].' to '.$formFields['finish_time'] . ' on '.date('Y-m-d H:i:s') . 'at '. Indoor::find($formFields['indoor_id'])->title,
            'success',
            'Success',
            'success'
        ));

        // Redirect with a success message
        return redirect('/')->with('message', 'Booking created successfully!');
    }


    public function cancel($id)
    {
        $booking = Booking::find($id);

        $booking->delete();




        $indoor = Indoor::find($booking->indoor_id);
        if ($indoor) {
            $indoorOwner = $indoor->user;
            if ($indoorOwner) {
                $indoorOwner->notify(new SystemMessageNotification(
                    'Someone has cancelled the booking from ' . $booking->start_time . ' to ' . $booking->finish_time . ' on ' . now()->format('Y-m-d H:i:s') . ' at ' . $indoor->title,
                    'danger',
                    'Cancelled',
                    'danger'
                ));
            }
        }

        auth()->user()->notify(new SystemMessageNotification(
            'Your booking has been cancelled successfully! from ' . $booking->start_time . ' to ' . $booking->finish_time . ' on ' . now()->format('Y-m-d H:i:s') . ' at ' . Indoor::find($booking->indoor_id)->title,
            'danger',
            'Cancelled',
            'danger'
        ));



        return back()->with('message', 'Booking cancelled successfully!');
    }


    public function getEvents()
    {
       $events = [];

       $bookings = Booking::all();

       foreach ($bookings as $booking){
           $events[]= [
               'title' => 'Booked',
               'start' => $booking->start_time,
               'end' => $booking->finish_time,
           ];
       }

       return response()->json($events);
    }



// show individual Indoors
    public function show(Indoor $indoors){
        $gallery = explode('|', $indoors->gallery);

        $events = [];

//        $bookings = Booking::all();
        $bookings = Booking::where('indoor_id', $indoors->id)->get();

        foreach ($bookings as $booking){
            $events[]= [
                'title' => 'Booked',
                'start' => $booking->start_time,
                'end' => $booking->finish_time,

            ];
        }

        return view('indoor.show', [
            'indoors'=> $indoors,
            'gallery'=>$gallery,
            'events'=>$events

        ]);
    }

    public function ClientShow(Indoor $indoors){
        $events = [];
        $bookings = Booking::where('indoor_id', $indoors->id)->get();

        //total booking in this indoor
        $totalBooking = Booking::where('indoor_id', $indoors->id)->count();

        //total booking in this week
        $totalBookingThisWeek = Booking::where('indoor_id', $indoors->id)->whereBetween('start_time', [now()->startOfWeek(), now()->endOfWeek()])->count();

        //total booking in this month
        $totalBookingThisMonth = Booking::where('indoor_id', $indoors->id)->whereBetween('start_time', [now()->startOfMonth(), now()->endOfMonth()])->count();

        //total booking today
        $totalBookingToday = Booking::where('indoor_id', $indoors->id)->whereDate('start_time', now())->count();

        //get all bookings and group by date and count
        $bookingAnalysis = Booking::select('id', 'start_time' ) ->where('indoor_id', $indoors->id)->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->start_time)->format('M');
        });

        $months = [];
        $monthCount = [];
        foreach ($bookingAnalysis as $month => $values){
            $months[] = $month;
            $monthCount[] = count($values);

        }

        foreach ($bookings as $booking){
            $events[]= [
                'title' => 'Booked',
                'start' => $booking->start_time,
                'end' => $booking->finish_time,

            ];
        }
        $place = Indoor::find($indoors->id);

        //find the indoor of the online user
        $indoors = Indoor::where('user_id', auth()->id())->get();
//        $indoors = Indoor::all();



        return view('indoor.client-show', [
            'indoors'=> $indoors,
            'bookings'=>$bookings,
            'place'=>$place,
            'events'=>$events,
            'totalBooking'=>$totalBooking,
            'totalBookingThisWeek'=>$totalBookingThisWeek,
            'totalBookingThisMonth'=>$totalBookingThisMonth,
            'totalBookingToday'=>$totalBookingToday,
            'bookingAnalysis'=>$bookingAnalysis,
            'months'=>$months,
            'monthCount'=>$monthCount

        ]);

    }

    public function create(){
        return view('indoor.create', [
            'indoors'=>auth()->user()->indoors
         ]);
    }

    public function adminShow(Indoor $indoors){
        $allIndoors = Indoor::all();
        $events = [];
        $bookings = Booking::where('indoor_id', $indoors->id)->get();

        //total booking in this indoor
        $totalBooking = Booking::where('indoor_id', $indoors->id)->count();

        //total booking in this week
        $totalBookingThisWeek = Booking::where('indoor_id', $indoors->id)->whereBetween('start_time', [now()->startOfWeek(), now()->endOfWeek()])->count();

        //total booking in this month
        $totalBookingThisMonth = Booking::where('indoor_id', $indoors->id)->whereBetween('start_time', [now()->startOfMonth(), now()->endOfMonth()])->count();

        //total booking today
        $totalBookingToday = Booking::where('indoor_id', $indoors->id)->whereDate('start_time', now())->count();

        //get all bookings and group by date and count
        $bookingAnalysis = Booking::select('id', 'start_time' ) ->where('indoor_id', $indoors->id)->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->start_time)->format('M');
        });

        $months = [];
        $monthCount = [];
        foreach ($bookingAnalysis as $month => $values){
            $months[] = $month;
            $monthCount[] = count($values);

        }

        foreach ($bookings as $booking){
            $events[]= [
                'title' => 'Booked',
                'start' => $booking->start_time,
                'end' => $booking->finish_time,

            ];
        }
        $place = Indoor::find($indoors->id);

        //find the indoor of the online user
        $indoors = Indoor::where('user_id', auth()->id())->get();
//        $indoors = Indoor::all();



        return view('indoor.admin-show', [
            'indoors'=> $indoors,
            'bookings'=>$bookings,
            'place'=>$place,
            'events'=>$events,
            'totalBooking'=>$totalBooking,
            'totalBookingThisWeek'=>$totalBookingThisWeek,
            'totalBookingThisMonth'=>$totalBookingThisMonth,
            'totalBookingToday'=>$totalBookingToday,
            'bookingAnalysis'=>$bookingAnalysis,
            'months'=>$months,
            'monthCount'=>$monthCount,
            'allIndoors'=>$allIndoors


        ]);


    }

    //show edit form
    public function edit(Indoor $indoors){
        return view('indoor.edit', ['indoors' => $indoors]);
    }

    // public function store(Request $request){

    //     $formFields = $request->validate([
    //         'title'=> 'required',
    //         'tags'=>'required',
    //         'location' => 'required',
    //         'email' => 'required',
    //         'website' => 'required',
    //         'description' => 'required',
    //         'contact_number' => 'required',
    //         'price' => 'required'
    //     ]);

    //     $formFields['user_id'] = auth()->id();

    //     Indoor::create($formFields);

    //     return redirect('/')->with('message', 'Listing created successfully !');




    // }


    public function store(Request $request){
        $formFields = $request->validate([
            'title'=> 'required',
            'tags'=>'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
            'contact_number' => 'required',
            'price' => 'required'

        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }



        $gallery = array();
        if($files = $request->file('gallery')){
            foreach($files as $file){
                $galley_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $gallery_full_name = $galley_name.'.'.$ext;
                $upload_path = 'storage/photos/gallery/';
                $gallery_url = $upload_path.$gallery_full_name;
                $file->move($upload_path, $gallery_full_name );
                $gallery[] = $gallery_url;
            }
        }

        $formFields['gallery'] = implode('|', $gallery);





        $formFields['user_id'] = auth()->id();

        Indoor::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully !');
     }

 //update indoor
     public function update(Request $request, Indoor $indoors){

        //make sure logged in user is owner

        if (auth()->user()->id !== $indoors->user_id){
            abort(403, 'Unauthorized action');
        }
        $formFields = $request->validate([
            'title'=> 'required',
            'tags'=>'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
            'contact_number' => 'required',
            'price' => 'required'
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

         $gallery = array();
         if($files = $request->file('gallery')){
             foreach($files as $file){
                 $galley_name = md5(rand(1000,10000));
                 $ext = strtolower($file->getClientOriginalExtension());
                 $gallery_full_name = $galley_name.'.'.$ext;
                 $upload_path = 'storage/photos/gallery/';
                 $gallery_url = $upload_path.$gallery_full_name;
                 $file->move($upload_path, $gallery_full_name );
                 $gallery[] = $gallery_url;
             }
         }

         $formFields['gallery'] = implode('|', $gallery);

        $formFields['user_id'] = auth()->id();

        $indoors->update($formFields);

        return back()->with('message', 'Listing updated successfully !');
     }

     //delete indoor\
        public function destroy(Indoor $indoors){
             //make sure logged in user is owner

        if (auth()->user()->id !== $indoors->user_id){
            abort(403, 'Unauthorized action');
        }
            $indoors->delete();
            return redirect('/')->with('message', 'Listing deleted successfully !');
        }

        //Manage indoors
        public function manage(){
            return view('indoor.manage', [
                'indoors'=>auth()->user()->indoors
             ]);
        }




        // public function manage(){
        //     return view('indoor.manage', [
        //         'indoors'=>auth()->user()->indoor()->get()
        //     ]);
        // }

}
