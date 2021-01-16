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
        $user_instructions=User_instruction::where('complete',false)->get();
            $instructions=[];
            foreach($user_instructions as $index=>$user_instruction){
                $instructions[$index]=Instruction::findOrFail($user_instruction->instruction_id);
            }
        $plants=Plant::where('complete',false)->get();
            $PlantType=[];
            foreach($plants as $index=>$plant){
                $plantType[$index]=PlantType::findOrFail($plant->plantType_id);
            }
            $users=User::orderBy('created_at','desc')->get();
        return view('admin.admin',['users'=>$users,
                                   'fields'=>$fields,
                                   'adminFields'=>$adminFields,
                                   'user_instructions'=>$user_instructions,
                                   'instructions'=>$instructions,
                                   'plants'=>$plants,
                                   'plantType'=>$plantType]);
    }
    function logout(Request $request){
        
		$request->session()->forget("admin_auth");
		return redirect('/');
	}
    
}
