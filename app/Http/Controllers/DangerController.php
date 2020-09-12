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
}
