<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usertype;
use App\User;
use App\Ailment;
use App\Transittype;
use App\Transitpoint;
use App\District;
use DataTables;
use Hash;

class AdminController extends Controller
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

    public function adminhome()
    {
        return view('adminhome');
    }

   
    /*------------------------------------------------------------Usertype (Start)-------------------------------------------------------------------*/
    public function usertypelistpage() {
 
        return view('master_usertype');
    }

    public function usertypelist(Request $request)
    {
        if($request->ajax())
        {
            $listdata = Usertype::all();
           
            return DataTables::of($listdata)
            ->addColumn('action',function($listdata){
              $button = '<button type="button" class="edit btn btn-point btn-flat btn-secondary" name="edit" id="'.$listdata->_id.'">Edit </button>';
              $button.= '&nbsp;&nbsp;&nbsp;<button type="button" class="delete btn btn-point btn-flat btn-danger" name="delete" id="'.$listdata->_id.'">Delete </button>';
              return $button;
            })

            ->rawColumns(['action'])
            ->make(true);
        }
        
    }

    public function usertypestore(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
            'name'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            
            Usertype::create($request->all());
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function usertypeedit(Request $request, $id)
    {
        if($request->ajax())
        {
            $userdata = Usertype::find($id);
            
            return response()->json(['userdata' => $userdata]);
        }
    }

    public function usertypeupdate(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
            'name'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'name'          =>  $request->name
            );
           Usertype::where('_id',$request->hidden_id)->update($form_data);
        }
        
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function usertypedestroy(Request $request, $id)
    {
        if($request->ajax())
        {
          Usertype::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /*------------------------------------------------------------Usertype (End)-------------------------------------------------------------------*/

    /*------------------------------------------------------------User (Start)-------------------------------------------------------------------*/
    
    public function userlistpage() {
        
        return view('master_user');
    }

    public function usercreate(Request $request)
    {
        if($request->ajax())
        {
            $usertype =  Usertype::all();
            $transitpoint =Transitpoint::all();
            return response()->json(['usertype' => $usertype,'transitpoint'=>$transitpoint]);
        }
    }

    public function userlist(Request $request)
    {
        if($request->ajax())
        {

            $listdata = User::all();
           
            return DataTables::of($listdata)
            ->addColumn('action',function($listdata){
              $button = '<button type="button" class="edit btn btn-point btn-flat btn-secondary" name="edit" id="'.$listdata->_id.'">Edit </button>';
              $button.= '&nbsp;&nbsp;&nbsp;<button type="button" class="delete btn btn-point btn-flat btn-danger" name="delete" id="'.$listdata->_id.'">Delete </button>';
              return $button;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->make(true);
          
        }
       
    }

    public function userstore(Request $request)
    { 
        if($request->ajax())
        {
             request()->validate([
                'name'          =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'fullname'      =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'email'         =>  'required|email',
                'mobile'        =>  'required|digits:10',
                'password'      =>  'required|min:8',
                'usertype'      =>  'required',
                'transitpoint'  =>  'required'
            ]);
             
            $form_data = array(
                'name'          =>  $request->name,
                'fullname'      =>  $request->fullname,
                'email'         =>  $request->email,
                'mobile'        =>  $request->mobile,
                'password'      =>  Hash::make($request->password),
                'usertype'      =>  $request->usertype,
                'transitpoint'  =>  $request->transitpoint
            );
            User::create($form_data);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function useredit(Request $request, $id)
    {
        if($request->ajax())
        {
            $userdata = User::find($id);
            $usertype =  Usertype::all();
            $transitpoint =Transitpoint::all();
            return response()->json(['userdata' => $userdata, 'usertype' => $usertype,'transitpoint'=>$transitpoint]);
        }
    }

    public function userupdate(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'name'          =>  'required|min:2|max:30',
                'fullname'      =>  'required|min:2|max:30',
                'email'         =>  'required|email',
                'mobile'        =>  'required|digits:10',
                'password'      =>  'required|min:8',
                'usertype'      =>  'required',
                'transitpoint'  =>  'required'
                
            ]);
            $form_data = array(
                'name'          =>  $request->name,
                'fullname'      =>  $request->fullname,
                'email'         =>  $request->email,
                'mobile'        =>  $request->mobile,
                'password'      =>  Hash::make($request->password),
                'usertype'      =>  $request->usertype,
                'transitpoint'  =>  $request->transitpoint
            );

            User::where('_id',$request->hidden_id)->update($form_data);
        }
        
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function userdestroy(Request $request, $id)
    {
        if($request->ajax())
        {
          User::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /*------------------------------------------------------------Ailment (Start)-------------------------------------------------------------------*/
    public function ailmentlistpage()
    {

       return view('ailmentlist'); 
    }
    

    

      
//===============================================================
    public function ailmentlist(Request $request)
    {
        if($request->ajax())
        {
            $listdata = Ailment::all();
           
            return DataTables::of($listdata)
            ->addColumn('action',function($listdata){
              $button = '<button type="button" class="edit btn btn-point btn-flat btn-secondary" name="edit" id="'.$listdata->_id.'">Edit </button>';
              $button.= '&nbsp;&nbsp;&nbsp;<button type="button" class="delete btn btn-point btn-flat btn-danger" name="delete" id="'.$listdata->_id.'">Delete </button>';
              return $button;
            })

            ->rawColumns(['action'])
            ->make(true);
        }
       
    }


    public function ailmentstore(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
            'name'  => 'required|min:2|max:100|regex:/^[\pL\s]+$/u'
            ]);
           
            Ailment::create($request->all());
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    
    public function ailmentedit(Request $request, $id)
    {
        
        if($request->ajax())
        {
            $userdata = Ailment::find($id);
           
            
        }
        return response()->json(['userdata' => $userdata]);
    }

    public function ailmentupdate(Request $request)
    {
         //dd($request);
        if($request->ajax())
        {
            request()->validate([
            'name'  => 'required|min:2|max:100|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'name'          =>  $request->name
            );
           Ailment::where('_id',$request->hidden_id)->update($form_data);
        }
       
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function ailmentdestroy(Request $request, $id)
    {
        if($request->ajax())
        {
          Ailment::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    //=====================================================

     /*------------------------------------------------------------Ailment (Start)-------------------------------------------------------------------*/
    public function transitpointlistpage()
    {

       return view('transitlist'); 
    }
    public function transitpointlist(Request $request)
    {
        if($request->ajax())
        {
            $listdata = Transitpoint::all();
           
            return DataTables::of($listdata)
            ->addColumn('action',function($listdata){
              $button = '<button type="button" class="edit btn btn-point btn-flat btn-secondary" name="edit" id="'.$listdata->_id.'">Edit </button>';
              $button.= '&nbsp;&nbsp;&nbsp;<button type="button" class="delete btn btn-point btn-flat btn-danger" name="delete" id="'.$listdata->_id.'">Delete </button>';
              return $button;
            })

            ->rawColumns(['action'])
            ->make(true);
        }
       
    }
    public function transitpointcreate(Request $request)
    {
        if($request->ajax())
        {
            $transittype =  Transittype::all();
            //$district[] =  District::where('_id','5e9fe9d02cd3601f5beb2199')->project(['districts' => ['$slice' => 1]]);
            $district =  District::where('_id','5e9fe9d02cd3601f5beb2199')->get();
            return response()->json(['transittype' => $transittype, 'district' => $district]);
        }
    }

    public function transitpointstore(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
            'name'  => 'required|min:2|max:100|regex:/^[\pL\s]+$/u',
            'transittype' => 'required',
            'district' => 'required'
            ]);
            $form_data = array(
                'name'          =>  $request->name,
                'transittype'          =>  $request->transittype,
                'districtname'          =>  $request->district
            );
           
            Transitpoint::create($form_data);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    
    public function transitpointedit(Request $request, $id)
    {
        
        if($request->ajax())
        {
            $userdata = Transitpoint::find($id);
            $transittype =  Transittype::all();
            
            $district =  District::where('_id','5e9fe9d02cd3601f5beb2199')->get();
            
        }
        return response()->json(['userdata' => $userdata, 'transittype' => $transittype, 'district' => $district]);
    }

    public function transitpointupdate(Request $request)
    {
         //dd($request);
        if($request->ajax())
        {
            request()->validate([
            'name'  => 'required|min:2|max:100|regex:/^[\pL\s]+$/u',
            'transittype' => 'required',
            'district' => 'required'
            ]);
            $form_data = array(
                'name'          =>  $request->name,
                'transittype'          =>  $request->transittype,
                'districtname'          =>  $request->district
            );
           Transitpoint::where('_id',$request->hidden_id)->update($form_data);
        }
       
        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function transitpointdestroy(Request $request, $id)
    {
        if($request->ajax())
        {
          Transitpoint::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

    //=====================================================

                // Report-Anoop

    //====================================================
    public function reportlistpage()
    {

       return view('report'); 
    }

    public function reportajax(Request $request)
{
    if($request->ajax())
    {
        $listdata = User::all();
        return DataTables::of($listdata)
            ->rawColumns(['action'])
            ->make(true);
    }
}
 //=====================================================

                // Report-Anoop

    //====================================================
}
