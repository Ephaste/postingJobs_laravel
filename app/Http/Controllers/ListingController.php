<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show listings
    public function index(){
       // dd(request()->tag) ;
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings'=> Listing::latest()->filter(request(['tag','search']))
           ->paginate(6)
            
        ]);
    }
    //Show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' =>$listing
        ]);
    }
    //Show create form
    public function create(){
        return view('listings.create');
    }
    //Store listing data
public function store(Request $request){
 $formFields = $request->validate([
'title'=>'required',
'company'=>'required',
'location'=>'required',
'website'=>'required',
'email'=>['required','email'],
'tags'=>'required',
'description'=>'required'

]);

if($request->hasFile('logo')){
    $formFields['logo'] =$request->file('logo')->store('logos', 'public');
}
Listing::create($formFields);
//Session::flash('message','Listing created');
    return redirect('/')->with('message','Listing created Successfully');  
    }
 //showing editing form
public function edit(Listing $listing){
return view('listings.edit', ['listing' =>$listing]);
    }

    //Update listing data
public function update(Request $request, Listing $listing){
    $formFields = $request->validate([
   'title'=>'required',
   'company'=>'required',
   'location'=>'required',
   'website'=>'required',
   'email'=>['required','email'],
   'tags'=>'required',
   'description'=>'required'
   
   ]);
   
   if($request->hasFile('logo')){
       $formFields['logo'] =$request->file('logo')->store('logos', 'public');
   }
   $listing->update($formFields);
   //Session::flash('message','Listing created');
       return back()->with('message','Listing updated Successfully');  
       }
       //Delete
       public function destroy(Listing $listing){
$listing->delete();
return redirect('/')->with('message', 'Listing Deleted successfully');
       }
}
