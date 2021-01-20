<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function mypage(){
        $user=\Auth::user();
        $mypage_informations=config('const.mypage_informations');
        return view('User.show',['user'=>$user,'mypage_informations'=>$mypage_informations]);
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
        $request->validate([
        'image_location'=>['file','mimes:jpeg,png,jpg,bmb','max:1048',],
        ]);
        
        if(\Auth::id()==$id){
            if($file = $request->image_location){
              //保存するファイルに名前をつける    
               $fileName = time().'.'.$file->getClientOriginalExtension();
               $path = Storage::disk('s3')->putFileAs('/user_profile_image',$file, $fileName,'public');
            }
           
            $user=User::findOrFail($id);
            if($file = $request->image_location){
            $user->image_location=$path;
            }
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
