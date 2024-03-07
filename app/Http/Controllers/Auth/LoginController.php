<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    protected function login(Request $request){
            // dd($request->all());
            $request->validate([
                'role' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $email =$request->email;
            $pass = $request->password;
            // dd($email,$pass);
            if (!Auth::attempt(['email' => $email,'password'=>$pass,'role' =>$request->role])) {
                // dd('unauthorized user');
                return redirect('/login')->withErrors('Data is not match');
            }else{
                // dd('login');
                return redirect('/dashboard');

            }


    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
