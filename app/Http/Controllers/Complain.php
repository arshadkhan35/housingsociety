<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\UserComplain;
use App\ComplainComments;

class Complain extends Controller
{
    public function addComplain(Request $request){
    	return view("pages.addComplain");
    }
    /*save user complain*/
    public function saveComplain(Request $request){
    	$userComplain = new UserComplain;
    	$userComplain->user_id = Auth::user()->id;
    	$userComplain->complain =  $request->complainDesc;
    	$userComplain->save();
       return redirect("/add-complain");
    }
    /*list all complain sorted in recent order */
    public function usersComplain(){
    	$complains = UserComplain::orderBy('created_at','desc')->get()->toArray();
    	$complianData = array();
    	foreach ($complains as $key => $value) {
    		$value['username'] = $this->getUserNameById($value['user_id']);
    		$complianData[] = $value;
    		
    	}
    	//echo '<pre>';print_r($complianData);
    	//exit();
    	//echo '<pre>';print_r($this->getUserNameById(1));exit();
    	return view("pages.usersComplian")->with('complainData',$complianData);
    }
    /*helper function to get username by id*/
    public function getUserNameById($id){
    	$userdata = User::where('id',$id)->pluck('name')->toArray();
    	return $userdata[0];
         
    }
    /*show complain by id*/
    public function showComplain($cid){
    	$UserComplain = UserComplain::where('cid',$cid)->get()->toArray();
    	$ComplainComments = ComplainComments::where('cid',$cid)->get()->toArray();
    	$ComplainCommentsData = array();
    	foreach ($ComplainComments as $key => $value) {
    		$value['username'] = $this->getUserNameById($value['user_id']);
    		$ComplainCommentsData[] = $value;
    	}
    	$username = $this->getUserNameById($UserComplain[0]['user_id']);
    	$UserComplain[0]['username'] = $username;
    	$finalData['complain_data'] = $UserComplain[0];
    	$finalData['comment_data'] = $ComplainCommentsData;
    	return view("pages.complain")->with('complainData',$finalData);
     //echo '<pre>';print_r($UserComplain);exit();
    }
    /*add comments to complaint*/
    public function complainComment(Request $request){
    	$ComplainComments = new ComplainComments;
    	$ComplainComments->user_id = Auth::user()->id;
    	$ComplainComments->cid = $request->cid;
    	$ComplainComments->complain_comment = $request->comment;
      	$ComplainComments->save();
    	return redirect('/complain/'.$request->cid);
    }
    /*user specific complain*/
    public function mycomplains(){
    	$complains = UserComplain::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get()->toArray();
    	$complianData = array();
    	foreach ($complains as $key => $value) {
    		$value['username'] = $this->getUserNameById($value['user_id']);
    		$complianData[] = $value;
    }
    if(!empty($complains)){
    	return view("pages.usersComplian")->with('complainData',$complianData);
    }else{
    	echo "you have not  registered any complains";
    }
}
}