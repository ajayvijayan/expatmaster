<?php

namespace App\Http\Controllers;

use App\Ailment;
use App\SymptomName;
use App\User;
use MongoDB\BSON\ObjectId;
use Validator;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Expatriate;
use DB;
use Illuminate\Support\Carbon;

class SelfreportingController extends Controller
{

    public function verifyuser(Request $request, $mobile, $dob){


        if($request->ajax())
        {
            $r = [
                'doctor_id' => $mobile,
                'dateofbirth' => $dob
            ];
            $validator = Validator::make($r, [
                'mobile'  => 'required|min:10|max:10|regex:/[0-9]{10}/',
                'dateofbirth' => 'required'
            ]);



            $dateofbirth = date('d-m-Y', strtotime($dob));

            $datacheck = DB::collection('expatriates')
                ->where('mobilenumber', $mobile)
                ->where('dateofbirth', $dateofbirth)
                ->get()
                ->count();


            Session::put('sessionmobile', $mobile);
            Session::put('sessiondob', $dateofbirth);
//            return response()->json($data);

            if($datacheck == 0) {
                $data['success'] = false;
            }else{
                $data['success'] = true;
            }



//            if($datacheck == 0) {
//                $data['success'] = false;
//            }else{
//                $data['success'] = true;
//                $otp =  $this->generateotp();
//                $otptimestamp = Carbon::now();
//                $form_data = array(
//                    'otp' => $otp,
//                    'otptimestamp' => $otptimestamp
//                );
//                $otpstatusvalue = 3;
//                /* -------------------------------------------- Send Custom SMS (start) --------------------------------- */
//                $message = "OTP for Self Reporting  ".$otp;
//                $number = $mobile;
//                $link = curl_init();
//                curl_setopt($link , CURLOPT_URL, "http://api.esms.kerala.gov.in/fastclient/SMSclient.php?username=sannadham-portal&password=Prtl@Mdns20&message=".$message."&numbers=".$number."&senderid=KLMGOV");
//                curl_setopt($link , CURLOPT_RETURNTRANSFER, 1);
//                curl_setopt($link , CURLOPT_HEADER, 0);
//                curl_exec($link);
//                curl_close($link );
//
//                Session::put('otp_session', $otp);
//                $data['success'] = true;
//                $data['mobileno'] = $mobile;
//
//                /* -------------------------------------------- Send Custom SMS (end) --------------------------------- */
////                return view('auth.volunteerloginpage',compact('otp','otpstatusvalue','mobilenumber'));
//            }
            return response()->json($data);
        }
    }

    public function verifyotp(Request $request, $otp){
        if($request->ajax()){

            $otpsent = Session::get('otp_session');

            if($otpsent === $otp){
                $data['success'] = true;
            }else{
                $data['success'] = false;
            }

            return response()->json($data);
        }
    }

    public function generateotp(){

        $characters = '0123456789';
        $result = '';
        for ($i = 0; $i < 4; $i++) {
            $result .= $characters[mt_rand(0, 9)];
        }

        return $result;
    }

    public function selfreporting(){

        $diseaselist=Ailment::orderBy('name')->get();
        $symtomlist=SymptomName::all();

        $mobile = Session::get('sessionmobile');
        $dob = Session::get('sessiondob');

        $listdata = DB::collection('expatriates')
            ->where('mobilenumber', $mobile)
            ->where('dateofbirth', $dob)
            ->where('quarantinestatus', 'HQ')
            ->skip(0)
            ->take(1)
            ->get();

        return view('selfreporting',compact('listdata','diseaselist','symtomlist'));


    }

    public function selfhealthdatastore(Request $request){

        $date = new \MongoDB\BSON\UTCDateTime(strtotime('today') * 1000);

        $rules = [];


        foreach($request->input('closecontactname') as $key => $value) {

            $rules["closecontactname.{$key}"] = '';
            $rules["age.{$key}"] = 'between:0,120';
            $rules["closecontactgender.{$key}"] = '';

        }

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->passes()) {
            return Redirect::back()->withErrors($validator);
        }

        for($i =0; $i < count($request->closecontactname); $i++){
            $contact_details[] = [
                'closecontactname'=>$request->closecontactname[$i],
                'age'=>$request->age[$i],
                'closecontactgender'=>$request->closecontactgender[$i]
            ];
        }

