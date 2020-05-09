<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Ward extends Authenticatable
{
    use Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'ward';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wardName', 'wardlsgName','wardDistrict'
    ];

    
}
