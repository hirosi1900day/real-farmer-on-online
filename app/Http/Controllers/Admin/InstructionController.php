<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminField;
use App\Instruction;
use App\PlantType;



class InstructionController extends Controller
{
    public function adminField(){
        $adminFields=AdminField::orderBy('created_at','desc')->get();
        return view('admin.instruction.adminField',['adminFields'=>$adminFields]);
    }
   
    public function plantType(){
        $plantTypes=PlantType::orderBy('created_at','desc')->get();
        return view('admin.instruction.plantType',['plantTypes'=>$plantTypes]);
    }
   
    public function instructons(){
        $instructions=Instruction::orderBy('created_at','desc')->get();
        return view('admin.instruction.instruction',['instructions'=>$instructions]);
    }
    public function adminField_create(Request $request){
        $request->validate([
        'field_name'=>['required'],
        'field_number'=>['required','integer'],
        ]);
        $adminField=new AdminField;
        $adminField->field_name=$request->field_name;
        $adminField->field_number=$request->field_number;
        $adminField->used=true;
        $adminField->save();
        return redirect(route('admin.adminField'));
    }
   
    public function plantType_create(Request $request){
        $request->validate([
        'name'=>['required'],
        'point'=>['required','integer'],
        ]);
        $plantType=new PlantType;
        $plantType->name=$request->name;
        $plantType->point=$request->point;
        $plantType->save();
        return redirect(route('admin.plantType'));
    }
   
    public function instructons_create(Request $request){
        $request->validate([
        'name'=>['required'],
        'point'=>['required','integer'],
        ]);
        $instruction=new Instruction;
        $instruction->name=$request->name;
        $instruction->point=$request->point;
        $instruction->save();
        return redirect(route('admin.instructons'));
    }
    
       
        
   
}
