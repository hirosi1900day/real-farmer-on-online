<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminField;
use App\Instruction;
use App\PlantType;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\OverallField;




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
        'gallary'=>['required','max:2048']
        ]);
        if($file = $request->gallary){
            
            //保存するファイルに名前をつける    
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = Storage::disk('s3')->putFileAs('/adminField',$file, $fileName,'public');
        }else{
        //画像が登録されなかった時はから文字をいれる
        $fileName = "";
    }
        $adminField=new AdminField;
        $adminField->field_name=$request->field_name;
        $adminField->field_number=$request->field_number;
        $adminField->gallary=$path;
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
    public function adminField_delete(Request $request){

        $adminField = AdminField::findOrFail($request->adminField_id);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() == User::where('email',config('const.admin_user')[0])->first()->id) {
            $deletename=$adminField->gallary;
            Storage::disk('s3')->delete($deletename);
            $adminField->delete();
        }
        // 前のURLへリダイレクトさせる
        return back(); 
    }
    public function instruction_delete(Request $request){
        if (\Auth::id() == User::where('email',config('const.admin_user')[0])->first()->id){
        $instruction=Instruction::findOrFail($request->instruction_id);
        $instruction->delete();
        }
        return back();
    }
    public function plantType_delete(Request $request){
       
        if (\Auth::id() == User::where('email',config('const.admin_user')[0])->first()->id){
        
        $plantType=PlantType::findOrFail($request->plantType_id);
        $plantType->delete();
        }
        return back();
    }
   public function field_overall_create(){
       $overallFields=OverallField::get();
       return view('admin.instruction.field_overall_create',['overallFields'=>$overallFields]);
   }
   public function field_overall_store(Request $request){
       $request->validate([
        'gallary'=>['required','max:2048']
        ]);
        if($file = $request->gallary){
            
            //保存するファイルに名前をつける    
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = Storage::disk('s3')->putFileAs('/overallField',$file, $fileName,'public');
        }else{
        //画像が登録されなかった時はから文字をいれる
        $fileName = "";
    }
        $overallField=new OverallField;
        $overallField->gallary=$path;
        $overallField->save();
        return redirect(route('admin.home'));
   }
   public function field_overall_delete(Request $request){
       $overallField = OverallField::findOrFail($request->overallField_id);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() == User::where('email',config('const.admin_user')[0])->first()->id) {
            $deletename=$overallField->gallary;
            Storage::disk('s3')->delete($deletename);
            $overallField->delete();
        }
        return redirect(route('admin.home'));
   }
   
  
        
   
}
