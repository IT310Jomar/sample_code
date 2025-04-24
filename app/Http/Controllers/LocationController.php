<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Locations;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //this function is used to return the front-end using web.php(routing)
    public function displayLocation(){
        $country = Country::get();
        return view('location',compact('country'));
    }// for displaying the front-end only

    //api.php
    public function displayLocationTable(){
        $location = Locations::with(['country'])->latest()->get();

        return response()->json(['success' => true, 'loc' => $location],200);
        
    }// to display the table data in the front-end

    // public function addLocation(Request $request){
    //     $location = Locations::create([
    //       "name" => $request->locationName //from js the passed data
    //     ]);

    //     return response()->json(["success" => true, 'location' => $location],200);
    // }//adding a location to the location table in the database


    public function addLocation(){
        request()->validate([
             'locationName' => 'required|string|max:100',
             'country_id' =>'required'
        ]);

        $location = Locations::create([
            'name' => request('locationName'),
            'country_id' => request('country_id')
        ]);
        return response()->json(["success" => true, 'location' => $location],200);
    }

    public function updateLocation($id){
            
        $location = Locations::findOrFail($id);
        $location->update([
            'name' => request('locationName')
        ]);
       
        return response()->json(["success" => true, 'location' => $location],200);
    }

    //deleting datain the database

    public function deleteLocation($id){
        $location = Locations::findOrFail($id);
        $location->delete();

        return response()->json(["success" => true, 'location' => $location],200);

    }


}
