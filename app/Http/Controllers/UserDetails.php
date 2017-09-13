<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use App\roles;
use App\Http\Controller\HomeController;

class UserDetails extends Controller
{
    //pu
    public function listUser(){
    	$users = User::where('id', '!=', Auth::id())->get();
        $user_final = array();
        foreach ($users as $key => $value) {
            $uid = roles::where('user_id',$value->id)->pluck('rid')->toArray();
            if(empty($uid)){
             $user_final[] = $value;
            }
          
        }
    	return view('pages.listUser')->with('users',$user_final);
    }

    public function approveUser(Request $request){
    	if($request->isMethod('get')){
    		$role = new roles;
    		$role->rid = 2;
    		$role->description = "user";
    		$role->user_id = $request->userid;
    		$role->save();
            //$homectrl = new HomeController;
            //$homectrl->createUsersData();
    		return "approved " . $request->userid;
    	}else{
    		return "not approved";
    	}
    	
    }

}
