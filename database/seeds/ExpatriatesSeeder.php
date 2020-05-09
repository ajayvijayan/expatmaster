<?php

use Illuminate\Database\Seeder;
use App\Expatriate;

class ExpatriatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++){
            Expatriate::Create([
                'name'=>  Str::random(10),
            'dateofbirth'=>  '10-01-1990',
            'gender'=>  Str::random(5),
            'comingfromcountry'=>  Str::random(10),
            'comingfromstate'=>  Str::random(10),
            'domicilestate'=>  Str::random(10),
            'comingtimestamp'=>  Str::random(10),
            'comingplace'=>  Str::random(10),
            'exitcountry'=>  Str::random(10),
            'exitstate'=>  Str::random(10),
            'passportnumber'=>  Str::random(10),
            'mobilenumber'=>  '9876543210',
            'permanentaddress'=>  Str::random(10),
            'presentaddress'=>  Str::random(10),
            'rapidtestdone'=>  Str::random(10),
            'rapidtestplace'=>  Str::random(10),
            'rapidtestresult'=>  Str::random(10),
            'cominghighriskplace'=>  Str::random(10),
            'whetherprofileriskstatus'=>  Str::random(10),
            'checkinvehiclenumber'=>  Str::random(10),
            'quarantinelocation'=>  Str::random(10),
            'quarantinedistrict'=>  Str::random(10),
            'district'=>  Str::random(10),
            'lsg'=>  Str::random(10),
            'ward'=>  Str::random(10),
            'quarantinecheckintimestamp'=>  Str::random(10),
            'quarantinecheckouttimestamp'=>  Str::random(10),
            'numberoftests'=>  Str::random(10),
            'checkinremarks'=>  Str::random(10),
            'checkoutremarks'=>  Str::random(10),
            'intermediatereports'=>  Str::random(10),
            'intermediatereportdate'=>  Str::random(10),
            'checkoutreports'=>  Str::random(10),
            'checkoutvehiclenumber'=>  Str::random(10),
            'quarantinelocationgeo'=>  Str::random(10),
            'addresslocationgeo'=>  Str::random(10),
            'symptomsstatus'=>  Str::random(10),
            'symptomsdetails'=>  Str::random(10),
            'ailmentstatus'=>  Str::random(10),
            'ailmentdetails'=>  Str::random(10),
            'medicinestatus'=>  Str::random(10),
            'medicinedetails'=>  Str::random(10),
            'medicineavailability'=>  Str::random(10),
            'transittype'=>  Str::random(10),
            'transitdistrict'=>  Str::random(10),
            'transitpoint'=>  Str::random(10),
            'photograph'=>  Str::random(10),
            'expecteddate'=>  Str::random(10),
            'flightnumber'=>  Str::random(10),
            'status'=>1
            ]);
            

        }
    }
}
