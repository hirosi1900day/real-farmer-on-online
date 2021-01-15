<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Field;

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
    
}
