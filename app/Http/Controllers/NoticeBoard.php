<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notice;
use Session;
use Auth;
use App\Comment;
use App\Http\Controllers\Complain;


class NoticeBoard extends Controller
{
	 public function __construct()
    {
     //$nid =0;
	}
    public function showNotices($id){
    	Session::set('nid', $id);
    	//$nid  = $id;
    	//print_r($this->nid);exit();
    	$notice = Notice::where('id','=',$id)->pluck("description")->toArray();
    	$comments = Comment::where('nid','=',$id)->get()->toArray();

      $complain = new Complain;
    $comments_final = array();
    foreach ($comments as $key => $value) {
      $value['username'] = $complain->getUserNameById($value['user_id']);
      $comments_final[] = $value;
    }
//echo '<pre>';print_r($comments_final);exit();
    	
        return view("pages.viewNotices")->with('data',['notice'=>$notice[0],'comments'=>$comments_final]);
    }
    public function addNotices(Request $request){
    	return view("pages.addNotices");
   

    }
    public function saveNotices(Request $request){
    	  $data = $request->all();
    	  $commdent = $data['comment-desc'];
            $notice = new Notice;
            $notice->description = $commdent;
            $notice->save();
             return redirect("/add-notice");
    }
    public function addComment(Request $request){

       $data = $request->all();
       $comment = $data["comment"];
       $nid = Session::get('nid');
       $user_id = Auth::user()->id;
       $saveComment = new Comment;
       $saveComment->nid = $nid;
       $saveComment->user_id = $user_id;
       $saveComment->comment = $comment;
       $saveComment->save();
       Session::forget('nid');
       return redirect('/notice-board/'.$nid);
       //print_r($data);exit();
    }
}
