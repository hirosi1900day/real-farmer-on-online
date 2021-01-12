<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PlantType;
use App\Instruction;
use App\AdminField;


class MenuController extends Controller
{
    public function intruction(){
        $instructions=Instruction::orderBy('created_at','desc')->get();
        return view('menu.instruction',['instructions'=>$instructions]);
    }
    public function plant(){
        $plants=Plant::orderBy('created_at','desc')->get();
        return view('menu.plant',['plants'=>$plants]);
    }
    public function field(){
        $fields=AdminField::orderBy('created_at','desc')->get();
        return view('menu.field',['fields'=>$fields]);
    }
    public function instructionAdd(Request $request){
        
    }
    public function fieldAdd(Request $request){
        $user=\Auth::user();
        
        if(\Auth::check()){
           $user=\Auth::user();
           foreach($request->field as $number){
            $request->user()->first()->fields()->create(['adminField_id'=>$number]);
            $adminField=AdminField::findOrFail($number);
            $user->point=(($user->point)-($adminField->field_number));
            $user->save();
            $adminField->used=false;
            $adminField->save();
           } 
           return redirect('/');
         
        }
        return back();
    }
}
