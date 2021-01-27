<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin_password;
use App\User;
use App\AdminField;
use App\Field;
use App\User_instruction;
use App\Instruction;
use App\Plant;
use App\PlantType;
use App\AgricultualHistory;
use App\User_Request;


class LoginController extends Controller
{
    public function showLoginForm(){
       
        if((\Auth::user()->name==config('const.admin_user')[1])&&
        (\Auth::user()->email==config('const.admin_user')[0])){
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
            if(count($fields)>0){
            foreach($fields as $index=>$field){
                $adminFields[$index]=AdminField::findOrFail($field->adminField_id);
            }
            }
        $user_instructions=User_instruction::where('complete',false)->get();
            $instructions=[];
            $adminFields_For_instruction=[];
            if(count($user_instructions)>0){
            foreach($user_instructions as $index=>$user_instruction){
                $instructions[$index]=Instruction::findOrFail($user_instruction->instruction_id);
                $adminFields_For_instruction[$index]=AdminField::findOrFail($user_instruction->field()->first()->adminField_id);
            }
            }
        $plants=Plant::where('complete',false)->get();
            $plantType=[];
            $adminField_For_plant=[];
            if(count($plants)>0){
            foreach($plants as $index=>$plant){
                $plantType[$index]=PlantType::findOrFail($plant->plantType_id);
                $adminField_For_plant[$index]=AdminField::findOrFail($plant->field()->first()->adminField_id);
            }
            }
        $used_fields=Field::get();
        $used_adminFields=[];
        if(count($used_fields)>0){
            foreach($used_fields as $index=>$used_field){
                $used_adminFields[$index]=AdminField::findOrFail($used_field->adminField_id);
            }
        }
           
        $AgricultualHistories=AgricultualHistory::get();
      
   
        $users=User::orderBy('created_at','desc')->get();
        $user_requests=User_Request::orderBy('created_at')->get();
        
        
        return view('admin.admin',['users'=>$users,
                                   'fields'=>$fields,
                                   'adminFields'=>$adminFields,
                                   'user_instructions'=>$user_instructions,
                                   'instructions'=>$instructions,
                                   'plants'=>$plants,
                                   'plantType'=>$plantType,
                                   'used_fields'=>$used_fields,
                                   'used_adminFields'=>$used_adminFields,
                                   'adminFields_For_instruction'=>$adminFields_For_instruction,
                                   'adminField_For_plant'=>$adminField_For_plant,
                                   'AgricultualHistories'=> $AgricultualHistories,
                                   'user_requests'=>$user_requests,
                                   ]);
    }
    function logout(Request $request){
        
		$request->session()->forget("admin_auth");
		return redirect('/');
	}
    
}
