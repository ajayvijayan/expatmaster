<?php

namespace App\Http\Controllers;

use App\Quarantinelocation;
use App\Transittype;
use App\District;
use Illuminate\Http\Request;
use DataTables;
class QuarantinelocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dataentry.quarantinelocation');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quarantinelistajax(Request $request)
    {

        if($request->ajax())
        {
            $listdata = Quarantinelocation::all();

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

    public function quarantineupdate(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'name'          =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'transittype'      =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'district'      =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'name'          =>  $request->name,
                'transittype'      =>  $request->transittype,
                'districtname'      =>  $request->district
            );

            Quarantinelocation::where('_id',$request->hidden_id)->update($form_data);
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


    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transitstore(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'name'          =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'fullname'      =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'email'         =>  'required|email',
                'mobile'        =>  'required|numeric|min:10|max:10',
                'password'      =>  'required|min:8',
                'usertype'      =>  'required'
            ]);

            $form_data = array(
                'name'          =>  $request->name,
                'fullname'      =>  $request->fullname,
                'email'         =>  $request->email,
                'mobile'        =>  $request->mobile,
                'password'      =>  Hash::make($request->password),
                'usertype'      =>  $request->usertype
            );
            User::create($form_data);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quardestroy(Request $request, $id)
    {
        if($request->ajax())
        {
            Quarantinelocation::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
    public function quarantinecreate(Request $request)
    {
        if($request->ajax())
        {
            $transittype =  Transittype::all();
            $district =  District::where('state','Kerala')->get();
            return response()->json(['transittype' => $transittype, 'district' => $district]);
        }
    }
    public function quarantinestore(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'name'          =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'transittype'      =>  'required',
                'district'      =>  'required'
            ]);

            $form_data = array(
                'name'            =>  $request->name,
                'transittype'          =>  $request->transittype,
                'districtname'      =>  $request->district
            );
            Quarantinelocation::create($form_data);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }
    public function quaredit(Request $request, $id)
    {
        if($request->ajax())
        {
            $userdata = Quarantinelocation::find($id);
            $transittype =  Transittype::all();
            $district =  District::where('_id','5e9fe9d02cd3601f5beb2199')->get();

        }
        return response()->json(['userdata' => $userdata, 'transittype' => $transittype, 'district' => $district]);
    }

}
