<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Notice;
use File;
use App\Enquiries;

class HomeController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = User::find(1)->user_role->rid;
       // print $role_id;exit;
        return view('home')->with('foo',$role_id);
    }

    public function homeData(){
        $this->createUsersData();
        $notices = Notice::orderBy('created_at','desc')->get()->toArray();
       //echo '<pre>'; print_r($notices);exit();
        return view('welcome')->with('notices',$notices);
    }

    public function createUsersData(){
             //fething user data
        $users = User::where('id','!=',1)->get()->toArray();
        $data = json_encode($users);
      $fileName = 'userDatafile.json';
      if(!File::exists(public_path('json/'.$fileName))) {
   File::put(public_path('json/'.$fileName),$data);
}else{
    File::put(public_path('json/'.$fileName),$data);
}
    }
public function contactUs(Request $request){
    $enquiries = new Enquiries;
    $enquiries->name = $request->name;
    $enquiries->email = $request->emailid;
    $enquiries->mobile_no = $request->mobileno;
    $enquiries->save();
return view("pages.thanku");
}

public function enquiryList(){
    $enquiries = Enquiries::orderBy('created_at','desc')->get()->toArray();
   // echo '<pre>';print_r($enquiries);
    return view("pages.enquiryList")->with("enquiries",$enquiries);
}

}
