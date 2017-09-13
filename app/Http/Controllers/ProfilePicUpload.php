<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\UserProfileImage;
use Illuminate\Support\Facades\DB;

class ProfilePicUpload extends Controller
{
    public function upload(Request $request){
    	if(\Input::hasFile('profileImage')){
		$file = \Input::file('profileImage');
		$file->move('images',$file->getClientOriginalName());
		//save image to table
		$UserPicUri = UserProfileImage::where('user_id', '=', Auth::id())->pluck('uri')->toArray();
		if(empty($UserPicUri)){
	    $userProfilePic = new UserProfileImage;
		$userProfilePic->user_id = Auth::user()->id;
		$userProfilePic->uri = $file->getClientOriginalName();
		$userProfilePic->save();
	}else{
		DB::table('userProfilePic')
            ->where('user_id', Auth::user()->id)
            ->update([
            	'uri'=> $file->getClientOriginalName(),
            	]);
            unlink('images/'.$UserPicUri[0]);
	}
		

		return redirect('/edit-profile');
	}
    }
}