        $person = Expatriate::where('_id', '=', $request->hidden_id)->select('name','lsg','ward','mobilenumber', 'district')->get();
        $personlsg = $person[0]['lsg'];
        $personname = $person[0]['name'];
        $personward = $person[0]['ward'];
        $personmobile = $person[0]['mobilenumber'];
        $persondistrict = $person[0]['district'];




        if($request->lsgfoodavailability == ''){
//            $alert_to_lsg = User::where('localbody', '=', $personlsg)
//                    ->where('usertype', '=', 'lsg')
//                    ->where('districtname', '=', $persondistrict)
//                    ->select('personname', 'mobilenumber')
//                ->get();
//
//            $toname = $alert_to_lsg[0]['personname'];
//            $tomobile = $alert_to_lsg[0]['mobilenumber'];

            $alert_to_lsg = User::where('localbody', '=', 'Alappad')
                    ->where('usertype', '=', 'lsg')
                    ->where('districtname', '=', 'Kollam')
                    ->select('personname', 'mobilenumber')
                ->get();

            // $toname = $alert_to_lsg[0]['personname'];
            // $tomobile = $alert_to_lsg[0]['mobilenumber'];

                $toname = 'name';
                $tomobile = '9496814769';

            $mobile='9745609296';//tomobile
            $message= 'Food request from '.$personname.'('.$personmobile.')';
//            $this->sendalert($mobile, $message);

            $values = array(
                'fromname' =>$personname,
                'frommobile' => $personmobile,
                'toname' => $toname,
                'tomobile' => $tomobile,
                'message'=>$message,
                'msgtype' =>'food availability'
            );
            DB::collection('msgalert')->insert($values);
//            print_r($toname);exit();
        }
        if($request->telemedicinestatus != ''){
                $alert_to_lsg = User::where('localbody', '=', $personlsg)
                    ->where('usertype', '=', 'phcmo')
                    ->where('districtname', '=', $persondistrict)
                    ->select('personname', 'mobilenumber')
                ->get();

//            $toname = $alert_to_lsg[0]['personname'];
//            $tomobile = $alert_to_lsg[0]['mobilenumber'];

            $toname = 'name';
            $tomobile = '9496814769';


            $mobile='9496814769';//tomobile
            $message= 'Tele-medicine Request From '.$personname.'('.$personmobile.')';
//            $this->sendalert($mobile, $message);


            $values = array(
                'fromname' =>$personname,
                'frommobile' => $personmobile,
                'toname' => $toname,
                'tomobile' => $tomobile,
                'message'=>$message,
                'msgtype' =>'Telemedicine'
            );
            DB::collection('msgalert')->insert($values);


        }

        $form_data =array(
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
            'visitstatus'=>'self',
            'userid'=>0);




        $returnValue = Expatriate::where('_id', '=', $request->hidden_id)
            ->push('datacollection.selfdeclare', $form_data);
        if($returnValue == 0){
            $successmsg = 'Data Not Updated!, Unknown Error !!!';
            return view('/selfreporting',compact('successmsg'));
        }else{
            Session::forget('mobilenumber');
            Session::forget('dateofbirth');
            Session::flash('message', "true");
            return redirect('/');
        }


    }

    public function sendalert($number, $message){


//                $number = $mobile;
        $link = curl_init();
        curl_setopt($link , CURLOPT_URL, "http://api.esms.kerala.gov.in/fastclient/SMSclient.php?username=sannadham-portal&password=Prtl@Mdns20&message=".$message."&numbers=".$number."&senderid=KLMGOV");
        curl_setopt($link , CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($link , CURLOPT_HEADER, 0);
        curl_exec($link);
        curl_close($link );


    }

    public function mobileupdate(Request $request){
        if($request->ajax())
        {
            //dd($request);
            request()->validate([
                'mobilenumber'   =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
                //'expid'   =>  'required'
            ]);
            $form_data = array(
                'mobilenumber'       =>  $request->mobilenumber
                //'hidden_id'          =>  $request->mobilenumber
            );
            //print_r($request->hidden_id);
            $count=Expatriate::where('_id',$request->hidden_id)->update($form_data);
            //print_r(DB::getQueryLog());
            if($count==0)
            {
                return response()->json(['success' => 'false']);
            }
            else
            {

                return response()->json(['success' => 'true']);
            }
        }
    }



}
