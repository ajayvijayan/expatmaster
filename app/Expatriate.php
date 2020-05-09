<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Expatriate extends Authenticatable
{

	use Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'expatriates';
    
    protected $fillable = ['name',
            'dateofbirth',
            'gender',
            'comingfromcountry',
            'comingfromstate',
            'domicilestate',
            'comingtimestamp',
            'comingplace',
            'exitcountry',
            'exitstate',
            'passportnumber',
            'mobilenumber',
            'permanentaddress',
            'presentaddress',
            'rapidtestdone',
            'rapidtestplace',
            'rapidtestresult',
            'cominghighriskplace',
            'whetherprofileriskstatus',
            'checkinvehiclenumber',
            'quarantinelocation',
            'quarantinedistrict',
            'district',
            'lsg',
            'ward',
            'quarantinecheckintimestamp',
            'quarantinecheckouttimestamp',
            'numberoftests',
            'checkinremarks',
            'checkoutremarks',
            'intermediatereports',
            'intermediatereportdate',
            'checkoutreports',
            'checkoutvehiclenumber',
            'quarantinelocationgeo',
            'addresslocationgeo',
            'symptomsstatus',
            'symptomsdetails',
            'ailmentstatus',
            'ailmentdetails',
            'medicinestatus',
            'medicinedetails',
            'medicineavailability',
            'transittype',
            'transitdistrict',
            'transitpoint',
            'photograph',
            'expecteddate',
            'flightnumber',
            'status'];
}
