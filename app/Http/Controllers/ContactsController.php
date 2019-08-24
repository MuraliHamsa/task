<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Auth;
use App\Group;
use App\Events\NewMessage;
use DB;
use  App\Conversation;
date_default_timezone_set("Asia/Kolkata");

use Illuminate\Support\Facades\Input;

class ContactsController extends Controller
{
   

 public function get(){
     
      $users = User::where('id',"!=",auth()->id())->get();
      

     $unreadids = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
                 ->where('to',auth()->id())
                 ->where('read',false)
                 ->groupBy('from')
                 ->get();
         $users = $users->map(function($user) use ($unreadids) {
     	$contactunread = $unreadids->where('sender_id',$user->id)->first();

     	$user->unread = $contactunread ? $contactunread->messages_count : 0;
     	return $user;
     });
 	 return response()->json($users);
 }
 public function getgroups(){

  $group =DB::table('group_user')->where('user_id',Auth::user()->id)->pluck('group_id');

   $groups = Group::whereIn('id',$group)->get();

  return response()->json($groups);
 }
 

public function getmessage($id){

     Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);
    $messages = Message::where(function($q) use ($id) {
    	$q->where('from',Auth()->id());
    	$q->where('to',$id);
    })->orWhere(function($q) use ($id){
    	$q->where('from',$id);
    	$q->where('to',Auth()->id());
    })->get();

return response()->json($messages);
}

public function getgroupmessage($id){
    
     $messages = Conversation::where('group_id',$id)->with('user')->get();

return response()->json($messages);
}





public function send(request $request){
  $msg = new  Message;
	$msg->from = Auth::user()->id;
	$msg->to = $request->contact_id;
	$msg->text = $request->text;
    $msg->save();
      broadcast(new NewMessage($msg));
       return response()->json($msg);
}
  
   public function sendfile(request $request){
     if($request->image != NULL){
                $imageName1 = time().'.'.request()->image->getClientOriginalExtension();
                $request->image->move(public_path('chatfiles'),$imageName1);
            }else{
                $imageName1 = "N/A";
            }

    $msg = new  Message;
    $msg->from = Auth::user()->id;
    $msg->to = $request->contact_id;
    $msg->image = $imageName1;
    $msg->save();

   broadcast(new NewMessage($msg));
       return response()->json($msg);

   }
  

}

