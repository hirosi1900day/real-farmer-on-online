<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Field;
use App\User_instruction;
use App\Instruction;
use App\Plant;
use App\PlantType;
use App\Daily;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function userShow($id){
        $user=User::findOrFail($id);
        return view('admin.userShow',['user'=>$user]);
    }
    public function fieldHistoryWrite($id){
        $field=Field::findOrFail($id);
        $user=$field->user()->first();
        return view('admin.historyWrite.fieldHistorywrite',['user'=>$user,'field'=>$field]);
    }
    public function fieldHistoryWriteStore(Request $request){
        $user=User::findOrFail($request->user_id);
        $user->agricultualHistories()->create(['contet'=>$request->content]);
        
        $field=Field::findOrFail($request->field_id);
        $field->complete=true;
        $field->save();
        return redirect(route('admin.home'));
    }
    public function instructionHistoryWrite($id){
        $user_instruction=User_instruction::findOrFail($id);
        $user=$user_instruction->field()->first()->user()->first();
        return view('admin.historyWrite.instructionHistorywrite',['user'=>$user,'user_instruction'=>$user_instruction]);
    }
    public function instructionHistoryWriteStore(Request $request){
        $user=User::findOrFail($request->user_id);
        $user->agricultualHistories()->create(['contet'=>$request->content]);
        
        $user_instruction=User_instruction::findOrFail($request->user_instruction_id);
        $user_instruction->complete=true;
        $user_instruction->save();
        return redirect(route('admin.home'));
    }
    public function plantHistoryWrite($id){
        $plant=plant::findOrFail($id);
        $user=$plant->field()->first()->user()->first();
        return view('admin.historyWrite.plantTypeHistorywrite',['user'=>$user,'plant'=>$plant]);
    }
    public function plantHistoryWriteStore(Request $request){
        $user=User::findOrFail($request->user_id);
        $user->agricultualHistories()->create(['contet'=>$request->content]);
        $plant=Plant::findOrFail($request->plant_id);
        $plant->complete=true;
        $plant->save();
        return redirect(route('admin.home'));
    }
    public function dailyCreate($id){
        $field=Field::findOrFail($id);
        return view('admin.dailyCreate.dailyCreate',['field'=>$field]);
    }
    public function dailystore(Request $request){
        $request->validate([
        'content'=>['required'],
        'gallary'=>['file','mimes:jpeg,png,jpg,bmb','max:1048','required',],
       ]);
       
        if($file = $request->gallary){
        //保存するファイルに名前をつける    
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $path = Storage::disk('s3')->putFileAs('/dailies',$file, $fileName,'public');
        }else{
        //画像が登録されなかった時はから文字をいれる
        $path = "";
        }
        $field=Field::findOrFail($request->field_id);
        $field->dailies()->create(['content'=>$request->content,'gallary'=>$path,'plantType_id'=>0]);
        return redirect(route('admin.home'));
    }
    
}
