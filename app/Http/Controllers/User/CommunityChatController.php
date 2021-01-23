<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\chatmessage;
use App\User;

class CommunityChatController extends Controller
{
    public function view(){
        
        return view('community.show',);
    }
    public function show(){
        $messages=chatmessage::orderBy('created_at','desc')->get();
        $user=[];
       
        foreach($messages as $message){
            $user=User::findOrFail($message->user_id);
        }
        return ['messages'=>$messages,'users'=>$user];
    }
    public function store(Request $request){
       
       $request->validate([
            'messages' => 'required|max:255',
        ]);
        //user_idでメッセージ送信者を特定する
        
        //これらはinput hiddenで送信する
        chatmessage::create([
          'user_id'=>$request->user_id,
          'messages'=>$request->messages,
           ]);
        if(count($message=Chatmessage::orderBy('created_at')->get())>100){
            $message=Chatmessage::orderBy('created_at')->first();
            $message->delete();
        }
        
          return ;
    }
    
}
