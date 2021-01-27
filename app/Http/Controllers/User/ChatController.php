<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminChatroom;
use App\User;
use App\AdminChatmessage;
use App\Message_time;




class ChatController extends Controller
{
    public function create_chatroom(){
        $user=\Auth::user();
        // チャットルームを取得
        $chat_room_id = AdminChatroom::where('user_id', \Auth::id())
        ->pluck('id');
        //チャットルームがなければ作成する
        if($chat_room_id->isEmpty()){
            $admin_user_id=User::where('email',config('const.admin_user')[0])->pluck('id')->first();
            AdminChatroom::create(['user_id'=>\Auth::id(),'admin_user_id'=>$admin_user_id,]); //チャットルーム作成
            $latest_chat_room = AdminChatroom::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得
            $chat_room_id = $latest_chat_room->id;
        }
        // チャットルーム取得時はオブジェクト型なので数値に変換
        if(is_object($chat_room_id)){
            $chat_room_id = $chat_room_id->first();
        }
      
      return redirect(route('chat.view', ['id' => $chat_room_id]));
    }
    public function show($id){
        //$idはchatroom_id
        $users=[];
        $Adminchatroom=AdminChatroom::findOrFail($id);
        $messages=$Adminchatroom->message()->take(15)->orderBy('created_at','desc')->get();
        if($messages->isEmpty()){
          $messages=[];
        }
        if(count($messages)>0){
        foreach($messages as $index=>$message){
         $users[$index]=User::findOrFail($message->user_id);
        }
        }
        $admin_user=AdminChatroom::findOrFail($Adminchatroom->admin_user_id);
    
        return ['messages'=>$messages,
            'users'=>$users,
            'admin_user'=>$admin_user,
            'Adminchatroom'=>$Adminchatroom,]; 
    }
    public function view($id){
        
        $Adminchatroom=AdminChatroom::findOrFail($id);
        $user=User::findOrFail($Adminchatroom->user_id);
        $admin_user=User::findOrFail($Adminchatroom->admin_user_id);
        return view('chat.show',[
            'Adminchatroom'=>$Adminchatroom,
            'admin_user'=>$admin_user,
            'user'=>$user,
            ]);
   }
    public function store(Request $request,$id){
       //$idはchatroom_id
       $request->validate([
            'message' => 'required|max:255',
        ]);
        
        //user_idでメッセージ送信者を特定する
        //これらはinput hiddenで送信する
           AdminChatroom::findOrFail($id)->message()->create([
          'user_id'=>$request->user_id,
          'admin_user_id'=>$request->admin_user_id,
          'Adminchatroom_id'=>$id,
          'messages'=>$request->message,
           ]);
           if(count(AdminChatroom::findOrFail($id)->message()->get())>50){
               $message=AdminChatroom::findOrFail($id)->message()->orderBy('created_at')->first();
               $message->delete();
           }
          return ;
    }
    public function admin_index(){
        $admin_chat_rooms = AdminChatroom::orderBy('created_at','desc')->get();
        $users=[];
        $notification=[];
        if(count($admin_chat_rooms)>0){
        foreach($admin_chat_rooms as $index=>$admin_chat_room){
            $users[$index]=User::findOrFail($admin_chat_room->user_id);
            if(count($admin_chat_room->message()->get())>0){
                $notification[$index]=($admin_chat_room->message()->orderBy('created_at','desc')->first()->user_id
                ===User::findOrFail($admin_chat_room->admin_user_id)->id);
            }else{
                $notification[$index]=true;
            }
        }
        }
        return view('chat.user_index',['users'=>$users,'chat_rooms'=>$admin_chat_rooms,'notification'=>$notification]);
    }
    
  
}
