<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class HomeCtrl extends Controller
{
    public function index()
    {
    	$locations = Location::get();
    	return view('homepage.index', ['locations' => $locations]);
    }
}
