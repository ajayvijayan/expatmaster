<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class QuarantineLocType extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'quarantineLocType';
    public $timestamps = false;

    protected $fillable = [
        'loctypename'
    ];





}
