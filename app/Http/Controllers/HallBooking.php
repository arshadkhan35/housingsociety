<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BookHall;
use Auth;
use App\Http\Controllers\Complain;
use Illuminate\Support\Facades\DB;
use Storage;

class HallBooking extends Controller
{
   public function bookHall(){
   	return view("pages.bookinghall");
   }
   public function bookingHall(Request $request){
    	$bookHall = new BookHall;
     	$bookHall->user_id =  Auth::user()->id;
        $bookHall->from = strtotime($request->from_date);
        $bookHall->to = strtotime($request->to_date);
        $bookHall->save();
        return redirect('/my-booking');
   }
   public function myBooking(){
   	$hallbooking = array();
   	$hallbooking = BookHall::where('user_id',Auth::user()->id)->get()->toArray();
   	//echo '<pre>';print_r($hallbooking);exit();
   	return view("pages.mybooking")->with('bookingRequest',$hallbooking);
   }

   public function hallRequests(){
   	$hallbooking = BookHall::where('is_approved',0)->orderBy('created_at','desc')->get()->toArray();
    $complain = new Complain;
    $hallbooking_final = array();
    foreach ($hallbooking as $key => $value) {
      $value['username'] = $complain->getUserNameById($value['user_id']);
      $hallbooking_final[] = $value;
    }
    return view("pages.hallRequests")->with("hallData",$hallbooking_final);
   //echo '<pre>';print_r($hallbooking_final);exit();
   }
   public function hallRequestsApprove(Request $request){
    if($request->operation == 'cancel'){
      $approved_data = -1;
    }else{
      $approved_data = 1;
    }
    DB::table('hall_booking')
            ->where('rid',$request->rid)
            ->update([
              'is_approved' => $approved_data,
              ]);
   
   return redirect("/hall-requests");
}
}