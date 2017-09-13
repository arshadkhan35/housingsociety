<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use App\Http\Requests;
use App\UserDetails;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Storage;
use App\UserProfileImage;
class Profile extends Controller
{
    public function editProfile(){
    	$Userdetail = UserDetails::where('user_id', '=', Auth::id())->get()->toArray();
    	//return $Userdetail[0]['fullName'];
  $UserPicUri = UserProfileImage::where('user_id', '=', Auth::id())->pluck('uri')->toArray();
//print_r($Userdetail[0]);exit();
      if(empty($Userdetail)){
        $Userdetail[0] = array('fullName'=> Auth::user()->name,'mobileno'=>'','email'=> Auth::user()->email,'buildingno'=>'','wing'=>'','Floor'=>'','roomno'=>'','fatherName'=>'');
      $Userdetail[0]['uri'] = !empty($UserPicUri[0]) ? $UserPicUri[0] : 'user-default.jpg';
      }else{
        $Userdetail[0]['uri'] = !empty($UserPicUri[0]) ? $UserPicUri[0] : 'user-default.jpg';

      }

    	return view('pages.profileEdit')->with('userdata',$Userdetail[0]);
    }
    public function saveUserData(Request $request){
    	$check_record_exist = UserDetails::where('user_id', '=', Auth::id())->pluck('fullName')->toArray();
    //	print_r($check_record_exist);exit();
    	$data = $request->all();
    	if(!empty($check_record_exist)){
           DB::table('userdetails')
            ->where('user_id', Auth::user()->id)
            ->update([
            	'user_id' => Auth::user()->id,
            	'fullName'=>$data['username'],
            	'mobileno'=>$data['mobile'],
            	'email'=>$data['exampleInputEmail1'],
            	'buildingno'=>$data['buildingNumber'],
            	'wing'=> $data['wing'],
            	'Floor'=> $data['floor'],
            	'roomno' => $data['roomNumber'],
            	'fatherName'=> $data['fatherName'],
            	]);
    	}else{
    	$Userdetail = new UserDetails;
           $Userdetail->user_id = Auth::user()->id;
           $Userdetail->fullName = $data['username'];
           $Userdetail->mobileno = $data['mobile'];
           $Userdetail->email = $data['exampleInputEmail1'];
           $Userdetail->buildingno = $data['buildingNumber'];
           $Userdetail->wing = $data['wing'];
           $Userdetail->Floor = $data['floor'];
           $Userdetail->roomno = $data['roomNumber'];
           $Userdetail->fatherName = $data['fatherName'];
           $Userdetail->save();	
    	}
           

           return redirect('/edit-profile');
    }

    //upload photo
    public function addProfilePic(){
    	//print_r($_FILES);exit();
         return redirect("/edit-profile");
    }
}
