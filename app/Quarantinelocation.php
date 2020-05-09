<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Quarantinelocation extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'quarantineLocation';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','transittype','districtname'
    ];
}
