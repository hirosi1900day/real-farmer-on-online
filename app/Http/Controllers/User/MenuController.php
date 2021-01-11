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
        $instructions=Instruction::orderBy('created_at'.'desc')->get();
        return view('menu.instruction',['$instructions'=>$instructions]);
    }
    public function plant(){
        $plants=Plant::orderBy('created_at','desc')->get();
        return view('menu.plant',['plants'=>$plants]);
    }
    public function field(){
        $fields=Fields::orderBy('created_at','desc')->get();
        return view('menu.field',['fields'=>$fields]);
    }
}
