<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SymptomName extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'symtom';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
