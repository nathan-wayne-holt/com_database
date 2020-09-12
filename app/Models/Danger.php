<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danger extends Model
{
    use HasFactory;

    // get the spectrums associated with this danger
    public function spectrums()
    {
    	return $this->hasMany('App\Models\Spectrum');
    }

	// get the danger movers associated with this danger
    public function moves()
    {
    	return $this->hasMany('App\Models\Move');
    }
}
