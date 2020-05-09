<?php

namespace App\Http\Controllers;

use App\SymptomName;
use Illuminate\Http\Request;
use DataTables;

class SymptomController extends Controller
{
    public function index(){
//        $qdata = SymptomName::all();
        return view('symtoms');

    }

    public function symptomdata(Request $request){

        if($request ->ajax()){
            $qdata = SymptomName::all();
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

    public function insertsymptom(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'name'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);

            SymptomName::create($request->all());
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function symptomedit(Request $request, $id)
    {
        if($request->ajax())
        {
            $userdata = SymptomName::find($id);

            return response()->json(['userdata' => $userdata]);
        }
    }

    public function symptomupdate(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'name'  => 'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'name'          =>  $request->name
            );
            SymptomName::where('_id',$request->hidden_id)->update($form_data);
        }

        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function symptomdestroy(Request $request, $id)
    {
        if($request->ajax())
        {
            SymptomName::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
    }
}
