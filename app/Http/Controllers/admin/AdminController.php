<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use hash;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.admin_dashboard');
    }

    public function settings(){
        Auth::guard('admin')->user()->id;
        return view('admin/admin_settings');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required']);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('admin/dashboard');
            }else{
                Session::flash('error_message','Invalid Email or Password');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function chkCurrentPassword(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); 
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)) {
            echo "true";
        }else{
            echo "false";
        }
    }

    public function updateAdminDetails(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            //echo"<pre>";print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[^\s]+( [^\s]+)+$/',
                'admin_mobile' => 'required|numeric'
            ];
            $customMessage = [
                'admin_name.required' => 'Name is Required',
                'admin_name.alpha' => 'Valid Name is Required',
                'admin_mobile.required' => 'Mobile is Required',
                'admin_mobile.numeric' => 'Valid Mobile is Required',
            ];
            $this->validate($request,$rules,$customMessage);

            // Update Admin Details
            Admin::where('email',Auth::guard('admin')->user()->email)
            ->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile']]);
            session::flash('success_message','Admin Details Updates Sucessfully!');
            return redirect()->back();
        }
        return view('admin.update_admin_details');
    }
}
