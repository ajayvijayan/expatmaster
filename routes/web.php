<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.landingpage');
});
Route::post('/mobupdate', 'SelfreportingController@mobileupdate')->name('mobupdate');
Route::get('/selfreporting', 'SelfreportingController@selfreporting')->name('selfreporting');
Route::post('/userverifycheck/{mobile}/{dateofbirth}', 'SelfreportingController@verifyuser')->name('userverifycheck');
Route::post('/selfhealthdatastore', 'SelfreportingController@selfhealthdatastore')->name('selfhealthdatastore');

Route::group(['middleware' => 'prevent-back-history'],function(){


	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['middleware' => ['auth','App\Http\Middleware\adminMiddleware']], function()
	{
		Route::get('/admin', 'AdminController@adminhome')->name('adminhome')->middleware('auth');
		//usertype
		Route::get('admin/usertypelistpage', 'AdminController@usertypelistpage')->name('admin.usertypelistpage')->middleware('auth');
		Route::get('admin/usertypelist', 'AdminController@usertypelist')->name('admin.usertypelist')->middleware('auth');
		Route::post('admin/usertypestore','AdminController@usertypestore')->name('admin.usertypestore')->middleware('auth');
		Route::get('admin/usertypeedit/{id}', 'AdminController@usertypeedit')->middleware('auth');
		Route::post('admin/usertypeupdate', 'AdminController@usertypeupdate')->name('admin.usertypeupdate')->middleware('auth');
		Route::get('admin/usertypedestroy/{id}', 'AdminController@usertypedestroy')->middleware('auth');
		//usermaster
		Route::get('admin/userlistpage', 'AdminController@userlistpage')->name('admin.userlistpage')->middleware('auth');
		Route::get('admin/userlist', 'AdminController@userlist')->name('admin.userlist')->middleware('auth');
		Route::get('admin/usercreate','AdminController@usercreate')->name('admin.usercreate')->middleware('auth');
		Route::post('admin/userstore','AdminController@userstore')->name('admin.userstore')->middleware('auth');
		Route::get('admin/useredit/{id}', 'AdminController@useredit')->middleware('auth');
		Route::post('admin/userupdate', 'AdminController@userupdate')->name('admin.userupdate')->middleware('auth');
		Route::get('admin/userdestroy/{id}', 'AdminController@userdestroy')->middleware('auth');

		/////// ailment
		Route::get('admin/ailmentlistpage','AdminController@ailmentlistpage')->name('admin.ailmentlistpage')->middleware('auth');
		Route::get('admin/ailmentlist','AdminController@ailmentlist')->name('admin.ailmentlist')->middleware('auth');
		Route::get('admin/ailmentedit/{id}','AdminController@ailmentedit')->middleware('auth');
		Route::post('admin/ailmentstore','AdminController@ailmentstore')->name('admin.ailmentstore')->middleware('auth');
		Route::post('admin/ailmentupdate','AdminController@ailmentupdate')->name('admin.ailmentupdate')->middleware('auth');
		Route::get('admin/ailmentdestroy/{id}','AdminController@ailmentdestroy')->middleware('auth');
		//transit points
		Route::get('admin/transitpointlistpage','AdminController@transitpointlistpage')->name('admin.transitpointlistpage')->middleware('auth');
		Route::get('admin/transitpointlist','AdminController@transitpointlist')->name('admin.transitpointlist')->middleware('auth');
		Route::get('admin/transitpointedit/{id}','AdminController@transitpointedit')->middleware('auth');
		Route::post('admin/transitpointstore','AdminController@transitpointstore')->name('admin.transitpointstore')->middleware('auth');
		Route::post('admin/transitpointupdate','AdminController@transitpointupdate')->name('admin.transitpointupdate')->middleware('auth');
		Route::get('admin/transitpointdestroy/{id}','AdminController@transitpointdestroy')->middleware('auth');
		Route::get('admin/transitpointcreate','AdminController@transitpointcreate')->name('admin.transitpointcreate')->middleware('auth');
	  
		//qurantine location
	  
		Route::get('/admin/qloc', ['uses'=>'QuarantineloctypeController@index', 'as'=>'qlocation'])->middleware('auth');
        Route::get('/admin/qlocdata', ['uses'=>'QuarantineloctypeController@qlocationtype', 'as'=>'qloc.data'])->middleware('auth');
        Route::post('/admin/savenewqlocation', ['uses'=>'QuarantineloctypeController@usertypestore', 'as'=>'qlocation.insert'])->middleware('auth');
        Route::post('/admin/usertypeupdates', ['uses'=>'QuarantineloctypeController@usertypeupdate', 'as'=>'qlocation.usertypeupdate'])->middleware('auth');
        Route::get('/admin/ltypeedit/{id}', ['uses'=>'QuarantineloctypeController@usertypeedit', 'as'=>'qlocation.edit'])->middleware('auth');
        Route::get('/admin/qldistroy/{id}', ['uses'=>'QuarantineloctypeController@usertypedestroy', 'as'=>'qlocation.qldistroy'])->middleware('auth');

		//symtoms
		Route::get('/admin/symptom', ['uses'=>'SymptomController@index', 'as'=>'symptom'])->middleware('auth');
        Route::get('/admin/symptomdata', ['uses'=>'SymptomController@symptomdata', 'as'=>'symptom.data'])->middleware('auth');
        Route::post('/admin/savenewsymptom', ['uses'=>'SymptomController@insertsymptom', 'as'=>'symptom.insert'])->middleware('auth');
        Route::post('/admin/symptomupdate', ['uses'=>'SymptomController@symptomupdate', 'as'=>'symptom.symptomupdate'])->middleware('auth');
        Route::get('/admin/symptomedit/{id}', ['uses'=>'SymptomController@symptomedit', 'as'=>'symptom.edit'])->middleware('auth');
        Route::get('/admin/symptomdistroy/{id}', ['uses'=>'SymptomController@symptomdestroy', 'as'=>'symptom.symptomdestroy'])->middleware('auth');
	
		//Anoop 

	Route::get('quarantinelocation', 'QuarantineLocationController@index')->name('quarantinelocation')->middleware('auth');
	Route::get('usertypelist', 'TransitTypeController@transitypelistpage')->name('usertypelist')->middleware('auth');
	Route::get('transitlist','TransitTypeController@transitlistajax')->name('transitlist')->middleware('auth');
	Route::get('quarantinelist','QuarantineLocationController@quarantinelistajax')->name('quarantinelist')->middleware('auth');
	Route::post('transitcreate', 'TransitTypeController@transitstore')->name('transitcreate')->middleware('auth');
	Route::get('transitedit/{id}', 'TransitTypeController@transitedit')->middleware('auth');
	Route::post('transitupdate', 'TransitTypeController@transitupdate')->name('transitupdate')->middleware('auth');
	Route::get('transitdestroy/{id}', 'TransitTypeController@transitdestroy')->middleware('auth');
	//quarantineupdate
	Route::get('quarantinecreate', 'QuarantineLocationController@quarantinecreate')->name('quarantinecreate')->middleware('auth');
	Route::post('quarantineupdate', 'QuarantineLocationController@quarantineupdate')->name('quarantineupdate')->middleware('auth');
	Route::post('quarantinecreate', 'QuarantineLocationController@quarantinestore')->name('quarantinecreate')->middleware('auth');
	Route::get('quarantineedit/{id}', 'QuarantineLocationController@quaredit')->middleware('auth');
	Route::get('quarantinedestroy/{id}', 'QuarantineLocationController@quardestroy')->middleware('auth');
	//report
	Route::get('reportlistpage', 'AdminController@reportlistpage')->name('reportlistpage')->middleware('auth');	
	Route::get('reportlist','AdminController@reportajax')->name('reportlist')->middleware('auth');
	
	});

	Route::group(['middleware' => ['auth','App\Http\Middleware\deoMiddleware']], function()
	{
		Route::get('/deo', 'DeoController@deohome')->name('deohome')->middleware('auth');
		
		Route::get('deo/updateexistingentry', 'DeoController@updateexistingentry')->name('deo.updateexistingentry')->middleware('auth');
		Route::post('deo/searchdata', 'DeoController@searchdata')->name('deo.searchdata')->middleware('auth');
		Route::post('deo/healthdatastore', 'DeoController@healthdatastore')->name('deo.healthdatastore')->middleware('auth');
	
		Route::get('deo/institutionlist', 'DeoController@institutionlist')->name('deo.institutionlist')->middleware('auth');	
		Route::post('/deo/filterinstitutionlist', 'DeoController@filterinstitutionlist')->name('deo.filterinstitutionlist')->middleware('auth');

		Route::get('/deo/inhouselist', 'DeoController@inhouselist')->name('deo.inhouselist')->middleware('auth');	
		Route::post('/deo/filterhousevisitlist', 'DeoController@filterhousevisitlist')->name('deo.filterhousevisitlist')->middleware('auth');

		Route::get('deo/movetohospitalpage', 'DeoController@movetohospitalpage')->name('deo.movetohospitalpage')->middleware('auth');
		Route::get('deo/movetohospitallist', 'DeoController@movetohospitallist')->name('deo.movetohospitallist')->middleware('auth');
		Route::get('deo/movetohospital/{id}','DeoController@movetohospital')->name('deo.movetohospital')->middleware('auth');
		Route::post('deo/movetohospitalupdate','DeoController@movetohospitalupdate')->name('deo.movetohospitalupdate')->middleware('auth');

		Route::get('/deo/movedHQtoIQ', 'LsgController@movedHQtoIQ')->name('deo.movedHQtoIQ')->middleware('auth');
		Route::post('/deo/filtermovedHQtoIQlist', 'LsgController@filtermovedHQtoIQlist')->name('deo.filtermovedHQtoIQlist')->middleware('auth');

		Route::get('/deo/movedIQtoHQ', 'LsgController@movedIQtoHQ')->name('deo.movedIQtoHQ')->middleware('auth');	
		Route::post('/deo/filtermovedIQtoHQlist', 'LsgController@filtermovedIQtoHQlist')->name('deo.filtermovedIQtoHQlist')->middleware('auth');
	

	});	

	Route::group(['middleware' => ['auth','App\Http\Middleware\lsgMiddleware']], function()
	{
		Route::get('/lsg', 'LsgController@lsghome')->name('lsghome')->middleware('auth');

		Route::get('lsg/institutionlist', 'DeoController@institutionlist')->name('lsg.institutionlist')->middleware('auth');
		Route::post('/lsg/filterinstitutionlist', 'DeoController@filterinstitutionlist')->name('lsg.filterinstitutionlist')->middleware('auth');

		Route::get('/lsg/inhouselist', 'DeoController@inhouselist')->name('lsg.inhouselist')->middleware('auth');	
		Route::post('/lsg/filterhousevisitlist', 'DeoController@filterhousevisitlist')->name('lsg.filterhousevisitlist')->middleware('auth');

		Route::get('lsg/movetohospitalpage', 'DeoController@movetohospitalpage')->name('lsg.movetohospitalpage')->middleware('auth');
		Route::get('lsg/movetohospitallist', 'DeoController@movetohospitallist')->name('lsg.movetohospitallist')->middleware('auth');
		Route::get('lsg/movetohospital/{id}','DeoController@movetohospital')->name('lsg.movetohospital')->middleware('auth');
		Route::post('lsg/movetohospitalupdate','DeoController@movetohospitalupdate')->name('lsg.movetohospitalupdate')->middleware('auth');	

		Route::get('lsg/movetoHQpage', 'LsgController@movetoHQpage')->name('lsg.movetoHQpage')->middleware('auth');
		Route::get('lsg/movetoHQlist', 'LsgController@movetoHQlist')->name('lsg.movetoHQlist')->middleware('auth');
		Route::get('lsg/movetoHQ/{id}','LsgController@movetoHQ')->name('lsg.movetoHQ')->middleware('auth');
		Route::post('lsg/movetoHQupdate','LsgController@movetoHQupdate')->name('lsg.movetoHQupdate')->middleware('auth');

		Route::get('/lsg/movedHQtoIQ', 'LsgController@movedHQtoIQ')->name('lsg.movedHQtoIQ')->middleware('auth');
		Route::post('/lsg/filtermovedHQtoIQlist', 'LsgController@filtermovedHQtoIQlist')->name('lsg.filtermovedHQtoIQlist')->middleware('auth');

		Route::get('/lsg/movedIQtoHQ', 'LsgController@movedIQtoHQ')->name('lsg.movedIQtoHQ')->middleware('auth');	
		Route::post('/lsg/filtermovedIQtoHQlist', 'LsgController@filtermovedIQtoHQlist')->name('lsg.filtermovedIQtoHQlist')->middleware('auth');
		
	});	

	Route::group(['middleware' => ['auth','App\Http\Middleware\phcMiddleware']], function()
	{
		Route::get('/phcmo', 'PhcController@phchome')->name('phchome')->middleware('auth');

		Route::get('phc/institutionlist', 'DeoController@institutionlist')->name('phc.institutionlist')->middleware('auth');
		Route::post('/phc/filterinstitutionlist', 'DeoController@filterinstitutionlist')->name('phc.filterinstitutionlist')->middleware('auth');

		Route::get('/phc/inhouselist', 'DeoController@inhouselist')->name('phc.inhouselist')->middleware('auth');	
		Route::post('/phc/filterhousevisitlist', 'DeoController@filterhousevisitlist')->name('phc.filterhousevisitlist')->middleware('auth');

		Route::get('phc/movetohospitalpage', 'DeoController@movetohospitalpage')->name('phc.movetohospitalpage')->middleware('auth');
		Route::get('phc/movetohospitallist', 'DeoController@movetohospitallist')->name('phc.movetohospitallist')->middleware('auth');
		Route::get('phc/movetohospital/{id}','DeoController@movetohospital')->name('phc.movetohospital')->middleware('auth');
		Route::post('phc/movetohospitalupdate','DeoController@movetohospitalupdate')->name('phc.movetohospitalupdate')->middleware('auth');	

		Route::get('phc/movetoHQpage', 'LsgController@movetoHQpage')->name('phc.movetoHQpage')->middleware('auth');
		Route::get('phc/movetoHQlist', 'LsgController@movetoHQlist')->name('phc.movetoHQlist')->middleware('auth');
		Route::get('phc/movetoHQ/{id}','LsgController@movetoHQ')->name('phc.movetoHQ')->middleware('auth');
		Route::post('phc/movetoHQupdate','LsgController@movetoHQupdate')->name('phc.movetoHQupdate')->middleware('auth');

		Route::get('/phc/movedHQtoIQ', 'LsgController@movedHQtoIQ')->name('phc.movedHQtoIQ')->middleware('auth');
		Route::post('/phc/filtermovedHQtoIQlist', 'LsgController@filtermovedHQtoIQlist')->name('phc.filtermovedHQtoIQlist')->middleware('auth');

		Route::get('/phc/movedIQtoHQ', 'LsgController@movedIQtoHQ')->name('phc.movedIQtoHQ')->middleware('auth');	
		Route::post('/phc/filtermovedIQtoHQlist', 'LsgController@filtermovedIQtoHQlist')->name('phc.filtermovedIQtoHQlist')->middleware('auth');
	});	

	Route::group(['middleware' => ['auth','App\Http\Middleware\distMiddleware']], function()
	{

	});

	Route::group(['middleware' => ['auth','App\Http\Middleware\stateMiddleware']], function()
	{

	});

});