<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class ApiCtrl extends Controller
{
    public function getMarkers()
    {
    	$makers = Location::get();
    	return response($makers);
    }
}
