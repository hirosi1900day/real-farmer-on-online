<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\AdminChatroom;
use App\AdminChatmessage;

class UserController extends Controller
{
    public function mypage(){
        $user=\Auth::user();
        $mypage_informations=config('const.mypage_informations');
        $admin_chat_room = AdminChatroom::where('user_id',$user->id)->first();
         
            if($admin_chat_room!=null&&count($admin_chat_room->message()->get())>0){
                $notification=($admin_chat_room->message()->orderBy('created_at','desc')->first()->user_id
                ===$user->id);
            }else{
                $notification=true;
            }
        return view('User.show',['user'=>$user,'mypage_informations'=>$mypage_informations,'notification'=>$notification]);
    }
    public function edit($id){
        $user=User::findOrFail($id);
        return view('User.edit',['user'=>$user]);
    }
    public function show($id){
        $user=User::findOrFail($id);
        $mypage_informations=config('const.mypage_informations');
        return view('User.show',['user'=>$user,'mypage_informations'=>$mypage_informations]);
    }
    public function update(Request $request,$id){
        
        
        if(\Auth::id()==$id){
           
            $user=User::findOrFail($id);
            if($request->name!=''){
            $user->name=$request->name;
            }
            if($request->self_introduce!=''){
            $user->self_introduce=$request->self_introduce;
            }
            if($request->postal_code!=''){
            $user->postal_code=$request->postal_code;
            }
            if($request->address!=''){
            $user->address=$request->address;
            }
            if($request->telphone_number!=''){
            $user->telphone_number=$request->telphone_number;
            }
            $user->save();
            $mypage_informations=config('const.mypage_informations');
            
            return view('User.show',['user'=>$user,'mypage_informations'=>$mypage_informations]);
        }
        
        return back();
    }
    
   
}
