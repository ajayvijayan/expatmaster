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

class LsgController extends Controller
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

    public function lsghome()
    {
        return view('lsghome');
    }

    //============================================================================================
                                    //move to HQ
    //============================================================================================

public function movetoHQpage()
{
    return view('movetohome');
}

     public function movetoHQlist(Request $request)
    {
         if($request ->ajax())
        {
            if(Auth::user()->usertype == 'Data entry operator'){
                $userid = Auth::user()->id;
                $expatdata = Expatriate::where('quarantinestatus','IQ')->where('datacollection.housevisit.userid',$userid)->get();
               } 
            elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) 
            {
                $lsg = Auth::user()->localbody;
                $dst = Auth::user()->districtname;
                
                $expatdata = Expatriate::where('quarantinestatus','IQ')->where('lsg',$lsg)->where('district',$dst)->where('datacollection', 'exists', true)->get();

            }    
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

    public function movetoHQ(Request $request, $id)
    {
         if($request->ajax())
        {
            $userdata = Expatriate::find($id);

            return response()->json(['userdata' => $userdata]);
        }
    }
   
    public function movetoHQupdate(Request $request)
    {
        if($request->ajax())
        {
                $userid=Auth::user()->id;
            request()->validate([
            'movehomeremark'  => 'required|min:2|max:100|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'quarantinestatus'=>'HQ',
                'movehomeremark'=>  $request->movehomeremark,
                'moved_userid'    =>  $userid,
                'hometimestamp'=>date('Y-m-d H:i:s'),
                'move_status'=>'1'
            );
           Expatriate::where('_id',$request->hidden_id)->update($form_data);
        }
       
        return response()->json(['success' => 'Data is successfully updated']);
    }
    //============================================================================================

    
    public function movedHQtoIQ(Request $request) {
        $frmdt = Carbon::today()->subDays(7)->format('d/m/Y');
        $todt = Carbon::today()->format('d/m/Y');
        $fromdate = new \MongoDB\BSON\UTCDateTime(strtotime(Carbon::today()->subDays(7)) * 1000);
        $todate =  new \MongoDB\BSON\UTCDateTime(strtotime('tomorrow') * 1000);


        if(Auth::user()->usertype == 'Data entry operator'){
            $userid = Auth::user()->id;
            $listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 

        }
             return view('movedHQtoIQlist',compact('listdatas','frmdt','todt'));   
        
        
    }

    public function filtermovedHQtoIQlist(Request $request){
        // echo $request->fromdate; echo $request->todate;
        $userid = Auth::user()->id;
        $frmdt = $request->fromdate; $from_exp = explode('/',$frmdt); $fromfnl = $from_exp[1].'/'.$from_exp[0].'/'.$from_exp[2];
        $todt = $request->todate; $to_exp = explode('/',$todt); $tofnl = $to_exp[1].'/'.$to_exp[0].'/'.$to_exp[2];
        $fromdate = new \MongoDB\BSON\UTCDateTime(strtotime($fromfnl)* 1000);
        $todate = new \MongoDB\BSON\UTCDateTime(strtotime($tofnl)* 1000);

        if(Auth::user()->usertype == 'Data entry operator'){
            $userid = Auth::user()->id;
            $listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','IQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 

        }
        
        return view('movedHQtoIQlist',compact('listdatas','frmdt','todt'));

    }

    public function movedIQtoHQ(Request $request) {
        $frmdt = Carbon::today()->subDays(7)->format('d/m/Y');
        $todt = Carbon::today()->format('d/m/Y');
        $fromdate = new \MongoDB\BSON\UTCDateTime(strtotime(Carbon::today()->subDays(7)) * 1000);
        $todate =  new \MongoDB\BSON\UTCDateTime(strtotime('tomorrow') * 1000);
        
        if(Auth::user()->usertype == 'Data entry operator'){
            $userid = Auth::user()->id;
            $listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get();

        }
             return view('movedIQtoHQlist',compact('listdatas','frmdt','todt'));   
        
        
    }

    public function filtermovedIQtoHQlist(Request $request){
        // echo $request->fromdate; echo $request->todate;
        $userid = Auth::user()->id;
        $frmdt = $request->fromdate; $from_exp = explode('/',$frmdt); $fromfnl = $from_exp[1].'/'.$from_exp[0].'/'.$from_exp[2];
        $todt = $request->todate; $to_exp = explode('/',$todt); $tofnl = $to_exp[1].'/'.$to_exp[0].'/'.$to_exp[2];
        $fromdate = new \MongoDB\BSON\UTCDateTime(strtotime($fromfnl)* 1000);
        $todate = new \MongoDB\BSON\UTCDateTime(strtotime($tofnl)* 1000);

        if(Auth::user()->usertype == 'Data entry operator'){
            $userid = Auth::user()->id;
            $listdatas = Expatriate::where('datacollection.housevisit.userid',$userid)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 
        } elseif((Auth::user()->usertype == 'Lsg official')||(Auth::user()->usertype == 'phcmo')) {
            $lsg = Auth::user()->localbody;
            $dst = Auth::user()->districtname;
            $listdatas = Expatriate::where('lsg',$lsg)->where('district',$dst)->where('datacollection.housevisit.housevisittimestamp','>=',$fromdate)->where('datacollection.housevisit.housevisittimestamp','<',$todate)->where('quarantinestatus','HQ')->where('move_status','1')->select('_id','name','mobilenumber','ward')->get(); 

        }
        
        return view('movedIQtoHQlist',compact('listdatas','frmdt','todt'));

    }

}
