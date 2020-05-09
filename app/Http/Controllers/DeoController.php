<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use App\User;
use App\Ailment;
use App\Transittype;
use App\Transitpoint;
use App\District;
use App\Expatriate;
use App\Housevisit;
use App\SymptomName;
use App\Ward;
use DataTables;
use Hash;
use DB;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DeoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function deohome()
    {
        return view('deohome');
    }

    /*-----------------------------------------------Online Submission List (Start)-------------------------------------------------------------------*/
    public function onlinelist() {
 
        return view('deo_onlinelist');
    }

    public function institutionlist(Request $request) {
    	$frmdt = Carbon::today()->subDays(7)->format('d/m/Y');
    	$todt = Carbon::today()->format('d/m/Y');
    	$fromdate = new \MongoDB\BSON\UTCDateTime(strtotime(Carbon::today()->subDays(7)) * 1000);
    	$todate =  new \MongoDB\BSON\UTCDateTime(strtotime('tomorrow') * 1000);
    	if(Auth::user()->usertype == 'Data entry operator'){
    		$userid = Auth::user()->id;
 			 		
 			$listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->select('_id','name','mobilenumber','ward')->get(); 
 			

    	} elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->select('_id','name','mobilenumber','ward')->get(); 

    	}
 		     return view('deo_instituionlist',compact('listdatas','frmdt','todt'));   
        
        
    }

    public function filterinstitutionlist(Request $request){
    	// echo $request->fromdate; echo $request->todate;
    	$userid = Auth::user()->id;
    	$frmdt = $request->fromdate; $from_exp = explode('/',$frmdt); $fromfnl = $from_exp[1].'/'.$from_exp[0].'/'.$from_exp[2];
    	$todt = $request->todate; $to_exp = explode('/',$todt); $tofnl = $to_exp[1].'/'.$to_exp[0].'/'.$to_exp[2];
    	$fromdate = new \MongoDB\BSON\UTCDateTime(strtotime($fromfnl)* 1000);
    	$todate = new \MongoDB\BSON\UTCDateTime(strtotime($tofnl)* 1000);

        if(Auth::user()->usertype == 'Data entry operator'){
    	$listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->select('_id','name','mobilenumber','ward')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->select('_id','name','mobilenumber','ward')->get(); 

        }


        
        return view('deo_instituionlist',compact('listdatas','frmdt','todt'));

    }

    public function inhouselist(Request $request) {
    	$frmdt = Carbon::today()->subDays(7)->format('d/m/Y');
    	$todt = Carbon::today()->format('d/m/Y');
    	$fromdate = new \MongoDB\BSON\UTCDateTime(strtotime(Carbon::today()->subDays(7)) * 1000);
    	$todate =  new \MongoDB\BSON\UTCDateTime(strtotime('tomorrow') * 1000);;
 		
        if(Auth::user()->usertype == 'Data entry operator'){
            $userid = Auth::user()->id;
     		$listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->select('_id','name','mobilenumber','ward')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->select('_id','name','mobilenumber','ward')->get();

        }

        
        return view('deo_inhouselist',compact('listdatas','frmdt','todt'));
        
    }

    public function filterhousevisitlist(Request $request){
    	// echo $request->fromdate; echo $request->todate;
    	
    	$frmdt = $request->fromdate; $from_exp = explode('/',$frmdt); $fromfnl = $from_exp[1].'/'.$from_exp[0].'/'.$from_exp[2];
    	$todt = $request->todate; $to_exp = explode('/',$todt); $tofnl = $to_exp[1].'/'.$to_exp[0].'/'.$to_exp[2];
    	$fromdate = new \MongoDB\BSON\UTCDateTime(strtotime($fromfnl)* 1000);
    	$todate = new \MongoDB\BSON\UTCDateTime(strtotime($tofnl)* 1000);

        if(Auth::user()->usertype == 'Data entry operator'){
            $userid = Auth::user()->id;
    	   $listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->select('_id','name','mobilenumber','datacollection')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->select('_id','name','mobilenumber','datacollection')->get();

        } 


        
        return view('deo_inhouselist',compact('listdatas','frmdt','todt'));

    }

    
   
    /*-----------------------------------------------Online Submission List (End)-------------------------------------------------------------------*/



    public function updateexistingentry()
    {
        return view('housevisitentry');
    }

    //==============================================================
    public function searchdata(Request $request)
     {
       // dd($request)
       $lsg = Auth::user()->localbody;
       $dst = Auth::user()->districtname;
        $diseaselist=Ailment::orderBy('name')->get();
        $symtomlist=SymptomName::all();      
        $warddata=Ward::where('wardlsgName',$lsg)->where('wardDistrict',$dst)->get();
        $searchmode=$request->searchmode;
       // $listdata = Expatriate::where($searchmode,$request->number)->get();
       
        //$test =  DB::table('expatriates')->where($searchmode,$request->number)->select('datacollection')->latest()->first();dd($test);
        $val =Expatriate::where($searchmode,$request->number)->where('quarantinestatus','HQ')->where('datacollection', 'exists', true)->count();
       
        if($val>0){
            $listdata = DB::collection('expatriates')->where($searchmode,$request->number)
           
            ->project(['datacollection.housevisit' => ['$slice' => -1]])
            ->get();

            foreach($listdata as $listdata1)
            {
               
                     foreach($listdata1['datacollection'] as $list2){
                        foreach($list2 as $list3)
                        {
                            //dd($list3['housevisittimestamp']);

                           
                            $Dday       = $list3['housevisittimestamp'];
                             $date = Carbon::now()->subDays(3);
                           $today = new \MongoDB\BSON\UTCDateTime(strtotime($date) * 1000);

                            if($today > $Dday)
                            {
                            $datecheck=1;
                             
                            }
                            else
                            {
                            $datecheck=0;
                            }


                        }
                     }
       
            }
        } else {
          $listdata =   DB::table('expatriates')->where($searchmode,$request->number)->select('*')->latest()->get();
          $datecheck=0;
        }

           return view('housevisitentry',compact('listdata','diseaselist','symtomlist','warddata','datecheck'));
         
       
}
   
