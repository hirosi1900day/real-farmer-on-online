<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PlantType;
use App\Instruction;
use App\AdminField;
use App\Plant;
use App\Field;


class MenuController extends Controller
{
    public function myfield(){
        if(\Auth::check()){
            $fields=Field::get();
            $instructions=Instruction::get();
            return view('menu.myfield',['fields'=>$fields,'instructions'=>$instructions]);
        }
    }
    public function intruction(){
        $instructions=Instruction::orderBy('created_at','desc')->get();
        return view('menu.instruction',['instructions'=>$instructions]);
    }
    public function plant(){
        $plants=PlantType::orderBy('created_at','desc')->get();
        return view('menu.plant',['plants'=>$plants]);
    }
    public function field(){
        $fields=AdminField::orderBy('created_at','desc')->get();
        return view('menu.field',['fields'=>$fields]);
    }
    public function instructionAdd(Request $request){
        $user=\Auth::user();
        if(\Auth::check()){
           $user=\Auth::user();
           foreach($request->instruction as $number){
               $instruction=Instruction::findOrFail($number);
               if((($user->point)-($instruction->point))>=0){
                   $user->point=(($user->point)-($instruction->point));
                   $user->save();
                   $request->user()->first()->fields()->first()->instructions()->create(['instruction_id'=>$number,'complete'=>false]);
               }else{
                   $error=['ポイントがありません　追加をしてください'];
                   return view('commons.error',['error'=>$error]);
               }
           } 
           return redirect('/');
        }
        $error=['申し訳ありません、本人のみアクセス可能です、ログインをやり直してください'];
        return view('commons.error',['error'=>$error]);
    
    }
    public function fieldAdd(Request $request){
        $user=\Auth::user();
        if(\Auth::check()){
           $user=\Auth::user();
           foreach($request->field as $number){
               $adminField=AdminField::findOrFail($number);
               if((($user->point)-($adminField->field_number))>=0){
                   $user->point=(($user->point)-($adminField->field_number));
                   $user->save();
                   $adminField->used=false;
                   $adminField->save();
                   $request->user()->first()->fields()->create(['adminField_id'=>$number]);
               }else{
                   $error=['ポイントがありません　追加をしてください'];
                   return view('commons.error',['error'=>$error]);
               }
           } 
           return redirect('/');
        }
        $error=['申し訳ありません、本人のみアクセス可能です、ログインをやり直してください'];
        return view('commons.error',['error'=>$error]);
    }
    public function plantAdd(Request $request){
        $user=\Auth::user();
        if(\Auth::check()){
           $user=\Auth::user();
           foreach($request->plant as $number){
               $plantType=PlantType::findOrFail($number);
               if((($user->point)-($plantType->point))>=0){
                   $user->point=(($user->point)-($plantType->point));
                   $user->save();
                   $request->user()->first()->fields()->first()->plants()->create(['plantType_id'=>$number,'complete'=>false]);
               }else{
                   $error=['ポイントがありません　追加をしてください'];
                   return view('commons.error',['error'=>$error]);
               }
           } 
           return redirect('/');
        }
        $error=['申し訳ありません、本人のみアクセス可能です、ログインをやり直してください'];
        return view('commons.error',['error'=>$error]);
    }
    public function daily(){
        
    }
    
}
