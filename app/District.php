<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class District extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'district';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state','districts'
    ];
}