//===========================================================================================
public function healthdatastore(Request $request)
     {

        $today = Carbon::now();
        $date = new \MongoDB\BSON\UTCDateTime(strtotime($today) * 1000);
        $userid=Auth::user()->id;
       

                $contact_details = [];
            for($i= 0; $i < count($request->closecontactname); $i++){
                $contact_details[] = [
                    'closecontactname' => $request->closecontactname[$i],
                    'closecontactage' => $request->closecontactage[$i],
                     'closecontactgender' => $request->closecontactgender[$i],
                     
                    ];
                }





            $form_data =array(
               
                'ward'=>$request->ward,
                'ailmentdetails'=>$request->ailmentdetails,
                'oldagestatus'=>$request->oldagestatus,
                'pregnantwomenstatus'=>$request->pregnantwomenstatus,
                'feedingwomenstatus'=>$request->feedingwomenstatus,
                'quarantinestarteddate'=>$request->quarantinestarteddate,
                'symptomsstatus'=>$request->symptomsstatus,
                'symptomsdetails'=>$request->symptomsdetails,
                'lsgfoodavailability'=>$request->lsgfoodavailability,
                'medicineavailability'=>$request->medicineavailability,
                'mentalstressstatus'=>$request->mentalstressstatus,
                'telemedicinestatus'=>$request->telemedicinestatus,
                'closecontactstatus'=>$request->closecontactstatus,
                'closecontactdet'=>$contact_details,
                'closecontactdisease' => $request->closecontactdisease,
                'housevisittimestamp'=>$date,
                'visitstatus'=>'visited',
                'userid'=>$userid);

           
                //--visitstatus= visited :for Asha worker,and visitstatus=self : for self reporting expats

         $successmsg='Data is successfully updated';

        Expatriate::where('_id', '=', $request->hidden_id)
            ->push('datacollection.housevisit', $form_data);      
            return view('housevisitentry',compact('successmsg'));
    }


//===============================================

    public function movetohospitalpage()
    {
         /*if(Auth::user()->usertype == 'Data entry operator'){
                $userid = Auth::user()->id;
                $expatdata = Expatriate::where('quarantinestatus','HQ')->where('datacollection.housevisit.userid',$userid)->get();
            }
            elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
                $lsg = Auth::user()->localbody;
                $dst = Auth::user()->districtname;
                $expatdata = Expatriate::where('quarantinestatus','HQ')->where('district',$dst)->where('lsg',$lsg)->get();

            }
            foreach ($expatdata as $val) {
                dump($val['_id']);
            }*/
            
        return view('movetohospital');
    }

     public function movetohospitallist(Request $request)
    {

         if($request ->ajax())
        {
            if(Auth::user()->usertype == 'Data entry operator'){
                $userid = Auth::user()->id;
                $expatdata = Expatriate::where('quarantinestatus','HQ')->where('datacollection.housevisit.userid',$userid)->get();
            }
            elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
                $lsg = Auth::user()->localbody;
                $dst = Auth::user()->districtname;

                $expatdata = Expatriate::where('quarantinestatus','HQ')->where('lsg',$lsg)->where('district',$dst)->where('datacollection', 'exists', true)->get();

            }
           // dd($expatdata);
            return DataTables::of($expatdata)

                ->addColumn('action', function ($expatdata){
                    $button = '<button type="button" class="edit btn btn-point btn-flat btn-secondary" name="edit" id="'.$expatdata->_id.'">Move </button>';
                   
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }        
       
    }

    public function movetohospital(Request $request, $id)
    {
         if($request->ajax())
        {
            $userdata = Expatriate::find($id);

            return response()->json(['userdata' => $userdata]);
        }
    }
   
    public function movetohospitalupdate(Request $request)
    {
        if($request->ajax())
        {
                $userid=Auth::user()->id;
            request()->validate([
            'hospitalname'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'quarantinestatus'=>   'IQ',
                'hospitalname'    =>  $request->hospitalname,
                'movehospitalremark'=>  $request->movehospitalremark,
                'moved_userid'    =>  $userid,
                'hospitalizedtimestamp'=>date('Y-m-d H:i:s'),
                'move_status'=>'1'
            );
           Expatriate::where('_id',$request->hidden_id)->update($form_data);
        }
       
        return response()->json(['success' => 'Data is successfully updated']);
    }


    
}
