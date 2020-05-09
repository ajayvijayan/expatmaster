<?php

namespace App\Http\Controllers;

use App\QuarantineLocType;
use Illuminate\Http\Request;
//use DB;
use DataTables;

class QuarantineloctypeController extends Controller
{

    public function index(){
        $qdata = quarantineLocType::all();
//        dd($qdata);
        return view('qltype');

    }

    public function qlocationtype(Request $request){

        if($request ->ajax()){
            $qdata = quarantineLocType::all();



            return DataTables::of($qdata)
                ->addColumn('action', function ($qdata){
                    $button = '<button type="button" class="edit btn btn-point btn-flat btn-secondary" name="edit" id="'.$qdata->_id.'">Edit </button>';
                    $button.= '&nbsp;&nbsp;&nbsp;<button type="button" class="delete btn btn-point btn-flat btn-danger" name="delete" id="'.$qdata->_id.'">Delete </button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

//    public function insertlocationtype(Request $request){
////        dd($request);exit();
//        if($request->ajax())
//        {
//            request()->validate([
//                'loctypename'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
//            ]);
//
//            quarantineLocType::insert($request->all());
//        }
//        return response()->json(['success' => 'TRUE']);
//    }
//
//    public function qlocationedit(Request $request, $id){
//        if($request->ajax()){
//            $locationdata = quarantineLocType::find($id);
//            return response()->json(['locationdata' => $locationdata]);
//        }
//    }
//
//    public function usertypeupdate(Request $request)
//    {
//        if($request->ajax())
//        {
//            request()->validate([
//                'name'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
//            ]);
//            $form_data = array(
//                'name'          =>  $request->name
//            );
//            Usertype::where('_id',$request->hidden_id)->update($form_data);
//        }
//        return response()->json(['success' => 'Data is successfully updated']);
//    }


    public function usertypestore(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'loctypename'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);

            quarantineLocType::create($request->all());
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function usertypeedit(Request $request, $id)
    {
        if($request->ajax())
        {
            $userdata = quarantineLocType::find($id);

            return response()->json(['userdata' => $userdata]);
        }
    }

    public function usertypeupdate(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'loctypename'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'loctypename'          =>  $request->loctypename
            );
            quarantineLocType::where('_id',$request->hidden_id)->update($form_data);
        }

        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function usertypedestroy(Request $request, $id)
    {
        if($request->ajax())
        {
            quarantineLocType::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }

}
