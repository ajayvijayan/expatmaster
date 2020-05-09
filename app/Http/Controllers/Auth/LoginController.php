<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $users) {
         if ($users->usertype == 'Administrator') {
            return redirect('/admin');
         } else if ($users->usertype == 'Data entry operator') {
            return redirect('/deo');
         } else if ($users->usertype == 'Lsg official') {
            return redirect('/lsg');
         } else if ($users->usertype == 'phcmo') {
            return redirect('/phcmo');
         } else if ($users->usertype == 'District official') {
            return redirect('/district');
         } else if ($users->usertype == 'State official') {
            return redirect('/state');
         } 
          else {
            return redirect('logout');
         }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
         /*return redirect('/admin')
         return redirect('/login');*/;

        
        Session::flush();
        Auth::logout();
        $this->guard()->logout();
        $request->session()->invalidate();
       
        return $this->loggedOut($request) ?: redirect('/login');
       
    }
}
