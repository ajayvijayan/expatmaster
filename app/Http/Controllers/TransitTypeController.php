<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transittype;
use DataTables;
class TransittypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('dataentry.transittypes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transitypelistpage() {

        return view('dataentry.transittypes');
    }
    public function transitlistajax(Request $request)
    {
        if($request->ajax())
        {
            $listdata = Transittype::all();
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

    public function create(request $request)
    {
        if($request->ajax())
        {
            $transittype =  Transittype::all();
            return response()->json(['transittype' => $transittype]);
        }
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
                'transitname'          =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'localname'      =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u'

            ]);

            $form_data = array(
                'transitname'          =>  $request->transitname,
                'localname'      =>  $request->localname
            );
            Transittype::create($form_data);
        }
        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function transitedit(Request $request, $id)
    {
        if($request->ajax())
        {
            $userdata = Transittype::find($id);

            return response()->json(['userdata' => $userdata]);
        }
    }

    public function transitupdate(Request $request)
    {
        if($request->ajax())
        {
            request()->validate([
                'transitname'          =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u',
                'localname'      =>  'required|min:2|max:30|regex:/^[\pL\s]+$/u'
            ]);
            $form_data = array(
                'transitname'          =>  $request->transitname,
                'localname'      =>  $request->localname
            );

            Transittype::where('_id',$request->hidden_id)->update($form_data);
        }

        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function transitdestroy(Request $request, $id)
    {
        if($request->ajax())
        {
            Transittype::findOrFail($id)->delete();
        }
        return response()->json(['success' => 'Data is successfully updated']);
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
    public function destroy($id)
    {
        //
    }
}
