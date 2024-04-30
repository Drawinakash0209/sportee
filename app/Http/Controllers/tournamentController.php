<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class tournamentController extends Controller
{
    public function create()
    {
        return view('tournament.create');

    }

    public function store(Request $request)
    {



        $formFields = $request->validate([
            'title' => 'required',
            'tournamentDate' => 'required',
            'noOFplayers' => 'required',
            'contact_number' => 'required',
            'entry_fee' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['location'] = "default";

        $formFields['user_id'] = auth()->id();
        Tournament::create($formFields);

        return redirect('/')->with('message', 'Tournament created successfully!');
    }

}
