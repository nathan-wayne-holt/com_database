<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DangerController extends Controller
{
    // Show the form to create a new danger.
    public function create()
    {
    	return view('create_danger');
    }

    // validate the data and then store it
    public function store(Request $request)
    {
    	//return $request['spectrum']; //VIEW THE RAW JSON REQUEST
    	$validated_data = $request->validate([
    		'name' => 'required',
    		'rating' => 'required',
    		'description' => 'required',
    		'creator' => 'required',
    		'spectrum.*.name' => 'required',
    		'spectrum.*.threshold' => 'required',
    		'move.*.name' => 'required',
    		'move.*.description' => 'required'
    	]);
    	return 'validated!';
    }
}
