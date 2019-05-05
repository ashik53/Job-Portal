<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\Alert;
class ChatController extends Controller
{
    
   public function __construct(){
   		$this->middleware('auth');
   } //class

   public function viewAllChats($user_id){


   		$current_user = User::findOrFail(auth()->id());

   		if($current_user->role == 1){
   			abort(403);
   		}

   		$receiver_id = $user_id;


   		//fetch all chats between them

   		$chats = Chat::where('sender_id' , auth()->id())
   					 ->where('receiver_id', $user_id)
     				 ->orWhere(function($q) use($user_id) {
         					$q->where('sender_id', $user_id)
           					  ->where('receiver_id', auth()->id());
     				 })
     				   ->orderBy('id', 'DESC')->get();
   		
      $receiver = User::findOrFail($user_id);

		
		

		return view('chat.all_chats')->withChats($chats)->withReceiver($receiver);


   	    


   } //func

   public function store(Request $request, $receiver_id){

   		$message = new Chat();
   		$message->body = $request->body;
   		$message->sender_id = auth()->id();
   		$message->receiver_id = $receiver_id;

   		$message->save();

      //create notifications
      $alert = new Alert();
      $alert->type = 3;
      $alert->owner_id = $receiver_id;

      $alert->save();

   		return redirect("/view-chats/$receiver_id");

   }//func

   public function viewMyInbox(){

      $current_user = User::findOrFail(auth()->id());

      if($current_user->role == 1){
        abort(403);
      }

      $chats = Chat::where('receiver_id', auth()->id())
                    ->orderBy('id', 'DESC')
                    ->get();
      $senders = collect();

      foreach ($chats as $chat) {
        # code...
        $senders->add(User::findOrFail($chat->sender_id));
      }//

      return view('chat.inbox')->withSenders($senders)->withChats($chats);

   } //func



}//class
