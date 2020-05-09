<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Housevisit extends Authenticatable
{

	use Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'housevisits';
    
    protected $fillable = [
            'expatid',
            'name',
            'ward',
                'ailmentdetails',
                'continuetreatment',
                'medicineavailability',
                'medicinedetails',
                'symptomsstatus',
                'symptomsdetails',
                'oldagestatus',
                'anyillnessstatus',
                'illnesscount',
                'neighbourillnessstatus',
                'neighbourillnesscount',
                'functionattendedstatus',
                'hospitalizedstatus',
                'deathstatus',
                'closecontactstatus',
               'closecontactdet',
                'quarantinecompletestatus',
                'quarantinecompletedate',
                'lsgfoodavailability',
                'quarantinerules',
                'counsellingstatus',
                'housevisittimestamp',
                'visitstatus'];
}
//continuetreatment
//oldagestatus
//anyoneillnessstatus,illnesscount,neighbourillnessstatus,neighbourillnesscount,functionattendedstatus,functionattended,hospitalizedstatus,deathstatus,closecontactstatus,closecontactname,closecontactmobile,closecontactaddress',quarantinecompletestatus,quarantinecompletedate,lsgfoodavalability,quarantinerules,counsellingstatus,