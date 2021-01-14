<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function mypage(){
        $user=\Auth::user();
        return view('User.show',['user'=>$user]);
    }
    public function edit(){
        $user=\Auth::user();
        return view('User.edit',['user'=>$user]);
    }
    public function show($id){
        $user=User::findOrFail($id);
        return view('User.show',['user'=>$user]);
    }
    public function update(Request $request,$id){
        $request->validate([
        'name'=>['required'],
        'self_introduce'=>['required'],
        'postal_code'=>['required'],
        'address'=>['required'],
        'telphone_number'=>['required'],
        ]);
        if(\Auth::id()==$id){
            $user=\Auth::user();
            $user->name=$request->name;
            $user->self_introduce=$request->self_introduce;
            $user->postal_code=$request->postal_code;
            $user->address=$request->address;
            $user->telphone_number=$request->telphone_number;
            $user->update();
            
            return view('User.show',['user'=>$user]);
        }
        
        return back();
    }
   
}
