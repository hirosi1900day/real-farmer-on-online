<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PlantType;
use App\Instruction;
use App\AdminField;
use App\Plant;
use App\Field;
use App\OverallField;


class MenuController extends Controller
{
    //自分の畑情報
    public function myfield(){
        if(\Auth::check()){
            $fields=\Auth::user()->fields()->get();
            $instructoin=[];
            $plants=[];
            $adminField=[];
            if(count($fields)>0){
            foreach($fields as $index=>$field){
                $adminField[$index]=AdminField::findOrFail($field->adminField_id);
            }
            return view('menu.myfield',['fields'=>$fields,
                                        'adminField'=>$adminField]);
            }else{
                $error=['畑がありません、畑を追加してください'];
                return view('commons.error',['error'=>$error]);
            }
            
        }
    }
    //畑に対して指示を追加する
    public function intruction(){
        $fields=\Auth::user()->fields()->get();
        $adminFields=[];
        if(count($fields)==0){
            $error=['畑がありません、畑を追加してください'];
            return view('commons.error',['error'=>$error]);
        }else{
            foreach($fields as $index=>$field){
                $adminFields[$index]=AdminField::findOrFail($field->adminField_id);
            }
        }
        
        $instructions=Instruction::orderBy('created_at','desc')->get();
        return view('menu.instruction',['instructions'=>$instructions,'fields'=>$fields,'adminFields'=>$adminFields]);
    }
    //畑に植物を植える
    public function plant(){
        $fields=\Auth::user()->fields()->get();
        $adminFields=[];
        if(count($fields)==0){
            $error=['畑がありません、畑を追加してください'];
            return view('commons.error',['error'=>$error]);
        }else{
            foreach($fields as $index=>$field){
                $adminFields[$index]=AdminField::findOrFail($field->adminField_id);
            }
        $plants=PlantType::orderBy('created_at','desc')->get();
        return view('menu.plant',['plants'=>$plants,'fields'=>$fields,'adminFields'=>$adminFields]);
        }
    }
    //畑を追加する
    public function field(){
        $fields=AdminField::orderBy('created_at','desc')->get();
        return view('menu.field',['fields'=>$fields]);
    }
    //指示追加処理post
    public function instructionAdd(Request $request){
        $request->validate([
            'instruction'=>['required'],
            'field'=>['required'],
        ]);
        $user=\Auth::user();
        if(\Auth::check()){
           foreach($request->instruction as $number){
               $instruction=Instruction::findOrFail($number);
               if((($user->point)-($instruction->point))>=0){
                   $user->point=(($user->point)-($instruction->point));
                   $user->save();
                   Field::findOrFail($request->field)->instructions()->create(['instruction_id'=>$number,'complete'=>false]);
               }else{
                   $error=['ポイントがありません　追加をしてください'];
                   return view('commons.error',['error'=>$error]);
               }
           } 
           return back();
        }
        $error=['申し訳ありません、本人のみアクセス可能です、ログインをやり直してください'];
        return view('commons.error',['error'=>$error]);
    
    }
    //畑追加処理post
    public function fieldAdd(Request $request){
        $request->validate([
            'field'=>['required'],
        ]);
        $user=\Auth::user();
        if(\Auth::check()){
           foreach($request->field as $number){
               $adminField=AdminField::findOrFail($number);
               if((($user->point)-($adminField->field_number))>=0){
                   $user->point=(($user->point)-($adminField->field_number));
                   $user->save();
                   $adminField->used=false;
                   $adminField->save();
                   $user->fields()->create(['adminField_id'=>$number,'complete'=>false]);
               }else{
                   $error=['ポイントがありません　追加をしてください'];
                   return view('commons.error',['error'=>$error]);
               }
           } 
           return back();
        }
        $error=['申し訳ありません、本人のみアクセス可能です、ログインをやり直してください'];
        return view('commons.error',['error'=>$error]);
    }
    //植物追加処理
    public function plantAdd(Request $request){
        $request->validate([
            'plant'=>['required'],
            'field'=>['required'],
        ]);
        $user=\Auth::user();
        if(\Auth::check()){
           if((count( Field::findOrFail($request->field)->plants()->get())+count($request->plant))>2){
               $error=['申し訳ありません,一つの畑に対して２つの植物しか選択できません'];
               return view('commons.error',['error'=>$error]);
           }
           foreach($request->plant as $number){
               $plantType=PlantType::findOrFail($number);
               if((($user->point)-($plantType->point))>=0){
                   $user->point=(($user->point)-($plantType->point));
                   $user->save();
                   
                   Field::findOrFail($request->field)->plants()->create(['plantType_id'=>$number,'complete'=>false]);
               }else{
                   $error=['ポイントがありません　追加をしてください'];
                   return view('commons.error',['error'=>$error]);
               }
           } 
           return back();
        }
        $error=['申し訳ありません、本人のみアクセス可能です、ログインをやり直してください'];
        return view('commons.error',['error'=>$error]);
    }
    //畑全体像の写真
     public function field_overall(){
        $overallFields=OverallField::get();
        return view('menu.field_overall',[ 'overallFields'=> $overallFields]);
    }
   
    
}
