<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantType;

class welcomeController extends Controller
{
    public function plantIndex(){
        $plants=PlantType::OrderBy('created_at','desc')->get();
        
      
        return['plants'=>$plants];
    }
}
