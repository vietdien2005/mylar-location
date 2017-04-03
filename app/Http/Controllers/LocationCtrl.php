<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Validator;

class LocationCtrl extends Controller
{
    private $rules = [
        'name'    => 'required',
        'address' => 'required',
        'type'    => 'required'
    ];

    public function index()
    {
    	$locations = Location::get();
    	return view('manage.locations.index', ['locations' => $locations]);
    }

    public function postAddLocation(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            list($lat, $lng) = $this->getGeo($request->address);

            Location::create([
                'loc_name'    => $request->name,
                'loc_address' => $request->address,
                'loc_lat'     => $lat,
                'loc_lng'     => $lng,
                'loc_type'    => $request->type,
            ]);
            return redirect('admin/locations');
        }
    }

    public function postEditLocation(Request $request)
    {
    	$validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            list($lat, $lng) = $this->getGeo($request->address);

            Location::where('id', $request->location_id)->update([
                'loc_name'    => $request->name,
                'loc_address' => $request->address,
                'loc_lat'     => $lat,
                'loc_lng'     => $lng,
                'loc_type'    => $request->type,
            ]);
            return redirect('admin/locations');
        }
    }

    public function getGeo($address)
    {
        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
        $geo = json_decode($geo, true);
        if ($geo['status'] == 'OK') {
            $latitude = $geo['results'][0]['geometry']['location']['lat'];
            $longitude = $geo['results'][0]['geometry']['location']['lng'];
        }

        return [$latitude ? : 0, $longitude ? : 0];
    }

    public function deleteLocation($id)
    {
        Location::find($id)->delete();

    	return redirect('admin/locations');
    }
}
