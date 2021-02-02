<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Field;
use App\Daily;
use App\User;
use App\AdminField;

class DailyController extends Controller
{
    public function index(){
       
        $user=\Auth::user();
        $fields=$user->fields()->orderBy('created_at','desc')->get();
        $adminFields=[];
        $dailys=[];
        if(count($fields)>0){
        foreach($fields as $index=>$field){
            $adminFields[$index]=AdminField::findOrFail($field->adminField_id);
        }
        }
        
        return view('menu.dailiesIndex',['fields'=>$fields,
                                         'adminFields'=>$adminFields,
                                         ]);
    }
    public function show($id){
        //idはfield_id
        $field=Field::findOrFail($id);
        $dailys=$field->dailies()->get();
        return view('menu.dailyShow',['dailys'=>$dailys]);
    }
}
