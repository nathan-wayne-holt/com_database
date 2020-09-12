<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreDanger;
use App\Models\Danger;
use App\Models\Move;
use App\Models\Spectrum;

class DangerController extends Controller
{
    // Show the form to create a new danger.
    public function create()
    {
    	return view('dangers.create');
    }

    // validate the data and then store it
    public function store(StoreDanger $request)
    {
    	// validate the data
    	$validated_data = $request->validated();
    	
    	// data is validated, add data to database

    	// create danger object
    	$danger = new Danger;
    	$danger->name = $request->name;
    	$danger->rating = $request->rating;
    	$danger->creator = $request->creator;
    	$danger->description = $request->description;

    	// create spectrum objects
    	$spectrums = [];
    	foreach ($request->spectrum as $spectrum_input) {
    		$spectrum = new Spectrum;
    		$spectrum->name = $spectrum_input['name'];
    		$spectrum->threshold = $spectrum_input['threshold'];
    		array_push($spectrums, $spectrum);
    	}

    	// create move objects
    	$moves = [];
    	foreach ($request->move as $move_input) {
    		$move = new Move;
    		$move->name = $move_input['name'];
    		$move->type = $move_input['type'];
    		$move->description = $move_input['description'];
    		array_push($moves, $move);
    	}
    	
    	// save the danger object
    	$danger->save();

    	// save the danger's associated spectrums and moves
    	$danger->spectrums()->saveMany($spectrums);
    	$danger->moves()->saveMany($moves);

    	return view('creation_success')->with('danger_name', $danger->name);
    }

    public function show($danger_id)
    {
    	$danger = Danger::where('id', $danger_id)->first();
    	return view('dangers.show', ['danger' => $danger]);
    }

    // return the list of all dangers
    public function index()
    {
    	$dangers = Danger::paginate(10);

    	return view('dangers.index', ['dangers' => $dangers]);
    }
}
