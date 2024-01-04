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

    public function show(Indoor $indoors){
        return view('indoor.show', [
            'indoors'=> $indoors
        ]);
    }

    public function create(){
        return view('indoor.create');
    }

    public function store(Request $request){

        $formField = $request->validate([
            'title'=> 'required',
            'tags'=>'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
            'contact_number' => 'required',
            'price' => 'required'
        ]);

        Indoor::create($formField);

        return redirect('/')->with('message', 'Listing created successfully !');

        


    }
}
