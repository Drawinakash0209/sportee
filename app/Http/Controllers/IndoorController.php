<?php

namespace App\Http\Controllers;

use App\Models\Indoor;
use App\Models\Tournament;
use Illuminate\Http\Request;

class IndoorController extends Controller
{
    public function index(){
        return view('indoor.index', [
            'indoors'=>Indoor::latest()->filters(request(['tag','search']))->get(),
            'tournaments'=> Tournament::all()
            
        ]);
    }
// show individual Indoors
    public function show(Indoor $indoors){
        return view('indoor.show', [
            'indoors'=> $indoors
        ]);
    }

    public function create(){
        return view('indoor.create');
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
     
        $formFields['user_id'] = auth()->id();
     
        Indoor::create($formFields);
     
        return redirect('/')->with('message', 'Listing created successfully !');
     }

 //update indoor
     public function update(Request $request, Indoor $indoors){
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
     
        $formFields['user_id'] = auth()->id();
     
        $indoors->update($formFields);
     
        return back()->with('message', 'Listing updated successfully !');
     }

     
}
