<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use User;
use File;
use App\BillMaintainance;
use Auth;
class MaintainanceBill extends Controller
{
    public function generateBill(){
    	return view("pages.generateBill");
    }
    public function getUserData(Request $request){
    	$fileName = 'userDatafile.json';
     $content = File::get(public_path('json/'.$fileName));
     $data = json_decode($content);
      //return ($data);
     $data_final = array();
     foreach ($data as $key => $value) {
     	$inputxt = strtolower($request->inputText);
     	$str = strtolower($value->name);
     	if (preg_match('/'.$inputxt.'/',$str)) {
        $data_final[] = $value;
		}
     }
     return $data_final;
    }

    public function saveGenerateBill(Request $request){
    	$username = $request->username;
    	$explo = explode('-', $username);
      $billmaintainance = new BillMaintainance;
      $billmaintainance->user_id = $explo[1];
      $billmaintainance->month = $request->month;
      $billmaintainance->year = $request->year;
      $billmaintainance->amount = $request->amount;
      $billmaintainance->description = $request->description;
      $billmaintainance->save();
      return redirect("/generate-bill");
    }
    public function myBill(){
    	return view("pages.myBill");
    }
    public function myBillData(Request $request){
     $bil_data = BillMaintainance::where('month','=',$request->month)->where('year','=',$request->year)->where('user_id','=',Auth::user()->id)->get()->toArray();
if(!empty($bil_data)){
	return $bil_data;
}else{
	return 'nodata';
}


    }
}
