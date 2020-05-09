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

class PhcController extends Controller
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

    public function phchome()
    {
        return view('phchome');
    }

   

}
