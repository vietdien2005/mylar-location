<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "locations";

    protected $fillable = [
    	'id', 
    	'loc_name',
        'loc_address',
        'loc_lat',
        'loc_lng',
        'loc_type',
    ];

    protected $hidden = [
    	'created_at',
    	'updated_at'
    ];

}
