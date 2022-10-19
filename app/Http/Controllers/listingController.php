<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;

class listingController extends Controller
{


//show all listings
    public function index(){
// dd(request()->tag);

        return view('listings.index',[
            'Listings'=> Listings::latest()->filter
            (request(['tag','search']))->
            simplePaginate(10)// next & previous insted of page numbers
            //paginate(2) with page numbers
    
        ]);
    }

//show single listing

    public function show(Listings $listing){
    

        return view('listings.show',
[  
      'listing'=>$listing
]    );
    }


//show create form

public function create(){
    return view('listings.create');
}


//store form data

public function store(Request $request){
// validation 
$formFields=$request->validate([
'title'=>'required',
'company'=> ['required', Rule::unique('listings','company')],
'location'=>'required',
'website'=>'required',
'email'=>['required','email'],
'tags'=>'required',
'description'=>'required'
]);

if($request->hasFile('logo')){
    // if img file not empty get it and store it in storege and crete folder logos to store it in

    $formFields['logo']=$request->file('logo')->store
    ('logos','public');
}
Listings::create($formFields);
//flash msg 
return redirect('/')->with('message',
'Listing created successfully!');

}

//show edit form

public function edit(Listings $listing)
{
    return view ('listings.edit', ['listing'=>$listing]);
}


//updae listing data
public function update(Request $request,Listings $listing){
    // validation 
    $formFields=$request->validate([
    'title'=>'required',
    'company'=> 'required',
    'location'=>'required',
    'website'=>'required',
    'email'=>['required','email'],
    'tags'=>'required',
    'description'=>'required'
    ]);
    
    if($request->hasFile('logo')){
        // if img file not empty get it and store it in storege and crete folder logos to store it in
    
        $formFields['logo']=$request->file('logo')->store
        ('logos','public');
    }
    $listing->update($formFields);
    //flash msg 
    return back()->with('message',
    'Listing Updated successfully!');
}


//delete listing

public function distroy(Listings $listing)
{
    $listing->delete();
    return redirect('/')->with('message','Listing deleted successfully');
}

}
