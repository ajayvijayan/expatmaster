<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Usertype extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'userType';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
}
