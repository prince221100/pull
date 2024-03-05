<?php

namespace App\Http\Controllers;

use App\Mail\forgotmail;
use App\Mail\MailExample;
use App\Mail\registermail;
use App\Models\Manager;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function login(Request $request){
        // dd($request->all());
        $request->validate([
            'role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // echo $request->role,$request->email,$request->password;
        $chk = User::where(['email'=>$request->email,'password'=>$request->password,'role'=>$request->role])->exists();
        // dd($chk);
        if($chk == null){
            echo "Data is not match";
            return redirect('/')->withErrors('Data is not match');
        }else{
            echo "Login Successfully and go to dashboard";
            $name = User::where('email',$request->email)->first();
            // dd($name->firstname);
            session(['email'=>$request->email,'role'=>$request->role,'name'=>$name->firstname]);
            return redirect('/dashboard');
        }

    }
    public function dashboard(){
        // $role = 3;
        if(session()->has('email')){
            return view('homepage');
        }else{
            return redirect('/');
        }

    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function forgotpassword(){
        return view('forgot_password');
    }

    public function forgot(Request $request){
        // dd($request->all());
        $request->validate([
            'email'=>'required',
        ]);
        $email = $request->email;
        // dd($email);
        $chk = User::where('email',$email)->first();
        // dd($chk);
        if($chk == null){
            echo "Data is not Found";
            return redirect('/forgot-password')->withErrors('Data is not Found');
        }else{
            echo "send to reset link in Email id";

            $val = DB::table('password_reset_tokens')->where('email',$email)->first();
            // dd($val);
            if($val == null){
                $token = Str::random(20);
                $store = DB::table('password_reset_tokens')->insert([
                    'email'=>$email,
                    'token'=>$token,
                    'created_at'=>Carbon::now(),
                ]);
                Mail::to($email)->send(new forgotmail($token));

                return redirect('/forgot-password')->withSuccess('Send to reset Link in Email Id');
            }
            else{
                return redirect('/forgot-password')->withErrors('Please Check Your email! link is already send');

            }
        }

    }
    public function reset_password($token){
        // $email = $email;
        $token = $token;
        // dd($token);
        $val = DB::table('password_reset_tokens')->where('token',$token)->first();
        if($val){
            // dd($val->email);
            return view('resetform',['token'=>$token,'email'=>$val->email]);
        }else{

            return redirect('/forgot-password')->withErrors('Your token is not set. please send request again!');

        }

    }
    public function reset(Request $request){
        // dd($request->all());
        $request->validate([
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
        ]);

        $val = DB::table('password_reset_tokens')->where('token',$request->token)->first();
        // dd($val);
        if($val == null){
            return redirect("/")->withErrors(['msg'=> 'You are not memeber our webpage']);

        }else{
            // echo "Data updated";
            $pass= $request->password;
            $pass1= $request->confirmpassword;
            $email = $val->email;
            if($pass == $pass1){
                // echo "Password is match";
                $upd = User::where('email',$email)->update(['password'=> $pass]);

                DB::table('password_reset_tokens')->where('email',$email)->delete();

                return redirect('/')->withSuccess('Password is Updated Successfully..');

            }
            else{
                DB::table('password_reset_tokens')->where('email',$email)->delete();

                return redirect("/forgot-password")->withErrors(['msg'=> 'Try Again! Password is not match']);
            }
        }
    }

    public function add_employee(){
        if(session()->has('email')){
            $email = session()->get('email');
            $role = session()->get('role');
            if($role == 2){
                $val = Manager::all();
                // dd($val);
                return view('addemployee',['manager'=>$val]);
            }
            else{
                return redirect('/');
            }

        }else{
            return redirect('/');
        }

    }

    public function add_employeedata(Request $request){
        // dd($request->all());
        $request->validate([
            'employeeid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'password'=>'required',
            'department_name' => 'required',
            'managerid' => 'required'
        ]);
        $empid = $request->employeeid;
        $fname = $request->firstname;
        $lname = $request->lastname;
        $email = $request->email;
        $pass = $request->password;
        $department_name = $request->department_name;
        $managerid = $request->managerid;

        // dd($pass);

        $val = new User();
        $val->employee_id = $empid;
        $val->firstname = $fname;
        $val->lastname = $lname;
        $val->email = $email;
        $val->role = 1;
        $val->manager_id =$managerid;
        $val->users_department = $department_name;
        $val->password = $request->password;
        $val->save();

        $data["email"] = $val->email;
        $data["firstname"] = $val->firstname;
        $data["password"] = $val->password;

        $pdf = FacadePdf::loadView('myTestMail', $data);
        $data["pdf"] = $pdf;

        Mail::to($email)->send(new registermail($data));
        return redirect('/show-employee')->withSuccess('Employee data stored successfully.');

    }

    public function show_employee(){

        if(session()->has('email')){
            $email = session()->get('email');
            $role = session()->get('role');

            if($role == 2){
                $val = User::where('role',1)->orderby('id','ASC')->paginate(10);
                return view('show_employee',['data'=>$val]);
            }
            else{
                return redirect('/');
            }

        }else{
            return redirect('/');
        }
    }


    public function profile(){
        if(session()->has('email')){
            $role = session()->get('role');
            $email = session()->get('email');
            $val = User::where('email',$email)->first();
            return view('profile',['val'=>$val]);

        }else{
            return redirect('/');
        }

    }

    public function profile_update(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname' => 'required',
            'password'=>'required'

        ]);
        $email = session()->get('email');
        // $email = "xyz@gmail.com";
        // dd($email);
        $chk = User::where('email',$email)->first();
        if($chk){
            // dd($chk->id);
            $data = User::where(['firstname'=>$request->firstname,'lastname'=>$request->lastname,'password'=>$request->password])->first();
            // dd($data);
            if($data){
                return redirect('/profile')->withErrors('Please check your information.');

            }else{

                $val = User::find($chk->id);
                $val->firstname = $request->firstname;
                $val->lastname = $request->lastname;
                $val->password = $request->password;
                $val->save();

                return redirect('/profile')->withSuccess('Profile is updated successfully.');
            }
        }else{
            return redirect('/logout');
        }

    }
    public function delete_employee($id){
        // dd($id);
        if(session()->has('email')){
            $email = session()->get('email');
            $role = session()->get('role');

            if($role == 2){
                $val = User::find($id);
                // dd($val);
                $val->delete();
                return redirect('/show-employee')->withSuccess('Employee Data is Deleted successfully.');;
            }
            else{
                return redirect('/logout');
            }
        }else{
            return redirect('/');
        }
    }
    public function edit_employee($id){
        // dd($id);
        if(session()->has('email')){
            $email = session()->get('email');
            $role = session()->get('role');

            if($role == 2){
                $man = Manager::all();

                $val = User::where('id',$id)->first();
                // dd($val);
                return view('edit_employee',['val'=>$val,'manager'=>$man]);
            }
            else{
                return redirect('/logout');

            }
        }
        else{
            return redirect('/');

        }

    }
    public function edit_employeedata(Request $request,$id){
        // dd($request->all(),$id);
        $request->validate([
            'employeeid' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email'=>'required|email',
            'managerid' => 'required',
            'password'=>'required',
            'department_name' => 'required',

        ]);
        $email = $request->email;
        // dd($request->all(),$id);
        $chk = User::where('id',$id)->first();
        // dd($chk->email);
        if($email == $chk->email){
            // dd('email is same');
            $chk_data = User::where(['employee_id'=>$request->employeeid,'firstname'=>$request->firstname,'lastname'=>$request->lastname,'email'=>$request->email,'password'=>$request->password,'users_department'=>$request->department_name,'manager_id'=>$request->managerid])->first();
            // dd($chk_data);
            if($chk_data){
                return redirect('/show-employee')->withSuccess('Employee Data is not updated because you enter same data.');

            }else{

                            $val = User::find($id);
                            $val->employee_id = $request->employeeid;
                            $val->firstname = $request->firstname;
                            $val->lastname = $request->lastname;
                            if($request->managerid){
                                $val->manager_id =$request->managerid;
                            }
                            $val->users_department = $request->department_name;
                            $val->password = $request->password;

                            $val->save();
                            return redirect('/show-employee')->withSuccess('Employee Data is updated successfully.');

            }


        }else{
            // dd('email is different');
            $chk_email = User::where('email',$request->email)->first();
            // dd($chk_email);
            if($chk_email){
                return Redirect::back()->withErrors('Email Id is already Exists!!');
            }else{
                $val = User::find($id);
                $val->employee_id = $request->employeeid;
                $val->firstname = $request->firstname;
                $val->lastname = $request->lastname;

                $val->email=$request->email;

                if($request->managerid){
                    $val->manager_id =$request->managerid;
                }
                $val->users_department = $request->department_name;
                $val->password = $request->password;
                $val->save();
                return redirect('/show-employee')->withSuccess('Employee Data is updated successfully.');

            }
        }


    }

    public function generate_csv(){
        // dd("Download Data");
        if(session()->has('email')){
            $email = session()->get('email');
            $role = session()->get('role');

            if($role == 2){
                $data = User::where('role',1)->orderby('id','ASC')->get();
                $filename = 'EmployeeDetails.csv';
                $fp = fopen($filename,"w+");

                fputcsv($fp,array('Name','Employee ID','Email','Password','Department'));
                foreach($data as $info ){
                    fputcsv($fp,array($info->firstname,$info->employee_id,$info->email,$info->password,$info->users_department));
                }

                fclose($fp);
                $header =array('content-type'=> 'text/csv');
                return response()->download($filename,'EmployeeDetails.csv',$header);

            }
            else{
                return redirect('/logout');

            }
        }
        else{
            return redirect('/');

        }
    }

    public function send_email_pdf(){
        // dd('email');
        $data["email"] = "your@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $pdf = FacadePdf::loadView('myTestMail', $data);
        $data["pdf"] = $pdf;

        Mail::to($data["email"])->send(new MailExample($data));

        dd('Mail sent successfully');
    }

}
