<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpatriatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expatriates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('dateofbirth');
            $table->string('gender');
            $table->string('comingfromcountry');
            $table->string('comingfromstate');
            $table->string('domicilestate');
            $table->timestamps('comingtimestamp');
            $table->string('comingplace');
            $table->string('exitcountry');
            $table->string('exitstate');
            $table->string('passportnumber');
            $table->string('mobilenumber');
            $table->string('permanentaddress');
            $table->string('presentaddress');
            $table->string('rapidtestdone');
            $table->string('rapidtestplace');
            $table->string('rapidtestresult');
            $table->string('cominghighriskplace');
            $table->string('whetherprofileriskstatus');
            $table->string('checkinvehiclenumber');
            $table->string('quarantinelocation');
            $table->string('quarantinedistrict');
            $table->string('district');
            $table->string('lsg');
            $table->string('ward');
            $table->timestamps('quarantinecheckintimestamp');
            $table->timestamps('quarantinecheckouttimestamp');
            $table->string('numberoftests');
            $table->string('checkinremarks');
            $table->string('checkoutremarks');
            $table->string('intermediatereports');
            $table->timestamps('intermediatereportdate');
            $table->string('checkoutreports');
            $table->string('checkoutvehiclenumber');
            $table->string('quarantinelocationgeo');
            $table->string('addresslocationgeo');
            $table->string('symptomsstatus');
            $table->string('symptomsdetails');
            $table->string('ailmentstatus');
            $table->string('ailmentdetails');
            $table->string('medicinestatus');
            $table->string('medicinedetails');
            $table->string('medicineavailability');
            $table->string('transittype');
            $table->string('transitdistrict');
            $table->string('transitpoint');
            $table->string('photograph');
            $table->string('expecteddate');
            $table->string('flightnumber');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expatriates');
    }
}
