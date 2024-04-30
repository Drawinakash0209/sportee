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
        $gallery = explode('|', $indoors->gallery);
        return view('indoor.show', [
            'indoors'=> $indoors,
            'gallery'=>$gallery,


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
