<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin_password;
use App\User;
use App\AdminField;
use App\Field;


class LoginController extends Controller
{
    public function showLoginForm(){
        if((\Auth::user()->name=='realFarmerAdmin')&&
        (\Auth::user()->email=='realFarmerAdmin@email.com')){
            return view('admin.login');
        }
        return redirect('/');
        
    }
    public function login(Request $request){
        $admin_password=Admin_password::first();
        if(($request->email==$admin_password->email)&&
        ($request->password==$admin_password->password)&&
        ($request->key==$admin_password->key))
        {
            $request->session()->put("admin_auth", true);
            return redirect(route('admin.home'));
        }
        return back();
    }
    public function home(){
        $fields=Field::where('complete',false)->get();
            $adminFields=[];
            foreach($fields as $index=>$field){
                $adminFields[$index]=AdminField::findOrFail($field->adminField_id);
            }
            $users=User::orderBy('created_at','desc')->get();
        return view('admin.admin',['users'=>$users,
                                   'fields'=>$fields,
                                   'adminFields'=>$adminFields]);
    }
    function logout(Request $request){
        
		$request->session()->forget("admin_auth");
		return redirect('/');
	}
    
}
