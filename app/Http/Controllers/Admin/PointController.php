<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PointController extends Controller
{
    public function return_point_view($id){
        //idはuser_id
        $user=User::findOrFail($id);
        return view('admin.return_point',['user'=>$user]);
    }
    public function return_point_store(Request $request){
        $request->validate([
        'point'=>['required','string'],]);
        
        $user=User::findOrFail($request->user_id);
        $user->point+=($request->point);
        $user->save();
        
        return redirect(route('admin.home'));
            
        
    }
}
