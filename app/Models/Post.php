<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = "posts";

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
