<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;

class InformationController extends Controller
{
    //新着情報を管理者から流す
    public function create(){
        return view('admin.information');
    }
    //新着情報保存
    public function store(Request $request){
        $information=new Information;
        $informations=Information::orderBy('created_at');
        
        if(count($informations->get())>7){
           
            $information_content=$informations->first();
            $information_content->delete();
        }
        $information->content=$request->content;
        $information->save();
        return redirect(route('admin.home'));
        
    }
    //新着情報表示
    public function index(){
        $informations=Information::orderBy('created_at','desc')->get();
        return response()->json($informations);
    }
    
}
